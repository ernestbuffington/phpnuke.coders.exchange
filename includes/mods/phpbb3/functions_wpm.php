<?php
/** 
*
* @author Kevin Martin (DualFusion) yusuka_madik@yahoo.com
* @package Welcome PM MOD
* @version $Id$
* @copyright (c) 2007 DualFusion
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

function send_wpm($user_id)
{
	global $config, $user, $db, $phpEx;

	include_once(PHPBB3_INCLUDE_DIR . 'functions_privmsgs.' . $phpEx);

	$sql = 'SELECT username, user_regdate, user_email
		FROM ' . USERS_TABLE . '
		WHERE user_id = ' . $user_id;
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	$username		= $row['username'];
	$user_ip		= $user->ip;
	$user_regdate	= $user->format_date($row['user_regdate']);
	$user_email		= $row['user_email'];

	// Backup the $user->data array, as we have to modify it
	$backup_user = array(
		'data'	=> $user->data,
		'ip'	=> $user->ip,
	);

	$sql = 'SELECT username, user_colour
		FROM ' . USERS_TABLE . '
		WHERE user_id = ' . (int) $config['wpm_send_id'];
	$result	= $db->sql_query($sql);
	$row	= $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	$user->data = array_merge($user->data, array(
		'user_id'		=> (int) $config['wpm_send_id'],
		'is_registered'	=> 0,
		'username'		=> $row['username'],
		'user_colour'	=> $row['user_colour'],
	));
	$user->ip	= '0.0.0.0';

	// Parse the text with the bbcode parser and write into $text
	$subject	= $config['wpm_subject'];
	$message	= $config['wpm_message'];
	$text		= utf8_normalize_nfc($message);

	$uid			= $bitfield			= $options	= '';	// will be modified by generate_text_for_storage
	$allow_bbcode	= $allow_smilies	= true;
	$allow_urls		= false;
	generate_text_for_storage($text, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
	$text			= generate_text_for_display($text, $uid, $bitfield, $options);

	$user->add_lang('ucp');

	// Switch array keys, with values in welcome pm.
	$pm_vars = array(
		'{USERNAME}'		=> $username,
		'{USER_IP}'			=> $user_ip,
		'{USER_REGDATE}'	=> $user_regdate,
		'{USER_EMAIL}'		=> $user_email,
		'{SITE_NAME}'		=> $config['sitename'],
		'{SITE_DESC}'		=> $config['site_desc'],
	);

	$text = str_replace(array_keys($pm_vars), array_values($pm_vars), $text);

	$pm_data = array(
		'address_list'		=> array('u' => array($user_id => 'to')),
		'from_user_id'		=> $user->data['user_id'],
		'from_user_ip'		=> $user->data['user_ip'],
		'from_username'		=> $user->data['username'],
		'enable_sig'		=> false,
		'enable_bbcode'		=> true,
		'enable_smilies'	=> true,
		'enable_urls'		=> false,
		'icon_id'			=> 0,
		'bbcode_bitfield'	=> $bitfield,
		'bbcode_uid'		=> $uid,
		'message'			=> $text,
	);

	submit_pm('post', $subject, $pm_data, false);
	
	// Restore the $user->data array
	$user->data	= $backup_user['data'];
	$user->ip	= $backup_user['ip'];
	unset($backup_user);
}

?>
