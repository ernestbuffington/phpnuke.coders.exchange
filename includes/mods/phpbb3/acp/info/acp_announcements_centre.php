<?php
/** 
*
* @package acp
* @acp_announcement_centre.php by lefty74
* @copyright (c) 2007 lefty74 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_announcements_centre_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_announcements_centre',
			'title'		=> 'ACP_ANNOUNCEMENTS_CENTRE',
			'version'	=> '1.0.0',
			'modes'		=> array(
			'announcements_centre'		=> array('title' => 'ACP_ANNOUNCEMENTS_CENTRE', 'auth' => 'acl_a_board', 'cat' => array('ACP_BOARD_CONFIGURATION')),
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