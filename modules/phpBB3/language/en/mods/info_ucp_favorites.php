<?php
/** 
*
* ucp_favorites [English]
*
* @package language
* @version $Id: ucp_favorites.php,v 1.0.2 2008/09/17 13:23:00 agrajag Exp $
* @copyright (c) 2008 Brian Dorfman
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
						
$lang = array_merge($lang, array(
	'FAVORITES_EDIT_NOTICE'				=>	'Edit your Favorites here. Each newline in the text area will be a new Favorite item. Put a comma at the end followed by a URL to make that item have a hyperlink (example: "phpBB, http://www.phpbb.com")',
	'FAVORITES_UPDATED'					=> 'Your Favorites info has been successfully updated.',
	'FAVORITES_CAT_PREFIX'				=> 'Favorite ',
	
	'FAVORITES_LIST_COUNT'		=> 'Number of Users',
	'FAVORITES_LIST_TEXT'		=> 'Favorite Name',
	'FAVORITES_LIST_URL'		=> 'Favorite URL',
	'FAVORITES_LIST_OPTIONS'	=> 'Options',
	'FAVORITES_CAT_PICK'		=> 'Choose a category',
								 
	'FAVORITES_ADD_TITLE'		=> 'Add this favorite to your list', 
	'FAVORITES_ADD_ALT'			=> 'Add', 
	'FAVORITES_VIEW_TITLE'		=> 'View users with this favorite', 
	'FAVORITES_VIEW_ALT'		=> 'View users', 
	
	'FAVORITES_CURRENT_CAT'	=> 'Current category:',
								 
	'FAVORITES_UID_ERROR'		=>	'Invalid user ID.',
	'FAVORITES_CATID_ERROR'		=>	'Invalid category ID.',
	'FAVORITES_TEXT_ERROR'		=>	'Invalid favorite text.',
	'FAVORITES_DUP_ITEM_ERROR'	=>	'You already have that item in your list.',
	'FAVORITES_DUP_DELETE_ERROR'    => 'Removed duplicate item: "%s"',
	'FAVORITES_GENERIC_ERROR'	=> 'An error occured.',
    
	'FAVORITES_ADD_SUCCESS'		=>	'Successfully added \'%s\' to your list.',
    'FAVORITES_SEARCH_RESULTS'  => '%1$d users have the favorite \'%2$s\' listed.'

));
			
?>