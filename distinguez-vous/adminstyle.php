<?php

function my_custom_login_logo() {
 echo '<style type="text/css">
 h1 a {background-image:url(' . plugins_url( 'distinguez-vous/images/logood.png', dirname(__FILE__) ) . ' )!important;
 -webkit-background-size:inherit!important;
 background-size:inherit!important;
 width:inherit!important;}
 body.login::after {
  content: "";
  background-image:url(' . plugins_url( 'distinguez-vous/images/agence-distinguez-vous-025.jpg', dirname(__FILE__) ) . ' )!important;
backgound-position:center center;
background-size:cover;
  opacity: 0.2;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;
}
 </style>';
}
add_action('login_head', 'my_custom_login_logo');

function my_login_logo_url() {
 return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
 return 'Distinguez-vous.com';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function wpb_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image:url(' . plugins_url( 'distinguez-vous/images/icontop.png', dirname(__FILE__) ) . ' )!important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  body{background:#ecfce4;}
  @font-face {
  font-family: "Montserrat";
  src: url(https://fonts.googleapis.com/css?family=Montserrat");
  font-display: swap;
}
* {font-family:Montserrat,sans-serif}
.coli .dashicons-before::before {
    color: #7dba75;
    font-size: 25px;
    margin-right: 10px;
}
#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {background-color: #1c1833;}
#adminmenu li a.wp-has-current-submenu .update-plugins, #adminmenu li.current a .awaiting-mod {background-color: #1c1833;}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {background: #7dba75;}
#wpadminbar{background-color: #1c1833;}
#adminmenu a:hover,#adminmenu li.menu-top:hover,#adminmenu li.opensub > a.menu-top,#adminmenu li > a.menu-top:focus {color: #7dba75 !important; background-color: #37334E;}
#adminmenu li.menu-top:hover div.wp-menu-image:before,#adminmenu li.opensub > a.menu-top div.wp-menu-image:before {color: #7dba75 !important;}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus + .wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {background-color: #37334E;}
a {color: #3ec833;}
a:active, a:hover{color:green}
.wp-core-ui .button-primary {background: #03b875; border-color: #7dba75; box-shadow: 0 1px 0 #7dba75; color: #fff; text-decoration: none; text-shadow: none;}
wp-core-ui .button.button-primary.button-hero {box-shadow: 0 2px 0 #7dba75;}
#welcome-panel{display:block !important;}
#welcome-panel .welcome-panel-close{display:none;}
.update-nag, .updated, .error, .is-dismissible { display: none; }
#adminmenu .awaiting-mod, #adminmenu .update-plugins {background-color: #7dba75}
#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover > a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover, #wpadminbar li #adminbarsearch.adminbar-focused::before, #wpadminbar li .ab-item:focus .ab-icon::before, #wpadminbar li .ab-item:focus::before, #wpadminbar li a:focus .ab-icon::before, #wpadminbar li.hover .ab-icon::before, #wpadminbar li.hover .ab-item::before, #wpadminbar li:hover #adminbarsearch::before, #wpadminbar li:hover .ab-icon::before, #wpadminbar li:hover .ab-item::before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover{color:#7dba75}
.crt-widget.crt-widget-branded .crt-logo {display: none !important;}
.rowi { display: flex; flex-wrap: wrap;}
.coli { flex: 1 0 18%; margin: 20px 5px; height: 50px; color: white; display: flex; align-items: center; justify-content: center; box-shadow: 0px 0px 8px #CCC;}
.coli a { display: block; width: 100%; height: 100%; text-align: center; color:#7dba75; padding-top: 10%; text-decoration:none;}
.coli:hover { background: #1c1833}
.welcome-panel-content {
    margin-left: 13px;
    max-width: 100%;
    margin-right: 13px;
}
.welcome-panell-content { padding: 20px; border: 1px solid #d6e2ed;}
.welcome-panel h2 { color: #261f33; font-size: 22px;}
.welcome-panel::before{display:none}
.welcome-panel{background:#fff;}
</style>';
}

function remove_footer_admin () {
  echo 'Depuis 2004, <a target="_blank" href="http://www.distinguez-vous.com">Distinguez-vous.com</a> prend soin de ses clients et ça se voit!';
}
add_filter('admin_footer_text', 'remove_footer_admin');

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Actualités de Distinguez-vous.com', 'custom_dashboard_help');
}



function custom_dashboard_help() {
echo '<!-- Place <div> tag where you want the feed to appear -->
<div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<script type="text/javascript">
/* curator-feed */
(function(){
var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
i.src = "https://cdn.curator.io/published/429a2656-492b-41bd-a1ee-995771567bec.js";
e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
})();
</script>';
}


// disable default dashboard widgets
function disable_default_dashboard_widgets() {

	remove_meta_box('dashboard_activity', 'dashboard', 'core');
  remove_meta_box('owp_dashboard_news', 'dashboard', 'normal');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
  remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	 remove_meta_box('dashboard_site_health', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

remove_action('welcome_panel', 'wp_welcome_panel');

add_action('welcome_panel', 'kodex_welcome_panel');
function kodex_welcome_panel(){
	?><div class="welcome-panell-content">
    <?php
    echo '<img style="float:right" src="' . plugins_url( 'images/logood.png', __FILE__ ) . '" /> ';
    ?>

		<h2>Toute l'équipe Distinguez-vous.com vous souhaite la bienvenue sur votre site Internet!</h2>
		<p class="about-description">Un nouveau projet, une question? N'hésitez pas à nous contacter à l'adresse : <a href="mailto:contact@distinguez-vous.com">contact@distinguez-vous.com</a></p>
		<br>
    <div class="rowi">
  <div class="coli"><a class="dashicons-before dashicons-admin-page" href="/wp-admin/edit.php?post_type=page">GÉRER VOS PAGES</a></p></div>
  <div class="coli"><a class="dashicons-before dashicons-admin-post" href="/wp-admin/edit.php">GÉRER VOS ARTICLES</a></div>
  <div class="coli"><a  class="dashicons-before dashicons-admin-media" href="/wp-admin/upload.php">GÉRER VOS MÉDIAS</a></div>
  <div class="coli"><?php
  echo '<a class="dashicons-before dashicons-welcome-learn-more" href="' . plugins_url( 'images/Formation_WP.pdf', __FILE__ ) . '" > '; ?>PDF DE FORMATION </a></div>
  <div class="coli"><a class="dashicons-before dashicons-admin-generic" href="mailto:contact@distinguez-vous.com">CONTACTEZ LE SUPPORT</a></div>
</div>
	</div><?php
}


?>
