<?php
/**
*
* acp_favorites [English]
*
* @package language
* @version $Id: favorites.php,v 1.0.2 2008/09/17 13:23:00 agrajag Exp $
* @copyright (c) 2008
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

// Board Settings
$lang = array_merge($lang, array(
	'ACP_FAVORITES_SETTINGS_EXPLAIN'	=> 'Here you can change some settings for the Forum Favorites module.',
	'FAVORITES_FLIST_LENGTH'			=> 'Forum Favorites list length',
	'FAVORITES_FLIST_LENGTH_EXPLAIN'	=> 'Set how many entries are shown on the Forum Favorites page lists. Entering a value less than 1 will make it default to 10.',
	'FAVORITES_ADD_BUTTON_POS'			=> 'Add Favorite button position',
	'FAVORITES_ADD_BUTTON_POS_EXPLAIN'	=> 'Changes where the Add and Search buttons are displayed on the Forum Favorites list page.',
	'ADD_BUTTON_BEFORE'		=> 'Before item name',
	'ADD_BUTTON_AFTER'		=> 'After item name',
	'ADD_BUTTON_COL'		=> 'Separate column',
    'FAVORITES_ROWS'    => 'rows',
	
	
	'ACP_FAVORITES_CATEGORIES_CONFIG_EXPLAIN'		=> 'Setup categories for Forum Favorites here.',
	'FAVORITES_CATEGORY_NAME'			=> 'Category name',
	'FAVORITES_CATEGORY_ID'				=> 'Category ID',
	'FAVORITES_CATEGORY_OPTIONS'		=> 'Options',
	'CREATE_NEW_CATEGORY'				=> 'Create new category',
	
	'NO_CAT_ID'			=> 'No category ID specified.',
	'NO_CAT_TITLE'			=> 'No category name specified.',
    'NO_CHANGE_CAT_TITLE'			=> 'No change in category name was made.',
	
	'CATEGORY_OPTIONS_LEGEND'	=>	'Change category options',
	'SAVE'		=>	'Save',
	'CHANGED_CATEGORY_TITLE'	=> 'Sucessfully renamed category',
	
	

));



?>