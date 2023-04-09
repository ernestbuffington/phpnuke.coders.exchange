DROP TABLE IF EXISTS `nuke_file_repository_categories`;
CREATE TABLE `nuke_file_repository_categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `parentid` int(11) NOT NULL DEFAULT 0,
  `permissions` int(11) NOT NULL DEFAULT 0,
  `isallowed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `nuke_file_repository_categories` (`cid`, `cname`, `color`, `parentid`, `permissions`, `isallowed`) VALUES
(1, 'PHP-Nuke Downloads', '#42cc3b', 0, 6, 0),
(2, 'PHP-Nuke XHTML Themes', '#42cc3b', 1, 6, 1),
(3, 'PHP-Nuke HTML 4 Themes', '#42cc3b', 1, 6, 1),
(4, 'PHP-Nuke HTML 5 Themes', '#42cc3b', 1, 6, 1),
(8, 'PHP-Nuke 86it Modules', '#42cc3b', 1, 6, 1),
(9, 'PHP-Nuke 86it Blocks', '#42cc3b', 1, 6, 1),
(11, 'PHP-Nuke Config Files', '#42cc3b', 1, 6, 1),
(13, 'Theme Conversion Requests', '#42cc3b', 0, 6, 0),
(14, 'PHP-Nuke Themes', '#42cc3b', 13, 5, 1),
(15, 'PHP-Nuke Evolution Themes', '#42cc3b', 13, 5, 1),
(16, 'PHP-Nuke Evolution Xtreme Themes (UK)', '#42cc3b', 13, 5, 1),
(17, 'PHP-Nuke Evolution Xtreme Themes (US)', '#42cc3b', 13, 5, 1),
(18, 'WordPress Themes', '#42cc3b', 13, 5, 1),
(19, 'Duda Themes', '#42cc3b', 13, 5, 1),
(20, 'Administration Tools', '#42cc3b', 0, 6, 0),
(21, 'Graphic Editors', '#42cc3b', 20, 5, 1),
(22, 'Coding Editors', '#42cc3b', 20, 5, 1),
(23, 'Graphics Packs', '#42cc3b', 20, 5, 1),
(24, 'Admin Private Vault', '#d9ff03', 20, 7, 1),
(25, 'GitHub Configs', '#d9ff03', 20, 5, 1),
(26, 'Graphics Forum Icon Packs', '#d9ff03', 20, 6, 1),
(27, 'PHP-Nuke Local Blocks', '#19e646', 1, 6, 1),
(28, 'PHP-Nuke Local Modules', '#19e646', 1, 6, 1);

DROP TABLE IF EXISTS `nuke_file_repository_comments`;
CREATE TABLE `nuke_file_repository_comments` (
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '2018-12-12 00:00:00',
  `rating` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 0,
  `user` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


DROP TABLE IF EXISTS `nuke_file_repository_files`;
CREATE TABLE `nuke_file_repository_files` (
  `fid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `ftitle` varchar(50) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filesize` int(20) NOT NULL,
  `last_downloaded` datetime NOT NULL DEFAULT '2018-12-12 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `nuke_file_repository_files` (`fid`, `did`, `ftitle`, `filename`, `filesize`, `last_downloaded`) VALUES
(1, 1, 'Macromedia Studio 8', 'macromedia-studio-8-v3OBmAMWSs.iso', 353583104, '2018-12-12 00:00:00'),
(2, 4, 'PHPMaker v8.0.1', 'phpmaker-v8.0.1-RMd6oOHGj6.iso', 29956096, '2018-12-12 00:00:00');


DROP TABLE IF EXISTS `nuke_file_repository_items`;
CREATE TABLE `nuke_file_repository_items` (
  `cid` int(11) NOT NULL DEFAULT 0,
  `author` varchar(100) NOT NULL DEFAULT '',
  `author_email` varchar(100) NOT NULL DEFAULT '',
  `author_website` varchar(100) NOT NULL DEFAULT '',
  `color` varchar(7) NOT NULL DEFAULT '',
  `currency` varchar(7) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '2018-12-12 00:00:00',
  `description` text DEFAULT NULL,
  `did` int(11) NOT NULL,
  `fixes` longtext DEFAULT NULL,
  `groups` int(11) NOT NULL DEFAULT 0,
  `hits` int(11) NOT NULL DEFAULT 0,
  `isactive` int(11) NOT NULL DEFAULT 0,
  `isapproved` int(11) NOT NULL DEFAULT 0,
  `isbroken` tinyint(1) NOT NULL DEFAULT 0,
  `isfeatured` int(11) NOT NULL DEFAULT 0,
  `isnew` int(11) NOT NULL DEFAULT 0,
  `isupdated` datetime NOT NULL DEFAULT '2018-12-12 00:00:00',
  `lastdownloaded` datetime NOT NULL DEFAULT '2018-12-12 00:00:00',
  `paypal` varchar(255) NOT NULL DEFAULT '',
  `points` int(11) NOT NULL DEFAULT 0,
  `posts` int(11) NOT NULL DEFAULT 0,
  `preview` varchar(255) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT 0,
  `semail` varchar(100) NOT NULL DEFAULT '',
  `sname` varchar(100) NOT NULL DEFAULT '',
  `suid` int(11) NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT '',
  `version` varchar(30) NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `nuke_file_repository_items` (`cid`, `author`, `author_email`, `author_website`, `color`, `currency`, `date`, `description`, `did`, `fixes`, `groups`, `hits`, `isactive`, `isapproved`, `isbroken`, `isfeatured`, `isnew`, `isupdated`, `lastdownloaded`, `paypal`, `points`, `posts`, `preview`, `price`, `semail`, `sname`, `suid`, `title`, `version`, `views`) VALUES
(22, 'Winston Terrance Wolf', 'winston.thee.wolf@gmail.com', '', '#ffb2b2', '', '2022-08-27 16:46:46', 'This is an ISO image of Macromedia Studio 8. The software is compatible with PCs running Windows 2000 to Windows 10. And Power PC-based Macintosh running at least OSX 10.3.Â \n\nThis software was released at an interesting time. This contains the last version of Flash to use the ActionScript 2 programming language. Adobe had only just purchased Macromedia, so this software still uses the Macromedia branding. Apple was still using Power PC but would soon switch to Intel processors. PC\'s did not have integrated GPUs yet so graphics acceleration was not guaranteed. Only gamers with dedicated graphics cards had any kind of acceleration. YouTube still relied on Flash for video playback. And Flash was absolutely everywhere online.\n\nThe story of Flash is also a cautionary tale. 15 years ago it was as widespread and popular as JavaScript is in 2019. In another 15 years, JavaScript might be decommissioned for the next big thing, and a lot of hard work will be lost... again.\n\nThis download disc contains this software:\nDreamweaver 8\nFireworks 8\nFlash 8 Professional\nFlashPaper 2\n\nIt also has 99 Macromedia Addons\nSerial Number and Keygen\n\nMinimum PC system requirements:\n800 MHz Intel Pentium III processor (or equivalent) and later\nWindows 2000, Windows XP\n256 MB RAM (1 GB recommended to run more than one Studio 8 product simultaneously)\n1024 x 768, 16-bit display (32-bit recommended)\n710 MB available disk space\nhttp://www.adobe.com/products/flash/flashpro/productinfo/systemreqs/\n\nFlash has been released by Adobe to the creative commons.\n[url=https://helpx.adobe.com/flash-player/kb/archived-flash-player-versions.html]https://helpx.adobe.com/flash-player/kb/archived-flash-player-versions.html[/url]\nhttp://creativecommons.org/licenses/by-nc-sa/3.0/', 1, '', 6, 1, 1, 1, 0, 0, 0, '2022-08-27 17:09:39', '2023-02-07 23:35:18', '', 0, 0, '', 0, 'ernest.buffington@gmail.com', '3', 0, 'Macromedia Studio 8', '8.0', 10),
(0, '', '', '', '', '', '2022-08-27 19:31:03', NULL, 2, NULL, 0, 0, 0, 1, 0, 0, 1, '2018-12-12 00:00:00', '2018-12-12 00:00:00', '', 0, 0, '', 0, 'ernest.buffington@gmail.com', 'TheGhost', 0, '', '', 0),
(0, '', '', '', '', '', '2022-09-01 17:53:31', NULL, 3, NULL, 0, 0, 0, 1, 0, 0, 1, '2018-12-12 00:00:00', '2018-12-12 00:00:00', '', 0, 0, '', 0, 'ernest.buffington@gmail.com', 'TheGhost', 0, '', '', 0),
(24, 'Winston Terrance Wolf', 'winston.thee.wolf@gmail.com', '', '#ffb2b2', '', '2022-09-01 17:56:59', 'PHPMaker is a powerful automation tool that can generate a fullÂ \nset of PHP quickly from MySQL, PostgreSQL, Microsoft Access,Â \nMicrosoft SQL Server and Oracle databases. Using PHPMaker,Â \nyou can instantly create websites that allow users to view, edit,Â \nsearch, add and delete records on the web. PHPMaker is designedÂ \nfor high flexibility, numerous options enable you to generate PHPÂ \napplications that best suit your needs. The generated codesÂ \nare clean, straightforward, and easy to customize.', 4, '', 7, 2, 1, 1, 0, 0, 0, '2018-12-12 00:00:00', '2022-10-10 03:08:03', '', 0, 0, 'https://phpmaker.dev/demo.php', 0, 'ernest.buffington@gmail.com', '3', 0, 'PHPMaker v8.0.1', '8.0.1', 5),
(0, '', '', '', '', '', '2022-09-01 18:21:52', NULL, 5, NULL, 0, 0, 0, 1, 0, 0, 1, '2018-12-12 00:00:00', '2018-12-12 00:00:00', '', 0, 0, '', 0, 'ernest.buffington@gmail.com', 'TheGhost', 0, '', '', 0);

DROP TABLE IF EXISTS `nuke_file_repository_screenshots`;
CREATE TABLE `nuke_file_repository_screenshots` (
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL DEFAULT 0,
  `filename` varchar(255) NOT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `submitter` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `nuke_file_repository_settings`;
CREATE TABLE `nuke_file_repository_settings` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `nuke_file_repository_settings` (`config_name`, `config_value`) VALUES
('uhead', '1'),
('utext', '0'),
('pophits', '250'),
('version', '1.1.0'),
('usegfxcheck', '1'),
('currency', 'GBP'),
('parse_smilies', '1'),
('date_format', 'M jS, Y g:i a'),
('viewer', 'colorbox'),
('developer_mode', '1'),
('overview_display', '1'),
('overview_count', '5'),
('most_popular', '50'),
('download_view', '1'),
('adminBypass', '0'),
('users_can_upload', '1'),
('users_file_upload_amount', '2'),
('users_screens_upload_amount', '3'),
('overview_display_areas', 'newdownloads,mostpopular,statistics'),
('show_legend', '0'),
('allowed_file_extensions', '7z,arj,rar,tar.gz,zip,tar,pdf'),
('allowed_image_extensions', 'jpeg,jpg,png,gif'),
('group_allowed_to_upload', '6');

DROP TABLE IF EXISTS `nuke_file_repository_themes`;
CREATE TABLE `nuke_file_repository_themes` (
  `theme_name` varchar(255) NOT NULL,
  `cell` int(11) NOT NULL,
  `head` int(11) NOT NULL,
  `per_row` int(11) NOT NULL,
  `show_left` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `nuke_file_repository_categories`
  ADD PRIMARY KEY (`cid`);

ALTER TABLE `nuke_file_repository_comments`
  ADD PRIMARY KEY (`cid`);

ALTER TABLE `nuke_file_repository_files`
  ADD PRIMARY KEY (`fid`);

ALTER TABLE `nuke_file_repository_items`
  ADD PRIMARY KEY (`did`),
  ADD KEY `cid` (`cid`),
  ADD KEY `title` (`title`);

ALTER TABLE `nuke_file_repository_screenshots`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `did` (`did`);

ALTER TABLE `nuke_file_repository_settings`
  ADD PRIMARY KEY (`config_name`);

ALTER TABLE `nuke_file_repository_themes`
  ADD PRIMARY KEY (`theme_name`);

ALTER TABLE `nuke_file_repository_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `nuke_file_repository_comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `nuke_file_repository_files`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `nuke_file_repository_items`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `nuke_file_repository_screenshots`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
