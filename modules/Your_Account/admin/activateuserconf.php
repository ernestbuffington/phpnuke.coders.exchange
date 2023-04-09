<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke              */
/* ============================================                                  */
/*                                                                               */
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                              */
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                         */
/*                                                                               */
/* Contact author: escudero@phpnuke.org.br                                       */
/* International Support Forum: http://ravenphpscripts.com/forum76.html          */
/*                                                                               */
/* This program is free software. You can redistribute it and/or modify          */
/* it under the terms of the GNU General Public License as published by          */
/* the Free Software Foundation; either version 2 of the License.                */
/*                                                                               */
/*********************************************************************************/
/* CNB Your Account is the official successor of NSN Your Account by Bob Marion  */
/*********************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      PHP Patched                              v8.2.4       04/06/2023
-=[Mod]=-
      Update HTML                              v5.0.0       04/06/2023
	  Finished Redirection                     v1.0.0       06/28/2005
      Initial Usergroup                        v1.0.1       09/06/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
    die ('Access Denied');
}

if (!defined('YA_ADMIN')) {
    die('CNBYA admin protection');
}

if (!defined('CNBYA')) {
    die('CNBYA protection');
}

/*****[BEGIN]******************************************
 [ Mod:     Welcome PM                         v2.0.0 ]
 [ Mod:     Initial Usergroup                  v1.0.1 ]
 ******************************************************/
include_once(NUKE_MODULES_DIR.$module_name.'/public/functions_welcome_pm.php');
include_once(NUKE_MODULES_DIR.$module_name.'/public/custom_functions.php');
include_once(NUKE_INCLUDE_DIR. 'constants.php');
/*****[END]********************************************
 [ Mod:     Welcome PM                         v2.0.0 ]
 [ Mod:     Initial Usergroup                  v1.0.1 ]
 ******************************************************/

if(is_mod_admin($module_name)) {

list($uname, $realname, $email, $upass, $ureg) = $db->sql_fetchrow($db->sql_query("SELECT username, realname, user_email, user_password, nuke_user_regdate FROM ".$user_prefix."_users_temp WHERE user_id='$act_uid'"));

    if ($ya_config['servermail'] == 0) {
        $message = _SORRYTO." $sitename "._HASAPPROVE;
        $subject = _SORRYTO." $sitename "._HASAPPROVE;

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: '.$adminmail,                    
            'Reply-To: '.$adminmail,
            'Return-Path: '.$adminmail
        );
        phpmailer( $email, $subject, $message, $headers );
    }
    $db->sql_query("DELETE FROM ".$user_prefix."_users_temp WHERE user_id='$act_uid'");

    $db->sql_query("OPTIMIZE TABLE ".$user_prefix."_users_temp");
    list($newest_uid) = $db->sql_fetchrow($db->sql_query("SELECT max(user_id) AS newest_uid FROM ".$user_prefix."_users"));
    if ($newest_uid == "-1") { $new_uid = 1; } else { $new_uid = $newest_uid+1; }
    
	$db->sql_query("INSERT INTO ".$user_prefix."_users (user_id, name, username, user_email, nuke_user_regdate, user_password, user_level, user_active, user_avatar, nuke_user_avatar_type, user_from) VALUES ('$new_uid', '$realname', '$uname', '$email', '$ureg', '$upass', 1, 1, 'gallery/blank.png', 3, '')");

    $res = $db->sql_query("SELECT * FROM ".$user_prefix."_cnbya_value_temp WHERE uid = '$act_uid'");
    
	while ($sqlvalue = $db->sql_fetchrow($res)) {
        $db->sql_query("INSERT INTO ".$user_prefix."_cnbya_value (uid, fid, value) VALUES ('$new_uid', '$sqlvalue[fid]','$sqlvalue[value]')");
    }
    $db->sql_query("DELETE FROM ".$user_prefix."_cnbya_value_temp WHERE uid='$act_uid'");
    $db->sql_query("OPTIMIZE TABLE ".$user_prefix."_cnbya_value_temp");

    $sql = "INSERT INTO " . GROUPS_TABLE . " (group_name, group_description, group_single_user, group_moderator)
            VALUES ('', 'Personal User', '1', '0')";
    
	if ( !($result = $db->sql_query($sql)) )
    {
        DisplayError('Could not insert data into groups table<br />'.$sql);
    }

    $nuke_group_id = $db->sql_nextid();

    $sql = "INSERT INTO " . USER_GROUP_TABLE . " (user_id, nuke_group_id, user_pending)
        VALUES ('$new_uid', '$nuke_group_id', '0')";
    if( !($result = $db->sql_query($sql)) )
    {
        DisplayError('Could not insert data into user_group table<br />'.$sql);
    }
    
	/*****[BEGIN]******************************************
     [ Mod:     Welcome PM                         v2.0.0 ]
     [ Mod:     Initial Usergroup                  v1.0.1 ]
     ******************************************************/
    send_pm($new_uid, $uname);
    init_group($new_uid);
    /*****[END]********************************************
     [ Mod:     Welcome PM                         v2.0.0 ]
     [ Mod:     Initial Usergroup                  v1.0.1 ]
     ******************************************************/
    
	$pagetitle = ": "._USERADMIN." - "._YA_ACTIVATED;
    
	include_once(NUKE_BASE_DIR.'header.php');
	
	OpenTable();
	echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();
	
	amain();
    
	OpenTable();
    echo "<div align=\"center\"><table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
    echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
    if (isset($query)) { echo "<input type='hidden' name='query' value='$query'>\n"; }
    if (isset($min)) { echo "<input type='hidden' name='min' value='$min'>\n"; }
    if (isset($xop)) { echo "<input type='hidden' name='op' value='$xop'>\n"; }
    echo "<tr><td align='center'><strong>"._YA_ACTIVATED."</strong></td></tr>\n";
    echo "<tr><td align='center'><input type='submit' value='"._RETURN2."'></td></tr>\n";
    echo "</form>\n";
    echo "</table></div>\n";
    CloseTable();
    include_once(NUKE_BASE_DIR.'footer.php');

}

