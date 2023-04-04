REPLACE INTO `#prefix#_bbgroups` (`nuke_group_id`, `group_type`, `group_name`, `group_description`, `group_moderator`, `group_single_user`, `group_allow_pm`, `group_color`, `group_rank`, `max_inbox`, `max_sentbox`, `max_savebox`, `override_max_inbox`, `override_max_sentbox`, `override_max_savebox`, `group_count`, `group_count_max`, `group_count_enable`) VALUES
(1, 1, 'Anonymous', 'Personal User', 0, 1, 0, '', '', 0, 0, 0, 0, 0, 0, 99999999, 99999999, 0),
(5, 2, 'Nuke Admins', 'Site Administrators', 2, 0, 5, '', '0', 100, 100, 100, 0, 0, 0, 99999999, 99999999, 0),
(4, 1, '', 'Personal User', 0, 1, 5, '', '0', 100, 100, 100, 0, 0, 0, 99999999, 99999999, 0),
(6, 2, 'Nuke Moderators', 'Site Moderators', 2, 0, 5, '', '0', 100, 100, 100, 0, 0, 0, 99999999, 99999999, 0);
