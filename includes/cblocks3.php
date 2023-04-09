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
/* NSN Center Blocks                                    */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://nukescripts.86it.us                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/* Ported for Nuke-Evolution by Quake                   */
/* http://www.evo-mods.com                              */
/********************************************************/
/* Original by: Richard Benfield                        */
/* http://www.benfield.ws                               */
/********************************************************/

if(!defined('NUKE_FILE')) {
    Header("Location: ../index.php");
    exit;
}

global $bgcolor1, $bgcolor2;
$cbinfo = $db->sql_fetchrow($db->sql_query("select * from `".$prefix."_nsncb_config` where `cgid`='3'"));
if($cbinfo['enabled'] == '1') {
    if($cbinfo['height'] <> "") { $cheight = "height='".$cbinfo['height']."' "; } else { $cheight = ""; }
    echo "<table width='100%' ".$cheight."border='0' cellspacing='1' cellpadding='0'><tr><td valign='top'>\n";
    echo "<table width='100%' ".$cheight."border='0' cellspacing='1' cellpadding='4'><tr>";
    $result3 = $db->sql_query("SELECT * FROM `".$prefix."_nsncb_blocks` WHERE `cgid`='3' ORDER BY `cbid`");
    while($cbidinfo = $db->sql_fetchrow($result3)) {
        if($cbidinfo['cbid'] <= $cbinfo['count']) {
            if($cbidinfo['wtype'] == '0') {
                echo "<td width='".$cbidinfo['width']."' valign='top' align='center'>\n";
            } else {
                echo "<td width='".$cbidinfo['width']."%' valign='top' align='center'>\n";
            }
            cb_blocks($cbidinfo['rid']);
            echo "</td>\n";
        }
    }
    echo "</tr></table>\n";
    echo "</td></tr></table>\n";
}

?>
