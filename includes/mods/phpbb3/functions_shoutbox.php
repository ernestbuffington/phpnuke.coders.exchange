<?php
/**
*
* @package Ajax Shoutbox
* @version $Id: functions_shoutbox.php 189 2007-11-14 14:20:27Z paul $
* @copyright (c) 2007 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}


// Define the number of printed shouts.
// This is difference in IE as in other browsers ;)
// We assign it in this include as we need it in both ajax.php as in js.php.
if (strpos(strtolower($user->browser), 'msie') === false || strpos(strtolower($user->browser), 'opera') !== false)
{
	$shout_number = 20;
}
else
{
	$shout_number = 5;
}
define('VERSION', '1.0.3');

/**
 * Returns cdata'd string
 *
 * @param string $txt
 * @return string
 */
function xml($contents)
{
	$contents = str_replace('&nbsp;', '', $contents);
	if ( preg_match('/\<(.*?)\>/xsi', $contents) )
	{
		$contents = preg_replace('/\<script[\s]+(.*)\>(.*)\<\/script\>/xsi', '', $contents);
	}

	if (!(strpos($contents, '>') === false) || !(strpos($contents, '<') === false) || !(strpos($contents, '&') === false))
	{
		// CDATA doesn't let you use ']]>' so fall back to WriteString
		if (!(strpos($contents, ']]>') === false))
		{
			return htmlspecialchars($contents);
		}
		else
		{
			return '<![CDATA[' . $contents . ']]>';
		}
	}
	else
	{
		return htmlspecialchars($contents);
	}
	return $contents;
}

/**
 * Prints a XML error.
 *
 * @param string $sql Sql query
 * @param int $line Linenumber
 * @param string $file Filename
 */
function sql_error($sql, $line = __LINE__, $file = __FILE__)
{
	global $db;

	$sql = xml($sql);
	$err = $db->sql_error();
	$err = xml($err['message']);
	echo "<error>$err</error>\n<sql>$sql</sql>\n</xml>";
	exit;
}

?>
