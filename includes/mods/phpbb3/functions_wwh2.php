<?php

/**
*
* @package - NV "who was here?"
* @version $Id$
* @copyright (c) nickvergessen ( http://mods.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/* Applied rules:
 * TernaryToNullCoalescingRector
 */

if (!defined('IN_PHPBB'))
{
	exit;
}
$new_mod_version = '6.0.4';

$old_mod_version = $config['wwh_mod_version'] ?? 'RC5';

$user->add_lang('mods/lang_wwh');

if ($old_mod_version == $new_mod_version)
{
	if (($user->data['user_id'] != ANONYMOUS) && ($user->data['user_type'] != USER_IGNORE))
	{
		$sql = 'DELETE FROM ' . WWH_TABLE . " WHERE (ip = '" . $user->ip . "' AND id = '1') OR id = " . $user->data['user_id'];
		$db->sql_query($sql);
		$sql = 'INSERT INTO ' . WWH_TABLE . " (ip, id, viewonline, last_page) VALUES ('" . $user->ip . "', '" . $user->data['user_id'] . "', '" . $user->data['session_viewonline'] . "', '" . time() . "')";
		$db->sql_query($sql);
	}
	else if($user->data['user_id'] == ANONYMOUS)
	{
		$user_viewonline = 1;
		$your_ip = false;
		$sql = 'SELECT ip FROM ' . WWH_TABLE . " WHERE ip = '" . $user->ip . "'";
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$your_ip = true;
		}
		if (!$your_ip)
		{
			$sql = 'INSERT INTO ' . WWH_TABLE . " (ip, id, viewonline, last_page) VALUES ('" . $user->ip . "', '" . $user->data['user_id'] . "', '" . $user->data['session_viewonline'] . "', '" . time() . "')";
			$db->sql_query($sql);
		}
	}
}
else
{
	$user->add_lang('mods/lang_wwh_acp');
}

?>
