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

/*=======================================================================
 (c) 2007 - 2018 by Lonestar Modules - https://lonestar-modules.com
 ========================================================================

 LICENSE INFORMATIONS COULD BE FOUND IN COPYRIGHTS.PHP WHICH MUST BE
 DISTRIBUTED WITHIN THIS MODULEPACKAGE OR WITHIN FILES WHICH ARE
 USED FROM WITHIN THIS PACKAGE.
 IT IS "NOT" ALLOWED TO DISTRIBUTE THIS MODULE WITHOUT THE ORIGINAL
 COPYRIGHT-FILE.
 ALL INFORMATIONS ABOVE THIS SECTION ARE "NOT" ALLOWED TO BE REMOVED.
 THEY HAVE TO STAY AS THEY ARE.
 IT IS ALLOWED AND SHOULD BE DONE TO ADD ADDITIONAL INFORMATIONS IN
 THE SECTIONS BELOW IF YOU CHANGE OR MODIFY THIS FILE.

/*****[CHANGES]**********************************************************
-=[Base]=-
-=[Mod]=-
 ************************************************************************/

LinkusAdminMain();

OpenTable();

	$num = 0;
	$result = $db->sql_query("SELECT `id`, `site_name`, `site_url`, `site_image`, `site_description`, `site_hits`, `site_status`, `date_added` FROM ".$prefix."_link_us WHERE `site_status` = '0' AND `button_type` = '1'");
	$numrows = $db->sql_numrows($result);

if($numrows == 0){
    echo "<center><font color='red' size='3'>".$lang_new[$module_name]['ALL_ACTIVE_SITES']."</font></center>";
} elseif ($numrows > 0) {
	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%' align='center'>";
	echo "<tr><th width='100%'>".$lang_new[$module_name]['STANDARD_BUTTONS']."</th></tr>";
	echo "</table>";
  	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%'>";
  	while(list($id, $site_name, $site_url, $site_image, $site_description, $site_hits, $site_status, $date_added) = $db->sql_fetchrow($result)) {

    if ($num == 0) { echo "<tr>"; }
    echo "<td width='50%' valign='top'>";
	LinkusTableOpen();
        echo "<table border='0' width='100%'>";
        echo "<tr><td width='25%' align='center' rowspan='3'>";
        echo "<img src='".$site_image."' border='0' align='absmiddle' />";
        echo "<br /><br /><a href='".$admin_file.".php?op=edit_button&amp;id=".$id."'><img src='modules/".$module_name."/images/edit.png' border='0' alt='".$lang_new[$module_name]['EDIT']."' title='".$lang_new[$module_name]['EDIT']."'></a>";
        echo " <a href='".$admin_file.".php?op=delete_button&amp;id=".$id."'><img src='modules/".$module_name."/images/delete.png' border='0' alt='".$lang_new[$module_name]['DELETE']."' title='".$lang_new[$module_name]['DELETE']."'></a>";
        echo "</td>";
        echo "<td width='75%' valign='top'>";
        echo "<table border='0' width='100%'>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['SITE_NAME'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_name), 1, true))."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['ADDED'].":</strong></td><td>".formatTimestamp($date_added)."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['VISITS'].":</strong></td><td>".$site_hits."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['DESCRIPTION'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_description),1, true))."</td></tr>";
        echo "</table></td>";
        echo "</tr></table>";
    LinkusTableClose();
    echo "</td>";
    $num++;
    if ($num == 2) { echo "</tr>"; $num = 0; }
  }
  if ($num ==1) { echo "<td width='50%'>&nbsp;</td></tr></table>"; } else { echo "</tr></table>"; }
}

	$num = 0;
	$result = $db->sql_query("SELECT `id`, `site_name`, `site_url`, `site_image`, `site_description`, `site_hits`, `site_status`, `date_added` FROM ".$prefix."_link_us WHERE `site_status` = '0' AND `button_type` = '2'");
	$numrows = $db->sql_numrows($result);

	if ($numrows > 0) {
	echo "<br /><br />";
	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%' align='center'>";
	echo "<tr><th width='100%'>".$lang_new[$module_name]['BANNER_BUTTONS']."</th></tr>";
	echo "</table>";
  	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%'>";
  	while(list($id, $site_name, $site_url, $site_image, $site_description, $site_hits, $site_status, $date_added) = $db->sql_fetchrow($result)) {

    if ($num == 0) { echo "<tr>"; }
    echo "<td width='50%' valign='top'>";
	LinkusTableOpen();
        echo "<table border='0' width='100%'>";
        echo "<tr><td width='25%' align='center' valign='top' rowspan='3'>";
        echo "<img src='".$site_image."' border='0' />";
        echo "<br /><br /><a href='".$admin_file.".php?op=edit_button&amp;id=".$id."'><img src='images/linkus/edit.png' border='0' alt='".$lang_new[$module_name]['EDIT']."' title='".$lang_new[$module_name]['EDIT']."'></a>";
        echo " <a href='".$admin_file.".php?op=delete_button&amp;id=".$id."'><img src='images/linkus/delete.png' border='0' alt='".$lang_new[$module_name]['DELETE']."' title='".$lang_new[$module_name]['DELETE']."'></a>";
        echo "</td><td width='75%' valign='top'>";
        echo "<table border='0' width='100%'>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['SITE_NAME'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_name), 1, true))."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['ADDED'].":</strong></td><td>".formatTimestamp($date_added)."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['VISITS'].":</strong></td><td>".$site_hits."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['DESCRIPTION'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_description),1, true))."</td></tr>";
        echo "</table></td>";
        echo "</tr></table>";
    LinkusTableClose();
    echo "</td>";
    $num++;
    if ($num == 1) { echo "</tr>"; $num = 0; }
  }
  if ($num ==1) { echo "<td width='50%'>&nbsp;</td></tr></table>"; } else { echo "</tr></table>"; }
}


	$num = 0;
	$result = $db->sql_query("SELECT `id`, `site_name`, `site_url`, `site_image`, `site_description`, `site_hits`, `site_status`, `date_added` FROM ".$prefix."_link_us WHERE `site_status` = '0' AND `button_type` = '3'");
	$numrows = $db->sql_numrows($result);

if ($numrows > 0) {
	echo "<br /><br />";
	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%' align='center'>";
	echo "<tr><th width='100%'>".$lang_new[$module_name]['RESOURCES']."</th></tr>";
	echo "</table>";
  	echo "<table border='0' cellpadding='2' cellspacing='5' width='100%'>";
  	while(list($id, $site_name, $site_url, $site_image, $site_description, $site_hits, $site_status, $date_added) = $db->sql_fetchrow($result)) {

    if ($num == 0) { echo "<tr>"; }
    echo "<td width='50%' valign='top'>";
	LinkusTableOpen();
        echo "<table border='0' width='100%'>";
        echo "<tr><td width='25%' align='center'>";
        echo "<img src='".$site_image."' border='0' align='absmiddle' />";
        echo "<br /><br /><a href='".$admin_file.".php?op=edit_button&amp;id=".$id."'><img src='images/linkus/edit.png' border='0' alt='".$lang_new[$module_name]['EDIT']."' title='".$lang_new[$module_name]['EDIT']."'></a>";
        echo " <a href='".$admin_file.".php?op=delete_button&amp;id=".$id."'><img src='images/linkus/delete.png' border='0' alt='".$lang_new[$module_name]['DELETE']."' title='".$lang_new[$module_name]['DELETE']."'></a>";
        echo "</td>";
        echo "<td width='75%' valign='top'>";
        echo "<table border='0' width='100%'>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['SITE_NAME'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_name), 1, true))."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['ADDED'].":</strong></td><td>".formatTimestamp($date_added)."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['VISITS'].":</strong></td><td>".$site_hits."</td></tr>";
        echo "<tr><td valign='top' align='left'><strong>".$lang_new[$module_name]['DESCRIPTION'].":</strong></td><td>".set_smilies(decode_bbcode(stripslashes($site_description),1, true))."</td></tr>";
        echo "</table></td>";
        echo "</tr></table>";
    LinkusTableClose();
    echo "</td>";
    $num++;
    if ($num == 2) { echo "</tr>"; $num = 0; }
  }
  if ($num == 1) { echo "<td width='50%'>&nbsp;</td></tr></table>"; } else { echo "</tr></table>"; }
}

CloseTable();

?>