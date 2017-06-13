<?php
$config = mount_resort_kirki_config();

# Menu Typography
MOUNT_RESORT_Kirki::add_section( 'dt_menu_typo_section', array(
	'title' => __( 'Menu', 'mountresort' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 5
) );
	
	# customize-menu-typo
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'customize-menu-typo',
		'label'    => __( 'Customize Menu Typo', 'mountresort' ),
		'section'  => 'dt_menu_typo_section',
		'default'  => mount_resort_defaults( 'customize-menu-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		)
	));

	# menu-typo
	MOUNT_RESORT_Kirki::add_field( $config ,array(
		'type' => 'typography',
		'settings' => 'menu-typo',
		'label'    => __('Settings', 'mountresort'),
		'section'  => 'dt_menu_typo_section',
		'output' => array( 
			array( 'element' => '#main-menu ul.menu li a' )
		),
		'default' => mount_resort_defaults('menu-typo'),
		'active_callback' => array(
			array( 'setting' => 'customize-menu-typo', 'operator' => '==', 'value' => '1' )
		)
	));

# Body Content
MOUNT_RESORT_Kirki::add_section( 'dt_body_content_typo_section', array(
	'title' => __( 'Body', 'mountresort' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 10
) );
	
	# customize-body-content-typo
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'customize-body-content-typo',
		'label'    => __( 'Customize Content Typo', 'mountresort' ),
		'section'  => 'dt_body_content_typo_section',
		'default'  => mount_resort_defaults( 'customize-body-content-typo' ),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		)
	));

	# body-content-typo
	MOUNT_RESORT_Kirki::add_field( $config ,array(
		'type' => 'typography',
		'settings' => 'body-content-typo',
		'label'    => __('Settings', 'mountresort'),
		'section'  => 'dt_body_content_typo_section',
		'output' => array( 
			array( 'element' => '' )
		),
		'default' => mount_resort_defaults('body-content-typo'),
		'active_callback' => array(
			array( 'setting' => 'customize-body-content-typo', 'operator' => '==', 'value' => '1' )
		)
	));

# Heading Tag
MOUNT_RESORT_Kirki::add_section( 'dt_headings_typo_section', array(
	'title' => __( 'Headings', 'mountresort' ),
	'panel' => 'dt_site_typography_panel',
	'priority' => 100
) );
	# Heading Tags
	for( $i=1; $i<=6; $i++ ) {

		# customize-body-heading-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-body-h'.$i.'-typo',
			'label'    => __( 'Customize H', 'mountresort' ). $i.__(' Tag', 'mountresort'),
			'section'  => 'dt_headings_typo_section',
			'default'  => mount_resort_defaults( 'customize-body-h'.$i.'-typo' ),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			)
		));

		# heading tag typography	
		MOUNT_RESORT_Kirki::add_field( $config ,array(
			'type' => 'typography',
			'settings' => 'h'.$i,
			'label'    => __( 'H', 'mountresort' ).$i. ' '.__('Tag Settings', 'mountresort'),
			'section'  => 'dt_headings_typo_section',
			'output' => array( 
				array( 'element' => 'h'.$i )
			),
			'default' => mount_resort_defaults('h'.$i),
			'active_callback' => array(
				array( 'setting' => 'customize-body-h'.$i.'-typo', 'operator' => '==', 'value' => '1' )
			)
		));		

		# Divider
		MOUNT_RESORT_Kirki::add_field( $config ,array(
			'type'=> 'custom',
			'settings' => 'customize-body-h'.$i.'-typo-divider',
			'section'  => 'dt_headings_typo_section',
			'default'  => '<div class="customize-control-divider"></div>'
		));		
	}