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
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : info.php
   Author(s)     : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 12.19.2005 (mm.dd.yyyy)

   Notes         : Server Info Administration Panel
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
    die ('Illegal File Access');
}

switch($op) {

    case "info":
        include(NUKE_ADMIN_MODULE_DIR.'info.php');
    break;

}

?>