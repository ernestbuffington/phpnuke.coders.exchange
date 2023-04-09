<?php
/************************************************************/
/* Remember to change the logo. The default logo has been   */
/* left as a "reference only".                              */
/************************************************************/
global $ThemeSel;
$ThemeSel = get_theme();
?>
<!-- banner org_green -->
<!-- Attach our CSS -->
<link rel="stylesheet" href="themes/<?php echo $ThemeSel?>/orbit-1.2.3.css">
<!-- Attach necessary JS -->
<script src="themes/<?php echo $ThemeSel?>/jquery-1.5.1.min.js"></script>
<script src="themes/<?php echo $ThemeSel?>/jquery.orbit-1.2.3.min.js"></script>	
<!--[if IE]>
<style type="text/css">
.timer { display: none !important; }
div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
</style>
<![endif]-->
<!-- Run the plugin -->
<script>
  $(window).load(function() {
  $('#featured').orbit();
  });
</script>
<!-- end banner org_green -->
<!-- End Quantcast tag -->
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
