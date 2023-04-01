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

define('USER_ACTIVATION_NONE', 0);
define('USER_ACTIVATION_SELF', 1);
define('USER_ACTIVATION_ADMIN', 2);
define('USER_ACTIVATION_DISABLE', 3);

define('AVATAR_UPLOAD', 1);
define('AVATAR_REMOTE', 2);
define('AVATAR_GALLERY', 3);

define('USER_NORMAL', 0);
define('USER_INACTIVE', 1);
define('USER_IGNORE', 2);
define('USER_FOUNDER', 3);

define('INACTIVE_REGISTER', 1);
define('INACTIVE_PROFILE', 2);
define('INACTIVE_MANUAL', 3);
define('INACTIVE_REMIND', 4);

// ACL
define('ACL_NEVER', 0);
define('ACL_YES', 1);
define('ACL_NO', -1);

// Login error codes
define('LOGIN_CONTINUE', 1);
define('LOGIN_BREAK', 2);
define('LOGIN_SUCCESS', 3);
define('LOGIN_SUCCESS_CREATE_PROFILE', 20);
define('LOGIN_ERROR_USERNAME', 10);
define('LOGIN_ERROR_PASSWORD', 11);
define('LOGIN_ERROR_ACTIVE', 12);
define('LOGIN_ERROR_ATTEMPTS', 13);
define('LOGIN_ERROR_EXTERNAL_AUTH', 14);
define('LOGIN_ERROR_PASSWORD_CONVERT', 15);

// Group settings
define('GROUP_OPEN', 0);
define('GROUP_CLOSED', 1);
define('GROUP_HIDDEN', 2);
define('GROUP_SPECIAL', 3);
define('GROUP_FREE', 4);

// Forum/Topic states
define('FORUM_CAT', 0);
define('FORUM_POST', 1);
define('FORUM_LINK', 2);
define('ITEM_UNLOCKED', 0);
define('ITEM_LOCKED', 1);
define('ITEM_MOVED', 2);

// Forum Flags
define('FORUM_FLAG_LINK_TRACK', 1);
define('FORUM_FLAG_PRUNE_POLL', 2);
define('FORUM_FLAG_PRUNE_ANNOUNCE', 4);
define('FORUM_FLAG_PRUNE_STICKY', 8);
define('FORUM_FLAG_ACTIVE_TOPICS', 16);
define('FORUM_FLAG_POST_REVIEW', 32);

// Optional text flags
define('OPTION_FLAG_BBCODE', 1);
define('OPTION_FLAG_SMILIES', 2);
define('OPTION_FLAG_LINKS', 4);

// Topic types
define('POST_NORMAL', 0);
define('POST_STICKY', 1);
define('POST_ANNOUNCE', 2);
define('POST_GLOBAL', 3);

// Lastread types
define('TRACK_NORMAL', 0);
define('TRACK_POSTED', 1);

// Notify methods
define('NOTIFY_EMAIL', 0);
define('NOTIFY_IM', 1);
define('NOTIFY_BOTH', 2);

// Email Priority Settings
define('MAIL_LOW_PRIORITY', 4);
define('MAIL_NORMAL_PRIORITY', 3);
define('MAIL_HIGH_PRIORITY', 2);

// Log types
define('LOG_ADMIN', 0);
define('LOG_MOD', 1);
define('LOG_CRITICAL', 2);
define('LOG_USERS', 3);

// Private messaging - Do NOT change these values
define('PRIVMSGS_HOLD_BOX', -4);
define('PRIVMSGS_NO_BOX', -3);
define('PRIVMSGS_OUTBOX', -2);
define('PRIVMSGS_SENTBOX', -1);
define('PRIVMSGS_INBOX', 0);

// Full Folder Actions
define('FULL_FOLDER_NONE', -3);
define('FULL_FOLDER_DELETE', -2);
define('FULL_FOLDER_HOLD', -1);

// Download Modes - Attachments
define('INLINE_LINK', 1);
// This mode is only used internally to allow modders extending the attachment functionality
define('PHYSICAL_LINK', 2);

// Confirm types
define('CONFIRM_REG', 1);
define('CONFIRM_LOGIN', 2);
define('CONFIRM_POST', 3);

// Categories - Attachments
define('ATTACHMENT_CATEGORY_NONE', 0);
define('ATTACHMENT_CATEGORY_IMAGE', 1); // Inline Images
define('ATTACHMENT_CATEGORY_WM', 2); // Windows Media Files - Streaming
define('ATTACHMENT_CATEGORY_RM', 3); // Real Media Files - Streaming
define('ATTACHMENT_CATEGORY_THUMB', 4); // Not used within the database, only while displaying posts
define('ATTACHMENT_CATEGORY_FLASH', 5); // Flash/SWF files
define('ATTACHMENT_CATEGORY_QUICKTIME', 6); // Quicktime/Mov files

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
@define('CHMOD_ALL', 7);
@define('CHMOD_READ', 4);
@define('CHMOD_WRITE', 2);
@define('CHMOD_EXECUTE', 1);

// Additional constants
define('VOTE_CONVERTED', 127);

//Forum Favorites constants
define('FAVORITES_SUCCESS',1);
define('FAVORITES_ERR_INVALID_UID',-1);
define('FAVORITES_ERR_INVALID_CATID',-2);
define('FAVORITES_ERR_INVALID_TEXT',-3);
define('FAVORITES_ERR_ITEM_EXISTS',-4);

// Table names
define('ACL_GROUPS_TABLE',			$prefix_phpbb3 . 'acl_groups');
define('ACL_OPTIONS_TABLE',			$prefix_phpbb3 . 'acl_options');
define('ACL_ROLES_DATA_TABLE',		$prefix_phpbb3 . 'acl_roles_data');
define('ACL_ROLES_TABLE',			$prefix_phpbb3 . 'acl_roles');
define('ACL_USERS_TABLE',			$prefix_phpbb3 . 'acl_users');
define('ANNOUNCEMENTS_CENTRE_TABLE',$prefix_phpbb3 . 'announcement_centre');
define('ATTACHMENTS_TABLE',			$prefix_phpbb3 . 'attachments');
define('BANLIST_TABLE',				$prefix_phpbb3 . 'banlist');
define('BBCODES_TABLE',				$prefix_phpbb3 . 'bbcodes');
define('BOOKMARKS_TABLE',			$prefix_phpbb3 . 'bookmarks');
define('BOTS_TABLE',				$prefix_phpbb3 . 'bots');
define('CONFIG_TABLE',				$prefix_phpbb3 . 'config');
define('CONFIRM_TABLE',				$prefix_phpbb3 . 'confirm');
define('DISALLOW_TABLE',			$prefix_phpbb3 . 'disallow');
define('DRAFTS_TABLE',				$prefix_phpbb3 . 'drafts');
define('EXTENSIONS_TABLE',			$prefix_phpbb3 . 'extensions');
define('EXTENSION_GROUPS_TABLE',	$prefix_phpbb3 . 'extension_groups');
define('FORUMS_TABLE',				$prefix_phpbb3 . 'forums');
define('FORUMS_ACCESS_TABLE',		$prefix_phpbb3 . 'forums_access');
define('FORUMS_TRACK_TABLE',		$prefix_phpbb3 . 'forums_track');
define('FORUMS_WATCH_TABLE',		$prefix_phpbb3 . 'forums_watch');
define('GROUPS_TABLE',				$prefix_phpbb3 . 'groups');
define('ICONS_TABLE',				$prefix_phpbb3 . 'icons');
define('LANG_TABLE',				$prefix_phpbb3 . 'lang');
define('LOG_TABLE',					$prefix_phpbb3 . 'log');
define('MODERATOR_CACHE_TABLE',		$prefix_phpbb3 . 'moderator_cache');
define('MODULES_TABLE',				$prefix_phpbb3 . 'modules');
define('POLL_OPTIONS_TABLE',		$prefix_phpbb3 . 'poll_options');
define('POLL_VOTES_TABLE',			$prefix_phpbb3 . 'poll_votes');
define('POSTS_TABLE',				$prefix_phpbb3 . 'posts');
define('PRIVMSGS_TABLE',			$prefix_phpbb3 . 'privmsgs');
define('PRIVMSGS_FOLDER_TABLE',		$prefix_phpbb3 . 'privmsgs_folder');
define('PRIVMSGS_RULES_TABLE',		$prefix_phpbb3 . 'privmsgs_rules');
define('PRIVMSGS_TO_TABLE',			$prefix_phpbb3 . 'privmsgs_to');
define('PROFILE_FIELDS_TABLE',		$prefix_phpbb3 . 'profile_fields');
define('PROFILE_FIELDS_DATA_TABLE',	$prefix_phpbb3 . 'profile_fields_data');
define('PROFILE_FIELDS_LANG_TABLE',	$prefix_phpbb3 . 'profile_fields_lang');
define('PROFILE_LANG_TABLE',		$prefix_phpbb3 . 'profile_lang');
define('RANKS_TABLE',				$prefix_phpbb3 . 'ranks');
define('REPORTS_TABLE',				$prefix_phpbb3 . 'reports');
define('REPORTS_REASONS_TABLE',		$prefix_phpbb3 . 'reports_reasons');
define('SEARCH_RESULTS_TABLE',		$prefix_phpbb3 . 'search_results');
define('SEARCH_WORDLIST_TABLE',		$prefix_phpbb3 . 'search_wordlist');
define('SEARCH_WORDMATCH_TABLE',	$prefix_phpbb3 . 'search_wordmatch');
define('SESSIONS_TABLE',			$prefix_phpbb3 . 'sessions');
define('SESSIONS_KEYS_TABLE',		$prefix_phpbb3 . 'sessions_keys');
define('SITELIST_TABLE',			$prefix_phpbb3 . 'sitelist');
define('SMILIES_TABLE',				$prefix_phpbb3 . 'smilies');
define('STYLES_TABLE',				$prefix_phpbb3 . 'styles');
define('STYLES_TEMPLATE_TABLE',		$prefix_phpbb3 . 'styles_template');
define('STYLES_TEMPLATE_DATA_TABLE',$prefix_phpbb3 . 'styles_template_data');
define('STYLES_THEME_TABLE',		$prefix_phpbb3 . 'styles_theme');
define('STYLES_IMAGESET_TABLE',		$prefix_phpbb3 . 'styles_imageset');
define('STYLES_IMAGESET_DATA_TABLE',$prefix_phpbb3 . 'styles_imageset_data');
define('TOPICS_TABLE',				$prefix_phpbb3 . 'topics');
define('TOPICS_POSTED_TABLE',		$prefix_phpbb3 . 'topics_posted');
define('TOPICS_TRACK_TABLE',		$prefix_phpbb3 . 'topics_track');
define('TOPICS_WATCH_TABLE',		$prefix_phpbb3 . 'topics_watch');
define('USER_GROUP_TABLE',			$prefix_phpbb3 . 'user_group');
define('USERS_TABLE',				$prefix_phpbb3 . 'users');
define('WARNINGS_TABLE',			$prefix_phpbb3 . 'warnings');
define('WORDS_TABLE',				$prefix_phpbb3 . 'words');
define('ZEBRA_TABLE',				$prefix_phpbb3 . 'zebra');

// Additional tables
define('FAVORITES_USER_TABLE',      $prefix_phpbb3 . 'favorites_user');
define('FAVORITES_CATEGORY_TABLE',  $prefix_phpbb3 . 'favorites_category');
define('FAVORITES_SPECIAL_TABLE',   $prefix_phpbb3 . 'favorites_special');
// Country Flags
define('FLAGS_TABLE',				$prefix_phpbb3 . 'flags');
// Advertisement Management
define('ADS_TABLE',					$prefix_phpbb3 . 'ads');
define('ADS_FORUMS_TABLE',			$prefix_phpbb3 . 'ads_forums');
define('ADS_GROUPS_TABLE',			$prefix_phpbb3 . 'ads_groups');
define('ADS_IN_POSITIONS_TABLE',	$prefix_phpbb3 . 'ads_in_positions');
define('ADS_POSITIONS_TABLE',		$prefix_phpbb3 . 'ads_positions');
// lefty74's User Reminder Constants
define('ENABLED', 1);

define('AUTOMATIC', 0);
define('OVERRIDE', 1);
define('RETAIN_POSTS', 1);
define('DELETE_POSTS', 0);
define('GALLERY_ROOT_PATH', 'gallery/');

define('GALLERY_ALBUMS_TABLE',			$prefix_phpbb3 . 'gallery_albums');
define('GALLERY_COMMENTS_TABLE',		$prefix_phpbb3 . 'gallery_comments');
define('GALLERY_CONFIG_TABLE',			$prefix_phpbb3 . 'gallery_config');
define('GALLERY_FAVORITES_TABLE',		$prefix_phpbb3 . 'gallery_favorites');
define('GALLERY_IMAGES_TABLE',			$prefix_phpbb3 . 'gallery_images');
define('GALLERY_MODSCACHE_TABLE',		$prefix_phpbb3 . 'gallery_modscache');
define('GALLERY_PERMISSIONS_TABLE',		$prefix_phpbb3 . 'gallery_permissions');
define('GALLERY_RATES_TABLE',			$prefix_phpbb3 . 'gallery_rates');
define('GALLERY_REPORTS_TABLE',			$prefix_phpbb3 . 'gallery_reports');
define('GALLERY_ROLES_TABLE',			$prefix_phpbb3 . 'gallery_roles');
define('GALLERY_USERS_TABLE',			$prefix_phpbb3 . 'gallery_users');
define('GALLERY_WATCH_TABLE',			$prefix_phpbb3 . 'gallery_watch');
define('WWH_TABLE',					$prefix_phpbb3 . 'wwh');
define('SHOUTBOX_TABLE', $prefix_phpbb3 . 'shoutbox');
//-- mod : Genders ------------------------------------------------------------
//-- add
define('GENDER_F', 2); // Ladies first ;)
define('GENDER_X', 0);
define('GENDER_M', 1);
//-- fin mod : Genders --------------------------------------------------------
?>