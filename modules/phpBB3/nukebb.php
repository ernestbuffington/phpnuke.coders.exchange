<?php
/*======================================================================= 
  PHP-Nuke Titanium | Nuke-Evolution Xtreme : PHP-Nuke Web Portal System
 =======================================================================*/
/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/
if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

global $module_path, $module_file_path, $phpbb_root_path, $module_name;

define('MODULE_NAME', "phpBB3");
define('NO_EDITOR', 1);

$module_path = "modules.php?name=phpBB3";
$module_file_path = "modules.php?name=phpBB3&file=";
$phpbb_root_path = $_SERVER['DOCUMENT_ROOT'].'/modules/phpBB3/';
$module_name = basename(dirname(__FILE__));
get_lang($module_name);
define('PHPBB3_INSTALLED', true);
include_once(NUKE_BASE_DIR.'header.php');
?>