<?php
/**
*
* @package acp
* @version $Id: acp_arcade.php 658 2008-12-11 01:01:27Z JRSweets $
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
class acp_arcade
{
	var $u_action;
	var $new_config = array();

	function main($id, $mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;

		include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade_admin();

		$this->tpl_name = 'acp_arcade';
		$version_check = (isset($_POST['version_check'])) ? true : false;
		if ($version_check)
		{
			$mode =  'version';
		}

		switch ($mode)
		{
			case 'settings':
			case 'game':
			case 'feature':
			case 'page':
			case 'path':			
				$this->manage_settings($mode);
			break;

			case 'version':
				$this->manage_version_check();
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}
	}

	function manage_settings($mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;

		$form_key = 'acp_arcade';
		add_form_key($form_key);

		$update		= (isset($_POST['update'])) ? true : false;
		$template->assign_var('S_ARCADE_SETTINGS', true);
		
		switch ($mode)
		{
			case 'settings':
				$display_vars = array(
					'title'			=> 'ACP_ARCADE_SETTINGS',
					'vars'	=> array(
						'legend1'					=> 'ACP_ARCADE_VERSION_INFO',
						'version'					=> array('lang' => 'ARCADE_VERSION', 	'validate' => 'string', 'type' => 'custom', 'method' => 'arcade_version', 'explain' => true),
						
						'legend2'					=> 'ACP_ARCADE_SETTINGS_GENERAL',
						'arcade_disable'			=> array('lang' => 'DISABLE_ARCADE',				'validate' => 'bool',		'type' => 'custom',  		'explain' => true, 'method' => 'arcade_disable'),
						'arcade_disable_msg'		=> false,
						'auto_disable'				=> array('lang' => 'ARCADE_AUTO_DISABLE',			'validate' => 'bool',		'type' => 'radio:yes_no', 	'explain' => true),
						'auto_disable_start'		=> array('lang' => 'ARCADE_AUTO_DISABLE_START',		'validate' => 'string', 	'type' => 'text:5:5', 		'explain' => true),
						'auto_disable_end'			=> array('lang' => 'ARCADE_AUTO_DISABLE_END',		'validate' => 'string', 	'type' => 'text:5:5', 		'explain' => true),
						'download_list'				=> array('lang' => 'ARCADE_DOWNLOAD_LIST', 			'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'download_list_message'		=> array('lang' => 'ARCADE_DOWNLOAD_LIST_MESSAGE',	'validate' => 'string', 	'type' => 'textarea:8:25', 	'explain' => true),
						'new_games_delay'			=> array('lang' => 'ARCADE_NEW_GAMES_DELAY',		'validate' => 'int', 		'type' => 'text:3:4', 		'explain' => true),
						'flash_version'				=> array('lang' => 'ARCADE_ACP_FLASH_VERSION',		'validate' => 'int', 		'type' => 'text:3:4', 		'explain' => true),
						'parse_bbcode'				=> array('lang' => 'ARCADE_COMMENTS_BBCODE', 		'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'parse_smilies'				=> array('lang' => 'ARCADE_COMMENTS_SMILIES', 		'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'parse_links'				=> array('lang' => 'ARCADE_COMMENTS_LINKS', 		'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'played_games'				=> array('lang' => 'ARCADE_PLAYED_GAMES', 			'validate' => 'bool', 		'type' => 'radio:yes_no', 	'explain' => true),
						'played_colour'				=> array('lang' => 'ARCADE_PLAYED_GAMES_COLOUR',	'validate' => 'string', 	'type' => 'text:7:6', 		'explain' => true),
						'cache_time'				=> array('lang' => 'ARCADE_CACHE_TIME',				'validate' => 'int',		'type' => 'text:4:3', 		'explain' => true, 	'append' => ' ' . $user->lang['HOURS']),
						'online_time'				=> array('lang' => 'ARCADE_ONLINE_TIME',			'validate' => 'int',		'type' => 'text:4:3', 		'explain' => true, 	'append' => ' ' . $user->lang['MINUTES']),				
					)
				);

				if ($arcade->points['installed'])
				{
					$display_vars['vars'] += array(
						'legend3'			=> 'ACP_ARCADE_POINTS',
						'use_points'		=> array('lang' => 'ARCADE_USE_POINTS', 			'validate' => 'bool', 		'type' => 'custom', 'method' => 'points_detect', 'explain' => true),
					);

					if ($arcade->points['type'] == CASH_MOD)
					{
						$display_vars['vars'] += array(
							'cm_currency_id'		=> array('lang' => 'ARCADE_CM_CURRENCY',  'validate' => 'string', 'type' => 'select', 'method' => 'cm_currency_select', 'explain' => true),
						);
					}

					$display_vars['vars'] += array(
						'game_cost'			=> array('lang' => 'ARCADE_GLOBAL_GAME_COST', 		'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
						'game_reward'		=> array('lang' => 'ARCADE_GLOBAL_GAME_REWARD',		'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
						'use_jackpot'		=> array('lang' => 'ARCADE_GLOBAL_USE_JACKPOT', 	'validate' => 'bool', 			'type' => 'radio:yes_no', 		'explain' => true),				
						'jackpot_limit'		=> array('lang' => 'ARCADE_JACKPOT_LIMIT',			'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),
						'jackpot_minimum'	=> array('lang' => 'ARCADE_JACKPOT_MINIMUM',		'validate' => 'string', 		'type' => 'text:10:10', 		'explain' => true),			
					);
				}
			
			break;
			
			case 'game':
				$display_vars = array(
					'title'			=> 'ACP_ARCADE_SETTINGS_GAME',
					'vars'	=> array(
						'legend1'					=> 'ACP_ARCADE_SETTINGS_GAME',
						'game_zero_negative_score'	=> array('lang' => 'ARCADE_GAME_ZERO_NEGATIVE_SCORE',		'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'game_autosize'				=> array('lang' => 'ARCADE_GLOBAL_GAME_AUTOSIZE',			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'game_width'				=> array('lang' => 'ARCADE_GLOBAL_GAME_WIDTH',				'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'game_height'				=> array('lang' => 'ARCADE_GLOBAL_GAME_HEIGHT',				'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'override_user_sort'		=> array('lang' => 'ARCADE_OVERRIDE_USER_SORT', 			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'games_sort_order'			=> array('lang' => 'ARCADE_GAMES_SORT_ORDER',  				'validate' => 'string', 'type' => 'select', 		'explain' => true,	'method' => 'games_sort_order_select'),
						'games_sort_dir'			=> array('lang' => 'ARCADE_GAMES_SORT_DIR',  				'validate' => 'string', 'type' => 'select', 		'explain' => true,	'method' => 'games_sort_dir_select'),
						'games_per_page'			=> array('lang' => 'ARCADE_GAMES_PER_PAGE',					'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'display_desc'				=> array('lang' => 'ARCADE_DISPLAY_DESC', 					'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'resolution_select'			=> array('lang' => 'ARCADE_RESOLUTION_SELECT', 				'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
					)
				);
			break;
	
			case 'feature':
				$display_vars = array(
					'title'			=> 'ACP_ARCADE_SETTINGS_FEATURE',
					'vars'	=> array(
						'legend1'				=> 'ACP_ARCADE_SETTINGS_PM',
						'send_arcade_pm'		=> array('lang' => 'ARCADE_SEND_PM', 	'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'pm_subject'			=> array('lang' => 'ARCADE_PM_SUBJECT',	'validate' => 'string', 'type' => 'textarea:5:25', 	'explain' => true),
						'pm_message'			=> array('lang' => 'ARCADE_PM_MESSAGE',	'validate' => 'string', 'type' => 'textarea:8:25', 	'explain' => true),

						'legend2'				=> 'ACP_ARCADE_SETTINGS_ANNOUNCE',
						'announce_game'			=> array('lang' => 'ARCADE_ANNOUNCE_GAME', 		'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'announce_forum'		=> array('lang' => 'ARCADE_ANNOUNCE_FORUM',  	'validate' => 'string', 'type' => 'select', 		'explain' => true, 'method' => 'arcade_announce_game'),
						'announce_subject'		=> array('lang' => 'ARCADE_ANNOUNCE_SUBJECT',	'validate' => 'string', 'type' => 'textarea:5:25', 	'explain' => true),
						'announce_message'		=> array('lang' => 'ARCADE_ANNOUNCE_MESSAGE',	'validate' => 'string', 'type' => 'textarea:8:25', 	'explain' => true),

						'legend3'						=> 'ACP_ARCADE_SETTINGS_PLAY',
						'limit_play'					=> array('lang' => 'ARCADE_LIMIT_PLAY',  				'validate' => 'int', 'type' => 'select',  	'explain' => true, 'method' => 'arcade_limit_play_select'),
						'limit_play_total_posts'		=> array('lang' => 'ARCADE_LIMIT_PLAY_TOTAL_POSTS',		'validate' => 'int', 'type' => 'text:3:4', 	'explain' => true),
						'limit_play_posts'				=> array('lang' => 'ARCADE_LIMIT_PLAY_POSTS',			'validate' => 'int', 'type' => 'text:3:4', 	'explain' => true),
						'limit_play_days'				=> array('lang' => 'ARCADE_LIMIT_PLAY_DAYS',			'validate' => 'int', 'type' => 'text:3:4', 	'explain' => true),
					)
				);
			
			break;
			
			case 'page':
				$display_vars = array(
					'title'			=> 'ACP_ARCADE_SETTINGS_PAGE',
					'vars'	=> array(
						'legend1'					=> 'ACP_ARCADE_SETTINGS_PAGE',
						'display_viewtopic'			=> array('lang' => 'ARCADE_DISPLAY_VIEWTOPIC', 			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'display_memberlist'		=> array('lang' => 'ARCADE_DISPLAY_MEMBERLIST', 		'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'acp_items_per_page'		=> array('lang' => 'ARCADE_ACP_ITEMS_PER_PAGE', 		'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),					
						'download_list_per_page'	=> array('lang' => 'ARCADE_DOWNLOAD_LIST_PER_PAGE',		'validate' => 'int', 	'type' => 'select', 		'explain' => true, 'method' => 'download_list_per_page_select'),
						'arcade_leaders_header'		=> array('lang' => 'ARCADE_LEADERS_HEADER',				'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),						
						'newest_games'				=> array('lang' => 'ARCADE_NEWEST_GAMES',				'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'latest_highscores'			=> array('lang' => 'ARCADE_LATEST_HIGHSCORES',			'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'game_scores'				=> array('lang' => 'ARCADE_TOTAL_GAME_SCORES',			'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						
						'legend2'				=> 'ACP_ARCADE_SETTINGS_PAGE_INDEX',
						'welcome_index'			=> array('lang' => 'ARCADE_WELCOME_INDEX', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'search_index'			=> array('lang' => 'ARCADE_SEARCH_INDEX', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'links_index'			=> array('lang' => 'ARCADE_LINKS_INDEX', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						
						'legend3'				=> 'ACP_ARCADE_SETTINGS_PAGE_CATS',
						'welcome_cats'			=> array('lang' => 'ARCADE_WELCOME_CATS', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'search_cats'			=> array('lang' => 'ARCADE_SEARCH_CATS', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'links_cats'			=> array('lang' => 'ARCADE_LINKS_CATS', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						
						'legend4'				=> 'ACP_ARCADE_SETTINGS_PAGE_STATS',
						'welcome_stats'			=> array('lang' => 'ARCADE_WELCOME_STATS', 			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'search_stats'			=> array('lang' => 'ARCADE_SEARCH_STATS', 			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'links_stats'			=> array('lang' => 'ARCADE_LINKS_STATS', 			'validate' => 'bool', 	'type' => 'radio:yes_no', 	'explain' => true),
						'most_popular'			=> array('lang' => 'ARCADE_MOST_POPULAR',			'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'least_popular'			=> array('lang' => 'ARCADE_LEAST_POPULAR',			'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'most_downloaded'		=> array('lang' => 'ARCADE_MOST_DOWNLOADED',		'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'least_downloaded'		=> array('lang' => 'ARCADE_LEAST_DOWNLOADED',		'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'longest_held_scores'	=> array('lang' => 'ARCADE_LONGEST_HELD_SCORES',	'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
						'stat_items_per_page'	=> array('lang' => 'ARCADE_STAT_ITEMS_PER_PAGE',	'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),						
						'arcade_leaders'		=> array('lang' => 'ARCADE_LEADERS',				'validate' => 'int', 	'type' => 'text:3:4', 		'explain' => true),
					)
				);
			
			break;
			
			case 'path':
				$display_vars = array(
					'title'			=> 'ACP_ARCADE_SETTINGS_PATH',
					'vars'	=> array(					
						'legend1'				=> 'ACP_ARCADE_SETTINGS_PROTECT',
						'protect_amod'			=> array('lang' => 'ARCADE_PROTECT_AMOD', 		'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'protect_ibpro'			=> array('lang' => 'ARCADE_PROTECT_IBPRO', 		'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						'protect_v3arcade'		=> array('lang' => 'ARCADE_PROTECT_V3ARCADE', 	'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
						
						'legend2'				=> 'ACP_ARCADE_SETTINGS_PATH',
						'game_path'				=> array('lang' => 'ARCADE_GAME_PATH',			'validate' => 'path', 'type' => 'text:30:65', 'explain' => true),
						'unpack_game_path'		=> array('lang' => 'ARCADE_UNPACK_GAME_PATH',	'validate' => 'path', 'type' => 'text:30:65', 'explain' => true),
						'image_path'			=> array('lang' => 'ARCADE_IMAGE_PATH',			'validate' => 'path', 'type' => 'text:30:65', 'explain' => true),
						'cat_image_path'		=> array('lang' => 'ARCADE_CAT_IMAGE_PATH',		'validate' => 'path', 'type' => 'text:30:65', 'explain' => true),
					)
				);
				
			break;
		
			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}

		$this->new_config = $arcade->config;
		$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc(request_var('config', array('' => ''), true)) : $this->new_config;
		$error = array();

		// We validate the complete config if whished
		validate_config_vars($display_vars['vars'], $cfg_array, $error);

		if ($update && !check_form_key($form_key))
		{
			$error[] = $user->lang['FORM_INVALID'];
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
			$this->new_config[$config_name] = $config_value;

			if ($update)
			{
				if ($config_name == 'download_list_per_page' && !in_array($config_value, array(50, 100, 200)))
				{
					$config_value = 50;
				}
				
				$arcade->set_config($config_name, $config_value);
				if ($config_name  == 'jackpot_minimum')
				{
					$arcade->reset('jackpot_minimum');
				}
			}
		}

		if ($update)
		{
			add_log('admin', 'LOG_ARCADE_' . strtoupper($mode));
			$cache->destroy('sql', ARCADE_CATS_TABLE);
			$cache->destroy('sql', ARCADE_GAMES_TABLE);
			$cache->destroy('sql', ARCADE_SCORES_TABLE);
			$cache->destroy('_arcade_all_games');
			$cache->destroy('_arcade_cats');
			$cache->destroy('_arcade_leaders');
			$cache->destroy('_arcade_leaders_all');
			trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
		}

		if (isset($display_vars['lang']))
		{
			$user->add_lang($display_vars['lang']);
		}

		$this->page_title = $display_vars['title'];

		$template->assign_vars(array(
				'L_TITLE'			=> $user->lang[$display_vars['title']],
				'L_TITLE_EXPLAIN'	=> $user->lang[$display_vars['title'] . '_EXPLAIN'],

				'S_ERROR'			=> (sizeof($error)) ? true : false,
				'ERROR_MSG'			=> implode('<br />', $error),

				'U_ACTION'			=> $this->u_action)
		);
		
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
					'S_LEGEND'		=> true,
					'LEGEND'		=> (isset($user->lang[$vars])) ? $user->lang[$vars] : $vars)
				);

				continue;
			}

			$type = explode(':', $vars['type']);

			$l_explain = '';
			if ($vars['explain'] && isset($vars['lang_explain']))
			{
				$l_explain = (isset($user->lang[$vars['lang_explain']])) ? $user->lang[$vars['lang_explain']] : $vars['lang_explain'];
			}
			else if ($vars['explain'])
			{
				$l_explain = (isset($user->lang[$vars['lang'] . '_EXPLAIN'])) ? $user->lang[$vars['lang'] . '_EXPLAIN'] : '';
			}
			
			$content = build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars);
			
			if (empty($content))
			{
				continue;
			}
			
			$template->assign_block_vars('options', array(
				'KEY'			=> $config_key,
				'TITLE'			=> (isset($user->lang[$vars['lang']])) ? $user->lang[$vars['lang']] : $vars['lang'],
				'S_EXPLAIN'		=> $vars['explain'],
				'TITLE_EXPLAIN'	=> $l_explain,
				'CONTENT'		=> $content,
				)
			);
		}
	}

	function manage_version_check()
	{
		global $db, $user, $auth, $auth_arcade, $template, $cache, $prefix_phpbb3, $arcade;
		global $config, $phpEx;

		$user->add_lang('install');
		$this->page_title = 'ACP_VERSION_CHECK';
		$current_version = str_replace(' ', '.', $arcade->config['version']);

		// Get current and latest version
		$errstr = '';
		$errno = 0;

		$info = get_remote_file('www.jeffrusso.net', '/updatecheck', 'phpBBArcade.txt', $errstr, $errno);

		if ($info === false)
		{
			trigger_error($errstr, E_USER_WARNING);
		}

		$info = explode("\n", $info);
		$latest_version = trim($info[0]);

		$announcement_url = trim($info[1]);
		$update_link = append_sid(PHPBB3_INCLUDE_DIR . 'install/index.' . $phpEx);

		$up_to_date = (version_compare(str_replace('rc', 'RC', strtolower($current_version)), str_replace('rc', 'RC', strtolower($latest_version)), '<')) ? false : true;

		$template->assign_vars(array(
			'S_VERSION_CHECK'	=> true,
			'S_UP_TO_DATE'		=> $up_to_date,

			'LATEST_VERSION'	=> $latest_version,
			'CURRENT_VERSION'	=> $current_version,

			'UPDATE_INSTRUCTIONS'	=> sprintf($user->lang['ARCADE_UPDATE_INSTRUCTIONS'], $announcement_url, $update_link),
		));
	}

	function arcade_version()
	{
		global $arcade, $user;

		return $arcade->config['version'] . '&nbsp;&nbsp;&nbsp;<input class="button1" type="submit" id="submit" name="version_check" value="' . $user->lang['ARCADE_CHECK_UPDATES'] . '" />';
	}

	function arcade_announce_game($value, $key = '')
	{
		return make_forum_select($value, false, true, true, true, false, false);
	}

	function arcade_limit_play_select($value, $key = '')
	{
		global $user;

		return '<option value="' . LIMIT_PLAY_TYPE_NONE .'"'. (($value == LIMIT_PLAY_TYPE_NONE) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_NONE'] . '</option><option value="' . LIMIT_PLAY_TYPE_POSTS . '"' . (($value == LIMIT_PLAY_TYPE_POSTS) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_LIMIT_PLAY_TOTAL_POSTS'] . '</option><option value="' . LIMIT_PLAY_TYPE_DAYS . '"' . (($value == LIMIT_PLAY_TYPE_DAYS) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_LIMIT_PLAY_POSTS'] . '</option><option value="' . LIMIT_PLAY_TYPE_BOTH . '"' . (($value == LIMIT_PLAY_TYPE_BOTH) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_LIMIT_PLAY_BOTH'] . '</option>';
	}

	function games_sort_order_select($value, $key = '')
	{
		global $user;

		return '<option value="' . ARCADE_ORDER_FIXED .'"'. (($value == ARCADE_ORDER_FIXED) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_FIXED'] . '</option><option value="' . ARCADE_ORDER_INSTALLDATE .'"'. (($value == ARCADE_ORDER_INSTALLDATE) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_INSTALLDATE'] . '</option><option value="' . ARCADE_ORDER_NAME . '"' . (($value == ARCADE_ORDER_NAME) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_NAME'] . '</option><option value="' . ARCADE_ORDER_PLAYS . '"' . (($value == ARCADE_ORDER_PLAYS) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_PLAYS'] . '</option><option value="' . ARCADE_ORDER_RATING . '"' . (($value == ARCADE_ORDER_RATING) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_RATING'] . '</option>';
	}

	function games_sort_dir_select($value, $key = '')
	{
		global $user;

		return '<option value="' . ARCADE_ORDER_ASC . '"' . (($value == ARCADE_ORDER_ASC) ? ' selected="selected"' : '') . '>' . $user->lang['ASCENDING'] . '</option><option value="' . ARCADE_ORDER_DESC . '"' . (($value == ARCADE_ORDER_DESC) ? ' selected="selected"' : '') . '>' . $user->lang['DESCENDING'] . '</option>';
	}
	
	function download_list_per_page_select($value, $key = '')
	{
		global $user;

		return '<option value="50"' . (($value == 50) ? ' selected="selected"' : '') . '>50</option><option value="100"' . (($value == 100) ? ' selected="selected"' : '') . '>100</option><option value="200"' . (($value == 200) ? ' selected="selected"' : '') . '>200</option>';
	}

	function cm_currency_select($value, $key = '')
	{
		global $user, $cash;

		return $cash->get_currencies($value, true);
	}

	function points_detect($value, $key)
	{
		global $arcade, $user;

		$detect = '';
		switch($arcade->points['type'])
		{
			case SIMPLE_POINTS_SYSTEM:
				$detect = sprintf($user->lang['ARCADE_POINTS_DETECT'], $user->lang['ARCADE_SIMPLE_POINTS_SYSTEM']);
			break;

			case POINTS_SYSTEM:
				$detect = sprintf($user->lang['ARCADE_POINTS_DETECT'], $user->lang['ARCADE_POINTS_SYSTEM']);
			break;

			case CASH_MOD:
				$detect = sprintf($user->lang['ARCADE_POINTS_DETECT'], $user->lang['ARCADE_CASH_MOD']);
			break;

			default:
			break;
		}

		$radio_ary = array(1 => 'YES', 0 => 'NO');
		return $detect . '<br />' . h_radio('config[use_points]', $radio_ary, $value);
	}

	/**
	* Arcade disable option and message
	*/
	function arcade_disable($value, $key)
	{
		global $user;

		$radio_ary = array(1 => 'YES', 0 => 'NO');

		return h_radio('config[arcade_disable]', $radio_ary, $value) . '<br /><input id="' . $key . '" type="text" name="config[arcade_disable_msg]" maxlength="255" size="40" value="' . $this->new_config['arcade_disable_msg'] . '" />';
	}


}
?>