<?php
/**
*
* @package acp
* @version $Id: acp_arcade_utilities.php 631 2008-12-08 13:13:37Z JRSweets $
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
class acp_arcade_utilities
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $file_functions;

		include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade_admin();

		$this->tpl_name = 'acp_arcade_utilities';
		$this->page_title = $user->lang['ACP_ARCADE_UTILITIES_' . strtoupper($mode)];

		switch ($mode)
		{
			case 'create_install':
				$this->create_install();
			break;

			case 'convert_install':
				$this->convert_install();
			break;

			case 'errors':
				$this->errors();
			break;

			case 'reports':
				$this->reports();
			break;

			case 'downloads':
				$this->downloads();
			break;

			case 'download_stats':
				$this->download_stats();
			break;

			case 'user_guide':
				$this->user_guide();
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}

		$l_title = $user->lang['ACP_ARCADE_UTILITIES_' . strtoupper($mode)];
		$l_title_explain = $user->lang['ACP_ARCADE_UTILITIES_' . strtoupper($mode) . '_EXPLAIN'];

		$template->assign_vars(array(
			'L_TITLE'					=> $l_title,
			'L_EXPLAIN'					=> $l_title_explain,
			)
		);
	}

	function create_install()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $file_functions;

		$form_key = 'acp_arcade_utilities';
		add_form_key($form_key);

		$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc(request_var('config', array('' => ''), true)) : array();

		$download = (isset($_POST['download'])) ? true : false;
		$downloadnew = (isset($_POST['downloadnew'])) ? true : false;

		$view = request_var('view', '');
		$view = ($view != '') ? true : false;
		$viewnew = request_var('viewnew', '');
		$viewnew = ($viewnew != '') ? true : false;

		$create = (isset($_POST['create'])) ? true : false;
		$update = (isset($_POST['update'])) ? true : false;

		$game_id = request_var('g', 0);

		$use_method = request_var('use_method', '');
		$methods = $arcade->compress_methods();

		$cfg_array['game_name'] = (isset($cfg_array['game_name'])) ? $cfg_array['game_name'] : '';
		$cfg_array['game_desc'] = (isset($cfg_array['game_desc'])) ? $cfg_array['game_desc'] : '';
		$cfg_array['game_image'] = (isset($cfg_array['game_image'])) ? $cfg_array['game_image'] : '';
		$cfg_array['game_swf'] = (isset($cfg_array['game_swf'])) ? $cfg_array['game_swf'] : '';
		$cfg_array['game_scorevar'] = (isset($cfg_array['game_scorevar'])) ? $cfg_array['game_scorevar'] : '';
		$cfg_array['game_files'] = (isset($cfg_array['game_files'])) ? $cfg_array['game_files'] : '';
		$cfg_array['game_width'] = (isset($cfg_array['game_width'])) ? $cfg_array['game_width'] : 550;
		$cfg_array['game_height'] = (isset($cfg_array['game_height'])) ? $cfg_array['game_height'] : 400;
		$cfg_array['game_type'] = (isset($cfg_array['game_type'])) ? $cfg_array['game_type'] : false;
		$cfg_array['game_scoretype'] = (isset($cfg_array['game_scoretype'])) ? $cfg_array['game_scoretype'] : false;

		$template->assign_vars(array(
			'S_IN_CREATE_INSTALL'		=> true,
			'GAME_NAME'					=> $cfg_array['game_name'],
			'GAME_DESC'					=> $cfg_array['game_desc'],
			'GAME_IMAGE'				=> $cfg_array['game_image'],
			'GAME_SWF'					=> $cfg_array['game_swf'],
			'GAME_SCOREVAR'				=> $cfg_array['game_scorevar'],
			'GAME_FILES'				=> $cfg_array['game_files'],
			'GAME_WIDTH'				=> $cfg_array['game_width'],
			'GAME_HEIGHT'				=> $cfg_array['game_height'],
			'GAME_TYPE_SELECT'			=> $arcade->game_type_select($cfg_array['game_type']),
			'GAME_SCORETYPE_SELECT'		=> $arcade->game_scoretype_select($cfg_array['game_scoretype']),
		));

		$install_new_file = $arcade->create_install_file($cfg_array, false);

		if ($create && !empty($cfg_array['game_swf']) && !empty($cfg_array['game_scorevar']))
		{
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}

			if ($arcade->create_install_folder($install_new_file, $cfg_array['game_swf']))
			{
				trigger_error('ARCADE_CREATE_INSTALL_FOLDER_FILE');
			}
			else
			{
				trigger_error('ARCADE_CREATE_INSTALL_FOLDER_FILE_ERROR', E_USER_WARNING);
			}
		}

		if ($downloadnew && !empty($cfg_array['game_swf']) && !empty($cfg_array['game_scorevar']))
		{
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}

			$arcade->download_install_file($install_new_file, $file_functions->remove_extension($cfg_array['game_swf']), $use_method, $methods);
			exit;
		}

		if ($viewnew)
		{
			$template->assign_vars(array(
				'S_VIEW_NEW_FILE'		=> true,
				'INSTALL_NEW_FILE'		=> utf8_htmlspecialchars($install_new_file),
			));
		}

		// Quick jump of all the games in the arcade...
		$first_gid = true;
		foreach ($arcade->all_games as $gid => $game)
		{
			if ($first_gid)
			{
				$first_gid = false;
				$game_id = ($game_id == 0) ?  $gid : $game_id;
			}

			$template->assign_block_vars('games', array(
				'GAME_ID' 		=> $gid,
				'GAME_NAME' 	=> $game['game_name'],
				'SELECTED'		=> ($gid == $game_id) ? ' selected="selected"' : '')
			);
		}

		// Quick jump of all the games in the arcade...
		if ($game_id > 0)
		{
			$game_info = $arcade->get_game_data($game_id);
			$install_file = $arcade->create_install_file($game_info);

			if ($update)
			{
				if ($arcade->update_install_file($game_id))
				{
					trigger_error($user->lang['ARCADE_GAME_UPDATED'] . adm_back_link($this->u_action));
				}
				else
				{
					trigger_error($user->lang['ARCADE_GAME_UPDATED_ERROR'] . adm_back_link($this->u_action), E_USER_WARNING);
				}
			}

			if ($download && $use_method)
			{
				if (!check_form_key($form_key))
				{
					trigger_error('FORM_INVALID', E_USER_WARNING);
				}

				$arcade->download_install_file($install_file, $file_functions->remove_extension($game_info['game_swf']), $use_method, $methods);
				exit;
			}

			if ($view)
			{
				$template->assign_vars(array(
					'S_VIEW_FILE'		=> true,
					'INSTALL_FILE'		=> utf8_htmlspecialchars($install_file),
				));
			}

			include($arcade->set_path($game_info['game_swf'], 'install'));
			if (!$this->verify_install_file($game_info, $game_data))
			{
				$template->assign_vars(array(
					'S_ERROR_GAME'	=> true,
				));
			}
		}

		$radio_buttons = '';
		foreach ($methods as $method)
		{
			$radio_buttons .= '<input type="radio"' . ((!$radio_buttons) ? ' id="use_method"' : '') . ' class="radio" value="' . $method . '" name="use_method" />&nbsp;' . $method . '&nbsp;';
		}

		$view_action = ($view) ? '&amp;view=true' : '';
		$view_action .= ($viewnew) ? '&amp;viewnew=true' : '';
		$template->assign_vars(array(
			'U_ACTION'					=> $this->u_action . $view_action,
			'RADIO_BUTTONS'				=> $radio_buttons,
		));
	}

	function convert_install()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;

		$form_key = 'acp_arcade_utilities';
		add_form_key($form_key);

		$download = (isset($_POST['download'])) ? true : false;

		$view = request_var('view', '');
		$view = ($view != '') ? true : false;

		$create = (isset($_POST['create'])) ? true : false;

		$use_method = request_var('use_method', '');
		$methods = $arcade->compress_methods();

		$ibp_config = '';
		if (isset($_POST['ibp_config']))
		{
			$ibp_config = (STRIP) ? stripslashes($_POST['ibp_config']) : $_POST['ibp_config'];
		}

		$game_type = request_var('game_type', 'IBPRO_GAME');
		$game_files = request_var('game_files', '', true);

		$template->assign_vars(array(
			'S_IN_CONVERT_INSTALL'		=> true,
			'IBP_CONFIG'				=> htmlentities($ibp_config),
			'GAME_TYPE'					=> $arcade->game_type_select($game_type, true),
			'GAME_FILES'				=> $game_files,
		));

		if ($ibp_config != '' && strpos($ibp_config, '$config') !== false)
		{
			$ibp_config = str_replace('$config', '$ibp_config', $ibp_config);
			@eval($ibp_config);

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
				'game_files'		=> $game_files,
			);

			$install_file = $arcade->create_install_file($data, false);

			if ($create)
			{
				if (!check_form_key($form_key))
				{
					trigger_error('FORM_INVALID', E_USER_WARNING);
				}

				if ($arcade->create_install_folder($install_file, $ibp_config['gname']))
				{
					trigger_error('ARCADE_CREATE_INSTALL_FOLDER_FILE');
				}
				else
				{
					trigger_error('ARCADE_CREATE_INSTALL_FOLDER_FILE_ERROR', E_USER_WARNING);
				}
			}

			if ($download && $use_method)
			{
				if (!check_form_key($form_key))
				{
					trigger_error('FORM_INVALID', E_USER_WARNING);
				}

				$arcade->download_install_file($install_file, $ibp_config['gname'], $use_method, $methods);
				exit;
			}

			if ($view)
			{
				$template->assign_vars(array(
					'S_VIEW_FILE'		=> true,
					'INSTALL_FILE'		=> utf8_htmlspecialchars($install_file),
				));
			}
		}

		$radio_buttons = '';
		foreach ($methods as $method)
		{
			$radio_buttons .= '<input type="radio"' . ((!$radio_buttons) ? ' id="use_method"' : '') . ' class="radio" value="' . $method . '" name="use_method" />&nbsp;' . $method . '&nbsp;';
		}

		$view_action = ($view) ? '&amp;view=true' : '';
		$template->assign_vars(array(
			'U_ACTION'					=> $this->u_action . $view_action,
			'RADIO_BUTTONS'				=> $radio_buttons,
		));

	}

	function downloads()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;

		$download_url = utf8_normalize_nfc(request_var('dl_url', ''));
		$start		= request_var('start', 0);
		$sort_cat = request_var('sc', 0);
		$sort_time = request_var('st', 0);
		$sort_key = request_var('sk', 'n');
		$sort_dir = request_var('sd', 'a');
		$hide_found = request_var('hide', 'n');

		if (isset($_POST['purge_dl_cache']))
		{
			$arcade->purge_download_cache();
		}

		if ($download_url != '')
		{
			$download_url = (strpos($download_url, 'http://') === false) ? 'http://' . $download_url : $download_url;
			$download_url = rtrim($download_url, '/');
		}

		$template->assign_vars(array(
			'S_IN_ARCADE_DOWNLOADS'		=> true,
			'U_ACTION'					=> $this->u_action,
			'DOWNLOAD_URL'				=> $download_url,
		));

		$recent_sites = $arcade->set_recent_sites();
		if ($download_url != '')
		{
			$download_data = $arcade->get_remote_data($download_url. "/arcade.php?mode=download&type=data");
			if (sizeof($download_data) && is_array($download_data))
			{
				$recent_sites = $arcade->set_recent_sites($download_url);

				$template->assign_vars(array(
					'DOWNLOAD_SITENAME'		=> sprintf($user->lang['ARCADE_DOWNLOADS_FROM'], $download_data['sitename']),
					'DOWNLOAD_MESSAGE'		=> (isset($download_data['message'])) ? $download_data['message'] : '',
				));

				$tar = $targz = $tarbz2 = $zip = false;
				$available_methods = array_intersect($arcade->compress_methods(), $download_data['methods']);
				foreach ($available_methods as $method)
				{
					switch ($method)
					{
						case '.zip':
							$zip = true;
						break;

						case '.tar':
							$tar = true;
						break;

						case '.tar.gz':
							$targz = true;
						break;

						case '.tar.bz2':
							$tarbz2 = true;
						break;

						default:
						break;
					}
				}

				$template->assign_vars(array(
					'S_ZIP'			=> $zip,
					'S_TAR'			=> $tar,
					'S_TARGZ'		=> $targz,
					'S_TARBZ2'		=> $tarbz2,
				));

				$total_games = $total_games_real = $total_found = 0;
				$download_list = $arcade->get_remote_data($download_url. "/arcade.php?mode=download&type=list&c=$sort_cat&start=$start&sk=$sort_key&st=$sort_time&sd=$sort_dir&per_page={$arcade->config['download_list_per_page']}");

				if (sizeof($download_list) && is_array($download_list))
				{
					foreach ($download_list['games'] as $row)
					{
						$total_games_real++;
						$game_found = false;
						if (file_exists($arcade->set_path($row['game_swf'], 'install')))
						{
							$total_found++;
							$game_found = true;
							if ($hide_found == 'y')
							{
								continue;
							}
						}

						$template->assign_block_vars('games', array(
							'S_GAME_FOUND'			=> $game_found,
							'U_DOWNLOAD'			=> $download_url . '/arcade.php?mode=download&type=acp&g=' . $row['game_id'],
							'GAME_NAME'				=> $row['game_name'],
							'GAME_DESC'				=> $row['game_desc'],
							'GAME_FILESIZE'			=> get_formatted_filesize($row['game_filesize']),
							'GAME_INSTALLDATE'		=> $user->format_date($row['game_installdate']),
						));
					}
				}

				$template->assign_vars(array(
					'S_ALL_INSTALLED'					=> ($total_games_real - $total_found > 0) ? false : true,

					'L_ARCADE_DOWNLOAD_TOTAL_GAMES'		=> (isset($download_data['categories'][$sort_cat])) ? sprintf($user->lang['ARCADE_DOWNLOAD_TOTAL_GAMES_CAT'], $download_data['categories'][$sort_cat]['cat_name']) : $user->lang['ARCADE_DOWNLOAD_TOTAL_GAMES'],

					'TOTAL_GAMES'						=> $arcade->number_format($download_list['total']),
					'GAMES_FOUND'						=> $total_found,
					'GAMES_NOT_FOUND'					=> $total_games_real - $total_found,
					'SORT_CAT_SELECT'					=> $this->sort_cat_select($sort_cat, $download_data['categories']),
					'SORT_TIME_SELECT'					=> $this->sort_time_select($sort_time),
					'SORT_KEY_SELECT'					=> $this->sort_key_select($sort_key),
					'SORT_DIR_SELECT'					=> $this->sort_dir_select($sort_dir),
					'HIDE_FOUND_SELECT'					=> $this->hide_found_select($hide_found),

					'S_ON_PAGE'							=> on_page($download_list['total'], $arcade->config['download_list_per_page'], $start),
					'PAGINATION'						=> generate_pagination($this->u_action . '&amp;dl_url=' .  urlencode(str_replace('&amp;', '&', $download_url)) . "&amp;sc=$sort_cat&amp;st=$sort_time&amp;sk=$sort_key&amp;sd=$sort_dir&amp;hide=$hide_found", $download_list['total'], $arcade->config['download_list_per_page'], $start, true),
				));
			}
		}

		$template->assign_vars(array(
			'S_RECENT_SITES'	=> (sizeof($recent_sites)) ? true : false,
		));

		foreach ($recent_sites as $sites)
		{
			$template->assign_block_vars('recent_sites', array(
				'RECENT_SITES'	=> $sites,
			));
		}
	}

	function download_stats()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;
        
		$phpbb_admin_path = PHPBB3_ADMIN_DIR;
		$phpbb_root_path = PHPBB3_ROOT_DIR;
		
		$action		= request_var('action', '');
		$start		= request_var('start', 0);

		$template->assign_vars(array(
			'S_IN_DOWNLOAD_STATS'		=> true,
		));

		$reset_download = (isset($_POST['reset_download'])) ? true : false;

		if ($reset_download)
		{
			if (confirm_box(true))
			{
				$arcade->reset('download');
				$cache->destroy('_arcade_totals');
				add_log('admin', 'LOG_ARCADE_RESET_DOWNLOAD');
				trigger_error($user->lang['ARCADE_RESET_DOWNLOAD_DONE'] . adm_back_link($this->u_action));
			}
			else
			{
				$s_hidden_fields = array(
					'reset_download'	=> true,
				);
				confirm_box(false, 'RESET_DOWNLOAD_STATS', build_hidden_fields($s_hidden_fields));
			}
		}

		switch ($action)
		{
			case 'view':
				$template->assign_vars(array(
					'S_IN_DOWNLOAD_STATS_VIEW'		=> true,
				));

				$user_id = request_var('u', 0);
				$sql = 'SELECT username, user_id, user_colour
					FROM ' . PHPBB3_USERS_TABLE . '
					WHERE user_id = ' . $user_id;
				$result = $db->sql_query($sql);
				$user_data = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$sort_key	= request_var('sk', 'g');
				$sort_dir	= request_var('sd', 'a');

				// Sorting
				$limit_days = array();
				$sort_by_text = array('g' => $user->lang['ARCADE_GAME_NAME'], 't' => $user->lang['ARCADE_DOWNLOAD_TOTAL'], 'd' => $user->lang['ARCADE_DOWNLOAD_DATE']);
				$sort_by_sql = array('g' => 'g.game_name_clean', 't' => 'total', 'd' => 'download_time');

				$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
				gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

				// Define where and sort sql for use in displaying logs
				$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

				$sql_array = array(
					'SELECT'	=> 'd.total, d.game_id, d.download_time, g.game_name, g.game_name_clean, g.game_image',

					'FROM'		=> array(
						ARCADE_DOWNLOAD_TABLE	=> 'd',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
							'ON'	=> 'd.game_id = g.game_id'
						),
					),

					'WHERE'		=> 'd.user_id = ' . $user_id,

					'GROUP_BY'	=> 'd.total, d.game_id, d.download_time, g.game_name, g.game_name_clean, g.game_image',

					'ORDER_BY'	=> $sql_sort,
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);
				$row = $db->sql_fetchrowset($result);
				$db->sql_freeresult($result);

				$row_count = $arcade->get_total('download_stats', $user_id);
				if (!$row_count)
				{
					trigger_error($user->lang['NO_ARCADE_DOWNLOAD_STATS_USER'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				foreach ($row as $item)
				{
					$template->assign_block_vars('games', array(
						'DATE'			=> ($item['download_time']) ? $user->format_date($item['download_time']) : $user->lang['NA'],
						'GAME_IMAGE'	=> ($item['game_image']) ? '<img src="' . append_sid("{$phpbb_root_path}arcade.$phpEx", "img={$item['game_image']}") . '" width="25" height="25" alt="" />' : '',
						'U_GAME'		=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&mode=edit_games&action=edit&g={$item['game_id']}", false),
						'GAME_NAME'		=> $item['game_name'],
						'TOTAL'			=> $item['total'],
					));
				}

				$template->assign_vars(array(
					'U_ACTION'					=> $this->u_action . "&amp;action=$action&amp;u=$user_id",
					'S_SORT_KEY'				=> $s_sort_key,
					'S_SORT_DIR'				=> $s_sort_dir,
					'DOWNLOAD_STATS_USER'		=> sprintf($user->lang['ARCADE_DOWNLOAD_USER_STATS'], $arcade->get_username_string('full', $user_data['user_id'], $user_data['username'], $user_data['user_colour'])),
					'S_ON_PAGE'					=> on_page($row_count, $arcade->config['acp_items_per_page'], $start),
					'PAGINATION'				=> generate_pagination($this->u_action . "&amp;action=view&amp;u=$user_id&amp;sk=$sort_key&amp;sd=$sort_dir", $row_count, $arcade->config['acp_items_per_page'], $start, true),
				));
			break;

			default:

				$sort_key	= request_var('sk', 'g');
				$sort_dir	= request_var('sd', 'a');

				// Sorting
				$limit_days = array();
				$sort_by_text = array('u' => $user->lang['SORT_USERNAME'], 't' => $user->lang['ARCADE_DOWNLOAD_TOTAL']);
				$sort_by_sql = array('u' => 'u.username_clean', 't' => 'total');

				$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
				gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

				// Define where and sort sql for use in displaying logs
				$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

				$sql_array = array(
					'SELECT'	=> 'SUM(d.total) as total, u.username, u.username_clean, u.user_colour, d.user_id',

					'FROM'		=> array(
						ARCADE_DOWNLOAD_TABLE	=> 'd',
					),

					'LEFT_JOIN'	=> array(
						array(
							'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
							'ON'	=> 'd.user_id = u.user_id'
						),
					),

					'GROUP_BY'	=> 'd.user_id, u.username, u.username_clean, u.user_colour',

					'ORDER_BY'	=> $sql_sort,
				);

				$sql = $db->sql_build_query('SELECT', $sql_array);
				$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);
				$row = $db->sql_fetchrowset($result);
				$db->sql_freeresult($result);

				$row_count = $arcade->get_total('download_stats');
				if (!$row_count)
				{
					trigger_error($user->lang['NO_ARCADE_DOWNLOAD_STATS'], E_USER_WARNING);
				}

				foreach ($row as $item)
				{
					$template->assign_block_vars('users', array(
						'USERNAME'			=> get_username_string('full', $item['user_id'], $item['username'], $item['user_colour'], false, "{$this->u_action}&amp;action=view"),
						'TOTAL'				=> $item['total'],
					));
				}

				$template->assign_vars(array(
					'U_ACTION'		=> $this->u_action,
					'S_SORT_KEY'	=> $s_sort_key,
					'S_SORT_DIR'	=> $s_sort_dir,
					'S_ON_PAGE'		=> on_page($row_count, $arcade->config['acp_items_per_page'], $start),
					'PAGINATION'	=> generate_pagination($this->u_action . "&amp;sk=$sort_key&amp;sd=$sort_dir", $row_count, $arcade->config['acp_items_per_page'], $start, true),
				));
			break;
		}
	}

	function reports()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode;
        
		$phpbb_admin_path = PHPBB3_ADMIN_DIR;
        $phpbb_root_path = PHPBB3_ROOT_DIR;
		
		$start		= request_var('start', 0);
		$action		= request_var('action', '');
		$ip 		= request_var('ip', 'ip');
		$deletemark = (!empty($_POST['delmarked'])) ? true : false;
		$deleteall	= (!empty($_POST['delall'])) ? true : false;
		$marked		= request_var('mark', array(0));

		// Sort keys
		$sort_days	= request_var('st', 0);
		$sort_key	= request_var('sk', 'd');
		$sort_dir	= request_var('sd', 'd');

		$template->assign_vars(array(
			'S_IN_ARCADE_REPORTS'		=> true,
		));

		switch ($action)
		{
			case 'whois':
				$user->add_lang('acp/users');
				$this->page_title = 'WHOIS';
				$this->tpl_name = 'simple_body';

				$report_ip = request_var('report_ip', '');
				$domain = gethostbyaddr($report_ip);
				$ipwhois = '';

				include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);

				if ($ipwhois = user_ipwhois($report_ip))
				{
					$ipwhois = preg_replace('#(\s)([\w\-\._\+]+@[\w\-\.]+)(\s)#', '\1<a href="mailto:\2">\2</a>\3', $ipwhois);
					$ipwhois = preg_replace('#(\s)(http:/{2}[^\s]*)(\s)#', '\1<a href="\2" target="_blank">\2</a>\3', $ipwhois);
				}

				$template->assign_vars(array(
					'MESSAGE_TITLE'		=> sprintf($user->lang['IP_WHOIS_FOR'], $domain),
					'MESSAGE_TEXT'		=> nl2br($ipwhois))
				);

				return;
			break;

			default:
			break;
		}

		// Delete entries if requested and able
		if ($deletemark || $deleteall)
		{
			if (confirm_box(true))
			{
				$where_sql = '';

				if ($deletemark && sizeof($marked))
				{
					$sql_in = array();
					foreach ($marked as $mark)
					{
						$sql_in[] = $mark;
					}
					$where_sql = $db->sql_in_set('report_id', $sql_in);
					unset($sql_in);
				}

				if ($where_sql || $deleteall)
				{
					$sql = 'DELETE FROM ' . ARCADE_PHPBB3_REPORTS_TABLE;
					if ($where_sql)
					{
						$sql .= " WHERE $where_sql";
					}
					$db->sql_query($sql);
					add_log('admin', 'LOG_ARCADE_CLEAR_' . strtoupper($mode));
				}
			}
			else
			{
				confirm_box(false, $user->lang['PHPBB3_CONFIRM_OPERATION'], build_hidden_fields(array(
					'start'		=> $start,
					'delmarked'	=> $deletemark,
					'delall'	=> $deleteall,
					'mark'		=> $marked,
					))
				);
			}
		}

		$sql = 'SELECT COUNT(*) as total FROM ' . ARCADE_PHPBB3_REPORTS_TABLE;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$report_count = $row['total'];

		// Sorting
		$limit_days = array(0 => $user->lang['ALL_ENTRIES'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 365 => $user->lang['1_YEAR']);
		$sort_by_text = array('u' => $user->lang['SORT_USERNAME'], 'i' => $user->lang['SORT_IP'], 'g' => $user->lang['ARCADE_GAME_NAME'], 't' => $user->lang['ARCADE_TYPE'], 'd' => $user->lang['SORT_DATE']);
		$sort_by_sql = array('u' => 'u.username_clean', 'i' => 'r.report_ip', 'g' => 'g.game_name_clean', 't' => 'r.report_type', 'd' => 'r.report_time');

		$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
		gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

		// Define where and sort sql for use in displaying logs
		$sql_where = ($sort_days) ? (time() - ($sort_days * 86400)) : 0;
		$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

		$sql_array = array(
			'SELECT'	=> 'r.*, u.username, u.user_colour, u.user_id, g.game_name, g.game_image',

			'FROM'		=> array(
				ARCADE_PHPBB3_REPORTS_TABLE	=> 'r',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
					'ON'	=> 'r.user_id = u.user_id'
				),
				array(
					'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
					'ON'	=> 'r.game_id = g.game_id'
				),
			),

			'ORDER_BY'	=> $sql_sort,
		);

		if ($sql_where)
		{
			$sql_array['WHERE'] = 'report_time >= ' . $sql_where;
		}

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);
		$report_data = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		foreach ($report_data as $row)
		{
			$template->assign_block_vars('reports', array(
				'REPORT_ID'					=> $row['report_id'],
				'USERNAME'					=> $arcade->get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'U_GAME'					=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&mode=edit_games&action=edit&g={$row['game_id']}", false),
				'GAME_NAME'					=> $row['game_name'],
				'GAME_IMAGE'				=> ($row['game_image']) ? $phpbb_root_path . "arcade.$phpEx?img=" . $row['game_image'] : '',
				'REPORT_TYPE'				=> $arcade->display_report_type($row['report_type']),
				'REPORT_DESC'				=> generate_text_for_display($row['report_desc'], $row['report_desc_uid'], $row['report_desc_bitfield'], $row['report_desc_options']),
				'REPORT_TIME'				=> $user->format_date($row['report_time']),
				'REPORT_IP' 				=> ($ip == 'hostname') ? gethostbyaddr($row['report_ip']) : $row['report_ip'],
				'U_REPORT_IP'				=> $this->u_action . "&amp;ip=" . (($ip == 'ip') ? 'hostname' : 'ip'),
				'U_WHOIS'					=> $this->u_action . "&amp;action=whois&amp;report_ip={$row['report_ip']}",
			));
		}

		$template->assign_vars(array(
			'S_LIMIT_DAYS'	=> $s_limit_days,
			'S_SORT_KEY'	=> $s_sort_key,
			'S_SORT_DIR'	=> $s_sort_dir,
			'U_ACTION'		=> $this->u_action,
			'S_ON_PAGE'		=> on_page($report_count, $arcade->config['acp_items_per_page'], $start),
			'PAGINATION'	=> generate_pagination($this->u_action . "&amp;sk=$sort_key&amp;sd=$sort_dir", $report_count, $arcade->config['acp_items_per_page'], $start, true),
		));
	}

	function errors()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode;
		
		$phpbb_admin_path = PHPBB3_ADMIN_DIR;

		$start		= request_var('start', 0);
		$action		= request_var('action', '');
		$ip 		= request_var('ip', 'ip');
		$deletemark = (!empty($_POST['delmarked'])) ? true : false;
		$deleteall	= (!empty($_POST['delall'])) ? true : false;
		$marked		= request_var('mark', array(0));

		// Sort keys
		$sort_days	= request_var('st', 0);
		$sort_key	= request_var('sk', 't');
		$sort_dir	= request_var('sd', 'd');

		$template->assign_vars(array(
			'S_IN_ARCADE_ERRORS'		=> true,
		));

		switch ($action)
		{
			case 'whois':
				$user->add_lang('acp/users');
				$this->page_title = 'WHOIS';
				$this->tpl_name = 'simple_body';

				$error_ip = request_var('error_ip', '');
				$domain = gethostbyaddr($error_ip);
				$ipwhois = '';

				include(PHPBB3_INCLUDE_DIR . 'functions_user.' . $phpEx);

				if ($ipwhois = user_ipwhois($error_ip))
				{
					$ipwhois = preg_replace('#(\s)([\w\-\._\+]+@[\w\-\.]+)(\s)#', '\1<a href="mailto:\2">\2</a>\3', $ipwhois);
					$ipwhois = preg_replace('#(\s)(http:/{2}[^\s]*)(\s)#', '\1<a href="\2" target="_blank">\2</a>\3', $ipwhois);
				}

				$template->assign_vars(array(
					'MESSAGE_TITLE'		=> sprintf($user->lang['IP_WHOIS_FOR'], $domain),
					'MESSAGE_TEXT'		=> nl2br($ipwhois))
				);

				return;
			break;

			default:
			break;
		}

		// Delete entries if requested and able
		if ($deletemark || $deleteall)
		{
			if (confirm_box(true))
			{
				$where_sql = '';

				if ($deletemark && sizeof($marked))
				{
					$sql_in = array();
					foreach ($marked as $mark)
					{
						$sql_in[] = $mark;
					}
					$where_sql = $db->sql_in_set('error_id', $sql_in);
					unset($sql_in);
				}

				if ($where_sql || $deleteall)
				{
					$sql = 'DELETE FROM ' . ARCADE_ERRORS_TABLE;
					if ($where_sql)
					{
						$sql .= " WHERE $where_sql";
					}
					$db->sql_query($sql);
					add_log('admin', 'LOG_ARCADE_CLEAR_' . strtoupper($mode));
				}
			}
			else
			{
				confirm_box(false, $user->lang['PHPBB3_CONFIRM_OPERATION'], build_hidden_fields(array(
					'start'		=> $start,
					'delmarked'	=> $deletemark,
					'delall'	=> $deleteall,
					'mark'		=> $marked,
					))
				);
			}
		}

		$sql = 'SELECT COUNT(*) as total FROM ' . ARCADE_ERRORS_TABLE;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$error_count = $row['total'];

		// Sorting
		$limit_days = array(0 => $user->lang['ALL_ENTRIES'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 365 => $user->lang['1_YEAR']);
		$sort_by_text = array('u' => $user->lang['SORT_USERNAME'], 'i' => $user->lang['SORT_IP'], 'g' => $user->lang['ARCADE_GAME_NAME'], 's' => $user->lang['ARCADE_SCORE'], 'pt' => $user->lang['ARCADE_CHAMPION_SPENT'], 'gt' => $user->lang['ARCADE_GAME_TYPE'], 'sgt' => $user->lang['ARCADE_SUBMITTED_GAME_TYPE'], 't' => $user->lang['SORT_DATE']);
		$sort_by_sql = array('u' => 'u.username_clean', 'i' => 'e.error_ip', 'g' => 'g.game_name_clean', 's' => 'e.score', 'pt' => 'e.played_time', 'gt' => 'e.game_type', 'sgt' => 'e.submitted_game_type', 't' => 'e.error_date');

		$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
		gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

		// Define where and sort sql for use in displaying logs
		$sql_where = ($sort_days) ? (time() - ($sort_days * 86400)) : 0;
		$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

		$sql_array = array(
			'SELECT'	=> 'e.*, u.username, u.user_colour, u.user_id, g.game_name',

			'FROM'		=> array(
				ARCADE_ERRORS_TABLE	=> 'e',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
					'ON'	=> 'e.user_id = u.user_id'
				),
				array(
					'FROM'	=> array(ARCADE_GAMES_TABLE => 'g'),
					'ON'	=> 'e.game_id = g.game_id'
				),
			),

			'ORDER_BY'	=> $sql_sort,
		);

		if ($sql_where)
		{
			$sql_array['WHERE'] = 'error_date >= ' . $sql_where;
		}

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);
		$error_data = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		foreach ($error_data as $row)
		{
			$template->assign_block_vars('errors', array(
				'S_LINK_SCORE'				=> (!$row['user_id'] || $row['user_id'] == ANONYMOUS || $row['error_type'] == ARCADE_ERROR_GAMETYPE) ? false : true,
				'ERROR_ID'					=> $row['error_id'],
				'USERNAME'					=> $arcade->get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
				'U_GAME'					=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&mode=edit_games&action=edit&g={$row['game_id']}", false),
				'GAME_NAME'					=> $row['game_name'],
				'SCORE'						=> $arcade->number_format($row['score']),
				'U_SCORE'					=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&mode=edit_scores&action=edit&g={$row['game_id']}&u={$row['user_id']}", false),
				'PLAYED_TIME'				=> $arcade->time_format($row['played_time']),
				'GAME_TYPE'					=> $arcade->display_game_type($row['game_type']),
				'SUBMITTED_GAME_TYPE'		=> $arcade->display_game_type($row['submitted_game_type']),
				'ERROR_TYPE'				=> $arcade->display_error_type($row['error_type']),
				'ERROR_DATE'				=> $user->format_date($row['error_date']),
				'ERROR_IP' 					=> ($ip == 'hostname') ? gethostbyaddr($row['error_ip']) : $row['error_ip'],
				'U_ERROR_IP'				=> $this->u_action . "&amp;ip=" . (($ip == 'ip') ? 'hostname' : 'ip'),
				'U_WHOIS'					=> $this->u_action . "&amp;action=whois&amp;error_ip={$row['error_ip']}",
			));
		}

		$template->assign_vars(array(
			'S_LIMIT_DAYS'	=> $s_limit_days,
			'S_SORT_KEY'	=> $s_sort_key,
			'S_SORT_DIR'	=> $s_sort_dir,
			'U_ACTION'		=> $this->u_action,
			'S_ON_PAGE'		=> on_page($error_count, $arcade->config['acp_items_per_page'], $start),
			'PAGINATION'	=> generate_pagination($this->u_action . "&amp;sk=$sort_key&amp;sd=$sort_dir", $error_count, $arcade->config['acp_items_per_page'], $start, true),
		));
	}

	function user_guide()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx, $mode;

        $phpbb_admin_path = PHPBB3_ADMIN_DIR;
		
		$template->assign_vars(array(
			'S_IN_ARCADE_USERGUIDE'		=> true,
			'L_BACK_TO_TOP'				=> $user->lang['BACK_TO_TOP'],
			'ICON_BACK_TO_TOP'			=> '<img src="' . $phpbb_admin_path . 'images/icon_up.gif" style="vertical-align: middle;" alt="' . $user->lang['BACK_TO_TOP'] . '" title="' . $user->lang['BACK_TO_TOP'] . '" />',
		));

		$user->add_lang('mods/arcade', false, true);

		// Pull the array data from the lang pack
		foreach ($user->help as $help_ary)
		{
			if ($help_ary[0] == '--')
			{
				$template->assign_block_vars('userguide_block', array(
					'BLOCK_TITLE'		=> $help_ary[1])
				);

				continue;
			}

			$template->assign_block_vars('userguide_block.userguide_row', array(
				'USERGUIDE_QUESTION'		=> $help_ary[0],
				'USERGUIDE_ANSWER'			=> $help_ary[1])
			);
		}
	}

	function verify_install_file($db_info, $file_info)
	{
		foreach ($file_info as $key => $value)
		{
			if ($key == 'game_files' || is_array($value))
			{
				$db_info[$key] = unserialize($db_info[$key]);
			}

			if ($db_info[$key] !== $value)
			{
				return false;
			}
		}
		return true;
	}

	function sort_time_select($value)
	{
		global $user;

		$limit_time = array(0 => $user->lang['ARCADE_ALL_GAMES'], 1 => $user->lang['1_DAY'], 7 => $user->lang['7_DAYS'], 14 => $user->lang['2_WEEKS'], 30 => $user->lang['1_MONTH'], 90 => $user->lang['3_MONTHS'], 180 => $user->lang['6_MONTHS'], 365 => $user->lang['1_YEAR']);

		$s_limit_time = '';
		foreach ($limit_time as $time => $text)
		{
			$selected = ($value == $time) ? ' selected="selected"' : '';
			$s_limit_time .= '<option value="' . $time . '"' . $selected . '>' . $text . '</option>';
		}
		return $s_limit_time;
	}

	function sort_cat_select($selected, $data)
	{
		global $user;

		$options = '<option value="0"' . ((!$selected) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_ALL_CATEGORIES'] . '</options>';
		foreach ($data as $value)
		{
			$options .= '<option value="' . $value['cat_id'] . '"' . (($value['cat_id'] == $selected) ? ' selected="selected"' : '') . '>' . $value['cat_name'] . '</options>';
		}
		return $options;
	}

	function sort_key_select($value)
	{
		global $user;

		return '<option value="n"'. (($value == 'n') ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAME_NAME'] . '</option><option value="d"' . (($value == 'd') ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_DATE'] . '</option>';
	}

	function sort_dir_select($value)
	{
		global $user;

		return '<option value="a"'. (($value == 'a') ? ' selected="selected"' : '') . '>' . $user->lang['ASCENDING'] . '</option><option value="d"' . (($value == 'd') ? ' selected="selected"' : '') . '>' . $user->lang['DESCENDING'] . '</option>';
	}

	function hide_found_select($value)
	{
		global $user;

		return '<option value="y"'. (($value == 'y') ? ' selected="selected"' : '') . '>' . $user->lang['YES'] . '</option><option value="n"' . (($value == 'n') ? ' selected="selected"' : '') . '>' . $user->lang['NO'] . '</option>';
	}
}

?>