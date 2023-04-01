<?php
/**
*
* @package phpBB3
* @version $Id: ban_list.php,v 1.0.2 2008-06-11 00:22:48Z rmcgirr83 $
* @copyright (c) Richard McGirr III
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);


$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
// we need the constants
include($phpbb_root_path . 'includes/ban_list.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup(array('acp/ban','memberlist','mods/ban_list'));
 
// Can we view the list?
$allow = false;
// all users can view the list?
if ( $config['allow_ban_list'] == ALLOW_BAN_LIST_ALL_USERS && $auth->acl_get('u_') )
{
	$allow = true;
}
// only admins and mods can see the list?
elseif ( $config['allow_ban_list'] == ALLOW_BAN_LIST_MODS_ADMINS && ($auth->acl_getf_global('m_')))
{
	$allow = true;
}
// only admins can see the list?
elseif ( $config['allow_ban_list'] == ALLOW_BAN_LIST_ADMINS && $auth->acl_get('a_') )
{
	$allow = true;
}
// no one can see the list
if(!$allow)
{
	trigger_error('NOT_AUTHORISED');
}

// grab all user notes first
$sql = 'SELECT reportee_id
	FROM ' . LOG_TABLE . '
	WHERE log_type=' . LOG_USERS . '
	ORDER BY reportee_id';
$result = $db->sql_query($sql);

$reports_count = array();
while ($row = $db->sql_fetchrow($result))
{
	$reports_count[] = $row['reportee_id'];
}
$db->sql_freeresult($result);
$total_reports_count = count($reports_count);

// where to start
$start	= request_var('start', 0);

// set sorting options
$default_key = 'a';
$sort_key = request_var('sk', $default_key);
$sort_dir = request_var('sd', 'a');

// following shamelessly stolen from memberlist.php..thanks acydburn :)
// Sorting
$sort_key_text = array('a' => $user->lang['SORT_USERNAME'], 'b' => $user->lang['BAN_START_DATE'], 'c' => $user->lang['BAN_END_DATE']);
$sort_key_sql = array('a' => 'u.username_clean', 'b' => 'b.ban_start', 'c' => 'b.ban_end');
$sort_dir_text = array('a' => $user->lang['ASCENDING'], 'd' => $user->lang['DESCENDING']);

$s_sort_key = '';
foreach ($sort_key_text as $key => $value)
{
	$selected = ($sort_key == $key) ? ' selected="selected"' : '';
	$s_sort_key .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
}

$s_sort_dir = '';
foreach ($sort_dir_text as $key => $value)
{
	$selected = ($sort_dir == $key) ? ' selected="selected"' : '';
	$s_sort_dir .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
}

// initialize $first_char...others are below
$first_char = request_var('first_char', '');

$sql_where = 'AND b.ban_userid = u.user_id';

if ($first_char)
{
	$sql_where .= ' AND u.username_clean ' . $db->sql_like_expression(substr($first_char, 0, 1) . $db->any_char);
}

// Sorting and order
if (!isset($sort_key_sql[$sort_key]))
{
	$sort_key = $default_key;
}

$order_by = $sort_key_sql[$sort_key] . ' ' . (($sort_dir == 'a') ? 'ASC' : 'DESC');

$s_char_options = '<option value=""' . ((!$first_char) ? ' selected="selected"' : '') . '>&nbsp; &nbsp;</option>';
for ($i = 97; $i < 123; $i++)
{
	$s_char_options .= '<option value="' . chr($i) . '"' . (($first_char == chr($i)) ? ' selected="selected"' : '') . '>' . chr($i-32) . '</option>';
}

// Build a relevant pagination_url
$params = $sort_params = array();

// We do not use request_var() here directly to save some calls (not all variables are set)
$check_params = array(
	'sk'			=> array('sk', $default_key),
	'sd'			=> array('sd', 'a'),
	'username'		=> array('username', '', true),
	'ban_start'		=> array('ban_start', '', true),
	'ban_end'		=> array('ban_end','', true),
);

foreach ($check_params as $key => $call)
{
	if (!isset($_REQUEST[$key]))
	{
		continue;
	}

	$param = call_user_func_array('request_var', $call);
	$param = urlencode($key) . '=' . ((is_string($param)) ? urlencode($param) : $param);
	$params[] = $param;

	if ($key != 'sk' && $key != 'sd')
	{
		$sort_params[] = $param;
	}
}

$pagination_url = append_sid("{$phpbb_root_path}ban_list.$phpEx", implode('&amp;', $params));
$sort_url = append_sid("{$phpbb_root_path}ban_list.$phpEx", implode('&amp;', $sort_params));
unset($params, $sort_params);

$template->assign_vars(array(
	'S_SORT_OPTIONS'		=> $s_sort_key
));
// end of thievery..thanks again acydburn :)
// form a join on the note table

// grab some naughty users
$sql = 'SELECT b.*, u.user_id, u.username, u.username_clean, u.user_colour, u.user_warnings
	FROM ' . BANLIST_TABLE . ' b, ' . USERS_TABLE . ' u
	WHERE (b.ban_end >= ' . time() . '
		OR b.ban_end = 0)
		' . $sql_where . '
	ORDER BY ' . $order_by;
$result = $db->sql_query_limit($sql, $config['topics_per_page'], $start);

// for pagination..saves a query..meh
$result2 = $db->sql_query($sql);
$banned_users = array();

while ($row2 = $db->sql_fetchrow($result2))
{
	$banned_users[] = $row2['ban_userid'];
}

$total_banned_users = (int) count($banned_users);
$db->sql_freeresult($result2);

// let's free up some memory
unset($banned_users);

// end pagination
// only for those subsilver2 types
$row_number = $start;

// we gots us some results ?
if ($row = $db->sql_fetchrow($result))
{
	do
	{
		$row_number++;
		// how many reports does the user have?
		if ($total_reports_count)
		{
			$note_count = 0;
			for($i = 0; $i < $total_reports_count; $i++)
			{
	            if ( $row['user_id'] == $reports_count[$i])
	            {
					$note_count++;
	            }
			}
		}

		if ($row['ban_end'] <> '0')
		{
			$ban_end = $row['ban_end'];
		}
		else
		{
			$ban_end = '';
		}
		$ban_end_text = array(0 => $user->lang['PERMANENT'], 30 => $user->lang['30_MINS'], 60 => $user->lang['1_HOUR'], 360 => $user->lang['6_HOURS'], 1440 => $user->lang['1_DAY'], 10080 => $user->lang['7_DAYS'], 20160 => $user->lang['2_WEEKS'], 40320 => $user->lang['1_MONTH'], -1 => $user->lang['UNTIL'] . ' -&gt; ');
		$time_length = ($ban_end) ? ($ban_end - $row['ban_start']) / 60 : 0;
		$ban_length = (isset($ban_end_text[$time_length])) ? $ban_end_text[$time_length] : $user->lang['UNTIL'] . ' -> ' . $user->format_date($ban_end);


		$template->assign_block_vars('banlist_row', array(
			'ROW_NUMBER'			=> $row_number,
			'BAN_START'				=> $user->format_date($row['ban_start']),
			'BAN_END'				=> ($ban_end) ? $user->format_date($ban_end) : $user->lang['NEVER'],
			'BAN_REASON'			=> $row['ban_reason'],
			'BAN_TIME_DURATION' 	=> $ban_length,
			'USER_WARNINGS_COUNT'	=> (!empty($row['user_warnings'])) ? $user->lang['WARNINGS'] . ':&nbsp;' . $row['user_warnings'] : '',
			'USER_NOTES_COUNT'		=> (!empty($note_count)) ? $note_count : '',
			'USERNAME_FULL'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
			'U_NOTES'				=> ($auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=notes&amp;mode=user_notes&amp;u=' . $row['user_id'], true, $user->session_id) : '',)
		);
	}
	while ($row = $db->sql_fetchrow($result));

	$db->sql_freeresult($result);
}

//generate the page
$template->assign_vars(array(
	'L_BAN_USERNAME'	=> $user->lang['USERNAME'],

	'PAGINATION'		=> generate_pagination($pagination_url, $total_banned_users, $config['topics_per_page'], $start),
	'PAGE_NUMBER'		=> on_page($total_banned_users, $config['topics_per_page'], $start),
	'TOTAL_USERS'		=> ($total_banned_users == 1) ? $user->lang['LIST_USER'] : sprintf($user->lang['LIST_USERS'], $total_banned_users),
		
	'U_SORT_USERNAME'	=> $sort_url . '&amp;sk=a&amp;sd=' . (($sort_key == 'a' && $sort_dir == 'a') ? 'd' : 'a'),
	'U_SORT_BAN_START'	=> $sort_url . '&amp;sk=b&amp;sd=' . (($sort_key == 'b' && $sort_dir == 'a') ? 'd' : 'a'),
	'U_SORT_BAN_END'	=> $sort_url . '&amp;sk=c&amp;sd=' . (($sort_key == 'c' && $sort_dir == 'a') ? 'd' : 'a'),
		
	'S_MODE_SELECT'		=> $s_sort_key,
	'S_ORDER_SELECT'	=> $s_sort_dir,
	'S_CHAR_OPTIONS'	=> $s_char_options,
	'S_MODE_ACTION'		=> $pagination_url
));

// Output the page
page_header($user->lang['BANLIST']);
	
$template->set_filenames(array(
	'body' => 'ban_list_body.html'
));

make_jumpbox(append_sid("{$phpbb_root_path}viewforum.$phpEx"));
	
page_footer();

?>
