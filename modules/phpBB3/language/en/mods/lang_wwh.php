<?php

/**
*
* @package phpBB3 - who was here MOD
* @version $Id$
* @copyright (c) 2007 phpBB Gallery
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
// for the normal sites
	'WHO_WAS_HERE'						=> 'Who was here?',
	'WHO_WAS_HERE_LATEST1'				=> 'last at',
	'WHO_WAS_HERE_LATEST2'				=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")
	'WHO_WAS_HERE_USERS_TOTAL'				=> 'In total there were <strong>%d</strong> users online :: ',
	'WHO_WAS_HERE_USERS_ZERO_TOTAL'			=> 'In total there were <strong>0</strong> users online :: ',
	'WHO_WAS_HERE_USER_TOTAL'				=> 'In total there was <strong>%d</strong> user online :: ',
	'WHO_WAS_HERE_REG_USERS_TOTAL'			=> '%d registered users',
	'WHO_WAS_HERE_REG_USERS_ZERO_TOTAL'		=> '0 registered users',
	'WHO_WAS_HERE_REG_USER_TOTAL'			=> '%d registered user',
	'WHO_WAS_HERE_HIDDEN_USERS_TOTAL'		=> ' %d hidden users',
	'WHO_WAS_HERE_HIDDEN_USERS_ZERO_TOTAL'	=> ' 0 hidden users',
	'WHO_WAS_HERE_HIDDEN_USER_TOTAL'		=> ' %d hidden user',
	'WHO_WAS_HERE_BOTS_USERS_TOTAL'			=> ' %d bots',
	'WHO_WAS_HERE_BOTS_USERS_ZERO_TOTAL'	=> ' 0 bots',
	'WHO_WAS_HERE_BOTS_USER_TOTAL'			=> ' %d bot',
	'WHO_WAS_HERE_GUEST_USERS_TOTAL'		=> ' %d guests',
	'WHO_WAS_HERE_GUEST_USERS_ZERO_TOTAL'	=> ' 0 guests',
	'WHO_WAS_HERE_GUEST_USER_TOTAL'			=> ' %d guest',
	'WHO_WAS_HERE_WORD'				=> ' and',
	'WHO_WAS_HERE_EXP'				=> 'This data is based on users active today',
	'WHO_WAS_HERE_EXP_TIME'			=> 'This data is based on users active over the past ',
	'WWH_HOUR'						=> '%1$s hour, ',
	'WWH_HOURS'						=> '%1$s hours, ',
	'WWH_MINUTE'					=> '%1$s minute and ',
	'WWH_MINUTES'					=> '%1$s minutes and ',
	'WWH_SECOND'					=> '%1$s second.',
	'WWH_SECONDS'					=> '%1$s seconds.',
	'WHO_WAS_HERE_RECORD'			=> 'Most users ever online was <strong>%1$s</strong> on %2$s',
));

?>