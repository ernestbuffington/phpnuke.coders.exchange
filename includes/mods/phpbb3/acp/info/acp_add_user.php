<?php
/**
*
* @author David Lewis (Highway of Life) http://phpbbacademy.com
*
* @package acp
* @version $Id: acp_add_user.php 31M 2007-08-05 01:18:59Z (local) $
* @copyright (c) 2007 Star Trek Guide Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_add_user_info
{
	var $u_action;
	
	function module()
	{		
		return array(
			'filename'	=> 'acp_add_user',
			'title'		=> 'ACP_ADD_USER',
			'version'	=> '1.0.1',
			'modes'		=> array(
				'add_user'	=> array(
					'title'		=> 'ACP_ADD_USER',
					'auth'		=> 'acl_a_user',
					'cat'		=> array('ACP_CAT_USERS'),
				),
			),
		);
	}

	function install()
	{
		global $phpEx, $db, $user;
		
		// Setup $auth_admin class so we can add permission options
		include(PHPBB3_INCLUDE_DIR . 'acp/auth.' . $phpEx);
		$auth_admin = new auth_admin();
		
		// Add permission for manage cvsdb
		$auth_admin->acl_add_option(array(
			'local'		=> array(),
			'global'	=> array('a_add_user')
		));
		
		$module_data = $this->module();
		
		$module_basename = substr(strchr($module_data['filename'], '_'), 1);
		
		$sql = 'SELECT module_id
				FROM ' . PHPBB3_MODULES_TABLE . "
				WHERE module_basename = '$module_basename'";
		$result = $db->sql_query($sql);
		$module_id = $db->sql_fetchfield('module_id');
		$db->sql_freeresult($result);
		
		$sql = 'UPDATE ' . PHPBB3_MODULES_TABLE . " SET module_auth = 'acl_a_add_user' WHERE module_id = $module_id";
		$db->sql_query($sql);
		
		set_config('add_user_version', $module_data['version']);
		
		trigger_error(sprintf($user->lang['ADD_USER_MOD_UPDATED'], $module_data['version']) . adm_back_link($this->u_action));
	}

	function uninstall()
	{
	}
	
	function update()
	{
		global $user;
		
		$module_data = $this->module();
		
		set_config('add_user_version', $module_data['version']);
		
		trigger_error(sprintf($user->lang['ADD_USER_MOD_UPDATED'], $module_data['version']) . adm_back_link($this->u_action));
	}
}

?>