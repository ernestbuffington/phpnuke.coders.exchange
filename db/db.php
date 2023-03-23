<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('NUKE_FILE') || isset($_REQUEST['dbtype'])) {
  die('Quit trying to hack my website!');
}

if(!isset($dbtype)) {
  $dbtype = 'mysqli';
}

$dbtype = strtolower($dbtype);

if (file_exists(NUKE_DB_DIR . $dbtype . '.php')) {
    require_once(NUKE_DB_DIR . $dbtype . '.php');
} else {
    die('Invalid Database Type Specified!');
}

$db = new sql_db($dbhost, $dbuname, $dbpass, $dbname, false);

if (!$db->db_connect_id) {
 print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
 print '<html xmlns="http://www.w3.org/1999/xhtml">';

 print '<head>';
 print '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />';
 print '<title>Local Database Access Temporarily Denied</title>';
 print '<style>';
 print 'h1.myclass {font-size: 11pt; font-style: normal; color: white; text-align: center}';
 print 'h1.myclass2 {font-size: 20pt; font-style: normal; color: red; text-align: center}';
 print 'table { background-color: #151515; }';
 print 'body { background-color: #151515; }';
 print '</style>';
 print '</head>';

 print '<body>';
 print '<table align="center" border="0" width="35%">';
 print '<tr><td align="center">';
 print '<h1 class="myclass2">';
 print 'Local Database Access Temporarily Denied';
 print '</h1>';
 print '</td></tr>';
 print '<tr><td align="center">';
 print '<h1 class="myclass">';

 exit("<br /><br /><div align='center'><img src='images/logo.gif'><br /><br /><strong>There seems to be a problem with the MariaDB server, sorry for the inconvenience.<br /><br />We should be back shortly...</strong></div>");

 print '</h1>';
 print '<br />';
 print '<img src="/images/logo.gif" alt="" />';
 print '</td></tr>';
 print '</table>';
 print '<p>';
 print '<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>';
 print '</p>';

 print '</body>';
 print '</html>';
}
