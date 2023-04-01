<?php
/**
*
* @package acp
* @version $Id: acp_arcade_permissions.php 554 2008-11-17 20:43:13Z jrsweets $
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
class acp_arcade_permissions
{
	var $u_action;
	var $permission_dropdown;

	function main($id, $mode)
	{
		global $db, $user, $auth, $auth_arcade, $template, $prefix_phpbb3, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
		include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		$auth_admin = new auth_arcade_admin();
		// Initialize arcade class
		$arcade = new arcade_admin();

		$user->add_lang('acp/permissions');
		add_permission_language();

		$this->tpl_name = 'acp_arcade_permissions';

		// Trace has other vars
		if ($mode == 'trace')
		{
			$user_id = request_var('u', 0);
			$cat_id = request_var('c', 0);
			$permission = request_var('auth', '');

			$this->tpl_name = 'permission_trace';

			if ($user_id && isset($auth_admin->acl_options['id'][$permission]) && $auth->acl_get('a_viewauth'))
			{
				$this->page_title = sprintf($user->lang['TRACE_PERMISSION'], $user->lang['acl_' . $permission]['lang']);
				$this->permission_trace($user_id, $cat_id, $permission);
				return;
			}
			trigger_error('NO_MODE', E_USER_ERROR);
		}

		// Set some vars
		$action = request_var('action', array('' => 0));
		$action = key($action);
		$action = (isset($_POST['psubmit'])) ? 'apply_permissions' : $action;

		$all_cats = request_var('all_cats', 0);
		$subcat_id = request_var('subcat_id', 0);
		$cat_id = request_var('cat_id', array(0));

		$username = request_var('username', array(''), true);
		$usernames = request_var('usernames', '', true);
		$user_id = request_var('user_id', array(0));

		$group_id = request_var('group_id', array(0));
		$select_all_groups = request_var('select_all_groups', 0);

		$form_name = 'acp_permissions';
		add_form_key($form_name);

		// If select all groups is set, we pre-build the group id array (this option is used for other screens to link to the permission settings screen)
		if ($select_all_groups)
		{
			// Add default groups to selection
			$sql_and = (!$config['coppa_enable']) ? " AND group_name <> 'REGISTERED_COPPA'" : '';

			$sql = 'SELECT group_id
				FROM ' . GROUPS_TABLE . '
				WHERE group_type = ' . GROUP_SPECIAL . "
				$sql_and";
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$group_id[] = $row['group_id'];
			}
			$db->sql_freeresult($result);
		}

		// Map usernames to ids and vice versa
		if ($usernames)
		{
			$username = explode("\n", $usernames);
		}
		unset($usernames);

		if (sizeof($username) && !sizeof($user_id))
		{
			user_get_id_name($user_id, $username);

			if (!sizeof($user_id))
			{
				trigger_error($user->lang['SELECTED_USER_NOT_EXIST'] . adm_back_link($this->u_action), E_USER_WARNING);
			}
		}
		unset($username);

		// Build category ids (of all categorys are checked or subcategory listing used)
		if ($all_cats)
		{
			$sql = 'SELECT cat_id
				FROM ' . ARCADE_CATS_TABLE . '
				ORDER BY left_id';
			$result = $db->sql_query($sql);

			$cat_id = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$cat_id[] = (int) $row['cat_id'];
			}
			$db->sql_freeresult($result);
		}
		else if ($subcat_id)
		{
			$cat_id = array();
			foreach ($arcade->get_cat_branch($subcat_id, 'children') as $row)
			{
				$cat_id[] = (int) $row['cat_id'];
			}
		}

		// Define some common variables for every mode
		$error = array();

		$permission_scope = (strpos($mode, '_global') !== false) ? 'global' : 'local';

		// Showing introductionary page?
		if ($mode == 'intro')
		{
			$this->page_title = 'ACP_PERMISSIONS';

			$template->assign_vars(array(
				'S_INTRO'		=> true)
			);

			return;
		}

		switch ($mode)
		{
			case 'setting_user_local':
			case 'setting_group_local':
				$this->permission_dropdown = array('c_');
				$permission_victim = ($mode == 'setting_user_local') ? array('user', 'category') : array('group', 'category');
				$this->page_title = ($mode == 'setting_user_local') ? 'ACP_ARCADE_USERS_CATEGORY_PERMISSIONS' : 'ACP_ARCADE_GROUPS_CATEGORY_PERMISSIONS';
			break;

			case 'setting_category_local':
				$this->permission_dropdown = array('c_');
				$permission_victim = array('category', 'usergroup');
				$this->page_title = 'ACP_ARCADE_CATEGORY_PERMISSIONS';
			break;

			case 'view_category_local':
				$this->permission_dropdown = array('c_');
				$permission_victim = array('category', 'usergroup_view');
				$this->page_title = 'ACP_VIEW_ARCADE_CATEGORY_PERMISSIONS';
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}

		$template->assign_vars(array(
			'L_TITLE'		=> $user->lang[$this->page_title],
			'L_EXPLAIN'		=> $user->lang[$this->page_title . '_EXPLAIN'])
		);

		// Get permission type
		$permission_type = request_var('type', $this->permission_dropdown[0]);

		if (!in_array($permission_type, $this->permission_dropdown))
		{
			trigger_error($user->lang['WRONG_PERMISSION_TYPE'] . adm_back_link($this->u_action), E_USER_WARNING);
		}


		// Handle actions
		if (strpos($mode, 'setting_') === 0 && $action)
		{
			switch ($action)
			{
				case 'delete':

					if (!check_form_key($form_name))
					{
						trigger_error($user->lang['FORM_INVALID']. adm_back_link($this->u_action), E_USER_WARNING);
					}
					// All users/groups selected?
					$all_users = (isset($_POST['all_users'])) ? true : false;
					$all_groups = (isset($_POST['all_groups'])) ? true : false;

					if ($all_users || $all_groups)
					{
						$items = $this->retrieve_defined_user_groups($permission_scope, $cat_id, $permission_type);

						if ($all_users && sizeof($items['user_ids']))
						{
							$user_id = $items['user_ids'];
						}
						else if ($all_groups && sizeof($items['group_ids']))
						{
							$group_id = $items['group_ids'];
						}
					}

					if (sizeof($user_id) || sizeof($group_id))
					{
						$this->remove_permissions($mode, $permission_type, $auth_admin, $user_id, $group_id, $cat_id);
					}
					else
					{
						trigger_error($user->lang['NO_USER_GROUP_SELECTED'] . adm_back_link($this->u_action), E_USER_WARNING);
					}
				break;

				case 'apply_permissions':
					if (!isset($_POST['setting']))
					{
						trigger_error($user->lang['NO_AUTH_SETTING_FOUND'] . adm_back_link($this->u_action), E_USER_WARNING);
					}
					if (!check_form_key($form_name))
					{
						trigger_error($user->lang['FORM_INVALID']. adm_back_link($this->u_action), E_USER_WARNING);
					}

					$this->set_permissions($mode, $permission_type, $auth_admin, $user_id, $group_id);
				break;

				case 'apply_all_permissions':
					if (!isset($_POST['setting']))
					{
						trigger_error($user->lang['NO_AUTH_SETTING_FOUND'] . adm_back_link($this->u_action), E_USER_WARNING);
					}
					if (!check_form_key($form_name))
					{
						trigger_error($user->lang['FORM_INVALID']. adm_back_link($this->u_action), E_USER_WARNING);
					}

					$this->set_all_permissions($mode, $permission_type, $auth_admin, $user_id, $group_id);
				break;
			}
		}


		// Setting permissions screen
		$s_hidden_fields = build_hidden_fields(array(
			'user_id'		=> $user_id,
			'group_id'		=> $group_id,
			'cat_id'		=> $cat_id,
			'type'			=> $permission_type)
		);

		// Go through the screens/options needed and present them in correct order
		foreach ($permission_victim as $victim)
		{
			switch ($victim)
			{
				case 'category_dropdown':

					if (sizeof($cat_id))
					{
						$this->check_existence('category', $cat_id);
						continue 2;
					}

					$template->assign_vars(array(
						'S_SELECT_CATEGORY'		=> true,
						'S_CATEGORY_OPTIONS'		=> $arcade->make_cat_select(false, false, true, false, false))
					);

				break;

				case 'category':

					if (sizeof($cat_id))
					{
						$this->check_existence('category', $cat_id);
						continue 2;
					}

					$cat_list = $arcade->make_cat_select(false, false, true, false, false, false, true);

					// Build category options
					$s_category_options = '';
					foreach ($cat_list as $c_id => $c_row)
					{
						$s_category_options .= '<option value="' . $c_id . '"' . (($c_row['selected']) ? ' selected="selected"' : '') . (($c_row['disabled']) ? ' disabled="disabled" class="disabled-option"' : '') . '>' . $c_row['padding'] . $c_row['cat_name'] . '</option>';
					}

					// Build subcategory options
					$s_subcategory_options = $this->build_subcategory_options($cat_list);

					$template->assign_vars(array(
						'S_SELECT_CATEGORY'		=> true,
						'S_CATEGORY_OPTIONS'	=> $s_category_options,
						'S_SUBCATEGORY_OPTIONS'	=> $s_subcategory_options,
						'S_CATEGORY_ALL'			=> true,
						'S_CATEGORY_MULTIPLE'		=> true)
					);

				break;

				case 'user':

					if (sizeof($user_id))
					{
						$this->check_existence('user', $user_id);
						continue 2;
					}

					$template->assign_vars(array(
						'S_SELECT_USER'			=> true,
						'U_FIND_USERNAME'		=> append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=searchuser&amp;form=select_victim&amp;field=username&amp;select_single=true'),
					));

				break;

				case 'group':

					if (sizeof($group_id))
					{
						$this->check_existence('group', $group_id);
						continue 2;
					}

					$template->assign_vars(array(
						'S_SELECT_GROUP'		=> true,
						'S_GROUP_OPTIONS'		=> group_select_options(false, false, false), // Show all groups
					));

				break;

				case 'usergroup':
				case 'usergroup_view':

					$all_users = (isset($_POST['all_users'])) ? true : false;
					$all_groups = (isset($_POST['all_groups'])) ? true : false;

					if ((sizeof($user_id) && !$all_users) || (sizeof($group_id) && !$all_groups))
					{
						if (sizeof($user_id))
						{
							$this->check_existence('user', $user_id);
						}

						if (sizeof($group_id))
						{
							$this->check_existence('group', $group_id);
						}

						continue 2;
					}

					// Now we check the users... because the "all"-selection is different here (all defined users/groups)
					$items = $this->retrieve_defined_user_groups($permission_scope, $cat_id, $permission_type);

					if ($all_users && sizeof($items['user_ids']))
					{
						$user_id = $items['user_ids'];
						continue 2;
					}

					if ($all_groups && sizeof($items['group_ids']))
					{
						$group_id = $items['group_ids'];
						continue 2;
					}

					$template->assign_vars(array(
						'S_SELECT_USERGROUP'		=> ($victim == 'usergroup') ? true : false,
						'S_SELECT_USERGROUP_VIEW'	=> ($victim == 'usergroup_view') ? true : false,
						'S_DEFINED_USER_OPTIONS'	=> $items['user_ids_options'],
						'S_DEFINED_GROUP_OPTIONS'	=> $items['group_ids_options'],
						'S_ADD_GROUP_OPTIONS'		=> group_select_options(false, $items['group_ids'], false),	// Show all groups
						'U_FIND_USERNAME'			=> append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=searchuser&amp;form=add_user&amp;field=username&amp;select_single=true'),
					));

				break;
			}

			// The S_ALLOW_SELECT parameter below is a measure to lower memory usage.
			// If there are more than 5 categorys selected the admin is not able to select all users/groups too.
			// We need to see if the number of categorys can be increased or need to be decreased.

			$template->assign_vars(array(
				'U_ACTION'				=> $this->u_action,
				'ANONYMOUS_USER_ID'		=> ANONYMOUS,

				'S_SELECT_VICTIM'		=> true,
				'S_ALLOW_ALL_SELECT'	=> (sizeof($cat_id) > 5) ? false : true,
				'S_CAN_SELECT_USER'		=> ($auth->acl_get('a_authusers')) ? true : false,
				'S_CAN_SELECT_GROUP'	=> ($auth->acl_get('a_authgroups')) ? true : false,
				'S_HIDDEN_FIELDS'		=> $s_hidden_fields)
			);

			// Let the category names being displayed
			if (sizeof($cat_id))
			{
				$sql = 'SELECT cat_name
					FROM ' . ARCADE_CATS_TABLE . '
					WHERE ' . $db->sql_in_set('cat_id', $cat_id) . '
					ORDER BY left_id ASC';
				$result = $db->sql_query($sql);

				$cat_names = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$cat_names[] = $row['cat_name'];
				}
				$db->sql_freeresult($result);

				$template->assign_vars(array(
					'S_CATEGORY_NAMES'		=> (sizeof($cat_names)) ? true : false,
					'CATEGORY_NAMES'		=> implode(', ', $cat_names))
				);
			}

			return;
		}

		// Do not allow category_ids being set and no other setting defined (will bog down the server too much)
		if (sizeof($cat_id) && !sizeof($user_id) && !sizeof($group_id))
		{
			trigger_error($user->lang['ONLY_CATEGORY_DEFINED'] . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$template->assign_vars(array(
			'S_PERMISSION_DROPDOWN'		=> (sizeof($this->permission_dropdown) > 1) ? $this->build_permission_dropdown($this->permission_dropdown, $permission_type, $permission_scope) : false,
			'L_PERMISSION_TYPE'			=> $user->lang['ACL_TYPE_' . strtoupper($permission_type)],

			'U_ACTION'					=> $this->u_action,
			'S_HIDDEN_FIELDS'			=> $s_hidden_fields)
		);

		if (strpos($mode, 'setting_') === 0)
		{
			$template->assign_vars(array(
				'S_SETTING_PERMISSIONS'		=> true)
			);

			$hold_ary = $auth_admin->get_mask('set', (sizeof($user_id)) ? $user_id : false, (sizeof($group_id)) ? $group_id : false, (sizeof($cat_id)) ? $cat_id : false, $permission_type, $permission_scope, ACL_NO);
			$auth_admin->display_mask('set', $permission_type, $hold_ary, ((sizeof($user_id)) ? 'user' : 'group'), (($permission_scope == 'local') ? true : false));
		}
		else
		{
			$template->assign_vars(array(
				'S_VIEWING_PERMISSIONS'		=> true)
			);

			$hold_ary = $auth_admin->get_mask('view', (sizeof($user_id)) ? $user_id : false, (sizeof($group_id)) ? $group_id : false, (sizeof($cat_id)) ? $cat_id : false, $permission_type, $permission_scope, ACL_NEVER);
			$auth_admin->display_mask('view', $permission_type, $hold_ary, ((sizeof($user_id)) ? 'user' : 'group'), (($permission_scope == 'local') ? true : false));
		}
	}

	/**
	* Build +subcategory options
	*/
	function build_subcategory_options($category_list)
	{
		global $user;

		$s_options = '';

		$category_list = array_merge($category_list);

		foreach ($category_list as $key => $row)
		{
			if ($row['disabled'])
			{
				continue;
			}

			$s_options .= '<option value="' . $row['cat_id'] . '"' . (($row['selected']) ? ' selected="selected"' : '') . '>' . $row['padding'] . $row['cat_name'];

			// We check if a branch is there...
			$branch_there = false;

			foreach (array_slice($category_list, $key + 1) as $temp_row)
			{
				if ($temp_row['left_id'] > $row['left_id'] && $temp_row['left_id'] < $row['right_id'])
				{
					$branch_there = true;
					break;
				}
				continue;
			}

			if ($branch_there)
			{
				$s_options .= ' [' . $user->lang['PLUS_SUBCATS'] . ']';
			}

			$s_options .= '</option>';
		}

		return $s_options;
	}

	/**
	* Build dropdown field for changing permission types
	*/
	function build_permission_dropdown($options, $default_option, $permission_scope)
	{
		global $user, $auth;

		$s_dropdown_options = '';
		foreach ($options as $setting)
		{
			if (!$auth->acl_get('a_' . str_replace('_', '', $setting) . 'auth'))
			{
				continue;
			}

			$selected = ($setting == $default_option) ? ' selected="selected"' : '';
			$l_setting = (isset($user->lang['permission_type'][$permission_scope][$setting])) ? $user->lang['permission_type'][$permission_scope][$setting] : $user->lang['permission_type'][$setting];
			$s_dropdown_options .= '<option value="' . $setting . '"' . $selected . '>' . $l_setting . '</option>';
		}

		return $s_dropdown_options;
	}

	/**
	* Check if selected items exist. Remove not found ids and if empty return error.
	*/
	function check_existence($mode, &$ids)
	{
		global $db, $user;

		switch ($mode)
		{
			case 'user':
				$table = USERS_TABLE;
				$sql_id = 'user_id';
			break;

			case 'group':
				$table = GROUPS_TABLE;
				$sql_id = 'group_id';
			break;

			case 'category':
				$table = ARCADE_CATS_TABLE;
				$sql_id = 'cat_id';
			break;
		}

		if (sizeof($ids))
		{
			$sql = "SELECT $sql_id
				FROM $table
				WHERE " . $db->sql_in_set($sql_id, $ids);
			$result = $db->sql_query($sql);

			$ids = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$ids[] = (int) $row[$sql_id];
			}
			$db->sql_freeresult($result);
		}

		if (!sizeof($ids))
		{
			trigger_error($user->lang['SELECTED_' . strtoupper($mode) . '_NOT_EXIST'] . adm_back_link($this->u_action), E_USER_WARNING);
		}
	}

	/**
	* Apply permissions
	*/
	function set_permissions($mode, $permission_type, &$auth_admin, &$user_id, &$group_id)
	{
		global $user, $auth;

		$psubmit = request_var('psubmit', array(0 => array(0 => 0)));

		// User or group to be set?
		$ug_type = (sizeof($user_id)) ? 'user' : 'group';

		// Check the permission setting again
		if (!$auth->acl_get('a_' . str_replace('_', '', $permission_type) . 'auth') || !$auth->acl_get('a_auth' . $ug_type . 's'))
		{
			trigger_error($user->lang['NO_AUTH_OPERATION'] . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$ug_id = $cat_id = 0;

		// We loop through the auth settings defined in our submit
		list($ug_id, ) = each($psubmit);
		list($cat_id, ) = each($psubmit[$ug_id]);

		if (empty($_POST['setting']) || empty($_POST['setting'][$ug_id]) || empty($_POST['setting'][$ug_id][$cat_id]) || !is_array($_POST['setting'][$ug_id][$cat_id]))
		{
			trigger_error('WRONG_PERMISSION_SETTING_FORMAT', E_USER_WARNING);
		}

		// We obtain and check $_POST['setting'][$ug_id][$cat_id] directly and not using request_var() because request_var()
		// currently does not support the amount of dimensions required. ;)
		// 		$auth_settings = request_var('setting', array(0 => array(0 => array('' => 0))));
		$auth_settings = array_map('intval', $_POST['setting'][$ug_id][$cat_id]);

		// Do we have a role we want to set?
		$assigned_role = (isset($_POST['role'][$ug_id][$cat_id])) ? (int) $_POST['role'][$ug_id][$cat_id] : 0;

		// Do the admin want to set these permissions to other items too?
		$inherit = request_var('inherit', array(0 => array(0)));

		$ug_id = array($ug_id);
		$cat_id = array($cat_id);

		if (sizeof($inherit))
		{
			foreach ($inherit as $_ug_id => $cat_id_ary)
			{
				// Inherit users/groups?
				if (!in_array($_ug_id, $ug_id))
				{
					$ug_id[] = $_ug_id;
				}

				// Inherit categorys?
				$cat_id = array_merge($cat_id, array_keys($cat_id_ary));
			}
		}

		$cat_id = array_unique($cat_id);

		// If the auth settings differ from the assigned role, then do not set a role...
		if ($assigned_role)
		{
			if (!$this->check_assigned_role($assigned_role, $auth_settings))
			{
				$assigned_role = 0;
			}
		}

		// Update the permission set...
		$auth_admin->acl_set($ug_type, $cat_id, $ug_id, $auth_settings, $assigned_role);


		$this->log_action($mode, 'add', $permission_type, $ug_type, $ug_id, $cat_id);

		trigger_error($user->lang['AUTH_UPDATED'] . adm_back_link($this->u_action));
	}

	/**
	* Apply all permissions
	*/
	function set_all_permissions($mode, $permission_type, &$auth_admin, &$user_id, &$group_id)
	{
		global $user, $auth;

		// User or group to be set?
		$ug_type = (sizeof($user_id)) ? 'user' : 'group';

		// Check the permission setting again
		if (!$auth->acl_get('a_' . str_replace('_', '', $permission_type) . 'auth') || !$auth->acl_get('a_auth' . $ug_type . 's'))
		{
			trigger_error($user->lang['NO_AUTH_OPERATION'] . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$auth_settings = (isset($_POST['setting'])) ? $_POST['setting'] : array();
		$auth_roles = (isset($_POST['role'])) ? $_POST['role'] : array();
		$ug_ids = $cat_ids = array();

		// We need to go through the auth settings
		foreach ($auth_settings as $ug_id => $category_auth_row)
		{
			$ug_id = (int) $ug_id;
			$ug_ids[] = $ug_id;

			foreach ($category_auth_row as $cat_id => $auth_options)
			{
				$cat_id = (int) $cat_id;
				$cat_ids[] = $cat_id;

				// Check role...
				$assigned_role = (isset($auth_roles[$ug_id][$cat_id])) ? (int) $auth_roles[$ug_id][$cat_id] : 0;

				// If the auth settings differ from the assigned role, then do not set a role...
				if ($assigned_role)
				{
					if (!$this->check_assigned_role($assigned_role, $auth_options))
					{
						$assigned_role = 0;
					}
				}

				// Update the permission set...
				$auth_admin->acl_set($ug_type, $cat_id, $ug_id, $auth_options, $assigned_role, false);
			}
		}

		$auth_admin->acl_clear_prefetch();

		$this->log_action($mode, 'add', $permission_type, $ug_type, $ug_ids, $cat_ids);

		trigger_error($user->lang['AUTH_UPDATED'] . adm_back_link($this->u_action));
	}

	/**
	* Compare auth settings with auth settings from role
	* returns false if they differ, true if they are equal
	*/
	function check_assigned_role($role_id, &$auth_settings)
	{
		global $db;

		$sql = 'SELECT o.auth_option, r.auth_setting
			FROM ' . ACL_ARCADE_OPTIONS_TABLE . ' o, ' . ACL_ARCADE_ROLES_DATA_TABLE . ' r
			WHERE o.auth_option_id = r.auth_option_id
				AND r.role_id = ' . $role_id;
		$result = $db->sql_query($sql);

		$test_auth_settings = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$test_auth_settings[$row['auth_option']] = $row['auth_setting'];
		}
		$db->sql_freeresult($result);

		// We need to add any ACL_NO setting from auth_settings to compare correctly
		foreach ($auth_settings as $option => $setting)
		{
			if ($setting == ACL_NO)
			{
				$test_auth_settings[$option] = $setting;
			}
		}

		if (sizeof(array_diff_assoc($auth_settings, $test_auth_settings)))
		{
			return false;
		}

		return true;
	}

	/**
	* Remove permissions
	*/
	function remove_permissions($mode, $permission_type, &$auth_admin, &$user_id, &$group_id, &$cat_id)
	{
		global $user, $db, $auth;

		// User or group to be set?
		$ug_type = (sizeof($user_id)) ? 'user' : 'group';

		// Check the permission setting again
		if (!$auth->acl_get('a_' . str_replace('_', '', $permission_type) . 'auth') || !$auth->acl_get('a_auth' . $ug_type . 's'))
		{
			trigger_error($user->lang['NO_AUTH_OPERATION'] . adm_back_link($this->u_action), E_USER_WARNING);
		}

		$auth_admin->acl_delete($ug_type, (($ug_type == 'user') ? $user_id : $group_id), (sizeof($cat_id) ? $cat_id : false), $permission_type);

		$this->log_action($mode, 'del', $permission_type, $ug_type, (($ug_type == 'user') ? $user_id : $group_id), (sizeof($cat_id) ? $cat_id : array(0 => 0)));

		trigger_error($user->lang['AUTH_UPDATED'] . adm_back_link($this->u_action));
	}

	/**
	* Log permission changes
	*/
	function log_action($mode, $action, $permission_type, $ug_type, $ug_id, $cat_id)
	{
		global $db, $user;

		if (!is_array($ug_id))
		{
			$ug_id = array($ug_id);
		}

		if (!is_array($cat_id))
		{
			$cat_id = array($cat_id);
		}

		// Logging ... first grab user or groupnames ...
		$sql = ($ug_type == 'group') ? 'SELECT group_name as name, group_type FROM ' . GROUPS_TABLE . ' WHERE ' : 'SELECT username as name FROM ' . USERS_TABLE . ' WHERE ';
		$sql .= $db->sql_in_set(($ug_type == 'group') ? 'group_id' : 'user_id', array_map('intval', $ug_id));
		$result = $db->sql_query($sql);

		$l_ug_list = '';
		while ($row = $db->sql_fetchrow($result))
		{
			$l_ug_list .= (($l_ug_list != '') ? ', ' : '') . ((isset($row['group_type']) && $row['group_type'] == GROUP_SPECIAL) ? '<span class="sep">' . $user->lang['G_' . $row['name']] . '</span>' : $row['name']);
		}
		$db->sql_freeresult($result);

		$mode = str_replace('setting_', '', $mode);

		if ($cat_id[0] == 0)
		{
			add_log('admin', 'LOG_ACL_' . strtoupper($action) . '_' . strtoupper($mode) . '_' . strtoupper($permission_type), $l_ug_list);
		}
		else
		{
			// Grab the category details if non-zero category_id
			$sql = 'SELECT cat_name
				FROM ' . ARCADE_CATS_TABLE . '
				WHERE ' . $db->sql_in_set('cat_id', $cat_id);
			$result = $db->sql_query($sql);

			$l_category_list = '';
			while ($row = $db->sql_fetchrow($result))
			{
				$l_category_list .= (($l_category_list != '') ? ', ' : '') . $row['cat_name'];
			}
			$db->sql_freeresult($result);

			add_log('admin', 'LOG_ACL_' . strtoupper($action) . '_' . strtoupper($mode) . '_' . strtoupper($permission_type), $l_category_list, $l_ug_list);
		}
	}

	/**
	* Display a complete trace tree for the selected permission to determine where settings are set/unset
	*/
	function permission_trace($user_id, $cat_id, $permission)
	{
		global $db, $template, $user, $auth_arcade;

		if ($user_id != $user->data['user_id'])
		{
			$sql = 'SELECT user_id, username, user_arcade_permissions, user_type
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . $user_id;
			$result = $db->sql_query($sql);
			$userdata = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
		}
		else
		{
			$userdata = $user->data;
		}

		if (!$userdata)
		{
			trigger_error('NO_USERS', E_USER_ERROR);
		}

		$category_name = false;

		if ($cat_id)
		{
			$sql = 'SELECT cat_name
				FROM ' . ARCADE_CATS_TABLE . "
				WHERE cat_id = $cat_id";
			$result = $db->sql_query($sql, 3600);
			$category_name = $db->sql_fetchfield('cat_name');
			$db->sql_freeresult($result);
		}

		$back = request_var('back', 0);

		$template->assign_vars(array(
			'PERMISSION'			=> $user->lang['acl_' . $permission]['lang'],
			'PERMISSION_USERNAME'	=> $userdata['username'],
			'CATEGORY_NAME'			=> $category_name,

			'S_GLOBAL_TRACE'		=> ($cat_id) ? false : true,

			'U_BACK'				=> ($back) ? build_url(array('f', 'back')) . "&amp;f=$back" : '')
		);

		$template->assign_block_vars('trace', array(
			'WHO'			=> $user->lang['DEFAULT'],
			'INFORMATION'	=> $user->lang['TRACE_DEFAULT'],

			'S_SETTING_NO'		=> true,
			'S_TOTAL_NO'		=> true)
		);

		$sql = 'SELECT DISTINCT g.group_name, g.group_id, g.group_type
			FROM ' . GROUPS_TABLE . ' g
				LEFT JOIN ' . USER_GROUP_TABLE . ' ug ON (ug.group_id = g.group_id)
			WHERE ug.user_id = ' . $user_id . '
				AND ug.user_pending = 0
			ORDER BY g.group_type DESC, g.group_id DESC';
		$result = $db->sql_query($sql);

		$groups = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$groups[$row['group_id']] = array(
				'auth_setting'		=> ACL_NO,
				'group_name'		=> ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name']
			);
		}
		$db->sql_freeresult($result);

		$total = ACL_NO;
		$add_key = (($cat_id) ? '_LOCAL' : '');

		if (sizeof($groups))
		{
			// Get group auth settings
			$hold_ary = $auth_arcade->acl_group_raw_data(array_keys($groups), $permission, $cat_id);

			foreach ($hold_ary as $group_id => $category_ary)
			{
				$groups[$group_id]['auth_setting'] = $hold_ary[$group_id][$cat_id][$permission];
			}
			unset($hold_ary);

			foreach ($groups as $id => $row)
			{
				switch ($row['auth_setting'])
				{
					case ACL_NO:
						$information = $user->lang['TRACE_GROUP_NO' . $add_key];
					break;

					case ACL_YES:
						$information = ($total == ACL_YES) ? $user->lang['TRACE_GROUP_YES_TOTAL_YES' . $add_key] : (($total == ACL_NEVER) ? $user->lang['TRACE_GROUP_YES_TOTAL_NEVER' . $add_key] : $user->lang['TRACE_GROUP_YES_TOTAL_NO' . $add_key]);
						$total = ($total == ACL_NO) ? ACL_YES : $total;
					break;

					case ACL_NEVER:
						$information = ($total == ACL_YES) ? $user->lang['TRACE_GROUP_NEVER_TOTAL_YES' . $add_key] : (($total == ACL_NEVER) ? $user->lang['TRACE_GROUP_NEVER_TOTAL_NEVER' . $add_key] : $user->lang['TRACE_GROUP_NEVER_TOTAL_NO' . $add_key]);
						$total = ACL_NEVER;
					break;
				}

				$template->assign_block_vars('trace', array(
					'WHO'			=> $row['group_name'],
					'INFORMATION'	=> $information,

					'S_SETTING_NO'		=> ($row['auth_setting'] == ACL_NO) ? true : false,
					'S_SETTING_YES'		=> ($row['auth_setting'] == ACL_YES) ? true : false,
					'S_SETTING_NEVER'	=> ($row['auth_setting'] == ACL_NEVER) ? true : false,
					'S_TOTAL_NO'		=> ($total == ACL_NO) ? true : false,
					'S_TOTAL_YES'		=> ($total == ACL_YES) ? true : false,
					'S_TOTAL_NEVER'		=> ($total == ACL_NEVER) ? true : false)
				);
			}
		}

		// Get user specific permission... globally or for this category
		$hold_ary = $auth_arcade->acl_user_raw_data($user_id, $permission, $cat_id);
		$auth_setting = (!sizeof($hold_ary)) ? ACL_NO : $hold_ary[$user_id][$cat_id][$permission];

		switch ($auth_setting)
		{
			case ACL_NO:
				$information = ($total == ACL_NO) ? $user->lang['TRACE_USER_NO_TOTAL_NO' . $add_key] : $user->lang['TRACE_USER_KEPT' . $add_key];
				$total = ($total == ACL_NO) ? ACL_NEVER : $total;
			break;

			case ACL_YES:
				$information = ($total == ACL_YES) ? $user->lang['TRACE_USER_YES_TOTAL_YES' . $add_key] : (($total == ACL_NEVER) ? $user->lang['TRACE_USER_YES_TOTAL_NEVER' . $add_key] : $user->lang['TRACE_USER_YES_TOTAL_NO' . $add_key]);
				$total = ($total == ACL_NO) ? ACL_YES : $total;
			break;

			case ACL_NEVER:
				$information = ($total == ACL_YES) ? $user->lang['TRACE_USER_NEVER_TOTAL_YES' . $add_key] : (($total == ACL_NEVER) ? $user->lang['TRACE_USER_NEVER_TOTAL_NEVER' . $add_key] : $user->lang['TRACE_USER_NEVER_TOTAL_NO' . $add_key]);
				$total = ACL_NEVER;
			break;
		}

		$template->assign_block_vars('trace', array(
			'WHO'			=> $userdata['username'],
			'INFORMATION'	=> $information,

			'S_SETTING_NO'		=> ($auth_setting == ACL_NO) ? true : false,
			'S_SETTING_YES'		=> ($auth_setting == ACL_YES) ? true : false,
			'S_SETTING_NEVER'	=> ($auth_setting == ACL_NEVER) ? true : false,
			'S_TOTAL_NO'		=> false,
			'S_TOTAL_YES'		=> ($total == ACL_YES) ? true : false,
			'S_TOTAL_NEVER'		=> ($total == ACL_NEVER) ? true : false)
		);

		if ($cat_id != 0 && isset($auth_arcade->acl_options['global'][$permission]))
		{
			if ($user_id != $user->data['user_id'])
			{
				$auth2 = new auth_arcade();
				$auth2->acl($userdata);
				$auth_setting = $auth2->acl_get($permission);
			}
			else
			{
				$auth_setting = $auth_arcade->acl_get($permission);
			}

			if ($auth_setting)
			{
				$information = ($total == ACL_YES) ? $user->lang['TRACE_USER_GLOBAL_YES_TOTAL_YES'] : $user->lang['TRACE_USER_GLOBAL_YES_TOTAL_NEVER'];
				$total = ACL_YES;
			}
			else
			{
				$information = $user->lang['TRACE_USER_GLOBAL_NEVER_TOTAL_KEPT'];
			}

			// If there is no auth information we do not need to worry the user by showing non-relevant data.
			if ($auth_setting)
			{
				$template->assign_block_vars('trace', array(
					'WHO'			=> sprintf($user->lang['TRACE_GLOBAL_SETTING'], $userdata['username']),
					'INFORMATION'	=> sprintf($information, '<a href="' . $this->u_action . "&amp;u=$user_id&amp;f=0&amp;auth=$permission&amp;back=$cat_id\">", '</a>'),

					'S_SETTING_NO'		=> false,
					'S_SETTING_YES'		=> $auth_setting,
					'S_SETTING_NEVER'	=> !$auth_setting,
					'S_TOTAL_NO'		=> false,
					'S_TOTAL_YES'		=> ($total == ACL_YES) ? true : false,
					'S_TOTAL_NEVER'		=> ($total == ACL_NEVER) ? true : false)
				);
			}
		}

		// Take founder status into account, overwriting the default values
		if ($userdata['user_type'] == USER_FOUNDER && strpos($permission, 'a_') === 0)
		{
			$template->assign_block_vars('trace', array(
				'WHO'			=> $userdata['username'],
				'INFORMATION'	=> $user->lang['TRACE_USER_FOUNDER'],

				'S_SETTING_NO'		=> ($auth_setting == ACL_NO) ? true : false,
				'S_SETTING_YES'		=> ($auth_setting == ACL_YES) ? true : false,
				'S_SETTING_NEVER'	=> ($auth_setting == ACL_NEVER) ? true : false,
				'S_TOTAL_NO'		=> false,
				'S_TOTAL_YES'		=> true,
				'S_TOTAL_NEVER'		=> false)
			);

			$total = ACL_YES;
		}

		// Total value...
		$template->assign_vars(array(
			'S_RESULT_NO'		=> ($total == ACL_NO) ? true : false,
			'S_RESULT_YES'		=> ($total == ACL_YES) ? true : false,
			'S_RESULT_NEVER'	=> ($total == ACL_NEVER) ? true : false,
		));
	}

	/**
	* Get already assigned users/groups
	*/
	function retrieve_defined_user_groups($permission_scope, $cat_id, $permission_type)
	{
		global $db, $user;

		$sql_category_id = ($permission_scope == 'global') ? 'AND a.cat_id = 0' : ((sizeof($cat_id)) ? 'AND ' . $db->sql_in_set('a.cat_id', $cat_id) : 'AND a.cat_id <> 0');

		// Permission options are only able to be a permission set... therefore we will pre-fetch the possible options and also the possible roles
		$option_ids = $role_ids = array();

		$sql = 'SELECT auth_option_id
			FROM ' . ACL_ARCADE_OPTIONS_TABLE . '
			WHERE auth_option ' . $db->sql_like_expression($permission_type . $db->any_char);
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$option_ids[] = (int) $row['auth_option_id'];
		}
		$db->sql_freeresult($result);

		if (sizeof($option_ids))
		{
			$sql = 'SELECT DISTINCT role_id
				FROM ' . ACL_ARCADE_ROLES_DATA_TABLE . '
				WHERE ' . $db->sql_in_set('auth_option_id', $option_ids);
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result))
			{
				$role_ids[] = (int) $row['role_id'];
			}
			$db->sql_freeresult($result);
		}

		if (sizeof($option_ids) && sizeof($role_ids))
		{
			$sql_where = 'AND (' . $db->sql_in_set('a.auth_option_id', $option_ids) . ' OR ' . $db->sql_in_set('a.auth_role_id', $role_ids) . ')';
		}
		else
		{
			$sql_where = 'AND ' . $db->sql_in_set('a.auth_option_id', $option_ids);
		}

		// Not ideal, due to the filesort, non-use of indexes, etc.
		$sql = 'SELECT DISTINCT u.user_id, u.username, u.username_clean, u.user_regdate
			FROM ' . USERS_TABLE . ' u, ' . ACL_ARCADE_USERS_TABLE . " a
			WHERE u.user_id = a.user_id
				$sql_category_id
				$sql_where
			ORDER BY u.username_clean, u.user_regdate ASC";
		$result = $db->sql_query($sql);

		$s_defined_user_options = '';
		$defined_user_ids = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$s_defined_user_options .= '<option value="' . $row['user_id'] . '">' . $row['username'] . '</option>';
			$defined_user_ids[] = $row['user_id'];
		}
		$db->sql_freeresult($result);

		$sql = 'SELECT DISTINCT g.group_type, g.group_name, g.group_id
			FROM ' . GROUPS_TABLE . ' g, ' . ACL_ARCADE_GROUPS_TABLE . " a
			WHERE g.group_id = a.group_id
				$sql_category_id
				$sql_where
			ORDER BY g.group_type DESC, g.group_name ASC";
		$result = $db->sql_query($sql);

		$s_defined_group_options = '';
		$defined_group_ids = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$s_defined_group_options .= '<option' . (($row['group_type'] == GROUP_SPECIAL) ? ' class="sep"' : '') . ' value="' . $row['group_id'] . '">' . (($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name']) . '</option>';
			$defined_group_ids[] = $row['group_id'];
		}
		$db->sql_freeresult($result);

		return array(
			'group_ids'			=> $defined_group_ids,
			'group_ids_options'	=> $s_defined_group_options,
			'user_ids'			=> $defined_user_ids,
			'user_ids_options'	=> $s_defined_user_options
		);
	}
}

?>