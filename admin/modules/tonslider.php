<?php
if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $prefix, $db, $admin_file;

$aid = substr("$aid", 0,25);

$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));

if ($row['radminsuper'] == 1) {

/*********************************************************/
/* Configuration Functions to Setup all the Variables    */
/*********************************************************/
if (file_exists("$admin_file/language/tonslider/lang-$language.php")) 
{
	include_once("$admin_file/language/tonslider/lang-$language.php");
}
else
{
	include_once("$admin_file/language/tonslider/lang-english.php");
}
function tonslidersetup() {
    
	global $prefix, $db, $admin_file;
    
	include ("header.php");
    
	//GraphicAdmin();
    
	$result = $db->sql_query("SELECT sliderwidth, 
	                                sliderheight, 
								  sliderduration, 
								    slidertitle1, 
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
									sliderthumb6 from ".$prefix."_tonslider");
									
    list($sliderwidth, 
	    $sliderheight, 
	  $sliderduration, 
	    $slidertitle1, 
		$slidertitle2, 
		$slidertitle3, 
		$slidertitle4, 
		$slidertitle5, 
		$slidertitle6, 
	  $slidercontent1, 
	  $slidercontent2, 
	  $slidercontent3, 
	  $slidercontent4, 
	  $slidercontent5, 
	  $slidercontent6, 
	    $sliderthumb1, 
		$sliderthumb2, 
		$sliderthumb3, 
		$sliderthumb4, 
		$sliderthumb5, 
		$sliderthumb6) = $db->sql_fetchrow($result);
		
    OpenTable();
    echo '<div align="center"><span class="title"><strong>'._TONSLIDERCONFIG.'</strong></span></div>';
    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _RETURNMAIN . "</a> ]</div>\n";
	CloseTable();
    
    OpenTable();
    echo '<div align=\"center\">'
	
	.'<form action="'.$admin_file.'.php" method="post">'
	
	.'<table width="100%" border="0"><tr><td>'
	. _SLIDERWIDTH . ':&nbsp;<input type="text" name="xsliderwidth" value="'.$sliderwidth.'" size="5" maxlength="3" /><br /><br />'
	. _SLIDERHEIGHT . ':&nbsp;<input type="text" name="xsliderheight" value="'.$sliderheight.'" size="5" maxlength="3" /><br /><br />'
	. _SLIDERDURATION . ':&nbsp;<input type="text" name="xsliderduration" value="'.$sliderduration.'" size="5" maxlength="5" /><br /><br />'
	. _SLIDER1TITLE . ':&nbsp;<input type="text" name="xslidertitle1" value="'.$slidertitle1.'" size="50" maxlength="100" /><br /><br />'
	. _SLIDERTHUMB1. ':&nbsp;<input type="text" name="xsliderthumb1" value="'.$sliderthumb1.'" size="25" maxlength="25" /><br /><br />'
	. _SLIDER1 . ':';

    global $wysiwyg_buffer;
    $wysiwyg_buffer = 'xslidercontent1, $slidercontent1';
	Make_TextArea('xslidercontent1', ''.$slidercontent1.'', 'PHPNukeAdmin');
	 
	 echo '<br /><br />'
	 . _SLIDER2TITLE . ':&nbsp;<input type="text" name="xslidertitle2" value="'.$slidertitle2.'" size="50" maxlength="100" /><br /><br />'
	 . _SLIDERTHUMB2. ':&nbsp;<input type="text" name="xsliderthumb2" value="'.$sliderthumb2.'" size="25" maxlength="25" /><br /><br />'
	. _SLIDER2. ':';

    $wysiwyg_buffer = 'xslidercontent2,$slidercontent2';
	Make_TextArea('xslidercontent2', ''.$slidercontent2.'', 'PHPNukeAdmin');
	 
	 echo '<br /><br />'	 
	 . _SLIDER3TITLE . ':&nbsp;<input type="text" name="xslidertitle3" value="'.$slidertitle3.'" size="50" maxlength="100" /><br /><br />'
	 . _SLIDERTHUMB3. ':&nbsp;<input type="text" name="xsliderthumb3" value="'.$sliderthumb3.'" size="25" maxlength="25" /><br /><br />'
	 . _SLIDER3. ':';
	
    $wysiwyg_buffer = 'xslidercontent3,$slidercontent3';
	Make_TextArea('xslidercontent3', ''.$slidercontent3.'', 'PHPNukeAdmin');
    
	     echo '<br /><br />'
         . _SLIDER4TITLE . ':&nbsp;<input type="text" name="xslidertitle4" value="'.$slidertitle4.'" size="50" maxlength="100" /><br /><br />'
         . _SLIDERTHUMB4. ':&nbsp;<input type="text" name="xsliderthumb4" value="'.$sliderthumb4.'" size="25" maxlength="25" /><br /><br />'
	 . _SLIDER4. ':';
	
    $wysiwyg_buffer = 'xslidercontent4,$slidercontent4';
	Make_TextArea('xslidercontent4', ''.$slidercontent4.'', 'PHPNukeAdmin');

         echo '<br /><br />'
         . _SLIDER5TITLE . ':&nbsp;<input type="text" name="xslidertitle5" value="'.$slidertitle5.'" size="50" maxlength="100" /><br /><br />'
         . _SLIDERTHUMB5. ':&nbsp;<input type="text" name="xsliderthumb5" value="'.$sliderthumb5.'" size="25" maxlength="25" /><br /><br />'	
	 . _SLIDER5. ':';
	
    $wysiwyg_buffer = 'xslidercontent5,$slidercontent5';
	Make_TextArea('xslidercontent5', ''.$slidercontent5.'', 'PHPNukeAdmin');
    
	     echo '<br /><br />'
         . _SLIDER6TITLE . ':&nbsp;<input type="text" name="xslidertitle6" value="'.$slidertitle6.'" size="50" maxlength="100" /><br /><br />'
          . _SLIDERTHUMB6. ':&nbsp;<input type="text" name="xsliderthumb6" value="'.$sliderthumb6.'" size="25" maxlength="25" /><br /><br />'  
	. _SLIDER6. ':';
	
    $wysiwyg_buffer = 'xslidercontent6,$slidercontent6';
	Make_TextArea('xslidercontent6', ''.$slidercontent6.'', 'PHPNukeAdmin');
    
	     echo '<br /><br />';
         echo '</td></tr></table><br /><br />';

    echo '<input type="hidden" name="op" value="tonsliderSave" />'
	.'<input type="submit" value="'._SAVECHANGES.'" />'
	.'</form></div>';
    CloseTable();

    include ("footer.php");
}

function tonsliderSave ($xsliderwidth, 
                       $xsliderheight, 
					 $xsliderduration, 
					   $xslidertitle1, 
					   $xslidertitle2, 
					   $xslidertitle3, 
					   $xslidertitle4, 
					   $xslidertitle5, 
					   $xslidertitle6, 
					 $xslidercontent1, 
					 $xslidercontent2, 
					 $xslidercontent3, 
					 $xslidercontent4, 
					 $xslidercontent5, 
					 $xslidercontent6, 
					   $xsliderthumb1, 
					   $xsliderthumb2, 
					   $xsliderthumb3, 
					   $xsliderthumb4, 
					   $xsliderthumb5, 
					   $xsliderthumb6) {
    
	global $prefix, $db, $admin_file;
    
    $db->sql_query("UPDATE ".$prefix."_tonslider SET sliderwidth='$xsliderwidth', 
	                                               sliderheight='$xsliderheight', 
											   sliderduration='$xsliderduration', 
											       slidertitle1='$xslidertitle1', 
												   slidertitle2='$xslidertitle2', 
												   slidertitle3='$xslidertitle3', 
												   slidertitle4='$xslidertitle4', 
												   slidertitle5='$xslidertitle5', 
												   slidertitle6='$xslidertitle6', 
											   slidercontent1='$xslidercontent1', 
											   slidercontent2='$xslidercontent2', 
											   slidercontent3='$xslidercontent3', 
											   slidercontent4='$xslidercontent4', 
											   slidercontent5='$xslidercontent5', 
											   slidercontent6='$xslidercontent6', 
											       sliderthumb1='$xsliderthumb1', 
												   sliderthumb2='$xsliderthumb2', 
												   sliderthumb3='$xsliderthumb3', 
												   sliderthumb4='$xsliderthumb4', 
												   sliderthumb5='$xsliderthumb5', 
												   sliderthumb6='$xsliderthumb6'");
												   
    Header('Location: '.$admin_file.'.php?op=tonslidersetup');
}


switch($op) {

    case "tonslidersetup":
    tonslidersetup();
    break;

    case "tonsliderSave":
    tonsliderSave ($xsliderwidth, 
	              $xsliderheight, 
				$xsliderduration, 
				  $xslidertitle1, 
				  $xslidertitle2, 
				  $xslidertitle3, 
				  $xslidertitle4, 
				  $xslidertitle5, 
				  $xslidertitle6, 
				$xslidercontent1, 
				$xslidercontent2, 
				$xslidercontent3, 
				$xslidercontent4, 
				$xslidercontent5, 
				$xslidercontent6, 
				  $xsliderthumb1, 
				  $xsliderthumb2, 
				  $xsliderthumb3, 
				  $xsliderthumb4, 
				  $xsliderthumb5, 
				  $xsliderthumb6);
    break;    
    }

} else {
    echo "Access Denied";
}

?>
