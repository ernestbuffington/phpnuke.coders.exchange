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

/*=======================================================================
 (c) 2007 - 2018 by Lonestar Modules - https://lonestar-modules.com
 ========================================================================

 LICENSE INFORMATIONS COULD BE FOUND IN COPYRIGHTS.PHP WHICH MUST BE
 DISTRIBUTED WITHIN THIS MODULEPACKAGE OR WITHIN FILES WHICH ARE
 USED FROM WITHIN THIS PACKAGE.
 IT IS "NOT" ALLOWED TO DISTRIBUTE THIS MODULE WITHOUT THE ORIGINAL
 COPYRIGHT-FILE.
 ALL INFORMATIONS ABOVE THIS SECTION ARE "NOT" ALLOWED TO BE REMOVED.
 THEY HAVE TO STAY AS THEY ARE.
 IT IS ALLOWED AND SHOULD BE DONE TO ADD ADDITIONAL INFORMATIONS IN
 THE SECTIONS BELOW IF YOU CHANGE OR MODIFY THIS FILE.

/*****[CHANGES]**********************************************************
-=[Base]=-
-=[Mod]=-
 ************************************************************************/
global $db, $prefix, $id, $site_name, $site_url, $site_image, $site_description, $site_status;

LinkusAdminMain();

		$result = $db->sql_uquery("UPDATE `".$prefix."_link_us` SET `site_name` = '$site_name', 
		                                                              `site_url` = '$site_url', 
																  `site_image` = '$site_image', 
													  `site_description` = '$site_description', 
													            `site_status` = '$site_status' WHERE `site_name` = '$site_name'");
		
		OpenTable();
		
		if($result){
			echo "<center><span color='green' size='3'>".$lang_new[$module_name]['EDIT_SUCCESSFUL']."</span></center>";
		} else {
			echo "<center><font color='red' size='3'>".$lang_new[$module_name]['EDIT_UNSUCCESSFUL']."</font></center>";
		}
		
		CloseTable();

?>