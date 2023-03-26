ALTER TABLE `#prefix#_security_agents`
  ADD PRIMARY KEY (`agent_name`);

ALTER TABLE `#prefix#_antiflood`
  ADD PRIMARY KEY (`ip_addr`),
  ADD KEY `ip_addr` (`ip_addr`),
  ADD KEY `time` (`time`);

ALTER TABLE `#prefix#_authors`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `aid` (`aid`);

ALTER TABLE `#prefix#_autonews`
  ADD PRIMARY KEY (`anid`),
  ADD KEY `anid` (`anid`);

ALTER TABLE `#prefix#_banned_ip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_banner`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `cid` (`cid`);

ALTER TABLE `#prefix#_banner_clients`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

ALTER TABLE `#prefix#_banner_plans`
  ADD PRIMARY KEY (`pid`);

ALTER TABLE `#prefix#_banner_positions`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `position_number` (`position_number`);

ALTER TABLE `#prefix#_bbauth_access`
  ADD KEY `nuke_group_id` (`nuke_group_id`),
  ADD KEY `forum_id` (`forum_id`);

ALTER TABLE `#prefix#_bbbanlist`
  ADD PRIMARY KEY (`ban_id`),
  ADD KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`);

ALTER TABLE `#prefix#_bbcategories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_order` (`cat_order`);

ALTER TABLE `#prefix#_bbconfig`
  ADD PRIMARY KEY (`config_name`);

ALTER TABLE `#prefix#_bbdisallow`
  ADD PRIMARY KEY (`disallow_id`);

ALTER TABLE `#prefix#_bbforums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `forums_order` (`forum_order`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `forum_last_post_id` (`forum_last_post_id`);

ALTER TABLE `#prefix#_bbforum_prune`
  ADD PRIMARY KEY (`prune_id`),
  ADD KEY `forum_id` (`forum_id`);

ALTER TABLE `#prefix#_bbgroups`
  ADD PRIMARY KEY (`nuke_group_id`),
  ADD KEY `group_single_user` (`group_single_user`);

ALTER TABLE `#prefix#_bbposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `post_time` (`post_time`);

ALTER TABLE `#prefix#_bbposts_text`
  ADD PRIMARY KEY (`post_id`);

ALTER TABLE `#prefix#_bbprivmsgs`
  ADD PRIMARY KEY (`privmsgs_id`),
  ADD KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  ADD KEY `privmsgs_to_userid` (`privmsgs_to_userid`);

ALTER TABLE `#prefix#_bbprivmsgs_text`
  ADD PRIMARY KEY (`privmsgs_text_id`);

ALTER TABLE `#prefix#_bbranks`
  ADD PRIMARY KEY (`rank_id`);

ALTER TABLE `#prefix#_bbsearch_results`
  ADD PRIMARY KEY (`search_id`),
  ADD KEY `session_id` (`session_id`);

ALTER TABLE `#prefix#_bbsearch_wordlist`
  ADD PRIMARY KEY (`word_text`),
  ADD KEY `word_id` (`word_id`);

ALTER TABLE `#prefix#_bbsearch_wordmatch`
  ADD KEY `word_id` (`word_id`);

ALTER TABLE `#prefix#_bbsessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_user_id` (`session_user_id`),
  ADD KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`);

ALTER TABLE `#prefix#_bbsmilies`
  ADD PRIMARY KEY (`smilies_id`);

ALTER TABLE `#prefix#_bbthemes`
  ADD PRIMARY KEY (`themes_id`);

ALTER TABLE `#prefix#_bbthemes_name`
  ADD PRIMARY KEY (`themes_id`);

ALTER TABLE `#prefix#_bbtopics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_moved_id` (`topic_moved_id`),
  ADD KEY `topic_status` (`topic_status`),
  ADD KEY `topic_type` (`topic_type`);

ALTER TABLE `#prefix#_bbtopics_watch`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notify_status` (`notify_status`);

ALTER TABLE `#prefix#_bbuser_group`
  ADD KEY `nuke_group_id` (`nuke_group_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `#prefix#_bbvote_desc`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `topic_id` (`topic_id`);

ALTER TABLE `#prefix#_bbvote_results`
  ADD KEY `vote_option_id` (`vote_option_id`),
  ADD KEY `vote_id` (`vote_id`);

ALTER TABLE `#prefix#_bbvote_voters`
  ADD KEY `vote_id` (`vote_id`),
  ADD KEY `vote_user_id` (`vote_user_id`),
  ADD KEY `vote_user_ip` (`vote_user_ip`);

ALTER TABLE `#prefix#_bbwords`
  ADD PRIMARY KEY (`word_id`);

ALTER TABLE `#prefix#_blocks`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `title` (`title`);

ALTER TABLE `#prefix#_cities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `#prefix#_comments`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `#prefix#_comments_moderated`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `#prefix#_config`
  ADD PRIMARY KEY (`sitename`);

ALTER TABLE `#prefix#_confirm`
  ADD PRIMARY KEY (`session_id`,`confirm_id`);

ALTER TABLE `#prefix#_downloads_categories`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `title` (`title`);

ALTER TABLE `#prefix#_downloads_downloads`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `title` (`title`);

ALTER TABLE `#prefix#_downloads_editorials`
  ADD PRIMARY KEY (`downloadid`),
  ADD KEY `downloadid` (`downloadid`);

ALTER TABLE `#prefix#_downloads_modrequest`
  ADD PRIMARY KEY (`requestid`),
  ADD UNIQUE KEY `requestid` (`requestid`);

ALTER TABLE `#prefix#_downloads_newdownload`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `title` (`title`);

ALTER TABLE `#prefix#_downloads_votedata`
  ADD PRIMARY KEY (`ratingdbid`),
  ADD KEY `ratingdbid` (`ratingdbid`);

ALTER TABLE `#prefix#_encyclopedia`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `eid` (`eid`);

ALTER TABLE `#prefix#_encyclopedia_text`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `title` (`title`);

ALTER TABLE `#prefix#_faqanswer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_cat` (`id_cat`);

ALTER TABLE `#prefix#_faqcategories`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `id_cat` (`id_cat`);

ALTER TABLE `#prefix#_groups`
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_groups_points`
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_headlines`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `hid` (`hid`);

ALTER TABLE `#prefix#_journal`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `jid` (`jid`),
  ADD KEY `aid` (`aid`);

ALTER TABLE `#prefix#_journal_comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `aid` (`aid`);

ALTER TABLE `#prefix#_journal_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_links_categories`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

ALTER TABLE `#prefix#_links_editorials`
  ADD PRIMARY KEY (`linkid`),
  ADD KEY `linkid` (`linkid`);

ALTER TABLE `#prefix#_links_links`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `#prefix#_links_modrequest`
  ADD PRIMARY KEY (`requestid`),
  ADD UNIQUE KEY `requestid` (`requestid`);

ALTER TABLE `#prefix#_links_newlink`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`);

ALTER TABLE `#prefix#_links_votedata`
  ADD PRIMARY KEY (`ratingdbid`),
  ADD KEY `ratingdbid` (`ratingdbid`);

ALTER TABLE `#prefix#_message`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `mid` (`mid`);

ALTER TABLE `#prefix#_modules`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `title` (`title`),
  ADD KEY `custom_title` (`custom_title`);

ALTER TABLE `#prefix#_pages`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `cid` (`cid`);

ALTER TABLE `#prefix#_pages_categories`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

ALTER TABLE `#prefix#_pollcomments`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `pollID` (`pollID`);

ALTER TABLE `#prefix#_pollcomments_moderated`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `pollID` (`pollID`);

ALTER TABLE `#prefix#_poll_desc`
  ADD PRIMARY KEY (`pollID`),
  ADD KEY `pollID` (`pollID`);

ALTER TABLE `#prefix#_public_messages`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `mid` (`mid`);

ALTER TABLE `#prefix#_queue`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `qid` (`qid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `uname` (`uname`);

ALTER TABLE `#prefix#_referer`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `rid` (`rid`);

ALTER TABLE `#prefix#_related`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `tid` (`tid`);

ALTER TABLE `#prefix#_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_reviews_add`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `#prefix#_reviews_comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `userid` (`userid`);

ALTER TABLE `#prefix#_reviews_comments_moderated`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `userid` (`userid`);

ALTER TABLE `#prefix#_session`
  ADD KEY `time` (`time`),
  ADD KEY `guest` (`guest`);

ALTER TABLE `#prefix#_stories`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `catid` (`catid`),
  ADD KEY `counter` (`counter`),
  ADD KEY `topic` (`topic`);

ALTER TABLE `#prefix#_stories_cat`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `catid` (`catid`);

ALTER TABLE `#prefix#_subscriptions`
  ADD KEY `id` (`id`,`userid`);

ALTER TABLE `#prefix#_topics`
  ADD PRIMARY KEY (`topicid`),
  ADD KEY `topicid` (`topicid`);

ALTER TABLE `#prefix#_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_clean` (`username_clean`),
  ADD KEY `user_birthday` (`user_birthday`),
  ADD KEY `user_birthday2` (`user_birthday2`),
  ADD KEY `user_email_hash` (`user_email_hash`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `uid` (`user_id`),
  ADD KEY `uname` (`username`),
  ADD KEY `user_session_time` (`user_session_time`),
  ADD KEY `karma` (`karma`);

ALTER TABLE `#prefix#_users_temp`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `#prefix#_autonews`
  MODIFY `anid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_banned_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_banner`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_banner_clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_banner_plans`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_banner_positions`
  MODIFY `apid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbbanlist`
  MODIFY `ban_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbcategories`
  MODIFY `cat_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbdisallow`
  MODIFY `disallow_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbforums`
  MODIFY `forum_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbforum_prune`
  MODIFY `prune_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbgroups`
  MODIFY `nuke_group_id` mediumint(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbposts`
  MODIFY `post_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbprivmsgs`
  MODIFY `privmsgs_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbranks`
  MODIFY `rank_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbsearch_wordlist`
  MODIFY `word_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbsmilies`
  MODIFY `smilies_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbthemes`
  MODIFY `themes_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbtopics`
  MODIFY `topic_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbvote_desc`
  MODIFY `vote_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_bbwords`
  MODIFY `word_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_blocks`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_comments`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_comments_moderated`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_downloads_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_downloads_downloads`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_downloads_modrequest`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_downloads_newdownload`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_downloads_votedata`
  MODIFY `ratingdbid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_encyclopedia`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_encyclopedia_text`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_faqanswer`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_faqcategories`
  MODIFY `id_cat` tinyint(3) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_groups_points`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_headlines`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_journal`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_journal_comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_journal_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_links_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_links_links`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_links_modrequest`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_links_newlink`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_links_votedata`
  MODIFY `ratingdbid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_modules`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_pages`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_pages_categories`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_pollcomments`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_pollcomments_moderated`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_poll_desc`
  MODIFY `pollID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_public_messages`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_queue`
  MODIFY `qid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_referer`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_related`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_reviews_add`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `#prefix#_banner_terms`
  ADD UNIQUE KEY `country` (`country`);  

ALTER TABLE `#prefix#_reviews_comments`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_reviews_comments_moderated`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_stories`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_stories_cat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_subscriptions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_topics`
  MODIFY `topicid` int(3) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `#prefix#_users_temp`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `#prefix#_users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
