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

/************************************************************************
   Nuke-Evolution: Enhanced Forum Block
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : groupcp.php
   Author        : Quake (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 06.26.2005 (mm.dd.yyyy)

   Description   : Created module out of modules/Forums/groupcp.php.
************************************************************************/

/***************************************************************************
 This file has been changed and moved to modules/Groups/index.php
 Please see that file to make edits or changes.
 ***************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

$pos = strpos($_SERVER['QUERY_STRING'],"=groupcp");
if($pos !== false && $pos != strlen($_SERVER['QUERY_STRING'])) {
    $redirector = "modules.php?name=Groups" . substr($_SERVER['QUERY_STRING'],$pos+8);
} else {
    $redirector = "modules.php?name=Groups";
}
redirect($redirector);

?>