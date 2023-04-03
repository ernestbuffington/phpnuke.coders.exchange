<?php
/** 
 *
 * @package phpBB3
 * @version	0.1.4
 * @copyright (c) 2007 eviL3
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
include($phpbb_root_path . 'includes/constants_contact.' . $phpEx);
include($phpbb_root_path . 'includes/functions_contact.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('contact');

// Database update/install handling
$contact_version = '0.1.4';
if (!isset($config['contact_version']))
{
	install_contact($contact_version);
}
else if (version_compare($config['contact_version'], $contact_version, '<'))
{
	update_contact($contact_version);
}

// If contact method is invalid, it will default to email
if (!in_array($config['contact_method'], array(CONTACT_METHOD_EMAIL, CONTACT_METHOD_POST, CONTACT_METHOD_PM)))
{
	set_config('contact_method', CONTACT_METHOD_EMAIL);
}

// Trigger error if email or contact are disabled
if ((!$config['email_enable'] && $config['contact_method'] == CONTACT_METHOD_EMAIL) || !$config['contact_enable'])
{
	trigger_error('CONTACT_MAIL_DISABLED');
}

// Only have contact confirmation for guests, if the option is enabled
if ($user->data['user_id'] != ANONYMOUS && $config['contact_confirm_guests'])
{
	$config['contact_confirm'] = false;
}

// Our request variables
$submit			= (isset($_POST['submit'])) ? true : false;

$mode			= request_var('mode', '');
$contact_name	= ($user->data['user_id'] != ANONYMOUS) ? $user->data['username'] : request_var('contact_name', '', true);
$contact_email	= ($user->data['user_id'] != ANONYMOUS) ? $user->data['user_email'] : strtolower(request_var('contact_email', ''));
$subject		= str_replace("\n", '', trim(request_var('subject', '')));
$message		= trim(request_var('message', ''));
$reason			= str_replace("\n", '', request_var('reason', ''));

$confirm_id		= request_var('confirm_id', '');
$confirm_code	= request_var('confirm_code', '');

// We only accept $_POST
if (!$submit)
{
	$mode = false;
}

if ($mode == 'send')
{
	// $mode is set to 'send', so let's check our input data
	
	// This array will hold all our errors
	$error = array();
	
	// Validate username & email
	if ($user->data['user_id'] == ANONYMOUS)
	{
		$user->add_lang('ucp');
		
		if (empty($contact_name))
		{
			$error[] = $user->lang['CONTACT_NO_NAME'];
		}
		
		if (empty($contact_email))
		{
			$error[] = $user->lang['CONTACT_NO_EMAIL'];
		}
		else
		{
			// Borrowed from includes/functions_user.php
			if (!preg_match('/^' . get_preg_expression('email') . '$/i', $contact_email))
			{
				$error[] = $user->lang['EMAIL_INVALID_EMAIL'];
			}
		
			if ($user->check_ban(false, false, $contact_email, true) == true)
			{
				$error[] = $user->lang['EMAIL_BANNED_EMAIL'];
			}
		}
	}
	
	// Validate message and subject
	if (empty($subject))
	{
		$error[] = $user->lang['CONTACT_NO_SUBJ'];
	}
	
	if (empty($message))
	{
		$error[] = $user->lang['CONTACT_NO_MSG'];
	}
	
	if (!empty($config['contact_reasons']) && !in_array($reason, explode("\n", $config['contact_reasons'])))
	{
		$error[] = $user->lang['CONTACT_NO_REASON'];
	}
	
	// Visual Confirmation handling (borrowed from includes/ucp/ucp_register.php)
	if ($config['contact_confirm'])
	{
		$user->add_lang('ucp');
		
		if (!$confirm_id)
		{
			$error[] = $user->lang['PHPBB3_CONFIRM_CODE_WRONG'];
		}
		else
		{
			$sql = 'SELECT code
				FROM ' . PHPBB3_CONFIRM_TABLE . "
				WHERE confirm_id = '" . $db->sql_escape($confirm_id) . "'
					AND session_id = '" . $db->sql_escape($user->session_id) . "'
					AND confirm_type = " . PHPBB3_CONFIRM_CONTACT;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);

			if ($row)
			{
				if (strcasecmp($row['code'], $confirm_code) === 0)
				{
					$sql = 'DELETE FROM ' . PHPBB3_CONFIRM_TABLE . "
						WHERE confirm_id = '" . $db->sql_escape($confirm_id) . "'
							AND session_id = '" . $db->sql_escape($user->session_id) . "'
							AND confirm_type = " . PHPBB3_CONFIRM_CONTACT;
					$db->sql_query($sql);
				}
				else
				{
					$error[] = $user->lang['PHPBB3_CONFIRM_CODE_WRONG'];
				}
			}
			else
			{
				$error[] = $user->lang['PHPBB3_CONFIRM_CODE_WRONG'];
			}
		}
	}
	
	if (!sizeof($error))
	{
		// No errors, let's send the message :)
		
		if (!empty($config['contact_reasons']))
		{
			$subject = '[' . htmlspecialchars_decode($reason) . '] ' . $subject;
		}
		
		if ($config['contact_method'] != CONTACT_METHOD_POST)
		{
			// Grab an array of user_id's with admin permissions
			$admin_ary = $auth->acl_get_list(false, 'a_', false);
			$admin_ary = (!empty($admin_ary[0]['a_'])) ? $admin_ary[0]['a_'] : array();
	
			// Also include founders
			$where_sql = ' WHERE user_type = ' . PHPBB3_USER_FOUNDER;
	
			if (sizeof($admin_ary))
			{
				$where_sql .= ' OR ' . $db->sql_in_set('user_id', $admin_ary);
			}
	
			$sql = 'SELECT user_id, username, user_email, user_lang, user_jabber, user_notify_type
				FROM ' . PHPBB3_USERS_TABLE . ' ' .
				$where_sql;
			$result = $db->sql_query($sql);
			
			// Loop through our results
			while ($row = $db->sql_fetchrow($result))
			{
				$contact_users[] = $row;
			}
			$db->sql_freeresult($result);
		}
		
		if (in_array($config['contact_method'], array(CONTACT_METHOD_PM, CONTACT_METHOD_POST)))
		{
			// Backup the $user->data array and $user->ip into $user_backup, as we have to modify them
			$user_backup = array(
				'userdata' 	=> $user->data,
				'user_ip'	=> $user->ip,
			);
			
			$sql = 'SELECT username, user_colour
				FROM ' . PHPBB3_USERS_TABLE . '
				WHERE user_id = ' . (int) $config['contact_bot_user'] . '
				AND user_type <> ' . PHPBB3_USER_IGNORE;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			
			if (!$row)
			{
				add_log('critical', 'LOG_CONTACT_BOT_INVALID', $config['contact_bot_user']);
				
				$message = $user->lang['CONTACT_BOT_USER_INVALID'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
				trigger_error($message);
			}
			
			$user->data = array_merge($user->data, array(
				'user_id'		=> (int) $config['contact_bot_user'],
				'is_registered'	=> 0,
				'username'		=> $row['username'],
				'user_colour'	=> $row['user_colour'],
			));
			$user->ip = '0.0.0.0';
			
			// Parse the text with the bbcode parser and write into $text
			$text = utf8_normalize_nfc($message);
			if (in_array($config['contact_method'], array(CONTACT_METHOD_PM, CONTACT_METHOD_POST)))
			{
				$text = sprintf($user->lang['CONTACT_TEMPLATE'], $contact_name, $contact_email, $user_backup['user_ip'], $text);
			}
			
			$uid = $bitfield = $options = '';	// will be modified by generate_text_for_storage
			$allow_bbcode = $allow_smilies = true;
			$allow_urls = false;
			generate_text_for_storage($text, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
			
			$text = generate_text_for_display($text, $uid, $bitfield, $options);
		}
		
		switch ($config['contact_method'])
		{
			case CONTACT_METHOD_PM:
				// Send using PMs
				// Thanks to Handymans handy tutorial :D
				include_once($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
				
				$user->add_lang('ucp');
				
				$pm_data = array(
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
				
				// Loop through our list of users
				for ($i = 0, $size = sizeof($contact_users); $i < $size; $i++)
				{
					$pm_data['address_list'] = array('u' => array($contact_users[$i]['user_id'] => 'to'));
					
					submit_pm('post', $subject, $pm_data, false);
				}

				break;

			case CONTACT_METHOD_POST:
				// Create a new post
				// Many thanks to paul999 for helping me with this!
				include_once($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
				include_once($phpbb_root_path . 'includes/message_parser.' . $phpEx);
				
				$sql = 'SELECT forum_name
					FROM ' . PHPBB3_FORUMS_TABLE . '
					WHERE forum_id = ' . (int) $config['contact_bot_forum'];
				$result = $db->sql_query($sql);
				$forum_name = $db->sql_fetchfield('forum_name');
				$db->sql_freeresult($result);
				
				$post_data = array(
					'topic_title'			=> $subject,
					'topic_first_post_id'	=> 0,
					'topic_last_post_id'	=> 0,
					'topic_time_limit'		=> 0,
					'topic_attachment'		=> 0,
					'post_id'				=> 0,
					'topic_id'				=> 0,
					'forum_id'				=> (int) $config['contact_bot_forum'],
					'icon_id'				=> 0,
					'poster_id'				=> 0,
					'enable_sig'			=> true,
					'enable_bbcode'			=> (bool) $allow_bbcode,
					'enable_smilies'		=> (bool) $allow_smilies,
					'enable_urls'			=> (bool) $allow_urls,
					'enable_indexing'		=> false,
					'message_md5'			=> (string) md5($text),
					'post_time'				=> time(),
					'post_checksum'			=> '',
					'post_edit_reason'		=> '',
					'post_edit_user'		=> 0,
					'forum_name'			=> $forum_name,
					'notify'				=> false,
					'notify_set'			=> false,
					'poster_ip'				=> $user->ip,
					'post_edit_locked'		=> 0,
					'bbcode_bitfield'		=> $bitfield,
					'bbcode_uid'			=> $uid,
					'message'				=> $text,
					'attachment_data'		=> 0,
					'filename_data'			=> 0,
				);
				
				$poll = array();
				
				// Submit the post!
				submit_post('post', $subject, $user->data['username'], PHPBB3_POST_NORMAL, $poll, $post_data);
				
				break;
				
			case CONTACT_METHOD_EMAIL:
			default:
				// Send using email (default)
				// Some of the code borrowed from includes/ucp/ucp_register.php
				// The first argument of messenger::messenger() decides if ituses the message queue (wich we will)
				include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
				$messenger = new messenger(true);
				
				// Email headers
				$messenger->headers('X-AntiAbuse: Board servername - ' . $config['server_name']);
				$messenger->headers('X-AntiAbuse: User_id - ' . $user->data['user_id']);
				$messenger->headers('X-AntiAbuse: Username - ' . $user->data['username']);
				$messenger->headers('X-AntiAbuse: User IP - ' . $user->ip);
				
				// Loop through our list of users
				for ($i = 0, $size = sizeof($contact_users); $i < $size; $i++)
				{
					$messenger->template('admin_contact', $contact_users[$i]['user_lang']);
					$messenger->to($contact_users[$i]['user_email'], $contact_users[$i]['username']);
					$messenger->im($contact_users[$i]['user_jabber'], $contact_users[$i]['username']);
		
					$messenger->assign_vars(array(
						'ADM_USERNAME'	=> htmlspecialchars_decode($contact_users[$i]['username']),
						'SITENAME'		=> htmlspecialchars_decode($config['sitename']),
						
						'USERNAME'		=> htmlspecialchars_decode($contact_name),
						'USER_EMAIL'	=> htmlspecialchars_decode($contact_email),
						
						'SUBJECT'		=> htmlspecialchars_decode($subject),
						'MESSAGE'		=> htmlspecialchars_decode($message),
					));
		
					$messenger->send($contact_users[$i]['user_notify_type']);
				}
				
				// Save emails in the queue to prevent timeouts
				$messenger->save_queue();
				
				break;
		}
		
		if (in_array($config['contact_method'], array(CONTACT_METHOD_PM, CONTACT_METHOD_POST)))
		{
			// Restore $user->data and $user->ip from $user_backup
			$user->data	= $user_backup['userdata'];
			$user->ip	= $user_backup['user_ip'];
			unset($user_backup);
		}
		
		// Everything went fine, output a confirmation page
		$message = $user->lang['CONTACT_MSG_SENT'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
		trigger_error($message);
	}
}

$s_hidden_fields = build_hidden_fields(array(
	'mode'	=> 'send',
));


$confirm_image = '';

// Visual Confirmation - Show images (borrowed from includes/ucp/ucp_register.php)
if ($config['contact_confirm'])
{
	$sql = 'SELECT session_id
		FROM ' . PHPBB3_SESSIONS_TABLE;
	$result = $db->sql_query($sql);

	if ($row = $db->sql_fetchrow($result))
	{
		$sql_in = array();
		do
		{
			$sql_in[] = (string) $row['session_id'];
		}
		while ($row = $db->sql_fetchrow($result));

		if (sizeof($sql_in))
		{
			$sql = 'DELETE FROM ' . PHPBB3_CONFIRM_TABLE . '
				WHERE ' . $db->sql_in_set('session_id', $sql_in, true) . '
					AND confirm_type = ' . PHPBB3_CONFIRM_CONTACT;
			$db->sql_query($sql);
		}
	}
	$db->sql_freeresult($result);

	$sql = 'SELECT COUNT(session_id) AS attempts
		FROM ' . PHPBB3_CONFIRM_TABLE . "
		WHERE session_id = '" . $db->sql_escape($user->session_id) . "'
			AND confirm_type = " . PHPBB3_CONFIRM_CONTACT;
	$result = $db->sql_query($sql);
	$attempts = (int) $db->sql_fetchfield('attempts');
	$db->sql_freeresult($result);

	if ($config['contact_max_attempts'] && $attempts > $config['contact_max_attempts'])
	{
		trigger_error('CONTACT_TOO_MANY');
	}

	$code = gen_rand_string(mt_rand(5, 8));
	$confirm_id = md5(unique_id($user->ip));
	$seed = hexdec(substr(unique_id(), 4, 10));

	// compute $seed % 0x7fffffff
	$seed -= 0x7fffffff * floor($seed / 0x7fffffff);

	$sql = 'INSERT INTO ' . PHPBB3_CONFIRM_TABLE . ' ' . $db->sql_build_array('INSERT', array(
		'confirm_id'	=> (string) $confirm_id,
		'session_id'	=> (string) $user->session_id,
		'confirm_type'	=> (int) PHPBB3_CONFIRM_CONTACT,
		'code'			=> (string) $code,
		'seed'			=> (int) $seed)
	);
	$db->sql_query($sql);

	$confirm_image = '<img src="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=confirm&amp;id=' . $confirm_id . '&amp;type=' . PHPBB3_CONFIRM_CONTACT) . '" alt="" title="" />';
	$s_hidden_fields .= '<input type="hidden" name="confirm_id" value="' . $confirm_id . '" />';
}

$template->assign_vars(array(
	'CONTACT_NAME'		=> $contact_name,
	'CONTACT_EMAIL'		=> $contact_email,
	'SUBJECT'			=> $subject,
	'MESSAGE'			=> $message,
	'REASONS'			=> (!empty($config['contact_reasons'])) ? contact_make_select(explode("\n", $config['contact_reasons']), $reason) : '',
	
	'PHPBB3_CONFIRM_IMG'		=> $confirm_image,
	
	'S_CONTACT_ACTION'	=> append_sid("{$phpbb_root_path}contact.$phpEx"),
	'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
	'S_ERROR'			=> (isset($error) && sizeof($error)) ? implode('<br />', $error) : '',
	'S_PHPBB3_CONFIRM_CODE'	=> ($config['contact_confirm']) ? true : false,
));

// Output the page
page_header($user->lang['CONTACT_BOARD_ADMIN']);

$template->set_filenames(array(
	'body' => 'contact_body.html')
);

page_footer();

?>