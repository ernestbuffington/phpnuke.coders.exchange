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

/************************************************************************
   Nuke-Evolution    : Server Info Administration
   PHP-Nuke Titanium : Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team
   Copyright (c) 2022 by The PHP-Nuke Titanium Group

   Filename      : avatar.php
   Author(s)     : Ernest Allen Buffington, Technocrat
   Version       : 4.0.3
   Date          : 05.19.2005 (mm.dd.yyyy)
   Last Update   : 12.12.2022 (mm.dd.yyyy)

   Notes         : Evo User Block Personal Message Module
************************************************************************/

if(!defined('NUKE_FILE')):
 die ("Illegal File Access");
endif;

global $evouserinfo_personal_message;

function evouserinfo_personal_message() 
{
    global $evouserinfo_personal_message, $evouserinfo_addons;

    $evouserinfo_personal_message = $evouserinfo_addons['personal_message_message'];
    
	if (!isset($lang_evo_userblock['BLOCK']['GOOD_AFTERNOON']['ANON']))
	$lang_evo_userblock['BLOCK']['GOOD_AFTERNOON']['ANON'] = 'Stranger';
    
	if(is_user()): 
        global $userinfo;
        $uname = UsernameColor($userinfo['username']);
	else: 
        $uname = $lang_evo_userblock['BLOCK']['GOOD_AFTERNOON']['ANON'];
    endif;
    
	global $sitename;
    
	$evouserinfo_personal_message = str_replace('%site%', $sitename, $evouserinfo_personal_message );
    $evouserinfo_personal_message = str_replace('%name%', $uname, $evouserinfo_personal_message );
}

evouserinfo_personal_message();

?>
