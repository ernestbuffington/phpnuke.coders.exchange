<?php
/**
*
* prime_quick_reply [English]
*
* @package language
* @version $Id: prime_quick_reply.php,v 0.1.2 2008/01/29 14:00:00 primehalo Exp $
* @copyright (c) 2008 Ken F. Innes IV
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
	// Originally from posting.php, edited to fit
	'QUICK_REPLY_ATTACH_SIG'			=> 'Attach a signature',
	'QUICK_REPLY_DISABLE_BBCODE'		=> 'Disable BBCode',
	'QUICK_REPLY_DISABLE_SMILIES'		=> 'Disable smilies',
	'QUICK_REPLY_DISABLE_MAGIC_URL'		=> 'Don’t auto-parse URLs',
	'QUICK_REPLY_MORE_SMILIES'			=> 'View more smilies',
	'QUICK_REPLY_NOTIFY_REPLY'			=> 'Notify me of replies',
	'QUICK_REPLY_TOO_FEW_CHARS'			=> 'Your message contains too few characters.',

	// Custom
	'QUICK_REPLY_POST_REPLY'			=> 'Post a reply',
	'QUICK_REPLY_SHOW_OPTIONS'			=> 'Show Reply Options',
	'QUICK_REPLY_HIDE_OPTIONS'			=> 'Hide Reply Options',
	'QUICK_REPLY_SHOW'					=> '[Show]',
	'QUICK_REPLY_HIDE'					=> '[Hide]',
	'QUICK_REPLY_QUOTE_LAST_POST'		=> 'Quote last message',
	'QUICK_REPLY_DISPLAY_SUBJECT'		=> 'Display subject',
	'QUICK_REPLY_DISPLAY_BBOCDES'		=> 'Display BBCodes',
	'QUICK_REPLY_DISPLAY_SMILIES'		=> 'Display smilies',

	// Admin
	'QUICK_REPLY_ADMIN_CATEGORY'		=> 'Quick Reply',
	'QUICK_REPLY_ADMIN_ENABLED'			=> 'Enable Quick Reply',
	'QUICK_REPLY_ADMIN_ENABLED_EXPLAIN'	=> 'Place a Quick Reply form underneath a topic.',
	'QUICK_REPLY_ADMIN_GUESTS'			=> 'Enable for guests',
	'QUICK_REPLY_ADMIN_GUESTS_EXPLAIN'	=> 'Allow guests to use the Quick Reply.',
	'QUICK_REPLY_ADMIN_MEMORY'			=> 'Remember form status',
	'QUICK_REPLY_ADMIN_MEMORY_EXPLAIN'	=> 'Remember if a user has the form visible or hidden.',
	'QUICK_REPLY_ADMIN_LAST_PAGE_ONLY'	=> 'Last page only',
	'QUICK_REPLY_ADMIN_FORM'			=> 'Display form area',
	'QUICK_REPLY_ADMIN_FORM_EXPLAIN'	=> 'If not displayed, users must click to reveal.',
	'QUICK_REPLY_ADMIN_OPTIONS'			=> 'Display options',
	'QUICK_REPLY_ADMIN_OPTIONS_EXPLAIN'	=> 'If not displayed, users must click to reveal.',
	'QUICK_REPLY_ADMIN_SUBJECT'			=> 'Display subject',
	'QUICK_REPLY_ADMIN_SUBJECT_EXPLAIN'	=> 'If not displayed, users must click to reveal.',
	'QUICK_REPLY_ADMIN_BBCODES'			=> 'Display BBCodes',
	'QUICK_REPLY_ADMIN_BBCODES_EXPLAIN'	=> 'If not displayed, users must click to reveal.',
	'QUICK_REPLY_ADMIN_SMILIES'			=> 'Display smilies',
	'QUICK_REPLY_ADMIN_SMILIES_EXPLAIN'	=> 'If not displayed, users must click to reveal.',

	// Used if Prime Multi-Quote is installed
	'QUICK_REPLY_QUOTE_SELECTED'		=> 'Quote selected',
	'QUICK_REPLY_NO_QUOTES_SELECTED'	=> 'No posts selected!',
));

?>