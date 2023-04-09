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
   Nuke-Evolution: Advanced Content Management System
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : case.version.php
   Author        : Technocrat (www.nuke-evolution.com)
   Version       : 1.0.0
   Date          : 06/16/2005 (dd-mm-yyyy)

   Notes         : Verifies if latest Nuke-Evolution Basic Release is
                   installed and a recent changelog.
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
-=[Mod]=-
      Evolution Version Checker                v1.0.0       06/16/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
    die ('Illegal File Access');
}

switch($op) {

    case "version":
        include(NUKE_ADMIN_MODULE_DIR.'version.php');
    break;

}

?>