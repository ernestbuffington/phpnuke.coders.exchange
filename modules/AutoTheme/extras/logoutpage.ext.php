<?php 

/* Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 */

// Extra for all platforms
//
// How to register an extra and the functions that it performs and when to perform them (at operation)
//
// $extra = array ( 'at operation' => 'extra function' );
//
$extra['logoutpage'] = array (

	'name' => 'Logout Page',

	'description' => 'Custom logout page',

	'version' => '1.7',

	'author' => 'Shawn McKenzie',

	'contact' => 'http://spidean.mckenzies.net',

	'themeopen' => 'at_logoutpage',

	'themeadmin' => 'at_admin_logoutpage'
);

// Extra functions
//
function at_logoutpage($vars)

{

	$logoutpage = [];
 $themepath = null;
 $atdir = null;
 $command = null;
 extract($vars);

	$template = $logoutpage['template'];



    session_start();



	if (atIsLoggedIn()) {

		$_SESSION['loggedin'] = 1;

		$_SESSION['logout_entered'] = 0;

		return;

	}

	if ($_SESSION['logout_entered'] == 1) {

		return;

	}

	$_SESSION['loggedin'] = 0;

	$_SESSION['logout_entered'] = 1;

	

	if (!$template) {

        $template = "logoutpage.html";

    }

    if (@file_exists($themepath.$template)) {

		$file = $themepath.$template;

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



function at_admin_logoutpage($vars)

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

