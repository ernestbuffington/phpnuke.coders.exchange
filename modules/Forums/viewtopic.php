<?php
/***************************************************************************
 *                               viewtopic.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: viewtopic.php,v 1.186.2.45 2005/10/05 17:42:04 grahamje Exp $
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
 ***************************************************************************/
 
/* Applied rules:
 * ReplaceHttpServerVarsByServerRector (https://blog.tigertech.net/posts/php-5-3-http-server-vars/)
 * PregReplaceEModifierRector (https://wiki.php.net/rfc/remove_preg_replace_eval_modifier https://stackoverflow.com/q/19245205/1348344)
 * EregToPregMatchRector (http://php.net/reference.pcre.pattern.posix https://stackoverflow.com/a/17033826/1348344 https://docstore.mik.ua/orelly/webprog/pcook/ch13_02.htm)
 * TernaryToNullCoalescingRector
 * CountOnNullRector (https://3v4l.org/Bndc9)
 * SetCookieRector (https://www.php.net/setcookie https://wiki.php.net/rfc/same-site-cookie)
 * ClosureToArrowFunctionRector (https://wiki.php.net/rfc/arrow_functions_v2)
 * StrStartsWithRector (https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)
 * NullToStrictStringFuncCallArgRector
 */
 
if ( !defined('MODULE_FILE') )
{
	die("You can't access this file directly...");
}
if (!(isset($popup)) OR ($popup != "1"))
    {
        $module_name = basename(dirname(__FILE__));
        require("modules/".$module_name."/nukebb.php");
    }
    else
    {
        $phpbb_root_path = 'modules/Forums/';
    }

define('IN_PHPBB', true);
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include_once("includes/bbcode.php");

//
// Start initial var setup
//
$topic_id = $post_id = 0;
if ( isset($_GET[POST_TOPIC_URL]) )
{
        $topic_id = intval($_GET[POST_TOPIC_URL]);
}
else if ( isset($_GET['topic']) )
{
        $topic_id = intval($_GET['topic']);
}

if ( isset($_GET[POST_POST_URL]))
{
        $post_id = intval($_GET[POST_POST_URL]);
}

$start = ( isset($_GET['start']) ) ? intval($_GET['start']) : 0;

if (!$topic_id && !$post_id)
{
        message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

//
// Find topic id if user requested a newer
// or older topic
//
if ( isset($_GET['view']) && empty($_GET[POST_POST_URL]) )
{
        if ( $_GET['view'] == 'newest' )
        {
                $header_location = ( preg_match('/Microsoft|WebSTAR|Xitami/', (string) $_SERVER['SERVER_SOFTWARE']) ) ? 'Refresh: 0; URL=' : 'Location: ';

                if ( isset($_COOKIE[$board_config['cookie_name'] . '_sid']) || isset($_GET['sid']) )
                {
                        $session_id = $_COOKIE[$board_config['cookie_name'] . '_sid'] ?? $_GET['sid'];
                        if (!preg_match('/^[A-Za-z0-9]*$/', (string) $session_id))
                        {
                        $session_id = '';
                        }
                        if ( $session_id )
                        {
                                $sql = "SELECT p.post_id
                                        FROM " . POSTS_TABLE . " p, " . SESSIONS_TABLE . " s,  " . USERS_TABLE . " u
                                        WHERE s.session_id = '$session_id'
                                                AND u.user_id = s.session_user_id
                                                AND p.topic_id = '$topic_id'
                                                AND p.post_time >= u.user_lastvisit
                                        ORDER BY p.post_time ASC
                                        LIMIT 1";
                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, 'Could not obtain newer/older topic information', '', __LINE__, __FILE__, $sql);
                                }

                                if ( !($row = $db->sql_fetchrow($result)) )
                                {
                                        message_die(GENERAL_MESSAGE, 'No_new_posts_last_visit');
                                }

                                $post_id = $row['post_id'];
                                header($header_location . append_sid("viewtopic.$phpEx?" . POST_POST_URL . "=$post_id#$post_id", true));
                                exit;
                        }
                }

                header($header_location . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id", true));
                exit;
        }
        else if ( $_GET['view'] == 'next' || $_GET['view'] == 'previous' )
        {
                $sql_condition = ( $_GET['view'] == 'next' ) ? '>' : '<';
                $sql_ordering = ( $_GET['view'] == 'next' ) ? 'ASC' : 'DESC';

                $sql = "SELECT t.topic_id
			FROM " . TOPICS_TABLE . " t, " . TOPICS_TABLE . " t2
			WHERE
				t2.topic_id = '$topic_id'
				AND t.forum_id = t2.forum_id
				AND t.topic_moved_id = 0
				AND t.topic_last_post_id $sql_condition t2.topic_last_post_id
			ORDER BY t.topic_last_post_id $sql_ordering
                        LIMIT 1";
                if ( !($result = $db->sql_query($sql)) )
                {
                        message_die(GENERAL_ERROR, "Could not obtain newer/older topic information", '', __LINE__, __FILE__, $sql);
                }

                if ( $row = $db->sql_fetchrow($result) )
                {
                        $topic_id = intval($row['topic_id']);
                }
                else
                {
                        $message = ( $_GET['view'] == 'next' ) ? 'No_newer_topics' : 'No_older_topics';
                        message_die(GENERAL_MESSAGE, $message);
                }
        }
}

//
// This rather complex gaggle of code handles querying for topics but
// also allows for direct linking to a post (and the calculation of which
// page the post is on and the correct display of viewtopic)
//
$join_sql_table = (!$post_id) ? '' : ", " . POSTS_TABLE . " p, " . POSTS_TABLE . " p2 ";
$join_sql = (!$post_id) ? "t.topic_id = '$topic_id'" : "p.post_id = '$post_id' AND t.topic_id = p.topic_id AND p2.topic_id = p.topic_id AND p2.post_id <= '$post_id'";
$count_sql = (!$post_id) ? '' : ", COUNT(p2.post_id) AS prev_posts";

$order_sql = (!$post_id) ? '' : "GROUP BY p.post_id, t.topic_id, t.topic_title, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments ORDER BY p.post_id ASC";

$sql = "SELECT t.topic_id, t.topic_title, t.topic_status, t.topic_replies, t.topic_time, t.topic_type, t.topic_vote, t.topic_last_post_id, f.forum_name, f.forum_status, f.forum_id, f.auth_view, f.auth_read, f.auth_post, f.auth_reply, f.auth_edit, f.auth_delete, f.auth_sticky, f.auth_announce, f.auth_pollcreate, f.auth_vote, f.auth_attachments" . $count_sql . "
        FROM " . TOPICS_TABLE . " t, " . FORUMS_TABLE . " f" . $join_sql_table . "
        WHERE $join_sql
                AND f.forum_id = t.forum_id
                $order_sql";
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, "Could not obtain topic information", '', __LINE__, __FILE__, $sql);
}

if ( !($forum_topic_data = $db->sql_fetchrow($result)) )
{
        message_die(GENERAL_MESSAGE, 'Topic_post_not_exist');
}

$forum_id = intval($forum_topic_data['forum_id']);

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
$is_auth = auth(AUTH_ALL, $forum_id, $userdata, $forum_topic_data);

if( !$is_auth['auth_view'] || !$is_auth['auth_read'] )
{
        if ( !$userdata['session_logged_in'] )
        {
		$redirect = ($post_id) ? POST_POST_URL . "=$post_id" : POST_TOPIC_URL . "=$topic_id";
		$redirect .= ($start) ? "&start=$start" : '';
                $header_location = ( preg_match("/Microsoft|WebSTAR|Xitami/", (string) $_SERVER["SERVER_SOFTWARE"]) ) ? "Refresh: 0; URL=" : "Location: ";
                header($header_location . append_sid("login.$phpEx?redirect=viewtopic.$phpEx&$redirect", true));
                exit;
        }

        $message = ( !$is_auth['auth_view'] ) ? $lang['Topic_post_not_exist'] : sprintf($lang['Sorry_auth_read'], $is_auth['auth_read_type']);

        message_die(GENERAL_MESSAGE, $message);
}
//
// End auth check
//

$forum_name = $forum_topic_data['forum_name'];
$topic_title = $forum_topic_data['topic_title'];
$topic_id = intval($forum_topic_data['topic_id']);
$topic_time = $forum_topic_data['topic_time'];

if ($post_id)
{
        $start = floor(($forum_topic_data['prev_posts'] - 1) / intval($board_config['posts_per_page'])) * intval($board_config['posts_per_page']);
}

//
// Is user watching this thread?
//
if( $userdata['session_logged_in'] )
{
        $can_watch_topic = TRUE;

        $sql = "SELECT notify_status
                FROM " . TOPICS_WATCH_TABLE . "
                WHERE topic_id = '$topic_id'
                        AND user_id = " . $userdata['user_id'];
        if ( !($result = $db->sql_query($sql)) )
        {
                message_die(GENERAL_ERROR, "Could not obtain topic watch information", '', __LINE__, __FILE__, $sql);
        }

        if ( $row = $db->sql_fetchrow($result) )
        {
                if ( isset($_GET['unwatch']) )
                {
                        if ( $_GET['unwatch'] == 'topic' )
                        {
                                $is_watching_topic = 0;

                                $sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
                                $sql = "DELETE $sql_priority FROM " . TOPICS_WATCH_TABLE . "
                                        WHERE topic_id = '$topic_id'
                                                AND user_id = " . $userdata['user_id'];
                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, "Could not delete topic watch information", '', __LINE__, __FILE__, $sql);
                                }
                        }

                        $template->assign_vars(array(
                                'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
                        );

                        $message = $lang['No_longer_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
                        message_die(GENERAL_MESSAGE, $message);
                }
                else
                {
                        $is_watching_topic = TRUE;

                        if ( $row['notify_status'] )
                        {
                                $sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
                                $sql = "UPDATE $sql_priority " . TOPICS_WATCH_TABLE . "
                                        SET notify_status = '0'
                                        WHERE topic_id = '$topic_id'
                                                AND user_id = " . $userdata['user_id'];
                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, "Could not update topic watch information", '', __LINE__, __FILE__, $sql);
                                }
                        }
                }
        }
        else
        {
                if ( isset($_GET['watch']) )
                {
                        if ( $_GET['watch'] == 'topic' )
                        {
                                $is_watching_topic = TRUE;

                                $sql_priority = (SQL_LAYER == "mysql") ? "LOW_PRIORITY" : '';
                                $sql = "INSERT $sql_priority INTO " . TOPICS_WATCH_TABLE . " (user_id, topic_id, notify_status)
                                        VALUES (" . $userdata['user_id'] . ", '$topic_id', '0')";
                                if ( !($result = $db->sql_query($sql)) )
                                {
                                        message_die(GENERAL_ERROR, "Could not insert topic watch information", '', __LINE__, __FILE__, $sql);
                                }
                        }

                        $template->assign_vars(array(
                                'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">')
                        );

                        $message = $lang['You_are_watching'] . '<br /><br />' . sprintf($lang['Click_return_topic'], '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start") . '">', '</a>');
                        message_die(GENERAL_MESSAGE, $message);
                }
                else
                {
                        $is_watching_topic = 0;
                }
        }
}
else
{
        if ( isset($_GET['unwatch']) )
        {
                if ( $_GET['unwatch'] == 'topic' )
                {
                        $header_location = ( preg_match("/Microsoft|WebSTAR|Xitami/", (string) $_SERVER["SERVER_SOFTWARE"]) ) ? "Refresh: 0; URL=" : "Location: ";
                        header($header_location . append_sid("login.$phpEx?redirect=viewtopic.$phpEx&" . POST_TOPIC_URL . "=$topic_id&unwatch=topic", true));
                        exit;
                }
        }
        else
        {
                $can_watch_topic = 0;
                $is_watching_topic = 0;
        }
}

//
// Generate a 'Show posts in previous x days' select box. If the postdays var is POSTed
// then get it's value, find the number of topics with dates newer than it (to properly
// handle pagination) and alter the main query
//
$previous_days = array(0, 1, 7, 14, 30, 90, 180, 364);
$previous_days_text = array($lang['All_Posts'], $lang['1_Day'], $lang['7_Days'], $lang['2_Weeks'], $lang['1_Month'], $lang['3_Months'], $lang['6_Months'], $lang['1_Year']);

if( !empty($_POST['postdays']) || !empty($_GET['postdays']) )
{
        $post_days = ( !empty($_POST['postdays']) ) ? intval($_POST['postdays']) : intval($_GET['postdays']);
        $min_post_time = time() - (intval($post_days) * 86400);

        $sql = "SELECT COUNT(p.post_id) AS num_posts
                FROM " . TOPICS_TABLE . " t, " . POSTS_TABLE . " p
                WHERE t.topic_id = '$topic_id'
                        AND p.topic_id = t.topic_id
                        AND p.post_time >= '$min_post_time'";
        if ( !($result = $db->sql_query($sql)) )
        {
                message_die(GENERAL_ERROR, "Could not obtain limited topics count information", '', __LINE__, __FILE__, $sql);
        }

        $total_replies = ( $row = $db->sql_fetchrow($result) ) ? intval($row['num_posts']) : 0;

        $limit_posts_time = "AND p.post_time >= $min_post_time ";

        if ( !empty($_POST['postdays']))
        {
                $start = 0;
        }
}
else
{
        $total_replies = intval($forum_topic_data['topic_replies']) + 1;

        $limit_posts_time = '';
        $post_days = 0;
}

$select_post_days = '<select name="postdays">';
for($i = 0; $i < count($previous_days); $i++)
{
        $selected = ($post_days == $previous_days[$i]) ? ' selected="selected"' : '';
        $select_post_days .= '<option value="' . $previous_days[$i] . '"' . $selected . '>' . $previous_days_text[$i] . '</option>';
}
$select_post_days .= '</select>';

//
// Decide how to order the post display
//
if ( !empty($_POST['postorder']) || !empty($_GET['postorder']) )
{
	$post_order = (!empty($_POST['postorder'])) ? htmlspecialchars((string) $_POST['postorder']) : htmlspecialchars((string) $_GET['postorder']);
        $post_time_order = ($post_order == "asc") ? "ASC" : "DESC";
}
else
{
        $post_order = 'asc';
        $post_time_order = 'ASC';
}

$select_post_order = '<select name="postorder">';
if ( $post_time_order == 'ASC' )
{
        $select_post_order .= '<option value="asc" selected="selected">' . $lang['Oldest_First'] . '</option><option value="desc">' . $lang['Newest_First'] . '</option>';
}
else
{
        $select_post_order .= '<option value="asc">' . $lang['Oldest_First'] . '</option><option value="desc" selected="selected">' . $lang['Newest_First'] . '</option>';
}
$select_post_order .= '</select>';

//
// Go ahead and pull all data for this topic
//
$sql = "SELECT u.username, u.user_id, u.nuke_user_posts, u.user_from, u.user_website, u.user_email, u.user_icq, u.user_aim, u.user_yim, u.nuke_user_regdate, u.user_msnm, u.user_viewemail, u.nuke_user_rank, u.nuke_user_sig, u.nuke_user_sig_bbcode_uid, u.user_avatar, u.nuke_user_avatar_type, u.user_allowavatar, u.user_allowsmile, p.*,  pt.post_text, pt.post_subject, pt.bbcode_uid
        FROM " . POSTS_TABLE . " p, " . USERS_TABLE . " u, " . POSTS_TEXT_TABLE . " pt
        WHERE p.topic_id = '$topic_id'
                $limit_posts_time
                AND pt.post_id = p.post_id
                AND u.user_id = p.poster_id
        ORDER BY p.post_time $post_time_order
        LIMIT $start, ".$board_config['posts_per_page'];
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, "Could not obtain post/user information.", '', __LINE__, __FILE__, $sql);
}

$postrow = array();
if ($row = $db->sql_fetchrow($result))
{
        do
        {
                $postrow[] = $row;
        }
        while ($row = $db->sql_fetchrow($result));
        $db->sql_freeresult($result);

        $total_posts = count($postrow);
}
else
{
   include("modules/Forums/includes/functions_admin.php");
   sync('topic', $topic_id);

   message_die(GENERAL_MESSAGE, $lang['No_posts_topic']);
}

$resync = FALSE;
if ($forum_topic_data['topic_replies'] + 1 < $start + count($postrow))
{
   $resync = TRUE;
}
elseif ($start + $board_config['posts_per_page'] > $forum_topic_data['topic_replies'])
{
   $row_id = intval($forum_topic_data['topic_replies']) % intval($board_config['posts_per_page']);
   if ($postrow[$row_id]['post_id'] != $forum_topic_data['topic_last_post_id'] || $start + count($postrow) < $forum_topic_data['topic_replies'])
   {
      $resync = TRUE;
   }
}
elseif (count($postrow) < $board_config['posts_per_page'])
{
   $resync = TRUE;
}

if ($resync)
{
   include("includes/functions_admin.php");
   sync('topic', $topic_id);

   $result = $db->sql_query('SELECT COUNT(post_id) AS total FROM ' . POSTS_TABLE . ' WHERE topic_id = ' . $topic_id);
   $row = $db->sql_fetchrow($result);
   $total_replies = $row['total'];
}

$sql = "SELECT *
        FROM " . RANKS_TABLE . "
        ORDER BY rank_special, rank_min";
if ( !($result = $db->sql_query($sql)) )
{
        message_die(GENERAL_ERROR, "Could not obtain ranks information.", '', __LINE__, __FILE__, $sql);
}

$ranksrow = array();
while ( $row = $db->sql_fetchrow($result) )
{
        $ranksrow[] = $row;
}
$db->sql_freeresult($result);

//
// Define censored word matches
//
$orig_word = array();
$replacement_word = array();
obtain_word_list($orig_word, $replacement_word);

//
// Censor topic title
//
if ( count($orig_word) )
{
        $topic_title = preg_replace($orig_word, $replacement_word, (string) $topic_title);
}

//
// Was a highlight request part of the URI?
//
$highlight_match = $highlight = '';
if (isset($_GET['highlight']))
{
        // Split words and phrases
        $words = explode(' ', trim(htmlspecialchars((string) $_GET['highlight'])));

        for($i = 0; $i < sizeof($words); $i++)
        {
                if (trim($words[$i]) != '')
                {
                        $highlight_match .= (($highlight_match != '') ? '|' : '') . str_replace('*', '\w*', preg_quote($words[$i], '#'));
                }
        }
        unset($words);

	$highlight = urlencode((string) $_GET['highlight']);
        $highlight_match = phpbb_rtrim($highlight_match, "\\");
}

//
// Post, reply and other URL generation for
// templating vars
//
$new_topic_url = append_sid("posting.$phpEx?mode=newtopic&amp;" . POST_FORUM_URL . "=$forum_id");
$reply_topic_url = append_sid("posting.$phpEx?mode=reply&amp;" . POST_TOPIC_URL . "=$topic_id");
$view_forum_url = append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=$forum_id");
$view_prev_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=previous");
$view_next_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=next");

//
// Mozilla navigation bar
//
$nav_links['prev'] = array(
        'url' => $view_prev_topic_url,
        'title' => $lang['View_previous_topic']
);
$nav_links['next'] = array(
        'url' => $view_next_topic_url,
        'title' => $lang['View_next_topic']
);
$nav_links['up'] = array(
        'url' => $view_forum_url,
        'title' => $forum_name
);

$reply_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $images['reply_locked'] : $images['reply_new'];
$reply_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED || $forum_topic_data['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['Reply_to_topic'];
$post_img = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $images['post_locked'] : $images['post_new'];
$post_alt = ( $forum_topic_data['forum_status'] == FORUM_LOCKED ) ? $lang['Forum_locked'] : $lang['Post_new_topic'];

//
// Set a cookie for this topic
//
if ( $userdata['session_logged_in'] )
{
        $tracking_topics = ( isset($_COOKIE[$board_config['cookie_name'] . '_t']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_t']) : array();
        $tracking_forums = ( isset($_COOKIE[$board_config['cookie_name'] . '_f']) ) ? unserialize($_COOKIE[$board_config['cookie_name'] . '_f']) : array();

        if ( !empty($tracking_topics[$topic_id]) && !empty($tracking_forums[$forum_id]) )
        {
                $topic_last_read = ( $tracking_topics[$topic_id] > $tracking_forums[$forum_id] ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
        }
        else if ( !empty($tracking_topics[$topic_id]) || !empty($tracking_forums[$forum_id]) )
        {
                $topic_last_read = ( !empty($tracking_topics[$topic_id]) ) ? $tracking_topics[$topic_id] : $tracking_forums[$forum_id];
        }
        else
        {
                $topic_last_read = $userdata['user_lastvisit'];
        }

        if ( (is_countable($tracking_topics) ? count($tracking_topics) : 0) >= 150 && empty($tracking_topics[$topic_id]) )
        {
                asort($tracking_topics);
                unset($tracking_topics[key($tracking_topics)]);
        }

        $tracking_topics[$topic_id] = time();

        setcookie($board_config['cookie_name'] . '_t', serialize($tracking_topics), ['expires' => 0, 'path' => $board_config['cookie_path'], 'domain' => $board_config['cookie_domain'], 'secure' => $board_config['cookie_secure']]);
}

//
// Load templates
//
$template->set_filenames(array(
        'body' => 'viewtopic_body.tpl')
);
make_jumpbox('viewforum.'.$phpEx, $forum_id);

//
// Output page header
//
$page_title = $lang['View_topic'] .' - ' . $topic_title;
include("modules/Forums/includes/page_header.php");

//
// User authorisation levels output
//
$s_auth_can = ( ( $is_auth['auth_post'] ) ? $lang['Rules_post_can'] : $lang['Rules_post_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_reply'] ) ? $lang['Rules_reply_can'] : $lang['Rules_reply_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_edit'] ) ? $lang['Rules_edit_can'] : $lang['Rules_edit_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_delete'] ) ? $lang['Rules_delete_can'] : $lang['Rules_delete_cannot'] ) . '<br />';
$s_auth_can .= ( ( $is_auth['auth_vote'] ) ? $lang['Rules_vote_can'] : $lang['Rules_vote_cannot'] ) . '<br />';

$topic_mod = '';

if ( $is_auth['auth_mod'] )
{
        $s_auth_can .= sprintf($lang['Rules_moderate'], '<a href="' . append_sid("modcp.$phpEx?" . POST_FORUM_URL . "=$forum_id") . '">', '</a>');

        $topic_mod .= '<a href="' . append_sid("modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=delete") . '"><img src="' . $images['topic_mod_delete'] . '" alt="' . $lang['Delete_topic'] . '" title="' . $lang['Delete_topic'] . '" border="0" /></a>&nbsp;';

        $topic_mod .= '<a href="' . append_sid("modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=move"). '"><img src="' . $images['topic_mod_move'] . '" alt="' . $lang['Move_topic'] . '" title="' . $lang['Move_topic'] . '" border="0" /></a>&nbsp;';

        $topic_mod .= ( $forum_topic_data['topic_status'] == TOPIC_UNLOCKED ) ? '<a href="' . append_sid("modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=lock") . '"><img src="' . $images['topic_mod_lock'] . '" alt="' . $lang['Lock_topic'] . '" title="' . $lang['Lock_topic'] . '" border="0" /></a>&nbsp;' : '<a href="' . append_sid("modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=unlock") . '"><img src="' . $images['topic_mod_unlock'] . '" alt="' . $lang['Unlock_topic'] . '" title="' . $lang['Unlock_topic'] . '" border="0" /></a>&nbsp;';

        $topic_mod .= '<a href="' . append_sid("modcp.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;mode=split") . '"><img src="' . $images['topic_mod_split'] . '" alt="' . $lang['Split_topic'] . '" title="' . $lang['Split_topic'] . '" border="0" /></a>&nbsp;';
}

//
// Topic watch information
//
$s_watching_topic = '';
if ( $can_watch_topic )
{
        if ( $is_watching_topic )
        {
                $s_watching_topic = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start") . '">' . $lang['Stop_watching_topic'] . '</a>';
                $s_watching_topic_img = ( isset($images['Topic_un_watch']) ) ? '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;unwatch=topic&amp;start=$start") . '"><img src="' . $images['Topic_un_watch'] . '" alt="' . $lang['Stop_watching_topic'] . '" title="' . $lang['Stop_watching_topic'] . '" border="0"></a>' : '';
        }
        else
        {
                $s_watching_topic = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start") . '">' . $lang['Start_watching_topic'] . '</a>';
                $s_watching_topic_img = ( isset($images['Topic_watch']) ) ? '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;watch=topic&amp;start=$start") . '"><img src="' . $images['Topic_watch'] . '" alt="' . $lang['Stop_watching_topic'] . '" title="' . $lang['Start_watching_topic'] . '" border="0"></a>' : '';
        }
}

//
// If we've got a hightlight set pass it on to pagination,
// I get annoyed when I lose my highlight after the first page.
//
$pagination = ( $highlight != '' ) ? generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight", $total_replies, $board_config['posts_per_page'], $start) : generate_pagination("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order", $total_replies, $board_config['posts_per_page'], $start);

//
// Send vars to template
//
$template->assign_vars(array(
        'FORUM_ID' => $forum_id,
    'FORUM_NAME' => $forum_name,
    'TOPIC_ID' => $topic_id,
    'TOPIC_TITLE' => $topic_title,
        'PAGINATION' => $pagination,
        'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / intval($board_config['posts_per_page']) ) + 1 ), ceil( $total_replies / intval($board_config['posts_per_page']) )),

        'POST_IMG' => $post_img,
        'REPLY_IMG' => $reply_img,

        'L_AUTHOR' => $lang['Author'],
        'L_MESSAGE' => $lang['Message'],
        'L_POSTED' => $lang['Posted'],
        'L_POST_SUBJECT' => $lang['Post_subject'],
        'L_VIEW_NEXT_TOPIC' => $lang['View_next_topic'],
        'L_VIEW_PREVIOUS_TOPIC' => $lang['View_previous_topic'],
        'L_POST_NEW_TOPIC' => $post_alt,
        'L_POST_REPLY_TOPIC' => $reply_alt,
        'L_BACK_TO_TOP' => $lang['Back_to_top'],
        'L_DISPLAY_POSTS' => $lang['Display_posts'],
        'L_LOCK_TOPIC' => $lang['Lock_topic'],
        'L_UNLOCK_TOPIC' => $lang['Unlock_topic'],
        'L_MOVE_TOPIC' => $lang['Move_topic'],
        'L_SPLIT_TOPIC' => $lang['Split_topic'],
        'L_DELETE_TOPIC' => $lang['Delete_topic'],
        'L_GOTO_PAGE' => $lang['Goto_page'],

        'S_TOPIC_LINK' => POST_TOPIC_URL,
        'S_SELECT_POST_DAYS' => $select_post_days,
        'S_SELECT_POST_ORDER' => $select_post_order,
        'S_POST_DAYS_ACTION' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . '=' . $topic_id . "&amp;start=$start"),
        'S_AUTH_LIST' => $s_auth_can,
        'S_TOPIC_ADMIN' => $topic_mod,
        'S_WATCH_TOPIC' => $s_watching_topic,
        'S_WATCH_TOPIC_IMG' => $s_watching_topic_img,

        'U_VIEW_TOPIC' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;start=$start&amp;postdays=$post_days&amp;postorder=$post_order&amp;highlight=$highlight"),
        'U_VIEW_FORUM' => $view_forum_url,
        'U_VIEW_OLDER_TOPIC' => $view_prev_topic_url,
        'U_VIEW_NEWER_TOPIC' => $view_next_topic_url,
        'U_POST_NEW_TOPIC' => $new_topic_url,
        'U_POST_REPLY_TOPIC' => $reply_topic_url)
);

//
// Does this topic contain a poll?
//
if ( !empty($forum_topic_data['topic_vote']) )
{
        $s_hidden_fields = '';

        $sql = "SELECT vd.vote_id, vd.vote_text, vd.vote_start, vd.vote_length, vr.vote_option_id, vr.vote_option_text, vr.vote_result
                FROM " . VOTE_DESC_TABLE . " vd, " . VOTE_RESULTS_TABLE . " vr
                WHERE vd.topic_id = '$topic_id'
                        AND vr.vote_id = vd.vote_id
                ORDER BY vr.vote_option_id ASC";
        if ( !($result = $db->sql_query($sql)) )
        {
                message_die(GENERAL_ERROR, "Could not obtain vote data for this topic", '', __LINE__, __FILE__, $sql);
        }

        if ( $vote_info = $db->sql_fetchrowset($result) )
        {
                $db->sql_freeresult($result);
                $vote_options = is_countable($vote_info) ? count($vote_info) : 0;

                $vote_id = $vote_info[0]['vote_id'];
                $vote_title = $vote_info[0]['vote_text'];

                $sql = "SELECT vote_id
                        FROM " . VOTE_USERS_TABLE . "
                        WHERE vote_id = '$vote_id'
                                AND vote_user_id = " . intval($userdata['user_id']);
                if ( !($result = $db->sql_query($sql)) )
                {
                        message_die(GENERAL_ERROR, "Could not obtain user vote data for this topic", '', __LINE__, __FILE__, $sql);
                }

                $user_voted = ( $row = $db->sql_fetchrow($result) ) ? TRUE : 0;
                $db->sql_freeresult($result);

                if ( isset($_GET['vote']) || isset($_POST['vote']) )
                {
                        $view_result = ( ( $_GET['vote'] ?? $_POST['vote'] ) == 'viewresult' ) ? TRUE : 0;
                }
                else
                {
                        $view_result = 0;
                }

                $poll_expired = ( $vote_info[0]['vote_length'] ) ? ( ( $vote_info[0]['vote_start'] + $vote_info[0]['vote_length'] < time() ) ? TRUE : 0 ) : 0;

                if ( $user_voted || $view_result || $poll_expired || !$is_auth['auth_vote'] || $forum_topic_data['topic_status'] == TOPIC_LOCKED )
                {
                        $template->set_filenames(array(
                                'pollbox' => 'viewtopic_poll_result.tpl')
                        );

                        $vote_results_sum = 0;

                        for($i = 0; $i < $vote_options; $i++)
                        {
                                $vote_results_sum += $vote_info[$i]['vote_result'];
                        }

                        $vote_graphic = 0;
                        $vote_graphic_max = is_countable($images['voting_graphic']) ? count($images['voting_graphic']) : 0;

                        for($i = 0; $i < $vote_options; $i++)
                        {
                                $vote_percent = ( $vote_results_sum > 0 ) ? $vote_info[$i]['vote_result'] / $vote_results_sum : 0;
                                $vote_graphic_length = round($vote_percent * $board_config['vote_graphic_length']);

                                $vote_graphic_img = $images['voting_graphic'][$vote_graphic];
                                $vote_graphic = ($vote_graphic < $vote_graphic_max - 1) ? $vote_graphic + 1 : 0;

                                if ( count($orig_word) )
                                {
                                        $vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, (string) $vote_info[$i]['vote_option_text']);
                                }

                                $template->assign_block_vars("poll_option", array(
                                        'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'],
                                        'POLL_OPTION_RESULT' => $vote_info[$i]['vote_result'],
                                        'POLL_OPTION_PERCENT' => sprintf("%.1d%%", ($vote_percent * 100)),

                                        'POLL_OPTION_IMG' => $vote_graphic_img,
                                        'POLL_OPTION_IMG_WIDTH' => $vote_graphic_length)
                                );
                        }

                        $template->assign_vars(array(
                                'L_TOTAL_VOTES' => $lang['Total_votes'],
                                'TOTAL_VOTES' => $vote_results_sum)
                        );

                }
                else
                {
                        $template->set_filenames(array(
                                'pollbox' => 'viewtopic_poll_ballot.tpl')
                        );

                        for($i = 0; $i < $vote_options; $i++)
                        {
                                if ( count($orig_word) )
                                {
                                        $vote_info[$i]['vote_option_text'] = preg_replace($orig_word, $replacement_word, (string) $vote_info[$i]['vote_option_text']);
                                }

                                $template->assign_block_vars("poll_option", array(
                                        'POLL_OPTION_ID' => $vote_info[$i]['vote_option_id'],
                                        'POLL_OPTION_CAPTION' => $vote_info[$i]['vote_option_text'])
                                );
                        }

                        $template->assign_vars(array(
                                'L_SUBMIT_VOTE' => $lang['Submit_vote'],
                                'L_VIEW_RESULTS' => $lang['View_results'],

                                'U_VIEW_RESULTS' => append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;postdays=$post_days&amp;postorder=$post_order&amp;vote=viewresult"))
                        );

                        $s_hidden_fields = '<input type="hidden" name="topic_id" value="' . $topic_id . '" /><input type="hidden" name="mode" value="vote" />';
                }

                if ( count($orig_word) )
                {
                        $vote_title = preg_replace($orig_word, $replacement_word, (string) $vote_title);
                }

                $s_hidden_fields .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';

                $template->assign_vars(array(
                        'POLL_QUESTION' => $vote_title,

                        'S_HIDDEN_FIELDS' => $s_hidden_fields,
                        'S_POLL_ACTION' => append_sid("posting.$phpEx?mode=vote&amp;" . POST_TOPIC_URL . "=$topic_id"))
                );

                $template->assign_var_from_handle('POLL_DISPLAY', 'pollbox');
        }
}

//
// Update the topic view counter
//
$sql = "UPDATE " . TOPICS_TABLE . "
        SET topic_views = topic_views + 1
        WHERE topic_id = '$topic_id'";
if ( !$db->sql_query($sql) )
{
        message_die(GENERAL_ERROR, "Could not update topic views.", '', __LINE__, __FILE__, $sql);
}

//
// Okay, let's do the loop, yeah come on baby let's do the loop
// and it goes like this ...
//
for($i = 0; $i < $total_posts; $i++)
{
        $poster_id = $postrow[$i]['user_id'];
        $poster = ( $poster_id == ANONYMOUS ) ? $lang['Guest'] : $postrow[$i]['username'];

        $post_date = create_date($board_config['default_dateformat'], $postrow[$i]['post_time'], $board_config['board_timezone']);

        $poster_posts = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Posts'] . ': ' . $postrow[$i]['nuke_user_posts'] : '';

        $poster_from = ( $postrow[$i]['user_from'] && $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Location'] . ': ' . $postrow[$i]['user_from'] : '';
        $poster_from = preg_replace('#.gif#m', "", $poster_from);
        $poster_joined = ( $postrow[$i]['user_id'] != ANONYMOUS ) ? $lang['Joined'] . ': ' . $postrow[$i]['nuke_user_regdate'] : '';

	$poster_avatar = '';
	if ( $postrow[$i]['nuke_user_avatar_type'] && $poster_id != ANONYMOUS && $postrow[$i]['user_allowavatar'] )
	{
		switch( $postrow[$i]['nuke_user_avatar_type'] )
		{
			case USER_AVATAR_UPLOAD:
				$poster_avatar = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_REMOTE:
				$poster_avatar = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
			case USER_AVATAR_GALLERY:
				$poster_avatar = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $postrow[$i]['user_avatar'] . '" alt="" border="0" />' : '';
				break;
		}
	}
        $images['default_avatar'] = "modules/Forums/images/avatars/gallery/blank.gif";
        $images['guest_avatar'] = "modules/Forums/images/avatars/gallery/blank.gif";
        //
        // Default Avatar MOD - Begin
        //
        if ( empty($poster_avatar) && $poster_id != ANONYMOUS)
        {
                $poster_avatar = '<img src="'.  $images['default_avatar'] .'" alt="" border="0" />';
        }
        if ( $poster_id == ANONYMOUS )
        {
                $poster_avatar = '<img src="'.  $images['guest_avatar'] .'" alt="" border="0" />';
        }
        //
        // Default Avatar MOD - End
        //
        //
        // Define the little post icon
        //
        if ( $userdata['session_logged_in'] && $postrow[$i]['post_time'] > $userdata['user_lastvisit'] && $postrow[$i]['post_time'] > $topic_last_read )
        {
                $mini_post_img = $images['icon_minipost_new'];
                $mini_post_alt = $lang['New_post'];
        }
        else
        {
                $mini_post_img = $images['icon_minipost'];
                $mini_post_alt = $lang['Post'];
        }

        $mini_post_url = append_sid("viewtopic.$phpEx?" . POST_POST_URL . '=' . $postrow[$i]['post_id']) . '#' . $postrow[$i]['post_id'];

        //
        // Generate ranks, set them to empty string initially.
        //
        $poster_rank = '';
        $rank_image = '';
        if ( $postrow[$i]['user_id'] == ANONYMOUS )
        {
        }
        else if ( $postrow[$i]['nuke_user_rank'] )
        {
                for($j = 0; $j < count($ranksrow); $j++)
                {
                        if ( $postrow[$i]['nuke_user_rank'] == $ranksrow[$j]['rank_id'] && $ranksrow[$j]['rank_special'] )
                        {
                                $poster_rank = $ranksrow[$j]['rank_title'];
                                $rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
                        }
                }
        }
        else
        {
                for($j = 0; $j < count($ranksrow); $j++)
                {
                        if ( $postrow[$i]['nuke_user_posts'] >= $ranksrow[$j]['rank_min'] && !$ranksrow[$j]['rank_special'] )
                        {
                                $poster_rank = $ranksrow[$j]['rank_title'];
                                $rank_image = ( $ranksrow[$j]['rank_image'] ) ? '<img src="' . $ranksrow[$j]['rank_image'] . '" alt="' . $poster_rank . '" title="' . $poster_rank . '" border="0" /><br />' : '';
                        }
                }
        }

        //
        // Handle anon users posting with usernames
        //
        if ( $poster_id == ANONYMOUS && $postrow[$i]['post_username'] != '' )
        {
                $poster = $postrow[$i]['post_username'];
                $poster_rank = $lang['Guest'];
        }

        $temp_url = '';

        if ( $poster_id != ANONYMOUS )
        {
                $temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
                $profile_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_profile'] . '" alt="' . $lang['Read_profile'] . '" title="' . $lang['Read_profile'] . '" border="0" /></a>';
                $profile = '<a href="' . $temp_url . '">' . $lang['Read_profile'] . '</a>';

                $temp_url = append_sid("privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$poster_id");
                if (is_active("Private_Messages")) {
                $pm_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
                $pm = '<a href="' . $temp_url . '">' . $lang['Send_private_message'] . '</a>';
                }

                if ( !empty($postrow[$i]['user_viewemail']) || $is_auth['auth_mod'] )
                {
                        $email_uri = ( $board_config['board_email_form'] ) ? append_sid("profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $poster_id) : 'mailto:' . $postrow[$i]['user_email'];

                        $email_img = '<a href="' . $email_uri . '"><img src="' . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
                        $email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
                }
                else
                {
                        $email_img = '';
                        $email = '';
                }
                if (( $postrow[$i]['user_website'] == "http:///") || ( $postrow[$i]['user_website'] == "http://")){
                    $postrow[$i]['user_website'] =  "";
                }
                if (($postrow[$i]['user_website'] != "" ) && (!str_starts_with((string) $postrow[$i]['user_website'], "http://"))) {
                    $postrow[$i]['user_website'] = "http://".$postrow[$i]['user_website'];
                }

                $www_img = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww"><img src="' . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '';
                $www = ( $postrow[$i]['user_website'] ) ? '<a href="' . $postrow[$i]['user_website'] . '" target="_userwww">' . $lang['Visit_website'] . '</a>' : '';

                if ( !empty($postrow[$i]['user_icq']) )
                {
                        $icq_status_img = '<a href="http://wwp.icq.com/' . $postrow[$i]['user_icq'] . '#pager"><img src="http://web.icq.com/whitepages/online?icq=' . $postrow[$i]['user_icq'] . '&img=5" width="18" height="18" border="0" /></a>';
                        $icq_img = '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '"><img src="' . $images['icon_icq'] . '" alt="' . $lang['ICQ'] . '" title="' . $lang['ICQ'] . '" border="0" /></a>';
                        $icq =  '<a href="http://wwp.icq.com/scripts/search.dll?to=' . $postrow[$i]['user_icq'] . '">' . $lang['ICQ'] . '</a>';
                }
                else
                {
                        $icq_status_img = '';
                        $icq_img = '';
                        $icq = '';
                }

                $aim_img = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?"><img src="' . $images['icon_aim'] . '" alt="' . $lang['AIM'] . '" title="' . $lang['AIM'] . '" border="0" /></a>' : '';
                $aim = ( $postrow[$i]['user_aim'] ) ? '<a href="aim:goim?screenname=' . $postrow[$i]['user_aim'] . '&amp;message=Hello+Are+you+there?">' . $lang['AIM'] . '</a>' : '';

                $temp_url = append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . "=$poster_id");
                $msn_img = ( $postrow[$i]['user_msnm'] ) ? '<a href="' . $temp_url . '"><img src="' . $images['icon_msnm'] . '" alt="' . $lang['MSNM'] . '" title="' . $lang['MSNM'] . '" border="0" /></a>' : '';
                $msn = ( $postrow[$i]['user_msnm'] ) ? '<a href="' . $temp_url . '">' . $lang['MSNM'] . '</a>' : '';

                $yim_img = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg"><img src="' . $images['icon_yim'] . '" alt="' . $lang['YIM'] . '" title="' . $lang['YIM'] . '" border="0" /></a>' : '';
                $yim = ( $postrow[$i]['user_yim'] ) ? '<a href="http://edit.yahoo.com/config/send_webmesg?.target=' . $postrow[$i]['user_yim'] . '&amp;.src=pg">' . $lang['YIM'] . '</a>' : '';
        }
        else
        {
                $profile_img = '';
                $profile = '';
                $pm_img = '';
                $pm = '';
                $email_img = '';
                $email = '';
                $www_img = '';
                $www = '';
                $icq_status_img = '';
                $icq_img = '';
                $icq = '';
                $aim_img = '';
                $aim = '';
                $msn_img = '';
                $msn = '';
                $yim_img = '';
                $yim = '';
        }

        $temp_url = append_sid("posting.$phpEx?mode=quote&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
        $quote_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_quote'] . '" alt="' . $lang['Reply_with_quote'] . '" title="' . $lang['Reply_with_quote'] . '" border="0" /></a>';
        $quote = '<a href="' . $temp_url . '">' . $lang['Reply_with_quote'] . '</a>';

        $temp_url = append_sid("search.$phpEx?search_author=" . urlencode((string) $postrow[$i]['username']) . "&amp;showresults=posts");
	$search_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_search'] . '" alt="' . sprintf($lang['Search_nuke_user_posts'], $postrow[$i]['username']) . '" title="' . sprintf($lang['Search_nuke_user_posts'], $postrow[$i]['username']) . '" border="0" /></a>';
	$search = '<a href="' . $temp_url . '">' . sprintf($lang['Search_nuke_user_posts'], $postrow[$i]['username']) . '</a>';

        if ( ( $userdata['user_id'] == $poster_id && $is_auth['auth_edit'] ) || $is_auth['auth_mod'] )
        {
                $temp_url = append_sid("posting.$phpEx?mode=editpost&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
                $edit_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_edit'] . '" alt="' . $lang['Edit_delete_post'] . '" title="' . $lang['Edit_delete_post'] . '" border="0" /></a>';
                $edit = '<a href="' . $temp_url . '">' . $lang['Edit_delete_post'] . '</a>';
        }
        else
        {
                $edit_img = '';
                $edit = '';
        }

        if ( $is_auth['auth_mod'] )
        {
                $temp_url = append_sid("modcp.$phpEx?mode=ip&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id'] . "&amp;" . POST_TOPIC_URL . "=" . $topic_id);
                $ip_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_ip'] . '" alt="' . $lang['View_IP'] . '" title="' . $lang['View_IP'] . '" border="0" /></a>';
                $ip = '<a href="' . $temp_url . '">' . $lang['View_IP'] . '</a>';

                $temp_url = append_sid("posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
                $delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
                $delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
        }
        else
        {
                $ip_img = '';
                $ip = '';

                if ( $userdata['user_id'] == $poster_id && $is_auth['auth_delete'] && $forum_topic_data['topic_last_post_id'] == $postrow[$i]['post_id'] )
                {
                        $temp_url = append_sid("posting.$phpEx?mode=delete&amp;" . POST_POST_URL . "=" . $postrow[$i]['post_id']);
                        $delpost_img = '<a href="' . $temp_url . '"><img src="' . $images['icon_delpost'] . '" alt="' . $lang['Delete_post'] . '" title="' . $lang['Delete_post'] . '" border="0" /></a>';
                        $delpost = '<a href="' . $temp_url . '">' . $lang['Delete_post'] . '</a>';
                }
                else
                {
                        $delpost_img = '';
                        $delpost = '';
                }
        }

        $post_subject = ( $postrow[$i]['post_subject'] != '' ) ? $postrow[$i]['post_subject'] : '';

        $message = $postrow[$i]['post_text'];
        $bbcode_uid = $postrow[$i]['bbcode_uid'];

        $nuke_user_sig = ( $postrow[$i]['enable_sig'] && $postrow[$i]['nuke_user_sig'] != '' && $board_config['allow_sig'] ) ? $postrow[$i]['nuke_user_sig'] : '';
        $nuke_user_sig_bbcode_uid = $postrow[$i]['nuke_user_sig_bbcode_uid'];

        //
        // Note! The order used for parsing the message _is_ important, moving things around could break any
        // output
        //

        //
        // If the board has HTML off but the post has HTML
        // on then we process it, else leave it alone
        //
	if ( !$board_config['allow_html'] || !$userdata['user_allowhtml'])
        {
                if ( $nuke_user_sig != '' )
                {
                        $nuke_user_sig = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", (string) $nuke_user_sig);
                }

                if ( $postrow[$i]['enable_html'] )
                {
                        $message = preg_replace('#(<)([\/]?.*?)(>)#is', "&lt;\\2&gt;", (string) $message);
                }
        }

        //
        // Parse message and/or sig for BBCode if reqd
        //
	if ($nuke_user_sig != '' && $nuke_user_sig_bbcode_uid != '')
	{
		$nuke_user_sig = ($board_config['allow_bbcode']) ? bbencode_second_pass($nuke_user_sig, $nuke_user_sig_bbcode_uid) : preg_replace("/\:$nuke_user_sig_bbcode_uid/si", '', (string) $nuke_user_sig);
	}

	if ($bbcode_uid != '')
	{
		$message = ($board_config['allow_bbcode']) ? bbencode_second_pass($message, $bbcode_uid) : preg_replace("/\:$bbcode_uid/si", '', (string) $message);
	}

        if ( $nuke_user_sig != '' )
        {
                $nuke_user_sig = make_clickable($nuke_user_sig);
        }
        $message = make_clickable($message);

        //
        // Parse smilies
        //
        if ( $board_config['allow_smilies'] )
        {
                if ( $postrow[$i]['user_allowsmile'] && $nuke_user_sig != '' )
                {
                        $nuke_user_sig = smilies_pass($nuke_user_sig);
                }

                if ( $postrow[$i]['enable_smilies'] )
                {
                        $message = smilies_pass($message);
                }
        }

        //
        // Highlight active words (primarily for search)
        //
        if ($highlight_match)
        {
		// This has been back-ported from 3.0 CVS
		$message = preg_replace('#(?!<.*)(?<!\w)(' . $highlight_match . ')(?!\w|[^<>]*>)#i', '<b style="color:#'.$theme['fontcolor3'].'">\1</b>', (string) $message);
        }

        //
        // Replace naughty words
        //
        if (count($orig_word))
        {
                $post_subject = preg_replace($orig_word, $replacement_word, (string) $post_subject);

                if ($nuke_user_sig != '')
                {
			$nuke_user_sig = str_replace('\"', '"', substr(preg_replace_callback('#(\>(((?>([^><]+|(?R)))*)\<))#s', fn($matches) => preg_replace($orig_word, $replacement_word, (string) $matches[0]), '>' . $nuke_user_sig . '<'), 1, -1));
                }

		$message = str_replace('\"', '"', substr(preg_replace_callback('#(\>(((?>([^><]+|(?R)))*)\<))#s', fn($matches) => preg_replace($orig_word, $replacement_word, (string) $matches[0]), '>' . $message . '<'), 1, -1));
        }

        //
        // Replace newlines (we use this rather than nl2br because
        // till recently it wasn't XHTML compliant)
        //
        if ( $nuke_user_sig != '' )
        {
                $nuke_user_sig = '<br />_________________<br />' . str_replace("\n", "\n<br />\n", (string) $nuke_user_sig);
        }

        $message = str_replace("\n", "\n<br />\n", (string) $message);

        //
        // Editing information
        //
        if ( $postrow[$i]['post_edit_count'] )
        {
                $l_edit_time_total = ( $postrow[$i]['post_edit_count'] == 1 ) ? $lang['Edited_time_total'] : $lang['Edited_times_total'];

                $l_edited_by = '<br /><br />' . sprintf($l_edit_time_total, $poster, create_date($board_config['default_dateformat'], $postrow[$i]['post_edit_time'], $board_config['board_timezone']), $postrow[$i]['post_edit_count']);
        }
        else
        {
                $l_edited_by = '';
        }

        //
        // Again this will be handled by the templating
        // code at some point
        //
        $row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
        $row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

        $template->assign_block_vars('postrow', array(
                'ROW_COLOR' => '#' . $row_color,
                'ROW_CLASS' => $row_class,
                'POSTER_NAME' => $poster,
                'POSTER_RANK' => $poster_rank,
                'RANK_IMAGE' => $rank_image,
                'POSTER_JOINED' => $poster_joined,
                'POSTER_POSTS' => $poster_posts,
                'POSTER_FROM' => $poster_from,
                'POSTER_AVATAR' => $poster_avatar,
                'POST_DATE' => $post_date,
                'POST_SUBJECT' => $post_subject,
                'MESSAGE' => $message,
                'SIGNATURE' => $nuke_user_sig,
                'EDITED_MESSAGE' => $l_edited_by,

                'MINI_POST_IMG' => $mini_post_img,
                'PROFILE_IMG' => $profile_img,
                'PROFILE' => $profile,
                'SEARCH_IMG' => $search_img,
                'SEARCH' => $search,
                'PM_IMG' => $pm_img,
                'PM' => $pm,
                'EMAIL_IMG' => $email_img,
                'EMAIL' => $email,
                'WWW_IMG' => $www_img,
                'WWW' => $www,
                'ICQ_STATUS_IMG' => $icq_status_img,
                'ICQ_IMG' => $icq_img,
                'ICQ' => $icq,
                'AIM_IMG' => $aim_img,
                'AIM' => $aim,
                'MSN_IMG' => $msn_img,
                'MSN' => $msn,
                'YIM_IMG' => $yim_img,
                'YIM' => $yim,
                'EDIT_IMG' => $edit_img,
                'EDIT' => $edit,
                'QUOTE_IMG' => $quote_img,
                'QUOTE' => $quote,
                'IP_IMG' => $ip_img,
                'IP' => $ip,
                'DELETE_IMG' => $delpost_img,
                'DELETE' => $delpost,

                'L_MINI_POST_ALT' => $mini_post_alt,

                'U_MINI_POST' => $mini_post_url,
                'U_POST_ID' => $postrow[$i]['post_id'])
        );
}

$template->pparse('body');

include("modules/Forums/includes/page_tail.php");


