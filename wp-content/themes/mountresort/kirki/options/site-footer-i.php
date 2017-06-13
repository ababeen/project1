<?php
$config = mount_resort_kirki_config();

# Footer I Layout
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_layout', array(
		'title'	=> __( 'Layout','mountresort' ),
		'description' => __('Footer Column Layout Settings','mountresort'),
		'panel' => 'dt_site_footer_i_panel',
		'priority' => 1	
	) );
	
		# show-footer
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'show-footer',
			'label'    => __( 'Show Footer Columns ?', 'mountresort' ),
			'section'  => 'dt_footer_layout',
			'default'  => mount_resort_defaults('show-footer'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			)
		));

		# footer-columns
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'radio-image',
			'settings' => 'footer-columns',
			'label'    => __( 'Footer Columns Layout ?', 'mountresort' ),
			'section'  => 'dt_footer_layout',
			'transport' => 'refresh',
			'default'  => mount_resort_defaults('footer-columns'),
			'choices' => array(
				'1' => get_template_directory_uri().'/kirki/assets/images/columns/one-column.png',
				'2' => get_template_directory_uri().'/kirki/assets/images/columns/one-half-column.png',
				'3' => get_template_directory_uri().'/kirki/assets/images/columns/one-third-column.png',
				'4' => get_template_directory_uri().'/kirki/assets/images/columns/one-fourth-column.png',
				'5' => get_template_directory_uri().'/kirki/assets/images/columns/one-fifth-column.png',
				'6' => get_template_directory_uri().'/kirki/assets/images/columns/one-sixth-column.png',

				'12' => get_template_directory_uri().'/kirki/assets/images/columns/onefourth-onefourth-onehalf-column.png',
				'13' => get_template_directory_uri().'/kirki/assets/images/columns/onehalf-onefourth-onefourth-column.png',
				'11' => get_template_directory_uri().'/kirki/assets/images/columns/onefourth-onehalf-onefourth-column.png',

				'7' => get_template_directory_uri().'/kirki/assets/images/columns/onefourth-threefourth-column.png',
				'8' => get_template_directory_uri().'/kirki/assets/images/columns/threefourth-onefourth-column.png',

				'9' => get_template_directory_uri().'/kirki/assets/images/columns/onethird-twothird-column.png',
				'10' => get_template_directory_uri().'/kirki/assets/images/columns/twothird-onethird-column.png',
			),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' )
			)
		));

		# footer-darkbg
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'enable-footer-darkbg',
			'label'    => __( 'Enable Footer Dark BG', 'mountresort' ),
			'section'  => 'dt_footer_layout',
			'default'  => mount_resort_defaults('enable-footer-darkbg'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			)
		));		


# Footer 1 Background		
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_bg', array(
		'title'	=> __( 'Background','mountresort' ),
		'panel' => 'dt_site_footer_i_panel',
		'priority' => 2,
	) );

		# customize-footer-bg
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-bg',
			'label'    => __( 'Customize Background ?', 'mountresort' ),
			'section'  => 'dt_footer_bg',
			'default'  => mount_resort_defaults('customize-footer-bg'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' )
			)			
		));

		# footer-bg-color
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'color',
			'settings' => 'footer-bg-color',
			'label'    => __( 'Background Color', 'mountresort' ),
			'section'  => 'dt_footer_bg',
			'output' => array(
				array( 'element' => 'div.footer-widgets' , 'property' => 'background-color' )
			),
			'choices' => array( 'alpha' => true ),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-bg', 'operator' => '==', 'value' => '1' )
			)
		));

		# footer-bg-image
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'footer-bg-image',
			'label'    => __( 'Background Image', 'mountresort' ),
			'description'    => __( 'Add Background Image for footer', 'mountresort' ),
			'section'  => 'dt_footer_bg',
			'output' => array(
				array( 'element' => 'div.footer-widgets' , 'property' => 'background-image' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-bg', 'operator' => '==', 'value' => '1' )
			)
		));

		# footer-bg-position
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'footer-bg-position',
			'label'    => __( 'Background Image Position', 'mountresort' ),
			'section'  => 'dt_footer_bg',
			'output' => array(
				array( 'element' => 'div.footer-widgets' , 'property' => 'background-position' )
			),
			'default' => 'center',
			'multiple' => 1,
			'choices' => mount_resort_image_positions(),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-bg', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'footer-bg-image', 'operator' => '!=', 'value' => '' )
			)
		));

		# footer-bg-repeat
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'footer-bg-repeat',
			'label'    => __( 'Background Image Repeat', 'mountresort' ),
			'section'  => 'dt_footer_bg',
			'output' => array(
				array( 'element' => 'div.footer-widgets' , 'property' => 'background-repeat' )				
			),
			'default' => 'repeat',
			'multiple' => 1,
			'choices' => mount_resort_image_repeats(),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-bg', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'footer-bg-image', 'operator' => '!=', 'value' => '' )
			)
		));

# Footer I Typography
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_typo', array(
		'title'	=> __( 'Typography','mountresort' ),
		'panel' => 'dt_site_footer_i_panel',
		'priority' => 3,
	) );

		# customize-footer-title-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-title-typo',
			'label'    => __( 'Customize Title ?', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'default'  => mount_resort_defaults('customize-footer-title-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' )
			)			
		));

		# footer-title-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-title-typo',
			'label'    => __( 'Title Typography', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'output' => array(
				array( 'element' => 'div.footer-widgets h3.widgettitle' )
			),
			'default' => mount_resort_defaults( 'footer-title-typo' ),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-title-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# Divider
		MOUNT_RESORT_Kirki::add_field( $config ,array(
			'type'=> 'custom',
			'settings' => 'footer-title-typo-divider',
			'section'  => 'dt_footer_typo',
			'default'  => '<div class="customize-control-divider"></div>',
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-title-typo', 'operator' => '==', 'value' => '1' )
			)			
		));

		# customize-footer-content-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-content-typo',
			'label'    => __( 'Customize Content ?', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'default'  => mount_resort_defaults('customize-footer-content-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' )
			)			
		));

		# footer-content-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-content-typo',
			'label'    => __( 'Content Typography', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'output' => array(
				array( 'element' => 'div.footer-widgets .widget' )
			),
			'default' => mount_resort_defaults( 'footer-content-typo' ),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# footer-content-a-color		
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'color',
			'settings' => 'footer-content-a-color',
			'label'    => __( 'Anchor Color', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'choices' => array( 'alpha' => true ),
			'output' => array(
				array( 'element' => '.footer-widgets a, #footer a', 'property' => 'color' )
			),
			'default' => mount_resort_defaults( 'footer-content-a-color' ),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# footer-content-a-hover-color
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'color',
			'settings' => 'footer-content-a-hover-color',
			'label'    => __( 'Anchor Hover Color', 'mountresort' ),
			'section'  => 'dt_footer_typo',
			'choices' => array( 'alpha' => true ),			
			'output' => array(
				array( 'element' => '.footer-widgets a:hover, #footer a:hover', 'property' => 'color' )
			),
			'default' => mount_resort_defaults( 'footer-content-a-hover-color' ),
			'active_callback' => array(
				array( 'setting' => 'show-footer', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-content-typo', 'operator' => '==', 'value' => '1' )
			)		
		));