<?php
/**
*
* @package arcade
* @version $Id: arcade_download.php 657 2008-12-11 00:35:06Z JRSweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (!$game_id)
{
	trigger_error('NO_GAME_ID');
}

$game_info = $arcade->get_game_data($game_id);

$s_download = false;
if ($game_info['cat_download'])
{
	if ($game_info['game_download'])
	{
		if ($auth_arcade->acl_get('c_download', $game_info['cat_id']))
		{
			$s_download = true;
		}
	}
}

if (!$s_download)
{
	trigger_error('NO_PERMISSION_ARCADE_DOWNLOAD');
}

generate_arcade_nav($game_info, true);

$use_method = request_var('use_method', '');
$methods = $arcade->compress_methods();

// Let the user decide in which format he wants to have the game downloaded in
if (!$use_method)
{
	$page_title = sprintf($user->lang['ARCADE_DOWNLOAD_FORMAT'], $game_info['game_name']);

	$radio_buttons = '';
	foreach ($methods as $method)
	{
		$radio_buttons .= '<input type="radio"' . ((!$radio_buttons) ? ' id="use_method"' : '') . ' class="radio" value="' . $method . '" name="use_method" />&nbsp;' . $method . '&nbsp;';
	}

	$template->assign_vars(array(
		'S_SELECT_METHOD'			=> true,
		'GAME_NAME'					=> $game_info['game_name'],
		'ARCADE_DOWNLOAD_FORMAT' 	=> $page_title,
		'U_ACTION'					=> append_sid("arcade.php", "mode=download&amp;g=$game_id"),
		'RADIO_BUTTONS'				=> $radio_buttons)
	);

	display_arcade_online();
	// Output page
	page_header($page_title, false);

	$template->set_filenames(array(
		'body' => 'arcade/arcade_download_body.html')
	);

	page_footer();
	exit;
}

$arcade->update_download_total($game_id);
$cache->destroy('_arcade_totals');
$cache->destroy('sql', ARCADE_GAMES_TABLE);

include($phpbb_root_path . 'includes/functions_compress.' . $phpEx);
include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);

$filename = $file_functions->remove_extension($game_info['game_swf']);
$extra_game_files = ($game_info['game_files'] != '') ? unserialize($game_info['game_files']) : '';
$error = $dir_list = $file_list = array();
if (is_array($extra_game_files))
{
	foreach ($extra_game_files as $file)
	{
		if (!file_exists($file))
		{
			$error[] = $file;
		}
		
		if (is_dir($file))
		{
			$dir_list[] = $file;
		}
		else
		{
			$file_list[] = $file;
		}
	}
}
unset($extra_game_files);

if (sizeof($error))
{
	$sql_ary = array(
		'user_id'				=> $user->data['user_id'],
		'game_id'				=> $game_id,
		'error_date'			=> time(),
		'error_type'			=> ARCADE_ERROR_FILEMISSING,
		'error_ip'				=> $user->ip,
	);

	$sql = 'INSERT INTO ' . ARCADE_ERRORS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
	$db->sql_query($sql);

	if ($auth->acl_get('a_') && defined('DEBUG_EXTRA'))
	{
		trigger_error(sprintf($user->lang['ARCADE_DOWNLOAD_MISSING_FILES_DEBUG'], implode('<br />', $error)));
	}
	else
	{
		trigger_error(sprintf($user->lang['ARCADE_DOWNLOAD_MISSING_FILES']));
	}
}

if (!in_array($use_method, $methods))
{
	$use_method = '.tar';
}

if ($use_method == '.zip')
{
	$compress = new compress_zip('w', $phpbb_root_path . 'store/' . $filename . $use_method);
}
else
{
	$compress = new compress_tar('w', $phpbb_root_path . 'store/' . $filename . $use_method, $use_method);
}

$game_path = $phpbb_root_path . $arcade->config['game_path'] . $filename;
$file_functions->append_slash($game_path);

// Main files
$file_listing = $file_functions->filelist('', $game_path);

// Extra files
if (!empty($file_list))
{
	$file_listing = array_merge($file_listing, $file_list);
	unset($file_list);
}

// Extra directories
if (!empty($dir_list))
{
	foreach ($dir_list as $dir)
	{
		$file_listing = array_merge($file_listing, $file_functions->filelist('', $dir));
	}
	unset($dir_list);
}

// Correct path locations before adding files
$dir_list = array();
$search = array($game_path, 'arcade/gamedata');
$replace = array('', 'gamedata');

// Add all the game files
$file_listing = array_unique($file_listing);
foreach ($file_listing as $file)
{
	$dir_list[] = dirname($file);
	$compress->add_custom_file($file, str_replace($search, $replace, $file));
}
unset($file_listing);

// Add blank index.htm files
$dir_list = array_unique($dir_list);
foreach ($dir_list as $dir)
{
	$file_functions->append_slash($dir);
	$compress->add_data('', str_replace($search, $replace, $dir) . 'index.htm');
}
unset($dir_list);

// Close file
$compress->close();
// Send file to the browser for download
$compress->download($filename);
// Delete file from the store once user downloads it
@unlink($phpbb_root_path . 'store/' . $filename . $use_method);

exit;
?>