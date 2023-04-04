<?php
/**
*
* @package phpBB3
* @version $Id: constants.php 8479 2008-03-29 00:22:48Z naderman $
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
* valid external constants:
* PHPBB_MSG_HANDLER
* PHPBB_DB_NEW_LINK
* PHPBB_ROOT_PATH
* PHPBB_ADMIN_PATH
*/

// phpBB Version
define('PHPBB_VERSION', '3.0.4');

// QA-related
// define('PHPBB_QA', 1);

// User related
define('ANONYMOUS', 1);

define('PHPBB3_USER_ACTIVATION_NONE', 0);
define('PHPBB3_USER_ACTIVATION_SELF', 1);
define('PHPBB3_USER_ACTIVATION_ADMIN', 2);
define('PHPBB3_USER_ACTIVATION_DISABLE', 3);

define('PHPBB3_AVATAR_UPLOAD', 1);
define('PHPBB3_AVATAR_REMOTE', 2);
define('PHPBB3_AVATAR_GALLERY', 3);

define('PHPBB3_USER_NORMAL', 0);
define('PHPBB3_USER_INACTIVE', 1);
define('PHPBB3_USER_IGNORE', 2);
define('PHPBB3_USER_FOUNDER', 3);

define('PHPBB3_INACTIVE_REGISTER', 1);
define('PHPBB3_INACTIVE_PROFILE', 2);
define('PHPBB3_INACTIVE_MANUAL', 3);
define('PHPBB3_INACTIVE_REMIND', 4);

// ACL
define('PHPBB3_PHPBB3_ACL_NEVER', 0);
define('PHPBB3_PHPBB3_ACL_YES', 1);
define('PHPBB3_PHPBB3_ACL_NO', -1);

// Login error codes
define('PHPBB3_LOGIN_CONTINUE', 1); // not used
define('PHPBB3_LOGIN_BREAK', 2);
define('PHPBB3_LOGIN_SUCCESS', 3);
define('PHPBB3_LOGIN_SUCCESS_CREATE_PROFILE', 20);
define('PHPBB3_LOGIN_ERROR_USERNAME', 10);
define('PHPBB3_LOGIN_ERROR_PASSWORD', 11);
define('PHPBB3_LOGIN_ERROR_ACTIVE', 12);
define('PHPBB3_LOGIN_ERROR_ATTEMPTS', 13);
define('PHPBB3_LOGIN_ERROR_EXTERNAL_AUTH', 14);
define('PHPBB3_LOGIN_ERROR_PASSWORD_CONVERT', 15);

// Group settings
define('PHPBB3_GROUP_OPEN', 0);
define('PHPBB3_GROUP_CLOSED', 1);
define('PHPBB3_GROUP_HIDDEN', 2);
define('PHPBB3_GROUP_SPECIAL', 3);
define('PHPBB3_GROUP_FREE', 4);

// Forum/Topic states
define('PHPBB3_FORUM_CAT', 0);
define('PHPBB3_FORUM_POST', 1);
define('PHPBB3_FORUM_LINK', 2);
define('PHPBB3_ITEM_UNLOCKED', 0);
define('PHPBB3_ITEM_LOCKED', 1);
define('PHPBB3_ITEM_MOVED', 2);

// Forum Flags
define('PHPBB3_FORUM_FLAG_LINK_TRACK', 1);
define('PHPBB3_FORUM_FLAG_PRUNE_POLL', 2);
define('PHPBB3_FORUM_FLAG_PRUNE_ANNOUNCE', 4);
define('PHPBB3_FORUM_FLAG_PRUNE_STICKY', 8);
define('PHPBB3_FORUM_FLAG_ACTIVE_TOPICS', 16);
define('PHPBB3_FORUM_FLAG_POST_REVIEW', 32);

// Optional text flags
define('PHPBB3_OPTION_FLAG_BBCODE', 1);
define('PHPBB3_OPTION_FLAG_SMILIES', 2);
define('PHPBB3_OPTION_FLAG_LINKS', 4);

// Topic types
define('PHPBB3_POST_NORMAL', 0);
define('PHPBB3_POST_STICKY', 1);
define('PHPBB3_POST_ANNOUNCE', 2);
define('PHPBB3_POST_GLOBAL', 3);

// Lastread types
define('PHPBB3_TRACK_NORMAL', 0); // not used
define('PHPBB3_TRACK_POSTED', 1); // not used

// Notify methods
define('PHPBB3_NOTIFY_EMAIL', 0);
define('PHPBB3_NOTIFY_IM', 1);
define('PHPBB3_NOTIFY_BOTH', 2);

// Email Priority Settings
define('PHPBB3_MAIL_LOW_PRIORITY', 4);
define('PHPBB3_MAIL_NORMAL_PRIORITY', 3);
define('PHPBB3_MAIL_HIGH_PRIORITY', 2);

// Log types
define('PHPBB3_LOG_ADMIN', 0);
define('PHPBB3_LOG_MOD', 1);
define('PHPBB3_LOG_CRITICAL', 2);
define('PHPBB3_LOG_USERS', 3);

// Private messaging - Do NOT change these values
define('PM_HOLD_BOX', -4);
define('PM_NO_BOX', -3);
define('PM_OUTBOX', -2);
define('PM_SENTBOX', -1);
define('PM_INBOX', 0);

// Full Folder Actions
define('PHPBB3_FULL_FOLDER_NONE', -3);
define('PHPBB3_FULL_FOLDER_DELETE', -2);
define('PHPBB3_FULL_FOLDER_HOLD', -1);

// Download Modes - Attachments
define('PHPBB3_INLINE_LINK', 1);
// This mode is only used internally to allow modders extending the attachment functionality
define('PHPBB3_PHYSICAL_LINK', 2);

// Confirm types
define('PHPBB3_CONFIRM_REG', 1);
define('PHPBB3_CONFIRM_LOGIN', 2);
define('PHPBB3_CONFIRM_POST', 3);

// Categories - Attachments
define('PHPBB3_ATTACHMENT_CATEGORY_NONE', 0);
define('PHPBB3_ATTACHMENT_CATEGORY_IMAGE', 1); // Inline Images
define('PHPBB3_ATTACHMENT_CATEGORY_WM', 2); // Windows Media Files - Streaming
define('PHPBB3_ATTACHMENT_CATEGORY_RM', 3); // Real Media Files - Streaming
define('PHPBB3_ATTACHMENT_CATEGORY_THUMB', 4); // Not used within the database, only while displaying posts
define('PHPBB3_ATTACHMENT_CATEGORY_FLASH', 5); // Flash/SWF files
define('PHPBB3_ATTACHMENT_CATEGORY_QUICKTIME', 6); // Quicktime/Mov files

// BBCode UID length
define('BBCODE_UID_LEN', 8);

// Number of core BBCodes
define('NUM_CORE_BBCODES', 12);

// Magic url types
define('MAGIC_URL_EMAIL', 1);
define('MAGIC_URL_FULL', 2);
define('MAGIC_URL_LOCAL', 3);
define('MAGIC_URL_WWW', 4);

// Profile Field Types
define('FIELD_INT', 1);
define('FIELD_STRING', 2);
define('FIELD_TEXT', 3);
define('FIELD_BOOL', 4);
define('FIELD_DROPDOWN', 5);
define('FIELD_DATE', 6);
// referer validation
define('REFERER_VALIDATE_NONE', 0);
define('REFERER_VALIDATE_HOST', 1);
define('REFERER_VALIDATE_PATH', 2);

// phpbb_chmod() permissions
define('CHMOD_ALL', 7);
define('CHMOD_READ', 4);
define('CHMOD_WRITE', 2);
define('CHMOD_EXECUTE', 1);

// Additional constants
define('VOTE_CONVERTED', 127);

//Forum Favorites constants
define('FAVORITES_SUCCESS',1);
define('FAVORITES_ERR_INVALID_UID',-1);
define('FAVORITES_ERR_INVALID_CATID',-2);
define('FAVORITES_ERR_INVALID_TEXT',-3);
define('FAVORITES_ERR_ITEM_EXISTS',-4);

// Table names
define('PHPBB3_ACL_PHPBB3_GROUPS_TABLE',	$prefix_phpbb3 . 'acl_groups');
define('PHPBB3_ACL_OPTIONS_TABLE',			$prefix_phpbb3 . 'acl_options');
define('PHPBB3_ACL_ROLES_DATA_TABLE',		$prefix_phpbb3 . 'acl_roles_data');
define('PHPBB3_ACL_ROLES_TABLE',			$prefix_phpbb3 . 'acl_roles');
define('PHPBB3_ACL_USERS_TABLE',			$prefix_phpbb3 . 'acl_users');
define('PHPBB3_ANNOUNCEMENTS_CENTRE_TABLE', $prefix_phpbb3 . 'announcement_centre');
define('PHPBB3_ATTACHMENTS_TABLE',			$prefix_phpbb3 . 'attachments');
define('PHPBB3_BANLIST_TABLE',				$prefix_phpbb3 . 'banlist');
define('PHPBB3_BBCODES_TABLE',				$prefix_phpbb3 . 'bbcodes');
define('PHPBB3_BOOKMARKS_TABLE',			$prefix_phpbb3 . 'bookmarks');
define('PHPBB3_BOTS_TABLE',				    $prefix_phpbb3 . 'bots');
define('PHPBB3_CONFIG_TABLE',				$prefix_phpbb3 . 'config');
define('PHPBB3_CONFIRM_TABLE',				$prefix_phpbb3 . 'confirm');
define('PHPBB3_DISALLOW_TABLE',			    $prefix_phpbb3 . 'disallow');
define('PHPBB3_DRAFTS_TABLE',				$prefix_phpbb3 . 'drafts');
define('PHPBB3_EXTENSIONS_TABLE',			$prefix_phpbb3 . 'extensions');
define('PHPBB3_EXTENSION_GROUPS_TABLE',	    $prefix_phpbb3 . 'extension_groups');
define('PHPBB3_FORUMS_TABLE',				$prefix_phpbb3 . 'forums');
define('PHPBB3_FORUMS_ACCESS_TABLE',		$prefix_phpbb3 . 'forums_access');
define('PHPBB3_FORUMS_TRACK_TABLE',		    $prefix_phpbb3 . 'forums_track');
define('PHPBB3_FORUMS_WATCH_TABLE',		    $prefix_phpbb3 . 'forums_watch');
define('PHPBB3_GROUPS_TABLE',				$prefix_phpbb3 . 'groups');
define('PHPBB3_ICONS_TABLE',				$prefix_phpbb3 . 'icons');
define('PHPBB3_LANG_TABLE',				    $prefix_phpbb3 . 'lang');
define('PHPBB3_LOG_TABLE',					$prefix_phpbb3 . 'log');
define('PHPBB3_MODERATOR_CACHE_TABLE',		$prefix_phpbb3 . 'moderator_cache');
define('PHPBB3_MODULES_TABLE',				$prefix_phpbb3 . 'modules');
define('PHPBB3_POLL_OPTIONS_TABLE',		    $prefix_phpbb3 . 'poll_options');
define('PHPBB3_POLL_VOTES_TABLE',			$prefix_phpbb3 . 'poll_votes');
define('PHPBB3_POSTS_TABLE',				$prefix_phpbb3 . 'posts');
define('PHPBB3_PRIVMSGS_TABLE',			    $prefix_phpbb3 . 'privmsgs');
define('PHPBB3_PRIVMSGS_FOLDER_TABLE',		$prefix_phpbb3 . 'privmsgs_folder');
define('PHPBB3_PRIVMSGS_RULES_TABLE',		$prefix_phpbb3 . 'privmsgs_rules');
define('PHPBB3_PRIVMSGS_TO_TABLE',			$prefix_phpbb3 . 'privmsgs_to');
define('PHPBB3_PROFILE_FIELDS_TABLE',		$prefix_phpbb3 . 'profile_fields');
define('PHPBB3_PROFILE_FIELDS_DATA_TABLE',	$prefix_phpbb3 . 'profile_fields_data');
define('PHPBB3_PROFILE_FIELDS_LANG_TABLE',	$prefix_phpbb3 . 'profile_fields_lang');
define('PHPBB3_PROFILE_LANG_TABLE',		    $prefix_phpbb3 . 'profile_lang');
define('PHPBB3_RANKS_TABLE',				$prefix_phpbb3 . 'ranks');
define('PHPBB3_REPORTS_TABLE',				$prefix_phpbb3 . 'reports');
define('PHPBB3_REPORTS_REASONS_TABLE',		$prefix_phpbb3 . 'reports_reasons');
define('PHPBB3_SEARCH_RESULTS_TABLE',		$prefix_phpbb3 . 'search_results');
define('PHPBB3_SEARCH_WORDLIST_TABLE',		$prefix_phpbb3 . 'search_wordlist');
define('PHPBB3_SEARCH_WORDMATCH_TABLE',	    $prefix_phpbb3 . 'search_wordmatch');
define('PHPBB3_SESSIONS_TABLE',			    $prefix_phpbb3 . 'sessions');
define('PHPBB3_SESSIONS_KEYS_TABLE',		$prefix_phpbb3 . 'sessions_keys');
define('PHPBB3_SITELIST_TABLE',			    $prefix_phpbb3 . 'sitelist');
define('PHPBB3_SMILIES_TABLE',				$prefix_phpbb3 . 'smilies');
define('PHPBB3_STYLES_TABLE',				$prefix_phpbb3 . 'styles');
define('PHPBB3_STYLES_TEMPLATE_TABLE',		$prefix_phpbb3 . 'styles_template');
define('PHPBB3_STYLES_TEMPLATE_DATA_TABLE', $prefix_phpbb3 . 'styles_template_data');
define('PHPBB3_STYLES_THEME_TABLE',		    $prefix_phpbb3 . 'styles_theme');
define('PHPBB3_STYLES_IMAGESET_TABLE',		$prefix_phpbb3 . 'styles_imageset');
define('PHPBB3_STYLES_IMAGESET_DATA_TABLE', $prefix_phpbb3 . 'styles_imageset_data');
define('PHPBB3_TOPICS_TABLE',				$prefix_phpbb3 . 'topics');
define('PHPBB3_TOPICS_POSTED_TABLE',		$prefix_phpbb3 . 'topics_posted');
define('PHPBB3_TOPICS_TRACK_TABLE',		    $prefix_phpbb3 . 'topics_track');
define('PHPBB3_TOPICS_WATCH_TABLE',		    $prefix_phpbb3 . 'topics_watch');
define('PHPBB3_USER_GROUP_TABLE',			$prefix_phpbb3 . 'user_group');
define('PHPBB3_USERS_TABLE',				  $user_prefix . '_users');
define('PHPBB3_WARNINGS_TABLE',			    $prefix_phpbb3 . 'warnings');
define('PHPBB3_WORDS_TABLE',				$prefix_phpbb3 . 'words');
define('PHPBB3_ZEBRA_TABLE',				$prefix_phpbb3 . 'zebra');

// Additional tables
define('FAVORITES_USER_TABLE',              $prefix_phpbb3 . 'favorites_user');
define('FAVORITES_CATEGORY_TABLE',          $prefix_phpbb3 . 'favorites_category');
define('FAVORITES_SPECIAL_TABLE',           $prefix_phpbb3 . 'favorites_special');
// Country Flags
define('PHPBB3_FLAGS_TABLE',				$prefix_phpbb3 . 'flags');
// Advertisement Management
define('PHPBB3_ADS_TABLE',					$prefix_phpbb3 . 'ads');
define('PHPBB3_ADS_FORUMS_TABLE',			$prefix_phpbb3 . 'ads_forums');
define('PHPBB3_ADS_GROUPS_TABLE',			$prefix_phpbb3 . 'ads_groups');
define('PHPBB3_ADS_IN_POSITIONS_TABLE',	    $prefix_phpbb3 . 'ads_in_positions');
define('PHPBB3_ADS_POSITIONS_TABLE',		$prefix_phpbb3 . 'ads_positions');
// lefty74's User Reminder Constants
define('ENABLED', 1);

define('AUTOMATIC', 0);
define('OVERRIDE', 1);
define('RETAIN_POSTS', 1);
define('DELETE_POSTS', 0);
define('PHPBB3_GALLERY_ROOT_PATH', 'gallery/');

define('PHPBB3_GALLERY_ALBUMS_TABLE',		$prefix_phpbb3 . 'gallery_albums');
define('PHPBB3_GALLERY_COMMENTS_TABLE',		$prefix_phpbb3 . 'gallery_comments');
define('PHPBB3_GALLERY_CONFIG_TABLE',		$prefix_phpbb3 . 'gallery_config');
define('PHPBB3_GALLERY_FAVORITES_TABLE',	$prefix_phpbb3 . 'gallery_favorites');
define('PHPBB3_GALLERY_IMAGES_TABLE',		$prefix_phpbb3 . 'gallery_images');
define('PHPBB3_GALLERY_MODSCACHE_TABLE',	$prefix_phpbb3 . 'gallery_modscache');
define('PHPBB3_GALLERY_PERMISSIONS_TABLE',	$prefix_phpbb3 . 'gallery_permissions');
define('PHPBB3_GALLERY_RATES_TABLE',		$prefix_phpbb3 . 'gallery_rates');
define('PHPBB3_GALLERY_REPORTS_TABLE',		$prefix_phpbb3 . 'gallery_reports');
define('PHPBB3_GALLERY_ROLES_TABLE',		$prefix_phpbb3 . 'gallery_roles');
define('PHPBB3_GALLERY_USERS_TABLE',		$prefix_phpbb3 . 'gallery_users');
define('PHPBB3_GALLERY_WATCH_TABLE',		$prefix_phpbb3 . 'gallery_watch');
define('PHPBB3_WWH_TABLE',					$prefix_phpbb3 . 'wwh');
define('PHPBB3_SHOUTBOX_TABLE',             $prefix_phpbb3 . 'shoutbox');
//-- mod : Genders ------------------------------------------------------------
//-- add
define('GENDER_F', 2); // Ladies first ;)
define('GENDER_X', 0);
define('GENDER_M', 1);
//-- fin mod : Genders --------------------------------------------------------
?>