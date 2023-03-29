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

	echo '<meta http-equiv="Content-Type" content="text/html; charset='._CHARSET.'">'."\n";
    echo '<meta http-equiv="Content-Language" content="'._LANGCODE.'" />'."\n";
    echo '<meta http-equiv="Content-Style-Type" content="text/css" />'."\n";
    echo '<meta http-equiv="Content-Script-Type" content="text/javascript" />'."\n";

    echo "<!-- Loading dynamic meta tags from database from includes/meta.php START -->\n";
    include("includes/meta.php");
    echo "<!-- Loading dynamic meta tags from database from includes/meta.php END -->\n";
	
	echo "\n<title>$sitename $pagetitle</title>\n\n";
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

    require_once(NUKE_INCLUDE_DIR.'javascript.php');

    global $cache;
	
	echo "\n<!-- Loadiing favicon from header.php -->\n\n";
    if (!($favicon = $cache->load('favicon', 'config'))): 
        if (file_exists(NUKE_BASE_DIR.'favicon.ico')) 
		$favicon = "favicon.ico";
		else 
		if (file_exists(NUKE_IMAGES_DIR.'favicon.ico')) 
		$favicon = "images/favicon.ico";
		else 
		if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/images/favicon.ico')) 
		$favicon = "themes/$ThemeSel/images/favicon.ico";
		else 
        $favicon = 'none';
		if ($favicon != 'none') 
        echo "<link rel=\"shortcut icon\" href=\"$favicon\" type=\"image/x-icon\" />\n";
        $cache->save('favicon', 'config', $favicon);
	else: 
        if ($favicon != 'none') 
        echo "<link rel=\"shortcut icon\" href=\"$favicon\" type=\"image/x-icon\" />\n";
    endif;
	
	echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"backend.php\">\n";
	echo "<link rel=\"StyleSheet\" href=\"themes/$ThemeSel/style/style.css\" type=\"text/css\">\n\n\n";

    if (!($custom_head = $cache->load('custom_head', 'config'))): 
    
	    $custom_head = array();

	    if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_head.php')): 
	       echo "\n<!-- Loadiing custom_head.php from header.php -->\n\n";
           $custom_head[] = 'custom_head';
		endif;

 		if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_header.php')): 
	       echo "\n<!-- Loadiing custom_header.php from header.php -->\n\n";
           $custom_head[] = 'custom_header';
		endif;

        if (!empty($custom_head)): 
          
		    foreach ($custom_head as $file):
	            echo "\n<!-- Loadiing includes/".$file.".php from header.php -->\n\n";
                include_once(NUKE_INCLUDE_DIR.'custom_files/'.$file.'.php');
            endforeach;
        
		endif;
		$cache->save('custom_head', 'config', $custom_head);
	else: 
        
		if (!empty($custom_head)): 
        
		    foreach ($custom_head as $file): 
                include_once(NUKE_INCLUDE_DIR.'custom_files/'.$file.'.php');
            endforeach;
        
		endif;
    endif;
	
	echo "</head>\n";

	echo "\n<!-- Loadiing function themeheader() from header.php -->\n\n";
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
