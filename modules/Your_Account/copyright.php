<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke              */
/* ============================================                                  */
/*                                                                               */
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                              */
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                         */
/*                                                                               */
/* Contact author: escudero@phpnuke.org.br                                       */
/* International Support Forum: http://ravenphpscripts.com/forum76.html          */
/*                                                                               */
/* This program is free software. You can redistribute it and/or modify          */
/* it under the terms of the GNU General Public License as published by          */
/* the Free Software Foundation; either version 2 of the License.                */
/*                                                                               */
/*********************************************************************************/
/* CNB Your Account is the official successor of NSN Your Account by Bob Marion  */
/*********************************************************************************/

define('CP_INCLUDE_DIR', dirname(dirname(dirname(__FILE__))));
require_once(CP_INCLUDE_DIR.'/includes/showcp.php');

$author_email          = "bob.marion@86it.us";
$author_homepage       = "https://nukescripts.86it.us";
$author_name           = "<a href=\"$author_homepage\">Bob Marion</a>";
$license               = "GNU/GPL";
$download_location     = "";
$module_version        = "5.0.0";
$module_description    = "CNB Your Account";

show_copyright($author_name, $author_email, $author_homepage, $license, $download_location, $module_version, $module_description);

