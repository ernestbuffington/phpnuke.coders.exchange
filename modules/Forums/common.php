<?php
/***************************************************************************
 *                                common.php
 *                            -------------------
 *   begin                : Saturday, Feb 23, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: common.php,v 1.74.2.25 2006/05/26 17:46:59 grahamje Exp $
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * ArraySpreadInsteadOfArrayMergeRector (https://wiki.php.net/rfc/spread_operator_for_array)
 * NullToStrictStringFuncCallArgRector
 * WrapVariableVariableNameInCurlyBracesRector (https://www.php.net/manual/en/language.variables.variable.php)
 * ListToArrayDestructRector (https://wiki.php.net/rfc/short_list_syntax https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring)
 * WhileEachToForeachRector (https://wiki.php.net/rfc/deprecations_php_7_2#each)
 */
 
if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}

//
error_reporting  (E_ERROR | E_WARNING | E_PARSE); // This will NOT report uninitialized variables
//set_magic_quotes_runtime(0); // Disable dipshit magic_quotes_runtime

// The following code (unsetting globals)
// Thanks to Matt Kavanagh and Stefan Esser for providing feedback as well as patch files

// PHP5 with register_long_arrays off?
if (phpversion() >= '5.0.0' && (!ini_get('register_long_arrays') || ini_get('register_long_arrays') == '0' || strtolower(ini_get('register_long_arrays')) == 'off'))
{
	$_POST = $_POST;
	$_GET = $_GET;
	$_SERVER = $_SERVER;
	$_COOKIE = $_COOKIE;
	$_ENV = $_ENV;
	$_FILES = $_FILES;

	// _SESSION is the only superglobal which is conditionally set
	if (isset($_SESSION))
	{
		$_SESSION = $_SESSION;
	}
}

// Protect against GLOBALS tricks
if (isset($_POST['GLOBALS']) || isset($_FILES['GLOBALS']) || isset($_GET['GLOBALS']) || isset($_COOKIE['GLOBALS']))
{
	die("Hacking attempt");
}

// Protect against HTTP_SESSION_VARS tricks
if (isset($_SESSION) && !is_array($_SESSION))
{
	die("Hacking attempt");
}

if (ini_get('register_globals') == '1' || strtolower(ini_get('register_globals')) == 'on')
{
	// PHP4+ path
	$not_unset = array('HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_COOKIE_VARS', 'HTTP_SERVER_VARS', 'HTTP_SESSION_VARS', 'HTTP_ENV_VARS', 'HTTP_POST_FILES', 'phpEx', 'phpbb_root_path', 'name', 'admin', 'nukeuser', 'user', 'no_page_header', 'cookie', 'db', 'prefix');

	// Not only will array_merge give a warning if a parameter
	// is not an array, it will actually fail. So we check if
	// HTTP_SESSION_VARS has been initialised.
	if (!isset($_SESSION) || !is_array($_SESSION))
	{
		$_SESSION = array();
	}

	// Merge all into one extremely huge array; unset
	// this later
	$input = [...$_GET, ...$_POST, ...$_COOKIE, ...$_SERVER, ...$_SESSION, ...$_ENV, ...$_FILES];

	unset($input['input']);
	unset($input['not_unset']);

	while ([$var, ] = each($input))
	{
		if (!in_array($var, $not_unset))
		{
			unset(${$var});
		}
	}

	unset($input);
}

//
// addslashes to vars if magic_quotes_gpc is off
// this is a security precaution to prevent someone
// trying to break out of a SQL statement.
//
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){
 // this dipshit system no longer exists!
}
else
{
	if( is_array($_GET) )
	{
		foreach ($_GET as $k => $v) {
      if( is_array($_GET[$k]) )
   			{
   				foreach ($_GET[$k] as $k2 => $v2) {
           $_GET[$k][$k2] = addslashes((string) $v2);
       }
   				reset($_GET[$k]);
   			}
   			else
   			{
   				$_GET[$k] = addslashes((string) $v);
   			}
  }
		reset($_GET);
	}

	if( is_array($_POST) )
	{
		foreach ($_POST as $k => $v) {
      if( is_array($_POST[$k]) )
   			{
   				foreach ($_POST[$k] as $k2 => $v2) {
           $_POST[$k][$k2] = addslashes((string) $v2);
       }
   				reset($_POST[$k]);
   			}
   			else
   			{
   				$_POST[$k] = addslashes((string) $v);
   			}
  }
		reset($_POST);
	}

	if( is_array($_COOKIE) )
	{
		foreach ($_COOKIE as $k => $v) {
      if( is_array($_COOKIE[$k]) )
   			{
   				foreach ($_COOKIE[$k] as $k2 => $v2) {
           $_COOKIE[$k][$k2] = addslashes((string) $v2);
       }
   				reset($_COOKIE[$k]);
   			}
   			else
   			{
   				$_COOKIE[$k] = addslashes((string) $v);
   			}
  }
		reset($_COOKIE);
	}
}

//
// Define some basic configuration arrays this also prevents
// malicious rewriting of language and otherarray values via
// URI params
//
$board_config = array();
$userdata = array();
$theme = array();
$images = array();
$lang = array();
$nav_links = array();
$dss_seeded = false;
$gen_simple_header = FALSE;

include($phpbb_root_path . 'config.'.$phpEx);

if( !defined("PHPBB_INSTALLED") )
{
        header("Location: modules.php?name=Forums&file=install");
	exit;
}

if (defined('FORUM_ADMIN')) {
    //include("../../../db/db.php");
    include("../includes/constants.php");
    include("../includes/template.php");
    include("../includes/sessions.php");
    include("../includes/auth.php");
    include("../includes/functions.php");
} else {
    include("modules/Forums/includes/constants.php");
    include("modules/Forums/includes/template.php");
    include("modules/Forums/includes/sessions.php");
    include("modules/Forums/includes/auth.php");
    include("modules/Forums/includes/functions.php");
    include("db/db.php");
}

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

//
// Obtain and encode users IP
//
// I'm removing HTTP_X_FORWARDED_FOR ... this may well cause other problems such as
// private range IP's appearing instead of the guilty routable IP, tough, don't
// even bother complaining ... go scream and shout at the idiots out there who feel
// "clever" is doing harm rather than good ... karma is a great thing ... :)
//
$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR') );
$user_ip = encode_ip($client_ip);

//
// Setup forum wide options, if this fails
// then we output a CRITICAL_ERROR since
// basic forum information is not available
//
$sql = "SELECT *
	FROM " . CONFIG_TABLE;
if( !($result = $db->sql_query($sql)) )
{
	message_die(CRITICAL_ERROR, "Could not query config information", "", __LINE__, __FILE__, $sql);
}

while ( $row = $db->sql_fetchrow($result) )
{
	$board_config[$row['config_name']] = $row['config_value'];
}


//
// Show 'Board is disabled' message if needed.
//
if( $board_config['board_disable'] && !defined("IN_ADMIN") && !defined("IN_LOGIN") )
{
	message_die(GENERAL_MESSAGE, 'Board_disable', 'Information');
}

