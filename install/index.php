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
define("IN_NUKE",true);
define('INSETUP',true);

error_reporting(E_ALL ^ E_NOTICE);

require_once( 'version.php' );

require_once("setup_config.php");
require_once("functions.php");
require_once(SETUP_NUKE_INCLUDES_DIR.'functions_selects.php');

global $dbhost, $dbname, $dbuname, $dbpass, $dbtype, $prefix, $user_prefix, $admin_file, $directory_mode, $file_mode, $debug, $use_cache, $persistency;

// Set flag that this is a parent file
define( "_VALID_MOS", 1 );

/** Include common.php */
require_once( 'common.php' );
require_once(SETUP_UDL_DIR."database.php");

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

$step = 0;

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

global $cookiedata_admin, $cookiedata;

if(!isset($cookiedata_admin))
$cookiedata_admin = '';
if(!isset($cookiedata))
$cookiedata = '';
if(!isset($cookie_location))
$cookie_location = (string) $_SERVER['PHP_SELF'];

setcookie('admin',$cookiedata_admin, ['expires' => time()+2_592_000, 'path' => $cookie_location]);
setcookie('user',$cookiedata, ['expires' => time()+2_592_000, 'path' => $cookie_location]);

/**
 * Operating System Analysis
 * Useful for setup help
 */
if(strtoupper(substr(PHP_OS,0,3)) == "WIN"): 
  $os = "Windows";
else: 
  $os = "Linux";
endif;


function get_php_setting($val) {
	$r =  (ini_get($val) == '1' ? 1 : 0);
	return $r ? 'ON' : 'OFF';
}

function writableCell( $folder ) {
	echo '<tr>';
	echo '<td class="item">' . $folder . '</td>';
	echo '<td align="left">';
	echo is_writable( "../$folder" ) ? '<b><font color="green">Writeable</font></b>' : '<b><font color="red">Unwriteable</font></b>' . '</td>';
	echo '</tr>';
}

function writableCellConfig() {
	echo '<tr>';
	echo '<td class="item">config.php</td>';
	echo '<td align="left">';
	echo '<b><font color="green">Auto Create Enabled</font></b></td>';
	echo '</tr>';
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
</head>
<body>
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
<div class="install">
<div id="stepbar">
<div class="step-on">Pre-Installation Check</div>
<div class="step-off">License</div>
<div class="step-off">Step 1</div>
<div class="step-off">Step 2</div>
<div class="step-off">Step 3</div>
<div class="step-off">Step 4</div>
</div>
<div id="right">

<div id="step">Pre-Installation Check</div>

<div class="far-right">
	<input name="Button2" type="submit" class="button" value="Next >>" onclick="window.location='install.php';" />
	<br/>
	<br/>
	<input type="button" class="button" value="Check Again" onclick="window.location=window.location" />
</div>
<div class="clr"></div>

<h1><?php echo $version; ?></h1>
<div class="install-text">
If any of these items are highlighted
in red then please take actions to correct them. Failure to do so
could lead to your PHP-Nuke installation not functioning
correctly.
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="item">
	&nbsp; - PHP Version 
	</td>
	<td align="left">
	<?php echo phpversion() < '8.1' ? '<b><font color="red">No</font></b>' : '<b><font color="green">'.phpversion().'</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - Operating System
	</td>
	<td align="left">
	<?php echo '<b><font color="green">'.$os.'</font></b>'?>
	</td>
</tr>
<tr>

<tr>
	<td>
	&nbsp; - safe mode support
	</td>
	<td align="left">
	<?php echo extension_loaded('safe_mod')  ? '<b><font color="red">Available</font></b>' : '<b><font color="green">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - cgi-fcgi support
	</td>
	<td align="left">
	<?php echo extension_loaded('cgi-fcgi')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - json support
	</td>
	<td align="left">
	<?php echo extension_loaded('json')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - mbstring support
	</td>
	<td align="left">
	<?php echo extension_loaded('mbstring')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - hash support
	</td>
	<td align="left">
	<?php echo extension_loaded('hash')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - openssl support
	</td>
	<td align="left">
	<?php echo extension_loaded('openssl')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - Phar support
	</td>
	<td align="left">
	<?php echo extension_loaded('Phar')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - xml support
	</td>
	<td align="left">
	<?php echo extension_loaded('xml')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - SimpleXML support
	</td>
	<td align="left">
	<?php echo extension_loaded('SimpleXML')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - xmlreader support
	</td>
	<td align="left">
	<?php echo extension_loaded('xmlreader')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - xmlwriter support
	</td>
	<td align="left">
	<?php echo extension_loaded('xmlwriter')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - xsl support
	</td>
	<td align="left">
	<?php echo extension_loaded('xsl')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - Zend OPcache support
	</td>
	<td align="left">
	<?php echo extension_loaded('Zend OPcache')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - zip support
	</td>
	<td align="left">
	<?php echo extension_loaded('zip')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - zlib compression support
	</td>
	<td align="left">
	<?php echo extension_loaded('zlib') ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>
<tr>


<tr>
	<td>
	&nbsp; - tokenizer support
	</td>
	<td align="left">
	<?php echo extension_loaded('tokenizer')  ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Off</font></b>';?>
	</td>
</tr>


	<td>
	&nbsp; - GD graphics support
	</td>
	<td align="left">
	<?php echo extension_loaded('gd') ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - MySQLi support
	</td>
	<td align="left">
	<?php echo function_exists( 'mysqli_connect' ) ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - cURL support
	</td>
	<td align="left">
	<?php echo extension_loaded('curl') ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - DOM/XML
	</td>
	<td align="left">
	<?php echo extension_loaded('dom') ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>

<tr>
	<td>
	&nbsp; - fileinfo support
	</td>
	<td align="left">
	<?php echo extension_loaded('fileinfo') ? '<b><font color="green">Available</font></b>' : '<b><font color="red">Unavailable</font></b>';?>
	</td>
</tr>


<tr>
	<td valign="top" class="item">
	config.php
	</td>
	<td align="left">
	<?php
	if (file_exists('../config.php') &&  is_writable( '../config.php' )){
		echo '<b><font color="green">Writeable</font></b>';
	} else if (is_writable( '..' )) {
		echo '<b><font color="green">Writeable</font></b>';
	} else {
		echo '<b><font color="red">Unwriteable</font></b><br /><span class="small">You can still continue the install as the configuration will be displayed at the end, just copy & paste this and upload.</span>';
	} ?>
	</td>
</tr>
</table>
</div>
</div>
<div class="clr"></div>

<h1>Recommended settings:</h1>
<div class="install-text">
These settings are recommended for PHP in order to ensure full
compatibility with PHP-Nuke.
<br />
However, PHP-Nuke will still operate if your settings do not quite match the recommended
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="toggle">
	Directive
	</td>
	<td class="toggle">
	Recommended
	</td>
	<td class="toggle">
	Actual
	</td>
</tr>
<?php
$php_recommended_settings = array(array ('Safe Mode','safe_mode','OFF'),
array ('Display Errors','display_errors','ON'),
array ('File Uploads','file_uploads','ON'),
array ('Register Globals','register_globals','OFF'),
array ('Output Buffering','output_buffering','OFF'),
array ('Session auto start','session.auto_start','OFF'),
);

foreach ($php_recommended_settings as $phprec) {
?>
<tr>
	<td class="item"><?php echo $phprec[0]; ?></td>
	<td class="toggle"><?php echo $phprec[2]; ?></td>
	<td>
	<?php
	if ( get_php_setting($phprec[1]) == $phprec[2] ) {
	?>
		<font color="green"><b>
	<?php
	} else {
	?>
		<font color="red"><b>
	<?php
	}
	echo get_php_setting($phprec[1]);
	?>
	</b></font>
	<td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div class="clr"></div>

<h1>Files Permissions:</h1>
<div class="install-text">
In order for PHP-Nuke to function
correctly it needs to be able to access or write to certain files.
If you see "Unwriteable" you need to change the
permissions on the file to allow PHP-Nuke
to write to it.
<div class="clr">&nbsp;&nbsp;</div>
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<?php
writableCellConfig();
writableCell( 'ultramode.txt' );
?>
</table>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
</div>

<div class="ctr">
	<a href="http://www.phpnuke.coders.exchange" target="_blank">PHP-Nuke <?=_VERSION?></a> is Free Software released under the GNU/GPL License.
</div>

</body>
</html>