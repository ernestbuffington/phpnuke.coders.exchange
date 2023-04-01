<?php
/**
*
* @package arcade
* @version $Id: newscore.php 545 2008-11-13 14:04:57Z jrsweets $
* @copyright (c) 2008 http://www.JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management here so that we can set update session page to false
// This is done so that the view online from phpbb3 will show the correct location
$user->session_begin(false);
$auth->acl($user->data);
$user->setup();

include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
// Initialize arcade auth
$auth_arcade->acl($user->data);
// Initialize arcade class
$arcade = new arcade();

// Only allow games that use $_POST method.  The AMOD games that use $_GET method are very easy to cheat at.
$game_scorevar = (isset($_POST['game_name'])) ? request_var('game_name', '') : '';
$score = (isset($_POST['score'])) ? request_var('score', 0.000) : '';
$game_sid = (isset($_POST['game_sid'])) ? request_var('game_sid', '') : false;

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
	$game_data = $arcade->prepare_score($game_sid, $game_scorevar, AMOD_GAME);
	require($phpbb_root_path . 'includes/arcade/arcade_score.'.$phpEx);
	exit;
}

// Either something went wrong or someone is acessing this file directly.
// Either way lets send them to the arcade index.
redirect(append_sid("{$phpbb_root_path}arcade.$phpEx"));
?>