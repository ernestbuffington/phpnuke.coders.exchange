<?php
/**
*
* activity_stats [English]
*
* @author Highway of Life ( David Lewis ) http://startrekguide.com
* @package language
* @version $Id$
* @copyright (c) 2008 Star Trek Guide Group
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

$lang = array_merge($lang, array(
	'USERS_24HOUR_TOTAL'	=> '%d Users active over the last 24 hours',

	'24HOUR_TOPICS'			=> 'New Topics <strong>%d</strong>',
	'24HOUR_POSTS'			=> 'New Posts <strong>%d</strong>',
	'24HOUR_USERS'			=> 'New users <strong>%d</strong>',

	'24HOUR_STATS'			=> 'Activity over the last 24 hours',
));

?>