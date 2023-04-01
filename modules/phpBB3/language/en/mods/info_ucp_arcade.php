<?php
/**
*
* ucp info_ucp_arcade[English]
*
* @package language
* @version $Id: info_ucp_arcade.php 629 2008-12-07 19:18:39Z JRSweets $
* @copyright (c) 2008 JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

//Arcade
$lang = array_merge($lang, array(
	'ARCADE_DELETE_FAVORITE'			=> 'Delete favorite game',
	'ARCADE_DELETE_FAVORITES'			=> 'Delete favorite games',
	'ARCADE_DELETE_FAVORITES_CONFIRM'	=> 'Are you sure you want to delete these favorite games?',
	'ARCADE_DELETE_FAVORITE_CONFIRM'	=> 'Are you sure you want to delete this favorite game?',
	'ARCADE_FAVORITES_DELETED'			=> 'Favorite games successfully deleted.',
	'ARCADE_FAVORITE_DELETED'			=> 'Favorite game successfully deleted.',
	'ARCADE_OVERRIDE_USER_SORT_UCP'		=> 'The default sort settings below are currently being overridden by the board administrator.',

	'UCP_ARCADE'						=> 'phpBB Arcade',
	'UCP_ARCADE_FAVORITES'				=> 'Manage favorites',
	'UCP_ARCADE_FAVORITES_EXPLAIN'		=> 'You can view and delete your favorite games below.',
	'UCP_ARCADE_SETTINGS'				=> 'Manage settings',
	'UCP_ARCADE_SETTINGS_EXPLAIN'		=> 'These settings control various aspects of the arcade.',
));

?>