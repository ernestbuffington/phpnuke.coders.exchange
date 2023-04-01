<?php
global $dbtype, $dbhost, $dbuname, $dbpass, $dbname, $user_prefix;

$dbtype = strtolower($dbtype); 

if(defined('INSIDE_MOD')) {
include_once '../../../config.php';	
include_once '../../../mainfile.php';
} else {
include_once PHPBB_BASE_DIR.'../../config.php';	
include_once PHPBB_BASE_DIR.'../../mainfile.php';
}

// phpBB 3.0.x auto-generated configuration file
// Do not change anything in this file!
$dbms = $dbtype;
$dbhost = $dbhost;
$dbport = '';
$dbname = $dbname;
$dbuser = $dbuname;
$dbpasswd = $dbpass;

$prefix_phpbb3 = 'phpbb_';
$acm_type = 'file';
$load_extensions = '';

define('PHPBB3_INSTALLED', true);
//define('DEBUG', true);
//define('DEBUG_EXTRA', true);
?>