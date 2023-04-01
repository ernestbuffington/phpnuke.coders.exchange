<?php
/**
*
* @package arcade
* @version $Id: ibprov3.php 251 2008-05-09 19:47:41Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * Applied rules:
 * RandomFunctionRector
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

$phpbb_root_path = PHPBB3_ROOT_DIR;

if ($do == 'verifyscore')
{
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

	$randchar1 = random_int(1, 200);
	$randchar2 = random_int(1, 200);

	if (isset($_COOKIE[$arcade->cookie_sid]))
	{
		$game_sid = $_COOKIE[$arcade->cookie_sid];
	}
	else
	{
		trigger_error('ARCADE_COOKIE_ERROR');
	}

	$sql_ary = array(
		'randchar1'		=> $randchar1,
		'randchar2'		=> $randchar2,
	);

	$sql = 'UPDATE ' . ARCADE_SESSIONS_TABLE . '
		SET ' . $db->sql_build_array('UPDATE', $sql_ary) . "
		WHERE session_id = '$game_sid'";
	$db->sql_query($sql);

	$arcade->set_header_no_cache();
	echo "&randchar=$randchar1&randchar2=$randchar2&savescore=1&blah=OK";
	exit;
}
else if ($do == 'savescore' || $do == 'newscore')
{
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

	$score = (isset($_POST['gscore'])) ? request_var('gscore', 0.000) : false;
	$enscore = (isset($_POST['enscore'])) ? request_var('enscore', 0.000) : false;
	$gidencoded =  (isset($_POST['arcadegid'])) ? request_var('arcadegid', 0) : false;

	if (isset($_COOKIE[$config['cookie_name'] . '_arcade_sid']))
	{
		$game_sid = $_COOKIE[$config['cookie_name'] . '_arcade_sid'];
	}
	else
	{
		trigger_error('ARCADE_COOKIE_ERROR');
	}

	$sql = 'SELECT game_id, game_type, randchar1, randchar2, randgid1, randgid2, start_time
		FROM ' . ARCADE_SESSIONS_TABLE . "
		WHERE session_id = '$game_sid'";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	if (!$row)
	{
		trigger_error('ARCADE_BACK_BUTTON_ERROR');
	}

	$game_scorevar = $arcade->get_game_field((int) $row['game_id'], 'game_scorevar');
	$decodescore = $score * $row['randchar1'] ^ $row['randchar2'];
	$encoded_gid = (int) $row['game_id'] * $row['randgid1'] ^ $row['randgid2'];

	if ($enscore != $decodescore || (file_exists($phpbb_root_path . 'arcade/gamedata/' . $game_scorevar . '/v32game.txt') && $gidencoded != $encoded_gid))
	{
		$sql_ary = array(
			'user_id'				=> $user->data['user_id'],
			'game_id'				=> (int) $row['game_id'],
			'score'					=> $score,
			'error_date'			=> time(),
			'error_type'			=> ARCADE_ERROR_IBPROV3,
			'game_type'				=> $row['game_type'],
			'submitted_game_type'	=> IBPROV3_GAME,
			'played_time'			=> time() - $row['start_time'],
			'error_ip'				=> $user->ip,
		);

		$sql = 'INSERT INTO ' . ARCADE_ERRORS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);

		trigger_error('ARCADE_IBPROV3_ERROR');
	}

	$game_data = $arcade->prepare_score($game_sid, $game_scorevar, IBPROV3_GAME);
	require(PHPBB3_INCLUDE_DIR . 'arcade/arcade_score.'.$phpEx);
	exit;
}

// Something went wrong lets send them to the arcade index.
redirect(append_sid("{$phpbb_root_path}arcade.$phpEx"));
?>