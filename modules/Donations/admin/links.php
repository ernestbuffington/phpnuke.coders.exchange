<?php
/*======================================================================= 
  PHP-Nuke : Advanced Web Portal System
 =======================================================================*/


if (!defined('ADMIN_FILE')) {
    die('Access Denied');
}

global $admin_file;
adminmenu($admin_file.'.php?op=Donations', $admlang['donations'], 'donations.png');

?>