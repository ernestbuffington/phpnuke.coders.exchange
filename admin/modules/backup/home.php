<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $prefix, $db, $admin_file;

$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {

global $admin_file;

echo '<div align="center">';
echo '<h1>Backup and Restore Database</h1>';
echo '<hr>';
echo '<br>';

echo '<form method="post" action="'.$admin_file.'.php?op=backupnow">';
echo '<button data-inline="true" type="submit" name="backupnow" title="Save database to server"> Backup To Server</button>';
echo '</form>';
echo '&nbsp;';
echo '<form method="post" action="'.$admin_file.'.php?op=backupdownload">';
echo '<button data-inline="true" type="submit" name="backupdownload" title="Download database to local"> Backup To PC</button>';
echo '</form>';


echo '</div>';

echo '<br>';

echo '<form action="'.$admin_file.'.php?op=import" method="post" name="upload_excel" enctype="multipart/form-data">';
echo '<fieldset>';

echo '<!-- Form Name -->';
echo '<legend><strong>Restore Backup</strong></legend>';
echo '<!-- File Button -->';

echo '<div>';
echo '<label for="filebutton">Select File</label>';

echo '<div>';
echo '<input type="file" name="file" id="file" accept=".sql" required>';
echo '</div>';

echo '</div>';

echo '<!-- Button -->';
echo '<div>';
echo '<label for="singlebutton">Import File</label>';

echo '<div>';
echo '<button type="submit" title="Restore backup" id="submit" name="Import" data-loading-text="Loading...">Import <i class="fa fa-upload" aria-hidden="true"></i>';
echo '</button>';
echo '</div>';

echo '</div>';
echo '</fieldset>';
echo '</form>';
    
} else {
	echo "Access Denied";
}
