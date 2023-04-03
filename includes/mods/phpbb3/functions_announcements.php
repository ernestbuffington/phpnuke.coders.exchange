<?php
/**
*
* @package phpBB3
* @version $Id: functions_display.php,v 1.168 2007/10/20 10:12:54 acydburn Exp $
* @copyright (c) 2005 phpBB Group
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
* Generate list of groups (option fields with select) 
* note: This is a modified function from functions_admin.php
* @param int $group_ids The groupids to mark as selected
* @param array $exclude_ids The group ids to exclude from the list, false (default) if you whish to exclude no id
* @param int $manage_founder If set to false (default) all groups are returned, if 0 only those groups returned not being managed by founders only, if 1 only those groups returned managed by founders only.
*
* @return string The list of options.
*/
function group_select_options_selected($group_ids, $exclude_ids = false, $manage_founder = false)
{
	global $db, $auth, $user, $template;
	global $phpEx, $config;
	
	$exclude_sql = ($exclude_ids !== false && sizeof($exclude_ids)) ? 'WHERE ' . $db->sql_in_set('group_id', array_map('intval', $exclude_ids), true) : '';
	$sql_and = (!$config['coppa_enable']) ? (($exclude_sql) ? ' AND ' : ' WHERE ') . "group_name <> 'REGISTERED_COPPA'" : '';
	$sql_founder = ($manage_founder !== false) ? (($exclude_sql || $sql_and) ? ' AND ' : ' WHERE ') . 'group_founder_manage = ' . (int) $manage_founder : '';

	$sql = 'SELECT group_id, group_name, group_type
		FROM ' . PHPBB3_GROUPS_TABLE . "
		$exclude_sql
		$sql_and
		$sql_founder
		ORDER BY group_type DESC, group_name ASC";
	$result = $db->sql_query($sql);
	
	$s_group_options = '';
	while ($row = $db->sql_fetchrow($result))
	{
			
		$selected = (in_array($row['group_id'], $group_ids, true)) ? ' selected="selected"' : '';
		$s_group_options .= '<option' . (($row['group_type'] == PHPBB3_GROUP_SPECIAL) ? ' class="sep"' : '') . ' value="' . $row['group_id'] . '"' . $selected . '>' . (($row['group_type'] == PHPBB3_GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name']) . '</option>';
	}
	$db->sql_freeresult($result);

	return $s_group_options;
}

/**
* get all the announcement data
*
* @param string $birthday_list, true or false
*/
function get_announcement_data($birthday_list)
{
	global $template, $db, $user;

	// Generate the announcement data
	$sql = 'SELECT * 
		FROM ' . PHPBB3_ANNOUNCEMENTS_CENTRE_TABLE;
	$result = $db->sql_query($sql);
	$announcement = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	$selected_groups = array();
	$selected_groups = explode(",", $announcement['announcement_show_group']);

	$sql = 'SELECT *
		FROM ' . PHPBB3_USER_GROUP_TABLE . '
		WHERE ' . $db->sql_in_set('group_id', $selected_groups) . '
			AND user_id = ' . $user->data['user_id'];
	$db->sql_query($sql);
	$result = $db->sql_query_limit($sql,1,0);
	$is_in_group = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	//Announcement Centre by lefty74
	if ( ($user->data['user_id']) == 1 && $announcement['announcement_show'] == 2 ) // Guests only
	{
		$announcement_show = 1;
		$announcement_show_everyone_guests = 1;
	}
	else if ( $user->data['user_id'] != 1  && ($is_in_group && $announcement['announcement_show'] == 0) ) // Groups only
	{
		$announcement_show = 1;
		$announcement_show_everyone_guests = 0;
	}
	else if ( $announcement['announcement_show'] == 1 ) // Everyone
	{
		$announcement_show = 1;
		$announcement_show_everyone_guests = 1;
	}
	else 
	{
		$announcement_show = 0;
		$announcement_show_everyone_guests = 0;
	}
	//Announcement Centre by lefty74

	// Assign index specific vars
	$template->assign_vars(array(
		'ANNOUNCEMENT_TEXT' 			=> get_announcement($announcement['announcement_text']),
		'ANNOUNCEMENT_TEXT_GUESTS'		=> get_announcement($announcement['announcement_text_guests']),
		'ANNOUNCEMENT_TITLE' 			=> $announcement['announcement_title'],
		'ANNOUNCEMENT_TITLE_GUESTS' 	=> $announcement['announcement_title_guests'],
		'ANNOUNCEMENT_ENABLE' 			=> $announcement['announcement_enable'],
		'ANNOUNCEMENT_ENABLE_GUESTS' 	=> $announcement['announcement_enable_guests'],
		'ANNOUNCEMENT_SHOW' 			=> $announcement_show,
		'ANNOUNCEMENT_SHOW_EVERYONE' 	=> $announcement_show_everyone_guests,
		'ANNOUNCEMENT_SHOW_BIRTHDAY'	=> ( $birthday_list != '' && $announcement['announcement_show_birthdays'] ) ? true : false,
		'ANNOUNCEMENT_BIRTHDAY_AVATAR'	=> ($announcement['announcement_birthday_avatar']) ? true : false)
		);
}

/**
* prepares the announcement text
*/
function get_announcement($text)
{
			
	$text			= utf8_normalize_nfc($text);
	$uid			= $bitfield			= $options	= '';	
	$allow_bbcode	= $allow_smilies	= true;
	$allow_urls		= false;
	generate_text_for_storage($text, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
	$text			= generate_text_for_display($text, $uid, $bitfield, $options);
	
	return $text;
}

?>
