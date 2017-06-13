<?php
$config = mount_resort_kirki_config();

MOUNT_RESORT_Kirki::add_section( 'dt_site_layout_section', array(
	'title' => __( 'Site Layout', 'mountresort' ),
	'priority' => 20
) );

	# site-responsive
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'site-responsive',
		'label'    => __( 'Is Site Responsive?', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'default'  => mount_resort_defaults('site-responsive'),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		)			
	));	

	# site-layout
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'site-layout',
		'label'    => __( 'Site Layout', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'default'  => mount_resort_defaults('site-layout'),
		'choices' => array(
			'boxed' =>  get_template_directory_uri().'/kirki/assets/images/site-layout/boxed.png',
			'wide' => get_template_directory_uri().'/kirki/assets/images/site-layout/wide.png',
		)
	));

	# site-boxed-layout
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'site-boxed-layout',
		'label'    => __( 'Customize Boxed Layout?', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'default'  => '1',
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
		)			
	));

	# body-bg-type
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-type',
		'label'    => __( 'Background Type', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'multiple' => 1,
		'default'  => 'none',
		'choices'  => array(
			'pattern' => esc_attr__( 'Predefined Patterns', 'mountresort' ),
			'upload' => esc_attr__( 'Set Pattern', 'mountresort' ),
			'none' => esc_attr__( 'None', 'mountresort' ),
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-pattern
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'body-bg-pattern',
		'label'    => __( 'Predefined Patterns', 'mountresort' ),
		'description'    => __( 'Add Background for body', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'choices' => array(
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern1.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern1.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern2.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern2.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern3.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern3.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern4.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern4.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern5.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern5.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern6.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern6.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern7.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern7.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern8.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern8.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern9.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern9.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern10.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern10.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern11.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern11.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern12.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern12.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern13.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern13.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern14.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern14.jpg',
			get_template_directory_uri().'/kirki/assets/images/site-layout/pattern15.jpg'=> get_template_directory_uri().'/kirki/assets/images/site-layout/pattern15.jpg',
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'pattern' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)						
	));

	# body-bg-image
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type' => 'image',
		'settings' => 'body-bg-image',
		'label'    => __( 'Background Image', 'mountresort' ),
		'description'    => __( 'Add Background Image for body', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'upload' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-position
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-position',
		'label'    => __( 'Background Position', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-position' )
		),
		'default' => 'center',
		'multiple' => 1,
		'choices' => mount_resort_image_positions(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload') ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-repeat
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-repeat',
		'label'    => __( 'Background Repeat', 'mountresort' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-repeat' )
		),
		'default' => 'repeat',
		'multiple' => 1,
		'choices' => mount_resort_image_repeats(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload' ) ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));	