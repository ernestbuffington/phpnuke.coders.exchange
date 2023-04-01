<?php
/**
*
* Who posted [ English ]
*
* @package who_posted
* @version $Id$
* @copyright (c) 2007, 2008 evil3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'WHOPOSTED_TITLE'	=> 'Who posted?',
	'WHOPOSTED_EXP'		=> 'This is a list of all members who posted in this topic.',
	'WHOPOSTED_SHOW'	=> 'Show topic',
	'WHOPOSTED_OR'		=> 'or',
));

?>