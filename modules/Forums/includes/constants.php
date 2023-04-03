<?php
/***************************************************************************
 *                               constants.php
 *                            -------------------
 *   begin                : Saturday', Feb 13', 2001
 *   copyright            : ('C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: constants.php,v 1.47.2.5 2004/11/18 17:49:42 acydburn Exp
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License', or
 *   ('at your option) any later version.
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
        die("Hacking attempt");
}

// Debug Level
//define_once('DEBUG', 1); // Debugging on
define_once('DEBUG', 1); // Debugging off
// User Levels <- Do not change the values of USER or ADMIN
define_once('DELETED', -1);
define_once('ANONYMOUS', 1);
define_once('USER', 1);
define_once('ADMIN', 2);
define_once('MOD', 3);
// User related
define_once('USER_ACTIVATION_NONE', 0);
define_once('USER_ACTIVATION_SELF', 1);
define_once('USER_ACTIVATION_ADMIN', 2);
define_once('USER_AVATAR_NONE', 0);
define_once('USER_AVATAR_UPLOAD', 1);
define_once('USER_AVATAR_REMOTE', 2);
define_once('USER_AVATAR_GALLERY', 3);
// Group settings
define_once('GROUP_OPEN', 0);
define_once('GROUP_CLOSED', 1);
define_once('GROUP_HIDDEN', 2);
// Forum state
define_once('FORUM_UNLOCKED', 0);
define_once('FORUM_LOCKED', 1);
// Topic status
define_once('TOPIC_UNLOCKED', 0);
define_once('TOPIC_LOCKED', 1);
define_once('TOPIC_MOVED', 2);
define_once('TOPIC_WATCH_NOTIFIED', 1);
define_once('TOPIC_WATCH_UN_NOTIFIED', 0);
// Topic types
define_once('POST_NORMAL', 0);
define_once('POST_STICKY', 1);
define_once('POST_ANNOUNCE', 2);
define_once('POST_GLOBAL_ANNOUNCE', 3);
// SQL codes
define_once('BEGIN_TRANSACTION', 1);
if(!defined('END_TRANSACTION')) {
define('END_TRANSACTION', 2);
}
// Error codes
define_once('GENERAL_MESSAGE', 200);
define_once('GENERAL_ERROR', 202);
define_once('CRITICAL_MESSAGE', 203);
define_once('CRITICAL_ERROR', 204);
// Private messaging
define_once('PRIVMSGS_READ_MAIL', 0);
define_once('PRIVMSGS_NEW_MAIL', 1);
define_once('PRIVMSGS_SENT_MAIL', 2);
define_once('PRIVMSGS_SAVED_IN_MAIL', 3);
define_once('PRIVMSGS_SAVED_OUT_MAIL', 4);
define_once('PRIVMSGS_UNREAD_MAIL', 5);
// URL PARAMETERS
define_once('POST_TOPIC_URL', 't');
define_once('POST_CAT_URL', 'c');
define_once('POST_FORUM_URL', 'f');
define_once('POST_USERS_URL', 'u');
define_once('POST_POST_URL', 'p');
define_once('POST_GROUPS_URL', 'g');
// Session parameters
define_once('SESSION_METHOD_COOKIE', 100);
define_once('SESSION_METHOD_GET', 101);
// Page numbers for session handling
define_once('PAGE_INDEX', 0);
define_once('PAGE_LOGIN', -1);
define_once('PAGE_SEARCH', -2);
define_once('PAGE_REGISTER', -3);
define_once('PAGE_PROFILE', -4);
define_once('PAGE_VIEWONLINE', -6);
define_once('PAGE_VIEWMEMBERS', -7);
define_once('PAGE_FAQ', -8);
define_once('PAGE_POSTING', -9);
define_once('PAGE_PRIVMSGS', -10);
define_once('PAGE_GROUPCP', -11);
define_once('PAGE_TOPIC_OFFSET', 5000);
// Auth settings
define_once('AUTH_LIST_ALL', 0);
define_once('AUTH_ALL', 0);
define_once('AUTH_REG', 1);
define_once('AUTH_ACL', 2);
define_once('AUTH_MOD', 3);
define_once('AUTH_ADMIN', 5);
define_once('AUTH_VIEW', 1);
define_once('AUTH_READ', 2);
define_once('AUTH_POST', 3);
define_once('AUTH_REPLY', 4);
define_once('AUTH_EDIT', 5);
define_once('AUTH_DELETE', 6);
define_once('AUTH_ANNOUNCE', 7);
define_once('AUTH_STICKY', 8);
define_once('AUTH_POLLCREATE', 9);
define_once('AUTH_VOTE', 10);
define_once('AUTH_ATTACH', 11);
// Table names
define_once('CONFIRM_TABLE', $prefix.'_bbconfirm');
define_once('AUTH_ACCESS_TABLE', $prefix.'_bbauth_access');
define_once('BANLIST_TABLE', $prefix.'_bbbanlist');
define_once('CATEGORIES_TABLE', $prefix.'_bbcategories');
define_once('PHPBB2_CONFIG_TABLE', $prefix.'_bbconfig');
define_once('DISALLOW_TABLE', $prefix.'_bbdisallow');
define_once('FORUMS_TABLE', $prefix.'_bbforums');
define_once('GROUPS_TABLE', $prefix.'_bbgroups');
define_once('POSTS_TABLE', $prefix.'_bbposts');
define_once('POSTS_TEXT_TABLE', $prefix.'_bbposts_text');
define_once('PRIVMSGS_TABLE', $prefix.'_bbprivmsgs');
define_once('PRIVMSGS_TEXT_TABLE', $prefix.'_bbprivmsgs_text');
define_once('PRIVMSGS_IGNORE_TABLE', $prefix.'_bbprivmsgs_ignore');
define_once('PRUNE_TABLE', $prefix.'_bbforum_prune');
define_once('RANKS_TABLE', $prefix.'_bbranks');
define_once('SEARCH_TABLE', $prefix.'_bbsearch_results');
define_once('SEARCH_WORD_TABLE', $prefix.'_bbsearch_wordlist');
define_once('SEARCH_MATCH_TABLE', $prefix.'_bbsearch_wordmatch');
define_once('SESSIONS_TABLE', $prefix.'_bbsessions');
define_once('SMILIES_TABLE', $prefix.'_bbsmilies');
define_once('THEMES_TABLE', $prefix.'_bbthemes');
define_once('THEMES_NAME_TABLE', $prefix.'_bbthemes_name');
define_once('TOPICS_TABLE', $prefix.'_bbtopics');
define_once('TOPICS_WATCH_TABLE', $prefix.'_bbtopics_watch');
define_once('USER_GROUP_TABLE', $prefix.'_bbuser_group');
define_once('USERS_TABLE', $user_prefix.'_users');
define_once('WORDS_TABLE', $prefix.'_bbwords');
define_once('VOTE_DESC_TABLE', $prefix.'_bbvote_desc');
define_once('VOTE_RESULTS_TABLE', $prefix.'_bbvote_results');
define_once('VOTE_USERS_TABLE', $prefix.'_bbvote_voters');
