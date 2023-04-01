<?php
/**
*
* @package acm
* @version $Id: arcade_cache.php 592 2008-11-29 02:44:05Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
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
* Class for grabbing/handling cached entries, extends cache.php
* @package acm
*/
class arcade_cache extends cache
{
	/**
	* Obtain arcade config
	*/
	function obtain_arcade_config()
	{
		if (($config = $this->get('_arcade')) === false)
		{
			global $db;

			// Arcade Config
			$sql = 'SELECT *
				FROM ' . ARCADE_CONFIG_TABLE;
			$result = $db->sql_query($sql);

			$config = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$config[$row['config_name']] = $row['config_value'];
			}
			$db->sql_freeresult($result);

			$this->put('_arcade', $config);
		}

		return $config;
	}

	/**
	* Obtain arcade games
	*/
	function obtain_arcade_all_games()
	{
		if (($games = $this->get('_arcade_all_games')) === false)
		{
			global $db;

			$sql = 'SELECT game_id, game_name, game_name_clean, game_swf, game_scorevar, game_filesize, cat_id
				FROM ' . ARCADE_GAMES_TABLE . '
				ORDER BY game_name_clean ASC';
			$result = $db->sql_query($sql);

			$games = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$games[$row['game_id']] = array(
					'game_id'		=> $row['game_id'],
					'game_name'		=> $row['game_name'],
					'game_swf'		=> $row['game_swf'],
					'game_scorevar'	=> $row['game_scorevar'],
					'game_filesize'	=> $row['game_filesize'],
					'cat_id'		=> $row['cat_id'],
				);
			}
			$db->sql_freeresult($result);

			$this->put('_arcade_all_games', $games);
		}

		return $games;
	}

	/**
	* Obtain arcade cats
	*/
	function obtain_arcade_cats()
	{
		if (($cats = $this->get('_arcade_cats')) === false)
		{
			global $db;

			$sql = 'SELECT  cat_id, cat_name, cat_style, cat_status, cat_link, cat_type, cat_download, cat_password, cat_rules, cat_rules_link, parent_id, cat_parents, left_id, right_id, cat_desc, cat_desc_options, cat_desc_uid, cat_desc_bitfield, cat_games_per_page
				FROM ' . ARCADE_CATS_TABLE . '
				ORDER BY cat_id ASC';
			$result = $db->sql_query($sql);

			$cats = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$cats[$row['cat_id']] = array(
					'cat_id'				=> $row['cat_id'],
					'cat_name'				=> $row['cat_name'],
					'cat_style'				=> $row['cat_style'],
					'cat_status'			=> $row['cat_status'],
					'cat_link'				=> $row['cat_link'],
					'cat_type'				=> $row['cat_type'],
					'cat_download'			=> $row['cat_download'],
					'cat_password'			=> $row['cat_password'],
					'cat_rules'				=> $row['cat_rules'],
					'cat_rules_link'		=> $row['cat_rules_link'],
					'parent_id'				=> $row['parent_id'],
					'cat_parents'			=> $row['cat_parents'],
					'left_id'				=> $row['left_id'],
					'right_id'				=> $row['right_id'],
					'cat_desc'				=> $row['cat_desc'],
					'cat_desc_options'		=> $row['cat_desc_options'],
					'cat_desc_uid'			=> $row['cat_desc_uid'], 
					'cat_desc_bitfield'		=> $row['cat_desc_bitfield'], 
					'cat_games_per_page'	=> $row['cat_games_per_page'],
				);
			}
			$db->sql_freeresult($result);

			$this->put('_arcade_cats', $cats);
		}

		return $cats;
	}

	/**
	* Obtain arcade users
	*/
	function obtain_arcade_users()
	{
		if (($row = $this->get('_arcade_users')) === false)
		{
			global $db;

			// This is used to allow the user to see every user in a drop
			// so they can select one to see his/her scores...
			$sql_array = array(
				'SELECT'	=> 'u.user_id, u.username, u.username_clean',

				'FROM'		=> array(
					ARCADE_SCORES_TABLE	=> 's',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(USERS_TABLE => 'u'),
						'ON'	=> 's.user_id = u.user_id'
					)
				),

				'ORDER_BY' 	=> 'u.username_clean ASC',
			);

			$sql = $db->sql_build_query('SELECT_DISTINCT', $sql_array);
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);

			$this->put('_arcade_users', $row);
		}

		return $row;
	}

	function obtain_arcade_leaders($limit)
	{
		if (($row = $this->get('_arcade_leaders')) === false)
		{
			global $db;

			$sql_array = array(
				'SELECT'	=> 'COUNT(g.game_id) AS total_wins, u.user_id, u.username, u.user_colour, u.user_avatar, u.user_avatar_type',

				'FROM'		=> array(
					ARCADE_GAMES_TABLE	=> 'g',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(USERS_TABLE => 'u'),
						'ON'	=> 'g.game_highuser = u.user_id'
					),
				),

				'WHERE'		=> 'g.game_highuser <> 0',

				'GROUP_BY'	=> 'u.user_id, u.username, u.user_colour, u.user_avatar, u.user_avatar_type',

				'ORDER_BY'	=> 'total_wins DESC',
			);

			$sql = $db->sql_build_query('SELECT', $sql_array);
			$result = $db->sql_query_limit($sql, $limit);
			$row = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);

			$this->put('_arcade_leaders', $row);
		}
		return $row;
	}

	function obtain_arcade_leaders_all()
	{
		if (($row = $this->get('_arcade_leaders_all')) === false)
		{
			global $db;

			$highscore_data = array();
			$sql_array = array(
				'SELECT'	=> 'u.user_id, COUNT(g.game_id) AS total_wins',

				'FROM'		=> array(
					ARCADE_GAMES_TABLE	=> 'g',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(USERS_TABLE => 'u'),
						'ON'	=> 'g.game_highuser = u.user_id'
					),
				),

				'WHERE'		=> 'g.game_highuser <> 0',

				'GROUP_BY'	=> 'u.user_id',

				'ORDER_BY'	=> 'total_wins DESC',
			);

			$sql = $db->sql_build_query('SELECT', $sql_array);
			$result = $db->sql_query($sql);

			while ($highscore_data = $db->sql_fetchrow($result))
			{
				$row[$highscore_data['user_id']] = $highscore_data['total_wins'];
			}
			$db->sql_freeresult($result);

			$this->put('_arcade_leaders_all', $row);
		}
		return $row;
	}

	/**
	* Obtain arcade total games played and time spent playing
	*/
	function obtain_arcade_totals()
	{
		if (($row = $this->get('_arcade_totals')) === false)
		{
			global $db;

			$sql = 'SELECT COUNT(game_id) AS scores, SUM(total_plays) AS games_played, SUM(total_time) AS games_time
				FROM ' . ARCADE_SCORES_TABLE;
			$result = $db->sql_query($sql);

			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$sql = 'SELECT SUM(total) as downloads
				FROM ' . ARCADE_DOWNLOAD_TABLE;
			$result = $db->sql_query($sql);
			$row['downloads'] = $db->sql_fetchfield('downloads');
			$db->sql_freeresult($result);

			$this->put('_arcade_totals', $row);
		}

		return $row;
	}

	/**
	* Obtain arcade config
	*/
	function obtain_arcade_recent_sites($download_url)
	{
		if (($row = $this->get('_arcade_recent_sites')) === false)
		{
			$row[] = $download_url;
			$this->put('_arcade_recent_sites', array_filter($row));
		}

		if ($download_url != '')
		{
			$add_site = true;
			foreach ($row as $site)
			{
				if ($site == $download_url)
				{
					$add_site = false;
				}
			}

			if ($add_site)
			{
				$row[] = $download_url;
				$this->put('_arcade_recent_sites', array_filter($row));
			}
		}

		return array_filter($row);
	}
}

?>