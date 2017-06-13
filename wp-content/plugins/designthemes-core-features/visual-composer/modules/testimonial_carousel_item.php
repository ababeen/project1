<?php add_action( 'vc_before_init', 'dt_sc_tm_carousel_item_vc_map' );
function dt_sc_tm_carousel_item_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Testimonial item", 'designthemes-core' ),
		"base" => "dt_sc_tm_carousel_item",
		"icon" => "dt_sc_tm_carousel_item",
		"category" => DT_VC_CATEGORY,
		'as_child' => array( 'only' => 'dt_sc_tm_carousel_wrapper' ),
		'description' => esc_html__( 'Item for testimonial carousel', 'designthemes-core' ),
		"params" => array(
		
			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'i_type',
				'heading' => esc_html__('Type','designthemes-core'),
				'value' => array(
					esc_html__('Type 1','designthemes-core') => 'type1',
					esc_html__('Type 2','designthemes-core') => 'type2'
				),
				'std' => 'type1'
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','designthemes-core'),
                'param_name' => 'image'
            ),

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'designthemes-core' ),
				'description' => esc_html__( 'Enter title', 'designthemes-core' ),
				'dependency' => array( 'element' => 'i_type', 'value' => 'type2')
			),

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'designthemes-core' ),
				'description' => esc_html__( 'Enter name', 'designthemes-core' ),
				'admin_label' => true
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'designthemes-core' ),
				'description' => esc_html__( 'Enter role', 'designthemes-core' ),
				'dependency' => array( 'element' => 'i_type', 'value' => 'type1')
			),
			
			# Location
			array(
				'type' => 'textfield',
				'param_name' => 'location',
				'heading' => esc_html__( 'Location', 'designthemes-core' ),
				'description' => esc_html__( 'Enter locarion', 'designthemes-core' ),
				'dependency' => array( 'element' => 'i_type', 'value' => 'type2')
			),

			# Rating
			array(
				'type' => 'dropdown',
				'param_name' => 'rating',
				'heading' => esc_html__('Rating','designthemes-core'),
				'value' => array(
					esc_html__('1 Star','designthemes-core') => 'star-1',
					esc_html__('2 Star','designthemes-core') => 'star-2',
					esc_html__('3 Star','designthemes-core') => 'star-3',
					esc_html__('4 Star','designthemes-core') => 'star-4',
					esc_html__('5 Star','designthemes-core') => 'star-5',
				),
				'dependency' => array( 'element' => 'i_type', 'value' => 'type2'),
				'std' => 'star-3'
			),
			
      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','designthemes-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            )
		)
	) );
}?>