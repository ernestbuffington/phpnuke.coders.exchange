<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) 
exit('Access Denied');
echo '<!-- Copyright Modal START -->'."\n";
echo '<div class="modal fade" id="myCopyRight" tabindex="-1" role="dialog" aria-labelledby="CenterTitle" aria-hidden="true">'."\n";
echo '<div class="modal-dialog modal-dialog-centered" role="document">'."\n";
echo '<div class="modal-content modal-popout-bg">'."\n";
echo '<div class="modal-header">'."\n";
echo '<h1 class="modal-title modal-text1" id="CenterTitle">'."\n";
echo '<i class="bi bi-arrow-right-square-fill"></i> Theme Name: '.THEME.''."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> Markup Language: HTML5 / XHTML5'."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> Copyright: <i class="far fa-copyright"></i> Brandon Maintenance Management'."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> Creation Date: '.THEME_DATE.''."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> Author: '.THEME_AUTHOR.''."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> License: GNU General Public License'."\n";
echo '<br /><i class="bi bi-arrow-right-square-fill"></i> Core Support: PHP-Nuke Titanium v4.0.2 <> 4.x.x'."\n";
echo '</h1>'."\n";
echo '</div>'."\n";
echo '<div class="modal-body">'."\n";
echo '<h1 class="display-1 modal-text2"><i class="bi bi-sliders"></i> Theme Overview</h1> '."\n";
echo '<div class="lead">'."\n";
echo '<div class="modal-text3">'.THEME_OVERVIEW.'</div>'."\n";
echo '</div>'."\n";
echo '<div class="card-header modal-text1"><strong>Features</strong></div>'."\n";
echo '<div class="card-body">'."\n";
echo '<div class="modal-text4">'."\n";
echo '<i class="bi bi-pen"></i> Blog Signature Mod Support'."\n";
echo '<br /><i class="devicon-java-plain-wordmark colored"></i> Javascript'."\n";
echo '<br /><i class="devicon-javascript-plain colored"></i> Advanced Resolution Checking'."\n";
echo '<br /><i class="devicon-php-plain colored"></i> Fluid Resizeable Layout'."\n";
echo '<br /><i class="devicon-html5-plain colored"></i> Video Background Support'."\n";
echo '<br /><i class="devicon-bootstrap-plain-wordmark colored"></i> BootStrap v3.4.1 Support'."\n";
echo '<br /><i class="devicon-devicon-plain-wordmark"></i> Devicon v2.10.1 Support'."\n";
echo '<br /><i class="devicon-css3-plain colored"></i> 2 Scrolling Marquees'."\n";
echo '<br /><i class="devicon-php-plain colored"></i> Network Advertising and Personal Advertising Support'."\n";
echo '<br /><i class="devicon-facebook-plain colored"></i> Titanium SDK v5 (adds facebook Support)'."\n";
echo '<br /><i class="bi bi-display"></i> Current Theme Resoltiuon: '.$_COOKIE["remote_full_resolution"].' '."\n";
echo '</div>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
echo '<div class="modal-footer">'."\n";
echo '<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
echo '</div>'."\n";
echo '<!-- Copyright Modal END -->'."\n";
