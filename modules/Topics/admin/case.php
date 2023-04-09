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

$module_name = "Topics";

include_secure("modules/$module_name/admin/language/lang-".$currentlang.".php");

switch($op) {
    case "relatedsave":
    case "relatededit":
    case "relateddelete":
    case "topicsmanager":
    case "topicedit":
    case "topicmake":
    case "topicdelete":
    case "topicchange":
    include("modules/$module_name/admin/index.php");
    break;
}

?>