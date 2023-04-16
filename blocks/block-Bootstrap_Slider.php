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

/*
 * Nuke Bootstrap Slider 
 * @version v1.0.0
 * @Author Ernest Allen Buffington
 * @idea came from TrickedOutSlider Block http://trickedoutnews.com
 *
 * This program is free software. You can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License.
 */
if (stristr($_SERVER['SCRIPT_NAME'], "block-BootstrapSlider.php"))
{
	Header("Location: ../../index.php");
	die();
}

require_once('mainfile.php');
global $db, $prefix, $sliderduration;

 $sql = "SELECT slidertitle1, 
                slidertitle2, 
				slidertitle3, 
				slidertitle4, 
				slidertitle5, 
				slidertitle6, 
			  slidercontent1, 
			  slidercontent2, 
			  slidercontent3, 
			  slidercontent4, 
			  slidercontent5, 
			  slidercontent6, 
			    sliderthumb1, 
				sliderthumb2, 
				sliderthumb3, 
				sliderthumb4, 
				sliderthumb5, 
				sliderthumb6 FROM ".$prefix."_tonslider";
				
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    
    $slidertitle1   = stripslashes(check_html($row['slidertitle1'], 'nohtml'));
    $slidertitle2   = stripslashes(check_html($row['slidertitle2'], 'nohtml'));
    $slidertitle3   = stripslashes(check_html($row['slidertitle3'], 'nohtml'));
    $slidertitle4   = stripslashes(check_html($row['slidertitle4'], 'nohtml'));
    $slidertitle5   = stripslashes(check_html($row['slidertitle5'], 'nohtml'));
    $slidertitle6   = stripslashes(check_html($row['slidertitle6'], 'nohtml'));
    $slidercontent1 = stripslashes($row['slidercontent1']);
    $slidercontent2 = stripslashes($row['slidercontent2']);
    $slidercontent3 = stripslashes($row['slidercontent3']);
    $slidercontent4 = stripslashes($row['slidercontent4']);
    $slidercontent5 = stripslashes($row['slidercontent5']);
    $slidercontent6 = stripslashes($row['slidercontent6']);
    $sliderthumb1   = stripslashes(check_html($row['sliderthumb1'], 'nohtml'));
    $sliderthumb2   = stripslashes(check_html($row['sliderthumb2'], 'nohtml'));
    $sliderthumb3   = stripslashes(check_html($row['sliderthumb3'], 'nohtml'));
    $sliderthumb4   = stripslashes(check_html($row['sliderthumb4'], 'nohtml'));
    $sliderthumb5   = stripslashes(check_html($row['sliderthumb5'], 'nohtml'));
    $sliderthumb6   = stripslashes(check_html($row['sliderthumb6'], 'nohtml'));

$content = '<div align="center" style="padding-top:20px;"></div>';

$content .= '<div class="container">';
$content .= '<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="'.$sliderduration.'">';
$content .= '<!-- NSN Bootsrap Indicators -->';
$content .= '<ol class="carousel-indicators">';
$content .= '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
$content .= '<li data-target="#myCarousel" data-slide-to="1"></li>';
$content .= '<li data-target="#myCarousel" data-slide-to="2"></li>';
$content .= '<li data-target="#myCarousel" data-slide-to="3"></li>';
$content .= '<li data-target="#myCarousel" data-slide-to="4"></li>';
$content .= '<li data-target="#myCarousel" data-slide-to="5"></li>';

$content .= '</ol>';

$content .= '<!-- NSN Bootsrap Wrapper for slides -->';
$content .= '<div class="carousel-inner">';
$content .= '<div style="border-radius: 30px;" class="item active">';
$content .= '<img src="images/slider/'.$sliderthumb1.'" alt="'.$slidertitle1.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h2><strong>'.$slidertitle1.'</strong></h2>';
$content .= '<p>'.$slidercontent1.'</p>';
$content .= '</div>';
$content .= '</div>';

$content .= '<div style="border-radius: 30px;" class="item">';
$content .= '<img src="images/slider/'.$sliderthumb2.'" alt="'.$slidertitle2.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h3>'.$slidertitle2.'</h3>';
$content .= '<p>'.$slidercontent2.'</p>';
$content .= '</div>';
$content .= '</div>';
    
$content .= '<div style="border-radius: 30px;" class="item">';
$content .= '<img src="images/slider/'.$sliderthumb3.'" alt="'.$slidertitle3.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h3>'.$slidertitle3.'</h3>';
$content .= '<p>'.$slidercontent3.'</p>';
$content .= '</div>';
$content .= '</div>';

$content .= '<div style="border-radius: 30px;" class="item">';
$content .= '<img src="images/slider/'.$sliderthumb4.'" alt="'.$slidertitle4.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h3>'.$slidertitle4.'</h3>';
$content .= '<p>'.$slidercontent4.'</p>';
$content .= '</div>';
$content .= '</div>';

$content .= '<div style="border-radius: 30px;" class="item">';
$content .= '<img src="images/slider/'.$sliderthumb5.'" alt="'.$slidertitle5.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h3>'.$slidertitle5.'</h3>';
$content .= '<p>'.$slidercontent5.'</p>';
$content .= '</div>';
$content .= '</div>';

$content .= '<div style="border-radius: 30px;" class="item">';
$content .= '<img src="images/slider/'.$sliderthumb6.'" alt="'.$slidertitle6.'" style="border-radius: 30px; width:100%;">';
$content .= '<br /><br /><br /><br /><br /><br /><br /><br /><br />';
$content .= '<div class="carousel-caption">';
$content .= '<h3>'.$slidertitle6.'</h3>';
$content .= '<p>'.$slidercontent6.'</p>';
$content .= '</div>';
$content .= '</div>';

  
$content .= '</div>';

$content .= '<!-- NSN Bootsrap Left and right controls -->';
$content .= '<a class="left carousel-control" href="#myCarousel" data-slide="prev">';
$content .= '<span class="glyphicon glyphicon-chevron-left"></span>';
$content .= '<span class="sr-only">Previous</span>';
$content .= '</a>';
$content .= '<a class="right carousel-control" href="#myCarousel" data-slide="next">';
$content .= '<span class="glyphicon glyphicon-chevron-right"></span>';
$content .= '<span class="sr-only">Next</span>';
$content .= '</a>';
$content .= '</div>';
$content .= '</div>';

?>
