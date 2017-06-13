<?php
$config = mount_resort_kirki_config();

MOUNT_RESORT_Kirki::add_section( 'dt_custom_js_section', array(
	'title' => __( 'Additional JS', 'mountresort' ),
	'priority' => 210
) );

	# custom-js
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'enable-custom-js',
		'section'  => 'dt_custom_js_section',
		'label'    => __( 'Enable Custom JS?', 'mountresort' ),
		'default'  => mount_resort_defaults('enable-custom-js'),
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'mountresort' ),
			'off' => esc_attr__( 'No', 'mountresort' )
		)		
	));

	# custom-js
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'code',
		'settings' => 'custom-js',
		'section'  => 'dt_custom_js_section',
		'transport' => 'postMessage',
		'label'    => __( 'Add Custom JS', 'mountresort' ),
		'choices'     => array(
			'language' => 'javascript',
			'theme'    => 'dark',
		),
		'active_callback' => array(
			array( 'setting' => 'enable-custom-js' , 'operator' => '==', 'value' =>'1')
		)
	));