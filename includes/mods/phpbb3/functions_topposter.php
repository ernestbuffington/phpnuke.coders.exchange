<?php
/**
*
* @package phpBB3
* @functions_topposter.php
* @copyright (c) 2008 lefty74
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @Word To The Mother Fucker
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Obtain Top Posters information
**/
function get_top_posters()
{
	global $cache, $config, $db, $user, $auth;
	global $template;
		
	$spammer_user_ids = array(); 
	$spammer_user_ids = ($config['top_posters_excl_ids']) ? explode(",", $config['top_posters_excl_ids']) : array();
	
	$acl_am = array();
	   
	if ($config['top_posters_excl_adm'])
	{
	   $acl_am[] = 'a_';
	}
	if ($config['top_posters_excl_mod'])
	{
		$acl_am[] = 'm_';
	}

	$exclude_ids_ary = array();
	$top_posters_list = $top_posters_hours_list = '';
     

	if (sizeof($acl_am))
	{
		$user_ary = $auth->acl_get_list(false, $acl_am, false);

		foreach ($user_ary as $forum_id => $forum_ary)
		{
			foreach ($forum_ary as $auth_option => $id_ary)
			{
				$exclude_ids_ary = array_merge($exclude_ids_ary, $id_ary);
			}
		}
	}
	$exclude_ids_ary = array_merge($exclude_ids_ary, $spammer_user_ids);
	$exclude_ids_ary = array_unique($exclude_ids_ary);

	$exclude_ids_ary_hours = ($config['top_posters_excl_hours']) ? $exclude_ids_ary : $spammer_user_ids;
	
	$excluded_ids = (sizeof($exclude_ids_ary)) ? 'AND ' . $db->sql_in_set('user_id', $exclude_ids_ary, true) : '';
	$excluded_ids_hours = (sizeof($exclude_ids_ary_hours)) ? 'AND ' . $db->sql_in_set('user_id', $exclude_ids_ary_hours, true) : '';
	

	$top_posters = $config['amount_top_posters'];

	// count top x posters
	$sql = "SELECT username, user_id, user_type, user_colour, user_posts
        	FROM " . USERS_TABLE . "
        	WHERE user_id <> " . (int) ANONYMOUS . "
				AND user_type <> " . (int) USER_IGNORE . "
					AND user_posts > 0
						" . $excluded_ids . "
        	ORDER BY user_posts DESC";
	$result = $db->sql_query_limit($sql, $top_posters, 0, 0);
	//delete the above line and uncomment below line if you want to cache the query for an hour
	//$result = $db->sql_query_limit($sql, $top_posters, 0, 3600);

	while ($row = $db->sql_fetchrow($result))
	{
		$top_posters_list  .= (($top_posters_list  != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']) . '&nbsp;('. $row['user_posts'] .')';
	}
	$db->sql_freeresult($result);


	// count x top posters in the last x hours
	if ( $config['top_posters_hours'] )
	{
		$xhours = ( $config['top_posters_hours'] * 3600 );
		
		$time = time() - $xhours;
		$sql = "SELECT u.user_id, u.username, u.user_type, u.user_colour, COUNT(p.post_id) as total_posts
	        	FROM " . USERS_TABLE . " u, " . POSTS_TABLE . " p 
				WHERE p.post_time > " . (int) $time . "
					AND u.user_id = p.poster_id
						AND u.user_id <> " . (int) ANONYMOUS . "
							AND u.user_type <> " . (int) USER_IGNORE . "
								" . $excluded_ids_hours . "
				GROUP BY u.user_id 
				ORDER BY total_posts DESC";
			$result = $db->sql_query_limit($sql, $top_posters, 0, 0);
			//delete the above line and uncomment below line if you want to cache the query for an hour
			//$result = $db->sql_query_limit($sql, $top_posters, 0, 3600);

		while ($row = $db->sql_fetchrow($result))
		{
			$top_posters_hours_list  .= (($top_posters_hours_list  != '') ? ', ' : '') . '<em>' . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']) . '&nbsp;('. $row['total_posts'] .')</em>';
		}
		$db->sql_freeresult($result);
	}
	
	$top_posters_hours = ( $config['top_posters_hours'] == 1 ) ? $user->lang['TOP_POSTERS_HOUR'] : sprintf($user->lang['TOP_POSTERS_HOURS'],$config['top_posters_hours']);
    // Assign index specific vars
    $template->assign_vars(array(
	'TOP_POSTERS_LIST'			=> $top_posters_list,
	'TOP_POSTERS_HOURS'			=> $top_posters_hours,
	'TOP_POSTERS_HOURS_LIST'	=> $top_posters_hours_list));
}

?>
