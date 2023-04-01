<?php
/** 
*
* acp_announcements_centre [English]
*
* @package language
* @copyright (c) 2007 lefty74
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
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

// Announcement  settings
$lang = array_merge($lang, array(
	'TITLE'									=> 'ACP Announcement Centre',
	'TITLE_EXPLAIN'							=> 'The form will allow you to write your Site Announcements. You can select who should see these announcements. You can have alternative announcements for guests.',
	'ANNOUNCEMENTS'							=> 'Announcements Configuration',
	'ANNOUNCEMENT_ENABLE'					=> 'Show Site Announcements',
	'ANNOUNCEMENT_SHOW'						=> 'Show Site Announcement to',
	'ANNOUNCEMENT_SHOW_BIRTHDAYS'			=> 'Show Birthdays as announcements',
	'ANNOUNCEMENT_SHOW_BIRTHDAYS_EXPLAIN'	=> 'Shows the current birthdays (if birthdays are enabled) as announcements (takes priority to Site Announcement Text)',
	'ANNOUNCEMENT_SHOW_GROUP'				=> 'Choose Group(s) that should see the announcement',
	'ANNOUNCEMENT_SHOW_GROUP_EXPLAIN'		=> 'Only applicable if announcement is shown to Groups',
	'ANNOUNCEMENT_BIRTHDAY_AVATAR'			=> 'Show avatars in birthdays announcements',
	'ANNOUNCEMENT_BIRTHDAY_AVATAR_EXPLAIN'	=> 'Also shows the avatar of the birthday persons',
	'ANNOUNCEMENT_DRAFT_PREVIEW'			=> 'Draft Announcement Preview',
	'ANNOUNCEMENT_TITLE'					=> 'Site Announcement Title',
	'ANNOUNCEMENT_TITLE_EXPLAIN'			=> 'Customise the Announcement Block Title here <br/>Leave blank to use default language variable',
	'ANNOUNCEMENT_DRAFT'					=> 'Announcement Draft',
	'ANNOUNCEMENT_DRAFT_EXPLAIN'			=> 'Draft here your Announcement text',
	'ANNOUNCEMENT_TEXT'						=> 'Announcement Text',
	'ANNOUNCEMENT_TEXT_EXPLAIN'				=> 'Write here your Announcement text',
	'ANNOUNCEMENT_ENABLE_GUESTS'			=> 'Show different Announcement to guests',
	'ANNOUNCEMENT_ENABLE_GUESTS_EXPLAIN'	=> 'Shows different Announcement for guest users except when Show Site Announcement to is set to Guests or Everyone',
	'ANNOUNCEMENT_TITLE_GUESTS'				=> 'Guest Announcement Title',
	'ANNOUNCEMENT_TITLE_GUESTS_EXPLAIN'		=> 'Customise the Guest Announcement Block Title here <br/>Leave blank to use default language variable',
	'ANNOUNCEMENT_TEXT_GUESTS'				=> 'Guest Announcement Text',
	'ANNOUNCEMENT_TEXT_GUESTS_EXPLAIN'		=> 'Write here your Guest Announcement text',
	'ACP_ANNOUNCEMENTS_CENTRE'				=> 'Announcement Centre',

	'COPY_TO_ANNOUNCEMENT_SHORT'			=> 'Copy to Site Text',
	'COPY_TO_GUEST_ANNOUNCEMENT_SHORT'		=> 'Copy to Guest Text',
	'COPY_TO_ANNOUNCEMENT'					=> 'Copy to Site Announcement Text',
	'COPY_TO_GUEST_ANNOUNCEMENT'			=> 'Copy to Guest Announcement Text',

	'YES'			=> 'Yes',
	'NO'			=> 'No',
	'GUESTS'		=> 'Guests',
	'EVERYONE'		=> 'Everyone',
	'GROUPS'		=> 'Groups',
));

?>