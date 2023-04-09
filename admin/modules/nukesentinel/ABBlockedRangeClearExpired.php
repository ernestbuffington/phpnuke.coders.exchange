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

$expiretime = time();
$clearresult = $db->sql_query("SELECT * FROM `".$prefix."_nsnst_blocked_ranges` WHERE (`expires`<'$expiretime' AND `expires`!='0')");
while($clearblock = $db->sql_fetchrow($clearresult)) {
  $old_masscidr = ABGetCIDRs($clearblock['ip_lo'], $clearblock['ip_hi']);
  if($ab_config['htaccess_path'] != "") {
    $old_masscidr = explode("||", $old_masscidr);
    for($i=0; $i < sizeof($old_masscidr); $i++) {
      if($old_masscidr[$i]!="") {
        $old_masscidr[$i] = "deny from ".$old_masscidr[$i]."\n";
      }
    }
    $ipfile = file($ab_config['htaccess_path']);
    $ipfile = implode("", $ipfile);
    $ipfile = str_replace($old_masscidr, "", $ipfile);
    $ipfile = $ipfile;
    $doit = fopen($ab_config['htaccess_path'], "w");
    fwrite($doit, $ipfile);
    fclose($doit);
  }
  $db->sql_query("DELETE FROM `".$prefix."_nsnst_blocked_ranges` WHERE `ip_lo`='".$clearblock['ip_lo']."' AND `ip_hi`='".$clearblock['ip_hi']."'");
  $db->sql_query("OPTIMIZE TABLE `".$prefix."_nsnst_blocked_ranges`");
}
header("Location: ".$admin_file.".php?op=ABBlockedRangeList");

?>