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

if (!defined('ADMIN_FILE')) {
   die('Access Denied');
}

$module_name = basename(dirname(dirname(__FILE__)));
include_once(NUKE_MODULES_DIR.$module_name.'/language/lang-'.$currentlang.'.php');

switch($op) {
	case "ecalendar":
    case "ecalendar_del":
	case "ecalendar_edit":
    case "ecalendar_add":
	case "ecalendar_update":
        include(NUKE_MODULES_DIR.$module_name.'/admin/index.php');
    break;

}

?>