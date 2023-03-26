<?php
/***************************************************************************
 *                               viewforum.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: viewforum.php,v 1.139.2.12 2004/03/13 15:08:23 acydburn Exp
 *
 *
 ***************************************************************************/

/***************************************************************************
* phpbb2 forums port version 2.0.5 (c) 2003 - Nuke Cops (http://nukecops.com)
*
* Ported by Nuke Cops to phpbb2 standalone 2.0.5 Test
* and debugging completed by the Elite Nukers and site members.
*
* You run this package at your sole risk. Nuke Cops and affiliates cannot
* be held liable if anything goes wrong. You are advised to test this
* package on a development system. Backup everything before implementing
* in a production environment. If something goes wrong, you can always
* backout and restore your backups.
*
* Installing and running this also means you agree to the terms of the AUP
* found at Nuke Cops.
*
* This is version 2.0.5 of the phpbb2 forum port for PHP-Nuke. Work is based
* on Tom Nitzschner's forum port version 2.0.6. Tom's 2.0.6 port was based
* on the phpbb2 standalone version 2.0.3. Our version 2.0.5 from Nuke Cops is
* now reflecting phpbb2 standalone 2.0.5 that fixes some bugs and the
* invalid_session error message.
***************************************************************************/
/***************************************************************************
 *   This file is part of the phpBB2 port to Nuke 6.0 (c) copyright 2002
 *   by Tom Nitzschner (tom@toms-home.com)
 *   http://bbtonuke.sourceforge.net (or http://www.toms-home.com)
 *
 *   As always, make a backup before messing with anything. All code
 *   release by me is considered sample code only. It may be fully
 *   functual, but you use it at your own risk, if you break it,
 *   you get to fix it too. No waranty is given or implied.
 *
 *   Please post all questions/request about this port on http://bbtonuke.sourceforge.net first,
 *   then on my site. All original header code and copyright messages will be maintained
 *   to give credit where credit is due. If you modify this, the only requirement is
 *   that you also maintain all original copyright messages. All my work is released
 *   under the GNU GENERAL PUBLIC LICENSE. Please see the README for more information.
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * TernaryToNullCoalescingRector
 * CountOnNullRector (https://3v4l.org/Bndc9)
 * SetCookieRector (https://www.php.net/setcookie https://wiki.php.net/rfc/same-site-cookie)
 * NullToStrictStringFuncCallArgRector
 */
 
if ( !defined('MODULE_FILE') )
{
	die("You can't access this file directly...");
}
if (!isset($popup)){
    $module_name = basename(dirname(__FILE__));
    require("modules/".$module_name."/nukebb.php");
}
else
{
    $phpbb_root_path = 'modules/Forums/';
}
define('IN_PHPBB', true);
//$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

//
// Start initial var setup
//
if ( isset($_GET[POST_FORUM_URL]) || isset($_POST[POST_FORUM_URL]) )
{
        $forum_id = ( isset($_GET[POST_FORUM_URL]) ) ? intval($_GET[POST_FORUM_URL]) : intval($_POST[POST_FORUM_URL]);
}
else if ( isset($_GET['forum']))
{
        $forum_id = intval($_GET['forum']);
}
else
{
        $forum_id = '';
}

$start = ( isset($_GET['start']) ) ? intval($_GET['start']) : 0;

if ( isset($_GET['mark']) || isset($_POST['mark']) )
{
        $mark_read = $_POST['mark'] ?? $_GET['mark'];
}
else
{
        $mark_read = '';
}
//
// End initial var setup
//

//
// Check if the user has actually sent a forum ID with his/her request
// If not give them a nice error page.
//
if ( !empty($forum_id) )
{
        $sql = "SELECT *
                FROM " . FORUMS_TABLE . "
                WHERE forum_id = '$forum_id'";
        if ( !($result = $db->sql_query($sql)) )
        {
                message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
        }
}
else
{
        message_die(GENERAL_MESSAGE, 'Forum_not_exist');
}

//
// If the query doesn't return any rows this isn't a valid forum. Inform
// the user.
//
if ( !($forum_row = $db->sql_fetchrow($result)) )
{
        message_die(GENERAL_MESSAGE, 'Forum_not_exist');
}

//
// Start session management
//
$userdata = session_pagestart($user_ip, $forum_id, $nukeuser);
init_userprefs($userdata);
//
// End session management
//

//
// Start auth check
//
$is_auth = array();
$is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_row);

if ( !$is_auth['auth_read'] || !$is_auth['auth_view'] )
{
        if ( !$userdata['session_logged_in'] )
        {
                $redirect = POST_FORUM_URL . "=$forum_id" . ( ( isset($start) ) ? "&start=$start" : '' );
                $header_location = ( preg_match("/Microsoft|WebSTAR|Xitami/", (string) $_SERVER["SERVER_SOFTWARE"]) ) ? "Refresh: 0; URL=" : "Location: ";
                header($header_location . append_sid("login.$phpEx?redirect=viewforum.$phpEx&$redirect", true));
                exit;
        }
        //
        // The user is not authed to read this forum ...
        //
        $message = ( !$is_auth['auth_view'] ) ? $lang['Forum_not_exist'] : sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);

        message_die(GENERAL_MESSAGE, $message);
}
//
// End of auth check
//

//
// Handle marking posts
//
if ( $mark_read == 'topics' )
{
        if ( $userdata['session_logged_in'] )
        {
                $sql = "SELECT MAX(post_time) AS last_post
                        FROM " . POSTS_TABLE . "
                        WHERE forum_id = '$forum_id'";
                if ( !($result = $db->sql_query($sql)) )
                {
                        message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
                }

                if ( $row = $db->sql_fetchrow($result) )
                {
                        $tracking_forums = ( isset($_COOKIE[$board_config['cookie_name'] . '_f']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_f']) : array();
                        $tracking_topics = ( isset($_COOKIE[$board_config['cookie_name'] . '_t']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_t']) : array();

                        if ( ( (is_countable($tracking_forums) ? count($tracking_forums) : 0) + count($tracking_topics) ) >= 150 && empty($tracking_forums[$forum_id]) )
                        {
                                asort($tracking_forums);
                                unset($tracking_forums[key($tracking_forums)]);
                        }

                        if ( $row['last_post'] > $userdata['user_lastvisit'] )
                        {
                                $tracking_forums[$forum_id] = time();

                                setcookie($board_config['cookie_name'] . '_f', serialize($tracking_forums), ['expires' => 0, 'path' => $board_config['cookie_path'], 'domain' => $board_config['cookie_domain'], 'secure' => $board_config['cookie_secure']]);
                        }
                }

                $template->assign_vars(array(
                        'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">')
                );
        }

        $message = $lang['Topics_marked_read'] . '<br /><br />' . sprintf($lang['Click_return_forum'], '<a href="' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">', '</a> ');
        message_die(GENERAL_MESSAGE, $message);
}
//
// End handle marking posts
//

$tracking_topics = ( isset($_COOKIE[$board_config['cookie_name'] . '_t']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_t']) : '';
$tracking_forums = ( isset($_COOKIE[$board_config['cookie_name'] . '_f']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_f']) : '';

//
// Do the forum Prune
//
if ( $is_auth['auth_mod'] && $board_config['prune_enable'] )
{
        if ( $forum_row['prune_next'] < time() && $forum_row['prune_enable'] )

        {

                include("includes/prune.php");

                require("includes/functions_admin.php");
                auto_prune($forum_id);
        }
}
//
// End of forum prune
//

//
// Obtain list of moderators of each forum
// First users, then groups ... broken into two queries
//
$sql = "SELECT u.user_id, u.username
        FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g, " . USERS_TABLE . " u
        WHERE aa.forum_id = '$forum_id'
                AND aa.auth_mod = " . TRUE . "
                AND g.group_single_user = '1'
                AND ug.nuke_group_id = aa.nuke_group_id
                AND g.nuke_group_id = aa.nuke_group_id
                AND u.user_id = ug.user_id
        GROUP BY u.user_id, u.username
        ORDER BY u.user_id";
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

$moderators = array();
while( $row = $db->sql_fetchrow($result) )
{
        $moderators[] = '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=" . $row['user_id']) . '">' . $row['username'] . '</a>';
}

$sql = "SELECT g.nuke_group_id, g.group_name
        FROM " . AUTH_ACCESS_TABLE . " aa, " . USER_GROUP_TABLE . " ug, " . GROUPS_TABLE . " g
        WHERE aa.forum_id = '$forum_id'
                AND aa.auth_mod = " . TRUE . "
                AND g.group_single_user = '0'
                AND g.group_type <> ". GROUP_HIDDEN ."
                AND ug.nuke_group_id = aa.nuke_group_id
                AND g.nuke_group_id = aa.nuke_group_id
        GROUP BY g.nuke_group_id, g.group_name
        ORDER BY g.nuke_group_id";
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, 'Could not query forum moderator information', '', __LINE__, __FILE__, $sql);
}

while( $row = $db->sql_fetchrow($result) )
{
        $moderators[] = '<a href="' . append_sid("groupcp.$phpEx?" . POST_GROUPS_URL . "=" . $row['nuke_group_id']) . '">' . $row['group_name'] . '</a>';
}

$l_moderators = ( count($moderators) == 1 ) ? $lang['Moderator'] : $lang['Moderators'];
$forum_moderators = ( count($moderators) ) ? implode(', ', $moderators) : $lang['None'];
unset($moderators);

//
// Generate a 'Show topics in previous x days' select box. If the topicsdays var is sent
// then get it's value, find the number of topics with dates newer than it (to properly
// handle pagination) and alter the main query
//
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Topics'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

if ( !empty($_POST['topicdays']) || !empty($_GET['topicdays']) )
{
        $topic_days = ( !empty($_POST['topicdays']) ) ? intval($_POST['topicdays']) : intval($_GET['topicdays']);
        $min_topic_time = time() - ($topic_days * 86400);

        $sql = "SELECT COUNT(t.topic_id) AS forum_topics
                FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
                WHERE t.forum_id = '$forum_id'
                        AND p.post_id = t.topic_last_post_id
                        AND p.post_time >= '$min_topic_time'";

        if ( !($result = $db->sql_query($sql)) )
        {
                message_die(GENERAL_ERROR, 'Could not obtain limited topics count information', '', __LINE__, __FILE__, $sql);
        }
        $row = $db->sql_fetchrow($result);

        $topics_count = ( $row['forum_topics'] ) ? $row['forum_topics'] : 1;
        $limit_topics_time = "AND p.post_time >= $min_topic_time";

        if ( !empty($_POST['topicdays']) )
        {
                $start = 0;
        }
}
else
{
        $topics_count = ( $forum_row['forum_topics'] ) ? $forum_row['forum_topics'] : 1;

        $limit_topics_time = '';
        $topic_days = 0;
}

$select_topic_days = '<select name="topicdays">';
for($i = 0; $i < count($previous_days); $i++)
{
        $selected = ($topic_days == $previous_days[$i]) ? ' selected="selected"' : '';
        $select_topic_days .= '<option value="' . $previous_days[$i] . '"' . $selected . '>' . $previous_days_text[$i] . '</option>';
}
$select_topic_days .= '</select>';


//
// All announcement data, this keeps announcements
// on each viewforum page ...
//
$sql = "SELECT t.*, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_time, p.post_username
        FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . USERS_TABLE . " u2
        WHERE t.forum_id = '$forum_id'
                AND t.topic_poster = u.user_id
                AND p.post_id = t.topic_last_post_id
                AND p.poster_id = u2.user_id
                AND t.topic_type = " . POST_ANNOUNCE . "
        ORDER BY t.topic_last_post_id DESC ";
if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
}

$topic_rowset = array();
$total_announcements = 0;
while( $row = $db->sql_fetchrow($result) )
{
        $topic_rowset[] = $row;
        $total_announcements++;
}

$db->sql_freeresult($result);

//
// Grab all the basic data (all topics except announcements)
// for this forum
//
$sql = "SELECT t.*, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_username, p2.post_username AS post_username2, p2.post_time
        FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2, " . USERS_TABLE . " u2
        WHERE t.forum_id = '$forum_id'
                AND t.topic_poster = u.user_id
                AND p.post_id = t.topic_first_post_id
                AND p2.post_id = t.topic_last_post_id
                AND u2.user_id = p2.poster_id
                AND t.topic_type <> " . POST_ANNOUNCE . "
                $limit_topics_time
        ORDER BY t.topic_type DESC, t.topic_last_post_id DESC
        LIMIT $start, ".$board_config['topics_per_page'];
if ( !($result = $db->sql_query($sql)) )
{
   message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql);
}

$total_topics = 0;
while( $row = $db->sql_fetchrow($result) )
{
        $topic_rowset[] = $row;
        $total_topics++;
}

$db->sql_freeresult($result);

//
// Total topics ...
//
$total_topics += $total_announcements;

//
// Define censored word matches
//
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//
// Post URL generation for templating vars
//
$template->assign_vars(array(
        'L_DISPLAY_TOPICS' => $lang['Display_topics'],

        'U_POST_NEW_TOPIC' => append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id"),

        'S_SELECT_TOPIC_DAYS' => $select_topic_days,
        'S_POST_DAYS_ACTION' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $forum_id . "&amp;start=$start"))
);

//
// User authorisation levels output
//
$s_auth_can = ( ( $is_auth['auth_post'] ) ? $lang['Rules_post_can'] : $lang['Rules_post_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_reply'] ) ? $lang['Rules_reply_can'] : $lang['Rules_reply_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_edit'] ) ? $lang['Rules_edit_can'] : $lang['Rules_edit_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_delete'] ) ? $lang['Rules_delete_can'] : $lang['Rules_delete_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_vote'] ) ? $lang['Rules_vote_can'] : $lang['Rules_vote_cannot'] ) . '<br />';

if ( $is_auth['auth_mod'] )
{
        $s_auth_can .= sprintf($lang['Rules_moderate'], '<a href="' . append_sid("modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">', '</a>');
}

//
// Mozilla navigation bar
//
$nav_links['up'] = array(
        'url' => append_sid('index.'.$phpEx),
        'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
);

//
// Dump out the page header and load viewforum template
//
define('SHOW_ONLINE', true);
$page_title = $lang['View_forum'] . ' - ' . $forum_row['forum_name'];
include("includes/page_header.php");

$template->set_filenames(array(
        'body' => 'viewforum_body.tpl')
);
make_jumpbox('viewforum.'.$phpEx);

$template->assign_vars(array(
        'FORUM_ID' => $forum_id,
        'FORUM_NAME' => $forum_row['forum_name'],
        'MODERATORS' => $forum_moderators,
        'POST_IMG' => ( $forum_row['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'],

        'FOLDER_IMG' => $images['folder'],
        'FOLDER_NEW_IMG' => $images['folder_new'],
        'FOLDER_HOT_IMG' => $images['folder_hot'],
        'FOLDER_HOT_NEW_IMG' => $images['folder_hot_new'],
        'FOLDER_LOCKED_IMG' => $images['folder_locked'],
        'FOLDER_LOCKED_NEW_IMG' => $images['folder_locked_new'],
        'FOLDER_STICKY_IMG' => $images['folder_sticky'],
        'FOLDER_STICKY_NEW_IMG' => $images['folder_sticky_new'],
        'FOLDER_ANNOUNCE_IMG' => $images['folder_announce'],
        'FOLDER_ANNOUNCE_NEW_IMG' => $images['folder_announce_new'],

        'L_TOPICS' => $lang['Topics'],
        'L_REPLIES' => $lang['Replies'],
        'L_VIEWS' => $lang['Views'],
        'L_POSTS' => $lang['Posts'],
        'L_LASTPOST' => $lang['Last_Post'],
        'L_MODERATOR' => $l_moderators,
        'L_MARK_TOPICS_READ' => $lang['Mark_all_topics'],
        'L_POST_NEW_TOPIC' => ( $forum_row['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'],
        'L_NO_NEW_POSTS' => $lang['No_new_posts'],
        'L_NEW_POSTS' => $lang['New_posts'],
        'L_NO_NEW_POSTS_LOCKED' => $lang['No_new_posts_locked'],
        'L_NEW_POSTS_LOCKED' => $lang['New_posts_locked'],
        'L_NO_NEW_POSTS_HOT' => $lang['No_new_posts_hot'],
        'L_NEW_POSTS_HOT' => $lang['New_posts_hot'],
        'L_ANNOUNCEMENT' => $lang['Post_Announcement'],
        'L_STICKY' => $lang['Post_Sticky'],
        'L_POSTED' => $lang['Posted'],
        'L_JOINED' => $lang['Joined'],
        'L_AUTHOR' => $lang['Author'],

        'S_AUTH_LIST' => $s_auth_can,

        'U_VIEW_FORUM' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL ."=$forum_id"),

        'U_MARK_READ' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;mark=topics"))
);
//
// End header
//

//
// Okay, lets dump out the page ...
//
if( $total_topics )
{
        for($i = 0; $i < $total_topics; $i++)
        {
                $topic_id = $topic_rowset[$i]['topic_id'];

                $topic_title = ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, (string) $topic_rowset[$i]['topic_title']) : $topic_rowset[$i]['topic_title'];

                $replies = $topic_rowset[$i]['topic_replies'];

                $topic_type = $topic_rowset[$i]['topic_type'];

                if( $topic_type == POST_ANNOUNCE )
                {
                        $topic_type = $lang['Topic_Announcement'] . ' ';
                }
                else if( $topic_type == POST_STICKY )
                {
                        $topic_type = $lang['Topic_Sticky'] . ' ';
                }
                else
                {
                        $topic_type = '';
                }

                if( $topic_rowset[$i]['topic_vote'] )
                {
                        $topic_type .= $lang['Topic_Poll'] . ' ';
                }

                if( $topic_rowset[$i]['topic_status'] == TOPIC_MOVED )
                {
                        $topic_type = $lang['Topic_Moved'] . ' ';
                        $topic_id = $topic_rowset[$i]['topic_moved_id'];

                        $folder_image =  $images['folder'];
                        $folder_alt = $lang['Topics_Moved'];
                        $newest_post_img = '';
                }
                else
                {
                        if( $topic_rowset[$i]['topic_type'] == POST_ANNOUNCE )
                        {
                                $folder = $images['folder_announce'];
                                $folder_new = $images['folder_announce_new'];
                        }
                        else if( $topic_rowset[$i]['topic_type'] == POST_STICKY )
                        {
                                $folder = $images['folder_sticky'];
                                $folder_new = $images['folder_sticky_new'];
                        }
                        else if( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED )
                        {
                                $folder = $images['folder_locked'];
                                $folder_new = $images['folder_locked_new'];
                        }
                        else
                        {
                                if($replies >= $board_config['hot_threshold'])
                                {
                                        $folder = $images['folder_hot'];
                                        $folder_new = $images['folder_hot_new'];
                                }
                                else
                                {
                                        $folder = $images['folder'];
                                        $folder_new = $images['folder_new'];
                                }
                        }

                        $newest_post_img = '';
                        if( $userdata['session_logged_in'] )
                        {
                                if( $topic_rowset[$i]['post_time'] > $userdata['user_lastvisit'] )
                                {
                                        if( !empty($tracking_topics) || !empty($tracking_forums) || isset($_COOKIE[$board_config['cookie_name'] . '_f_all']) )
                                        {
                                                $unread_topics = true;

                                                if( !empty($tracking_topics[$topic_id]) )
                                                {
                                                        if( $tracking_topics[$topic_id] >= $topic_rowset[$i]['post_time'] )
                                                        {
                                                                $unread_topics = false;
                                                        }
                                                }

                                                if( !empty($tracking_forums[$forum_id]) )
                                                {
                                                        if( $tracking_forums[$forum_id] >= $topic_rowset[$i]['post_time'] )
                                                        {
                                                                $unread_topics = false;
                                                        }
                                                }

                                                if( isset($_COOKIE[$board_config['cookie_name'] . '_f_all']) )
                                                {
                                                        if( $_COOKIE[$board_config['cookie_name'] . '_f_all'] >= $topic_rowset[$i]['post_time'] )
                                                        {
                                                                $unread_topics = false;
                                                        }
                                                }

                                                if( $unread_topics )
                                                {
                                                        $folder_image = $folder_new;
                                                        $folder_alt = $lang['New_posts'];

                                                        $newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
                                                }
                                                else
                                                {
                                                        $folder_image = $folder;
                                                        $folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

                                                        $newest_post_img = '';
                                                }
                                        }
                                        else
                                        {
                                                $folder_image = $folder_new;
                                                $folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['New_posts'];

                                                $newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
                                        }
                                }
                                else
                                {
                                        $folder_image = $folder;
                                        $folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

                                        $newest_post_img = '';
                                }
                        }
                        else
                        {
                                $folder_image = $folder;
                                $folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

                                $newest_post_img = '';
                        }
                }

                if( ( $replies + 1 ) > $board_config['posts_per_page'] )
                {
                        $total_pages = ceil( ( $replies + 1 ) / $board_config['posts_per_page'] );
                        $goto_page = ' [ <img src="' . $images['icon_gotopost'] . '" alt="' . $lang['Goto_page'] . '" title="' . $lang['Goto_page'] . '" />' . $lang['Goto_page'] . ': ';

                        $times = 1;
                        for($j = 0; $j < $replies + 1; $j += $board_config['posts_per_page'])
                        {
                                $goto_page .= '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $topic_id . "&amp;start=$j") . '">' . $times . '</a>';
                                if( $times == 1 && $total_pages > 4 )
                                {
                                        $goto_page .= ' ... ';
                                        $times = $total_pages - 3;
                                        $j += ( $total_pages - 4 ) * $board_config['posts_per_page'];
                                }
                                else if ( $times < $total_pages )
                                {
                                        $goto_page .= ', ';
                                }
                                $times++;
                        }
                        $goto_page .= ' ] ';
                }
                else
                {
                        $goto_page = '';
                }

                $view_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id");

                $topic_author = ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '=' . $topic_rowset[$i]['user_id']) . '">' : '';
                $topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? $topic_rowset[$i]['username'] : ( ( $topic_rowset[$i]['post_username'] != '' ) ? $topic_rowset[$i]['post_username'] : $lang['Guest'] );

                $topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '</a>' : '';

                $first_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['topic_time'], $board_config['board_timezone']);

                $last_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['post_time'], $board_config['board_timezone']);

                $last_post_author = ( $topic_rowset[$i]['id2'] == ANONYMOUS ) ? ( ($topic_rowset[$i]['post_username2'] != '' ) ? $topic_rowset[$i]['post_username2'] . ' ' : $lang['Guest'] . ' ' ) : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $topic_rowset[$i]['id2']) . '">' . $topic_rowset[$i]['user2'] . '</a>';

                $last_post_url = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $topic_rowset[$i]['topic_last_post_id']) . '#' . $topic_rowset[$i]['topic_last_post_id'] . '"><img src="' . $images['icon_latest_reply'] . '" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" border="0" /></a>';

                $views = $topic_rowset[$i]['topic_views'];

                $row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
                $row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

                $template->assign_block_vars('topicrow', array(
                        'ROW_COLOR' => $row_color,
                        'ROW_CLASS' => $row_class,
                        'FORUM_ID' => $forum_id,
                        'TOPIC_ID' => $topic_id,
                        'TOPIC_FOLDER_IMG' => $folder_image,
                        'TOPIC_AUTHOR' => $topic_author,
                        'GOTO_PAGE' => $goto_page,
                        'REPLIES' => $replies,
                        'NEWEST_POST_IMG' => $newest_post_img,
                        'TOPIC_TITLE' => $topic_title,
                        'TOPIC_TYPE' => $topic_type,
                        'VIEWS' => $views,
                        'FIRST_POST_TIME' => $first_post_time,
                        'LAST_POST_TIME' => $last_post_time,
                        'LAST_POST_AUTHOR' => $last_post_author,
                        'LAST_POST_IMG' => $last_post_url,

                        'L_TOPIC_FOLDER_ALT' => $folder_alt,

                        'U_VIEW_TOPIC' => $view_topic_url)
                );
        }

        $topics_count -= $total_announcements;

        $template->assign_vars(array(
                'PAGINATION' => generate_pagination("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id&amp;topicdays=$topic_days", $topics_count, $board_config['topics_per_page'], $start),
                'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $topics_count / $board_config['topics_per_page'] )),

                'L_GOTO_PAGE' => $lang['Goto_page'])
        );
}
else
{
        //
        // No topics
        //
        $no_topics_msg = ( $forum_row['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['No_topics_post_one'];
        $template->assign_vars(array(
                'L_NO_TOPICS' => $no_topics_msg)
        );

        $template->assign_block_vars('switch_no_topics', array() );

}

//
// Parse the page and print
//
$template->pparse('body');

//
// Page footer
//
include("includes/page_tail.php");

