<?php
/**
*
* @package ucp
* @version $Id: ucp_arcade.php 215 2008-05-01 00:50:19Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class ucp_arcade_info
{
	function module()
	{
		return array(
			'filename'	=> 'ucp_arcade',
			'title'		=> 'UCP_ARCADE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'UCP_ARCADE_SETTINGS', 'auth' => '', 'cat' => array('UCP_ARCADE')),
				'favorites'	=> array('title' => 'UCP_ARCADE_FAVORITES', 'auth' => '', 'cat' => array('UCP_ARCADE')),
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