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

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

$content = "<form onSubmit=\"this.submit.disabled='true'\" action=\"modules.php?name=Search\" method=\"post\">";
$content .= "<br><center><input type=\"text\" name=\"query\" size=\"15\">";
$content .= "<br><input type=\"submit\" value=\""._SEARCH."\"></center></form>";

?>