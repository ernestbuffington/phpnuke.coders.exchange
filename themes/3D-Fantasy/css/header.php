<?php
global $theme_name;
echo "/* Loading themes/".$theme_name."/css/header.php Fly Kit for PHP-Nuke Titanium - Design Themes On The Fly */\n"; 
echo "/* When we are done we will move this code to style.css */\n"; 
global $screen_width, $screen_height, $textcolor1, $textcolor2, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $fieldset_border_width, $locked_width;
$bgcolor5 ='#262525';
?>
/**
 * Stylesheet for the Titanium Core Theme
 *
 * @filename:  header.php
 * @author  :  TheGhost
 * @version :  3.0
 * @date    :  11/22/2022 (DD/MM/YYY)
 * @license :  Copyright (c) 2022 The 86it Developers Network under the MIT license
 * @notes   :  n/a
 *
 * -- -------------------------------------------------------------------
 * \/ STYLESHEET NAVIGATION
 * -- -------------------------------------------------------------------
 *
 *  1.  Reset CSS
 *  2.  Primary page styles
 *  3.  Page elements
 *  4.  Page header
 *  5.  Center Blocks
 *  6.  Side Blocks
 *  7.  Page footer
 *  8.  User interaction
 *  9.  Body content wrappers
 * 10.  Side body blocks
 * 11.  Center content wrapper
 * 12.  Story content wrapper
 * 13.  Inputs
 * 14.  Clearfix
 * 15.  Forums Page Styles
 * --- -------------------------------------------------------------------
*/

@import url('//fonts.googleapis.com/css?family=Dosis|Faster+One|Montserrat|Open+Sans|Yanone+Kaffeesatz|Kanit|Roboto');

/*
 * 1. Reset CSS
 *
 * html5doctor.com Reset Stylesheet (Eric Meyer's Reset Reloaded + HTML5 baseline)
 * v2.0 2019-01-07 | Authors: Eric Meyer
 * html5doctor.com/html-5-reset-stylesheet/
 ----------------------------------------------------------------*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	border: 0;
    font-size: 100%;
    margin: 0;
    padding: 0;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
  display: block;
}

/* By adding the following CSS properties we can prevent the odd rendering: PHONES */
html{
  -moz-text-size-adjust: none;
  -webkit-text-size-adjust: none;
  text-size-adjust: none;
}

img{border:0;}

table
{ 
 border-spacing:0;
 border-collapse: collapse;
}

table td {
 border-spacing:0;
 border-collapse: collapse;
}

img.rounded-corners-user-info {
  border-radius: 20px;
  max-width: 200px; 
}

img.rounded-corners-last-vistors{
  border-radius: 10px;
  max-width: 150px; 
}

img.rounded-corners{
  border-radius: 10px;
  max-width: 150px; 
}  

FONT		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
TD		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
BODY		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
P		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
DIV		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
INPUT		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
TEXTAREA	{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
FORM 		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
A:link          {BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
A:active        {BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
A:visited       {BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
A:hover         {BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
.title 		{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 13px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.content 	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica}
.storytitle 	{BACKGROUND: none; COLOR: #363636; FONT-SIZE: 14px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.storycat	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 13px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
.boxtitle 	{BACKGROUND: none; COLOR: #363636; FONT-SIZE: 11px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.boxcontent 	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 12px; FONT-FAMILY: Verdana, Helvetica}
.option 	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 13px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.tiny		{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 10px; FONT-WEIGHT: normal; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.footmsg        {BACKGROUND: none; COLOR: #000000; FONT-SIZE: 8px; FONT-WEIGHT: normal; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
.footmsg_l	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 8px; FONT-WEIGHT: normal; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
.box		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px; border: 1px solid #000000; background-color: #FFFFFF}

<?
