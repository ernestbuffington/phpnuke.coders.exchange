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

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Settings</title>
    </head>
    <body>
        <?php
            ob_start();
            phpinfo(INFO_MODULES);
            echo ob_get_clean();
        ?>
    </body>
</html>