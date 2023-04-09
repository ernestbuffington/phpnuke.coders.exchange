<?php
/************************************************************/
/* Remember to change the logo. The default logo has been   */
/* left as a "reference only".                              */
/************************************************************/
             global $locked_width, 
	              $theme_business, 
		             $theme_title, 
			        $theme_author, 
			          $theme_date, 
			          $theme_name, 
 $theme_download_link,$powered_by, 
              $my_welcome_message, 
                   $eighty_six_it, 
	                $digits_color,
		        $digits_txt_color, 
           $fieldset_border_width, 
                  $fieldset_color, 
        $define_theme_xtreme_209e, 
             $avatar_overide_size, 
	                   $ThemeInfo, 
	           $use_xtreme_voting, 
	                 $portaladmin,
			             $opacity,
        $make_xtreme_avatar_small,
                 $poweredby_color,
		   $poweredby_hover_color,
	           $menu_image_height,
			    $side_block_width,
                              $db;
$ThemeSel = get_theme();

# This is to tell the main portal menu to look for the images
# in the theme dir "theme_name/images/menu"
global $use_theme_image_dir_for_portal_menu;
$use_theme_image_dir_for_portal_menu = false;

if ($use_theme_image_dir_for_portal_menu === true):
echo "<!-- Setting Load Menu Images From THEME dir in themes/".$theme_name."/theme.php -->\n";
else:
echo "<!-- Setting Load Menu Images From ROOT dir in themes/".$theme_name."/theme.php -->\n";
endif;

#---------------------------------#
# Adjust T images for Portal Menu #
#---------------------------------#
$menu_image_height = '14';
echo "<!-- Setting Menu image height to ".$menu_image_height." in themes/".$theme_name."/theme.php -->\n";

$make_xtreme_avatar_small = true;
echo "<!-- Setting THEME avatar to SMALL in themes/".$theme_name."/theme.php -->\n";

$avatar_overide_size = '150'; # do not add px to the end!
echo "<!-- Setting THEME Avatar Override size to ".$avatar_overide_size." in themes/".$theme_name."/theme.php -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/header.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/header.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/body.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/body.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/scrollbars.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/scrollbars.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/jquery_floating_admin.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/jquery_floating_admin.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/links.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/links.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/CKeditor.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/CKeditor.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";

addPHPCSSToHead('themes/'.$ThemeSel.'/css/buttons.php','file');     
echo "<!-- Setting Loading themes/".$ThemeSel."/css/buttons.php in themes/".$ThemeSel."/theme.php (PHP FlyKit v1.0 Mod) -->\n";
?>

<?php
/************************************************************/
/* IMPORTANT NOTE FOR THEMES DEVELOPERS!                    */
/*                                                          */
/* When you start coding your theme, if you want to         */
/* distribute it, please double check it to fit the HTML    */
/* 4.01 Transitional Standard. You can use the W3 validator */
/* located at http://validator.w3.org                       */
/* If you don't know where to start with your theme, just   */
/* start modifying this theme, it's validate and is cool ;) */
/************************************************************/
?>
