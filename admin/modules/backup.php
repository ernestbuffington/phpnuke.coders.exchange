<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* Based on Databese Backup System                                      */
/* Copyright (c) 2001 by Thomas Rudant (thomas.rudant@grunk.net)        */
/* http://www.grunk.net - http://www.securite-internet.org              */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
 
if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $op, $prefix, $db, $admin_file;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {

include 'header.php';

	switch($op) 
	{
        //default loading page
		default :
		   case "home":
		   OpenTable();
		   include NUKE_ADMIN_MODULE_DIR.'backup/home.php';
		   CloseTable();
		break;
		
        // this runs when you hit backup now
		case "backupnow":
		   OpenTable();
		   include NUKE_ADMIN_MODULE_DIR.'backup/backup.php';
		   CloseTable();
		break;

        // this runs when you hit download backup
		case "backupdownload":
		   OpenTable();
		   echo 'backupdownload';
		   include NUKE_ADMIN_MODULE_DIR.'backup/backupdownload.php';
		   CloseTable();
		break;
        
		// backup complete
		case "backupdone":
		   OpenTable();
		   echo '<div align="center">';
		   echo '<img src="images/admin/backup/backup_complete.png" alt="DataBase Backup Complete" title="DataBase Backup Complete" data-alt-src="images/admin/backup/backup_complete.png" height="480" width="480">';
		   echo '</div>';
		   CloseTable();
		break;
   
   }

include 'footer.php';

} 
else 
{
	echo "Access Denied";
}

