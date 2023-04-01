<?php
/**
*
* @package acp
* @version $Id: acp_arcade_permission_roles.php 215 2008-05-01 00:50:19Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_permission_roles_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade_permission_roles',
			'title'		=> 'ACP_ARCADE_PERMISSION_ROLES',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'cat_roles'			=> array('title' => 'ACP_ARCADE_CAT_ROLES', 'auth' => 'acl_a_roles && acl_a_fauth', 'cat' => array('ACP_ARCADE_PERMISSION_ROLES')),
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