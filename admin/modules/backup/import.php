<!--
==============================================================================
=  Author: CHUA YING WEI                                                     =
=          yingwei1025@gmail.com                                             =
=          Web System Backup Restore Function                                =
==============================================================================
-->

<?php
require_once('config.php');

if(isset($_POST["Import"])){

$filename=$_FILES["file"]["tmp_name"];

//Uncomment this below line for larger database to allow script to execute long time
// set_time_limit(0);


$templine = '';
// Read in entire file
$fp = fopen($filename, 'r');
// Loop through each line
while (($line = fgets($fp)) !== false) {
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
		continue;
	// Add this line to the current segment
	$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';') {
		// Perform the query
		if(!mysqli_query($conn, $templine)){
			print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
		}
		// Reset temp variable to empty
		$templine = '';
	}
}
mysqli_close($conn);
fclose($fp);

echo "<script>alert('Database imported successfully!')</script>";
echo "<script>window.location='home.php'</script>";
}