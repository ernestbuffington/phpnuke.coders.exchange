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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Admin Icon/Link Pos                      v1.0.0       06/15/2005
      Theme Management                         v1.0.2       12/16/2005
-=[Module]=-
      Evolution UserInfo Block                 v1.0.0
-=[Mod]=-
      Admin Tracker                            v1.0.1       06/08/2005
      Evolution Version Checker                v1.0.0       06/16/2005
      Who is Online                            v0.9.1       06/24/2005
      Queries Count                            v2.0.1       08/21/2005
      Censor                                   v1.0.0       10/20/2005
      Cache                                    v1.0.2       11/15/2005
      Admin IP Lock                            v2.0.1       11/17/2005
      Advanced Security Code Control           v1.0.0       12/17/2005
      Lazy Google Tap                          v1.0.0       01/27/2006
      Image Resize                             v2.4.5       04/04/2006
-=[Other]=-
      URL Check                                v1.0.0       07/01/2005
      Security Status                          v1.0.0       11/01/2005
      Meta Tags                                v1.0.0       11/20/2005
      Database Manager                         v2.0.0       12/17/2005
	  CalendarMx                               v1.4.0       05/29/2009
************************************************************************/

/*    Please put all your custom language or translations here     */



define_once('_BOTH', 'Both');
define_once('_ERROR_DELETE_CONF','Are you sure that you want to delete %s?');
define_once('_BLOCKTOP','Move block to top');
define_once('_BLOCKBOTTOM','Move block to bottom');


define_once('_FROM','From');




define_once('_REVIEWTEXT','Please look over your message and check for typos');






/*****[BEGIN]******************************************
 [ Mod:  Extended Surveys Admin Interface      v1.0.0 ]
 ******************************************************/
define_once("_POLLADMIN", "Surveys Administration");
define_once("_POLLMAIN", "Surveys Admin Index");
define_once("_SURVEYSADMIN", "Surveys");
define_once("_POLLCHOOSE", "Welcome to the Surveys Administration<br />What do you want to do?");
define_once("_ADDPOLL", "Add Survey");
define_once("_CHANGEPOLL", "Change Survey");
define_once("_DELETEPOLL", "Delete Survey");
define_once("_POLL_OPTIONS", "Extra Options");
define_once("_POLL_INFO", "You can change some options here for the Surveys block");
define_once("_POLLDAYS", "Number of days between voting");
define_once("_POLLRANDOM", "Show a random Survey");
/*****[END]********************************************
 [ Mod:  Extended Surveys Admin Interface      v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Who is Online                      v0.9.1 ]
 ******************************************************/
define_once("_4nwho0a","Who is Online");
define_once("_4nwho00","<strong>4n Who is Online?</strong><br /><i>Version 0.91</i>");
define_once("_4nwho01","Back to ");
define_once("_4nwho02","Server Time: ");
define_once("_4nwho03"," Users Currently Online");
define_once("_4nwho04","Username");
define_once("_4nwho05","IP-Address");
define_once("_4nwho06","Host Name");
define_once("_4nwho07","Time Online");
define_once("_4nwho08","Edit member");
define_once("_4nwho09","Refresh");
define_once("_4nwho10","From");
define_once("_4nwho11","Newest member");
define_once("_4nwho12","Number of members");
define_once("_4nwho13","Member-Information");
define_once("_4nwho14","Guest");
define_once("_4nwho15","Unknown domain");
define_once("_4nwho16","Not a domain");
define_once("_4nwho17","At this time there are");
define_once("_4nwho18","Guest(s) and");
define_once("_4nwho19","Member(s) online.");
define_once("_4nwho20","Delete member");
// START - Please do not edit and/or delete this lines - THANKS!
define_once("_4nwhocopy","4nWhoIsOnline by <a href=\"http://warpspeed.4thdimension.de\" target=\"_blank\">www.warp-speed.de</a> @ <a href=\"http://www.4thdimension.de\" target=\"_blank\">4thDimension.de</a> Networking.");
// END - Please do not edit and/or delete this lines - THANKS!
/*****[END]********************************************
 [ Mod:     Who is Online                      v0.9.1 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Other:   URL Check                          v1.0.0 ]
 ******************************************************/
define_once("_URL_SERVER_ERROR","The URL you entered (%s) does not match the URL that the server is reporting (%s)");
define_once("_URL_CONFIRM_ERROR","Do you want to keep this setting?");
/*****[END]********************************************
 [ Other:   URL Check                          v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Base:    Cache                              v1.0.2 ]
 ******************************************************/
define_once("_CACHE_ENABLED","Enabled");
define_once("_CACHE_DISABLED", "Disabled");
define_once("_CACHE_HOWTOENABLE", "How to enable?");
define_once("_CACHE_CLEARNOW", "Clear Now");
define_once("_CACHE_NO", "No");
define_once("_CACHE_YES", "Yes");
define_once("_CACHE_GOOD", "Good");
define_once("_CACHE_BAD", "Your cache is NOT chmodded!");
define_once("_CACHE_HEADER", "Admin Cache Panel");
define_once("_CACHE_STATUS", "Cache Status:");
define_once("_CACHE_DIR_STATUS", "Cache Directory Status:");
define_once("_CACHE_NUM_FILES", "Number of cached items:");
define_once("_CACHE_LAST_CLEARED", "Cache last cleared:");
define_once("_CACHE_SIZE", "Cache size:");
define_once("_CACHE_USER_CAN_CLEAR", "User can clear cache:");
define_once("_CACHE_CLEAR", "Clear Cache");
define_once("_CACHE_RETURN", "Return to Main Administration");
define_once("_CACHE_FILENAME", "Filename");
define_once("_CACHE_FILESIZE", "File Size");
define_once("_CACHE_LASTMOD", "Last Modified");
define_once("_CACHE_OPTIONS", "Options");
define_once("_CACHE_DELETE", "Delete");
define_once("_CACHE_VIEW", "View");
define_once("_CACHE_RETURNCACHE", "Return to Cache Admin");
define_once("_CACHE_INVALID", "Invalid Operation");
define_once("_CACHE_FILE_DELETE_SUCC", "File deleted successfully");
define_once("_CACHE_FILE_DELETE_FAIL", "File deletion failed");
define_once("_CACHE_CAT_DELETE_SUCC", "Category deleted successfully");
define_once("_CACHE_CAT_DELETE_FAIL", "Category deletion failed");
define_once("_CACHE_CLEARED_SUCC", "Cache cleared successfully");
define_once("_CACHE_CLEARED_FAIL", "Cache failed to clear");
define_once("_CACHE_PREF_UPDATED_SUCC", "Preferences updated succesfully");
define_once("_CACHE_ENABLE_HOW", "To enable cache, set \$use_cache to \"1\" or \"2\" in config.php if it isn't already.");
define_once("_CACHESAFEMODE", "Safe mode is enabled on your server, cache will NOT function!");
define_once("_CACHENOTALLOWED", "You are not allowed to view this file!");
define_once("_CACHE_MODE", "Cache Mode");
define_once("_CACHE_FILEMODE", "File Cache");
define_once("_CACHE_SQLMODE", "SQL Cache");
define_once("_CACHE_TYPES", "Cache types available:");
/*****[END]********************************************
 [ Base:    Cache                              v1.0.2 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/
define_once("_SEC_STATUS", "Security Status");
define_once("_INPUT_FILTER", "Input Filter");
define_once("_SEC_OFF", "Disabled");
define_once("_SEC_ON", "Enabled");
define_once("_ADMIN_IP_LOCK", "Admin IP Lock");
/*****[END]********************************************
 [ Other:  Security Status                     v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/
define_once("_THEMES_HEADER", "<h1>Theme Management</h1>");
if (!defined('_THEMES_DEFAULT')) define_once('_THEMES_DEFAULT', 'Default Theme');
define_once("_THEMES_DEFAULT_NOT_FOUND", " was NOT found!");
define_once("_THEMES_DEFAULT_MISSING", "Your default theme is missing! ");
define_once("_THEMES_ERROR", "Error");
define_once("_THEMES_ERROR_CRITICAL", "Critical Error");
define_once("_THEMES_ERROR_MESSAGE", "Could not gather installed themes");
define_once("_THEMES_PROBLEM", "There seems to be a problem with your theme, please make sure you have a valid theme");
define_once("_THEMES_NUMTHEMES", "Number of Themes");
define_once("_THEMES_NUMUNINSTALLED", "Number of Uninstalled Themes");
define_once("_THEMES_MOSTPOPULAR", "Most Popular Theme");
define_once("_THEMES_OPTIONS", "Theme Options");
define_once("_THEMES_RETURNMAIN", "Return to Main Administration");
define_once("_THEMES_MAKEDEFAULT", "Make Default");

define_once("_THEMES_ISDEFAULT", "This theme is set as Default");
define_once("_THEMES_DOWNLOAD", "Archive Theme");

define_once("_THEMES_DEACTIVATE", "Deactivate");
define_once("_THEMES_ACTIVATE", "Activate");
define_once("_THEMES_UNINSTALL", "Uninstall");
define_once("_THEMES_EDIT", "Edit");
define_once("_THEMES_VIEW", "View");
define_once("_THEMES_NONE", "None");
define_once("_THEMES_NAME", "Theme Name");
define_once("_THEMES_CUSTOMN", "Custom Name");
define_once("_THEMES_NUMUSERS", "# of Users");
define_once("_THEMES_PREVIEW", "Preview");
define_once("_THEMES_STATUS", "Status");
define_once("_THEMES_GROUPS", "Groups");
define_once("_THEMES_OPTS", "Options");
define_once("_DOWNLOAD_FILES","Download Theme Backup");
define_once("_THEME_BACKUP","Backup (ZIP)");
define_once("_THEMES_INSTALLED", "Installed Themes");
define_once("_THEMES_ALLUSERS", "All Users");
define_once("_THEMES_GROUPSONLY", "Groups Only");
define_once("_THEMES_ADMINS", "Administrators");
define_once("_THEMES_UNINSTALLED", "Uninstalled Themes");
define_once("_THEMES_QINSTALL", "Quick Install");
define_once("_THEMES_INSTALL", "Install");
define_once("_THEMES_CUSTOMNAME", "Custom Theme Name");
define_once("_THEMES_ACTIVE", "Active");
define_once("_THEMES_INACTIVE", "Inactive");
define_once("_THEMES_RETURN", "Return to Theme Management");
define_once("_THEMES_UPDATED", "Theme Updated!");
define_once("_THEMES_UPDATEFAILED", "Failed to Update Theme!");
define_once("_THEMES_THEME_INSTALLED", "Theme Installed!");
define_once("_THEMES_THEME_INSTALLED_FAILED", "Failed to Install Theme!");
define_once("_THEMES_THEME_UNINSTALLED", "Theme uninstalled successfully");
define_once("_THEMES_THEME_UNINSTALLED_FAILED", "Theme uninstallation failed!");
define_once("_THEMES_UNINSTALL1", "Are you sure you wish to uninstall this theme?");
define_once("_THEMES_UNINSTALL2", "You will lose ALL your settings for this theme!");
define_once("_THEMES_UNINSTALL3", "This will set ALL users using this theme back to the default theme!");
define_once("_THEMES_THEME_UNINSTALL", "Uninstall Theme");
if (!defined('_THEMES_QUNINSTALLED')) define_once('_THEMES_QUNINSTALLED', 'Uninstalled');
define_once("_THEMES_THEME_MISSING", "Theme Missing!");
define_once("_THEMES_THEME_DEACTIVATED", "Theme deactivated successfully!");
define_once("_THEMES_THEME_DEACTIVATED_FAILED", "Theme deactivation failed!");
define_once("_THEMES_DEACTIVATE1", "Are you sure you wish to deactivate this theme?");
define_once("_THEMES_DEACTIVATE2", "This will set ALL users using this theme back to the default theme!");
define_once("_THEMES_THEME_DEACTIVATE", "Deactivate Theme");
define_once("_THEMES_TRANSFER", "Transfer Theme Users");
define_once("_THEMES_MANG_OPTIONS", "Theme Management Options");
define_once("_THEMES_ALLOWCHANGE", "Allow User Theme Selection");
define_once("_THEMES_SUBMIT", "Submit");
define_once("_THEMES_SETTINGS_UPDATED", "Settings Updated!");
define_once("_THEMES_THEME_TRANSFER", "Theme Transfer");
define_once("_THEMES_RETURN_OPTIONS", "Return to Theme Options");
define_once("_THEMES_VIEW_STATS", "View Statistics");
define_once("_THEMES_FROM", "From Theme");
define_once("_THEMES_TO", "To Theme");
define_once("_THEMES_TRANSFER_UPDATED", "user(s) were updated!");
define_once("_THEMES_THEMES", "Themes");
define_once("_THEMES_ADV_OPTS", "Advanced Theme Options");
define_once("_THEMES_ADV_COMP", "Your theme is compatible with Advanced Features");
define_once("_THEMES_DEF_LOADED", "Default options are loaded below.");
define_once("_THEMES_REST_DEF", "Restore Default");
define_once("_THEMES_NOT_COMPAT", "<h1><span style=\"color: red;\"><strong>Your theme does not have any Advanced Theme Features!</strong></span></h1><span style=\"color: lime;\">You can add a <span style=\"color: red;\"><strong>theme_info.php</strong></span> file to the root directory of your theme and this will allow you to add advanced features to this theme.</span>");
define_once("_THEMES_PERMISSIONS", "Permissions");
define_once("_THEMES_LIST", "Return to Theme List");
define_once('_THEMES_DOWNLOAD_FILES','Download & Back up Theme');
define_once('_THEMES_USER_OPTIONS', 'User Options');
define_once('_THEMES_USERID', 'User ID');
define_once('_THEMES_USERNAME', 'Username');
define_once('_THEMES_REALNAME', 'Realname');
define_once('_THEMES_USEREMAIL', 'EMail');
define_once('_THEMES_USERTHEME', 'Theme');
define_once('_THEMES_FUNCTIONS', 'Functions');
define_once('_THEMES_USER_RESET', 'Reset to Default');
define_once('_THEMES_USER_MODIFY', 'Modify Theme');
if (!defined('_THEMES_SUBMIT')) define_once('_THEMES_SUBMIT', 'Submit');
define_once('_NOREALNAME', 'N/A');
define_once('_THEMES_PAGE_FIRST', 'First');
define_once('_THEMES_PAGE_PREVIOUS', 'Prev');
define_once('_THEMES_PAGE_NEXT', 'Next');
define_once('_THEMES_PAGE_LAST', 'Last');
define_once('_THEMES_PAGE_OF', 'of');
define_once('_THEMES_USER_SELECT', 'Select User Theme');

/*****[END]********************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/



/*****[BEGIN]******************************************
 [ Other:    Database Manager                  v2.0.0 ]
 ******************************************************/
define_once("_DATABASE_ADMIN_HEADER", "Database Backup Panel");
define_once("_DATABASE_RETURNMAIN", "Return to Main Administration");
define_once("_DATABASE", "Database");
define_once("_ACTIONRESULTS", "Here are the results of your");
define_once("_IMPORTSUCCESS","Importation of <em>%s</em> was successful");
define_once("_CHECKALL","Check All");
define_once("_UNCHECKALL","Uncheck All");
define_once("_SAVEDATABASE","Backup DB");
define_once("_ANALYZEDATABASE","Analyze");
define_once("_CHECKDATABASE","Check");
define_once("_OPTIMIZEDATABASE","Optimize");
define_once("_REPAIRDATABASE","Repair");
define_once("_STATUSDATABASE","Status");
define_once("_BACKUPTASKS","Backup Tasks");
define_once("_SAVEDATA","Save Data");
define_once("_INCLUDESTATEMENT","Include %s statement");
define_once("_GZIPCOMPRESS","Use GZIP Compression");
define_once("_OPTIMIZETEXT",'<strong>OPTIMIZE</strong></div><br /><div align="justify">Should be used if you have deleted a large part of a table or if you have made many changes to a table with variable-length rows (tables that have VARCHAR, BLOB, or TEXT columns). Deleted records are maintained in a linked list and subsequent INSERT operations reuse old record positions. You can use OPTIMIZE to reclaim the unused space and to defragment the datafile.<br />
In most setups you don\'t have to run OPTIMIZE at all. Even if you do a lot of updates to variable length rows it\'s not likely that you need to do this more than once a month/week and only on certain tables.</div><br />
OPTIMIZE works in the following way:<ul>
<li>If the table has deleted or split rows, repair the table.</li>
<li>If the index pages are not sorted, sort them.</li>
<li>If the statistics are not up to date (and the repair couldn\'t be done by sorting the index), update them.</li>
</ul><strong>Note:</strong> the table is locked during the time in which OPTIMIZE is running!<br /><strong>Note:</strong> This admin backup module has been updated for PHP 7.xx');
define_once("_IMPORTFILE","Import SQL File");
define_once("_IMPORTSQL", "Import");
define_once("_DBACTION", "Action");
/*****[END]********************************************
 [ Other:    Database Manager                  v2.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Other:    System Info                       v1.0.0 ]
 ******************************************************/
define_once("_PHP_MODULES", "PHP Modules");
define_once("_SQL_SRV", "SQL Server");
define_once("_PHP_QUICKS", "Quick Stats:");
define_once("_PHP_EXT_STATUS", "Extended Status:");
define_once("_PHP_SPACER", "&nbsp;");
define_once("_INFO_GENERAL", "General");
define_once("_INFO_ADMIN_HEADER", "System Info :: Admin Panel");
define_once("_INFO_RETURNMAIN", "Return to Main Administration");
define_once("_INFO_SERVER_V", "Server Version");
define_once("_INFO_CLIENT_V", "Client Version");
define_once("_INFO_HOST_CONN", "Host Connection");
define_once("_GENERAL_INFO", "General Info");
define_once("_CMS_V", "CMS Version");
define_once("_CMS_R", "CMS Root");
define_once("_GD_VER", "GD Version");
define_once("_NOT_AVAILABLE", "N/A");
define_once("_SESSIONS_S_P", "Session save_path");
define_once("_PHP_VER", "PHP Version");
define_once("_MYSQL_VER", "MySQL Version");
define_once("_OWNER", "Owner");
define_once("_GROUP", "Group"); 
/*****[END]********************************************
 [ Other:    System Info                       v1.0.0 ]
 ******************************************************/

/*--FNL--*/

/*****[BEGIN]******************************************
 [ Modules:  CalendarMx                       v1.4.0c ]
 ******************************************************/
define_once("_CALNAME","Event Calendar");
/*****[END]********************************************
 [ Modules:  CalendarMx                       v1.4.0c ]
 ******************************************************/



/*****[BEGIN]******************************************
 [ Mod:     Evolution UserInfo Block           v1.0.0 ]
 ******************************************************/
define_once('_EVO_USERINFO','Evo UserInfo Block');
/*****[END]********************************************
 [ Mod:     Evolution UserInfo Block           v1.0.0 ]
 ******************************************************/



/*****[BEGIN]******************************************
 [ Base:    Blocks                             v.1.0.0]
 ******************************************************/
define_once('_BLOCK_ADMIN_HEADER', 'Admin Blocks Panel');
define_once('_BLOCK_RETURNMAIN', 'Return to Main Administration');
define_once('_BLOCK_ADMIN_NOTE', 'Please note that when you activate or deactivate a block here<br />that it will be instant to users but not to you, until you refresh your screen!');
define_once('_BLOCK_INACTIVE','Block is not active<br />(Double click to activate/deactivate)');
define_once('_BLOCK_LINK_DELETE','Delete a block');
define_once('_BLOCK_TITLE','TITLE');
define_once('_BLOCK_EDIT','Block Edit');
/*****[END]********************************************
 [ Base:    Blocks                             v.1.0.0]
 ******************************************************/


 


?>