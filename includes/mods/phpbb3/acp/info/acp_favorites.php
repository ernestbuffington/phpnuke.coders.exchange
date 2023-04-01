<?php
/**
*
* @package acp
* @version $Id: acp_favorites.php,v 1.0.3 2008/09/30 16:01:00 agrajag Exp $
* @copyright (c) 2008
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_favorites_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_favorites',
			'title'		=> 'ACP_FAVORITES_MANAGEMENT',
			'version'	=> '1.0.3',
			'modes'		=> array(
				'settings'		=> array('title' => 'ACP_FAVORITES_SETTINGS', 'auth' => 'acl_a_board', 'cat' => array('ACP_BOARD_CONFIGURATION')),
				'categories'	=> array('title' => 'ACP_FAVORITES_CATEGORIES_CONFIG', 'auth' => 'acl_a_board', 'cat' => array('ACP_BOARD_CONFIGURATION')),
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