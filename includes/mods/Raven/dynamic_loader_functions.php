<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* https://phpnuke.coders.exchange                                      */
/*                                                                      */
/* Based on NukeStats Module Version 1.0                                */
/* Copyright (c) 2002 by Harry Mangindaan (sens@indosat.net) and        */
/*                    Sudirman (sudirman@akademika.net)                 */
/* http://www.nuketest.com                                              */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (stristr(htmlentities($_SERVER['PHP_SELF']), "dynamic_loader_functions.php")) {

	Header("Location: index.php");
	die();
}

/*
 * functions added to support dynamic and ordered loading of CSS, PHPCSS, and JS in <HEAD> and before </BODY>
 * Code origin Raven Nuke CMS (http://www.ravenphpscripts.com)
 * addons by Ernest Buffington aka TheGhost https://theghost.86it.us
 */

# START for Theme Fly Kit by Ernest Buffington Written for PHP-Nuke Titanium - 09/02/2019 (Based On Ravens JS and CSS Loaders)
function addPHPCSSToHead($content, $type='file')
{
    global $headPHPCSS;
    
if(($type == 'file') 
 	&& (is_array($headPHPCSS) 
	&& $headPHPCSS !== []) 
	&& (in_array([$type, $content], $headPHPCSS))): 
 	  return;
 	endif;
	$headPHPCSS[] = [$type, $content];
 	return;
}
# END for Theme Fly Kit by Ernest Buffington Written for PHP-Nuke Titanium - 09/02/2019 (Based On Ravens JS and CSS Loaders)

 
function addCSSToHead($content, $type='file') 
{
    global $headCSS;
    
    if (($type == 'file') 
 	&& (is_array($headCSS) 
	&& $headCSS !== []) 
	&& (in_array([$type, $content], $headCSS))): 
 	 return;
 	endif;
     
	$headCSS[] = [$type, $content];
     
 	return;
}

function addJSToHead($content, $type='file') 
{
    global $headJS;
    
 	if (($type == 'file') 
 	&& (is_array($headJS) 
	&& $headJS !== []) 
	&& (in_array([$type, $content], $headJS))): 
 	  return;
 	endif;
     
	$headJS[] = [$type, $content];
     
 	return;
}

function addJSToBody($content, $type='file') 
{
    global $bodyJS;
    
	if (($type == 'file') 
	&& (is_array($bodyJS) 
	&& count($bodyJS) > 0) 
	&& (in_array([$type, $content], $bodyJS))): 
	  return;
	endif;
    
	$bodyJS[] = [$type, $content];
   
	return;
}

function dynamic_loader() 
{
    global $headPHPCSS, $headCSS, $headJS;
    
    # START for Theme Fly Kit by Ernest Buffington - 09/02/2019  (Based On Ravens JS and CSS Loaders)
	if(is_array($headPHPCSS) && count($headPHPCSS) > 0):
      
	    foreach($headPHPCSS AS $php):
      
	        if($php[0]=='file'):
			  echo "<style>\n";
              include($php[1]);
			  echo "</style>\n";
			else: 
			  echo "<style>\n";
              include($php[1]);
			  echo "</style>\n"; 
            endif;
        
		endforeach;
    
	endif;
    # END for Theme Fly Kit by Ernest Buffington - 09/02/2019  (Based On Ravens JS and CSS Loaders)
	
	if(is_array($headCSS) && count($headCSS) > 0):
      
	    foreach($headCSS AS $css):
    
	        if($css[0]=='file'): 
              echo '<link rel="stylesheet" href="' . $css[1] . '" type="text/css" />' . "\n";
            else:
              echo $css[1];
			endif;
        
		endforeach;
    
	endif;

    if(is_array($headJS) && count($headJS) > 0):
      
	    foreach($headJS AS $js):
          
		  if($js[0] == 'file'): 
            echo '<script src="' . $js[1] . '"></script>' . "\n";
          else:
            echo $js[1];
		  endif;
        
		endforeach;
    
	endif;
  
  return;
}

function writeBODYJS() 
{
    global $bodyJS;
    
	if(is_array($bodyJS) && count($bodyJS) > 0): 
      
	    foreach($bodyJS AS $js):
    
	        if($js[0] == 'file'): 
              echo '<script src="' . $js[1] . '"></script>' . "\n";
            else:
              echo $js[1];
			endif;
    
	    endforeach;
    
	endif;
	
  return;
}

?>