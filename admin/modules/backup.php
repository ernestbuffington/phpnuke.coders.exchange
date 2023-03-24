<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2023 by Francisco Burzi                                */
/* http://www.phpnuke.coders.exchange                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $op, $prefix, $db, $admin_file;

$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {
	
	/* backup the full database */
	function backup_tables($servername,$username,$password,$db,$tables = '*')
	{

        global $dbhost,$dbuname,$dbpass,$dbname;

        $servername = $dbhost;
        $username = $dbuname;
        $password = $dbpass;
        $db = $dbname;

        $conn = new mysqli($servername, $username, $password, $db);
        
		if($conn->connect_error){
	      echo "Connect Failed!<br>" . $conn->error;
        }
        //set your timezone , refer to php manual
        date_default_timezone_set("Asia/Kuala_Lumpur");		
		
		$link = null;
        $link = mysqli_connect($servername,$username,$password);
		mysqli_select_db($link,$db);
		
		//get all of the tables and fuck your mother
		if($tables == '*')
		{
			$tables = array();
			$result = mysqli_query($link, 'SHOW TABLES');
			while($row = mysqli_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		
		//cycle through
		
        $return = '';
		
		ob_clean(); // clean the output buffer so that you wont have HTML garbage inside your database backup file!
		
		foreach($tables as $table)
		{
			$result = mysqli_query($link, 'SELECT * FROM '.$table);
			$num_fields = mysqli_field_count($link);
			
			// $return.= 'DROP TABLE '.$table.';';
			$return.= 'DROP TABLE IF EXISTS '.$table.';'; //avoid error while uploading backedup database into blank database
			$row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			 for ($i = 0; $i < $num_fields; $i++)  
			 {
				while($row = mysqli_fetch_row($result))
				{
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j < $num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j] ?? '');
						$row[$j] = preg_replace("/\n/","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j < ($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			 }
			$return.="\n\n\n";
		}
		//save file to the browser (download)
		header('Content-Type: text/csv; charset=utf-8'); 
		//declare the file name
		header("Content-Disposition: attachment; filename=\"".'php-nuke-db-backup-'.date('Y-m-d (h.i.s a)').".sql\"");
		header("Content-Length: " . strlen($return));
		header("Content-Transfer-Encoding: binary");
		echo $return;
	}
	backup_tables($servername, $username, $password, $db);

} else {
	echo "Fail:".mysqli_error($link);
}
