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

    ya_save_config('cookiecheck', $xcookiecheck);
    ya_save_config('cookiecleaner', $xcookiecleaner);
    ya_save_config('cookietimelife', $xcookietimelife, 'nohtml');
    ya_save_config('cookiepath', $xcookiepath, 'nohtml');
    ya_save_config('cookieinactivity', $xcookieinactivity, 'nohtml');

    /*****['BEGIN']****************************************
     [ Base:    Caching System                     v3.0.0 ]
     ******************************************************/
    global $cache;
    $cache->delete('ya_config', 'config');
    /*****['END']******************************************
     [ Base:    Caching System                     v3.0.0 ]
     ******************************************************/

//    echo "<META HTTP-EQUIV=\"refresh\" content=\"2;URL=modules.php?name=$module_name&amp;file=admin&amp;op=UsersConfig\">";

  $pagetitle = ": "._COOKIECONFIG." - "._YA_USERS;
  
   include_once(NUKE_BASE_DIR.'header.php');
   
   OpenTable();
   echo "<div align=\"center\">\n<a href=\"modules.php?name=Your_Account&file=admin\">" . _USER_ADMIN_HEADER . "</a></div>\n";
   echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _USER_RETURNMAIN . "</a> ]</div>\n";
   CloseTable();
	
   title(_USERADMIN.": "._COOKIECONFIG);
   amain();
   
   OpenTable();
   echo "<div align=\"center\"><h4>"._YACONFIGSAVED."</h4></div>";
   echo "<table align=\"center\"><tr><td><form><input type=\"button\" value=\""._COOKIECONFIG."\" onclick=\"javascript:location='modules.php?name=".$module_name."&amp;file=admin&amp;op=CookieConfig';\"></form></td></tr></table>";
   CloseTable();
   
   include_once(NUKE_BASE_DIR.'footer.php');
}

