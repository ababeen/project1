<?php
$config = mount_resort_kirki_config();

# Breadcrumb Settings
MOUNT_RESORT_Kirki::add_section( 'dt_site_breadcrumb_section', array(
	'title' => __( 'Breadcrumb', 'mountresort' ),
	'panel' => 'dt_site_breadcrumb_panel',
	'priority' => 1,	
) );

	# show-breadcrumb
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'show-breadcrumb',
		'label'    => __( 'Show Breadcrumb', 'mountresort' ),
		'section'  => 'dt_site_breadcrumb_section',
		'default'  => '1',
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		)
	));

	# breadcrumb-delimiter	
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'select',
		'settings' => 'breadcrumb-delimiter',
		'label'    => __( 'Breadcrumb Delimiter', 'mountresort' ),
		'section'  => 'dt_site_breadcrumb_section',
		'default'  => mount_resort_defaults( 'breadcrumb-delimiter' ),
		'choices'  => array(
			"fa default" => esc_attr__('Default','mountresort'),
			"fa fa-angle-double-right" => esc_attr__('Double Angle Right','mountresort'),
			"fa fa-sort" => esc_attr__('Sort','mountresort'),
			"fa fa-arrow-circle-right" => esc_attr__('Arrow Circle Right','mountresort'),
			"fa fa-angle-right" => esc_attr__('Angle Right','mountresort'),
			"fa fa-caret-right" => esc_attr__('Caret Right','mountresort'),
			"fa fa-arrow-right" => esc_attr__('Arrow Right','mountresort'),
			"fa fa-chevron-right" => esc_attr__('Chevron Right','mountresort'),
			"fa fa-hand-o-right" => esc_attr__('Hand Right','mountresort'),
			"fa fa-plus" => esc_attr__('Plus','mountresort'),
			"fa fa-remove" => esc_attr__('Remove','mountresort'),
			"fa fa-glass" => esc_attr__('Glass','mountresort'),				
		),
		'active_callback' => array(
			array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' )
		)			
	));

	# breadcrumb-style	
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'select',
		'settings' => 'breadcrumb-style',
		'label'    => __( 'Breadcrumb Style', 'mountresort' ),
		'section'  => 'dt_site_breadcrumb_section',
		'default'  => mount_resort_defaults( 'breadcrumb-style' ),
		'choices'  => array(
			"default"	=> esc_attr__('Default','mountresort'),
			"aligncenter"	=> esc_attr__('Align Center','mountresort'),
			"alignright"	=> esc_attr__('Align Right','mountresort'),
			"breadcrumb-left"	=> esc_attr__('Left Side Breadcrumb','mountresort'),
			"breadcrumb-right"	=> esc_attr__('Right Side Breadcrumb','mountresort'),
			"breadcrumb-top-right-title-center"	=> esc_attr__('Top Right Title Center','mountresort'),
			"breadcrumb-top-left-title-center"	=> esc_attr__('Top Left Title Center','mountresort'),				
		),
		'active_callback' => array(
			array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' )
		)			
	));

# Breadcrumb Background Settings
MOUNT_RESORT_Kirki::add_section( 'dt_site_breadcrumb_bg_section', array(
	'title' => __( 'Background', 'mountresort' ),
	'panel' => 'dt_site_breadcrumb_panel',
	'priority' => 2,	
) );
		# customize-breadcrumb-bg
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-breadcrumb-bg',
			'label'    => __( 'Customize Background ?', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_bg_section',
			'default'  => mount_resort_defaults('customize-breadcrumb-bg'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' )
			)			
		));

		# breadcrumb-bg-color
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'color',
			'settings' => 'breadcrumb-bg-color',
			'label'    => __( 'Background Color', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_bg_section',
			'output' => array(
				array( 'element' => '.main-title-section-wrapper' , 'property' => 'background-color' )
			),
			'choices' => array( 'alpha' => true ),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-bg', 'operator' => '==', 'value' => '1' )
			)
		));

		# breadcrumb-bg-image
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'breadcrumb-bg-image',
			'label'    => __( 'Background Image', 'mountresort' ),
			'description'    => __( 'Add Background Image for breadcrumb', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_bg_section',
			'output' => array(
				array( 'element' => '.main-title-section-wrapper' , 'property' => 'background-image' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-bg', 'operator' => '==', 'value' => '1' )
			)
		));

		# breadcrumb-bg-position
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'breadcrumb-bg-position',
			'label'    => __( 'Background Image Position', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_bg_section',
			'output' => array(
				array( 'element' => '.main-title-section-wrapper' , 'property' => 'background-position' )				
			),
			'default' => 'center',
			'multiple' => 1,
			'choices' => mount_resort_image_positions(),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-bg', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'breadcrumb-bg-image', 'operator' => '!=', 'value' => '' )
			)
		));

		# breadcrumb-bg-repeat
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'breadcrumb-bg-repeat',
			'label'    => __( 'Background Image Repeat', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_bg_section',
			'output' => array(
				array( 'element' => '.main-title-section-wrapper' , 'property' => 'background-repeat' )				
			),
			'default' => 'repeat',
			'multiple' => 1,
			'choices' => mount_resort_image_repeats(),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-bg', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'breadcrumb-bg-image', 'operator' => '!=', 'value' => '' )
			)
		));

# Breadcrumb Typography
	MOUNT_RESORT_Kirki::add_section( 'dt_site_breadcrumb_typo', array(
		'title'	=> __( 'Typography','mountresort' ),
		'panel' => 'dt_site_breadcrumb_panel',
		'priority' => 3,
	) );

		# customize-breadcrumb-title-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-breadcrumb-title-typo',
			'label'    => __( 'Customize Title ?', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_typo',
			'default'  => mount_resort_defaults('customize-breadcrumb-title-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' )
			)			
		));

		# breadcrumb-title-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'breadcrumb-title-typo',
			'label'    => __( 'Title Typography', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_typo',
			'output' => array(
				array( 'element' => '.main-title-section h1, h1.simple-title' )
			),
			'default' => mount_resort_defaults( 'breadcrumb-title-typo' ),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-title-typo', 'operator' => '==', 'value' => '1' )
			)		
		));		

		# customize-breadcrumb-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-breadcrumb-typo',
			'label'    => __( 'Customize Link ?', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_typo',
			'default'  => mount_resort_defaults('customize-breadcrumb-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' )
			)			
		));

		# breadcrumb-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'breadcrumb-typo',
			'label'    => __( 'Link Typography', 'mountresort' ),
			'section'  => 'dt_site_breadcrumb_typo',
			'output' => array(
				array( 'element' => 'div.breadcrumb a' )
			),
			'default' => mount_resort_defaults( 'breadcrumb-typo' ),
			'active_callback' => array(
				array( 'setting' => 'show-breadcrumb', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-breadcrumb-typo', 'operator' => '==', 'value' => '1' )
			)		
		));										