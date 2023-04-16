<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2007 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/************************************************************************/
/* Example Header Addon                                                 */
/*                                                                      */ 
/* This is only compatible with PHP-Nuke v8.3.3 and above.              */                                 
/*                                                                      */
/************************************************************************/
global $db, $prefix, $sliderwidth, $sliderheight, $sliderduration;

$sql = "SELECT sliderwidth, sliderheight, sliderduration FROM ".$prefix."_tonslider";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    
    $sliderwidth = $row['sliderwidth'];
    $sliderheight = $row['sliderheight'];
    $sliderduration = $row['sliderduration'];
	
?>
