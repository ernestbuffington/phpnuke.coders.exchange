<?php
/**
*
* @package phpBB3
* @version $Id: functions_favorites.php,v 1.0.3 2008/09/30 agrajag Exp $
* @copyright (c) 2008
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Functions for Forum Favorites mod.
*/

class favorite_functions
{

	/**
	 * Get a list of categories from the database
	 * Gives you name, id, order, and active sorted by order
	 * Pass a true value to get all categories, not just active ones.
	 */
	function get_favorites_categories($all = 0)
	{
		global $db;
		
		$wherestr = "WHERE category_active = 1";
		if ($all){
			$wherestr = "";
		}
		
		$sql = 'SELECT category_id, category_name, category_order, 
			category_active FROM ' . FAVORITES_CATEGORY_TABLE . " $wherestr 
			ORDER BY category_order";
		$result = $db->sql_query($sql);
		$favorites_categories = array();
		
		while ($row = $db->sql_fetchrow($result))
		{
			$favorites_categories[] = $row;
		}
		$db->sql_freeresult($result);			

		return $favorites_categories;
	}

	/**
	 * Returns an array with the specified category's info
	 */
	function get_category_info($catid)
	{

		global $db;
		
		$sql = 'SELECT category_id, category_name, category_order, 
			category_active FROM ' . FAVORITES_CATEGORY_TABLE . "
			WHERE category_id = " . intval($catid) . " ORDER BY category_order";
		$result = $db->sql_query($sql);
		
		$category= $db->sql_fetchrow($result);

		$db->sql_freeresult($result);			

		return $category;

	}


	/**
	 * Gives you a user's favorites based on given user id.
	 * Returns a two-dimensional array. First is category id. Second holds text and url info, sorted in order.
	 */
	function get_user_favorites($uid)
	{
		global $db;
		
		$sql = 'SELECT category_id, listitem_text, listitem_url
			FROM ' . FAVORITES_USER_TABLE . "
			WHERE user_id = " . intval($uid) . " 
			ORDER BY category_id, listitem_id";
		$result = $db->sql_query($sql);
		$favorites_listitems = $favorites_listitem_text = array();
		
		while ($row = $db->sql_fetchrow($result))
		{
			$favorites_listitems[$row['category_id']][] = array('listitem_text' => $row['listitem_text'], 'listitem_url' => $row['listitem_url']);
		}
		$db->sql_freeresult($result);
		return $favorites_listitems;

	}

	/**
	 * Dumps out the contents of the forum list tables
	 * Takes one param, the category id to return data for
	 *
	 * returns a two-dimensional array. The first is the row number. Second has the following keys:
	 * 'listitem_count' (int)		- Number of users who have this favorite
	 * 'listitem_text'  (string)	- The name of the favorite
	 * 'listitem_url'	(string)	- The URL of the favorite if it exists. Otherwise this is ''.
	 */
	

	function get_forum_favorites($cat){
		global $db;
		
		if ($cat)
		{
			//Don't return data for categories which are deactivated
			$cat = intval($cat);
			$favfunct = new favorite_functions;
			$cat_info = $favfunct->get_category_info($cat);
			if ($cat_info['category_active'] == 0)
			{
				$cat = 0;
			}
		}
		
		if (!$cat){
			$cat = 0;
		}

		//get data from database
		$sql = 'SELECT listitem_text, listitem_url, listitem_count
			FROM ' . FAVORITES_SPECIAL_TABLE . " WHERE
		type = 0 AND category_id = " . $cat;	//$cat intval'd earlier so it's safe here
		$result = $db->sql_query($sql);
		
		$list = array();
		
		while ($row = $db->sql_fetchrow($result))
		{
			$list[]=$row;
		}
		$db->sql_freeresult($result);	
		
		return $list;
	}

	/**
	 * Updates the forum favorite database. It calls count_forum_favorites to get the group by count, 
	 * and then stores the result in another table for easy access later.
	 * Run after updating a users favorites
	 * Takes one argument, the categories to refresh, if nothing is passed, refreshes everything.
	 */

	function refresh_forum_favorites($catid)
	{
		global $db;
		$favfunct = new favorite_functions;
		
		if (!$catid)
		{
			$categories = $favfunct->get_favorites_categories(1);
			foreach($categories as $cat)
			{
				$favfunct->refresh_forum_favorites($cat['category_id']);
			}
			return;
		}
		
		$catid = intval($catid);
		
		$data = $favfunct->count_forum_favorites(array('category_id' => $catid));
		
		$i = 1;
		
		foreach ($data as $item)
		{

			
			$where_fields = array( 
                  'type'		=>	0, //type of 0 denotes this is the forum favorites list
                  'category_id'	=>	$catid,
                  'listitem_id'	=>	$i,
                  );

			$sql_ary = array (
                  'listitem_text'	=>	$item['listitem_text'],
                  'listitem_url'	=>	($item['listitem_url'] ? $item['listitem_url'] : ''),
                  'listitem_count'	=>	$item['listitem_count'],
                  );
			$i++;
			
			$favfunct->update_insert(FAVORITES_SPECIAL_TABLE, $sql_ary, $where_fields);
		}
		
		//Delete any leftover old values from table
		$sql = 'DELETE FROM ' . FAVORITES_SPECIAL_TABLE . " WHERE
		type = 0 AND category_id = $catid AND listitem_id >= $i";	//catid intval'd earlier so safe here
		$db->sql_query($sql);				
	}

	/**
	 * Returns the overall forum list through a group by count based on passed information. 
	 * $options should be an array with the following keys
	 * 'category_id' (int) - The category you want the list for. If left blank it returns an empty array.
	 * 'limit' (int) - How many items to display in the list. 
	 *		If left blank it tries to get the default from the database. If it can't get that it defaults to 10
	 *
	 * returns a two-dimensional array. The first is the rows sorted in the specified order. Second has the following keys:
	 * 'listitem_count' (int)		- Number of users who have this favorite
	 * 'listitem_text'  (string)	- The text of the favorite item
	 * 'listitem_url'	  (string)	- The URL of the favorite if it exists. Otherwise this is ''.
	 */
	function count_forum_favorites($options)
	{
		global $db, $config;
		
		$catid=0;
		
		//Check to make sure they gave us a category. If not, return an empty array.
		if ($options['category_id'])
		{
			$catid = intval($options['category_id']);
		}
		else
		{
			return array();
		}
		
		//if they give us a limit, use it. otherwise get from database
		//Use 10 if can't get from database, or given invalid number (less than 1)
		$limit = isset($options['limit']) ? intval($options['limit']) : 0;
		if (!$limit || $limit < 1)
		{
			$limit = intval($config['favorites_flist_length']);

			if (!$limit || $limit < 1)
			{
				$limit = 10;
			}
		}


		//get data from database
		$sql = 'SELECT count(*) as listitem_count, listitem_text
			FROM ' . FAVORITES_USER_TABLE . 
			" WHERE category_id = $catid GROUP BY listitem_text ORDER BY listitem_count DESC"; //catid intval'd before so safe here
			 
		//if limit is 0, that means get everything
		if ($limit) 
		{
			$result = $db->sql_query_limit($sql, $limit);
		}
		else
		{
			$result = $db->sql_query($sql);
		}

		$fav_list_ary=array();

		//For each row, get the most popular URL for that item through a group by count
		while ($row = $db->sql_fetchrow($result))
		{
			$sql2 = 'SELECT count(*) as url_count, listitem_url 
				FROM  ' . FAVORITES_USER_TABLE . 
				' WHERE listitem_text = "' . $db->sql_escape($row['listitem_text']) .
				'" GROUP BY listitem_url ORDER BY url_count DESC';
			$result2 = $db->sql_query_limit($sql2, 1);
			$row['listitem_url'] = ($db->sql_fetchfield('listitem_url'));
			$db->sql_freeresult($result2);
				
			$fav_list_ary[] = $row;
		}
		$db->sql_freeresult($result);
		
		return $fav_list_ary;

	}

	/**
	* Update, then insert if not successfull
	*/
	function update_insert($table, $sql_ary, $where_fields)
	{
		global $db;

		$where_sql = array();
		$check_key = '';

		foreach ($where_fields as $key => $value)
		{
			$check_key = (!$check_key) ? $key : $check_key;
			$where_sql[] = $key . ' = ' . ((is_string($value)) ? "'" . $db->sql_escape($value) . "'" : (int) $value);
		}

		if (!sizeof($where_sql))
		{
			return;
		}

		$sql = "SELECT $check_key
			FROM $table
			WHERE " . implode(' AND ', $where_sql);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$row)
		{
			$sql_ary = array_merge($where_fields, $sql_ary);
			
			if (sizeof($sql_ary))
			{
				$db->sql_query("INSERT INTO $table " . $db->sql_build_array('INSERT', $sql_ary));
			}
		}
		else
		{
			if (sizeof($sql_ary))
			{
				$sql = "UPDATE $table SET " . $db->sql_build_array('UPDATE', $sql_ary) . '
					WHERE ' . implode(' AND ', $where_sql);
				$db->sql_query($sql);
			}
		}
	}

	/**
	* Returns a 2d array of userids and usernames of everyone with a certain favorite item
	* returns and empty array if there was an error or you don't pass enough information
	*
	* data should cotain keys 
	* 'category_id' - the category id
	* 'listitem_text' - the text of the favorite
	* 
	* Returns array with keys 'user_id' and 'username'
	*/
	function get_favorite_users($data)
	{
		global $db;
		
		$catid = intval($data['category_id']);
		$text = $data['listitem_text'];
		
		if (!$catid or !$text)
		{
			return array();
		}		
								
		$sql = 'SELECT DISTINCT a.user_id as user_id, b.username as username FROM ' . FAVORITES_USER_TABLE . 
			' a LEFT JOIN ' . PHPBB3_USERS_TABLE . ' b ON a.user_id = b.user_id 
			WHERE a.category_id = '. $catid . //intval'd above so safe here
			' AND a.listitem_text = \''. $db->sql_escape($text) . 
			'\' ORDER BY a.user_id ASC';
		$result = $db->sql_query($sql);
		
		$users = array();
		
		while ($row = $db->sql_fetchrow($result))
		{
			$users[]=$row;
		}
		$db->sql_freeresult($result);	
		
		return $users;

	}

	/**
	* Adds a favorite to a user's list. Passed array should have the following keys
	* 
	* 'user_id' (int) - The userid you want to add to.
	* 'category_id' (int) - The category you to add to.
	* 'listitem_text' (string) - The text of the new favorite
	* 'listitem_url' (string) - The URL of the new favorite
	*
	* Checks for already existing item with same name. Returns 1 if successful, or an error code (listed below)
	* -1 = Invalid or missing user id passed
	* -2 = Invalid or missing category id passed
	* -3 = Invalid or missing item text passed
	* -4 = Item already exists in user's list
	*/
	function add_favorite_user($data)
	{
		global $db;
		//get data and return error if missing essential information
		$uid = $data['user_id'] ? $data['user_id'] : 0;
		$catid = $data['category_id'] ? $data['category_id'] : 0;
		$text = $data['listitem_text'] ? $data['listitem_text'] : '';
		$url = $data['listitem_url'] ? $data['listitem_url'] : '';
		
		$uid = intval($uid);
		$catid = intval($catid);
		
		if (!$uid)
		{
			return FAVORITES_ERR_INVALID_UID; //Invalid user ID
		}
		elseif (!$catid || $catid<1)
		{
			return FAVORITES_ERR_INVALID_CATID; //Invalid category ID
		}
		elseif (!$text)
		{
			return FAVORITES_ERR_INVALID_TEXT; //Invalid item text
		}


		//check if already exists
		$sql = 'SELECT listitem_text
			FROM ' . FAVORITES_USER_TABLE .
			' WHERE listitem_text = "' . $db->sql_escape($text) . "\" 
			AND user_id=$uid AND category_id=$catid" ; //uid and catid already intval'd so safe here
		$result = $db->sql_query($sql);
		$exists = ($db->sql_fetchfield('listitem_text'));
		$db->sql_freeresult($result);
		
		if ($exists)
		{
			return FAVORITES_ERR_ITEM_EXISTS;//Item already in user's list
		}
		else
		{

			//figure out what item number it will be
			$sql = 'SELECT MAX(listitem_id) as max_id
				FROM ' . FAVORITES_USER_TABLE .
				" WHERE user_id = $uid AND category_id = $catid" ;
			$result = $db->sql_query($sql);
			$new_id = ((int) $db->sql_fetchfield('max_id'));
			$new_id++;
			$db->sql_freeresult($result);

			$sql_ary = array (
				'user_id'					=>	$uid,
				'category_id'		=>	$catid,
				'listitem_id'		=>	$new_id,
				'listitem_text'	=>	$text,
				'listitem_url'	=>	$url,
			);		

			$db->sql_query('INSERT INTO ' . FAVORITES_USER_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary));
			$favfunct = new favorite_functions;
			$favfunct->refresh_forum_favorites($catid);
			return FAVORITES_SUCCESS; //Successfully added item
		}
	}
}

?>
