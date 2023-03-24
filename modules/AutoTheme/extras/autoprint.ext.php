<?php

/*Applied rules:
 * AddDefaultValueForUndefinedVariableRector (https://github.com/vimeo/psalm/blob/29b70442b11e3e66113935a2ee22e165a70c74a4/docs/fixing_code.md#possiblyundefinedvariable)
 */

// Extra for all platforms
//
// How to register an extra and the functions that it performs and when to perform them (at operation)
//
// $extra = array ( 'at operation' => 'extra function' );
//
$extra['autoprint'] = array (
	'name' => 'AutoPrint',
	'description' => 'Printer friendly theme',
	'version' => '1.7',
	'author' => 'Shawn McKenzie',
	'contact' => 'http://spidean.mckenzies.net',
	'atadmin' => 'at_admin_autoprint',
);

// Extra functions
//
function at_admin_autoprint($vars)
{
    $theme = null;
    extract($vars);

    if (!$theme) {
        $theme = "AutoPrint";
    }	
    $output = _AT_THEME." <input type=\"text\" name=\"theme\" value=\"$theme\">\n";
	
	return $output;
}

?>
