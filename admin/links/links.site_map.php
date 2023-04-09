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

/************************************************************************/
/* NukeJMap [Site_Map]    4.0 by z3rb                                   */
/* =================================                                    */
/*                                                                      */
/* Copyright (c) 2006 by Techgen                                        */
/* http://www.techg3n.net                                               */
/*                                                                      */
/************************************************************************/

if ( !defined('ADMIN_FILE') )
{
    die ("Access Denied");
}
global $admin_file;
if ($radminsuper==1) {
    adminmenu("".$admin_file.".php?op=site_map", "Google Site Map", "sitemap.png");
}

?>