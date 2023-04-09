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

/********************************************************/
/* NukeSentinel(tm)                                     */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://nukescripts.86it.us                           */
/* Copyright (c) 2000-2008 by NukeScripts Network       */
/* See CREDITS.txt for ALL contributors                 */
/********************************************************/

$pagetitle = _AB_NUKESENTINEL.": "._AB_IP2COUNTRY;
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
OpenMenu(_AB_IP2COUNTRY);
ipbanmenu();
CarryMenu();
ip2cmenu();
CloseMenu();
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>