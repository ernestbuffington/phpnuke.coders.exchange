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

$step = 4;

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
$configArray['siteUrl'] = trim( mosGetParam( $_POST, 'siteUrl', '' ) );
$configArray['absolutePath'] = trim( mosGetParam( $_POST, 'absolutePath', '' ) );

if ($sitename == '') {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install2.php\">
			<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\">
			<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\">
			<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\">
			<input type=\"hidden\" name=\"DBname\" value=\"$DBname\">
			<input type=\"hidden\" name=\"DBcreated\" value=1>
		</form>";

	echo "<script>alert('The sitename has not been provided'); document.stepBack.submit();</script>";
	return;
}

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP-Nuke <?=_VERSION?> Installer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="../../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<script>
function toUnicodeVariant(str, variant, flags) {
    const offsets = {
        m: [0x1d670, 0x1d7f6],
        b: [0x1d400, 0x1d7ce],
        i: [0x1d434, 0x00030],
        bi: [0x1d468, 0x00030],
        c: [0x1d49c, 0x00030],
        bc: [0x1d4d0, 0x00030],
        g: [0x1d504, 0x00030],
        d: [0x1d538, 0x1d7d8],
        bg: [0x1d56c, 0x00030],
        s: [0x1d5a0, 0x1d7e2],
        bs: [0x1d5d4, 0x1d7ec],
        is: [0x1d608, 0x00030],
        bis: [0x1d63c, 0x00030],
        o: [0x24B6, 0x2460],
        p: [0x249C, 0x2474],
        w: [0xff21, 0xff10],
        u: [0x2090, 0xff10]
    }

    const variantOffsets = {
        'monospace': 'm',
        'bold': 'b',
        'italic': 'i',
        'bold italic': 'bi',
        'script': 'c',
        'bold script': 'bc',
        'gothic': 'g',
        'gothic bold': 'bg',
        'doublestruck': 'd',
        'sans': 's',
        'bold sans': 'bs',
        'italic sans': 'is',
        'bold italic sans': 'bis',
        'parenthesis': 'p',
        'circled': 'o',
        'fullwidth': 'w'
    }

    // special characters (absolute values)
    var special = {
        m: {
            ' ': 0x2000,
            '-': 0x2013
        },
        i: {
            'h': 0x210e
        },
        g: {
            'C': 0x212d,
            'H': 0x210c,
            'I': 0x2111,
            'R': 0x211c,
            'Z': 0x2128
        },
        o: {
            '0': 0x24EA,
            '1': 0x2460,
            '2': 0x2461,
            '3': 0x2462,
            '4': 0x2463,
            '5': 0x2464,
            '6': 0x2465,
            '7': 0x2466,
            '8': 0x2467,
            '9': 0x2468,
        },
        p: {},
        w: {}
    }
    //support for parenthesized latin letters small cases 
    for (var i = 97; i <= 122; i++) {
        special.p[String.fromCharCode(i)] = 0x249C + (i - 97)
    }
    //support for full width latin letters small cases 
    for (var i = 97; i <= 122; i++) {
        special.w[String.fromCharCode(i)] = 0xff41 + (i - 97)
    }

    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    const numbers = '0123456789';

    var getType = function (variant) {
        if (variantOffsets[variant]) return variantOffsets[variant]
        if (offsets[variant]) return variant;
        return 'm'; //monospace as default
    }
    var getFlag = function (flag, flags) {
        if (!flags) return false
        return flags.split(',').indexOf(flag) > -1
    }

    var type = getType(variant);
    var underline = getFlag('underline', flags);
    var strike = getFlag('strike', flags);
    var result = '';

    for (var k of str) {
        let index
        let c = k
        if (special[type] && special[type][c]) c = String.fromCodePoint(special[type][c])
        if (type && (index = chars.indexOf(c)) > -1) {
            result += String.fromCodePoint(index + offsets[type][0])
        } else if (type && (index = numbers.indexOf(c)) > -1) {
            result += String.fromCodePoint(index + offsets[type][1])
        } else {
            result += c
        }
        if (underline) result += '\u0332' // add combining underline
        if (strike) result += '\u0336' // add combining strike
    }
    return result
}
</script>
<script type="text/javascript">
<!--
function check() {
	// form validation check
	var formValid = true;
	var f = document.form;
	if ( f.siteUrl.value == '' ) {
		alert('Please enter Site URL');
		f.siteUrl.focus();
		formValid = false;
	} else if ( f.absolutePath.value == '' ) {
		alert('Please enter the absolute path to your site');
		f.absolutePath.focus();
		formValid = false;
	} else if ( f.adminEmail.value == '' ) {
		alert('Please enter an email address to contact your administrator');
		f.adminEmail.focus();
		formValid = false;
	} else if ( f.adminPassword.value == '' ) {
		alert('Please enter a password for you administrator');
		f.adminPassword.focus();
		formValid = false;
	}

	return formValid;
}

//-->
</script>
</head>
<body onload="document.form.siteUrl.focus();">
<div id="wrapper">
	<div id="header">
		<div id="phpnuke"><img src="header_install.png" alt="PHP-Nuke Installation" /></div>
	</div>
</div>
<?php
$filename = '../config.php';
if (file_exists($filename)) {

?>
<div style="margin: 100px;" align="center">
<img src="../install/images/stop.png" alt="Stop" name="stop" width="200" height="200" align="absmiddle" />
</div>
<script type="text/javascript">
  window.onload = function () { alert('Before you can run the ' + toUnicodeVariant('PHP-Nuke', 'bold sans', 'bold') + ' installation applicaton you must go to your root directory and delete the ' + toUnicodeVariant('config.php', 'bold sans', 'bold') + ' file.'); } 
</script>
<?
exit();
} 
?>
<div id="ctr" align="center">
	<form action="install4.php" method="post" name="form" id="form" onsubmit="return check();">
	<input type="hidden" name="DBhostname" value="<?php echo "$DBhostname"; ?>" />
	<input type="hidden" name="DBuserName" value="<?php echo "$DBuserName"; ?>" />
	<input type="hidden" name="DBpassword" value="<?php echo "$DBpassword"; ?>" />
	<input type="hidden" name="DBname" value="<?php echo "$DBname"; ?>" />
	<input type="hidden" name="sitename" value="<?php echo "$sitename"; ?>" />
	<div class="install">
		<div id="stepbar">
			<div class="step-off">Pre-Installation Check</div>
			<div class="step-off">License</div>
			<div class="step-off">Step 1</div>
			<div class="step-off">Step 2</div>
			<div class="step-on">Step 3</div>
			<div class="step-off">Step 4</div>
		</div>
    
    		<div id="right">
			<div id="step">Step 3</div>
			<div class="far-right">
				<input class="button" type="submit" name="next" value="Next >>"/>
			</div>
			<div class="clr"></div>
			<h1>Super User Administrator Creation</h1>
			<div class="install-text">
				
				<p>The default Super User or Admin ID is <b>admin</b> and this can be changed later from your administration panel.<br /><br />
				   Enter your e-mail address, this will be the e-mail address of the site Super User.<br /><br />
				   Set your password. The system provides a random generated password. This password is CaSe sensitive and will be used to enter the administration panel of your site. Write something you can remember or write it in a secure place because the password can't be recovered and will be saved into the database crypted with MD5.
				  </p>
			</div>
			<div class="install-form">
				<div class="form-block">
					<table class="content2">
					<tr>
						<td nowarp>Admin ID:</td>
						<td align="left"><b><?=$setup_admin?></b>
<?php
	$abspath = "";
	if ($configArray['absolutePath'])
		$abspath = $configArray['absolutePath'];
	else {
		$path = getcwd();
		if (preg_match("/\/install/i", "$path"))
			$abspath = str_replace('/install',"",$path);
		else
			$abspath = str_replace('\install',"",$path);
	}
?>
					<input type="hidden" name="absolutePath" value="<?php echo $abspath; ?>" /></td>
					</tr>
<?php
	$url = "";
	if ($configArray['siteUrl'])
		$url = $configArray['siteUrl'];
	else {
		$port = ( $_SERVER['SERVER_PORT'] == 80 ) ? '443' : ":".$_SERVER['SERVER_PORT'];
		$root = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
		$root = str_replace("install/","",$root);
		$root = str_replace("/install3.php","",$root);
		if($_SERVER['SERVER_PORT'] == 443){
		$url = "https://".$root;
		} else {
		$url = "http://".$root;
		}
	}
	$server_name = str_replace("www.", "", $_SERVER['SERVER_NAME']);
?>
					<tr>
						<td nowarp>Your Site URL:</td>
					<td align="center"><input class="inputbox" type="text" name="siteUrl" value="<?php echo $url; ?>" size="40" /></td>
					</tr>
					<tr>
						<td nowarp>Your E-mail:</td>
						<td align="center"><input class="inputbox" type="text" name="adminEmail" value="<?php echo "admin@".$server_name.""; ?>" size="40" /></td>
					</tr>
					<tr>
						<td nowarp>Admin password:</td>
						<td align="center"><input class="inputbox" type="text" name="adminPassword" value="<?php echo mosMakePassword(13); ?>" size="40"/>
						</td>
					</tr>
					</table>
					<p>For security reasons is reccomended that you change the admin.php file name after the installation and then set the new name in config.php file.
						Tor this purpouse you must edit the variable named <b>$admin_file</b> with the exact new admin.php file name. The .php extension should not be written, just the new file name.</p>
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
	<a href="http://phpnuke.coders.exchange" target="_blank">PHP-Nuke <?=_VERSION?></a> is Free Software released under the GNU/GPL License.
</div>
</body>
</html>