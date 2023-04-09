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

/************************************************************************
   Nuke-Evolution: Submissions Block
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : wait.php
   Author        : Quake
   Version       : 2.0.0
   Date          : 09/02/2006 (dd-mm-yyyy)

   Notes         : Overview about submissions and other useful information
                   about your website.
************************************************************************/

if(!defined('NUKE_FILE')) {
    exit;
}

global $admin_file, $db, $prefix, $cache;

$module_name = basename(dirname(dirname(__FILE__)));

if(is_active($module_name)) {
    $content .= "<div align=\"left\"><strong><u><span class=\"content\">"._AREV."</span>:</u></strong></div>";
    if(($numwaitreviews = $cache->load('numwaitreviews', 'submissions')) === false) {
        list($numwaitreviews) = $db->sql_fetchrow($db->sql_query("SELECT COUNT(*) FROM ".$prefix."_reviews_add"), SQL_NUM);
        $cache->save('numwaitreviews', 'submissions', $numwaitreviews);
    }
    $content .= "<img src=\"images/arrow.gif\" alt=\"\" />&nbsp;<a href=\"".$admin_file.".php?op=reviews\">"._WREVIEWS."</a>:&nbsp;<strong>$numwaitreviews</strong><br />";
}

?>