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

    list($hisname) = $db->sql_fetchrow($db->sql_query("SELECT username FROM ".$user_prefix."_users WHERE user_id='$chng_uid'"));
	
    $pagetitle = ": "._USERADMIN." - "._SUSPENDUSER;
    
	include_once(NUKE_BASE_DIR.'header.php');
	
	OpenTable();
	echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&amp;file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();

    title(_USERADMIN." - "._SUSPENDUSER);
    amain();

    OpenTable();
    echo "<div align=\"center\"><table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
    echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
    if (isset($query)) { echo "<input type='hidden' name='query' value='$query'>\n"; }
    if (isset($min)) { echo "<input type='hidden' name='min' value='$min'>\n"; }
    if (isset($xop)) { echo "<input type='hidden' name='xop' value='$xop'>\n"; }
    echo "<input type='hidden' name='op' value='suspendUserConf'>\n";
    echo "<input type='hidden' name='sus_uid' value='$chng_uid'>\n";
    echo "<tr><td align=center>"._SURE2SUSPEND." <strong>$hisname<i>($chng_uid)</i></strong>?</td></tr>\n";

    if ($ya_config["servermail"] == 0) {
        echo "<tr><td align=center>"._SUSPENDREASON."<br /><textarea name='suspendreason' rows='5' cols='40' wrap='virtual'></textarea></td></tr>\n";
    }

    echo "<tr><td align=center><input type='submit' value='"._SUSPENDUSER."'></td><tr>\n";
    echo "</form>\n";
    echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post'>\n";
    if (isset($query)) { echo "<input type='hidden' name='query' value='$query'>\n"; }
    if (isset($min)) { echo "<input type='hidden' name='min' value='$min'>\n"; }
    if (isset($xop)) { echo "<input type='hidden' name='op' value='$xop'>\n"; }
    echo "<tr><td align='center' colspan='2'><input type='submit' value='"._CANCEL."'></td></tr>\n";
    echo "</form>\n";
    echo "</table></div>\n";
    CloseTable();

    include_once(NUKE_BASE_DIR.'footer.php');

}

