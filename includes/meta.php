<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* https://phpnuke.coders.exchange                                      */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (stristr(htmlentities($_SERVER['PHP_SELF']), "meta.php")) {
    Header("Location: ../index.php");
    die();
}

global $commercial_license, $sitename, $slogan;

##################################################
# Include for Meta Tags generation               #
##################################################
if(!isset($metastring)) { $metastring = ''; }
$metastring .= "<meta http-equiv=\"expires\" content=\"0\">\n";
$metastring .= '<!--[if IE]>'."\n";
$metastring .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'."\n";
$metastring .= '<![endif]-->'."\n";
$metastring .= "<meta name=\"resource-type\" content=\"document\">\n";
$metastring .= "<meta name=\"distribution\" content=\"global\">\n";
$metastring .= "<meta name=\"author\" content=\"$sitename\">\n";
$metastring .= "<meta name=\"copyright\" content=\"Copyright (c) by $sitename\">\n";
$metastring .= "<meta name=\"keywords\" content=\"News, news, New, new, Technology, technology, Headlines, headlines, Nuke, nuke, PHP-Nuke, phpnuke, php-nuke, Geek, geek, Geeks, geeks, Hacker, hacker, Hackers, hackers, Linux, linux, Windows, windows, Software, software, Download, download, Downloads, downloads, Free, FREE, free, Community, community, MP3, mp3, Forum, forum, Forums, forums, Bulletin, bulletin, Board, board, Boards, boards, PHP, php, Survey, survey, Kernel, kernel, Comment, comment, Comments, comments, Portal, portal, ODP, odp, Open, open, Open Source, OpenSource, Opensource, opensource, open source, Free Software, FreeSoftware, Freesoftware, free software, GNU, gnu, GPL, gpl, License, license, Unix, UNIX, *nix, unix, MySQL, mysql, SQL, sql, Database, DataBase, Blogs, blogs, Blog, blog, database, Mandrake, mandrake, Red Hat, RedHat, red hat, Slackware, slackware, SUSE, SuSE, suse, Debian, debian, Gnome, GNOME, gnome, Kde, KDE, kde, Enlightenment, enlightenment, Interactive, interactive, Programming, programming, Extreme, extreme, Game, game, Games, games, Web Site, web site, Weblog, WebLog, weblog, Guru, GURU, guru, Oracle, oracle, db2, DB2, odbc, ODBC, plugin, plugins, Plugin, Plugins\">\n";
$metastring .= "<meta name=\"description\" content=\"$slogan\">\n";
$metastring .= "<meta name=\"robots\" content=\"index, follow\">\n";
$metastring .= "<meta name=\"revisit-after\" content=\"1 days\">\n";
$metastring .= "<meta name=\"rating\" content=\"general\">\n";

###############################################
# DO NOT REMOVE THE FOLLOWING COPYRIGHT LINE! #
# YOU'RE NOT ALLOWED TO REMOVE NOR EDIT THIS. #
###############################################

// IF YOU REALLY NEED TO REMOVE IT AND HAVE MY WRITTEN AUTHORIZATION CHECK: http://phpnuke.org/modules.php?name=Commercial_License
// PLAY FAIR AND SUPPORT THE DEVELOPMENT, PLEASE!
if ($commercial_license != 1) {
	$metastring .= "<meta name=\"generator\" content=\"PHP-Nuke Copyright (c) 2000 - 2023 by Francisco Burzi. This is free software, and you may redistribute it under the GPL (http://phpnuke.org/files/gpl.txt). PHP-Nuke comes with absolutely no warranty, for details, see the license (http://phpnuke.org/files/gpl.txt).\">\n";
}

echo $metastring;

?>
