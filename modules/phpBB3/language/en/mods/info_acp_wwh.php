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
	'WWH_CONFIG'				=> 'Configurate "Who was here?"',
	'WWH_TITLE'					=> 'Who was here?',
));

?>