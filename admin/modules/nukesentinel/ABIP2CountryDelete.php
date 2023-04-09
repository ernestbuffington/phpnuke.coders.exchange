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

include_once(NUKE_BASE_DIR.'header.php');
OpenTable();
OpenMenu(_AB_IP2CDELETE);
mastermenu();
CarryMenu();
ip2cmenu();
CloseMenu();
CloseTable();

OpenTable();
echo '<form action="'.$admin_file.'.php" method="post">'."\n";
echo '<input type="hidden" name="op" value="ABIP2CountryDeleteSave" />'."\n";
echo '<input type="hidden" name="ip_lo" value="'.$ip_lo.'" />'."\n";
echo '<input type="hidden" name="ip_hi" value="'.$ip_hi.'" />'."\n";
echo '<input type="hidden" name="xop" value="'.$xop.'" />'."\n";
echo '<input type="hidden" name="min" value="'.$min.'" />'."\n";
echo '<input type="hidden" name="sip" value="'.$sip.'" />'."\n";
echo '<input type="hidden" name="column" value="'.$column.'" />'."\n";
echo '<input type="hidden" name="direction" value="'.$direction.'" />'."\n";
echo '<input type="hidden" name="showcountry" value="'.$showcountry.'" />'."\n";
echo '<table summary="" align="center" border="0" cellpadding="2" cellspacing="2">'."\n";
echo '<tr><td align="center">'._AB_IP2CDELETES.' '.long2ip($ip_lo).' to '.long2ip($ip_hi).'?</td></tr>'."\n";
echo '<tr><td align="center"><input type="submit" value="'._AB_IP2CDELETE.'" /></td></tr>'."\n";
echo '<tr><td align="center">'._GOBACK.'</td></tr>'."\n";
echo '</table>'."\n";
echo '</form>'."\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>