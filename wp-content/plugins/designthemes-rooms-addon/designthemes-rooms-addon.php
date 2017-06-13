<?php
/*
 * Plugin Name:	DesignThemes Room Addon
 * URI: 	http://wedesignthemes.com/plugins/designthemes-rooms-addon
 * Description: A simple wordpress plugin designed to implements <strong>room features of DesignThemes</strong> 
 * Version: 	1.1
 * Author: 		DesignThemes
 * Text Domain: veda-room
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTRoomAddon' )) {

	class DTRoomAddon {

		function __construct() {

			$this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . 'custom-post-types/register-post-types.php';

			if (class_exists ( 'DTRoomCustomPostType' )) {
				$dt_room_custom_posts = new DTRoomCustomPostType();
			}
			
			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . 'shortcodes/shortcodes.php';

			if (class_exists ( 'DTRoomShortcodesDefinition' )) {
				new DTRoomShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCRoomsModule')){
				new DTVCRoomsModule();
			}			
			
			// Register Widgets
			require_once plugin_dir_path ( __FILE__ ) . 'widgets/register-widgets.php';

			if (class_exists ( 'DTRoomWidgets' )) {
				$dt_room_widgets = new DTRoomWidgets();
			}
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'veda-room', false, dirname ( plugin_basename ( __FILE__ ) ) . 'languages/' );
		}



		/**
		 * To load plugin activate
		 */
		public static function dtRoomAddonActivate() {
			if( ! function_exists('mount_resort_cs_get_option') ){
				wp_die( esc_html__( 'Please make sure "Resort Theme" is activated.', 'veda-room' ) );
			}
		}

		/**
		 * To load plugin deactivate
		 */
		public static function dtRoomAddonDectivate() {
		}
	}
}

if (class_exists ( 'DTRoomAddon' )) {

	register_activation_hook ( __FILE__, array (
			'DTRoomAddon',
			'dtRoomAddonActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTRoomAddon',
			'dtRoomAddonDectivate' 
	) );

	$dt_room_plugin = new DTRoomAddon ();
}
?>