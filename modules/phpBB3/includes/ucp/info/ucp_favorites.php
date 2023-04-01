<?php
/**
*
* @package ucp
* @version $Id: ucp_favorites.php,v 1.0.4 2008/10/09 16:20:45 agrajag Exp $
* @copyright (c) 2008
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class ucp_favorites_info
{
	function module()
	{
		return array(
			'filename'	=> 'ucp_favorites',
			'title'		=> 'UCP_FAVORITES',
			'version'	=> '1.0.4',
			'modes'		=> array(
				'edit'	=> array('title' => 'UCP_FAVORITES_EDIT', 'auth' => '', 'cat' => array('UCP_PROFILE')),
				'view_list'	=> array('title' => 'UCP_FAVORITES_VIEW_LIST', 'auth' => '', 'cat' => array('UCP_PROFILE')),
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