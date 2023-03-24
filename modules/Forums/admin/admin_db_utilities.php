<?php
/***************************************************************************
*                             admin_db_utilities.php
*                              -------------------
*     begin                : Thu May 31, 2001
*     copyright            : (C) 2001 The phpBB Group
*     email                : support@phpbb.com
*
*     Id: admin_db_utilities.php,v 1.42.2.14 2006/02/10 20:35:40 grahamje Exp $
*
****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/***************************************************************************
*        We will attempt to create a file based backup of all of the data in the
*        users phpBB database.  The resulting file should be able to be imported by
*        the db_restore.php function, or by using the mysql command_line
*
*        Some functions are adapted from the upgrade_20.php script and others
*        adapted from the unoficial phpMyAdmin 2.2.0.
***************************************************************************/

/* Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 * EregToPregMatchRector (http://php.net/reference.pcre.pattern.posix https://stackoverflow.com/a/17033826/1348344 https://docstore.mik.ua/orelly/webprog/pcook/ch13_02.htm)
 * TernaryToNullCoalescingRector
 * CountOnNullRector (https://3v4l.org/Bndc9)
 * ListToArrayDestructRector (https://wiki.php.net/rfc/short_list_syntax https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring)
 * WhileEachToForeachRector (https://wiki.php.net/rfc/deprecations_php_7_2#each) ?? Rector Missed One #Bug 1
 * NullToStrictStringFuncCallArgRector
 * StrStartsWithRector (https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)
 */
 
defined('IN_PHPBB') or define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
        $filename = basename(__FILE__);
        $module['General']['Backup_DB'] = $filename . "?perform=backup";

        $file_uploads = (phpversion() >= '4.0.0') ? ini_get('file_uploads') : get_cfg_var('file_uploads');

        if( (empty($file_uploads) || $file_uploads != 0) && (strtolower($file_uploads) != 'off') && (phpversion() != '4.0.4pl1') )
        {
                $module['General']['Restore_DB'] = $filename . "?perform=restore";
        }

        return;
}

//
// Load default header
//
$no_page_header = TRUE;
//$phpbb_root_path = "./../";
$phpbb_root_path = './../';
require($phpbb_root_path . 'extension.inc');
require('./pagestart.' . $phpEx);
include("../includes/sql_parse.php");

if( !empty($setmodules) )
{
	$filename = basename(__FILE__);
	$module['General']['Backup_DB'] = $filename . "?perform=backup";

	$file_uploads = (phpversion() >= '4.0.0') ? ini_get('file_uploads') : get_cfg_var('file_uploads');

	if( (empty($file_uploads) || $file_uploads != 0) && (strtolower($file_uploads) != 'off') && (phpversion() != '4.0.4pl1') )
	{
		$module['General']['Restore_DB'] = $filename . "?perform=restore";
	}

	return;
}

global $admin_file;
//
// Begin program proper
//
if( isset($_GET['perform']) || isset($_POST['perform']) )
{
	$perform = (isset($_POST['perform'])) ? $_POST['perform'] : $_GET['perform'];

	switch($perform)
	{
		case 'restore':
		case 'backup':

			$error = false;
			switch(SQL_LAYER)
			{
				case 'oracle':
				case 'db2':
				case 'msaccess':
				case 'mssql-odbc':
					$error = true;
					break;

				case 'mysqli':
				include('./page_header_admin.'.$phpEx);
                echo '<div align="center">';
                echo '<h1>Backup and Restore Database</h1>';
                echo '<hr>';
                echo '<br>';

                echo '<form method="post" action="../../../'.$admin_file.'.php?op=backupnow">';
                echo '<button data-inline="true" type="submit" name="backupnow" title="Save database to server"> Backup To Server</button>';
                echo '</form>';
                echo '&nbsp;';
                echo '<form method="post" action="../../../'.$admin_file.'.php?op=backupdownload">';
                echo '<button data-inline="true" type="submit" name="backupdownload" title="Download database to local"> Backup To PC</button>';
                echo '</form>';


                echo '</div>';

                echo '<br>';

                echo '<form action="../../../'.$admin_file.'.php?op=import" method="post" name="upload_excel" enctype="multipart/form-data">';
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
			  
			    include('./page_footer_admin.'.$phpEx);
					break;
			}

			if ($error)
			{
				include('./page_header_admin.'.$phpEx);

				$template->set_filenames(array(
					"body" => "admin/admin_message_body.tpl")
				);

				$template->assign_vars(array(
					"MESSAGE_TITLE" => $lang['Information'],
					"MESSAGE_TEXT" => $lang['Backups_not_supported'])
				);

				$template->pparse("body");

				include('./page_footer_admin.'.$phpEx);
			}
	}
}
include('./page_footer_admin.'.$phpEx);

