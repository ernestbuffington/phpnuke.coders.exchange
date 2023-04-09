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

/************************************************************************
   Nuke-Evolution: Enhanced Forum Block
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : index.php
   Author        : Quake (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 06.26.2005 (mm.dd.yyyy)

   Description   : Created module out of modules/Forums/groupcp.php.
************************************************************************/

/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die('Access Denied');
}

global $prefix, $db, $admdata;
$module_name = basename(dirname(dirname(__FILE__)));
if(is_mod_admin('Forums')) {

    switch($op) {
        case "Groups":
        redirect('modules/Forums/admin/index.php?op=Groups');
        break;
    }

} else {
    DisplayError("<center><strong>"._ERROR."</strong><br /><br />You do not have administration permission for module \"$module_name\"</center>");
}

?>