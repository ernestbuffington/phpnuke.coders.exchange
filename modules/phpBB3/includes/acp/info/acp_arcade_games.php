<?php
/**
*
* @package acp
* @version $Id: acp_arcade_games.php 278 2008-05-23 16:10:30Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_arcade_games_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_arcade_games',
			'title'		=> 'ACP_ARCADE_GAMES',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'add_games'			=> array('title' => 'ACP_ARCADE_ADD_GAMES', 'auth' => 'acl_a_arcade_game', 'cat' => array('ACP_CAT_ARCADE_GAMES')),
				'edit_games'		=> array('title' => 'ACP_ARCADE_EDIT_GAMES', 'auth' => 'acl_a_arcade_game', 'cat' => array('ACP_CAT_ARCADE_GAMES')),
				'unpack_games'		=> array('title' => 'ACP_ARCADE_UNPACK_GAMES', 'auth' => 'acl_a_arcade_game', 'cat' => array('ACP_CAT_ARCADE_GAMES')),
				'edit_scores'		=> array('title' => 'ACP_ARCADE_EDIT_SCORES', 'auth' => 'acl_a_arcade_scores', 'cat' => array('ACP_CAT_ARCADE_GAMES')),
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