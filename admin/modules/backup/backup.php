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

global $prefix, $db, $admin_file;

$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {
	
    require_once('admin/modules/backup/config.php');
	/* backup the db OR just a table */
	function backup_tables($servername,$username,$password,$db,$tables = '*')
	{
		
		$link = mysqli_connect($servername,$username,$password);
		mysqli_select_db($link,$db);
		
		//get all of the tables in database
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
		
		//repeat through
		
        $return = '';
		
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


		//catch current date time for naming purpose
		$now=date('Y-m-d (h.i.s a)');
		//set the path to store all backup file,remember create this folder first to avoid error
        $path='db/backups';
		
		if(!is_dir($path) ) { mkdir($path, 0777, true); }
		
		$handle = fopen($path.'/phpnuke-db-backup-'.$now.'.sql','w+');
        
		if (fwrite($handle, (string) $return) === FALSE) {
           echo "<font color='red'>Cannot write to file, Please check the path of the backup folder first</font>";
        exit;
        }

	}
	backup_tables($servername, $username, $password, $db);
    /* echo "<script> alert('PHP-Nuke DataBase Backup to Server Complete!')</script>"; */
    echo "<script> window.location='".$admin_file.".php?op=backupdone'</script>";

} else {
	echo "Access Denied";
}
