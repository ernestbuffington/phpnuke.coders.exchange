<?php

/***************************************************************************
 *                              admin_users.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: admin_users.php,v 1.57.2.35 2006/03/26 14:43:24 grahamje Exp $
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
 ***************************************************************************/

/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * EregToPregMatchRector (http://php.net/reference.pcre.pattern.posix https://stackoverflow.com/a/17033826/1348344 https://docstore.mik.ua/orelly/webprog/pcook/ch13_02.htm)
 * TernaryToNullCoalescingRector
 * CountOnNullRector (https://3v4l.org/Bndc9)
 * ListToArrayDestructRector (https://wiki.php.net/rfc/short_list_syntax https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring)
 * ListEachRector (https://wiki.php.net/rfc/deprecations_php_7_2#each)
 * WhileEachToForeachRector (https://wiki.php.net/rfc/deprecations_php_7_2#each)
 * NullToStrictStringFuncCallArgRector
 */
 
defined('IN_PHPBB') or define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
        $filename = basename(__FILE__);
        $module['Users']['Manage'] = $filename;

        return;
}

$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
require("../includes/bbcode.php");
require("../includes/functions_post.php");
require("../includes/functions_selects.php");
require("../includes/functions_validate.php");

$html_entities_match = array('#<#', '#>#');
$html_entities_replace = array('&lt;', '&gt;');

//
// Set mode
//
if( isset( $_POST['mode'] ) || isset( $_GET['mode'] ) )
{
        $mode = $_POST['mode'] ?? $_GET['mode'];
        $mode = htmlspecialchars((string) $mode);
}
else
{
        $mode = '';
}

//
// Begin program
//
if ( $mode == 'edit' || $mode == 'save' && ( isset($_POST['username']) || isset($_GET[POST_USERS_URL]) || isset( $_POST[POST_USERS_URL]) ) )
{
        //
        // Ok, the profile has been modified and submitted, let's update
        //
        if ( ( $mode == 'save' && isset( $_POST['submit'] ) ) || isset( $_POST['avatargallery'] ) || isset( $_POST['submitavatar'] ) || isset( $_POST['cancelavatar'] ) )
        {
                $user_id = intval($_POST['id']);

                if (!($this_userdata = get_userdata($user_id)))
                {
                        message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
                }

                if( $_POST['deleteuser'] && ( $userdata['user_id'] != $user_id ) )
                {
                        $sql = "SELECT g.nuke_group_id
                                FROM " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g
				WHERE ug.user_id = $user_id 
                                        AND g.nuke_group_id = ug.nuke_group_id
					AND g.group_single_user = 1";
                        if( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not obtain group information for this user', '', __LINE__, __FILE__, $sql);
                        }

                        $row = $db->sql_fetchrow($result);

                        $sql = "UPDATE " . POSTS_TABLE . "
				SET poster_id = " . DELETED . ", post_username = '" . str_replace("\\'", "''", addslashes((string) $this_userdata['username'])) . "' 
				WHERE poster_id = $user_id";
                        if( !$db->sql_query($sql) )
                        {
                                message_die(GENERAL_ERROR, 'Could not update posts for this user', '', __LINE__, __FILE__, $sql);
                        }

                        $sql = "UPDATE " . TOPICS_TABLE . "
                                SET topic_poster = " . DELETED . "
				WHERE topic_poster = $user_id";
                        if( !$db->sql_query($sql) )
                        {
                                message_die(GENERAL_ERROR, 'Could not update topics for this user', '', __LINE__, __FILE__, $sql);
                        }

                        $sql = "UPDATE " . VOTE_USERS_TABLE . "
                                SET vote_user_id = " . DELETED . "
				WHERE vote_user_id = $user_id";
                        if( !$db->sql_query($sql) )
                        {
                                message_die(GENERAL_ERROR, 'Could not update votes for this user', '', __LINE__, __FILE__, $sql);
                        }

                        $sql = "SELECT nuke_group_id
                                FROM " . GROUPS_TABLE . "
				WHERE group_moderator = $user_id";
                        if( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not select groups where user was moderator', '', __LINE__, __FILE__, $sql);
                        }

                        while ( $row_group = $db->sql_fetchrow($result) )
                        {
                                $group_moderator[] = $row_group['nuke_group_id'];
                        }

                        if ( is_countable($group_moderator) ? count($group_moderator) : 0 )
                        {
                                $update_moderator_id = implode(', ', $group_moderator);

                                $sql = "UPDATE " . GROUPS_TABLE . "
                                        SET group_moderator = " . $userdata['user_id'] . "
                                        WHERE group_moderator IN ($update_moderator_id)";
                                if( !$db->sql_query($sql) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not update group moderators', '', __LINE__, __FILE__, $sql);
                                }
                        }

                        $sql = "DELETE FROM " . USERS_TABLE . "
				WHERE user_id = $user_id";
                        if( !$db->sql_query($sql) )
                        {
                                message_die(GENERAL_ERROR, 'Could not delete user', '', __LINE__, __FILE__, $sql);
                        }

                        $sql = "DELETE FROM " . USER_GROUP_TABLE . "
				WHERE user_id = $user_id";
                        if( !$db->sql_query($sql) )
                        {
                                message_die(GENERAL_ERROR, 'Could not delete user from user_group table', '', __LINE__, __FILE__, $sql);
                        }

			$sql = "DELETE FROM " . GROUPS_TABLE . "
				WHERE nuke_group_id = " . $row['nuke_group_id'];
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete group for this user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . AUTH_ACCESS_TABLE . "
				WHERE nuke_group_id = " . $row['nuke_group_id'];
			if( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete group for this user', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . TOPICS_WATCH_TABLE . "
				WHERE user_id = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user from topic watch table', '', __LINE__, __FILE__, $sql);
			}
			
			$sql = "DELETE FROM " . BANLIST_TABLE . "
				WHERE ban_userid = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete user from banlist table', '', __LINE__, __FILE__, $sql);
			}

			$sql = "DELETE FROM " . SESSIONS_TABLE . "
				WHERE session_user_id = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete sessions for this user', '', __LINE__, __FILE__, $sql);
			}
			
			$sql = "DELETE FROM " . SESSIONS_KEYS_TABLE . "
				WHERE user_id = $user_id";
			if ( !$db->sql_query($sql) )
			{
				message_die(GENERAL_ERROR, 'Could not delete auto-login keys for this user', '', __LINE__, __FILE__, $sql);
			}

                        $sql = "SELECT privmsgs_id
                                FROM " . PRIVMSGS_TABLE . "
				WHERE privmsgs_from_userid = $user_id 
					OR privmsgs_to_userid = $user_id";
                        if ( !($result = $db->sql_query($sql)) )
                        {
                                message_die(GENERAL_ERROR, 'Could not select all users private messages', '', __LINE__, __FILE__, $sql);
                        }

                        // This little bit of code directly from the private messaging section.
                        while ( $row_privmsgs = $db->sql_fetchrow($result) )
                        {
                                $mark_list[] = $row_privmsgs['privmsgs_id'];
                        }

                        if ( is_countable($mark_list) ? count($mark_list) : 0 )
                        {
                                $delete_sql_id = implode(', ', $mark_list);

                                $delete_text_sql = "DELETE FROM " . PRIVMSGS_TEXT_TABLE . "
                                        WHERE privmsgs_text_id IN ($delete_sql_id)";
                                $delete_sql = "DELETE FROM " . PRIVMSGS_TABLE . "
                                        WHERE privmsgs_id IN ($delete_sql_id)";

                                if ( !$db->sql_query($delete_sql) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not delete private message info', '', __LINE__, __FILE__, $delete_sql);
                                }

                                if ( !$db->sql_query($delete_text_sql) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not delete private message text', '', __LINE__, __FILE__, $delete_text_sql);
                                }
                        }

                        $message = $lang['User_deleted'] . '<br /><br />' . sprintf($lang['Click_return_useradmin'], '<a href="' . append_sid("admin_users.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');

                        message_die(GENERAL_MESSAGE, $message);
                }

		$username = ( !empty($_POST['username']) ) ? phpbb_clean_username($_POST['username']) : '';
                $email = ( !empty($_POST['email']) ) ? trim(strip_tags(htmlspecialchars( (string) $_POST['email'] ) )) : '';

                $password = ( !empty($_POST['password']) ) ? trim(strip_tags(htmlspecialchars( (string) $_POST['password'] ) )) : '';
                $password_confirm = ( !empty($_POST['password_confirm']) ) ? trim(strip_tags(htmlspecialchars( (string) $_POST['password_confirm'] ) )) : '';

                $icq = ( !empty($_POST['icq']) ) ? trim(strip_tags( (string) $_POST['icq'] ) ) : '';
                $aim = ( !empty($_POST['aim']) ) ? trim(strip_tags( (string) $_POST['aim'] ) ) : '';
                $msn = ( !empty($_POST['msn']) ) ? trim(strip_tags( (string) $_POST['msn'] ) ) : '';
                $yim = ( !empty($_POST['yim']) ) ? trim(strip_tags( (string) $_POST['yim'] ) ) : '';

                $website = ( !empty($_POST['website']) ) ? trim(strip_tags( (string) $_POST['website'] ) ) : '';
                $location = ( !empty($_POST['location']) ) ? trim(strip_tags( (string) $_POST['location'] ) ) : '';
                $occupation = ( !empty($_POST['occupation']) ) ? trim(strip_tags( (string) $_POST['occupation'] ) ) : '';
                $interests = ( !empty($_POST['interests']) ) ? trim(strip_tags( (string) $_POST['interests'] ) ) : '';
                $signature = ( !empty($_POST['signature']) ) ? trim(str_replace('<br />', "\n", (string) $_POST['signature'] ) ) : '';

                validate_optional_fields($icq, $aim, $msn, $yim, $website, $location, $occupation, $interests, $signature);

                $viewemail = ( isset( $_POST['viewemail']) ) ? ( ( $_POST['viewemail'] ) ? TRUE : 0 ) : 0;
                $allowviewonline = ( isset( $_POST['hideonline']) ) ? ( ( $_POST['hideonline'] ) ? 0 : TRUE ) : TRUE;
                $notifyreply = ( isset( $_POST['notifyreply']) ) ? ( ( $_POST['notifyreply'] ) ? TRUE : 0 ) : 0;
                $notifypm = ( isset( $_POST['notifypm']) ) ? ( ( $_POST['notifypm'] ) ? TRUE : 0 ) : TRUE;
                $popuppm = ( isset( $_POST['popup_pm']) ) ? ( ( $_POST['popup_pm'] ) ? TRUE : 0 ) : TRUE;
                $attachsig = ( isset( $_POST['attachsig']) ) ? ( ( $_POST['attachsig'] ) ? TRUE : 0 ) : 0;

                $allowhtml = ( isset( $_POST['allowhtml']) ) ? intval( $_POST['allowhtml'] ) : $board_config['allow_html'];
                $allowbbcode = ( isset( $_POST['allowbbcode']) ) ? intval( $_POST['allowbbcode'] ) : $board_config['allow_bbcode'];
                $allowsmilies = ( isset( $_POST['allowsmilies']) ) ? intval( $_POST['allowsmilies'] ) : $board_config['allow_smilies'];

		$nuke_user_style = ( isset( $_POST['style'] ) ) ? intval( $_POST['style'] ) : $board_config['default_style'];
                $user_lang = ( $_POST['language'] ) ? $_POST['language'] : $board_config['default_lang'];
                $nuke_user_timezone = ( isset( $_POST['timezone']) ) ? doubleval( $_POST['timezone'] ) : $board_config['board_timezone'];
                $nuke_user_dateformat = ( $_POST['dateformat'] ) ? trim( (string) $_POST['dateformat'] ) : $board_config['default_dateformat'];

                $user_avatar_local = ( isset( $_POST['avatarselect'] ) && !empty($_POST['submitavatar'] ) && $board_config['allow_avatar_local'] ) ? $_POST['avatarselect'] : ( $_POST['avatarlocal'] ?? '' );
                $user_avatar_category = ( isset($_POST['avatarcatname']) && $board_config['allow_avatar_local'] ) ? htmlspecialchars((string) $_POST['avatarcatname']) : '' ;

                $user_avatar_remoteurl = ( !empty($_POST['avatarremoteurl']) ) ? trim( (string) $_POST['avatarremoteurl'] ) : '';
                $user_avatar_url = ( !empty($_POST['avatarurl']) ) ? trim( (string) $_POST['avatarurl'] ) : '';
                $user_avatar_loc = ( $_FILES['avatar']['tmp_name'] != "none") ? $_FILES['avatar']['tmp_name'] : '';
                $user_avatar_name = ( !empty($_FILES['avatar']['name']) ) ? $_FILES['avatar']['name'] : '';
                $user_avatar_size = ( !empty($_FILES['avatar']['size']) ) ? $_FILES['avatar']['size'] : 0;
                $user_avatar_filetype = ( !empty($_FILES['avatar']['type']) ) ? $_FILES['avatar']['type'] : '';

                $user_avatar = ( empty($user_avatar_loc) ) ? $this_userdata['user_avatar'] : '';
                $nuke_user_avatar_type = ( empty($user_avatar_loc) ) ? $this_userdata['nuke_user_avatar_type'] : '';

                $user_status = ( !empty($_POST['user_status']) ) ? intval( $_POST['user_status'] ) : 0;
                $user_allowpm = ( !empty($_POST['user_allowpm']) ) ? intval( $_POST['user_allowpm'] ) : 0;
                $nuke_user_rank = ( !empty($_POST['nuke_user_rank']) ) ? intval( $_POST['nuke_user_rank'] ) : 0;
                $user_allowavatar = ( !empty($_POST['user_allowavatar']) ) ? intval( $_POST['user_allowavatar'] ) : 0;

                if( isset( $_POST['avatargallery'] ) || isset( $_POST['submitavatar'] ) || isset( $_POST['cancelavatar'] ) )
                {
                        $username = stripslashes((string) $username);
                        $email = stripslashes($email);
                        $password = '';
                        $password_confirm = '';

                        $icq = stripslashes($icq);
                        $aim = htmlspecialchars(stripslashes($aim));
                        $msn = htmlspecialchars(stripslashes($msn));
                        $yim = htmlspecialchars(stripslashes($yim));

                        $website = htmlspecialchars(stripslashes($website));
                        $location = htmlspecialchars(stripslashes($location));
                        $occupation = htmlspecialchars(stripslashes($occupation));
                        $interests = htmlspecialchars(stripslashes($interests));
                        $signature = htmlspecialchars(stripslashes($signature));

                        $user_lang = stripslashes((string) $user_lang);
                        $nuke_user_dateformat = htmlspecialchars(stripslashes((string) $nuke_user_dateformat));

                        if ( !isset($_POST['cancelavatar']))
                        {
                                $user_avatar = $user_avatar_category . '/' . $user_avatar_local;
                                $nuke_user_avatar_type = USER_AVATAR_GALLERY;
                        }
                }
        }

        if( isset( $_POST['submit'] ) )
        {
                include("../includes/usercp_avatar.php");

                $error = FALSE;

                if (stripslashes((string) $username) != $this_userdata['username'])
                {
                        unset($rename_user);

                        if ( stripslashes(strtolower((string) $username)) != strtolower((string) $this_userdata['username']) )
                        {
                                $result = validate_username($username);
                                if ( $result['error'] )
                                {
                                        $error = TRUE;
                                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $result['error_msg'];
                                }
                                else if ( strtolower(str_replace("\\'", "''", (string) $username)) == strtolower((string) $userdata['username']) )
                                {
                                        $error = TRUE;
                                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Username_taken'];
                                }
                        }

                        if (!$error)
                        {
                                $username_sql = "username = '" . str_replace("\\'", "''", (string) $username) . "', ";
                                $rename_user = $username; // Used for renaming usergroup
                        }
                }

                $passwd_sql = '';
                if( !empty($password) && !empty($password_confirm) )
                {
                        //
                        // Awww, the user wants to change their password, isn't that cute..
                        //
                        if($password != $password_confirm)
                        {
                                $error = TRUE;
                                $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
                        }
                        else
                        {
                                $password = md5((string) $password);
                                $passwd_sql = "user_password = '$password', ";
                        }
                }
                else if( $password && !$password_confirm )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
                }
                else if( !$password && $password_confirm )
                {
                        $error = TRUE;
                        $error_msg .= ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Password_mismatch'];
                }

                if ($signature != '')
                {
                        $sig_length_check = preg_replace('/(\[.*?)(=.*?)\]/is', '\\1]', stripslashes((string) $signature));
                        if ( $allowhtml )
                        {
                                $sig_length_check = preg_replace('/(\<.*?)(=.*?)( .*?=.*?)?([ \/]?\>)/is', '\\1\\3\\4', $sig_length_check);
                        }

                        // Only create a new bbcode_uid when there was no uid yet.
                        if ( $signature_bbcode_uid == '' )
                        {
                                $signature_bbcode_uid = ( $allowbbcode ) ? make_bbcode_uid() : '';
                        }
                        $signature = prepare_message($signature, $allowhtml, $allowbbcode, $allowsmilies, $signature_bbcode_uid);

                        if ( strlen($sig_length_check) > $board_config['max_sig_chars'] )
                        {
                                $error = TRUE;
                                $error_msg .=  ( ( isset($error_msg) ) ? '<br />' : '' ) . $lang['Signature_too_long'];
                        }
                }

                //
                // Avatar stuff
                //
                $avatar_sql = "";
                if( isset($_POST['avatardel']) )
                {
                        if( $this_userdata['nuke_user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "" )
                        {
				if( file_exists(phpbb_realpath('./../' . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
				{
					unlink('./../' . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar']);
                                }
                        }
                        $avatar_sql = ", user_avatar = '', nuke_user_avatar_type = " . USER_AVATAR_NONE;
                }
                else if( ( $user_avatar_loc != "" || !empty($user_avatar_url) ) && !$error )
                {
                        //
                        // Only allow one type of upload, either a
                        // filename or a URL
                        //
                        if( !empty($user_avatar_loc) && !empty($user_avatar_url) )
                        {
                                $error = TRUE;
                                if( isset($error_msg) )
                                {
                                        $error_msg .= "<br />";
                                }
                                $error_msg .= $lang['Only_one_avatar'];
                        }

                        if( $user_avatar_loc != "" )
                        {
                                if( file_exists(phpbb_realpath($user_avatar_loc)) && preg_match('#.jpg$|.gif$|.png$#m', (string) $user_avatar_name) )
                                {
                                        if( $user_avatar_size <= $board_config['avatar_filesize'] && $user_avatar_size > 0)
                                        {
                                                $error_type = false;

                                                //
                                                // Opera appends the image name after the type, not big, not clever!
                                                //
                                                preg_match("'image\/[x\-]*([a-z]+)'", (string) $user_avatar_filetype, $user_avatar_filetype);
                                                $user_avatar_filetype = $user_avatar_filetype[1];

                                                switch( $user_avatar_filetype )
                                                {
                                                        case "jpeg":
                                                        case "pjpeg":
                                                        case "jpg":
                                                                $imgtype = '.jpg';
                                                                break;
                                                        case "gif":
                                                                $imgtype = '.gif';
                                                                break;
                                                        case "png":
                                                                $imgtype = '.png';
                                                                break;
                                                        default:
                                                                $error = true;
                                                                $error_msg = (!empty($error_msg)) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
                                                                break;
                                                }

                                                if( !$error )
                                                {
                                                        [$width, $height] = getimagesize($user_avatar_loc);

                                                        if( $width <= $board_config['avatar_max_width'] && $height <= $board_config['avatar_max_height'] )
                                                        {
                                                                $user_id = $this_userdata['user_id'];

                                                                $avatar_filename = $user_id . $imgtype;

                                                                if( $this_userdata['nuke_user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "" )
                                                                {
                                                                        if( file_exists(phpbb_realpath("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
                                                                        {
                                                                                unlink("./../" . $board_config['avatar_path'] . "/". $this_userdata['user_avatar']);
                                                                        }
                                                                }
                                                                copy($user_avatar_loc, "./../" . $board_config['avatar_path'] . "/$avatar_filename");

                                                                $avatar_sql = ", user_avatar = '$avatar_filename', nuke_user_avatar_type = " . USER_AVATAR_UPLOAD;
                                                        }
                                                        else
                                                        {
                                                                $l_avatar_size = sprintf($lang['Avatar_imagesize'], $board_config['avatar_max_width'], $board_config['avatar_max_height']);

                                                                $error = true;
                                                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
                                                        }
                                                }
                                        }
                                        else
                                        {
                                                $l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

                                                $error = true;
                                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
                                        }
                                }
                                else
                                {
                                        $error = true;
                                        $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
                                }
                        }
                        else if( !empty($user_avatar_url) )
                        {
                                //
                                // First check what port we should connect
                                // to, look for a :[xxxx]/ or, if that doesn't
                                // exist assume port 80 (http)
                                //
                                preg_match("/^(http:\/\/)?([\w\-\.]+)\:?([0-9]*)\/(.*)$/", (string) $user_avatar_url, $url_ary);

                                if( !empty($url_ary[4]) )
                                {
                                        $port = (!empty($url_ary[3])) ? $url_ary[3] : 80;

                                        $fsock = fsockopen($url_ary[2], $port, $errno, $errstr);
                                        if( $fsock )
                                        {
                                                $base_get = "/" . $url_ary[4];

                                                //
                                                // Uses HTTP 1.1, could use HTTP 1.0 ...
                                                //
                                                fputs($fsock, "GET $base_get HTTP/1.1\r\n");
                                                fputs($fsock, "HOST: " . $url_ary[2] . "\r\n");
                                                fputs($fsock, "Connection: close\r\n\r\n");

                                                unset($avatar_data);
                                                while( !feof($fsock) )
                                                {
                                                        $avatar_data .= fread($fsock, $board_config['avatar_filesize']);
                                                }
                                                fclose($fsock);

                                                if( preg_match("/Content-Length\: ([0-9]+)[^\/ ][\s]+/i", (string) $avatar_data, $file_data1) && preg_match("/Content-Type\: image\/[x\-]*([a-z]+)[\s]+/i", (string) $avatar_data, $file_data2) )
                                                {
                                                        $file_size = $file_data1[1];
                                                        $file_type = $file_data2[1];

                                                        switch( $file_type )
                                                        {
                                                                case "jpeg":
                                                                case "pjpeg":
                                                                case "jpg":
                                                                        $imgtype = '.jpg';
                                                                        break;
                                                                case "gif":
                                                                        $imgtype = '.gif';
                                                                        break;
                                                                case "png":
                                                                        $imgtype = '.png';
                                                                        break;
                                                                default:
                                                                        $error = true;
                                                                        $error_msg = (!empty($error_msg)) ? $error_msg . "<br />" . $lang['Avatar_filetype'] : $lang['Avatar_filetype'];
                                                                        break;
                                                        }

                                                        if( !$error && $file_size > 0 && $file_size < $board_config['avatar_filesize'] )
                                                        {
                                                                $avatar_data = substr((string) $avatar_data, strlen((string) $avatar_data) - $file_size, $file_size);

                                                                $tmp_filename = tempnam ("/tmp", $this_userdata['user_id'] . "-");
                                                                $fptr = fopen($tmp_filename, "wb");
                                                                $bytes_written = fwrite($fptr, $avatar_data, $file_size);
                                                                fclose($fptr);

                                                                if( $bytes_written == $file_size )
                                                                {
                                                                        [$width, $height] = getimagesize($tmp_filename);

                                                                        if( $width <= $board_config['avatar_max_width'] && $height <= $board_config['avatar_max_height'] )
                                                                        {
                                                                                $user_id = $this_userdata['user_id'];

                                                                                $avatar_filename = $user_id . $imgtype;

                                                                                if( $this_userdata['nuke_user_avatar_type'] == USER_AVATAR_UPLOAD && $this_userdata['user_avatar'] != "")
                                                                                {
                                                                                        if( file_exists(phpbb_realpath("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar'])) )
                                                                                        {
                                                                                                unlink("./../" . $board_config['avatar_path'] . "/" . $this_userdata['user_avatar']);
                                                                                        }
                                                                                }
                                                                                copy($tmp_filename, "./../" . $board_config['avatar_path'] . "/$avatar_filename");
                                                                                unlink($tmp_filename);

                                                                                $avatar_sql = ", user_avatar = '$avatar_filename', nuke_user_avatar_type = " . USER_AVATAR_UPLOAD;
                                                                        }
                                                                        else
                                                                        {
                                                                                $l_avatar_size = sprintf($lang['Avatar_imagesize'], $board_config['avatar_max_width'], $board_config['avatar_max_height']);

                                                                                $error = true;
                                                                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
                                                                        }
                                                                }
                                                                else
                                                                {
                                                                        //
                                                                        // Error writing file
                                                                        //
                                                                        unlink($tmp_filename);
                                                                        message_die(GENERAL_ERROR, "Could not write avatar file to local storage. Please contact the board administrator with this message", "", __LINE__, __FILE__);
                                                                }
                                                        }
                                                }
                                                else
                                                {
                                                        //
                                                        // No data
                                                        //
                                                        $error = true;
                                                        $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['File_no_data'] : $lang['File_no_data'];
                                                }
                                        }
                                        else
                                        {
                                                //
                                                // No connection
                                                //
                                                $error = true;
                                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['No_connection_URL'] : $lang['No_connection_URL'];
                                        }
                                }
                                else
                                {
                                        $error = true;
                                        $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Incomplete_URL'] : $lang['Incomplete_URL'];
                                }
                        }
                        else if( !empty($user_avatar_name) )
                        {
                                $l_avatar_size = sprintf($lang['Avatar_filesize'], round($board_config['avatar_filesize'] / 1024));

                                $error = true;
                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $l_avatar_size : $l_avatar_size;
                        }
                }
                else if( $user_avatar_remoteurl != "" && $avatar_sql == "" && !$error )
                {
                        if( !preg_match("#^http:\/\/#i", (string) $user_avatar_remoteurl) )
                        {
                                $user_avatar_remoteurl = "http://" . $user_avatar_remoteurl;
                        }

                        if( preg_match("#^(http:\/\/[a-z0-9\-]+?\.([a-z0-9\-]+\.)*[a-z]+\/.*?\.(gif|jpg|png)$)#is", (string) $user_avatar_remoteurl) )
                        {
                                $avatar_sql = ", user_avatar = '" . str_replace("\'", "''", (string) $user_avatar_remoteurl) . "', nuke_user_avatar_type = " . USER_AVATAR_REMOTE;
                        }
                        else
                        {
                                $error = true;
                                $error_msg = ( !empty($error_msg) ) ? $error_msg . "<br />" . $lang['Wrong_remote_avatar_format'] : $lang['Wrong_remote_avatar_format'];
                        }
                }
                else if( $user_avatar_local != "" && $avatar_sql == "" && !$error )
                {
                        $avatar_sql = ", user_avatar = '" . str_replace("\'", "''", phpbb_ltrim(basename((string) $user_avatar_category), "'") . '/' . phpbb_ltrim(basename((string) $user_avatar_local), "'")) . "', nuke_user_avatar_type = " . USER_AVATAR_GALLERY;
                }

                //
                // Update entry in DB
                //
                if( !$error )
                {
                        $sql = "UPDATE " . USERS_TABLE . "
                                SET " . $username_sql . $passwd_sql . "user_email = '" . str_replace("\'", "''", (string) $email) . "', user_icq = '" . str_replace("\'", "''", (string) $icq) . "', user_website = '" . str_replace("\'", "''", (string) $website) . "', user_occ = '" . str_replace("\'", "''", (string) $occupation) . "', user_from = '" . str_replace("\'", "''", (string) $location) . "', user_interests = '" . str_replace("\'", "''", (string) $interests) . "', nuke_user_sig = '" . str_replace("\'", "''", (string) $signature) . "', user_viewemail = $viewemail, user_aim = '" . str_replace("\'", "''", (string) $aim) . "', user_yim = '" . str_replace("\'", "''", (string) $yim) . "', user_msnm = '" . str_replace("\'", "''", (string) $msn) . "', user_attachsig = $attachsig, nuke_user_sig_bbcode_uid = '$signature_bbcode_uid', user_allowsmile = $allowsmilies, user_allowhtml = $allowhtml, user_allowavatar = $user_allowavatar, user_allowbbcode = $allowbbcode, user_allow_viewonline = $allowviewonline, user_notify = $notifyreply, user_allow_pm = $user_allowpm, nuke_user_notify_pm = $notifypm, user_popup_pm = $popuppm, user_lang = '" . str_replace("\'", "''", (string) $user_lang) . "', nuke_user_style = $nuke_user_style, nuke_user_timezone = $nuke_user_timezone, nuke_user_dateformat = '" . str_replace("\'", "''", (string) $nuke_user_dateformat) . "', user_active = $user_status, nuke_user_rank = $nuke_user_rank" . $avatar_sql . "
				WHERE user_id = $user_id";

                        if( $result = $db->sql_query($sql) )
                        {
                                if( isset($rename_user) )
                                {
                                        $sql = "UPDATE " . GROUPS_TABLE . "
                                                SET group_name = '".str_replace("\'", "''", (string) $rename_user)."'
                                                WHERE group_name = '".str_replace("'", "''", (string) $this_userdata['username'] )."'";
                                        if( !$result = $db->sql_query($sql) )
                                        {
                                                message_die(GENERAL_ERROR, 'Could not rename users group', '', __LINE__, __FILE__, $sql);
                                        }
                                }

                                // Delete user session, to prevent the user navigating the forum (if logged in) when disabled
                                if (!$user_status)
                                {
                                        $sql = "DELETE FROM " . SESSIONS_TABLE . "
                                                WHERE session_user_id = " . $user_id;

                                        if ( !$db->sql_query($sql) )
                                        {
                                                message_die(GENERAL_ERROR, 'Error removing user session', '', __LINE__, __FILE__, $sql);
                                        }
                                }

				// We remove all stored login keys since the password has been updated
				// and change the current one (if applicable)
				if ( !empty($passwd_sql) )
				{
					session_reset_keys($user_id, $user_ip);
				}
				
                                $message .= $lang['Admin_user_updated'];
                        }
                        else
                        {
				message_die(GENERAL_ERROR, 'Admin_user_fail', '', __LINE__, __FILE__, $sql);
                        }

                        $message .= '<br /><br />' . sprintf($lang['Click_return_useradmin'], '<a href="' . append_sid("admin_users.$phpEx") . '">', '</a>') . '<br /><br />' . sprintf($lang['Click_return_admin_index'], '<a href="' . append_sid("index.$phpEx?pane=right") . '">', '</a>');

                        message_die(GENERAL_MESSAGE, $message);
                }
                else
                {
                        $template->set_filenames(array(
                                'reg_header' => 'error_body.tpl')
                        );

                        $template->assign_vars(array(
                                'ERROR_MESSAGE' => $error_msg)
                        );

                        $template->assign_var_from_handle('ERROR_BOX', 'reg_header');

                        $username = htmlspecialchars(stripslashes((string) $username));
                        $email = stripslashes((string) $email);
                        $password = '';
                        $password_confirm = '';

                        $icq = stripslashes((string) $icq);
                        $aim = htmlspecialchars(str_replace('+', ' ', stripslashes((string) $aim)));
                        $msn = htmlspecialchars(stripslashes((string) $msn));
                        $yim = htmlspecialchars(stripslashes((string) $yim));

                        $website = htmlspecialchars(stripslashes((string) $website));
                        $location = htmlspecialchars(stripslashes((string) $location));
                        $occupation = htmlspecialchars(stripslashes((string) $occupation));
                        $interests = htmlspecialchars(stripslashes((string) $interests));
                        $signature = htmlspecialchars(stripslashes((string) $signature));

                        $user_lang = stripslashes((string) $user_lang);
                        $nuke_user_dateformat = htmlspecialchars(stripslashes((string) $nuke_user_dateformat));
                }
        }
        else if( !isset( $_POST['submit'] ) && $mode != 'save' && !isset( $_POST['avatargallery'] ) && !isset( $_POST['submitavatar'] ) && !isset( $_POST['cancelavatar'] ) )
        {
                if( isset( $_GET[POST_USERS_URL]) || isset( $_POST[POST_USERS_URL]) )
                {
                        $user_id = ( isset( $_POST[POST_USERS_URL]) ) ? intval( $_POST[POST_USERS_URL]) : intval( $_GET[POST_USERS_URL]);
                        $this_userdata = get_userdata($user_id);
                        if( !$this_userdata )
                        {
                                message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
                        }
                }
                else
                {
                        $this_userdata = get_userdata($_POST['username'], true);
                        if( !$this_userdata )
                        {
                                message_die(GENERAL_MESSAGE, $lang['No_user_id_specified'] );
                        }
                }

                //
                // Now parse and display it as a template
                //
                $user_id = $this_userdata['user_id'];
                $username = $this_userdata['username'];
                $email = $this_userdata['user_email'];
                $password = '';
                $password_confirm = '';

                $icq = $this_userdata['user_icq'];
                $aim = htmlspecialchars(str_replace('+', ' ', (string) $this_userdata['user_aim'] ));
                $msn = htmlspecialchars((string) $this_userdata['user_msnm']);
                $yim = htmlspecialchars((string) $this_userdata['user_yim']);

                $website = htmlspecialchars((string) $this_userdata['user_website']);
                $location = htmlspecialchars((string) $this_userdata['user_from']);
                $occupation = htmlspecialchars((string) $this_userdata['user_occ']);
                $interests = htmlspecialchars((string) $this_userdata['user_interests']);

                $signature = ($this_userdata['nuke_user_sig_bbcode_uid'] != '') ? preg_replace('#:' . $this_userdata['nuke_user_sig_bbcode_uid'] . '#si', '', (string) $this_userdata['nuke_user_sig']) : $this_userdata['nuke_user_sig'];
                $signature = preg_replace($html_entities_match, $html_entities_replace, (string) $signature);

                $viewemail = $this_userdata['user_viewemail'];
                $notifypm = $this_userdata['nuke_user_notify_pm'];
                $popuppm = $this_userdata['user_popup_pm'];
                $notifyreply = $this_userdata['user_notify'];
                $attachsig = $this_userdata['user_attachsig'];
                $allowhtml = $this_userdata['user_allowhtml'];
                $allowbbcode = $this_userdata['user_allowbbcode'];
                $allowsmilies = $this_userdata['user_allowsmile'];
                $allowviewonline = $this_userdata['user_allow_viewonline'];

                $user_avatar = $this_userdata['user_avatar'];
                $nuke_user_avatar_type = $this_userdata['nuke_user_avatar_type'];
                $nuke_user_style = $this_userdata['nuke_user_style'];
                $user_lang = $this_userdata['user_lang'];
                $nuke_user_timezone = $this_userdata['nuke_user_timezone'];
                $nuke_user_dateformat = htmlspecialchars((string) $this_userdata['nuke_user_dateformat']);

                $user_status = $this_userdata['user_active'];
                $user_allowavatar = $this_userdata['user_allowavatar'];
                $user_allowpm = $this_userdata['user_allow_pm'];

                $COPPA = false;

                $html_status =  ($this_userdata['user_allowhtml'] ) ? $lang['HTML_is_ON'] : $lang['HTML_is_OFF'];
                $bbcode_status = ($this_userdata['user_allowbbcode'] ) ? $lang['BBCode_is_ON'] : $lang['BBCode_is_OFF'];
                $smilies_status = ($this_userdata['user_allowsmile'] ) ? $lang['Smilies_are_ON'] : $lang['Smilies_are_OFF'];
        }

        if( isset($_POST['avatargallery']) && !$error )
        {
                if( !$error )
                {
                        $user_id = intval($_POST['id']);

                        $template->set_filenames(array(
                                "body" => "admin/user_avatar_gallery.tpl")
                        );

                        $dir = opendir("../" . $board_config['avatar_gallery_path']);

                        $avatar_images = array();
                        while( $file = readdir($dir) )
                        {
                                if( $file != "." && $file != ".." && !is_file(phpbb_realpath("./../" . $board_config['avatar_gallery_path'] . "/" . $file)) && !is_link(phpbb_realpath("./../" . $board_config['avatar_gallery_path'] . "/" . $file)) )
                                {
                                        $sub_dir = opendir("../" . $board_config['avatar_gallery_path'] . "/" . $file);

                                        $avatar_row_count = 0;
                                        $avatar_col_count = 0;

                                        while( $sub_file = readdir($sub_dir) )
                                        {
                                                if( preg_match("/(\.gif$|\.png$|\.jpg)$/is", $sub_file) )
                                                {
                                                        $avatar_images[$file][$avatar_row_count][$avatar_col_count] = $sub_file;

                                                        $avatar_col_count++;
                                                        if( $avatar_col_count == 5 )
                                                        {
                                                                $avatar_row_count++;
                                                                $avatar_col_count = 0;
                                                        }
                                                }
                                        }
                                }
                        }

                        closedir($dir);

                        if( isset($_POST['avatarcategory']) )
                        {
                                $category = htmlspecialchars((string) $_POST['avatarcategory']);
                        }
                        else
                        {
                                $category = key($avatar_images);
                        }
                        reset($avatar_images);

                        $s_categories = "";
                        foreach (array_keys($avatar_images) as $key) {
                            $selected = ( $key == $category ) ? "selected=\"selected\"" : "";
                            if( count($avatar_images[$key]) )
                            {
                                    $s_categories .= '<option value="' . $key . '"' . $selected . '>' . ucfirst((string) $key) . '</option>';
                            }
                        }

                        $s_colspan = 0;
                        for($i = 0; $i < count($avatar_images[$category]); $i++)
                        {
                                $template->assign_block_vars("avatar_row", array());

                                $s_colspan = max($s_colspan, count($avatar_images[$category][$i]));

                                for($j = 0; $j < count($avatar_images[$category][$i]); $j++)
                                {
                                        $template->assign_block_vars("avatar_row.avatar_column", array(
                                                "AVATAR_IMAGE" => "../" . $board_config['avatar_gallery_path'] . '/' . $category . '/' . $avatar_images[$category][$i][$j])
                                        );

                                        $template->assign_block_vars("avatar_row.avatar_option_column", array(
                                                "S_OPTIONS_AVATAR" => $avatar_images[$category][$i][$j])
                                        );
                                }
                        }

                        $coppa = ( ( !$_POST['coppa'] && !$_GET['coppa'] ) || $mode == "register") ? 0 : TRUE;

                        $s_hidden_fields = '<input type="hidden" name="mode" value="edit" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" /><input type="hidden" name="avatarcatname" value="' . $category . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="id" value="' . $user_id . '" />';

                        $s_hidden_fields .= '<input type="hidden" name="username" value="' . str_replace("\"", "&quot;", (string) $username) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="email" value="' . str_replace("\"", "&quot;", (string) $email) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="icq" value="' . str_replace("\"", "&quot;", (string) $icq) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="aim" value="' . str_replace("\"", "&quot;", (string) $aim) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="msn" value="' . str_replace("\"", "&quot;", (string) $msn) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="yim" value="' . str_replace("\"", "&quot;", (string) $yim) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="website" value="' . str_replace("\"", "&quot;", (string) $website) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="location" value="' . str_replace("\"", "&quot;", (string) $location) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="occupation" value="' . str_replace("\"", "&quot;", (string) $occupation) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="interests" value="' . str_replace("\"", "&quot;", (string) $interests) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="signature" value="' . str_replace("\"", "&quot;", (string) $signature) . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="viewemail" value="' . $viewemail . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="notifypm" value="' . $notifypm . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="popup_pm" value="' . $popuppm . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="notifyreply" value="' . $notifyreply . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="attachsig" value="' . $attachsig . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="allowhtml" value="' . $allowhtml . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="allowbbcode" value="' . $allowbbcode . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="allowsmilies" value="' . $allowsmilies . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="hideonline" value="' . !$allowviewonline . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="style" value="' . $nuke_user_style . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="language" value="' . $user_lang . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="timezone" value="' . $nuke_user_timezone . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="dateformat" value="' . str_replace("\"", "&quot;", (string) $nuke_user_dateformat) . '" />';

                        $s_hidden_fields .= '<input type="hidden" name="user_status" value="' . $user_status . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="user_allowpm" value="' . $user_allowpm . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="user_allowavatar" value="' . $user_allowavatar . '" />';
                        $s_hidden_fields .= '<input type="hidden" name="nuke_user_rank" value="' . $nuke_user_rank . '" />';

                        $template->assign_vars(array(
                                "L_USER_TITLE" => $lang['User_admin'],
                                "L_USER_EXPLAIN" => $lang['User_admin_explain'],
                                "L_AVATAR_GALLERY" => $lang['Avatar_gallery'],
                                "L_SELECT_AVATAR" => $lang['Select_avatar'],
                                "L_RETURN_PROFILE" => $lang['Return_profile'],
                                "L_CATEGORY" => $lang['Select_category'],
                                "L_GO" => $lang['Go'],

                                "S_OPTIONS_CATEGORIES" => $s_categories,
                                "S_COLSPAN" => $s_colspan,
                                "S_PROFILE_ACTION" => append_sid("admin_users.$phpEx?mode=$mode"),
                                "S_HIDDEN_FIELDS" => $s_hidden_fields)
                        );
                }
        }
        else
        {
			if(!isset($coppa)){ $coppa = ''; }
                $s_hidden_fields = '<input type="hidden" name="mode" value="save" /><input type="hidden" name="agreed" value="true" /><input type="hidden" name="coppa" value="' . $coppa . '" />';
                $s_hidden_fields .= '<input type="hidden" name="id" value="' . $this_userdata['user_id'] . '" />';

                if( !empty($user_avatar_local) )
                {
                        $s_hidden_fields .= '<input type="hidden" name="avatarlocal" value="' . $user_avatar_local . '" /><input type="hidden" name="avatarcatname" value="' . $user_avatar_category . '" />';
                }

                if( $nuke_user_avatar_type )
                {
                        switch( $nuke_user_avatar_type )
                        {
                                case USER_AVATAR_UPLOAD:
                                        $avatar = '<img src="../../../' . $board_config['avatar_path'] . '/' . $user_avatar . '" alt="" />';
                                        break;
                                case USER_AVATAR_REMOTE:
                                        $avatar = '<img src="' . $user_avatar . '" alt="" />';
                                        break;
                                case USER_AVATAR_GALLERY:
                                        $avatar = '<img src="../../../' . $board_config['avatar_gallery_path'] . '/' . $user_avatar . '" alt="" />';
                                        break;
                        }
                }
                else
                {
                        $avatar = "";
                }

                $sql = "SELECT * FROM " . RANKS_TABLE . "
			WHERE rank_special = 1
                        ORDER BY rank_title";
                if ( !($result = $db->sql_query($sql)) )
                {
                        message_die(GENERAL_ERROR, 'Could not obtain ranks data', '', __LINE__, __FILE__, $sql);
                }

                $rank_select_box = '<option value="0">' . $lang['No_assigned_rank'] . '</option>';
                while( $row = $db->sql_fetchrow($result) )
                {
                        $rank = $row['rank_title'];
                        $rank_id = $row['rank_id'];

                        $selected = ( $this_userdata['nuke_user_rank'] == $rank_id ) ? ' selected="selected"' : '';
                        $rank_select_box .= '<option value="' . $rank_id . '"' . $selected . '>' . $rank . '</option>';
                }

                $template->set_filenames(array(
                        "body" => "admin/user_edit_body.tpl")
                );

                //
                // Let's do an overall check for settings/versions which would prevent
                // us from doing file uploads....
                //
                $ini_val = ( phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';
                $form_enctype = ( !$ini_val('file_uploads') || phpversion() == '4.0.4pl1' || !$board_config['allow_avatar_upload'] || ( phpversion() < '4.0.3' && $ini_val('open_basedir') != '' ) ) ? '' : 'enctype="multipart/form-data"';

                $template->assign_vars(array(
                        'USERNAME' => $username,
                        'EMAIL' => $email,
                        'YIM' => $yim,
                        'ICQ' => $icq,
                        'MSN' => $msn,
                        'AIM' => $aim,
                        'OCCUPATION' => $occupation,
                        'INTERESTS' => $interests,
                        'LOCATION' => $location,
                        'WEBSITE' => $website,
                        'SIGNATURE' => str_replace('<br />', "\n", (string) $signature),
                        'VIEW_EMAIL_YES' => ($viewemail) ? 'checked="checked"' : '',
                        'VIEW_EMAIL_NO' => (!$viewemail) ? 'checked="checked"' : '',
                        'HIDE_USER_YES' => (!$allowviewonline) ? 'checked="checked"' : '',
                        'HIDE_USER_NO' => ($allowviewonline) ? 'checked="checked"' : '',
                        'NOTIFY_PM_YES' => ($notifypm) ? 'checked="checked"' : '',
                        'NOTIFY_PM_NO' => (!$notifypm) ? 'checked="checked"' : '',
                        'POPUP_PM_YES' => ($popuppm) ? 'checked="checked"' : '',
                        'POPUP_PM_NO' => (!$popuppm) ? 'checked="checked"' : '',
                        'ALWAYS_ADD_SIGNATURE_YES' => ($attachsig) ? 'checked="checked"' : '',
                        'ALWAYS_ADD_SIGNATURE_NO' => (!$attachsig) ? 'checked="checked"' : '',
                        'NOTIFY_REPLY_YES' => ( $notifyreply ) ? 'checked="checked"' : '',
                        'NOTIFY_REPLY_NO' => ( !$notifyreply ) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_BBCODE_YES' => ($allowbbcode) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_BBCODE_NO' => (!$allowbbcode) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_HTML_YES' => ($allowhtml) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_HTML_NO' => (!$allowhtml) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_SMILIES_YES' => ($allowsmilies) ? 'checked="checked"' : '',
                        'ALWAYS_ALLOW_SMILIES_NO' => (!$allowsmilies) ? 'checked="checked"' : '',
                        'AVATAR' => $avatar,
                        'LANGUAGE_SELECT' => language_select($user_lang, 'language', '../language'),
                        'TIMEZONE_SELECT' => tz_select($nuke_user_timezone),
                        'STYLE_SELECT' => style_select($nuke_user_style, 'style'),
                        'DATE_FORMAT' => $nuke_user_dateformat,
                        'ALLOW_PM_YES' => ($user_allowpm) ? 'checked="checked"' : '',
                        'ALLOW_PM_NO' => (!$user_allowpm) ? 'checked="checked"' : '',
                        'ALLOW_AVATAR_YES' => ($user_allowavatar) ? 'checked="checked"' : '',
                        'ALLOW_AVATAR_NO' => (!$user_allowavatar) ? 'checked="checked"' : '',
                        'USER_ACTIVE_YES' => ($user_status) ? 'checked="checked"' : '',
                        'USER_ACTIVE_NO' => (!$user_status) ? 'checked="checked"' : '',
                        'RANK_SELECT_BOX' => $rank_select_box,

                        'L_USERNAME' => $lang['Username'],
                        'L_USER_TITLE' => $lang['User_admin'],
                        'L_USER_EXPLAIN' => $lang['User_admin_explain'],
                        'L_NEW_PASSWORD' => $lang['New_password'],
                        'L_PASSWORD_IF_CHANGED' => $lang['password_if_changed'],
                        'L_CONFIRM_PASSWORD' => $lang['Confirm_password'],
                        'L_PASSWORD_CONFIRM_IF_CHANGED' => $lang['password_confirm_if_changed'],
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

                        'L_SPECIAL' => $lang['User_special'],
                        'L_SPECIAL_EXPLAIN' => $lang['User_special_explain'],
                        'L_USER_ACTIVE' => $lang['User_status'],
                        'L_ALLOW_PM' => $lang['User_allowpm'],
                        'L_ALLOW_AVATAR' => $lang['User_allowavatar'],

                        'L_AVATAR_PANEL' => $lang['Avatar_panel'],
                        'L_AVATAR_EXPLAIN' => $lang['Admin_avatar_explain'],
                        'L_DELETE_AVATAR' => $lang['Delete_Image'],
                        'L_CURRENT_IMAGE' => $lang['Current_Image'],
                        'L_UPLOAD_AVATAR_FILE' => $lang['Upload_Avatar_file'],
                        'L_UPLOAD_AVATAR_URL' => $lang['Upload_Avatar_URL'],
                        'L_AVATAR_GALLERY' => $lang['Select_from_gallery'],
                        'L_SHOW_GALLERY' => $lang['View_avatar_gallery'],
                        'L_LINK_REMOTE_AVATAR' => $lang['Link_remote_Avatar'],

                        'L_SIGNATURE' => $lang['Signature'],
                        'L_SIGNATURE_EXPLAIN' => sprintf($lang['Signature_explain'], $board_config['max_sig_chars'] ),
                        'L_NOTIFY_ON_PRIVMSG' => $lang['Notify_on_privmsg'],
                        'L_NOTIFY_ON_REPLY' => $lang['Always_notify'],
                        'L_POPUP_ON_PRIVMSG' => $lang['Popup_on_privmsg'],
                        'L_PREFERENCES' => $lang['Preferences'],
                        'L_PUBLIC_VIEW_EMAIL' => $lang['Public_view_email'],
                        'L_ITEMS_REQUIRED' => $lang['Items_required'],
                        'L_REGISTRATION_INFO' => $lang['Registration_info'],
                        'L_PROFILE_INFO' => $lang['Profile_info'],
                        'L_PROFILE_INFO_NOTICE' => $lang['Profile_info_warn'],
                        'L_EMAIL_ADDRESS' => $lang['Email_address'],
                        'S_FORM_ENCTYPE' => $form_enctype,

                        'HTML_STATUS' => $html_status,
                        'BBCODE_STATUS' => sprintf($bbcode_status, '<a href="../' . append_sid("faq.$phpEx?mode=bbcode") . '" target="_phpbbcode">', '</a>'),
                        'SMILIES_STATUS' => $smilies_status,

                        'L_DELETE_USER' => $lang['User_delete'],
                        'L_DELETE_USER_EXPLAIN' => $lang['User_delete_explain'],
                        'L_SELECT_RANK' => $lang['Rank_title'],

                        'S_HIDDEN_FIELDS' => $s_hidden_fields,
                        'S_PROFILE_ACTION' => append_sid("admin_users.$phpEx"))
                );

                if( file_exists(phpbb_realpath('./../' . $board_config['avatar_path'])) && ($board_config['allow_avatar_upload'] == TRUE) )
                {
                        if ( $form_enctype != '' )
                        {
                                $template->assign_block_vars('avatar_local_upload', array() );
                        }
                        $template->assign_block_vars('avatar_remote_upload', array() );
                }

                if( file_exists(phpbb_realpath('./../' . $board_config['avatar_gallery_path'])) && ($board_config['allow_avatar_local'] == TRUE) )
                {
                        $template->assign_block_vars('avatar_local_gallery', array() );
                }

                if( $board_config['allow_avatar_remote'] == TRUE )
                {
                        $template->assign_block_vars('avatar_remote_link', array() );
                }
        }

        $template->pparse('body');
}
else
{
        //
        // Default user selection box
        //
        $template->set_filenames(array(
                'body' => 'admin/user_select_body.tpl')
        );

        $template->assign_vars(array(
                'L_USER_TITLE' => $lang['User_admin'],
                'L_USER_EXPLAIN' => $lang['User_admin_explain'],
                'L_USER_SELECT' => $lang['Select_a_User'],
                'L_LOOK_UP' => $lang['Look_up_user'],
                'L_FIND_USERNAME' => $lang['Find_username'],

                'U_SEARCH_USER' => append_sid("search.$phpEx?mode=searchuser&popup=1&menu=1"),

                'S_USER_ACTION' => append_sid("admin_users.$phpEx"),
                'S_USER_SELECT' => $select_list ?? '')
        );
        $template->pparse('body');

}

include('./page_footer_admin.'.$phpEx);

