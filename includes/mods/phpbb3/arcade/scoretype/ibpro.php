<?php
/**
*
* @package arcade
* @version $Id: ibpro.php 545 2008-11-13 14:04:57Z jrsweets $
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

$game_scorevar = (isset($_POST['gname'])) ? request_var('gname', '') : false;
$score = (isset($_POST['gscore'])) ? request_var('gscore', 0.000) : false;
$game_sid = (isset($_POST['game_sid'])) ? request_var('game_sid', '') : false;

include(PHPBB3_INCLUDE_DIR . 'arcade/arcade_common.' . $phpEx);
// Initialize arcade auth
$auth_arcade->acl($user->data);
// Initialize arcade class
$arcade = new arcade();

if (!$game_sid)
{
	if (isset($_COOKIE[$arcade->cookie_sid]))
	{
		$game_sid = $_COOKIE[$arcade->cookie_sid];
	}
	else
	{
		trigger_error('ARCADE_COOKIE_ERROR');
	}
}

if ($game_scorevar)
{
	$game_data = $arcade->prepare_score($game_sid, $game_scorevar, IBPRO_GAME);
	require(PHPBB3_INCLUDE_DIR . 'arcade/arcade_score.'.$phpEx);
	exit;
}

// Something went wrong lets send them to the arcade index.
redirect(append_sid("{$phpbb_root_path}arcade.$phpEx"));
?>