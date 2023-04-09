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

global $ThemeSel;

echo "\n<!-- This AutoMimeType is for XHTML 1.0 Transitional -->\n";
echo "<!-- Loading MimeType from themes/".$ThemeSel."/mimetype.php START -->\n";
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'._LANGCODE.'" />'."\n";
echo "<!-- Loading MimeType from themes/".$ThemeSel."/mimetype.php END -->\n\n";
