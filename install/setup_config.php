<?php

/**
*****************************************************************************************
** PHP-Nuke v8.3.2 - Project Start Date 11/04/2022 Friday 4:09 am                      **
*****************************************************************************************
**/

global $setup_admin, $dbhost, $dbname, $dbuname, $dbpass, $dbtype, $prefix, $user_prefix, $admin_file, $directory_mode, $file_mode, $debug, $use_cache, $persistency;


/*----[ Admin and 1st User Name ] -------------------------
|                                                         |
| The name of your Admin Account and 1st User Account     |
|                                                         |
---------------------------------------------------------*/

$setup_admin = 'Administrator';

/*----[ $dbhost ] ----------------------------------------
|                                                         |
| The name of your host                                   |
|                                                         |
---------------------------------------------------------*/

$dbhost = 'localhost';

/*----[ $dbname ] ----------------------------------------
|                                                         |
| The name of your database that holds your tables        |
|                                                         |
---------------------------------------------------------*/
$dbname = 'phpnukecoders_phpbb3';

/*----[ $dbuname ] ---------------------------------------
|                                                         |
| The username linked to your database, must have correct |
| permissions                                             |
|                                                         |
---------------------------------------------------------*/
$dbuname = 'phpnukecoders_db';

/*----[ $dbpass ] ----------------------------------------
|                                                         |
| The password associated with your db usersname          |
|                                                         |
---------------------------------------------------------*/
$dbpass = 'xwdNPADv86nce';

/*----[ $dbtype ] ----------------------------------------
|                                                         |
| The type of SQL server you prefer to use                |
|                                                         |
| Choose from the following (case-sensitive):             |
|    - mysql (4.x or later)                               |
|    - mysqli (PHP must be compiled with "System Mysql")  |
|                                                         |
| Default: mysqli                                         |
|                                                         |
---------------------------------------------------------*/
$dbtype = 'mysqli';

/*----[ $prefix ] ----------------------------------------
|                                                         |
| The prefix for your PHP-Nuke Titanium tables            |
|                                                         |
---------------------------------------------------------*/
$prefix = 'nuke';

/*----[ $user_prefix ] -----------------------------------
|                                                         |
| The prefix for your PHP-Nuke Titanium tables            |
| Do not change this unless it is really needed           |
|                                                         |
---------------------------------------------------------*/
$user_prefix = 'nuke';

/*----[ $admin_file ] ------------------------------------
|                                                         |
| The filename of your Admin File                         |
|                                                         |
| If you change this to something other than it's default |
| value, you must also rename the file called 'admin.php' |
| to the new value you assigned to this variable          |
|                                                         |
| Default: admin.php                                      |
|                                                         |
---------------------------------------------------------*/
$admin_file = 'admin';

/*----[ $directory_mode ] ------------------------------------------
|                                                                   |
| permissions - by default, PNT will create new folders with the    |
| permissions set with the following settings.  NOTE: do NOT use    |
| quotes around this value or it will not work.                     |
| Examples:                                                         |
| Server API = Apache = 0777                                        |
| Server API = CGI = 0755                                           |
|                                                                   |
-------------------------------------------------------------------*/
$directory_mode = 0777;

/*----[ $file_mode ] -------------------------------------------------- 
|                                                                      |
| file permissions mode - by default, PNT will create all new files    |
| with the permissions that are provided here.  NOTE: do NOT use any   |
| quotes (single or double) around this value or it will not work.     |
| Examples:                                                            |
| Server API = Apache = 0666                                           |
| Server API = CGI = 0644                                              |
|                                                                      |
----------------------------------------------------------------------*/
$file_mode = 0666;

/*----[ $debug ] -----------------------------------------
|                                                         |
| Debugging Status of your website                        |
|                                                         |
| If you want errors being shown, set this to true.       |
| It will also display evo notices at the footer,         |
| but that's visible for admins only.                     |
| If you dont want any errors being shown,                |
| set this to false.                                      |
|                                                         |
| Default: true                                           |
|                                                         |
---------------------------------------------------------*/
$debug = true;

/*----[ $use_cache ] -----=-------------------------------
|                                                         |
| Use caching of database fetched data                    |
|                                                         |
| You can choose between these options:                   |
|   0: Cache Off                                          |
|   1: File Cache                                         |
|       - Faster load, more server usage                  |
|         We recommend you use SQL cache if you have      |
|         problems with the File Cache                    |
|   2: SQL Cache                                          |
|       - One more query per page, less server usage      |
|                                                         |
| Default: 1 (File Cache)                                 |
|                                                         |
---------------------------------------------------------*/
$use_cache = 1;

/*----[ $persistency ] -----------------------------------
|                                                         |
| Allow persistent database connections                   |
| true = On                                               |
| false = Off                                             |
|                                                         |
---------------------------------------------------------*/
$persistency = false;
define('ALTER_TABLES', true); // un-comment to reset your nuke site to its default setting!
define('SETUP_URL_CHECK', 'https://www.phpnuke.coders.exchange');
define('BASE_DIR', __DIR__ . '/');
define('SETUP_GRAPHICS_DIR', BASE_DIR . 'graphics/');
define('SETUP_INCLUDE_DIR', BASE_DIR . 'includes/');
define('SETUP_LANGUAGE_DIR', BASE_DIR . 'language/');
define('SETUP_SQL_DIR', BASE_DIR . 'sql/');
define('SETUP_STEPS_DIR', BASE_DIR . 'steps/');
define('SETUP_UDL_DIR', BASE_DIR . 'udl/');
define('SETUP_STYLE_DIR', BASE_DIR . 'style/');
define('SETUP_UPGRADES_SQL_DIR', BASE_DIR . 'sql/');
define('SETUP_UPGRADES_STEPS_DIR', BASE_DIR . 'sql/');
define('SETUP_TEXTAREA_DIR', $_SERVER['DOCUMENT_ROOT']. '/includes/');
define('SETUP_NUKE_INCLUDES_DIR', $_SERVER['DOCUMENT_ROOT']. '/includes/');
define('SETUP_CACHE_DIR', $_SERVER['DOCUMENT_ROOT']. '/includes/cache/');
define('SETUP_FORUM_AVATARS_DIR', $_SERVER['DOCUMENT_ROOT']. '/modules/Forums/images/avatars/');
define('SETUP_FORUM_FILE_DIR', $_SERVER['DOCUMENT_ROOT']. '/modules/Forums/files/');
define('SETUP_GOOGLE_SITE_MAP_DIR', $_SERVER['DOCUMENT_ROOT']. '/xmls/sitemap/');
define('SETUP_IMAGE_REPOSITORY_DIR', $_SERVER['DOCUMENT_ROOT']. '/modules/Image_Repository/files/');
define('SETUP_FILE_REPOSITORY_DIR', $_SERVER['DOCUMENT_ROOT']. '/modules/File_Repository/files/');
define('SETUP_LOG_DIR', $_SERVER['DOCUMENT_ROOT']. '/includes/log/');
define('SETUP_UPLOADS_DIR', $_SERVER['DOCUMENT_ROOT']. '/');

define('ROOT_DIR', 'https://'.$_SERVER['HTTP_HOST']. '/');
if(!isset($root_dir))
$root_dir = ROOT_DIR;

define('SETUP_LANGUAGE_COMMON_DIR', $_SERVER['DOCUMENT_ROOT']. '/language/common/');
define('SETUP_THEME_MAIN_DIR', $_SERVER['DOCUMENT_ROOT']. '/themes/');
