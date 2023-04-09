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
      PHP Patched                                 v8.2.4       04/06/2023
-=[Mods]=-
      Updated / Fixed HTML                        v5.0.0       04/06/2023
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

if(is_mod_admin($module_name)) {

    list($email) = $db->sql_fetchrow($db->sql_query("SELECT user_email FROM ".$user_prefix."_users WHERE user_id='$sus_uid'"));
	
    if ($ya_config['servermail'] == 0) {
    
	    include_once(NUKE_INCLUDE_DIR.'functions_evo.php');
    
	    $message = _SORRYTO." $sitename "._HASSUSPEND;
        if ($suspendreason > "") {
            $suspendreason = stripslashes($suspendreason);
            $message .= "<br /><br />"._SUSPENDREASON."<br />$suspendreason";
        }
        $subject = _ACCTSUSPEND;
        $headers = array(
            'From: '.$adminmail,
            'Content-Type: text/html; charset=UTF-8',
            'Reply-To: '.$adminmail,
            'Return-Path: '.$adminmail
        );
        phpmailer( $email, $subject, $message, $headers );
    }
    $db->sql_query("UPDATE ".$user_prefix."_users SET user_level='0', user_active='0' WHERE user_id='$sus_uid'");
    
	$pagetitle = ": "._USERADMIN." - "._ACCTSUSPEND;
    
	include_once(NUKE_BASE_DIR.'header.php');
	
	OpenTable();
	echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&amp;file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();

    amain();

    OpenTable();
    echo "<div align=\"center\"><table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
    echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
    if (isset($query)) { echo "<input type='hidden' name='query' value='$query'>\n"; }
    if (isset($min)) { echo "<input type='hidden' name='min' value='$min'>\n"; }
    if (isset($xop)) { echo "<input type='hidden' name='op' value='$xop'>\n"; }
    echo "<tr><td align='center'><strong>"._ACCTSUSPEND."</strong></td></tr>\n";
    echo "<tr><td align='center'><input type='submit' value='"._RETURN2."'></td></tr>\n";
    echo "</form>\n";
    echo "</table></div>\n";
    CloseTable();

    include_once(NUKE_BASE_DIR.'footer.php');

}

