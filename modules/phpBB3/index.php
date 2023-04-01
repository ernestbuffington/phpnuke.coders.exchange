<?php
/**
*
* @package phpBB3
* @version $Id: index.php,v 1.176 2007/10/05 14:30:06 acydburn Exp $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
// IBPro Game Support
$autocom = request_var('autocom', '');
$act = request_var('act', '');
$do = request_var('do','');

if (strtolower($act) == 'arcade' && strtolower($do) == 'newscore')
{
	require($phpbb_root_path . 'includes/arcade/scoretype/ibpro.'.$phpEx);
}

if (strtolower($autocom) == 'arcade')
{
	require($phpbb_root_path . 'includes/arcade/scoretype/ibprov3.'.$phpEx);
}
//IBPro Game Support
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/functions_announcements.' . $phpEx);


// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');
$user->add_lang('mods/shout');
//-- mod : AJAX Chat ----------------------------------------------------
//-- add
include($phpbb_root_path . 'shout.' . $phpEx);
//-- fin mod : AJAX Chat ------------------------------------------------
display_forums('', $config['load_moderators']);

// Set some stats, get posts count from forums data if we... hum... retrieve all forums data
$total_posts	= $config['num_posts'];
$total_topics	= $config['num_topics'];
$total_users	= $config['num_users'];

$l_total_user_s = ($total_users == 0) ? 'TOTAL_USERS_ZERO' : 'TOTAL_USERS_OTHER';
$l_total_post_s = ($total_posts == 0) ? 'TOTAL_POSTS_ZERO' : 'TOTAL_POSTS_OTHER';
$l_total_topic_s = ($total_topics == 0) ? 'TOTAL_TOPICS_ZERO' : 'TOTAL_TOPICS_OTHER';
$user->add_lang('mods/info_acp_gallery');
$total_images = $config['num_images'];
$l_total_image_s = ($total_images == 0) ? 'TOTAL_IMAGES_ZERO' : 'TOTAL_IMAGES_OTHER';

// Grab group details for legend display
if ($auth->acl_gets('a_group', 'a_groupadd', 'a_groupdel'))
{
	$sql = 'SELECT group_id, group_name, group_colour, group_type
		FROM ' . GROUPS_TABLE . '
		WHERE group_legend = 1
		ORDER BY group_name ASC';
}
else
{
	$sql = 'SELECT g.group_id, g.group_name, g.group_colour, g.group_type
		FROM ' . GROUPS_TABLE . ' g
		LEFT JOIN ' . USER_GROUP_TABLE . ' ug
			ON (
				g.group_id = ug.group_id
				AND ug.user_id = ' . $user->data['user_id'] . '
				AND ug.user_pending = 0
			)
		WHERE g.group_legend = 1
			AND (g.group_type <> ' . GROUP_HIDDEN . ' OR ug.user_id = ' . $user->data['user_id'] . ')
		ORDER BY g.group_name ASC';
}
$result = $db->sql_query($sql);

$legend = array();
while ($row = $db->sql_fetchrow($result))
{
	$colour_text = ($row['group_colour']) ? ' style="color:#' . $row['group_colour'] . '"' : '';
	$group_name = ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name'];

	if ($row['group_name'] == 'BOTS' || ($user->data['user_id'] != ANONYMOUS && !$auth->acl_get('u_viewprofile')))
	{
		$legend[] = '<span' . $colour_text . '>' . $group_name . '</span>';
	}
	else
	{
		$legend[] = '<a' . $colour_text . ' href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=group&amp;g=' . $row['group_id']) . '">' . $group_name . '</a>';
	}
}
$db->sql_freeresult($result);

$legend = implode(', ', $legend);

// Generate birthday list if required ...
$birthday_list = '';
$bd_list_ary = array();
if ($config['load_birthdays'] && $config['allow_birthdays'])
{
	$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
	$sql = 'SELECT user_id, username, user_colour, user_birthday, user_email, user_lang,user_notify_type, user_jabber, user_avatar, user_avatar_type, user_avatar_width, user_avatar_height
		FROM ' . USERS_TABLE . "
		WHERE user_birthday LIKE '" . $db->sql_escape(sprintf('%2d-%2d-', $now['mday'], $now['mon'])) . "%'
			AND user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$birthday_list .= (($birthday_list != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']);

		if ($age = (int) substr($row['user_birthday'], -4))
		{
			$birthday_list .= ' (' . ($now['year'] - $age) . ')';
		}
		//obtain the avatar and username for the birthday announcements
		$max_bdavatar_size = $avatar_width = $avatar_height = '';
		if ( !empty($row['user_avatar']) )
		{
			$max_bdavatar_size = 40; // This is going to be the maximum dimensions for the avatar width or height, change this value if you want the maximum dimensions different
		
			if ( $row['user_avatar_width'] >= $row['user_avatar_height'] )
			{
				$avatar_width = ( $row['user_avatar_width'] > $max_bdavatar_size ) ? $max_bdavatar_size : $row['user_avatar_width'] ;
				$avatar_height = ( $avatar_width == $max_bdavatar_size ) ? round($max_bdavatar_size / $row['user_avatar_width'] * $row['user_avatar_height']) : $row['user_avatar_height'] ;
			}
			else 
			{
				$avatar_height = ( $row['user_avatar_height'] > $max_bdavatar_size ) ? $max_bdavatar_size : $row['user_avatar_height'] ;
				$avatar_width = ( $avatar_height == $max_bdavatar_size ) ? round($max_bdavatar_size / $row['user_avatar_height'] * $row['user_avatar_width']) : $row['user_avatar_width'] ;
			}
		}
				
		$template->assign_block_vars('bdannounce', array(
		'AVATAR'	=> get_user_avatar($row['user_avatar'], $row['user_avatar_type'], $avatar_width, $avatar_height, $row['username']),
		'USERNAME'	=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'])));

	if (trim($row['user_email']) && $config['birthday_emails'])
		{
			$bd_list_ary[] = array(
				'method'	=> $row['user_notify_type'],
				'email'		=> $row['user_email'],
				'jabber'	=> $row['user_jabber'],
				'name'		=> $row['username'],
				'lang'		=> $row['user_lang']
			);
		}
	}
	$db->sql_freeresult($result);

	$nowvar = getdate(time() + ($config['board_timezone'] + $config['board_dst'])*3600 - date('Z'));

	if ( sizeof($bd_list_ary) && $config['birthday_run'] < mktime(0, 0, 0, $nowvar['mon'], $nowvar['mday'], $nowvar['year']) && $config['birthday_emails'] )
   {
   set_config('birthday_run', mktime(0, 0, 0, $nowvar['mon'], $nowvar['mday'], $nowvar['year']));

   include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
	$messenger = new messenger();

	foreach ($bd_list_ary as $pos => $addr)
	{
		$messenger->template('birthday_email', $addr['lang']);

		$messenger->to($addr['email'], $addr['name']);
		$messenger->im($addr['jabber'], $addr['name']);

		$messenger->assign_vars(array(
			'USERNAME'		=> htmlspecialchars_decode($addr['name'])
		));

		$messenger->send($addr['method']);
	}
	unset($bd_list_ary);

	$messenger->save_queue();
	unset($messenger);
	}
	$cache->destroy('config');
}
get_announcement_data( ($birthday_list) ? true : false );
// Generate birthday ahead list if required ...
if ($config['load_birthdays'] && $config['allow_birthdays'] && ( $config['allow_birthdays_ahead'] > 0 ) )
{
	include_once($phpbb_root_path . 'includes/functions_upcbirthdays.' . $phpEx);
	get_upcbirthdays();
}

// if automatic reminders is set, remind people. lets only run this once a day.
if ( $config['user_reminder_enable'] == ENABLED )
{
	$check_time = (int) gmdate('mdY',time() + (3600 * ($config['board_timezone'] + $config['board_dst'])));

	if ( $config['user_reminder_last_auto_run'] < $check_time)
	{
		if (!function_exists('send_user_reminders'))
		{
			include($phpbb_root_path . 'includes/functions_user_reminder.' . $phpEx);
		}
		send_user_reminders();

		set_config('user_reminder_last_auto_run', $check_time);
	}
}

//Generate top poster list if enabled
if ($config['amount_top_posters'])
{
	if (!function_exists('get_top_posters'))
	{	
		include_once($phpbb_root_path . 'includes/functions_topposter.' . $phpEx);
	}
	get_top_posters();
}

// Assign index specific vars
$template->assign_vars(array(
	'TOTAL_POSTS'	=> sprintf($user->lang[$l_total_post_s], $total_posts),
	'TOTAL_TOPICS'	=> sprintf($user->lang[$l_total_topic_s], $total_topics),
	'TOTAL_USERS'	=> sprintf($user->lang[$l_total_user_s], $total_users),
	'TOTAL_IMAGES'	=> ($config['gallery_total_images']) ? sprintf($user->lang[$l_total_image_s], $total_images) : '',
	'NEWEST_USER'	=> sprintf($user->lang['NEWEST_USER'], get_username_string('full', $config['newest_user_id'], $config['newest_username'], $config['newest_user_colour'])),

	'LEGEND'		=> $legend,
	'BIRTHDAY_LIST'	=> $birthday_list,

	'FORUM_IMG'				=> $user->img('forum_read', 'NO_NEW_POSTS'),
	'FORUM_NEW_IMG'			=> $user->img('forum_unread', 'NEW_POSTS'),
	'FORUM_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NO_NEW_POSTS_LOCKED'),
	'FORUM_NEW_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'NO_NEW_POSTS_LOCKED'),

	'S_LOGIN_ACTION'			=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'S_DISPLAY_BIRTHDAY_LIST'	=> ($config['load_birthdays']) ? true : false,

	'U_MARK_FORUMS'		=> ($user->data['is_registered'] || $config['load_anon_lastread']) ? append_sid("{$phpbb_root_path}index.$phpEx", 'hash=' . generate_link_hash('global') . '&amp;mark=forums') : '',
	'U_MCP'				=> ($auth->acl_get('m_') || $auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=main&amp;mode=front', true, $user->session_id) : '')
);

include($phpbb_root_path . 'includes/functions_activity_stats.' . $phpEx);
activity_mod();

// Output page
page_header($user->lang['INDEX']);
include($phpbb_root_path . 'includes/functions_wwh.' . $phpEx);

$template->set_filenames(array(
	'body' => 'index_body.html')
);

page_footer();

?>