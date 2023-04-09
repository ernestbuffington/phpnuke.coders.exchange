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

/**
 * jQuery lightbox and modal window plugin.
 *
 * @package Color picker
 * @author  Stefan Petre
 * @license MIT and GPL-3.0
 * @link    https://www.eyecon.ro/
 */

if(!defined('NUKE_FILE')) 
	die('Access forbbiden');
  
addCSSToHead('includes/css/jquery.colorpicker.css','file'); 
addJSToBody(NUKE_JQUERY_SCRIPTS_DIR.'jquery.colorpicker.js','file');

?>