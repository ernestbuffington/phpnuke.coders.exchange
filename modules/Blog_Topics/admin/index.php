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

/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       10/31/2005
	  Titanium Patched                         v4.0.3       01/25/2023
-=[Mod]=-
      Blogs BBCodes                            v1.0.0       10/05/2005
      Custom Text Area                         v1.0.0       11/23/2005
-=[Applied Rules]=-
 * LongArrayToShortArrayRector
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 * MultiDirnameRector
 * ListToArrayDestructRector (https://wiki.php.net/rfc/short_list_syntax https://www.php.net/manual/en/migration71.new-features.php#migration71.new-features.symmetric-array-destructuring)
 * NullToStrictStringFuncCallArgRector
 ************************************************************************/

/********************************************************/
/* NSN Blogs                                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* Contributer(s): Ernest Buffington aka TheGhost       */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network       */
/********************************************************/

if (!defined('ADMIN_FILE')) {
    exit("Access Denied");
}


global $prefix, $db, $admdata;
$module_name = basename(dirname(__FILE__, 2));
if(is_mod_admin($module_name)) {

include_once(NUKE_INCLUDE_DIR.'functions_blog.php');
$pnt_blogs_config = get_blog_configs();

/*********************************************************/
/* Topics Manager Functions                              */
/*********************************************************/

function blogtopicsmanager() 
{
    $topicname = null;
    $topictext = null;
	$result = [];
    global $prefix, $db, $admin_file, $tipath;

    include(NUKE_BASE_DIR."header.php");

    OpenTable();
	echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=blogtopicsmanager\">" . _TOPICS_ADMIN_HEADER_BLOG . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _TOPICS_RETURNMAIN_BLOG . "</a> ]</div>\n";
    echo "<div align=\"center\"><span class=\"title\"><strong>"._TOPICSMANAGER_BLOG . "</strong></span></div>";
    CloseTable();
   
    OpenTable();
    echo "<div align=\"center\"><span class=\"option\"><strong>"._CURRENT_BLOG_TOPICS . "</strong></span><br />"._CLICK2EDIT_BLOG . "</span></div><br />"
        ."<table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"2\">";
    $count = 0;

    $result = $db->sql_query("SELECT topicid, topicname, topicimage, topictext from " . $prefix . "_blogs_topics order by topicname");

    while ($row = $db->sql_fetchrow($result)):
        $topicid = intval($row['topicid']);
        $topicname = $row['topicname'];
        $topicimage = $row['topicimage'];
        $topictext = $row['topictext'];
        echo "<td align=\"center\" width='17%' valign='top'>"
            ."<a href=\"".$admin_file.".php?op=blogtopicedit&amp;topicid=$topicid\"><img src=\"$tipath$topicimage\" alt=\"\" /></a><br />"
            ."<span class=\"content\"><strong>$topictext</td>";
        $count++;

        if($count == 6): 
            echo "</tr><tr>";
            $count = 0;
        endif;
    endwhile;
    echo "</table>";
    CloseTable();

    OpenTable();
    echo "<div align=\"center\"><span class=\"option\"><strong><span class=\"over-ride\">"._ADDATOPIC_BLOG . "</span></strong></span></div><br />";
    echo "<form action=\"".$admin_file.".php\" method=\"post\">";
    echo "<strong>"._TOPICNAME_BLOG . ":</strong><br /><span class=\"tiny\">"._TOPICNAME_BLOG1 . "<br />";
    echo ""._TOPICNAME_BLOG2 . "</span><br />";
    echo "<input type=\"text\" name=\"topicname\" size=\"20\" maxlength=\"20\" value=\"$topicname\"><br /><br />";
    echo "<strong>"._TOPICTEXT_BLOG . ":</strong><br /><span class=\"tiny\">"._TOPICTEXT_BLOG1 . "<br />";
    echo ""._TOPICTEXT_BLOG2 . "</span><br />";
    echo "<input type=\"text\" name=\"topictext\" size=\"40\" maxlength=\"40\" value=\"$topictext\"><br /><br />";
    echo "<strong>"._TOPICIMAGE_BLOG . ":</strong><br />";

    # display the topic image using JQuery 
    echo '<script>';
    echo '$(document).ready(function() {';
    echo '$("#imageSelector").change(function() {';
    echo '    var src = $(this).val();';
    echo '    $("#imagePreview").html(src ? "<img src='.$tipath.'" + src + ">" : "");';
    echo '});';
    echo '});';
    echo '</script>';
    
     
    echo "<select id=\"imageSelector\" name=\"topicimage\" required>";
	$handle=opendir($tipath);
	while(($file = readdir($handle)) !== false): 
            if ((preg_match("~^([_0-9a-zA-Z]+)([.]{1})([_0-9a-zA-Z]{3})$~", $file)) AND $file != "index.html") {
				$tlist .= "$file ";
				
            }
        endwhile;
    closedir($handle);
    $tlist = explode(" ", (string) $tlist);
    sort($tlist);
    
	for ($i=0; $i < (is_countable($tlist) ? count($tlist) : 0); $i++): 

        if (isset($tlist[$i])) {
                echo "<option name=\"topicimage\" value=\"$tlist[$i]\">$tlist[$i]\n";
            }
    endfor;
 
    echo "</select>";
	echo '<div align="center" id="imagePreview"></div>';
    echo '<script src="assets/jquery/jquery.js"></script>';
    
	echo "<input type=\"hidden\" name=\"op\" value=\"blogtopicmake\">";
    
	# 6 pixel spacer
    echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';

	echo "<input type=\"submit\" value=\""._ADDTOPIC_BLOG . "\">";
    echo "</form>";
	
    # 6 pixel spacer
    echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';
	
    CloseTable();
    include(NUKE_BASE_DIR."footer.php");
  
}

function blogtopicedit($topicid) 
{
    
    $topicname = null;
    $topictext = null;
    $query = [];

    global $prefix, $db, $admin_file, $tipath;

    include(NUKE_BASE_DIR."header.php");

    OpenTable();
	echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=blogtopicsmanager\">"._TOPICS_ADMIN_HEADER_BLOG."</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">"._TOPICS_RETURNMAIN_BLOG."</a> ]</div>\n";
    echo "<div align=\"center\"><span class=\"title\"><strong>"._TOPICSMANAGER_BLOG."</strong></span></div>";
    CloseTable();
   
    OpenTable();
    
	# 6 pixel spacer
    echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';
    $query = $db->sql_query("SELECT topicid, topicname, topicimage, topictext from ".$prefix . "_blogs_topics where topicid='$topicid'");
    [$topicid, $topicname, $topicimage, $topictext] = $db->sql_fetchrow($query);
    $topicid = intval($topicid);
    echo "<img src=\"$tipath$topicimage\" align=\"right\" alt=\"$topictext\" />";
    echo "<span class=\"option\"><strong><span class=\"over-ride\">"._EDITTOPIC_BLOG.": $topictext</span></strong></span>";
    echo "<form action=\"".$admin_file.".php\" method=\"post\"><br />";
    echo "<strong>"._TOPICNAME_BLOG.":</strong><br /><span class=\"tiny\">"._TOPICNAME_BLOG1."<br />";
    echo ""._TOPICNAME_BLOG2."</span><br />";
    echo "<input type=\"text\" name=\"topicname\" size=\"20\" maxlength=\"20\" value=\"$topicname\"><br /><br />";
    echo "<strong>"._TOPICTEXT_BLOG.":</strong><br /><span class=\"tiny\">"._TOPICTEXT_BLOG1."<br />";
    echo ""._TOPICTEXT_BLOG2."</span><br />";
    echo "<input type=\"text\" name=\"topictext\" size=\"40\" maxlength=\"40\" value=\"$topictext\"><br /><br />";
    echo "<strong>"._TOPICIMAGE_BLOG.":</strong><br />";

    # display the topic image using JQuery 
    
    echo '<script>';
    echo '$(document).ready(function() {';
    echo '$("#imageSelector").change(function() {';
    echo '    var src = $(this).val();';
    echo '    $("#imagePreview").html(src ? "<img src='.$tipath.'" + src + ">" : "");';
    echo '});';
    echo '});';
    echo '</script>';
   
    echo "<select id=\"imageSelector\" name=\"topicimage\">";
    
	$handle=opendir($tipath);
    
	while ($file = readdir($handle)):
      if ((preg_match("#^([_0-9a-zA-Z]+)([.]{1})([_0-9a-zA-Z]{3})$#", $file)) AND $file != "AllTopics.gif") 
	  {
		$tlist .= "$file ";
      }
    endwhile;
    
	closedir($handle);
    
	$tlist = explode(" ", (string) $tlist);
    
	sort($tlist);
    
	for($i=0; $i < (is_countable($tlist) ? count($tlist) : 0); $i++): 
		  if ($topicimage == $tlist[$i]) 
            $sel = "selected";
		  else 
            $sel = "";
          echo "<option name=\"topicimage\" value=\"$tlist[$i]\" $sel>$tlist[$i]\n";
    endfor;
	
    echo "</select><br /><br />";
	echo '<div align="center" id="imagePreview"></div>';
    echo '<script src="assets/jquery/jquery.js"></script>';

    echo "<strong>"._ADDRELATED_BLOG . ":</strong><br />";
    
	# 6 pixel spacer
	echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';
    
	echo ""._SITENAME . ": <input type=\"text\" name=\"name\" size=\"30\" maxlength=\"30\"><br />";
    
	# 6 pixel spacer
	echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';
	
	echo ""._URL . ": <input type=\"text\" name=\"url\" value=\"http://\" size=\"50\" maxlength=\"200\"><br /><br />";
    echo "<strong>"._ACTIVERELATEDLINKS_BLOG . ":</strong><br />";
    echo "<table width=\"100%\" border=\"0\">";
    $res = $db->sql_query("SELECT rid, name, url from ".$prefix . "_related where tid='$topicid'");
    $num = $db->sql_numrows($res);
    
    if ($num == 0) {
            echo "<tr><td><span class=\"tiny\">" . _NORELATED_BLOG . "</span></td></tr>";
        }

        while($row2 = $db->sql_fetchrow($res)):
            $rid = intval($row2['rid']);
            $name = $row2['name'];
            $url = stripslashes((string) $row2['url']);
        echo "<tr><td align=\"left\"><span class=\"content\"><strong><big>&middot;</big></strong>&nbsp;&nbsp;<a href=\"$url\">$name</a></td>"
            ."<td align=\"center\"><span class=\"content\"><a 
			href=\"$url\">$url</a></td><td align=\"right\"><span class=\"content\">[ <a 
			href=\"".$admin_file.".php?op=blogrelatededit&amp;tid=$topicid&amp;rid=$rid\">"._EDIT."</a> | <a 
			href=\"".$admin_file.".php?op=blogrelateddelete&amp;tid=$topicid&amp;rid=$rid\">"._DELETE."</a> ]</td></tr>";
       endwhile;
    
	echo "</table><br /><br />"
        ."<input type=\"hidden\" name=\"topicid\" value=\"$topicid\">"
        ."<input type=\"hidden\" name=\"op\" value=\"blogtopicchange\">"
        ."<INPUT type=\"submit\" value=\""._SAVECHANGES."\"> <span class=\"content\">[ <a 
		href=\"".$admin_file.".php?op=blogtopicdelete&amp;topicid=$topicid\">"._DELETE."</a> ]</span>"
        ."</form>";

    # 6 pixel spacer
    echo '<div align="center" style="padding-top:6px;">';
    echo '</div>';

    CloseTable();
    include(NUKE_BASE_DIR."footer.php");
}

function blogrelatededit($tid, $rid) {
    global $prefix, $db, $admin_file;
    include(NUKE_BASE_DIR."header.php");
    OpenTable();
	echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=blogtopicsmanager\">" . _TOPICS_ADMIN_HEADER_BLOG . "</a></div>\n";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _TOPICS_RETURNMAIN_BLOG . "</a> ]</div>\n";

    echo "<div align=\"center\"><span class=\"title\"><strong>"._TOPICSMANAGER_BLOG . "</strong></span></div>";
    CloseTable();
   
    $rid = intval($rid);
    $tid = intval($tid);
    $row = $db->sql_fetchrow($db->sql_query("SELECT name, url from ".$prefix . "_related where rid='$rid'"));
    $name = $row['name'];
    $url = $row['url'];
    $row2 = $db->sql_fetchrow($db->sql_query("SELECT topictext, topicimage from ".$prefix . "_blogs_topics where topicid='$tid'"));
    $topictext = $row2['topictext'];
    $topicimage = $row2['topicimage'];
    
	OpenTable();
    echo "<div align=\"center\">"
        ."<img src=\"images/topics/$topicimage\" align=\"right\" alt=\"$topictext\" />"
        ."<span class=\"option\"><strong>"._EDITRELATED_BLOG . "</strong></span><br />"
        ."<strong>"._TOPIC . ":</strong> $topictext</div>"
        ."<form action=\"".$admin_file.".php\" method=\"post\">"
        .""._SITENAME . ": <input type=\"text\" name=\"name\" value=\"$name\" size=\"30\" maxlength=\"30\"><br /><br />"
        .""._URL . ": <input type=\"text\" name=\"url\" value=\"$url\" size=\"60\" maxlength=\"200\"><br /><br />"
        ."<input type=\"hidden\" name=\"op\" value=\"blogrelatedsave\">"
        ."<input type=\"hidden\" name=\"tid\" value=\"$tid\">"
        ."<input type=\"hidden\" name=\"rid\" value=\"$rid\">"
        ."<input type=\"submit\" value=\""._SAVECHANGES . "\"> "._GOBACK . ""
        ."</form>";
    CloseTable();
    include(NUKE_BASE_DIR."footer.php");
}

function blogrelatedsave($tid, $rid, $name, $url) {
    global $prefix, $db, $admin_file;
    $rid = intval($rid);
    $db->sql_query("update ".$prefix . "_related set name='$name', url='$url' where rid='$rid'");
    redirect($admin_file.".php?op=blogtopicedit&topicid=$tid");
}

function blogrelateddelete($tid, $rid) {
    global $prefix, $db, $admin_file;
    $rid = intval($rid);
    $db->sql_query("delete from ".$prefix . "_related where rid='$rid'");
    redirect($admin_file.".php?op=blogtopicedit&topicid=$tid");
}

function blogtopicmake($topicname, $topicimage, $topictext) {
    global $prefix, $db, $admin_file;
    $topicname = Fix_Quotes($topicname);
    $topicimage = Fix_Quotes($topicimage);
    $topictext = Fix_Quotes($topictext);
    $db->sql_query("INSERT INTO ".$prefix . "_blogs_topics VALUES (NULL,'$topicname','$topicimage','$topictext','0')");
    redirect($admin_file.".php?op=blogtopicsmanager#Add");
}

function blogtopicchange($topicid, $topicname, $topicimage, $topictext, $name, $url) {
    global $prefix, $db, $admin_file;
    $topicname = Fix_Quotes($topicname);
    $topicimage = Fix_Quotes($topicimage);
    $topictext = Fix_Quotes($topictext);
    $name = Fix_Quotes($name);
    $url = Fix_Quotes($url);
    $topicid = intval($topicid);
    $db->sql_query("update ".$prefix . "_blogs_topics set topicname='$topicname', topicimage='$topicimage', topictext='$topictext' where topicid='$topicid'");
    if (!$name) {
    } else {
        $db->sql_query("insert into ".$prefix . "_related VALUES (NULL, '$topicid','$name','$url')");
    }
    redirect($admin_file.".php?op=blogtopicedit&topicid=$topicid");
}

function blogtopicdelete($topicid, $ok=0) {
    global $prefix, $db, $pnt_blogs_config, $admin_file;
    $topicid = intval($topicid);
    if ($ok==1) {
    $row = $db->sql_fetchrow($db->sql_query("SELECT sid from " . $prefix . "_blogs where topic='$topicid'"));
        $sid = intval($row['sid']);
        // Copyright (c) 2000-2005 by NukeScripts Network
        if($pnt_blogs_config['hometopic'] == $topicid) { blog_save_config("hometopic", "0"); }
        // Copyright (c) 2000-2005 by NukeScripts Network
        $db->sql_query("delete from " . $prefix . "_blogs where topic='$topicid'");
        $db->sql_query("delete from " . $prefix . "_blogs_topics where topicid='$topicid'");
        $db->sql_query("delete from " . $prefix . "_related where tid='$topicid'");
    $row2 = $db->sql_fetchrow($db->sql_query("SELECT sid from " . $prefix . "_blogs_comments where sid='$sid'"));
        $sid = intval($row2['sid']);
        $db->sql_query("delete from " . $prefix . "_blogs_comments where sid='$sid'");
        redirect($admin_file.".php?op=blogtopicsmanager");
    } else {
        global $topicimage;
        include(NUKE_BASE_DIR."header.php");
        OpenTable();
	    echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=blogtopicsmanager\">" . _TOPICS_ADMIN_HEADER_BLOG . "</a></div>\n";
	    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _TOPICS_RETURNMAIN_BLOG . "</a> ]</div>\n";
        echo "<div align=\"center\"><span class=\"title\"><strong>" . _TOPICSMANAGER_BLOG . "</strong></span></div>";
        CloseTable();
       
        $row3 = $db->sql_fetchrow($db->sql_query("SELECT topicimage, topictext from " . $prefix . "_blogs_topics where topicid='$topicid'"));
        $topicimage = $row3['topicimage'];
        $topictext = $row3['topictext'];
        OpenTable();
        echo "<div align=\"center\"><br /><br />"
            ."<strong>" . _DELETETOPIC_BLOG . " $topictext</strong><br /><br />"
            ."" . _TOPICDELSURE_BLOG . " <i>$topictext</i>?<br />"
            ."" . _TOPICDELSURE_BLOG1 . "<br /><br />"
            ."[ <a href=\"".$admin_file.".php?op=blogtopicsmanager\">" . _NO . "</a> | <a href=\"".$admin_file.".php?op=blogtopicdelete&amp;topicid=$topicid&amp;ok=1\">" . _YES . "</a> ]</div><br /><br />";
        CloseTable();
        include(NUKE_BASE_DIR."footer.php");
    }
}

switch ($op) {

    case "blogtopicsmanager":
    blogtopicsmanager();
    break;

    case "blogtopicedit":
    blogtopicedit($topicid);
    break;

    case "blogtopicmake":
    blogtopicmake($topicname, $topicimage, $topictext);
    break;

    case "blogtopicdelete":
	if(!isset($ok))
	$ok = '';
    blogtopicdelete($topicid, $ok);
    break;

    case "blogtopicchange":
    blogtopicchange($topicid, $topicname, $topicimage, $topictext, $name, $url);
    break;

    case "blogrelatedsave":
    blogrelatedsave($tid, $rid, $name, $url);
    break;

    case "blogrelatededit":
    blogrelatededit($tid, $rid);
    break;

    case "blogrelateddelete":
    blogrelateddelete($tid, $rid);
    break;

}

} 
else 
{
   include(NUKE_BASE_DIR."header.php");
   OpenTable();
   echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=blogtopicsmanager\">" . _TOPICS_ADMIN_HEADER_BLOG . "</a></div>\n";
   echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _TOPICS_RETURNMAIN_BLOG . "</a> ]</div>\n";
   echo "<div align=\"center\"><strong>"._ERROR."</strong><br /><br />You do not have administration permission for module \"$module_name\"</div>";
   CloseTable();
   include(NUKE_BASE_DIR."footer.php");
}

