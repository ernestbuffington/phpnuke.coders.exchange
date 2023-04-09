<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

 /*****[CHANGES]**********************************************************
 -=[Mod]=-
       Advanced Username Color                  v1.0.5       08/08/2005
 ************************************************************************/

if (!defined('IN_PHPBB'))
{
    die('Hacking attempt');
}

// true == use db cache
$core->start_module(true);

$core->set_content('bars');

$core->set_view('rows', $core->return_limit);
$core->set_view('columns', 5);

$core->define_view('set_columns', array(
    $core->pre_defined('rank'),
    'username' => $lang['Username'],
    'posts' => $lang['Posts'],
    $core->pre_defined('percent'),
    $core->pre_defined('graph'))
);

$content->percentage_sign = TRUE;

$core->set_header($lang['module_name']);

$core->assign_defined_view('align_rows', array(
    'left',
    'left',
    'center',
    'center',
    'left')
);

$sql = "SELECT SUM(nuke_user_posts) as total_posts FROM " . USERS_TABLE . " WHERE user_id <> " . ANONYMOUS;

$result = $core->sql_query($sql, 'Unable to retrieve users data');
$row = $core->sql_fetchrow($result);

$total_posts = $row['total_posts'];

/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
$sql = "SELECT user_id, user_color_gc, username, nuke_user_posts
FROM " . USERS_TABLE . "
WHERE (user_id <> " . ANONYMOUS . " ) AND (nuke_user_posts > 0)
ORDER BY nuke_user_posts DESC
LIMIT " . $core->return_limit;
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/

$result = $core->sql_query($sql, 'Unable to retrieve users data');
$data = $core->sql_fetchrowset($result);
$content->init_math('nuke_user_posts', $data[0]['nuke_user_posts'], $total_posts);
$core->set_data($data);

$core->define_view('set_rows', array(
    '$core->pre_defined()',
    '$core->generate_link(append_sid(\'profile.php?mode=viewprofile&amp;u=\' . $core->data(\'user_id\')), $core->data(\'username\'), \'target="_blank"\')',
    '$core->data(\'nuke_user_posts\')',
    '$core->pre_defined()',
    '$core->pre_defined()')
);

$core->run_module();

?>