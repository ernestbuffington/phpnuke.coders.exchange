<?php
/*======================================================================= 
  PHP-Nuke : Advanced Web Portal System
 =======================================================================*/


$module_name = basename(dirname(dirname(__FILE__)));
include_once(NUKE_MODULES_DIR.$module_name.'/admin/language/lang-'.$currentlang.'.php');

switch($op) {

    case "Donations":
        include(NUKE_MODULES_DIR.$module_name.'/admin/index.php');
    break;

}

?>