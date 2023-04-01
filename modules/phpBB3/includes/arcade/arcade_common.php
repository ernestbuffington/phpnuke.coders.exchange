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

include($phpbb_root_path . 'includes/arcade/functions_files.' . $phpEx);
// Define file functions class
$file_functions = new file_functions();

include($phpbb_root_path . 'includes/arcade/arcade_constants.' . $phpEx);
include($phpbb_root_path . 'includes/arcade/arcade_cache.' . $phpEx);
include($phpbb_root_path . 'includes/arcade/functions_arcade.' . $phpEx);

if (!class_exists('auth_arcade'))
{
     include($phpbb_root_path . 'includes/auth_arcade.' . $phpEx);
} 

include($phpbb_root_path . 'includes/arcade/arcade_class.' . $phpEx);

if (defined('IN_ADMIN'))
{
	include($phpbb_root_path . 'includes/acp/auth_arcade.' . $phpEx);
	include($phpbb_root_path . 'includes/arcade/arcade_admin_class.' . $phpEx);
}

// Arcade auth
$auth_arcade = new auth_arcade();

if (!function_exists('get_user_avatar') || !function_exists('get_user_rank'))
{
	include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
}

?>