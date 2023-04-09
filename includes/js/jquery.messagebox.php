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
 * A jQuery Plugin to replace Javascript's window.alert(), window.confirm() and window.prompt() functions
 *
 * @package gasparesganga-jquery-message-box
 * @author  Gaspare Sganga <contact@gasparesganga.com> (https://gasparesganga.com)
 * @version 3.0.0
 * @license MIT
 * @link    https://gasparesganga.com/labs/jquery-message-box/
 */

if(!defined('NUKE_FILE')) 
	die('Access forbbiden');
  
addCSSToHead(NUKE_CSS_DIR.'messagebox.css?v=2.2.1','file'); 
addJSToBody(NUKE_JQUERY_SCRIPTS_DIR.'jquery.messagebox.min.js?v=2.2.1','file');

?>