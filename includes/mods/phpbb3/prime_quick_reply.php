<?php
/**
*
* @package phpBB3
* @version $Id: prime_quick_reply.php,v 0.1.5 2008/02/18 23:30:00 primehalo Exp $
* @copyright (c) 2008 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 * RandomFunctionRector
 * TernaryToNullCoalescingRector
 * CountOnNullRector (https://3v4l.org/Bndc9)
 * StrStartsWithRector (https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Make sure this file has not been included already.
*/
if (!defined('INCLUDES_PRIME_QUICK_REPLY'))
{
	define('INCLUDES_PRIME_QUICK_REPLY', true);
	define('QUICK_REPLY_NO',	0);
	define('QUICK_REPLY_YES',	1);
	define('QUICK_REPLY_LAST',	2);

	// Setup for the Administration Control Panel.
	function prime_quick_reply_admin($key = '', $select_id = 0)
	{
		global $config, $user;

		$user->add_lang('mods/prime_quick_reply');
		$options_array = array(
			'quick_reply_enabled' => array(
				QUICK_REPLY_YES		=> 'YES',
				QUICK_REPLY_NO		=> 'NO',
				QUICK_REPLY_LAST	=> 'QUICK_REPLY_ADMIN_LAST_PAGE_ONLY'
			),
			'quick_reply_guests' => array(
				QUICK_REPLY_YES		=> 'YES',
				QUICK_REPLY_NO		=> 'NO',
				QUICK_REPLY_LAST	=> 'QUICK_REPLY_ADMIN_LAST_PAGE_ONLY'
			),
			'quick_reply_visible' => array(
				QUICK_REPLY_YES		=> 'YES',
				QUICK_REPLY_NO		=> 'NO',
				QUICK_REPLY_LAST	=> 'QUICK_REPLY_ADMIN_LAST_PAGE_ONLY'
			),
			'quick_reply_memory' => array(
				QUICK_REPLY_YES		=> 'YES',
				QUICK_REPLY_NO		=> 'NO',
				QUICK_REPLY_LAST	=> 'QUICK_REPLY_ADMIN_LAST_PAGE_ONLY'
			)
		);
		if ($key !== '' && is_array($options_array[$key]))
		{
			$select = '';
			foreach ($options_array[$key] as $idx => $title)
			{
				$selected = ((integer)$config[$key] === $idx) ? ' checked="checked"' : '';
				$select .= '<label><input type="radio"' . ($idx == 1 ? ' id="' . $key . '"' : '') . ' name="config[' . $key . ']" value="' . $idx . '"' . $selected . ' class="radio" /> ' . $user->lang[$title] . '</label>';
			}
			return($select);
		}

		$quick_reply_config = array(
			// config option		=> default value
			'quick_reply_enabled'	=> QUICK_REPLY_YES,
			'quick_reply_visible'	=> QUICK_REPLY_LAST,
			'quick_reply_guests'	=> true,
			'quick_reply_memory'	=> false,
			'quick_reply_options'	=> true,
			'quick_reply_subject'	=> false,
			'quick_reply_bbcodes'	=> false,
			'quick_reply_smilies'	=> false,
		);
		foreach ($quick_reply_config as $option => $default)
		{
			if (!isset($config[$option]))
			{
				set_config($option, $default);
			}
		}
	}

	// Setup everything we need for the quick reply form.
	function prime_quick_reply($topic_id, $forum_id, &$topic_data, $last_posts = null)
	{
		$post_data = [];
        
		global $db, $template, $user, $config, $auth, $phpEx;
		
		$phpbb_root_path = PHPBB3_ROOT_DIR;

		// Check if replies are even allowed
		$on_last_page	= empty($template->_rootref['NEXT_PAGE']);
		$enable_guests	= $config['quick_reply_guests'] ?? QUICK_REPLY_YES;	// Enable this MOD for guests?
		$enable_reply	= $config['quick_reply_enabled'] ?? QUICK_REPLY_YES;	// Enable this MOD
		$enable_reply	= ($enable_reply == QUICK_REPLY_YES || ($enable_reply == QUICK_REPLY_LAST && $on_last_page));
		$enable_reply	= !$enable_reply ? false : ($auth->acl_get('f_reply', $forum_id));
		$enable_reply	= !$enable_reply ? false : (!empty($template->_rootref['S_DISPLAY_REPLY_INFO']));
		$enable_reply	= !$enable_reply ? false : (!$user->data['is_bot']);
		$enable_reply	= !$enable_reply ? false : (($topic_data['forum_status'] != PHPBB3_ITEM_LOCKED && $topic_data['topic_status'] != PHPBB3_ITEM_LOCKED) || $auth->acl_get('m_edit', $forum_id));
		$enable_reply	= !$enable_reply ? false : ($enable_guests || $user->data['user_id'] != ANONYMOUS);
		if (!$enable_reply)
		{
			return;
		}

		// Settings
		$enable_quote		= (true && !empty($last_posts));	// Enable the ability to quote the last message (or multi-quote if Prime Multi-Quote is installed)
		$enable_subject		= true;	// Enable the ability to change the post's subject
		$enable_bbcodes		= true;	// Enable the ability to use BBCodes
		$enable_smilies 	= true;	// Enable the ability to use emoticons
		$enable_memory		= $config['quick_reply_memory'] ?? QUICK_REPLY_YES;	// Keep track of the form's display state
		$display_form		= $config['quick_reply_visible'] ?? QUICK_REPLY_YES;
		$display_options	= $config['quick_reply_options'] ?? true;
		$display_subject	= $config['quick_reply_subject'] ?? false;
		$display_bbcodes	= $config['quick_reply_bbcodes'] ?? false;
		$display_smilies	= $config['quick_reply_smilies'] ?? false;
		$display_form		= ($display_form  == QUICK_REPLY_YES || ($display_form  == QUICK_REPLY_LAST && $on_last_page));
		$enable_guests		= ($enable_guests == QUICK_REPLY_YES || ($enable_guests == QUICK_REPLY_LAST && $on_last_page));
		$enable_memory		= ($enable_memory == QUICK_REPLY_YES || ($enable_memory == QUICK_REPLY_LAST && $on_last_page));

		if ($enable_memory)
		{
			$cookie_name = rawurlencode($config['cookie_name'] . '_prime_quick_reply');
			$display_form = request_var($cookie_name, $display_form, false, true);
			//$display_options = request_var($cookie_name . '_options', $display_options, false, true);
		}

		$s_hidden_fields = array(
			'mode'		=> 'reply',
			'f'			=> $forum_id,
			't'			=> $topic_id,
			'icon'		=> 0,
			'lastclick'	=> time(),
		);

        //-- mod: Prime Anti-bot ----------------------------------------------------//
		if (!empty($config['prime_captcha_post']) && !$user->data['is_registered'])
		{
			if (!class_exists('prime_captcha'))
			{
				include(PHPBB3_INCLUDE_DIR . 'prime_captcha.' . $phpEx);
			}
			$prime_captcha = new prime_captcha();
			$s_hidden_fields = $s_hidden_fields + ($prime_captcha->fields ?? array());
		}
        //-- end: Prime Anti-bot ----------------------------------------------------//

		// CAPTCHA (code stolen from posting.php)
		if ($config['enable_post_confirm'] && !$user->data['is_registered'])
		{
			// Show confirm image
			$sql = 'DELETE FROM ' . PHPBB3_CONFIRM_TABLE . "
				WHERE session_id = '" . $db->sql_escape($user->session_id) . "'
					AND confirm_type = " . PHPBB3_CONFIRM_POST;
			$db->sql_query($sql);

			// Generate code
			$code = gen_rand_string(random_int(5, 8));
			$confirm_id = md5(unique_id($user->ip));
			$seed = hexdec(substr(unique_id(), 4, 10));

			// compute $seed % 0x7fffffff
			$seed -= 0x7fffffff * floor($seed / 0x7fffffff);

			$sql = 'INSERT INTO ' . PHPBB3_CONFIRM_TABLE . ' ' . $db->sql_build_array('INSERT', array(
				'confirm_id'	=> (string) $confirm_id,
				'session_id'	=> (string) $user->session_id,
				'confirm_type'	=> (int) PHPBB3_CONFIRM_POST,
				'code'			=> (string) $code,
				'seed'			=> (int) $seed)
			);
			$db->sql_query($sql);

			$template->assign_vars(array(
				'S_PHPBB3_CONFIRM_CODE'			=> true,
				'PHPBB3_CONFIRM_ID'				=> $confirm_id,
				'PHPBB3_CONFIRM_IMAGE'				=> '<img src="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=confirm&amp;id=' . $confirm_id . '&amp;type=' . PHPBB3_CONFIRM_POST) . '" alt="" title="" />',
				'L_POST_PHPBB3_CONFIRM_EXPLAIN'	=> sprintf($user->lang['POST_PHPBB3_CONFIRM_EXPLAIN'], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>'),
			));
		}

		// Page title & action URL, include session_id for security purpose
		$s_action = append_sid("{$phpbb_root_path}posting.$phpEx", false, true, $user->session_id);
		add_form_key('posting');

		// HTML, BBCode, Smilies, Images and Flash status (code mostly stolen from posting.php)
		$bbcode_status	= $enable_bbcodes && ($config['allow_bbcode'] && $auth->acl_get('f_bbcode', $forum_id)) ? true : false;
		$smilies_status	= $enable_smilies && ($bbcode_status && $config['allow_smilies'] && $auth->acl_get('f_smilies', $forum_id)) ? true : false;
		$img_status		= ($bbcode_status && $auth->acl_get('f_img', $forum_id)) ? true : false;
		$url_status		= ($config['allow_post_links']) ? true : false;
		$flash_status	= ($bbcode_status && $auth->acl_get('f_flash', $forum_id) && $config['allow_post_flash']) ? true : false;
		$quote_status	= ($auth->acl_get('f_reply', $forum_id)) ? true : false;
		$topic_lock		= (isset($_POST['lock_topic'])) ? true : false;

		$post_data['enable_sig']		= ($config['allow_sig'] && $user->optionget('attachsig')) ? true: false;
		$post_data['enable_bbcode']		= ($config['allow_bbcode'] && $user->optionget('bbcode')) ? true : false;
		$post_data['enable_smilies']	= ($config['allow_smilies'] && $user->optionget('smilies')) ? true : false;
		$post_data['enable_urls']		= true;

		$bbcode_checked		= !$post_data['enable_bbcode'];
		$smilies_checked	= !$post_data['enable_smilies'];
		$urls_checked		= !$post_data['enable_urls'];
		$sig_checked		= $post_data['enable_sig'];
		$notify_checked		= ($config['allow_topic_notify'] && $user->data['is_registered']);
		$lock_topic_checked	= (isset($topic_lock) && $topic_lock) ? $topic_lock : (($topic_data['topic_status'] == PHPBB3_ITEM_LOCKED) ? 1 : 0);

		if ($notify_checked)
		{
			// If user does not subscribe by default, then check if they've subscribed to the topic
			if (!($notify_checked = $user->data['user_notify']))
			{
				$sql = 'SELECT topic_id
					FROM ' . PHPBB3_TOPICS_WATCH_TABLE . '
					WHERE topic_id = ' . $topic_id . '
						AND user_id = ' . $user->data['user_id'];
				$result = $db->sql_query($sql);
				$notify_checked = (int) $db->sql_fetchfield('topic_id');
				$db->sql_freeresult($result);
			}
		}

		// Build custom bbcodes array
		if ($bbcode_status)
		{
			$user->add_lang('posting');
			display_custom_bbcodes();
		}

		// Generate smiley listing
		if ($smilies_status)
		{
			include(PHPBB3_INCLUDE_DIR . 'functions_posting.' . $phpEx);
			generate_smilies('inline', $forum_id);
		}

		if (!$post_data['enable_bbcode'])
		{
			$s_hidden_fields['disable_bbcode'] = false;
		}

		if (!$post_data['enable_smilies'])
		{
			$s_hidden_fields['disable_smilies'] = false;
		}

		if ($enable_quote)
		{
			$post_ids = array();
			$post_count = is_countable($last_posts) ? count($last_posts) : 0;
			foreach ($last_posts as $post_id => $last_post)
			{
				decode_message($last_post['post_text'], $last_post['bbcode_uid']);
				//$last_post['post_text'] = bbcode_nl2br($last_post['post_text']);
				$last_post['post_text'] = '[quote' . (empty($last_post['username']) ? '' : '="' . $last_post['username'] . '"') . ']' . $last_post['post_text'] . '[/quote]';
				$last_post['post_text'] = str_replace('"', '&quot;', $last_post['post_text']);
				$s_hidden_fields['quoted_post' . ($post_count > 1 ? $post_id : '')] = $last_post['post_text'];
				if ($post_count > 1)
				{
					$post_ids[] = $post_id;
				}
			}
			//unset($post_ids[0]);
		}
		$post_ids = empty($post_ids) ? '' : implode(', ', $post_ids);

		// Include after other includes so ours will take precedence in case of duplicates.
		$user->add_lang('mods/prime_quick_reply');

		// Assign template variables
		$template->assign_vars(array(
			'QUICK_REPLY_POST_ACTION'	=> $s_action,
			'QUICK_REPLY_ALLOWED'		=> $enable_reply,
			'QUICK_REPLY_SUBJECT'		=> ((str_starts_with($topic_data['topic_title'], 'Re: ')) ? '' : 'Re: ') . censor_text($topic_data['topic_title']),
			'QUICK_REPLY_SHOW_FORM'		=> $display_form,
			'QUICK_REPLY_SHOW_OPTIONS'	=> $display_options,
			'QUICK_REPLY_SHOW_SUBJECT'	=> $display_subject,
			'QUICK_REPLY_SHOW_BBCODES'	=> $display_bbcodes,
			'QUICK_REPLY_SHOW_SMILIES'	=> $display_smilies,
			'QUICK_REPLY_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields),
			'QUICK_REPLY_POST_IDS'		=> $post_ids,
			'QUICK_REPLY_COOKIE_NAME'	=> empty($cookie_name) ? '' : $cookie_name,

			'S_QUOTE_ALLOWED'			=> $enable_quote,
			'S_SUBJECT_ALLOWED'			=> $enable_subject,
			'S_BBCODE_ALLOWED'			=> $bbcode_status,
			'S_BBCODES_ALLOWED'			=> $bbcode_status,
			'S_BBCODES_CHECKED'			=> ($bbcode_checked) ? ' checked="checked"' : '',
			'S_SMILIES_ALLOWED'			=> $smilies_status,
			'S_SMILIES_CHECKED'			=> ($smilies_checked) ? ' checked="checked"' : '',
			'S_SIG_ALLOWED'				=> ($auth->acl_get('f_sigs', $forum_id) && $config['allow_sig'] && $user->data['is_registered']) ? true : false,
			'S_SIGNATURE_CHECKED'		=> ($sig_checked) ? ' checked="checked"' : '',
			'S_NOTIFY_ALLOWED'			=> ($user->data['is_registered'] && $config['allow_topic_notify'] && $config['email_enable']),
			'S_NOTIFY_CHECKED'			=> ($notify_checked) ? ' checked="checked"' : '',
			'S_LINKS_ALLOWED'			=> $url_status,
			'S_MAGIC_URL_CHECKED'		=> ($urls_checked) ? ' checked="checked"' : '',
			'S_LOCK_TOPIC_ALLOWED'		=> (($auth->acl_get('m_lock', $forum_id) || ($auth->acl_get('f_user_lock', $forum_id) && $user->data['is_registered'] && !empty($topic_data['topic_poster']) && $user->data['user_id'] == $topic_data['topic_poster'] && $topic_data['topic_status'] == PHPBB3_ITEM_UNLOCKED))) ? true : false,
			'S_LOCK_TOPIC_CHECKED'		=> ($lock_topic_checked) ? ' checked="checked"' : '',

			// For posting_buttons.html
			'S_BBCODE_IMG'				=> $img_status,
			'S_BBCODE_URL'				=> $url_status,
			'S_BBCODE_FLASH'			=> $flash_status,
			'S_BBCODE_QUOTE'			=> $quote_status,
		));
	}
}

?>
