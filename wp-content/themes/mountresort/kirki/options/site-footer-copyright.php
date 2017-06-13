<?php
$config = mount_resort_kirki_config();

# Footer Copyright
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_copyright', array(
		'title'	=> __( 'Copyright', 'mountresort' ),
		'description' => __('Footer Copyright Settings','mountresort'),
		'panel' 		 => 'dt_footer_copyright_panel',
		'priority' => 1
	) );

		# show-copyright-text
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'show-copyright-text',
			'label'    => __( 'Show Copyright Text ?', 'mountresort' ),
			'section'  => 'dt_footer_copyright',
			'default'  =>  mount_resort_defaults('show-copyright-text'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			)
		) );

		# copyright-text
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'textarea',
			'settings' => 'copyright-text',
			'label'    => __( 'Add Content', 'mountresort' ),
			'section'  => 'dt_footer_copyright',
			'default'  =>  mount_resort_defaults('copyright-text'),
			'active_callback' => array(
				array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' )
			)
		) );

		# enable-copyright-darkbg
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'enable-copyright-darkbg',
			'label'    => __( 'Enable Copyright Dark BG ?', 'mountresort' ),
			'section'  => 'dt_footer_copyright',
			'default'  =>  mount_resort_defaults('enable-copyright-darkbg'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			)
		) );		

		# copyright-next
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'select',
			'settings' => 'copyright-next',
			'label'    => __( 'Show Sociable / menu ?', 'mountresort' ),
			'description'    => __( 'Add description here.', 'mountresort' ),
			'section'  => 'dt_footer_copyright',
			'default'  => mount_resort_defaults('copyright-next'),
			'choices'  => array(
				'hidden'  => esc_attr__( 'Hide', 'mountresort' ),
				'disable' => esc_attr__( 'Disable', 'mountresort' ),
				'sociable' => esc_attr__( 'Show sociable', 'mountresort' ),
				'footer-menu' => esc_attr__( 'Show menu', 'mountresort' ),
			)
		) );

# Footer Social
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_social', array(
		'title'	=> __( 'Social', 'mountresort' ),
		'description' => __('Footer Social Icons Settings','mountresort'),
		'panel' 		 => 'dt_footer_copyright_panel',
		'priority' => 2
	) );

		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'sortable',
			'settings' => 'footer-sociables',
			'label'    => __( 'Social Icons Order', 'mountresort' ),
			'section'  => 'dt_footer_social',
			'default'  => mount_resort_defaults('footer-sociables'),
			'choices'  => array(
				"delicious"		=>	esc_attr__( 'Delicious', 'mountresort' ),
				"deviantart"	=>	esc_attr__( 'Deviantart', 'mountresort' ),
				"digg"			=>	esc_attr__( 'Digg', 'mountresort' ),
				"dribbble"		=>	esc_attr__( 'Dribbble', 'mountresort' ),
				"envelope-open"	=>	esc_attr__( 'Envelope', 'mountresort' ),
				"facebook"		=>	esc_attr__( 'Facebook', 'mountresort' ),
				"flickr"		=>	esc_attr__( 'Flickr', 'mountresort' ),
				"google-plus"	=>	esc_attr__( 'Google Plus', 'mountresort' ),
				"comment"		=>	esc_attr__( 'GTalk', 'mountresort' ),
				"instagram"		=>	esc_attr__( 'Instagram', 'mountresort' ),
				"lastfm"		=>	esc_attr__( 'Lastfm', 'mountresort' ),
				"linkedin"		=>	esc_attr__( 'Linkedin', 'mountresort' ),
				"picasa"		=>  esc_attr__( 'Picasa', 'mountresort' ),
				"myspace"		=>	esc_attr__( 'Myspace', 'mountresort' ),
				"pinterest"		=>	esc_attr__( 'Pinterest', 'mountresort' ),
				"reddit"		=>	esc_attr__( 'Reddit', 'mountresort' ),
				"rss"			=>	esc_attr__( 'RSS', 'mountresort' ),
				"skype"			=>	esc_attr__( 'Skype', 'mountresort' ),
				"stumbleupon"	=>	esc_attr__( 'Stumbleupon', 'mountresort' ),
				"technorati"	=>	esc_attr__( 'Technorati', 'mountresort' ),
				"tumblr"		=>	esc_attr__( 'Tumblr', 'mountresort' ),
				"twitter"		=>	esc_attr__( 'Twitter', 'mountresort' ),
				"viadeo"		=>	esc_attr__( 'Viadeo', 'mountresort' ),
				"vimeo"			=>	esc_attr__( 'Vimeo', 'mountresort' ),
				"yahoo"			=>	esc_attr__( 'Yahoo', 'mountresort' ),
				"youtube"		=>	esc_attr__( 'Youtube', 'mountresort' ),
			),
			'active_callback' => array(
				array( 'setting' => 'copyright-next', 'operator' => '==', 'value' => 'sociable' ),
			)
		) );

# Footer Copyright Background		
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_copyright_bg', array(
		'title'	=> __( 'Background', 'mountresort' ),
		'panel' => 'dt_footer_copyright_panel',
		'priority' => 3,
	) );

		# customize-footer-copyright-bg
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-copyright-bg',
			'label'    => __( 'Customize Background ?', 'mountresort' ),
			'section'  => 'dt_footer_copyright_bg',
			'default'  => mount_resort_defaults('customize-footer-copyright-bg'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array(
					array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
					array( 'setting' => 'copyright-next', 'operator' => 'in', 'value' =>  array( 'sociable', 'footer-menu') )
				)
			)
		));

		# footer-copyright-bg-color
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'color',
			'settings' => 'footer-copyright-bg-color',
			'label'    => __( 'Background Color', 'mountresort' ),
			'section'  => 'dt_footer_copyright_bg',
			'output' => array(
				array( 'element' => '.footer-copyright' , 'property' => 'background-color' )
			),
			'choices' => array( 'alpha' => true ),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-copyright-bg', 'operator' => '==', 'value' => '1' ),
				array(
					array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
					array( 'setting' => 'copyright-next', 'operator' => 'in', 'value' =>  array( 'sociable', 'footer-menu') )				
				)
			)
		));

		# footer-copyright-bg-image
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'footer-copyright-bg-image',
			'label'    => __( 'Background Image', 'mountresort' ),
			'description'    => __( 'Add Background Image for footer', 'mountresort' ),
			'section'  => 'dt_footer_copyright_bg',
			'output' => array(
				array( 'element' => '.footer-copyright' , 'property' => 'background-image' )
			),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-copyright-bg', 'operator' => '==', 'value' => '1' ),
				array(
					array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
					array( 'setting' => 'copyright-next', 'operator' => 'in', 'value' =>  array( 'sociable', 'footer-menu') )		
				)
			)
		));

		# footer-copyright-bg-position
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'footer-copyright-bg-position',
			'label'    => __( 'Background Image Position', 'mountresort' ),
			'section'  => 'dt_footer_copyright_bg',
			'output' => array(),
			'default' => 'center',
			'multiple' => 1,
			'choices' => mount_resort_image_positions(),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-copyright-bg', 'operator' => '==', 'value' => '1' ),
				array(
					array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
					array( 'setting' => 'copyright-next', 'operator' => 'in', 'value' =>  array( 'sociable', 'footer-menu') )		
				),
				array( 'setting' => 'footer-copyright-bg-image', 'operator' => '!=', 'value' => '' )				
			)			
		));

		# footer-copyright-bg-repeat
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type' => 'select',
			'settings' => 'footer-copyright-bg-repeat',
			'label'    => __( 'Background Image Repeat', 'mountresort' ),
			'section'  => 'dt_footer_copyright_bg',
			'output' => array(),
			'default' => 'repeat',
			'multiple' => 1,
			'choices' => mount_resort_image_repeats(),
			'active_callback' => array(
				array( 'setting' => 'customize-footer-copyright-bg', 'operator' => '==', 'value' => '1' ),
				array(
					array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
					array( 'setting' => 'copyright-next', 'operator' => 'in', 'value' =>  array( 'sociable', 'footer-menu') )		
				),
				array( 'setting' => 'footer-copyright-bg-image', 'operator' => '!=', 'value' => '' )
			)			
		));

# Footer Copyright Typography
	MOUNT_RESORT_Kirki::add_section( 'dt_footer_copyright_typo', array(
		'title'	=> __( 'Typography','mountresort' ),
		'panel' => 'dt_footer_copyright_panel',
		'priority' => 4,
	) );

		# customize-footer-copyright-text-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-copyright-text-typo',
			'label'    => __( 'Customize Copyright Text ?', 'mountresort' ),
			'section'  => 'dt_footer_copyright_typo',
			'default'  => mount_resort_defaults('customize-footer-copyright-text-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' )
			)			
		));

		# footer-copyright-text-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-copyright-text-typo',
			'label'    => __( 'Text Typography', 'mountresort' ),
			'section'  => 'dt_footer_copyright_typo',
			'output' => array(
				array( 'element' => '.footer-copyright' )
			),
			'default' => mount_resort_defaults( 'footer-copyright-text-typo' ),
			'active_callback' => array(
				array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'customize-footer-copyright-text-typo', 'operator' => '==', 'value' => '1' )
			)		
		));

		# Divider
		MOUNT_RESORT_Kirki::add_field( $config ,array(
			'type'=> 'custom',
			'settings' => 'footer-copyright-text-typo-divider',
			'section'  => 'dt_footer_copyright_typo',
			'default'  => '<div class="customize-control-divider"></div>',
			'active_callback' => array(
				array( 'setting' => 'show-copyright-text', 'operator' => '==', 'value' => '1' ),
				array( 'setting' => 'copyright-next', 'operator' => '==', 'value' => 'footer-menu' )
			)			
		));		

		# customize-footer-menu-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'customize-footer-menu-typo',
			'label'    => __( 'Customize Footer Menu ?', 'mountresort' ),
			'section'  => 'dt_footer_copyright_typo',
			'default'  => mount_resort_defaults('customize-footer-menu-typo'),
			'choices'  => array(
				'on'  => esc_attr__( 'Yes', 'mountresort' ),
				'off' => esc_attr__( 'No', 'mountresort' )
			),
			'active_callback' => array(
				array( 'setting' => 'copyright-next', 'operator' => '==', 'value' => 'footer-menu' )
			)			
		));

		# footer-menu-typo
		MOUNT_RESORT_Kirki::add_field( $config, array(
			'type'     => 'typography',
			'settings' => 'footer-menu-typo',
			'label'    => __( 'Menu Typography', 'mountresort' ),
			'section'  => 'dt_footer_copyright_typo',
			'output' => array(
				array( 'element' => '' )
			),
			'default' => mount_resort_defaults( 'footer-menu-typo' ),
			'active_callback' => array(
				array( 'setting' => 'copyright-next', 'operator' => '==', 'value' => 'footer-menu' ),
				array( 'setting' => 'customize-footer-menu-typo', 'operator' => '==', 'value' => '1' )
			)		
		));		