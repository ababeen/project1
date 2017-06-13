<?php

require_once get_template_directory() . '/kirki/kirki-utils.php';
require_once get_template_directory() . '/kirki/include-kirki.php';
require_once get_template_directory() . '/kirki/kirki.php';

$config = mount_resort_kirki_config();

add_action('customize_register', 'mount_resort_customize_register');
function mount_resort_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->remove_section('themes');
	$wp_customize->get_section('title_tagline')->priority = 10;
}

add_action( 'customize_controls_print_styles', 'mount_resort_enqueue_customizer_stylesheet' );
function mount_resort_enqueue_customizer_stylesheet() {
	wp_register_style( 'mount-resort-customizer-css', get_template_directory_uri().'/kirki/assets/css/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'mount-resort-customizer-css' );	
}

add_action( 'customize_controls_print_footer_scripts', 'mount_resort_enqueue_customizer_script' );
function mount_resort_enqueue_customizer_script() {
	wp_register_script( 'mount-resort-customizer-js', get_template_directory_uri().'/kirki/assets/js/customizer.js', array('jquery', 'customize-controls' ), false, true );
	wp_enqueue_script( 'mount-resort-customizer-js' );
}

# Theme Customizer Begins
MOUNT_RESORT_Kirki::add_config( $config , array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

	# Site Identity	
		# use-custom-logo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'use-custom-logo',
			'label'    => __( 'Logo ?', 'mountresort' ),
			'section'  => 'title_tagline',
			'priority' => 1,
			'default'  => mount_resort_defaults('use-custom-logo'),
			'description' => __('This is test description','mountresort'),
			'choices'  => array(
				'on'  => esc_attr__( 'Logo', 'mountresort' ),
				'off' => esc_attr__( 'Site Title', 'mountresort' )
			)			
		) );

		# custom-logo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-logo',
			'label'    => __( 'Logo', 'mountresort' ),
			'section'  => 'title_tagline',
			'priority' => 2,
			'default' => mount_resort_defaults( 'custom-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));

		# custom-dark-logo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-dark-logo',
			'label'    => __( 'Dark Logo', 'mountresort' ),
			'section'  => 'title_tagline',
			'priority' => 3,
			'default' => mount_resort_defaults( 'custom-dark-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));		

		# site-loader
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'switch',
			'settings' => 'use-site-loader',
			'label'    => __( 'Use Site Loader?', 'mountresort' ),
			'section'  => 'title_tagline',
			'priority' => 100,
			'default' => mount_resort_defaults( 'use-site-loader' )
		));
		
	# Site Layout
	require_once get_template_directory() . '/kirki/options/site-layout.php';

	# Site Skin
	require_once get_template_directory() . '/kirki/options/site-skin.php';

	# Site Breadcrumb
		MOUNT_RESORT_Kirki::add_panel( 'dt_site_breadcrumb_panel', array(
			'title' => __( 'Site Breadcrumb', 'mountresort' ),
			'description' => __('Site Breadcrumb','mountresort'),
			'priority' => 25
		) );
		require_once get_template_directory() . '/kirki/options/site-breadcrumb.php';
	
	# Site Header
		MOUNT_RESORT_Kirki::add_panel( 'dt_site_header_panel', array(
			'title' => __( 'Site Header', 'mountresort' ),
			'description' => __('Site Header','mountresort'),
			'priority' => 30
		) );
		require_once get_template_directory() . '/kirki/options/site-header.php';

	# Site Menu
		MOUNT_RESORT_Kirki::add_panel( 'dt_site_menu_panel', array(
			'title' => __( 'Site Menu', 'mountresort' ),
			'description' => __('Site Menu','mountresort'),
			'priority' => 35
		) );
		require_once get_template_directory() . '/kirki/options/site-navigation.php';		

	# Site Footer
		MOUNT_RESORT_Kirki::add_panel( 'dt_site_footer_i_panel', array(
			'title' => __( 'Site Footer', 'mountresort' ),
			'priority' => 40
		) );
		require_once get_template_directory() . '/kirki/options/site-footer-i.php';

	# Site Footer Copyright
		MOUNT_RESORT_Kirki::add_panel( 'dt_footer_copyright_panel', array(
			'title' => __( 'Site Copyright', 'mountresort' ),
			'priority' => 50
		) );
		require_once get_template_directory() . '/kirki/options/site-footer-copyright.php';

	# Site Sociable
	require_once get_template_directory() . '/kirki/options/site-sociable.php';

	# Additional JS
	require_once get_template_directory() . '/kirki/options/custom-js.php';

	# Typography
	MOUNT_RESORT_Kirki::add_panel( 'dt_site_typography_panel', array(
		'title' => __( 'Typography', 'mountresort' ),
		'description' => __('Typography Settings','mountresort'),
		'priority' => 220
	) );	
	require_once get_template_directory() . '/kirki/options/site-typography.php';	
# Theme Customizer Ends