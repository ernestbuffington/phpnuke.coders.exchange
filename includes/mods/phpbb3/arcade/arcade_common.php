<?php
/**
*
* @package phpBB3
* @version $Id: arcade_common.php 520 2008-11-08 17:32:42Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

$user->add_lang('mods/arcade');

include(PHPBB3_INCLUDE_DIR . 'arcade/functions_files.' . $phpEx);
// Define file functions class
$file_functions = new file_functions();

include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_constants.' . $phpEx);
include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_cache.' . $phpEx);
include(PHPBB3_INCLUDE_DIR . 'arcade/functions_arcade.' . $phpEx);

if (!class_exists('auth_arcade'))
{
     include(PHPBB3_INCLUDE_DIR . 'auth_arcade.' . $phpEx);
} 

include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_class.' . $phpEx);

if (defined('IN_ADMIN'))
{
	include(PHPBB3_INCLUDE_DIR . 'acp/auth_arcade.' . $phpEx);
	include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_admin_class.' . $phpEx);
}

// Arcade auth
$auth_arcade = new auth_arcade();

if (!function_exists('get_user_avatar') || !function_exists('get_user_rank'))
{
	include(PHPBB3_INCLUDE_DIR . 'functions_display.' . $phpEx);
}

?>
