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
/* By: NukeScripts(tm) (http://nukescripts.86it.us)     */
/* Copyright (c) 2000-2008 by NukeScripts(tm)           */
/* See CREDITS.txt for ALL contributors                 */
/********************************************************/

if (!defined('NUKESENTINEL_ADMIN')) {
   die ('You can\'t access this file directly...');
}

$getIPs = $db->sql_fetchrow($db->sql_query("SELECT * FROM `".$prefix."_nsnst_referers` WHERE `rid`='".$rid."' LIMIT 0,1"));
$db->sql_query("DELETE FROM `".$prefix."_nsnst_referers` WHERE `rid`='".$rid."'");
$db->sql_query("ALTER TABLE `".$prefix."_nsnst_referers` ORDER BY `referer`");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnst_referers`");
$list_referer = explode("\r\n", $ab_config['list_referer']);
$list_referer = str_replace($getIPs['referer'], "", $list_referer);
rsort($list_referer);
$endlist = count($list_referer)-1;
if(empty($list_referer[$endlist])) { array_pop($list_referer); }
sort($list_referer);
$list_referer = implode("\r\n", $list_referer);
absave_config("list_referer", $list_referer);
header("Location: ".$admin_file.".php?op=$xop&min=$min&direction=$direction");

?>