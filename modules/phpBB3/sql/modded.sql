#
# phpBB Backup Script
# Dump of tables for phpbb_
# DATE : 19-12-2008 17:41:53 GMT
#
# Table: phpbb_acl_arcade_groups
DROP TABLE IF EXISTS phpbb_acl_arcade_groups;
CREATE TABLE `phpbb_acl_arcade_groups` (
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `auth_opt_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_arcade_groups (group_id, cat_id, auth_option_id, auth_role_id, auth_setting) VALUES (5, 1, 0, 2, 0),(2, 1, 0, 6, 0),(1, 1, 0, 7, 0),(6, 1, 0, 7, 0),(4, 1, 0, 6, 0);

# Table: phpbb_acl_arcade_options
DROP TABLE IF EXISTS phpbb_acl_arcade_options;
CREATE TABLE `phpbb_acl_arcade_options` (
  `auth_option_id` mediumint(8) unsigned NOT NULL auto_increment,
  `auth_option` varchar(50) collate utf8_bin NOT NULL default '',
  `is_global` tinyint(1) unsigned NOT NULL default '0',
  `is_local` tinyint(1) unsigned NOT NULL default '0',
  `founder_only` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`auth_option_id`),
  KEY `auth_option` (`auth_option`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_arcade_options (auth_option_id, auth_option, is_global, is_local, founder_only) VALUES (1, 'c_', 0, 1, 0),(2, 'c_list', 0, 1, 0),(3, 'c_view', 0, 1, 0),(4, 'c_play', 0, 1, 0),(5, 'c_score', 0, 1, 0),(6, 'c_rate', 0, 1, 0),(7, 'c_comment', 0, 1, 0),(8, 'c_resolution', 0, 1, 0),(9, 'c_download', 0, 1, 0),(10, 'c_ignorecontrol', 0, 1, 0),(11, 'c_popup', 0, 1, 0),(12, 'c_playfree', 0, 1, 0),(13, 'c_report', 0, 1, 0);

# Table: phpbb_acl_arcade_roles
DROP TABLE IF EXISTS phpbb_acl_arcade_roles;
CREATE TABLE `phpbb_acl_arcade_roles` (
  `role_id` mediumint(8) unsigned NOT NULL auto_increment,
  `role_name` varchar(255) collate utf8_bin NOT NULL default '',
  `role_description` text collate utf8_bin NOT NULL,
  `role_type` varchar(10) collate utf8_bin NOT NULL default '',
  `role_order` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`role_id`),
  KEY `role_type` (`role_type`),
  KEY `role_order` (`role_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_arcade_roles (role_id, role_name, role_description, role_type, role_order) VALUES (1, 'ROLE_ARCADE_NOACCESS', 'ROLE_DESCRIPTION_ARCADE_NOACCESS', 'c_', 1),(2, 'ROLE_ARCADE_FULL', 'ROLE_DESCRIPTION_ARCADE_FULL', 'c_', 2),(3, 'ROLE_ARCADE_LIMITED', 'ROLE_DESCRIPTION_ARCADE_LIMITED', 'c_', 3),(4, 'ROLE_ARCADE_PLAYONLY', 'ROLE_DESCRIPTION_ARCADE_PLAYONLY', 'c_', 4),(5, 'ROLE_ARCADE_STANDARD', 'ROLE_DESCRIPTION_ARCADE_STANDARD', 'c_', 5),(6, 'ROLE_ARCADE_STANDARD_DOWNLOADS', 'ROLE_DESCRIPTION_ARCADE_STANDARD_DOWNLOADS', 'c_', 6),(7, 'ROLE_ARCADE_VIEWONLY', 'ROLE_DESCRIPTION_ARCADE_VIEWONLY', 'c_', 7);

# Table: phpbb_acl_arcade_roles_data
DROP TABLE IF EXISTS phpbb_acl_arcade_roles_data;
CREATE TABLE `phpbb_acl_arcade_roles_data` (
  `role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`role_id`,`auth_option_id`),
  KEY `ath_op_id` (`auth_option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_arcade_roles_data (role_id, auth_option_id, auth_setting) VALUES (1, 1, 0),(2, 1, 1),(2, 2, 1),(2, 3, 1),(2, 4, 1),(2, 5, 1),(2, 6, 1),(2, 7, 1),(2, 8, 1),(2, 9, 1),(2, 10, 1),(3, 1, 1),(3, 2, 1),(3, 3, 1),(3, 4, 1),(3, 5, 1),(4, 1, 1),(4, 2, 1),(4, 3, 1),(4, 4, 1),(5, 1, 1),(5, 2, 1),(5, 3, 1),(5, 4, 1),(5, 5, 1),(5, 6, 1),(5, 7, 1),(5, 8, 1),(6, 1, 1),(6, 2, 1),(6, 3, 1),(6, 4, 1),(6, 5, 1),(6, 6, 1),(6, 7, 1),(6, 8, 1),(6, 9, 1),(7, 1, 1),(7, 2, 1),(7, 3, 1),(2, 11, 1),(3, 11, 1),(4, 11, 1),(5, 11, 1),(6, 11, 1),(2, 12, 1),(5, 13, 1),(6, 13, 1),(2, 13, 1);

# Table: phpbb_acl_arcade_users
DROP TABLE IF EXISTS phpbb_acl_arcade_users;
CREATE TABLE `phpbb_acl_arcade_users` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  KEY `user_id` (`user_id`),
  KEY `auth_option_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_acl_groups
DROP TABLE IF EXISTS phpbb_acl_groups;
CREATE TABLE `phpbb_acl_groups` (
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `auth_opt_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_groups (group_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (1, 0, 110, 0, 1),(1, 0, 93, 0, 1),(5, 0, 0, 1, 0),(3, 0, 0, 6, 0),(4, 0, 0, 5, 0),(4, 0, 0, 10, 0),(1, 1, 0, 17, 0),(2, 1, 0, 17, 0),(3, 1, 0, 17, 0),(6, 1, 0, 17, 0),(1, 2, 0, 17, 0),(2, 2, 0, 15, 0),(3, 2, 0, 15, 0),(4, 2, 0, 21, 0),(5, 2, 0, 14, 0),(5, 2, 0, 10, 0),(6, 2, 0, 19, 0),(5, 0, 86, 0, 1),(5, 0, 88, 0, 1),(5, 0, 93, 0, 1),(5, 0, 109, 0, 1),(5, 0, 114, 0, 1),(5, 0, 87, 0, 1),(5, 0, 89, 0, 1),(5, 0, 90, 0, 1),(5, 0, 91, 0, 1),(5, 0, 92, 0, 1),(5, 0, 116, 0, 1),(5, 0, 94, 0, 1),(5, 0, 95, 0, 1),(5, 0, 110, 0, 1),(5, 0, 111, 0, 1),(5, 0, 112, 0, 1),(5, 0, 115, 0, 1),(5, 0, 96, 0, 1),(5, 0, 97, 0, 1),(5, 0, 98, 0, 1),(5, 0, 99, 0, 1),(5, 0, 100, 0, 1),(5, 0, 101, 0, 1),(5, 0, 102, 0, 1),(5, 0, 103, 0, 1),(5, 0, 104, 0, 1),(5, 0, 105, 0, 1),(5, 0, 106, 0, 1),(5, 0, 107, 0, 1),(5, 0, 108, 0, 1),(5, 0, 113, 0, 1),(5, 0, 85, 0, 1),(2, 0, 86, 0, 1),(2, 0, 88, 0, 1),(2, 0, 93, 0, 1),(2, 0, 109, 0, 1),(2, 0, 114, 0, 1),(2, 0, 87, 0, 1),(2, 0, 89, 0, 1),(2, 0, 92, 0, 1),(2, 0, 116, 0, 1),(2, 0, 94, 0, 1),(2, 0, 110, 0, 1),(2, 0, 111, 0, 1),(2, 0, 112, 0, 1),(2, 0, 96, 0, 1),(2, 0, 97, 0, 1),(2, 0, 98, 0, 1),(2, 0, 99, 0, 1),(2, 0, 100, 0, 1),(2, 0, 101, 0, 1),(2, 0, 102, 0, 1),(2, 0, 105, 0, 1),(2, 0, 106, 0, 1),(2, 0, 107, 0, 1),(2, 0, 108, 0, 1),(2, 0, 113, 0, 1),(2, 0, 85, 0, 1),(1, 0, 85, 0, 1),(5, 0, 134, 0, 1),(2, 0, 134, 0, 1);

# Table: phpbb_acl_options
DROP TABLE IF EXISTS phpbb_acl_options;
CREATE TABLE `phpbb_acl_options` (
  `auth_option_id` mediumint(8) unsigned NOT NULL auto_increment,
  `auth_option` varchar(50) collate utf8_bin NOT NULL default '',
  `is_global` tinyint(1) unsigned NOT NULL default '0',
  `is_local` tinyint(1) unsigned NOT NULL default '0',
  `founder_only` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`auth_option_id`),
  KEY `auth_option` (`auth_option`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_options (auth_option_id, auth_option, is_global, is_local, founder_only) VALUES (1, 'f_', 0, 1, 0),(2, 'f_announce', 0, 1, 0),(3, 'f_attach', 0, 1, 0),(4, 'f_bbcode', 0, 1, 0),(5, 'f_bump', 0, 1, 0),(6, 'f_delete', 0, 1, 0),(7, 'f_download', 0, 1, 0),(8, 'f_edit', 0, 1, 0),(9, 'f_email', 0, 1, 0),(10, 'f_flash', 0, 1, 0),(11, 'f_icons', 0, 1, 0),(12, 'f_ignoreflood', 0, 1, 0),(13, 'f_img', 0, 1, 0),(14, 'f_list', 0, 1, 0),(15, 'f_noapprove', 0, 1, 0),(16, 'f_poll', 0, 1, 0),(17, 'f_post', 0, 1, 0),(18, 'f_postcount', 0, 1, 0),(19, 'f_print', 0, 1, 0),(20, 'f_read', 0, 1, 0),(21, 'f_reply', 0, 1, 0),(22, 'f_report', 0, 1, 0),(23, 'f_search', 0, 1, 0),(24, 'f_sigs', 0, 1, 0),(25, 'f_smilies', 0, 1, 0),(26, 'f_sticky', 0, 1, 0),(27, 'f_subscribe', 0, 1, 0),(28, 'f_user_lock', 0, 1, 0),(29, 'f_vote', 0, 1, 0),(30, 'f_votechg', 0, 1, 0),(31, 'm_', 1, 1, 0),(32, 'm_approve', 1, 1, 0),(33, 'm_chgposter', 1, 1, 0),(34, 'm_delete', 1, 1, 0),(35, 'm_edit', 1, 1, 0),(36, 'm_info', 1, 1, 0),(37, 'm_lock', 1, 1, 0),(38, 'm_merge', 1, 1, 0),(39, 'm_move', 1, 1, 0),(40, 'm_report', 1, 1, 0),(41, 'm_split', 1, 1, 0),(42, 'm_ban', 1, 0, 0),(43, 'm_warn', 1, 0, 0),(44, 'a_', 1, 0, 0),(45, 'a_aauth', 1, 0, 0),(46, 'a_attach', 1, 0, 0),(47, 'a_authgroups', 1, 0, 0),(48, 'a_authusers', 1, 0, 0),(49, 'a_backup', 1, 0, 0),(50, 'a_ban', 1, 0, 0),(51, 'a_bbcode', 1, 0, 0),(52, 'a_board', 1, 0, 0),(53, 'a_bots', 1, 0, 0),(54, 'a_clearlogs', 1, 0, 0),(55, 'a_email', 1, 0, 0),(56, 'a_fauth', 1, 0, 0),(57, 'a_forum', 1, 0, 0),(58, 'a_forumadd', 1, 0, 0),(59, 'a_forumdel', 1, 0, 0),(60, 'a_group', 1, 0, 0),(61, 'a_groupadd', 1, 0, 0),(62, 'a_groupdel', 1, 0, 0),(63, 'a_icons', 1, 0, 0),(64, 'a_jabber', 1, 0, 0),(65, 'a_language', 1, 0, 0),(66, 'a_mauth', 1, 0, 0),(67, 'a_modules', 1, 0, 0),(68, 'a_names', 1, 0, 0),(69, 'a_phpinfo', 1, 0, 0),(70, 'a_profile', 1, 0, 0),(71, 'a_prune', 1, 0, 0),(72, 'a_ranks', 1, 0, 0),(73, 'a_reasons', 1, 0, 0),(74, 'a_roles', 1, 0, 0),(75, 'a_search', 1, 0, 0),(76, 'a_server', 1, 0, 0),(77, 'a_styles', 1, 0, 0),(78, 'a_switchperm', 1, 0, 0),(79, 'a_uauth', 1, 0, 0),(80, 'a_user', 1, 0, 0),(81, 'a_userdel', 1, 0, 0),(82, 'a_viewauth', 1, 0, 0),(83, 'a_viewlogs', 1, 0, 0),(84, 'a_words', 1, 0, 0),(85, 'u_', 1, 0, 0),(86, 'u_attach', 1, 0, 0),(87, 'u_chgavatar', 1, 0, 0),(88, 'u_chgcensors', 1, 0, 0),(89, 'u_chgemail', 1, 0, 0),(90, 'u_chggrp', 1, 0, 0),(91, 'u_chgname', 1, 0, 0),(92, 'u_chgpasswd', 1, 0, 0),(93, 'u_download', 1, 0, 0),(94, 'u_hideonline', 1, 0, 0),(95, 'u_ignoreflood', 1, 0, 0),(96, 'u_masspm', 1, 0, 0),(97, 'u_pm_attach', 1, 0, 0),(98, 'u_pm_bbcode', 1, 0, 0),(99, 'u_pm_delete', 1, 0, 0),(100, 'u_pm_download', 1, 0, 0),(101, 'u_pm_edit', 1, 0, 0),(102, 'u_pm_emailpm', 1, 0, 0),(103, 'u_pm_flash', 1, 0, 0),(104, 'u_pm_forward', 1, 0, 0),(105, 'u_pm_img', 1, 0, 0),(106, 'u_pm_printpm', 1, 0, 0),(107, 'u_pm_smilies', 1, 0, 0),(108, 'u_readpm', 1, 0, 0),(109, 'u_savedrafts', 1, 0, 0),(110, 'u_search', 1, 0, 0),(111, 'u_sendemail', 1, 0, 0),(112, 'u_sendim', 1, 0, 0),(113, 'u_sendpm', 1, 0, 0),(114, 'u_sig', 1, 0, 0),(115, 'u_viewonline', 1, 0, 0),(116, 'u_viewprofile', 1, 0, 0),(123, 'a_arcade_settings', 1, 0, 0),(124, 'a_arcade_game', 1, 0, 0),(125, 'a_arcade_delete_game', 1, 0, 0),(126, 'a_arcade_cat', 1, 0, 0),(127, 'a_arcade_delete_cat', 1, 0, 0),(128, 'a_arcade_scores', 1, 0, 0),(129, 'a_arcade_utilities', 1, 0, 0),(130, 'a_add_user', 1, 0, 0),(132, 'a_cauth', 1, 0, 0),(133, 'a_ads', 1, 0, 0),(134, 'u_masspm_group', 1, 0, 0),(135, 'a_flags', 1, 0, 0);

# Table: phpbb_acl_roles
DROP TABLE IF EXISTS phpbb_acl_roles;
CREATE TABLE `phpbb_acl_roles` (
  `role_id` mediumint(8) unsigned NOT NULL auto_increment,
  `role_name` varchar(255) collate utf8_bin NOT NULL default '',
  `role_description` text collate utf8_bin NOT NULL,
  `role_type` varchar(10) collate utf8_bin NOT NULL default '',
  `role_order` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`role_id`),
  KEY `role_type` (`role_type`),
  KEY `role_order` (`role_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_roles (role_id, role_name, role_description, role_type, role_order) VALUES (1, 'ROLE_ADMIN_STANDARD', 'ROLE_DESCRIPTION_ADMIN_STANDARD', 'a_', 1),(2, 'ROLE_ADMIN_FORUM', 'ROLE_DESCRIPTION_ADMIN_FORUM', 'a_', 3),(3, 'ROLE_ADMIN_USERGROUP', 'ROLE_DESCRIPTION_ADMIN_USERGROUP', 'a_', 4),(4, 'ROLE_ADMIN_FULL', 'ROLE_DESCRIPTION_ADMIN_FULL', 'a_', 2),(5, 'ROLE_USER_FULL', 'ROLE_DESCRIPTION_USER_FULL', 'u_', 3),(6, 'ROLE_USER_STANDARD', 'ROLE_DESCRIPTION_USER_STANDARD', 'u_', 1),(7, 'ROLE_USER_LIMITED', 'ROLE_DESCRIPTION_USER_LIMITED', 'u_', 2),(8, 'ROLE_USER_NOPM', 'ROLE_DESCRIPTION_USER_NOPM', 'u_', 4),(9, 'ROLE_USER_NOAVATAR', 'ROLE_DESCRIPTION_USER_NOAVATAR', 'u_', 5),(10, 'ROLE_MOD_FULL', 'ROLE_DESCRIPTION_MOD_FULL', 'm_', 3),(11, 'ROLE_MOD_STANDARD', 'ROLE_DESCRIPTION_MOD_STANDARD', 'm_', 1),(12, 'ROLE_MOD_SIMPLE', 'ROLE_DESCRIPTION_MOD_SIMPLE', 'm_', 2),(13, 'ROLE_MOD_QUEUE', 'ROLE_DESCRIPTION_MOD_QUEUE', 'm_', 4),(14, 'ROLE_FORUM_FULL', 'ROLE_DESCRIPTION_FORUM_FULL', 'f_', 7),(15, 'ROLE_FORUM_STANDARD', 'ROLE_DESCRIPTION_FORUM_STANDARD', 'f_', 5),(16, 'ROLE_FORUM_NOACCESS', 'ROLE_DESCRIPTION_FORUM_NOACCESS', 'f_', 1),(17, 'ROLE_FORUM_READONLY', 'ROLE_DESCRIPTION_FORUM_READONLY', 'f_', 2),(18, 'ROLE_FORUM_LIMITED', 'ROLE_DESCRIPTION_FORUM_LIMITED', 'f_', 3),(19, 'ROLE_FORUM_BOT', 'ROLE_DESCRIPTION_FORUM_BOT', 'f_', 9),(20, 'ROLE_FORUM_ONQUEUE', 'ROLE_DESCRIPTION_FORUM_ONQUEUE', 'f_', 8),(21, 'ROLE_FORUM_POLLS', 'ROLE_DESCRIPTION_FORUM_POLLS', 'f_', 6),(22, 'ROLE_FORUM_LIMITED_POLLS', 'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS', 'f_', 4);

# Table: phpbb_acl_roles_data
DROP TABLE IF EXISTS phpbb_acl_roles_data;
CREATE TABLE `phpbb_acl_roles_data` (
  `role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`role_id`,`auth_option_id`),
  KEY `ath_op_id` (`auth_option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_roles_data (role_id, auth_option_id, auth_setting) VALUES (1, 44, 1),(1, 46, 1),(1, 47, 1),(1, 48, 1),(1, 50, 1),(1, 51, 1),(1, 52, 1),(1, 56, 1),(1, 57, 1),(1, 58, 1),(1, 59, 1),(1, 60, 1),(1, 61, 1),(1, 62, 1),(1, 63, 1),(1, 66, 1),(1, 68, 1),(1, 70, 1),(1, 71, 1),(1, 72, 1),(1, 73, 1),(1, 79, 1),(1, 80, 1),(1, 81, 1),(1, 82, 1),(1, 83, 1),(1, 84, 1),(2, 44, 1),(2, 47, 1),(2, 48, 1),(2, 56, 1),(2, 57, 1),(2, 58, 1),(2, 59, 1),(2, 66, 1),(2, 71, 1),(2, 79, 1),(2, 82, 1),(2, 83, 1),(3, 44, 1),(3, 47, 1),(3, 48, 1),(3, 50, 1),(3, 60, 1),(3, 61, 1),(3, 62, 1),(3, 72, 1),(3, 79, 1),(3, 80, 1),(3, 82, 1),(3, 83, 1),(4, 44, 1),(4, 45, 1),(4, 46, 1),(4, 47, 1),(4, 48, 1),(4, 49, 1),(4, 50, 1),(4, 51, 1),(4, 52, 1),(4, 53, 1),(4, 54, 1),(4, 55, 1),(4, 56, 1),(4, 57, 1),(4, 58, 1),(4, 59, 1),(4, 60, 1),(4, 61, 1),(4, 62, 1),(4, 63, 1),(4, 64, 1),(4, 65, 1),(4, 66, 1),(4, 67, 1),(4, 68, 1),(4, 69, 1),(4, 70, 1),(4, 71, 1),(4, 72, 1),(4, 73, 1),(4, 74, 1),(4, 75, 1),(4, 76, 1),(4, 77, 1),(4, 78, 1),(4, 79, 1),(4, 80, 1),(4, 81, 1),(4, 82, 1),(4, 83, 1),(4, 84, 1),(5, 85, 1),(5, 86, 1),(5, 87, 1),(5, 88, 1),(5, 89, 1),(5, 90, 1),(5, 91, 1),(5, 92, 1),(5, 93, 1),(5, 94, 1),(5, 95, 1),(5, 96, 1),(5, 97, 1),(5, 98, 1),(5, 99, 1),(5, 100, 1),(5, 101, 1),(5, 102, 1),(5, 103, 1),(5, 104, 1),(5, 105, 1),(5, 106, 1),(5, 107, 1),(5, 108, 1),(5, 109, 1),(5, 110, 1),(5, 111, 1),(5, 112, 1),(5, 113, 1),(5, 114, 1),(5, 115, 1),(5, 116, 1),(6, 85, 1),(6, 86, 1),(6, 87, 1),(6, 88, 1),(6, 89, 1),(6, 92, 1),(6, 93, 1),(6, 94, 1),(6, 96, 1),(6, 97, 1),(6, 98, 1),(6, 99, 1),(6, 100, 1),(6, 101, 1),(6, 102, 1),(6, 105, 1),(6, 106, 1),(6, 107, 1),(6, 108, 1),(6, 109, 1),(6, 110, 1),(6, 111, 1),(6, 112, 1),(6, 113, 1),(6, 114, 1),(6, 116, 1),(7, 85, 1),(7, 87, 1),(7, 88, 1),(7, 89, 1),(7, 92, 1),(7, 93, 1),(7, 94, 1),(7, 96, 1),(7, 98, 1),(7, 99, 1),(7, 100, 1),(7, 101, 1),(7, 104, 1),(7, 105, 1),(7, 106, 1),(7, 107, 1),(7, 108, 1),(7, 113, 1),(7, 114, 1),(7, 116, 1),(8, 85, 1),(8, 87, 1),(8, 88, 1),(8, 89, 1),(8, 92, 1),(8, 93, 1),(8, 94, 1),(8, 114, 1),(8, 116, 1),(8, 96, 0),(8, 108, 0),(8, 113, 0),(9, 85, 1),(9, 88, 1),(9, 89, 1),(9, 92, 1),(9, 93, 1),(9, 94, 1),(9, 96, 1),(9, 98, 1),(9, 99, 1),(9, 100, 1),(9, 101, 1),(9, 104, 1),(9, 105, 1),(9, 106, 1),(9, 107, 1),(9, 108, 1),(9, 113, 1),(9, 114, 1),(9, 116, 1),(9, 87, 0),(10, 31, 1),(10, 32, 1),(10, 42, 1),(10, 33, 1),(10, 34, 1),(10, 35, 1),(10, 36, 1),(10, 37, 1),(10, 38, 1),(10, 39, 1),(10, 40, 1),(10, 41, 1),(10, 43, 1),(11, 31, 1),(11, 32, 1),(11, 34, 1),(11, 35, 1),(11, 36, 1),(11, 37, 1),(11, 38, 1),(11, 39, 1),(11, 40, 1),(11, 41, 1),(11, 43, 1),(12, 31, 1),(12, 34, 1),(12, 35, 1),(12, 36, 1),(12, 40, 1),(13, 31, 1),(13, 32, 1),(13, 35, 1),(14, 1, 1),(14, 2, 1),(14, 3, 1),(14, 4, 1),(14, 5, 1),(14, 6, 1),(14, 7, 1),(14, 8, 1),(14, 9, 1),(14, 10, 1),(14, 11, 1),(14, 12, 1),(14, 13, 1),(14, 14, 1),(14, 15, 1),(14, 16, 1),(14, 17, 1),(14, 18, 1),(14, 19, 1),(14, 20, 1),(14, 21, 1),(14, 22, 1),(14, 23, 1),(14, 24, 1),(14, 25, 1),(14, 26, 1),(14, 27, 1),(14, 28, 1),(14, 29, 1),(14, 30, 1),(15, 1, 1),(15, 3, 1),(15, 4, 1),(15, 5, 1),(15, 6, 1),(15, 7, 1),(15, 8, 1),(15, 9, 1),(15, 11, 1),(15, 13, 1),(15, 14, 1),(15, 15, 1),(15, 17, 1),(15, 18, 1),(15, 19, 1),(15, 20, 1),(15, 21, 1),(15, 22, 1),(15, 23, 1),(15, 24, 1),(15, 25, 1),(15, 27, 1),(15, 29, 1),(15, 30, 1),(16, 1, 0),(17, 1, 1),(17, 7, 1),(17, 14, 1),(17, 19, 1),(17, 20, 1),(17, 23, 1),(17, 27, 1),(18, 1, 1),(18, 4, 1),(18, 7, 1),(18, 8, 1),(18, 9, 1),(18, 13, 1),(18, 14, 1),(18, 15, 1),(18, 17, 1),(18, 18, 1),(18, 19, 1),(18, 20, 1),(18, 21, 1),(18, 22, 1),(18, 23, 1),(18, 24, 1),(18, 25, 1),(18, 27, 1),(18, 29, 1),(19, 1, 1),(19, 7, 1),(19, 14, 1),(19, 19, 1),(19, 20, 1),(20, 1, 1),(20, 3, 1),(20, 4, 1),(20, 7, 1),(20, 8, 1),(20, 9, 1),(20, 13, 1),(20, 14, 1),(20, 17, 1),(20, 18, 1),(20, 19, 1),(20, 20, 1),(20, 21, 1),(20, 22, 1),(20, 23, 1),(20, 24, 1),(20, 25, 1),(20, 27, 1),(20, 29, 1),(20, 15, 0),(21, 1, 1),(21, 3, 1),(21, 4, 1),(21, 5, 1),(21, 6, 1),(21, 7, 1),(21, 8, 1),(21, 9, 1),(21, 11, 1),(21, 13, 1),(21, 14, 1),(21, 15, 1),(21, 16, 1),(21, 17, 1),(21, 18, 1),(21, 19, 1),(21, 20, 1),(21, 21, 1),(21, 22, 1),(21, 23, 1),(21, 24, 1),(21, 25, 1),(21, 27, 1),(21, 29, 1),(21, 30, 1),(22, 1, 1),(22, 4, 1),(22, 7, 1),(22, 8, 1),(22, 9, 1),(22, 13, 1),(22, 14, 1),(22, 15, 1),(22, 16, 1),(22, 17, 1),(22, 18, 1),(22, 19, 1),(22, 20, 1),(22, 21, 1),(22, 22, 1),(22, 23, 1),(22, 24, 1),(22, 25, 1),(22, 27, 1),(22, 29, 1),(1, 132, 1),(1, 123, 1),(1, 124, 1),(1, 125, 1),(1, 126, 1),(1, 127, 1),(1, 128, 1),(1, 129, 1),(4, 132, 1),(4, 123, 1),(4, 124, 1),(4, 125, 1),(4, 126, 1),(4, 127, 1),(4, 128, 1),(4, 129, 1),(5, 134, 1),(6, 134, 1),(7, 134, 1),(8, 134, 0),(9, 134, 1);

# Table: phpbb_acl_users
DROP TABLE IF EXISTS phpbb_acl_users;
CREATE TABLE `phpbb_acl_users` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL default '0',
  `auth_setting` tinyint(2) NOT NULL default '0',
  KEY `user_id` (`user_id`),
  KEY `auth_option_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_acl_users (user_id, forum_id, auth_option_id, auth_role_id, auth_setting) VALUES (2, 0, 0, 5, 0);

# Table: phpbb_ads
DROP TABLE IF EXISTS phpbb_ads;
CREATE TABLE `phpbb_ads` (
  `ad_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ad_name` varchar(255) collate utf8_bin NOT NULL default '',
  `ad_code` text collate utf8_bin NOT NULL,
  `ad_views` mediumint(8) unsigned NOT NULL default '0',
  `ad_priority` tinyint(1) NOT NULL default '5',
  `ad_enabled` tinyint(1) unsigned NOT NULL default '1',
  `all_forums` tinyint(1) unsigned NOT NULL default '0',
  `ad_clicks` mediumint(8) unsigned NOT NULL default '0',
  `ad_note` mediumtext collate utf8_bin NOT NULL,
  `ad_time` int(11) unsigned NOT NULL default '0',
  `ad_time_end` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_ads_forums
DROP TABLE IF EXISTS phpbb_ads_forums;
CREATE TABLE `phpbb_ads_forums` (
  `ad_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  KEY `ad_forum` (`ad_id`,`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_ads_groups
DROP TABLE IF EXISTS phpbb_ads_groups;
CREATE TABLE `phpbb_ads_groups` (
  `ad_id` mediumint(8) unsigned NOT NULL default '0',
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  KEY `ad_group` (`ad_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_ads_in_positions
DROP TABLE IF EXISTS phpbb_ads_in_positions;
CREATE TABLE `phpbb_ads_in_positions` (
  `ad_id` mediumint(8) unsigned NOT NULL default '0',
  `position_id` mediumint(8) unsigned NOT NULL default '0',
  `ad_priority` tinyint(1) NOT NULL default '5',
  `ad_enabled` tinyint(1) unsigned NOT NULL default '1',
  `all_forums` tinyint(1) unsigned NOT NULL default '0',
  KEY `ad_position` (`ad_id`,`position_id`),
  KEY `ad_priority` (`ad_priority`),
  KEY `ad_enabled` (`ad_enabled`),
  KEY `all_forums` (`all_forums`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_ads_positions
DROP TABLE IF EXISTS phpbb_ads_positions;
CREATE TABLE `phpbb_ads_positions` (
  `position_id` mediumint(8) unsigned NOT NULL auto_increment,
  `lang_key` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`position_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_ads_positions (position_id, lang_key) VALUES (1, 'ABOVE_HEADER'),(2, 'BELOW_HEADER'),(3, 'ABOVE_POSTS'),(4, 'BELOW_POSTS'),(5, 'AFTER_FIRST_POST'),(6, 'AFTER_EVERY_POST'),(7, 'ABOVE_FOOTER'),(8, 'BELOW_FOOTER');

# Table: phpbb_announcement_centre
DROP TABLE IF EXISTS phpbb_announcement_centre;
CREATE TABLE `phpbb_announcement_centre` (
  `announcement_show` tinyint(1) NOT NULL,
  `announcement_enable` tinyint(1) NOT NULL,
  `announcement_enable_guests` tinyint(1) NOT NULL,
  `announcement_show_birthdays` tinyint(1) NOT NULL,
  `announcement_birthday_avatar` tinyint(1) NOT NULL,
  `announcement_draft` text collate utf8_bin NOT NULL,
  `announcement_text` text collate utf8_bin NOT NULL,
  `announcement_text_guests` text collate utf8_bin NOT NULL,
  `announcement_title` varchar(255) collate utf8_bin NOT NULL default '',
  `announcement_title_guests` varchar(255) collate utf8_bin NOT NULL default '',
  `announcement_show_group` varchar(255) collate utf8_bin NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_announcement_centre (announcement_show, announcement_enable, announcement_enable_guests, announcement_show_birthdays, announcement_birthday_avatar, announcement_draft, announcement_text, announcement_text_guests, announcement_title, announcement_title_guests, announcement_show_group) VALUES (0, 1, 1, 0, 0, '[b][color=#0000FF]Test Announcements[/color][/b]  Testing Forum announcements  :geek:', '[b][color=#0000FF]Test Announcements[/color][/b]  Testing Forum announcements  :geek:', '[b][color=#0000FF]Test Announcements[/color][/b]  Testing Forum announcements  :geek:', 'Site Announcements', 'Guest Announcements', '2');

# Table: phpbb_arcade_access
DROP TABLE IF EXISTS phpbb_arcade_access;
CREATE TABLE `phpbb_arcade_access` (
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `session_id` char(32) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`cat_id`,`user_id`,`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_arcade_categories
DROP TABLE IF EXISTS phpbb_arcade_categories;
CREATE TABLE `phpbb_arcade_categories` (
  `cat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent_id` mediumint(8) unsigned NOT NULL default '0',
  `left_id` mediumint(8) unsigned NOT NULL default '0',
  `right_id` mediumint(8) unsigned NOT NULL default '0',
  `cat_parents` mediumtext collate utf8_bin NOT NULL,
  `cat_name` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_desc` text collate utf8_bin NOT NULL,
  `cat_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_desc_options` int(11) unsigned NOT NULL default '7',
  `cat_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `cat_link` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_password` varchar(40) collate utf8_bin NOT NULL default '',
  `cat_style` smallint(4) unsigned NOT NULL default '0',
  `cat_display` smallint(4) unsigned NOT NULL default '0',
  `cat_image` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_rules` text collate utf8_bin NOT NULL,
  `cat_rules_link` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_rules_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_rules_options` int(11) unsigned NOT NULL default '7',
  `cat_rules_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `cat_games_per_page` tinyint(4) NOT NULL default '0',
  `cat_type` tinyint(4) NOT NULL default '0',
  `cat_status` tinyint(4) NOT NULL default '0',
  `cat_games` mediumint(8) unsigned NOT NULL default '0',
  `cat_plays` mediumint(8) unsigned NOT NULL default '0',
  `cat_last_play_game_id` mediumint(8) unsigned NOT NULL default '0',
  `cat_last_play_game_name` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_last_play_user_id` mediumint(8) unsigned NOT NULL default '0',
  `cat_last_play_score` decimal(25,3) NOT NULL default '0.000',
  `cat_last_play_time` int(11) unsigned NOT NULL default '0',
  `cat_last_game_installdate` int(11) unsigned NOT NULL default '0',
  `cat_last_play_username` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_last_play_user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `cat_flags` tinyint(4) NOT NULL default '32',
  `display_on_index` tinyint(1) unsigned NOT NULL default '1',
  `cat_download` tinyint(1) NOT NULL default '1',
  `display_subcat_list` tinyint(1) unsigned NOT NULL default '1',
  `cat_cost` decimal(15,3) NOT NULL default '0.000',
  `cat_reward` decimal(15,3) NOT NULL default '0.000',
  `cat_use_jackpot` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`cat_id`),
  KEY `left_right_id` (`left_id`,`right_id`),
  KEY `cat_lastplay_game_id` (`cat_last_play_game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_arcade_categories (cat_id, parent_id, left_id, right_id, cat_parents, cat_name, cat_desc, cat_desc_bitfield, cat_desc_options, cat_desc_uid, cat_link, cat_password, cat_style, cat_display, cat_image, cat_rules, cat_rules_link, cat_rules_bitfield, cat_rules_options, cat_rules_uid, cat_games_per_page, cat_type, cat_status, cat_games, cat_plays, cat_last_play_game_id, cat_last_play_game_name, cat_last_play_user_id, cat_last_play_score, cat_last_play_time, cat_last_game_installdate, cat_last_play_username, cat_last_play_user_colour, cat_flags, display_on_index, cat_download, display_subcat_list, cat_cost, cat_reward, cat_use_jackpot) VALUES (1, 0, 1, 2, '', 'Driving', 'Driving Games', '', 7, '', '', '', 0, 0, '', '', '', '', 7, '', 0, 1, 0, 1, 4, 1, 'Auto Bahn', 2, 97.000, 1225666583, 1202851916, 'admin', 'AA0000', 0, 0, 1, 1, 0.000, 0.000, 1);

# Table: phpbb_arcade_config
DROP TABLE IF EXISTS phpbb_arcade_config;
CREATE TABLE `phpbb_arcade_config` (
  `config_name` varchar(255) collate utf8_bin NOT NULL default '',
  `config_value` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_arcade_config (config_name, config_value) VALUES ('acp_items_per_page', '10'),('arcade_leaders', '5'),('cat_image_path', 'arcade/images/cats/'),('copyright', 'Powered by phpBB Arcade &copy; 2008 <a href=\"http://www.jeffrusso.net\">JRSweets</a>'),('flash_version', '8'),('game_path', 'arcade/games/'),('unpack_game_path', 'arcade/install/'),('games_per_page', '10'),('games_sort_order', 'n'),('games_sort_dir', 'a'),('image_path', 'arcade/images/'),('latest_highscores', '5'),('least_popular', '5'),('limit_play', '0'),('limit_play_days', '7'),('limit_play_posts', '10'),('longest_held_scores', '5'),('most_popular', '5'),('new_games_delay', '5'),('newest_games', '10'),('pm_message', '***MESSAGE GENERATED FROM ARCADE***\n\nYou lost your score in [game_link].  [user_link] recieved a score of [b][new_score][/b] which defeated your old score of [b][old_score][/b].\n\nYou can view your arcade statistics by clicking [old_user_link].'),('pm_subject', 'You lost your trophy in [game_name] to [new_username]...'),('send_arcade_pm', '1'),('stat_items_per_page', '10'),('version', '1.0.RC5'),('protect_amod', '1'),('protect_ibpro', '1'),('protect_v3arcade', '1'),('game_scores', '5'),('parse_bbcode', '1'),('parse_smilies', '1'),('parse_links', '1'),('game_width', '0'),('game_height', '0'),('played_games', '1'),('played_colour', 'cdcdcd'),('online_time', '0'),('announce_game', '0'),('announce_forum', '0'),('announce_subject', '[GAME RELEASE] [game_name]'),('announce_message', '[game_image]\n[b]Game Name:[/b] [game_name]\n[b]Game Description:[/b] [game_desc]\n\n[game_link]\n[download_link]\n[stats_link]'),('arcade_leaders_header', '3'),('resolution_select', '1'),('display_desc', '1'),('arcade_disable', '0'),('arcade_disable_msg', ''),('cache_time', '4'),('welcome_index', '1'),('search_index', '1'),('links_index', '1'),('welcome_cats', '1'),('search_cats', '1'),('links_cats', '1'),('welcome_stats', '1'),('search_stats', '1'),('links_stats', '1'),('most_downloaded', '5'),('least_downloaded', '5'),('limit_play_total_posts', '5'),('display_viewtopic', '1'),('display_memberlist', '1'),('game_cost', '5'),('game_reward', '10'),('use_jackpot', '0'),('jackpot_limit', '0'),('use_points', '0'),('cm_currency_id', '0'),('game_autosize', '0'),('jackpot_minimum', '0'),('auto_disable', '0'),('auto_disable_start', ''),('auto_disable_end', ''),('download_list_message', ''),('download_list_per_page', '50'),('game_zero_negative_score', '0'),('override_user_sort', '0');

# Table: phpbb_arcade_download
DROP TABLE IF EXISTS phpbb_arcade_download;
CREATE TABLE `phpbb_arcade_download` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `total` mediumint(8) unsigned NOT NULL default '0',
  `download_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_arcade_errors
DROP TABLE IF EXISTS phpbb_arcade_errors;
CREATE TABLE `phpbb_arcade_errors` (
  `error_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `score` decimal(25,3) NOT NULL default '0.000',
  `error_date` int(11) unsigned NOT NULL default '0',
  `error_type` tinyint(1) NOT NULL default '0',
  `game_type` tinyint(1) NOT NULL default '0',
  `submitted_game_type` tinyint(1) NOT NULL default '0',
  `played_time` int(11) NOT NULL default '0',
  `error_ip` varchar(40) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`error_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_arcade_favorites
DROP TABLE IF EXISTS phpbb_arcade_favorites;
CREATE TABLE `phpbb_arcade_favorites` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_arcade_game_rating
DROP TABLE IF EXISTS phpbb_arcade_game_rating;
CREATE TABLE `phpbb_arcade_game_rating` (
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_rating` mediumint(8) unsigned NOT NULL default '0',
  `rating_date` int(11) unsigned NOT NULL default '0',
  `user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`game_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_arcade_game_rating (game_id, user_id, game_rating, rating_date, user_ip) VALUES (1, 2, 4, 1225666588, '81.141.32.156');

# Table: phpbb_arcade_games
DROP TABLE IF EXISTS phpbb_arcade_games;
CREATE TABLE `phpbb_arcade_games` (
  `game_id` mediumint(8) unsigned NOT NULL auto_increment,
  `game_image` varchar(255) collate utf8_bin NOT NULL default '',
  `game_desc` text collate utf8_bin NOT NULL,
  `game_highscore` decimal(25,3) NOT NULL default '0.000',
  `game_highdate` int(11) unsigned NOT NULL default '0',
  `game_highuser` mediumint(8) unsigned NOT NULL default '0',
  `game_files` mediumtext collate utf8_bin NOT NULL,
  `game_name` varchar(255) collate utf8_bin NOT NULL default '',
  `game_swf` varchar(255) collate utf8_bin NOT NULL default '',
  `game_scorevar` varchar(255) collate utf8_bin NOT NULL default '',
  `game_type` tinyint(1) NOT NULL default '0',
  `game_width` int(5) unsigned NOT NULL default '550',
  `game_height` int(5) unsigned NOT NULL default '380',
  `game_installdate` int(11) unsigned NOT NULL default '0',
  `game_scoretype` tinyint(1) NOT NULL default '0',
  `game_order` mediumint(8) unsigned NOT NULL default '0',
  `game_plays` mediumint(8) unsigned NOT NULL default '0',
  `game_votetotal` mediumint(8) unsigned NOT NULL default '0',
  `game_votesum` mediumint(8) unsigned NOT NULL default '0',
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `game_download` tinyint(1) NOT NULL default '1',
  `game_download_total` mediumint(8) unsigned NOT NULL default '0',
  `game_name_clean` varchar(255) collate utf8_bin NOT NULL default '',
  `game_filesize` int(20) unsigned NOT NULL default '0',
  `game_cost` decimal(15,3) NOT NULL default '0.000',
  `game_reward` decimal(15,3) NOT NULL default '0.000',
  `game_jackpot` decimal(15,3) NOT NULL default '0.000',
  `game_use_jackpot` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_arcade_games (game_id, game_image, game_desc, game_highscore, game_highdate, game_highuser, game_files, game_name, game_swf, game_scorevar, game_type, game_width, game_height, game_installdate, game_scoretype, game_order, game_plays, game_votetotal, game_votesum, cat_id, game_download, game_download_total, game_name_clean, game_filesize, game_cost, game_reward, game_jackpot, game_use_jackpot) VALUES (1, 'autobahn.gif', 'Driving Game - For more game downloads for your phpBB3 Arcade, visit http://www.modphpbb3.com', 1807.000, 1214237948, 2, '', 'Auto Bahn', 'autobahn.swf', 'autobahn', 3, 550, 400, 1202851916, 0, 10, 4, 1, 4, 1, 1, 0, 'auto bahn', 85559, 0.000, 0.000, 0.000, 1);

# Table: phpbb_arcade_reports
DROP TABLE IF EXISTS phpbb_arcade_reports;
CREATE TABLE `phpbb_arcade_reports` (
  `report_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `report_type` tinyint(1) NOT NULL default '0',
  `report_desc` text collate utf8_bin NOT NULL,
  `report_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `report_desc_options` int(11) unsigned NOT NULL default '7',
  `report_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `report_time` int(11) NOT NULL default '0',
  `report_ip` varchar(40) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_arcade_scores
DROP TABLE IF EXISTS phpbb_arcade_scores;
CREATE TABLE `phpbb_arcade_scores` (
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `score` decimal(25,3) NOT NULL default '0.000',
  `comment_text` mediumtext collate utf8_bin NOT NULL,
  `comment_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `comment_options` int(11) unsigned NOT NULL default '7',
  `comment_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `score_date` int(11) unsigned NOT NULL default '0',
  `total_time` int(11) unsigned NOT NULL default '0',
  `total_plays` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`game_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_arcade_scores (game_id, user_id, score, comment_text, comment_bitfield, comment_options, comment_uid, score_date, total_time, total_plays) VALUES (1, 2, 1807.000, '', '', 7, '', 1214237948, 139, 4);

# Table: phpbb_arcade_sessions
DROP TABLE IF EXISTS phpbb_arcade_sessions;
CREATE TABLE `phpbb_arcade_sessions` (
  `session_id` char(32) collate utf8_bin NOT NULL default '',
  `game_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `game_type` tinyint(1) NOT NULL default '0',
  `randchar1` varchar(30) collate utf8_bin NOT NULL default '',
  `randchar2` varchar(30) collate utf8_bin NOT NULL default '',
  `randgid1` varchar(30) collate utf8_bin NOT NULL default '',
  `randgid2` varchar(30) collate utf8_bin NOT NULL default '',
  `start_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_attachments
DROP TABLE IF EXISTS phpbb_attachments;
CREATE TABLE `phpbb_attachments` (
  `attach_id` mediumint(8) unsigned NOT NULL auto_increment,
  `post_msg_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `in_message` tinyint(1) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) unsigned NOT NULL default '0',
  `is_orphan` tinyint(1) unsigned NOT NULL default '1',
  `physical_filename` varchar(255) collate utf8_bin NOT NULL default '',
  `real_filename` varchar(255) collate utf8_bin NOT NULL default '',
  `download_count` mediumint(8) unsigned NOT NULL default '0',
  `attach_comment` text collate utf8_bin NOT NULL,
  `extension` varchar(100) collate utf8_bin NOT NULL default '',
  `mimetype` varchar(100) collate utf8_bin NOT NULL default '',
  `filesize` int(20) unsigned NOT NULL default '0',
  `filetime` int(11) unsigned NOT NULL default '0',
  `thumbnail` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`attach_id`),
  KEY `filetime` (`filetime`),
  KEY `post_msg_id` (`post_msg_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `is_orphan` (`is_orphan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_attachments (attach_id, post_msg_id, topic_id, in_message, poster_id, is_orphan, physical_filename, real_filename, download_count, attach_comment, extension, mimetype, filesize, filetime, thumbnail) VALUES (1, 18, 6, 0, 2, 0, '2_ae4e29b41fd26d4d92090787ca5cc70f', 'Jesus_Saves.jpg', 10, '', 'jpg', 'image/jpeg', 37730, 1214492211, 1),(2, 19, 6, 0, 2, 0, '2_da03cdd2d4752b3af38db4635182d1ef', 'Fishing.jpg', 8, 'File comment is added here', 'jpg', 'image/jpeg', 50355, 1214492366, 1);

# Table: phpbb_banlist
DROP TABLE IF EXISTS phpbb_banlist;
CREATE TABLE `phpbb_banlist` (
  `ban_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ban_userid` mediumint(8) unsigned NOT NULL default '0',
  `ban_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `ban_email` varchar(100) collate utf8_bin NOT NULL default '',
  `ban_start` int(11) unsigned NOT NULL default '0',
  `ban_end` int(11) unsigned NOT NULL default '0',
  `ban_exclude` tinyint(1) unsigned NOT NULL default '0',
  `ban_reason` varchar(255) collate utf8_bin NOT NULL default '',
  `ban_give_reason` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`ban_id`),
  KEY `ban_end` (`ban_end`),
  KEY `ban_user` (`ban_userid`,`ban_exclude`),
  KEY `ban_email` (`ban_email`,`ban_exclude`),
  KEY `ban_ip` (`ban_ip`,`ban_exclude`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_bbcodes
DROP TABLE IF EXISTS phpbb_bbcodes;
CREATE TABLE `phpbb_bbcodes` (
  `bbcode_id` tinyint(3) NOT NULL default '0',
  `bbcode_tag` varchar(16) collate utf8_bin NOT NULL default '',
  `bbcode_helpline` varchar(255) collate utf8_bin NOT NULL default '',
  `display_on_posting` tinyint(1) unsigned NOT NULL default '0',
  `bbcode_match` text collate utf8_bin NOT NULL,
  `bbcode_tpl` mediumtext collate utf8_bin NOT NULL,
  `first_pass_match` mediumtext collate utf8_bin NOT NULL,
  `first_pass_replace` mediumtext collate utf8_bin NOT NULL,
  `second_pass_match` mediumtext collate utf8_bin NOT NULL,
  `second_pass_replace` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`bbcode_id`),
  KEY `display_on_post` (`display_on_posting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_bbcodes (bbcode_id, bbcode_tag, bbcode_helpline, display_on_posting, bbcode_match, bbcode_tpl, first_pass_match, first_pass_replace, second_pass_match, second_pass_replace) VALUES (14, 'center', 'Centre', 1, '[center]{TEXT}[/center]', '<div align=\"center\">{TEXT}</div>', '!\\[center\\](.*?)\\[/center\\]!ies', '\'[center:$uid]\'.str_replace(array(\"\\r\\n\", \'\\\"\', \'\\\'\', \'(\', \')\'), array(\"\\n\", \'\"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/center:$uid]\'', '!\\[center:$uid\\](.*?)\\[/center:$uid\\]!s', '<div align=\"center\">${1}</div>'),(15, 'move', 'Marquee', 1, '[move]{TEXT}[/move]', '<marquee>{TEXT}</marquee>', '!\\[move\\](.*?)\\[/move\\]!ies', '\'[move:$uid]\'.str_replace(array(\"\\r\\n\", \'\\\"\', \'\\\'\', \'(\', \')\'), array(\"\\n\", \'\"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/move:$uid]\'', '!\\[move:$uid\\](.*?)\\[/move:$uid\\]!s', '<marquee>${1}</marquee>'),(16, 'spoiler', 'Spoiler Text', 1, '[spoiler]{TEXT}[/spoiler]', '<div style=\"margin:20px; margin-top:5px\"><div class=\"quotetitle\"><b>Spoiler:</b> <input type=\"button\" value=\"Show\" style=\"width:45px;font-size:10px;margin:0px;padding:0px;\" onclick=\"if (this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display != \'\') { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'\';      this.innerText = \'\'; this.value = \'Hide\'; } else { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'none\'; this.innerText = \'\'; this.value = \'Show\'; }\" /></div><div class=\"quotecontent\"><div style=\"display: none;\">{TEXT}</div></div></div>', '!\\[spoiler\\](.*?)\\[/spoiler\\]!ies', '\'[spoiler:$uid]\'.str_replace(array(\"\\r\\n\", \'\\\"\', \'\\\'\', \'(\', \')\'), array(\"\\n\", \'\"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/spoiler:$uid]\'', '!\\[spoiler:$uid\\](.*?)\\[/spoiler:$uid\\]!s', '<div style=\"margin:20px; margin-top:5px\"><div class=\"quotetitle\"><b>Spoiler:</b> <input type=\"button\" value=\"Show\" style=\"width:45px;font-size:10px;margin:0px;padding:0px;\" onclick=\"if (this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display != \'\') { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'\';      this.innerText = \'\'; this.value = \'Hide\'; } else { this.parentNode.parentNode.getElementsByTagName(\'div\')[1].getElementsByTagName(\'div\')[0].style.display = \'none\'; this.innerText = \'\'; this.value = \'Show\'; }\" /></div><div class=\"quotecontent\"><div style=\"display: none;\">${1}</div></div></div>'),(17, 'st', 'Strike through Text', 1, '[st]{TEXT}[/st]', '<strike>{TEXT}</strike>', '!\\[st\\](.*?)\\[/st\\]!ies', '\'[st:$uid]\'.str_replace(array(\"\\r\\n\", \'\\\"\', \'\\\'\', \'(\', \')\'), array(\"\\n\", \'\"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/st:$uid]\'', '!\\[st:$uid\\](.*?)\\[/st:$uid\\]!s', '<strike>${1}</strike>'),(18, 'youtube', 'Youtube', 1, '[youtube]http://www.youtube.com/watch?v={SIMPLETEXT}[/youtube]', '<object width=\"425\" height=\"350\"><param name=\"movie\" value=\"http://www.youtube.com/v/{SIMPLETEXT}\"></param><param name=\"wmode\" value=\"transparent\"></param><embed src=\"http://www.youtube.com/v/{SIMPLETEXT}\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"350\"></embed></object>', '!\\[youtube\\]http\\://www\\.youtube\\.com/watch\\?v\\=([a-zA-Z0-9-+.,_ ]+)\\[/youtube\\]!i', '[youtube:$uid]http://www.youtube.com/watch?v=${1}[/youtube:$uid]', '!\\[youtube:$uid\\]http\\://www\\.youtube\\.com/watch\\?v\\=([a-zA-Z0-9-+.,_ ]+)\\[/youtube:$uid\\]!s', '<object width=\"425\" height=\"350\"><param name=\"movie\" value=\"http://www.youtube.com/v/${1}\"></param><param name=\"wmode\" value=\"transparent\"></param><embed src=\"http://www.youtube.com/v/${1}\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"350\"></embed></object>'),(19, 'album', '', 1, '[album]{NUMBER}[/album]', '<a class=\"highslide\" onclick=\"return hs.expand(this)\" href=\"http://www.modphpbb3.com/newversion/gallery/image.php?image_id={NUMBER}\"><img src=\"http://www.modphpbb3.com/newversion/gallery/thumbnail.php?image_id={NUMBER}\" alt=\"{NUMBER}\" /></a><br /><a href=\"http://www.modphpbb3.com/newversion/gallery/image_page.php?image_id={NUMBER}\">{NUMBER}</a>', '!\\[album\\]([0-9]+)\\[/album\\]!i', '[album:$uid]${1}[/album:$uid]', '!\\[album:$uid\\]([0-9]+)\\[/album:$uid\\]!s', '<a class=\"highslide\" onclick=\"return hs.expand(this)\" href=\"http://www.modphpbb3.com/newversion/gallery/image.php?image_id=${1}\"><img src=\"http://www.modphpbb3.com/newversion/gallery/thumbnail.php?image_id=${1}\" alt=\"${1}\" /></a><br /><a href=\"http://www.modphpbb3.com/newversion/gallery/image_page.php?image_id=${1}\">${1}</a>'),(20, 'HSimg', '[HSimg]Insert image link[/HSimg]', 1, '[HSimg]{URL}[/HSimg]', '<a class=\"highslide\" href=\"{URL}\" onclick=\"return hs.expand(this, { align: \'center\' })\"><img style=\"max-width:250px;\" src=\"{URL}\" alt=\"\" /></a><div id=\"controlbar\" class=\"highslide-overlay controlbar\">\n      <a href=\"#\" class=\"previous\" onclick=\"return hs.previous(this)\" title=\"Previous\"></a>\n      <a href=\"#\" class=\"next\" onclick=\"return hs.next(this)\" title=\"Next\"></a>\n      <a href=\"#\" class=\"highslide-move\" onclick=\"return false\" title=\"Move\"></a>\n      <a href=\"#\" class=\"close\" onclick=\"return hs.close(this)\" title=\"Close\"></a></div>', '!\\[hsimg\\](?:([a-z][a-z\\d+\\-.]*:/{2}(?:(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})+|[0-9.]+|\\[[a-z0-9.]+:[a-z0-9.]+:[a-z0-9.:]+\\])(?::\\d*)?(?:/(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?)|(www\\.(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})+(?::\\d*)?(?:/(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?))\\[/hsimg\\]!ie', '\'[hsimg:$uid]\'.$this->bbcode_specialchars((\'${1}\') ? \'${1}\' : \'http://${2}\').\'[/hsimg:$uid]\'', '!\\[hsimg:$uid\\](?i)((?:[a-z][a-z\\d+\\-.]*:/{2}(?:(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})+|[0-9.]+|\\[[a-z0-9.]+:[a-z0-9.]+:[a-z0-9.:]+\\])(?::\\d*)?(?:/(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?)|(?:www\\.(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})+(?::\\d*)?(?:/(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@|]+|%[\\dA-F]{2})*)*(?:\\?(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?(?:#(?:[a-z0-9\\-._~\\!$&\'()*+,;=:@/?|]+|%[\\dA-F]{2})*)?))(?-i)\\[/hsimg:$uid\\]!s', '<a class=\"highslide\" href=\"${1}\" onclick=\"return hs.expand(this, { align: \'center\' })\"><img style=\"max-width:250px;\" src=\"${1}\" alt=\"\" /></a><div id=\"controlbar\" class=\"highslide-overlay controlbar\">\n      <a href=\"#\" class=\"previous\" onclick=\"return hs.previous(this)\" title=\"Previous\"></a>\n      <a href=\"#\" class=\"next\" onclick=\"return hs.next(this)\" title=\"Next\"></a>\n      <a href=\"#\" class=\"highslide-move\" onclick=\"return false\" title=\"Move\"></a>\n      <a href=\"#\" class=\"close\" onclick=\"return hs.close(this)\" title=\"Close\"></a></div>');

# Table: phpbb_bookmarks
DROP TABLE IF EXISTS phpbb_bookmarks;
CREATE TABLE `phpbb_bookmarks` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topic_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_bots
DROP TABLE IF EXISTS phpbb_bots;
CREATE TABLE `phpbb_bots` (
  `bot_id` mediumint(8) unsigned NOT NULL auto_increment,
  `bot_active` tinyint(1) unsigned NOT NULL default '1',
  `bot_name` varchar(255) collate utf8_bin NOT NULL default '',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `bot_agent` varchar(255) collate utf8_bin NOT NULL default '',
  `bot_ip` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`bot_id`),
  KEY `bot_active` (`bot_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_bots (bot_id, bot_active, bot_name, user_id, bot_agent, bot_ip) VALUES (1, 1, 'AdsBot [Google]', 3, 'AdsBot-Google', ''),(2, 1, 'Alexa [Bot]', 4, 'ia_archiver', ''),(3, 1, 'Alta Vista [Bot]', 5, 'Scooter/', ''),(4, 1, 'Ask Jeeves [Bot]', 6, 'Ask Jeeves', ''),(5, 1, 'Baidu [Spider]', 7, 'Baiduspider+(', ''),(6, 1, 'Exabot [Bot]', 8, 'Exabot/', ''),(7, 1, 'FAST Enterprise [Crawler]', 9, 'FAST Enterprise Crawler', ''),(8, 1, 'FAST WebCrawler [Crawler]', 10, 'FAST-WebCrawler/', ''),(9, 1, 'Francis [Bot]', 11, 'http://www.neomo.de/', ''),(10, 1, 'Gigabot [Bot]', 12, 'Gigabot/', ''),(11, 1, 'Google Adsense [Bot]', 13, 'Mediapartners-Google', ''),(12, 1, 'Google Desktop', 14, 'Google Desktop', ''),(13, 1, 'Google Feedfetcher', 15, 'Feedfetcher-Google', ''),(14, 1, 'Google [Bot]', 16, 'Googlebot', ''),(15, 1, 'Heise IT-Markt [Crawler]', 17, 'heise-IT-Markt-Crawler', ''),(16, 1, 'Heritrix [Crawler]', 18, 'heritrix/1.', ''),(17, 1, 'IBM Research [Bot]', 19, 'ibm.com/cs/crawler', ''),(18, 1, 'ICCrawler - ICjobs', 20, 'ICCrawler - ICjobs', ''),(19, 1, 'ichiro [Crawler]', 21, 'ichiro/2', ''),(20, 1, 'Majestic-12 [Bot]', 22, 'MJ12bot/', ''),(21, 1, 'Metager [Bot]', 23, 'MetagerBot/', ''),(22, 1, 'MSN NewsBlogs', 24, 'msnbot-NewsBlogs/', ''),(23, 1, 'MSN [Bot]', 25, 'msnbot/', ''),(24, 1, 'MSNbot Media', 26, 'msnbot-media/', ''),(25, 1, 'NG-Search [Bot]', 27, 'NG-Search/', ''),(26, 1, 'Nutch [Bot]', 28, 'http://lucene.apache.org/nutch/', ''),(27, 1, 'Nutch/CVS [Bot]', 29, 'NutchCVS/', ''),(28, 1, 'OmniExplorer [Bot]', 30, 'OmniExplorer_Bot/', ''),(29, 1, 'Online link [Validator]', 31, 'online link validator', ''),(30, 1, 'psbot [Picsearch]', 32, 'psbot/0', ''),(31, 1, 'Seekport [Bot]', 33, 'Seekbot/', ''),(32, 1, 'Sensis [Crawler]', 34, 'Sensis Web Crawler', ''),(33, 1, 'SEO Crawler', 35, 'SEO search Crawler/', ''),(34, 1, 'Seoma [Crawler]', 36, 'Seoma [SEO Crawler]', ''),(35, 1, 'SEOSearch [Crawler]', 37, 'SEOsearch/', ''),(36, 1, 'Snappy [Bot]', 38, 'Snappy/1.1 ( http://www.urltrends.com/ )', ''),(37, 1, 'Steeler [Crawler]', 39, 'http://www.tkl.iis.u-tokyo.ac.jp/~crawler/', ''),(38, 1, 'Synoo [Bot]', 40, 'SynooBot/', ''),(39, 1, 'Telekom [Bot]', 41, 'crawleradmin.t-info@telekom.de', ''),(40, 1, 'TurnitinBot [Bot]', 42, 'TurnitinBot/', ''),(41, 1, 'Voyager [Bot]', 43, 'voyager/1.0', ''),(42, 1, 'W3 [Sitesearch]', 44, 'W3 SiteSearch Crawler', ''),(43, 1, 'W3C [Linkcheck]', 45, 'W3C-checklink/', ''),(44, 1, 'W3C [Validator]', 46, 'W3C_*Validator', ''),(45, 1, 'WiseNut [Bot]', 47, 'http://www.WISEnutbot.com', ''),(46, 1, 'YaCy [Bot]', 48, 'yacybot', ''),(47, 1, 'Yahoo MMCrawler [Bot]', 49, 'Yahoo-MMCrawler/', ''),(48, 1, 'Yahoo Slurp [Bot]', 50, 'Yahoo! DE Slurp', ''),(49, 1, 'Yahoo [Bot]', 51, 'Yahoo! Slurp', ''),(50, 1, 'YahooSeeker [Bot]', 52, 'YahooSeeker/', ''),(51, 1, 'Twiceler [Bot]', 55, 'Twiceler', ''),(52, 1, 'Voila [Bot]', 56, 'VoilaBot', ''),(53, 1, 'Omgili [Bot]', 57, 'omgilibot', ''),(54, 1, 'Noxtrum [Bot]', 58, 'noxtrumbot', ''),(55, 1, 'Spinn3r [Bot]', 59, 'Spinn3r', ''),(56, 1, 'Furl [Bot]', 60, 'FurlBot', ''),(57, 1, 'CommonCrawl [Bot]', 61, 'CCBot', ''),(58, 1, 'Naver [Bot]', 62, 'Yeti', ''),(59, 1, 'BDProtect [Bot]', 63, 'BPImageWalker', ''),(60, 1, 'Snap Shots [Bot]', 64, 'Snapbot', ''),(61, 1, 'Whitevector [Bot]', 65, 'Whitevector Crawler', ''),(62, 1, 'Hatena Antenna [Bot]', 66, 'Hatena Antenna', ''),(63, 1, 'Snap Shots Preview [Bot]', 67, 'SnapPreviewBot', ''),(64, 1, 'Ilse [Bot]', 68, 'IlseBot', ''),(65, 1, 'ImageShack [Bot]', 69, 'ImageShack Image Fetcher', ''),(66, 1, 'Entireweb [Bot]', 70, 'Speedy Spider', ''),(67, 1, 'Yandex [Bot]', 71, 'Yandex', ''),(68, 1, 'WebCorp [Bot]', 72, 'WebCorp', ''),(69, 1, 'WebAlta [Bot]', 73, 'WebAlta', ''),(70, 1, 'Powerset [Bot]', 74, 'zermelo', ''),(71, 1, 'Boston Project [SpamBot]', 75, 'Boston Project', ''),(72, 1, 'Startpagina [Bot]', 76, 'Startpagina', ''),(73, 1, 'Heeii [Bot]', 77, 'Heeii', ''),(74, 1, 'Wget [SpamBot]', 78, 'Wget', ''),(75, 1, 'Yodao [Bot]', 79, 'YodaoBot', ''),(76, 1, 'vBSEO [Bot]', 80, 'vBSEO', ''),(77, 1, 'WiseGuys [Bot]', 81, 'Vagabondo', ''),(78, 1, 'Searchme [Bot]', 82, 'Charlotte', ''),(79, 1, 'Exalead [Bot]', 83, 'Exabot', ''),(80, 1, 'Yahoo Search Marketing [Bot]', 84, 'YahooYSMcm', ''),(81, 1, 'Daum [Bot]', 85, 'Daumoa', ''),(82, 1, 'webcollage [Bot]', 86, 'webcollage', ''),(83, 1, 'Babaloo [Bot]', 87, 'BabalooSpider', ''),(84, 1, 'Keywen Encyclopedia [Bot]', 88, 'KeywenBot', ''),(85, 1, 'Facebook [Bot]', 89, 'facebookexternalhit', '');

# Table: phpbb_chat
DROP TABLE IF EXISTS phpbb_chat;
CREATE TABLE `phpbb_chat` (
  `message_id` int(11) unsigned NOT NULL auto_increment,
  `chat_id` int(11) unsigned NOT NULL default '0',
  `user_id` int(11) unsigned NOT NULL default '0',
  `username` varchar(255) collate utf8_bin NOT NULL default '',
  `user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `message` text collate utf8_bin NOT NULL,
  `bbcode_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `bbcode_uid` varchar(5) collate utf8_bin NOT NULL default '',
  `bbcode_options` tinyint(1) unsigned NOT NULL default '7',
  `time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_chat (message_id, chat_id, user_id, username, user_colour, message, bbcode_bitfield, bbcode_uid, bbcode_options, time) VALUES (3, 1, 2, 'admin', 'AA0000', 'test', '', '', 7, 1202819920),(5, 1, 2, 'admin', 'AA0000', 'test', '', '', 7, 1214329130);

# Table: phpbb_chat_sessions
DROP TABLE IF EXISTS phpbb_chat_sessions;
CREATE TABLE `phpbb_chat_sessions` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) collate utf8_bin NOT NULL default '',
  `user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `user_login` int(11) unsigned NOT NULL default '0',
  `user_firstpost` int(11) unsigned NOT NULL default '0',
  `user_lastpost` int(11) unsigned NOT NULL default '0',
  `user_lastupdate` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_chat_sessions (user_id, username, user_colour, user_login, user_firstpost, user_lastpost, user_lastupdate) VALUES (2, 'admin', 'AA0000', 1229708078, 0, 0, 1229708078);

# Table: phpbb_config
DROP TABLE IF EXISTS phpbb_config;
CREATE TABLE `phpbb_config` (
  `config_name` varchar(255) collate utf8_bin NOT NULL default '',
  `config_value` varchar(255) collate utf8_bin NOT NULL default '',
  `is_dynamic` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`config_name`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_config (config_name, config_value, is_dynamic) VALUES ('active_sessions', '0', 0),('allow_attachments', '1', 0),('allow_autologin', '1', 0),('allow_avatar_local', '1', 0),('allow_avatar_remote', '1', 0),('allow_avatar_upload', '1', 0),('allow_bbcode', '1', 0),('allow_birthdays', '1', 0),('allow_bookmarks', '1', 0),('allow_emailreuse', '0', 0),('allow_forum_notify', '1', 0),('allow_mass_pm', '1', 0),('allow_name_chars', 'USERNAME_CHARS_ANY', 0),('allow_namechange', '0', 0),('allow_nocensors', '0', 0),('allow_pm_attach', '0', 0),('allow_post_flash', '0', 0),('allow_post_links', '1', 0),('allow_privmsg', '1', 0),('allow_sig', '1', 0),('allow_sig_bbcode', '1', 0),('allow_sig_flash', '0', 0),('allow_sig_img', '1', 0),('allow_sig_links', '1', 0),('allow_sig_pm', '1', 0),('allow_sig_smilies', '1', 0),('allow_smilies', '1', 0),('allow_topic_notify', '1', 0),('attachment_quota', '52428800', 0),('auth_bbcode_pm', '1', 0),('auth_flash_pm', '0', 0),('auth_img_pm', '1', 0),('auth_method', 'db', 0),('auth_smilies_pm', '1', 0),('avatar_filesize', '60144', 0),('avatar_gallery_path', 'images/avatars/gallery', 0),('avatar_max_height', '120', 0),('avatar_max_width', '120', 0),('avatar_min_height', '100', 0),('avatar_min_width', '100', 0),('avatar_path', 'images/avatars/upload', 0),('avatar_salt', '71bcffbdf49f207978ca5a9c4e356460', 0),('board_contact', 'info@modphpbb3.com', 0),('board_disable', '0', 0),('board_disable_msg', '', 0),('board_dst', '1', 0),('board_email', 'info@modphpbb3.com', 0),('board_email_form', '0', 0),('board_email_sig', 'Thanks, The Management', 0),('board_hide_emails', '1', 0),('board_timezone', '0', 0),('browser_check', '1', 0),('bump_interval', '10', 0),('bump_type', 'd', 0),('cache_gc', '7200', 0),('captcha_gd', '1', 0),('captcha_gd_foreground_noise', '0', 0),('captcha_gd_x_grid', '25', 0),('captcha_gd_y_grid', '25', 0),('check_dnsbl', '0', 0),('chg_passforce', '0', 0),('cookie_domain', '.modphpbb3.com', 0),('cookie_name', 'phpbb3_cybis', 0),('cookie_path', '/', 0),('cookie_secure', '0', 0),('coppa_enable', '0', 0),('coppa_fax', '', 0),('coppa_mail', '', 0),('database_gc', '604800', 0),('default_dateformat', 'D M d, Y g:i a', 0),('default_style', '1', 0),('display_last_edited', '1', 0),('display_order', '0', 0),('edit_time', '0', 0),('email_check_mx', '1', 0),('email_enable', '1', 0),('email_function_name', 'mail', 0),('email_package_size', '50', 0),('enable_confirm', '1', 0),('enable_pm_icons', '1', 0),('enable_post_confirm', '1', 0),('flood_interval', '15', 0),('force_server_vars', '0', 0),('form_token_lifetime', '7200', 0),('form_token_mintime', '0', 0),('form_token_sid_guests', '1', 0),('forward_pm', '1', 0),('forwarded_for_check', '0', 0),('full_folder_action', '2', 0),('fulltext_mysql_max_word_len', '254', 0),('fulltext_mysql_min_word_len', '4', 0),('fulltext_native_common_thres', '5', 0),('fulltext_native_load_upd', '1', 0),('fulltext_native_max_chars', '14', 0),('fulltext_native_min_chars', '3', 0),('gzip_compress', '0', 0),('hot_threshold', '25', 0),('icons_path', 'images/icons', 0),('img_create_thumbnail', '1', 0),('img_display_inlined', '1', 0),('img_imagick', '/usr/bin/', 0),('img_link_height', '0', 0),('img_link_width', '0', 0),('img_max_height', '0', 0),('img_max_thumb_width', '150', 0),('img_max_width', '0', 0),('img_min_thumb_filesize', '2', 0),('ip_check', '3', 0),('jab_enable', '0', 0),('jab_host', '', 0),('jab_password', '', 0),('jab_package_size', '20', 0),('jab_port', '5222', 0),('jab_use_ssl', '0', 0),('jab_username', '', 0),('ldap_base_dn', '', 0),('ldap_email', '', 0),('ldap_password', '', 0),('ldap_port', '', 0),('ldap_server', '', 0),('ldap_uid', '', 0),('ldap_user', '', 0),('ldap_user_filter', '', 0),('limit_load', '0', 0),('limit_search_load', '0', 0),('load_anon_lastread', '0', 0),('load_birthdays', '1', 0),('load_cpf_memberlist', '0', 0),('load_cpf_viewprofile', '0', 0),('load_cpf_viewtopic', '0', 0),('load_db_lastread', '1', 0),('load_db_track', '1', 0),('load_jumpbox', '1', 0),('load_moderators', '0', 0),('load_online', '1', 0),('load_online_guests', '1', 0),('load_online_time', '5', 0),('load_onlinetrack', '1', 0),('load_search', '1', 0),('load_tplcompile', '1', 0),('load_user_activity', '1', 0),('max_attachments', '3', 0),('max_attachments_pm', '1', 0),('max_autologin_time', '0', 0),('max_filesize', '2097152', 0),('max_filesize_pm', '262144', 0),('max_login_attempts', '3', 0),('max_name_chars', '20', 0),('max_pass_chars', '30', 0),('max_poll_options', '10', 0),('max_post_chars', '0', 0),('max_post_font_size', '200', 0),('max_post_img_height', '0', 0),('max_post_img_width', '0', 0),('max_post_smilies', '0', 0),('max_post_urls', '0', 0),('max_quote_depth', '3', 0),('max_reg_attempts', '5', 0),('max_sig_chars', '255', 0),('max_sig_font_size', '200', 0),('max_sig_img_height', '0', 0),('max_sig_img_width', '0', 0),('max_sig_smilies', '0', 0),('max_sig_urls', '5', 0),('min_name_chars', '3', 0),('min_pass_chars', '6', 0),('min_search_author_chars', '3', 0),('min_time_reg', '0', 0),('min_time_terms', '0', 0),('override_user_style', '0', 0),('pass_complex', 'PASS_TYPE_ANY', 0),('pm_edit_time', '0', 0),('pm_max_boxes', '4', 0),('pm_max_msgs', '50', 0),('posts_per_page', '10', 0),('print_pm', '1', 0),('queue_interval', '600', 0),('ranks_path', 'images/ranks', 0),('require_activation', '0', 0),('script_path', '/newversion', 0),('search_block_size', '250', 0),('search_gc', '7200', 0),('search_indexing_state', '', 0),('search_interval', '0', 0),('search_anonymous_interval', '0', 0),('search_type', 'fulltext_native', 0),('search_store_results', '1800', 0),('secure_allow_deny', '1', 0),('secure_allow_empty_referer', '1', 0),('secure_downloads', '0', 0),('server_name', 'www.modphpbb3.com', 0),('server_port', '80', 0),('server_protocol', 'http://', 0),('session_gc', '3600', 0),('session_length', '3600', 0),('site_desc', 'ModphpBB3 Version 1.0.5 Beta Dec 08', 0),('sitename', 'Your new ModphpBB3 Forum', 0),('smilies_path', 'images/smilies', 0),('smtp_auth_method', 'PLAIN', 0),('smtp_delivery', '0', 0),('smtp_host', '', 0),('smtp_password', '', 0),('smtp_port', '25', 0),('smtp_username', '', 0),('topics_per_page', '25', 0),('tpl_allow_php', '0', 0),('upload_icons_path', 'images/upload_icons', 0),('upload_path', 'files', 0),('version', '3.0.4', 0),('warnings_expire_days', '90', 0),('warnings_gc', '14400', 0),('cache_last_gc', '1229705334', 1),('cron_lock', '0', 1),('database_last_gc', '1229207872', 1),('last_queue_run', '1214353425', 1),('newest_user_colour', '', 1),('newest_user_id', '54', 1),('newest_username', 'test', 1),('num_files', '2', 1),('num_posts', '5', 1),('num_topics', '4', 1),('num_users', '2', 1),('rand_seed', '38509affb1bdf5c127f7ab7ee77ce58b', 1),('rand_seed_last_update', '1229708513', 1),('record_online_date', '1201468375', 1),('record_online_users', '3', 1),('search_last_gc', '1229705358', 1),('session_last_gc', '1229705425', 1),('upload_dir_size', '88085', 1),('warnings_last_gc', '1229705349', 1),('board_startdate', '1201111192', 0),('default_lang', 'en', 0),('wpm_enable', '1', 0),('wpm_send_id', '2', 0),('wpm_subject', 'Welcome', 0),('wpm_message', 'Welcome {USERNAME}\n\nMay we welcome you to {SITE_NAME}\n\nThis is the demo of Welcome PM on First Login, to edit this go to admin-general-Board configuration\nYour user id must match that of the database, in this case admin is 2\n\nCheers', 0),('wpm_preview', '', 0),('wpm_variables', '', 0),('wwh_record_ips', '3', 1),('wwh_record_time', '1201468375', 1),('wwh_disp_bots', '1', 0),('wwh_disp_guests', '1', 0),('wwh_disp_time', '2', 0),('wwh_version', '1', 0),('wwh_del_time', '86400', 0),('wwh_sort_by', '3', 0),('wwh_record', '1', 0),('wwh_reset_time', '1', 0),('wwh_mod_version', '6.0.4', 0),('quick_reply_enabled', '2', 0),('quick_reply_visible', '2', 0),('quick_reply_guests', '0', 0),('quick_reply_memory', '1', 0),('quick_reply_options', '1', 0),('quick_reply_subject', '0', 0),('quick_reply_bbcodes', '0', 0),('quick_reply_smilies', '0', 0),('contact_enable', '1', 0),('contact_confirm', '1', 0),('contact_confirm_guests', '1', 0),('contact_max_attempts', '0', 0),('contact_method', '0', 0),('contact_reasons', '', 0),('contact_bot_user', '2', 0),('contact_bot_forum', '1', 0),('contact_version', '0.1.4', 0),('allow_birthdays_ahead', '365', 0),('add_user_version', '1.0.1', 0),('user_reminder_last_auto_run', '0', 0),('user_reminder_ignore_no_email', '0', 0),('user_reminder_delete_choice', '1', 0),('user_reminder_zero_poster_enable', '1', 0),('user_reminder_zero_poster_days', '15', 0),('user_reminder_inactive_enable', '1', 0),('user_reminder_inactive_days', '60', 0),('user_reminder_inactive_still_enable', '1', 0),('user_reminder_inactive_still_days', '30', 0),('user_reminder_not_logged_in_enable', '1', 0),('user_reminder_not_logged_in_days', '20', 0),('user_reminder_enable', '0', 0),('user_reminder_protected_users', '', 0),('user_reminder_inactive_still_opt_zero', '1', 0),('user_reminder_inactive_still_opt_inactive', '1', 0),('user_reminder_inactive_still_opt_not_logged_in', '1', 0),('amount_top_posters', '5', 0),('top_posters_hours', '24', 0),('top_posters_excl_adm', '0', 0),('top_posters_excl_mod', '0', 0),('top_posters_excl_ids', '', 0),('top_posters_excl_hours', '0', 0),('birthday_emails', '1', 0),('birthday_run', '', 0),('log_new_user', '1', 0),('description_word_count', '150', 0),('use_dynamic_description', '1', 0),('append_keywords_first', '1', 0),('global_keywords', 'replace, these, keywords, with your own, keywords', 0),('append_global_keywords', '1', 0),('keyword_word_count', '50', 0),('use_dynamic_keywords', '1', 0),('check_attachment_content', '1', 0),('allow_ban_list', '2', 0),('load_userid_viewtopic', '1', 0),('num_images', '4', 1),('gallery_total_images', '1', 0),('gallery_user_images_profil', '1', 0),('gallery_personal_album_profil', '1', 0),('ads_enable', '1', 0),('ads_rules_forums', '1', 0),('ads_rules_groups', '1', 0),('ads_version', '1.0.6', 0),('ads_count_clicks', '1', 0),('ads_count_views', '1', 0),('ads_accurate_views', '0', 0),('ads_last_cron', '1229705331', 1),('flags_path', 'images/flags', 0),('enable_queue_trigger', '0', 0),('queue_trigger_posts', '3', 0),('pm_max_recipients', '0', 0),('dbms_version', '', 0),('require_flag', '1', 0),('favorites_flist_length', '10', 0),('favorites_add_button_pos', '1', 0);

# Table: phpbb_confirm
DROP TABLE IF EXISTS phpbb_confirm;
CREATE TABLE `phpbb_confirm` (
  `confirm_id` char(32) collate utf8_bin NOT NULL default '',
  `session_id` char(32) collate utf8_bin NOT NULL default '',
  `confirm_type` tinyint(3) NOT NULL default '0',
  `code` varchar(8) collate utf8_bin NOT NULL default '',
  `seed` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`session_id`,`confirm_id`),
  KEY `confirm_type` (`confirm_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_disallow
DROP TABLE IF EXISTS phpbb_disallow;
CREATE TABLE `phpbb_disallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL auto_increment,
  `disallow_username` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`disallow_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_drafts
DROP TABLE IF EXISTS phpbb_drafts;
CREATE TABLE `phpbb_drafts` (
  `draft_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `save_time` int(11) unsigned NOT NULL default '0',
  `draft_subject` varchar(255) collate utf8_bin NOT NULL default '',
  `draft_message` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`draft_id`),
  KEY `save_time` (`save_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_extension_groups
DROP TABLE IF EXISTS phpbb_extension_groups;
CREATE TABLE `phpbb_extension_groups` (
  `group_id` mediumint(8) unsigned NOT NULL auto_increment,
  `group_name` varchar(255) collate utf8_bin NOT NULL default '',
  `cat_id` tinyint(2) NOT NULL default '0',
  `allow_group` tinyint(1) unsigned NOT NULL default '0',
  `download_mode` tinyint(1) unsigned NOT NULL default '1',
  `upload_icon` varchar(255) collate utf8_bin NOT NULL default '',
  `max_filesize` int(20) unsigned NOT NULL default '0',
  `allowed_forums` text collate utf8_bin NOT NULL,
  `allow_in_pm` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, allowed_forums, allow_in_pm) VALUES (1, 'Images', 1, 1, 1, '', 0, '', 0),(2, 'Archives', 0, 1, 1, '', 0, '', 0),(3, 'Plain Text', 0, 0, 1, '', 0, '', 0),(4, 'Documents', 0, 0, 1, '', 0, '', 0),(5, 'Real Media', 3, 0, 1, '', 0, '', 0),(6, 'Windows Media', 2, 0, 1, '', 0, '', 0),(7, 'Flash Files', 5, 0, 1, '', 0, '', 0),(8, 'Quicktime Media', 6, 0, 1, '', 0, '', 0),(9, 'Downloadable Files', 0, 0, 1, '', 0, '', 0);

# Table: phpbb_extensions
DROP TABLE IF EXISTS phpbb_extensions;
CREATE TABLE `phpbb_extensions` (
  `extension_id` mediumint(8) unsigned NOT NULL auto_increment,
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `extension` varchar(100) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`extension_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_extensions (extension_id, group_id, extension) VALUES (1, 1, 'gif'),(2, 1, 'png'),(3, 1, 'jpeg'),(4, 1, 'jpg'),(5, 1, 'tif'),(6, 1, 'tiff'),(7, 1, 'tga'),(8, 2, 'gtar'),(9, 2, 'gz'),(10, 2, 'tar'),(11, 2, 'zip'),(12, 2, 'rar'),(13, 2, 'ace'),(14, 2, 'torrent'),(15, 2, 'tgz'),(16, 2, 'bz2'),(17, 2, '7z'),(18, 3, 'txt'),(19, 3, 'c'),(20, 3, 'h'),(21, 3, 'cpp'),(22, 3, 'hpp'),(23, 3, 'diz'),(24, 3, 'csv'),(25, 3, 'ini'),(26, 3, 'log'),(27, 3, 'js'),(28, 3, 'xml'),(29, 4, 'xls'),(30, 4, 'xlsx'),(31, 4, 'xlsm'),(32, 4, 'xlsb'),(33, 4, 'doc'),(34, 4, 'docx'),(35, 4, 'docm'),(36, 4, 'dot'),(37, 4, 'dotx'),(38, 4, 'dotm'),(39, 4, 'pdf'),(40, 4, 'ai'),(41, 4, 'ps'),(42, 4, 'ppt'),(43, 4, 'pptx'),(44, 4, 'pptm'),(45, 4, 'odg'),(46, 4, 'odp'),(47, 4, 'ods'),(48, 4, 'odt'),(49, 4, 'rtf'),(50, 5, 'rm'),(51, 5, 'ram'),(52, 6, 'wma'),(53, 6, 'wmv'),(54, 7, 'swf'),(55, 8, 'mov'),(56, 8, 'm4v'),(57, 8, 'm4a'),(58, 8, 'mp4'),(59, 8, '3gp'),(60, 8, '3g2'),(61, 8, 'qt'),(62, 9, 'mpeg'),(63, 9, 'mpg'),(64, 9, 'mp3'),(65, 9, 'ogg'),(66, 9, 'ogm');

# Table: phpbb_favorites_category
DROP TABLE IF EXISTS phpbb_favorites_category;
CREATE TABLE `phpbb_favorites_category` (
  `category_id` mediumint(8) unsigned NOT NULL auto_increment,
  `category_name` varchar(255) character set utf8 collate utf8_bin NOT NULL default 'New Category',
  `category_order` mediumint(8) unsigned NOT NULL default '0',
  `category_active` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`category_id`),
  KEY `category_order` (`category_order`),
  KEY `category_name` (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO phpbb_favorites_category (category_id, category_name, category_order, category_active) VALUES (1, 'Music', 1, 1),(2, 'Films', 2, 1),(3, 'TV', 3, 1);

# Table: phpbb_favorites_special
DROP TABLE IF EXISTS phpbb_favorites_special;
CREATE TABLE `phpbb_favorites_special` (
  `type` tinyint(4) unsigned NOT NULL default '0',
  `category_id` mediumint(8) unsigned NOT NULL default '0',
  `listitem_id` mediumint(8) unsigned NOT NULL default '0',
  `listitem_text` varchar(255) NOT NULL,
  `listitem_url` varchar(255) NOT NULL,
  `listitem_count` mediumint(8) NOT NULL,
  PRIMARY KEY  (`type`,`category_id`,`listitem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO phpbb_favorites_special (type, category_id, listitem_id, listitem_text, listitem_url, listitem_count) VALUES (0, 1, 1, 'Muse', '', 1),(0, 2, 1, 'The Dark Knight', '', 1),(0, 3, 1, 'Mock the Week', '', 1);

# Table: phpbb_favorites_user
DROP TABLE IF EXISTS phpbb_favorites_user;
CREATE TABLE `phpbb_favorites_user` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `category_id` mediumint(8) unsigned NOT NULL default '0',
  `listitem_id` mediumint(8) unsigned NOT NULL default '0',
  `listitem_text` varchar(255) NOT NULL,
  `listitem_url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`,`category_id`,`listitem_id`,`listitem_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO phpbb_favorites_user (user_id, category_id, listitem_id, listitem_text, listitem_url) VALUES (2, 1, 1, 'Muse', ''),(2, 2, 1, 'The Dark Knight', ''),(2, 3, 1, 'Mock the Week', '');

# Table: phpbb_flags
DROP TABLE IF EXISTS phpbb_flags;
CREATE TABLE `phpbb_flags` (
  `flag_id` mediumint(8) unsigned NOT NULL auto_increment,
  `flag_country` varchar(255) collate utf8_bin NOT NULL default '',
  `flag_code` varchar(2) collate utf8_bin NOT NULL default '',
  `flag_image` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`flag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_flags (flag_id, flag_country, flag_code, flag_image) VALUES (1, 'Afghanistan', 'af', 'af.png'),(2, 'Aland Islands', 'ax', 'ax.png'),(3, 'Albania', 'al', 'al.png'),(4, 'Algeria', 'dz', 'dz.png'),(5, 'American Samoa', 'as', 'as.png'),(6, 'Andorra', 'ad', 'ad.png'),(7, 'Angola', 'ao', 'ao.png'),(8, 'Anguilla', 'ai', 'ai.png'),(9, 'Antarctica', 'aq', 'aq.png'),(10, 'Antigua and Barbuda', 'ag', 'ag.png'),(11, 'Argentina', 'ar', 'ar.png'),(12, 'Armenia', 'am', 'am.png'),(13, 'Aruba', 'aw', 'aw.png'),(14, 'Ascension Island', 'ac', 'ac.png'),(15, 'Australia', 'au', 'au.png'),(16, 'Austria', 'at', 'at.png'),(17, 'Azerbaijan', 'az', 'az.png'),(18, 'Bahamas', 'bs', 'bs.png'),(19, 'Bahrain', 'bh', 'bh.png'),(20, 'Bangladesh', 'bd', 'bd.png'),(21, 'Barbados', 'bb', 'bb.png'),(22, 'Belarus', 'by', 'by.png'),(23, 'Belgium', 'be', 'be.png'),(24, 'Belize', 'bz', 'bz.png'),(25, 'Benin', 'bj', 'bj.png'),(26, 'Bermuda', 'bm', 'bm.png'),(27, 'Bhutan', 'bt', 'bt.png'),(28, 'Bolivia', 'bo', 'bo.png'),(29, 'Bosnia and Herzegowina', 'ba', 'ba.png'),(30, 'Botswana', 'bw', 'bw.png'),(31, 'Bouvet Island', 'bv', 'bv.png'),(32, 'Brazil', 'br', 'br.png'),(33, 'British Indian Ocean Territory', 'io', 'io.png'),(34, 'Brunei', 'bn', 'bn.png'),(35, 'Bulgaria', 'bg', 'bg.png'),(36, 'Burkina Faso', 'bf', 'bf.png'),(37, 'Burundi', 'bi', 'bi.png'),(38, 'Cambodia', 'kh', 'kh.png'),(39, 'Cameroon', 'cm', 'cm.png'),(40, 'Canada', 'ca', 'ca.png'),(41, 'Cape Verde', 'cv', 'cv.png'),(42, 'Cayman Islands', 'ky', 'ky.png'),(43, 'Central African Republic', 'cf', 'cf.png'),(44, 'Chad', 'td', 'td.png'),(45, 'Chile', 'cl', 'cl.png'),(46, 'China', 'cn', 'cn.png'),(47, 'Christmas Island', 'cx', 'cx.png'),(48, 'Cocos (Keeling) Islands', 'cc', 'cc.png'),(49, 'Colombia', 'co', 'co.png'),(50, 'Comoros', 'km', 'km.png'),(51, 'Congo', 'cg', 'cg.png'),(52, 'Congo, Democratic Republic of', 'cd', 'cd.png'),(53, 'Cook Islands', 'ck', 'ck.png'),(54, 'Costa Rica', 'cr', 'cr.png'),(55, 'Cote d\'Ivoire', 'ci', 'ci.png'),(56, 'Croatia', 'hr', 'hr.png'),(57, 'Cuba', 'cu', 'cu.png'),(58, 'Cyprus', 'cy', 'cy.png'),(59, 'Czech Republic', 'cz', 'cz.png'),(60, 'Denmark', 'dk', 'dk.png'),(61, 'Djibouti', 'dj', 'dj.png'),(62, 'Dominica', 'dm', 'dm.png'),(63, 'Dominican Republic', 'do', 'do.png'),(64, 'Ecuador', 'ec', 'ec.png'),(65, 'Egypt', 'eg', 'eg.png'),(66, 'El Salvador', 'sv', 'sv.png'),(67, 'Equatorial Guinea', 'gq', 'gq.png'),(68, 'Eritrea', 'er', 'er.png'),(69, 'Estonia', 'ee', 'ee.png'),(70, 'Ethiopia', 'et', 'et.png'),(71, 'Falkland Islands', 'fk', 'fk.png'),(72, 'Faroe Islands', 'fo', 'fo.png'),(73, 'Fiji', 'fj', 'fj.png'),(74, 'Finland', 'fi', 'fi.png'),(75, 'France', 'fr', 'fr.png'),(76, 'French Guiana', 'gf', 'gf.png'),(77, 'French Polynesia', 'pf', 'pf.png'),(78, 'French Southern Territories', 'tf', 'tf.png'),(79, 'Gabon', 'ga', 'ga.png'),(80, 'Gambia', 'gm', 'gm.png'),(81, 'Georgia', 'ge', 'ge.png'),(82, 'Germany', 'de', 'de.png'),(83, 'Ghana', 'gh', 'gh.png'),(84, 'Gibraltar', 'gi', 'gi.png'),(85, 'Greece', 'gr', 'gr.png'),(86, 'Greenland', 'gl', 'gl.png'),(87, 'Grenada', 'gd', 'gd.png'),(88, 'Guadeloupe', 'gp', 'gp.png'),(89, 'Guam', 'gu', 'gu.png'),(90, 'Guatemala', 'gt', 'gt.png'),(91, 'Guernsey', 'gg', 'gg.png'),(92, 'Guinea', 'gn', 'gn.png'),(93, 'Guinea-Bissau', 'gw', 'gw.png'),(94, 'Guyana', 'gy', 'gy.png'),(95, 'Haiti', 'ht', 'ht.png'),(96, 'Heard Island and McDonald Islands', 'hm', 'hm.png'),(97, 'Holy See (Vatican City State)', 'va', 'va.png'),(98, 'Honduras', 'hn', 'hn.png'),(99, 'Hong Kong', 'hk', 'hk.png'),(100, 'Hungary', 'hu', 'hu.png'),(101, 'Iceland', 'is', 'is.png'),(102, 'India', 'in', 'in.png'),(103, 'Indonesia', 'id', 'id.png'),(104, 'Iran', 'ir', 'ir.png'),(105, 'Iraq', 'iq', 'iq.png'),(106, 'Ireland', 'ie', 'ie.png'),(107, 'Isle of Man', 'im', 'im.png'),(108, 'Israel', 'il', 'il.png'),(109, 'Italy', 'it', 'it.png'),(110, 'Jamaica', 'jm', 'jm.png'),(111, 'Japan', 'jp', 'jp.png'),(112, 'Jersey', 'je', 'je.png'),(113, 'Jordan', 'jo', 'jo.png'),(114, 'Kazakhstan', 'kz', 'kz.png'),(115, 'Kenya', 'ke', 'ke.png'),(116, 'Kiribati', 'ki', 'ki.png'),(117, 'Korea, Democratic People\'s Republic of', 'kp', 'kp.png'),(118, 'Korea, Republic of', 'kr', 'kr.png'),(119, 'Kuwait', 'kw', 'kw.png'),(120, 'Kyrgyzstan', 'kg', 'kg.png'),(121, 'Laos', 'la', 'la.png'),(122, 'Latvia', 'lv', 'lv.png'),(123, 'Lebanon', 'lb', 'lb.png'),(124, 'Lesotho', 'ls', 'ls.png'),(125, 'Liberia', 'lr', 'lr.png'),(126, 'Libyan Arab Jamahiriya', 'ly', 'ly.png'),(127, 'Liechtenstein', 'li', 'li.png'),(128, 'Lithuania', 'lt', 'lt.png'),(129, 'Luxembourg', 'lu', 'lu.png'),(130, 'Macao', 'mo', 'mo.png'),(131, 'Macedonia', 'mk', 'mk.png'),(132, 'Madagascar', 'mg', 'mg.png'),(133, 'Malawi', 'mw', 'mw.png'),(134, 'Malaysia', 'my', 'my.png'),(135, 'Maldives', 'mv', 'mv.png'),(136, 'Mali', 'ml', 'ml.png'),(137, 'Malta', 'mt', 'mt.png'),(138, 'Marshall Island', 'mh', 'mh.png'),(139, 'Martinique', 'mq', 'mq.png'),(140, 'Mauritania', 'mr', 'mr.png'),(141, 'Mauritius', 'mu', 'mu.png'),(142, 'Mayotte', 'yt', 'yt.png'),(143, 'Mexico', 'mx', 'mx.png'),(144, 'Micronesia', 'fm', 'fm.png'),(145, 'Moldova', 'md', 'md.png'),(146, 'Monaco', 'mc', 'mc.png'),(147, 'Mongolia', 'mn', 'mn.png'),(148, 'Montenegro', 'me', 'me.png'),(149, 'Montserrat', 'ms', 'ms.png'),(150, 'Morocco', 'ma', 'ma.png'),(151, 'Mozambique', 'mz', 'mz.png'),(152, 'Myanmar', 'mm', 'mm.png'),(153, 'Namibia', 'na', 'na.png'),(154, 'Nauru', 'nr', 'nr.png'),(155, 'Nepal', 'np', 'np.png'),(156, 'Netherlands', 'nl', 'nl.png'),(157, 'Netherlands Antilles', 'an', 'an.png'),(158, 'New Caledonia', 'nc', 'nc.png'),(159, 'New Zealand', 'nz', 'nz.png'),(160, 'Nicaragua', 'ni', 'ni.png'),(161, 'Niger', 'ne', 'ne.png'),(162, 'Nigeria', 'ng', 'ng.png'),(163, 'Niue', 'nu', 'nu.png'),(164, 'Norfolk Island', 'nf', 'nf.png'),(165, 'Northern Mariana Islands', 'mp', 'mp.png'),(166, 'Norway', 'no', 'no.png'),(167, 'Oman', 'om', 'om.png'),(168, 'Pakistan', 'pk', 'pk.png'),(169, 'Palau', 'pw', 'pw.png'),(170, 'Palestine', 'ps', 'ps.png'),(171, 'Panama', 'pa', 'pa.png'),(172, 'Papua New Guinea', 'pg', 'pg.png'),(173, 'Paraguay', 'py', 'py.png'),(174, 'Peru', 'pe', 'pe.png'),(175, 'Philippines', 'ph', 'ph.png'),(176, 'Pitcairn', 'pn', 'pn.png'),(177, 'Poland', 'pl', 'pl.png'),(178, 'Portugal', 'pt', 'pt.png'),(179, 'Puerto Rico', 'pr', 'pr.png'),(180, 'Qatar', 'qa', 'qa.png'),(181, 'Reunion', 're', 're.png'),(182, 'Romania', 'ro', 'ro.png'),(183, 'Russia', 'ru', 'ru.png'),(184, 'Rwanda', 'rw', 'rw.png'),(185, 'Saint Helena', 'sh', 'sh.png'),(186, 'Saint Kitts and Nevis', 'kn', 'kn.png'),(187, 'Saint Lucia', 'lc', 'lc.png'),(188, 'Saint Pierre and Miquelon', 'pm', 'pm.png'),(189, 'Saint Vincent and the Grenadines', 'vc', 'vc.png'),(190, 'Samoa', 'ws', 'ws.png'),(191, 'San Marino', 'sm', 'sm.png'),(192, 'Sao Tome and Principe', 'st', 'st.png'),(193, 'Saudi Arabia', 'sa', 'sa.png'),(194, 'Senegal', 'sn', 'sn.png'),(195, 'Serbia', 'rs', 'rs.png'),(196, 'Seychelles', 'sc', 'sc.png'),(197, 'Sierra Leone', 'sl', 'sl.png'),(198, 'Singapore', 'sg', 'sg.png'),(199, 'Slovakia', 'sk', 'sk.png'),(200, 'Slovenia', 'si', 'si.png'),(201, 'Slomon Islands', 'sb', 'sb.png'),(202, 'Somalia', 'so', 'so.png'),(203, 'South Africa', 'za', 'za.png'),(204, 'South Georgia and the South Sandwich Islands', 'gs', 'gs.png'),(205, 'Spain', 'es', 'es.png'),(206, 'Sri Lanka', 'lk', 'lk.png'),(207, 'Sudan', 'sd', 'sd.png'),(208, 'Suriname', 'sr', 'sr.png'),(209, 'Svalbard and Jan Mayen', 'sj', 'sj.png'),(210, 'Swaziland', 'sz', 'sz.png'),(211, 'Sweden', 'se', 'se.png'),(212, 'Switzerland', 'ch', 'ch.png'),(213, 'Syria', 'sy', 'sy.png'),(214, 'Taiwan', 'tw', 'tw.png'),(215, 'Tajikistan', 'tj', 'tj.png'),(216, 'Tanzania', 'tz', 'tz.png'),(217, 'Thailand', 'th', 'th.png'),(218, 'Timor-Leste', 'tl', 'tl.png'),(219, 'Togo', 'tg', 'tg.png'),(220, 'Tokelau', 'tk', 'tk.png'),(221, 'Tonga', 'to', 'to.png'),(222, 'Trinidad and Tobago', 'tt', 'tt.png'),(223, 'Tunisia', 'tn', 'tn.png'),(224, 'Turkey', 'tr', 'tr.png'),(225, 'Turkmenistan', 'tm', 'tm.png'),(226, 'Turks and Caicos Islands', 'tc', 'tc.png'),(227, 'Tuvalu', 'tv', 'tv.png'),(228, 'Uganda', 'ug', 'ug.png'),(229, 'Ukraine', 'ua', 'ua.png'),(230, 'United Arab Emirates', 'ae', 'ae.png'),(231, 'United Kingdom', 'uk', 'uk.png'),(232, 'United States', 'us', 'us.png'),(233, 'United States Minor Outlying Islands', 'um', 'um.png'),(234, 'Uruguay', 'uy', 'uy.png'),(235, 'Uzbekistan', 'uz', 'uz.png'),(236, 'Vanuatu', 'vu', 'vu.png'),(237, 'Venezuela', 've', 've.png'),(238, 'Vietnam', 'vn', 'vn.png'),(239, 'Virgin Islands (British)', 'vg', 'vg.png'),(240, 'Virgin Islands (US)', 'vi', 'vi.png'),(241, 'Wallis and Futuna', 'wf', 'wf.png'),(242, 'Western Sahara', 'eh', 'eh.png'),(243, 'Yemen', 'ye', 'ye.png'),(244, 'Zambia', 'zm', 'zm.png'),(245, 'Zimbabwe', 'zw', 'zw.png');

# Table: phpbb_forums
DROP TABLE IF EXISTS phpbb_forums;
CREATE TABLE `phpbb_forums` (
  `forum_id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent_id` mediumint(8) unsigned NOT NULL default '0',
  `left_id` mediumint(8) unsigned NOT NULL default '0',
  `right_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_parents` mediumtext collate utf8_bin NOT NULL,
  `forum_name` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_desc` text collate utf8_bin NOT NULL,
  `forum_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_desc_options` int(11) unsigned NOT NULL default '7',
  `forum_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `forum_link` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_password` varchar(40) collate utf8_bin NOT NULL default '',
  `forum_style` smallint(4) unsigned NOT NULL default '0',
  `forum_image` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_rules` text collate utf8_bin NOT NULL,
  `forum_rules_link` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_rules_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_rules_options` int(11) unsigned NOT NULL default '7',
  `forum_rules_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `forum_topics_per_page` tinyint(4) NOT NULL default '0',
  `forum_type` tinyint(4) NOT NULL default '0',
  `forum_status` tinyint(4) NOT NULL default '0',
  `forum_posts` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics_real` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_poster_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_subject` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_last_post_time` int(11) unsigned NOT NULL default '0',
  `forum_last_poster_name` varchar(255) collate utf8_bin NOT NULL default '',
  `forum_last_poster_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `forum_flags` tinyint(4) NOT NULL default '32',
  `display_on_index` tinyint(1) unsigned NOT NULL default '1',
  `enable_indexing` tinyint(1) unsigned NOT NULL default '1',
  `enable_icons` tinyint(1) unsigned NOT NULL default '1',
  `enable_prune` tinyint(1) unsigned NOT NULL default '0',
  `prune_next` int(11) unsigned NOT NULL default '0',
  `prune_days` mediumint(8) unsigned NOT NULL default '0',
  `prune_viewed` mediumint(8) unsigned NOT NULL default '0',
  `prune_freq` mediumint(8) unsigned NOT NULL default '0',
  `display_subforum_list` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`forum_id`),
  KEY `left_right_id` (`left_id`,`right_id`),
  KEY `forum_lastpost_id` (`forum_last_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_forums (forum_id, parent_id, left_id, right_id, forum_parents, forum_name, forum_desc, forum_desc_bitfield, forum_desc_options, forum_desc_uid, forum_link, forum_password, forum_style, forum_image, forum_rules, forum_rules_link, forum_rules_bitfield, forum_rules_options, forum_rules_uid, forum_topics_per_page, forum_type, forum_status, forum_posts, forum_topics, forum_topics_real, forum_last_post_id, forum_last_poster_id, forum_last_post_subject, forum_last_post_time, forum_last_poster_name, forum_last_poster_colour, forum_flags, display_on_index, enable_indexing, enable_icons, enable_prune, prune_next, prune_days, prune_viewed, prune_freq, display_subforum_list) VALUES (1, 0, 1, 4, '', 'Testing Forum', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 0, 0, 1, 1, 1, 1, 2, '', 1201111192, 'admin', 'AA0000', 32, 1, 1, 1, 0, 0, 0, 0, 0, 1),(2, 1, 2, 3, 'a:1:{i:1;a:2:{i:0;s:13:\"Testing Forum\";i:1;i:0;}}', 'Test Forum', 'Forum Testing', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 5, 4, 4, 28, 2, 'Modfication List', 1225015363, 'admin', 'AA0000', 32, 1, 1, 1, 0, 0, 0, 0, 0, 1);

# Table: phpbb_forums_access
DROP TABLE IF EXISTS phpbb_forums_access;
CREATE TABLE `phpbb_forums_access` (
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `session_id` char(32) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`forum_id`,`user_id`,`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_forums_track
DROP TABLE IF EXISTS phpbb_forums_track;
CREATE TABLE `phpbb_forums_track` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `mark_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_forums_track (user_id, forum_id, mark_time) VALUES (2, 2, 1229210343),(2, 0, 1229210343);

# Table: phpbb_forums_watch
DROP TABLE IF EXISTS phpbb_forums_watch;
CREATE TABLE `phpbb_forums_watch` (
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `notify_status` tinyint(1) unsigned NOT NULL default '0',
  KEY `forum_id` (`forum_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_stat` (`notify_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_gallery_albums
DROP TABLE IF EXISTS phpbb_gallery_albums;
CREATE TABLE `phpbb_gallery_albums` (
  `album_id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent_id` mediumint(8) unsigned NOT NULL default '0',
  `left_id` mediumint(8) unsigned NOT NULL default '1',
  `right_id` mediumint(8) unsigned NOT NULL default '2',
  `album_parents` mediumtext collate utf8_bin NOT NULL,
  `album_type` int(3) unsigned NOT NULL default '1',
  `album_name` varchar(255) collate utf8_bin NOT NULL default '',
  `album_desc` mediumtext collate utf8_bin NOT NULL,
  `album_desc_options` int(3) unsigned NOT NULL default '7',
  `album_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `album_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `album_user_id` mediumint(8) unsigned NOT NULL default '0',
  `album_images` mediumint(8) unsigned NOT NULL default '0',
  `album_images_real` mediumint(8) unsigned NOT NULL default '0',
  `album_last_image_id` mediumint(8) unsigned NOT NULL default '0',
  `album_image` varchar(255) collate utf8_bin NOT NULL default '',
  `album_last_image_time` int(11) NOT NULL default '0',
  `album_last_image_name` varchar(255) collate utf8_bin NOT NULL default '',
  `album_last_username` varchar(255) collate utf8_bin NOT NULL default '',
  `album_last_user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `album_last_user_id` mediumint(8) unsigned NOT NULL default '0',
  `display_on_index` int(1) unsigned NOT NULL default '1',
  `display_subalbum_list` int(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_albums (album_id, parent_id, left_id, right_id, album_parents, album_type, album_name, album_desc, album_desc_options, album_desc_uid, album_desc_bitfield, album_user_id, album_images, album_images_real, album_last_image_id, album_image, album_last_image_time, album_last_image_name, album_last_username, album_last_user_colour, album_last_user_id, display_on_index, display_subalbum_list) VALUES (1, 0, 1, 2, '', 1, 'Test Album', 'Test Gallery', 7, '', '', 0, 3, 3, 4, '', 1201216983, 'Test Image 4', 'admin', '', 2, 1, 1),(2, 0, 1, 2, '', 1, 'admin', '', 7, '', '', 2, 1, 1, 5, '', 1201217095, 'test image for personal gallery', 'admin', '', 2, 1, 1);

# Table: phpbb_gallery_comments
DROP TABLE IF EXISTS phpbb_gallery_comments;
CREATE TABLE `phpbb_gallery_comments` (
  `comment_id` mediumint(8) unsigned NOT NULL auto_increment,
  `comment_image_id` mediumint(8) unsigned NOT NULL,
  `comment_user_id` mediumint(8) unsigned NOT NULL default '0',
  `comment_username` varchar(255) collate utf8_bin NOT NULL default '',
  `comment_user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `comment_time` int(11) unsigned NOT NULL default '0',
  `comment` mediumtext collate utf8_bin NOT NULL,
  `comment_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `comment_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `comment_edit_time` int(11) unsigned NOT NULL default '0',
  `comment_edit_count` smallint(4) unsigned NOT NULL default '0',
  `comment_edit_user_id` mediumint(8) unsigned NOT NULL default '0',
  `comment_user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`comment_id`),
  KEY `comment_image_id` (`comment_image_id`),
  KEY `comment_user_id` (`comment_user_id`),
  KEY `comment_user_ip` (`comment_user_ip`),
  KEY `comment_time` (`comment_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_gallery_config
DROP TABLE IF EXISTS phpbb_gallery_config;
CREATE TABLE `phpbb_gallery_config` (
  `config_name` varchar(255) collate utf8_bin NOT NULL default '',
  `config_value` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_config (config_name, config_value) VALUES ('max_pics', '1024'),('max_file_size', '128000'),('max_width', '800'),('max_height', '600'),('rows_per_page', '3'),('cols_per_page', '4'),('thumbnail_quality', '50'),('thumbnail_size', '125'),('thumbnail_cache', '1'),('sort_method', 'image_time'),('sort_order', 'DESC'),('jpg_allowed', '1'),('png_allowed', '1'),('gif_allowed', '1'),('desc_length', '512'),('hotlink_prevent', '0'),('hotlink_allowed', 'phpbbgallery.ph.funpic.de'),('ucp_parent_module', '266'),('acp_parent_module', '259'),('rate', '1'),('rate_scale', '10'),('comment', '1'),('gd_version', '2'),('album_version', '0.4.0-RC2'),('watermark_images', '0'),('watermark_source', 'gallery/mark.png'),('preview_rsz_height', '600'),('preview_rsz_width', '800'),('upload_images', '10'),('thumbnail_info_line', '1'),('fake_thumb_size', '70'),('disp_fake_thumb', '1'),('exif_data', '1'),('watermark_height', '50'),('watermark_width', '200'),('personal_counter', '1');

# Table: phpbb_gallery_favorites
DROP TABLE IF EXISTS phpbb_gallery_favorites;
CREATE TABLE `phpbb_gallery_favorites` (
  `favorite_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `image_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`favorite_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_gallery_images
DROP TABLE IF EXISTS phpbb_gallery_images;
CREATE TABLE `phpbb_gallery_images` (
  `image_id` mediumint(8) unsigned NOT NULL auto_increment,
  `image_filename` varchar(255) collate utf8_bin NOT NULL default '',
  `image_thumbnail` varchar(255) collate utf8_bin NOT NULL default '',
  `image_name` varchar(255) collate utf8_bin NOT NULL default '',
  `image_desc` mediumtext collate utf8_bin NOT NULL,
  `image_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `image_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `image_user_id` mediumint(8) unsigned NOT NULL default '0',
  `image_username` varchar(255) collate utf8_bin NOT NULL default '',
  `image_user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `image_time` int(11) unsigned NOT NULL default '0',
  `image_album_id` mediumint(8) unsigned NOT NULL default '0',
  `image_view_count` int(11) unsigned NOT NULL default '0',
  `image_lock` int(3) unsigned NOT NULL default '0',
  `image_approval` int(3) unsigned NOT NULL default '0',
  `image_user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `image_comments` mediumint(8) unsigned NOT NULL default '0',
  `image_last_comment` mediumint(8) unsigned NOT NULL default '0',
  `image_filemissing` int(3) unsigned NOT NULL default '0',
  `image_rates` mediumint(8) unsigned NOT NULL default '0',
  `image_rate_points` mediumint(8) unsigned NOT NULL default '0',
  `image_rate_avg` mediumint(8) unsigned NOT NULL default '0',
  `image_status` int(3) unsigned NOT NULL default '1',
  `image_has_exif` int(3) unsigned NOT NULL default '2',
  `image_favorited` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`image_id`),
  KEY `image_album_id` (`image_album_id`),
  KEY `image_user_id` (`image_user_id`),
  KEY `image_time` (`image_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_images (image_id, image_filename, image_thumbnail, image_name, image_desc, image_desc_uid, image_desc_bitfield, image_user_id, image_username, image_user_ip, image_time, image_album_id, image_view_count, image_lock, image_approval, image_user_colour, image_comments, image_last_comment, image_filemissing, image_rates, image_rate_points, image_rate_avg, image_status, image_has_exif, image_favorited) VALUES (2, '5d4991b0847b5f791b6efd5abc2bec43.jpg', '5d4991b0847b5f791b6efd5abc2bec43.jpg', 'Test Gallery 2', 'Test Image for Gallery 2\nPlease delete on install', '1ozglom0', '', 2, 'admin', '81.141.32.178', 1201208032, 1, 3, 0, 1, 'AA0000', 0, 0, 0, 0, 0, 0, 1, 2, 0),(3, 'f42106f085860664c7cc8739d4993de0.jpg', 'f42106f085860664c7cc8739d4993de0.jpg', 'Test 3', 'Test Image 3\nPlease Delete on install', '3mp98mib', '', 2, 'admin', '81.141.32.178', 1201216906, 1, 7, 0, 1, 'AA0000', 0, 0, 0, 0, 0, 0, 1, 2, 0),(4, '2d123a8fe9722431382cc21be34d99b8.jpg', '2d123a8fe9722431382cc21be34d99b8.jpg', 'Test Image 4', 'Test Image 4\nPlease delete on install', 'd0w7lb6j', '', 2, 'admin', '81.141.32.178', 1201216983, 1, 10, 0, 1, 'AA0000', 0, 0, 0, 0, 0, 0, 1, 2, 0),(5, '561248fdd21ff1210b892422421de88e.jpg', '561248fdd21ff1210b892422421de88e.jpg', 'test image for personal gallery', 'test image', 'etp2mg84', '', 2, 'admin', '81.141.32.178', 1201217095, 2, 6, 0, 1, 'AA0000', 0, 0, 0, 0, 0, 0, 1, 2, 0);

# Table: phpbb_gallery_modscache
DROP TABLE IF EXISTS phpbb_gallery_modscache;
CREATE TABLE `phpbb_gallery_modscache` (
  `album_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) collate utf8_bin NOT NULL default '',
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `group_name` varchar(255) collate utf8_bin NOT NULL default '',
  `display_on_index` tinyint(1) NOT NULL default '1',
  KEY `disp_idx` (`display_on_index`),
  KEY `album_id` (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_modscache (album_id, user_id, username, group_id, group_name, display_on_index) VALUES (1, 0, '', 5, 'ADMINISTRATORS', 1),(1, 0, '', 4, 'GLOBAL_MODERATORS', 1);

# Table: phpbb_gallery_permissions
DROP TABLE IF EXISTS phpbb_gallery_permissions;
CREATE TABLE `phpbb_gallery_permissions` (
  `perm_id` mediumint(8) unsigned NOT NULL auto_increment,
  `perm_role_id` mediumint(8) unsigned NOT NULL default '0',
  `perm_album_id` mediumint(8) unsigned NOT NULL default '0',
  `perm_user_id` mediumint(8) unsigned NOT NULL default '0',
  `perm_group_id` mediumint(8) unsigned NOT NULL default '0',
  `perm_system` int(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`perm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_permissions (perm_id, perm_role_id, perm_album_id, perm_user_id, perm_group_id, perm_system) VALUES (1, 1, 1, 0, 6, 0),(2, 2, 1, 0, 5, 0),(3, 3, 1, 0, 4, 0),(4, 4, 1, 0, 2, 0),(5, 4, 1, 0, 3, 0),(6, 5, 1, 0, 1, 0),(7, 6, 0, 0, 2, 2),(8, 6, 0, 0, 3, 2);

# Table: phpbb_gallery_rates
DROP TABLE IF EXISTS phpbb_gallery_rates;
CREATE TABLE `phpbb_gallery_rates` (
  `rate_image_id` mediumint(8) unsigned NOT NULL auto_increment,
  `rate_user_id` mediumint(8) unsigned NOT NULL default '0',
  `rate_user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `rate_point` int(3) unsigned NOT NULL default '0',
  KEY `rate_image_id` (`rate_image_id`),
  KEY `rate_user_id` (`rate_user_id`),
  KEY `rate_user_ip` (`rate_user_ip`),
  KEY `rate_point` (`rate_point`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_gallery_reports
DROP TABLE IF EXISTS phpbb_gallery_reports;
CREATE TABLE `phpbb_gallery_reports` (
  `report_id` mediumint(8) unsigned NOT NULL auto_increment,
  `report_album_id` mediumint(8) unsigned NOT NULL default '0',
  `report_image_id` mediumint(8) unsigned NOT NULL default '0',
  `reporter_id` mediumint(8) unsigned NOT NULL default '0',
  `report_manager` mediumint(8) unsigned NOT NULL default '0',
  `report_note` mediumtext collate utf8_bin NOT NULL,
  `report_time` int(11) unsigned NOT NULL default '0',
  `report_status` int(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_gallery_roles
DROP TABLE IF EXISTS phpbb_gallery_roles;
CREATE TABLE `phpbb_gallery_roles` (
  `role_id` mediumint(8) unsigned NOT NULL auto_increment,
  `i_view` int(3) unsigned NOT NULL default '0',
  `i_upload` int(3) unsigned NOT NULL default '0',
  `i_edit` int(3) unsigned NOT NULL default '0',
  `i_delete` int(3) unsigned NOT NULL default '0',
  `i_rate` int(3) unsigned NOT NULL default '0',
  `i_approve` int(3) unsigned NOT NULL default '0',
  `i_lock` int(3) unsigned NOT NULL default '0',
  `i_report` int(3) unsigned NOT NULL default '0',
  `i_count` mediumint(8) unsigned NOT NULL default '0',
  `c_post` int(3) unsigned NOT NULL default '0',
  `c_edit` int(3) unsigned NOT NULL default '0',
  `c_delete` int(3) unsigned NOT NULL default '0',
  `a_moderate` int(3) unsigned NOT NULL default '0',
  `album_count` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_roles (role_id, i_view, i_upload, i_edit, i_delete, i_rate, i_approve, i_lock, i_report, i_count, c_post, c_edit, c_delete, a_moderate, album_count) VALUES (1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),(2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0),(3, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 0),(4, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0),(5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),(6, 1, 1, 1, 1, 1, 1, 0, 1, 25, 1, 0, 0, 0, 2);

# Table: phpbb_gallery_users
DROP TABLE IF EXISTS phpbb_gallery_users;
CREATE TABLE `phpbb_gallery_users` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `watch_own` int(3) unsigned NOT NULL default '0',
  `watch_favo` int(3) unsigned NOT NULL default '0',
  `watch_com` int(3) unsigned NOT NULL default '0',
  `user_images` mediumint(8) unsigned NOT NULL default '0',
  `personal_album_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_gallery_users (user_id, watch_own, watch_favo, watch_com, user_images, personal_album_id) VALUES (1, 0, 0, 0, 0, 0),(2, 0, 0, 0, 4, 2);

# Table: phpbb_gallery_watch
DROP TABLE IF EXISTS phpbb_gallery_watch;
CREATE TABLE `phpbb_gallery_watch` (
  `watch_id` mediumint(8) unsigned NOT NULL auto_increment,
  `album_id` mediumint(8) unsigned NOT NULL default '0',
  `image_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`watch_id`),
  KEY `user_id` (`user_id`),
  KEY `image_id` (`image_id`),
  KEY `album_id` (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_groups
DROP TABLE IF EXISTS phpbb_groups;
CREATE TABLE `phpbb_groups` (
  `group_id` mediumint(8) unsigned NOT NULL auto_increment,
  `group_type` tinyint(4) NOT NULL default '1',
  `group_founder_manage` tinyint(1) unsigned NOT NULL default '0',
  `group_name` varchar(255) collate utf8_bin NOT NULL default '',
  `group_desc` text collate utf8_bin NOT NULL,
  `group_desc_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `group_desc_options` int(11) unsigned NOT NULL default '7',
  `group_desc_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `group_display` tinyint(1) unsigned NOT NULL default '0',
  `group_avatar` varchar(255) collate utf8_bin NOT NULL default '',
  `group_avatar_type` tinyint(2) NOT NULL default '0',
  `group_avatar_width` smallint(4) unsigned NOT NULL default '0',
  `group_avatar_height` smallint(4) unsigned NOT NULL default '0',
  `group_rank` mediumint(8) unsigned NOT NULL default '0',
  `group_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `group_sig_chars` mediumint(8) unsigned NOT NULL default '0',
  `group_receive_pm` tinyint(1) unsigned NOT NULL default '0',
  `group_message_limit` mediumint(8) unsigned NOT NULL default '0',
  `group_legend` tinyint(1) unsigned NOT NULL default '1',
  `group_max_recipients` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`group_id`),
  KEY `group_legend_name` (`group_legend`,`group_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_groups (group_id, group_type, group_founder_manage, group_name, group_desc, group_desc_bitfield, group_desc_options, group_desc_uid, group_display, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height, group_rank, group_colour, group_sig_chars, group_receive_pm, group_message_limit, group_legend, group_max_recipients) VALUES (1, 3, 0, 'GUESTS', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 5),(2, 3, 0, 'REGISTERED', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 1, 0, 1, 5),(3, 3, 0, 'REGISTERED_COPPA', '', '', 7, '', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 5),(4, 3, 0, 'GLOBAL_MODERATORS', '', '', 7, '', 0, '', 0, 0, 0, 0, '00AA00', 0, 0, 0, 1, 0),(5, 3, 1, 'ADMINISTRATORS', '', '', 7, '', 0, '', 0, 0, 0, 0, 'AA0000', 0, 0, 0, 1, 0),(6, 3, 0, 'BOTS', '', '', 7, '', 0, '', 0, 0, 0, 0, '9E8DA7', 0, 0, 0, 0, 5);

# Table: phpbb_icons
DROP TABLE IF EXISTS phpbb_icons;
CREATE TABLE `phpbb_icons` (
  `icons_id` mediumint(8) unsigned NOT NULL auto_increment,
  `icons_url` varchar(255) collate utf8_bin NOT NULL default '',
  `icons_width` tinyint(4) NOT NULL default '0',
  `icons_height` tinyint(4) NOT NULL default '0',
  `icons_order` mediumint(8) unsigned NOT NULL default '0',
  `display_on_posting` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`icons_id`),
  KEY `display_on_posting` (`display_on_posting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_icons (icons_id, icons_url, icons_width, icons_height, icons_order, display_on_posting) VALUES (1, 'misc/fire.gif', 16, 16, 1, 1),(2, 'smile/redface.gif', 16, 16, 9, 1),(3, 'smile/mrgreen.gif', 16, 16, 10, 1),(4, 'misc/heart.gif', 16, 16, 4, 1),(5, 'misc/star.gif', 16, 16, 2, 1),(6, 'misc/radioactive.gif', 16, 16, 3, 1),(7, 'misc/thinking.gif', 16, 16, 5, 1),(8, 'smile/info.gif', 16, 16, 8, 1),(9, 'smile/question.gif', 16, 16, 6, 1),(10, 'smile/alert.gif', 16, 16, 7, 1);

# Table: phpbb_lang
DROP TABLE IF EXISTS phpbb_lang;
CREATE TABLE `phpbb_lang` (
  `lang_id` tinyint(4) NOT NULL auto_increment,
  `lang_iso` varchar(30) collate utf8_bin NOT NULL default '',
  `lang_dir` varchar(30) collate utf8_bin NOT NULL default '',
  `lang_english_name` varchar(100) collate utf8_bin NOT NULL default '',
  `lang_local_name` varchar(255) collate utf8_bin NOT NULL default '',
  `lang_author` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`lang_id`),
  KEY `lang_iso` (`lang_iso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_lang (lang_id, lang_iso, lang_dir, lang_english_name, lang_local_name, lang_author) VALUES (1, 'en', 'en', 'British English', 'British English', 'phpBB Group');

# Table: phpbb_log
DROP TABLE IF EXISTS phpbb_log;
CREATE TABLE `phpbb_log` (
  `log_id` mediumint(8) unsigned NOT NULL auto_increment,
  `log_type` tinyint(4) NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `reportee_id` mediumint(8) unsigned NOT NULL default '0',
  `log_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `log_time` int(11) unsigned NOT NULL default '0',
  `log_operation` text collate utf8_bin NOT NULL,
  `log_data` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`log_id`),
  KEY `log_type` (`log_type`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `reportee_id` (`reportee_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_log (log_id, log_type, user_id, forum_id, topic_id, reportee_id, log_ip, log_time, log_operation, log_data) VALUES (766, 0, 2, 0, 0, 0, '81.141.37.131', 1229706838, 'LOG_CLEAR_MOD', ''),(768, 3, 2, 0, 0, 2, '81.141.37.131', 1229706960, 'LOG_USER_NEW_PASSWORD', 'a:1:{i:0;s:5:\"admin\";}'),(767, 0, 2, 0, 0, 0, '81.141.37.131', 1229706846, 'LOG_CLEAR_USERS', ''),(765, 0, 2, 0, 0, 0, '81.141.37.131', 1229706833, 'LOG_CLEAR_ADMIN', '');

# Table: phpbb_moderator_cache
DROP TABLE IF EXISTS phpbb_moderator_cache;
CREATE TABLE `phpbb_moderator_cache` (
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(255) collate utf8_bin NOT NULL default '',
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `group_name` varchar(255) collate utf8_bin NOT NULL default '',
  `display_on_index` tinyint(1) unsigned NOT NULL default '1',
  KEY `disp_idx` (`display_on_index`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_modules
DROP TABLE IF EXISTS phpbb_modules;
CREATE TABLE `phpbb_modules` (
  `module_id` mediumint(8) unsigned NOT NULL auto_increment,
  `module_enabled` tinyint(1) unsigned NOT NULL default '1',
  `module_display` tinyint(1) unsigned NOT NULL default '1',
  `module_basename` varchar(255) collate utf8_bin NOT NULL default '',
  `module_class` varchar(10) collate utf8_bin NOT NULL default '',
  `parent_id` mediumint(8) unsigned NOT NULL default '0',
  `left_id` mediumint(8) unsigned NOT NULL default '0',
  `right_id` mediumint(8) unsigned NOT NULL default '0',
  `module_langname` varchar(255) collate utf8_bin NOT NULL default '',
  `module_mode` varchar(255) collate utf8_bin NOT NULL default '',
  `module_auth` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`module_id`),
  KEY `left_right_id` (`left_id`,`right_id`),
  KEY `module_enabled` (`module_enabled`),
  KEY `class_left_id` (`module_class`,`left_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_modules (module_id, module_enabled, module_display, module_basename, module_class, parent_id, left_id, right_id, module_langname, module_mode, module_auth) VALUES (1, 1, 1, '', 'acp', 0, 1, 70, 'ACP_CAT_GENERAL', '', ''),(2, 1, 1, '', 'acp', 1, 4, 19, 'ACP_QUICK_ACCESS', '', ''),(3, 1, 1, '', 'acp', 1, 20, 49, 'ACP_BOARD_CONFIGURATION', '', ''),(4, 1, 1, '', 'acp', 1, 50, 57, 'ACP_CLIENT_COMMUNICATION', '', ''),(5, 1, 1, '', 'acp', 1, 58, 69, 'ACP_SERVER_CONFIGURATION', '', ''),(6, 1, 1, '', 'acp', 0, 71, 88, 'ACP_CAT_FORUMS', '', ''),(7, 1, 1, '', 'acp', 6, 72, 77, 'ACP_MANAGE_FORUMS', '', ''),(8, 1, 1, '', 'acp', 6, 78, 87, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),(9, 1, 1, '', 'acp', 0, 89, 112, 'ACP_CAT_POSTING', '', ''),(10, 1, 1, '', 'acp', 9, 90, 101, 'ACP_MESSAGES', '', ''),(11, 1, 1, '', 'acp', 9, 102, 111, 'ACP_ATTACHMENTS', '', ''),(12, 1, 1, '', 'acp', 0, 113, 168, 'ACP_CAT_USERGROUP', '', ''),(13, 1, 1, '', 'acp', 12, 114, 147, 'ACP_CAT_USERS', '', ''),(14, 1, 1, '', 'acp', 12, 148, 155, 'ACP_GROUPS', '', ''),(15, 1, 1, '', 'acp', 12, 156, 167, 'ACP_USER_SECURITY', '', ''),(16, 1, 1, '', 'acp', 0, 169, 216, 'ACP_CAT_PERMISSIONS', '', ''),(17, 1, 1, '', 'acp', 16, 172, 181, 'ACP_GLOBAL_PERMISSIONS', '', ''),(18, 1, 1, '', 'acp', 16, 182, 191, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),(19, 1, 1, '', 'acp', 16, 192, 201, 'ACP_PERMISSION_ROLES', '', ''),(20, 1, 1, '', 'acp', 16, 202, 215, 'ACP_PERMISSION_MASKS', '', ''),(21, 1, 1, '', 'acp', 0, 217, 230, 'ACP_CAT_STYLES', '', ''),(22, 1, 1, '', 'acp', 21, 218, 221, 'ACP_STYLE_MANAGEMENT', '', ''),(23, 1, 1, '', 'acp', 21, 222, 229, 'ACP_STYLE_COMPONENTS', '', ''),(24, 1, 1, '', 'acp', 0, 231, 250, 'ACP_CAT_MAINTENANCE', '', ''),(25, 1, 1, '', 'acp', 24, 232, 241, 'ACP_FORUM_LOGS', '', ''),(26, 1, 1, '', 'acp', 24, 242, 249, 'ACP_CAT_DATABASE', '', ''),(27, 1, 1, '', 'acp', 0, 251, 276, 'ACP_CAT_SYSTEM', '', ''),(28, 1, 1, '', 'acp', 27, 252, 255, 'ACP_AUTOMATION', '', ''),(29, 1, 1, '', 'acp', 27, 256, 267, 'ACP_GENERAL_TASKS', '', ''),(30, 1, 1, '', 'acp', 27, 268, 275, 'ACP_MODULE_MANAGEMENT', '', ''),(31, 1, 1, '', 'acp', 0, 277, 324, 'ACP_CAT_DOT_MODS', '', ''),(32, 1, 1, 'attachments', 'acp', 3, 21, 22, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),(33, 1, 1, 'attachments', 'acp', 11, 103, 104, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),(34, 1, 1, 'attachments', 'acp', 11, 105, 106, 'ACP_MANAGE_EXTENSIONS', 'extensions', 'acl_a_attach'),(35, 1, 1, 'attachments', 'acp', 11, 107, 108, 'ACP_EXTENSION_GROUPS', 'ext_groups', 'acl_a_attach'),(36, 1, 1, 'attachments', 'acp', 11, 109, 110, 'ACP_ORPHAN_ATTACHMENTS', 'orphan', 'acl_a_attach'),(37, 1, 1, 'ban', 'acp', 15, 157, 158, 'ACP_BAN_EMAILS', 'email', 'acl_a_ban'),(38, 1, 1, 'ban', 'acp', 15, 159, 160, 'ACP_BAN_IPS', 'ip', 'acl_a_ban'),(39, 1, 1, 'ban', 'acp', 15, 161, 162, 'ACP_BAN_USERNAMES', 'user', 'acl_a_ban'),(40, 1, 1, 'bbcodes', 'acp', 10, 91, 92, 'ACP_BBCODES', 'bbcodes', 'acl_a_bbcode'),(41, 1, 1, 'board', 'acp', 3, 23, 24, 'ACP_BOARD_SETTINGS', 'settings', 'acl_a_board'),(42, 1, 1, 'board', 'acp', 3, 25, 26, 'ACP_BOARD_FEATURES', 'features', 'acl_a_board'),(43, 1, 1, 'board', 'acp', 3, 27, 28, 'ACP_AVATAR_SETTINGS', 'avatar', 'acl_a_board'),(44, 1, 1, 'board', 'acp', 3, 29, 30, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),(45, 1, 1, 'board', 'acp', 10, 93, 94, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),(46, 1, 1, 'board', 'acp', 3, 31, 32, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),(47, 1, 1, 'board', 'acp', 3, 33, 34, 'ACP_SIGNATURE_SETTINGS', 'signature', 'acl_a_board'),(48, 1, 1, 'board', 'acp', 3, 35, 36, 'ACP_REGISTER_SETTINGS', 'registration', 'acl_a_board'),(49, 1, 1, 'board', 'acp', 4, 51, 52, 'ACP_AUTH_SETTINGS', 'auth', 'acl_a_server'),(50, 1, 1, 'board', 'acp', 4, 53, 54, 'ACP_EMAIL_SETTINGS', 'email', 'acl_a_server'),(51, 1, 1, 'board', 'acp', 5, 59, 60, 'ACP_COOKIE_SETTINGS', 'cookie', 'acl_a_server'),(52, 1, 1, 'board', 'acp', 5, 61, 62, 'ACP_SERVER_SETTINGS', 'server', 'acl_a_server'),(53, 1, 1, 'board', 'acp', 5, 63, 64, 'ACP_SECURITY_SETTINGS', 'security', 'acl_a_server'),(54, 1, 1, 'board', 'acp', 5, 65, 66, 'ACP_LOAD_SETTINGS', 'load', 'acl_a_server'),(55, 1, 1, 'bots', 'acp', 29, 257, 258, 'ACP_BOTS', 'bots', 'acl_a_bots'),(56, 1, 1, 'captcha', 'acp', 3, 37, 38, 'ACP_VC_SETTINGS', 'visual', 'acl_a_board'),(57, 1, 0, 'captcha', 'acp', 3, 39, 40, 'ACP_VC_CAPTCHA_DISPLAY', 'img', 'acl_a_board'),(58, 1, 1, 'database', 'acp', 26, 243, 244, 'ACP_BACKUP', 'backup', 'acl_a_backup'),(59, 1, 1, 'database', 'acp', 26, 245, 246, 'ACP_RESTORE', 'restore', 'acl_a_backup'),(60, 1, 1, 'disallow', 'acp', 15, 163, 164, 'ACP_DISALLOW_USERNAMES', 'usernames', 'acl_a_names'),(61, 1, 1, 'email', 'acp', 29, 259, 260, 'ACP_MASS_EMAIL', 'email', 'acl_a_email && cfg_email_enable'),(62, 1, 1, 'forums', 'acp', 7, 73, 74, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),(63, 1, 1, 'groups', 'acp', 14, 149, 150, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),(64, 1, 1, 'icons', 'acp', 10, 95, 96, 'ACP_ICONS', 'icons', 'acl_a_icons'),(65, 1, 1, 'icons', 'acp', 10, 97, 98, 'ACP_SMILIES', 'smilies', 'acl_a_icons'),(66, 1, 1, 'inactive', 'acp', 13, 117, 118, 'ACP_INACTIVE_USERS', 'list', 'acl_a_user'),(67, 1, 1, 'jabber', 'acp', 4, 55, 56, 'ACP_JABBER_SETTINGS', 'settings', 'acl_a_jabber'),(68, 1, 1, 'language', 'acp', 29, 261, 262, 'ACP_LANGUAGE_PACKS', 'lang_packs', 'acl_a_language'),(69, 1, 1, 'logs', 'acp', 25, 233, 234, 'ACP_ADMIN_LOGS', 'admin', 'acl_a_viewlogs'),(70, 1, 1, 'logs', 'acp', 25, 235, 236, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),(71, 1, 1, 'logs', 'acp', 25, 237, 238, 'ACP_USERS_LOGS', 'users', 'acl_a_viewlogs'),(72, 1, 1, 'logs', 'acp', 25, 239, 240, 'ACP_CRITICAL_LOGS', 'critical', 'acl_a_viewlogs'),(73, 1, 1, 'main', 'acp', 1, 2, 3, 'ACP_INDEX', 'main', ''),(74, 1, 1, 'modules', 'acp', 30, 269, 270, 'ACP', 'acp', 'acl_a_modules'),(75, 1, 1, 'modules', 'acp', 30, 271, 272, 'UCP', 'ucp', 'acl_a_modules'),(76, 1, 1, 'modules', 'acp', 30, 273, 274, 'MCP', 'mcp', 'acl_a_modules'),(77, 1, 1, 'permission_roles', 'acp', 19, 193, 194, 'ACP_ADMIN_ROLES', 'admin_roles', 'acl_a_roles && acl_a_aauth'),(78, 1, 1, 'permission_roles', 'acp', 19, 195, 196, 'ACP_USER_ROLES', 'user_roles', 'acl_a_roles && acl_a_uauth'),(79, 1, 1, 'permission_roles', 'acp', 19, 197, 198, 'ACP_MOD_ROLES', 'mod_roles', 'acl_a_roles && acl_a_mauth'),(80, 1, 1, 'permission_roles', 'acp', 19, 199, 200, 'ACP_FORUM_ROLES', 'forum_roles', 'acl_a_roles && acl_a_fauth'),(81, 1, 1, 'permissions', 'acp', 16, 170, 171, 'ACP_PERMISSIONS', 'intro', 'acl_a_authusers || acl_a_authgroups || acl_a_viewauth'),(82, 1, 0, 'permissions', 'acp', 20, 203, 204, 'ACP_PERMISSION_TRACE', 'trace', 'acl_a_viewauth'),(83, 1, 1, 'permissions', 'acp', 18, 183, 184, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),(84, 1, 1, 'permissions', 'acp', 18, 185, 186, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),(85, 1, 1, 'permissions', 'acp', 17, 173, 174, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),(86, 1, 1, 'permissions', 'acp', 13, 119, 120, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),(87, 1, 1, 'permissions', 'acp', 18, 187, 188, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),(88, 1, 1, 'permissions', 'acp', 13, 121, 122, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),(89, 1, 1, 'permissions', 'acp', 17, 175, 176, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),(90, 1, 1, 'permissions', 'acp', 14, 151, 152, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),(91, 1, 1, 'permissions', 'acp', 18, 189, 190, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),(92, 1, 1, 'permissions', 'acp', 14, 153, 154, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),(93, 1, 1, 'permissions', 'acp', 17, 177, 178, 'ACP_ADMINISTRATORS', 'setting_admin_global', 'acl_a_aauth && (acl_a_authusers || acl_a_authgroups)'),(94, 1, 1, 'permissions', 'acp', 17, 179, 180, 'ACP_GLOBAL_MODERATORS', 'setting_mod_global', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),(95, 1, 1, 'permissions', 'acp', 20, 205, 206, 'ACP_VIEW_ADMIN_PERMISSIONS', 'view_admin_global', 'acl_a_viewauth'),(96, 1, 1, 'permissions', 'acp', 20, 207, 208, 'ACP_VIEW_USER_PERMISSIONS', 'view_user_global', 'acl_a_viewauth'),(97, 1, 1, 'permissions', 'acp', 20, 209, 210, 'ACP_VIEW_GLOBAL_MOD_PERMISSIONS', 'view_mod_global', 'acl_a_viewauth'),(98, 1, 1, 'permissions', 'acp', 20, 211, 212, 'ACP_VIEW_FORUM_MOD_PERMISSIONS', 'view_mod_local', 'acl_a_viewauth'),(99, 1, 1, 'permissions', 'acp', 20, 213, 214, 'ACP_VIEW_FORUM_PERMISSIONS', 'view_forum_local', 'acl_a_viewauth'),(100, 1, 1, 'php_info', 'acp', 29, 263, 264, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),(101, 1, 1, 'profile', 'acp', 13, 123, 124, 'ACP_CUSTOM_PROFILE_FIELDS', 'profile', 'acl_a_profile'),(102, 1, 1, 'prune', 'acp', 7, 75, 76, 'ACP_PRUNE_FORUMS', 'forums', 'acl_a_prune'),(103, 1, 1, 'prune', 'acp', 15, 165, 166, 'ACP_PRUNE_USERS', 'users', 'acl_a_userdel'),(104, 1, 1, 'ranks', 'acp', 13, 125, 126, 'ACP_MANAGE_RANKS', 'ranks', 'acl_a_ranks'),(105, 1, 1, 'reasons', 'acp', 29, 265, 266, 'ACP_MANAGE_REASONS', 'main', 'acl_a_reasons'),(106, 1, 1, 'search', 'acp', 5, 67, 68, 'ACP_SEARCH_SETTINGS', 'settings', 'acl_a_search'),(107, 1, 1, 'search', 'acp', 26, 247, 248, 'ACP_SEARCH_INDEX', 'index', 'acl_a_search'),(108, 1, 1, 'styles', 'acp', 22, 219, 220, 'ACP_STYLES', 'style', 'acl_a_styles'),(109, 1, 1, 'styles', 'acp', 23, 223, 224, 'ACP_TEMPLATES', 'template', 'acl_a_styles'),(110, 1, 1, 'styles', 'acp', 23, 225, 226, 'ACP_THEMES', 'theme', 'acl_a_styles'),(111, 1, 1, 'styles', 'acp', 23, 227, 228, 'ACP_IMAGESETS', 'imageset', 'acl_a_styles'),(112, 1, 1, 'update', 'acp', 28, 253, 254, 'ACP_VERSION_CHECK', 'version_check', 'acl_a_board'),(113, 1, 1, 'users', 'acp', 13, 115, 116, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),(114, 1, 0, 'users', 'acp', 13, 127, 128, 'ACP_USER_FEEDBACK', 'feedback', 'acl_a_user'),(115, 1, 0, 'users', 'acp', 13, 129, 130, 'ACP_USER_PROFILE', 'profile', 'acl_a_user'),(116, 1, 0, 'users', 'acp', 13, 131, 132, 'ACP_USER_PREFS', 'prefs', 'acl_a_user'),(117, 1, 0, 'users', 'acp', 13, 133, 134, 'ACP_USER_AVATAR', 'avatar', 'acl_a_user'),(118, 1, 0, 'users', 'acp', 13, 135, 136, 'ACP_USER_RANK', 'rank', 'acl_a_user'),(119, 1, 0, 'users', 'acp', 13, 137, 138, 'ACP_USER_SIG', 'sig', 'acl_a_user'),(120, 1, 0, 'users', 'acp', 13, 139, 140, 'ACP_USER_GROUPS', 'groups', 'acl_a_user && acl_a_group'),(121, 1, 0, 'users', 'acp', 13, 141, 142, 'ACP_USER_PERM', 'perm', 'acl_a_user && acl_a_viewauth'),(122, 1, 0, 'users', 'acp', 13, 143, 144, 'ACP_USER_ATTACH', 'attach', 'acl_a_user'),(123, 1, 1, 'words', 'acp', 10, 99, 100, 'ACP_WORDS', 'words', 'acl_a_words'),(124, 1, 1, 'users', 'acp', 2, 5, 6, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),(125, 1, 1, 'groups', 'acp', 2, 7, 8, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),(126, 1, 1, 'forums', 'acp', 2, 9, 10, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),(127, 1, 1, 'logs', 'acp', 2, 11, 12, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),(128, 1, 1, 'bots', 'acp', 2, 13, 14, 'ACP_BOTS', 'bots', 'acl_a_bots'),(129, 1, 1, 'php_info', 'acp', 2, 15, 16, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),(130, 1, 1, 'permissions', 'acp', 8, 79, 80, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),(131, 1, 1, 'permissions', 'acp', 8, 81, 82, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),(132, 1, 1, 'permissions', 'acp', 8, 83, 84, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),(133, 1, 1, 'permissions', 'acp', 8, 85, 86, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),(134, 1, 1, '', 'mcp', 0, 1, 10, 'MCP_MAIN', '', ''),(135, 1, 1, '', 'mcp', 0, 11, 18, 'MCP_QUEUE', '', ''),(136, 1, 1, '', 'mcp', 0, 19, 26, 'MCP_REPORTS', '', ''),(137, 1, 1, '', 'mcp', 0, 27, 32, 'MCP_NOTES', '', ''),(138, 1, 1, '', 'mcp', 0, 33, 42, 'MCP_WARN', '', ''),(139, 1, 1, '', 'mcp', 0, 43, 50, 'MCP_LOGS', '', ''),(140, 1, 1, '', 'mcp', 0, 51, 58, 'MCP_BAN', '', ''),(141, 1, 1, 'ban', 'mcp', 140, 52, 53, 'MCP_BAN_USERNAMES', 'user', 'acl_m_ban'),(142, 1, 1, 'ban', 'mcp', 140, 54, 55, 'MCP_BAN_IPS', 'ip', 'acl_m_ban'),(143, 1, 1, 'ban', 'mcp', 140, 56, 57, 'MCP_BAN_EMAILS', 'email', 'acl_m_ban'),(144, 1, 1, 'logs', 'mcp', 139, 44, 45, 'MCP_LOGS_FRONT', 'front', 'acl_m_ || aclf_m_'),(145, 1, 1, 'logs', 'mcp', 139, 46, 47, 'MCP_LOGS_FORUM_VIEW', 'forum_logs', 'acl_m_,$id'),(146, 1, 1, 'logs', 'mcp', 139, 48, 49, 'MCP_LOGS_TOPIC_VIEW', 'topic_logs', 'acl_m_,$id'),(147, 1, 1, 'main', 'mcp', 134, 2, 3, 'MCP_MAIN_FRONT', 'front', ''),(148, 1, 1, 'main', 'mcp', 134, 4, 5, 'MCP_MAIN_FORUM_VIEW', 'forum_view', 'acl_m_,$id'),(149, 1, 1, 'main', 'mcp', 134, 6, 7, 'MCP_MAIN_TOPIC_VIEW', 'topic_view', 'acl_m_,$id'),(150, 1, 1, 'main', 'mcp', 134, 8, 9, 'MCP_MAIN_POST_DETAILS', 'post_details', 'acl_m_,$id || (!$id && aclf_m_)'),(151, 1, 1, 'notes', 'mcp', 137, 28, 29, 'MCP_NOTES_FRONT', 'front', ''),(152, 1, 1, 'notes', 'mcp', 137, 30, 31, 'MCP_NOTES_USER', 'user_notes', ''),(153, 1, 1, 'queue', 'mcp', 135, 12, 13, 'MCP_QUEUE_UNAPPROVED_TOPICS', 'unapproved_topics', 'aclf_m_approve'),(154, 1, 1, 'queue', 'mcp', 135, 14, 15, 'MCP_QUEUE_UNAPPROVED_POSTS', 'unapproved_posts', 'aclf_m_approve'),(155, 1, 1, 'queue', 'mcp', 135, 16, 17, 'MCP_QUEUE_APPROVE_DETAILS', 'approve_details', 'acl_m_approve,$id || (!$id && aclf_m_approve)'),(156, 1, 1, 'reports', 'mcp', 136, 20, 21, 'MCP_REPORTS_OPEN', 'reports', 'aclf_m_report'),(157, 1, 1, 'reports', 'mcp', 136, 22, 23, 'MCP_REPORTS_CLOSED', 'reports_closed', 'aclf_m_report'),(158, 1, 1, 'reports', 'mcp', 136, 24, 25, 'MCP_REPORT_DETAILS', 'report_details', 'acl_m_report,$id || (!$id && aclf_m_report)'),(159, 1, 1, 'warn', 'mcp', 138, 34, 35, 'MCP_WARN_FRONT', 'front', 'aclf_m_warn'),(160, 1, 1, 'warn', 'mcp', 138, 36, 37, 'MCP_WARN_LIST', 'list', 'aclf_m_warn'),(161, 1, 1, 'warn', 'mcp', 138, 38, 39, 'MCP_WARN_USER', 'warn_user', 'aclf_m_warn'),(162, 1, 1, 'warn', 'mcp', 138, 40, 41, 'MCP_WARN_POST', 'warn_post', 'acl_m_warn && acl_f_read,$id'),(163, 1, 1, '', 'ucp', 0, 1, 12, 'UCP_MAIN', '', ''),(164, 1, 1, '', 'ucp', 0, 13, 26, 'UCP_PROFILE', '', ''),(165, 1, 1, '', 'ucp', 0, 27, 34, 'UCP_PREFS', '', ''),(166, 1, 1, '', 'ucp', 0, 35, 46, 'UCP_PM', '', ''),(167, 1, 1, '', 'ucp', 0, 47, 52, 'UCP_USERGROUPS', '', ''),(168, 1, 1, '', 'ucp', 0, 53, 58, 'UCP_ZEBRA', '', ''),(169, 1, 1, 'attachments', 'ucp', 163, 10, 11, 'UCP_MAIN_ATTACHMENTS', 'attachments', 'acl_u_attach'),(170, 1, 1, 'groups', 'ucp', 167, 48, 49, 'UCP_USERGROUPS_MEMBER', 'membership', ''),(171, 1, 1, 'groups', 'ucp', 167, 50, 51, 'UCP_USERGROUPS_MANAGE', 'manage', ''),(172, 1, 1, 'main', 'ucp', 163, 2, 3, 'UCP_MAIN_FRONT', 'front', ''),(173, 1, 1, 'main', 'ucp', 163, 4, 5, 'UCP_MAIN_SUBSCRIBED', 'subscribed', ''),(174, 1, 1, 'main', 'ucp', 163, 6, 7, 'UCP_MAIN_BOOKMARKS', 'bookmarks', 'cfg_allow_bookmarks'),(175, 1, 1, 'main', 'ucp', 163, 8, 9, 'UCP_MAIN_DRAFTS', 'drafts', ''),(176, 1, 0, 'pm', 'ucp', 166, 36, 37, 'UCP_PM_VIEW', 'view', 'cfg_allow_privmsg'),(177, 1, 1, 'pm', 'ucp', 166, 38, 39, 'UCP_PM_COMPOSE', 'compose', 'cfg_allow_privmsg'),(178, 1, 1, 'pm', 'ucp', 166, 40, 41, 'UCP_PM_DRAFTS', 'drafts', 'cfg_allow_privmsg'),(179, 1, 1, 'pm', 'ucp', 166, 42, 43, 'UCP_PM_OPTIONS', 'options', 'cfg_allow_privmsg'),(180, 1, 0, 'pm', 'ucp', 166, 44, 45, 'UCP_PM_POPUP_TITLE', 'popup', 'cfg_allow_privmsg'),(181, 1, 1, 'prefs', 'ucp', 165, 28, 29, 'UCP_PREFS_PERSONAL', 'personal', ''),(182, 1, 1, 'prefs', 'ucp', 165, 30, 31, 'UCP_PREFS_POST', 'post', ''),(183, 1, 1, 'prefs', 'ucp', 165, 32, 33, 'UCP_PREFS_VIEW', 'view', ''),(184, 1, 1, 'profile', 'ucp', 164, 14, 15, 'UCP_PROFILE_PROFILE_INFO', 'profile_info', ''),(185, 1, 1, 'profile', 'ucp', 164, 16, 17, 'UCP_PROFILE_SIGNATURE', 'signature', ''),(186, 1, 1, 'profile', 'ucp', 164, 18, 19, 'UCP_PROFILE_AVATAR', 'avatar', ''),(187, 1, 1, 'profile', 'ucp', 164, 20, 21, 'UCP_PROFILE_REG_DETAILS', 'reg_details', ''),(188, 1, 1, 'zebra', 'ucp', 168, 54, 55, 'UCP_ZEBRA_FRIENDS', 'friends', ''),(189, 1, 1, 'zebra', 'ucp', 168, 56, 57, 'UCP_ZEBRA_FOES', 'foes', ''),(191, 1, 1, 'announcements_centre', 'acp', 3, 41, 42, 'ACP_ANNOUNCEMENTS_CENTRE', 'announcements_centre', 'acl_a_board'),(281, 1, 1, '', 'acp', 0, 325, 386, 'ACP_CAT_ARCADE', '', ''),(282, 1, 1, '', 'acp', 281, 326, 337, 'ACP_CAT_ARCADE_CONFIGURATION', '', ''),(283, 1, 1, 'arcade', 'acp', 282, 327, 328, 'ACP_ARCADE_SETTINGS_GENERAL', 'settings', 'acl_a_arcade_settings'),(284, 1, 1, 'arcade', 'acp', 282, 329, 330, 'ACP_ARCADE_SETTINGS_GAME', 'game', 'acl_a_arcade_settings'),(285, 1, 1, 'arcade', 'acp', 282, 331, 332, 'ACP_ARCADE_SETTINGS_FEATURE', 'feature', 'acl_a_arcade_settings'),(286, 1, 1, 'arcade', 'acp', 282, 333, 334, 'ACP_ARCADE_SETTINGS_PAGE', 'page', 'acl_a_arcade_settings'),(287, 1, 1, 'arcade', 'acp', 282, 335, 336, 'ACP_ARCADE_SETTINGS_PATH', 'path', 'acl_a_arcade_settings'),(288, 1, 1, '', 'acp', 281, 338, 341, 'ACP_ARCADE_MANAGE_ARCADE', '', ''),(289, 1, 1, 'arcade_manage', 'acp', 288, 339, 340, 'ACP_ARCADE_MANAGE_ARCADE', 'manage', 'acl_a_arcade_cat'),(290, 1, 1, '', 'acp', 281, 342, 353, 'ACP_CAT_ARCADE_GAMES', '', ''),(291, 1, 1, 'arcade_games', 'acp', 290, 343, 344, 'ACP_ARCADE_ADD_GAMES', 'add_games', 'acl_a_arcade_game'),(221, 1, 1, 'board', 'acp', 3, 45, 46, 'ACP_CONTACT_ADMIN_SETTINGS', 'contact_admin', 'acl_a_board'),(260, 1, 1, 'gallery', 'acp', 259, 297, 298, 'ACP_GALLERY_OVERVIEW', 'overview', ''),(261, 1, 1, 'gallery', 'acp', 259, 299, 300, 'ACP_GALLERY_CONFIGURE_GALLERY', 'configure_gallery', ''),(262, 1, 1, 'gallery', 'acp', 259, 301, 302, 'ACP_GALLERY_MANAGE_ALBUMS', 'manage_albums', ''),(263, 1, 1, 'gallery', 'acp', 259, 303, 304, 'ACP_GALLERY_ALBUM_PERMISSIONS', 'album_permissions', ''),(264, 1, 1, 'gallery', 'acp', 259, 305, 306, 'ACP_IMPORT_ALBUMS', 'import_images', ''),(265, 1, 1, 'gallery', 'acp', 259, 307, 308, 'ACP_GALLERY_CLEANUP', 'cleanup', ''),(220, 1, 1, 'prvmsg', 'acp', 2, 17, 18, 'ACP_PRVMSG', 'main', 'acl_a_user'),(222, 1, 1, 'add_user', 'acp', 13, 145, 146, 'ACP_ADD_USER', 'add_user', 'acl_a_add_user'),(217, 1, 1, 'board', 'acp', 3, 43, 44, 'ACP_WELCOME_PM', 'welcome_pm', 'acl_a_board'),(218, 1, 1, '', 'acp', 31, 278, 281, 'WWH_TITLE', '', ''),(219, 1, 1, 'wwh', 'acp', 218, 279, 280, 'WWH_CONFIG', 'overview', ''),(259, 1, 1, '', 'acp', 31, 296, 309, 'PHPBB_GALLERY', '', ''),(303, 1, 1, '', 'acp', 281, 368, 371, 'ACP_CAT_ARCADE_PERMISSION_ROLES', '', ''),(304, 1, 1, 'arcade_permission_roles', 'acp', 303, 369, 370, 'ACP_ARCADE_CAT_ROLES', 'cat_roles', 'acl_a_cauth && acl_a_roles'),(292, 1, 1, 'arcade_utilities', 'acp', 290, 345, 346, 'ACP_ARCADE_UTILITIES_DOWNLOADS', 'downloads', 'acl_a_arcade_utilities'),(293, 1, 1, 'arcade_games', 'acp', 290, 347, 348, 'ACP_ARCADE_EDIT_GAMES', 'edit_games', 'acl_a_arcade_game'),(294, 1, 1, 'arcade_games', 'acp', 290, 349, 350, 'ACP_ARCADE_EDIT_SCORES', 'edit_scores', 'acl_a_arcade_scores'),(295, 1, 1, 'arcade_games', 'acp', 290, 351, 352, 'ACP_ARCADE_UNPACK_GAMES', 'unpack_games', 'acl_a_arcade_game'),(296, 1, 1, '', 'acp', 281, 354, 367, 'ACP_CAT_ARCADE_UTILITIES', '', ''),(297, 1, 1, 'arcade_utilities', 'acp', 296, 355, 356, 'ACP_ARCADE_UTILITIES_CREATE_INSTALL', 'create_install', 'acl_a_arcade_utilities'),(298, 1, 1, 'arcade_utilities', 'acp', 296, 357, 358, 'ACP_ARCADE_UTILITIES_CONVERT_INSTALL', 'convert_install', 'acl_a_arcade_utilities'),(299, 1, 1, 'arcade_utilities', 'acp', 296, 359, 360, 'ACP_ARCADE_UTILITIES_DOWNLOAD_STATS', 'download_stats', 'acl_a_arcade_utilities'),(300, 1, 1, 'arcade_utilities', 'acp', 296, 361, 362, 'ACP_ARCADE_UTILITIES_ERRORS', 'errors', 'acl_a_arcade_utilities'),(301, 1, 1, 'arcade_utilities', 'acp', 296, 363, 364, 'ACP_ARCADE_UTILITIES_REPORTS', 'reports', 'acl_a_arcade_utilities'),(302, 1, 1, 'arcade_utilities', 'acp', 296, 365, 366, 'ACP_ARCADE_UTILITIES_USER_GUIDE', 'user_guide', ''),(252, 1, 1, '', 'acp', 31, 282, 295, 'User Reminder Mod', '', ''),(253, 1, 1, 'user_reminder', 'acp', 252, 283, 284, 'ACP_USER_REMINDER_CONFIGURATION', 'configuration', 'acl_a_user || acl_a_userdel'),(254, 1, 1, 'user_reminder', 'acp', 252, 285, 286, 'ACP_USER_REMINDER_ZERO_POSTER', 'zero_poster', 'acl_a_user || acl_a_userdel'),(255, 1, 1, 'user_reminder', 'acp', 252, 287, 288, 'ACP_USER_REMINDER_INACTIVE', 'inactive', 'acl_a_user || acl_a_userdel'),(256, 1, 1, 'user_reminder', 'acp', 252, 289, 290, 'ACP_USER_REMINDER_NOT_LOGGED_IN', 'not_logged_in', 'acl_a_user || acl_a_userdel'),(257, 1, 1, 'user_reminder', 'acp', 252, 291, 292, 'ACP_USER_REMINDER_INACTIVE_STILL', 'inactive_still', 'acl_a_user || acl_a_userdel'),(258, 1, 1, 'user_reminder', 'acp', 252, 293, 294, 'ACP_USER_REMINDER_PROTECTED_USERS', 'protected_users', 'acl_a_user || acl_a_userdel'),(266, 1, 1, '', 'ucp', 0, 59, 68, 'UCP_GALLERY', 'overview', ''),(267, 1, 1, 'gallery', 'ucp', 266, 60, 61, 'UCP_GALLERY_SETTINGS', 'manage_settings', ''),(268, 1, 1, 'gallery', 'ucp', 266, 62, 63, 'UCP_GALLERY_PERSONAL_ALBUMS', 'manage_albums', ''),(269, 1, 1, 'gallery', 'ucp', 266, 64, 65, 'UCP_GALLERY_WATCH', 'manage_subscriptions', ''),(270, 1, 1, 'gallery', 'ucp', 266, 66, 67, 'UCP_GALLERY_FAVORITES', 'manage_favorites', ''),(271, 1, 1, 'ads', 'acp', 3, 47, 48, 'ACP_ADVERTISEMENT_MANAGEMENT', 'default', 'acl_a_ads'),(272, 1, 1, '', 'acp', 31, 310, 317, 'Country Flags', '', ''),(273, 1, 1, 'flags', 'acp', 272, 311, 312, 'ACP_MANAGE_FLAGS', 'flags', 'acl_a_flags'),(274, 1, 0, 'users', 'acp', 272, 313, 314, 'ACP_USER_FLAG', 'flag', 'acl_a_user'),(275, 1, 1, 'board', 'acp', 272, 315, 316, 'ACP_FLAG_SETTINGS', 'flag', 'acl_a_board'),(276, 1, 1, 'favorites', 'ucp', 164, 22, 23, 'UCP_FAVORITES_EDIT', 'edit', ''),(277, 1, 0, 'favorites', 'ucp', 164, 24, 25, 'UCP_FAVORITES_VIEW_LIST', 'view_list', ''),(278, 1, 1, '', 'acp', 31, 318, 323, 'Forum Favorites', '', ''),(279, 1, 1, 'favorites', 'acp', 278, 319, 320, 'ACP_FAVORITES_SETTINGS', 'settings', 'acl_a_board'),(280, 1, 1, 'favorites', 'acp', 278, 321, 322, 'ACP_FAVORITES_CATEGORIES_CONFIG', 'categories', 'acl_a_board'),(305, 1, 1, '', 'acp', 281, 372, 381, 'ACP_CAT_ARCADE_PERMISSIONS', '', ''),(306, 1, 0, 'arcade_permissions', 'acp', 305, 373, 374, 'ACP_ARCADE_PERMISSION_TRACE', 'trace', 'acl_a_viewauth'),(307, 1, 1, 'arcade_permissions', 'acp', 305, 375, 376, 'ACP_ARCADE_CATEGORY_PERMISSIONS', 'setting_category_local', 'acl_a_cauth && (acl_a_authusers || acl_a_authgroups)'),(308, 1, 1, 'arcade_permissions', 'acp', 305, 377, 378, 'ACP_ARCADE_USERS_CATEGORY_PERMISSIONS', 'setting_user_local', 'acl_a_authgroups && acl_a_cauth'),(309, 1, 1, 'arcade_permissions', 'acp', 305, 379, 380, 'ACP_ARCADE_GROUPS_CATEGORY_PERMISSIONS', 'setting_group_local', 'acl_a_authusers && acl_a_cauth'),(310, 1, 1, '', 'acp', 281, 382, 385, 'ACP_CAT_ARCADE_PERMISSION_MASKS', '', ''),(311, 1, 1, 'arcade_permissions', 'acp', 310, 383, 384, 'ACP_VIEW_ARCADE_CATEGORY_PERMISSIONS', 'view_category_local', 'acl_a_viewauth'),(312, 1, 1, '', 'ucp', 0, 69, 74, 'UCP_ARCADE', '', ''),(313, 1, 1, 'arcade', 'ucp', 312, 70, 71, 'UCP_ARCADE_SETTINGS', 'settings', ''),(314, 1, 1, 'arcade', 'ucp', 312, 72, 73, 'UCP_ARCADE_FAVORITES', 'favorites', '');

# Table: phpbb_poll_options
DROP TABLE IF EXISTS phpbb_poll_options;
CREATE TABLE `phpbb_poll_options` (
  `poll_option_id` tinyint(4) NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `poll_option_text` text collate utf8_bin NOT NULL,
  `poll_option_total` mediumint(8) unsigned NOT NULL default '0',
  KEY `poll_opt_id` (`poll_option_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_poll_votes
DROP TABLE IF EXISTS phpbb_poll_votes;
CREATE TABLE `phpbb_poll_votes` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `poll_option_id` tinyint(4) NOT NULL default '0',
  `vote_user_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  KEY `topic_id` (`topic_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_posts
DROP TABLE IF EXISTS phpbb_posts;
CREATE TABLE `phpbb_posts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) unsigned NOT NULL default '0',
  `icon_id` mediumint(8) unsigned NOT NULL default '0',
  `poster_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `post_time` int(11) unsigned NOT NULL default '0',
  `post_approved` tinyint(1) unsigned NOT NULL default '1',
  `post_reported` tinyint(1) unsigned NOT NULL default '0',
  `enable_bbcode` tinyint(1) unsigned NOT NULL default '1',
  `enable_smilies` tinyint(1) unsigned NOT NULL default '1',
  `enable_magic_url` tinyint(1) unsigned NOT NULL default '1',
  `enable_sig` tinyint(1) unsigned NOT NULL default '1',
  `post_username` varchar(255) collate utf8_bin NOT NULL default '',
  `post_subject` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `post_text` mediumtext collate utf8_bin NOT NULL,
  `post_checksum` varchar(32) collate utf8_bin NOT NULL default '',
  `post_attachment` tinyint(1) unsigned NOT NULL default '0',
  `bbcode_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `bbcode_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `post_postcount` tinyint(1) unsigned NOT NULL default '1',
  `post_edit_time` int(11) unsigned NOT NULL default '0',
  `post_edit_reason` varchar(255) collate utf8_bin NOT NULL default '',
  `post_edit_user` mediumint(8) unsigned NOT NULL default '0',
  `post_edit_count` smallint(4) unsigned NOT NULL default '0',
  `post_edit_locked` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_ip` (`poster_ip`),
  KEY `poster_id` (`poster_id`),
  KEY `post_approved` (`post_approved`),
  KEY `tid_post_time` (`topic_id`,`post_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_posts (post_id, topic_id, forum_id, poster_id, icon_id, poster_ip, post_time, post_approved, post_reported, enable_bbcode, enable_smilies, enable_magic_url, enable_sig, post_username, post_subject, post_text, post_checksum, post_attachment, bbcode_bitfield, bbcode_uid, post_postcount, post_edit_time, post_edit_reason, post_edit_user, post_edit_count, post_edit_locked) VALUES (1, 1, 2, 2, 0, '81.141.32.178', 1201111192, 1, 0, 1, 1, 1, 1, '', 'Welcome to phpBB3', 'This is an example post in your phpBB3 installation. Everything seems to be working. You may delete this post if you like and continue to set up your board. During the installation process your first category and your first forum are assigned an appropriate set of permissions for the predefined usergroups administrators, bots, global moderators, guests, registered users and registered COPPA users. If you also choose to delete your first category and your first forum, do not forget to assign permissions for all these usergroups for all new categories and forums you create. It is recommended to rename your first category and your first forum and copy permissions from these while creating new categories and forums. Have fun!', '5dd683b17f641daf84c040bfefc58ce9', 0, '', '', 1, 0, '', 0, 0, 0),(16, 5, 2, 2, 0, '81.141.32.136', 1214248910, 1, 0, 1, 1, 1, 1, '', 'For more info for your forum?', 'Visit [url=http&#58;//www&#46;modphpbb3&#46;com:1xnwbcqg]ModphpBB3.com[/url:1xnwbcqg]\n\nor visit our community at [url=http&#58;//www&#46;modphpbb3&#46;com/forum:1xnwbcqg]ModphpBB3 Community[/url:1xnwbcqg]', '63bbf026ad94fd5df3d4cbe488e39281', 0, 'EA==', '1xnwbcqg', 1, 0, '', 0, 0, 0),(18, 6, 2, 2, 0, '81.141.32.136', 1214492223, 1, 0, 1, 1, 1, 1, '', 'Attachment test', 'Test Highslide Example\n\n[attachment=0:27db7hca]<!-- ia0 -->Jesus_Saves.jpg<!-- ia0 -->[/attachment:27db7hca]', '5f2c124061110a35d082ba3a9072c5a0', 1, 'AAg=', '27db7hca', 1, 0, '', 0, 0, 0),(19, 6, 2, 2, 0, '81.141.32.136', 1214492376, 1, 0, 1, 1, 1, 1, '', 'Re: Attachment test', 'Attachment with comment : Not placing inline', '28163bb65060fd0fbd948d564157a27f', 1, '', 'bq2q2il3', 1, 0, '', 0, 0, 0),(28, 7, 2, 2, 0, '81.141.37.199', 1225015363, 1, 0, 1, 1, 1, 1, '', 'Modfication List', 'ACP Announcement centre \nLast Posts Titles\nPhpbb Arcade\nPhpbb Gallery\nMore BBCodes\nAdvertisement Mod\nWho Was Here\nPrime Notify PM\nNotify Admin on Registration\nAjax Chat\nSimple ACP PM Read\nPrime Quick Reply\nContact Admin \nUpcoming Birthdays\nAjax Shoutbox\nPrime Warnings\nACP Add User\nChange User\'s Post Count\nGenders\nAdded RSS Feed\nUser Reminder Mod\nTop posters on index\nEmail users on Birthday\nWho Posted\nLog New User\nPrime Links (fixes external phpbb3 links)\nAdvanced meta tags\nHighslide Image Attachments\nUniversal No Avatar\nTopic in Who is Online\nBan List Mod\nActivity Stats\nUser ID in Viewtopic\nAdvertisement Management\nCountry Flags\nForum Favourites\nAdded more bots', '19d448948a2f194031441ac907271108', 0, '', '1ayfzxfa', 1, 0, '', 0, 0, 0);

# Table: phpbb_privmsgs
DROP TABLE IF EXISTS phpbb_privmsgs;
CREATE TABLE `phpbb_privmsgs` (
  `msg_id` mediumint(8) unsigned NOT NULL auto_increment,
  `root_level` mediumint(8) unsigned NOT NULL default '0',
  `author_id` mediumint(8) unsigned NOT NULL default '0',
  `icon_id` mediumint(8) unsigned NOT NULL default '0',
  `author_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `message_time` int(11) unsigned NOT NULL default '0',
  `enable_bbcode` tinyint(1) unsigned NOT NULL default '1',
  `enable_smilies` tinyint(1) unsigned NOT NULL default '1',
  `enable_magic_url` tinyint(1) unsigned NOT NULL default '1',
  `enable_sig` tinyint(1) unsigned NOT NULL default '1',
  `message_subject` varchar(255) collate utf8_bin NOT NULL default '',
  `message_text` mediumtext collate utf8_bin NOT NULL,
  `message_edit_reason` varchar(255) collate utf8_bin NOT NULL default '',
  `message_edit_user` mediumint(8) unsigned NOT NULL default '0',
  `message_attachment` tinyint(1) unsigned NOT NULL default '0',
  `bbcode_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `bbcode_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `message_edit_time` int(11) unsigned NOT NULL default '0',
  `message_edit_count` smallint(4) unsigned NOT NULL default '0',
  `to_address` text collate utf8_bin NOT NULL,
  `bcc_address` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`msg_id`),
  KEY `author_ip` (`author_ip`),
  KEY `message_time` (`message_time`),
  KEY `author_id` (`author_id`),
  KEY `root_level` (`root_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_privmsgs (msg_id, root_level, author_id, icon_id, author_ip, message_time, enable_bbcode, enable_smilies, enable_magic_url, enable_sig, message_subject, message_text, message_edit_reason, message_edit_user, message_attachment, bbcode_bitfield, bbcode_uid, message_edit_time, message_edit_count, to_address, bcc_address) VALUES (1, 0, 2, 0, '81.141.32.249', 1204815717, 1, 1, 0, 0, 'Welcome', 'Welcome testuser<br /><br />May we welcome you to yourdomain.com<br /><br />This is the demo of Welcome PM on First Login, to edit this go to admin-general-Board configuration<br />Your user id must match that of the database, in this case admin is 2<br /><br />Cheers', '', 0, 0, '', '', 0, 0, 'u_53', ''),(2, 0, 2, 0, '81.141.32.249', 1204815815, 1, 1, 0, 0, 'Board warning issued', 'The following is a warning which has been issued to you by an administrator or moderator of this site.[quote:1jjuie2i]This is a warning regarding the following post made by you: <!-- l --><a class=\"postlink-local\" href=\"http://www.lawsondigitalmedia.co.uk/demo-forum/viewtopic.php?f=2&amp;p=10#p10\">viewtopic.php?f=2&amp;p=10#p10</a><!-- l --> .[/quote:1jjuie2i]', '', 0, 0, 'gA==', '1jjuie2i', 0, 0, 'u_53', ''),(3, 0, 2, 0, '81.141.32.136', 1214349231, 1, 1, 0, 0, 'Welcome', 'Welcome test<br /><br />May we welcome you to ModphpBB3 Demo<br /><br />This is the demo of Welcome PM on First Login, to edit this go to admin-general-Board configuration<br />Your user id must match that of the database, in this case admin is 2<br /><br />Cheers', '', 0, 0, '', '', 0, 0, 'u_54', ''),(4, 0, 2, 0, '81.141.32.136', 1214353421, 1, 1, 0, 0, 'Board warning issued', 'The following is a warning which has been issued to you by an administrator or moderator of this site.[quote:2ukgkudd]test[/quote:2ukgkudd]', '', 0, 0, 'gA==', '2ukgkudd', 0, 0, 'u_54', '');

# Table: phpbb_privmsgs_folder
DROP TABLE IF EXISTS phpbb_privmsgs_folder;
CREATE TABLE `phpbb_privmsgs_folder` (
  `folder_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `folder_name` varchar(255) collate utf8_bin NOT NULL default '',
  `pm_count` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`folder_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_privmsgs_rules
DROP TABLE IF EXISTS phpbb_privmsgs_rules;
CREATE TABLE `phpbb_privmsgs_rules` (
  `rule_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `rule_check` mediumint(8) unsigned NOT NULL default '0',
  `rule_connection` mediumint(8) unsigned NOT NULL default '0',
  `rule_string` varchar(255) collate utf8_bin NOT NULL default '',
  `rule_user_id` mediumint(8) unsigned NOT NULL default '0',
  `rule_group_id` mediumint(8) unsigned NOT NULL default '0',
  `rule_action` mediumint(8) unsigned NOT NULL default '0',
  `rule_folder_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`rule_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_privmsgs_to
DROP TABLE IF EXISTS phpbb_privmsgs_to;
CREATE TABLE `phpbb_privmsgs_to` (
  `msg_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `author_id` mediumint(8) unsigned NOT NULL default '0',
  `pm_deleted` tinyint(1) unsigned NOT NULL default '0',
  `pm_new` tinyint(1) unsigned NOT NULL default '1',
  `pm_unread` tinyint(1) unsigned NOT NULL default '1',
  `pm_replied` tinyint(1) unsigned NOT NULL default '0',
  `pm_marked` tinyint(1) unsigned NOT NULL default '0',
  `pm_forwarded` tinyint(1) unsigned NOT NULL default '0',
  `folder_id` int(11) NOT NULL default '0',
  KEY `msg_id` (`msg_id`),
  KEY `author_id` (`author_id`),
  KEY `usr_flder_id` (`user_id`,`folder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_privmsgs_to (msg_id, user_id, author_id, pm_deleted, pm_new, pm_unread, pm_replied, pm_marked, pm_forwarded, folder_id) VALUES (3, 54, 2, 0, 0, 0, 0, 0, 0, 0),(4, 54, 2, 0, 1, 1, 0, 0, 0, -3);

# Table: phpbb_profile_fields
DROP TABLE IF EXISTS phpbb_profile_fields;
CREATE TABLE `phpbb_profile_fields` (
  `field_id` mediumint(8) unsigned NOT NULL auto_increment,
  `field_name` varchar(255) collate utf8_bin NOT NULL default '',
  `field_type` tinyint(4) NOT NULL default '0',
  `field_ident` varchar(20) collate utf8_bin NOT NULL default '',
  `field_length` varchar(20) collate utf8_bin NOT NULL default '',
  `field_minlen` varchar(255) collate utf8_bin NOT NULL default '',
  `field_maxlen` varchar(255) collate utf8_bin NOT NULL default '',
  `field_novalue` varchar(255) collate utf8_bin NOT NULL default '',
  `field_default_value` varchar(255) collate utf8_bin NOT NULL default '',
  `field_validation` varchar(20) collate utf8_bin NOT NULL default '',
  `field_required` tinyint(1) unsigned NOT NULL default '0',
  `field_show_on_reg` tinyint(1) unsigned NOT NULL default '0',
  `field_hide` tinyint(1) unsigned NOT NULL default '0',
  `field_no_view` tinyint(1) unsigned NOT NULL default '0',
  `field_active` tinyint(1) unsigned NOT NULL default '0',
  `field_order` mediumint(8) unsigned NOT NULL default '0',
  `field_admin` tinyint(1) unsigned NOT NULL default '0',
  `field_show_profile` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`field_id`),
  KEY `fld_type` (`field_type`),
  KEY `fld_ordr` (`field_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_profile_fields_data
DROP TABLE IF EXISTS phpbb_profile_fields_data;
CREATE TABLE `phpbb_profile_fields_data` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_profile_fields_lang
DROP TABLE IF EXISTS phpbb_profile_fields_lang;
CREATE TABLE `phpbb_profile_fields_lang` (
  `field_id` mediumint(8) unsigned NOT NULL default '0',
  `lang_id` mediumint(8) unsigned NOT NULL default '0',
  `option_id` mediumint(8) unsigned NOT NULL default '0',
  `field_type` tinyint(4) NOT NULL default '0',
  `lang_value` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`field_id`,`lang_id`,`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_profile_lang
DROP TABLE IF EXISTS phpbb_profile_lang;
CREATE TABLE `phpbb_profile_lang` (
  `field_id` mediumint(8) unsigned NOT NULL default '0',
  `lang_id` mediumint(8) unsigned NOT NULL default '0',
  `lang_name` varchar(255) collate utf8_bin NOT NULL default '',
  `lang_explain` text collate utf8_bin NOT NULL,
  `lang_default_value` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`field_id`,`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_ranks
DROP TABLE IF EXISTS phpbb_ranks;
CREATE TABLE `phpbb_ranks` (
  `rank_id` mediumint(8) unsigned NOT NULL auto_increment,
  `rank_title` varchar(255) collate utf8_bin NOT NULL default '',
  `rank_min` mediumint(8) unsigned NOT NULL default '0',
  `rank_special` tinyint(1) unsigned NOT NULL default '0',
  `rank_image` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`rank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_ranks (rank_id, rank_title, rank_min, rank_special, rank_image) VALUES (1, 'Site Admin', 0, 1, '');

# Table: phpbb_reports
DROP TABLE IF EXISTS phpbb_reports;
CREATE TABLE `phpbb_reports` (
  `report_id` mediumint(8) unsigned NOT NULL auto_increment,
  `reason_id` smallint(4) unsigned NOT NULL default '0',
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `user_notify` tinyint(1) unsigned NOT NULL default '0',
  `report_closed` tinyint(1) unsigned NOT NULL default '0',
  `report_time` int(11) unsigned NOT NULL default '0',
  `report_text` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_reports_reasons
DROP TABLE IF EXISTS phpbb_reports_reasons;
CREATE TABLE `phpbb_reports_reasons` (
  `reason_id` smallint(4) unsigned NOT NULL auto_increment,
  `reason_title` varchar(255) collate utf8_bin NOT NULL default '',
  `reason_description` mediumtext collate utf8_bin NOT NULL,
  `reason_order` smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`reason_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_reports_reasons (reason_id, reason_title, reason_description, reason_order) VALUES (1, 'warez', 'The post contains links to illegal or pirated software.', 1),(2, 'spam', 'The reported post has the only purpose to advertise for a website or another product.', 2),(3, 'off_topic', 'The reported post is off topic.', 3),(4, 'other', 'The reported post does not fit into any other category, please use the further information field.', 4);

# Table: phpbb_search_results
DROP TABLE IF EXISTS phpbb_search_results;
CREATE TABLE `phpbb_search_results` (
  `search_key` varchar(32) collate utf8_bin NOT NULL default '',
  `search_time` int(11) unsigned NOT NULL default '0',
  `search_keywords` mediumtext collate utf8_bin NOT NULL,
  `search_authors` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`search_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_search_wordlist
DROP TABLE IF EXISTS phpbb_search_wordlist;
CREATE TABLE `phpbb_search_wordlist` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word_text` varchar(255) collate utf8_bin NOT NULL default '',
  `word_common` tinyint(1) unsigned NOT NULL default '0',
  `word_count` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`word_id`),
  UNIQUE KEY `wrd_txt` (`word_text`),
  KEY `wrd_cnt` (`word_count`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common, word_count) VALUES (1, 'this', 0, 1),(2, 'example', 0, 2),(3, 'post', 0, 2),(4, 'your', 0, 2),(5, 'phpbb3', 0, 3),(6, 'installation', 0, 1),(7, 'everything', 0, 1),(8, 'seems', 0, 1),(9, 'working', 0, 1),(10, 'you', 0, 1),(11, 'may', 0, 1),(12, 'delete', 0, 1),(13, 'like', 0, 1),(14, 'and', 0, 1),(15, 'continue', 0, 1),(16, 'set', 0, 1),(17, 'board', 0, 1),(18, 'during', 0, 1),(19, 'the', 0, 1),(20, 'process', 0, 1),(21, 'first', 0, 1),(22, 'category', 0, 1),(23, 'forum', 0, 3),(24, 'are', 0, 1),(25, 'assigned', 0, 1),(26, 'appropriate', 0, 1),(27, 'permissions', 0, 1),(28, 'for', 0, 2),(29, 'predefined', 0, 1),(30, 'usergroups', 0, 1),(31, 'administrators', 0, 1),(32, 'bots', 0, 2),(33, 'global', 0, 1),(34, 'moderators', 0, 1),(35, 'guests', 0, 1),(36, 'registered', 0, 1),(37, 'users', 0, 2),(38, 'coppa', 0, 1),(39, 'also', 0, 1),(40, 'choose', 0, 1),(41, 'not', 0, 2),(42, 'forget', 0, 1),(43, 'assign', 0, 1),(44, 'all', 0, 1),(45, 'these', 0, 1),(46, 'new', 0, 3),(47, 'categories', 0, 1),(48, 'forums', 0, 1),(49, 'create', 0, 1),(50, 'recommended', 0, 1),(51, 'rename', 0, 1),(52, 'copy', 0, 1),(53, 'from', 0, 1),(54, 'while', 0, 1),(55, 'creating', 0, 1),(56, 'have', 0, 1),(57, 'fun', 0, 1),(58, 'welcome', 0, 1),(59, 'modifications', 0, 4),(60, 'added', 0, 2),(61, 'acp', 0, 2),(62, 'announcement', 0, 1),(63, 'centre', 0, 1),(64, 'last', 0, 1),(65, 'posts', 0, 1),(66, 'titles', 0, 1),(67, 'phpbb', 0, 3),(68, 'arcade', 0, 2),(69, 'jrsweets', 0, 0),(70, 'mods', 0, 0),(71, 'database', 0, 0),(72, 'gallery', 0, 2),(73, 'test', 0, 3),(74, 'advanced', 0, 1),(75, 'bbcode', 0, 0),(76, 'box', 0, 0),(77, 'advertisement', 0, 1),(78, 'mod', 0, 2),(79, 'rules', 0, 0),(80, 'login', 0, 0),(81, 'evil', 0, 1),(82, 'quick', 0, 2),(83, 'reply', 0, 2),(84, 'who', 0, 2),(85, 'was', 0, 1),(86, 'here', 0, 1),(87, 'prime', 0, 4),(88, 'notify', 0, 1),(89, 'admin', 0, 2),(90, 'registration', 0, 1),(91, 'more', 0, 2),(92, 'bbcodes', 0, 1),(93, 'ajax', 0, 2),(94, 'chat', 0, 1),(95, '0b8', 0, 0),(96, 'simple', 0, 1),(97, 'read', 0, 1),(98, 'version', 0, 0),(99, 'modphpbb3', 0, 1),(100, 'beta', 0, 1),(101, 'additions', 0, 0),(102, 'changelog', 0, 0),(103, 'removed', 0, 0),(104, 'fixed', 0, 1),(105, 'typo', 0, 0),(106, 'contact', 0, 1),(107, 'upcoming', 0, 1),(108, 'birthdays', 0, 1),(109, 'shoutbox', 0, 1),(110, 'warnings', 0, 1),(111, 'add', 0, 1),(112, 'user', 0, 2),(113, 'change', 0, 1),(114, 'count', 0, 1),(115, 'genders', 0, 1),(116, 'ewdwdwwdwdwdwedewd', 0, 0),(117, 'upgraded', 0, 1),(118, 'register', 0, 0),(119, 'bug', 0, 0),(120, 'subsilver2', 0, 0),(121, 'rss', 0, 1),(122, 'feed', 0, 1),(123, 'reminder', 0, 1),(124, 'top', 0, 1),(125, 'posters', 0, 1),(126, 'index', 0, 1),(127, 'email', 0, 1),(128, 'birthday', 0, 1),(129, 'posted', 0, 1),(130, 'log', 0, 1),(131, 'links', 0, 1),(132, 'fixes', 0, 1),(133, 'external', 0, 1),(134, 'visit', 0, 1),(135, 'com', 0, 1),(136, 'our', 0, 1),(137, 'community', 0, 1),(138, 'info', 0, 1),(139, '2rc1', 0, 0),(140, 'meta', 0, 1),(141, 'tags', 0, 1),(142, 'highslide', 0, 2),(143, 'jesus', 0, 1),(144, 'saves', 0, 1),(145, 'jpg', 0, 1),(146, 'attachment', 0, 3),(147, 'with', 0, 1),(148, 'comment', 0, 1),(149, 'placing', 0, 1),(150, 'inline', 0, 1),(151, 'http', 0, 0),(152, 'www', 0, 0),(153, 'theshedend', 0, 0),(154, 'style', 0, 0),(155, 'images', 0, 0),(156, '23glassybl', 0, 0),(157, 'logo4', 0, 0),(158, 'gif', 0, 0),(159, 'filebuzz', 0, 0),(160, 'software', 0, 0),(161, 'screenshot', 0, 0),(162, 'full', 0, 0),(163, '34596', 0, 0),(164, 'vombashots', 0, 0),(165, 'manager', 0, 0),(166, '7000', 0, 0),(167, 'wallpapers', 0, 0),(168, 'image', 0, 1),(169, 'attachments', 0, 1),(170, 'modfication', 0, 1),(171, 'list', 0, 2),(172, 'universal', 0, 1),(173, 'avatar', 0, 1),(174, 'topic', 0, 1),(175, 'online', 0, 1),(176, 'ban', 0, 1),(177, 'activity', 0, 1),(178, 'stats', 0, 1),(179, 'viewtopic', 0, 1),(180, 'management', 0, 1),(181, 'country', 0, 1),(182, 'flags', 0, 1),(183, 'favourites', 0, 1),(184, 'after', 0, 0),(185, 'upgrade', 0, 0);

# Table: phpbb_search_wordmatch
DROP TABLE IF EXISTS phpbb_search_wordmatch;
CREATE TABLE `phpbb_search_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `word_id` mediumint(8) unsigned NOT NULL default '0',
  `title_match` tinyint(1) unsigned NOT NULL default '0',
  UNIQUE KEY `unq_mtch` (`word_id`,`post_id`,`title_match`),
  KEY `word_id` (`word_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_search_wordmatch (post_id, word_id, title_match) VALUES (1, 1, 0),(1, 2, 0),(18, 2, 0),(1, 3, 0),(28, 3, 0),(1, 4, 0),(16, 4, 1),(1, 5, 0),(1, 5, 1),(28, 5, 0),(1, 6, 0),(1, 7, 0),(1, 8, 0),(1, 9, 0),(1, 10, 0),(1, 11, 0),(1, 12, 0),(1, 13, 0),(1, 14, 0),(1, 15, 0),(1, 16, 0),(1, 17, 0),(1, 18, 0),(1, 19, 0),(1, 20, 0),(1, 21, 0),(1, 22, 0),(1, 23, 0),(16, 23, 1),(28, 23, 0),(1, 24, 0),(1, 25, 0),(1, 26, 0),(1, 27, 0),(1, 28, 0),(16, 28, 1),(1, 29, 0),(1, 30, 0),(1, 31, 0),(1, 32, 0),(28, 32, 0),(1, 33, 0),(1, 34, 0),(1, 35, 0),(1, 36, 0),(1, 37, 0),(28, 37, 0),(1, 38, 0),(1, 39, 0),(1, 40, 0),(1, 41, 0),(19, 41, 0),(1, 42, 0),(1, 43, 0),(1, 44, 0),(1, 45, 0),(1, 46, 0),(28, 46, 0),(1, 47, 0),(1, 48, 0),(1, 49, 0),(1, 50, 0),(1, 51, 0),(1, 52, 0),(1, 53, 0),(1, 54, 0),(1, 55, 0),(1, 56, 0),(1, 57, 0),(1, 58, 1),(28, 60, 0),(28, 61, 0),(28, 62, 0),(28, 63, 0),(28, 64, 0),(28, 65, 0),(28, 66, 0),(28, 67, 0),(28, 68, 0),(28, 72, 0),(18, 73, 0),(18, 73, 1),(19, 73, 1),(28, 74, 0),(28, 77, 0),(28, 78, 0),(28, 82, 0),(28, 83, 0),(28, 84, 0),(28, 85, 0),(28, 86, 0),(28, 87, 0),(28, 88, 0),(28, 89, 0),(28, 90, 0),(16, 91, 1),(28, 91, 0),(28, 92, 0),(28, 93, 0),(28, 94, 0),(28, 96, 0),(28, 97, 0),(16, 99, 0),(28, 106, 0),(28, 107, 0),(28, 108, 0),(28, 109, 0),(28, 110, 0),(28, 111, 0),(28, 112, 0),(28, 113, 0),(28, 114, 0),(28, 115, 0),(28, 121, 0),(28, 122, 0),(28, 123, 0),(28, 124, 0),(28, 125, 0),(28, 126, 0),(28, 127, 0),(28, 128, 0),(28, 129, 0),(28, 130, 0),(28, 131, 0),(28, 132, 0),(28, 133, 0),(16, 134, 0),(16, 135, 0),(16, 136, 0),(16, 137, 0),(16, 138, 1),(28, 140, 0),(28, 141, 0),(18, 142, 0),(28, 142, 0),(18, 143, 0),(18, 144, 0),(18, 145, 0),(18, 146, 1),(19, 146, 0),(19, 146, 1),(19, 147, 0),(19, 148, 0),(19, 149, 0),(19, 150, 0),(28, 168, 0),(28, 169, 0),(28, 170, 1),(28, 171, 0),(28, 171, 1),(28, 172, 0),(28, 173, 0),(28, 174, 0),(28, 175, 0),(28, 176, 0),(28, 177, 0),(28, 178, 0),(28, 179, 0),(28, 180, 0),(28, 181, 0),(28, 182, 0),(28, 183, 0);

# Table: phpbb_sessions
DROP TABLE IF EXISTS phpbb_sessions;
CREATE TABLE `phpbb_sessions` (
  `session_id` char(32) collate utf8_bin NOT NULL default '',
  `session_user_id` mediumint(8) unsigned NOT NULL default '0',
  `session_last_visit` int(11) unsigned NOT NULL default '0',
  `session_start` int(11) unsigned NOT NULL default '0',
  `session_time` int(11) unsigned NOT NULL default '0',
  `session_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `session_browser` varchar(150) collate utf8_bin NOT NULL default '',
  `session_forwarded_for` varchar(255) collate utf8_bin NOT NULL default '',
  `session_page` varchar(255) collate utf8_bin NOT NULL default '',
  `session_viewonline` tinyint(1) unsigned NOT NULL default '1',
  `session_autologin` tinyint(1) unsigned NOT NULL default '0',
  `session_admin` tinyint(1) unsigned NOT NULL default '0',
  `session_forum_id` mediumint(8) unsigned NOT NULL default '0',
  `session_album_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `session_time` (`session_time`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_fid` (`session_forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_sessions (session_id, session_user_id, session_last_visit, session_start, session_time, session_ip, session_browser, session_forwarded_for, session_page, session_viewonline, session_autologin, session_admin, session_forum_id, session_album_id) VALUES ('3044d96fc53e78d2e93c02ad636c978b', 13, 1229706724, 1227187079, 1229706724, '66.249.65.99', 'Mediapartners-Google', '', 'ucp.php?i=266', 1, 0, 0, 0, 0),('d89239c30f454c1de8dcee9af3b59851', 2, 1229450173, 1229705436, 1229708513, '81.141.37.131', 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.9.0.4) Gecko/2008102920 Firefox/3.0.4', '', 'adm/index.php?i=database&mode=backup&action=download', 1, 0, 1, 0, 0);

# Table: phpbb_sessions_keys
DROP TABLE IF EXISTS phpbb_sessions_keys;
CREATE TABLE `phpbb_sessions_keys` (
  `key_id` char(32) collate utf8_bin NOT NULL default '',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `last_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `last_login` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`key_id`,`user_id`),
  KEY `last_login` (`last_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_shoutbox
DROP TABLE IF EXISTS phpbb_shoutbox;
CREATE TABLE `phpbb_shoutbox` (
  `shout_id` int(11) unsigned NOT NULL auto_increment,
  `shout_user_id` mediumint(8) NOT NULL,
  `shout_time` int(11) NOT NULL,
  `shout_ip` varchar(32) character set latin1 NOT NULL,
  `shout_text` text collate utf8_bin NOT NULL,
  `shout_bbcode_bitfield` varchar(255) character set latin1 NOT NULL,
  `shout_bbcode_uid` varchar(8) character set latin1 NOT NULL,
  `shout_bbcode_flags` int(11) unsigned NOT NULL default '7',
  PRIMARY KEY  (`shout_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_shoutbox (shout_id, shout_user_id, shout_time, shout_ip, shout_text, shout_bbcode_bitfield, shout_bbcode_uid, shout_bbcode_flags) VALUES (5, 2, 1215966186, '81.141.32.136', 'test theme', '', '', 7),(6, 2, 1215966191, '81.141.32.136', 'test', '', '', 7);

# Table: phpbb_sitelist
DROP TABLE IF EXISTS phpbb_sitelist;
CREATE TABLE `phpbb_sitelist` (
  `site_id` mediumint(8) unsigned NOT NULL auto_increment,
  `site_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `site_hostname` varchar(255) collate utf8_bin NOT NULL default '',
  `ip_exclude` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_smilies
DROP TABLE IF EXISTS phpbb_smilies;
CREATE TABLE `phpbb_smilies` (
  `smiley_id` mediumint(8) unsigned NOT NULL auto_increment,
  `code` varchar(50) collate utf8_bin NOT NULL default '',
  `emotion` varchar(50) collate utf8_bin NOT NULL default '',
  `smiley_url` varchar(50) collate utf8_bin NOT NULL default '',
  `smiley_width` smallint(4) unsigned NOT NULL default '0',
  `smiley_height` smallint(4) unsigned NOT NULL default '0',
  `smiley_order` mediumint(8) unsigned NOT NULL default '0',
  `display_on_posting` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`smiley_id`),
  KEY `display_on_post` (`display_on_posting`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_smilies (smiley_id, code, emotion, smiley_url, smiley_width, smiley_height, smiley_order, display_on_posting) VALUES (1, ':D', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 1, 1),(2, ':-D', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 2, 1),(3, ':grin:', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 3, 1),(4, ':)', 'Smile', 'icon_e_smile.gif', 15, 17, 4, 1),(5, ':-)', 'Smile', 'icon_e_smile.gif', 15, 17, 5, 1),(6, ':smile:', 'Smile', 'icon_e_smile.gif', 15, 17, 6, 1),(7, ';)', 'Wink', 'icon_e_wink.gif', 15, 17, 7, 1),(8, ';-)', 'Wink', 'icon_e_wink.gif', 15, 17, 8, 1),(9, ':wink:', 'Wink', 'icon_e_wink.gif', 15, 17, 9, 1),(10, ':(', 'Sad', 'icon_e_sad.gif', 15, 17, 10, 1),(11, ':-(', 'Sad', 'icon_e_sad.gif', 15, 17, 11, 1),(12, ':sad:', 'Sad', 'icon_e_sad.gif', 15, 17, 12, 1),(13, ':o', 'Surprised', 'icon_e_surprised.gif', 15, 19, 13, 1),(14, ':-o', 'Surprised', 'icon_e_surprised.gif', 15, 19, 14, 1),(15, ':eek:', 'Surprised', 'icon_e_surprised.gif', 15, 19, 15, 1),(16, ':shock:', 'Shocked', 'icon_eek.gif', 15, 15, 16, 1),(17, ':?', 'Confused', 'icon_e_confused.gif', 15, 17, 17, 1),(18, ':-?', 'Confused', 'icon_e_confused.gif', 15, 17, 18, 1),(19, ':???:', 'Confused', 'icon_e_confused.gif', 15, 17, 19, 1),(20, '8-)', 'Cool', 'icon_cool.gif', 15, 15, 20, 1),(21, ':cool:', 'Cool', 'icon_cool.gif', 15, 15, 21, 1),(22, ':lol:', 'Laughing', 'icon_lol.gif', 15, 15, 22, 1),(23, ':x', 'Mad', 'icon_mad.gif', 15, 15, 23, 1),(24, ':-x', 'Mad', 'icon_mad.gif', 15, 15, 24, 1),(25, ':mad:', 'Mad', 'icon_mad.gif', 15, 15, 25, 1),(26, ':P', 'Razz', 'icon_razz.gif', 15, 15, 26, 1),(27, ':-P', 'Razz', 'icon_razz.gif', 15, 15, 27, 1),(28, ':razz:', 'Razz', 'icon_razz.gif', 15, 15, 28, 1),(29, ':oops:', 'Embarrassed', 'icon_redface.gif', 15, 15, 29, 1),(30, ':cry:', 'Crying or Very Sad', 'icon_cry.gif', 15, 15, 30, 1),(31, ':evil:', 'Evil or Very Mad', 'icon_evil.gif', 15, 15, 31, 1),(32, ':twisted:', 'Twisted Evil', 'icon_twisted.gif', 15, 15, 32, 1),(33, ':roll:', 'Rolling Eyes', 'icon_rolleyes.gif', 15, 15, 33, 1),(34, ':!:', 'Exclamation', 'icon_exclaim.gif', 15, 15, 34, 1),(35, ':?:', 'Question', 'icon_question.gif', 15, 15, 35, 1),(36, ':idea:', 'Idea', 'icon_idea.gif', 15, 15, 36, 1),(37, ':arrow:', 'Arrow', 'icon_arrow.gif', 15, 15, 37, 1),(38, ':|', 'Neutral', 'icon_neutral.gif', 15, 15, 38, 1),(39, ':-|', 'Neutral', 'icon_neutral.gif', 15, 15, 39, 1),(40, ':mrgreen:', 'Mr. Green', 'icon_mrgreen.gif', 15, 15, 40, 1),(41, ':geek:', 'Geek', 'icon_e_geek.gif', 17, 17, 41, 1),(42, ':ugeek:', 'Uber Geek', 'icon_e_ugeek.gif', 19, 18, 42, 1);

# Table: phpbb_styles
DROP TABLE IF EXISTS phpbb_styles;
CREATE TABLE `phpbb_styles` (
  `style_id` mediumint(8) unsigned NOT NULL auto_increment,
  `style_name` varchar(255) collate utf8_bin NOT NULL default '',
  `style_copyright` varchar(255) collate utf8_bin NOT NULL default '',
  `style_active` tinyint(1) unsigned NOT NULL default '1',
  `template_id` mediumint(8) unsigned NOT NULL default '0',
  `theme_id` mediumint(8) unsigned NOT NULL default '0',
  `imageset_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`style_id`),
  UNIQUE KEY `style_name` (`style_name`),
  KEY `template_id` (`template_id`),
  KEY `theme_id` (`theme_id`),
  KEY `imageset_id` (`imageset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_styles (style_id, style_name, style_copyright, style_active, template_id, theme_id, imageset_id) VALUES (1, 'prosilver', '&copy; phpBB Group', 1, 1, 1, 1),(2, 'subsilver2', '&copy; 2005 phpBB Group', 1, 2, 2, 2);

# Table: phpbb_styles_imageset
DROP TABLE IF EXISTS phpbb_styles_imageset;
CREATE TABLE `phpbb_styles_imageset` (
  `imageset_id` mediumint(8) unsigned NOT NULL auto_increment,
  `imageset_name` varchar(255) collate utf8_bin NOT NULL default '',
  `imageset_copyright` varchar(255) collate utf8_bin NOT NULL default '',
  `imageset_path` varchar(100) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`imageset_id`),
  UNIQUE KEY `imgset_nm` (`imageset_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_styles_imageset (imageset_id, imageset_name, imageset_copyright, imageset_path) VALUES (1, 'prosilver', '&copy; phpBB Group', 'prosilver'),(2, 'subsilver2', '&copy; phpBB Group, 2003', 'subsilver2');

# Table: phpbb_styles_imageset_data
DROP TABLE IF EXISTS phpbb_styles_imageset_data;
CREATE TABLE `phpbb_styles_imageset_data` (
  `image_id` mediumint(8) unsigned NOT NULL auto_increment,
  `image_name` varchar(200) collate utf8_bin NOT NULL default '',
  `image_filename` varchar(200) collate utf8_bin NOT NULL default '',
  `image_lang` varchar(30) collate utf8_bin NOT NULL default '',
  `image_height` smallint(4) unsigned NOT NULL default '0',
  `image_width` smallint(4) unsigned NOT NULL default '0',
  `imageset_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`image_id`),
  KEY `i_d` (`imageset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_styles_imageset_data (image_id, image_name, image_filename, image_lang, image_height, image_width, imageset_id) VALUES (1614, 'icon_user_online', 'icon_user_online.gif', 'en', 58, 58, 1),(1613, 'icon_post_quote', 'icon_post_quote.gif', 'en', 20, 54, 1),(1612, 'icon_post_edit', 'icon_post_edit.gif', 'en', 20, 42, 1),(1611, 'icon_contact_pm', 'icon_contact_pm.gif', 'en', 20, 28, 1),(1609, 'icon_gender_m', 'icon_gender_m.gif', '', 0, 0, 1),(1610, 'icon_gender_f', 'icon_gender_f.gif', '', 0, 0, 1),(1608, 'icon_gender_x', 'icon_gender_x.gif', '', 0, 0, 1),(1607, 'icon_user_warn', 'icon_user_warn.gif', '', 20, 20, 1),(1605, 'icon_topic_reported', 'icon_topic_reported.gif', '', 14, 16, 1),(1606, 'icon_topic_unapproved', 'icon_topic_unapproved.gif', '', 14, 16, 1),(1604, 'icon_topic_newest', 'icon_topic_newest.gif', '', 9, 11, 1),(1603, 'icon_topic_latest', 'icon_topic_latest.gif', '', 9, 11, 1),(1602, 'icon_topic_attach', 'icon_topic_attach.gif', '', 10, 7, 1),(1601, 'icon_post_target_unread', 'icon_post_target_unread.gif', '', 9, 11, 1),(1600, 'icon_post_target', 'icon_post_target.gif', '', 9, 11, 1),(1599, 'icon_post_report', 'icon_post_report.gif', '', 20, 20, 1),(1598, 'icon_post_info', 'icon_post_info.gif', '', 20, 20, 1),(1597, 'icon_post_delete', 'icon_post_delete.gif', '', 20, 20, 1),(1596, 'icon_contact_yahoo', 'icon_contact_yahoo.gif', '', 20, 20, 1),(1595, 'icon_contact_www', 'icon_contact_www.gif', '', 20, 20, 1),(1594, 'icon_contact_msnm', 'icon_contact_msnm.gif', '', 20, 20, 1),(1592, 'icon_contact_icq', 'icon_contact_icq.gif', '', 20, 20, 1),(1593, 'icon_contact_jabber', 'icon_contact_jabber.gif', '', 20, 20, 1),(1591, 'icon_contact_email', 'icon_contact_email.gif', '', 20, 20, 1),(1590, 'icon_contact_aim', 'icon_contact_aim.gif', '', 20, 20, 1),(1589, 'icon_back_top', 'icon_back_top.gif', '', 11, 11, 1),(1587, 'pm_read', 'topic_read.gif', '', 27, 27, 1),(1588, 'pm_unread', 'topic_unread.gif', '', 27, 27, 1),(1586, 'subforum_unread', 'subforum_unread.gif', '', 9, 11, 1),(1585, 'subforum_read', 'subforum_read.gif', '', 9, 11, 1),(1584, 'global_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 27, 27, 1),(1583, 'global_unread_locked', 'announce_unread_locked.gif', '', 27, 27, 1),(1582, 'global_unread_mine', 'announce_unread_mine.gif', '', 27, 27, 1),(1580, 'global_read_locked_mine', 'announce_read_locked_mine.gif', '', 27, 27, 1),(1581, 'global_unread', 'announce_unread.gif', '', 27, 27, 1),(1579, 'global_read_locked', 'announce_read_locked.gif', '', 27, 27, 1),(1578, 'global_read_mine', 'announce_read_mine.gif', '', 27, 27, 1),(1576, 'announce_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 27, 27, 1),(1577, 'global_read', 'announce_read.gif', '', 27, 27, 1),(1575, 'announce_unread_locked', 'announce_unread_locked.gif', '', 27, 27, 1),(1574, 'announce_unread_mine', 'announce_unread_mine.gif', '', 27, 27, 1),(1572, 'announce_read_locked_mine', 'announce_read_locked_mine.gif', '', 27, 27, 1),(1573, 'announce_unread', 'announce_unread.gif', '', 27, 27, 1),(1571, 'announce_read_locked', 'announce_read_locked.gif', '', 27, 27, 1),(1699, 'icon_user_search', 'icon_user_search.gif', 'en', 0, 0, 2),(1697, 'icon_user_offline', 'icon_user_offline.gif', 'en', 0, 0, 2),(1698, 'icon_user_profile', 'icon_user_profile.gif', 'en', 0, 0, 2),(1696, 'icon_user_online', 'icon_user_online.gif', 'en', 0, 0, 2),(1694, 'icon_post_quote', 'icon_post_quote.gif', 'en', 0, 0, 2),(1695, 'icon_post_report', 'icon_post_report.gif', 'en', 0, 0, 2),(1693, 'icon_post_info', 'icon_post_info.gif', 'en', 0, 0, 2),(1691, 'icon_post_delete', 'icon_post_delete.gif', 'en', 0, 0, 2),(1692, 'icon_post_edit', 'icon_post_edit.gif', 'en', 0, 0, 2),(1690, 'icon_contact_www', 'icon_contact_www.gif', 'en', 0, 0, 2),(1689, 'icon_contact_yahoo', 'icon_contact_yahoo.gif', 'en', 0, 0, 2),(1688, 'icon_contact_pm', 'icon_contact_pm.gif', 'en', 0, 0, 2),(1687, 'icon_contact_msnm', 'icon_contact_msnm.gif', 'en', 0, 0, 2),(1685, 'icon_contact_icq', 'icon_contact_icq.gif', 'en', 0, 0, 2),(1686, 'icon_contact_jabber', 'icon_contact_jabber.gif', 'en', 0, 0, 2),(1684, 'icon_contact_email', 'icon_contact_email.gif', 'en', 0, 0, 2),(1682, 'icon_gender_f', 'icon_gender_f.gif', '', 0, 0, 2),(1683, 'icon_contact_aim', 'icon_contact_aim.gif', 'en', 0, 0, 2),(1681, 'icon_gender_m', 'icon_gender_m.gif', '', 0, 0, 2),(1680, 'icon_gender_x', 'icon_gender_x.gif', '', 0, 0, 2),(1679, 'icon_topic_unapproved', 'icon_topic_unapproved.gif', '', 18, 19, 2),(1678, 'icon_topic_reported', 'icon_topic_reported.gif', '', 18, 19, 2),(1677, 'icon_topic_newest', 'icon_topic_newest.gif', '', 9, 18, 2),(1675, 'icon_topic_attach', 'icon_topic_attach.gif', '', 18, 14, 2),(1676, 'icon_topic_latest', 'icon_topic_latest.gif', '', 9, 18, 2),(1674, 'icon_post_target_unread', 'icon_post_target_unread.gif', '', 9, 12, 2),(1673, 'icon_post_target', 'icon_post_target.gif', '', 9, 12, 2),(1671, 'pm_read', 'topic_read.gif', '', 18, 19, 2),(1672, 'pm_unread', 'topic_unread.gif', '', 18, 19, 2),(1670, 'global_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 18, 19, 2),(1668, 'global_unread_mine', 'announce_unread_mine.gif', '', 18, 19, 2),(1669, 'global_unread_locked', 'announce_unread_locked.gif', '', 18, 19, 2),(1667, 'global_unread', 'announce_unread.gif', '', 18, 19, 2),(1665, 'global_read_locked', 'announce_read_locked.gif', '', 18, 19, 2),(1666, 'global_read_locked_mine', 'announce_read_locked_mine.gif', '', 18, 19, 2),(1664, 'global_read_mine', 'announce_read_mine.gif', '', 18, 19, 2),(1663, 'global_read', 'announce_read.gif', '', 18, 19, 2),(1662, 'announce_unread_locked_mine', 'announce_unread_locked_mine.gif', '', 18, 19, 2),(1661, 'announce_unread_locked', 'announce_unread_locked.gif', '', 18, 19, 2),(1659, 'announce_unread', 'announce_unread.gif', '', 18, 19, 2),(1660, 'announce_unread_mine', 'announce_unread_mine.gif', '', 18, 19, 2),(1657, 'announce_read_locked', 'announce_read_locked.gif', '', 18, 19, 2),(1658, 'announce_read_locked_mine', 'announce_read_locked_mine.gif', '', 18, 19, 2),(1656, 'announce_read_mine', 'announce_read_mine.gif', '', 18, 19, 2),(1655, 'announce_read', 'announce_read.gif', '', 18, 19, 2),(1654, 'sticky_unread_locked_mine', 'sticky_unread_locked_mine.gif', '', 18, 19, 2),(1653, 'sticky_unread_locked', 'sticky_unread_locked.gif', '', 18, 19, 2),(1652, 'sticky_unread_mine', 'sticky_unread_mine.gif', '', 18, 19, 2),(1651, 'sticky_unread', 'sticky_unread.gif', '', 18, 19, 2),(1650, 'sticky_read_locked_mine', 'sticky_read_locked_mine.gif', '', 18, 19, 2),(1649, 'sticky_read_locked', 'sticky_read_locked.gif', '', 18, 19, 2),(1648, 'sticky_read_mine', 'sticky_read_mine.gif', '', 18, 19, 2),(1647, 'sticky_read', 'sticky_read.gif', '', 18, 19, 2),(1645, 'topic_unread_locked', 'topic_unread_locked.gif', '', 18, 19, 2),(1570, 'announce_read_mine', 'announce_read_mine.gif', '', 27, 27, 1),(1569, 'announce_read', 'announce_read.gif', '', 27, 27, 1),(1568, 'sticky_unread_locked_mine', 'sticky_unread_locked_mine.gif', '', 27, 27, 1),(1567, 'sticky_unread_locked', 'sticky_unread_locked.gif', '', 27, 27, 1),(1565, 'sticky_unread', 'sticky_unread.gif', '', 27, 27, 1),(1566, 'sticky_unread_mine', 'sticky_unread_mine.gif', '', 27, 27, 1),(1564, 'sticky_read_locked_mine', 'sticky_read_locked_mine.gif', '', 27, 27, 1),(1563, 'sticky_read_locked', 'sticky_read_locked.gif', '', 27, 27, 1),(1562, 'sticky_read_mine', 'sticky_read_mine.gif', '', 27, 27, 1),(1561, 'sticky_read', 'sticky_read.gif', '', 27, 27, 1),(1560, 'topic_unread_locked_mine', 'topic_unread_locked_mine.gif', '', 27, 27, 1),(1559, 'topic_unread_locked', 'topic_unread_locked.gif', '', 27, 27, 1),(1558, 'topic_unread_hot_mine', 'topic_unread_hot_mine.gif', '', 27, 27, 1),(1557, 'topic_unread_hot', 'topic_unread_hot.gif', '', 27, 27, 1),(1646, 'topic_unread_locked_mine', 'topic_unread_locked_mine.gif', '', 18, 19, 2),(1644, 'topic_unread_hot_mine', 'topic_unread_hot_mine.gif', '', 18, 19, 2),(1643, 'topic_unread_hot', 'topic_unread_hot.gif', '', 18, 19, 2),(1556, 'topic_unread_mine', 'topic_unread_mine.gif', '', 27, 27, 1),(1642, 'topic_unread_mine', 'topic_unread_mine.gif', '', 18, 19, 2),(1641, 'topic_unread', 'topic_unread.gif', '', 18, 19, 2),(1555, 'topic_unread', 'topic_unread.gif', '', 27, 27, 1),(1554, 'topic_read_locked_mine', 'topic_read_locked_mine.gif', '', 27, 27, 1),(1553, 'topic_read_locked', 'topic_read_locked.gif', '', 27, 27, 1),(1552, 'topic_read_hot_mine', 'topic_read_hot_mine.gif', '', 27, 27, 1),(1551, 'topic_read_hot', 'topic_read_hot.gif', '', 27, 27, 1),(1550, 'topic_read_mine', 'topic_read_mine.gif', '', 27, 27, 1),(1549, 'topic_read', 'topic_read.gif', '', 27, 27, 1),(1548, 'topic_moved', 'topic_moved.gif', '', 27, 27, 1),(1547, 'forum_unread_subforum', 'forum_unread_subforum.gif', '', 27, 27, 1),(1546, 'forum_unread_locked', 'forum_unread_locked.gif', '', 27, 27, 1),(1545, 'forum_unread', 'forum_unread.gif', '', 27, 27, 1),(1544, 'forum_read_subforum', 'forum_read_subforum.gif', '', 27, 27, 1),(1543, 'forum_read_locked', 'forum_read_locked.gif', '', 27, 27, 1),(1542, 'forum_read', 'forum_read.gif', '', 27, 27, 1),(1541, 'forum_link', 'forum_link.gif', '', 27, 27, 1),(1540, 'site_logo', 'site_logo.gif', '', 52, 139, 1),(1640, 'topic_read_locked_mine', 'topic_read_locked_mine.gif', '', 18, 19, 2),(1639, 'topic_read_locked', 'topic_read_locked.gif', '', 18, 19, 2),(1638, 'topic_read_hot_mine', 'topic_read_hot_mine.gif', '', 18, 19, 2),(1637, 'topic_read_hot', 'topic_read_hot.gif', '', 18, 19, 2),(1636, 'topic_read_mine', 'topic_read_mine.gif', '', 18, 19, 2),(1635, 'topic_read', 'topic_read.gif', '', 18, 19, 2),(1634, 'topic_moved', 'topic_moved.gif', '', 18, 19, 2),(1633, 'forum_unread_subforum', 'forum_unread_subforum.gif', '', 25, 46, 2),(1632, 'forum_unread_locked', 'forum_unread_locked.gif', '', 25, 46, 2),(1631, 'forum_unread', 'forum_unread.gif', '', 25, 46, 2),(1630, 'forum_read_subforum', 'forum_read_subforum.gif', '', 25, 46, 2),(1629, 'forum_read_locked', 'forum_read_locked.gif', '', 25, 46, 2),(1628, 'forum_read', 'forum_read.gif', '', 25, 46, 2),(1627, 'forum_link', 'forum_link.gif', '', 25, 46, 2),(1626, 'poll_right', 'poll_right.gif', '', 12, 4, 2),(1625, 'poll_center', 'poll_center.gif', '', 12, 0, 2),(1624, 'poll_left', 'poll_left.gif', '', 12, 4, 2),(1623, 'upload_bar', 'upload_bar.gif', '', 16, 280, 2),(1622, 'site_logo', 'site_logo.gif', '', 94, 170, 2),(1615, 'button_pm_forward', 'button_pm_forward.gif', 'en', 25, 96, 1),(1616, 'button_pm_new', 'button_pm_new.gif', 'en', 25, 84, 1),(1617, 'button_pm_reply', 'button_pm_reply.gif', 'en', 25, 96, 1),(1618, 'button_topic_locked', 'button_topic_locked.gif', 'en', 25, 88, 1),(1619, 'button_topic_new', 'button_topic_new.gif', 'en', 25, 96, 1),(1620, 'button_topic_reply', 'button_topic_reply.gif', 'en', 25, 96, 1),(1621, 'button_upload_image', 'button_upload_image.gif', 'en', 25, 119, 1),(1700, 'icon_user_warn', 'icon_user_warn.gif', 'en', 0, 0, 2),(1701, 'button_pm_new', 'button_pm_new.gif', 'en', 0, 0, 2),(1702, 'button_pm_reply', 'button_pm_reply.gif', 'en', 0, 0, 2),(1703, 'button_topic_locked', 'button_topic_locked.gif', 'en', 0, 0, 2),(1704, 'button_topic_new', 'button_topic_new.gif', 'en', 0, 0, 2),(1705, 'button_topic_reply', 'button_topic_reply.gif', 'en', 0, 0, 2);

# Table: phpbb_styles_template
DROP TABLE IF EXISTS phpbb_styles_template;
CREATE TABLE `phpbb_styles_template` (
  `template_id` mediumint(8) unsigned NOT NULL auto_increment,
  `template_name` varchar(255) collate utf8_bin NOT NULL default '',
  `template_copyright` varchar(255) collate utf8_bin NOT NULL default '',
  `template_path` varchar(100) collate utf8_bin NOT NULL default '',
  `bbcode_bitfield` varchar(255) collate utf8_bin NOT NULL default 'kNg=',
  `template_storedb` tinyint(1) unsigned NOT NULL default '0',
  `template_inherits_id` int(4) unsigned NOT NULL default '0',
  `template_inherit_path` varbinary(255) NOT NULL default '',
  PRIMARY KEY  (`template_id`),
  UNIQUE KEY `tmplte_nm` (`template_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_styles_template (template_id, template_name, template_copyright, template_path, bbcode_bitfield, template_storedb, template_inherits_id, template_inherit_path) VALUES (1, 'prosilver', '&copy; phpBB Group', 'prosilver', 'lNg=', 0, 0, ''),(2, 'subsilver2', '&copy; phpBB Group, 2003', 'subsilver2', 'kNg=', 0, 0, '');

# Table: phpbb_styles_template_data
DROP TABLE IF EXISTS phpbb_styles_template_data;
CREATE TABLE `phpbb_styles_template_data` (
  `template_id` mediumint(8) unsigned NOT NULL default '0',
  `template_filename` varchar(100) collate utf8_bin NOT NULL default '',
  `template_included` text collate utf8_bin NOT NULL,
  `template_mtime` int(11) unsigned NOT NULL default '0',
  `template_data` mediumtext collate utf8_bin NOT NULL,
  KEY `tid` (`template_id`),
  KEY `tfn` (`template_filename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_styles_theme
DROP TABLE IF EXISTS phpbb_styles_theme;
CREATE TABLE `phpbb_styles_theme` (
  `theme_id` mediumint(8) unsigned NOT NULL auto_increment,
  `theme_name` varchar(255) collate utf8_bin NOT NULL default '',
  `theme_copyright` varchar(255) collate utf8_bin NOT NULL default '',
  `theme_path` varchar(100) collate utf8_bin NOT NULL default '',
  `theme_storedb` tinyint(1) unsigned NOT NULL default '0',
  `theme_mtime` int(11) unsigned NOT NULL default '0',
  `theme_data` mediumtext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`theme_id`),
  UNIQUE KEY `theme_name` (`theme_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_styles_theme (theme_id, theme_name, theme_copyright, theme_path, theme_storedb, theme_mtime, theme_data) VALUES (1, 'prosilver', '&copy; phpBB Group', 'prosilver', 1, 1226701109, '/*  phpBB 3.0 Style Sheet\n    --------------------------------------------------------------\n	Style name:		proSilver\n	Based on style:	proSilver (this is the default phpBB 3 style)\n	Original author:	subBlue ( http://www.subBlue.com/ )\n	Modified by:		\n	\n	Copyright 2006 phpBB Group ( http://www.phpbb.com/ )\n    --------------------------------------------------------------\n*/\n\n/* General proSilver Markup Styles\n---------------------------------------- */\n\n* {\n	/* Reset browsers default margin, padding and font sizes */\n	margin: 0;\n	padding: 0;\n}\n\nhtml {\n	font-size: 100%;\n	/* Always show a scrollbar for short pages - stops the jump when the scrollbar appears. non-IE browsers */\n	height: 100%;\n	margin-bottom: 1px;\n}\n\nbody {\n	/* Text-Sizing with ems: http://www.clagnut.com/blog/348/ */\n	font-family: Verdana, Helvetica, Arial, sans-serif;\n	color: #828282;\n	background-color: #FFFFFF;\n	/*font-size: 62.5%;			 This sets the default font size to be equivalent to 10px */\n	font-size: 10px;\n	margin: 0;\n	padding: 12px 0;\n}\n\nh1 {\n	/* Forum name */\n	font-family: \"Trebuchet MS\", Arial, Helvetica, sans-serif;\n	margin-right: 200px;\n	color: #FFFFFF;\n	margin-top: 15px;\n	font-weight: bold;\n	font-size: 2em;\n}\n\nh2 {\n	/* Forum header titles */\n	font-family: \"Trebuchet MS\", Arial, Helvetica, sans-serif;\n	font-weight: normal;\n	color: #3f3f3f;\n	font-size: 2em;\n	margin: 0.8em 0 0.2em 0;\n}\n\nh2.solo {\n	margin-bottom: 1em;\n}\n\nh3 {\n	/* Sub-headers (also used as post headers, but defined later) */\n	font-family: Arial, Helvetica, sans-serif;\n	font-weight: bold;\n	text-transform: uppercase;\n	border-bottom: 1px solid #CCCCCC;\n	margin-bottom: 3px;\n	padding-bottom: 2px;\n	font-size: 1.05em;\n	color: #989898;\n	margin-top: 20px;\n}\n\nh4 {\n	/* Forum and topic list titles */\n	font-family: \"Trebuchet MS\", Verdana, Helvetica, Arial, Sans-serif;\n	font-size: 1.3em;\n}\n\np {\n	line-height: 1.3em;\n	font-size: 1.1em;\n	margin-bottom: 1.5em;\n}\n\nimg {\n	border-width: 0;\n}\n\nhr {\n	/* Also see tweaks.css */\n	border: 0 none #FFFFFF;\n	border-top: 1px solid #CCCCCC;\n	height: 1px;\n	margin: 5px 0;\n	display: block;\n	clear: both;\n}\n\nhr.dashed {\n	border-top: 1px dashed #CCCCCC;\n	margin: 10px 0;\n}\n\nhr.divider {\n	display: none;\n}\n\np.right {\n	text-align: right;\n}\n\n/* Main blocks\n---------------------------------------- */\n#wrap {\n	padding: 0 20px;\n	min-width: 650px;\n}\n\n#simple-wrap {\n	padding: 6px 10px;\n}\n\n#page-body {\n	margin: 4px 0;\n	clear: both;\n}\n\n#page-footer {\n	clear: both;\n}\n\n#page-footer h3 {\n	margin-top: 20px;\n}\n\n#logo {\n	float: left;\n	width: auto;\n	padding: 10px 13px 0 10px;\n}\n\na#logo:hover {\n	text-decoration: none;\n}\n\n/* Search box\n--------------------------------------------- */\n#search-box {\n	color: #FFFFFF;\n	position: relative;\n	margin-top: 30px;\n	margin-right: 5px;\n	display: block;\n	float: right;\n	text-align: right;\n	white-space: nowrap; /* For Opera */\n}\n\n#search-box #keywords {\n	width: 95px;\n	background-color: #FFF;\n}\n\n#search-box input {\n	border: 1px solid #b0b0b0;\n}\n\n/* .button1 style defined later, just a few tweaks for the search button version */\n#search-box input.button1 {\n	padding: 1px 5px;\n}\n\n#search-box li {\n	text-align: right;\n	margin-top: 4px;\n}\n\n#search-box img {\n	vertical-align: middle;\n	margin-right: 3px;\n}\n\n/* Site description and logo */\n#site-description {\n	float: left;\n	width: 70%;\n}\n\n#site-description h1 {\n	margin-right: 0;\n}\n\n/* Round cornered boxes and backgrounds\n---------------------------------------- */\n.headerbar {\n	background: #ebebeb none repeat-x 0 0;\n	color: #FFFFFF;\n	margin-bottom: 4px;\n	padding: 0 5px;\n}\n\n.navbar {\n	background-color: #ebebeb;\n	padding: 0 10px;\n}\n\n.forabg {\n	background: #b1b1b1 none repeat-x 0 0;\n	margin-bottom: 4px;\n	padding: 0 5px;\n	clear: both;\n}\n\n.forumbg {\n	background: #ebebeb none repeat-x 0 0;\n	margin-bottom: 4px;\n	padding: 0 5px;\n	clear: both;\n}\n\n.panel {\n	margin-bottom: 4px;\n	padding: 0 10px;\n	background-color: #f3f3f3;\n	color: #3f3f3f;\n}\n\n.post {\n	padding: 0 10px;\n	margin-bottom: 4px;\n	background-repeat: no-repeat;\n	background-position: 100% 0;\n}\n\n.post:target .content {\n	color: #000000;\n}\n\n.post:target h3 a {\n	color: #000000;\n}\n\n.bg1	{ background-color: #f7f7f7;}\n.bg2	{ background-color: #f2f2f2; }\n.bg3	{ background-color: #ebebeb; }\n\n.rowbg {\n	margin: 5px 5px 2px 5px;\n}\n\n.ucprowbg {\n	background-color: #e2e2e2;\n}\n\n.fieldsbg {\n	/*border: 1px #DBDEE2 solid;*/\n	background-color: #eaeaea;\n}\n\nspan.corners-top, span.corners-bottom, span.corners-top span, span.corners-bottom span {\n	font-size: 1px;\n	line-height: 1px;\n	display: block;\n	height: 5px;\n	background-repeat: no-repeat;\n}\n\nspan.corners-top {\n	background-image: none;\n	background-position: 0 0;\n	margin: 0 -5px;\n}\n\nspan.corners-top span {\n	background-image: none;\n	background-position: 100% 0;\n}\n\nspan.corners-bottom {\n	background-image: none;\n	background-position: 0 100%;\n	margin: 0 -5px;\n	clear: both;\n}\n\nspan.corners-bottom span {\n	background-image: none;\n	background-position: 100% 100%;\n}\n\n.headbg span.corners-bottom {\n	margin-bottom: -1px;\n}\n\n.post span.corners-top, .post span.corners-bottom, .panel span.corners-top, .panel span.corners-bottom, .navbar span.corners-top, .navbar span.corners-bottom {\n	margin: 0 -10px;\n}\n\n.rules span.corners-top {\n	margin: 0 -10px 5px -10px;\n}\n\n.rules span.corners-bottom {\n	margin: 5px -10px 0 -10px;\n}\n\n/* Horizontal lists\n----------------------------------------*/\nul.linklist {\n	display: block;\n	margin: 0;\n}\n\nul.linklist li {\n	display: block;\n	list-style-type: none;\n	float: left;\n	width: auto;\n	margin-right: 5px;\n	font-size: 1.1em;\n	line-height: 2.2em;\n}\n\nul.linklist li.rightside, p.rightside {\n	float: right;\n	margin-right: 0;\n	margin-left: 5px;\n	text-align: right;\n}\n\nul.navlinks {\n	padding-bottom: 1px;\n	margin-bottom: 1px;\n	border-bottom: 1px solid #FFFFFF;\n	font-weight: bold;\n}\n\nul.leftside {\n	float: left;\n	margin-left: 0;\n	margin-right: 5px;\n	text-align: left;\n}\n\nul.rightside {\n	float: right;\n	margin-left: 5px;\n	margin-right: -5px;\n	text-align: right;\n}\n\n/* Table styles\n----------------------------------------*/\ntable.table1 {\n	/* See tweaks.css */\n}\n\n#ucp-main table.table1 {\n	padding: 2px;\n}\n\ntable.table1 thead th {\n	font-weight: normal;\n	text-transform: uppercase;\n	color: #FFFFFF;\n	line-height: 1.3em;\n	font-size: 1em;\n	padding: 0 0 4px 3px;\n}\n\ntable.table1 thead th span {\n	padding-left: 7px;\n}\n\ntable.table1 tbody tr {\n	border: 1px solid #cfcfcf;\n}\n\ntable.table1 tbody tr:hover, table.table1 tbody tr.hover {\n	background-color: #f6f6f6;\n	color: #000;\n}\n\ntable.table1 td {\n	color: #6a6a6a;\n	font-size: 1.1em;\n}\n\ntable.table1 tbody td {\n	padding: 5px;\n	border-top: 1px solid #FAFAFA;\n}\n\ntable.table1 tbody th {\n	padding: 5px;\n	border-bottom: 1px solid #000000;\n	text-align: left;\n	color: #333333;\n	background-color: #FFFFFF;\n}\n\n/* Specific column styles */\ntable.table1 .name		{ text-align: left; }\ntable.table1 .posts		{ text-align: center !important; width: 7%; }\ntable.table1 .joined	{ text-align: left; width: 15%; }\ntable.table1 .active	{ text-align: left; width: 15%; }\ntable.table1 .mark		{ text-align: center; width: 7%; }\ntable.table1 .info		{ text-align: left; width: 30%; }\ntable.table1 .info div	{ width: 100%; white-space: nowrap; overflow: hidden; }\ntable.table1 .autocol	{ line-height: 2em; white-space: nowrap; }\ntable.table1 thead .autocol { padding-left: 1em; }\n\ntable.table1 span.rank-img {\n	float: right;\n	width: auto;\n}\n\ntable.info td {\n	padding: 3px;\n}\n\ntable.info tbody th {\n	padding: 3px;\n	text-align: right;\n	vertical-align: top;\n	color: #000000;\n	font-weight: normal;\n}\n\n.forumbg table.table1 {\n	margin: 0 -2px -1px -1px;\n}\n\n/* Misc layout styles\n---------------------------------------- */\n/* column[1-2] styles are containers for two column layouts \n   Also see tweaks.css */\n.column1 {\n	float: left;\n	clear: left;\n	width: 49%;\n}\n\n.column2 {\n	float: right;\n	clear: right;\n	width: 49%;\n}\n\n/* General classes for placing floating blocks */\n.left-box {\n	float: left;\n	width: auto;\n	text-align: left;\n}\n\n.right-box {\n	float: right;\n	width: auto;\n	text-align: right;\n}\n\ndl.details {\n	/*font-family: \"Lucida Grande\", Verdana, Helvetica, Arial, sans-serif;*/\n	font-size: 1.1em;\n}\n\ndl.details dt {\n	float: left;\n	clear: left;\n	width: 30%;\n	text-align: right;\n	color: #000000;\n	display: block;\n}\n\ndl.details dd {\n	margin-left: 0;\n	padding-left: 5px;\n	margin-bottom: 5px;\n	color: #828282;\n	float: left;\n	width: 65%;\n}\n\n/* Pagination\n---------------------------------------- */\n.pagination {\n	height: 1%; /* IE tweak (holly hack) */\n	width: auto;\n	text-align: right;\n	margin-top: 5px;\n	float: right;\n}\n\n.pagination span.page-sep {\n	display: none;\n}\n\nli.pagination {\n	margin-top: 0;\n}\n\n.pagination strong, .pagination b {\n	font-weight: normal;\n}\n\n.pagination span strong {\n	padding: 0 2px;\n	margin: 0 2px;\n	font-weight: normal;\n	color: #FFFFFF;\n	background-color: #bfbfbf;\n	border: 1px solid #bfbfbf;\n	font-size: 0.9em;\n}\n\n.pagination span a, .pagination span a:link, .pagination span a:visited, .pagination span a:active {\n	font-weight: normal;\n	text-decoration: none;\n	color: #747474;\n	margin: 0 2px;\n	padding: 0 2px;\n	background-color: #eeeeee;\n	border: 1px solid #bababa;\n	font-size: 0.9em;\n	line-height: 1.5em;\n}\n\n.pagination span a:hover {\n	border-color: #d2d2d2;\n	background-color: #d2d2d2;\n	color: #FFF;\n	text-decoration: none;\n}\n\n.pagination img {\n	vertical-align: middle;\n}\n\n/* Pagination in viewforum for multipage topics */\n.row .pagination {\n	display: block;\n	float: right;\n	width: auto;\n	margin-top: 0;\n	padding: 1px 0 1px 15px;\n	font-size: 0.9em;\n	background: none 0 50% no-repeat;\n}\n\n.row .pagination span a, li.pagination span a {\n	background-color: #FFFFFF;\n}\n\n.row .pagination span a:hover, li.pagination span a:hover {\n	background-color: #d2d2d2;\n}\n\n/* Miscellaneous styles\n---------------------------------------- */\n#forum-permissions {\n	float: right;\n	width: auto;\n	padding-left: 5px;\n	margin-left: 5px;\n	margin-top: 10px;\n	text-align: right;\n}\n\n.copyright {\n	padding: 5px;\n	text-align: center;\n	color: #555555;\n}\n\n.small {\n	font-size: 0.9em !important;\n}\n\n.titlespace {\n	margin-bottom: 15px;\n}\n\n.headerspace {\n	margin-top: 20px;\n}\n\n.error {\n	color: #bcbcbc;\n	font-weight: bold;\n	font-size: 1em;\n}\n\n.reported {\n	background-color: #f7f7f7;\n}\n\nli.reported:hover {\n	background-color: #ececec;\n}\n\ndiv.rules {\n	background-color: #ececec;\n	color: #bcbcbc;\n	padding: 0 10px;\n	margin: 10px 0;\n	font-size: 1.1em;\n}\n\ndiv.rules ul {\n	margin-left: 20px;\n}\n\np.rules {\n	background-color: #ececec;\n	background-image: none;\n	padding: 5px;\n}\n\np.rules img {\n	vertical-align: middle;\n}\n\np.rules a {\n	vertical-align: middle;\n	clear: both;\n}\n\n#top {\n	position: absolute;\n	top: -20px;\n}\n\n.clear {\n	display: block;\n	clear: both;\n	font-size: 1px;\n	line-height: 1px;\n	background: transparent;\n}\n/* proSilver Link Styles\n---------------------------------------- */\n\na:link	{ color: #898989; text-decoration: none; }\na:visited	{ color: #898989; text-decoration: none; }\na:hover	{ color: #d3d3d3; text-decoration: underline; }\na:active	{ color: #d2d2d2; text-decoration: none; }\n\n/* Coloured usernames */\n.username-coloured {\n	font-weight: bold;\n	display: inline !important;\n	padding: 0 !important;\n}\n\n/* Links on gradient backgrounds */\n#search-box a:link, .navbg a:link, .forumbg .header a:link, .forabg .header a:link, th a:link {\n	color: #FFFFFF;\n	text-decoration: none;\n}\n\n#search-box a:visited, .navbg a:visited, .forumbg .header a:visited, .forabg .header a:visited, th a:visited {\n	color: #FFFFFF;\n	text-decoration: none;\n}\n\n#search-box a:hover, .navbg a:hover, .forumbg .header a:hover, .forabg .header a:hover, th a:hover {\n	color: #ffffff;\n	text-decoration: underline;\n}\n\n#search-box a:active, .navbg a:active, .forumbg .header a:active, .forabg .header a:active, th a:active {\n	color: #ffffff;\n	text-decoration: none;\n}\n\n/* Links for forum/topic lists */\na.forumtitle {\n	font-family: \"Trebuchet MS\", Helvetica, Arial, Sans-serif;\n	font-size: 1.2em;\n	font-weight: bold;\n	color: #898989;\n	text-decoration: none;\n}\n\n/* a.forumtitle:visited { color: #898989; } */\n\na.forumtitle:hover {\n	color: #bcbcbc;\n	text-decoration: underline;\n}\n\na.forumtitle:active {\n	color: #898989;\n}\n\na.topictitle {\n	font-family: \"Trebuchet MS\", Helvetica, Arial, Sans-serif;\n	font-size: 1.2em;\n	font-weight: bold;\n	color: #898989;\n	text-decoration: none;\n}\n\n/* a.topictitle:visited { color: #d2d2d2; } */\n\na.topictitle:hover {\n	color: #bcbcbc;\n	text-decoration: underline;\n}\n\na.topictitle:active {\n	color: #898989;\n}\n\n/* Post body links */\n.postlink {\n	text-decoration: none;\n	color: #d2d2d2;\n	border-bottom: 1px solid #d2d2d2;\n	padding-bottom: 0;\n}\n\n.postlink:visited {\n	color: #bdbdbd;\n	border-bottom-style: dotted;\n	border-bottom-color: #666666;\n}\n\n.postlink:active {\n	color: #d2d2d2;\n}\n\n.postlink:hover {\n	background-color: #f6f6f6;\n	text-decoration: none;\n	color: #404040;\n}\n\n.signature a, .signature a:visited, .signature a:active, .signature a:hover {\n	border: none;\n	text-decoration: underline;\n	background-color: transparent;\n}\n\n/* Profile links */\n.postprofile a:link, .postprofile a:active, .postprofile a:visited, .postprofile dt.author a {\n	font-weight: bold;\n	color: #898989;\n	text-decoration: none;\n}\n\n.postprofile a:hover, .postprofile dt.author a:hover {\n	text-decoration: underline;\n	color: #d3d3d3;\n}\n\n\n/* Profile searchresults */	\n.search .postprofile a {\n	color: #898989;\n	text-decoration: none; \n	font-weight: normal;\n}\n\n.search .postprofile a:hover {\n	color: #d3d3d3;\n	text-decoration: underline; \n}\n\n/* Back to top of page */\n.back2top {\n	clear: both;\n	height: 11px;\n	text-align: right;\n}\n\na.top {\n	background: none no-repeat top left;\n	text-decoration: none;\n	width: {IMG_ICON_BACK_TOP_WIDTH}px;\n	height: {IMG_ICON_BACK_TOP_HEIGHT}px;\n	display: block;\n	float: right;\n	overflow: hidden;\n	letter-spacing: 1000px;\n	text-indent: 11px;\n}\n\na.top2 {\n	background: none no-repeat 0 50%;\n	text-decoration: none;\n	padding-left: 15px;\n}\n\n/* Arrow links  */\na.up		{ background: none no-repeat left center; }\na.down		{ background: none no-repeat right center; }\na.left		{ background: none no-repeat 3px 60%; }\na.right		{ background: none no-repeat 95% 60%; }\n\na.up, a.up:link, a.up:active, a.up:visited {\n	padding-left: 10px;\n	text-decoration: none;\n	border-bottom-width: 0;\n}\n\na.up:hover {\n	background-position: left top;\n	background-color: transparent;\n}\n\na.down, a.down:link, a.down:active, a.down:visited {\n	padding-right: 10px;\n}\n\na.down:hover {\n	background-position: right bottom;\n	text-decoration: none;\n}\n\na.left, a.left:active, a.left:visited {\n	padding-left: 12px;\n}\n\na.left:hover {\n	color: #d2d2d2;\n	text-decoration: none;\n	background-position: 0 60%;\n}\n\na.right, a.right:active, a.right:visited {\n	padding-right: 12px;\n}\n\na.right:hover {\n	color: #d2d2d2;\n	text-decoration: none;\n	background-position: 100% 60%;\n}\n/* proSilver Content Styles\n---------------------------------------- */\n\nul.topiclist {\n	display: block;\n	list-style-type: none;\n	margin: 0;\n}\n\nul.forums {\n	background: #f9f9f9 none repeat-x 0 0;\n}\n\nul.topiclist li {\n	display: block;\n	list-style-type: none;\n	color: #777777;\n	margin: 0;\n}\n\nul.topiclist dl {\n	position: relative;\n}\n\nul.topiclist li.row dl {\n	padding: 2px 0;\n}\n\nul.topiclist dt {\n	display: block;\n	float: left;\n	width: 50%;\n	font-size: 1.1em;\n	padding-left: 5px;\n	padding-right: 5px;\n}\n\nul.topiclist dd {\n	display: block;\n	float: left;\n	border-left: 1px solid #FFFFFF;\n	padding: 4px 0;\n}\n\nul.topiclist dfn {\n	/* Labels for post/view counts */\n	display: none;\n}\n\nul.topiclist li.row dt a.subforum {\n	background-image: none;\n	background-position: 0 50%;\n	background-repeat: no-repeat;\n	position: relative;\n	white-space: nowrap;\n	padding: 0 0 0 12px;\n}\n\n.forum-image {\n	float: left;\n	padding-top: 5px;\n	margin-right: 5px;\n}\n\nli.row {\n	border-top: 1px solid #FFFFFF;\n	border-bottom: 1px solid #8f8f8f;\n}\n\nli.row strong {\n	font-weight: normal;\n	color: #000000;\n}\n\nli.row:hover {\n	background-color: #f6f6f6;\n}\n\nli.row:hover dd {\n	border-left-color: #CCCCCC;\n}\n\nli.header dt, li.header dd {\n	line-height: 1em;\n	border-left-width: 0;\n	margin: 2px 0 4px 0;\n	color: #FFFFFF;\n	padding-top: 2px;\n	padding-bottom: 2px;\n	font-size: 1em;\n	font-family: Arial, Helvetica, sans-serif;\n	text-transform: uppercase;\n}\n\nli.header dt {\n	font-weight: bold;\n}\n\nli.header dd {\n	margin-left: 1px;\n}\n\nli.header dl.icon {\n	min-height: 0;\n}\n\nli.header dl.icon dt {\n	/* Tweak for headers alignment when folder icon used */\n	padding-left: 0;\n	padding-right: 50px;\n}\n\n/* Forum list column styles */\ndl.icon {\n	min-height: 35px;\n	background-position: 10px 50%;		/* Position of folder icon */\n	background-repeat: no-repeat;\n}\n\ndl.icon dt {\n	padding-left: 45px;					/* Space for folder icon */\n	background-repeat: no-repeat;\n	background-position: 5px 95%;		/* Position of topic icon */\n}\n\ndd.posts, dd.topics, dd.views {\n	width: 8%;\n	text-align: center;\n	line-height: 2.2em;\n	font-size: 1.2em;\n}\n\ndd.lastpost {\n	width: 25%;\n	font-size: 1.1em;\n}\n\ndd.redirect {\n	font-size: 1.1em;\n	line-height: 2.5em;\n}\n\ndd.moderation {\n	font-size: 1.1em;\n}\n\ndd.lastpost span, ul.topiclist dd.searchby span, ul.topiclist dd.info span, ul.topiclist dd.time span, dd.redirect span, dd.moderation span {\n	display: block;\n	padding-left: 5px;\n}\n\ndd.time {\n	width: auto;\n	line-height: 200%;\n	font-size: 1.1em;\n}\n\ndd.extra {\n	width: 12%;\n	line-height: 200%;\n	text-align: center;\n	font-size: 1.1em;\n}\n\ndd.mark {\n	float: right !important;\n	width: 9%;\n	text-align: center;\n	line-height: 200%;\n	font-size: 1.2em;\n}\n\ndd.info {\n	width: 30%;\n}\n\ndd.option {\n	width: 15%;\n	line-height: 200%;\n	text-align: center;\n	font-size: 1.1em;\n}\n\ndd.searchby {\n	width: 47%;\n	font-size: 1.1em;\n	line-height: 1em;\n}\n\nul.topiclist dd.searchextra {\n	margin-left: 5px;\n	padding: 0.2em 0;\n	font-size: 1.1em;\n	color: #333333;\n	border-left: none;\n	clear: both;\n	width: 98%;\n	overflow: hidden;\n}\n\n/* Container for post/reply buttons and pagination */\n.topic-actions {\n	margin-bottom: 3px;\n	font-size: 1.1em;\n	height: 28px;\n	min-height: 28px;\n}\ndiv[class].topic-actions {\n	height: auto;\n}\n\n/* Post body styles\n----------------------------------------*/\n.postbody {\n	padding: 0;\n	line-height: 1.48em;\n	color: #333333;\n	width: 76%;\n	float: left;\n	clear: both;\n}\n\n.postbody .ignore {\n	font-size: 1.1em;\n}\n\n.postbody h3.first {\n	/* The first post on the page uses this */\n	font-size: 1.7em;\n}\n\n.postbody h3 {\n	/* Postbody requires a different h3 format - so change it here */\n	font-size: 1.5em;\n	padding: 2px 0 0 0;\n	margin: 0 0 0.3em 0 !important;\n	text-transform: none;\n	border: none;\n	font-family: \"Trebuchet MS\", Verdana, Helvetica, Arial, sans-serif;\n	line-height: 125%;\n}\n\n.postbody h3 img {\n	/* Also see tweaks.css */\n	vertical-align: bottom;\n}\n\n.postbody .content {\n	font-size: 1.3em;\n}\n\n.search .postbody {\n	width: 68%\n}\n\n/* Topic review panel\n----------------------------------------*/\n#review {\n	margin-top: 2em;\n}\n\n#topicreview {\n	padding-right: 5px;\n	overflow: auto;\n	height: 300px;\n}\n\n#topicreview .postbody {\n	width: auto;\n	float: none;\n	margin: 0;\n	height: auto;\n}\n\n#topicreview .post {\n	height: auto;\n}\n\n#topicreview h2 {\n	border-bottom-width: 0;\n}\n\n/* Content container styles\n----------------------------------------*/\n.content {\n	min-height: 3em;\n	overflow: hidden;\n	line-height: 1.4em;\n	font-family: \"Lucida Grande\", \"Trebuchet MS\", Verdana, Helvetica, Arial, sans-serif;\n	font-size: 1em;\n	color: #333333;\n}\n\n.content h2, .panel h2 {\n	font-weight: normal;\n	color: #989898;\n	border-bottom: 1px solid #CCCCCC;\n	font-size: 1.6em;\n	margin-top: 0.5em;\n	margin-bottom: 0.5em;\n	padding-bottom: 0.5em;\n}\n\n.panel h3 {\n	margin: 0.5em 0;\n}\n\n.panel p {\n	font-size: 1.2em;\n	margin-bottom: 1em;\n	line-height: 1.4em;\n}\n\n.content p {\n	font-family: \"Lucida Grande\", \"Trebuchet MS\", Verdana, Helvetica, Arial, sans-serif;\n	font-size: 1.2em;\n	margin-bottom: 1em;\n	line-height: 1.4em;\n}\n\ndl.faq {\n	font-family: \"Lucida Grande\", Verdana, Helvetica, Arial, sans-serif;\n	font-size: 1.1em;\n	margin-top: 1em;\n	margin-bottom: 2em;\n	line-height: 1.4em;\n}\n\ndl.faq dt {\n	font-weight: bold;\n	color: #333333;\n}\n\n.content dl.faq {\n	font-size: 1.2em;\n	margin-bottom: 0.5em;\n}\n\n.content li {\n	list-style-type: inherit;\n}\n\n.content ul, .content ol {\n	margin-bottom: 1em;\n	margin-left: 3em;\n}\n\n.posthilit {\n	background-color: #f3f3f3;\n	color: #BCBCBC;\n	padding: 0 2px 1px 2px;\n}\n\n.announce, .unreadpost {\n	/* Highlight the announcements & unread posts box */\n	border-left-color: #BCBCBC;\n	border-right-color: #BCBCBC;\n}\n\n/* Post author */\np.author {\n	margin: 0 15em 0.6em 0;\n	padding: 0 0 5px 0;\n	font-family: Verdana, Helvetica, Arial, sans-serif;\n	font-size: 1em;\n	line-height: 1.2em;\n}\n\n/* Post signature */\n.signature {\n	margin-top: 1.5em;\n	padding-top: 0.2em;\n	font-size: 1.1em;\n	border-top: 1px solid #CCCCCC;\n	clear: left;\n	line-height: 140%;\n	overflow: hidden;\n	width: 100%;\n}\n\ndd .signature {\n	margin: 0;\n	padding: 0;\n	clear: none;\n	border: none;\n}\n\n.signature li {\n	list-style-type: inherit;\n}\n\n.signature ul, .signature ol {\n	margin-bottom: 1em;\n	margin-left: 3em;\n}\n\n/* Post noticies */\n.notice {\n	font-family: \"Lucida Grande\", Verdana, Helvetica, Arial, sans-serif;\n	width: auto;\n	margin-top: 1.5em;\n	padding-top: 0.2em;\n	font-size: 1em;\n	border-top: 1px dashed #CCCCCC;\n	clear: left;\n	line-height: 130%;\n}\n\n/* Jump to post link for now */\nul.searchresults {\n	list-style: none;\n	text-align: right;\n	clear: both;\n}\n\n/* BB Code styles\n----------------------------------------*/\n/* Quote block */\nblockquote {\n	background: #ebebeb none 6px 8px no-repeat;\n	border: 1px solid #dbdbdb;\n	font-size: 0.95em;\n	margin: 0.5em 1px 0 25px;\n	overflow: hidden;\n	padding: 5px;\n}\n\nblockquote blockquote {\n	/* Nested quotes */\n	background-color: #bababa;\n	font-size: 1em;\n	margin: 0.5em 1px 0 15px;	\n}\n\nblockquote blockquote blockquote {\n	/* Nested quotes */\n	background-color: #e4e4e4;\n}\n\nblockquote cite {\n	/* Username/source of quoter */\n	font-style: normal;\n	font-weight: bold;\n	margin-left: 20px;\n	display: block;\n	font-size: 0.9em;\n}\n\nblockquote cite cite {\n	font-size: 1em;\n}\n\nblockquote.uncited {\n	padding-top: 25px;\n}\n\n/* Code block */\ndl.codebox {\n	padding: 3px;\n	background-color: #FFFFFF;\n	border: 1px solid #d8d8d8;\n	font-size: 1em;\n}\n\ndl.codebox dt {\n	text-transform: uppercase;\n	border-bottom: 1px solid #CCCCCC;\n	margin-bottom: 3px;\n	font-size: 0.8em;\n	font-weight: bold;\n	display: block;\n}\n\nblockquote dl.codebox {\n	margin-left: 0;\n}\n\ndl.codebox code {\n	/* Also see tweaks.css */\n	overflow: auto;\n	display: block;\n	height: auto;\n	max-height: 200px;\n	white-space: normal;\n	padding-top: 5px;\n	font: 0.9em Monaco, \"Andale Mono\",\"Courier New\", Courier, mono;\n	line-height: 1.3em;\n	color: #8b8b8b;\n	margin: 2px 0;\n}\n\n.syntaxbg		{ color: #FFFFFF; }\n.syntaxcomment	{ color: #000000; }\n.syntaxdefault	{ color: #bcbcbc; }\n.syntaxhtml		{ color: #000000; }\n.syntaxkeyword	{ color: #585858; }\n.syntaxstring	{ color: #a7a7a7; }\n\n/* Attachments\n----------------------------------------*/\n.attachbox {\n	float: left;\n	width: auto; \n	margin: 5px 5px 5px 0;\n	padding: 6px;\n	background-color: #FFFFFF;\n	border: 1px dashed #d8d8d8;\n	clear: left;\n}\n\n.pm-message .attachbox {\n	background-color: #f3f3f3;\n}\n\n.attachbox dt {\n	font-family: Arial, Helvetica, sans-serif;\n	text-transform: uppercase;\n}\n\n.attachbox dd {\n	margin-top: 4px;\n	padding-top: 4px;\n	clear: left;\n	border-top: 1px solid #d8d8d8;\n}\n\n.attachbox dd dd {\n	border: none;\n}\n\n.attachbox p {\n	line-height: 110%;\n	color: #666666;\n	font-weight: normal;\n	clear: left;\n}\n\n.attachbox p.stats\n{\n	line-height: 110%;\n	color: #666666;\n	font-weight: normal;\n	clear: left;\n}\n\n.attach-image {\n	margin: 3px 0;\n	width: 100%;\n	max-height: 350px;\n	overflow: auto;\n}\n\n.attach-image img {\n	border: 1px solid #999999;\n/*	cursor: move; */\n	cursor: default;\n}\n\n/* Inline image thumbnails */\ndiv.inline-attachment dl.thumbnail, div.inline-attachment dl.file {\n	display: block;\n	margin-bottom: 4px;\n}\n\ndiv.inline-attachment p {\n	font-size: 100%;\n}\n\ndl.file {\n	font-family: Verdana, Arial, Helvetica, sans-serif;\n	display: block;\n}\n\ndl.file dt {\n	text-transform: none;\n	margin: 0;\n	padding: 0;\n	font-weight: bold;\n	font-family: Verdana, Arial, Helvetica, sans-serif;\n}\n\ndl.file dd {\n	color: #666666;\n	margin: 0;\n	padding: 0;	\n}\n\ndl.thumbnail img {\n	padding: 3px;\n	border: 1px solid #666666;\n	background-color: #FFF;\n}\n\ndl.thumbnail dd {\n	color: #666666;\n	font-style: italic;\n	font-family: Verdana, Arial, Helvetica, sans-serif;\n}\n\n.attachbox dl.thumbnail dd {\n	font-size: 100%;\n}\n\ndl.thumbnail dt a:hover {\n	background-color: #EEEEEE;\n}\n\ndl.thumbnail dt a:hover img {\n	border: 1px solid #d2d2d2;\n}\n\n/* Post poll styles\n----------------------------------------*/\nfieldset.polls {\n	font-family: \"Trebuchet MS\", Verdana, Helvetica, Arial, sans-serif;\n}\n\nfieldset.polls dl {\n	margin-top: 5px;\n	border-top: 1px solid #e2e2e2;\n	padding: 5px 0 0 0;\n	line-height: 120%;\n	color: #666666;\n}\n\nfieldset.polls dl.voted {\n	font-weight: bold;\n	color: #000000;\n}\n\nfieldset.polls dt {\n	text-align: left;\n	float: left;\n	display: block;\n	width: 30%;\n	border-right: none;\n	padding: 0;\n	margin: 0;\n	font-size: 1.1em;\n}\n\nfieldset.polls dd {\n	float: left;\n	width: 10%;\n	border-left: none;\n	padding: 0 5px;\n	margin-left: 0;\n	font-size: 1.1em;\n}\n\nfieldset.polls dd.resultbar {\n	width: 50%;\n}\n\nfieldset.polls dd input {\n	margin: 2px 0;\n}\n\nfieldset.polls dd div {\n	text-align: right;\n	font-family: Arial, Helvetica, sans-serif;\n	color: #FFFFFF;\n	font-weight: bold;\n	padding: 0 2px;\n	overflow: visible;\n	min-width: 2%;\n}\n\n.pollbar1 {\n	background-color: #aaaaaa;\n	border-bottom: 1px solid #747474;\n	border-right: 1px solid #747474;\n}\n\n.pollbar2 {\n	background-color: #bebebe;\n	border-bottom: 1px solid #8c8c8c;\n	border-right: 1px solid #8c8c8c;\n}\n\n.pollbar3 {\n	background-color: #D1D1D1;\n	border-bottom: 1px solid #aaaaaa;\n	border-right: 1px solid #aaaaaa;\n}\n\n.pollbar4 {\n	background-color: #e4e4e4;\n	border-bottom: 1px solid #bebebe;\n	border-right: 1px solid #bebebe;\n}\n\n.pollbar5 {\n	background-color: #f8f8f8;\n	border-bottom: 1px solid #D1D1D1;\n	border-right: 1px solid #D1D1D1;\n}\n\n/* Poster profile block\n----------------------------------------*/\n.postprofile {\n	/* Also see tweaks.css */\n	margin: 5px 0 10px 0;\n	min-height: 80px;\n	color: #666666;\n	border-left: 1px solid #FFFFFF;\n	width: 22%;\n	float: right;\n	display: inline;\n}\n.pm .postprofile {\n	border-left: 1px solid #DDDDDD;\n}\n\n.postprofile dd, .postprofile dt {\n	line-height: 1.2em;\n	margin-left: 8px;\n}\n\n.postprofile strong {\n	font-weight: normal;\n	color: #000000;\n}\n\n.avatar {\n	border: none;\n	margin-bottom: 3px;\n}\n\n.online {\n	background-image: none;\n	background-position: 100% 0;\n	background-repeat: no-repeat;\n}\n\n/* Poster profile used by search*/\n.search .postprofile {\n	width: 30%;\n}\n\n/* pm list in compose message if mass pm is enabled */\ndl.pmlist dt {\n	width: 60% !important;\n}\n\ndl.pmlist dt textarea {\n	width: 95%;\n}\n\ndl.pmlist dd {\n	margin-left: 61% !important;\n	margin-bottom: 2px;\n}\n/* proSilver Button Styles\n---------------------------------------- */\n\n/* Rollover buttons\n   Based on: http://wellstyled.com/css-nopreload-rollovers.html\n----------------------------------------*/\n.buttons {\n	float: left;\n	width: auto;\n	height: auto;\n}\n\n/* Rollover state */\n.buttons div {\n	float: left;\n	margin: 0 5px 0 0;\n	background-position: 0 100%;\n}\n\n/* Rolloff state */\n.buttons div a {\n	display: block;\n	width: 100%;\n	height: 100%;\n	background-position: 0 0;\n	position: relative;\n	overflow: hidden;\n}\n\n/* Hide <a> text and hide off-state image when rolling over (prevents flicker in IE) */\n/*.buttons div span		{ display: none; }*/\n/*.buttons div a:hover	{ background-image: none; }*/\n.buttons div span			{ position: absolute; width: 100%; height: 100%; cursor: pointer;}\n.buttons div a:hover span	{ background-position: 0 100%; }\n\n/* Big button images */\n.reply-icon span	{ background: transparent none 0 0 no-repeat; }\n.post-icon span		{ background: transparent none 0 0 no-repeat; }\n.locked-icon span	{ background: transparent none 0 0 no-repeat; }\n.pmreply-icon span	{ background: none 0 0 no-repeat; }\n.newpm-icon span 	{ background: none 0 0 no-repeat; }\n.forwardpm-icon span 	{ background: none 0 0 no-repeat; }\n\n/* Set big button dimensions */\n.buttons div.reply-icon		{ width: {IMG_BUTTON_TOPIC_REPLY_WIDTH}px; height: {IMG_BUTTON_TOPIC_REPLY_HEIGHT}px; }\n.buttons div.post-icon		{ width: {IMG_BUTTON_TOPIC_NEW_WIDTH}px; height: {IMG_BUTTON_TOPIC_NEW_HEIGHT}px; }\n.buttons div.locked-icon	{ width: {IMG_BUTTON_TOPIC_LOCKED_WIDTH}px; height: {IMG_BUTTON_TOPIC_LOCKED_HEIGHT}px; }\n.buttons div.pmreply-icon	{ width: {IMG_BUTTON_PM_REPLY_WIDTH}px; height: {IMG_BUTTON_PM_REPLY_HEIGHT}px; }\n.buttons div.newpm-icon		{ width: {IMG_BUTTON_PM_NEW_WIDTH}px; height: {IMG_BUTTON_PM_NEW_HEIGHT}px; }\n.buttons div.forwardpm-icon	{ width: {IMG_BUTTON_PM_FORWARD_WIDTH}px; height: {IMG_BUTTON_PM_FORWARD_HEIGHT}px; }\n\n/* Sub-header (navigation bar)\n--------------------------------------------- */\na.print, a.sendemail, a.fontsize {\n	display: block;\n	overflow: hidden;\n	height: 18px;\n	text-indent: -5000px;\n	text-align: left;\n	background-repeat: no-repeat;\n}\n\na.print {\n	background-image: none;\n	width: 22px;\n}\n\na.sendemail {\n	background-image: none;\n	width: 22px;\n}\n\na.fontsize {\n	background-image: none;\n	background-position: 0 -1px;\n	width: 29px;\n}\n\na.fontsize:hover {\n	background-position: 0 -20px;\n	text-decoration: none;\n}\n\n/* Icon images\n---------------------------------------- */\n.icon-favorites, .sitehome, .icon-faq, .icon-contact, .icon-members, .icon-home, .icon-ucp, .icon-register, .icon-logout,\n.icon-bookmark, .icon-bump, .icon-subscribe, .icon-unsubscribe, .icon-pages, .icon-search {\n	background-position: 0 50%;\n	background-repeat: no-repeat;\n	background-image: none;\n	padding: 1px 0 0 17px;\n}\n\n/* Poster profile icons\n----------------------------------------*/\nul.profile-icons {\n	padding-top: 10px;\n	list-style: none;\n}\n\n/* Rollover state */\nul.profile-icons li {\n	float: left;\n	margin: 0 6px 3px 0;\n	background-position: 0 100%;\n}\n\n/* Rolloff state */\nul.profile-icons li a {\n	display: block;\n	width: 100%;\n	height: 100%;\n	background-position: 0 0;\n}\n\n/* Hide <a> text and hide off-state image when rolling over (prevents flicker in IE) */\nul.profile-icons li span { display:none; }\nul.profile-icons li a:hover { background: none; }\n\n/* Positioning of moderator icons */\n.postbody ul.profile-icons {\n	float: right;\n	width: auto;\n	padding: 0;\n}\n\n.postbody ul.profile-icons li {\n	margin: 0 3px;\n}\n\n/* Profile & navigation icons */\n.email-icon, .email-icon a		{ background: none top left no-repeat; }\n.aim-icon, .aim-icon a			{ background: none top left no-repeat; }\n.yahoo-icon, .yahoo-icon a		{ background: none top left no-repeat; }\n.web-icon, .web-icon a			{ background: none top left no-repeat; }\n.msnm-icon, .msnm-icon a			{ background: none top left no-repeat; }\n.icq-icon, .icq-icon a			{ background: none top left no-repeat; }\n.jabber-icon, .jabber-icon a		{ background: none top left no-repeat; }\n.pm-icon, .pm-icon a				{ background: none top left no-repeat; }\n.quote-icon, .quote-icon a		{ background: none top left no-repeat; }\n\n/* Moderator icons */\n.report-icon, .report-icon a		{ background: none top left no-repeat; }\n.warn-icon, .warn-icon a			{ background: none top left no-repeat; }\n.edit-icon, .edit-icon a			{ background: none top left no-repeat; }\n.delete-icon, .delete-icon a		{ background: none top left no-repeat; }\n.info-icon, .info-icon a			{ background: none top left no-repeat; }\n\n/* Set profile icon dimensions */\nul.profile-icons li.email-icon		{ width: {IMG_ICON_CONTACT_EMAIL_WIDTH}px; height: {IMG_ICON_CONTACT_EMAIL_HEIGHT}px; }\nul.profile-icons li.aim-icon	{ width: {IMG_ICON_CONTACT_AIM_WIDTH}px; height: {IMG_ICON_CONTACT_AIM_HEIGHT}px; }\nul.profile-icons li.yahoo-icon	{ width: {IMG_ICON_CONTACT_YAHOO_WIDTH}px; height: {IMG_ICON_CONTACT_YAHOO_HEIGHT}px; }\nul.profile-icons li.web-icon	{ width: {IMG_ICON_CONTACT_WWW_WIDTH}px; height: {IMG_ICON_CONTACT_WWW_HEIGHT}px; }\nul.profile-icons li.msnm-icon	{ width: {IMG_ICON_CONTACT_MSNM_WIDTH}px; height: {IMG_ICON_CONTACT_MSNM_HEIGHT}px; }\nul.profile-icons li.icq-icon	{ width: {IMG_ICON_CONTACT_ICQ_WIDTH}px; height: {IMG_ICON_CONTACT_ICQ_HEIGHT}px; }\nul.profile-icons li.jabber-icon	{ width: {IMG_ICON_CONTACT_JABBER_WIDTH}px; height: {IMG_ICON_CONTACT_JABBER_HEIGHT}px; }\nul.profile-icons li.pm-icon		{ width: {IMG_ICON_CONTACT_PM_WIDTH}px; height: {IMG_ICON_CONTACT_PM_HEIGHT}px; }\nul.profile-icons li.quote-icon	{ width: {IMG_ICON_POST_QUOTE_WIDTH}px; height: {IMG_ICON_POST_QUOTE_HEIGHT}px; }\nul.profile-icons li.report-icon	{ width: {IMG_ICON_POST_REPORT_WIDTH}px; height: {IMG_ICON_POST_REPORT_HEIGHT}px; }\nul.profile-icons li.edit-icon	{ width: {IMG_ICON_POST_EDIT_WIDTH}px; height: {IMG_ICON_POST_EDIT_HEIGHT}px; }\nul.profile-icons li.delete-icon	{ width: {IMG_ICON_POST_DELETE_WIDTH}px; height: {IMG_ICON_POST_DELETE_HEIGHT}px; }\nul.profile-icons li.info-icon	{ width: {IMG_ICON_POST_INFO_WIDTH}px; height: {IMG_ICON_POST_INFO_HEIGHT}px; }\nul.profile-icons li.warn-icon	{ width: {IMG_ICON_USER_WARN_WIDTH}px; height: {IMG_ICON_USER_WARN_HEIGHT}px; }\n\n/* Fix profile icon default margins */\nul.profile-icons li.edit-icon	{ margin: 0 0 0 3px; }\nul.profile-icons li.quote-icon	{ margin: 0 0 0 10px; }\nul.profile-icons li.info-icon, ul.profile-icons li.report-icon	{ margin: 0 3px 0 0; }\n/* proSilver Control Panel Styles\n---------------------------------------- */\n\n\n/* Main CP box\n----------------------------------------*/\n#cp-menu {\n	float:left;\n	width: 19%;\n	margin-top: 1em;\n	margin-bottom: 5px;\n}\n\n#cp-main {\n	float: left;\n	width: 81%;\n}\n\n#cp-main .content {\n	padding: 0;\n}\n\n#cp-main h3, #cp-main hr, #cp-menu hr {\n	border-color: #bfbfbf;\n}\n\n#cp-main .panel p {\n	font-size: 1.1em;\n}\n\n#cp-main .panel ol {\n	margin-left: 2em;\n	font-size: 1.1em;\n}\n\n#cp-main .panel li.row {\n	border-bottom: 1px solid #cbcbcb;\n	border-top: 1px solid #F9F9F9;\n}\n\nul.cplist {\n	margin-bottom: 5px;\n	border-top: 1px solid #cbcbcb;\n}\n\n#cp-main .panel li.header dd, #cp-main .panel li.header dt {\n	color: #000000;\n	margin-bottom: 2px;\n}\n\n#cp-main table.table1 {\n	margin-bottom: 1em;\n}\n\n#cp-main table.table1 thead th {\n	color: #333333;\n	font-weight: bold;\n	border-bottom: 1px solid #333333;\n	padding: 5px;\n}\n\n#cp-main table.table1 tbody th {\n	font-style: italic;\n	background-color: transparent !important;\n	border-bottom: none;\n}\n\n#cp-main .pagination {\n	float: right;\n	width: auto;\n	padding-top: 1px;\n}\n\n#cp-main .postbody p {\n	font-size: 1.1em;\n}\n\n#cp-main .pm-message {\n	border: 1px solid #e2e2e2;\n	margin: 10px 0;\n	background-color: #FFFFFF;\n	width: auto;\n	float: none;\n}\n\n.pm-message h2 {\n	padding-bottom: 5px;\n}\n\n#cp-main .postbody h3, #cp-main .box2 h3 {\n	margin-top: 0;\n}\n\n#cp-main .buttons {\n	margin-left: 0;\n}\n\n#cp-main ul.linklist {\n	margin: 0;\n}\n\n/* MCP Specific tweaks */\n.mcp-main .postbody {\n	width: 100%;\n}\n\n/* CP tabbed menu\n----------------------------------------*/\n#tabs {\n	line-height: normal;\n	margin: 20px 0 -1px 7px;\n	min-width: 570px;\n}\n\n#tabs ul {\n	margin:0;\n	padding: 0;\n	list-style: none;\n}\n\n#tabs li {\n	display: inline;\n	margin: 0;\n	padding: 0;\n	font-size: 1em;\n	font-weight: bold;\n}\n\n#tabs a {\n	float: left;\n	background: none no-repeat 0% -35px;\n	margin: 0 1px 0 0;\n	padding: 0 0 0 5px;\n	text-decoration: none;\n	position: relative;\n	cursor: pointer;\n}\n\n#tabs a span {\n	float: left;\n	display: block;\n	background: none no-repeat 100% -35px;\n	padding: 6px 10px 6px 5px;\n	color: #828282;\n	white-space: nowrap;\n}\n\n#tabs a:hover span {\n	color: #bcbcbc;\n}\n\n#tabs .activetab a {\n	background-position: 0 0;\n	border-bottom: 1px solid #ebebeb;\n}\n\n#tabs .activetab a span {\n	background-position: 100% 0;\n	padding-bottom: 7px;\n	color: #333333;\n}\n\n#tabs a:hover {\n	background-position: 0 -70px;\n}\n\n#tabs a:hover span {\n	background-position:100% -70px;\n}\n\n#tabs .activetab a:hover {\n	background-position: 0 0;\n}\n\n#tabs .activetab a:hover span {\n	color: #000000;\n	background-position: 100% 0;\n}\n\n/* Mini tabbed menu used in MCP\n----------------------------------------*/\n#minitabs {\n	line-height: normal;\n	margin: -20px 7px 0 0;\n}\n\n#minitabs ul {\n	margin:0;\n	padding: 0;\n	list-style: none;\n}\n\n#minitabs li {\n	display: block;\n	float: right;\n	padding: 0 10px 4px 10px;\n	font-size: 1em;\n	font-weight: bold;\n	background-color: #f2f2f2;\n	margin-left: 2px;\n}\n\n#minitabs a {\n}\n\n#minitabs a:hover {\n	text-decoration: none;\n}\n\n#minitabs li.activetab {\n	background-color: #F9F9F9;\n}\n\n#minitabs li.activetab a, #minitabs li.activetab a:hover {\n	color: #333333;\n}\n\n/* UCP navigation menu\n----------------------------------------*/\n/* Container for sub-navigation list */\n#navigation {\n	width: 100%;\n	padding-top: 36px;\n}\n\n#navigation ul {\n	list-style:none;\n}\n\n/* Default list state */\n#navigation li {\n	margin: 1px 0;\n	padding: 0;\n	font-weight: bold;\n	display: inline;\n}\n\n/* Link styles for the sub-section links */\n#navigation a {\n	display: block;\n	padding: 5px;\n	margin: 1px 0;\n	text-decoration: none;\n	font-weight: bold;\n	color: #333;\n	background: #cfcfcf none repeat-y 100% 0;\n}\n\n#navigation a:hover {\n	text-decoration: none;\n	background-color: #c6c6c6;\n	color: #bcbcbc;\n	background-image: none;\n}\n\n#navigation #active-subsection a {\n	display: block;\n	color: #d3d3d3;\n	background-color: #F9F9F9;\n	background-image: none;\n}\n\n#navigation #active-subsection a:hover {\n	color: #d3d3d3;\n}\n\n/* Preferences pane layout\n----------------------------------------*/\n#cp-main h2 {\n	border-bottom: none;\n	padding: 0;\n	margin-left: 10px;\n	color: #333333;\n}\n\n#cp-main .panel {\n	background-color: #F9F9F9;\n}\n\n#cp-main .pm {\n	background-color: #FFFFFF;\n}\n\n#cp-main span.corners-top, #cp-menu span.corners-top {\n	background-image: none;\n}\n\n#cp-main span.corners-top span, #cp-menu span.corners-top span {\n	background-image: none;\n}\n\n#cp-main span.corners-bottom, #cp-menu span.corners-bottom {\n	background-image: none;\n}\n\n#cp-main span.corners-bottom span, #cp-menu span.corners-bottom span {\n	background-image: none;\n}\n\n/* Topicreview */\n#cp-main .panel #topicreview span.corners-top, #cp-menu .panel #topicreview span.corners-top {\n	background-image: none;\n}\n\n#cp-main .panel #topicreview span.corners-top span, #cp-menu .panel #topicreview span.corners-top span {\n	background-image: none;\n}\n\n#cp-main .panel #topicreview span.corners-bottom, #cp-menu .panel #topicreview span.corners-bottom {\n	background-image: none;\n}\n\n#cp-main .panel #topicreview span.corners-bottom span, #cp-menu .panel #topicreview span.corners-bottom span {\n	background-image: none;\n}\n\n/* Friends list */\n.cp-mini {\n	background-color: #f9f9f9;\n	padding: 0 5px;\n	margin: 10px 15px 10px 5px;\n}\n\n.cp-mini span.corners-top, .cp-mini span.corners-bottom {\n	margin: 0 -5px;\n}\n\ndl.mini dt {\n	font-weight: bold;\n	color: #676767;\n}\n\ndl.mini dd {\n	padding-top: 4px;\n}\n\n.friend-online {\n	font-weight: bold;\n}\n\n.friend-offline {\n	font-style: italic;\n}\n\n/* PM Styles\n----------------------------------------*/\n#pm-menu {\n	line-height: 2.5em;\n}\n\n/* PM Message history */\n.current {\n	color: #999999;\n}\n\n/* Defined rules list for PM options */\nol.def-rules {\n	padding-left: 0;\n}\n\nol.def-rules li {\n	line-height: 180%;\n	padding: 1px;\n}\n\n/* PM marking colours */\n.pmlist li.bg1 {\n	border: solid 3px transparent;\n	border-width: 0 3px;\n}\n\n.pmlist li.bg2 {\n	border: solid 3px transparent;\n	border-width: 0 3px;\n}\n\n.pmlist li.pm_message_reported_colour, .pm_message_reported_colour {\n	border-left-color: #bcbcbc;\n	border-right-color: #bcbcbc;\n}\n\n.pmlist li.pm_marked_colour, .pm_marked_colour {\n	border: solid 3px #ffffff;\n	border-width: 0 3px;\n}\n\n.pmlist li.pm_replied_colour, .pm_replied_colour {\n	border: solid 3px #c2c2c2;\n	border-width: 0 3px;	\n}\n\n.pmlist li.pm_friend_colour, .pm_friend_colour {\n	border: solid 3px #bdbdbd;\n	border-width: 0 3px;\n}\n\n.pmlist li.pm_foe_colour, .pm_foe_colour {\n	border: solid 3px #000000;\n	border-width: 0 3px;\n}\n\n.pm-legend {\n	border-left-width: 10px;\n	border-left-style: solid;\n	border-right-width: 0;\n	margin-bottom: 3px;\n	padding-left: 3px;\n}\n\n/* Avatar gallery */\n#gallery label {\n	position: relative;\n	float: left;\n	margin: 10px;\n	padding: 5px;\n	width: auto;\n	background: #FFFFFF;\n	border: 1px solid #CCC;\n	text-align: center;\n}\n\n#gallery label:hover {\n	background-color: #EEE;\n}\n/* proSilver Form Styles\n---------------------------------------- */\n\n/* General form styles\n----------------------------------------*/\nfieldset {\n	border-width: 0;\n	font-family: Verdana, Helvetica, Arial, sans-serif;\n	font-size: 1.1em;\n}\n\ninput {\n	font-weight: normal;\n	cursor: pointer;\n	vertical-align: middle;\n	padding: 0 3px;\n	font-size: 1em;\n	font-family: Verdana, Helvetica, Arial, sans-serif;\n}\n\nselect {\n	font-family: Verdana, Helvetica, Arial, sans-serif;\n	font-weight: normal;\n	cursor: pointer;\n	vertical-align: middle;\n	border: 1px solid #666666;\n	padding: 1px;\n	background-color: #FAFAFA;\n}\n\noption {\n	padding-right: 1em;\n}\n\noption.disabled-option {\n	color: graytext;\n}\n\ntextarea {\n	font-family: \"Lucida Grande\", Verdana, Helvetica, Arial, sans-serif;\n	width: 60%;\n	padding: 2px;\n	font-size: 1em;\n	line-height: 1.4em;\n}\n\nlabel {\n	cursor: default;\n	padding-right: 5px;\n	color: #676767;\n}\n\nlabel input {\n	vertical-align: middle;\n}\n\nlabel img {\n	vertical-align: middle;\n}\n\n/* Definition list layout for forms\n---------------------------------------- */\nfieldset dl {\n	padding: 4px 0;\n}\n\nfieldset dt {\n	float: left;	\n	width: 40%;\n	text-align: left;\n	display: block;\n}\n\nfieldset dd {\n	margin-left: 41%;\n	vertical-align: top;\n	margin-bottom: 3px;\n}\n\n/* Specific layout 1 */\nfieldset.fields1 dt {\n	width: 15em;\n	border-right-width: 0;\n}\n\nfieldset.fields1 dd {\n	margin-left: 15em;\n	border-left-width: 0;\n}\n\nfieldset.fields1 {\n	background-color: transparent;\n}\n\nfieldset.fields1 div {\n	margin-bottom: 3px;\n}\n\n/* Specific layout 2 */\nfieldset.fields2 dt {\n	width: 15em;\n	border-right-width: 0;\n}\n\nfieldset.fields2 dd {\n	margin-left: 16em;\n	border-left-width: 0;\n}\n\n/* Form elements */\ndt label {\n	font-weight: bold;\n	text-align: left;\n}\n\ndd label {\n	white-space: nowrap;\n	color: #333;\n}\n\ndd input, dd textarea {\n	margin-right: 3px;\n}\n\ndd select {\n	width: auto;\n}\n\ndd textarea {\n	width: 85%;\n}\n\n/* Hover effects */\nfieldset dl:hover dt label {\n	color: #000000;\n}\n\nfieldset.fields2 dl:hover dt label {\n	color: inherit;\n}\n\n#timezone {\n	width: 95%;\n}\n\n* html #timezone {\n	width: 50%;\n}\n\n/* Quick-login on index page */\nfieldset.quick-login {\n	margin-top: 5px;\n}\n\nfieldset.quick-login input {\n	width: auto;\n}\n\nfieldset.quick-login input.inputbox {\n	width: 15%;\n	vertical-align: middle;\n	margin-right: 5px;\n	background-color: #f3f3f3;\n}\n\nfieldset.quick-login label {\n	white-space: nowrap;\n	padding-right: 2px;\n}\n\n/* Display options on viewtopic/viewforum pages  */\nfieldset.display-options {\n	text-align: center;\n	margin: 3px 0 5px 0;\n}\n\nfieldset.display-options label {\n	white-space: nowrap;\n	padding-right: 2px;\n}\n\nfieldset.display-options a {\n	margin-top: 3px;\n}\n\n/* Display actions for ucp and mcp pages */\nfieldset.display-actions {\n	text-align: right;\n	line-height: 2em;\n	white-space: nowrap;\n	padding-right: 1em;\n}\n\nfieldset.display-actions label {\n	white-space: nowrap;\n	padding-right: 2px;\n}\n\nfieldset.sort-options {\n	line-height: 2em;\n}\n\n/* MCP forum selection*/\nfieldset.forum-selection {\n	margin: 5px 0 3px 0;\n	float: right;\n}\n\nfieldset.forum-selection2 {\n	margin: 13px 0 3px 0;\n	float: right;\n}\n\n/* Jumpbox */\nfieldset.jumpbox {\n	text-align: right;\n	margin-top: 15px;\n	height: 2.5em;\n}\n\nfieldset.quickmod {\n	width: 50%;\n	float: right;\n	text-align: right;\n	height: 2.5em;\n}\n\n/* Submit button fieldset */\nfieldset.submit-buttons {\n	text-align: center;\n	vertical-align: middle;\n	margin: 5px 0;\n}\n\nfieldset.submit-buttons input {\n	vertical-align: middle;\n	padding-top: 3px;\n	padding-bottom: 3px;\n}\n\n/* Posting page styles\n----------------------------------------*/\n\n/* Buttons used in the editor */\n#format-buttons {\n	margin: 15px 0 2px 0;\n}\n\n#format-buttons input, #format-buttons select {\n	vertical-align: middle;\n}\n\n/* Main message box */\n#message-box {\n	width: 80%;\n}\n\n#message-box textarea {\n	font-family: \"Trebuchet MS\", Verdana, Helvetica, Arial, sans-serif;\n	width: 100%;\n	font-size: 1.2em;\n	color: #333333;\n}\n\n/* Emoticons panel */\n#smiley-box {\n	width: 18%;\n	float: right;\n}\n\n#smiley-box img {\n	margin: 3px;\n}\n\n/* Input field styles\n---------------------------------------- */\n.inputbox {\n	background-color: #FFFFFF;\n	border: 1px solid #c0c0c0;\n	color: #333333;\n	padding: 2px;\n	cursor: text;\n}\n\n.inputbox:hover {\n	border: 1px solid #eaeaea;\n}\n\n.inputbox:focus {\n	border: 1px solid #eaeaea;\n	color: #4b4b4b;\n}\n\ninput.inputbox	{ width: 85%; }\ninput.medium	{ width: 50%; }\ninput.narrow	{ width: 25%; }\ninput.tiny		{ width: 125px; }\n\ntextarea.inputbox {\n	width: 85%;\n}\n\n.autowidth {\n	width: auto !important;\n}\n\n/* Form button styles\n---------------------------------------- */\ninput.button1, input.button2 {\n	font-size: 1em;\n}\n\na.button1, input.button1, input.button3, a.button2, input.button2 {\n	width: auto !important;\n	padding-top: 1px;\n	padding-bottom: 1px;\n	font-family: \"Lucida Grande\", Verdana, Helvetica, Arial, sans-serif;\n	color: #000;\n	background: #FAFAFA none repeat-x top;\n}\n\na.button1, input.button1 {\n	font-weight: bold;\n	border: 1px solid #666666;\n}\n\ninput.button3 {\n	padding: 0;\n	margin: 0;\n	line-height: 5px;\n	height: 12px;\n	background-image: none;\n	font-variant: small-caps;\n}\n\n/* Alternative button */\na.button2, input.button2, input.button3 {\n	border: 1px solid #666666;\n}\n\n/* <a> button in the style of the form buttons */\na.button1, a.button1:link, a.button1:visited, a.button1:active, a.button2, a.button2:link, a.button2:visited, a.button2:active {\n	text-decoration: none;\n	color: #000000;\n	padding: 2px 8px;\n	line-height: 250%;\n	vertical-align: text-bottom;\n	background-position: 0 1px;\n}\n\n/* Hover states */\na.button1:hover, input.button1:hover, a.button2:hover, input.button2:hover, input.button3:hover {\n	border: 1px solid #BCBCBC;\n	background-position: 0 100%;\n	color: #BCBCBC;\n}\n\ninput.disabled {\n	font-weight: normal;\n	color: #666666;\n}\n\n/* Topic and forum Search */\n.search-box {\n	margin-top: 3px;\n	margin-left: 5px;\n	float: left;\n}\n\n.search-box input {\n}\n\ninput.search {\n	background-image: none;\n	background-repeat: no-repeat;\n	background-position: left 1px;\n	padding-left: 17px;\n}\n\n.full { width: 95%; }\n.medium { width: 50%;}\n.narrow { width: 25%;}\n.tiny { width: 10%;}\n/* proSilver Style Sheet Tweaks\n\nThese style definitions are mainly IE specific \ntweaks required due to its poor CSS support.\n-------------------------------------------------*/\n\n* html table, * html select, * html input { font-size: 100%; }\n* html hr { margin: 0; }\n* html span.corners-top, * html span.corners-bottom { background-image: url(\"{T_THEME_PATH}/images/corners_left.gif\"); }\n* html span.corners-top span, * html span.corners-bottom span { background-image: url(\"{T_THEME_PATH}/images/corners_right.gif\"); }\n\ntable.table1 {\n	width: 99%;		/* IE < 6 browsers */\n	/* Tantek hack */\n	voice-family: \"\\\"}\\\"\";\n	voice-family: inherit;\n	width: 100%;\n}\nhtml>body table.table1 { width: 100%; }	/* Reset 100% for opera */\n\n* html ul.topiclist li { position: relative; }\n* html .postbody h3 img { vertical-align: middle; }\n\n/* Form styles */\nhtml>body dd label input { vertical-align: text-bottom; }	/* Align checkboxes/radio buttons nicely */\n\n* html input.button1, * html input.button2 {\n	padding-bottom: 0;\n	margin-bottom: 1px;\n}\n\n/* Misc layout styles */\n* html .column1, * html .column2 { width: 45%; }\n\n/* Nice method for clearing floated blocks without having to insert any extra markup (like spacer above)\n   From http://www.positioniseverything.net/easyclearing.html \n#tabs:after, #minitabs:after, .post:after, .navbar:after, fieldset dl:after, ul.topiclist dl:after, ul.linklist:after, dl.polls:after {\n	content: \".\"; \n	display: block; \n	height: 0; \n	clear: both; \n	visibility: hidden;\n}*/\n\n.clearfix, #tabs, #minitabs, fieldset dl, ul.topiclist dl, dl.polls {\n	height: 1%;\n	overflow: hidden;\n}\n\n/* viewtopic fix */\n* html .post {\n	height: 25%;\n	overflow: hidden;\n}\n\n/* navbar fix */\n* html .clearfix, * html .navbar, ul.linklist {\n	height: 4%;\n	overflow: hidden;\n}\n\n/* Simple fix so forum and topic lists always have a min-height set, even in IE6\n	From http://www.dustindiaz.com/min-height-fast-hack */\ndl.icon {\n	min-height: 35px;\n	height: auto !important;\n	height: 35px;\n}\n\n* html #search-box {\n	width: 25%;\n}\n\n/* Correctly clear floating for details on profile view */\n*:first-child+html dl.details dd {\n	margin-left: 30%;\n	float: none;\n}\n\n* html dl.details dd {\n	margin-left: 30%;\n	float: none;\n}\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for common.css\n-------------------------------------------------------------- */\n\nhtml, body {\n	color: #536482;\n	background-color: #FFFFFF;\n}\n\nh1 {\n	color: #FFFFFF;\n}\n\nh2 {\n	color: #28313F;\n}\n\nh3 {\n	border-bottom-color: #CCCCCC;\n	color: #115098;\n}\n\nhr {\n	border-color: #FFFFFF;\n	border-top-color: #CCCCCC;\n}\n\nhr.dashed {\n	border-top-color: #CCCCCC;\n}\n\n/* Search box\n--------------------------------------------- */\n\n#search-box {\n	color: #FFFFFF;\n}\n\n#search-box #keywords {\n	background-color: #FFF;\n}\n\n#search-box input {\n	border-color: #0075B0;\n}\n\n/* Round cornered boxes and backgrounds\n---------------------------------------- */\n.headerbar {\n	background-color: #12A3EB;\n	background-image: url(\"{T_THEME_PATH}/images/bg_header.gif\");\n	color: #FFFFFF;\n}\n\n.navbar {\n	background-color: #cadceb;\n}\n\n.forabg {\n	background-color: #0076b1;\n	background-image: url(\"{T_THEME_PATH}/images/bg_list.gif\");\n}\n\n.forumbg {\n	background-color: #12A3EB;\n	background-image: url(\"{T_THEME_PATH}/images/bg_header.gif\");\n}\n\n.panel {\n	background-color: #ECF1F3;\n	color: #28313F;\n}\n\n.post:target .content {\n	color: #000000;\n}\n\n.post:target h3 a {\n	color: #000000;\n}\n\n.bg1	{ background-color: #ECF3F7; }\n.bg2	{ background-color: #e1ebf2;  }\n.bg3	{ background-color: #cadceb; }\n\n.ucprowbg {\n	background-color: #DCDEE2;\n}\n\n.fieldsbg {\n	background-color: #E7E8EA;\n}\n\nspan.corners-top {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left.png\");\n}\n\nspan.corners-top span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right.png\");\n}\n\nspan.corners-bottom {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left.png\");\n}\n\nspan.corners-bottom span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right.png\");\n}\n\n/* Horizontal lists\n----------------------------------------*/\n\nul.navlinks {\n	border-bottom-color: #FFFFFF;\n}\n\n/* Table styles\n----------------------------------------*/\ntable.table1 thead th {\n	color: #FFFFFF;\n}\n\ntable.table1 tbody tr {\n	border-color: #BFC1CF;\n}\n\ntable.table1 tbody tr:hover, table.table1 tbody tr.hover {\n	background-color: #CFE1F6;\n	color: #000;\n}\n\ntable.table1 td {\n	color: #536482;\n}\n\ntable.table1 tbody td {\n	border-top-color: #FAFAFA;\n}\n\ntable.table1 tbody th {\n	border-bottom-color: #000000;\n	color: #333333;\n	background-color: #FFFFFF;\n}\n\ntable.info tbody th {\n	color: #000000;\n}\n\n/* Misc layout styles\n---------------------------------------- */\ndl.details dt {\n	color: #000000;\n}\n\ndl.details dd {\n	color: #536482;\n}\n\n.sep {\n	color: #1198D9;\n}\n\n/* Pagination\n---------------------------------------- */\n\n.pagination span strong {\n	color: #FFFFFF;\n	background-color: #4692BF;\n	border-color: #4692BF;\n}\n\n.pagination span a, .pagination span a:link, .pagination span a:visited, .pagination span a:active {\n	color: #5C758C;\n	background-color: #ECEDEE;\n	border-color: #B4BAC0;\n}\n\n.pagination span a:hover {\n	border-color: #368AD2;\n	background-color: #368AD2;\n	color: #FFF;\n}\n\n/* Pagination in viewforum for multipage topics */\n.row .pagination {\n	background-image: url(\"{T_THEME_PATH}/images/icon_pages.gif\");\n}\n\n.row .pagination span a, li.pagination span a {\n	background-color: #FFFFFF;\n}\n\n.row .pagination span a:hover, li.pagination span a:hover {\n	background-color: #368AD2;\n}\n\n/* Miscellaneous styles\n---------------------------------------- */\n\n.copyright {\n	color: #555555;\n}\n\n.error {\n	color: #BC2A4D;\n}\n\n.reported {\n	background-color: #F7ECEF;\n}\n\nli.reported:hover {\n	background-color: #ECD5D8 !important;\n}\n.sticky, .announce {\n	/* you can add a background for stickies and announcements*/\n}\n\ndiv.rules {\n	background-color: #ECD5D8;\n	color: #BC2A4D;\n}\n\np.rules {\n	background-color: #ECD5D8;\n	background-image: none;\n}\n\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for links.css\n-------------------------------------------------------------- */\n\na:link	{ color: #105289; }\na:visited	{ color: #105289; }\na:hover	{ color: #D31141; }\na:active	{ color: #368AD2; }\n\n/* Links on gradient backgrounds */\n#search-box a:link, .navbg a:link, .forumbg .header a:link, .forabg .header a:link, th a:link {\n	color: #FFFFFF;\n}\n\n#search-box a:visited, .navbg a:visited, .forumbg .header a:visited, .forabg .header a:visited, th a:visited {\n	color: #FFFFFF;\n}\n\n#search-box a:hover, .navbg a:hover, .forumbg .header a:hover, .forabg .header a:hover, th a:hover {\n	color: #A8D8FF;\n}\n\n#search-box a:active, .navbg a:active, .forumbg .header a:active, .forabg .header a:active, th a:active {\n	color: #C8E6FF;\n}\n\n/* Links for forum/topic lists */\na.forumtitle {\n	color: #105289;\n}\n\n/* a.forumtitle:visited { color: #105289; } */\n\na.forumtitle:hover {\n	color: #BC2A4D;\n}\n\na.forumtitle:active {\n	color: #105289;\n}\n\na.topictitle {\n	color: #105289;\n}\n\n/* a.topictitle:visited { color: #368AD2; } */\n\na.topictitle:hover {\n	color: #BC2A4D;\n}\n\na.topictitle:active {\n	color: #105289;\n}\n\n/* Post body links */\n.postlink {\n	color: #368AD2;\n	border-bottom-color: #368AD2;\n}\n\n.postlink:visited {\n	color: #5D8FBD;\n	border-bottom-color: #666666;\n}\n\n.postlink:active {\n	color: #368AD2;\n}\n\n.postlink:hover {\n	background-color: #D0E4F6;\n	color: #0D4473;\n}\n\n.signature a, .signature a:visited, .signature a:active, .signature a:hover {\n	background-color: transparent;\n}\n\n/* Profile links */\n.postprofile a:link, .postprofile a:active, .postprofile a:visited, .postprofile dt.author a {\n	color: #105289;\n}\n\n.postprofile a:hover, .postprofile dt.author a:hover {\n	color: #D31141;\n}\n\n/* Profile searchresults */	\n.search .postprofile a {\n	color: #105289;\n}\n\n.search .postprofile a:hover {\n	color: #D31141;\n}\n\n/* Back to top of page */\na.top {\n	background-image: url(\"{IMG_ICON_BACK_TOP_SRC}\");\n}\n\na.top2 {\n	background-image: url(\"{IMG_ICON_BACK_TOP_SRC}\");\n}\n\n/* Arrow links  */\na.up		{ background-image: url(\"{T_THEME_PATH}/images/arrow_up.gif\") }\na.down		{ background-image: url(\"{T_THEME_PATH}/images/arrow_down.gif\") }\na.left		{ background-image: url(\"{T_THEME_PATH}/images/arrow_left.gif\") }\na.right		{ background-image: url(\"{T_THEME_PATH}/images/arrow_right.gif\") }\n\na.up:hover {\n	background-color: transparent;\n}\n\na.left:hover {\n	color: #368AD2;\n}\n\na.right:hover {\n	color: #368AD2;\n}\n\n\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for content.css\n-------------------------------------------------------------- */\n\nul.forums {\n	background-color: #eef5f9;\n	background-image: url(\"{T_THEME_PATH}/images/gradient.gif\");\n}\n\nul.topiclist li {\n	color: #4C5D77;\n}\n\nul.topiclist dd {\n	border-left-color: #FFFFFF;\n}\n\n.rtl ul.topiclist dd {\n	border-right-color: #fff;\n	border-left-color: transparent;\n}\n\nul.topiclist li.row dt a.subforum.read {\n	background-image: url(\"{IMG_SUBFORUM_READ_SRC}\");\n}\n\nul.topiclist li.row dt a.subforum.unread {\n	background-image: url(\"{IMG_SUBFORUM_UNREAD_SRC}\");\n}\n\nli.row {\n	border-top-color:  #FFFFFF;\n	border-bottom-color: #00608F;\n}\n\nli.row strong {\n	color: #000000;\n}\n\nli.row:hover {\n	background-color: #F6F4D0;\n}\n\nli.row:hover dd {\n	border-left-color: #CCCCCC;\n}\n\n.rtl li.row:hover dd {\n	border-right-color: #CCCCCC;\n	border-left-color: transparent;\n}\n\nli.header dt, li.header dd {\n	color: #FFFFFF;\n}\n\n/* Forum list column styles */\nul.topiclist dd.searchextra {\n	color: #333333;\n}\n\n/* Post body styles\n----------------------------------------*/\n.postbody {\n	color: #333333;\n}\n\n/* Content container styles\n----------------------------------------*/\n.content {\n	color: #333333;\n}\n\n.content h2, .panel h2 {\n	color: #115098;\n	border-bottom-color:  #CCCCCC;\n}\n\ndl.faq dt {\n	color: #333333;\n}\n\n.posthilit {\n	background-color: #F3BFCC;\n	color: #BC2A4D;\n}\n\n/* Post signature */\n.signature {\n	border-top-color: #CCCCCC;\n}\n\n/* Post noticies */\n.notice {\n	border-top-color:  #CCCCCC;\n}\n\n/* BB Code styles\n----------------------------------------*/\n/* Quote block */\nblockquote {\n	background-color: #EBEADD;\n	background-image: url(\"{T_THEME_PATH}/images/quote.gif\");\n	border-color:#DBDBCE;\n}\n\nblockquote blockquote {\n	/* Nested quotes */\n	background-color:#EFEED9;\n}\n\nblockquote blockquote blockquote {\n	/* Nested quotes */\n	background-color: #EBEADD;\n}\n\n/* Code block */\ndl.codebox {\n	background-color: #FFFFFF;\n	border-color: #C9D2D8;\n}\n\ndl.codebox dt {\n	border-bottom-color:  #CCCCCC;\n}\n\ndl.codebox code {\n	color: #2E8B57;\n}\n\n.syntaxbg		{ color: #FFFFFF; }\n.syntaxcomment	{ color: #FF8000; }\n.syntaxdefault	{ color: #0000BB; }\n.syntaxhtml		{ color: #000000; }\n.syntaxkeyword	{ color: #007700; }\n.syntaxstring	{ color: #DD0000; }\n\n/* Attachments\n----------------------------------------*/\n.attachbox {\n	background-color: #FFFFFF;\n	border-color:  #C9D2D8;\n}\n\n.pm-message .attachbox {\n	background-color: #F2F3F3;\n}\n\n.attachbox dd {\n	border-top-color: #C9D2D8;\n}\n\n.attachbox p {\n	color: #666666;\n}\n\n.attachbox p.stats {\n	color: #666666;\n}\n\n.attach-image img {\n	border-color: #999999;\n}\n\n/* Inline image thumbnails */\n\ndl.file dd {\n	color: #666666;\n}\n\ndl.thumbnail img {\n	border-color: #666666;\n	background-color: #FFFFFF;\n}\n\ndl.thumbnail dd {\n	color: #666666;\n}\n\ndl.thumbnail dt a:hover {\n	background-color: #EEEEEE;\n}\n\ndl.thumbnail dt a:hover img {\n	border-color: #368AD2;\n}\n\n/* Post poll styles\n----------------------------------------*/\n\nfieldset.polls dl {\n	border-top-color: #DCDEE2;\n	color: #666666;\n}\n\nfieldset.polls dl.voted {\n	color: #000000;\n}\n\nfieldset.polls dd div {\n	color: #FFFFFF;\n}\n\n.rtl .pollbar1, .rtl .pollbar2, .rtl .pollbar3, .rtl .pollbar4, .rtl .pollbar5 {\n	border-right-color: transparent;\n}\n\n.pollbar1 {\n	background-color: #AA2346;\n	border-bottom-color: #74162C;\n	border-right-color: #74162C;\n}\n\n.rtl .pollbar1 {\n	border-left-color: #74162C;\n}\n\n.pollbar2 {\n	background-color: #BE1E4A;\n	border-bottom-color: #8C1C38;\n	border-right-color: #8C1C38;\n}\n\n.rtl .pollbar2 {\n	border-left-color: #8C1C38;\n}\n\n.pollbar3 {\n	background-color: #D11A4E;\n	border-bottom-color: #AA2346;\n	border-right-color: #AA2346;\n}\n\n.rtl .pollbar3 {\n	border-left-color: #AA2346;\n}\n\n.pollbar4 {\n	background-color: #E41653;\n	border-bottom-color: #BE1E4A;\n	border-right-color: #BE1E4A;\n}\n\n.rtl .pollbar4 {\n	border-left-color: #BE1E4A;\n}\n\n.pollbar5 {\n	background-color: #F81157;\n	border-bottom-color: #D11A4E;\n	border-right-color: #D11A4E;\n}\n\n.rtl .pollbar5 {\n	border-left-color: #D11A4E;\n}\n\n/* Poster profile block\n----------------------------------------*/\n.postprofile {\n	color: #666666;\n	border-left-color: #FFFFFF;\n}\n\n.rtl .postprofile {\n	border-right-color: #FFFFFF;\n	border-left-color: transparent;\n}\n\n.pm .postprofile {\n	border-left-color: #DDDDDD;\n}\n\n.rtl .pm .postprofile {\n	border-right-color: #DDDDDD;\n	border-left-color: transparent;\n}\n\n.postprofile strong {\n	color: #000000;\n}\n\n.online {\n	background-image: url(\"{T_IMAGESET_LANG_PATH}/icon_user_online.gif\");\n}\n\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for buttons.css\n-------------------------------------------------------------- */\n\n/* Big button images */\n.reply-icon span	{ background-image: url(\"{IMG_BUTTON_TOPIC_REPLY_SRC}\"); }\n.post-icon span		{ background-image: url(\"{IMG_BUTTON_TOPIC_NEW_SRC}\"); }\n.locked-icon span	{ background-image: url(\"{IMG_BUTTON_TOPIC_LOCKED_SRC}\"); }\n.pmreply-icon span	{ background-image: url(\"{IMG_BUTTON_PM_REPLY_SRC}\") ;}\n.newpm-icon span 	{ background-image: url(\"{IMG_BUTTON_PM_NEW_SRC}\") ;}\n.forwardpm-icon span	{ background-image: url(\"{IMG_BUTTON_PM_FORWARD_SRC}\") ;}\n\na.print {\n	background-image: url(\"{T_THEME_PATH}/images/icon_print.gif\");\n}\n\na.sendemail {\n	background-image: url(\"{T_THEME_PATH}/images/icon_sendemail.gif\");\n}\n\na.fontsize {\n	background-image: url(\"{T_THEME_PATH}/images/icon_fontsize.gif\");\n}\n\n/* Icon images\n---------------------------------------- */\n.sitehome						{ background-image: url(\"{T_THEME_PATH}/images/icon_home.gif\"); }\n.icon-faq						{ background-image: url(\"{T_THEME_PATH}/images/icon_faq.gif\"); }\n.icon-contact					{ background-image: url(\"{T_THEME_PATH}/images/icon_contact.gif\"); }\n.icon-members					{ background-image: url(\"{T_THEME_PATH}/images/icon_members.gif\"); }\n.icon-home						{ background-image: url(\"{T_THEME_PATH}/images/icon_home.gif\"); }\n.icon-ucp						{ background-image: url(\"{T_THEME_PATH}/images/icon_ucp.gif\"); }\n.icon-register					{ background-image: url(\"{T_THEME_PATH}/images/icon_register.gif\"); }\n.icon-logout					{ background-image: url(\"{T_THEME_PATH}/images/icon_logout.gif\"); }\n.icon-bookmark					{ background-image: url(\"{T_THEME_PATH}/images/icon_bookmark.gif\"); }\n.icon-bump						{ background-image: url(\"{T_THEME_PATH}/images/icon_bump.gif\"); }\n.icon-subscribe					{ background-image: url(\"{T_THEME_PATH}/images/icon_subscribe.gif\"); }\n.icon-unsubscribe				{ background-image: url(\"{T_THEME_PATH}/images/icon_unsubscribe.gif\"); }\n.icon-pages						{ background-image: url(\"{T_THEME_PATH}/images/icon_pages.gif\"); }\n.icon-search					{ background-image: url(\"{T_THEME_PATH}/images/icon_search.gif\"); }\n.icon-favorites					{ background-image: url(\"{T_THEME_PATH}/images/icon_mini_ffavorites.gif\"); }\n\n/* Profile & navigation icons */\n.email-icon, .email-icon a		{ background-image: url(\"{IMG_ICON_CONTACT_EMAIL_SRC}\"); }\n.aim-icon, .aim-icon a			{ background-image: url(\"{IMG_ICON_CONTACT_AIM_SRC}\"); }\n.yahoo-icon, .yahoo-icon a		{ background-image: url(\"{IMG_ICON_CONTACT_YAHOO_SRC}\"); }\n.web-icon, .web-icon a			{ background-image: url(\"{IMG_ICON_CONTACT_WWW_SRC}\"); }\n.msnm-icon, .msnm-icon a			{ background-image: url(\"{IMG_ICON_CONTACT_MSNM_SRC}\"); }\n.icq-icon, .icq-icon a			{ background-image: url(\"{IMG_ICON_CONTACT_ICQ_SRC}\"); }\n.jabber-icon, .jabber-icon a		{ background-image: url(\"{IMG_ICON_CONTACT_JABBER_SRC}\"); }\n.pm-icon, .pm-icon a				{ background-image: url(\"{IMG_ICON_CONTACT_PM_SRC}\"); }\n.quote-icon, .quote-icon a		{ background-image: url(\"{IMG_ICON_POST_QUOTE_SRC}\"); }\n\n/* Moderator icons */\n.report-icon, .report-icon a		{ background-image: url(\"{IMG_ICON_POST_REPORT_SRC}\"); }\n.edit-icon, .edit-icon a			{ background-image: url(\"{IMG_ICON_POST_EDIT_SRC}\"); }\n.delete-icon, .delete-icon a		{ background-image: url(\"{IMG_ICON_POST_DELETE_SRC}\"); }\n.info-icon, .info-icon a			{ background-image: url(\"{IMG_ICON_POST_INFO_SRC}\"); }\n.warn-icon, .warn-icon a			{ background-image: url(\"{IMG_ICON_USER_WARN_SRC}\"); } /* Need updated warn icon */\n\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for cp.css\n-------------------------------------------------------------- */\n\n/* Main CP box\n----------------------------------------*/\n\n#cp-main h3, #cp-main hr, #cp-menu hr {\n	border-color: #A4B3BF;\n}\n\n#cp-main .panel li.row {\n	border-bottom-color: #B5C1CB;\n	border-top-color: #F9F9F9;\n}\n\nul.cplist {\n	border-top-color: #B5C1CB;\n}\n\n#cp-main .panel li.header dd, #cp-main .panel li.header dt {\n	color: #000000;\n}\n\n#cp-main table.table1 thead th {\n	color: #333333;\n	border-bottom-color: #333333;\n}\n\n#cp-main .pm-message {\n	border-color: #DBDEE2;\n	background-color: #FFFFFF;\n}\n\n/* CP tabbed menu\n----------------------------------------*/\n#tabs a {\n	background-image: url(\"{T_THEME_PATH}/images/bg_tabs1.gif\");\n}\n\n#tabs a span {\n	background-image: url(\"{T_THEME_PATH}/images/bg_tabs2.gif\");\n	color: #536482;\n}\n\n#tabs a:hover span {\n	color: #BC2A4D;\n}\n\n#tabs .activetab a {\n	border-bottom-color: #CADCEB;\n}\n\n#tabs .activetab a span {\n	color: #333333;\n}\n\n#tabs .activetab a:hover span {\n	color: #000000;\n}\n\n/* Mini tabbed menu used in MCP\n----------------------------------------*/\n#minitabs li {\n	background-color: #E1EBF2;\n}\n\n#minitabs li.activetab {\n	background-color: #F9F9F9;\n}\n\n#minitabs li.activetab a, #minitabs li.activetab a:hover {\n	color: #333333;\n}\n\n/* UCP navigation menu\n----------------------------------------*/\n\n/* Link styles for the sub-section links */\n#navigation a {\n	color: #333;\n	background-color: #B2C2CF;\n	background-image: url(\"{T_THEME_PATH}/images/bg_menu.gif\");\n}\n\n#navigation a:hover {\n	background-color: #aabac6;\n	color: #BC2A4D;\n}\n\n#navigation #active-subsection a {\n	color: #D31141;\n	background-color: #F9F9F9;\n	background-image: none;\n}\n\n#navigation #active-subsection a:hover {\n	color: #D31141;\n}\n\n/* Preferences pane layout\n----------------------------------------*/\n#cp-main h2 {\n	color: #333333;\n}\n\n#cp-main .panel {\n	background-color: #F9F9F9;\n}\n\n#cp-main .pm {\n	background-color: #FFFFFF;\n}\n\n#cp-main span.corners-top, #cp-menu span.corners-top {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left2.gif\");\n}\n\n#cp-main span.corners-top span, #cp-menu span.corners-top span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right2.gif\");\n}\n\n#cp-main span.corners-bottom, #cp-menu span.corners-bottom {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left2.gif\");\n}\n\n#cp-main span.corners-bottom span, #cp-menu span.corners-bottom span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right2.gif\");\n}\n\n/* Topicreview */\n#cp-main .panel #topicreview span.corners-top, #cp-menu .panel #topicreview span.corners-top {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left.gif\");\n}\n\n#cp-main .panel #topicreview span.corners-top span, #cp-menu .panel #topicreview span.corners-top span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right.gif\");\n}\n\n#cp-main .panel #topicreview span.corners-bottom, #cp-menu .panel #topicreview span.corners-bottom {\n	background-image: url(\"{T_THEME_PATH}/images/corners_left.gif\");\n}\n\n#cp-main .panel #topicreview span.corners-bottom span, #cp-menu .panel #topicreview span.corners-bottom span {\n	background-image: url(\"{T_THEME_PATH}/images/corners_right.gif\");\n}\n\n/* Friends list */\n.cp-mini {\n	background-color: #eef5f9;\n}\n\ndl.mini dt {\n	color: #425067;\n}\n\n/* PM Styles\n----------------------------------------*/\n/* PM Message history */\n.current {\n	color: #999999 !important;\n}\n\n/* PM marking colours */\n.pmlist li.pm_message_reported_colour, .pm_message_reported_colour {\n	border-left-color: #BC2A4D;\n	border-right-color: #BC2A4D;\n}\n\n.pmlist li.pm_marked_colour, .pm_marked_colour {\n	border-color: #FF6600;\n}\n\n.pmlist li.pm_replied_colour, .pm_replied_colour {\n	border-color: #A9B8C2;\n}\n\n.pmlist li.pm_friend_colour, .pm_friend_colour {\n	border-color: #5D8FBD;\n}\n\npmlist li.pm_foe_colour, .pm_foe_colour {\n	border-color: #000000;\n}\n\n/* Avatar gallery */\n#gallery label {\n	background-color: #FFFFFF;\n	border-color: #CCC;\n}\n\n#gallery label:hover {\n	background-color: #EEE;\n}\n\n/*  	\n--------------------------------------------------------------\nColours and backgrounds for forms.css\n-------------------------------------------------------------- */\n\n/* General form styles\n----------------------------------------*/\nselect {\n	border-color: #666666;\n	background-color: #FAFAFA;\n}\n\nlabel {\n	color: #425067;\n}\n\noption.disabled-option {\n	color: graytext;\n}\n\n/* Definition list layout for forms\n---------------------------------------- */\ndd label {\n	color: #333;\n}\n\n/* Hover effects */\nfieldset dl:hover dt label {\n	color: #000000;\n}\n\nfieldset.fields2 dl:hover dt label {\n	color: inherit;\n}\n\n/* Quick-login on index page */\nfieldset.quick-login input.inputbox {\n	background-color: #F2F3F3;\n}\n\n/* Posting page styles\n----------------------------------------*/\n\n#message-box textarea {\n	color: #333333;\n}\n\n/* Input field styles\n---------------------------------------- */\n.inputbox {\n	background-color: #FFFFFF; \n	border-color: #B4BAC0;\n	color: #333333;\n}\n\n.inputbox:hover {\n	border-color: #11A3EA;\n}\n\n.inputbox:focus {\n	border-color: #11A3EA;\n	color: #0F4987;\n}\n\n/* Form button styles\n---------------------------------------- */\n\na.button1, input.button1, input.button3, a.button2, input.button2 {\n	color: #000;\n	background-color: #FAFAFA;\n	background-image: url(\"{T_THEME_PATH}/images/bg_button.gif\");\n}\n\na.button1, input.button1 {\n	border-color: #666666;\n}\n\ninput.button3 {\n	background-image: none;\n}\n\n/* Alternative button */\na.button2, input.button2, input.button3 {\n	border-color: #666666;\n}\n\n/* <a> button in the style of the form buttons */\na.button1, a.button1:link, a.button1:visited, a.button1:active, a.button2, a.button2:link, a.button2:visited, a.button2:active {\n	color: #000000;\n}\n\n/* Hover states */\na.button1:hover, input.button1:hover, a.button2:hover, input.button2:hover, input.button3:hover {\n	border-color: #BC2A4D;\n	color: #BC2A4D;\n}\n\ninput.search {\n	background-image: url(\"{T_THEME_PATH}/images/icon_textbox_search.gif\");\n}\n\ninput.disabled {\n	color: #666666;\n}\n\n.highslide {\n	cursor: url(\"{T_THEME_PATH}/graphics/zoomin.cur\"), pointer;\n    outline: none;\n}\n.highslide-active-anchor img {\n	visibility: hidden;\n}\n.highslide img {\n	border: 2px solid gray;\n}\n.highslide:hover img {\n	border: 2px solid white;\n}\n\n.highslide-wrapper {\n	background: white;\n}\n.highslide-image {\n    border: 2px solid white;\n}\n.highslide-image-blur {\n}\n.highslide-caption {\n    display: none;\n	 color: black;\n    border: 2px solid white;\n    border-top: none;\n    font-family: Verdana, Helvetica;\n    font-size: 10pt;\n    padding: 5px;\n    background-color: white;\n}\n.highslide-loading {\n    display: block;\n	color: black;\n	font-size: 8pt;\n	font-family: sans-serif;\n	font-weight: bold;\n    text-decoration: none;\n	padding: 2px;\n	border: 1px solid black;\n    background-color: white;\n    padding-left: 22px;\n    background-image: url(\"{T_THEME_PATH}/graphics/loader.white.gif\");\n    background-repeat: no-repeat;\n    background-position: 3px 1px;\n}\na.highslide-credits,\na.highslide-credits i {\n    padding: 2px;\n    color: silver;\n    text-decoration: none;\n	font-size: 10px;\n}\na.highslide-credits:hover,\na.highslide-credits:hover i {\n    color: white;\n    background-color: gray;\n}\n\n.highslide-move {\n    cursor: move;\n}\n\n.highslide-overlay {\n	display: none;\n}\n\na.highslide-full-expand {\n	background: url(\"{T_THEME_PATH}/graphics/fullexpand.gif\") no-repeat;\n	display: block;\n	margin: 0 10px 10px 0;\n	width: 34px;\n	height: 34px;\n}\n\n/* Controlbar example */\n.controlbar {	\n	background: url(\"{T_THEME_PATH}/graphics/controlbar4.gif\");\n	width: 167px;\n	height: 34px;\n}\n.controlbar a {	\n	display: block;\n	float: left;\n	/*margin: 0px 0 0 4px;*/	\n	height: 27px;\n}\n.controlbar a:hover {\n	background-image: url(\"{T_THEME_PATH}/graphics/controlbar4-hover.gif\");\n}\n.controlbar .previous {\n	width: 50px;\n}\n.controlbar .next {\n	width: 40px;\n	background-position: -50px 0;\n}\n.controlbar .highslide-move {\n	width: 40px;\n	background-position: -90px 0;\n}\n.controlbar .close {\n	width: 36px;\n	background-position: -130px 0;\n}\n\n.highslide-dimming {\n   background: black;\n   position: absolute;\n}\n\n/* Necessary for functionality */\n.highslide-display-block {\n    display: block;\n}\n.highslide-display-none {\n    display: none;\n}\n#lbOverlay { position: fixed; top: 0; left: 0; z-index: 99998; width: 100%; height: 500px; }\n#lbOverlay.grey { background-color: #000000; }\n\n#lbMain { position: absolute; left: 0; width: 100%; z-index: 99999; text-align: center; line-height: 0; }\n#lbMain a img { border: none; }\n\n#lbOuterContainer { position: relative; background-color: #fff; width: 200px; height: 200px; margin: 0 auto; }\n#lbOuterContainer.grey { border: 3px solid #888888; }\n\n#lbDetailsContainer {	font: 10px Verdana, Helvetica, sans-serif; background-color: #fff; width: 100%; line-height: 1.4em;	overflow: auto; margin: 0 auto; }\n#lbDetailsContainer.grey { border: 3px solid #888888; border-top: none; }\n\n#lbImageContainer, #lbIframeContainer { padding: 10px; }\n#lbLoading {\n	position: absolute; top: 45%; left: 0%; height: 32px; width: 100%; text-align: center; line-height: 0; background: url(\"{T_THEME_PATH}/images/gallery_lytebox/loading.gif\") center no-repeat;\n}\n\n#lbHoverNav { position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 10; }\n#lbImageContainer>#lbHoverNav { left: 0; }\n#lbHoverNav a { outline: none; }\n\n#lbPrev { width: 49%; height: 100%; background: transparent url(\"{T_THEME_PATH}/images/gallery_lytebox/blank.gif\") no-repeat; display: block; left: 0; float: left; }\n#lbPrev.grey:hover, #lbPrev.grey:visited:hover { background: url(\"{T_THEME_PATH}/images/gallery_lytebox/prev_grey.gif\") left 15% no-repeat; }\n\n#lbNext { width: 49%; height: 100%; background: transparent url(\"{T_THEME_PATH}/images/gallery_lytebox/blank.gif\") no-repeat; display: block; right: 0; float: right; }\n#lbNext.grey:hover, #lbNext.grey:visited:hover { background: url(\"{T_THEME_PATH}/images/gallery_lytebox/next_grey.gif\") right 15% no-repeat; }\n\n#lbPrev2, #lbNext2 { text-decoration: none; font-weight: bold; }\n#lbPrev2.grey, #lbNext2.grey, #lbSpacer.grey { color: #333333; }\n\n#lbPrev2_Off, #lbNext2_Off { font-weight: bold; }\n#lbPrev2_Off.grey, #lbNext2_Off.grey { color: #CCCCCC; }\n\n#lbDetailsData { padding: 0 10px; }\n#lbDetailsData.grey { color: #333333; }\n\n#lbDetails { width: 60%; float: left; text-align: left; }\n#lbCaption { display: block; font-weight: bold; }\n#lbNumberDisplay { float: left; display: block; padding-bottom: 1.0em; }\n#lbNavDisplay { float: left; display: block; padding-bottom: 1.0em; }\n\n#lbClose { width: 64px; height: 28px; float: right; margin-bottom: 1px; }\n#lbClose.grey { background: url(\"{T_THEME_PATH}/images/gallery_lytebox/close_grey.png\") no-repeat; }\n\n#lbPlay { width: 64px; height: 28px; float: right; margin-bottom: 1px; }\n#lbPlay.grey { background: url(\"{T_THEME_PATH}/images/gallery_lytebox/play_grey.png\") no-repeat; }\n\n#lbPause { width: 64px; height: 28px; float: right; margin-bottom: 1px; }\n#lbPause.grey { background: url(\"{T_THEME_PATH}/images/gallery_lytebox/pause_grey.png\") no-repeat; }\n\n/*end of lightbox*/\n\n.gallery-icon, .gallery-icon a		{ background: none top left no-repeat; }\nul.profile-icons li.gallery-icon	{ width: 20px; height: 20px; }\n.gallery-icon, .gallery-icon a		{ background-image: url(\"{T_IMAGESET_PATH}/icon_contact_gallery.gif\"); }\n\n.buttons div.upload-icon	{ width: {IMG_BUTTON_UPLOAD_IMAGE_WIDTH}px; height: {IMG_BUTTON_UPLOAD_IMAGE_HEIGHT}px; }\n.upload-icon span	{ background-image: url(\"{T_IMAGESET_LANG_PATH}/button_upload_image.gif\"); }\n\n.icon-gallery {\n	background-position: 0 50%;\n	background-repeat: no-repeat;\n	padding: 1px 0 0 17px;\n	background-image: url(\"{T_THEME_PATH}/images/icon_gallery.gif\");\n}\n\ndd.g_lastimage {\n	padding-left: 5px;\n	width: 30%;\n}\n\ndd.g_rating, dd.g_comments {\n	width: 12%;\n	text-align: center;\n	font-size: 1.1em;\n}\n\ndd.g_status {\n	width: 15%;\n	text-align: center;\n	font-size: 1.1em;\n}\n\nspan.reported-images-number {\n	color: red;\n}\n'),(2, 'subsilver2', '&copy; phpBB Group, 2003', 'subsilver2', 0, 1201110967, '');

# Table: phpbb_topics
DROP TABLE IF EXISTS phpbb_topics;
CREATE TABLE `phpbb_topics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `icon_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_attachment` tinyint(1) unsigned NOT NULL default '0',
  `topic_approved` tinyint(1) unsigned NOT NULL default '1',
  `topic_reported` tinyint(1) unsigned NOT NULL default '0',
  `topic_title` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `topic_poster` mediumint(8) unsigned NOT NULL default '0',
  `topic_time` int(11) unsigned NOT NULL default '0',
  `topic_time_limit` int(11) unsigned NOT NULL default '0',
  `topic_views` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies_real` mediumint(8) unsigned NOT NULL default '0',
  `topic_status` tinyint(3) NOT NULL default '0',
  `topic_type` tinyint(3) NOT NULL default '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_first_poster_name` varchar(255) collate utf8_bin NOT NULL default '',
  `topic_first_poster_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_last_poster_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_last_poster_name` varchar(255) collate utf8_bin NOT NULL default '',
  `topic_last_poster_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `topic_last_post_subject` varchar(255) collate utf8_bin NOT NULL default '',
  `topic_last_post_time` int(11) unsigned NOT NULL default '0',
  `topic_last_view_time` int(11) unsigned NOT NULL default '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_bumped` tinyint(1) unsigned NOT NULL default '0',
  `topic_bumper` mediumint(8) unsigned NOT NULL default '0',
  `poll_title` varchar(255) collate utf8_bin NOT NULL default '',
  `poll_start` int(11) unsigned NOT NULL default '0',
  `poll_length` int(11) unsigned NOT NULL default '0',
  `poll_max_options` tinyint(4) NOT NULL default '1',
  `poll_last_vote` int(11) unsigned NOT NULL default '0',
  `poll_vote_change` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `forum_id_type` (`forum_id`,`topic_type`),
  KEY `last_post_time` (`topic_last_post_time`),
  KEY `topic_approved` (`topic_approved`),
  KEY `forum_appr_last` (`forum_id`,`topic_approved`,`topic_last_post_id`),
  KEY `fid_time_moved` (`forum_id`,`topic_last_post_time`,`topic_moved_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_topics (topic_id, forum_id, icon_id, topic_attachment, topic_approved, topic_reported, topic_title, topic_poster, topic_time, topic_time_limit, topic_views, topic_replies, topic_replies_real, topic_status, topic_type, topic_first_post_id, topic_first_poster_name, topic_first_poster_colour, topic_last_post_id, topic_last_poster_id, topic_last_poster_name, topic_last_poster_colour, topic_last_post_subject, topic_last_post_time, topic_last_view_time, topic_moved_id, topic_bumped, topic_bumper, poll_title, poll_start, poll_length, poll_max_options, poll_last_vote, poll_vote_change) VALUES (1, 2, 0, 0, 1, 0, 'Welcome to phpBB3', 2, 1201111192, 0, 29, 0, 0, 0, 0, 1, 'admin', 'AA0000', 1, 2, 'admin', 'AA0000', 'Welcome to phpBB3', 1201111192, 1226694610, 0, 0, 0, '', 0, 0, 1, 0, 0),(5, 2, 0, 0, 1, 0, 'For more info for your forum?', 2, 1214248910, 0, 22, 0, 0, 0, 0, 16, 'admin', 'AA0000', 16, 2, 'admin', 'AA0000', 'For more info for your forum?', 1214248910, 1226694534, 0, 0, 0, '', 0, 0, 1, 0, 0),(6, 2, 0, 1, 1, 0, 'Attachment test', 2, 1214492223, 0, 73, 1, 1, 0, 0, 18, 'admin', 'AA0000', 19, 2, 'admin', 'AA0000', 'Re: Attachment test', 1214492376, 1229209135, 0, 0, 0, '', 0, 0, 1, 0, 0),(7, 2, 0, 0, 1, 0, 'Modfication List', 2, 1225015363, 0, 39, 0, 0, 0, 0, 28, 'admin', 'AA0000', 28, 2, 'admin', 'AA0000', 'Modfication List', 1225015363, 1229707337, 0, 0, 0, '', 0, 0, 1, 0, 0);

# Table: phpbb_topics_posted
DROP TABLE IF EXISTS phpbb_topics_posted;
CREATE TABLE `phpbb_topics_posted` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_posted` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_topics_posted (user_id, topic_id, topic_posted) VALUES (2, 1, 1),(2, 5, 1),(2, 6, 1),(2, 7, 1);

# Table: phpbb_topics_track
DROP TABLE IF EXISTS phpbb_topics_track;
CREATE TABLE `phpbb_topics_track` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` mediumint(8) unsigned NOT NULL default '0',
  `mark_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`topic_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_topics_track (user_id, topic_id, forum_id, mark_time) VALUES (2, 7, 2, 1229706675);

# Table: phpbb_topics_watch
DROP TABLE IF EXISTS phpbb_topics_watch;
CREATE TABLE `phpbb_topics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `notify_status` tinyint(1) unsigned NOT NULL default '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_stat` (`notify_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_user_group
DROP TABLE IF EXISTS phpbb_user_group;
CREATE TABLE `phpbb_user_group` (
  `group_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `group_leader` tinyint(1) unsigned NOT NULL default '0',
  `user_pending` tinyint(1) unsigned NOT NULL default '1',
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`),
  KEY `group_leader` (`group_leader`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_user_group (group_id, user_id, group_leader, user_pending) VALUES (1, 1, 0, 0),(2, 2, 0, 0),(4, 2, 0, 0),(5, 2, 1, 0),(6, 3, 0, 0),(6, 4, 0, 0),(6, 5, 0, 0),(6, 6, 0, 0),(6, 7, 0, 0),(6, 8, 0, 0),(6, 9, 0, 0),(6, 10, 0, 0),(6, 11, 0, 0),(6, 12, 0, 0),(6, 13, 0, 0),(6, 14, 0, 0),(6, 15, 0, 0),(6, 16, 0, 0),(6, 17, 0, 0),(6, 18, 0, 0),(6, 19, 0, 0),(6, 20, 0, 0),(6, 21, 0, 0),(6, 22, 0, 0),(6, 23, 0, 0),(6, 24, 0, 0),(6, 25, 0, 0),(6, 26, 0, 0),(6, 27, 0, 0),(6, 28, 0, 0),(6, 29, 0, 0),(6, 30, 0, 0),(6, 31, 0, 0),(6, 32, 0, 0),(6, 33, 0, 0),(6, 34, 0, 0),(6, 35, 0, 0),(6, 36, 0, 0),(6, 37, 0, 0),(6, 38, 0, 0),(6, 39, 0, 0),(6, 40, 0, 0),(6, 41, 0, 0),(6, 42, 0, 0),(6, 43, 0, 0),(6, 44, 0, 0),(6, 45, 0, 0),(6, 46, 0, 0),(6, 47, 0, 0),(6, 48, 0, 0),(6, 49, 0, 0),(6, 50, 0, 0),(6, 51, 0, 0),(6, 52, 0, 0),(2, 54, 0, 0),(6, 55, 0, 0),(6, 56, 0, 0),(6, 57, 0, 0),(6, 58, 0, 0),(6, 59, 0, 0),(6, 60, 0, 0),(6, 61, 0, 0),(6, 62, 0, 0),(6, 63, 0, 0),(6, 64, 0, 0),(6, 65, 0, 0),(6, 66, 0, 0),(6, 67, 0, 0),(6, 68, 0, 0),(6, 69, 0, 0),(6, 70, 0, 0),(6, 71, 0, 0),(6, 72, 0, 0),(6, 73, 0, 0),(6, 74, 0, 0),(6, 75, 0, 0),(6, 76, 0, 0),(6, 77, 0, 0),(6, 78, 0, 0),(6, 79, 0, 0),(6, 80, 0, 0),(6, 81, 0, 0),(6, 82, 0, 0),(6, 83, 0, 0),(6, 84, 0, 0),(6, 85, 0, 0),(6, 86, 0, 0),(6, 87, 0, 0),(6, 88, 0, 0),(6, 89, 0, 0);

# Table: phpbb_users
DROP TABLE IF EXISTS phpbb_users;
CREATE TABLE `phpbb_users` (
  `user_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_type` tinyint(2) NOT NULL default '0',
  `group_id` mediumint(8) unsigned NOT NULL default '3',
  `user_permissions` mediumtext collate utf8_bin NOT NULL,
  `user_perm_from` mediumint(8) unsigned NOT NULL default '0',
  `user_ip` varchar(40) collate utf8_bin NOT NULL default '',
  `user_regdate` int(11) unsigned NOT NULL default '0',
  `username` varchar(255) collate utf8_bin NOT NULL default '',
  `username_clean` varchar(255) collate utf8_bin NOT NULL default '',
  `user_password` varchar(40) collate utf8_bin NOT NULL default '',
  `user_passchg` int(11) unsigned NOT NULL default '0',
  `user_pass_convert` tinyint(1) unsigned NOT NULL default '0',
  `user_email` varchar(100) collate utf8_bin NOT NULL default '',
  `user_email_hash` bigint(20) NOT NULL default '0',
  `user_birthday` varchar(10) collate utf8_bin NOT NULL default '',
  `user_lastvisit` int(11) unsigned NOT NULL default '0',
  `user_lastmark` int(11) unsigned NOT NULL default '0',
  `user_lastpost_time` int(11) unsigned NOT NULL default '0',
  `user_lastpage` varchar(200) collate utf8_bin NOT NULL default '',
  `user_last_confirm_key` varchar(10) collate utf8_bin NOT NULL default '',
  `user_last_search` int(11) unsigned NOT NULL default '0',
  `user_warnings` tinyint(4) NOT NULL default '0',
  `user_last_warning` int(11) unsigned NOT NULL default '0',
  `user_login_attempts` tinyint(4) NOT NULL default '0',
  `user_inactive_reason` tinyint(2) NOT NULL default '0',
  `user_inactive_time` int(11) unsigned NOT NULL default '0',
  `user_posts` mediumint(8) unsigned NOT NULL default '0',
  `user_lang` varchar(30) collate utf8_bin NOT NULL default '',
  `user_timezone` decimal(5,2) NOT NULL default '0.00',
  `user_dst` tinyint(1) unsigned NOT NULL default '0',
  `user_dateformat` varchar(30) collate utf8_bin NOT NULL default 'd M Y H:i',
  `user_style` mediumint(8) unsigned NOT NULL default '0',
  `user_rank` mediumint(8) unsigned NOT NULL default '0',
  `user_colour` varchar(6) collate utf8_bin NOT NULL default '',
  `user_new_privmsg` int(4) NOT NULL default '0',
  `user_unread_privmsg` int(4) NOT NULL default '0',
  `user_last_privmsg` int(11) unsigned NOT NULL default '0',
  `user_message_rules` tinyint(1) unsigned NOT NULL default '0',
  `user_full_folder` int(11) NOT NULL default '-3',
  `user_emailtime` int(11) unsigned NOT NULL default '0',
  `user_topic_show_days` smallint(4) unsigned NOT NULL default '0',
  `user_topic_sortby_type` varchar(1) collate utf8_bin NOT NULL default 't',
  `user_topic_sortby_dir` varchar(1) collate utf8_bin NOT NULL default 'd',
  `user_post_show_days` smallint(4) unsigned NOT NULL default '0',
  `user_post_sortby_type` varchar(1) collate utf8_bin NOT NULL default 't',
  `user_post_sortby_dir` varchar(1) collate utf8_bin NOT NULL default 'a',
  `user_notify` tinyint(1) unsigned NOT NULL default '0',
  `user_notify_pm` tinyint(1) unsigned NOT NULL default '1',
  `user_notify_type` tinyint(4) NOT NULL default '0',
  `user_allow_pm` tinyint(1) unsigned NOT NULL default '1',
  `user_allow_viewonline` tinyint(1) unsigned NOT NULL default '1',
  `user_allow_viewemail` tinyint(1) unsigned NOT NULL default '1',
  `user_allow_massemail` tinyint(1) unsigned NOT NULL default '1',
  `user_options` int(11) unsigned NOT NULL default '895',
  `user_avatar` varchar(255) collate utf8_bin NOT NULL default '',
  `user_avatar_type` tinyint(2) NOT NULL default '0',
  `user_avatar_width` smallint(4) unsigned NOT NULL default '0',
  `user_avatar_height` smallint(4) unsigned NOT NULL default '0',
  `user_sig` mediumtext collate utf8_bin NOT NULL,
  `user_sig_bbcode_uid` varchar(8) collate utf8_bin NOT NULL default '',
  `user_sig_bbcode_bitfield` varchar(255) collate utf8_bin NOT NULL default '',
  `user_from` varchar(100) collate utf8_bin NOT NULL default '',
  `user_icq` varchar(15) collate utf8_bin NOT NULL default '',
  `user_aim` varchar(255) collate utf8_bin NOT NULL default '',
  `user_yim` varchar(255) collate utf8_bin NOT NULL default '',
  `user_msnm` varchar(255) collate utf8_bin NOT NULL default '',
  `user_jabber` varchar(255) collate utf8_bin NOT NULL default '',
  `user_website` varchar(200) collate utf8_bin NOT NULL default '',
  `user_occ` text collate utf8_bin NOT NULL,
  `user_interests` text collate utf8_bin NOT NULL,
  `user_actkey` varchar(32) collate utf8_bin NOT NULL default '',
  `user_newpasswd` varchar(40) collate utf8_bin NOT NULL default '',
  `user_form_salt` varchar(32) collate utf8_bin NOT NULL default '',
  `user_arcade_pm` tinyint(1) NOT NULL default '1',
  `games_per_page` smallint(4) unsigned NOT NULL default '0',
  `games_sort_dir` varchar(1) collate utf8_bin NOT NULL default 'a',
  `games_sort_order` varchar(1) collate utf8_bin NOT NULL default 'n',
  `user_gender` tinyint(1) unsigned NOT NULL default '0',
  `user_arcade_permissions` mediumtext collate utf8_bin NOT NULL,
  `user_arcade_perm_from` mediumint(8) unsigned NOT NULL default '0',
  `user_reminder_inactive` int(11) unsigned NOT NULL default '0',
  `user_reminder_zero_poster` int(11) unsigned NOT NULL default '0',
  `user_reminder_inactive_still` int(11) unsigned NOT NULL default '0',
  `user_reminder_not_logged_in` int(11) unsigned NOT NULL default '0',
  `user_flag` varchar(2) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username_clean` (`username_clean`),
  KEY `user_birthday` (`user_birthday`),
  KEY `user_email_hash` (`user_email_hash`),
  KEY `user_type` (`user_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_users (user_id, user_type, group_id, user_permissions, user_perm_from, user_ip, user_regdate, username, username_clean, user_password, user_passchg, user_pass_convert, user_email, user_email_hash, user_birthday, user_lastvisit, user_lastmark, user_lastpost_time, user_lastpage, user_last_confirm_key, user_last_search, user_warnings, user_last_warning, user_login_attempts, user_inactive_reason, user_inactive_time, user_posts, user_lang, user_timezone, user_dst, user_dateformat, user_style, user_rank, user_colour, user_new_privmsg, user_unread_privmsg, user_last_privmsg, user_message_rules, user_full_folder, user_emailtime, user_topic_show_days, user_topic_sortby_type, user_topic_sortby_dir, user_post_show_days, user_post_sortby_type, user_post_sortby_dir, user_notify, user_notify_pm, user_notify_type, user_allow_pm, user_allow_viewonline, user_allow_viewemail, user_allow_massemail, user_options, user_avatar, user_avatar_type, user_avatar_width, user_avatar_height, user_sig, user_sig_bbcode_uid, user_sig_bbcode_bitfield, user_from, user_icq, user_aim, user_yim, user_msnm, user_jabber, user_website, user_occ, user_interests, user_actkey, user_newpasswd, user_form_salt, user_arcade_pm, games_per_page, games_sort_dir, games_sort_order, user_gender, user_arcade_permissions, user_arcade_perm_from, user_reminder_inactive, user_reminder_zero_poster, user_reminder_inactive_still, user_reminder_not_logged_in, user_flag) VALUES (1, 2, 1, '', 0, '', 1201111192, 'Anonymous', 'anonymous', '', 0, 0, '', 0, '', 0, 0, 0, '', 'QT7T5S3V33', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'a07a23bc576e4bab', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(55, 2, 6, '', 0, '', 1229706605, 'Twiceler [Bot]', 'twiceler [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4655d6989adc35e9', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(2, 3, 5, 'zik0zjzik0zjzik0zjyelngg\ni1cjyo000000\nzik0zjzhb2tc', 0, '81.141.32.178', 1201111192, 'admin', 'admin', '$H$9Gk9bNVzMXEi/C6GoDKFt7b7ddbm/g.', 1229706960, 0, 'info@lawsondigitalmedia.co.uk', 30364224629, ' 1-12-   0', 1229450173, 0, 1229210343, 'adm/index.php?i=database&mode=backup&action=download', '', 1214332680, 0, 0, 0, 0, 0, 5, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 1, 'AA0000', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1b8577f86274bad3', 1, 0, '0', '0', 1, '\nzieeps', 0, 0, 0, 0, 0, 'uk'),(3, 2, 6, '', 0, '', 1201111194, 'AdsBot [Google]', 'adsbot [google]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'd4ce19e849e0c4e8', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(4, 2, 6, '', 0, '', 1201111194, 'Alexa [Bot]', 'alexa [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'd0eab19dde08b8f2', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(5, 2, 6, '', 0, '', 1201111194, 'Alta Vista [Bot]', 'alta vista [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ab6774e984a83c31', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(6, 2, 6, '', 0, '', 1201111194, 'Ask Jeeves [Bot]', 'ask jeeves [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '67d5257d5d5caf9d', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(7, 2, 6, '', 0, '', 1201111194, 'Baidu [Spider]', 'baidu [spider]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'c9b0bed345135443', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(8, 2, 6, '', 0, '', 1201111194, 'Exabot [Bot]', 'exabot [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'b7ee219667c884f5', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(9, 2, 6, '', 0, '', 1201111194, 'FAST Enterprise [Crawler]', 'fast enterprise [crawler]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '419754ebcab3d48a', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(10, 2, 6, '', 0, '', 1201111194, 'FAST WebCrawler [Crawler]', 'fast webcrawler [crawler]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '02d2e3bef9a83017', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(11, 2, 6, '', 0, '', 1201111194, 'Francis [Bot]', 'francis [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7289308997182559', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(12, 2, 6, '', 0, '', 1201111194, 'Gigabot [Bot]', 'gigabot [bot]', '', 1201111194, 0, '', 0, '', 0, 1201111194, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9cc04cb3eb3665f8', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(13, 2, 6, '\ni1cjyo000000\ni1cjr4000000', 0, '', 1201111195, 'Google Adsense [Bot]', 'google adsense [bot]', '', 1201111195, 0, '', 0, '', 1229706724, 1201111195, 0, 'viewonline.php', '1QVJDL1MU8', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '84ac12ed12776dcf', 1, 0, '0', '0', 0, '\nv2qiv4', 0, 0, 0, 0, 0, ''),(14, 2, 6, '', 0, '', 1201111195, 'Google Desktop', 'google desktop', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '62c2d0be58bc1a95', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(15, 2, 6, '', 0, '', 1201111195, 'Google Feedfetcher', 'google feedfetcher', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '704bf52953b900a6', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(16, 2, 6, '', 0, '', 1201111195, 'Google [Bot]', 'google [bot]', '', 1201111195, 0, '', 0, '', 1225021537, 1201111195, 0, 'ajax.php?m=check&last=1215966191&rand=914153', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'f3438c80d8772f40', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(17, 2, 6, '', 0, '', 1201111195, 'Heise IT-Markt [Crawler]', 'heise it-markt [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '07ee963e91ba53df', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(18, 2, 6, '', 0, '', 1201111195, 'Heritrix [Crawler]', 'heritrix [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '319b02eb66e59980', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(19, 2, 6, '', 0, '', 1201111195, 'IBM Research [Bot]', 'ibm research [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'abf44c1039d522e4', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(20, 2, 6, '', 0, '', 1201111195, 'ICCrawler - ICjobs', 'iccrawler - icjobs', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '36eb3b6290da954a', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(21, 2, 6, '', 0, '', 1201111195, 'ichiro [Crawler]', 'ichiro [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ba7f5ef5291acfc7', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(22, 2, 6, '', 0, '', 1201111195, 'Majestic-12 [Bot]', 'majestic-12 [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '43172da87fc3d97a', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(23, 2, 6, '', 0, '', 1201111195, 'Metager [Bot]', 'metager [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ac2df446b3d49012', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(24, 2, 6, '', 0, '', 1201111195, 'MSN NewsBlogs', 'msn newsblogs', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '61a753a9a1f88ccb', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(25, 2, 6, '', 0, '', 1201111195, 'MSN [Bot]', 'msn [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '26a416c4c988f8ff', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(26, 2, 6, '', 0, '', 1201111195, 'MSNbot Media', 'msnbot media', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'a1f541bc6b6ca905', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(27, 2, 6, '', 0, '', 1201111195, 'NG-Search [Bot]', 'ng-search [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'fa786daa1a4b1057', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(28, 2, 6, '', 0, '', 1201111195, 'Nutch [Bot]', 'nutch [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e1608304ec567ab5', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(29, 2, 6, '', 0, '', 1201111195, 'Nutch/CVS [Bot]', 'nutch/cvs [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5d753c9364e89085', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(30, 2, 6, '', 0, '', 1201111195, 'OmniExplorer [Bot]', 'omniexplorer [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'baa39245fb9dc64a', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(31, 2, 6, '', 0, '', 1201111195, 'Online link [Validator]', 'online link [validator]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7cdfbf7cbac29bd3', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(32, 2, 6, '', 0, '', 1201111195, 'psbot [Picsearch]', 'psbot [picsearch]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bad3cacf639c05b6', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(33, 2, 6, '', 0, '', 1201111195, 'Seekport [Bot]', 'seekport [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '32318c8e321cfd74', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(34, 2, 6, '', 0, '', 1201111195, 'Sensis [Crawler]', 'sensis [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9e3f0b6f3a01c0d8', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(35, 2, 6, '', 0, '', 1201111195, 'SEO Crawler', 'seo crawler', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'cca8b870a49ad35c', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(36, 2, 6, '', 0, '', 1201111195, 'Seoma [Crawler]', 'seoma [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '49111e590e747213', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(37, 2, 6, '', 0, '', 1201111195, 'SEOSearch [Crawler]', 'seosearch [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '83ff6faab6ec1167', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(38, 2, 6, '', 0, '', 1201111195, 'Snappy [Bot]', 'snappy [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e5e547d1e292c5d3', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(39, 2, 6, '', 0, '', 1201111195, 'Steeler [Crawler]', 'steeler [crawler]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9d663b99c4af2721', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(40, 2, 6, '', 0, '', 1201111195, 'Synoo [Bot]', 'synoo [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bc99fd378b5d7ab6', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(41, 2, 6, '', 0, '', 1201111195, 'Telekom [Bot]', 'telekom [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '836f8c1f3f33fd68', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(42, 2, 6, '', 0, '', 1201111195, 'TurnitinBot [Bot]', 'turnitinbot [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'f6f00ddafadc6a1f', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(43, 2, 6, '', 0, '', 1201111195, 'Voyager [Bot]', 'voyager [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '03c54956f3e5a2ba', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(44, 2, 6, '', 0, '', 1201111195, 'W3 [Sitesearch]', 'w3 [sitesearch]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3214bedf44d74387', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(45, 2, 6, '', 0, '', 1201111195, 'W3C [Linkcheck]', 'w3c [linkcheck]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '46a36452b9598261', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(46, 2, 6, '', 0, '', 1201111195, 'W3C [Validator]', 'w3c [validator]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'f7e14cbb5d43f1e3', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(47, 2, 6, '', 0, '', 1201111195, 'WiseNut [Bot]', 'wisenut [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ec51587726012776', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(48, 2, 6, '', 0, '', 1201111195, 'YaCy [Bot]', 'yacy [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'cb6f265564b5d1eb', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(49, 2, 6, '', 0, '', 1201111195, 'Yahoo MMCrawler [Bot]', 'yahoo mmcrawler [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1b6dc88af2d6fae3', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(50, 2, 6, '', 0, '', 1201111195, 'Yahoo Slurp [Bot]', 'yahoo slurp [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7f2a857874389fdc', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(51, 2, 6, '', 0, '', 1201111195, 'Yahoo [Bot]', 'yahoo [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'a472a67d9129fca4', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(52, 2, 6, '', 0, '', 1201111195, 'YahooSeeker [Bot]', 'yahooseeker [bot]', '', 1201111195, 0, '', 0, '', 0, 1201111195, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 0, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18b97a841be56e65', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(54, 0, 2, '', 0, '81.141.32.136', 1214349216, 'test', 'test', '$H$9nw/ob6jaxszhipVjVe5VnW1mUtwvv.', 1214349216, 0, 'info@modphpbb3.com', 157635606518, '', 1214349585, 1214349216, 0, '', '', 0, 0, 1214353421, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 2, 0, '', 1, 1, 1214353421, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '31c018217354829b', 1, 0, '0', '0', 0, '', 0, 0, 0, 0, 0, ''),(56, 2, 6, '', 0, '', 1229706605, 'Voila [Bot]', 'voila [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '62b6cfc70f4652f6', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(57, 2, 6, '', 0, '', 1229706605, 'Omgili [Bot]', 'omgili [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '314fa4cdbfdd9a13', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(58, 2, 6, '', 0, '', 1229706605, 'Noxtrum [Bot]', 'noxtrum [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'a0a4106fef4f4b25', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(59, 2, 6, '', 0, '', 1229706605, 'Spinn3r [Bot]', 'spinn3r [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'd7957121aa0c29d9', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(60, 2, 6, '', 0, '', 1229706605, 'Furl [Bot]', 'furl [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bc3f6a9936004122', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(61, 2, 6, '', 0, '', 1229706605, 'CommonCrawl [Bot]', 'commoncrawl [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'efdff93240d50aa2', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(62, 2, 6, '', 0, '', 1229706605, 'Naver [Bot]', 'naver [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '83d616693b1c83a3', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(63, 2, 6, '', 0, '', 1229706605, 'BDProtect [Bot]', 'bdprotect [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3dd60e00a84f6716', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(64, 2, 6, '', 0, '', 1229706605, 'Snap Shots [Bot]', 'snap shots [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '77a3885a44ae1418', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(65, 2, 6, '', 0, '', 1229706605, 'Whitevector [Bot]', 'whitevector [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '454f8194457348b3', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(66, 2, 6, '', 0, '', 1229706605, 'Hatena Antenna [Bot]', 'hatena antenna [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2f72190333c45492', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(67, 2, 6, '', 0, '', 1229706605, 'Snap Shots Preview [Bot]', 'snap shots preview [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '41094859996b7665', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(68, 2, 6, '', 0, '', 1229706605, 'Ilse [Bot]', 'ilse [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '47f1433a192c55a4', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(69, 2, 6, '', 0, '', 1229706605, 'ImageShack [Bot]', 'imageshack [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '315ebe8f30bc7ac7', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(70, 2, 6, '', 0, '', 1229706605, 'Entireweb [Bot]', 'entireweb [bot]', '', 1229706605, 0, '', 0, '', 0, 1229706605, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e3cd9f23c465ab44', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(71, 2, 6, '', 0, '', 1229706606, 'Yandex [Bot]', 'yandex [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e776aa3dcbeee71b', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(72, 2, 6, '', 0, '', 1229706606, 'WebCorp [Bot]', 'webcorp [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0e042799d44a8a5a', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(73, 2, 6, '', 0, '', 1229706606, 'WebAlta [Bot]', 'webalta [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2481689ee175189e', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(74, 2, 6, '', 0, '', 1229706606, 'Powerset [Bot]', 'powerset [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '166cf584a764d6b2', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(75, 2, 6, '', 0, '', 1229706606, 'Boston Project [SpamBot]', 'boston project [spambot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5e5137c332ccf815', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(76, 2, 6, '', 0, '', 1229706606, 'Startpagina [Bot]', 'startpagina [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '63795347a8ec2bda', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(77, 2, 6, '', 0, '', 1229706606, 'Heeii [Bot]', 'heeii [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9d2db1e1c2faa4dc', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(78, 2, 6, '', 0, '', 1229706606, 'Wget [SpamBot]', 'wget [spambot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04b012a57b77eb1e', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(79, 2, 6, '', 0, '', 1229706606, 'Yodao [Bot]', 'yodao [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '901623905e84487e', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(80, 2, 6, '', 0, '', 1229706606, 'vBSEO [Bot]', 'vbseo [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2ec39cfb2432fffe', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(81, 2, 6, '', 0, '', 1229706606, 'WiseGuys [Bot]', 'wiseguys [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e67c3283eaafe045', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(82, 2, 6, '', 0, '', 1229706606, 'Searchme [Bot]', 'searchme [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '73420102136f0c9c', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(83, 2, 6, '', 0, '', 1229706606, 'Exalead [Bot]', 'exalead [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e56311a7691d91bf', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(84, 2, 6, '', 0, '', 1229706606, 'Yahoo Search Marketing [Bot]', 'yahoo search marketing [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5b0fe75e6e458a1e', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(85, 2, 6, '', 0, '', 1229706606, 'Daum [Bot]', 'daum [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'b903853c392867a3', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(86, 2, 6, '', 0, '', 1229706606, 'webcollage [Bot]', 'webcollage [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ad8064781cbc1ad3', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(87, 2, 6, '', 0, '', 1229706606, 'Babaloo [Bot]', 'babaloo [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '42e742c6e2860d44', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(88, 2, 6, '', 0, '', 1229706606, 'Keywen Encyclopedia [Bot]', 'keywen encyclopedia [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '69602fa0a0435561', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, ''),(89, 2, 6, '', 0, '', 1229706606, 'Facebook [Bot]', 'facebook [bot]', '', 1229706606, 0, '', 0, '', 0, 1229706606, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 0.00, 1, 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 895, '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1de37a671dfd771d', 1, 0, 'a', 'n', 0, '', 0, 0, 0, 0, 0, '');

# Table: phpbb_warnings
DROP TABLE IF EXISTS phpbb_warnings;
CREATE TABLE `phpbb_warnings` (
  `warning_id` mediumint(8) unsigned NOT NULL auto_increment,
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `log_id` mediumint(8) unsigned NOT NULL default '0',
  `warning_time` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`warning_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_words
DROP TABLE IF EXISTS phpbb_words;
CREATE TABLE `phpbb_words` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word` varchar(255) collate utf8_bin NOT NULL default '',
  `replacement` varchar(255) collate utf8_bin NOT NULL default '',
  PRIMARY KEY  (`word_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Table: phpbb_wwh
DROP TABLE IF EXISTS phpbb_wwh;
CREATE TABLE `phpbb_wwh` (
  `rolling` mediumint(8) unsigned NOT NULL auto_increment,
  `ip` varchar(15) collate utf8_bin NOT NULL default '127.0.0.1',
  `id` int(8) unsigned NOT NULL default '1',
  `viewonline` int(1) unsigned NOT NULL default '1',
  `last_page` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`rolling`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO phpbb_wwh (rolling, ip, id, viewonline, last_page) VALUES (2149, '81.141.37.131', 2, 1, 1229708078);

# Table: phpbb_zebra
DROP TABLE IF EXISTS phpbb_zebra;
CREATE TABLE `phpbb_zebra` (
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  `zebra_id` mediumint(8) unsigned NOT NULL default '0',
  `friend` tinyint(1) unsigned NOT NULL default '0',
  `foe` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`zebra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

