<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* https://phpnuke.coders.exchange                                      */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

switch($op) {
    case "moderation":
    case "moderation_news":
    case "moderation_news_view":
    case "moderation_surveys":
    case "moderation_surveys_view":
    case "moderation_reviews":
    case "moderation_reviews_view":
    case "moderation_users_list":
	case "moderation_approval":
	case "moderation_reject":
    include("admin/modules/moderation.php");
    break;

}

?>