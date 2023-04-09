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
   
   Notes         : Titanium/Evo User Block PMs Module
************************************************************************/

if(!defined('NUKE_FILE')):
  die("Illegal File Access");
endif;

global $evouserinfo_addons, $evouserinfo_pms, $lang_evo_userblock;

$one = "<i style=\"font-size: 17px; color: white\" onMouseOver=\"this.style.color='#ECAB53'\" onMouseOut=\"this.style.color='white'\" class=\"fas fa-envelope\"></i>";

if(has_new_or_unread_private_messages() > 0):
  $two = " <a class='modules' href='modules.php?name=Private_Messages' target='_self'> $one My InBox (".has_new_or_unread_private_messages().")</a>";
else:
  $two = " <a class='modules' href='modules.php?name=Private_Messages' target='_self'> $one My InBox (0)</a>";
endif;

if(is_user()):
    global $userinfo;    
  
    $evouserinfo_pms  = '<div style="padding-left: 10px;">';
	$evouserinfo_pms .= $two."";
	$evouserinfo_pms .= '</div>';
endif;

?>