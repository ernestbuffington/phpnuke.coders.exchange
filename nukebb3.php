<?php
/***************************************************************************
 * phpbb3 forums port for phpNuke8.3 version 1.0 (c) 2023 - Ernest Allen Buffington
 *   This module produced for the phpnuke.coders.exchange site.
 ***************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])):
  Header("Location: index.php");
  die();
endif;
    
global $db, $cookie, $user, $prefix, $phpbb_root_path, $nuke_root_path, $nuke_file_path, $phpbb_root_dir, $name, $file;
global $user_prefix, $dbtype, $dbhost, $dbuname, $dbpass, $dbname, $user_prefix;
global $sqlserver, $sqluser, $sqlpassword, $database, $port, $persistency, $new_link;

$dbtype = strtolower($dbtype);

define('MODULE_NAME', "Forums");
define('NO_EDITOR', 1);
$nuke_root_path = "modules.php?name=".MODULE_NAME;
$nuke_file_path = "modules.php?name=".MODULE_NAME."&file=";
$phpbb_root_path = $_SERVER['DOCUMENT_ROOT'].'/modules/Forums/';
//Define("PHPBB_ROOT_PATH",  "modules/".MODULE_NAME."/");
$phpbb_root_dir = "./../";

require_once("mainfile.php");

// phpBB 3.0.x auto-generated configuration file
// Do not change anything in this file!
$dbtype = 'mysqli';
$sqlserver = $dbhost;
$port = $dbport = '';
$database = $dbname;
$sqluser = $dbuname;
$sqlpassword = $dbpass;

$prefix_phpbb3 = 'forum_';
$user_prefix = "nuke";
$acm_type = 'file';
$load_extensions = '';

define('PHPBB3_INSTALLED', true);
//define('DEBUG', true);
//define('DEBUG_EXTRA', true);

?>
