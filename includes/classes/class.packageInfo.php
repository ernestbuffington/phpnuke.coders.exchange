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

namespace titanium\fileLogger {
    
    /**
     * Package info
     * 
     * About this package.
     */
    class PackageInfo {
        
        protected static $packageInfo = array(
            'version' => 4.2,
            
            'authors' => array(
                'gehaxelt' => array(
                    'github' => 'https://github.com/ernestbuffington/PHP-Nuke.Titanium.Dev.4',
                    'email' => 'ernest.buffington@gmail.com',
                    'site' => 'https://www.php-nuke-titanium.86it.us'
                ),
                
                'pedzed' => array(
                    'github' => 'https://github.com/ernestbuffington/PHP-Nuke.Titanium.Dev.4'
                )
            )
        );
        
        public static function getInfo(){
            return self::$packageInfo;
        }
        
    }
    
}
