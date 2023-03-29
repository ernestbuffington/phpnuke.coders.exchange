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

  /**
    * Ruffle Flash player support written in Rust
    * Used to display flash file that reside in Legacy themes.
    * Used to play Flash games. (SWF) Shockwave fileplayer.
    * No browsr extension needed, we fix that for you on the fly!
    *
    * @since 31 December 2020 
    *
    * @author(s) Community Based
    * @version Nightly Build Updates
    * @license GPL and MIT
    */
	echo "\n<!-- Loadiing includes/ruffle-core/ruffle.js from header.php -->\n";
	echo '<script src="includes/ruffle-core/ruffle.js"></script>'."\n";
	
	echo '
	<script>
    window.RufflePlayer = window.RufflePlayer || {};
    window.RufflePlayer.config = {
    "publicPath": undefined,
    "polyfills": true,
    "autoplay": "on",
    "unmuteOverlay": "hidden",
    "backgroundColor": null,
    "wmode": "window",
    "letterbox": "fullscreen",
    "warnOnUnsupportedContent": true,
    "contextMenu": true,
    "showSwfDownload": false,
    "upgradeToHttps": window.location.protocol === "https:",
    "maxExecutionDuration": {"secs": 15, "nanos": 0},
    "logLevel": "error",
    "base": null,
    "menu": true,
    "salign": "",
    "scale": "showAll",
    "forceScale": false,
    "quality": "high",
    "splashScreen": false,
    };    
    </script>'; 
