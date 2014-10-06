<?php
/**
 * Plugin Name: OptinMonster Sample Themes
 * Plugin URI:  http://optinmonster.com/
 * Description: OptinMonster is the best lead generation plugin for WordPress.
 * Author:      J. Aaron Eaton
 * Author URI:  http://optinmonster.com
 * Version:     1.0
 * Text Domain: optin-monster-sample-themes
 * Domain Path: languages
 */

add_action( 'plugins_loaded', 'om_sample_plugins_loaded' );
/**
 * Ensures the full OptinMonster plugin is active before proceeding.
 */
function om_sample_plugins_loaded() {

	// Bail if the main class does not exist.
	if ( ! class_exists( 'Optin_Monster' ) ) {
		return;
	}

	// Fire up the addon.
	add_action( 'optin_monster_init', 'om_sample_plugin_init' );

}

/**
 * Load up the filters once OptinMonster has loaded
 */
function om_sample_plugin_init() {

	/**
	 * The 'optin_monster_themes' filter allows for the addition of
	 * new lightbox themes.
	 */
	add_filter( 'optin_monster_themes', 'om_sample_add_lightbox_theme', 10, 2 );

	/**
	 * The 'optin_monster_footer_themes' filter allows for the addition of
	 * new footer themes.
	 */
	add_filter( 'optin_monster_footer_themes', 'om_sample_add_footer_theme' );
	
	/**
	 * The 'optin_monster_slide_themes' filter allows for the addition of
	 * new slide themes.
	 */
	add_filter( 'optin_monster_slide_themes', 'om_sample_add_slide_theme' );
	
	/**
	 * The 'optin_monster_after_post_themes' filter allows for the addition of
	 * new after-post themes.
	 */
	add_filter( 'optin_monster_after_post_themes', 'om_sample_add_after_post_theme' );
	
	/**
	 * The 'optin_monster_sidebar_themes' filter allows for the addition of
	 * new sidebar themes.
	 */
	add_filter( 'optin_monster_sidebar_themes', 'om_sample_add_sidebar_theme' );
	
	/**
	 * The 'optin_monster_mobile_themes' filter allows for the addition of
	 * new mobile themes.
	 */
	add_filter( 'optin_monster_mobile_themes', 'om_sample_add_mobile_theme' );

	/**
	 * The 'optin_monster_theme_api' filter directs the new optin request
	 * to the correct theme file.
	 */
	add_filter( 'optin_monster_theme_api', 'om_sample_theme_api', 10, 4 );

}

/**
 * Filters the lightbox optin themes.
 *
 * Make sure to add themes to the existing $themes array or they will
 * not be available.
 *
 * @param array $themes The existing lightbox themes
 * @param string $type The requested optin type
 * @return array
 */
function om_sample_add_lightbox_theme( $themes, $type ) {

	// Let's make sure we're adding to the lightbox themes. If not, return early.
	if ( 'lightbox' != $type ) {
		return $themes;
	}

	/**
	 * Now we can add a new lightbox theme. Each theme entry requires 3 elements
	 *
	 * 1. Theme name
	 * 2. Path to the sample theme image
	 * 3. Reference to this file
	 */
	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/lightbox-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	// As with all filters, make sure to return the data.
	return $themes;

}

/**
 * Filters the footer bar optin themes.
 *
 * @param array $themes The existing footer bar themes
 * @return array
 */
function om_sample_add_footer_theme( $themes ) {

	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/footer-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	return $themes;

}

/**
 * Filters the slide-in optin themes.
 *
 * @param array $themes The existing slide-in themes
 * @return array
 */
function om_sample_add_slide_theme( $themes ) {

	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/slide-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	return $themes;

}

/**
 * Filters the after-post optin themes.
 *
 * @param array $themes The existing after-post themes
 * @return array
 */
function om_sample_add_after_post_theme( $themes ) {

	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/post-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	return $themes;

}

/**
 * Filters the sidebar optin themes.
 *
 * @param array $themes The existing sidebar themes
 * @return array
 */
function om_sample_add_sidebar_theme( $themes ) {

	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/sidebar-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	return $themes;

}

/**
 * Filters the mobile optin themes.
 *
 * @param array $themes The existing mobile themes
 * @return array
 */
function om_sample_add_mobile_theme( $themes ) {

	$themes['sample'] = array(
		'name' => __( 'Sample Theme', 'optin-monster-sample-themes' ),
		'image' => plugins_url( 'includes/themes/mobile-sample/images/icon.jpg', __FILE__ ),
		'file' => __FILE__,
	);

	return $themes;

}

function om_sample_theme_api( $api, $theme, $optin_id, $type ) {

	// Return if we're not using the Sample theme
	if ( 'sample' != $theme ) {
		return $api;
	}

	switch ( $type ) {
		
		case 'lightbox' :
			if ( ! class_exists( 'Optin_Monster_Lightbox_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/lightbox-sample/lightbox-sample.php';
			}
			$api = new Optin_Monster_Lightbox_Theme_Sample( $optin_id );
			break;
		case 'footer' :
			if ( ! class_exists( 'Optin_Monster_Footer_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/footer-sample/footer-sample.php';
			}
			$api = new Optin_Monster_Footer_Theme_Sample( $optin_id );
			break;
		case 'slide' :
			if ( ! class_exists( 'Optin_Monster_Slide_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/slide-sample/slide-sample.php';
			}
			$api = new Optin_Monster_Slide_Theme_Sample( $optin_id );
			break;
		case 'post' :
			if ( ! class_exists( 'Optin_Monster_Post_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/post-sample/post-sample.php';
			}
			$api = new Optin_Monster_Post_Theme_Sample( $optin_id );
			break;
		case 'sidebar' :
			if ( ! class_exists( 'Optin_Monster_Sidebar_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/sidebar-sample/sidebar-sample.php';
			}
			$api = new Optin_Monster_Sidebar_Theme_Sample( $optin_id );
			break;
		case 'mobile' :
			if ( ! class_exists( 'Optin_Monster_Mobile_Theme_Sample' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/themes/mobile-sample/mobile-sample.php';
			}
			$api = new Optin_Monster_Mobile_Theme_Sample( $optin_id );
			break;
	}

	return $api;

}