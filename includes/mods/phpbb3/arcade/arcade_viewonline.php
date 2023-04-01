<?php
/**
*
* @package arcade
* @version $Id: arcade_viewonline.php 617 2008-12-02 22:09:12Z jrsweets $
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

if (!isset($arcade))
{
	include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
	include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
	// Initialize arcade auth
	$auth_arcade->acl($user->data);
	// Initialize arcade class
	$arcade = new arcade(false);
}

// Grab some common modules
$url_params = array(
	'mode=play'					=> 'PLAYING_GAME',
	'mode=cat'					=> 'VIEWING_ARCADE_CAT',
	'mode=download&type=data'	=> 'DOWNLOADING_LIST',
	'mode=download&type=list'	=> 'DOWNLOADING_LIST',
	'mode=download&type=acp'	=> 'DOWNLOADING_GAME_LIST',
	'mode=download'				=> 'DOWNLOADING_GAME',
	'mode=stats'				=> 'VIEWING_ARCADE_STATS',
	'mode=popup'				=> 'PLAYING_GAME',
	'mode=search'				=> 'VIEWING_ARCADE_SEARCH',
	'mode=fav'					=> 'VIEWING_ARCADE_FAVS',
);

$found_arcade = false;
foreach ($url_params as $param => $lang)
{
	if (strpos($row['session_page'], $param) !== false)
	{
		$found_arcade = true;
		if ($param == 'mode=cat')
		{
			preg_match('#c=([0-9]+)#', $row['session_page'], $cat_id);
			$cat_id = (sizeof($cat_id)) ? (int) $cat_id[1] : 0;

			if (!$auth_arcade->acl_get('c_view', $cat_id))
			{
				$found_arcade = false;
				break;
			}

			$cat_name = $arcade->get_cat_field($cat_id, 'cat_name');

			$location = sprintf($user->lang[$lang], $cat_name);
			$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=cat&amp;c=' . $cat_id);
		}
		else if ($param == 'mode=download' || $param == 'mode=download&type=acp')
		{
			preg_match('#g=([0-9]+)#', $row['session_page'], $game_id);
			$game_id = (sizeof($game_id)) ? (int) $game_id[1] : 0;

			$game_name = $arcade->get_game_field($game_id, 'game_name');
			if (!$game_name)
			{
				$found_arcade = false;
				break;
			}

			$location = sprintf($user->lang[$lang], $game_name);
			$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=download&amp;g=' . $game_id);
		}
		else if ($param == 'mode=play' || $param == 'mode=popup')
		{
			preg_match('#g=([0-9]+)#', $row['session_page'], $game_id);
			$game_id = (sizeof($game_id)) ? (int) $game_id[1] : 0;

			$game_name = $arcade->get_game_field($game_id, 'game_name');
			if (!$game_name)
			{
				$found_arcade = false;
				break;
			}

			$location = sprintf($user->lang[$lang], $game_name);
			$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=play&amp;g=' . $game_id);

		}
		else if ($param == 'mode=stats')
		{
			preg_match('#g=([0-9]+)#', $row['session_page'], $game_id);
			$game_id = (sizeof($game_id)) ? (int) $game_id[1] : 0;

			preg_match('#u=([0-9]+)#', $row['session_page'], $user_id);
			$user_id = (sizeof($user_id)) ? (int) $user_id[1] : 0;

			if ($game_id && $user_id)
			{
				$game_name = $arcade->get_game_field($game_id, 'game_name');
				if (!$game_name)
				{
					$found_arcade = false;
					break;
				}

				$user_id_ary[] = $user_id;
				$arcade_usernames = array();
				user_get_id_name($user_id_ary, $arcade_usernames);
				$arcade_username = $arcade_usernames[$user_id];

				$location = sprintf($user->lang[$lang . '_GAME_USER'], $game_name, $arcade_username);
				$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=stats&amp;g=$game_id&amp;u=$user_id");
			}
			else if ($game_id)
			{
				$game_name = $arcade->get_game_field($game_id, 'game_name');
				if (!$game_name)
				{
					$found_arcade = false;
					break;
				}

				$location = sprintf($user->lang[$lang . '_GAME'], $game_name);
				$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=stats&amp;g=$game_id");
			}
			else if ($user_id)
			{
				$user_id_ary[] = $user_id;
				$arcade_usernames = array();
				user_get_id_name($user_id_ary, $arcade_usernames);
				$arcade_username = $arcade_usernames[$user_id];

				$location = sprintf($user->lang[$lang . '_USER'], $arcade_username);
				$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=stats&amp;u=$user_id");
			}

		}
		else
		{
			$location = $user->lang[$lang];
			$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx");
		}
		break;
	}
}

if (!$found_arcade)
{
	$location = $user->lang['VIEWING_ARCADE'];
	$location_url = append_sid("{$phpbb_root_path}arcade.$phpEx");
}

?>