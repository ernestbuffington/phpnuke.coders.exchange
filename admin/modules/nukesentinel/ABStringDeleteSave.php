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

$getIPs = $db->sql_fetchrow($db->sql_query("SELECT * FROM `".$prefix."_nsnst_strings` WHERE `sid`='".$sid."' LIMIT 0,1"));
$db->sql_query("DELETE FROM `".$prefix."_nsnst_strings` WHERE `sid`='".$sid."'");
$db->sql_query("ALTER TABLE `".$prefix."_nsnst_strings` ORDER BY `string`");
$db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnst_strings`");
$list_string = explode("\r\n", $ab_config['list_string']);
$list_string = str_replace($getIPs['string'], "", $list_string);
rsort($list_string);
$endlist = count($list_string)-1;
if(empty($list_string[$endlist])) { array_pop($list_string); }
sort($list_string);
$list_string = implode("\r\n", $list_string);
absave_config("list_string", $list_string);
header("Location: ".$admin_file.".php?op=$xop&min=$min&direction=$direction");

?>