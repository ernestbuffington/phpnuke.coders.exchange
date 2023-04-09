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

$harvester = addslashes($harvester); 
$testnum1 = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnst_harvesters` WHERE `harvester`='".$harvester."' AND `hid`!='".$hid."'"));
if($testnum1 > 0) {
  include_once(NUKE_BASE_DIR.'header.php');
  OpenTable();
  OpenMenu(_AB_EDITHARVESTERERROR);
  mastermenu();
  CarryMenu();
  harvestermenu();
  CloseMenu();
  CloseTable();

  OpenTable();
  echo '<center><strong>'._AB_HARVESTEREXISTS.'</strong></center><br />'."\n";
  echo '<center><strong>'._GOBACK.'</strong></center><br />'."\n";
  CloseTable();
  include_once(NUKE_BASE_DIR.'footer.php');
} elseif($harvester == "") {
  include_once(NUKE_BASE_DIR.'header.php');
  OpenTable();
  OpenMenu(_AB_EDITHARVESTERERROR);
  mastermenu();
  CarryMenu();
  harvestermenu();
  CloseMenu();
  CloseTable();

  OpenTable();
  echo '<center><strong>'._AB_HARVESTEREMPTY.'</strong></center><br />'."\n";
  echo '<center><strong>'._GOBACK.'</strong></center><br />'."\n";
  CloseTable();
  include_once(NUKE_BASE_DIR.'footer.php');
} else {
  $getIPs = $db->sql_fetchrow($db->sql_query("SELECT * FROM `".$prefix."_nsnst_harvesters` WHERE `hid`='".$hid."' LIMIT 0,1"));
  $db->sql_query("UPDATE `".$prefix."_nsnst_harvesters` SET `harvester`='".$harvester."' WHERE `hid`='".$hid."'");
  $list_harvester = explode("\r\n", $ab_config['list_harvester']);
  $list_harvester = str_replace($getIPs['harvester'], $harvester, $list_harvester);
  rsort($list_harvester);
  $endlist = count($list_harvester)-1;
  if(empty($list_harvester[$endlist])) { array_pop($list_harvester); }
  sort($list_harvester);
  $list_harvester = implode("\r\n", $list_harvester);
  absave_config("list_harvester", $list_harvester);
  header("Location: ".$admin_file.".php?op=$xop&min=$min&direction=$direction");
}

?>