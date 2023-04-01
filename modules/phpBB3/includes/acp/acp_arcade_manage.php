<?php
/**
*
* @package acp
* @version $Id: acp_arcade_manage.php 617 2008-12-02 22:09:12Z jrsweets $
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
class acp_arcade_manage
{
	var $u_action;
	var $parent_id = 0;
	var $new_config = array();
	var $new_game_data = array();

	function main($id, $mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $prefix_phpbb3, $cache, $arcade;
		global $config, $phpbb_admin_path, $phpbb_root_path, $phpEx;

		include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade_admin();

		$this->tpl_name = 'acp_arcade_manage';

		$form_key = 'acp_arcade_manage';
		add_form_key($form_key);

		$action		= request_var('action', '');
		$confirm_action = array('delete_marked', 'g_delete', 'reset_marked', 'move_marked');
		$update		= (isset($_POST['update'])) ? true : false;

		$cat_data = $errors = array();
		if ($update && !check_form_key($form_key) && !in_array($action, $confirm_action))
		{
			$update = false;
			$errors[] = $user->lang['FORM_INVALID'];
		}

		$this->page_title = 'ACP_ARCADE_MANAGE';

		$cat_id	= request_var('c', 0);
		$game_id = request_var('g', 0);
		$this->parent_id	= request_var('parent_id', 0);
		$game_ids	= (isset($_POST['game_ids'])) ? request_var('game_ids', array(0)) : array();

		// Check additional permissions
		switch ($action)
		{
			case 'progress_bar':
				$this->display_progress_bar();
				exit;
			break;

			case 'delete':
				if (!$auth->acl_get('a_arcade_delete_cat'))
				{
					trigger_error($user->lang['NO_PERMISSION_CAT_DELETE'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}
			break;

			case 'delete_marked':
			case 'reset_marked':
				if (!$auth->acl_get('a_arcade_delete_cat'))
				{
					trigger_error($user->lang['NO_PERMISSION_CAT_DELETE'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}
			break;

			case 'sync_marked':
				if (empty($game_ids))
				{
					$errors[] = $user->lang['NO_GAME_IDS'];
					$update = false;
				}
			break;

			case 'add':
				if (!$auth->acl_get('a_arcade_cat'))
				{
					trigger_error($user->lang['NO_PERMISSION_CAT_ADD'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}
			break;
		}

		// Major routines
		if ($update)
		{
			switch ($action)
			{
				case 'delete':
					$action_subcats	= request_var('action_subcats', '');
					$subcats_to_id	= request_var('subcats_to_id', 0);
					$action_games		= request_var('action_games', '');
					$games_to_id		= request_var('games_to_id', 0);

					$errors = $this->delete_cat($cat_id, $action_games, $action_subcats, $games_to_id, $subcats_to_id);

					if (sizeof($errors))
					{
						break;
					}

					$auth_arcade->acl_clear_prefetch();
					$cache->destroy('sql', ARCADE_CATS_TABLE);
					$cache->destroy('sql', ARCADE_GAMES_TABLE);
					$cache->destroy('sql', ARCADE_SCORES_TABLE);

					$cache->destroy('_arcade_all_games');
					$cache->destroy('_arcade_cats');
					$cache->destroy('_arcade_leaders');
					$cache->destroy('_arcade_leaders_all');
					$cache->destroy('_arcade_totals');

					trigger_error($user->lang['CAT_DELETED'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));

				break;

				case 'g_delete':

					if (confirm_box(true))
					{
						$game_data = $arcade->get_game_data($game_id);
						$errors = $arcade->delete_game($game_id, $game_data['cat_id']);

						if (sizeof($errors))
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

						trigger_error(sprintf($user->lang['GAME_DELETED'], $game_data['game_name']) . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
					}

				break;

				case 'move_marked':

					if (confirm_box(true))
					{
						$game_data = $arcade->get_game_data($game_ids);
						$game_data_array = array();
						foreach($game_data as $key => $value)
						{
							$game_data_array[] = $game_data[$key]['game_name'];
						}
						$game_name_list = implode(', ', $game_data_array);

						$to_cat_id = request_var('to_cat_id', 0);

						$errors = $arcade->move_game($game_ids, $this->parent_id, $to_cat_id);
						if (sizeof($errors))
						{
							break;
						}

						$old_cat_name = $arcade->get_cat_field($this->parent_id, 'cat_name');
						$new_cat_name = $arcade->get_cat_field($to_cat_id, 'cat_name');

						if (sizeof($game_data_array) > 1)
						{
							$message = sprintf($user->lang['GAMES_MOVED'], $game_name_list);
							add_log('admin', 'LOG_ARCADE_MOVE_GAMES', $old_cat_name, $new_cat_name, $game_name_list);
						}
						else
						{
							$message = sprintf($user->lang['GAME_MOVED'], $game_name_list);
							add_log('admin', 'LOG_ARCADE_MOVE_GAME', $old_cat_name, $new_cat_name, $game_name_list);
						}

						$cache->destroy('sql', ARCADE_CATS_TABLE);
						$cache->destroy('sql', ARCADE_GAMES_TABLE);
						$cache->destroy('sql', ARCADE_SCORES_TABLE);

						$cache->destroy('_arcade_leaders');
						$cache->destroy('_arcade_leaders_all');
						$cache->destroy('_arcade_totals');

						trigger_error($message . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
					}

				break;

				case 'sync_marked':
					$arcade->sync('game', $game_ids);
					$arcade->sync('rating', $game_ids);
					$game_data = $arcade->get_game_data($game_ids);

					$game_data_array = array();
					foreach($game_data as $game)
					{
						$arcade->update_highscore($game);
						$game_data_array[] = $game['game_name'];
					}
					$game_name_list = implode(', ', $game_data_array);

					if (sizeof($game_data_array) > 1)
					{
						$message = sprintf($user->lang['GAMES_RESYNCED'], $game_name_list);
						add_log('admin', 'LOG_ARCADE_SYNC_GAMES', $game_name_list);
					}
					else
					{
						$message = sprintf($user->lang['GAME_RESYNCED'], $game_name_list);
						add_log('admin', 'LOG_ARCADE_SYNC_GAME', $game_name_list);
					}

					$template->assign_var('L_CAT_RESYNCED', $message);
				break;

				case 'reset_marked':

					if (confirm_box(true))
					{
						$game_data = $arcade->get_game_data($game_ids);
						$game_data_array = array();
						foreach($game_data as $key => $value)
						{
							$game_data_array[] = $game_data[$key]['game_name'];
						}
						$game_name_list = implode(', ', $game_data_array);

						if (sizeof($game_data_array) > 1)
						{
							$message = sprintf($user->lang['GAMES_RESET'], $game_name_list);
						}
						else
						{
							$message = sprintf($user->lang['GAME_RESET'], $game_name_list);
						}

						$errors = $arcade->reset_game($game_ids, $this->parent_id);
						if (sizeof($errors))
						{
							break;
						}
						add_log('admin', 'LOG_ARCADE_RESET_GAMES', $game_name_list);
						$cache->destroy('sql', ARCADE_CATS_TABLE);
						$cache->destroy('sql', ARCADE_GAMES_TABLE);
						$cache->destroy('sql', ARCADE_SCORES_TABLE);

						$cache->destroy('_arcade_leaders');
						$cache->destroy('_arcade_leaders_all');
						$cache->destroy('_arcade_latest_highscores');
						$cache->destroy('_arcade_longest_highscores');
						$cache->destroy('_arcade_least_popular_games');
						$cache->destroy('_arcade_most_popular_games');
						$cache->destroy('_arcade_totals');

						trigger_error($message . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
					}
				break;

				case 'delete_marked':

					if (confirm_box(true))
					{
						$game_data = $arcade->get_game_data($game_ids);
						$game_data_array = array();
						foreach($game_data as $key => $value)
						{
							$game_data_array[] = $game_data[$key]['game_name'];
						}
						$game_name_list = implode(', ', $game_data_array);

						$game_name_list = implode(', ', $game_data_array);
						if (sizeof($game_data_array) > 1)
						{
							$message = sprintf($user->lang['GAMES_DELETED'], $game_name_list);
							add_log('admin', 'LOG_ARCADE_DELETE_GAMES',  $game_name_list);
						}
						else
						{
							$message = sprintf($user->lang['GAME_DELETED'], $game_name_list);
							add_log('admin', 'LOG_ARCADE_DELETE_GAME',  $game_name_list);
						}

						$errors = $arcade->delete_game($game_ids, $this->parent_id);

						if (sizeof($errors))
						{
							break;
						}

						$cache->destroy('sql', ARCADE_CATS_TABLE);
						$cache->destroy('sql', ARCADE_GAMES_TABLE);
						$cache->destroy('sql', ARCADE_SCORES_TABLE);

						$cache->destroy('_arcade_all_games');
						$cache->destroy('_arcade_cats');
						$cache->destroy('_arcade_leaders');
						$cache->destroy('_arcade_leaders_all');
						$cache->destroy('_arcade_totals');

						trigger_error($message . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
					}
				break;

				case 'edit':
					$cat_data = array(
						'cat_id'		=>	$cat_id
					);

				// No break here
				case 'add':

					$cat_data += array(
						'parent_id'				=> request_var('cat_parent_id', $this->parent_id),
						'cat_type'				=> request_var('cat_type', ARCADE_CAT_GAMES),
						'type_action'			=> request_var('type_action', ''),
						'cat_status'			=> request_var('cat_status', ITEM_UNLOCKED),
						'cat_parents'			=> '',
						'cat_name'				=> utf8_normalize_nfc(request_var('cat_name', '', true)),
						'cat_link'				=> request_var('cat_link', ''),
						'cat_link_track'		=> request_var('cat_link_track', false),
						'cat_desc'				=> utf8_normalize_nfc(request_var('cat_desc', '', true)),
						'cat_desc_uid'			=> '',
						'cat_desc_options'		=> 7,
						'cat_desc_bitfield'		=> '',
						'cat_rules'				=> utf8_normalize_nfc(request_var('cat_rules', '', true)),
						'cat_rules_uid'			=> '',
						'cat_rules_options'		=> 7,
						'cat_rules_bitfield'	=> '',
						'cat_rules_link'		=> request_var('cat_rules_link', ''),
						'cat_image'				=> request_var('cat_image', ''),
						'cat_display'			=> request_var('cat_display', 0),
						'cat_style'				=> request_var('cat_style', 0),
						'cat_games_per_page'	=> request_var('cat_games_per_page', 0),
						'cat_download'			=> request_var('cat_download', true),
						'cat_use_jackpot'		=> request_var('cat_use_jackpot', false),
						'cat_cost'				=> request_var('cat_cost', 0.000),
						'cat_reward'			=> request_var('cat_reward', 0.000),
						'cat_password'			=> request_var('cat_password', ''),
						'cat_password_confirm'	=> request_var('cat_password_confirm', ''),
						'cat_password_unset'	=> request_var('cat_password_unset', false),
						'display_subcat_list'	=> request_var('display_subcat_list', false),
						'display_on_index'		=> request_var('display_on_index', false),
					);

					// Use link_display_on_index setting if forum type is link
					if ($cat_data['cat_type'] == ARCADE_LINK)
					{
						$cat_data['display_on_index'] = request_var('link_display_on_index', false);
					}
					
					// Linked forums and categories are not able to be locked...
					if ($cat_data['cat_type'] == ARCADE_LINK || $cat_data['cat_type'] == ARCADE_CAT)
					{
						// Linked forums are not able to be locked...
						$cat_data['cat_status'] = ITEM_UNLOCKED;
					}

					// Get data for forum rules if specified...
					if ($cat_data['cat_rules'])
					{
						generate_text_for_storage($cat_data['cat_rules'], $cat_data['cat_rules_uid'], $cat_data['cat_rules_bitfield'], $cat_data['cat_rules_options'], request_var('rules_parse_bbcode', false), request_var('rules_parse_urls', false), request_var('rules_parse_smilies', false));
					}

					// Get data for forum description if specified
					if ($cat_data['cat_desc'])
					{
						generate_text_for_storage($cat_data['cat_desc'], $cat_data['cat_desc_uid'], $cat_data['cat_desc_bitfield'], $cat_data['cat_desc_options'], request_var('desc_parse_bbcode', false), request_var('desc_parse_urls', false), request_var('desc_parse_smilies', false));
					}

					$errors = $this->update_cat_data($cat_data);

					if (!sizeof($errors))
					{
						$cat_perm_from = request_var('cat_perm_from', 0);

						// Copy permissions?
						if ($cat_perm_from && !empty($cat_perm_from) && $cat_perm_from != $cat_data['cat_id'] &&
							(($action != 'edit') || empty($cat_id) || ($auth->acl_get('a_cauth') && $auth->acl_get('a_authusers') && $auth->acl_get('a_authgroups'))))
						{
							// if we edit a category delete current permissions first
							if ($action == 'edit')
							{
								$sql = 'DELETE FROM ' . ACL_ARCADE_USERS_TABLE . '
									WHERE cat_id = ' . (int) $cat_data['cat_id'];
								$db->sql_query($sql);

								$sql = 'DELETE FROM ' . ACL_ARCADE_GROUPS_TABLE . '
									WHERE cat_id = ' . (int) $cat_data['cat_id'];
								$db->sql_query($sql);
							}

							// From the mysql documentation:
							// Prior to MySQL 4.0.14, the target table of the INSERT statement cannot appear in the FROM clause of the SELECT part of the query. This limitation is lifted in 4.0.14.
							// Due to this we stay on the safe side if we do the insertion "the manual way"

							// Copy permisisons from/to the acl users table (only cat_id gets changed)
							$sql = 'SELECT user_id, auth_option_id, auth_role_id, auth_setting
								FROM ' . ACL_ARCADE_USERS_TABLE . '
								WHERE cat_id = ' . $cat_perm_from;
							$result = $db->sql_query($sql);

							$users_sql_ary = array();
							while ($row = $db->sql_fetchrow($result))
							{
								$users_sql_ary[] = array(
									'user_id'			=> (int) $row['user_id'],
									'cat_id'			=> (int) $cat_data['cat_id'],
									'auth_option_id'	=> (int) $row['auth_option_id'],
									'auth_role_id'		=> (int) $row['auth_role_id'],
									'auth_setting'		=> (int) $row['auth_setting']
								);
							}
							$db->sql_freeresult($result);

							// Copy permisisons from/to the acl groups table (only cat_id gets changed)
							$sql = 'SELECT group_id, auth_option_id, auth_role_id, auth_setting
								FROM ' . ACL_ARCADE_GROUPS_TABLE . '
								WHERE cat_id = ' . $cat_perm_from;
							$result = $db->sql_query($sql);

							$groups_sql_ary = array();
							while ($row = $db->sql_fetchrow($result))
							{
								$groups_sql_ary[] = array(
									'group_id'			=> (int) $row['group_id'],
									'cat_id'			=> (int) $cat_data['cat_id'],
									'auth_option_id'	=> (int) $row['auth_option_id'],
									'auth_role_id'		=> (int) $row['auth_role_id'],
									'auth_setting'		=> (int) $row['auth_setting']
								);
							}
							$db->sql_freeresult($result);

							// Now insert the data
							$db->sql_multi_insert(ACL_ARCADE_USERS_TABLE, $users_sql_ary);
							$db->sql_multi_insert(ACL_ARCADE_GROUPS_TABLE, $groups_sql_ary);
						}

						$auth_arcade->acl_clear_prefetch();
						$cache->destroy('sql', ARCADE_GAMES_TABLE);
						$cache->destroy('sql', ARCADE_CATS_TABLE);
						$cache->destroy('_arcade_cats');

						$acl_url = '&amp;mode=setting_category_local&amp;cat_id[]=' . $cat_data['cat_id'];

						$message = ($action == 'add') ? $user->lang['CAT_CREATED'] : $user->lang['CAT_UPDATED'];

						// Redirect to permissions
						if ($auth->acl_get('a_cauth'))
						{
							$message .= '<br /><br />' . sprintf($user->lang['REDIRECT_ACL'], '<a href="' . append_sid("{$phpbb_admin_path}index.$phpEx", 'i=arcade_permissions' . $acl_url) . '">', '</a>');
						}

						// redirect directly to permission settings screen if authed
						if ($action == 'add' && !$cat_perm_from && $auth->acl_get('a_cauth'))
						{
							meta_refresh(4, append_sid("{$phpbb_admin_path}index.$phpEx", 'i=arcade_permissions' . $acl_url));
						}
						trigger_error($message . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
					}

				break;
			}
		}

		switch ($action)
		{
			case 'move_up':
			case 'move_down':

				if (!$cat_id)
				{
					trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$sql = 'SELECT *
					FROM ' . ARCADE_CATS_TABLE . "
					WHERE cat_id = $cat_id";
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$move_cat_name = $this->move_cat_by($row, $action, 1);

				if ($move_cat_name !== false)
				{
					add_log('admin', 'LOG_ARCADE_' . strtoupper($action), $row['cat_name'], $move_cat_name);
					$cache->destroy('sql', ARCADE_CATS_TABLE);
				}

			break;

			case 'g_move_up':
			case 'g_move_down':

				if (!$game_id)
				{
					trigger_error($user->lang['NO_GAME_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$sql = 'SELECT game_name
					FROM ' . ARCADE_GAMES_TABLE . "
					WHERE game_id = $game_id";
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					trigger_error($user->lang['NO_GAME_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				//
				// Change order of games  in the DB
				//
				$arcade->move_game_by($game_id, $this->parent_id, $action);
				add_log('admin', 'LOG_ARCADE_' . strtoupper($action), $row['game_name']);
				$cache->destroy('sql', ARCADE_GAMES_TABLE);

			break;

			case 'g_delete':

				if (!$auth->acl_get('a_arcade_delete_game'))
				{
					trigger_error($user->lang['NO_PERMISSION_GAME_DELETE'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$s_hidden_fields = array(
					'g'			=> $game_id,
					'update'	=> true,
				);
				confirm_box(false, 'DELETE_SELECTED_GAME', build_hidden_fields($s_hidden_fields));

			break;


			case 'delete_marked':
				if (empty($game_ids))
				{
					$errors[] = $user->lang['NO_GAME_IDS'];
					break;
				}

				if (!$auth->acl_get('a_arcade_delete_game'))
				{
					trigger_error($user->lang['NO_PERMISSION_GAME_DELETE'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$s_hidden_fields = array(
					'action'	=> 'delete_marked',
					'update'	=> true,
					'game_ids'	=> $game_ids,
				);
				confirm_box(false, 'DELETE_SELECTED_GAMES', build_hidden_fields($s_hidden_fields));

			break;

			case 'move_marked':

				if (empty($game_ids))
				{
					$errors[] = $user->lang['NO_GAME_IDS'];
					break;
				}

				$s_hidden_fields = array(
					'action'	=> 'move_marked',
					'update'	=> true,
					'game_ids'	=> $game_ids,
				);

				$template->assign_vars(array(
					'S_CATEGORY_SELECT'		=> $arcade->make_cat_select($this->parent_id, $this->parent_id, true),
				));

				confirm_box(false, 'MOVE_SELECTED_GAMES', build_hidden_fields($s_hidden_fields), 'confirm_body_move_arcade_games.html');

			break;

			case 'reset_marked':

				if (empty($game_ids))
				{
					$errors[] = $user->lang['NO_GAME_IDS'];
					break;
				}

				if (!$auth->acl_get('a_arcade_delete_game'))
				{
					trigger_error($user->lang['NO_PERMISSION_GAME_DELETE'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$s_hidden_fields = array(
					'action'	=> 'reset_marked',
					'update'	=> true,
					'game_ids'	=> $game_ids,
				);
				confirm_box(false, 'RESET_SELECTED_GAMES', build_hidden_fields($s_hidden_fields));

			break;

			case 'sync':
				if ($cat_id || $game_id)
				{
					if ($cat_id && $game_id)
					{
						trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
					}
					else if ($cat_id)
					{
						$sql = 'SELECT cat_name
							FROM ' . ARCADE_CATS_TABLE . "
							WHERE cat_id = $cat_id";
						$result = $db->sql_query($sql);
						$row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						if (!$row)
						{
							trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
						}

						$arcade->set_last_play($cat_id);
						$arcade->sync('category', $cat_id);
						$cache->destroy('sql', ARCADE_CATS_TABLE);

						add_log('admin', 'LOG_ARCADE_SYNC_CAT', $row['cat_name']);
						$template->assign_var('L_CAT_RESYNCED', sprintf($user->lang['CAT_RESYNCED'], $row['cat_name']));
					}
					else if ($game_id)
					{
						$sql = 'SELECT game_name
							FROM ' . ARCADE_GAMES_TABLE . "
							WHERE game_id = $game_id";
						$result = $db->sql_query($sql);
						$row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						if (!$row)
						{
							trigger_error($user->lang['NO_GAME_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
						}

						$arcade->sync('game', $game_id);
						$cache->destroy('sql', ARCADE_GAMES_TABLE);

						add_log('admin', 'LOG_ARCADE_SYNC_GAME', $row['game_name']);
						$template->assign_var('L_CAT_RESYNCED', sprintf($user->lang['GAME_RESYNCED'], $row['game_name']));
					}
				}
				else
				{
					trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

			break;

			case 'add':
			case 'edit':

				if ($update)
				{
					$cat_data['cat_flags'] = 0;
					$cat_data['cat_flags'] += (request_var('cat_link_track', false)) ? ARCADE_FLAG_LINK_TRACK : 0;
				}

				// Show form to create/modify a forum
				if ($action == 'edit')
				{
					$this->page_title = 'EDIT_CAT';
					$row = $arcade->get_cat_info($cat_id);
					$old_cat_type = $row['cat_type'];

					if (!$update)
					{
						$cat_data = $row;
					}
					else
					{
						$cat_data['left_id'] = $row['left_id'];
						$cat_data['right_id'] = $row['right_id'];
					}

					// Make sure no direct child forums are able to be selected as parents.
					$childs = $arcade->get_cat_branch($cat_id, 'children');

					$exclude_cat = array();
					foreach ($childs as $row)
					{
						$exclude_cat[] = $row['cat_id'];
					}

					$parents_list = $arcade->make_cat_select($cat_data['parent_id'], $exclude_cat, false, false, false);
					$cat_data['cat_password_confirm'] = $cat_data['cat_password'];
				}
				else
				{
					$this->page_title = 'CREATE_CAT';

					$cat_id = $this->parent_id;
					$parents_list = $arcade->make_cat_select($this->parent_id, false, false, false, false);

					// Fill forum data with default values
					if (!$update)
					{
						$cat_data = array(
							'parent_id'				=> $this->parent_id,
							'cat_type'				=> ARCADE_CAT_GAMES,
							'cat_status'			=> ITEM_UNLOCKED,
							'cat_name'				=> utf8_normalize_nfc(request_var('cat_name', '', true)),
							'cat_link'				=> '',
							'cat_link_track'		=> false,
							'cat_desc'				=> '',
							'cat_rules'				=> '',
							'cat_rules_link'		=> '',
							'cat_image'				=> '',
							'cat_display'			=> 0,
							'cat_style'				=> 0,
							'cat_games_per_page'	=> 0,
							'cat_download'			=> true,
							'cat_use_jackpot'		=> false,
							'cat_cost'				=> 0,
							'cat_reward'			=> 0,
							'cat_flags'				=> 0,
							'cat_password'			=> '',
							'cat_password_confirm'	=> '',
							'display_subcat_list'	=> true,
							'display_on_index'		=> true,
						);
					}
				}

				$cat_rules_data = array(
					'text'			=> $cat_data['cat_rules'],
					'allow_bbcode'	=> true,
					'allow_smilies'	=> true,
					'allow_urls'	=> true
				);

				$cat_desc_data = array(
					'text'			=> $cat_data['cat_desc'],
					'allow_bbcode'	=> true,
					'allow_smilies'	=> true,
					'allow_urls'	=> true
				);

				$cat_rules_preview = '';

				// Parse rules if specified
				if ($cat_data['cat_rules'])
				{
					if (!isset($cat_data['cat_rules_uid']))
					{
						// Before we are able to display the preview and plane text, we need to parse our request_var()'d value...
						$cat_data['cat_rules_uid'] = '';
						$cat_data['cat_rules_bitfield'] = '';
						$cat_data['cat_rules_options'] = 0;

						generate_text_for_storage($cat_data['cat_rules'], $cat_data['cat_rules_uid'], $cat_data['cat_rules_bitfield'], $cat_data['cat_rules_options'], request_var('rules_allow_bbcode', false), request_var('rules_allow_urls', false), request_var('rules_allow_smiliess', false));
					}

					// Generate preview content
					$cat_rules_preview = generate_text_for_display($cat_data['cat_rules'], $cat_data['cat_rules_uid'], $cat_data['cat_rules_bitfield'], $cat_data['cat_rules_options']);

					// decode...
					$cat_rules_data = generate_text_for_edit($cat_data['cat_rules'], $cat_data['cat_rules_uid'], $cat_data['cat_rules_options']);
				}

				// Parse desciption if specified
				if ($cat_data['cat_desc'])
				{
					if (!isset($cat_data['cat_desc_uid']))
					{
						// Before we are able to display the preview and plane text, we need to parse our request_var()'d value...
						$cat_data['cat_desc_uid'] = '';
						$cat_data['cat_desc_bitfield'] = '';
						$cat_data['cat_desc_options'] = 0;

						generate_text_for_storage($cat_data['cat_desc'], $cat_data['cat_desc_uid'], $cat_data['cat_desc_bitfield'], $cat_data['cat_desc_options'], request_var('desc_allow_bbcode', false), request_var('desc_allow_urls', false), request_var('desc_allow_smiliess', false));
					}

					// decode...
					$cat_desc_data = generate_text_for_edit($cat_data['cat_desc'], $cat_data['cat_desc_uid'], $cat_data['cat_desc_options']);
				}

				$cat_type_options = '';
				$cat_type_ary = array(ARCADE_CAT => 'CAT', ARCADE_CAT_GAMES => 'CAT_GAMES', ARCADE_LINK => 'LINK');

				foreach ($cat_type_ary as $value => $lang)
				{
					$cat_type_options .= '<option value="' . $value . '"' . (($value == $cat_data['cat_type']) ? ' selected="selected"' : '') . '>' . $user->lang['TYPE_' . $lang] . '</option>';
				}

				$styles_list = style_select($cat_data['cat_style'], true);
				$cat_display_list = $this->cat_display_select($cat_data['cat_display']);
				$statuslist = '<option value="' . ITEM_UNLOCKED . '"' . (($cat_data['cat_status'] == ITEM_UNLOCKED) ? ' selected="selected"' : '') . '>' . $user->lang['UNLOCKED'] . '</option><option value="' . ITEM_LOCKED . '"' . (($cat_data['cat_status'] == ITEM_LOCKED) ? ' selected="selected"' : '') . '>' . $user->lang['LOCKED'] . '</option>';

				// Subforum move options
				if ($action == 'edit' && $cat_data['cat_type'] == ARCADE_CAT)
				{
					$subcat_id = array();
					$subcat = $arcade->get_cat_branch($cat_id, 'children');

					foreach ($subcat as $row)
					{
						$subcat_id[] = $row['cat_id'];
					}

					$cat_list = $arcade->make_cat_select($cat_data['parent_id'], $subcat_id);

					$sql = 'SELECT cat_id
						FROM ' . ARCADE_CATS_TABLE . '
						WHERE cat_type = ' . ARCADE_CAT_GAMES . "
							AND cat_id <> $cat_id";
					$result = $db->sql_query($sql);

					if ($db->sql_fetchrow($result))
					{
						$template->assign_vars(array(
							'S_MOVE_CAT_OPTIONS'		=> $arcade->make_cat_select($cat_data['parent_id'], $subcat_id)
						));
					}
					$db->sql_freeresult($result);

					$template->assign_vars(array(
						'S_HAS_SUBCATS'		=> ($cat_data['right_id'] - $cat_data['left_id'] > 1) ? true : false,
						'S_CATS_LIST'		=> $cat_list)
					);
				}

				$s_show_display_on_index = false;

				if ($cat_data['parent_id'] > 0)
				{
					// if this forum is a subforum put the "display on index" checkbox
					if ($parent_info = $arcade->get_cat_info($cat_data['parent_id']))
					{
						if ($parent_info['parent_id'] > 0 || $parent_info['cat_type'] == ARCADE_CAT)
						{
							$s_show_display_on_index = true;
						}
					}
				}

				$filename_list = $arcade->generate_cat_images($cat_data['cat_image']);

				$template->assign_vars(array(
					'S_EDIT_CAT'				=> true,
					'S_ERROR'					=> (sizeof($errors)) ? true : false,
					'S_PARENT_ID'				=> $this->parent_id,
					'S_CAT_PARENT_ID'			=> $cat_data['parent_id'],
					'S_ADD_ACTION'				=> ($action == 'add') ? true : false,

					'U_BACK'					=> $this->u_action . '&amp;parent_id=' . $this->parent_id,
					'U_EDIT_ACTION'				=> $this->u_action . "&amp;parent_id={$this->parent_id}&amp;action=$action&amp;c=$cat_id",

					'L_COPY_PERMISSIONS_EXPLAIN'	=> $user->lang['COPY_PERMISSIONS_' . strtoupper($action) . '_EXPLAIN'],
					'L_TITLE'						=> $user->lang[$this->page_title],
					'ERROR_MSG'						=> (sizeof($errors)) ? implode('<br />', $errors) : '',

					'CAT_NAME'					=> $cat_data['cat_name'],
					'CAT_DATA_LINK'				=> $cat_data['cat_link'],
					'CAT_IMAGE'					=> $cat_data['cat_image'],
					'S_FILENAME_OPTIONS'		=> $filename_list,
					'S_IMAGE_BASEDIR'			=> $phpbb_root_path . $arcade->config['cat_image_path'],
					'CAT_IMAGE_SRC'				=> ($cat_data['cat_image']) ? $phpbb_root_path . $arcade->config['cat_image_path'] . $cat_data['cat_image'] : $phpbb_root_path . 'images/spacer.gif',
					'ARCADE_LINK'				=> ARCADE_LINK,
					'ARCADE_CAT'				=> ARCADE_CAT,
					'ARCADE_CAT_GAMES'			=> ARCADE_CAT_GAMES,
					'CAT_GAMES_PER_PAGE'		=> $cat_data['cat_games_per_page'],
					'CAT_DOWNLOAD'				=> $cat_data['cat_download'],
					'CAT_USE_JACKPOT'			=> $cat_data['cat_use_jackpot'],
					'CAT_COST'					=> $cat_data['cat_cost'],
					'CAT_REWARD'				=> $cat_data['cat_reward'],
					'CAT_PASSWORD'				=> $cat_data['cat_password'],
					'CAT_PASSWORD_CONFIRM'		=> $cat_data['cat_password_confirm'],
					'CAT_RULES_LINK'			=> $cat_data['cat_rules_link'],
					'CAT_RULES'					=> $cat_data['cat_rules'],
					'CAT_RULES_PREVIEW'			=> $cat_rules_preview,
					'CAT_RULES_PLAIN'			=> $cat_rules_data['text'],
					'S_BBCODE_CHECKED'			=> ($cat_rules_data['allow_bbcode']) ? true : false,
					'S_SMILIES_CHECKED'			=> ($cat_rules_data['allow_smilies']) ? true : false,
					'S_URLS_CHECKED'			=> ($cat_rules_data['allow_urls']) ? true : false,
					'S_CAT_PASSWORD_SET'		=> (empty($cat_data['cat_password'])) ? false : true,

					'CAT_DESC'					=> $cat_desc_data['text'],
					'S_DESC_BBCODE_CHECKED'		=> ($cat_desc_data['allow_bbcode']) ? true : false,
					'S_DESC_SMILIES_CHECKED'	=> ($cat_desc_data['allow_smilies']) ? true : false,
					'S_DESC_URLS_CHECKED'		=> ($cat_desc_data['allow_urls']) ? true : false,

					'S_SHOW_POINTS'				=> $arcade->points['installed'],
					'S_CAT_TYPE_OPTIONS'		=> $cat_type_options,
					'S_STATUS_OPTIONS'			=> $statuslist,
					'S_PARENT_OPTIONS'			=> $parents_list,
					'S_STYLES_OPTIONS'			=> $styles_list,
					'S_CAT_DISPLAY_OPTIONS'		=> $cat_display_list,
					'S_CAT_OPTIONS'				=> $arcade->make_cat_select(($action == 'add') ? $cat_data['parent_id'] : false, ($action == 'edit') ? $cat_data['cat_id'] : false, false, false, false),
					'S_SHOW_DISPLAY_ON_INDEX'	=> $s_show_display_on_index,
					'S_DISPLAY_SUBCAT_LIST'		=> ($cat_data['display_subcat_list']) ? true : false,
					'S_DISPLAY_ON_INDEX'		=> ($cat_data['display_on_index']) ? true : false,
					'S_ARCADE_CAT'				=> ($cat_data['cat_type'] == ARCADE_CAT) ? true : false,
					'S_CAT_ORIG_CAT_GAMES'		=> (isset($old_cat_type) && $old_cat_type == ARCADE_CAT_GAMES) ? true : false,
					'S_CAT_ORIG_CAT'			=> (isset($old_cat_type) && $old_cat_type == ARCADE_CAT) ? true : false,
					'S_CAT_ORIG_LINK'			=> (isset($old_cat_type) && $old_cat_type == ARCADE_LINK) ? true : false,
					'S_ARCADE_LINK'				=> ($cat_data['cat_type'] == ARCADE_LINK) ? true : false,
					'S_ARCADE_CAT_GAMES'		=> ($cat_data['cat_type'] == ARCADE_CAT_GAMES) ? true : false,
					'S_ARCADE_LINK_TRACK'		=> ($cat_data['cat_flags'] & ARCADE_FLAG_LINK_TRACK) ? true : false,
					'S_CAN_COPY_PERMISSIONS'	=> ($action != 'edit' || empty($cat_id) || ($auth->acl_get('a_cauth') && $auth->acl_get('a_authusers') && $auth->acl_get('a_authgroups'))) ? true : false,
					)
				);
				return;
			break;

			case 'delete':

				if (!$cat_id)
				{
					trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id), E_USER_WARNING);
				}

				$cat_data = $arcade->get_cat_info($cat_id);

				$subcat_id = array();
				$subcat = $arcade->get_cat_branch($cat_id, 'children');

				foreach ($subcat as $row)
				{
					$subcat_id[] = $row['cat_id'];
				}

				$cat_list = $arcade->make_cat_select($cat_data['parent_id'], $subcat_id);

				$sql = 'SELECT cat_id
					FROM ' . ARCADE_CATS_TABLE . '
					WHERE cat_type = ' . ARCADE_CAT_GAMES . "
						AND cat_id <> $cat_id";
				$result = $db->sql_query($sql);

				if ($db->sql_fetchrow($result))
				{
					$template->assign_vars(array(
						'S_MOVE_CAT_OPTIONS'		=> $arcade->make_cat_select($cat_data['parent_id'], $subcat_id, false, true),
					));
				}
				$db->sql_freeresult($result);

				$parent_id = ($this->parent_id == $cat_id) ? 0 : $this->parent_id;

				$template->assign_vars(array(
					'S_DELETE_CAT'		=> true,
					'U_ACTION'			=> $this->u_action . "&amp;parent_id={$parent_id}&amp;action=delete&amp;c=$cat_id",
					'U_BACK'			=> $this->u_action . '&amp;parent_id=' . $this->parent_id,

					'CAT_NAME'				=> $cat_data['cat_name'],
					'S_ARCADE_CAT_GAMES'	=> ($cat_data['cat_type'] == ARCADE_CAT_GAMES) ? true : false,
					'S_ARCADE_LINK'			=> ($cat_data['cat_type'] == ARCADE_LINK) ? true : false,
					'S_HAS_SUBCATS'			=> ($cat_data['right_id'] - $cat_data['left_id'] > 1) ? true : false,
					'S_CATS_LIST'			=> $cat_list,
					'S_ERROR'				=> (sizeof($errors)) ? true : false,
					'ERROR_MSG'				=> (sizeof($errors)) ? implode('<br />', $errors) : '')
				);
				return;
			break;
		}

		// Default management page
		$parent_cat_type = '';
		if (!$this->parent_id)
		{
			$navigation = $user->lang['ARCADE_INDEX'];
		}
		else
		{
			$navigation = '<a href="' . $this->u_action . '">' . $user->lang['ARCADE_INDEX'] . '</a>';
			$cat_nav = $arcade->get_cat_branch($this->parent_id, 'parents', 'descending');
			foreach ($cat_nav as $row)
			{
				if ($row['cat_id'] == $this->parent_id)
				{
					$parent_cat_type = $row['cat_type'];
					$navigation .= ' -&gt; ' . $row['cat_name'];
				}
				else
				{
					$navigation .= ' -&gt; <a href="' . $this->u_action . '&amp;parent_id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a>';
				}
			}
		}

		// Jumpbox
		$cat_box = $arcade->make_cat_select($this->parent_id, false, false, false, false);
		if (($action == 'sync' || $action == 'sync_marked') && !sizeof($errors))
		{
			$template->assign_var('S_RESYNCED', true);
		}

		$sql = 'SELECT *
			FROM ' . ARCADE_CATS_TABLE . "
			WHERE parent_id = $this->parent_id
			ORDER BY left_id";
		$result = $db->sql_query($sql);

		if ($row = $db->sql_fetchrow($result))
		{
			do
			{
				$cat_type = $row['cat_type'];

				if ($row['cat_status'] == ITEM_LOCKED)
				{
					$folder_image = '<img src="images/icon_folder_lock.gif" alt="' . $user->lang['LOCKED'] . '" />';
				}
				else
				{
					switch ($cat_type)
					{
						case ARCADE_LINK:
							$folder_image = '<img src="images/icon_folder_link.gif" alt="' . $user->lang['TYPE_LINK'] . '" />';
						break;

						default:
							$folder_image = ($row['left_id'] + 1 != $row['right_id']) ? '<img src="images/icon_subfolder.gif" alt="' . $user->lang['SUBFORUM'] . '" />' : '<img src="images/icon_folder.gif" alt="' . $user->lang['FOLDER'] . '" />';
						break;
					}
				}

				$url = $this->u_action . "&amp;parent_id=$this->parent_id&amp;c={$row['cat_id']}";

				$cat_title = ($cat_type != ARCADE_LINK) ? '<a href="' . $this->u_action . '&amp;parent_id=' . $row['cat_id'] . '">' : '';
				$cat_title .= $row['cat_name'];
				$cat_title .= ($cat_type != ARCADE_LINK) ? '</a>' : '';

				$template->assign_block_vars('cats', array(
					'FOLDER_IMAGE'		=> $folder_image,
					'CAT_IMAGE'			=> ($row['cat_image']) ? '<img src="' . $phpbb_root_path . $arcade->config['cat_image_path'] . $row['cat_image'] . '" alt="" />' : '',
					'CAT_IMAGE_SRC'		=> ($row['cat_image']) ? $phpbb_root_path . $row['cat_image'] : '',
					'CAT_NAME'			=> $row['cat_name'],
					'CAT_DESCRIPTION'	=> generate_text_for_display($row['cat_desc'], $row['cat_desc_uid'], $row['cat_desc_bitfield'], $row['cat_desc_options']),
					'CAT_GAMES'			=> $row['cat_games'],
					'CAT_PLAYS'			=> $row['cat_plays'],

					'S_ARCADE_LINK'			=> ($cat_type == ARCADE_LINK) ? true : false,
					'S_ARCADE_CAT_GAMES'	=> ($cat_type == ARCADE_CAT_GAMES) ? true : false,

					'U_CAT'				=> $this->u_action . '&amp;parent_id=' . $row['cat_id'],
					'U_MOVE_UP'			=> $url . '&amp;action=move_up',
					'U_MOVE_DOWN'		=> $url . '&amp;action=move_down',
					'U_EDIT'			=> $url . '&amp;action=edit',
					'U_DELETE'			=> $url . '&amp;action=delete',
					'U_SYNC'			=> $url . '&amp;action=sync')
				);
			}
			while ($row = $db->sql_fetchrow($result));
		}
		else if ($this->parent_id)
		{
			$row = $arcade->get_cat_info($this->parent_id);

			$url = $this->u_action . '&amp;parent_id=' . $this->parent_id . '&amp;c=' . $row['cat_id'];

			$template->assign_vars(array(
				'S_NO_CATS'			=> true,

				'U_EDIT'			=> $url . '&amp;action=edit',
				'U_DELETE'			=> $url . '&amp;action=delete',
				'U_SYNC'			=> $url . '&amp;action=sync')
			);
		}
		$db->sql_freeresult($result);

		$total_games = $arcade->get_total('games', $this->parent_id);
		$start = request_var('start', 0);

		if ($start >= $total_games)
		{
			$start = $start - $arcade->config['acp_items_per_page'];
			$start = ($start < 0) ? 0 : $start;
		}

		if ($total_games && $this->parent_id)
		{
			$sql = 'SELECT *
				FROM ' . ARCADE_GAMES_TABLE . "
				WHERE cat_id = $this->parent_id
				ORDER BY game_order";
			$result = $db->sql_query_limit($sql, $arcade->config['acp_items_per_page'], $start);

			if ($row = $db->sql_fetchrow($result))
			{
				do
				{
					$url = $this->u_action . '&amp;parent_id=' . $this->parent_id . '&amp;g=' . $row['game_id'];

					$template->assign_block_vars('games', array(
						'GAME_ID'			=> $row['game_id'],
						'GAME_NAME'			=> $row['game_name'],
						'GAME_DESC'			=> nl2br($row['game_desc']),
						'GAME_PLAYS'		=> $row['game_plays'],
						'GAME_IMAGE'		=> ($row['game_image']) ? '<img src="' . append_sid("{$phpbb_root_path}arcade.$phpEx", "img={$row['game_image']}") . '" width="50" height="50" alt="" />' : '',

						'U_GAME_PLAY'     	=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=play&amp;g={$row['game_id']}"),
						'U_MOVE_UP'			=> $url . '&amp;action=g_move_up',
						'U_MOVE_DOWN'		=> $url . '&amp;action=g_move_down',
						'U_EDIT'			=> append_sid("{$phpbb_admin_path}index.$phpEx", "i=arcade_games&mode=edit_games&action=edit&g={$row['game_id']}" . (($start) ? "&start=$start" : ''), false),
						'U_DELETE'			=> $url . '&amp;action=g_delete',
						'U_SYNC'			=> $url . '&amp;action=sync')
					);
				}
				while ($row = $db->sql_fetchrow($result));
			}
			$db->sql_freeresult($result);

			$mark_options = array('sync_marked', 'reset_marked', 'delete_marked', 'move_marked');

			$s_mark_options = '';
			foreach ($mark_options as $mark_option)
			{
				$s_mark_options .= '<option value="' . $mark_option . '">' . $user->lang['ARCADE_' . strtoupper($mark_option)] . '</option>';
			}

			$template->assign_vars(array(
				'S_MARK_OPTIONS'	=> $s_mark_options,
				'S_ON_PAGE'			=> on_page($total_games, $arcade->config['acp_items_per_page'], $start),
				'PAGINATION'		=> generate_pagination($this->u_action . '&amp;parent_id=' . $this->parent_id, $total_games, $arcade->config['acp_items_per_page'], $start, true))
			);


			$sql = 'SELECT *
				FROM ' . ARCADE_GAMES_TABLE . "
				WHERE cat_id = $this->parent_id
				ORDER BY game_name_clean ASC";

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);

			// Quick jump of all the games in the arcade with scores...
			foreach ($row as $game)
			{
				$template->assign_block_vars('quick_jump', array(
					'GAME_ID'		=> $game['game_id'],
					'GAME_NAME' 	=> $game['game_name'])
				);
			}
			// Quick jump of all the games in the arcade...
		}

		$template->assign_vars(array(
			'ERROR_MSG'				=> (sizeof($errors)) ? implode('<br />', $errors) : '',
			'NAVIGATION'			=> $navigation,
			'CAT_BOX'				=> $cat_box,
			'S_ARCADE_CAT_GAMES'	=> ($parent_cat_type == ARCADE_CAT_GAMES) ? true : false,
			'U_SEL_ACTION'			=> $this->u_action,
			'U_ACTION'				=> $this->u_action . '&amp;parent_id=' . $this->parent_id,
			'U_ACTION_DELETE'		=> $this->u_action . '&amp;parent_id=' . $this->parent_id . '&amp;action=g_delete',

			'U_PROGRESS_BAR'		=> $this->u_action . '&amp;action=progress_bar',
			'UA_PROGRESS_BAR'		=> str_replace('&amp;', '&', $this->u_action) . '&action=progress_bar')
		);
	}

	function cat_display_select($value = '')
	{
			global $user;

			return '<option value="' . ARCADE_CAT_DISPLAY_BOTH . '"' . (($value == ARCADE_CAT_DISPLAY_BOTH) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_CAT_DISPLAY_BOTH'] . '</option><option value="' . ARCADE_CAT_DISPLAY_NAME . '"' . (($value == ARCADE_CAT_DISPLAY_NAME) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_CAT_DISPLAY_NAME'] . '</option><option value="' . ARCADE_CAT_DISPLAY_IMAGE . '"' . (($value == ARCADE_CAT_DISPLAY_IMAGE) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_CAT_DISPLAY_IMAGE'] . '</option>';
	}

	/**
	* Update cat data
	*/
	function update_cat_data(&$cat_data)
	{
		global $db, $user, $cache, $arcade;

		$errors = array();

		if (!$cat_data['cat_name'])
		{
			$errors[] = $user->lang['CAT_NAME_EMPTY'];
		}

		if (utf8_strlen($cat_data['cat_desc']) > 4000)
		{
			$errors[] = $user->lang['CAT_DESC_TOO_LONG'];
		}

		if (utf8_strlen($cat_data['cat_rules']) > 4000)
		{
			$errors[] = $user->lang['CAT_RULES_TOO_LONG'];
		}

		if ($cat_data['cat_password'] || $cat_data['cat_password_confirm'])
		{
			if ($cat_data['cat_password'] != $cat_data['cat_password_confirm'])
			{
				$cat_data['cat_password'] = $cat_data['cat_password_confirm'] = '';
				$errors[] = $user->lang['CAT_PASSWORD_MISMATCH'];
			}
		}

		// Set category flags
		// 1 = link tracking
		$cat_data['cat_flags'] = 0;
		$cat_data['cat_flags'] += ($cat_data['cat_link_track']) ? ARCADE_FLAG_LINK_TRACK : 0;

		// Unset data that are not database fields
		$cat_data_sql = $cat_data;

		unset($cat_data_sql['cat_link_track']);
		unset($cat_data_sql['cat_password_confirm']);

		// What are we going to do tonight Brain? The same thing we do everynight,
		// try to take over the world ... or decide whether to continue update
		// and if so, whether it's a new forum/cat/link or an existing one
		if (sizeof($errors))
		{
			return $errors;
		}

		// As we don't know the old password, it's kinda tricky to detect changes
		if ($cat_data_sql['cat_password_unset'])
		{
			$cat_data_sql['cat_password'] = '';
		}
		else if (empty($cat_data_sql['cat_password']))
		{
			unset($cat_data_sql['cat_password']);
		}
		else
		{
			$cat_data_sql['cat_password'] = phpbb_hash($cat_data_sql['cat_password']);
		}
		unset($cat_data_sql['cat_password_unset']);

		if (!isset($cat_data_sql['cat_id']))
		{
			// no cat_id means we're creating a new forum
			unset($cat_data_sql['type_action']);

			if ($cat_data_sql['parent_id'])
			{
				$sql = 'SELECT left_id, right_id
					FROM ' . ARCADE_CATS_TABLE . '
					WHERE cat_id = ' . $cat_data_sql['parent_id'];
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					trigger_error($user->lang['ARCADE_PARENT_NOT_EXIST'] . adm_back_link($this->u_action . '&amp;' . $this->parent_id), E_USER_WARNING);
				}

				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET left_id = left_id + 2, right_id = right_id + 2
					WHERE left_id > ' . $row['right_id'];
				$db->sql_query($sql);

				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET right_id = right_id + 2
					WHERE ' . $row['left_id'] . ' BETWEEN left_id AND right_id';
				$db->sql_query($sql);

				$cat_data_sql['left_id'] = $row['right_id'];
				$cat_data_sql['right_id'] = $row['right_id'] + 1;
			}
			else
			{
				$sql = 'SELECT MAX(right_id) AS right_id
					FROM ' . ARCADE_CATS_TABLE;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				$cat_data_sql['left_id'] = $row['right_id'] + 1;
				$cat_data_sql['right_id'] = $row['right_id'] + 2;
			}

			$sql = 'INSERT INTO ' . ARCADE_CATS_TABLE . ' ' . $db->sql_build_array('INSERT', $cat_data_sql);
			$db->sql_query($sql);

			$cat_data['cat_id'] = $db->sql_nextid();

			add_log('admin', 'LOG_ARCADE_ADD_CAT', $cat_data['cat_name']);
		}
		else
		{
			$row = $arcade->get_cat_info($cat_data_sql['cat_id']);

			if ($row['cat_type'] == ARCADE_CAT_GAMES && $row['cat_type'] != $cat_data_sql['cat_type'])
			{
				// Has subforums and want to change into a link?
				if ($row['right_id'] - $row['left_id'] > 1 && $cat_data_sql['cat_type'] == ARCADE_LINK)
				{
					$errors[] = $user->lang['CAT_WITH_SUBCATS_NOT_TO_LINK'];
					return $errors;
				}

				// we're turning a postable forum into a non-postable forum
				if ($cat_data_sql['type_action'] == 'move')
				{
					$to_cat_id = request_var('to_cat_id', 0);

					if ($to_cat_id)
					{
						$errors = $this->move_cat_content($cat_data_sql['cat_id'], $to_cat_id);
					}
					else
					{
						return array($user->lang['NO_DESTINATION_CAT']);
					}
				}
				else if ($cat_data_sql['type_action'] == 'delete')
				{
					$errors = $this->delete_cat_content($cat_data_sql['cat_id']);
				}
				else
				{
					return array($user->lang['NO_CAT_ACTION']);
				}

				$cat_data_sql['cat_games'] = $cat_data_sql['cat_plays'] = $cat_data_sql['cat_last_play_game_id'] = $cat_data_sql['cat_last_game_installdate'] = $cat_data_sql['cat_last_play_user_id'] = $cat_data_sql['cat_last_play_score'] = $cat_data_sql['cat_last_play_time'] = 0;
				$cat_data_sql['cat_last_play_game_name'] = $cat_data_sql['cat_last_play_username'] = $cat_data_sql['cat_last_play_user_colour'] = '';
			}
			else if ($row['cat_type'] == ARCADE_CAT && $cat_data_sql['cat_type'] == ARCADE_LINK)
			{
				// Has subforums?
				if ($row['right_id'] - $row['left_id'] > 1)
				{
					// We are turning a category into a link - but need to decide what to do with the subforums.
					$action_subcats = request_var('action_subcats', '');
					$subcats_to_id = request_var('subcats_to_id', 0);

					if ($action_subcats == 'delete')
					{
						$rows = $arcade->get_cat_branch($row['cat_id'], 'children', 'descending', false);

						foreach ($rows as $_row)
						{
							// Do not remove the forum id we are about to change. ;)
							if ($_row['cat_id'] == $row['cat_id'])
							{
								continue;
							}

							$cat_ids[] = $_row['cat_id'];
							$errors = array_merge($errors, $this->delete_cat_content($_row['cat_id']));
						}

						if (sizeof($errors))
						{
							return $errors;
						}

						if (sizeof($cat_ids))
						{
							$sql = 'DELETE FROM ' . ARCADE_CATS_TABLE . '
								WHERE ' . $db->sql_in_set('cat_id', $cat_ids);
							$db->sql_query($sql);
						}
					}
					else if ($action_subcats == 'move')
					{
						if (!$subcats_to_id)
						{
							return array($user->lang['NO_DESTINATION_CAT']);
						}

						$sql = 'SELECT cat_name
							FROM ' . ARCADE_CATS_TABLE . '
							WHERE cat_id = ' . $subcats_to_id;
						$result = $db->sql_query($sql);
						$_row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);

						if (!$_row)
						{
							return array($user->lang['NO_CAT_ID']);
						}

						$subcats_to_name = $_row['cat_name'];

						$sql = 'SELECT cat_id
							FROM ' . ARCADE_CATS_TABLE . "
							WHERE parent_id = {$row['cat_id']}";
						$result = $db->sql_query($sql);

						while ($_row = $db->sql_fetchrow($result))
						{
							$this->move_cat($_row['cat_id'], $subcats_to_id);
						}
						$db->sql_freeresult($result);

						$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
							SET parent_id = $subcats_to_id
							WHERE parent_id = {$row['cat_id']}";
						$db->sql_query($sql);
					}

					// Adjust the left/right id
					$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
						SET right_id = left_id + 1
						WHERE cat_id = ' . $row['cat_id'];
					$db->sql_query($sql);
				}
			}
			else if ($row['cat_type'] == ARCADE_CAT && $cat_data_sql['cat_type'] == ARCADE_CAT_GAMES)
			{
				// Changing a category to a forum? Reset the data (you can't post directly in a cat, you must use a forum)
				$cat_data_sql['cat_games'] = 0;
				$cat_data_sql['cat_plays'] = 0;
				$cat_data_sql['cat_last_play_game_id'] = 0;
				$cat_data_sql['cat_last_play_game_name'] = '';
				$cat_data_sql['cat_last_game_installdate'] = 0;
				$cat_data_sql['cat_last_play_user_id'] = 0;
				$cat_data_sql['cat_last_play_score'] = 0;
				$cat_data_sql['cat_last_play_time'] = 0;
				$cat_data_sql['cat_last_play_username'] = '';
				$cat_data_sql['cat_last_play_user_colour'] = '';
			}

			if (sizeof($errors))
			{
				return $errors;
			}

			if ($row['parent_id'] != $cat_data_sql['parent_id'])
			{
				
				
				if ($row['cat_id'] != $cat_data_sql['parent_id'])
				{
					$errors = $this->move_cat($cat_data_sql['cat_id'], $cat_data_sql['parent_id']);
				}
				else
				{
					$cat_data_sql['parent_id'] = $row['parent_id'];
				}
			}

			if (sizeof($errors))
			{
				return $errors;
			}

			unset($cat_data_sql['type_action']);

			if ($row['cat_name'] != $cat_data_sql['cat_name'])
			{
				// the forum name has changed, clear the parents list of all forums (for safety)
				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
					SET cat_parents = ''";
				$db->sql_query($sql);
			}

			// Setting the forum id to the forum id is not really received well by some dbs. ;)
			$cat_id = $cat_data_sql['cat_id'];
			unset($cat_data_sql['cat_id']);

			$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $cat_data_sql) . '
				WHERE cat_id = ' . $cat_id;
			$db->sql_query($sql);

			// Add it back
			$cat_data['cat_id'] = $cat_id;

			add_log('admin', 'LOG_ARCADE_CAT_EDIT', $cat_data['cat_name']);
		}

		return $errors;
	}

	/**
	* Move forum
	*/
	function move_cat($from_id, $to_id)
	{
		global $db, $arcade;

		$to_data = $moved_ids = $errors = array();
		// Check if we want to move to a parent with link type
		if ($to_id > 0)
		{
			$to_data = $arcade->get_cat_info($to_id);

			if ($to_data['cat_type'] == ARCADE_LINK)
			{
				$errors[] = $user->lang['PARENT_IS_LINK_ARCADE'];
				return $errors;
			}
		}

		$moved_forums = $arcade->get_cat_branch($from_id, 'children', 'descending');
		$from_data = $moved_forums[0];
		$diff = sizeof($moved_forums) * 2;

		$moved_ids = array();
		for ($i = 0; $i < sizeof($moved_forums); ++$i)
		{
			$moved_ids[] = $moved_forums[$i]['cat_id'];
		}

		// Resync parents
		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET right_id = right_id - $diff, cat_parents = ''
			WHERE left_id < " . $from_data['right_id'] . "
				AND right_id > " . $from_data['right_id'];
		$db->sql_query($sql);

		// Resync righthand side of tree
		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET left_id = left_id - $diff, right_id = right_id - $diff, cat_parents = ''
			WHERE left_id > " . $from_data['right_id'];
		$db->sql_query($sql);

		if ($to_id > 0)
		{
			$to_data = $arcade->get_cat_info($to_id);

			// Resync new parents
			$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
				SET right_id = right_id + $diff, cat_parents = ''
				WHERE " . $to_data['right_id'] . ' BETWEEN left_id AND right_id
					AND ' . $db->sql_in_set('cat_id', $moved_ids, true);
			$db->sql_query($sql);

			// Resync the righthand side of the tree
			$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
				SET left_id = left_id + $diff, right_id = right_id + $diff, cat_parents = ''
				WHERE left_id > " . $to_data['right_id'] . '
					AND ' . $db->sql_in_set('cat_id', $moved_ids, true);
			$db->sql_query($sql);

			// Resync moved branch
			$to_data['right_id'] += $diff;

			if ($to_data['right_id'] > $from_data['right_id'])
			{
				$diff = '+ ' . ($to_data['right_id'] - $from_data['right_id'] - 1);
			}
			else
			{
				$diff = '- ' . abs($to_data['right_id'] - $from_data['right_id'] - 1);
			}
		}
		else
		{
			$sql = 'SELECT MAX(right_id) AS right_id
				FROM ' . ARCADE_CATS_TABLE . '
				WHERE ' . $db->sql_in_set('cat_id', $moved_ids, true);
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			$diff = '+ ' . ($row['right_id'] - $from_data['left_id'] + 1);
		}

		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET left_id = left_id $diff, right_id = right_id $diff, cat_parents = ''
			WHERE " . $db->sql_in_set('cat_id', $moved_ids);
		$db->sql_query($sql);
	}

	/**
	* Move forum content from one to another forum
	*/
	function move_cat_content($from_id, $to_id, $sync = true)
	{
		global $db, $arcade;

		$table_ary = array(ARCADE_GAMES_TABLE);

		foreach ($table_ary as $table)
		{
			$sql = "UPDATE $table
				SET cat_id = $to_id
				WHERE cat_id = $from_id";
			$db->sql_query($sql);
		}
		unset($table_ary);

		if ($sync)
		{
			// Sync total games and plays for the categories...
			$arcade->sync('category');
		}
		return array();
	}

	/**
	* Remove complete forum
	*/
	function delete_cat($cat_id, $action_games = 'delete', $action_subcats = 'delete', $games_to_id = 0, $subcats_to_id = 0)
	{
		global $db, $user, $cache, $arcade;

		$cat_data = $arcade->get_cat_info($cat_id);

		$errors = array();
		$log_action_games = $log_action_cats = $games_to_name = $subcats_to_name = '';
		$cat_ids = array($cat_id);

		if ($action_games == 'delete')
		{
			$log_action_games = 'GAMES';
			$errors = array_merge($errors, $this->delete_cat_content($cat_id));
		}
		else if ($action_games == 'move')
		{
			if (!$games_to_id)
			{
				$errors[] = $user->lang['NO_DESTINATION_CAT'];
			}
			else
			{
				$log_action_games = 'MOVE_GAMES';

				$sql = 'SELECT cat_name
					FROM ' . ARCADE_CATS_TABLE . '
					WHERE cat_id = ' . $games_to_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					$errors[] = $user->lang['NO_CAT_ID'];
				}
				else
				{
					$posts_to_name = $row['cat_name'];
					$errors = array_merge($errors, $this->move_cat_content($cat_id, $games_to_id));
				}
			}
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		if ($action_subcats == 'delete')
		{
			$log_action_cats = 'CATS';
			$rows = $arcade->get_cat_branch($cat_id, 'children', 'descending', false);

			foreach ($rows as $row)
			{
				$cat_ids[] = $row['cat_id'];
				$errors = array_merge($errors, $this->delete_cat_content($row['cat_id']));
			}

			if (sizeof($errors))
			{
				return $errors;
			}

			$diff = sizeof($cat_ids) * 2;

			$sql = 'DELETE FROM ' . ARCADE_CATS_TABLE . '
				WHERE ' . $db->sql_in_set('cat_id', $cat_ids);
			$db->sql_query($sql);
		}
		else if ($action_subcats == 'move')
		{
			if (!$subcats_to_id)
			{
				$errors[] = $user->lang['NO_DESTINATION_CAT'];
			}
			else
			{
				$log_action_cats = 'MOVE_CATS';

				$sql = 'SELECT cat_name
					FROM ' . ARCADE_CATS_TABLE . '
					WHERE cat_id = ' . $subcats_to_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);

				if (!$row)
				{
					$errors[] = $user->lang['NO_CAT_ID'];
				}
				else
				{
					$subcats_to_name = $row['cat_name'];

					$sql = 'SELECT cat_id
						FROM ' . ARCADE_CATS_TABLE . "
						WHERE parent_id = $cat_id";
					$result = $db->sql_query($sql);

					while ($row = $db->sql_fetchrow($result))
					{
						$this->move_cat($row['cat_id'], $subcats_to_id);
					}
					$db->sql_freeresult($result);

					$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
						SET parent_id = $subcats_to_id
						WHERE parent_id = $cat_id";
					$db->sql_query($sql);

					$cat_data = $arcade->get_cat_info($cat_id);

					$diff = 2;
					$sql = 'DELETE FROM ' . ARCADE_CATS_TABLE . "
						WHERE cat_id = $cat_id";
					$db->sql_query($sql);
				}
			}

			if (sizeof($errors))
			{
				return $errors;
			}
		}
		else
		{
			$diff = 2;
			$sql = 'DELETE FROM ' . ARCADE_CATS_TABLE . "
				WHERE cat_id = $cat_id";
			$db->sql_query($sql);
		}

		// Resync tree
		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET right_id = right_id - $diff
			WHERE left_id < {$cat_data['right_id']} AND right_id > {$cat_data['right_id']}";
		$db->sql_query($sql);

		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET left_id = left_id - $diff, right_id = right_id - $diff
			WHERE left_id > {$cat_data['right_id']}";
		$db->sql_query($sql);

		$log_action = implode('_', array($log_action_games, $log_action_cats));

		switch ($log_action)
		{
			case 'MOVE_GAMES_MOVE_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_MOVE_GAMES_MOVE_CATS', $posts_to_name, $subcats_to_name, $cat_data['cat_name']);
			break;

			case 'MOVE_GAMES_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_MOVE_GAMES_CATS', $posts_to_name, $cat_data['cat_name']);
			break;

			case 'GAMES_MOVE_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_GAMES_MOVE_CATS', $subcats_to_name, $cat_data['cat_name']);
			break;

			case '_MOVE_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_MOVE_CATS', $subcats_to_name, $cat_data['cat_name']);
			break;

			case 'MOVE_GAMES_':
				add_log('admin', 'LOG_ARCADE_DEL_MOVE_GAMES', $posts_to_name, $cat_data['cat_name']);
			break;

			case 'GAMES_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_GAMES_CATS', $cat_data['cat_name']);
			break;

			case '_CATS':
				add_log('admin', 'LOG_ARCADE_DEL_CATS', $cat_data['cat_name']);
			break;

			case 'GAMES_':
				add_log('admin', 'LOG_ARCADE_DEL_GAMES', $cat_data['cat_name']);
			break;

			default:
				add_log('admin', 'LOG_ARCADE_DEL_CAT', $cat_data['cat_name']);
			break;
		}

		return $errors;
	}

	/**
	* Delete forum content
	*/
	function delete_cat_content($cat_id)
	{
		global $db, $user, $arcade;

		$errors = array();
		if (!$cat_id)
		{
			$errors[] = $user->lang['NO_CAT_ID'];
		}

		if (sizeof($errors))
		{
			return $errors;
		}

		$sql = 'SELECT game_id FROM ' . ARCADE_GAMES_TABLE . '
			WHERE cat_id = ' . $cat_id;

		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$sql = 'DELETE FROM ' . ARCADE_SCORES_TABLE . '
				WHERE game_id = ' . $row['game_id'];
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . ARCADE_GAMES_TABLE . '
				WHERE game_id = ' . $row['game_id'];
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . ARCADE_FAVS_TABLE . '
				WHERE game_id = ' . $row['game_id'];
			$db->sql_query($sql);

			$sql = 'DELETE FROM ' . ARCADE_RATING_TABLE . '
				WHERE game_id = ' . $row['game_id'];
			$db->sql_query($sql);

			// Review this because it may not be nessecary since
			// In all cases so far we remove the category anyways....
			$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
				SET cat_games = cat_games - 1
				WHERE cat_id = ' . $cat_id;
			$db->sql_query($sql);
		}
		$db->sql_freeresult($result);

		$arcade->set_last_play($cat_id);

		return $errors;
	}

	/**
	* Move forum position by $steps up/down
	*/
	function move_cat_by($cat_row, $action = 'move_up', $steps = 1)
	{
		global $db;

		/**
		* Fetch all the siblings between the module's current spot
		* and where we want to move it to. If there are less than $steps
		* siblings between the current spot and the target then the
		* module will move as far as possible
		*/
		$sql = 'SELECT cat_id, cat_name, left_id, right_id
			FROM ' . ARCADE_CATS_TABLE . "
			WHERE parent_id = {$cat_row['parent_id']}
				AND " . (($action == 'move_up') ? "right_id < {$cat_row['right_id']} ORDER BY right_id DESC" : "left_id > {$cat_row['left_id']} ORDER BY left_id ASC");
		$result = $db->sql_query_limit($sql, $steps);

		$target = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$target = $row;
		}
		$db->sql_freeresult($result);

		if (!sizeof($target))
		{
			// The forum is already on top or bottom
			return false;
		}

		/**
		* $left_id and $right_id define the scope of the nodes that are affected by the move.
		* $diff_up and $diff_down are the values to substract or add to each node's left_id
		* and right_id in order to move them up or down.
		* $move_up_left and $move_up_right define the scope of the nodes that are moving
		* up. Other nodes in the scope of ($left_id, $right_id) are considered to move down.
		*/
		if ($action == 'move_up')
		{
			$left_id = $target['left_id'];
			$right_id = $cat_row['right_id'];

			$diff_up = $cat_row['left_id'] - $target['left_id'];
			$diff_down = $cat_row['right_id'] + 1 - $cat_row['left_id'];

			$move_up_left = $cat_row['left_id'];
			$move_up_right = $cat_row['right_id'];
		}
		else
		{
			$left_id = $cat_row['left_id'];
			$right_id = $target['right_id'];

			$diff_up = $cat_row['right_id'] + 1 - $cat_row['left_id'];
			$diff_down = $target['right_id'] - $cat_row['right_id'];

			$move_up_left = $cat_row['right_id'] + 1;
			$move_up_right = $target['right_id'];
		}

		// Now do the dirty job
		$sql = 'UPDATE ' . ARCADE_CATS_TABLE . "
			SET left_id = left_id + CASE
				WHEN left_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END,
			right_id = right_id + CASE
				WHEN right_id BETWEEN {$move_up_left} AND {$move_up_right} THEN -{$diff_up}
				ELSE {$diff_down}
			END,
			cat_parents = ''
			WHERE
				left_id BETWEEN {$left_id} AND {$right_id}
				AND right_id BETWEEN {$left_id} AND {$right_id}";
		$db->sql_query($sql);

		return $target['cat_name'];
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
}

?>