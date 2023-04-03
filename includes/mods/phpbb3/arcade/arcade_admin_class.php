<?php
/**
*
* @package arcade
* @version $Id: arcade_admin_class.php 617 2008-12-02 22:09:12Z jrsweets $
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
* Class for handling arcade
* @package arcade
*/
class arcade_admin extends arcade
{
	/**
	* Set values for a game...
	*/
	function set_game_data($game_id, $config_name, $config_value, $cat_id = false, $old_cat_id = false, $game_scoretype = false, $old_game_scoretype = false)
	{
		global $db;

		// Turn the listing of extra files back into an array and then
		// store it in the db...
		if ($config_name  == 'game_files')
		{
			if ($config_value != '')
			{
				$data = explode(',', $config_value);
				foreach ($data as $key => $value)
				{
					$data[$key] = trim($value);
				}
				$config_value = serialize($data);
			}
		}

		if ($config_name == 'game_name')
		{
			$sql_ary = array(
				$config_name		=> $config_value,
				'game_name_clean'	=> utf8_clean_string($config_value),
			);

			$sql = 'UPDATE ' . ARCADE_GAMES_TABLE. '
				SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
				WHERE game_id = ' . $game_id;
			$db->sql_query($sql);

		}
		else
		{
			$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
				SET ' . $db->sql_escape($config_name) . " = '" . $db->sql_escape($config_value) . "'
				WHERE game_id = " . $game_id;
			$db->sql_query($sql);
		}
		

		if ($cat_id && $old_cat_id && ($cat_id != $old_cat_id))
		{
			$this->sync('category', $cat_id);

			$this->set_last_play($old_cat_id);
			$this->sync('category', $old_cat_id);
		}
		
		if ($config_name == 'game_scoretype' && $game_scoretype != $old_game_scoretype)
		{
			$game_data = array(
				'game_id'			=> $game_id,
				'game_scoretype'	=> $config_value,
			);
			
			$this->update_highscore($game_data);
		}
	}

	/**
	* Adds game to database. Requires you to provide the game_scorevar and cat_id.
	* The rest of the info is gathered from the install file.
	*/
	function add_game($game_filename, $cat_id)
	{
		global $db, $phpEx, $file_functions;
		
		include (PHPBB3_ROOT_DIR . $this->config['game_path'] .$game_filename.'/'.$game_filename.'.' . $phpEx);

		$sql = 'SELECT MAX(game_order) AS max_order
			FROM ' . ARCADE_GAMES_TABLE;

		$result = $db->sql_query($sql);
		$max_order = (int) $db->sql_fetchfield('max_order');
		$db->sql_freeresult($result);

		$next_order = $max_order + 10;
		
		$game_insert = array(
			'game_order'		=> $next_order,
			'game_image'		=> utf8_normalize_nfc($game_data['game_image']),
			'game_desc'			=> utf8_normalize_nfc($game_data['game_desc']),
			'game_highscore'	=> 0,
			'game_highdate'		=> 0,
			'game_highuser'		=> 0,
			'game_files'		=> utf8_normalize_nfc($game_data['game_files']),
			'game_name'			=> utf8_normalize_nfc($game_data['game_name']),
			'game_name_clean'	=> utf8_clean_string($game_data['game_name']),
			'game_swf'			=> utf8_normalize_nfc($game_data['game_swf']),
			'game_width'		=> $game_data['game_width'],
			'game_height'		=> $game_data['game_height'],
			'game_installdate'	=> time(),
			'game_scorevar'		=> utf8_normalize_nfc($game_data['game_scorevar']),
			'game_scoretype'	=> $game_data['game_scoretype'],
			'game_type'			=> $game_data['game_type'],
			'cat_id'			=> $cat_id,
			'game_jackpot'		=> $this->config['jackpot_minimum'],
		);
		
		foreach ($game_insert as $key => $value)
		{
			if (is_string($value))
			{
				set_var($value, $value, 'string', true);
				$game_insert[$key] = htmlspecialchars_decode($value);
			}
		}
		
		$game_files_array = array();		
		$game_files_array[] = $this->set_path($game_insert['game_swf']);		
		$extra_game_files = (isset($game_insert['game_files']) && !empty($game_insert['game_files']) && is_array($game_insert['game_files'])) ? $game_insert['game_files'] : false;
		
		if ($extra_game_files)
		{
			foreach ($extra_game_files as $file)
			{
				$file = PHPBB3_ROOT_DIR . $file;
				if (file_exists($file))
				{
					$game_files_array[] = $file;
				}
			}
		}	
		
		$game_insert['game_files'] = ($extra_game_files) ? serialize($extra_game_files) : '';
		$game_insert['game_filesize'] = $file_functions->filesize($game_files_array);
		
		$sql = 'INSERT INTO ' . ARCADE_GAMES_TABLE . ' ' .
			$db->sql_build_array('INSERT', $game_insert);
		$db->sql_query($sql);

		$game_insert['game_id'] = $db->sql_nextid();

		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
				SET cat_games = cat_games + 1,
				cat_last_game_installdate = ' . time() . '
				WHERE cat_id = ' . $cat_id;

		$db->sql_query($sql);

		return $game_insert;
	}

	/**
	* Delete a game from the db and remove
	* its data from all relevant tables
	*/
	function delete_game($game_id, $cat_id)
	{
		global $db, $user;

		$errors = array();
		if (empty($game_id))
		{
			$errors[] = $user->lang['NO_GAME_ID'];
		}

		if (!$cat_id)
		{
			$errors[] = $user->lang['NO_CAT_ID'];
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		if (!is_array($game_id))
		{
			$game_id = array((int) $game_id);
		}
		
		$tables = array(ARCADE_DOWNLOAD_TABLE, ARCADE_ERRORS_TABLE, ARCADE_SCORES_TABLE, ARCADE_GAMES_TABLE, ARCADE_FAVS_TABLE, ARCADE_RATING_TABLE, ARCADE_PHPBB3_REPORTS_TABLE, ARCADE_PHPBB3_SESSIONS_TABLE);

		foreach ($tables as $table)
		{
			$sql = "DELETE FROM $table
				WHERE " . $db->sql_in_set('game_id', $game_id);
			$db->sql_query($sql);
		}

		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
			SET cat_games = cat_games - ' . sizeof($game_id) . '
			WHERE cat_id = ' . $cat_id;
		$db->sql_query($sql);

		$this->set_last_play($cat_id);
		$this->sync('category', $cat_id);

		return $errors;
	}
	
	/**
	* Delete a user from the arcade db and remove
	* its data from all relevant tables
	*/
	function delete_user($user_id, $username)
	{
		global $cache;

		if (!$user_id)
		{
			return;
		}

		if ($username === false)
		{
			$username = $user->lang['GUEST'];
		}

		$this->reset('user', $user_id);
		add_log('admin', 'LOG_ARCADE_DELETE_USER', $username);

		$cache->destroy('sql', ARCADE_CATS_TABLE);
		$cache->destroy('sql', ARCADE_GAMES_TABLE);
		$cache->destroy('sql', ARCADE_SCORES_TABLE);

		$cache->destroy('_arcade_leaders');
		$cache->destroy('_arcade_leaders_all');
		$cache->destroy('_arcade_totals');
		$cache->destroy('_arcade_users');

	}
	
	/**
	* All-encompasing reset function
	*
	* Modes:
	* - arcade			Reset all arcade data
	* - scores			Reset all arcade scores data
	* - user			Reset user data, must have passed $user_id
	* - user_scores		Reset user score data, must have passed $user_id
	* - download		Reset download data
	* - jackpot			Reset jackpot data
	* - jackpot_minimum	Reset games to jackpot minimum that are less than minimum
	* - points			Reset game and category points data
	*/
	function reset($mode, $user_id = false)
	{
		global $db, $user;

		if (($mode == 'user' || $mode == 'user_scores') && !$user_id)
		{
			trigger_error('NO_MODE');
		}

		switch ($mode)
		{
			case 'arcade':
				$sql = 'DELETE FROM ' . ARCADE_RATING_TABLE;
				$db->sql_query($sql);

				$sql = 'DELETE FROM ' . ARCADE_FAVS_TABLE;
				$db->sql_query($sql);

				$sql_ary = array(
					'game_votetotal'	=> 0,
					'game_votesum'		=> 0,
					'game_cost'			=> 0,
					'game_reward'		=> 0,
					'game_jackpot'		=> $this->config['jackpot_minimum'],
					'game_use_jackpot'	=> 0,
				);

			case 'scores':
				$sql = 'DELETE FROM ' . ARCADE_SCORES_TABLE;
				$db->sql_query($sql);

				$sql_ary['game_plays'] = 0;
				$sql_ary['game_highscore'] = 0;
				$sql_ary['game_highuser'] = 0;
				$sql_ary['game_highdate'] = 0;

				$sql = 'UPDATE ' . ARCADE_GAMES_TABLE. '
					SET ' . $db->sql_build_array('UPDATE', $sql_ary);
				$db->sql_query($sql);

				$sql_ary = array(
					'cat_last_play_game_id'			=> 0,
					'cat_last_play_game_name'		=> '',
					'cat_last_play_user_id'			=> 0,
					'cat_last_play_score'			=> 0,
					'cat_last_play_time'			=> 0,
					'cat_last_play_username'		=> '',
					'cat_last_play_user_colour'		=> '',
				);
				
				if ($mode == 'arcade')
				{
					$sql_ary['cat_cost'] = 0;
					$sql_ary['cat_reward'] = 0;
					$sql_ary['cat_use_jackpot'] = 0;
				}

				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET ' .	$db->sql_build_array('UPDATE', $sql_ary);
				$db->sql_query($sql);
		
				$this->sync('category');

			break;

			case 'user':
				$sql = 'SELECT game_id FROM ' . ARCADE_RATING_TABLE . '
					WHERE user_id = ' . $user_id;

				$result = $db->sql_query($sql);

				$resync_ratings = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$resync_ratings[] = $row['game_id'];
				}
				$db->sql_freeresult($result);

				$sql = 'DELETE FROM ' . ARCADE_RATING_TABLE . '
					WHERE user_id = ' . (int) $user_id;
				$db->sql_query($sql);

				$sql = 'DELETE FROM ' . ARCADE_FAVS_TABLE . '
					WHERE user_id = ' . (int) $user_id;
				$db->sql_query($sql);

			case 'user_scores':
				$sql_array = array(
					'SELECT'	=> 's.game_id, g.cat_id, g.game_scoretype, g.game_highuser',

					'FROM'		=> array(
						ARCADE_SCORES_TABLE	=> 's',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
							'ON'	=> 's.game_id = g.game_id'
						)
					),

					'WHERE' 	=> 's.user_id = ' . (int) $user_id,
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query($sql);

				$resync_cats = array();
				$resync_games = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$resync_cats[] = $row['cat_id'];
					$resync_games[$row['game_id']] = array(
						'game_id'				=> $row['game_id'],
						'game_scoretype'		=> $row['game_scoretype'],
						'game_highuser'			=> $row['game_highuser'],
					);
				}
				$db->sql_freeresult($result);

				$sql = 'DELETE FROM ' . ARCADE_SCORES_TABLE . '
					WHERE user_id = ' . (int) $user_id;
				$db->sql_query($sql);

				if (!empty($resync_cats))
				{
					$this->set_last_play($resync_cats);
					$this->sync('category', $resync_cats);
				}

				if (!empty($resync_games))
				{
					$this->sync('game', array_keys($resync_games));
					foreach ($resync_games as $key => $value)
					{
						if ($user_id == $value['game_highuser'])
						{
							$this->update_highscore($value);
						}
					}
				}

				if (!empty($resync_ratings))
				{
					$this->sync('rating', $resync_ratings);
				}

			break;

			case 'download':
				$sql = 'DELETE FROM ' . ARCADE_DOWNLOAD_TABLE;
				$db->sql_query($sql);

				$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
					SET game_download_total = 0';
				$db->sql_query($sql);

			break;
			
			case 'jackpot':
				$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
					SET game_jackpot = ' . $this->config['jackpot_minimum'];
				$db->sql_query($sql);
			break;
			
			case 'jackpot_minimum':		
				$game_ids = array();			
				$sql_array = array(
					'SELECT'	=> 'g.game_id, g.game_jackpot',

					'FROM'		=> array(
						ARCADE_GAMES_TABLE	=> 'g',
					),
					
					'WHERE'		=> 'g.game_jackpot < ' . $this->config['jackpot_minimum'],
					
					'ORDER_BY'		=> 'g.game_id ASC',
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$game_ids[] = $row['game_id'];
				}
				$db->sql_freeresult($result);
			
				if (sizeof($game_ids))
				{
					$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
						SET game_jackpot = ' . $this->config['jackpot_minimum'] . '
					WHERE ' . $db->sql_in_set('game_id', $game_ids);
					$db->sql_query($sql);
				}
			break;
			
			case 'points':
				$sql_ary = array(
					'cat_cost'			=> 0,
					'cat_reward'		=> 0,
					'cat_use_jackpot'	=> 0,
				);

				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET ' .	$db->sql_build_array('UPDATE', $sql_ary);
				$db->sql_query($sql);
				
				$sql_ary = array(
					'game_cost'			=> 0,
					'game_reward'		=> 0,
					'game_jackpot'		=> $this->config['jackpot_minimum'],
					'game_use_jackpot'	=> 0,
				);

				$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
					SET ' .	$db->sql_build_array('UPDATE', $sql_ary);
				$db->sql_query($sql);
			break;

			default:
				trigger_error('NO_MODE');
			break;
		}

	}

	/**
	* Set and get recent download sites
	*/
	function set_recent_sites($download_url = '')
	{
		global $arcade_cache;

		return $arcade_cache->obtain_arcade_recent_sites($download_url);
	}

	/**
	* Move game to new category
	*/
	function move_game($game_id, $old_cat_id, $new_cat_id)
	{
		global $db, $user;

		$errors = array();
		if (empty($game_id))
		{
			$errors[] = $user->lang['NO_GAME_IDS'];
		}

		if (!$old_cat_id || !$new_cat_id)
		{
			$errors[] = $user->lang['NO_CAT_ID'];
		}

		if ($old_cat_id == $new_cat_id)
		{
			$errors[] = $user->lang['MOVE_SAME_CAT_ID'];
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		if (!is_array($game_id))
		{
			$game_id = array((int) $game_id);
		}

		$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
			SET cat_id = ' . (int) $new_cat_id . '
			WHERE ' . $db->sql_in_set('game_id', $game_id);
		$db->sql_query($sql);

		$this->set_last_play($new_cat_id);
		$this->sync('category', $new_cat_id);
		
		$this->set_last_play($old_cat_id);
		$this->sync('category', $old_cat_id);

		return $errors;
	}

	/**
	* Reset game data
	*/
	function reset_game($game_id, $cat_id)
	{
		global $db, $user;

		$errors = array();
		if (!$game_id)
		{
			$errors[] = $user->lang['NO_GAME_ID'];
		}

		if (!$cat_id)
		{
			$errors[] = $user->lang['NO_CAT_ID'];
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		if (!is_array($game_id))
		{
			$game_ids= array((int) $game_id);
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		$sql = 'DELETE FROM ' . ARCADE_SCORES_TABLE . '
			WHERE ' . $db->sql_in_set('game_id', $game_id);
		$db->sql_query($sql);

		$sql = 'DELETE FROM ' . ARCADE_RATING_TABLE . '
			WHERE ' . $db->sql_in_set('game_id', $game_id);
		$db->sql_query($sql);
		
		$sql = 'DELETE FROM ' . ARCADE_DOWNLOAD_TABLE . '
			WHERE ' . $db->sql_in_set('game_id', $game_id);
		$db->sql_query($sql);


		$sql_ary = array(
			'game_highscore'		=> 0,
			'game_highuser'			=> 0,
			'game_highdate'			=> 0,
			'game_plays'			=> 0,
			'game_votetotal'		=> 0,
			'game_votesum'			=> 0,
			'game_download_total'	=> 0,
		);

		$sql = 'UPDATE ' . ARCADE_GAMES_TABLE. '
			SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
			WHERE ' . $db->sql_in_set('game_id', $game_id);
		$db->sql_query($sql);

		$this->set_last_play($cat_id);
		$this->sync('category', $cat_id);

		return $errors;
	}
	
	/**
	* Pulls the arcade download data from a remote site
	* This expects the data to be gzcompressed, and serialized
	* it is then cached locally
	*/
	function get_remote_data($url, $timeout = 10)
	{
		global $arcade_cache;
		
		$md5_url = md5($url);		
		if (($list = $arcade_cache->get('_arcade_dl_' . $md5_url)) === false)
		{			
			if (function_exists('curl_init') && !ini_get('safe_mode') && !ini_get('open_basedir'))
			{
				$ch = curl_init();
				curl_setopt ($ch, CURLOPT_URL, $url);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$list = curl_exec($ch);
				curl_close($ch);
			}
			else if (ini_get('allow_url_fopen'))
			{
			   	$list = file_get_contents($url);
			}
			
			$list = gzuncompress($list);
			$list = (is_string($list) && (preg_match("/^[adobis]:[0-9]+:.*[;}]/si", $list))) ? unserialize($list) : false;		
			
			$arcade_cache->put('_arcade_dl_' . $md5_url, $list, $this->config['cache_time'] * 3600);
		}
		
		return $list;
	}

	/**
	* Purges the cached arcade download list	
	*/
	function purge_download_cache()
	{
		global $cache;
		
		// Purge all arcade acp download list cache files
		if ($files = scandir($cache->cache_dir))
		{
			foreach ($files as $file)
			{
				if (strpos($file, 'data_arcade_dl_') !== 0 && strpos($file, 'data_arcade_recent_sites') !== 0)
				{
					continue;
				}

				$cache->remove_file($cache->cache_dir . $file);
			}
		}
	}

	/**
	* Display correct game type based on constant passed	
	*/
	function display_game_type($game_type)
	{
		global $user;

		$type = $user->lang['ARCADE_UNKNOWN'];
		switch ($game_type)
		{
			case AMOD_GAME:
				$type = $user->lang['AMOD_GAME'];
			break;
			
			case AR_GAME:
				$type = $user->lang['AR_GAME'];
			break;

			case IBPRO_GAME:
				$type = $user->lang['IBPRO_GAME'];
			break;

			case V3ARCADE_GAME:
				$type = $user->lang['V3ARCADE_GAME'];
			break;

			case IBPROV3_GAME:
				$type = $user->lang['IBPROV3_GAME'];
			break;

			case IBPRO_ARCADELIB_GAME:
				$type = $user->lang['IBPRO_ARCADELIB_GAME'];
			break;
			
			case NOSCORE_GAME:
				$type = $user->lang['NOSCORE_GAME'];
			break;

			default:
			break;
		}
		return $type;
	}

	/**
	* Display correct error type based on constant passed	
	*/
	function display_error_type($error_type)
	{
		global $user;

		$type = '';
		switch ($error_type)
		{
			case ARCADE_ERROR_UNKNOWN:
				$type = $user->lang['ARCADE_UNKNOWN'];
			break;

			case ARCADE_ERROR_SESSION:
				$type = $user->lang['ARCADE_ERROR_SESSION'];
			break;

			case ARCADE_ERROR_GAMETYPE:
				$type = $user->lang['ARCADE_ERROR_GAMETYPE'];
			break;

			case ARCADE_ERROR_TIME:
				$type = $user->lang['ARCADE_ERROR_TIME'];
			break;

			case ARCADE_ERROR_IBPROV3:
				$type = $user->lang['ARCADE_ERROR_IBPROV3'];
			break;

			case ARCADE_ERROR_FILEMISSING:
				$type = $user->lang['ARCADE_ERROR_FILEMISSING'];
			break;
			
			default:
				$type = $user->lang['ARCADE_UNKNOWN'];
			break;
		}
		return $type;
	}
	
	/**
	* Display correct report type based on constant passed	
	*/
	function display_report_type($report_type)
	{
		global $user;

		$type = '';
		switch ($report_type)
		{
			case ARCADE_REPORT_SCORING:
				$type = $user->lang['ARCADE_REPORT_SCORING'];
			break;

			case ARCADE_REPORT_PLAYING:
				$type = $user->lang['ARCADE_REPORT_PLAYING'];
			break;

			case ARCADE_REPORT_DOWNLOADING:
				$type = $user->lang['ARCADE_REPORT_DOWNLOADING'];
			break;
			
			default:
				$type = $user->lang['ARCADE_REPORT_OTHER'];
			break;
		}
		return $type;
	}

	/**
	* Move games up and down by fixed order
	*/
	function move_game_by($game_id, $cat_id, $action)
	{
		global $db;

		switch($action)
		{
			case 'g_move_up':
				$move = -15;

			break;

			case 'g_move_down':
				$move = 15;

			break;

		}

		$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . "
			SET game_order = game_order + $move
		WHERE game_id = $game_id";

		$db->sql_query($sql);

		$sql = 'SELECT * FROM ' . ARCADE_GAMES_TABLE . '
			WHERE cat_id = ' . $cat_id . '
		ORDER BY game_order ASC';

		$result = $db->sql_query($sql);

		$i = 10;
		while ($row = $db->sql_fetchrow($result))
		{
			$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
				SET game_order = ' . $i . '
			WHERE game_id = ' . $row['game_id'];

			$db->sql_query($sql);
			$i += 10;
		}
		$db->sql_freeresult($result);

		return;
	}

	/**
	* Correctly updated the current highscore holder of a game
	*/
	function update_highscore($game_data)
	{
		global $db;

		$score_order = ($game_data['game_scoretype'] == SCORETYPE_HIGH) ? 'DESC' : 'ASC';

		$sql = 'SELECT score, user_id, score_date
			FROM ' . ARCADE_SCORES_TABLE . '
		WHERE game_id = ' . (int) $game_data['game_id'] . '
			ORDER BY score ' . $score_order . ', score_date ASC';

		$result = $db->sql_query_limit($sql, 1);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!empty($row))
		{
			$sql_ary = array(
				'game_highscore'	=> $row['score'],
				'game_highuser'		=> $row['user_id'],
				'game_highdate'		=> $row['score_date'],
			);
		}
		else
		{
			$sql_ary = array(
				'game_highscore'	=> 0,
				'game_highuser'		=> 0,
				'game_highdate'		=> 0,
			);
		}

		$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
			WHERE game_id = ' . (int) $game_data['game_id'];
		$db->sql_query($sql);

	}

	/**
	* Update the edited user score data
	*/
	function update_score($score_data, $user_id, $game_id)
	{
		global $db;

		if ($score_data['comment_text'] != '')
		{
			generate_text_for_storage($score_data['comment_text'], $score_data['comment_uid'], $score_data['comment_bitfield'], $score_data['comment_options'], true, true, true);
		}

		$sql = 'UPDATE ' . ARCADE_SCORES_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $score_data) . '
			WHERE user_id = ' . (int) $user_id . '
				AND game_id = ' . (int) $game_id;
		$db->sql_query($sql);

		// After we update the score and comment data
		// We update the highscore holder for the game
		$row = $this->get_game_data($game_id);
		$this->set_last_play($row['cat_id']);
		$this->update_highscore($row);

		return;
	}

	/**
	* Delete a users score
	*/
	function delete_score($game_data, $user_id)
	{
		global $db;

		$sql = 'DELETE FROM ' . ARCADE_SCORES_TABLE . '
			WHERE ' . $db->sql_in_set('game_id', $game_data['game_id']) . '
			AND ' . $db->sql_in_set('user_id', $user_id);
		$db->sql_query($sql);

		$sql = 'DELETE FROM ' . ARCADE_RATING_TABLE . '
			WHERE ' . $db->sql_in_set('game_id', $game_data['game_id']) . '
			AND ' . $db->sql_in_set('user_id', $user_id);
		$db->sql_query($sql);

		$this->set_last_play($game_data['cat_id']);
		$this->sync('game', $game_data['game_id']);
		$this->sync('rating', $game_data['game_id']);
		$this->sync('category', $game_data['cat_id']);

		// After we update the score we update the highscore holder for the game
		if ($user_id == $game_data['game_highuser'])
		{
			$this->update_highscore($game_data);
		}

		return;
	}

	/*
	* Set the last play data for the category
	* If the correct last play data cannot be 
	* found it clears
	*/
	function set_last_play($cat_id = false)
	{
		global $db;
		
		// If we don't have a cat id we get all categories
		if (!$cat_id)
		{
			$cat_id = array();
			$sql = 'SELECT cat_id
				FROM ' . ARCADE_CATS_TABLE . '
				ORDER BY cat_id';
			$result = $db->sql_query($sql);
			while ($row = $db->sql_fetchrow($result))
			{
				$cat_id[] = $row['cat_id'];
			}
			$db->sql_freeresult($result);
		}
		
		if (!is_array($cat_id))
		{
			$cat_id = array((int) $cat_id);
		}
		
		foreach($cat_id as $id)
		{
			$sql_array = array(
				'SELECT'	=> 'g.game_id, g.game_name, u.user_id, u.username, u.user_colour, s.score, s.score_date',

				'FROM'		=> array(
					ARCADE_SCORES_TABLE	=> 's',
				),

				'LEFT_JOIN'	=> array(
					array(
						'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
						'ON'	=> 'g.game_id = s.game_id'
					),
					array(
						'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
						'ON'	=> 'u.user_id = s.user_id'
					),
				),

				'WHERE'		=> 'g.cat_id = ' . $id,
				
				'ORDER_BY'		=> 's.score_date DESC',
			);

			$sql = $db->sql_build_query('SELECT', $sql_array);

			$result = $db->sql_query_limit($sql, 1);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
			if ($row)
			{
				$sql_ary = array(
					'cat_last_play_game_id'			=> $row['game_id'],
					'cat_last_play_game_name'		=> $row['game_name'],
					'cat_last_play_user_id'			=> $row['user_id'],
					'cat_last_play_score'			=> $row['score'],
					'cat_last_play_time'			=> $row['score_date'],
					'cat_last_play_username'		=> $row['username'],
					'cat_last_play_user_colour'		=> $row['user_colour'],
				);
			}
			else
			{
				$sql_ary = array(
					'cat_last_play_game_id'			=> 0,
					'cat_last_play_game_name'		=> '',
					'cat_last_play_user_id'			=> 0,
					'cat_last_play_score'			=> 0,
					'cat_last_play_time'			=> 0,
					'cat_last_play_username'		=> '',
					'cat_last_play_user_colour'		=> '',
				);
			}

			$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET ' .
					$db->sql_build_array('UPDATE', $sql_ary) . '
					WHERE ' . $db->sql_in_set('cat_id', $id);

			$db->sql_query($sql);
		}
	}

	/*
	* Creates game folder, writes install file
	* and writes blank index.html file
	*/
	function create_install_folder($install_file, $game_filename, $overwrite = false)
	{
		global $phpEx;

		$success = true;

		$folder_path = $this->set_path($game_filename, 'path');
		$file_path = $this->set_path($game_filename, 'install');
		$index_file_path = $folder_path . 'index.htm';

		if (!is_dir($folder_path))
		{
			// Create directory
			if (!mkdir($folder_path, 0755))
			{
				$success = false;
			}
		}

		// Write install file
		if (file_exists($file_path) && !$overwrite)
		{
			trigger_error('ARCADE_CREATE_INSTALL_FILE_EXISTS', E_USER_WARNING);
		}

		if ($fp = fopen($file_path, 'wb'))
		{
			fwrite($fp, $install_file);
			fclose($fp);
		}
		else
		{
			$success = false;
		}

		// Write blank index.htm file
		if ($fp = fopen($index_file_path, 'wb'))
		{
			fwrite($fp, '');
			fclose($fp);
		}
		else
		{
			$success = false;
		}

		return $success;
	}


	/**
	* Creates install file for the game
	*/
	function create_install_file(&$game_info, $serialized = true)
	{
		global $file_functions;
		
		$game_type = '';
		$game_info['game_type'] = (int) $game_info['game_type'];
		switch ($game_info['game_type'])
		{
			case AMOD_GAME:
				$game_type = 'AMOD_GAME';
			break;

			case AR_GAME:
				$game_type = 'AR_GAME';
			break;

			case IBPRO_GAME:
				$game_type = 'IBPRO_GAME';
			break;

			case IBPRO_ARCADELIB_GAME:
				$game_type = 'IBPRO_ARCADELIB_GAME';
			break;

			case V3ARCADE_GAME:
				$game_type = 'V3ARCADE_GAME';
			break;

			case IBPROV3_GAME:
				$game_type = 'IBPROV3_GAME';
			break;
			
			case NOSCORE_GAME:
				$game_type = 'NOSCORE_GAME';
			break;

			default:
				$game_type = 'V3ARCADE_GAME';
			break;

		}

		$game_info['game_width'] = (int) $game_info['game_width'];
		$game_info['game_height'] = (int) $game_info['game_height'];

		$game_scoretype = '';
		$game_info['game_scoretype'] = (int) $game_info['game_scoretype'];
		switch ($game_info['game_scoretype'])
		{
			case SCORETYPE_HIGH:
				$game_scoretype = 'SCORETYPE_HIGH';
			break;

			case SCORETYPE_LOW:
				$game_scoretype = 'SCORETYPE_LOW';
			break;

			default:
				$game_scoretype = 'SCORETYPE_HIGH';
			break;
		}

		$game_files = '';
		if ($serialized)
		{
			if (!is_array(unserialize($game_info['game_files'])) || $game_info['game_files'] == '')
			{
				$game_files = "false,";
			}
			else
			{
				$game_files = unserialize($game_info['game_files']);
				$game_files = var_export($game_files, true) . ',';
			}
		}
		else
		{
			if (empty($game_info['game_files']))
			{
				$game_files = "false,";
			}
			else
			{
				$game_files = str_replace(' ', '', $game_info['game_files']);
				$game_files = explode(',', $game_files);
				$game_files = var_export($game_files, true) . ',';
			}
		}
		
		$game_image = '$game_file.\'.gif\'';
		if (isset($game_info['game_image']) && isset($game_info['game_swf']))
		{
			if ($file_functions->remove_extension($game_info['game_image']) == $file_functions->remove_extension($game_info['game_swf']))
			{
				$game_image = '$game_file.\'' . strrchr($game_info['game_image'], '.') . '\'';
			}
			else
			{
				$game_image = '\'' . addslashes($game_info['game_image']) . '\'';
			}
		}

		$game_scorevar = '$game_file';
		if (isset($game_info['game_swf']) && isset($game_info['game_scorevar']))
		{
			if ($file_functions->remove_extension($game_info['game_swf']) != $game_info['game_scorevar'])
			{
				$game_scorevar = '\'' . $game_info['game_scorevar'] . '\'';
			}
		}

		$data = array(addslashes($game_info['game_name']), $game_scorevar, addslashes($game_info['game_desc']), $game_image, $game_type, $game_info['game_width'], $game_info['game_height'], $game_scoretype, $game_files);
		return str_replace(array('{GAME_NAME}', '{GAME_SCOREVAR}', '{GAME_DESC}', '{GAME_IMAGE}', '{GAME_TYPE}', '{GAME_WIDTH}', '{GAME_HEIGHT}', '{GAME_SCORETYPE}', '{GAME_FILES}'), $data, $this->default_install_file());
	}

	/**
	* Updates install file from the information in the db
	*/
	function update_install_file($game_id)
	{
		global $phpEx;

		if ($game_id)
		{
			$game_info = $this->get_game_data($game_id);
			$install_file = $this->create_install_file($game_info);
			$updated_file = $this->set_path($game_info['game_swf'], 'install');

			if ($fp = fopen($updated_file, 'wb'))
			{
				fwrite($fp, $install_file);
				fclose($fp);
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	/**
	* Send install file to the browser
	*/
	function download_install_file($file, $filename, $use_method, $methods)
	{
		global $phpEx;

		if (!in_array($use_method, $methods))
		{
			$use_method = '.tar';
		}

		include(PHPBB3_INCLUDE_DIR . 'functions_compress.' . $phpEx);

		if ($use_method == '.zip')
		{
			$compress = new compress_zip('w', PHPBB3_ROOT_DIR . 'store/' . $filename . $use_method);
		}
		else
		{
			$compress = new compress_tar('w', PHPBB3_ROOT_DIR . 'store/' . $filename . $use_method, $use_method);
		}

		$compress->add_data('', 'index.htm');
		$compress->add_data($file, $filename . '.' . $phpEx);

		$compress->close();
		$compress->download($filename);
		unlink(PHPBB3_ROOT_DIR . 'store/' . $filename . $use_method);
		exit;

	}

	/**
	* Create game type dropdown
	*/
	function game_type_select($value = 0, $ibp_only = false)
	{
		global $user;

		if ($ibp_only)
		{
			return '<option value="' . IBPRO_GAME . '"' . (($value == IBPRO_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPRO_GAME'] . '</option><option value="' . IBPRO_ARCADELIB_GAME . '"' . (($value == IBPRO_ARCADELIB_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPRO_ARCADELIB_GAME'] . '</option><option value="' . IBPROV3_GAME . '"' . (($value == IBPROV3_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPROV3_GAME'] . '</option>';
		}
		else
		{
			return '<option value="' . AMOD_GAME .'"'. (($value == AMOD_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['AMOD_GAME'] . '</option><option value="' . AR_GAME .'"'. (($value == AR_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['AR_GAME'] . '</option><option value="' . IBPRO_GAME . '"' . (($value == IBPRO_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPRO_GAME'] . '</option><option value="' . IBPRO_ARCADELIB_GAME . '"' . (($value == IBPRO_ARCADELIB_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPRO_ARCADELIB_GAME'] . '</option><option value="' . V3ARCADE_GAME . '"' . (($value == V3ARCADE_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['V3ARCADE_GAME'] . '</option><option value="' . IBPROV3_GAME . '"' . (($value == IBPROV3_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['IBPROV3_GAME'] . '</option><option value="' . NOSCORE_GAME . '"' . (($value == NOSCORE_GAME) ? ' selected="selected"' : '') . '>' . $user->lang['NOSCORE_GAME'] . '</option>';
		}
	}

	/**
	* Create game score type dropdown
	*/
	function game_scoretype_select($value = 0)
	{
		global $user;

		return '<option value="' . SCORETYPE_HIGH .'"'. (($value == SCORETYPE_HIGH) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAME_SCORETYPE_HIGH'] . '</option><option value="' . SCORETYPE_LOW . '"' . (($value == SCORETYPE_LOW) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAME_SCORETYPE_LOW'] . '</option>';
	}

	/**
	* Simple version of jumpbox, just lists authed categories
	*/
	function make_cat_select($select_id = false, $ignore_id = false, $ignore_acl = false, $ignore_nongame = false, $ignore_emptycat = true, $only_acl_play = false, $return_array = false)
	{
		global $db, $user, $auth, $auth_arcade;

		$acl = ($ignore_acl) ? '' : (($only_acl_play) ? 'c_play' : array('c_list'));

		// This query is identical to the jumpbox one
		$sql = 'SELECT cat_id, cat_name, parent_id, cat_type, left_id, right_id
			FROM ' . ARCADE_CATS_TABLE . '
			ORDER BY left_id ASC';
		$result = $db->sql_query($sql, 600);

		$right = 0;
		$padding_store = array('0' => '');
		$padding = '';
		$cat_list = ($return_array) ? array() : '';

		// Sometimes it could happen that category will be displayed here not be displayed within the index page
		// This is the result of categories not displayed at index, having list permissions and a parent of a forum with no permissions.
		// If this happens, the padding could be "broken"

		while ($row = $db->sql_fetchrow($result))
		{
			if ($row['left_id'] < $right)
			{
				$padding .= '&nbsp; &nbsp;';
				$padding_store[$row['parent_id']] = $padding;
			}
			else if ($row['left_id'] > $right + 1)
			{
				$padding = (isset($padding_store[$row['parent_id']])) ? $padding_store[$row['parent_id']] : '';
			}

			$right = $row['right_id'];
			$disabled = false;

			if ($acl && !$auth_arcade->acl_gets($acl, $row['cat_id']) && !$auth->acl_get('a_arcade_cat'))
			{
				// List permission?
				if ($auth_arcade->acl_get('c_list', $row['cat_id']))
				{
					$disabled = true;
				}
				else
				{
					continue;
				}
			}

			if (
				((is_array($ignore_id) && in_array($row['cat_id'], $ignore_id)) || $row['cat_id'] == $ignore_id)
				||
				// Non-postable forum with no subforums, don't display
				($row['cat_type'] == ARCADE_CAT && ($row['left_id'] + 1 == $row['right_id']) && $ignore_emptycat)
				||
				($row['cat_type'] != ARCADE_CAT_GAMES && $ignore_nongame)
				)
			{
				// continue;
				$disabled = true;
			}

			if ($return_array)
			{
				// Include some more information...
				$selected = (is_array($select_id)) ? ((in_array($row['cat_id'], $select_id)) ? true : false) : (($row['cat_id'] == $select_id) ? true : false);
				$cat_list[$row['cat_id']] = array_merge(array('padding' => $padding, 'selected' => ($selected && !$disabled), 'disabled' => $disabled), $row);
			}
			else
			{
				$selected = (is_array($select_id)) ? ((in_array($row['cat_id'], $select_id)) ? ' selected="selected"' : '') : (($row['cat_id'] == $select_id) ? ' selected="selected"' : '');
				$cat_list .= '<option value="' . $row['cat_id'] . '"' . (($disabled) ? ' disabled="disabled" class="disabled-option"' : $selected) . '>' . $padding . $row['cat_name'] . '</option>';
			}
		}
		$db->sql_freeresult($result);
		unset($padding_store);

		return $cat_list;
	}

	/**
	* Get cat details
	*/
	function get_cat_info($cat_id)
	{
		global $db, $user;
		
		if ($cat_id == '')
		{
			return false;
		}

		$sql = 'SELECT *
			FROM ' . ARCADE_CATS_TABLE . "
			WHERE cat_id = $cat_id";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		if (!$row)
		{
			return false;
		}

		return $row;
	}

	/**
	* Get cat branch
	*/
	function get_cat_branch($cat_id, $type = 'all', $order = 'descending', $include_cat = true)
	{
		global $db;

		switch ($type)
		{
			case 'parents':
				$condition = 'f1.left_id BETWEEN f2.left_id AND f2.right_id';
			break;

			case 'children':
				$condition = 'f2.left_id BETWEEN f1.left_id AND f1.right_id';
			break;

			default:
				$condition = 'f2.left_id BETWEEN f1.left_id AND f1.right_id OR f1.left_id BETWEEN f2.left_id AND f2.right_id';
			break;
		}

		$rows = array();

		$sql = 'SELECT f2.*
			FROM ' . ARCADE_CATS_TABLE . ' f1
			LEFT JOIN ' . ARCADE_CATS_TABLE . " f2 ON ($condition)
			WHERE f1.cat_id = $cat_id
			ORDER BY f2.left_id " . (($order == 'descending') ? 'ASC' : 'DESC');
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			if (!$include_cat && $row['cat_id'] == $cat_id)
			{
				continue;
			}

			$rows[] = $row;
		}
		$db->sql_freeresult($result);

		return $rows;
	}

	/**
	* Creates cat image dropdown
	*/
	function generate_cat_images($cat_image)
	{
		global $db, $user, $auth, $arcade;

		$dir = PHPBB3_ROOT_DIR . $arcade->config['cat_image_path'];

		if (!is_dir($dir))
		{
			trigger_error('ARCADE_CAT_IMAGE_PATH_ERROR', E_USER_ERROR);
		}

		$category_images = array();
		if ($files = scandir($dir))
		{
			foreach ($files as $file)
			{
				$img_size = getimagesize($dir . $file);
				if ($img_size[0] && $img_size[1])
				{
					$category_images[] = $file;
				}
			}
		}

		$filename_list = '';
		$selected = false;
		for ($i = 0, $category_images_count = sizeof($category_images); $i < $category_images_count; $i++)
		{
			if ($category_images[$i] == $cat_image)
			{
				$category_selected = 'selected="selected"';
				$selected = true;
			}
			else
			{
				$category_selected = '';
			}
			$filename_list .= '<option value="' . $category_images[$i] . '"' . $category_selected . '>' . $category_images[$i] . '</option>';
		}

		return (($selected) ? '<option value=""></option>' : '<option value="" selected="selected"></option>') . $filename_list;
	}

	/**
	* Return default install file
	*/
	function default_install_file()
	{
	return '<?php
/**
*	Installation File How-to
*
*	Below are the parameters that must be set for a game to be installed into
*	the arcade.  There is no current way (and there will probably not be one)
*	to manually install games from the ACP.
*
*	You need this file for the game to show up in the ACP to install.
*
*	The only items that need to be set are the games name, description,
*	width, height, type, scoretype and files.
*
*	The arcade supports 7 types of games. (Activity Mod, IBPro, IBPro arcadelib,
*	V3Arcade, IBProV3, Arcade room and games that do not submit scores)  
*	Use the following constants for the type:
*
*	AMOD_GAME
*	AR_GAME
*	IBPRO_GAME
*	IBPRO_ARCADELIB_GAME
*	V3ARCADE_GAME
*	IBPROV3_GAME
*	NOSCORE_GAME
*
*	The scoretype should either be SCORETYPE_HIGH or SCORETYPE_LOW
*	these constants are defined in the main arcade class already.
*	SCORETYPE_HIGH is for games that score so that the best score is
*	the highest.  SCORETYPE_LOW is for games that score so that the
*	best score is the lowest.
*
*    The game_files item contains an array of any extra files and/or directories
*    that are need for the game to run that are not in the same folder as the main 
*    game.  They should be listed without the path from the phpbb root.
*
*	The following example would be if the game required three( 3) files:
*
*	\'game_files\'		=> array (
*		0	=> \'arcade/gamedata/snake/scores.swf\',
*		1	=> \'arcade/games/snake/scores.swf\',
*		2	=> \'arcade/gamedata/games/snake/scores.swf\',
*	)
*
*	If there are no extra files the item should be set to false:
*
*	\'game_files\'		=> false,
*/

if (!defined(\'IN_PHPBB\'))
{
	exit;
}

$game_file = basename(__FILE__, \'.\' . $phpEx);

$game_data = array(
	\'game_name\'			=> \'{GAME_NAME}\',
	\'game_desc\'			=> \'{GAME_DESC}\',
	\'game_image\'			=> {GAME_IMAGE},
	\'game_swf\'			=> $game_file.\'.swf\',
	\'game_scorevar\'		=> {GAME_SCOREVAR},
	\'game_type\'			=> {GAME_TYPE},
	\'game_width\'        	=> {GAME_WIDTH},
	\'game_height\'			=> {GAME_HEIGHT},
	\'game_scoretype\'		=> {GAME_SCORETYPE},
	\'game_files\'			=> {GAME_FILES}
);
?>';
	}

	/**
	* Post game announcement
	*/
	function create_announcement($game_data, $forum_id)
	{
	    global $db, $phpEx;

	    if (!function_exists('submit_post'))
	    {
	        include(PHPBB3_INCLUDE_DIR . 'functions_posting.' . $phpEx);
	    }

		$subject =  utf8_normalize_nfc($this->prepare_announce($this->config['announce_subject'], $game_data));
		$text =  utf8_normalize_nfc($this->prepare_announce($this->config['announce_message'], $game_data));

		// Do not try to post message if subject or text is empty
		if (empty($subject) || empty($text))
		{
			return;
		}

	    // variables to hold the parameters for submit_post
	    $poll = $uid = $bitfield = $options = '';

	    generate_text_for_storage($subject, $uid, $bitfield, $options, false, false, false);
	    generate_text_for_storage($text, $uid, $bitfield, $options, true, true, true);

	    $data = array(
	        'forum_id'        	=> $forum_id,
	        'icon_id'       	=> false,

	        'enable_bbcode'     => true,
	        'enable_smilies'    => true,
	        'enable_urls'       => true,
	        'enable_sig'        => true,

	        'message'        	=> $text,
	        'message_md5'    	=> md5($text),

	        'bbcode_bitfield'   => $bitfield,
	        'bbcode_uid'        => $uid,

	        'post_edit_locked'	=> 0,
	        'topic_title'       => $subject,
	        'notify_set'        => false,
	        'notify'            => false,
	        'post_time'         => 0,
	        'forum_name'        => '',
	        'enable_indexing'   => true,
	    );

	    submit_post('post', $subject, '', PHPBB3_POST_NORMAL, $poll, $data);
	}

	/**
	* Replace place holders for announcement
	*/
	function prepare_announce($text, $data)
	{
		global $user;

		$text = str_replace('[game_id]', $data['game_id'], $text);
		$text = str_replace('[game_name]', $data['game_name'], $text);
		$text = str_replace('[game_desc]', $data['game_desc'], $text);

		$image_link = '[img]' . generate_board_url() . '/arcade.php?img=' . $data['game_image'] . '[/img]';
		$text = str_replace('[game_image]', $image_link, $text);

		$download_link = '[url=' . generate_board_url() . '/arcade.php?mode=download&amp;g=' . $data['game_id'] . ']' . $user->lang['ARCADE_DOWNLOAD_GAME'] . '[/url]';
		$text = str_replace('[download_link]', $download_link, $text);

		$stats_link = '[url=' . generate_board_url() . '/arcade.php?mode=stats&amp;g=' . $data['game_id'] . ']' . $user->lang['ARCADE_STATS'] . '[/url]';
		$text = str_replace('[stats_link]', $stats_link, $text);

		$game_link = '[url=' . generate_board_url() . '/arcade.php?mode=play&amp;g=' . $data['game_id'] . ']' . $user->lang['ARCADE_PLAY_LINK'] . '[/url]';
		$text = str_replace('[game_link]', $game_link, $text);

		return $text;
	}
}
?>