<?php
/**
*
* @package acp
* @version $Id: ajax_chat_version.php 53 2007-11-04 06:10:51Z Handyman $
* @copyright (c) 2007 StarTrekGuide
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package mod_version_check
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class ajax_chat_version
{
	function version()
	{
		return array(
			'author'	=> 'Handyman`',
			'title'		=> 'AJAX Chat',
			'tag'		=> 'ajax_chat',
			'version'	=> '2.0.0 Beta 8',
			'file'		=> array('startrekguide.com', 'updatecheck', 'mods101.xml'),
		);
	}
}

?>