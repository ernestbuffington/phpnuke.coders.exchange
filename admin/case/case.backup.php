<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

// this is the global that is used on the fly by the admin system
// which is run through the /admin.php file.
global $op;
// list all the switches needede for admin/backup.php 
// these will all be used to switch modes in the 
// admin/backup.php file.
switch($op) {

	case "backup":
	case "backupnow":
	case "backupdone":
	case "backupdownload":
    include("admin/modules/backup.php");
    break;
 
}

