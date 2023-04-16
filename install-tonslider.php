<?php

require_once("mainfile.php");

if(!isset($op))
$op = '';

global $admin;
if(!is_array($admin)) {
    $adm = base64_decode($admin);
    $adm = explode(":", $adm);
    $admin_name = "$adm[0]";
} else {
    $admin_name = "$admin[0]";
}

        $isadmin = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_authors WHERE aid='$admin_name'"));
if ($isadmin['radminsuper']==1) {
switch($op) {

    default:
    include("header.php");
        $pagetitle = "Tricked Out Slider";
        title("$pagetitle");
        
        OpenTable();
        echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
        echo "<tr><td>This script will install the tables for the $pagetitle.</td></tr>\n";
        echo "<tr><td><b>Backup data tables before going on!</b></td></tr>\n";
        echo "<tr><td><select name='op'>\n";
        echo "<option value=''>---- Install Options ----</option>\n";
        echo "<option value='install'>First Time Install of $pagetitle</option>\n";
        echo "</select> <input type='submit' value='COMMIT'></td></tr>\n";
        echo "<tr><td><b>Once you have finished with this script, delete it from your server!</b></td></tr>\n";
        echo "</form>";
        echo "</table>\n";
        CloseTable();
        include("footer.php");
    break;

    case "install":
        
       
           
$db->sql_query("CREATE TABLE `".$prefix."_tonslider` (
  `sliderwidth` varchar(3) NOT NULL default '0',
  `sliderheight` varchar(3) NOT NULL default '0',
  `sliderduration` varchar(5) NOT NULL default '0',
  `slidertitle1` varchar(25) NOT NULL default '0',
  `slidertitle2` varchar(25) NOT NULL default '0',
  `slidertitle3` varchar(25) NOT NULL default '0',
  `slidertitle4` varchar(25) NOT NULL default '0',  
  `slidertitle5` varchar(25) NOT NULL default '0',
  `slidertitle6` varchar(25) NOT NULL default '0',
  `slidercontent1` varchar(999) NOT NULL default '0',
  `slidercontent2` varchar(999) NOT NULL default '0',
  `slidercontent3` varchar(999) NOT NULL default '0',
  `slidercontent4` varchar(999) NOT NULL default '0',  
  `slidercontent5` varchar(999) NOT NULL default '0',
  `slidercontent6` varchar(999) NOT NULL default '0',
  `sliderthumb1` varchar(25) NOT NULL default '0',
  `sliderthumb2` varchar(25) NOT NULL default '0', 
  `sliderthumb3` varchar(25) NOT NULL default '0',
  `sliderthumb4` varchar(25) NOT NULL default '0', 
  `sliderthumb5` varchar(25) NOT NULL default '0',
  `sliderthumb6` varchar(25) NOT NULL default '0' 
    ) ENGINE=MyISAM;");
    
$db->sql_query("INSERT INTO ".$prefix."_tonslider (sliderwidth, 
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
												  sliderthumb6) VALUES ('560', 
												                        '235', 
																		'600', 
																    'Title 1', 
																	'Title 2', 
																	'Title 3', 
																	'Title 4', 
																	'Title 5', 
																	'Title 6', 
											   'Add content in admin Slide 1', 
											   'Add content in admin Slide 2', 
											   'Add content in admin Slide 3', 
											   'Add content in admin Slide 4', 
											   'Add content in admin Slide 5', 
											   'Add content in admin Slide 6', 
											                      'blues.jpg', 
																'gallery.jpg', 
																'imprezz.jpg', 
															   'magazeen.jpg', 
															    'vintage.jpg', 
																 'castle.jpg')");

include("header.php");
$pagetitle = "Tricked Out Slider: Install";
        title("$pagetitle");
 OpenTable();
echo "<div align=\"center\"><br /><br /><b>Tricked Out Slider Control database complete, please <span style=\"color:#ff0000;\">delete</span> this file off your server, enjoy! </b></div>";
CloseTable();
   include("footer.php");
    }
    }else {
    $pagetitle = "Tricked Out News Slider: ERROR";
    title("$pagetitle");
    OpenTable();
    echo "<div align=\"center\"><strong>Sorry, ONLY super admins may run this script.</strong></div>\n";
    CloseTable();

    }
?>
