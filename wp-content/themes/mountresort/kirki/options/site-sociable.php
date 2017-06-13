<?php
$config = mount_resort_kirki_config();

MOUNT_RESORT_Kirki::add_section( 'dt_sociable_section', array(
	'title' => __( 'Site Sociable', 'mountresort' ),
	'priority' => 190
) );

	# Delicious
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-delicious',
		'label'	   => __( 'Delicious', 'mountresort' ),
		'section'  => 'dt_sociable_section',
		'default'  => '#'	
	));

	# Deviantart 
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-deviantart',
		'label'	   => __( 'Deviantart', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Digg 
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-digg',
		'label'	   => __( 'Digg', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Dribbble
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-dribbble',
		'label'	   => __( 'Dribbble', 'mountresort' ),
		'section'  => 'dt_sociable_section',
		'default'  => '#'
	));

	# Envelope
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-envelope',
		'label'	   => __( 'Envelope', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));			

	# Facebook
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-facebook',
		'label'	   => __( 'Facebook', 'mountresort' ),
		'section'  => 'dt_sociable_section',
		'default'  => '#'
	));

	# Flickr
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-flickr',
		'label'    => __( 'Flickr', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Google Plus
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-google-plus',
		'label'	   => __( 'Google Plus', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# GTalk
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-gtalk',
		'label'	   => __( 'GTalk', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Instagram
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-instagram',
		'label'	   => __( 'Instagram', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Lastfm
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-lastfm',
		'label'	   => __( 'Lastfm', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Linkedin
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-linkedin',
		'label'    => __( 'Linkedin', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Myspace
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-myspace',
		'label'	   => __( 'Myspace', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));							

	# Picasa
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-picasa',
		'label'    => __( 'Picasa', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Pinterest
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-pinterest',
		'label'	   => __( 'Pinterest', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Reddit
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-reddit',
		'label'	   => __( 'Reddit', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# RSS
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-rss',
		'label'	   => __( 'RSS', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Skype
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-skype',
		'label'	   => __( 'Skype', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Stumbleupon 
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-stumbleupon',
		'label'	   => __( 'Stumbleupon', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Technorati
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-technorati',
		'label'    => __( 'Technorati', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Tumblr
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-tumblr',
		'label'	   => __( 'Tumblr', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Twitter 
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-twitter',
		'label'	   => __( 'Twitter', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Viadeo
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-viadeo',
		'label'	   => __( 'Viadeo', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Vimeo
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-vimeo',
		'label'	   => __( 'Vimeo', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Yahoo
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-yahoo',
		'label'	   => __( 'Yahoo', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));

	# Youtube
	MOUNT_RESORT_Kirki::add_field( $config, array(
		'type'     => 'text',
		'settings' => 'social-youtube',
		'label'	   => __( 'Youtube', 'mountresort' ),
		'section'  => 'dt_sociable_section',
	));