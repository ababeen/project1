<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */
define( 'MOUNT_RESORT_THEME_DIR', get_template_directory() );
define( 'MOUNT_RESORT_THEME_URI', get_template_directory_uri() );
define( 'MOUNT_RESORT_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define( 'MOUNT_RESORT_SETTINGS', 'mount-resort-opts' );

/* ---------------------------------------------------------------------------
 * Load Kirki
 * ---------------------------------------------------------------------------*/
require_once( MOUNT_RESORT_THEME_DIR .'/kirki/index.php' );

// Cs Framework -----------------------------------------------------------------
if( ! class_exists( 'CSFramework' ) ){
	define( 'CS_ACTIVE_TAXONOMY',   false );
	define( 'CS_ACTIVE_SHORTCODE',  false );
	define( 'CS_ACTIVE_CUSTOMIZE',  false );
	require_once get_template_directory() .'/cs-framework/cs-framework.php';
}

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'MOUNT_RESORT_THEME_NAME', $themeData->get('Name'));
	define( 'MOUNT_RESORT_THEME_VERSION', $themeData->get('Version'));
endif;

define( 'MOUNT_RESORT_LANG_DIR', MOUNT_RESORT_THEME_DIR. '/languages' );

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------*/ 
load_theme_textdomain( 'mountresort', MOUNT_RESORT_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Scripts
 * ---------------------------------------------------------------------------*/
function mount_resort_admin_scripts() {
	wp_enqueue_style('mount-resort-admin', MOUNT_RESORT_THEME_URI .'/cs-framework-override/style.css');
}
add_action( 'admin_enqueue_scripts', 'mount_resort_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads the Options Panel
 * ---------------------------------------------------------------------------*/
require_once( MOUNT_RESORT_THEME_DIR .'/framework/utils.php' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------*/ 

// Functions --------------------------------------------------------------------
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-head.php' );

// Menu -------------------------------------------------------------------------
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-menu.php' );
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-mega-menu.php' );

// Hooks ------------------------------------------------------------------------
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-hooks.php' );

// Likes ------------------------------------------------------------------------
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-likes.php' );

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'mount_resort_widgets_init' );
function mount_resort_widgets_init() {
	require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-widgets.php' );

	if(class_exists('DTCorePlugin')) {
		register_widget('Mount_Resort_Twitter');
	}

	register_widget('Mount_Resort_Flickr');
	register_widget('Mount_Resort_Recent_Posts');
	register_widget('Mount_Resort_Portfolio_Widget');
}
if(class_exists('DTCorePlugin')) {
	require_once( MOUNT_RESORT_THEME_DIR .'/framework/widgets/widget-twitter.php' );
}
require_once( MOUNT_RESORT_THEME_DIR .'/framework/widgets/widget-flickr.php' );
require_once( MOUNT_RESORT_THEME_DIR .'/framework/widgets/widget-recent-posts.php' );
require_once( MOUNT_RESORT_THEME_DIR .'/framework/widgets/widget-recent-portfolios.php' );

// Plugins ---------------------------------------------------------------------- 
require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-plugins.php' );


// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) ){
	require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-woocommerce.php' );
}

// WP Store Locator ------------------------------------------------------------------
if( mount_resort_is_plugin_active( 'wp-store-locator/wp-store-locator.php' ) ){
	require_once( MOUNT_RESORT_THEME_DIR .'/framework/register-storelocator.php' );
}?>