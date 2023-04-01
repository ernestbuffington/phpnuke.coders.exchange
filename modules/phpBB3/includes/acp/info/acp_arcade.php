<?php
/**
*
* @package acp
* @version $Id: acp_arcade.php 512 2008-11-07 01:10:28Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade',
			'title'		=> 'ACP_ARCADE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'		=> array('title' => 'ACP_ARCADE_SETTINGS_GENERAL', 'auth' => 'acl_a_arcade_settings', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
				'game'			=> array('title' => 'ACP_ARCADE_SETTINGS_GAME', 'auth' => 'acl_a_arcade_settings', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
				'feature'		=> array('title' => 'ACP_ARCADE_SETTINGS_FEATURE', 'auth' => 'acl_a_arcade_settings', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
				'page'			=> array('title' => 'ACP_ARCADE_SETTINGS_PAGE', 'auth' => 'acl_a_arcade_settings', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
				'path'			=> array('title' => 'ACP_ARCADE_SETTINGS_PATH', 'auth' => 'acl_a_arcade_settings', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
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