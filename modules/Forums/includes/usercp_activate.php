<?php
/***************************************************************************
 *                            usercp_activate.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: usercp_activate.php,v 1.6.2.8 2005/07/19 20:01:16 acydburn Exp
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

/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * NullToStrictStringFuncCallArgRector
 */
 
if ( !defined('IN_PHPBB') )
{
        die('Hacking attempt');
        exit;
}

$sql = "SELECT user_active, user_id, username, user_email, user_newpasswd, nuke_user_lang, user_actkey
        FROM " . USERS_TABLE . "
        WHERE user_id = " . intval($_GET[POST_USERS_URL]);
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, 'Could not obtain user information', '', __LINE__, __FILE__, $sql);
}

if ( $row = $db->sql_fetchrow($result) )
{
        if ( $row['user_active'] && empty(trim((string) $row['user_actkey'])) )
        {
                $template->assign_vars(array(
                        'META' => '<meta http-equiv="refresh" content="10;url=' . append_sid("index.$phpEx") . '">')
                );

                message_die(GENERAL_MESSAGE, $lang['Already_activated']);
        }
        else if ((trim((string) $row['user_actkey']) == trim((string) $_GET['act_key'])) && (!empty(trim((string) $row['user_actkey']))))
        {
		if (intval($board_config['require_activation']) == USER_ACTIVATION_ADMIN && $userdata['user_level'] != ADMIN)
		{
			message_die(GENERAL_MESSAGE, $lang['Not_Authorised']);
		}

                $sql_update_pass = ( !empty($row['user_newpasswd']) ) ? ", user_password = '" . str_replace("\'", "''", (string) $row['user_newpasswd']) . "', user_newpasswd = ''" : '';

                $sql = "UPDATE " . USERS_TABLE . "
                        SET user_active = 1, user_actkey = ''" . $sql_update_pass . "
                        WHERE user_id = " . $row['user_id'];
                if ( !($result = $db->sql_query($sql)) )
                {
                        message_die(GENERAL_ERROR, 'Could not update users table', '', __LINE__, __FILE__, $sql_update);
                }

                if ( intval($board_config['require_activation']) == USER_ACTIVATION_ADMIN && empty($sql_update_pass) )
                {
                        include("modules/Forums/includes/emailer.php");
                        $emailer = new emailer($board_config['smtp_delivery']);

                        $emailer->from($board_config['board_email']);
                        $emailer->replyto($board_config['board_email']);

                        $emailer->use_template('admin_welcome_activated', $row['nuke_user_lang']);
                        $emailer->email_address($row['user_email']);
                        $emailer->set_subject($lang['Account_activated_subject']);

                        $emailer->assign_vars(array(
                                'SITENAME' => $board_config['sitename'],
                                'USERNAME' => $row['username'],
                                'PASSWORD' => $password_confirm,
                                'EMAIL_SIG' => (!empty($board_config['board_email_sig'])) ? str_replace('<br />', "\n", "-- \n" . $board_config['board_email_sig']) : '')
                        );
                        $emailer->send();
                        $emailer->reset();

                        $template->assign_vars(array(
                                'META' => '<meta http-equiv="refresh" content="10;url=' . append_sid("index.$phpEx") . '">')
                        );

                        message_die(GENERAL_MESSAGE, $lang['Account_active_admin']);
                }
                else
                {
                        $template->assign_vars(array(
                                'META' => '<meta http-equiv="refresh" content="10;url=' . append_sid("index.$phpEx") . '">')
                        );

                        $message = ( $sql_update_pass == '' ) ? $lang['Account_active'] : $lang['Password_activated'];
                        message_die(GENERAL_MESSAGE, $message);
                }
        }
        else
        {
                message_die(GENERAL_MESSAGE, $lang['Wrong_activation']);
        }
}
else
{
        message_die(GENERAL_MESSAGE, $lang['No_such_user']);
}

