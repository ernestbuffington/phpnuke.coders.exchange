<?php
/**
*
* @package acp
* @version $Id: acp_arcade_manage.php 278 2008-05-23 16:10:30Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_manage_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade_manage',
			'title'		=> 'ACP_ARCADE_MANAGE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'manage'	=> array('title' => 'ACP_ARCADE_MANAGE_ARCADE', 'auth' => 'acl_a_arcade_cat', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
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