<?php

/**
*
* @package - NV "who was here?"
* @version $Id$
* @copyright (c) nickvergessen ( http://mods.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_wwh_info
{
	function module()
	{		
		return array(
			'filename'	=> 'acp_wwh',
			'title'		=> 'WWH_TITLE',
			'version'	=> '6.0.4',
			'modes'		=> array(
				'config_wwh'	=> array(
				'title'		=> 'WWH_CONFIG',
				'auth'		=> 'acl_a_board',
				'cat'		=> array('ACP_BOARD_CONFIGURATION'),
				),
			),
		);
	}
}

?>