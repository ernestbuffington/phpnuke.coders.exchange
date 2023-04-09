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
   Nuke-Evolution: Theme Management
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : case.themes.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.2
   Date          : 11.27.2005 (mm.dd.yyyy)

   Notes         : Allows admin to easily manage themes.
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
    die ('Illegal File Access');
}

switch($op) {
    case "themes":
    case "theme_edit":
    case "theme_edit_save":
    case "theme_deactivate":
    case "theme_activate":
    case "theme_uninstall":
    case "theme_install":
    case "theme_install_save":
    case "theme_makedefault":
    case "theme_quickinstall":
    case "theme_options":
    case "theme_transfer":
    case "theme_users":
    case "theme_users_reset":
    case "theme_users_modify":
	case "downloadTheme":
        include(NUKE_ADMIN_MODULE_DIR.'themes.php');
    break;
}

?>