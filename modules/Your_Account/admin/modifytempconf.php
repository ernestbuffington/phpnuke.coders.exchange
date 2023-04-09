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

    $stop = "";

    if ($chng_uname != $old_uname) { ya_userCheck($chng_uname); }
    if ($chng_email != $old_email) { ya_mailCheck($chng_email); }
    if (empty($stop)) {
        $time = time();
//      $db->sql_query("UPDATE ".$user_prefix."_users_temp SET username='$chng_uname', realname='$chng_realname',  user_email='$chng_email', nuke_user_regdate='$chng_regdate', time='$time' WHERE user_id='$chng_uid'");
        $db->sql_query("UPDATE ".$user_prefix."_users_temp SET username='$chng_uname', realname='$chng_realname',  user_email='$chng_email' WHERE user_id='$chng_uid'");

        if (count($nfield) > 0) {
         foreach ($nfield as $key => $var) {
         $nfield[$key] = ya_fixtext($nfield[$key]);
           if (($db->sql_numrows($db->sql_query("SELECT * FROM ".$user_prefix."_cnbya_value_temp WHERE fid='$key' AND uid = '$chng_uid'"))) == 0) {
          
            $sql = "INSERT INTO ".$user_prefix."_cnbya_value_temp (uid, fid, value) VALUES ('$chng_uid', '$key','$nfield[$key]')";
            $db->sql_query($sql);
          }
          else {
            $db->sql_query("UPDATE ".$user_prefix."_cnbya_value_temp SET value='$nfield[$key]' WHERE fid='$key' AND uid = '$chng_uid'");
          } 
         }
        }

        $pagetitle = ": "._USERADMIN." - "._ACCTMODIFY;
		
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
        if (isset($min))   { echo "<input type='hidden' name='min' value='$min'>\n"; }
        if (isset($xop))   { echo "<input type='hidden' name='op' value='$xop'>\n"; }
        echo "<tr><td align='center'><strong>"._ACCTMODIFY."</strong></td></tr>\n";
        echo "<tr><td align='center'><input type='submit' value='"._RETURN2."'></td></tr>\n";
        echo "</form>\n";
        echo "</table></div>\n";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    
	} else {
        $pagetitle = ": "._USERADMIN;
		
        include_once(NUKE_BASE_DIR.'header.php');
		
		OpenTable();
	    echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
	    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
	    CloseTable();
	    
        title(_USERADMIN);
        amain();
        
        OpenTable();
        echo "<strong>$stop</strong>\n";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
        return;
    }

}

