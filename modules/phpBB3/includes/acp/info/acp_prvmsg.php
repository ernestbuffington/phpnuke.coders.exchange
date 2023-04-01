<?php
/**
*
* @package acp
* @version $Id: acp_my_page.php,v 1.10 2006/12/31 16:56:14 acydburn Exp $
* @copyright (c) 2006 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_prvmsg_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_prvmsg',
			'title'		=> 'ACP_PRVMSG', // define in the lang/xx/acp/common.php language file
			'version'	=> '1.0.0',
			'modes'		=> array(
				'main'		=> array(
					'title'		=> 'ACP_PRVMSG', 
					'auth' 		=> 'acl_a_user', 
					'cat'		=> array('ACP_GENERAL_TASKS')
				),
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