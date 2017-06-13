<?php
add_action( 'vc_before_init', 'dt_sc_room_vc_map' );
function dt_sc_room_vc_map() {

	$cf_rooms = array( 
		esc_html__('No. of Beds','veda-room') => 'no_beds',
		esc_html__('No. of People','veda-room') =>'no_people',
		esc_html__('Room size','veda-room') =>'room_size',
		esc_html__('AC / Non AC','veda-room') =>'ac_nonac',
		esc_html__('Price','veda-room') =>'price',
	);

	$cfs = mount_resort_cs_get_option( 'rooms-custom-fields', array() );
	foreach( $cfs as $key => $fields ) {
		$cf_rooms[ $fields['rooms-custom-fields-text'] ] = 'rooms-custom-fields-text-'.$key;
	}

	vc_map( array(
		"name" => esc_html__("Room", "veda-room"),
		"base" => "dt_sc_room",
		"icon" => "dt_sc_room",
		"category" => esc_html__("Hotels","veda-room"),
		"description" => esc_html__("Show a room", "veda-room"),
		"params" => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Select Room', 'veda-room' ),
				'param_name' => 'id',
				'save_always' => true,
				'description' => __( 'Input room ID', 'veda-room' ),
			),

			array(
				'type' => 'dropdown',
				'param_name' => 'style',
				'heading' => esc_html__('Style','veda-room'),
				'admin_label' => true,
				'save_always' => true,
				'value' => array(
					esc_html__('Type 1','veda-room') => 'type-1',
					esc_html__('Type 2','veda-room') => 'type-2',
					esc_html__('Type 3','veda-room') => 'type-3',
				),
				'description' => esc_html__( 'Room display style.', 'veda-room' ),
				'std' => 'type-2'
			),

			array(
				'type' => 'param_group',
				'heading' => __( 'Fields To Show', 'veda-room' ),
				'param_name' => 'fields',
          		'dependency' => array( 'element' => 'style', 'value' => 'type-2' ),
				'params' => array(

					array(
						'type' => 'dropdown',
						'param_name' => 'field',
						'heading' => esc_html__('Filed','veda-room'),
						'admin_label' => true,
						'value' => $cf_rooms,
						'save_always' => true
					),					

					array(
						'type' => 'dropdown',
						'param_name' => 'show_field',
						'heading' => esc_html__('Show This Filed','veda-room'),
						'value' => array(
							esc_html__('Yes','veda-room') => 'yes',
							esc_html__('No','veda-room') => 'no',
						),
						'save_always' => true,
						'std' => 'yes'
					),
				)
			),		
		)
	) );	
}