<?php
/** 
*
* @package acp
* @version $Id: acp_flags.php,v 1.001 2007/04/16 12:10:00 nedka Exp $
* @copyright (c) 2007 nedka (Nguyen Dang Khoa) 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_flags_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_flags',
			'title'		=> 'ACP_FLAGS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'flags'		=> array('title' => 'ACP_MANAGE_FLAGS', 'auth' => 'acl_a_flags', 'cat' => array('ACP_BOARD_CONFIGURATION')),
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