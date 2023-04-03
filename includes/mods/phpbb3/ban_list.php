<?php
/**
*
* @package phpBB3
* @version $Id: ban_list.php,v 1.0.2 2008/08/29 11:31:00 PST primehalo and RMcGirr83Exp $
* @copyright (c) Ken F. Innes IV and Rich McGirr
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

// define constants
if (!defined('ALLOW_BAN_LIST_ALL_USERS')) {	define('ALLOW_BAN_LIST_ALL_USERS', 0); }
if (!defined('ALLOW_BAN_LIST_MODS_ADMINS')) { define('ALLOW_BAN_LIST_MODS_ADMINS', 1); }
if (!defined('ALLOW_BAN_LIST_ADMINS')) { define('ALLOW_BAN_LIST_ADMINS', 2); }

/**
* Include only once.
*/
if (!defined('INCLUDES_BAN_LIST_PHP'))
{
	define('INCLUDES_BAN_LIST_PHP', true);

	function ban_list_set_template_vars()
	{
		global $auth, $config, $db, $template, $user, $phpbb_root_path, $phpEx;

        $allow = false;
        // is viewing by all users allowed?
        if ( $config['allow_ban_list'] == ALLOW_BAN_LIST_ALL_USERS && $auth->acl_get('u_') )
        {
			$allow = true;
        }
        // is viewing by moderators allowed?
        elseif ( $config['allow_ban_list'] == ALLOW_BAN_LIST_MODS_ADMINS && $auth->acl_getf_global('m_') )
        {
   			$allow = true;
        }
        // just admins then?
        elseif ( $config['allow_ban_list'] == ALLOW_BAN_LIST_ADMINS && $auth->acl_get('a_') )
        {
   			$allow = true;
		}
		// no one is allowed 
        if (!$allow)
        {
          return;
        }

		$sql = 'SELECT COUNT(ban_userid) AS total_banned
				FROM ' . PHPBB3_BANLIST_TABLE . '
				WHERE ban_userid <> 0
				AND (ban_end >= ' . time() . ' OR ban_end = 0)';
		$result = $db->sql_query($sql);
		$total_banned_users = (int) $db->sql_fetchfield('total_banned');
		$db->sql_freeresult($result);
		
		$ban_list = '';
		if ($total_banned_users)
		{
			$user->add_lang('mods/ban_list');
			$l_ban_message = $user->lang['BANNED_USERS'];
			$ban_list = sprintf($l_ban_message, $total_banned_users);
		}
		
		$template->assign_vars(array(
			'U_BANLIST'				=> append_sid("{$phpbb_root_path}ban_list.$phpEx"),
			'TOTAL_BANNED_USERS'	=> $ban_list,
		));
		
	}
}

?>
