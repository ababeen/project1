<?php add_action( 'vc_before_init', 'dt_sc_speaker_vc_map' );
function dt_sc_speaker_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Speaker", 'designthemes-core' ),
		"base" => "dt_sc_speaker",
		"icon" => "dt_sc_speaker",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'designthemes-core' ),
				'admin_label' => true,
				'description' => esc_html__( 'Enter name', 'designthemes-core' )
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'designthemes-core' ),
				'admin_label' => true,
				'description' => esc_html__( 'Enter role', 'designthemes-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','designthemes-core'),
                'param_name' => 'image'
            ),

            # Facebook
			array(
				'type' => 'textfield',
				'param_name' => 'facebook',
				'heading' => esc_html__( 'Facebook', 'designthemes-core' ),
			),

            # Twitter
			array(
				'type' => 'textfield',
				'param_name' => 'twitter',
				'heading' => esc_html__( 'Twitter', 'designthemes-core' ),
			),

            # Google
			array(
				'type' => 'textfield',
				'param_name' => 'google',
				'heading' => esc_html__( 'Google', 'designthemes-core' ),
			),

            # Linkedin
			array(
				'type' => 'textfield',
				'param_name' => 'linkedin',
				'heading' => esc_html__( 'Linkedin', 'designthemes-core' ),
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','designthemes-core'),
            	'param_name' => 'content',
            	'value' => '<h4>About me</h4><p> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words. </p><h4> Topic </h4><p> <strong>Discussion about the latest trends in the web and app design</strong> </p>'
            ),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)			
		)
	) );	
}?>