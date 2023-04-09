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

    $pagetitle = ": "._USERADMIN." - "._FINDTEMP;
	
    include_once(NUKE_BASE_DIR.'header.php');
	
	OpenTable();
	echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();

    title(""._USERADMIN." - "._FINDTEMP);
    amain();

    if (isset($xusername) AND $xusername != "") {
        $sql = "SELECT * FROM ".$user_prefix."_users_temp WHERE username='$xusername'";
    } elseif (isset($xuser_id) AND $xuser_id != "") {
        $sql = "SELECT * FROM ".$user_prefix."_users_temp WHERE user_id='$xuser_id'";
    } elseif (isset($xuser_email) AND $xuser_email != "") {
        $sql = "SELECT * FROM ".$user_prefix."_users_temp WHERE user_email='$xuser_email'";
    }
    if($db->sql_numrows($db->sql_query($sql)) > 0) {

        $chnginfo = $db->sql_fetchrow($db->sql_query($sql));

        OpenTable();
        echo "<div align=\"center\"><table border='0'>\n";
        echo "<tr><td bgcolor='$bgcolor2'>"._USERID.":</td><td><strong>".$chnginfo['user_id']."</strong></td></tr>\n";
        echo "<tr><td bgcolor='$bgcolor2'>"._NICKNAME.":</td><td><strong>".$chnginfo['username']."</strong></td></tr>\n";
        echo "<tr><td bgcolor='$bgcolor2'>"._EMAIL.":</td><td><strong><a href='mailto:".$chnginfo['user_email']."'>".$chnginfo['user_email']."</a></strong></td></tr>\n";
        echo "<tr><td bgcolor='$bgcolor2'>"._REGDATE.":</td><td><strong>".$chnginfo['nuke_user_regdate']."</strong></td></tr>\n";
        echo "<tr><td bgcolor='$bgcolor2'>"._CHECKNUM.":</td><td><strong>".$chnginfo['check_num']."</strong></td></tr>\n";
        echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
        echo "<input type='hidden' name='op' value='modifyTemp'>\n";
        echo "<input type='hidden' name='chng_uid' value='".$chnginfo['user_id']."'>\n";
        echo "<tr><td align='center' colspan='2'><input type='submit' value='"._MODIFY."'></td></tr>\n";
        echo "</form>\n";
        echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
        echo "<tr><td align='center' colspan='2'><input type='submit' value='"._RETURN."'></td></tr>\n";
        echo "</form>\n";
        echo "</table></div>\n";
        CloseTable();

    } else {
        OpenTable();
        echo "<div align=\"center\"><strong>"._TEMPNOEXIST."</strong></div>\n";
        CloseTable();
    }
    include_once(NUKE_BASE_DIR.'footer.php');

}

