<?php



/************************************************************************/

/* PHP-NUKE: Web Portal System                                          */

/* ===========================                                          */

/*                                                                      */

/* Copyright (c) 2023 by Francisco Burzi                                */

/* https://phpnuke.coders.exchange                                      */

/*                                                                      */

/* This program is free software. You can redistribute it and/or modify */

/* it under the terms of the GNU General Public License as published by */

/* the Free Software Foundation; either version 2 of the License.       */

/************************************************************************/



if (!defined('ADMIN_FILE')) {

	die ("Access Denied");

}



global $admin_file;

adminmenu("".$admin_file.".php?op=downloads", ""._DOWNLOAD."", "downloads.gif");



?>