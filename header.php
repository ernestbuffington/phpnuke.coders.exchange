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

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])):
  Header("Location: index.php");
  die();
endif;

if(!defined('HEADER')) { define('HEADER', true); }

require_once(dirname(__FILE__).'/mainfile.php');

function head() {

	global $slogan, $sitename, $banners, $nukeurl, 
	  $Version_Num, $artpage, $topic, $hlpfile, 
		     $user, $hr, $theme, $cookie, $bgcolor1, 
		 $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, 
	   $textcolor2, $forumpage, $adminpage, $userpage, 
		$pagetitle, $cache, $ThemeSel;

	$ThemeSel = get_theme();
	include_secure("themes/$ThemeSel/theme.php");

  /**
   * Doctype/Mime Type auto selector - This checks each theme as it is switched and will load a mimetype.php from the themes includes folder.
   * This allows for many different doctypes to be used on the Fly by whichever theme is selected.
   * This is great for porting Legacy themes or even just to show the versatility of PHP-Nuke.
   * If a mimetype.php file is not detected it uses the default doctype of XHTML 1.0 Transitional
   *
   * @author Ernest Allen Bufffington
   * @version 1.0
   * @license GPL-3.0
   */
  	if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/includes/mimetype.php')):  
    include(NUKE_THEMES_DIR.$ThemeSel.'/includes/mimetype.php');
	echo "<!-- HEADER START ================================================================================================================================================================================================= -->\n";
    echo '<head>'."\n";
	else:  # OLD SCHOOL DEFAULT MIMETYPE START
	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
	echo '<html xmlns="http://www.w3.org/1999/xhtml">'."\n";
	echo "<!-- HEADER START ================================================================================================================================================================================================= -->\n";
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

   /**
    * Include current Theme Javascript Functions
    * for Theme Copyright and Bootstrap loading!
    *
    * @author Ernest Allen Bufffington
    * @version 1.0
    * @license GPL-3.0
    */
    if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/includes/javascript.php')): 
	  echo "\n<!-- Loadiing themes/".$ThemeSel."/includes/javascript.php from header.php -->\n\n";
      include_once(NUKE_THEMES_DIR.$ThemeSel.'/includes/javascript.php');
	endif;
	
    include(NUKE_INCLUDE_DIR.'javascript.php');

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

    // for nuke 8.3.x theme compatibility
	if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/nuke83x.php')) {
      include(NUKE_THEMES_DIR.$ThemeSel.'/nuke83x.php');
	}
	
	echo "</head>\n";
	echo "<!-- Finished Loading The Header from header.php -->\n";
	echo "<!-- HEADER END =================================================================================================================================================================================================== -->\n";

	if (file_exists(NUKE_THEMES_DIR.$ThemeSel.'/nuke83x.php')) {

	echo "\n<!-- Loadiing function themeheader() from themes/og_green/theme.php -->\n\n";
       themeheader();
	
	echo "<!-- WARNING PHP-NUKE IS IN THEME COMPATIBILITY MODE -->\n";	
	echo "<!-- Loading Primary Body Tag from themes/$ThemeSel/theme.php -->\n\n";	
	
	} else {	
    
	echo "<!-- Loading Primary Body Tag from header.php -->\n";
	echo "<body>\n\n\n\n";
	
	}

}

head();

if (!defined('ADMIN_FILE')):
	include_once(NUKE_INCLUDE_DIR.'counter.php');
	if (defined('HOME_FILE')):
	    message_box();
		blocks('Center');
    endif;
endif;

online();

?>
