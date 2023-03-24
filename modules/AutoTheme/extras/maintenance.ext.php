<?php 

/* Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 * EregToPregMatchRector (http://php.net/reference.pcre.pattern.posix https://stackoverflow.com/a/17033826/1348344 https://docstore.mik.ua/orelly/webprog/pcook/ch13_02.htm)
 */

// Extra for all platforms
//
// How to register an extra and the functions that it performs and when to perform them (at operation)
//
// $extra = array ( 'at operation' => 'extra function' );
//
$extra['maintenance'] = array (

	'name' => 'Maintenance page',

	'description' => 'Maintenance mode page',

	'version' => '1.7',

	'author' => 'Shawn McKenzie',

	'contact' => 'http://spidean.mckenzies.net',

	'themeopen' => 'at_maintenance',

	'themeadmin' => 'at_admin_maintenance'
);

// Extra functions
//
function at_maintenance($vars)

{

	$themepath = null;
 $atdir = null;
 $command = null;
 extract($vars);

    

    $maintenance = atAutoGetVar("maintenance");

    $template = $maintenance['template'];

    

    if (atISAdminUser() || preg_match($GLOBALS['admin_file'], $_SERVER['PHP_SELF'])) {

    	return;

    }        

    if (!$template) {

        $template = "maintenance.html";

    }

    if (@file_exists($themepath."extras/$template")) {

		$file = $themepath."extras/$template";

	}

	elseif (@file_exists($atdir."templates/$template")) {

		$file = $atdir."templates/$template";

	}

	else {

		return;

	}

    $HTML = atTemplatePrep($file, 1);

    $output = atCommandReplace($HTML, $command);

    atTemplateDisplay($output);

	atThemeExit();

}	



function at_admin_maintenance($vars)

{

    $themedir = null;
    $template = null;
    extract($vars);



    $themepath = at_gettheme_path($themedir);

    $filelist = at_listfiles($themepath, "htm");

    

    $output = "<table><tr><td>"._AT_TEMPLATE."</td>".at_file_select($themedir, "template", $template, $filelist)."</tr></table>";

    	

	return $output;

}



?>

