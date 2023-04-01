<?php
/**
*
* @package arcade
* @version $Id: v3arcade.php 251 2008-05-09 19:47:41Z jrsweets $
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

$phpbb_root_path = PHPBB3_ROOT_DIR;

// Start session management here so that we can set update session page to false
// This is done so that the view online from phpbb3 will show the correct location
$user->session_begin(false);
$auth->acl($user->data);
$user->setup();

include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_common.' . $phpEx);
// Initialize arcade auth
$auth_arcade->acl($user->data);
// Initialize arcade class
$arcade = new arcade();

$game_scorevar = (isset($_POST['gamename'])) ? request_var('gamename', '') : '';
$micro_one = (isset($_POST['microone'])) ? request_var('microone', '') : '';
$score = (isset($_POST['score'])) ? request_var('score', 0.000) : '';
$fake_key = (isset($_POST['fakekey'])) ? request_var('fakekey', '') : '';

switch ($v3arcade)
{
	case 'sessionstart' :
		$sql = 'SELECT game_id FROM ' . ARCADE_GAMES_TABLE . "
			WHERE game_scorevar = '$game_scorevar'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$game_id = $row['game_id'];

		$sql = 'SELECT session_id FROM ' . ARCADE_SESSIONS_TABLE . '
			WHERE user_id = ' . $user->data['user_id'] . '
				AND game_id = ' . $game_id;
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);


		$initbar =  $game_scorevar . '|' . $row['session_id'];
		echo '&connStatus=1&initbar='. $initbar .'&val=x';
		exit;
		break;

	case 'permrequest' :
		echo '&validate=1&microone='. $score .'|'. $fake_key .'&val=x';
		exit;
		break;

	case 'burn' :
		$data 	= explode('|', $micro_one);
		$game_sid = $data[2];
		$game_scorevar	= str_replace("\'", "''", htmlspecialchars(trim($data[1])));
		$score 	= floatval($data[0]);

		$game_data = $arcade->prepare_score($game_sid, $game_scorevar, V3ARCADE_GAME);
		require(PHPBB3_INCLUDE_DIR . 'arcade/arcade_score.'.$phpEx);
		break;
}

// Something went wrong lets send them to the arcade index.
redirect(append_sid("{$phpbb_root_path}arcade.$phpEx"));
?>