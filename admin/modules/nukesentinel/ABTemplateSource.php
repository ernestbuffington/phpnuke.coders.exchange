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

if(empty($template)) { $template = "abuse_default.tpl"; }
$filename = NUKE_INCLUDE_DIR.'nukesentinel/abuse/'.$template;
if(!file_exists($filename)) { $filename = NUKE_INCLUDE_DIR.'nukesentinel/abuse/abuse_default.tpl'; }
include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
OpenMenu(_AB_VIEWTEMPLATE);
mastermenu();
CarryMenu();
templatemenu();
CloseMenu();
CloseTable();

OpenTable();
echo '<center class="title">'._AB_SOURCEOF.' '.$template.'<br /></center>'."\n";
echo '<center class="content"><strong>'._AB_NOTEDITOR.'</strong></center><br />'."\n";
$handle = @fopen($filename, "r");
$templatefile = fread($handle, filesize($filename));
@fclose($handle);
echo '<center><textarea rows="30" cols="70" readonly="readonly">'.htmlentities($templatefile, ENT_QUOTES).'</textarea></center>'."\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>