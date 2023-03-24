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

global $dbhost,$dbuname,$dbpass,$dbname;

$servername = $dbhost;
$username = $dbuname;
$password = $dbpass;
$db = $dbname;

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
	echo "Connect Failed!<br>" . $conn->error;
}
//set your timezone , refer to php manual
date_default_timezone_set("Asia/Kuala_Lumpur");
