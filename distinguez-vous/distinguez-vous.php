<?php
/*
Plugin Name: Distinguez-vous.com
Description: Style de l'admin et modules conseillés
Version: 0.5
* Author: Distinguez-vous.com
* Author URI: http://www.distinguez-vous.com
* Copyright: (c) 2018 Distinguez-vous.com
* License: GNU General Public License v2.0
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ibx-dwe
*/
/* Start Adding Functions Below this Line */
/* Modifie le logo et le lien de la page de connexion WordPress
/* ------------------------------------------------------------------------- */

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


	/* DEBUT SUGGESTION DE PLUGINS  */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'distinguezvouscom_register_required_plugins' );

function distinguezvouscom_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Admin Menu Editor',
			'slug'      => 'admin-menu-editor',
			'required'  => false,
		),

		array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
		
		array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => false,
    ),
		
		    array(
      'name'      => 'Maintenance',
      'slug'      => 'maintenance',
      'required'  => false,
    ),


	);


	$config = array(
		'id'           => 'distinguez-vouscom',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
    'strings'      => array(),
	);

	tgmpa( $plugins, $config );
}

/*
DERNIERS POSTS MODIFIÉS
	 */


add_action( 'wp_dashboard_setup', 'admin_dashboard_last_edits_register' );

function admin_dashboard_last_edits_register() {
  wp_add_dashboard_widget(
  __FUNCTION__, __( 'Modifications récentes', 'admin-dashboard-last-edits' ), 'admin_dashboard_last_edits_dashboard_widget');
}

function admin_dashboard_last_edits_dashboard_widget() {
  $posts = get_posts(
  array (
    'numberposts' => 10,
    'post_type' => array ( 'post', 'page' ),
    'orderby' => 'modified')
    );

/**
 * @todo Icons for post formats
 * @todo Add option to configure how many posts should be shown
 * @todo Add option to show only posts or pages
 */

  if ( $posts ) {
    $date_format = get_option( 'date_format' );
    echo '<ul>';
    foreach ( $posts as $post ) {
      printf( __( '<li><a href="%1$s" title="Edit %3$s"><span class="dashicons dashicons-edit"></span></a> <a href="%2$s" title="View %3$s on website">%3$s</a> <small>%4$s</small>', 'admin-dashboard-last-edits' ), esc_html( get_edit_post_link( $post->ID ) ), esc_html( get_permalink( $post->ID ) ), esc_html( $post->post_title ), esc_html( get_post_modified_time( $date_format, false, $post->ID, true )) );
    }
    echo '</ul>';
  }

  else {
    printf( __( 'No edits found. <a href="%1$s">Write a new post</a>.', 'admin-dashboard-last-edits' ), esc_url( admin_url( 'post-new.php' ) ) );
  }

}



 	/*FIN SUGGESTION DE PLUGINS  */

  add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );

  function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
  if ( ! empty( $type ) && $type == 'success' ) {
  return false;
  }
  return true;
  }

  add_filter( 'auto_plugin_update_send_email', '__return_false' );

  add_filter( 'auto_theme_update_send_email', '__return_false' );

/* Stop Adding Functions Below this Line */
?>
