<?php
/***************************************************************************
 *                            usercp_register.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: usercp_register.php,v 1.20.2.76 2006/05/30 19:29:43 grahamje Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

/*

	This code has been modified from its original form by psoTFX @ phpbb.com
	Changes introduce the back-ported phpBB 2.2 visual confirmation code. 

	NOTE: Anyone using the modified code contained within this script MUST include
	a relevant message such as this in usercp_register.php ... failure to do so 
	will affect a breach of Section 2a of the GPL and our copyright

	png visual confirmation system : (c) phpBB Group, 2003 : All Rights Reserved

*/

/* Applied rules:
 * WhileEachToForeachRector
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * TernaryToNullCoalescingRector
 * WrapVariableVariableNameInCurlyBracesRector (https://www.php.net/manual/en/language.variables.variable.php)
 * ListToArrayDestructRector (https://wiki.php.net/rfc/short_list_syntax https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring)
 * SetCookieRector (https://www.php.net/setcookie https://wiki.php.net/rfc/same-site-cookie)
 * NullToStrictStringFuncCallArgRector
 */
 
if ( !defined('IN_PHPBB') )
{
        die("Hacking attempt");
        exit;
}

$unhtml_specialchars_match = array('#&gt;#', '#&lt;#', '#&quot;#', '#&amp;#');
$unhtml_specialchars_replace = array('>', '<', '"', '&');

// ---------------------------------------
// Load agreement template since user has not yet
// agreed to registration conditions/coppa
//
function show_coppa()
{
        global $userdata, $template, $lang, $phpbb_root_path, $phpEx;

        $template->set_filenames(array(
                'body' => 'agreement.tpl')
        );

        $template->assign_vars(array(
                'REGISTRATION' => $lang['Registration'],
                'AGREEMENT' => $lang['Reg_agreement'],
                "AGREE_OVER_13" => $lang['Agree_over_13'],
                "AGREE_UNDER_13" => $lang['Agree_under_13'],
                'DO_NOT_AGREE' => $lang['Agree_not'],

                "U_AGREE_OVER13" => append_sid("profile.$phpEx?mode=register&amp;agreed=true"),
                "U_AGREE_UNDER13" => append_sid("profile.$phpEx?mode=register&amp;agreed=true&amp;coppa=true"))
        );

        $template->pparse('body');

}
//
// ---------------------------------------

$error = FALSE;
$error_msg = '';
$page_title = ( $mode == 'editprofile' ) ? $lang['Edit_profile'] : $lang['Register'];

if ( $mode == 'register' && !isset($_POST['agreed']) && !isset($_GET['agreed']) )
{
        include("modules/Forums/includes/page_header.php");

        show_coppa();

        include("modules/Forums/includes/page_tail.php");
}

$coppa = ( empty($_POST['coppa']) && empty($_GET['coppa']) ) ? 0 : TRUE;

//
// Check and initialize some variables if needed
//
if (
        isset($_POST['submit']) ||
        isset($_POST['avatargallery']) ||
        isset($_POST['submitavatar']) ||
        isset($_POST['cancelavatar']) ||
        $mode == 'register' )
{
        include("modules/Forums/includes/functions_validate.php");
        include("modules/Forums/includes/bbcode.php");
        include("modules/Forums/includes/functions_post.php");

        if ( $mode == 'editprofile' )
        {
                $user_id = intval($_POST['user_id']);
                $current_email = trim(htmlspecialchars((string) $_POST['current_email']));
        }

	$strip_var_list = array('email' => 'email', 'icq' => 'icq', 'aim' => 'aim', 'msn' => 'msn', 'yim' => 'yim', 'website' => 'website', 'location' => 'location', 'occupation' => 'occupation', 'interests' => 'interests', 'confirm_code' => 'confirm_code');

        // Strip all tags from data ... may p**s some people off, bah, strip_tags is
        // doing the job but can still break HTML output ... have no choice, have
        // to use htmlspecialchars ... be prepared to be moaned at.
        // while( [$var, $param] = each($strip_var_list) ) maybe ghost
		foreach ($strip_var_list as $var => $param)
        {
                if ( !empty($_POST[$param]) )
                {
                        ${$var} = trim((string) htmlspecialchars((string) $_POST[$param]));
                }
        }

	$username = ( !empty($_POST['username']) ) ? phpbb_clean_username($_POST['username']) : '';

        $trim_var_list = array('cur_password' => 'cur_password', 'new_password' => 'new_password', 'password_confirm' => 'password_confirm', 'signature' => 'signature');

        //while( [$var, $param] = each($trim_var_list) )
		foreach ($trim_var_list as $var => $param)
        {
                if ( !empty($_POST[$param]) )
                {
                        ${$var} = trim((string) $_POST[$param]);
                }
        }

	$signature = (isset($signature)) ? str_replace('<br />', "\n", (string) $signature) : '';
	$signature_bbcode_uid = '';

        // Run some validation on the optional fields. These are pass-by-ref, so they'll be changed to
        // empty strings if they fail.
        validate_optional_fields($icq, $aim, $msn, $yim, $website, $location, $occupation, $interests, $signature);

        $viewemail = ( isset($_POST['viewemail']) ) ? ( ($_POST['viewemail']) ? TRUE : 0 ) : 0;
        $allowviewonline = ( isset($_POST['hideonline']) ) ? ( ($_POST['hideonline']) ? 0 : TRUE ) : TRUE;
        $notifyreply = ( isset($_POST['notifyreply']) ) ? ( ($_POST['notifyreply']) ? TRUE : 0 ) : 0;
        $notifypm = ( isset($_POST['notifypm']) ) ? ( ($_POST['notifypm']) ? TRUE : 0 ) : TRUE;
        $popup_pm = ( isset($_POST['popup_pm']) ) ? ( ($_POST['popup_pm']) ? TRUE : 0 ) : TRUE;

        if ( $mode == 'register' )
        {
		$attachsig = ( isset($_POST['attachsig']) ) ? ( ($_POST['attachsig']) ? TRUE : 0 ) : $board_config['allow_sig'];

		$allowhtml = ( isset($_POST['allowhtml']) ) ? ( ($_POST['allowhtml']) ? TRUE : 0 ) : $board_config['allow_html'];
		$allowbbcode = ( isset($_POST['allowbbcode']) ) ? ( ($_POST['allowbbcode']) ? TRUE : 0 ) : $board_config['allow_bbcode'];
		$allowsmilies = ( isset($_POST['allowsmilies']) ) ? ( ($_POST['allowsmilies']) ? TRUE : 0 ) : $board_config['allow_smilies'];
        }
        else
        {
                $attachsig = ( isset($_POST['attachsig']) ) ? ( ($_POST['attachsig']) ? TRUE : 0 ) : $userdata['user_attachsig'];

		$allowhtml = ( isset($_POST['allowhtml']) ) ? ( ($_POST['allowhtml']) ? TRUE : 0 ) : $userdata['user_allowhtml'];
		$allowbbcode = ( isset($_POST['allowbbcode']) ) ? ( ($_POST['allowbbcode']) ? TRUE : 0 ) : $userdata['user_allowbbcode'];
		$allowsmilies = ( isset($_POST['allowsmilies']) ) ? ( ($_POST['allowsmilies']) ? TRUE : 0 ) : $userdata['user_allowsmile'];
        }

        $nuke_user_style = ( isset($_POST['style']) ) ? intval($_POST['style']) : $board_config['default_style'];

        if ( !empty($_POST['language']) )
        {
                if ( preg_match('/^[a-z_]+$/i', (string) $_POST['language']) )
                {
                        $nuke_user_lang = htmlspecialchars((string) $_POST['language']);
                }
                else
                {
                        $error = true;
                        $error_msg = $lang['Fields_empty'];
                }
        }
        else
        {
                $nuke_user_lang = $board_config['default_lang'];
        }

        $nuke_user_timezone = ( isset($_POST['timezone']) ) ? doubleval($_POST['timezone']) : $board_config['board_timezone'];

	$sql = "SELECT config_value
		FROM " . CONFIG_TABLE . "
		WHERE config_name = 'default_dateformat'";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not select default dateformat', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);
	$board_config['default_dateformat'] = $row['config_value'];
        $nuke_user_dateformat = ( !empty($_POST['dateformat']) ) ? trim(htmlspecialchars((string) $_POST['dateformat'])) : $board_config['default_dateformat'];

        $user_avatar_local = ( isset($_POST['avatarselect']) && !empty($_POST['submitavatar']) && $board_config['allow_avatar_local'] ) ? htmlspecialchars((string) $_POST['avatarselect']) : ( ( isset($_POST['avatarlocal'])  ) ? htmlspecialchars((string) $_POST['avatarlocal']) : '' );
        $user_avatar_category = ( isset($_POST['avatarcatname']) && $board_config['allow_avatar_local'] ) ? htmlspecialchars((string) $_POST['avatarcatname']) : '' ;

        $user_avatar_remoteurl = ( !empty($_POST['avatarremoteurl']) ) ? trim(htmlspecialchars((string) $_POST['avatarremoteurl'])) : '';
        $user_avatar_upload = ( !empty($_POST['avatarurl']) ) ? trim((string) $_POST['avatarurl']) : ( ( $_FILES['avatar']['tmp_name'] != "none") ? $_FILES['avatar']['tmp_name'] : '' );
        $user_avatar_name = ( !empty($_FILES['avatar']['name']) ) ? $_FILES['avatar']['name'] : '';
        $user_avatar_size = ( !empty($_FILES['avatar']['size']) ) ? $_FILES['avatar']['size'] : 0;
        $user_avatar_filetype = ( !empty($_FILES['avatar']['type']) ) ? $_FILES['avatar']['type'] : '';

        $user_avatar = ( empty($user_avatar_local) && $mode == 'editprofile' ) ? $userdata['user_avatar'] : '';
        $nuke_user_avatar_type = ( empty($user_avatar_local) && $mode == 'editprofile' ) ? $userdata['nuke_user_avatar_type'] : '';

        if ( (isset($_POST['avatargallery']) || isset($_POST['submitavatar']) || isset($_POST['cancelavatar'])) && (!isset($_POST['submit'])) )
        {
                $username = stripslashes((string) $username);
                $email = stripslashes((string) $email);
                $cur_password = htmlspecialchars(stripslashes((string) $cur_password));
                $new_password = htmlspecialchars(stripslashes((string) $new_password));
                $password_confirm = htmlspecialchars(stripslashes((string) $password_confirm));

                $icq = stripslashes((string) $icq);
                $aim = stripslashes((string) $aim);
                $msn = stripslashes((string) $msn);
                $yim = stripslashes((string) $yim);

                $website = stripslashes((string) $website);
                $location = stripslashes((string) $location);
                $occupation = stripslashes((string) $occupation);
                $interests = stripslashes((string) $interests);
                $signature = htmlspecialchars(stripslashes($signature));

                $nuke_user_lang = stripslashes((string) $nuke_user_lang);
                $nuke_user_dateformat = stripslashes((string) $nuke_user_dateformat);

                if ( !isset($_POST['cancelavatar']))
                {
                        $user_avatar = $user_avatar_category . '/' . $user_avatar_local;
                        $nuke_user_avatar_type = USER_AVATAR_GALLERY;
                }
        }
}

//
// Let's make sure the user isn't logged in while registering,
// and ensure that they were trying to register a second time
// (Prevents double registrations)
//
if ($mode == 'register' && ($userdata['session_logged_in'] || $username == $userdata['username']))
{
        message_die(GENERAL_MESSAGE, $lang['Username_taken'], '', __LINE__, __FILE__);
}

//
// Did the user submit? In this case build a query to update the users profile in the DB
//
if ( isset($_POST['submit']) )
{
        include("modules/Forums/includes/usercp_avatar.php");

        $passwd_sql = '';
        if ( $mode == 'editprofile' )
        {
                if ( $user_id != $userdata['user_id'] )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Wrong_Profile'];
                }
        }
        else if ( $mode == 'register' )
        {
                if ( empty($username) || empty($new_password) || empty($password_confirm) || empty($email) )
                {
                        $error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Fields_empty'];
		}
	}

	if ($board_config['enable_confirm'] && $mode == 'register')
	{
		if (empty($_POST['confirm_id']))
		{
			$error = TRUE;
			$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Confirm_code_wrong'];
		}
		else
		{
			$confirm_id = htmlspecialchars((string) $_POST['confirm_id']);
			if (!preg_match('/^[A-Za-z0-9]+$/', $confirm_id))
			{
				$confirm_id = '';
			}
			
			$sql = 'SELECT code 
				FROM ' . CONFIRM_TABLE . " 
				WHERE confirm_id = '$confirm_id' 
					AND session_id = '" . $userdata['session_id'] . "'";
			if (!($result = $db->sql_query($sql)))
			{
				message_die(GENERAL_ERROR, 'Could not obtain confirmation code', __LINE__, __FILE__, $sql);
			}

			if ($row = $db->sql_fetchrow($result))
			{
				if ($row['code'] != $confirm_code)
				{
					$error = TRUE;
					$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Confirm_code_wrong'];
				}
				else
				{
					$sql = 'DELETE FROM ' . CONFIRM_TABLE . " 
						WHERE confirm_id = '$confirm_id' 
							AND session_id = '" . $userdata['session_id'] . "'";
					if (!$db->sql_query($sql))
					{
						message_die(GENERAL_ERROR, 'Could not delete confirmation code', __LINE__, __FILE__, $sql);
					}
				}
			}
			else
			{		
				$error = TRUE;
				$error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Confirm_code_wrong'];
			}
			$db->sql_freeresult($result);
		}
	}

        $passwd_sql = '';
        if ( !empty($new_password) && !empty($password_confirm) )
        {
                if ( $new_password != $password_confirm )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
                }
                else if ( strlen((string) $new_password) > 32 )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_long'];
                }
                else
                {
                        if ( $mode == 'editprofile' )
                        {
                                $sql = "SELECT user_password
                                        FROM " . USERS_TABLE . "
					WHERE user_id = $user_id";
                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
                                }

                                $row = $db->sql_fetchrow($result);

                                if ( $row['user_password'] != md5((string) $cur_password) )
                                {
                                        $error = TRUE;
                                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Current_password_mismatch'];
                                }
                        }

                        if ( !$error )
                        {
                                $new_password = md5((string) $new_password);
                                $passwd_sql = "user_password = '$new_password', ";
                        }
                }
        }
        else if ( ( empty($new_password) && !empty($password_confirm) ) || ( !empty($new_password) && empty($password_confirm) ) )
        {
                $error = TRUE;
                $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
        }

        //
        // Do a ban check on this email address
        //
        if ( $email != $userdata['user_email'] || $mode == 'register' )
        {
                $result = validate_email($email);
                if ( $result['error'] )
                {
                        $email = $userdata['user_email'];

                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
                }

                if ( $mode == 'editprofile' )
                {
                        $sql = "SELECT user_password
                                FROM " . USERS_TABLE . "
				WHERE user_id = $user_id";
                        if ( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not obtain user_password information', '', __LINE__, __FILE__, $sql);
                        }

                        $row = $db->sql_fetchrow($result);

                        if ( $row['user_password'] != md5((string) $cur_password) )
                        {
                                $email = $userdata['user_email'];

                                $error = TRUE;
                                $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Current_password_mismatch'];
                        }
                }
        }

        $username_sql = '';
        if ( $board_config['allow_namechange'] || $mode == 'register' )
        {
                if ( empty($username) )
                {
                        // Error is already triggered, since one field is empty.
                        $error = TRUE;
                }
                else if ( $username != $userdata['username'] || $mode == 'register' )
                {
                        if (strtolower((string) $username) != strtolower((string) $userdata['username']) || $mode == 'register')
                        {
                                $result = validate_username($username);
                                if ( $result['error'] )
                                {
                                        $error = TRUE;
                                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
                                }
                        }

                        if (!$error)
                        {
                                $username_sql = "username = '" . str_replace("\'", "''", (string) $username) . "', ";
                        }
                }
        }

        if ( $signature != '' )
        {
                if ( strlen((string) $signature) > $board_config['max_sig_chars'] )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Signature_too_long'];
                }

                if ( !isset($signature_bbcode_uid) || $signature_bbcode_uid == '' )
                {
                        $signature_bbcode_uid = ( $allowbbcode ) ? make_bbcode_uid() : '';
                }
                $signature = prepare_message($signature, $allowhtml, $allowbbcode, $allowsmilies, $signature_bbcode_uid);
        }

        if ( $website != '' )
        {
                rawurlencode((string) $website);
        }

        $avatar_sql = '';

        if ( isset($_POST['avatardel']) && $mode == 'editprofile' )
        {
                $avatar_sql = user_avatar_delete($userdata['nuke_user_avatar_type'], $userdata['user_avatar']);
        }
        else
        if ( ( !empty($user_avatar_upload) || !empty($user_avatar_name) ) && $board_config['allow_avatar_upload'] )
        {
                if ( !empty($user_avatar_upload) )
                {
                        $avatar_mode = (empty($user_avatar_name)) ? 'remote' : 'local';
                        $avatar_sql = user_avatar_upload($mode, $avatar_mode, $userdata['user_avatar'], $userdata['nuke_user_avatar_type'], $error, $error_msg, $user_avatar_upload, $user_avatar_name, $user_avatar_size, $user_avatar_filetype);
                }
                else if ( !empty($user_avatar_name) )
                {
                        $l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

                        $error = true;
                        $error_msg .= ( ( !empty($error_msg) ) ? '<br />' : '' ) . $l_avatar_size;
                }
        }
        else if ( $user_avatar_remoteurl != '' && $board_config['allow_avatar_remote'] )
        {
                user_avatar_delete($userdata['nuke_user_avatar_type'], $userdata['user_avatar']);
                $avatar_sql = user_avatar_url($mode, $error, $error_msg, $user_avatar_remoteurl);
        }
        else if ( $user_avatar_local != '' && $board_config['allow_avatar_local'] )
        {
                user_avatar_delete($userdata['nuke_user_avatar_type'], $userdata['user_avatar']);
                $avatar_sql = user_avatar_gallery($mode, $error, $error_msg, $user_avatar_local, $user_avatar_category);
        }

        if ( !$error )
        {
                if ( $avatar_sql == '' )
                {
                        $avatar_sql = ( $mode == 'editprofile' ) ? '' : "'', " . USER_AVATAR_NONE;
                }

                if ( $mode == 'editprofile' )
                {
                        if ( $email != $userdata['user_email'] && $board_config['require_activation'] != USER_ACTIVATION_NONE && $userdata['user_level'] != ADMIN )
                        {
                                $user_active = 0;

                                $user_actkey = gen_rand_string(true);
                                $key_len = 54 - ( strlen((string) $server_url) );
                                $key_len = ( $key_len > 6 ) ? $key_len : 6;
                                $user_actkey = substr((string) $user_actkey, 0, $key_len);

                                if ( $userdata['session_logged_in'] )
                                {
					session_end($userdata['session_id'], $userdata['user_id']);
                                }
                        }
                        else
                        {
                                $user_active = 1;
                                $user_actkey = '';
                        }

                        $sql = "UPDATE " . USERS_TABLE . "
				SET " . $username_sql . $passwd_sql . "user_email = '" . str_replace("\'", "''", (string) $email) ."', user_icq = '" . str_replace("\'", "''", (string) $icq) . "', user_website = '" . str_replace("\'", "''", (string) $website) . "', user_occ = '" . str_replace("\'", "''", (string) $occupation) . "', user_from = '" . str_replace("\'", "''", (string) $location) . "', user_interests = '" . str_replace("\'", "''", (string) $interests) . "', nuke_user_sig = '" . str_replace("\'", "''", (string) $signature) . "', nuke_user_sig_bbcode_uid = '$signature_bbcode_uid', user_viewemail = $viewemail, user_aim = '" . str_replace("\'", "''", str_replace(' ', '+', (string) $aim)) . "', user_yim = '" . str_replace("\'", "''", (string) $yim) . "', user_msnm = '" . str_replace("\'", "''", (string) $msn) . "', user_attachsig = $attachsig, user_allowsmile = $allowsmilies, user_allowhtml = $allowhtml, user_allowbbcode = $allowbbcode, user_allow_viewonline = $allowviewonline, user_notify = $notifyreply, nuke_user_notify_pm = $notifypm, user_popup_pm = $popup_pm, nuke_user_timezone = $nuke_user_timezone, nuke_user_dateformat = '" . str_replace("\'", "''", (string) $nuke_user_dateformat) . "', nuke_user_lang = '" . str_replace("\'", "''", (string) $nuke_user_lang) . "', nuke_user_style = $nuke_user_style, user_active = $user_active, user_actkey = '" . str_replace("\'", "''", $user_actkey) . "'" . $avatar_sql . "
				WHERE user_id = $user_id";
                        if ( !($result = $db->sql_query($sql)) )
                        {
				message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql);
			}

			// We remove all stored login keys since the password has been updated
			// and change the current one (if applicable)
			if ( !empty($passwd_sql) )
			{
				session_reset_keys($user_id, $user_ip);
			}

			if ( !$user_active )
			{
				//
				// The users account has been deactivated, send them an email with a new activation key
				//
				include("modules/Forums/includes/emailer.php");
				$emailer = new emailer($board_config['smtp_delivery']);

 				if ( $board_config['require_activation'] != USER_ACTIVATION_ADMIN )
 				{
 					$emailer->from($board_config['board_email']);
 					$emailer->replyto($board_config['board_email']);

 					$emailer->use_template('user_activate', stripslashes((string) $nuke_user_lang));
 					$emailer->email_address($email);
 					$emailer->set_subject($lang['Reactivate']);

 					$emailer->assign_vars(array(
 						'SITENAME' => $board_config['sitename'],
 						'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", (string) $username), 0, 25)),
 						'EMAIL_SIG' => (!empty($board_config['board_email_sig'])) ? str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']) : '',

 						'U_ACTIVATE' => $server_url . '&mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
 					);
 					$emailer->send();
 					$emailer->reset();
 				}
 				else if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
 				{
 					$sql = 'SELECT user_email, nuke_user_lang 
 						FROM ' . USERS_TABLE . '
 						WHERE user_level = ' . ADMIN;

 					if ( !($result = $db->sql_query($sql)) )
 					{
 						message_die(GENERAL_ERROR, 'Could not select Administrators', '', __LINE__, __FILE__, $sql);
 					}

 					while ($row = $db->sql_fetchrow($result))
 					{
 						$emailer->from($board_config['board_email']);
 						$emailer->replyto($board_config['board_email']);

 						$emailer->email_address(trim((string) $row['user_email']));
 						$emailer->use_template("admin_activate", $row['nuke_user_lang']);
 						$emailer->set_subject($lang['Reactivate']);

 						$emailer->assign_vars(array(
 							'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", (string) $username), 0, 25)),
 							'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

 							'U_ACTIVATE' => $server_url . '&mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
 						);
 						$emailer->send();
 						$emailer->reset();
 					}
 					$db->sql_freeresult($result);
 				}

				$message = $lang['Profile_updated_inactive'] . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("index.$phpEx") . '">', '</a>');
			}
			else
			{
				$message = $lang['Profile_updated'] . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("index.$phpEx") . '">', '</a>');
                        }

//                            $template->assign_vars(array(
//                        "META" => '<meta http-equiv="refresh" content="5;url=' . append_sid("index.$phpEx") . '">')
//                        );

                        message_die(GENERAL_MESSAGE, $message);
                }
                else
                {
                        $sql = "SELECT MAX(user_id) AS total
                                FROM " . USERS_TABLE;
                        if ( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not obtain next user_id information', '', __LINE__, __FILE__, $sql);
                        }

                        if ( !($row = $db->sql_fetchrow($result)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not obtain next user_id information', '', __LINE__, __FILE__, $sql);
                        }
                        $user_id = $row['total'] + 1;

                        //
                        // Get current date
                        //
                        $reg_date = date("M d, Y");
			$sql = "INSERT INTO " . USERS_TABLE . "	(user_id, username, nuke_user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, nuke_user_sig, nuke_user_sig_bbcode_uid, user_avatar, nuke_user_avatar_type, user_viewemail, user_aim, user_yim, user_msnm, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_viewonline, user_notify, nuke_user_notify_pm, user_popup_pm, nuke_user_timezone, nuke_user_dateformat, nuke_user_lang, nuke_user_style, user_level, user_allow_pm, user_active, user_actkey)
				VALUES ($user_id, '" . str_replace("\'", "''", (string) $username) . "', " . time() . ", '" . str_replace("\'", "''", (string) $new_password) . "', '" . str_replace("\'", "''", (string) $email) . "', '" . str_replace("\'", "''", (string) $icq) . "', '" . str_replace("\'", "''", (string) $website) . "', '" . str_replace("\'", "''", (string) $occupation) . "', '" . str_replace("\'", "''", (string) $location) . "', '" . str_replace("\'", "''", (string) $interests) . "', '" . str_replace("\'", "''", (string) $signature) . "', '$signature_bbcode_uid', $avatar_sql, $viewemail, '" . str_replace("\'", "''", str_replace(' ', '+', (string) $aim)) . "', '" . str_replace("\'", "''", (string) $yim) . "', '" . str_replace("\'", "''", (string) $msn) . "', $attachsig, $allowsmilies, $allowhtml, $allowbbcode, $allowviewonline, $notifyreply, $notifypm, $popup_pm, $nuke_user_timezone, $reg_date, '" . str_replace("\'", "''", (string) $nuke_user_lang) . "', $nuke_user_style, 0, 1, ";
                        if ( $board_config['require_activation'] == USER_ACTIVATION_SELF || $board_config['require_activation'] == USER_ACTIVATION_ADMIN || $coppa )
                        {
                                $user_actkey = gen_rand_string(true);
                                $key_len = 54 - (strlen((string) $server_url));
                                $key_len = ( $key_len > 6 ) ? $key_len : 6;
                                $user_actkey = substr((string) $user_actkey, 0, $key_len);
                                $sql .= "0, '" . str_replace("\'", "''", $user_actkey) . "')";
                        }
                        else
                        {
                                $sql .= "1, '')";
                        }

                        if ( !($result = $db->sql_query($sql, BEGIN_TRANSACTION)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not insert data into users table', '', __LINE__, __FILE__, $sql);
                        }

                        $sql = "INSERT INTO " . GROUPS_TABLE . " (group_name, group_description, group_single_user, group_moderator)
				VALUES ('', 'Personal User', 1, 0)";
                        if ( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not insert data into groups table', '', __LINE__, __FILE__, $sql);
                        }

                        $nuke_group_id = $db->sql_nextid();

                        $sql = "INSERT INTO " . USER_GROUP_TABLE . " (user_id, nuke_group_id, user_pending)
				VALUES ($user_id, $nuke_group_id, 0)";
                        if( !($result = $db->sql_query($sql, END_TRANSACTION)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not insert data into user_group table', '', __LINE__, __FILE__, $sql);
                        }

                        if ( $coppa )
                        {
                                $message = $lang['COPPA'];
                                $email_template = 'coppa_welcome_inactive';
                        }
                        else if ( $board_config['require_activation'] == USER_ACTIVATION_SELF )
                        {
                                $message = $lang['Account_inactive'];
                                $email_template = 'user_welcome_inactive';
                        }
                        else if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
                        {
                                $message = $lang['Account_inactive_admin'];
                                $email_template = 'admin_welcome_inactive';
                        }
                        else
                        {
                                $message = $lang['Account_added'];
                                $email_template = 'user_welcome';
                        }

                        include("modules/Forums/includes/emailer.php");
                        $emailer = new emailer($board_config['smtp_delivery']);

                        $emailer->from($board_config['board_email']);
                        $emailer->replyto($board_config['board_email']);

                        $emailer->use_template($email_template, stripslashes((string) $nuke_user_lang));
                        $emailer->email_address($email);
                        $emailer->set_subject(sprintf($lang['Welcome_subject'], $board_config['sitename']));

                        if( $coppa )
                        {
                                $emailer->assign_vars(array(
                                        'SITENAME' => $board_config['sitename'],
                                        'WELCOME_MSG' => sprintf($lang['Welcome_subject'], $board_config['sitename']),
                                        'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", (string) $username), 0, 25)),
                                        'PASSWORD' => $password_confirm,
                                        'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

                                        'FAX_INFO' => $board_config['coppa_fax'],
                                        'MAIL_INFO' => $board_config['coppa_mail'],
                                        'EMAIL_ADDRESS' => $email,
                                        'ICQ' => $icq,
                                        'AIM' => $aim,
                                        'YIM' => $yim,
                                        'MSN' => $msn,
                                        'WEB_SITE' => $website,
                                        'FROM' => $location,
                                        'OCC' => $occupation,
                                        'INTERESTS' => $interests,
                                        'SITENAME' => $board_config['sitename']));
                        }
                        else
                        {
                                $emailer->assign_vars(array(
                                        'SITENAME' => $board_config['sitename'],
                                        'WELCOME_MSG' => sprintf($lang['Welcome_subject'], $board_config['sitename']),
                                        'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", (string) $username), 0, 25)),
                                        'PASSWORD' => $password_confirm,
                                        'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

                                        'U_ACTIVATE' => $server_url . '&mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
                                );
                        }

                        $emailer->send();
                        $emailer->reset();

                        if ( $board_config['require_activation'] == USER_ACTIVATION_ADMIN )
                        {
                                $sql = "SELECT user_email, nuke_user_lang
                                        FROM " . USERS_TABLE . "
                                        WHERE user_level = " . ADMIN;

                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not select Administrators', '', __LINE__, __FILE__, $sql);
                                }

                                while ($row = $db->sql_fetchrow($result))
                                {
					$emailer->from($board_config['board_email']);
					$emailer->replyto($board_config['board_email']);

					$emailer->email_address(trim((string) $row['user_email']));
					$emailer->use_template("admin_activate", $row['nuke_user_lang']);
					$emailer->set_subject($lang['New_account_subject']);

					$emailer->assign_vars(array(
                                        'USERNAME' => preg_replace($unhtml_specialchars_match, $unhtml_specialchars_replace, substr(str_replace("\'", "'", (string) $username), 0, 25)),
                                        'EMAIL_SIG' => str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']),

                                        'U_ACTIVATE' => $server_url . '&mode=activate&' . POST_USERS_URL . '=' . $user_id . '&act_key=' . $user_actkey)
                                );
                                $emailer->send();
                                $emailer->reset();
                        }
				$db->sql_freeresult($result);
			}

                        $message = $message . '<br /><br />' . sprintf($lang['Click_return_index'],  '<a href="' . append_sid("index.$phpEx") . '">', '</a>');

                        message_die(GENERAL_MESSAGE, $message);
                } // if mode == register
        }
} // End of submit


if ( $error )
{
        //
        // If an error occured we need to stripslashes on returned data
        //
        $username = stripslashes((string) $username);
        $email = stripslashes((string) $email);
	$cur_password = '';
        $new_password = '';
        $password_confirm = '';

        $icq = stripslashes((string) $icq);
        $aim = str_replace('+', ' ', stripslashes((string) $aim));
        $msn = stripslashes((string) $msn);
        $yim = stripslashes((string) $yim);

        $website = stripslashes((string) $website);
        $location = stripslashes((string) $location);
        $occupation = stripslashes((string) $occupation);
        $interests = stripslashes((string) $interests);
        $signature = stripslashes((string) $signature);
        $signature = ($signature_bbcode_uid != '') ? preg_replace("/:(([a-z0-9]+:)?)$signature_bbcode_uid(=|\])/si", '\\3', $signature) : $signature;

        $nuke_user_lang = stripslashes((string) $nuke_user_lang);
        $nuke_user_dateformat = stripslashes((string) $nuke_user_dateformat);

}
else if ( $mode == 'editprofile' && !isset($_POST['avatargallery']) && !isset($_POST['submitavatar']) && !isset($_POST['cancelavatar']) )
{
        $user_id = $userdata['user_id'];
        $username = $userdata['username'];
        $email = $userdata['user_email'];
	$cur_password = '';
        $new_password = '';
        $password_confirm = '';

        $icq = $userdata['user_icq'];
        $aim = str_replace('+', ' ', (string) $userdata['user_aim']);
        $msn = $userdata['user_msnm'];
        $yim = $userdata['user_yim'];

        $website = $userdata['user_website'];
        $userdata['user_from'] = str_replace(".gif", "", (string) $userdata['user_from']);
        $location = $userdata['user_from'];
        $occupation = $userdata['user_occ'];
        $interests = $userdata['user_interests'];
        $signature_bbcode_uid = $userdata['nuke_user_sig_bbcode_uid'];
        $signature = ($signature_bbcode_uid != '') ? preg_replace("/:(([a-z0-9]+:)?)$signature_bbcode_uid(=|\])/si", '\\3', (string) $userdata['nuke_user_sig']) : $userdata['nuke_user_sig'];

        $viewemail = $userdata['user_viewemail'];
        $notifypm = $userdata['nuke_user_notify_pm'];
        $popup_pm = $userdata['user_popup_pm'];
        $notifyreply = $userdata['user_notify'];
        $attachsig = $userdata['user_attachsig'];
        $allowhtml = $userdata['user_allowhtml'];
        $allowbbcode = $userdata['user_allowbbcode'];
        $allowsmilies = $userdata['user_allowsmile'];
        $allowviewonline = $userdata['user_allow_viewonline'];

        $user_avatar = ( $userdata['user_allowavatar'] ) ? $userdata['user_avatar'] : '';
        $nuke_user_avatar_type = ( $userdata['user_allowavatar'] ) ? $userdata['nuke_user_avatar_type'] : USER_AVATAR_NONE;

        $nuke_user_style = $userdata['nuke_user_style'];
        $nuke_user_lang = $userdata['nuke_user_lang'];
        $nuke_user_timezone = $userdata['nuke_user_timezone'];
        $nuke_user_dateformat = $userdata['nuke_user_dateformat'];
}

//
// Default pages
//
include("modules/Forums/includes/page_header.php");

make_jumpbox('viewforum.'.$phpEx);

if ( $mode == 'editprofile' )
{
        if ( $user_id != $userdata['user_id'] )
        {
                $error = TRUE;
                $error_msg = $lang['Wrong_Profile'];
        }
}

if( isset($_POST['avatargallery']) && !$error )
{
        include("modules/Forums/includes/usercp_avatar.php");

	$avatar_category = ( !empty($_POST['avatarcategory']) ) ? htmlspecialchars((string) $_POST['avatarcategory']) : '';

        $template->set_filenames(array(
                'body' => 'profile_avatar_gallery.tpl')
        );

        $allowviewonline = !$allowviewonline;

        display_avatar_gallery($mode, $avatar_category, $user_id, $email, $current_email, $coppa, $username, $email, $new_password, $cur_password, $password_confirm, $icq, $aim, $msn, $yim, $website, $location, $occupation, $interests, $signature, $viewemail, $notifypm, $popup_pm, $notifyreply, $attachsig, $allowhtml, $allowbbcode, $allowsmilies, $allowviewonline, $nuke_user_style, $nuke_user_lang, $nuke_user_timezone, $nuke_user_dateformat, $userdata['session_id']);
}
else
{
        include("modules/Forums/includes/functions_selects.php");

        if ( !isset($coppa) )
        {
                $coppa = FALSE;
        }

        if ( !isset($nuke_user_style) )
        {
                $nuke_user_style = $board_config['default_style'];
        }

        $avatar_img = '';
        if ( $nuke_user_avatar_type )
        {
                switch( $nuke_user_avatar_type )
                {
                        case USER_AVATAR_UPLOAD:
                                $avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" />' : '';
                                break;
                        case USER_AVATAR_REMOTE:
                                $avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $user_avatar . '" alt="" />' : '';
                                break;
                        case USER_AVATAR_GALLERY:
                                $avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" />' : '';
                                break;
                }
        }

        $s_hidden_fields = '<input type="hidden" name="mode" value="' . $mode . '" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
        if( $mode == 'editprofile' )
        {
                $s_hidden_fields .= '<input type="hidden" name="user_id" value="' . $userdata['user_id'] . '" />';
                //
                // Send the users current email address. If they change it, and account activation is turned on
                // the user account will be disabled and the user will have to reactivate their account.
                //
                $s_hidden_fields .= '<input type="hidden" name="current_email" value="' . $userdata['user_email'] . '" />';
        }

        if ( !empty($user_avatar_local) )
        {
                $s_hidden_fields .= '<input type="hidden" name="avatarlocal" value="' . $user_avatar_local . '" /><input type="hidden" name="avatarcatname" value="' . $user_avatar_category . '" />';
        }

        $html_status =  ( $userdata['user_allowhtml'] && $board_config['allow_html'] ) ? $lang['HTML_is_ON'] : $lang['HTML_is_OFF'];
        $bbcode_status = ( $userdata['user_allowbbcode'] && $board_config['allow_bbcode']  ) ? $lang['BBCode_is_ON'] : $lang['BBCode_is_OFF'];
        $smilies_status = ( $userdata['user_allowsmile'] && $board_config['allow_smilies']  ) ? $lang['Smilies_are_ON'] : $lang['Smilies_are_OFF'];

        if ( $error )
        {
                $template->set_filenames(array(
                        'reg_header' => 'error_body.tpl')
                );
                $template->assign_vars(array(
                        'ERROR_MESSAGE' => $error_msg)
                );
                $template->assign_var_from_handle('ERROR_BOX', 'reg_header');
        }

        $template->set_filenames(array(
                'body' => 'profile_add_body.tpl')
        );

        if ( $mode == 'editprofile' )
        {
                $template->assign_block_vars('switch_edit_profile', array());
        }

        if ( ($mode == 'register') || ($board_config['allow_namechange']) )
        {
                $template->assign_block_vars('switch_namechange_allowed', array());
        }
        else
        {
                $template->assign_block_vars('switch_namechange_disallowed', array());
        }


	// Visual Confirmation
	$confirm_image = '';
	if (!empty($board_config['enable_confirm']) && $mode == 'register')
	{
		$sql = 'SELECT session_id 
			FROM ' . SESSIONS_TABLE; 
		if (!($result = $db->sql_query($sql)))
		{
			message_die(GENERAL_ERROR, 'Could not select session data', '', __LINE__, __FILE__, $sql);
		}

		if ($row = $db->sql_fetchrow($result))
		{
			$confirm_sql = '';
			do
			{
				$confirm_sql .= (($confirm_sql != '') ? ', ' : '') . "'" . $row['session_id'] . "'";
			}
			while ($row = $db->sql_fetchrow($result));
		
			$sql = 'DELETE FROM ' .  CONFIRM_TABLE . " 
				WHERE session_id NOT IN ($confirm_sql)";
			if (!$db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not delete stale confirm data', '', __LINE__, __FILE__, $sql);
			}
		}
		$db->sql_freeresult($result);

		$sql = 'SELECT COUNT(session_id) AS attempts 
			FROM ' . CONFIRM_TABLE . " 
			WHERE session_id = '" . $userdata['session_id'] . "'";
		if (!($result = $db->sql_query($sql)))
		{
			message_die(GENERAL_ERROR, 'Could not obtain confirm code count', '', __LINE__, __FILE__, $sql);
		}

		if ($row = $db->sql_fetchrow($result))
		{
			if ($row['attempts'] > 3)
			{
				message_die(GENERAL_MESSAGE, $lang['Too_many_registers']);
			}
		}
		$db->sql_freeresult($result);
		
		// Generate the required confirmation code
		// NB 0 (zero) could get confused with O (the letter) so we make change it
		$code = dss_rand();
		$code = substr(str_replace('0', 'Z', strtoupper(base_convert((string) $code, 16, 35))), 2, 6);

		$confirm_id = md5(uniqid((string) $user_ip));

		$sql = 'INSERT INTO ' . CONFIRM_TABLE . " (confirm_id, session_id, code) 
			VALUES ('$confirm_id', '". $userdata['session_id'] . "', '$code')";
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not insert new confirm code information', '', __LINE__, __FILE__, $sql);
		}

		unset($code);
		
		$confirm_image = (extension_loaded('zlib')) ? '<img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id") . '" alt="" title="" />' : '<img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=1") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=2") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=3") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=4") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=5") . '" alt="" title="" /><img src="' . append_sid("profile.$phpEx?mode=confirm&amp;id=$confirm_id&amp;c=6") . '" alt="" title="" />';
		$s_hidden_fields .= '<input type="hidden" name="confirm_id" value="' . $confirm_id . '" />';

		$template->assign_block_vars('switch_confirm', array());
	}


	//
        // Let's do an overall check for settings/versions which would prevent
        // us from doing file uploads....
        //
        $ini_val = ( phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';
        $form_enctype = ( $ini_val('file_uploads') == '0' || strtolower($ini_val('file_uploads') == 'off') || phpversion() == '4.0.4pl1' || !$board_config['allow_avatar_upload'] || ( phpversion() < '4.0.3' && $ini_val('open_basedir') != '' ) ) ? '' : 'enctype="multipart/form-data"';

        $template->assign_vars(array(
		'USERNAME' => $username ?? '',
		'CUR_PASSWORD' => $cur_password ?? '',
		'NEW_PASSWORD' => $new_password ?? '',
		'PASSWORD_CONFIRM' => $password_confirm ?? '',
		'EMAIL' => $email ?? '',
                'CONFIRM_IMG' => $confirm_image,
                'YIM' => $yim,
                'ICQ' => $icq,
                'MSN' => $msn,
                'AIM' => $aim,
                'OCCUPATION' => $occupation,
                'INTERESTS' => $interests,
                'LOCATION' => $location,
                'WEBSITE' => $website,
                'SIGNATURE' => str_replace('<br />', "\n", (string) $signature),
                'VIEW_EMAIL_YES' => ( $viewemail ) ? 'checked="checked"' : '',
                'VIEW_EMAIL_NO' => ( !$viewemail ) ? 'checked="checked"' : '',
                'HIDE_USER_YES' => ( !$allowviewonline ) ? 'checked="checked"' : '',
                'HIDE_USER_NO' => ( $allowviewonline ) ? 'checked="checked"' : '',
                'NOTIFY_PM_YES' => ( $notifypm ) ? 'checked="checked"' : '',
                'NOTIFY_PM_NO' => ( !$notifypm ) ? 'checked="checked"' : '',
                'POPUP_PM_YES' => ( $popup_pm ) ? 'checked="checked"' : '',
                'POPUP_PM_NO' => ( !$popup_pm ) ? 'checked="checked"' : '',
                'ALWAYS_ADD_SIGNATURE_YES' => ( $attachsig ) ? 'checked="checked"' : '',
                'ALWAYS_ADD_SIGNATURE_NO' => ( !$attachsig ) ? 'checked="checked"' : '',
                'NOTIFY_REPLY_YES' => ( $notifyreply ) ? 'checked="checked"' : '',
                'NOTIFY_REPLY_NO' => ( !$notifyreply ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_BBCODE_YES' => ( $allowbbcode ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_BBCODE_NO' => ( !$allowbbcode ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_HTML_YES' => ( $allowhtml ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_HTML_NO' => ( !$allowhtml ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_SMILIES_YES' => ( $allowsmilies ) ? 'checked="checked"' : '',
                'ALWAYS_ALLOW_SMILIES_NO' => ( !$allowsmilies ) ? 'checked="checked"' : '',
                'ALLOW_AVATAR' => $board_config['allow_avatar_upload'],
                'AVATAR' => $avatar_img,
                'AVATAR_SIZE' => $board_config['avatar_filesize'],
                'LANGUAGE_SELECT' => language_select($nuke_user_lang, 'language'),
                'STYLE_SELECT' => style_select($nuke_user_style, 'style'),
                'TIMEZONE_SELECT' => tz_select($nuke_user_timezone, 'timezone'),
                'DATE_FORMAT' => $nuke_user_dateformat,
                'HTML_STATUS' => $html_status,
                'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'),
                'SMILIES_STATUS' => $smilies_status,

                'L_CURRENT_PASSWORD' => $lang['Current_password'],
                'L_NEW_PASSWORD' => ( $mode == 'register' ) ? $lang['Password'] : $lang['New_password'],
                'L_CONFIRM_PASSWORD' => $lang['Confirm_password'],
                'L_CONFIRM_PASSWORD_EXPLAIN' => ( $mode == 'editprofile' ) ? $lang['Confirm_password_explain'] : '',
                'L_PASSWORD_IF_CHANGED' => ( $mode == 'editprofile' ) ? $lang['password_if_changed'] : '',
                'L_PASSWORD_CONFIRM_IF_CHANGED' => ( $mode == 'editprofile' ) ? $lang['password_confirm_if_changed'] : '',
                'L_SUBMIT' => $lang['Submit'],
                'L_RESET' => $lang['Reset'],
                'L_ICQ_NUMBER' => $lang['ICQ'],
                'L_MESSENGER' => $lang['MSNM'],
                'L_YAHOO' => $lang['YIM'],
                'L_WEBSITE' => $lang['Website'],
                'L_AIM' => $lang['AIM'],
                'L_LOCATION' => $lang['Location'],
                'L_OCCUPATION' => $lang['Occupation'],
                'L_BOARD_LANGUAGE' => $lang['Board_lang'],
                'L_BOARD_STYLE' => $lang['Board_style'],
                'L_TIMEZONE' => $lang['Timezone'],
                'L_DATE_FORMAT' => $lang['Date_format'],
                'L_DATE_FORMAT_EXPLAIN' => $lang['Date_format_explain'],
                'L_YES' => $lang['Yes'],
                'L_NO' => $lang['No'],
                'L_INTERESTS' => $lang['Interests'],
                'L_ALWAYS_ALLOW_SMILIES' => $lang['Always_smile'],
                'L_ALWAYS_ALLOW_BBCODE' => $lang['Always_bbcode'],
                'L_ALWAYS_ALLOW_HTML' => $lang['Always_html'],
                'L_HIDE_USER' => $lang['Hide_user'],
                'L_ALWAYS_ADD_SIGNATURE' => $lang['Always_add_sig'],

                'L_AVATAR_PANEL' => $lang['Avatar_panel'],
                'L_AVATAR_EXPLAIN' => sprintf($lang['Avatar_explain'], $board_config['avatar_max_width'], $board_config['avatar_max_height'], (round($board_config['avatar_filesize'] / 1024))),
                'L_UPLOAD_AVATAR_FILE' => $lang['Upload_Avatar_file'],
                'L_UPLOAD_AVATAR_URL' => $lang['Upload_Avatar_URL'],
                'L_UPLOAD_AVATAR_URL_EXPLAIN' => $lang['Upload_Avatar_URL_explain'],
                'L_AVATAR_GALLERY' => $lang['Select_from_gallery'],
                'L_SHOW_GALLERY' => $lang['View_avatar_gallery'],
                'L_LINK_REMOTE_AVATAR' => $lang['Link_remote_Avatar'],
                'L_LINK_REMOTE_AVATAR_EXPLAIN' => $lang['Link_remote_Avatar_explain'],
                'L_DELETE_AVATAR' => $lang['Delete_Image'],
                'L_CURRENT_IMAGE' => $lang['Current_Image'],

                'L_SIGNATURE' => $lang['Signature'],
                'L_SIGNATURE_EXPLAIN' => sprintf($lang['Signature_explain'], $board_config['max_sig_chars']),
                'L_NOTIFY_ON_REPLY' => $lang['Always_notify'],
                'L_NOTIFY_ON_REPLY_EXPLAIN' => $lang['Always_notify_explain'],
                'L_NOTIFY_ON_PRIVMSG' => $lang['Notify_on_privmsg'],
                'L_POPUP_ON_PRIVMSG' => $lang['Popup_on_privmsg'],
                'L_POPUP_ON_PRIVMSG_EXPLAIN' => $lang['Popup_on_privmsg_explain'],
                'L_PREFERENCES' => $lang['Preferences'],
                'L_PUBLIC_VIEW_EMAIL' => $lang['Public_view_email'],
                'L_ITEMS_REQUIRED' => $lang['Items_required'],
                'L_REGISTRATION_INFO' => $lang['Registration_info'],
                'L_PROFILE_INFO' => $lang['Profile_info'],
                'L_PROFILE_INFO_NOTICE' => $lang['Profile_info_warn'],
                'L_EMAIL_ADDRESS' => $lang['Email_address'],

                'L_CONFIRM_CODE_IMPAIRED' => sprintf($lang['Confirm_code_impaired'], '<a href="mailto:' . $board_config['board_email'] . '">', '</a>'),
                'L_CONFIRM_CODE' => $lang['Confirm_code'],
                'L_CONFIRM_CODE_EXPLAIN' => $lang['Confirm_code_explain'],

                'S_ALLOW_AVATAR_UPLOAD' => $board_config['allow_avatar_upload'],
                'S_ALLOW_AVATAR_LOCAL' => $board_config['allow_avatar_local'],
                'S_ALLOW_AVATAR_REMOTE' => $board_config['allow_avatar_remote'],
                'S_HIDDEN_FIELDS' => $s_hidden_fields,
                'S_FORM_ENCTYPE' => $form_enctype,
                'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
        );

        //
        // This is another cheat using the block_var capability
        // of the templates to 'fake' an IF...ELSE...ENDIF solution
        // it works well :)
        //
        if ( $mode != 'register' )
        {
                if ( $userdata['user_allowavatar'] && ( $board_config['allow_avatar_upload'] || $board_config['allow_avatar_local'] || $board_config['allow_avatar_remote'] ) )
                {
                        $template->assign_block_vars('switch_avatar_block', array() );

                        if ( $board_config['allow_avatar_upload'] && file_exists(phpbb_realpath('./' . $board_config['avatar_path'])) )
                        {
                                if ( $form_enctype != '' )
                                {
                                        $template->assign_block_vars('switch_avatar_block.switch_avatar_local_upload', array() );
                                }
                                $template->assign_block_vars('switch_avatar_block.switch_avatar_remote_upload', array() );
                        }

                        if ( $board_config['allow_avatar_remote'] )
                        {
                                $template->assign_block_vars('switch_avatar_block.switch_avatar_remote_link', array() );
                        }

                        if ( $board_config['allow_avatar_local'] && file_exists(phpbb_realpath('./' . $board_config['avatar_gallery_path'])) )
                        {
                                $template->assign_block_vars('switch_avatar_block.switch_avatar_local_gallery', array() );
                        }
                }
        }
}

function docookie($setuser_id, $setusername, $setuser_password, $setstorynum, $setumode, $setuorder, $setthold, $setnoscore, $setublockon, $settheme, $setcommentmax) {
    $info = base64_encode("$setuser_id:$setusername:$setuser_password:$setstorynum:$setumode:$setuorder:$setthold:$setnoscore:$setublockon:$settheme:$setcommentmax");
    setcookie("user","$info",['expires' => time()+15552000]);
}
$template->pparse('body');

include("modules/Forums/includes/page_tail.php");

