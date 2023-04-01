<?php
/**
*
* @package phpBB3
* @version $Id: chat.php 52 2007-11-04 05:56:17Z Handyman $
* @copyright (c) 2007 StarTrekGuide
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

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('chat');

define('CHAT_TABLE', $prefix_phpbb3 . 'chat');
define('CHAT_SESSIONS_TABLE', $prefix_phpbb3 . 'chat_sessions');

/******************************************/
/* EDIT these for custom online settings */
/****************************************/
$session_time = 300;
$default_delay = 15;
//set status
$times = array(
	'online'	=> 0,
	'idle'		=> 300,
	'offline'	=> 1800,
);
//set delay for each status
$delay = array(
	'online'	=> 5,
	'idle'		=> 60,
	'offline'	=> 300,
);
/*****************************************/
/* DO NOT EDIT ANYTHING BELOW THIS LINE */
/***************************************/

$mode = request_var('mode', '');
$last_id = request_var('last_id', 0);
$last_post = request_var('last_post', 0);
$last_time = request_var('last_time', 0);
$get = $init = false;
$count = 0;

switch ($mode)
{
	default:
		$sql = 'SELECT * FROM ' . CHAT_TABLE . ' ORDER BY message_id DESC';
		$result = $db->sql_query_limit($sql, 25);
		$rows = $db->sql_fetchrowset($result);

		foreach ($rows as $row)
		{
			if ($count++ == 0)
			{
				$last_id = $row['message_id'];
			}
			$template->assign_block_vars('chatrow', array(
				'MESSAGE_ID'	=> $row['message_id'],
				'USERNAME_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $user->lang['GUEST']),
				'MESSAGE'		=> generate_text_for_display($row['message'], $row['bbcode_uid'], $row['bbcode_bitfield'], $row['bbcode_options']),
				'TIME'			=> $user->format_date($row['time']),
				'CLASS'			=> ($row['message_id'] % 2) ? 1 : 2,
			));
		}
		$db->sql_freeresult($result);

		if ($user->data['user_type'] == USER_FOUNDER || $user->data['user_type'] == USER_NORMAL)
		{
			$sql = 'SELECT * FROM ' . CHAT_SESSIONS_TABLE . " WHERE user_id = {$user->data['user_id']}";
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($row['user_id'] != $user->data['user_id'])
			{
				$sql_ary = array(
					'user_id'			=> $user->data['user_id'],
					'username'			=> $user->data['username'],
					'user_colour'		=> $user->data['user_colour'],
					'user_login'		=> time(),
					'user_lastupdate'	=> time(),
				);
				$sql = 'INSERT INTO ' . CHAT_SESSIONS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
				$db->sql_query($sql);
			}
			else
			{
				$sql_ary = array(
					'username'			=> $user->data['username'],
					'user_colour'		=> $user->data['user_colour'],
					'user_login'		=> time(),
					'user_lastupdate'	=> time(),
				);
				$sql = 'UPDATE ' . CHAT_SESSIONS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . " WHERE user_id = {$user->data['user_id']}";
				$db->sql_query($sql);
			}
		}
		whois_online();
		$template->assign_vars(array(
			'TIME'	=> time(),
			'DELAY'	=> $default_delay,
		));
	break;
	case 'read':
		$sql = 'SELECT * FROM ' . CHAT_TABLE . " WHERE message_id > $last_id ORDER BY message_id DESC";
		$result = $db->sql_query_limit($sql, 25);
		$rows = $db->sql_fetchrowset($result);

		if (!sizeof($rows) && ((time() - 60) < $last_time))
		{
			exit;
		}
		foreach ($rows as $row)
		{
			if ($count++ == 0)
			{
				$last_id = $row['message_id'];
			}
			$template->assign_block_vars('chatrow', array(
				'MESSAGE_ID'	=> $row['message_id'],
				'USERNAME_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $user->lang['GUEST']),
				'MESSAGE'		=> generate_text_for_display($row['message'], $row['bbcode_uid'], $row['bbcode_bitfield'], $row['bbcode_options']),
				'TIME'			=> $user->format_date($row['time']),
				'CLASS'			=> ($row['message_id'] % 2) ? 1 : 2,
			));
		}
		$db->sql_freeresult($result);
		if ((time() - 60) > $last_time)
		{
			whois_online();
			$sql_ary = array(
				'username'			=> $user->data['username'],
				'user_colour'		=> $user->data['user_colour'],
				'user_lastupdate'	=> time(),
			);
			$sql = 'UPDATE ' . CHAT_SESSIONS_TABLE . '
				SET ' . $db->sql_build_array('UPDATE', $sql_ary) . "
				WHERE user_id = {$user->data['user_id']}";
			$result = $db->sql_query($sql);
		}
		$get = true;
	break;
	case 'add':
		if (!$user->data['is_registered'] || $user->data['user_type'] == USER_INACTIVE || $user->data['user_type'] == USER_IGNORE)
		{
			redirect(append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'));
		}

		$get = true;
		$read_interval = request_var('read_interval', 0);
		$message = utf8_normalize_nfc(request_var('message', '', true));

		if (!$message)
		{
			break;
		}
		$message = str_replace('---', '- -', $message);
		$uid = $bitfield = $options = '';
		$allow_bbcode = $allow_urls = $allow_smilies = true;
		generate_text_for_storage($message, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);

		$sql_ary = array(
			'chat_id'			=> 1,
			'user_id'			=> $user->data['user_id'],
			'username'			=> $user->data['username'],
			'user_colour'		=> $user->data['user_colour'],
			'message'			=> $message,
			'bbcode_bitfield'	=> $bitfield,
			'bbcode_uid'		=> $uid,
			'bbcode_options'	=> $options,
			'time'				=> time(),
		);
		$sql = 'INSERT INTO ' . CHAT_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
		$db->sql_query($sql);

		$sql_ary = array(
			'username'			=> $user->data['username'],
			'user_colour'		=> $user->data['user_colour'],
			'user_lastpost'		=> time(),
			'user_lastupdate'	=> time(),
		);
		$sql = 'UPDATE ' . CHAT_SESSIONS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . " WHERE user_id = {$user->data['user_id']}";
		$result = $db->sql_query($sql);


		$sql = 'SELECT * FROM ' . CHAT_TABLE . " WHERE message_id > $last_id ORDER BY message_id DESC";
		$result = $db->sql_query_limit($sql, 25);
		$rows = $db->sql_fetchrowset($result);

		if (!sizeof($rows) && ((time() - 60) < $last_time))
		{
			exit;
		}
		foreach ($rows as $row)
		{
			if ($count++ == 0)
			{
				$last_id = $row['message_id'];
			}
			$template->assign_block_vars('chatrow', array(
				'MESSAGE_ID'	=> $row['message_id'],
				'USERNAME_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $user->lang['GUEST']),
				'MESSAGE'		=> generate_text_for_display($row['message'], $row['bbcode_uid'], $row['bbcode_bitfield'], $row['bbcode_options']),
				'TIME'			=> $user->format_date($row['time']),
				'CLASS'			=> ($row['message_id'] % 2) ? 1 : 2,
			));
		}
		$db->sql_freeresult($result);

		if ($read_interval != $delay['online'])
		{
			whois_online();
		}
	break;
	case 'delete':
		$get = true;
		$chat_id = request_var('chat_id', 0);

		if (!$chat_id)
		{
			break;
		}

		if (!$auth->acl_get('a_') && !$auth->acl_get('m_'))
		{
			break;
		}
		$sql = 'DELETE FROM ' . CHAT_TABLE . " WHERE message_id = $chat_id";
		$db->sql_query($sql);

	break;
}

$mode = strtoupper($mode);
$template->assign_vars(array(
	'FILENAME'		=> append_sid("{$phpbb_root_path}chat.$phpEx"),
	'LAST_ID'		=> $last_id,
	'S_CHAT'		=> (!$get) ? true : false,
	'S_GET_CHAT'	=> ($get) ? true : false,
	'S_' . $mode	=> true,
));
page_header($user->lang['PAGE_TITLE']);

$template->set_filenames(array(
	'body' => 'chat_body.html')
);

page_footer();

function whois_online()
{
	global $db, $template, $user;
	global $delay, $last_post, $session_time;

	$check_time = time() - $session_time;

	$sql_ary = array(
		'username'			=> $user->data['username'],
		'user_colour'		=> $user->data['user_colour'],
		'user_lastupdate'	=> time(),
	);
	$sql = 'UPDATE ' . CHAT_SESSIONS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . " WHERE user_id = {$user->data['user_id']}";
	$db->sql_query($sql);

	$sql = 'DELETE FROM ' . CHAT_SESSIONS_TABLE . " WHERE user_lastupdate < $check_time";
	$db->sql_query($sql);

	$sql = 'SELECT *
		FROM ' . CHAT_SESSIONS_TABLE . "
		WHERE user_lastupdate > $check_time
		ORDER BY username ASC";
	$result = $db->sql_query($sql);

	$status_time = time();
	while ($row = $db->sql_fetchrow($result))
	{
		if ($row['user_id'] == $user->data['user_id'])
		{
			$last_post = $row['user_lastpost'];
			$login_time = $row['user_login'];
			$status_time = ($last_post > $login_time) ? $last_post : $login_time;
		}
		$status = get_status($row['user_lastpost']);
		$template->assign_block_vars('whoisrow', array(
			'USERNAME_FULL'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $user->lang['GUEST']),
			'USER_STATUS'	=> $status,
		));
	}
	$db->sql_freeresult($result);

	$template->assign_vars(array(
		'DELAY'			=> ($status_time) ? $delay[get_status($status_time)] : $delay['idle'],
		'LAST_TIME'		=> time(),
		'S_WHOISONLINE'	=> true,
	));
	return false;
}
function get_status($last)
{
	global $times;

	$status = 'online';
	if ($last < (time() - $times['offline']))
	{
		$status = 'offline';
	}
	else if ($last < (time() - $times['idle']))
	{
		$status = 'idle';
	}
	return $status;
}
?>