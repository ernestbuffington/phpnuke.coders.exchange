<?php
/**
*
* @package acp
* @version $Id: acp_arcade_games.php 657 2008-12-11 00:35:06Z JRSweets $
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
* @package acp
*/
class acp_arcade_games
{
	var $u_action;
	var $parent_id = 0;
	var $new_game_data = array();

	function main($id, $mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $file_functions;
        
		include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade_admin();

		$this->tpl_name = 'acp_arcade_games';
		$this->page_title = $user->lang['ACP_ARCADE_' . strtoupper($mode)];

		switch ($mode)
		{
			case 'add_games':
				$this->add_games();
			break;

			case 'edit_games':
				$this->edit_games();
			break;

			case 'unpack_games':
				$this->unpack_games();
			break;

			case 'edit_scores':
				$this->edit_scores();
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}
	}

	function add_games()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode, $file_functions;

		$form_key = 'acp_arcade_games';
		add_form_key($form_key);

		$update		= (isset($_POST['update'])) ? true : false;

		if ($update)
		{
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}

			// Get game to add and makes sures its not blank
			$game_array	= request_var('games', array(''), true);
			if (empty($game_array))
			{
				trigger_error('NO_GAME_ID');
			}

			// Get category to add game to and make sures its valid
			$cat_data = $arcade->get_cat_info(request_var('cat_id', 0));
			if ($cat_data['cat_type'] != ARCADE_CAT_GAMES)
			{
				trigger_error('WRONG_CAT_TYPE', E_USER_WARNING);
			}

			// Add game to database
			$game_name_list = array();
			foreach($game_array as $game)
			{
				$game_data = $arcade->add_game($game, $cat_data['cat_id']);
				add_log('admin', 'LOG_ARCADE_ADD_GAME', $game_data['game_name']);

				if ($arcade->config['announce_game'])
				{
					$arcade->create_announcement($game_data, $arcade->config['announce_forum']);
				}

				$game_name_list[] = $game_data['game_name'];
			}

			if (sizeof($game_name_list) > 1)
			{
				$message = sprintf($user->lang['ARCADE_ADD_GAMES_SUCCESS'], implode(', ', $game_name_list));
			}
			else
			{
				$message = sprintf($user->lang['ARCADE_ADD_GAME_SUCCESS'], implode(', ', $game_name_list));
			}

			$cache->destroy('sql', ARCADE_CATS_TABLE);
			$cache->destroy('sql', ARCADE_GAMES_TABLE);
			$cache->destroy('sql', ARCADE_SCORES_TABLE);

			$cache->destroy('_arcade_all_games');
			$cache->destroy('_arcade_cats');

			trigger_error($message . adm_back_link($this->u_action));
		}

		// Default Games ACP page
		$template->assign_var('S_ARCADE_GAMES', true);
		$parents_list = $arcade->make_cat_select($this->parent_id, false, false, true);
		if (!$parents_list)
		{
			trigger_error($user->lang['NO_CAT'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
		}
		$dir = PHPBB3_ROOT_DIR . $arcade->config['game_path'];

		if (!is_dir($dir))
		{
			trigger_error('NO_GAME_DIRECTORY');
		}

		$games = $games_add = array();
		$sql = 'SELECT game_swf from ' . ARCADE_GAMES_TABLE . '
			ORDER BY game_swf';
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$games[$file_functions->remove_extension($row['game_swf'])] = $row['game_swf'];
		}
		$db->sql_freeresult($result);

		$total_games = 0;
		$error = array();
		$s_game_options = '';
		
		if ($files = scandir($dir))
		{
			foreach ($files as $file)
			{
				if ($file == '.' || $file == '..' || $file == '.svn' || $file == 'index.html' || $file == 'index.htm')
				{
					continue;
				}
				
				if (isset($games[$file]))
				{
					continue;
				}

				$install_file = $dir . $file . '/'. $file .'.' . $phpEx;
				if (file_exists($install_file))
				{
					include($install_file);
					if (isset($game_data))
					{						
						$games_add[$game_data['game_name']] = $file;
						$total_games++;
						unset($game_data);
					}
					else
					{
						$error[] = $install_file;
					}
				}				
			}
		}
		unset($games);

		if ($total_games == 0 && !sizeof($error))
		{
			trigger_error('NO_ADD_GAMES');
		}
		
		ksort($games_add);
		foreach ($games_add as $key => $value)
		{
			$s_game_options .= '<option value="' . $value . '">' . $key . "</option>\n";
		}
		unset($games_add);

		$template->assign_vars(array(
				'L_TITLE'			=> $user->lang['ARCADE_ADD_GAME'],
				'L_TITLE_EXPLAIN'	=> $user->lang['ARCADE_ADD_GAME_EXPLAIN'],
				'S_ERROR'			=> (sizeof($error)) ? true : false,
				'ERROR_MSG'			=> sprintf($user->lang['ARCADE_BAD_INSTALL_FILE'], implode('<br />', $error)),
				'S_CAT_LIST'		=> $parents_list,
				'S_TOTAL_GAMES'		=> $total_games,
				'S_GAME_OPTIONS'	=> $s_game_options,
				'U_ACTION'			=> $this->u_action)
		);
	}

	function edit_games()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode;

		$phpbb_admin_path = PHPBB3_ADMIN_DIR;

		$form_key = 'acp_arcade_games';
		add_form_key($form_key);

		$action 		= request_var('action', '');
		$start 			= request_var('start', 0);
		$game_id 		= request_var('g', 0);
		$update			= (isset($_POST['update'])) ? true : false;
		$delete_game 	= (isset($_POST['delete'])) ? true : false;
		$edit_game 		= (isset($_POST['edit'])) ? true : false;
		$error 			= array();

		if ($action == '')
		{
			if ($edit_game)
			{
				$action	= 'edit';
			}
			else if ($delete_game)
			{
				$action = 'delete';
			}
		}

		switch ($action)
		{
			case 'edit':
				$old_cat_id = request_var('old_cat_id', 0);
				$old_game_scoretype = request_var('old_game_scoretype', 0);
				$template->assign_var('S_EDIT_GAME', true);

				$display_vars = array(
					'title'			=> 'ARCADE_EDIT_GAME',
					'title_explain'	=> 'ARCADE_EDIT_GAME_EXPLAIN',
					'vars'	=> array(
						'legend1'			=> 'ARCADE_GAME_SETTINGS',
						'game_name'			=> array('lang' => 'ARCADE_GAME_NAME',			'validate' => 'string', 	'type' => 'text:30:255', 	'explain' => true),
						'game_desc'			=> array('lang' => 'ARCADE_GAME_DESC',			'validate' => '', 			'type' => 'textarea:5:25', 	'explain' => true),
						'game_image'		=> array('lang' => 'ARCADE_GAME_IMAGE',			'validate' => 'string', 	'type' => 'text:30:255',	'explain' => true),
						'game_swf'			=> array('lang' => 'ARCADE_GAME_SWF',			'validate' => 'string', 	'type' => 'custom', 		'explain' => true, 	'method' => 'game_swf'),
						'game_files'		=> array('lang' => 'ARCADE_GAME_FILES',  		'validate' => '', 			'type' => 'custom', 		'explain' => true, 	'method' => 'game_files'),
						'game_width'		=> array('lang' => 'ARCADE_GAME_WIDTH',			'validate' => 'int', 		'type' => 'text:3:4', 		'explain' => true),
						'game_height'		=> array('lang' => 'ARCADE_GAME_HEIGHT',		'validate' => 'int', 		'type' => 'text:3:4', 		'explain' => true),
						'game_installdate'	=> array('lang' => 'ARCADE_GAME_INSTALLDATE',	'validate' => 'string',		'type' => 'custom', 		'explain' => true, 	'method' => 'game_installdate'),
						'game_filesize'		=> array('lang' => 'ARCADE_GAME_FILESIZE',		'validate' => 'string',		'type' => 'custom', 		'explain' => true, 	'method' => 'game_filesize'),
						'game_download'		=> array('lang' => 'ARCADE_GAME_DOWNLOAD', 		'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'cat_id'			=> array('lang' => 'ARCADE_GAME_CATEGORY',		'validate' => 'int', 		'type' => 'select', 		'explain' => true, 	'method' => 'game_cat_select'),

						'legend2'			=> 'ARCADE_SCORE_SETTINGS',
						'game_scorevar'		=> array('lang' => 'ARCADE_GAME_SCOREVAR', 		'validate' => 'string', 	'type' => 'text:30:255', 	'explain' => true),
						'game_type'			=> array('lang' => 'ARCADE_GAME_TYPE',			'validate' => 'int', 		'type' => 'select', 		'explain' => true,	'method' => 'game_type_select'),
						'game_scoretype'	=> array('lang' => 'ARCADE_GAME_SCORETYPE',		'validate' => 'int', 		'type' => 'select', 		'explain' => true,	'method' => 'game_scoretype_select'),
					)
				);

				if ($arcade->points['installed'])
				{
					$display_vars['vars'] += array(
						'legend3'			=> 'ARCADE_GAME_POINTS_SETTINGS',
						'game_cost'			=> array('lang' => 'ARCADE_GAME_COST', 			'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
						'game_reward'		=> array('lang' => 'ARCADE_GAME_REWARD',		'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
						'game_use_jackpot'	=> array('lang' => 'ARCADE_GAME_USE_JACKPOT',	'validate' => 'bool', 			'type' => 'radio:yes_no', 		'explain' => true),
						'game_jackpot'		=> array('lang' => 'ARCADE_GAME_JACKPOT',		'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
					);
				}

				$this->new_game_data = $arcade->get_game_data($game_id);
				if (!$this->new_game_data)
				{
					trigger_error($user->lang['NO_GAME_ID'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc(request_var('config', array('' => ''), true)) : $this->new_game_data;

				// We validate the complete config if whished
				validate_config_vars($display_vars['vars'], $cfg_array, $error);

				if ($update && !check_form_key($form_key))
				{
					$error[] = $user->lang['FORM_INVALID'];
				}

				$cat_data = $arcade->get_cat_info($cfg_array['cat_id']);
				if ($cat_data['cat_type'] != ARCADE_CAT_GAMES)
				{
					$error[] = $user->lang['WRONG_CAT_TYPE'];
				}

				// Do not write values if there is an error
				if (sizeof($error))
				{
					$update = false;
				}

				// We go through the display_vars to make sure no one is trying to set variables he/she is not allowed to...
				foreach ($display_vars['vars'] as $config_name => $null)
				{
					if (!isset($cfg_array[$config_name]) || strpos($config_name, 'legend') !== false)
					{
						continue;
					}

					$config_value = $cfg_array[$config_name];
					$this->new_game_data[$config_name] = $config_value;

					if ($update)
					{
						// We have to check if the cat_id has changed if it does we need to send the
						// new and old ids
						if ($config_name == 'cat_id')
						{
							$arcade->set_game_data($game_id, $config_name, $config_value, $this->new_game_data['cat_id'], $old_cat_id);
						}
						else if ($config_name == 'game_scoretype')
						{
							$arcade->set_game_data($game_id, $config_name, $config_value, false, false, $this->new_game_data['game_scoretype'], $old_game_scoretype);
						}
						else
						{
							$arcade->set_game_data($game_id, $config_name, $config_value);
						}

						$update_install_file = false;
						if ($arcade->update_install_file($game_id))
						{
							$update_install_file = true;
						}
					}
				}

				if ($update)
				{
					add_log('admin', 'LOG_ARCADE_' . strtoupper($mode), $this->new_game_data['game_name']);
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_all_games');
					$cache->destroy('_arcade_cats');
					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');

					$edit_games_link = '<br /><br /><a href="' . append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&amp;mode=edit_games") . '">&laquo; ' . $user->lang['ACP_BACK_EDIT_GAMES'] . '</a>';
					$manage_games_link = '<br /><br /><a href="' . append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_manage&amp;mode=manage&amp;parent_id={$old_cat_id}" . (($start) ? "&amp;start=$start" : '')) . '">&laquo; ' . $user->lang['ACP_BACK_MANAGE_GAMES'] . '</a>';
					if ($update_install_file)
					{
						trigger_error($user->lang['ARCADE_GAME_UPDATED'] . $edit_games_link . $manage_games_link);
					}
					else
					{
						trigger_error($user->lang['ARCADE_GAME_UPDATED_ERROR'] . $edit_games_link . $manage_games_link, E_USER_WARNING);
					}
				}

				// Output relevant page
				foreach ($display_vars['vars'] as $config_key => $vars)
				{

					if (!is_array($vars) && strpos($config_key, 'legend') === false)
					{
						continue;
					}

					if (strpos($config_key, 'legend') !== false)
					{
						$template->assign_block_vars('options', array(
							'S_LEGEND'	=> true,
							'LEGEND'		=> $user->lang[$vars])
						);

						continue;
					}

					$type = explode(':', $vars['type']);

					$template->assign_block_vars('options', array(
						'KEY'			=> $config_key,
						'TITLE'			=> $user->lang[$vars['lang']],
						'S_EXPLAIN'		=> $vars['explain'],
						'TITLE_EXPLAIN'	=> ($vars['explain']) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '',
						'CONTENT'		=> build_cfg_template($type, $config_key, $this->new_game_data, $config_key, $vars),
						)
					);

					unset($display_vars['vars'][$config_key]);
				}

				if (isset($display_vars['lang']))
				{
					$user->add_lang($display_vars['lang']);
				}

				$this->page_title = $display_vars['title'];

				$template->assign_vars(array(
						'L_TITLE'				=> $user->lang[$display_vars['title']],
						'L_TITLE_EXPLAIN'		=> $user->lang[$display_vars['title_explain']],

						'S_ERROR'				=> (sizeof($error)) ? true : false,
						'ERROR_MSG'				=> implode('<br />', $error),

						'OLD_CAT_ID'			=> $this->new_game_data['cat_id'],
						'OLD_GAME_SCORETYPE'	=> $this->new_game_data['game_scoretype'],
						'U_ACTION'				=> $this->u_action . '&amp;action=edit&amp;g=' . $game_id . (($start) ? '&amp;start=' . $start : ''))
				);

				return;
			break;

			case 'delete':
				if (confirm_box(true))
				{
					$game_data = $arcade->get_game_data($game_id);
					$error = $arcade->delete_game($game_id, $game_data['cat_id']);

					if (sizeof($error))
					{
						break;
					}

					add_log('admin', 'LOG_ARCADE_DELETE_GAME', $game_data['game_name']);

					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_all_games');
					$cache->destroy('_arcade_cats');
					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');

					trigger_error(sprintf($user->lang['GAME_DELETED'], $game_data['game_name']) . adm_back_link($this->u_action));
				}
				else
				{
					if (!$auth->acl_get('a_arcade_delete_game'))
					{
						trigger_error($user->lang['NO_PERMISSION_GAME_DELETE'] . adm_back_link($this->u_action), E_USER_WARNING);
					}

					$s_hidden_fields = array(
						'g'			=> $game_id,
						'action'	=> 'delete',
					);
					confirm_box(false, 'DELETE_SELECTED_GAME', build_hidden_fields($s_hidden_fields));
				}
			break;
		}

		// Default Arcade Games Page
		// Quick jump of all the games in the arcade...
		foreach ($arcade->all_games as $gid => $game)
		{
			$template->assign_block_vars('quick_jump', array(
				'GAME_ID' 	=> $gid,
				'GAME_NAME'	=> $game['game_name'],
			));
		}
		// Quick jump of all the games in the arcade...

		$template->assign_vars(array(
			'L_TITLE'				=> $user->lang['ACP_ARCADE_EDIT_GAMES'],
			'L_TITLE_EXPLAIN'		=> $user->lang['ACP_ARCADE_EDIT_GAMES_EXPLAIN'],

			'S_ERROR'				=> (sizeof($error)) ? true : false,
			'ERROR_MSG'				=> (sizeof($error)) ? implode('<br />', $error) : '',
			'S_DEFAULT_EDIT_GAME' 	=> true,

			'U_ACTION'				=> $this->u_action)
		);
	}

	function unpack_games()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode, $file_functions;

		$form_key = 'acp_arcade_games';
		add_form_key($form_key);

		$action		= request_var('action', '');
		$update		= (isset($_POST['update'])) ? true : false;
		$upload_file = (isset($_POST['add_file'])) ? true : false;

		if (!check_form_key($form_key) && ($upload_file || $update))
		{
			trigger_error('FORM_INVALID', E_USER_WARNING);
		}

		if ($upload_file)
		{
			$error = array();
			$game_array = $this->upload_game($error);
			if (sizeof($error))
			{
				trigger_error(implode('<br />', $error) . adm_back_link($this->u_action), E_USER_WARNING);
			}

			$update = true;
			$game_array = array($game_array);
		}

		$methods = $arcade->compress_methods();
		if ($update)
		{
			include(PHPBB3_INCLUDE_DIR . 'functions_compress.' . $phpEx);
			// Get game to add and makes sures its not blank
			if (!$upload_file)
			{
				$game_array	= request_var('games', array(''), true);
			}

			if (empty($game_array))
			{
				trigger_error('NO_GAME_ID');
			}

			// Add game to database
			$bad_game = array();
			foreach($game_array as $key => $game)
			{
				$use_method = strrchr($game, '.');
				if ($use_method == '.zip')
				{
					$compress = new compress_zip('r', PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path'] . $game);
				}
				else
				{
					$compress = new compress_tar('r', PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path'] . $game);
				}

				// First we extract the compressed file to a temporary
				// directory in the store folder
				$tmp_path = 'store/' . md5(unique_id()) . '/';
				$compress->extract(PHPBB3_ROOT_DIR . $tmp_path);
				$compress->close();
				
				// As far as I know all ibpro games start with "game_" if this is not the case
				// please let me know as this will have to be changed
				$is_ibpro = false;
				$game_name = $file_functions->remove_extension($game);
				if (substr($game_name, 0, 5) == 'game_')
				{
					$is_ibpro = true;
					$game_name = str_replace('game_', '', $game_name);
				}
				
				// Check to make sure a valid config file is present
				$game_config = PHPBB3_ROOT_DIR . $tmp_path . $game_name . '.' . $phpEx;
				if (!file_exists($game_config))
				{
					$bad_game[] = $game;
					unset($game_array[$key]);
					$file_functions->delete_dir(PHPBB3_ROOT_DIR . $tmp_path);
					continue;
				}
				
				// We do not need the compressed file any more so lets get rid of it
				unlink(PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path'] . $game);

				// This is an ibpro game, lets try to automagically convert it to the arcade
				if ($is_ibpro)
				{
					// Set some variables we will need later
					$game_files = false;
					$game_type = IBPRO_GAME;

					// If the gamedata folder exists move it to the correct location
					if (file_exists(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata'))
					{
						if (file_exists(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata/' . $game_name . '/v32game.txt') || (file_exists(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata/' . $game_name . '/v3game.txt')))
						{
							// We have found a v3x game
							$game_type = IBPROV3_GAME;
						}
						else if (file_exists(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata/' . $game_name . '/'. $game_name . '.txt'))
						{
							// We have found an arcadelib game
							$game_type = IBPRO_ARCADELIB_GAME;
						}
						//Set game extra files/dir
						$game_files[] = 'arcade/gamedata/' . $game_name . '/';

						//Copy and delete
						$file_functions->copy_dir(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata', PHPBB3_ROOT_DIR . 'arcade/gamedata');
						$file_functions->delete_dir(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata');
					}

					// We have to read the ibpro config file contents and replace the $config variable 
					// or there will be problems since we will have overwritten the phpbb config variable
					$ibp_config = str_replace('$config', '$ibp_config', file_get_contents($game_config));
					// Open the file and erase the contents if any
					$fp = fopen($game_config, 'w');
					// Write the data to the file
					fwrite($fp, $ibp_config);
					// Close the file
					fclose($fp);
					// Since we now have a nice config file lets include it
					include($game_config);
					// We don't need you any more
					$file_functions->delete_file($game_config);

					// Remove extra spaces from array strings
					foreach ($ibp_config as $key => $value)
					{
						if (is_string($value))
						{
							$ibp_config[$key] = trim($value);
						}
					}
					$ibp_config['highscore_type'] = (!(isset($ibp_config['highscore_type'])) || $ibp_config['highscore_type'] == 'high') ? 'SCORETYPE_HIGH' : 'SCORETYPE_LOW';

					$data = array(
						'game_name' 		=> $ibp_config['gtitle'],
						'game_desc'         => $ibp_config['gwords'] . (($ibp_config['object'] != '1' && $ibp_config['gwords'] != $ibp_config['object']) ? ' ' . $ibp_config['object'] : ''),
						'game_type'			=> $game_type,
						'game_width'		=> $ibp_config['gwidth'],
						'game_height'		=> $ibp_config['gheight'],
						'game_scoretype'	=> $ibp_config['highscore_type'],
						'game_files'		=> serialize($game_files),
					);

					// Here is where we create the new install file and place it in the correct location
					$install_file = $arcade->create_install_file($data);
					$arcade->create_install_folder($install_file, $ibp_config['gname'], true);

					// Copy the rest of the files over and remove all temporary files
					$file_functions->copy_dir(PHPBB3_ROOT_DIR . $tmp_path, PHPBB3_ROOT_DIR . $arcade->config['game_path'] . $game_name);
					$file_functions->delete_dir(PHPBB3_ROOT_DIR . $tmp_path);

					switch ($game_type)
					{
						case IBPROV3_GAME:
							add_log('admin', 'LOG_ARCADE_UNPACK_IBPROV3_GAME', $game);
						break;

						case IBPRO_ARCADELIB_GAME:
							add_log('admin', 'LOG_ARCADE_UNPACK_IBPRO_ARCADELIB_GAME', $game);
						break;

						default:
							add_log('admin', 'LOG_ARCADE_UNPACK_IBPRO_GAME', $game);
						break;
					}
				}
				else
				{					
					// If the gamedata folder exists move it to the correct location
					if (file_exists(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata'))
					{
						//Copy and delete
						$file_functions->copy_dir(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata', PHPBB3_ROOT_DIR . 'arcade/gamedata');
						$file_functions->delete_dir(PHPBB3_ROOT_DIR . $tmp_path . 'gamedata');
					}
					
					$file_functions->copy_dir(PHPBB3_ROOT_DIR . $tmp_path, PHPBB3_ROOT_DIR . $arcade->config['game_path'] . $game_name);
					$file_functions->delete_dir(PHPBB3_ROOT_DIR . $tmp_path);

					add_log('admin', 'LOG_ARCADE_UNPACK_GAME', $game);
				}
			}

			$s_bad_game = sizeof($bad_game);
			$s_game_array = sizeof($game_array);

			$message = '';
			$message .= ($upload_file) ? $user->lang['ARCADE_UPLOAD_COMPLETE'] . '<br /><br />' : '';
			if ($s_bad_game)
			{
				$lang = ($s_bad_game > 1) ? $user->lang['ARCADE_UNPACK_GAMES_ERROR'] : $user->lang['ARCADE_UNPACK_GAME_ERROR'];
				$message .= sprintf($lang, implode(', ', $bad_game));
			}

			if ($s_game_array)
			{
				if ($s_bad_game)
				{
					$message .= '<br /><br />';
				}

				$lang = ($s_game_array > 1) ? $user->lang['ARCADE_UNPACK_GAMES_SUCCESS'] : $user->lang['ARCADE_UNPACK_GAME_SUCCESS'];
				$message .= sprintf($lang, implode(', ', $game_array));
			}

			if ($s_bad_game)
			{
				trigger_error($message . adm_back_link($this->u_action), E_USER_WARNING);
			}
			else
			{
				trigger_error($message . adm_back_link($this->u_action));
			}
		}

		// Default Unpack Games ACP page
		$template->assign_var('S_UNPACK_ARCADE_GAMES', true);
		$dir = PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path'];

		if (!is_dir($dir))
		{
			trigger_error($user->lang['NO_UNPACK_GAME_DIRECTORY']);
		}


		$total_games = 0;
		$s_game_options = '';
		if ($files = scandir($dir))
		{
			foreach ($files as $file)
			{
				if ($file == '.' || $file == '..' || $file == '.svn' || $file == 'index.html' || $file == 'index.htm')
				{
					continue;
				}

				$found = false;
				foreach ($methods as $type)
				{
					$ext = substr($file, -strlen($type));
					if ($ext == $type)
					{
						$found = true;
						$ext = $type;
						break;
					}
				}

				if ($found)
				{
					$filename = str_replace($ext, '', $file);
					
					$sql = 'SELECT game_name
						FROM '. ARCADE_GAMES_TABLE . "
						WHERE game_swf = '$filename.swf'";

					$result = $db->sql_query($sql);

					if (!$db->sql_fetchrow($result))
					{
						$s_game_options .= '<option value="' . $file . '">' . $filename . ' (' . $ext . ')' . '</option>';
						$total_games++;
					}
					$db->sql_freeresult($result);
				}
				
			}
		}


		$can_upload = (file_exists(PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path']) && is_writable(PHPBB3_ROOT_DIR . $arcade->config['unpack_game_path']) && (ini_get('file_uploads') || strtolower(ini_get('file_uploads')) == 'on')) ? true : false;
		$template->assign_vars(array(
				'L_TITLE'			=> $user->lang['ARCADE_UNPACK_GAME'],
				'L_TITLE_EXPLAIN'	=> $user->lang['ARCADE_UNPACK_GAME_EXPLAIN'],
				'S_FORM_ENCTYPE'	=> ($can_upload) ? ' enctype="multipart/form-data"' : '',
				'S_CAN_UPLOAD'		=> $can_upload,
				'S_TOTAL_GAMES'		=> $total_games,
				'S_GAME_OPTIONS'	=> $s_game_options,
				'U_ACTION'			=> $this->u_action)
		);
	}

	function edit_scores()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode;

        $phpbb_root_path = PHPBB3_ROOT_DIR;
		
		$form_key = 'acp_arcade_games';
		add_form_key($form_key);

		$start 		= request_var('start', 0);
		$user_id 	= request_var('u', 0);
		$score 		= request_var('score', 0.000);
		$score_date	= request_var('score_date', 0);
		$date_now	= request_var('date_now', false);
		$game_id 	= request_var('g', 0);
		$comment 	= request_var('comment', '', true);
		$update		= (isset($_POST['update'])) ? true : false;
		$action		= request_var('action', '');

		if ($update && $action == 'edit')
		{
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}

			$score_data = array(
				'score'				=> $score,
				'score_date'		=> ($date_now) ? time(): $score_date,
				'comment_text'		=> $comment,
				'comment_bitfield'	=> '',
				'comment_options'	=> 7,
				'comment_uid'		=> '',
			);
			$game_data = $arcade->get_game_data($game_id);
			$arcade->update_score($score_data, $user_id, $game_id);

			// Get Username from User ID
			include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);
			$user_id_ary[] = $user_id;
			$usernames = array();
			user_get_id_name($user_id_ary, $usernames);
			$username = $usernames[$user_id];

			$cache->destroy('sql', ARCADE_CATS_TABLE);
			$cache->destroy('sql', ARCADE_GAMES_TABLE);
			$cache->destroy('sql', ARCADE_SCORES_TABLE);

			$cache->destroy('_arcade_leaders');
			$cache->destroy('_arcade_leaders_all');

			add_log('admin', 'LOG_ARCADE_EDIT_SCORE', $username, $game_data['game_name']);
			trigger_error(sprintf($user->lang['ARCADE_SCORE_UPDATED'], $username, $game_data['game_name']) . adm_back_link($this->u_action));
		}

		$reset_scores = (isset($_POST['reset_scores'])) ? true : false;
		$reset_arcade = (isset($_POST['reset_arcade'])) ? true : false;
		$reset_user_scores = (isset($_POST['reset_user_scores'])) ? true : false;
		$reset_user_all = (isset($_POST['reset_user_all'])) ? true : false;
		$reset_jackpot = (isset($_POST['reset_jackpot'])) ? true : false;
		$reset_points = (isset($_POST['reset_points'])) ? true : false;

		if ($reset_scores)
		{
			$action = 'reset_scores';
		}
		else if ($reset_arcade)
		{
			$action = 'reset_arcade';
		}
		else if ($reset_user_scores)
		{
			$action = 'reset_user_scores';
		}
		else if ($reset_user_all)
		{
			$action = 'reset_user_all';
		}
		else if ($reset_jackpot)
		{
			$action = 'reset_jackpot';
		}
		else if ($reset_points)
		{
			$action = 'reset_points';
		}

		switch ($action)
		{
			case 'reset_scores':
				if (confirm_box(true))
				{
					$arcade->reset('scores');

					add_log('admin', 'LOG_ARCADE_RESET_SCORES_ALL');
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');

					trigger_error($user->lang['ARCADE_RESET_SCORES_ALL_DONE'] . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'reset_scores'	=> true,
					);
					confirm_box(false, 'RESET_SCORES_ALL', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'reset_arcade':
				if (confirm_box(true))
				{
					$arcade->reset('arcade');

					add_log('admin', 'LOG_ARCADE_RESET_ARCADE');
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');

					trigger_error($user->lang['ARCADE_RESET_ARCADE_DONE'] . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'reset_arcade'	=> true,
					);
					confirm_box(false, 'RESET_ARCADE', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'reset_user_scores':
				if (confirm_box(true))
				{
					$arcade->reset('user_scores', $user_id);

					// Get Username from User ID
					include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);
					$user_id_ary[] = $user_id;
					$usernames = array();
					user_get_id_name($user_id_ary, $usernames);
					$reset_name = $usernames[$user_id];

					add_log('admin', 'LOG_ARCADE_RESET_USER_SCORES', $reset_name);
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');
					$cache->destroy('_arcade_users');

					trigger_error(sprintf($user->lang['ARCADE_RESET_USER_SCORES_DONE'], $reset_name) . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'u'					=> $user_id,
						'reset_user_scores'	=> true,
					);
					confirm_box(false, 'RESET_USER_SCORES', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'reset_user_all':
				if (confirm_box(true))
				{
					$arcade->reset('user', $user_id);

					// Get Username from User ID
					include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);
					$user_id_ary[] = $user_id;
					$usernames = array();
					user_get_id_name($user_id_ary, $usernames);
					$reset_name = $usernames[$user_id];

					add_log('admin', 'LOG_ARCADE_RESET_USER_ALL', $reset_name);
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');
					$cache->destroy('_arcade_users');

					trigger_error(sprintf($user->lang['ARCADE_RESET_USER_ALL_DONE'], $reset_name) . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'u'					=> $user_id,
						'reset_user_all'	=> true,
					);
					confirm_box(false, 'RESET_USER_ALL', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'reset_jackpot':
				if (confirm_box(true))
				{
					$arcade->reset('jackpot');

					add_log('admin', 'LOG_ARCADE_RESET_JACKPOT');
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);

					trigger_error($user->lang['ARCADE_RESET_JACKPOT_DONE'] . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'reset_jackpot'	=> true,
					);
					confirm_box(false, 'RESET_JACKPOT', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'reset_points':
				if (confirm_box(true))
				{
					$arcade->reset('points');

					add_log('admin', 'LOG_ARCADE_RESET_POINTS');
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);

					trigger_error($user->lang['ARCADE_RESET_POINTS_DONE'] . adm_back_link($this->u_action));
				}
				else
				{
					$s_hidden_fields = array(
						'reset_points'	=> true,
					);
					confirm_box(false, 'RESET_POINTS', build_hidden_fields($s_hidden_fields));
				}
			break;

			case 'delete':
				if (confirm_box(true))
				{
					$game_data = $arcade->get_game_data($game_id);
					$arcade->delete_score($game_data, $user_id);

					// Get Username from User ID
					include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);
					$user_id_ary[] = $user_id;
					$usernames = array();
					user_get_id_name($user_id_ary, $usernames);
					$username = $usernames[$user_id];

					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');

					add_log('admin', 'LOG_ARCADE_DELETE_SCORE', $username, $game_data['game_name']);
					trigger_error(sprintf($user->lang['ARCADE_SCORE_DELETED'], $username, $game_data['game_name']) . adm_back_link($this->u_action));
				}
				else
				{
					confirm_box(false, 'DELETE_SELECTED_SCORE');
				}
			break;

			case 'progress_bar':
				$this->display_progress_bar();
				exit;
			break;

			case 'sync':
				$game_data = $arcade->get_game_data($game_id);
				$template->assign_vars(array(
					'S_RESYNCED' 	=> true,
					'GAME_RESYNCED' => sprintf($user->lang['GAME_RESYNCED'], $game_data['game_name']),
					)
				);
				$arcade->sync('game', $game_id);
				$arcade->update_highscore($game_data);
				add_log('admin', 'LOG_ARCADE_SYNC_GAME',  $game_data['game_name']);
			break;

			case 'edit':

				if (!$game_id || !$user_id)
				{
					trigger_error($user->lang['NO_USERS_OR_GAMES'] . adm_back_link($this->u_action), E_USER_WARNING);
				}
				$template->assign_var('S_EDIT_SCORES', true);

				$sql_array = array(
					'SELECT'	=> 'g.*, s.*, u.username, u.user_colour',

					'FROM'		=> array(
						ARCADE_SCORES_TABLE	=> 's',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
							'ON'	=> 's.game_id = g.game_id'
						),
						array(
							'FROM'	=> array(USERS_TABLE => 'u'),
							'ON'	=> 's.user_id = u.user_id'
						),
					),

					'WHERE'		=> 's.user_id = ' . $user_id . ' AND g.game_id = ' . $game_id,
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$comment_data = generate_text_for_edit($row['comment_text'], $row['comment_uid'], $row['comment_options']);

					$template->assign_vars(array(
						'SCORE_USERNAME'	=> $arcade->get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'GAME_NAME' 		=> $row['game_name'],
						'SCORE' 			=> $row['score'],
						'COMMENT' 			=> $comment_data['text'],
						'DATE_RAW'			=> $row['score_date'],
						'DATE' 				=> $user->format_date($row['score_date']),
						'TOTAL_PLAYS' 		=> $row['total_plays'],
						'TOTAL_TIME' 		=> $arcade->time_format($row['total_time']),
						'AVG_TIME' 			=> $arcade->time_format($row['total_time']/$row['total_plays']))
					);

				}
				$db->sql_freeresult($result);

				$l_title = $user->lang['ACP_ARCADE_' . strtoupper($mode)];
				$l_title_explain = $user->lang['ACP_ARCADE_' . strtoupper($mode) . '_EDIT_EXPLAIN'];

				$template->assign_vars(array(
					'U_EDIT_ACTION'	=> $this->u_action . "&amp;g=$game_id&amp;u=$user_id&amp;action=$action",

					'L_TITLE'		=> $l_title,
					'L_TITLE_EXPLAIN'		=> $l_title_explain,
					)
				);
				return;
			break;

			case 'show_scores':
				$template->assign_var('S_GAME_SCORES', true);

				$game_data = $arcade->get_game_data($game_id);
				$score_order = ($game_data['game_scoretype'] == SCORETYPE_HIGH) ? 'DESC' : 'ASC';

				$sql_array = array(
					'SELECT'	=> 's.* , u.user_id, u.user_colour, u.username',

					'FROM'		=> array(
						ARCADE_SCORES_TABLE	=> 's',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array(USERS_TABLE => 'u'),
							'ON'	=> 's.user_id = u.user_id'
						),
					),

					'WHERE'		=> 's.game_id = ' . $game_id,

					'ORDER_BY'	=> 's.score ' . $score_order . ', s.score_date ASC',
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);

				$position = ($start > 0 ) ? $start : 0;
				$actual_position = ($start > 0 ) ? $start : 0;
				$lastscore = 0;
				while ($row = $db->sql_fetchrow($result))
				{
					$actual_position++;

					if ($lastscore != $row['score'])
					{
						$position = $actual_position;
					}
					$lastscore = $row['score'] ;

					$url = $this->u_action . '&amp;g=' . $row['game_id'] . '&amp;u=' . $row['user_id'];

					$template->assign_block_vars('scorerow', array(
						'POS' 			=> $position,
						'USERNAME' 		=> $arcade->get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
						'SCORE' 		=> $arcade->number_format($row['score']),
						'COMMENT' 		=> generate_text_for_display($row['comment_text'], $row['comment_uid'], $row['comment_bitfield'], $row['comment_options']),
						'DATE' 			=> $user->format_date($row['score_date']),
						'TOTAL_PLAYS' 	=> $row['total_plays'],
						'TOTAL_TIME' 	=> $arcade->time_format($row['total_time']),
						'U_EDIT'		=> $url . '&amp;action=edit',
						'U_DELETE'		=> $url . '&amp;action=delete',
						)
					);
				}
				$db->sql_freeresult($result);

				$l_title = $user->lang['ACP_ARCADE_' . strtoupper($mode)];
				$l_title_explain = $user->lang['ACP_ARCADE_' . strtoupper($mode) . '_LIST_EXPLAIN'];

				$template->assign_vars(array(
					'GAME_TITLE'			=> sprintf($user->lang['ARCADE_GAME_SCORES'], $game_data['game_name']),

					'L_TITLE'				=> $l_title,
					'L_TITLE_EXPLAIN'		=> $l_title_explain,
				));

				$total_scores = $arcade->get_total('scores', $game_id);
				$template->assign_vars(array(
					'S_ON_PAGE'	=> on_page($total_scores, $arcade->config['acp_items_per_page'], $start),
					'PAGINATION'	=> generate_pagination($this->u_action . '&amp;action=show_scores&amp;g=' . $game_id, $total_scores, $arcade->config['acp_items_per_page'], $start, true),
				));

				return;
			break;
		}

		$template->assign_var('S_SCORES', true);

		$sql_array = array(
			'SELECT'	=> 'g.game_id , g.game_name, g.game_name_clean, g.game_image, g.game_desc, g.game_plays, g.game_scorevar',

			'FROM'		=> array(
				ARCADE_SCORES_TABLE	=> 's',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
					'ON'	=> 'g.game_id = s.game_id'
				),
			),

			'ORDER_BY'	=> 'g.game_name_clean ASC',
		);

		$sql = $db->sql_build_query('SELECT_DISTINCT', $sql_array);
		$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);

		while($row = $db->sql_fetchrow($result))
		{
			$url = $this->u_action . '&amp;g=' . $row['game_id'];

			$template->assign_block_vars('games', array(
				'GAME_ID' 		=> $row['game_id'],
				'GAME_NAME' 	=> $row['game_name'],
				'GAME_DESC' 	=> $row['game_desc'],
				'GAME_IMAGE'	=> ($row['game_image']) ? '<img src="' .append_sid("{$phpbb_root_path}arcade.$phpEx", "img={$row['game_image']}") . '" width="25" height="25" alt="" />' : '',
				'GAME_PLAYS' 	=> $row['game_plays'],

				'U_GAME_PLAY'      	=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=play&amp;g={$row['game_id']}"),
				'U_EDIT'			=> $url . '&amp;action=show_scores',
				'U_SYNC'			=> $url . '&amp;action=sync&amp;start=' . $start,
				)
			);
		}
		$db->sql_freeresult($result);

		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		// Start quick jump of all the games in the arcade with scores...
		foreach ($row as $game)
		{
			$template->assign_block_vars('quick_jump', array(
				'GAME_ID'		=> $game['game_id'],
				'GAME_NAME' 	=> $game['game_name'])
			);
		}

		$s_hidden_fields = build_hidden_fields(array(
			'action'	=> 'show_scores',
			)
		);
		// End quick jump of all the games in the arcade...

		// This next bit of code is used to grab all the users that have some type of arcade data stored
		$user_ids = array();
		// These tables could all possibly contain user related arcade data
		$tables = array(ARCADE_SCORES_TABLE, ARCADE_FAVS_TABLE, ARCADE_RATING_TABLE);
		foreach ($tables as $table)
		{
			$sql = "SELECT user_id from $table ORDER BY user_id";
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$user_ids[] = $row['user_id'];
			}
			$db->sql_freeresult($result);
		}

		// Order and remove the duplicated user ids
		$user_ids = array_merge(array_unique($user_ids));

		if (sizeof($user_ids))
		{
			// Now lets get the usernames for all the users
			$sql = 'SELECT user_id, username, username_clean
				FROM ' . USERS_TABLE . '
				WHERE ' . $db->sql_in_set('user_id', $user_ids) . '
				ORDER BY username_clean ASC';
			$result = $db->sql_query($sql);

			$user_data = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);

			foreach ($user_data as $item)
			{
				$template->assign_block_vars('user_jump', array(
					'USER_ID'		=> $item['user_id'],
					'USERNAME' 		=> $item['username'])
				);
			}
		}
		$l_title = $user->lang['ACP_ARCADE_' . strtoupper($mode)];
		$l_title_explain = $user->lang['ACP_ARCADE_' . strtoupper($mode) . '_DEFAULT_EXPLAIN'];

		$template->assign_vars(array(
			'L_TITLE'					=> $l_title,
			'L_TITLE_EXPLAIN'			=> $l_title_explain,

			'S_HIDDEN_FIELDS'			=> $s_hidden_fields,
			'S_SHOW_POINTS'				=> $arcade->points['installed'],

			'U_ACTION'					=> $this->u_action,
			'U_PROGRESS_BAR'			=> $this->u_action . '&amp;action=progress_bar',
			'UA_PROGRESS_BAR'			=> str_replace('&amp;', '&', $this->u_action) . '&action=progress_bar',
			)
		);

		$total_scores = $arcade->get_total('scores');
		$template->assign_vars(array(
			'S_ON_PAGE'	=> on_page($total_scores, $arcade->config['acp_items_per_page'], $start),
			'PAGINATION'	=> generate_pagination($this->u_action, $total_scores, $arcade->config['acp_items_per_page'], $start, true),
		));
	}

	function game_files($value, $key = '')
	{
		$name = 'config[' . $key . ']';
		$game_files = (unserialize($this->new_game_data['game_files'])) ? implode(', ', unserialize($this->new_game_data['game_files'])) : $this->new_game_data['game_files'];

		return '<textarea id="' . $key . '" name="' . $name . '" rows="5" cols="25">' . $game_files  . '</textarea>';

	}

	function game_swf()
	{
		global $user;

		return $this->new_game_data['game_swf'];
	}

	function game_installdate()
	{
		global $user;

		return $user->format_date($this->new_game_data['game_installdate']);
	}

	function game_filesize()
	{
		global $user;

		return get_formatted_filesize($this->new_game_data['game_filesize']);
	}

	function game_type_select($value, $key = '')
	{
		global $arcade;

		return $arcade->game_type_select($value);
	}

	function game_scoretype_select($value, $key = '')
	{
		global $arcade;

		return $arcade->game_scoretype_select($value);
	}


	function game_cat_select($value, $key = '')
	{
		global $arcade;
		return $arcade->make_cat_select($value, false, false, true);
	}

	/**
	* Display progress bar for syncinc forums
	*/
	function display_progress_bar()
	{
		global $template, $user;

		adm_page_header($user->lang['SYNC_IN_PROGRESS']);

		$template->set_filenames(array(
			'body'	=> 'progress_bar.html')
		);

		$template->assign_vars(array(
			'L_PROGRESS'			=> $user->lang['SYNC_IN_PROGRESS'],
			'L_PROGRESS_EXPLAIN'	=> $user->lang['SYNC_IN_PROGRESS_EXPLAIN'])
		);

		adm_page_footer();
	}

	/**
	* Upload Game - filedata is generated here
	* Uses upload class
	*/
	function upload_game(&$error)
	{
		global $config, $db, $user, $phpEx, $arcade;

		$error = array();

		// Init upload class
		$user->add_lang('posting');
		include_once(PHPBB3_INCLUDE_DIR . 'functions_upload.' . $phpEx);
		$upload = new fileupload();

		$upload->set_allowed_extensions($arcade->compress_methods(true));

		if (!empty($_FILES['fileupload']['name']))
		{
			$file = $upload->form_upload('fileupload');
		}
		else
		{
			$error[] = $user->lang['NO_UPLOAD_FORM_FOUND'];
			return;
		}

		// Move file and overwrite any existing image
		$file->move_file($arcade->config['unpack_game_path'], true, true);

		if (sizeof($file->error))
		{
			$file->remove();
			$error = array_merge($error, $file->error);
		}

		return $file->realname;
	}
}

?>
