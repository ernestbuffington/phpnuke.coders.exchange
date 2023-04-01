<?php
/** 
*
* shout [English]
*
* @package language
* @version $Id: shout.php 177 2007-11-09 18:24:23Z paul $
* @copyright (c) 2005 phpBB Group 
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

/**
* NOTE: Most of the language items are used in javascript
* If you want to use quotes or other chars that need escaped, be sure you escape them double 
*/
$lang = array_merge($lang, array(
	'MISSING_DIV' 			=> 'The shoutbox div cann’t be found.',
	'NO_POST_GUEST'         => 'Guests cant post.',
	'LOADING' 				=> 'Loading',
	'POST_MESSAGE'			=> 'Post message',
	'SENDING' 				=> 'Sending message.',
	'MESSAGE_EMPTY'			=> 'Message is empty.',
	'XML_ER' 				=> 'XML error.',
	'NO_MESSAGE' 			=> 'There are no messages.',
	'NO_AJAX' 				=> 'No ajax',
	'JS_ERR' 				=> 'There has been a JavaScript error. \nError:',
	'LINE' 					=> 'Line',
	'FILE' 					=> 'File',
	'FLOOD_ERROR'	 		=> 'Flood error',
	'POSTED' 				=> 'Message posted.',
	
	//Added in 0.0.3
	'NO_QUOTE' 				=> 'Don’t use list, quote or code bbcode.',
	'SMILIES' 				=> 'Smilies', 
	'DEL_SHOUT' 			=> 'Are you sure you want to delete this shout?',
	'NO_SHOUT_ID'	 		=> 'No shout id.',
	'MSG_DEL_DONE' 			=> 'Message deleted',
	
	'SHOUTBOX'				=> 'Shoutbox',
	
	'NOT_ALLOWED_DELETE'    => 'You arent allowed to delete message',
));
?>
