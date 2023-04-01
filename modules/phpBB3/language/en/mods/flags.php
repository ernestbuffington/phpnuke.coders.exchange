<?php
/** 
*
* flags [English]
*
* @package language
* @version $Id: flags.php,v 1.003 2007/05/20 12:25:00 nedka Exp $
* @copyright (c) 2007 nedka (Nguyen Dang Khoa) 
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

// Country Flags
$lang = array_merge($lang, array(
	'ACP_FLAGS_EXPLAIN'		=> 'Using this form you can add, edit, view and delete country flags. Each country name must have its country code.',
	'ADD_FLAG'				=> 'Add new country flag',

	'FLAG_ADDED'			=> 'The country flag was successfully added.',
	'FLAG_CODE'				=> 'Country code',
	'FLAG_COUNTRY'			=> 'Country name',
	'FLAG_IMAGE'			=> 'Country flag image',
	'FLAG_IMAGE_EXPLAIN'	=> 'Use this to define a small image associated with the country flag. The path is relative to the root phpBB directory, e.g. <samp>images/flags</samp>',
	'FLAG_REMOVED'			=> 'The country flag was successfully deleted.',
	'FLAG_UPDATED'			=> 'The country flag was successfully updated.',

	'MUST_SELECT_FLAG'		=> 'You must select a country flag.',

	'NO_FLAG'				=> 'No country flag assigned',
	'NO_FLAG_CODE'			=> 'You haven’t specified a country code for the flag.',
	'NO_FLAG_COUNTRY'		=> 'You haven’t specified a country name for the flag.',
	'NO_UPDATE_FLAGS'		=> 'The country flag was successfully deleted. However user accounts or groups using this country flag were not updated. You will need to manually reset the country flag on these accounts.',

	'TOTAL_USERS'			=> 'Total users',

	'USER_FLAG_UPDATED'		=> 'User country flag updated.',
));

?>