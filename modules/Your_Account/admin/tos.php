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

    $pagetitle = ": "._EDITTOS;
	
    include_once(NUKE_BASE_DIR.'header.php');
	
	OpenTable();
	echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&amp;file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();

    title(_EDITTOS);
    amain();

    if (isset($_POST['submit'])) {
    $tos = Fix_Quotes($_POST['tos_text']);
    $db->sql_query("UPDATE " . $prefix . "_cnbya_config SET config_value = '" . $tos . "' WHERE config_name = 'tos_text'");
    $cache->delete('ya_config');

    OpenTable();
    echo "<div align=\"center\">Your Terms of Service have been updated.</div>\n";
    CloseTable();

    } else {

    OpenTable();
    echo "<form action='modules.php?name=$module_name&amp;file=admin' method='post' name=\"tos\">\n";
    echo "<table border=\"0\" width=\"100%\" height=\"195\">";
    echo "<tr>";
    echo "<td width=\"50%\" height=\"195\"><p align=\"center\">" . _EDITTOS2 . "</p></td>\n";
    echo "</tr>";
    echo "<tr>\n";
    echo "<td width=\"50%\" height=\"195\">\n";
    Make_TextArea('tos_text',  $ya_config['tos_text'], 'tos');
    echo "</td>\n";
    echo "</tr>\n";
    echo "<input type='hidden' name='op' value='editTOS'>";
    echo "<tr>\n";
    echo "<td colspan=\"2\" width=\"150%\" align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Submit\"></td>\n";
    echo "</tr>\n";
    echo "</table>\n";
    echo "</form>\n";
    CloseTable();
    }
	
    include_once(NUKE_BASE_DIR.'footer.php');

}

