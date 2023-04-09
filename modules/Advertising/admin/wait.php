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

if(!defined('NUKE_FILE')) {
    exit;
}

global $admin_file, $db, $prefix, $banners, $cache;

if($banners && is_mod_admin('Advertising')) {
    $content .= "<div align=\"left\"><strong><u><span class=\"content\">"._ABAN."</span>:</u></strong></div>";
    if (!$active = $cache->load('numbanact', 'submissions')) {
        list($active) = $db->sql_ufetchrow("SELECT COUNT(*) FROM " . $prefix . "_banner WHERE active='1'", SQL_NUM);
        $cache->save('numbanact', 'submissions', $active);
    }
    if (!$inactive = $cache->load('numbandea', 'submissions')) {
        list($inactive) = $db->sql_ufetchrow("SELECT COUNT(*) FROM " . $prefix . "_banner WHERE active='0'", SQL_NUM);
        $cache->save('numbandea', 'submissions', $inactive);
    }
    $content .= "<img src=\"images/arrow.gif\" border=\"0\" alt=\"\">&nbsp;<a href=\"".$admin_file.".php?op=BannersAdmin\">"._ABANNERS."</a>:&nbsp;<strong>$active</strong><br />";
    $content .= "<img src=\"images/arrow.gif\" border=\"0\" alt=\"\">&nbsp;<a href=\"".$admin_file.".php?op=BannersAdmin\">"._DBANNERS."</a>:&nbsp;<strong>$inactive</strong><br />";
}

?>