<?php
/***************************************************************************
 *                           usercp_viewprofile.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: usercp_viewprofile.php,v 1.5.2.5 2005/07/19 20:01:16 acydburn Exp
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * StrStartsWithRector (https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)
 * NullToStrictStringFuncCallArgRector
 */
 
if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
	exit;
}

if ( empty($_GET[POST_USERS_URL]) || $_GET[POST_USERS_URL] == ANONYMOUS )
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}
$profiledata = get_userdata($_GET[POST_USERS_URL]);
if (!$profiledata)
{
	message_die(GENERAL_MESSAGE, $lang['No_user_id_specified']);
}

$sql = "SELECT *
	FROM " . RANKS_TABLE . "
	ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain ranks information', '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
	$ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Output page header and profile_view template
//
$template->set_filenames(array(
	'body' => 'profile_view_body.tpl')
);
if (is_active("Forums")) {
    make_jumpbox('viewforum.'.$phpEx);
}
//
// Calculate the number of days this user has been a member ($memberdays)
// Then calculate their posts per day
//
$regdate = $profiledata['nuke_user_regdate'];
$nukedate = strtotime((string) $regdate);
$memberdays = max(1, round( ( time() - $nukedate ) / 86400 ));
$posts_per_day = $profiledata['nuke_user_posts'] / $memberdays;

// Get the users percentage of total posts
if ( $profiledata['nuke_user_posts'] != 0  )
{
	$total_posts = get_db_stat('postcount');
	$percentage = ( $total_posts ) ? min(100, ($profiledata['nuke_user_posts'] / $total_posts) * 100) : 0;
}
else
{
	$percentage = 0;
}

if($profiledata['user_avatar'] == '') { $profiledata['user_avatar'] = 'blank.png'; }

$avatar_img = '';
if ( $profiledata['nuke_user_avatar_type'] && $profiledata['user_allowavatar'] )
{
  switch( $profiledata['nuke_user_avatar_type'] )
  {
	case USER_AVATAR_UPLOAD:
    $avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img style="border-radius: 15px; max-width: 150px; max-height: 150px;" src="'.$board_config['avatar_path'].'/'.$profiledata['user_avatar'].'" alt=""/>' : '';
	break;
	
	case USER_AVATAR_REMOTE:
	$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img style="border-radius: 15px; max-width: 150px; max-height: 150px;" src="'.$profiledata['user_avatar'].'" alt=""/>' : '';
	break;
	
	case USER_AVATAR_GALLERY:
	$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img style="border-radius: 15px; max-width: 150px; max-height: 150px;" src="'.$board_config['avatar_gallery_path'].'/'.$profiledata['user_avatar'].'" alt=""/>' : '';
	break;
	}
}

$poster_rank = '';
$rank_image = '';
if ( $profiledata['nuke_user_rank'] )
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['nuke_user_rank'] == $ranksrow[$i]['rank_id'] && $ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}
else
{
	for($i = 0; $i < count($ranksrow); $i++)
	{
		if ( $profiledata['nuke_user_posts'] >= $ranksrow[$i]['rank_min'] && !$ranksrow[$i]['rank_special'] )
		{
			$poster_rank = $ranksrow[$i]['rank_title'];
			$rank_image = ( $ranksrow[$i]['rank_image'] ) ? '<img src="' . $ranksrow[$i]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
		}
	}
}

$temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=" . $profiledata['user_id']);
if (is_active("Private_Messages")) {
$pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
$pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';
}

if($profiledata['user_email'] == ''){
$pm_img = 'disabled';
$pm = 'disabled';
}

if ( !empty($profiledata['user_viewemail']) || $userdata['user_level'] == ADMIN ) {
	$email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $profiledata['user_id']) : 'mailto:' . $profiledata['user_email'];
	$email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
	$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
} else {
	
	if($profiledata['user_email'] == '') {
	  $profiledata['user_email'] = 'JackFromWales4u2@gmail.com'; // change this to someone you hate!
	  $email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $profiledata['user_id']) : 'mailto:' . $profiledata['user_email'];
	  $email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
	  $email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
	} else {
	  $email_img = 'Hidden';
	  $email = 'Hidden';
	}
}

if(empty($profiledata['user_website'])) { $profiledata['user_website'] = 'https://www.phpnuke.coders.exchange'; }

$www_img = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '&nbsp;';
$www = ( $profiledata['user_website'] ) ? '<a href="' . $profiledata['user_website'] . '" target="_userwww">' . $profiledata['user_website'] . '</a>' : '&nbsp;';

$temp_url = append_sid("search.$phpEx?search_author=" . urlencode((string) $profiledata['username']) . "&amp;showresults=posts");
$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . $lang['Search_nuke_user_posts'] . '" title="' . sprintf($lang['Search_nuke_user_posts'], $profiledata['username']) . '" border="0" /></a>';
$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_nuke_user_posts'], $profiledata['username']) . '</a>';

//
// Generate page
//
$page_title = $lang['Viewing_profile'];
include("modules/Forums/includes/page_header.php");
$profiledata['user_from'] = str_replace(".gif", "", (string) $profiledata['user_from']);
if (function_exists('get_html_translation_table'))
{
	$u_search_author = urlencode(strtr($profiledata['username'], array_flip(get_html_translation_table(HTML_ENTITIES))));
}
else
{
	$u_search_author = urlencode(str_replace(array('&amp;', '&#039;', '&quot;', '&lt;', '&gt;'), array('&', "'", '"', '<', '>'), (string) $profiledata['username']));
}

if($profiledata['nuke_user_regdate'] == '') { $profiledata['nuke_user_regdate'] = 'Jan 01, 2000'; }

$template->assign_vars(array(
	'USERNAME' => $profiledata['username'],
    'JOINED' => $profiledata['nuke_user_regdate'],
	'POSTER_RANK' => $poster_rank,
	'RANK_IMAGE' => $rank_image,
	'POSTS_PER_DAY' => $posts_per_day,
	'POSTS' => $profiledata['nuke_user_posts'],
    'PERCENTAGE' => $percentage . '%',
    'POST_DAY_STATS' => sprintf($lang['User_post_day_stats'], $posts_per_day),
    'POST_PERCENT_STATS' => sprintf($lang['User_post_pct_stats'], $percentage),
	'SEARCH_IMG' => $search_img,
	'SEARCH' => $search,
	'PM_IMG' => $pm_img,
	'PM' => $pm,
	'EMAIL_IMG' => $email_img,
	'EMAIL' => $email,
	'WWW_IMG' => $www_img,
	'WWW' => $www,

	// deprecated START
	'ICQ_STATUS_IMG' => '',
	'ICQ_IMG' => 'deprecated', 
	'ICQ' => 'deprecated',
	 
	'AIM_IMG' => 'deprecated',
	'AIM' => 'deprecated',

	'MSN_IMG' => 'deprecated',
	'MSN' => 'deprecated',

	'YIM_IMG' => 'deprecated',
	'YIM' => 'deprecated',
    // deprecated END
	
	'LOCATION' => ( $profiledata['user_from'] ) ? $profiledata['user_from'] : '&nbsp;',
	'OCCUPATION' => ( $profiledata['user_occ'] ) ? $profiledata['user_occ'] : '&nbsp;',
	'INTERESTS' => ( $profiledata['user_interests'] ) ? $profiledata['user_interests'] : '&nbsp;',
	'AVATAR_IMG' => $avatar_img,

    'L_VIEWING_PROFILE' => sprintf($lang['Viewing_user_profile'], $profiledata['username']),
    'L_ABOUT_USER' => sprintf($lang['About_user'], $profiledata['username']),
    'L_AVATAR' => $lang['Avatar'],
    'L_POSTER_RANK' => $lang['Poster_rank'],
    'L_JOINED' => $lang['Joined'],
    'L_TOTAL_POSTS' => $lang['Total_posts'],
    'L_SEARCH_USER_POSTS' => sprintf($lang['Search_nuke_user_posts'], $profiledata['username']),
	'L_CONTACT' => $lang['Contact'],
	'L_EMAIL_ADDRESS' => $lang['Email_address'],
	'L_EMAIL' => $lang['Email'],
	'L_PM' => $lang['Private_Message'],
	'L_ICQ_NUMBER' => $lang['ICQ'],
	'L_YAHOO' => $lang['YIM'],
	'L_AIM' => $lang['AIM'],
	'L_MESSENGER' => $lang['MSNM'],
	'L_WEBSITE' => $lang['Website'],
	'L_LOCATION' => $lang['Location'],
	'L_OCCUPATION' => $lang['Occupation'],
	'L_INTERESTS' => $lang['Interests'],

	'U_SEARCH_USER' => append_sid("search.$phpEx?search_author=" . $u_search_author),

	'S_PROFILE_ACTION' => append_sid("profile.$phpEx"))
);

$template->pparse('body');

include("modules/Forums/includes/page_tail.php");

