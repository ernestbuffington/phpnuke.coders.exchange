<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* https://phpnuke.coders.exchange                                      */
/*                                                                      */
/* Based on Atomic Journal                                              */
/* Copyright (c) by Trevor Scott                                        */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/************************************************************************/
/* Journal 2.0 Enhanced and Debugged 2004                               */
/* by sixonetonoffun -- http://www.netflake.com --                      */
/* Images Created by GanjaUK -- http://www.GanjaUK.com                  */
/************************************************************************/

if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}

require_once("mainfile.php");

$module_name = basename(dirname(__FILE__));

get_lang($module_name);

if (!isset($jid) OR !is_numeric($jid)) { die("No journal specified."); }

$pagetitle = "- "._USERSJOURNAL."";

include("header.php");

include("modules/$module_name/functions.php");

include("modules/$module_name/kses.php");

if (is_user()) {

cookiedecode($user);

$username = $cookie[1];

}

$username = filter($username, "nohtml");
$sitename = filter($sitename, "nohtml");
$debug = filter($debug, "nohtml");

if ($debug == "true") :
    echo ("UserName:$username<br>SiteName: $sitename");
endif;

startjournal($sitename,$user);

$jid = intval($jid);

if (empty($jid)) :
    
	opentable();
    echo ("<div align=\"center\">"._ANERROR."</div>");
    closetable();
    
	journalfoot();
endif;

    $sql = "SELECT j.jid, 
	               j.aid, 
				 j.title, 
				 j.pdate, 
				 j.ptime, 
				 j.mdate, 
				 j.mtime, 
			  j.bodytext, 
			    j.status, 
				  j.mood, 
			   u.user_id, 
			  u.username FROM ".$user_prefix."_journal j, ".$user_prefix."_users u WHERE u.username=j.aid and j.jid = '$jid'";

$result = $db->sql_query($sql);

while ($row = $db->sql_fetchrow($result)) {

        $owner = $row['aid'];
        $owner = filter($owner, "nohtml");
        $status = $row['status'];
        $status = filter($status, "nohtml");
        $jaid = filter($row['aid'], "nohtml");

        if (($status == 'no') && ($jaid != $username)):

	    OpenTable();
	    echo "<center><br>"._ISPRIVATE."<br></center>";
	    CloseTable();
	
	    journalfoot();
        endif;

        OpenTable();
        $row['title'] = filter($row['title'], "nohtml");
        $jmood = filter($row['mood'], "nohtml");

        if (!empty($jmood)):
            printf ("<br><div align=center><img src=\"$jsmiles/%s\" alt=\"%s\" title=\"%s\"></div>", $jmood, $jmood, $jmood);
        endif;

        $title = filter($row['title'], "nohtml");

        printf ("<div class=title align=center>%s</div>", $title);

        //The Following line had an incorrect uname entry.//
        $username = filter($row['username'], "nohtml");
        $jid = intval($row['jid']);
        $pdate = filter($row['pdate'], "nohtml");
        $ptime = filter($row['ptime'], "nohtml");
        printf ("<div align=center>"._BY.": <a href=\"modules.php?name=Your_Account&op=userinfo&username=$jaid\">%s</a></div>", $jaid, $jaid);
        printf ("<div align=center class=tiny>"._POSTEDON.": %s @ %s</div>", $pdate, $ptime);
        CloseTable();

        OpenTable();
        $jbodytext = $row['bodytext'];
        $jbodytext = kses(ADVT_stripslashes($jbodytext), $allowed);
        printf ("%s", $jbodytext);
        CloseTable();

        OpenTable();
		printf ("<div class=tiny align=center>"._LASTUPDATED." %s @ %s</div><br>", $row['mdate'], $row['mtime']);
        printf ("<div class=tiny align=center>[ <a href=\"modules.php?name=Journal&file=friend&jid=%s\">"._SENDJFRIEND."</a> ]</div>", $row['jid']);
        CloseTable();
        
		OpenTable();
        print ("<table width=\"100%\" align=\"center\"><tr>");

        if (is_user()) {
        cookiedecode($user);
        $username = $cookie[1];
        $username = filter($username, "nohtml");
        }

        if (is_user() && $owner == $username):

            echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=modify&jid=$jid\"><img 
			src=\"modules/Journal/images/edit.gif\" border=0 alt=\""._EDIT."\" title=\""._EDIT."\"><br>"._EDIT."</a></td>";

            echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=delete&jid=$jid&forwhat=$jid\"><img 
			src=\"modules/Journal/images/trash.gif\" border=0 alt=\""._DELETE."\" title=\""._DELETE."\"><br>"._DELETE."</a></td>";

        //   endif;

        elseif (is_admin()):

        echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=modify&jid=$jid\"><img 
		src=\"modules/Journal/images/edit.gif\" border=0 alt=\""._EDIT."\" title=\""._EDIT."\"><br>"._EDIT."</a></td>";

        echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=delete&jid=$jid&forwhat=$jid\"><img 
		src=\"modules/Journal/images/trash.gif\" border=0 alt=\""._DELETE."\" title=\""._DELETE."\"><br>"._DELETE."</a></td>";

        endif;

        if (!empty($username)):

            echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=comment&onwhat=$jid\"><img 
			src=\"modules/Journal/images/write.gif\" border=0 alt=\""._WRITECOMMENT."\" title=\""._WRITECOMMENT."\"><br>"._WRITECOMMENT."</a></td>";

        endif;

        echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Journal&file=search&bywhat=aid&forwhat=".$row['aid']."\"><img 
		src=\"modules/Journal/images/binocs.gif\" border=0 alt=\""._VIEWMORE."\" title=\""._VIEWMORE."\"><br>"._VIEWMORE."</a></td>";

        //The following line had an incorrect uname entry.//

        echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Your_Account&op=userinfo&username=$username\"><img 
		src=\"modules/Journal/images/nuke.gif\" border=0 alt=\""._USERPROFILE."\" title=\""._USERPROFILE."\"><br>"._USERPROFILE."</a></td>";

        if ($username != "" AND is_active("Private_Messages")):

            //the following line had a uname entry and a reference to reply.php which doesn't exist.//

        echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Private_Messages&mode=post&u=".$row['user_id']."\"><img 
		src=\"modules/Journal/images/chat.gif\" border=0 alt=\""._SENDMESSAGE."\" title=\""._SENDMESSAGE."\"><br>"._SENDMESSAGE."</a></td>";

        endif;

        if (empty($username)):

            echo "<td align=\"center\" width=\"15%\"><a href=\"modules.php?name=Your_Account\"><img 
			src=\"modules/Journal/images/folder.gif\" border=0 alt=\"Create an account\" title=\"Create an account\"><br>"._CREATEACCOUNT."</a></td>";

        endif;

        print ("</tr></table>");
        closeTable();

    }
    $commentheader = "no";

    $sql = "SELECT j.cid, j.rid, j.aid, j.comment, j.pdate, j.ptime, u.user_id FROM ".$user_prefix."_journal_comments j, ".$user_prefix."_users u WHERE j.aid=u.username and j.rid = '$jid'";
    $result = $db->sql_query($sql);

    while ($row = $db->sql_fetchrow($result)) {

    	$row['cid'] = intval($row['cid']);
        $row['rid'] = filter($row['rid'], "nohtml");
        $row['aid'] = filter($row['aid'], "nohtml");
        $row['comment'] = filter($row['comment'], "nohtml");
        $pdate = filter($row['pdate'], "nohtml");
        $ptime = filter($row['ptime'], "nohtml");
        $row['user_id'] = filter($row['user_id'], "nohtml");

        if ($row == 0):
            $commentheader = "yes";
        else:

            if ($commentheader == "no"):

        if ($username == "" OR $username == $anonymous) {
            $ann_co = "<br><div align=center class=tiny>"._REGUSERSCOMM."</div>";
        } else {
            $ann_co = "";
        }

        title("Posted Comments$ann_co");

        $commentheader = "yes";

        elseif ($commentheader = "yes"):

        // Do not print comment header.

        endif;

        endif;

        openTable();
        printf (""._COMMENTBY.": <a href=\"modules.php?name=Your_Account&op=userinfo&username=$username\">%s</a> <div class=tiny>("._POSTEDON." $pdate @ $ptime)</div><br>", $row['aid'], $row['aid'], $pdate, $ptime);
        $row['comment'] = filter($row['comment'], "nohtml");
        printf ("<strong>Comment:</strong> %s", $row['comment']);

        if (is_user() && ($owner == $username) OR is_admin()):
            printf ("<br><div align=center>[ <a href=\"modules.php?name=Journal&file=commentkill&onwhat=%s&ref=$jid\">"._DELCOMMENT."</a> ]</div>", $row['cid'], $jid);
        endif;
        closeTable();
    }

    journalfoot();

?>