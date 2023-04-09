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

// ==========================================
// PHP-NUKE: Shout Box
// ==========================
//
// Copyright (c) 2004 by Aric Bolf (SuperCat)
// http://www.OurScripts.net
//
// This program is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation
// ===========================================

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       08/10/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ("Illegal File Access");
}

$module_name = basename(dirname(dirname(__FILE__)));

switch($op) {

    case "shout":
        include(NUKE_MODULES_DIR.$module_name.'/admin/index.php');
    break;

}

?>