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
$extra['autolang'] = array (
	'name' => 'RTL Languages',
	'description' => 'Sets page style for RTL languages',
	'version' => '1.7',
	'author' => 'Shawn McKenzie',
	'contact' => 'http://spidean.mckenzies.net',
	'themeopen' => 'at_autolang',
	'atadmin' => 'at_admin_autolang'
);

// Extra functions
//
function at_autolang($config)
{
	$autolang = [];
 extract($config);
	
	$lang = atGetLang();
	
	if (!is_array($autolang['rtl'])) {
    	$autolang['rtl'] = array("ara", "far", "heb");
    } 
    foreach ($autolang['rtl'] as $rtllang) {
    	if ($lang == $rtllang) {
    		echo "<style type=\"text/css\">body { direction: rtl; text-align: right }</style>\n";
    		break;
    	}
    }
}

function at_admin_autolang($autolang)
{	
    $output = "<b>"._AT_LANGRTL."</b><br />\n";

    asort($autolang['rtl']);
    foreach ($autolang['rtl'] as $lang){
        $output .= "<input type=\"text\" name=\"rtl[]\" value=\"$lang\" maxlength=\"3\"><br />\n";
    }
    $output .= "<input type=\"text\" name=\"rtl[]\" value=\"\" maxlength=\"3\">\n";
    
	return $output;
}

?>
