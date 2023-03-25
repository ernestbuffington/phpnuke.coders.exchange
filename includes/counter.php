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

if (stristr(htmlentities($_SERVER['PHP_SELF']), "counter.php")) {

	Header("Location: index.php");
	die();
}

global $prefix, $db;

/* Get the Browser data */
if ((preg_match('#Nav#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Gold#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#X11#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Mozilla#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Netscape#m', $_SERVER["HTTP_USER_AGENT"])) AND (!preg_match('#MSIE#m', $_SERVER["HTTP_USER_AGENT"])) AND (!preg_match('#Konqueror#m', $_SERVER["HTTP_USER_AGENT"])) AND (!preg_match('#Yahoo#m', $_SERVER["HTTP_USER_AGENT"])) AND (!preg_match('#Firefox#m', $_SERVER["HTTP_USER_AGENT"]))) $browser = "Netscape";

elseif(preg_match('#Firefox#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "FireFox";

elseif(preg_match('#MSIE#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "MSIE";

elseif(preg_match('#Lynx#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "Lynx";

elseif(preg_match('#Opera#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "Opera";

elseif(preg_match('#WebTV#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "WebTV";

elseif(preg_match('#Konqueror#m', $_SERVER["HTTP_USER_AGENT"])) $browser = "Konqueror";

elseif((preg_match('#bot#mi', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Google#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Slurp#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Scooter#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Spider#mi', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#Infoseek#mi', $_SERVER["HTTP_USER_AGENT"]))) $browser = "Bot";

else $browser = "Other";

/* Get the Operating System data */
if(preg_match('#Win#m', $_SERVER["HTTP_USER_AGENT"])) $os = "Windows";

elseif((preg_match('#Mac#m', $_SERVER["HTTP_USER_AGENT"])) || (preg_match('#PPC#m', $_SERVER["HTTP_USER_AGENT"]))) $os = "Mac";

elseif(preg_match('#Linux#m', $_SERVER["HTTP_USER_AGENT"])) $os = "Linux";

elseif(preg_match('#FreeBSD#m', $_SERVER["HTTP_USER_AGENT"])) $os = "FreeBSD";

elseif(preg_match('#SunOS#m', $_SERVER["HTTP_USER_AGENT"])) $os = "SunOS";

elseif(preg_match('#IRIX#m', $_SERVER["HTTP_USER_AGENT"])) $os = "IRIX";

elseif(preg_match('#BeOS#m', $_SERVER["HTTP_USER_AGENT"])) $os = "BeOS";

elseif(preg_match('#OS\/2#m', $_SERVER["HTTP_USER_AGENT"])) $os = "OS/2";

elseif(preg_match('#AIX#m', $_SERVER["HTTP_USER_AGENT"])) $os = "AIX";

else $os = "Other";

/* Save on the databases the obtained values */
$db->sql_query("UPDATE ".$prefix."_counter SET count=count+1 WHERE (type='total' AND var='hits') OR (var='$browser' AND type='browser') OR (var='$os' AND type='os')");
update_points(13);
/* Start Detailed Statistics */

$dot = date("d-m-Y-H");

$now = explode ("-",$dot);

$nowHour = $now[3];

$nowYear = $now[2];

$nowMonth = $now[1];

$nowDate = $now[0];

$sql = "SELECT year FROM ".$prefix."_stats_year WHERE year='$nowYear'";
$resultyear = $db->sql_query($sql);
$jml = $db->sql_numrows($resultyear);

if ($jml <= 0) {

	$sql = "INSERT INTO ".$prefix."_stats_year VALUES ('$nowYear','0')";

	$db->sql_query($sql);

	for ($i=1;$i<=12;$i++) {

		$db->sql_query("INSERT INTO ".$prefix."_stats_month VALUES ('$nowYear','$i','0')");

		if ($i == 1) $TotalDay = 31;

		if ($i == 2) {

			if (date("L") == true) {

				$TotalDay = 29;

			} else {

				$TotalDay = 28;

			}

		}

		if ($i == 3) $TotalDay = 31;

		if ($i == 4) $TotalDay = 30;

		if ($i == 5) $TotalDay = 31;

		if ($i == 6) $TotalDay = 30;

		if ($i == 7) $TotalDay = 31;

		if ($i == 8) $TotalDay = 31;

		if ($i == 9) $TotalDay = 30;

		if ($i == 10) $TotalDay = 31;

		if ($i == 11) $TotalDay = 30;

		if ($i == 12) $TotalDay = 31;

		for ($k=1;$k<=$TotalDay;$k++) {

			$db->sql_query("INSERT INTO ".$prefix."_stats_date VALUES ('$nowYear','$i','$k','0')");
		}
	}
}

$sql = "SELECT hour FROM ".$prefix."_stats_hour WHERE (year='$nowYear') AND (month='$nowMonth') AND (date='$nowDate')";
$result = $db->sql_query($sql);
$numrows = $db->sql_numrows($result);

if ($numrows <= 0) {

	for ($z = 0;$z<=23;$z++) {

		$db->sql_query("INSERT INTO ".$prefix."_stats_hour VALUES ('$nowYear','$nowMonth','$nowDate','$z','0')");
	}
}

$db->sql_query("UPDATE ".$prefix."_stats_year SET hits=hits+1 WHERE year='$nowYear'");

$db->sql_query("UPDATE ".$prefix."_stats_month SET hits=hits+1 WHERE (year='$nowYear') AND (month='$nowMonth')");

$db->sql_query("UPDATE ".$prefix."_stats_date SET hits=hits+1 WHERE (year='$nowYear') AND (month='$nowMonth') AND (date='$nowDate')");

$db->sql_query("UPDATE ".$prefix."_stats_hour SET hits=hits+1 WHERE (year='$nowYear') AND (month='$nowMonth') AND (date='$nowDate') AND (hour='$nowHour')");

?>