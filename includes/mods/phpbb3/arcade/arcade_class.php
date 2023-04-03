<?php
/**
*
* @package arcade
* @version $Id: arcade_class.php 665 2008-12-13 17:08:51Z JRSweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 * Php4ConstructorRector (https://wiki.php.net/rfc/remove_php4_constructors)
 * EregToPregMatchRector (http://php.net/reference.pcre.pattern.posix https://stackoverflow.com/a/17033826/1348344 https://docstore.mik.ua/orelly/webprog/pcook/ch13_02.htm)
 * RandomFunctionRector
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Class for handling arcade
* @package arcade
*/
class arcade
{
	var $config = array();
	var $games = array();
	var $all_games = array();
	var $cats = array();
	var $users = array();
	var $leaders = array();
	var $totals = array();
	var $latest_highscores = array();
	var $most_popular_games = array();
	var $least_popular_games = array();
	var $longest_highscores = array();
	var $most_downloaded_games = array();
	var $least_downloaded_games = array();
	var $newest_games = array();
	var $cookie_gid = '';
	var $cookie_popup = '';
	var $cookie_sid = '';
	var $points = array();

	/**
	* Constructor used to setup arcade
	*/
	function __construct($in_arcade = true)
	{
		global $config, $arcade_cache, $template, $phpEx;
        
		$phpbb_root_path = PHPBB3_ROOT_DIR;
		
		$arcade_cache = new arcade_cache();
		$this->config = $arcade_cache->obtain_arcade_config();
		$this->init_points();
		$this->set_data();
		$this->set_disabled();

		// Set cookie information
		$this->cookie_gid 	= $config['cookie_name'] . '_arcade_gid';
		$this->cookie_popup = $config['cookie_name'] . '_arcade_popup';
		$this->cookie_sid 	= $config['cookie_name'] . '_arcade_sid';

		$template->assign_vars(array(
			'S_IN_ARCADE'			=> $in_arcade,
			'S_ARCADE_DISABLED'		=> ($this->config['arcade_disable']) ? true : false,
			'U_ARCADE' 				=> append_sid("{$phpbb_root_path}arcade.$phpEx"),
			'U_ARCADE_FAV'			=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=fav"),
			'U_ARCADE_STATS'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=stats"),
			'ARCADE_VERSION_INFO' 	=> $this->config['copyright'],
			)
		);
	}

	/**
	* Setup arcade data, the information
	* is pulled from the cache
	*/
	function set_data($type = false)
	{
		global $arcade_cache, $auth_arcade;

		switch($type)
		{
			case 'stats':
				$this->users = $arcade_cache->obtain_arcade_users();
				$this->most_popular_games = $this->obtain_popular_games('most', $this->config['most_popular']);
				$this->least_popular_games = $this->obtain_popular_games('least', $this->config['least_popular']);
				$this->longest_highscores = $this->obtain_longest_highscores($this->config['longest_held_scores']);

				if ($auth_arcade->acl_getc_global('c_download'))
				{
					$this->most_downloaded_games = $this->obtain_downloaded_games('most', $this->config['most_downloaded']);
					$this->least_downloaded_games = $this->obtain_downloaded_games('least', $this->config['least_downloaded']);
				}
			// No break

			default:
				$this->newest_games = $this->obtain_newest_games($this->config['newest_games']);
				$this->leaders = $arcade_cache->obtain_arcade_leaders(($this->config['arcade_leaders'] > $this->config['arcade_leaders_header']) ? $this->config['arcade_leaders'] : $this->config['arcade_leaders_header']);
				$this->games = $this->obtain_games();
				$this->all_games = $arcade_cache->obtain_arcade_all_games();
				$this->cats = $arcade_cache->obtain_arcade_cats();
				$this->latest_highscores = $this->obtain_latest_highscores($this->config['latest_highscores']);
				$this->totals = $arcade_cache->obtain_arcade_totals();
			break;
		}
		return;
	}

	/**
	* Check if the arcade should be closed down
	*/
	function set_disabled()
	{
		// Return if auto disable is not turned on
		if (!$this->config['auto_disable'])
		{
			return;
		}

		$current_date = getdate();
		$current_time = time();

		// Return if auto disable start time is not valid
		$time_array = $this->validate_time($this->config['auto_disable_start']);
		if (!sizeof($time_array))
		{
			return;
		}
		$auto_disable_start = mktime($time_array['hour'], $time_array['min'], 0, $current_date['mon'], $current_date['mday'], $current_date['year']);

		// Return if auto disable end time is not valid
		$time_array = $this->validate_time($this->config['auto_disable_end']);
		if (!sizeof($time_array))
		{
			return;
		}
		$auto_disable_end = mktime($time_array['hour'], $time_array['min'], 0, $current_date['mon'], $current_date['mday'], $current_date['year']);

		// Return if auto disable start time is not set eariler than end time
		if ($auto_disable_start >= $auto_disable_end)
		{
			return;
		}

		// If everything checks out let set the correct value for arcade_disable
		if ($current_time >= $auto_disable_start && $current_time < $auto_disable_end)
		{
			if ($this->config['arcade_disable'] == false)
			{
				$this->set_config('arcade_disable', true);
			}
		}
		else
		{
			if ($this->config['arcade_disable'] == true)
			{
				$this->set_config('arcade_disable', false);
			}
		}
	}

	/**
	* Returns an array of ids for the specified type
	* This is for the local arcade permissions
	*/
	function get_permissions($type)
	{
		global $auth_arcade;

		return array_unique(array_keys($auth_arcade->acl_getc($type, true)));
	}

	/**
	* Set config value. Creates missing config entry.
	*/
	function set_config($config_name, $config_value)
	{
		global $db, $cache;

		$sql = 'UPDATE ' . ARCADE_PHPBB3_CONFIG_TABLE . "
			SET config_value = '" . $db->sql_escape($config_value) . "'
			WHERE config_name = '" . $db->sql_escape($config_name) . "'";
		$db->sql_query($sql);

		if (!$db->sql_affectedrows() && !isset($this->config[$config_name]))
		{
			$sql = 'INSERT INTO ' . ARCADE_PHPBB3_CONFIG_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'config_name'	=> $config_name,
				'config_value'	=> $config_value));
			$db->sql_query($sql);
		}

		$this->config[$config_name] = $config_value;

		// Destroy the cache of the config
		// because the values have changed
		$cache->destroy('_arcade');
	}

	/**
	* Set a favorite game and redirect the user back
	* to the correct page
	*/
	function set_favorites($mode, $cat_id, $game_id)
	{
		global $db, $phpEx, $user, $start, $term;

		$phpbb_root_path = PHPBB3_ROOT_DIR;
		
		$page = request_var('page', '');
		if ($mode == 'addfav' &&  $user->data['is_registered'])
		{
			$data = array(
				'user_id'		=> $user->data['user_id'],
				'game_id'		=> $game_id,
			);

			$sql = 'INSERT INTO ' . ARCADE_FAVS_TABLE . ' ' .
				$db->sql_build_array('INSERT', $data);

			$db->sql_query($sql);
		}
		else if ($mode == 'delfav' && $user->data['is_registered'])
		{
			$sql = 'DELETE FROM ' . ARCADE_FAVS_TABLE . '
				WHERE game_id = ' . (int) $game_id . '
				AND user_id = ' . $user->data['user_id'];
			$db->sql_query($sql);
		}

		$start = ($start < 0) ? 0 : $start;
		if ($cat_id > 0)
		{
			redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=cat&amp;c=$cat_id&amp;start=$start#g$game_id"));
		}
		else if ($page == 'fav')
		{
			redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=fav&amp;start=$start#g$game_id"));
		}
		else if ($page == 'search')
		{
			if (empty($term))
			{
				redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=search&amp;search_id=newgames&amp;start=$start#g$game_id"));
			}
			else
			{
				redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=search&amp;term=' . urlencode($term) . "&amp;start=$start#g$game_id"));
			}
		}
		else if ($page == 'play')
		{
			redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=play&amp;g=$game_id"));
		}
		redirect(append_sid("{$phpbb_root_path}arcade.$phpEx"));
	}

	/**
	* Set arcade cookie, this is used to track the game id,
	* sid and popup value
	*/
	function set_cookie($game_id = false, $game_sid = false, $popup = false, $show = false)
	{
		global $user;

		// The cookies is removed once the arcade_score.php output
		// is displayed.  It just used to check whether of not
		// to use the simple header

		// If the function is called with no parameters and show
		// set to true it will output all cookies
		if (!$game_id && !$game_sid && !$popup && $show)
		{
			print_r($_COOKIE);
			return;
		}

		// If the function is not sent anything it removes all its cookies
		if (!$game_id && !$game_sid && !$popup)
		{
			$set_time = time() - 31536000;
			$user->set_cookie('arcade_popup', '', $set_time);
			$user->set_cookie('arcade_gid', '', $set_time);
			$user->set_cookie('arcade_sid', '', $set_time);

			return;
		}

		$set_time = time() + ARCADE_COOKIE_TIME;
		$user->set_cookie('arcade_gid', $game_id, $set_time);
		$user->set_cookie('arcade_sid', $game_sid, $set_time);
		$user->set_cookie('arcade_popup', ($popup) ? true : false, $set_time);

		return;
	}

	/**
	* Set various file/path name based off of passed file name
	* 
	* Types
	* - install	Returns filename with path of install file
	* - path	Returns game path
	* - 		Returns filename with path
	*/
	function set_path($file, $type = '', $use_phpbb_root = true)
	{
		global $phpEx, $file_functions;
		
		$phpbb_root_path = PHPBB3_ROOT_DIR; 
		
		$path = $file_functions->remove_extension($file);

		$return = '';
		switch ($type)
		{
			case 'install':
				$return = $this->config['game_path'] . $path . '/' . $path . '.' . $phpEx;
			break;

			case 'path':
				$return = $this->config['game_path'] . $path . '/';
			break;

			default:
				$return = $this->config['game_path'] . $path . '/' . $file;
			break;
		}

		return ($use_phpbb_root) ? $phpbb_root_path . $return : $return;
	}

	/*
	* Set filesize for game this 
	* includes all extra files
	*/
	function set_filesize($game_id)
	{
		global $db, $file_functions;

		$sql = 'SELECT game_id, game_swf, game_files
			FROM ' . ARCADE_GAMES_TABLE . '
			WHERE game_id = ' . (int) $game_id;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$game_files_array = array();
		$game_files_array[] = $this->set_path($row['game_swf']);

		$extra_game_files = ($row['game_files'] != '') ? unserialize($row['game_files']) : '';
		if (is_array($extra_game_files))
		{
			foreach ($extra_game_files as $file)
			{
				if (file_exists($file))
				{
					$game_files_array[] = $file;
				}
			}
		}

		$filesize = $file_functions->filesize($game_files_array);

		if ($filesize)
		{
			$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
				SET game_filesize = '. (int) $filesize . '
				WHERE game_id = ' . (int) $game_id;
			$db->sql_query($sql);
		}

		return $filesize;
	}

	/*
	* Set game display size
	*/
	function set_game_size(&$new_game_width, &$new_game_height, $game_width, $game_height, $game_swf)
	{
		if ($this->config['game_autosize'])
		{
			if (list($width, $height) = getimagesize($this->set_path($game_swf)))
			{
				$new_game_width = $width;
				$new_game_height = $height;
			}
		}

		if (empty($new_game_width) || empty($new_game_height))
		{
			if (!empty($this->config['game_width']))
			{
				$new_game_width = $this->config['game_width'];
			}
			else
			{
				$new_game_width = $game_width;
			}


			if (!empty($this->config['game_height']))
			{
				$new_game_height = $this->config['game_height'];
			}
			else
			{
				$new_game_height = $game_height;
			}
		}
	}

	/**
	* Displays html code for category images including
	* dimensions if possible
	*
	* Thanks easygo
	*/
	function get_img($path, $alt = '')
	{
		$alt = (!empty($alt)) ? 'alt="' . $alt . '" title="' . $alt . '"' : 'alt=""';
		if (list($width, $height) = getimagesize($path))
		{
			$img = '<img src="' . $path . '" width="' . $width . '" height="' . $height . '" ' . $alt . ' />';
		}
		else
		{
			$img = '<img src="' . $path . '" ' . $alt . ' />';
		}

		return $img;
	}

	/**
	* Get user information includes user_colour, rank, avatar
	* and various bits of arcade info
	*/
	function get_user_info($user_id = false)
	{
		global $db, $phpEx, $user;

		if ($user_id)
		{
			$sql = 'SELECT * FROM ' . PHPBB3_USERS_TABLE . '
					WHERE user_id = ' . $user_id;
			$result = $db->sql_query($sql);
			$user_info = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}
		else
		{
			$user_info = $user->data;
		}

		if ($user_info['user_id'] == ANONYMOUS)
		{
			$data = array(
				'user_id'			=> $user_info['user_id'],
				'username'			=> $user_info['username'],
				'user_colour'		=> $user_info['user_colour'],
				'avatar'	 		=> '',
				'rank_title' 		=> '',
				'rank_image' 		=> '',
				'rank_image_src'	=> '',
				'total_wins' 		=> 0,
				'total_plays' 		=> 0,
				'total_time' 		=> 0,
			);
		}
		else
		{
			$avatar = ($user->optionget('viewavatars')) ? get_user_avatar($user_info['user_avatar'], $user_info['user_avatar_type'], $user_info['user_avatar_width'], $user_info['user_avatar_height']) : '';
			$rank_title = $rank_img = $rank_img_src = '';
			get_user_rank($user_info['user_rank'], $user_info['user_posts'], $rank_title, $rank_img, $rank_img_src);

			// Calculates the users total number of arcade victories
			$sql = 'SELECT COUNT(game_id) AS total_wins
				FROM ' . ARCADE_GAMES_TABLE . '
				WHERE game_highuser = ' . $user_info['user_id'];

			$result = $db->sql_query($sql);
			$total_wins = $db->sql_fetchfield('total_wins');
			$db->sql_freeresult($result);

			// Total plays and times using Arcade
			$sql = 'SELECT SUM(total_plays) AS games_played, SUM(total_time) AS games_time
				FROM ' . ARCADE_SCORES_TABLE . '
				WHERE user_id = ' . $user_info['user_id'];

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$total_plays = $row['games_played'];
			$total_time = $row['games_time'];

			$data = array(
				'user_id'			=> $user_info['user_id'],
				'username'			=> $user_info['username'],
				'user_colour'		=> $user_info['user_colour'],
				'avatar'	 		=> $avatar,
				'rank_title' 		=> $rank_title,
				'rank_image' 		=> $rank_img,
				'rank_image_src'	=> $rank_img_src,
				'total_wins' 		=> $total_wins,
				'total_plays' 		=> $total_plays,
				'total_time' 		=> $total_time,
			);
		}

		return $data;
	}

	/**
	* Get all the categories the user has played games in
	* Follows the permissions systems so only categories
	* the viewing user can see are returned
	*/
	function get_user_categories($user_id = false)
	{
		global $user, $db;

		if (!$user_id)
		{
			$user_id = $user->data['user_id'];
		}

		$sql_array = array(
			'SELECT'	=> 'c.cat_id, c.cat_name',

			'FROM'		=> array(
				ARCADE_SCORES_TABLE	=> 's',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
					'ON'	=> 's.game_id = g.game_id'
				),
				array(
					'FROM' => array(ARCADE_CATS_TABLE => 'c'),
					'ON'	=> 'g.cat_id = c.cat_id'
				),
			),

			'ORDER_BY'	=> 'c.cat_name ASC',

			'WHERE'		=> 's.user_id = ' . $user_id . ' AND ' . $db->sql_in_set('c.cat_id', $this->get_permissions('c_view'), false, true),
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);

		$cats = array();
		$cats[] = $user->lang['ARCADE_ALL_CATEGORIES'];
		while ($row = $db->sql_fetchrow($result))
		{
			$cats[$row['cat_id']] = $row['cat_name'];
		}
		$db->sql_freeresult($result);

		return $cats;
	}

	/**
	* Get any field from the games array (games user has permission for) or all games array
	* This can be used to check if a user has permission to view a game by just passing
	* the game id
	* @returns requested field
	*/
	function get_game_field($game_id, $field = '', $mode = '')
	{
		$mode = ($mode != 'all') ? 'games' : 'all_games';
		switch ($mode)
		{
			case 'games':
				if (isset($this->games[$game_id]))
				{
					if ($field == '')
					{
						return true;
					}

					return $this->games[$game_id][$field];
				}

				return false;
			break;

			case 'all_games':
				if (isset($this->all_games[$game_id]))
				{
					if ($field == '')
					{
						return true;
					}

					return $this->all_games[$game_id][$field];
				}

				$game = $this->get_game_data($game_id);
				return ($game && $field != '' && isset($game[$field])) ? $game[$field] : false;
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}
	}

	/**
	* Gets game data of passed game id or ids
	*/
	function get_game_data($game_id)
	{
		global $db;

		$sql_array = array(
			'SELECT'	=> 'g.*, c.cat_name, c.cat_desc, c.cat_desc_uid, c.cat_desc_bitfield, c.cat_desc_options, c.parent_id, c.cat_parents, c.left_id, c.right_id, c.cat_download, c.cat_cost, c.cat_reward, c.cat_use_jackpot',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
					'ON'	=> 'g.cat_id = c.cat_id'
				),
			),

			'WHERE'	=> $db->sql_in_set('game_id', $game_id),
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		if (is_array($game_id))
		{
			$row = $db->sql_fetchrowset($result);
		}
		else
		{
			$row = $db->sql_fetchrow($result);
		}

		$db->sql_freeresult($result);

		return ($row) ? $row : false;
	}

	/**
	* Gets any category field
	*/
	function get_cat_field($cat_id, $field = '')
	{
		if (isset($this->cats[$cat_id]))
		{
			if ($field == '')
			{
				return true;
			}
			
			return $this->cats[$cat_id]['cat_name'];
		}

		$cat = $this->get_cat_data($cat_id);
		return ($cat && $field != '' && isset($cat[$field])) ? $cat[$field] : false;
	}

	/**
	* Get category data for passed
	* cat id or ids
	*/
	function get_cat_data($cat_id)
	{
		global $db;

		$sql_array = array(
			'SELECT'	=> 'c.cat_id, c.cat_name, c.cat_desc, c.cat_desc_uid, c.cat_desc_bitfield, c.cat_desc_options, c.parent_id, c.cat_parents, c.left_id, c.right_id',

			'FROM'		=> array(
				ARCADE_CATS_TABLE	=> 'c',
			),

			'WHERE'	=> $db->sql_in_set('cat_id', $cat_id),
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		if (is_array($cat_id))
		{
			$row = $db->sql_fetchrowset($result);
		}
		else
		{
			$row = $db->sql_fetchrow($result);
		}

		$db->sql_freeresult($result);
		
		return ($row) ? $row : false;
	}

	/**
	* Get a random game_id from the arcade
	* This is done like this to support all db types
	* since some do not have a RAND() function
	*/
	function get_random_game()
	{
		global $db;

		$sql_array = array(
			'SELECT'	=> 'g.game_id',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
					'ON'	=> 'g.cat_id = c.cat_id'
				),
			),

			'WHERE'	=> 'c.cat_status <> ' . PHPBB3_ITEM_LOCKED . ' AND ' . $db->sql_in_set('c.cat_id', $this->get_permissions('c_play'), false, true),
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// Return false if no games are found
		$game_id = false;
		if (sizeof($row))
		{
			$game_id = $row[random_int(0, sizeof($row) - 1)]['game_id'];
		}

		return $game_id;
	}

	/**
	* Display a users favorite games, if no user id
	* is passed it default to viewing user
	*/
	function get_fav_data($user_id = false)
	{
		global $db, $user;

		if (!$user_id)
		{
			$user_id = $user->data['user_id'];
		}

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name, g.game_name_clean, g.game_swf, g.game_scorevar, g.cat_id',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_FAVS_TABLE => 'f'),
					'ON'	=> 'g.game_id = f.game_id'
				),
			),

			'WHERE'	=> 'f.user_id = ' . (int) $user_id . ' AND ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true),

			'ORDER_BY' => 'g.game_name_clean ASC',
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$fav = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$fav[$row['game_id']] = array(
				'game_id'		=> $row['game_id'],
				'game_name'		=> $row['game_name'],
				'game_swf'		=> $row['game_swf'],
				'game_scorevar'	=> $row['game_scorevar'],
				'cat_id'		=> $row['cat_id'],
			);
		}
		$db->sql_freeresult($result);
		return $fav;
	}

	/**
	* Return an array contain all the game ids and names
	* of the games the user has played, if no user id is
	* passed it defaults to viewing user
	*/
	function get_played_games($user_id = false)
	{
		global $db, $user;

		if (!$this->config['played_games'])
		{
			return array();
		}

		if (!$user_id)
		{
			$user_id = $user->data['user_id'];
		}

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name',

			'FROM'		=> array(
				ARCADE_SCORES_TABLE	=> 's',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
					'ON'	=> 's.game_id = g.game_id'
				),
			),

			'WHERE'		=> 's.user_id = ' . (int) $user_id,
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);

		$played = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$played[$row['game_id']] = $row['game_name'];
		}
		$db->sql_freeresult($result);
		return $played;
	}
	
	/*
	* This function displays the site name, categories and download methods
	* available from the server you are download from
	*/
	function display_download_data()
	{
		if ($this->config['download_list'])
		{
			global $config;

			$categories = array();
			foreach ($this->cats as $cats)
			{
				if ($cats['cat_download'] == true)
				{
					$categories[$cats['cat_id']] = array(
						'cat_id'	=> $cats['cat_id'],
						'cat_name'	=> $cats['cat_name'],
					);
				}
			}

			$download_data = array(
				'sitename'		=> $config['sitename'],
				'message'		=> $this->config['download_list_message'],
				'methods'		=> $this->compress_methods(),
				'categories'	=> $categories,
			);

			$download_data = gzcompress(serialize($download_data), 9);
			echo $download_data;
		}
		exit;
	}

	/**
	* This function displays all the games for download.  One issue occurs though,
	* since the server is connecting to the site to get the list and the server is most likely
	* not ever going to be logged in we must display every game where the category and/or game
	* is able to be downloaded based on the cat_download and game_download setting.  Once the
	* list is displayed in the ACP the permissions system will take over for downloading.
	*/
	function display_download_list($cat_id, $start, $sort_key, $sort_dir, $sort_time, $per_page)
	{
		if ($this->config['download_list'])
		{
			global $db;

			$where = ($cat_id) ? ' AND g.cat_id = ' . (int) $cat_id : '';
			$install_time = ($sort_time) ? time() - ($sort_time * 86400) : false;
			$where = ($install_time) ? $where . ' AND g.game_installdate > ' . $install_time : $where;

			$sort = ($sort_key == 'n') ? 'g.game_name_clean' : 'g.game_installdate';
			$sort_dir = ($sort_dir == 'a') ? 'ASC' : 'DESC';

			// Only allow 50, 100 or 200 games per page
			// This will make sure that there are not tons of different settings out there
			$per_page = (in_array($per_page, array(50, 100, 200))) ? $per_page : 50;

			$download_list = array();

			$sql_array = array(
				'SELECT'	=> 'COUNT(g.game_id) as total',

				'FROM'		=> array(
					ARCADE_GAMES_TABLE	=> 'g',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
						'ON'	=> 'g.cat_id = c.cat_id'
					),
				),

				'WHERE'	=> 'c.cat_download = 1 AND g.game_download = 1 ' . $where,
			);

			$sql = $db->sql_build_query('SELECT', $sql_array);
			$result = $db->sql_query($sql, $this->config['cache_time'] * 3600);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$download_list['total'] = $row['total'];
			unset($row);

			$sql_array = array(
				'SELECT'	=> 'g.game_id, g.game_swf, g.game_name, g.game_name_clean, g.game_desc, g.game_installdate, g.game_filesize, c.cat_id',

				'FROM'		=> array(
					ARCADE_GAMES_TABLE	=> 'g',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
						'ON'	=> 'g.cat_id = c.cat_id'
					),
				),

				'WHERE'	=> 'c.cat_download = 1 AND g.game_download = 1 ' . $where,

				'ORDER_BY' => $sort . ' ' . $sort_dir,
			);

			$result = $db->sql_query($sql);
			$sql = $db->sql_build_query('SELECT', $sql_array);
			$result = $db->sql_query_limit($sql, $per_page, $start, $this->config['cache_time'] * 3600);

			$games = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$games[$row['game_id']] = array(
					'game_id'			=> $row['game_id'],
					'game_name'			=> $row['game_name'],
					'game_name_clean'	=> $row['game_name_clean'],
					'game_swf'			=> $row['game_swf'],
					'game_desc'			=> $row['game_desc'],
					'game_installdate'	=> $row['game_installdate'],
					'game_filesize'		=> $row['game_filesize'],
					'cat_id'			=> $row['cat_id'],
				);
			}
			$db->sql_freeresult($result);
			$download_list['games'] = $games;
			unset($games);

			// Try to save some bandwidth and allows us to still have an array on the other side
			$download_list = gzcompress(serialize($download_list), 9);
			echo $download_list;
		}
		exit;
	}

	/**
	* Updates a games download total
	*/
	function update_download_total($game_id)
	{
		global $db, $user;

		// Update download count
		$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
			SET game_download_total = game_download_total + 1
			WHERE game_id = ' . (int) $game_id;
		$db->sql_query($sql);

		$sql = 'UPDATE ' . ARCADE_DOWNLOAD_TABLE. '
			SET total = total + 1, download_time = ' . time() . '
			WHERE game_id = ' . (int) $game_id . ' AND user_id = ' . (int) $user->data['user_id'];
		$db->sql_query($sql);

		if (!$db->sql_affectedrows())
		{
			$sql = 'INSERT INTO ' . ARCADE_DOWNLOAD_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'game_id'			=> (int) $game_id,
				'user_id'			=> (int) $user->data['user_id'],
				'total'				=> 1,
				'download_time'		=> time(),
			));
			$db->sql_query($sql);
		}
	}

	/**
	* Take seconds and convert to readable format
	* Example usage of filter:
	* To return days, hours, minutes and seconds
	* $filter = 'day|hour|minute|second';
	* If $filter is set to false it returns full result
	*/
	function time_format($secs, $filter = false)
	{
		global $user;

		$output = '';
		$filter = ($filter) ? explode('|', strtolower($filter)) : false;

		$time_array = array(
			'year'		=> 60 * 60 * 24 * 365,
			'month'		=> 60 * 60 * 24 * 30,
			'week'		=> 60 * 60 * 24 * 7,
			'day'		=> 60 * 60 * 24,
			'hour'		=> 60 * 60,
			'minute'	=> 60,
			'second'	=> 0,
		);

		foreach ($time_array as $key => $value)
		{
			if ($filter && !in_array($key, $filter))
			{
				continue;
			}
			
			$item = ($value) ? intval(intval($secs) / $value) : intval($secs);
			if ($item > 0)
			{
				$secs = $secs - ($item * $value);
				$output .= ' ' . $item . ' ' . (($item > 1) ? $user->lang['TIME_' . strtoupper($key) . 'S'] : $user->lang['TIME_' . strtoupper($key)]);
			}
		}

		return $output;
	}

	/**
	* Wrapper function for php number format
	* Displays scores in users local language format
	*/
	function number_format($num)
	{
		global $user;

		// This function will format the the passed number to be displayed by the arcade.
		// This will fix the problem that was happening with some games
		// using decimal numbers for scores.  It will only display decimal
		// places if necessary.

		// Anytime that a number is displayed in the arcade for any reason it should
		// go thru this function.  This includes portal blocks and such...

		// Lets see if the number has a decimal point
		$decimals = explode('.', $num);
		if (isset($decimals[1]))
		{
			// Ok so we have a decimal point remove all trailing zeroes and get the length
			$decimals = strlen(rtrim($decimals[1], '0'));
		}
		else
		{
			// No decimal point so set it to zero
			$decimals = 0;
		}

		return number_format($num, $decimals, $user->lang['SEPARATOR_DECIMAL'], $user->lang['SEPARATOR_THOUSANDS']);
	}

	/**
	* Wrapper function for phpbb3 get_username_string function
	* Points link to arcade stats page
	*/
	function get_username_string($mode, $user_id, $username, $user_colour)
	{
		global $phpEx;

        $phpbb_root_path = PHPBB3_ROOT_DIR;
		
		return get_username_string($mode, $user_id, $username, $user_colour, false, append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=stats'));

	}

	/**
	* Tries to make sure the time is set correctly in
	* the settings page
	*
	* We expect military time, for example 14:23
	* Value must be a hour between 1 and 23 and a minute between 0 and 59
	* these must be separated with a colon ':'
	*/
	function validate_time($value)
	{
		list($hour, $min) = preg_split('#:#m', $value);
		$hour = (int) $hour;
		$min = (int) $min;

		if (($hour < 1 && $hour > 23) || ($min < 0 && $min > 59))
		{
			return array();
		}
		else
		{
			return array(
				'hour'			=> $hour,
				'min'			=> $min,
			);
		}
	}

	/**
	* All-encompasing sync function
	*
	* Modes:
	* - category			Sync category data
	* - game			Sync game data
	* - rating			Sync rating data
	*/
	function sync($mode, $id = '')
	{
		global $db, $user;

		if ($id == '' && ($mode == 'rating' || $mode == 'game'))
		{
			trigger_error('ARCADE_SYNC_MODE_NOT_SUPPORTED');
		}

		switch($mode)
		{
			case 'category':
				$sql = 'SELECT cat_id
					FROM ' . ARCADE_CATS_TABLE;

				if ($id != '')
				{
					if (!is_array($id))
					{
						$id = array((int) $id);
						$sql .= ' WHERE ' . $db->sql_in_set('cat_id', $id);
					}
					else
					{
						$sql .= ' WHERE ' . $db->sql_in_set('cat_id', $id) . '
							GROUP BY cat_id';
					}
				}

				$cat_result = $db->sql_query($sql);

				while ($cat_row = $db->sql_fetchrow($cat_result))
				{
					$cat_id = $cat_row['cat_id'];

					$sql = 'SELECT game_installdate
						FROM ' . ARCADE_GAMES_TABLE . '
						WHERE cat_id = ' . $cat_id . '
						ORDER BY game_installdate DESC';
					$result = $db->sql_query_limit($sql, 1);
					$cat_last_game_installdate = $db->sql_fetchfield('game_installdate');
					$db->sql_freeresult($result);

					$sql = 'SELECT COUNT(*) AS cat_games
						FROM ' . ARCADE_GAMES_TABLE . '
						WHERE cat_id = ' . $cat_id;

					$result = $db->sql_query($sql);
					$cat_games = $db->sql_fetchfield('cat_games');
					$db->sql_freeresult($result);

					$sql_array = array(
						'SELECT'	=> 'SUM(s.total_plays) AS cat_plays',

						'FROM'		=> array(
							ARCADE_SCORES_TABLE	=> 's',
						),

						'LEFT_JOIN'	=> array(
							array(
								'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
								'ON'	=> 's.game_id = g.game_id'
							),
						),

						'WHERE'	=> 'g.cat_id = ' . $cat_id,
					);

					$sql = $db->sql_build_query('SELECT', $sql_array);
					$result = $db->sql_query($sql);
					$cat_plays = $db->sql_fetchfield('cat_plays');
					$db->sql_freeresult($result);

					$sql = 'UPDATE ' . ARCADE_CATS_TABLE  . '
						SET ' . $db->sql_build_array('UPDATE', array(
							'cat_games'						=> (int) $cat_games,
							'cat_plays'						=> (int) $cat_plays,
							'cat_last_game_installdate'		=> (int) $cat_last_game_installdate,
						)) . '
						WHERE cat_id = ' . (int) $cat_id;
					$db->sql_query($sql);
				}
				$db->sql_freeresult($cat_result);
			break;

			case 'game':
				if (!is_array($id))
				{
					$id = ($id) ? array((int) $id) : array();
				}

				$sql = 'SELECT SUM(total_plays) AS game_plays, game_id
					FROM ' . ARCADE_SCORES_TABLE . '
					WHERE ' . $db->sql_in_set('game_id', $id) . '
					GROUP BY game_id';

				$result = $db->sql_query($sql);

				$plays_id = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$plays_id[] = $row['game_id'];
					$sql = "UPDATE " . ARCADE_GAMES_TABLE . "
						SET game_plays = " . $row['game_plays'] . "
						WHERE game_id = " . $row['game_id'];
					$db->sql_query($sql);
				}
				$db->sql_freeresult($result);

				$no_plays = array();
				if (!empty($plays_id))
				{
					foreach ($id as $game_id)
					{
						if (!in_array($game_id, $plays_id))
						{
							$no_plays[] = $game_id;
						}
					}
				}
				else
				{
					$no_plays = $id;
				}

				if (!empty($no_plays))
				{
					$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
						SET game_plays = 0
						WHERE ' . $db->sql_in_set('game_id', $no_plays);
					$db->sql_query($sql);
				}
			break;

			case 'rating':
				if (!is_array($id))
				{
					$id = ($id) ? array((int) $id) : array();
				}


				$sql = 'SELECT game_id, COUNT(*) as game_votetotal, SUM(game_rating) as game_votesum
					FROM ' . ARCADE_RATING_TABLE . '
					WHERE ' . $db->sql_in_set('game_id', $id) . '
					GROUP BY game_id';

				$result = $db->sql_query($sql);

				$plays_id = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$plays_id[] = $row['game_id'];
					$returned_results = true;
					$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
						SET game_votetotal = ' . $row['game_votetotal'] . ',
							game_votesum = ' . $row['game_votesum'] . '
						WHERE game_id = ' . $row['game_id'];

					$db->sql_query($sql);
				}
				$db->sql_freeresult($result);

				$no_plays = array();
				if (!empty($plays_id))
				{
					foreach ($id as $game_id)
					{
						if (!in_array($game_id, $plays_id))
						{
							$no_plays[] = $game_id;
						}
					}
				}
				else
				{
					$no_plays = $id;
				}

				if (!empty($no_plays))
				{
					$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
						SET game_votetotal = 0, game_votesum = 0
						WHERE ' . $db->sql_in_set('game_id', $no_plays);
					$db->sql_query($sql);
				}
			break;

			default:
				trigger_error('NO_MODE');
			break;
		}
		return;
	}

	/**
	* Gets a total number of games based on the parameters it
	* was sent.
	*
	* $type can be set to fav, games or search
	*/
	function get_total($type = '', $id = 0)
	{
		$sql = null;
        
		global $db, $user;

		$type = strtolower($type);
		$sql_where = '';

		switch ($type)
		{
			case 'fav':
				if ($id)
				{
					$sql_array = array(
						'SELECT'	=> 'COUNT(f.game_id) as total',

						'FROM'		=> array(
							ARCADE_FAVS_TABLE	=> 'f',
						),

						'LEFT_JOIN'	=> array(
							array(
								'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
								'ON'	=> 'f.game_id = g.game_id'
							),
						),

						'WHERE'		=> 'f.user_id = ' . $id . ' AND ' . $db->sql_in_set('g.cat_id', $this->get_permissions('c_view'), false, true),
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);
				}
				else
				{
					trigger_error('ARCADE_NO_ID_ERROR');
				}
			break;

			case 'games':
				$sql_array = array(
					'SELECT'	=> 'COUNT(game_id) as total',

					'FROM'		=> array(
						ARCADE_GAMES_TABLE	=> 'g',
					),
				);

				if ($id)
				{
					$sql_array['WHERE'] = 'cat_id = ' . $id;
				}
				$sql = $db->sql_build_query('SELECT', $sql_array);
			break;

			case 'scores':

				if ($id)
				{
					$sql_array = array(
						'SELECT'	=> 'COUNT(score) as total',

						'FROM'		=> array(
							ARCADE_SCORES_TABLE	=> 's',
						),

						'LEFT_JOIN'	=> array(
							array(
								'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
								'ON'	=> 's.user_id = u.user_id'
							),
						),

						'WHERE'		=> 's.game_id = ' . $id,
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);
				}
				else
				{
					$sql_array = array(
						'SELECT'	=> 'g.game_id',

						'FROM'		=> array(
							ARCADE_SCORES_TABLE	=> 's',
						),

						'LEFT_JOIN'	=> array(
							array(
								'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
								'ON'	=> 'g.game_id = s.game_id'
							),
						),
					);

					$sql = $db->sql_build_query('SELECT_DISTINCT', $sql_array);
					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrowset($result);
					$db->sql_freeresult($result);

					return sizeof($row);
				}
			break;

			case 'search_newgames':
				if ($id)
				{
					// Return all the newest games
					$sql_array = array(
						'SELECT'	=> 'COUNT(g.game_id) as total',

						'FROM'		=> array(
							ARCADE_GAMES_TABLE	=> 'g',
						),

						'WHERE'		=> 'g.game_installdate >= ' . $id . '
											AND ' . $db->sql_in_set('g.cat_id', $this->get_permissions('c_view'), false, true),
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);
				}
				else
				{
					trigger_error('ARCADE_NO_ID_ERROR');
				}
			break;

			case 'search':
				if ($id)
				{
					$sql_array = array(
						'SELECT'	=> 'COUNT(g.game_id) as total',

						'FROM'		=> array(
							ARCADE_GAMES_TABLE	=> 'g',
						),

						'WHERE'		=> '(g.game_name_clean '. $db->sql_like_expression($id) . '
											OR LOWER(g.game_desc) ' . $db->sql_like_expression($id) . ')
											AND ' . $db->sql_in_set('g.cat_id', $this->get_permissions('c_view'), false, true),
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);
				}
				else
				{
					trigger_error('ARCADE_NO_ID_ERROR');
				}
			break;

			case 'download_stats':
				if ($id)
				{
					$sql_array = array(
						'SELECT'	=> 'COUNT(game_id) as total',

						'FROM'		=> array(
							ARCADE_DOWNLOAD_TABLE	=> 'd',
						),

						'WHERE'		=> 'user_id = ' . (int) $id,
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);
				}
				else
				{
					$sql_array = array(
						'SELECT'	=> 'user_id',

						'FROM'		=> array(
							ARCADE_DOWNLOAD_TABLE	=> 'd',
						),

						'GROUP_BY'		=> 'user_id',
					);
					$sql = $db->sql_build_query('SELECT', $sql_array);

					$result = $db->sql_query($sql);
					$row = $db->sql_fetchrowset($result);
					$db->sql_freeresult($result);

					return sizeof($row);
				}
			break;

			default:
				trigger_error('ARCADE_NO_TOTAL_TYPE_ERROR');
			break;
		}

		$result = $db->sql_query($sql);

		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		return $row['total'];
	}

	/**
	* This is never used for IBProV3 or IBPro arcadelib games because it will cause scoring errors with these types.
	* If a game is having scoring errors, try shutting this off for the specific game type.
	*/
	function get_protection($type)
	{
		$use_protection = false;
		switch($type)
		{
			case AMOD_GAME:
				$use_protection = ($this->config['protect_amod']) ? true : false;
			break;

			case IBPRO_GAME:
				$use_protection = ($this->config['protect_ibpro']) ? true : false;
			break;

			case V3ARCADE_GAME:
				$use_protection = ($this->config['protect_v3arcade']) ? true : false;
			break;

			default:
			break;
		}

		return $use_protection;
	}

	/**
	* Set the rating image for the game
	*/			
	function set_rating_image($votes, $sum, $avg_score)
	{
		global $user;

		$image = '';
		$rating_score = round($avg_score);

		if ($votes < 1)
		{
			$votes = $user->lang['ARCADE_VOTES_NO'];
		}
		else
		{
			$votes = ($votes == 1 ) ? sprintf($user->lang['ARCADE_VOTE'], $votes, $rating_score) : sprintf($user->lang['ARCADE_VOTES'], $votes, $rating_score);
		}
		
		for ($i = 1; $i <= $rating_score; $i++)
		{
			$image .= '<img src="./' . $this->config['image_path'] . 'star1.gif" title="' . $votes . '" alt="' . $votes . '" />';
		}
		
		$blank_stars = ( 5 - $rating_score);
		for ($i = 1; $i <= $blank_stars; $i++)
		{
			$image .= '<img src="./' . $this->config['image_path'] . 'star2.gif" title="' . $votes . '" alt="' . $votes . '" />';
		}

		return $image;
	}

	/**
	* Set the favorites image for the game
	*/
	function set_fav_image($game_data, $game_id, $cat_id)
	{
		$locate = null;
        
		global $user, $phpEx, $start, $term;
		
		$phpbb_root_path = PHPBB3_ROOT_DIR;

		if (!$user->data['is_registered'] || $user->data['is_bot'])
		{
			return;
		}
		else
		{
			$start = ($start < 0) ? 0 : $start;
			if ($cat_id > 0)
			{
				$locate = '&amp;c=' . $cat_id;
			}
			else if ($cat_id == ARCADE_FAV_ID)
			{
				$locate = '&amp;page=fav';
			}
			else if ($cat_id == ARCADE_SEARCH_ID)
			{
				if (empty($term))
				{
					$locate = '&amp;page=search&amp;search_id=newgames';
				}
				else
				{
					$locate = '&amp;page=search&amp;term=' . urlencode($term);
				}
			}
			else if ($cat_id == ARCADE_PLAY_ID)
			{
				$locate = '&amp;page=play';
			}

			$image = '<a href="' . append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=addfav$locate&amp;g=$game_id&amp;start=$start") . '"><img src="./' . $this->config['image_path'] . 'favorite.gif" border="0" title="'.$user->lang['ARCADE_ADD_FAV'].'" alt="'.$user->lang['ARCADE_ADD_FAV'].'" style="padding-top: 4px;" /></a>';

			if (isset($game_data[$game_id]))
			{
				$image = '<a href="' . append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=delfav$locate&amp;g=$game_id&amp;start=$start") . '"><img src="./' . $this->config['image_path'] . 'remove_favorite.gif" border="0" title="'.$user->lang['ARCADE_REMOVE_FAV'].'" alt="'.$user->lang['ARCADE_REMOVE_FAV'].'" style="padding-top: 4px;" /></a>';
			}

			return $image;
		}
	}

	/**
	* Set the rating select dropdown
	*/
	function get_rating_select($selected)
	{
		global $user;

		$rating_array = array(
			array(
				'value' => 0,
				'text'	=> $user->lang['ARCADE_SELECT_RATING'],
			),
			array(
				'value' => 1,
				'text'	=> '1 - ' . $user->lang['ARCADE_RATING_BAD'],
			),
			array(
				'value' => 2,
				'text'	=> '2',
			),
			array(
				'value' => 3,
				'text'	=> '3 - ' . $user->lang['ARCADE_RATING_AVG'],
			),
			array(
				'value' => 4,
				'text'	=> '4',
			),
			array(
				'value' => 5,
				'text'	=> '5 - ' . $user->lang['ARCADE_RATING_GREAT'],
			),
		);

		$rating_select = '<select name="game_rating" id="game_rating">';
		foreach ($rating_array as $option)
		{
			$rating_select .= '<option value="' . $option['value'] . '"' . (($selected == $option['value']) ? ' selected="selected"' : '') . '>' . $option['text'] . '</option>';
		}
		$rating_select .= '</select>';

		return $rating_select;
	}

	/**
	* This function checks to make sure the game type is the expected type
	* and that the user and game ids exist in the sessions table.
	* It then returns the needed information in an array.
	*/
	function prepare_score($game_sid, $game_scorevar, $game_type)
	{
		global $db, $user, $score;

		if (empty($game_scorevar))
		{
			trigger_error('ARCADE_SCOREVAR_ERROR');
		}

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name, g.game_highscore, g.game_highuser, g.game_highdate, g.game_scoretype, g.game_type, g.game_cost, g.game_reward, g.game_jackpot, g.game_use_jackpot, g.cat_id, s.session_id, s.start_time, u.username, c.cat_name, c.cat_desc, c.cat_desc_uid, c.cat_desc_bitfield, c.cat_desc_options, c.parent_id, c.left_id, c.right_id, c.cat_parents, c.cat_cost, c.cat_reward, c.cat_use_jackpot',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
					'ON'	=> 'g.cat_id = c.cat_id'
				),
				array(
					'FROM'	=> array(ARCADE_PHPBB3_SESSIONS_TABLE => 's'),
					'ON'	=> 'g.game_id = s.game_id'
				),
				array(
					'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
					'ON'	=> 'g.game_highuser = u.user_id'
				),
			),
		);

		if (is_int($game_scorevar))
		{
			$sql_array['WHERE']	= 'g.game_id = ' . (int) $game_scorevar . '
					AND s.user_id = ' . $user->data['user_id'];
		}
		else
		{
			$sql_array['WHERE']	= "g.game_scorevar = '$game_scorevar'
					AND s.user_id = " . $user->data['user_id'];
		}

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);

		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$row)
		{
			trigger_error('ARCADE_BACK_BUTTON_ERROR');
		}

		$row['current_time'] = time();
		$row['total_time'] = $row['current_time'] - $row['start_time'];

		// Remove old entries from Arcade Sessions Table
		$sql = 'DELETE FROM ' . ARCADE_PHPBB3_SESSIONS_TABLE . '
			WHERE start_time < ' . (time() - 72000 ) . '
				OR (user_id = ' . $user->data['user_id'] . '
			AND game_id = ' . (int) $row['game_id'] . ')';

		$db->sql_query($sql);

		// This will check somethings to try and verify the integrity of the score
		// If something is in question it will add an entry to the error table which
		// the admin will be able to view in the ACP.  There they can make a decision
		// what to do...

		$game_type_error = false;
		if (!($row['game_type'] == IBPRO_ARCADELIB_GAME && $game_type == IBPRO_GAME) && ($row['game_type'] != $game_type))
		{
			$game_type_error = true;
		}

		if (($row['session_id'] != $game_sid) || $game_type_error || ($row['total_time'] <= 0))
		{
			$error_type = ARCADE_ERROR_UNKNOWN;
			if ($row['session_id'] != $game_sid)
			{
				$error_type = ARCADE_ERROR_SESSION;
			}
			else if ($row['game_type'] != $game_type)
			{
				$error_type = ARCADE_ERROR_GAMETYPE;
			}
			else if ($row['total_time'] <= 0)
			{
				$error_type = ARCADE_ERROR_TIME;
			}

			$sql_ary = array(
				'user_id'				=> $user->data['user_id'],
				'game_id'				=> $row['game_id'],
				'score'					=> $score,
				'error_date'			=> time(),
				'error_type'			=> $error_type,
				'game_type'				=> $row['game_type'],
				'submitted_game_type'	=> $game_type,
				'played_time'			=> $row['total_time'],
				'error_ip'				=> $user->ip,
			);

			$sql = 'INSERT INTO ' . ARCADE_ERRORS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
			$db->sql_query($sql);
		}

		// This is the only one we will stop submission on.  This is because there is no other
		// cause for this to happen other than cheating or admin set game type wrong.  Either
		// way it needs to be fixed.  The others could have a valid reason.
		if ($game_type_error)
		{
			trigger_error('ARCADE_TYPE_ERROR');
		}

		return $row;
	}

	/**
	* Replace the placeholder inside the private message
	*/
	function prepare_pm(&$text, $score_data)
	{
		global $user;

		// Used in conjuction with the send_pm function.  This is
		// used to replace the place holders with the data...
		$text = str_replace('[game_id]', $score_data['game_id'], $text);
		$text = str_replace('[game_name]', $score_data['game_name'], $text);
		$text = str_replace('[old_user_id]', $score_data['old_user_id'], $text);
		$text = str_replace('[old_username]', $score_data['old_username'], $text);
		$text = str_replace('[new_user_id]', $user->data['user_id'], $text);
		$text = str_replace('[new_username]', $user->data['username'], $text);
		$text = str_replace('[old_score]', $score_data['old_score'], $text);
		$text = str_replace('[new_score]', $score_data['new_score'], $text);

		$game_link = '[url=' . generate_board_url() . '/arcade.php?mode=play&g=' . $score_data['game_id'] . ']' . $score_data['game_name'] . '[/url]';
		$username = ($user->data['user_colour']) ? '[color=#' .  $user->data['user_colour'] . ']' . $user->data['username'] . '[/color]' : $user->data['username'];
		$user_link = '[url=' . generate_board_url() . '/arcade.php?mode=stats&u=' . $user->data['user_id'] . ']' . $username . '[/url]';
		$old_user_link = '[url=' . generate_board_url() . '/arcade.php?mode=stats&u=' . $score_data['old_user_id'] . ']' . $user->lang['ARCADE_HERE'] . '[/url]';

		$text = str_replace('[game_link]', $game_link, $text);
		$text = str_replace('[user_link]', $user_link, $text);
		$text = str_replace('[old_user_link]', $old_user_link, $text);

		return;
	}

	/**
	* Send a private message with the 
	* message set in the acp
	*/
	function send_pm($subject, $message, $score_data)
	{
		$address_list = [];
        
		global $user, $phpEx;

		if (!$user->data['is_registered'])
		{
			return;
		}

		include(PHPBB3_INCLUDE_DIR . 'functions_privmsgs.' . $phpEx);
		include(PHPBB3_INCLUDE_DIR . 'message_parser.' . $phpEx);

		$message_parser = new parse_message();

		$this->prepare_pm($subject, $score_data);
		$this->prepare_pm($message, $score_data);

		$subject = utf8_normalize_nfc($subject);
		$message_parser->message = utf8_normalize_nfc($message);
		$address_list['u'][$score_data['old_user_id']] = 'to';

		$message_parser->parse(true, true, true);

		$pm_data = array(
					'msg_id'				=> 0,
					'from_user_id'			=> $user->data['user_id'],
					'from_user_ip'			=> $user->data['user_ip'],
					'from_username'			=> $user->data['username'],
					'reply_from_root_level'	=> 0,
					'reply_from_msg_id'		=> 0,
					'icon_id'				=> 0,
					'enable_sig'			=> true,
					'enable_bbcode'			=> true,
					'enable_smilies'		=> true,
					'enable_urls'			=> true,
					'bbcode_bitfield'		=> $message_parser->bbcode_bitfield,
					'bbcode_uid'			=> $message_parser->bbcode_uid,
					'message'				=> $message_parser->message,
					'attachment_data'		=> $message_parser->attachment_data,
					'filename_data'			=> $message_parser->filename_data,
					'address_list'			=> $address_list
		);
		unset($message_parser);
		submit_pm('post', $subject, $pm_data, true);

		return;
	}

	/**
	* Limits access to play games based on parameters set in the ACP
	*/
	function limit_play($cat_id)
	{
		global $user, $db, $auth_arcade;

		if ($auth_arcade->acl_get('c_ignorecontrol', $cat_id))
		{
			return;
		}

		if ($this->config['limit_play'] == LIMIT_PLAY_TYPE_POSTS || $this->config['limit_play'] == LIMIT_PLAY_TYPE_DAYS || $this->config['limit_play'] == LIMIT_PLAY_TYPE_BOTH)
		{
			$total_posts = $this->config['limit_play_total_posts'];
			$days = $this->config['limit_play_days'];
			$posts = $this->config['limit_play_posts'];
			$current_time = time();
			$old_time = $current_time - (60 * 60 * 24 * $days);
			$error = array();

			if ($this->config['limit_play'] == LIMIT_PLAY_TYPE_POSTS || $this->config['limit_play'] == LIMIT_PLAY_TYPE_BOTH)
			{
				$sql = 'SELECT COUNT(post_id) as total_posts
						FROM ' . PHPBB3_POSTS_TABLE . '
						WHERE poster_id = ' . $user->data['user_id'] . '
							AND post_postcount > 0';

				$result = $db->sql_query($sql);
				$actual_total_posts = $db->sql_fetchfield('total_posts');
				$db->sql_freeresult($result);

				if ($actual_total_posts < $total_posts)
				{
					$error[] = sprintf($user->lang['ARCADE_LIMIT_PLAY_TYPE_POSTS'], $total_posts,  $total_posts - $actual_total_posts);
				}
			}

			if  ($this->config['limit_play'] == LIMIT_PLAY_TYPE_DAYS || $this->config['limit_play'] == LIMIT_PLAY_TYPE_BOTH)
			{
				$sql = 'SELECT COUNT(post_id) as total_posts
						FROM ' . PHPBB3_POSTS_TABLE . '
						WHERE poster_id = ' . $user->data['user_id'] . '
							AND post_time
								BETWEEN ' . $old_time . ' AND ' . $current_time . '
							AND post_postcount > 0';

				$result = $db->sql_query($sql);
				$actual_posts_per_day = $db->sql_fetchfield('total_posts');
				$db->sql_freeresult($result);

				if ($actual_posts_per_day < $posts)
				{
					$error[] = sprintf($user->lang['ARCADE_LIMIT_PLAY_TYPE_DAYS'], $posts, $days, $posts - $actual_posts_per_day, $days);
				}
			}

			if (sizeof($error))
			{
				trigger_error(implode('<br /><br />', $error));
			}

		}
	}

	/**
	* Function used to quick show the contents of variables
	*/
	function debug($exit = false, $var = false)
	{
		if ($var)
		{
			echo '<pre>';
			var_export($var);
			echo '</pre>';
		}
		else
		{
			$debug = array(
				'POST'		=> $_POST,
				'GET'		=> $_GET,
				'REQUEST'	=> $_REQUEST,
				'COOKIE'	=> $_COOKIE,
				'SERVER'	=> $_SERVER,
			);
		

			foreach ($debug as $key => $value)
			{
				echo '<p><b>' . $key . '</b>';
				echo '<pre>';
				var_export($value);
				echo '</pre>';
				echo '</p>';				
			}
		}

		if ($exit)
		{
			exit;
		}
	}

	/**
	* Set the headers to notify the browser not to cache
	* If this isn't here the IBPro v3 games will not work
	*/
	function set_header_no_cache()
	{
		header("HTTP/1.0 200 OK");
		header("HTTP/1.1 200 OK");
		header("Content-type: text/html");
		header("Cache-Control: no-store,no-cache, must-revalidate, max-age=0");
		header("Expires: Mon, 27 Jul 1981 05:00:00 GMT");
		header("pragma: no-cache");
	}

	/**
	* Create arcade session in db
	*/
	function create_session($game_id, $game_type)
	{
		global $db, $user;

		// Delete old and/or duplicate arcade sessions...
		$sql = 'DELETE FROM ' . ARCADE_PHPBB3_SESSIONS_TABLE . '
				WHERE start_time < ' . (time() - 72000 ) . '
					OR (user_id = ' . $user->data['user_id'] . '
						AND game_id = ' . (int) $game_id . ')';

		if ($user->data['user_id'] != ANONYMOUS)
		{
			$sql .= ' OR user_id = ' . $user->data['user_id'];
		}
		$db->sql_query($sql);

		$game_sid = md5(uniqid($user->ip));

		$randomgid1 = random_int(1, 200);
		$randomgid2 = random_int(1, 200);
		$gidencoded = $game_id * $randomgid1 ^ $randomgid2;

		$sql_ary = array(
			'session_id'		=> $game_sid,
			'game_id'			=> (int) $game_id,
			'user_id'			=> (int) $user->data['user_id'],
			'game_type'			=> $game_type,
			'randgid1'			=> $randomgid1,
			'randgid2'			=> $randomgid2,
			'start_time'		=> time(),
		);

		$sql = 'INSERT INTO ' . ARCADE_PHPBB3_SESSIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);

		$data = array(
			'game_sid' 			=> $game_sid,
			'gidencoded'		=> $gidencoded,
		);

		return $data;
	}

	/**
	* Find available compress methods on the server
	*/
	function compress_methods($remove_dot = false)
	{
		if ($remove_dot)
		{
			$methods = array('tar');
			$available_methods = array('gz' => 'zlib', 'bz2' => 'bz2', 'zip' => 'zlib');
		}
		else
		{
			$methods = array('.tar');
			$available_methods = array('.tar.gz' => 'zlib', '.tar.bz2' => 'bz2', '.zip' => 'zlib');
		}

		foreach ($available_methods as $type => $module)
		{
			if (!extension_loaded($module))
			{
				continue;
			}
			$methods[] = $type;
		}

		return $methods;
	}

	/**
	* Cache and return the latest highscores based on viewing users permission
	*/
	function obtain_latest_highscores($limit)
	{
		global $db;

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name, g.game_highuser, g.game_highscore, g.game_highdate, g.cat_id, u.username, u.user_colour',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
					'ON'	=> 'g.game_highuser = u.user_id'
				)
			),

			'WHERE'		=> 'g.game_highuser > 0 AND g.game_highdate > 0 AND ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true),

			'ORDER_BY'	=> 'g.game_highdate DESC'
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query_limit($sql, $limit, 0, $this->config['cache_time'] * 3600);

		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		return $row;
	}

	/**
	* Cache and return the newest games based on viewing users permission
	*/
	function obtain_newest_games($limit)
	{
		global $db, $arcade;

		$sql = 'SELECT game_id, game_image, game_name, game_scorevar, game_installdate, cat_id
			FROM ' . ARCADE_GAMES_TABLE . '
			WHERE ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true) . '
			ORDER BY game_installdate DESC';

		$result = $db->sql_query_limit($sql, $limit, 0, $this->config['cache_time'] * 3600);

		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		return $row;
	}

	/**
	* Cache and return the most/least downloaded games based on viewing users permission
	*/
	function obtain_downloaded_games($type, $limit)
	{
		$order = null;
        
		global $db, $arcade;

		$type = strtolower($type);
		switch ($type)
		{
			case 'most':
				$order = 'DESC';
			break;

			case 'least':
				$order = 'ASC';
			break;

			default:
				trigger_error('ARCADE_NO_ORDER_TYPE_ERROR');
			break;
		}

		$sql = 'SELECT game_id, game_image, game_name, game_scorevar, game_installdate, game_download_total, cat_id
			FROM ' . ARCADE_GAMES_TABLE . '
			WHERE ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true) . '
			ORDER BY game_download_total ' . $order;

		$result = $db->sql_query_limit($sql, $limit, 0, $this->config['cache_time'] * 3600);

		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		return $row;
	}

	/**
	* Cache and return the most/least popular games based on viewing users permission
	*/
	function obtain_popular_games($type, $limit)
	{
		$order = null;
        
		global $db, $arcade;

		$type = strtolower($type);
		switch ($type)
		{
			case 'most':
				$order = 'DESC';
			break;

			case 'least':
				$order = 'ASC';
			break;

			default:
				trigger_error('ARCADE_NO_ORDER_TYPE_ERROR');
			break;
		}

		$sql = 'SELECT game_id, game_name, game_image, game_plays, game_scorevar, cat_id
			FROM ' . ARCADE_GAMES_TABLE . '
			WHERE ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true) . '
				AND game_plays > 0
			ORDER BY game_plays ' . $order;

		$result = $db->sql_query_limit($sql, $limit, 0, $this->config['cache_time'] * 3600);

		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		return $row;
	}

	/**
	* Cache and return longest held highscore based on viewing users permission
	*/
	function obtain_longest_highscores($limit)
	{
		global $db, $arcade;

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name, g.game_highscore, g.game_highdate, g.cat_id, u.username, u.user_id, u.user_colour',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
					'ON'	=> 'g.game_highuser = u.user_id'
				)
			),

			'WHERE'		=> 'g.game_highscore > 0 AND ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true),

			'ORDER_BY'	=> 'g.game_highdate ASC'
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query_limit($sql, $limit, 0, $this->config['cache_time'] * 3600);

		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		return $row;
	}

	/**
	* Cache and return the games based on viewing users permission
	*/
	function obtain_games()
	{
		global $db;

		$sql = 'SELECT game_id, game_name, game_name_clean, game_swf, game_scorevar, cat_id
			FROM ' . ARCADE_GAMES_TABLE . '
			WHERE ' . $db->sql_in_set('cat_id', $this->get_permissions('c_view'), false, true) . '
			ORDER BY game_name_clean ASC';
		$result = $db->sql_query($sql, $this->config['cache_time'] * 3600);

		$games = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$games[$row['game_id']] = array(
				'game_id'		=> $row['game_id'],
				'game_name'		=> $row['game_name'],
				'game_swf'		=> $row['game_swf'],
				'game_scorevar'	=> $row['game_scorevar'],
				'cat_id'		=> $row['cat_id'],
			);
		}
		$db->sql_freeresult($result);

		return $games;
	}

	/**
	* Initialize the points system integration
	*/
	function init_points()
	{
		global $phpEx;

		$this->points = array(
			'installed' 	=> false,
			'show' 			=> false,
			'type' 			=> false,
			'name'			=> '',
			'total'			=> 0,
		);

		if (file_exists(PHPBB3_ROOT_DIR . 'mods/functions_points.' . $phpEx))
		{
			if (!function_exists('add_points'))
			{
				include(PHPBB3_ROOT_DIR . 'mods/functions_points.' . $phpEx);
			}

			if (!function_exists('set_bank'))
			{
				$this->points['type'] = SIMPLE_POINTS_SYSTEM;
				define('USER_POINTS', 'user_points');
			}
			else
			{
				$this->points['type'] = POINTS_SYSTEM;
			}

			$this->points['installed'] = true;
		}
		else if (file_exists(PHPBB3_ROOT_DIR . 'mods/cash/cash_class.' . $phpEx))
		{
			$this->points['type'] = CASH_MOD;
			$this->points['installed'] = true;
		}

		$this->points['show'] = ($this->points['installed'] && $this->config['use_points']) ? true : false;

		if ($this->points['show'])
		{
			$points_array = $this->get_points();
			$this->points['name'] = $points_array['name'];
			$this->points['total'] = $points_array['total'];
		}
	}

	/**
	* Get points total and points name for a specified user
	* If no user is specified get the data for the current user
	*/
	function get_points($user_id = false)
	{
		global $user, $db, $config;

		$return = array(
			'total'	=> 0,
			'name'	=> '',
		);

		if ($this->points['type'] == CASH_MOD)
		{
			$user_id = ($user_id) ? $user_id : $user->data['user_id'];

			$sql = $db->sql_build_query('SELECT', array(
				'SELECT'	=> 'c.cash_name, ca.cash_amt',
				'FROM'		=> array(
					CASH_TABLE			=> 'c',
					CASH_AMOUNT_TABLE	=> 'ca',
				),
				'WHERE'		=> 'ca.user_id = ' . $user_id . ' AND c.cash_id = ' . $this->config['cm_currency_id'] . ' AND ca.cash_id = c.cash_id',
			));

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$return = array(
				'total'	=> $row['cash_amt'],
				'name'	=> $row['cash_name'],
			);

		}
		else
		{
			if ($this->points['type'] == SIMPLE_POINTS_SYSTEM)
			{
				$return['name'] = $config['points_name'];
			}
			else
			{
				$sql = 'SELECT points_name
					FROM ' . POINTS_PHPBB3_CONFIG_TABLE;
				$result = $db->sql_query($sql);
				$return['name'] = $db->sql_fetchfield('points_name');
				$db->sql_freeresult($result);
			}

			if (!$user_id)
			{
				$return['total'] = $user->data[USER_POINTS];
			}
			else
			{
				$sql = 'SELECT ' . USER_POINTS . '
						FROM ' . PHPBB3_USERS_TABLE . '
					WHERE user_id = ' . $user_id;

				$result = $db->sql_query($sql);
				$return['total'] = $db->sql_fetchfield(USER_POINTS);
				$db->sql_freeresult($result);
			}
		}

		return $return;
	}

	/**
	* Function to add or subtact points from a user
	*/
	function set_points($mode, $user_id, $amount)
	{
		global $user, $db;

		// Return true if the amount is 0 or free (-1)
		if ($amount <= 0)
		{
			return true;
		}

		$result = false;
		$mode = strtolower($mode);
		switch ($mode)
		{
			case 'add':
				if ($this->points['type'] == CASH_MOD)
				{
					global $cash;
					$result = $cash->give_cash($user_id, $amount, $this->config['cm_currency_id']);
				}
				else
				{
					$sql = 'UPDATE ' . PHPBB3_USERS_TABLE . '
						SET ' . USER_POINTS . ' = ' . USER_POINTS . ' + ' . $amount . '
						WHERE user_id = ' . $user_id;
					$db->sql_query($sql);

					$result = true;
				}

			break;

			case 'subtract':
				if ($this->points['type'] == CASH_MOD)
				{
					global $cash;
					$result = $cash->take_cash($user_id, $amount, $this->config['cm_currency_id']);

				}
				else
				{
					// The user does not have enough points
					if ($user->data[USER_POINTS] < $amount)
					{
						$result = false;
					}
					else
					{
						$sql = 'UPDATE ' . PHPBB3_USERS_TABLE . '
							SET ' . USER_POINTS . ' = ' . USER_POINTS . ' - ' . $amount . '
							WHERE user_id = ' . $user_id;
						$db->sql_query($sql);

						$result = true;
					}
				}

			break;

			default:
			break;
		}

		// If setting points was successful, update the users current total for display as well
		if ($result && $user->data['user_id'] == $user_id)
		{
			if ($mode == 'add')
			{
				$this->points['total'] = $this->points['total'] + $amount;
			}
			else
			{
				$this->points['total'] = $this->points['total'] - $amount;
			}
		}

		return $result;
	}

	/**
	* Return cost infomation for a game
	*/
	function get_cost($data)
	{
		$cost = 0;
		$game_cost = (float) $data['game_cost'];
		$cat_cost = (float) $data['cat_cost'];

		if (!empty($game_cost))
		{
			$cost = $game_cost;
		}
		else if (!empty($cat_cost))
		{
			$cost = $cat_cost;
		}
		else
		{
			$cost = (float) $this->config['game_cost'];
		}

		return (float) $cost;
	}

	/**
	* Return reward infomation for a game
	*/
	function get_reward($data)
	{
		global $db;

		$reward = 0;
		if ($this->use_jackpot($data))
		{
			$reward = (float) $data['game_jackpot'];
		}
		else
		{
			$game_reward = (float) $data['game_reward'];
			$cat_reward = (float) $data['cat_reward'];

			if (!empty($game_reward))
			{
				$reward = $game_reward;
			}
			else if (!empty($cat_reward))
			{
				$reward = $cat_reward;
			}
			else
			{
				$reward = (float) $this->config['game_reward'];
			}
		}

		return (float) $reward;
	}

	/**
	* Find out if the game should be using the jackpot setting
	*/
	function use_jackpot($data)
	{
		$result = false;

		if (!empty($data['game_use_jackpot']))
		{
			$result = true;
		}
		else if (!empty($data['cat_use_jackpot']))
		{
			$result = true;
		}
		else
		{
			$result = $this->config['use_jackpot'];
		}

		return $result;
	}

	/**
	* Function to add or clear jackpot
	* $mode can be 'add' or 'clear'
	*/
	function set_jackpot($mode, $data)
	{
		global $db;

		$mode = strtolower($mode);
		switch ($mode)
		{
			case 'add':
				$cost = $this->get_cost($data);

				// Return if the amount is 0 or free (-1)
				if ($cost <= 0)
				{
					return false;
				}

				// Make sure jackpot is not less than the minimum
				$jackpot = ($data['game_jackpot'] < $this->config['jackpot_minimum']) ? $this->config['jackpot_minimum'] : $data['game_jackpot'];
				$jackpot += $cost;

				if (($this->config['jackpot_limit'] && $jackpot < $this->config['jackpot_limit']) || !$this->config['jackpot_limit'])
				{
					$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
						SET game_jackpot = ' . $jackpot . '
						WHERE game_id = ' . $data['game_id'];
					$db->sql_query($sql);
				}

				return $jackpot;
			break;

			case 'clear':
				$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
					SET game_jackpot = ' . $this->config['jackpot_minimum'] . '
					WHERE game_id = ' . $data['game_id'];
				$db->sql_query($sql);
			break;

			default:
			break;
		}
		return false;
	}
}

?>
