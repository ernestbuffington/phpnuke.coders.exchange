<?php
/**
 * @package phpBB3
 * @version 0.1.4
 * @copyright (c) 2007 eviL3
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

/**
 * Install the contact form
 */
function install_contact($contact_version)
{
	global $phpEx;
	global $user;
	
	$phpbb_root_path = PHPBB3_ROOT_DIR;
	
	if ($user->data['user_type'] != PHPBB3_USER_FOUNDER)
	{
		trigger_error('PASTEBIN_OUTDATED');
	}
	
	set_config('contact_enable', 0);
	set_config('contact_confirm', 1);
	set_config('contact_confirm_guests', 1);
	set_config('contact_max_attempts', 0);
	set_config('contact_method', 0);
	set_config('contact_bot_user', 2);
	set_config('contact_bot_forum', 2);
	set_config('contact_reasons', '');
	
	set_config('contact_version', $contact_version, false);
	
	// confirm message
	trigger_error($user->lang['CONTACT_INSTALLED'] . '<br /><br />' . sprintf($user->lang['RETURN_CONTACT'], '<a href="' . append_sid("{$phpbb_root_path}contact.$phpEx") . '">', '</a>'));
}

/**
 * Update the contact form
 * 
 * Add each update entry in a separate if () clause, for example:
 * <code>
 * 	if ($config['contact_version'] < '0.1.4')
 * 	{
 * 		$db->sql_query($some_query);
 * 	}
 * </code>
 */
function update_contact($contact_version)
{
	global $phpEx, $config;
	global $db, $user, $cache;
	
	$phpbb_root_path = PHPBB3_ROOT_DIR;
	
	if ($user->data['user_type'] != PHPBB3_USER_FOUNDER)
	{
		trigger_error('PASTEBIN_OUTDATED');
	}
	
	if (version_compare($config['contact_version'], '0.1.4', '<'))
	{
		set_config('contact_reasons', '');
	}
	
	// update config table with new version
	set_config('contact_version', $contact_version, false);
	
	$cache->purge();
	
	// confirm message
	trigger_error(sprintf($user->lang['CONTACT_UPDATED'], $contact_version) . '<br /><br />' . sprintf($user->lang['RETURN_CONTACT'], '<a href="' . append_sid("{$phpbb_root_path}contact.$phpEx") . '">', '</a>'));
}

/**
 * Uninstall contact board admin
 */
function uninstall_contact()
{
	global $phpEx;
	global $db, $user, $cache;
	
	$sql = array();
	$sql[] = 'DELETE FROM '.PHPBB3_CONFIG_TABLE.' WHERE '.$db->sql_in_set('config_name',array('contact_enable',
	                                                                                  'contact_confirm',
																			   'contact_confirm_guests',
																			     'contact_max_attempts',
																				       'contact_method',
																					 'contact_bot_user',
																					'contact_bot_forum', 
																					  'contact_version'));
	
	for ($i = 0, $size = sizeof($sql); $i < $size; $i++)
	{
		$db->sql_query($sql[$i]);
	}
	
	$cache->purge();
	
	// confirm message
	trigger_error($user->lang['CONTACT_UNINSTALLED']);
}

/**
 * Make contact select
 *
 * @param array $input_ary
 * @return string Select html
 */
function contact_make_select($input_ary, $selected)
{
	// only accept arrays, no empty ones
	if (!is_array($input_ary) || !sizeof($input_ary))
	{
		return;
	}
	
	// If selected isn't in the array, use first entry
	if (!in_array($selected, $input_ary))
	{
		$selected = $input_ary[0];
	}
	
	$select = '';
	foreach ($input_ary as $item)
	{
		//$item = htmlspecialchars($item);
		$item_selected = ($item == $selected) ? ' selected="selected"' : '';
		$select .= '<option value="' . $item . '"' . $item_selected . '>' . $item . '</option>';
	}
	return $select;
}

?>