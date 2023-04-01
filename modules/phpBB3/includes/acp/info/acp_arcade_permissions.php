<?php
/**
*
* @package acp
* @version $Id: acp_arcade_permissions.php 215 2008-05-01 00:50:19Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_permissions_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade_permissions',
			'title'		=> 'ACP_ARCADE_PERMISSIONS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'trace'						=> array('title' => 'ACP_ARCADE_PERMISSION_TRACE', 'auth' => 'acl_a_viewauth', 'display' => false, 'cat' => array('ACP_ARCADE_PERMISSION_MASKS')),

				'setting_category_local'	=> array('title' => 'ACP_ARCADE_CATEGORY_PERMISSIONS', 'auth' => 'acl_a_cauth && (acl_a_authusers || acl_a_authgroups)', 'cat' => array('ACP_ARCADE_CATEGORY_BASED_PERMISSIONS')),
				'setting_user_local'		=> array('title' => 'ACP_ARCADE_USERS_CATEGORY_PERMISSIONS', 'auth' => 'acl_a_authusers && acl_a_cauth', 'cat' => array('ACP_ARCADE_CATEGORY_BASED_PERMISSIONS')),
				'setting_group_local'		=> array('title' => 'ACP_ARCADE_GROUPS_CATEGORY_PERMISSIONS', 'auth' => 'acl_a_authgroups && acl_a_cauth', 'cat' => array('ACP_ARCADE_CATEGORY_BASED_PERMISSIONS')),

				'view_category_local'		=> array('title' => 'ACP_VIEW_ARCADE_CATEGORY_PERMISSIONS', 'auth' => 'acl_a_viewauth', 'cat' => array('ACP_ARCADE_PERMISSION_MASKS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>