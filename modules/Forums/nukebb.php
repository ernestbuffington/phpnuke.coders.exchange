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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

global $db, $prefix, $phpbb_root_path, $nuke_root_path, $nuke_file_path, $phpbb_root_dir, $module_name, $name, $file;
$module_name = basename(dirname(__FILE__));
$phpbb_root_path = NUKE_FORUMS_DIR;
get_lang($module_name);
include_once(NUKE_BASE_DIR.'header.php');
?>