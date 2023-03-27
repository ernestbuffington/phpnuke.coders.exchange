<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* https://phpnuke.coders.exchange                                      */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (stristr(htmlentities($_SERVER['PHP_SELF']), "header.php")) {
	Header("Location: index.php");
	die();
}

define('NUKE_HEADER', true);
require_once("mainfile.php");
##################################################
# Include some common header for HTML generation #
##################################################

function head() {

	global $slogan, 
	     $sitename, 
		  $banners, 
		  $nukeurl, 
	  $Version_Num, 
	      $artpage, 
		    $topic, 
		  $hlpfile, 
		     $user, 
			   $hr, 
			$theme, 
		   $cookie, 
		 $bgcolor1, 
		 $bgcolor2, 
		 $bgcolor3, 
		 $bgcolor4, 
	   $textcolor1, 
	   $textcolor2, 
	    $forumpage, 
		$adminpage, 
		 $userpage, 
		$pagetitle;

	$ThemeSel = get_theme();

	include_secure("themes/$ThemeSel/theme.php");

    echo "<!-- Loading Auto MimeType v1.0.0 from header.php -->\n";
	if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/includes/mimetype.php')):  
    include(NUKE_THEMES_DIR.$ThemeSel.'/includes/mimetype.php');
	else:  # OLD SCHOOL DEFAULT MIMETYPE START
	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
	echo '<html xmlns="http://www.w3.org/1999/xhtml">'."\n";
    echo "<!-- START <head> -->\n";
    echo '<head>'."\n";
    endif;	# OLD SCHOOL DEFAULT MIMETYPE END

    echo '<!--[if IE]>'."\n";
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'."\n";
    echo '<![endif]-->'."\n";
    echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'."\n";
    echo '<meta http-equiv="Content-Language" content="'._LANGCODE.'" />'."\n";
    echo '<meta http-equiv="Content-Style-Type" content="text/css" />'."\n";
    echo '<meta http-equiv="Content-Script-Type" content="text/javascript" />'."\n";
	
	echo "<title>$sitename $pagetitle</title>\n";
	?>
<!-- banner org_green -->
<!-- Attach our CSS -->
<link rel="stylesheet" href="themes/<?php echo $ThemeSel?>/orbit-1.2.3.css">
<!-- Attach necessary JS -->
<script type="text/javascript" src="themes/<?php echo $ThemeSel?>/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="themes/<?php echo $ThemeSel?>/jquery.orbit-1.2.3.min.js"></script>	
<!--[if IE]>
<style type="text/css">
.timer { display: none !important; }
div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
</style>
<![endif]-->
<!-- Run the plugin -->
<script type="text/javascript">
  $(window).load(function() {
  $('#featured').orbit();
  });
</script>
<!-- end banner org_green -->
<!-- End Quantcast tag -->
<?php
    include("includes/meta.php");

    include("includes/javascript.php");

	if (file_exists("themes/$ThemeSel/images/favicon.png")) {
		echo "<link REL=\"apple-touch-icon\" HREF=\"themes/$ThemeSel/images/favicon.png\">\n";
	} else {
	   echo "<link REL=\"apple-touch-icon\" HREF=\"favicon.png\">\n";
	}

	echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"backend.php\">\n";
	echo "<link rel=\"StyleSheet\" href=\"themes/$ThemeSel/style/style.css\" type=\"text/css\">\n\n\n";

	if (file_exists("includes/custom_files/custom_head.php")) {
		include_secure("includes/custom_files/custom_head.php");
	}
	echo "\n\n\n</head>\n\n";

	if (file_exists("includes/custom_files/custom_header.php")) {
		include_secure("includes/custom_files/custom_header.php");
	}
	themeheader();
}

online();
head();

include("includes/counter.php");

if(defined('HOME_FILE')) {

	message_box();
	blocks("Center");
}

?>
