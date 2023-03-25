<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* PHP-Nuke Installer was based on Joomla Installer                     */
/* Joomla is Copyright (c) by Open Source Matters                       */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
error_reporting(E_ALL ^ E_NOTICE);

if(defined('IN_NUKE')):
  die ("Error 404 - Page Not Found");
endif;

define("IN_NUKE",true);
define('INSETUP',true);

require_once( 'version.php' );

require_once("setup_config.php");
require_once("functions.php");
require_once(SETUP_NUKE_INCLUDES_DIR.'functions_selects.php');

global $setup_admin, $db, $dbhost, $dbname, $dbuname, $dbpass, $dbtype, $prefix, $user_prefix, $admin_file, $directory_mode, $file_mode, $debug, $use_cache, $persistency;

$error = ((!isset($gpl) OR $gpl != "yes" OR !isset($lgpl) OR $lgpl != "yes") AND !isset($postback));
$errors = ["db_host"=>false, "db_host_msg"=>"", "db_user"=>false, "db_user_msg"=>"", "db_name"=>false, "upload_directory"=>false, "upload_directory"=>false];

if (!isset($db_type)) 
$db_type = "MySQLi";
if (!isset($db_host)) 
$db_host = "localhost";
if (!isset($db_user)) 
$db_user = "";
if (!isset($db_pass)) 
$db_pass = "";
if (!isset($db_name)) 
$db_name = "";
if (!isset($db_prefix)) 
$db_prefix = "nuke";
if (!isset($db_persistency)) 
$db_persistency = "false";
if (!isset($upload_directory)) 
$upload_directory = "uploads";
if (!isset($use_rsa)) 
$use_rsa = "false";
if (!isset($rsa_modulo)) 
$rsa_modulo = 0;
if (!isset($rsa_public)) 
$rsa_public = 0;
if (!isset($rsa_private)) 
$rsa_private = 0;

$showpanel = false;


//Configuration file prototype. Copyright Notice included ;)
$configproto = <<<EOF
<?php
/* ---------------------------------
Database Configuration
You have to Configure your Database
Connection Here. Here is a Quick
Explanation:

db_type: your Database Type
    Possible Options:
        MySQL
        MySQL4
        MySQLi
        Postgres
        MSSQL
        Oracle
        MSAccess
        MSSQL-ODBC
        DB2

db_host     : Host where your Database Runs
db_port     : Not Used
db_user     : Database Username
db_password : Database Password
db_name     : Database Name on Server
db_prefix   : Prefix for Tables
persistency : Connection Persistency
--------------------------------- */
\$db_type        = "$db_type";
\$db_host        = "$db_host";
\$db_user        = "$db_user";
\$db_pass        = "$db_pass";
\$db_name        = "$db_name";
\$db_prefix      = "$db_prefix"; //Without "_"
\$db_persistency = $db_persistency;

/* ---------------------------------
RSA Engine Configuration
Make sure you ran rsa_keygen BEFORE
Configuring RSA. You NEED a VALID
Key Pair to Enable RSA.
You can Copy & Paste the rsa_keygen Output
--------------------------------- */
\$use_rsa     = $use_rsa;
\$rsa_modulo  = $rsa_modulo;
\$rsa_public  = $rsa_public;
\$rsa_private = $rsa_private;

/*----------------------------------
Torrent Upload Directory
You can Change the Default Setting,
but Remember that it MUST be Writeable
by httpd/IUSR_MACHINE User
----------------------------------*/
\$uploads_dir = "$upload_directory";

?>
EOF;
?>
<?php
// Set flag that this is a parent file
define( "_VALID_MOS", 1 );

/** Include common.php */
require_once( 'common.php' );

require_once(SETUP_INCLUDE_DIR."configdata.php");
require_once(SETUP_UDL_DIR."database.php");
require_once(BASE_DIR.'functions.php');

$db = new sql_db($db_host, $db_user, $db_pass, $db_name, $db_persistency);

$_SESSION['dbhost'] = $db_host;
$_SESSION['dbuser'] = $db_user;
$_SESSION['dbpass'] = $db_pass;
$_SESSION['dbname'] = $db_name;
$_SESSION['dbtype'] = $db_type;
$_SESSION['user_prefix'] = $db_prefix;
$_SESSION['prefix'] = $db_prefix;

$can_proceed = true;
				
$nuke_name = "PHP-Nuke v8.3.2 ";
$sql_version = '10.3.38-MariaDB'; //mysqli_get_server_info();
$os = '';

if (!isset($_SESSION['language']) || $_SESSION['language'] == 'english'){
    $_SESSION['language'] = $_POST['language'] ?? 'english';
}

if ($_SESSION['language']){
    if (is_file(BASE_DIR.'language/' . $_SESSION['language'] . '.php')){
        include(BASE_DIR.'language/' . $_SESSION['language'] . '.php');
		include(BASE_DIR.'language/lang_english/' . $_SESSION['language'] . '-lang-install.php');
	} else {
        include(BASE_DIR.'language/lang_english/english-lang-install.php');
    }
}

if(function_exists('ob_gzhandler') && !ini_get('zlib.output_compression')):
  ob_start('ob_gzhandler');
else:
  ob_start();
endif;

ob_implicit_flush(0);

define("_VERSION","8.3.2");

if(!ini_get("register_globals")): 
  if (phpversion() < '5.4'): 
    import_request_variables('GPC');
  else:
    # EXTR_PREFIX_SAME will extract all variables, and only prefix ones that exist in the current scope.
	extract($_REQUEST, EXTR_PREFIX_SAME,'GPS');
  endif;
endif;

$step = 5;

$total_steps = '10';
$next_step = $step+1;
$continue_button = '<input type="hidden" name="step" value="'.$next_step.'" /><input type="submit" class="button" name="submit" value="'.$install_lang['continue'].' '.$next_step.'" />';

//check_required_files();

$safemodcheck = ini_get('safe_mod');

if ($safemodcheck == 'On' || $safemodcheck == 'on' || $safemodcheck == true){
    echo '<table id="menu" border="1" width="100%">';
    echo '  <tr>';
    echo '    <th id="rowHeading" align="center">'.$nuke_name.' '.$install_lang['installer_heading'].' '.$install_lang['failed'].'</th>';
    echo '  </tr>';
    echo '  <tr>';
    echo '    <td align="center"><span style="color: #ff0000;"><strong>'.$install_lang['safe_mode'].'</strong></span></td>';
    echo '  </tr>';
    echo '</table>';
    exit;
}

if (isset($_POST['download_file']) && !empty($_SESSION['configData']) && !$_POST['continue']){
    header("Content-Type: text/x-delimtext; name=config.php");
    header("Content-disposition: attachment; filename=config.php");
    $configData = $_SESSION['configData'];
    echo $configData;
    exit;
}
else {
$configData = [];
}

global $cookiedata_admin, $cookiedata;

if(!isset($cookiedata_admin))
$cookiedata_admin = '';
if(!isset($cookiedata))
$cookiedata = '';
if(!isset($cookie_location))
$cookie_location = (string) $_SERVER['PHP_SELF'];

setcookie('admin',$cookiedata_admin, ['expires' => time()+2_592_000, 'path' => $cookie_location]);
setcookie('user',$cookiedata, ['expires' => time()+2_592_000, 'path' => $cookie_location]);

if(isset($dbhost)){ $DBhostname = $dbhost; } else { $DBhostname = mosGetParam( $_POST, 'DBhostname', '' ); }
if(isset($dbuname)){ $DBuserName = $dbuname; } else { $DBuserName = mosGetParam( $_POST, 'DBuserName', '' ); }
if(isset($dbpass)){ $DBpassword = $dbpass; } else { $DBpassword = mosGetParam( $_POST, 'DBpassword', '' ); }
if(isset($dbname)){ $DBname = $dbname; } else { $DBname = mosGetParam( $_POST, 'DBname', '' ); }

$sitename  	= mosGetParam( $_POST, 'sitename', '' );
$adminEmail = mosGetParam( $_POST, 'adminEmail', '');
$siteUrl  	= mosGetParam( $_POST, 'siteUrl', '' );
$absolutePath = mosGetParam( $_POST, 'absolutePath', '' );
$adminPassword = mosGetParam( $_POST, 'adminPassword', '');

if ((trim($adminEmail== "")) || (preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/", $adminEmail )==false)) {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";
	echo "<script>alert('You must provide a valid admin email address.'); document.stepBack.submit(); </script>";
	return;
}

if($DBhostname && $DBuserName && $DBname) {
	$configArray['DBhostname']	= $DBhostname;
	$configArray['DBuserName']	= $DBuserName;
	$configArray['DBpassword']	= $DBpassword;
	$configArray['DBname']	 	= $DBname;
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";

	echo "<script>alert('The database details provided are incorrect and/or empty'); document.stepBack.submit(); </script>";
	return;
}

if ($sitename) {
		$configArray['sitename'] = $sitename;
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";

	echo "<script>alert('The sitename has not been provided'); document.stepBack2.submit();</script>";
	return;
}

$canWrite = true; // fopen can write to files no matter what!

if ($siteUrl) {
	$configArray['siteUrl']=$siteUrl;
	// Fix for Windows
	$absolutePath= str_replace("\\\\","/", $absolutePath);
	$configArray['absolutePath']=$absolutePath;

$config = "<?php\n";
$config .= "\n";
$config .= "######################################################################\n";
$config .= "# PHP-NUKE: Advanced Content Management System\n";
$config .= "# ============================================\n";
$config .= "#\n";
$config .= "# Copyright (c) 2023 by Francisco Burzi (Frank)\n";
$config .= "# http://phpnuke.org\n";
$config .= "#\n";
$config .= "# This program is free software. You can redistribute it and/or modify\n";
$config .= "# it under the terms of the GNU General Public License as published by\n";
$config .= "# the Free Software Foundation; either version 2 of the License.\n";
$config .= "######################################################################\n";
$config .= "\n";
$config .= "if (stristr(htmlentities(\$_SERVER['PHP_SELF']), \"config.php\")) {\n";
$config .= "	   Header(\"Location: index.php\");\n";
$config .= "    die();\n";
$config .= "}\n";
$config .= "\n";
$config .= "######################################################################\n";
$config .= "# Database & System Config\n";
$config .= "#\n";
$config .= "# dbhost:       SQL Database Hostname\n";
$config .= "# dbuname:      SQL Username\n";
$config .= "# dbpass:       SQL Password\n";
$config .= "# dbname:       SQL Database Name\n";
$config .= "# \$prefix:      Your Database table's prefix\n";
$config .= "# \$user_prefix: Your Users' Database table's prefix (To share it)\n";
$config .= "# \$dbtype:      Your Database Server type. Supported servers are:\n";
$config .= "#               MySQL, mysql4, sqlite, postgres, mssql, oracle,\n";
$config .= "#               msaccess, db2 and mssql-odbc\n";
$config .= "#               Be sure to write it exactly as above, case SeNsItIvE!\n";
$config .= "# \$sitekey:	Security Key. CHANGE it to whatever you want, as long\n";
$config .= "#               as you want. Just don't use quotes.\n";
$config .= "# \$subscription_url: If you manage subscriptions on your site, you\n";
$config .= "#                    must write here the url of the subscription\n";
$config .= "#                    information/renewal page. This will send by\n";
$config .= "#                    email if set.\n";
$config .= "# \$admin_file: Administration panel filename. \"admin\" by default for\n";
$config .= "#   		   \"admin.php\". To improve security please rename the file\n";
$config .= "#              \"admin.php\" and change the \$admin_file value to the\n";
$config .= "#              new filename (without the extension .php)\n";
$config .= "######################################################################\n";
$config .= "\n";
$config .= "\$dbhost = \"{$configArray['DBhostname']}\";\n";
$config .= "\$dbuname = \"{$configArray['DBuserName']}\";\n";
$config .= "\$dbpass = \"{$configArray['DBpassword']}\";\n";
$config .= "\$dbname = \"{$configArray['DBname']}\";\n";
$config .= "\n";
$config .= "\$prefix = \"nuke\";\n";
$config .= "\$user_prefix = \"nuke\";\n";
$config .= "\$dbtype = \"MySQLi\";\n";
$config .= "\n";
$skey = mosMakePassword(40);
$config .= "\$sitekey = \"$skey\";\n";
$config .= "\n";
$config .= "\$subscription_url = \"\";\n";
$config .= "\n";
$config .= "\$admin_file = \"admin\";\n";
$config .= "\n";
$config .= "\$directory_mode = 0777;\n";
$config .= "\n";
$config .= "\$file_mode = 0666;\n";
$config .= "\n";
$config .= "\$debug = true;\n";
$config .= "\n";
$config .= "\$use_cache = 1;\n";
$config .= "\n";
$config .= "\$persistency = false;\n";
$config .= "\n";
$config .= "\n";
$config .= "/**********************************************************************/\n";
$config .= "/* You have finished configuring the Database. Now you can change all */\n";
$config .= "/* you want in the Administration Section.   To enter just launch     */\n";
$config .= "/* your web browser pointing it to http://xxxxxx.xxx/admin.php        */\n";
$config .= "/* (Change xxxxxx.xxx to your domain name, for example: phpnuke.org)  */\n";
$config .= "/*                                                                    */\n";
$config .= "/* Remember to go to Preferences section where you can configure your */\n";
$config .= "/* new site. In that menu you can change all you need to change.      */\n";
$config .= "/*                                                                    */\n";
$config .= "/* Congratulations! now you have an automated news portal!            */\n";
$config .= "/* Thanks for choosing PHP-Nuke: The Future of the Web                */\n";
$config .= "/**********************************************************************/\n";
$config .= "\n";
$config .= "// DO NOT TOUCH ANYTHING BELOW THIS LINE UNTIL YOU KNOW WHAT YOU'RE DOING\n";
$config .= "\n";
$config .= "\$prefix = empty(\$user_prefix) ? \$prefix : \$user_prefix;\n";
$config .= "\$reasons = array(\"As Is\",\"Offtopic\",\"Flamebait\",\"Troll\",\"Redundant\",\"Insighful\",\"Interesting\",\"Informative\",\"Funny\",\"Overrated\",\"Underrated\");\n";
$config .= "\$badreasons = 4;\n";
$config .= "\n";
$config .= "\$AllowableHTML = array(\"img\"=>2,\"span\"=>2,\"font\"=>2,\"b\"=>1,\"i\"=>1,\"strike\"=>1,\"div\"=>2,\"u\"=>1,\"a\"=>2,\"em\"=>1,\"br\"=>1,\"strong\"=>1,\"blockquote\"=>1,\"tt\"=>1,\"li\"=>1,\"ol\"=>1,\"ul\"=>1);\n";
$config .= "\$CensorList = array(\"cuntlapper\",\"fuck\",\"cunt\",\"fucker\",\"fucking\",\"pussy\",\"cock\",\"c0ck\",\"cum\",\"twat\",\"clit\",\"bitch\",\"fuk\",\"cornhole\",\"fuking\",\"motherfucker\");\n";
$config .= "\$tipath = \"images/topics/\";\n";
$config .= "\n";
$config .= "//***************************************************************\n";
$config .= "// IF YOU WANT TO LEGALY REMOVE ANY COPYRIGHT NOTICES PLAY FAIR AND CHECK: http://phpnuke.coders.exchange/modules.php?name=Commercial_License\n";
$config .= "// COPYRIGHT NOTICES ARE GPL SECTION 2(c) COMPLIANT AND CAN'T BE REMOVED WITHOUT PHP-NUKE'S AUTHOR WRITTEN AUTHORIZATION\n";
$config .= "// THE USE OF COMMERCIAL LICENSE MODE FOR PHP-NUKE HAS BEEN APPROVED BY THE FSF (FREE SOFTWARE FOUNDATION)\n";
$config .= "// YOU CAN REQUEST INFORMATION ABOUT THIS TO GNU.ORG REPRESENTATIVE. THE EMAIL THREAD REFERENCE IS #213080\n";
$config .= "// YOU'RE NOT AUTHORIZED TO CHANGE THE FOLLOWING VARIABLE'S VALUE UNTIL YOU ACQUIRE A COMMERCIAL LICENSE\n";
$config .= "// (http://phpnuke.coders.exchange/modules.php?name=Commercial_License)\n";
$config .= "//***************************************************************\n";
$config .= "\n";
$config .= "\$commercial_license = 0;\n";
$config .= "\n";
$config .= "?>";

    $fp = fopen("../config.php", "w"); 
	fputs( $fp, $config, strlen( $config ) );
	fclose( $fp );
    //35 over is user level
	$database = new sql_db($db_host, $db_user, $db_pass, $db_name, $db_persistency);
	$nullDate = $database->getNullDate();

	// create the admin user
	$cryptpass = md5( $adminPassword );
	$sql="INSERT INTO nuke_authors VALUES ('$setup_admin', 'God', 'https://".$_SERVER['SERVER_NAME']."', '$adminEmail', '$cryptpass', 0, 1, '') ";
	$result=$db->sql_query($sql);

	$date = date("F j, Y");

	// create the 1st user
	$sql="INSERT INTO `nuke_users` (`user_id`, `name`, `username`, `user_email`, `femail`, `user_website`, `user_avatar`, `nuke_user_regdate`, `user_icq`, `user_occ`, `user_from`, `user_interests`, `user_sig`, `user_viewemail`, `user_theme`, `user_aim`, `user_yim`, `user_msnm`, `user_password`, `storynum`, `umode`, `uorder`, `thold`, `noscore`, `bio`, `ublockon`, `ublock`, `theme`, `commentmax`, `counter`, `newsletter`, `nuke_user_posts`, `user_attachsig`, `nuke_user_rank`, `user_level`, `broadcast`, `popmeson`, `user_active`, `user_session_time`, `user_session_page`, `user_lastvisit`, `nuke_user_timezone`, `nuke_user_style`, `user_lang`, `nuke_user_dateformat`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `nuke_user_emailtime`, `user_allowhtml`, `user_allowbbcode`, `user_allowsmile`, `user_allowavatar`, `user_allow_pm`, `user_allow_viewonline`, `user_notify`, `user_notify_pm`, `user_popup_pm`, `user_avatar_type`, `user_sig_bbcode_uid`, `user_actkey`, `user_newpasswd`, `points`, `last_ip`, `karma`) VALUES
(2, '', '$setup_admin', '$adminEmail', '', '', 'blank.gif', '$date', '', '', '', '', '', 0, 0, '', '', '', '$cryptpass', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, 0, 0, 0, 0, 2, 0, 0, 1, 0, 0, 0, 10, NULL, 'english', 'D M d, Y g:i a', 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 3, NULL, NULL, NULL, 0, '0', 0) ";
	$result=$db->sql_query($sql);

	// touch config table
	$sql="UPDATE nuke_config SET sitename='$sitename', nukeurl='$siteUrl', startdate='$date', adminmail='$adminEmail', backend_title='$sitename', notify_email='$adminEmail' ";
	$result=$db->sql_query($sql);


} else {
?>
	<form action="install3.php" method="post" name="stepBack3" id="stepBack3">
	  <input type="hidden" name="DBhostname" value="<?php echo $DBhostname;?>" />
	  <input type="hidden" name="DBusername" value="<?php echo $DBuserName;?>" />
	  <input type="hidden" name="DBpassword" value="<?php echo $DBpassword;?>" />
	  <input type="hidden" name="DBname" value="<?php echo $DBname;?>" />
	  <input type="hidden" name="DBcreated" value="1" />
	  <input type="hidden" name="sitename" value="<?php echo $sitename;?>" />
	  <input type="hidden" name="adminEmail" value="$adminEmail" />
	  <input type="hidden" name="siteUrl" value="$siteUrl" />
	  <input type="hidden" name="absolutePath" value="$absolutePath" />
	</form>
	<script>alert('The site url has not been provided'); document.stepBack3.submit();</script>
<?php
}
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP-Nuke <?=_VERSION?> - Installer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="install.css" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="phpnuke"><img src="header_install.png" alt="PHP-Nuke Installation" /></div>
	</div>
</div>
<div id="ctr" align="center">
	<form action="dummy" name="form" id="form">
	<div class="install">
		<div id="stepbar">
			<div class="step-off">Pre-installation Check</div>
			<div class="step-off">License</div>
			<div class="step-off">Step 1</div>
			<div class="step-off">Step 2</div>
			<div class="step-off">Step 3</div>
			<div class="step-on">Step 4</div>
		</div>
    
    		<div id="right">
			<div id="step">Step 4</div>
			<div class="far-right">
				<input class="button" type="button" name="runSite" value="View Site"
<?php
				if ($siteUrl) {
					echo "onClick=\"window.location.href='$siteUrl/index.php' \"";
				} else {
					echo "onClick=\"window.location.href='".$configArray['siteURL']."/index.php' \"";
				}
?>/>
				<input class="button" type="button" name="Admin" value="Administration"
<?php
				if ($siteUrl) {
					echo "onClick=\"window.location.href='$siteUrl/admin.php' \"";
				} else {
					echo "onClick=\"window.location.href='".$configArray['siteURL']."/admin.php' \"";
				}
?>/>
			</div>
			<div class="clr"></div>
			<h1>Congratulations! PHP-Nuke <?=_VERSION?> is installed</h1>
			<div class="install-text">
				<p>Click the "View Site" button to start PHP-Nuke site or "Administration"
					to take you to administrator login.</p>
			</div>
			<div class="install-form">
				<div class="form-block">
					<table width="100%">
						<tr><td class="error" align="center">Enjoy your new PHP-Nuke Portal!</td></tr>
						<tr><td align="center"><h5>Administration Login Details</h5></td></tr>
						<tr><td align="center" class="notice"><b>Username : <?=$setup_admin?></b></td></tr>
						<tr><td align="center" class="notice"><b>Password : <?php echo $adminPassword; ?></b></td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td align="right">&nbsp;</td></tr>
<?php						if ($canWrite == false) { ?>
						<tr>
							<td class="small">
							<font color="FF0000"><b>WARNING:</b></font> Your configuration file or directory is not writeable,
								or there was a problem creating the configuration file. You'll have to
								upload the following code by hand. Click in the textarea to highlight
								all of the code. Create a new file called <b>config.php</b> and upload
								it to your server root folder (overwrite the old config.php file present
								on your server.
							</td>
						</tr>
						<tr>
							<td align="center">
								<textarea rows="20" cols="60" name="configcode" onClick="javascript:this.form.configcode.focus();this.form.configcode.select();" ><?php echo htmlspecialchars( $config );?></textarea>
							</td>
						</tr>
<?php						} ?>
						<tr><td class="small"><?php /*echo $chmod_report*/; ?></td></tr>
					</table>
				</div>
			</div>
			<div id="break"></div>
		</div>
		<div class="clr"></div>
	</div>
	</form>
</div>
<div class="clr"></div>
<div class="ctr">
	<a href="http://phpnuke.org" target="_blank">PHP-Nuke</a> is Free Software released under the GNU/GPL License.
</div>
</html>