<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/
/* Forum admin files for PHP-Nuke 7.5 by chatserv                       */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ("Access Denied");
}

global $prefix, $db, $admdata;
$module_name = basename(dirname(dirname(__FILE__)));
if(is_mod_admin($module_name)) {

    switch($op) {
    
        case "forums":
        redirect("modules/$module_name/admin/index.php");
    }

} else {
    DisplayError("<strong>"._ERROR."</strong><br /><br />You do not have administration permission for module \"$module_name\"");
}

?>