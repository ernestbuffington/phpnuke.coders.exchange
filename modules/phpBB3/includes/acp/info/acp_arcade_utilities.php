<?php
/**
*
* @package acp
* @version $Id: acp_arcade_utilities.php 512 2008-11-07 01:10:28Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_utilities_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade_utilities',
			'title'		=> 'ACP_ARCADE_UTILITIES',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'create_install'	=> array('title' => 'ACP_ARCADE_UTILITIES_CREATE_INSTALL', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_UTILITIES')),
				'convert_install'	=> array('title' => 'ACP_ARCADE_UTILITIES_CONVERT_INSTALL', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_UTILITIES')),
				'downloads'			=> array('title' => 'ACP_ARCADE_UTILITIES_DOWNLOADS', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_GAMES')),
				'download_stats'	=> array('title' => 'ACP_ARCADE_UTILITIES_DOWNLOAD_STATS', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_UTILITIES')),
				'reports'			=> array('title' => 'ACP_ARCADE_UTILITIES_REPORTS', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_UTILITIES')),
				'errors'			=> array('title' => 'ACP_ARCADE_UTILITIES_ERRORS', 'auth' => 'acl_a_arcade_utilities', 'cat' => array('ACP_CAT_ARCADE_UTILITIES')),
				'user_guide'		=> array('title' => 'ACP_ARCADE_UTILITIES_USER_GUIDE', 'auth' => '', 'cat' => array('ACP_CAT_ARCADE_CONFIGURATION')),
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