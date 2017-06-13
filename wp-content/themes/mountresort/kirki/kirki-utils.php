<?php
function mount_resort_kirki_config() {
	return 'mount_resort_kirki_config';
}

function mount_resort_defaults( $key = '' ) {

	$defaults = array();
	
	$defaults['use-predefined-skin'] = 0;	
	$defaults['primary-color'] = '#859B8F';
	$defaults['secondary-color'] = '#54675C';
	$defaults['tertiary-color'] = '#DAE4DF';
	$defaults['predefined-skin'] = 'orange';

	$defaults['site-responsive'] = '1';
	$defaults['site-layout'] = 'wide';

	$defaults['search-box-type'] = 'type1';

	$defaults['site_icon'] = get_template_directory_uri().'/images/favicon.ico';

	# use-custom-logo
	$defaults['use-custom-logo'] = '1';

	# custom-logo
	$defaults['custom-logo'] = get_template_directory_uri().'/images/logo.png';

	# custom-logo
	$defaults['custom-dark-logo'] = get_template_directory_uri().'/images/light-logo.png';

	$defaults['header-type'] = 'fullwidth-header header-align-center fullwidth-menu-header';
	$defaults['header-transparency'] = 'transparent-header';
	
	$defaults['enable-sticy-nav'] = 0;
	$defaults['header-position'] = 'on slider';
	$defaults['enable-header-darkbg'] = '0';

	$defaults['enable-header-left-content'] = '0';
	$defaults['enable-header-right-content'] = '0';
	$defaults['enable-top-bar-content'] = '0';
	
	$defaults['menu-active-style'] = 'menu-default-style';
	$defaults['customize-menu-bg-color'] = 1;
	$defaults['menu-a-color'] = '#3B3E47';
	$defaults['menu-a-active-color'] = '#7D7D7D';
	
	#Breadcrumb
		$defaults['show-breadcrumb'] = '1';
		$defaults['breadcrumb-delimiter'] = 'fa default';
		$defaults['breadcrumb-style'] = 'aligncenter';
		$defaults['customize-breadcrumb-title-typo'] = '0';
		$defaults['breadcrumb-title-typo'] = array( 'font-family' => 'Roboto',
			'variant' => 'regular',
			'subsets' => array( 'latin-ext' ),
			'font-size' => '20px',
			'line-height' => '1.5',
			'letter-spacing' => '0',
			'color' => '#333333',
			'text-transform' => 'none' );
		$defaults['customize-breadcrumb-typo'] = '0';
		$defaults['breadcrumb-typo'] = array( 'font-family' => 'Roboto',
			'variant' => 'regular',
			'subsets' => array( 'latin-ext' ),
			'font-size' => '20px',
			'line-height' => '1.5',
			'letter-spacing' => '0',
			'color' => '#333333',
			'text-transform' => 'none' );		

	/*
	 * FOOTER SETTINGS
	 */
		# show-footer
		$defaults['show-footer'] = '1';

		# footer-columns
		$defaults['footer-columns'] = '4';

		$defaults['footer-sociables'] = array( 'delicious', 'dribbble', 'facebook');

		# show-footer
		$defaults['enable-footer-darkbg'] = '0';

		# customize-footer-title-typo
		$defaults['customize-footer-title-typo'] = '0';

		#footer-title-typo
		$defaults['footer-title-typo'] = array( 'font-family' => 'Roboto',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '20px',
		'line-height' => '1.5',
		'letter-spacing' => '0',
		'color' => '#333333',
		'text-align' => 'left',
		'text-transform' => 'none' );

		# customize-footer-content-typo
		$defaults['customize-footer-content-typo'] = '0';

		#footer-content-typo
		$defaults['footer-content-typo'] = array( 'font-family' => 'Open Sans',
			'variant' => 'regular',
			'subsets' => array( 'latin-ext' ),
			'font-size' => '16px',
			'line-height' => '24px',
			'letter-spacing' => '0',
			'color' => '#848280',
			'text-align' => 'left',
			'text-transform' => 'none' );
			
		$defaults['customize-footer-bg'] = 1;
		$defaults['footer-bg-color'] = '#F7F5F2';

			
		# copyright-next
		$defaults['copyright-next'] = 'disable';
		
		# show-copyright-text
		$defaults['show-copyright-text'] = '1';

		# copyright-text
		$defaults['copyright-text'] = 'Copyright 2017 Misty Mount. All rights reserved.';
		
		$defaults['customize-footer-copyright-bg'] = 1;
		$defaults['footer-copyright-bg-color'] = '#F7F5F2';
		
		# enable-copyright-darkbg
		$defaults['enable-copyright-darkbg'] = 0;

		# customize-footer-copyright-text-typo
		$defaults['customize-footer-copyright-text-typo'] = '0';

		# footer-copyright-text-typo
		$defaults['footer-copyright-text-typo'] = array( 'font-family' => 'Poppins',
			'variant' => 'regular',
			'subsets' => array( 'latin-ext' ),
			'font-size' => '16px',
			'line-height' => '24px',
			'letter-spacing' => '0',
			'color' => '#848280',
			'text-align' => 'left',
			'text-transform' => 'none' );

		# customize-footer-menu-typo
		$defaults['customize-footer-copyright-text-typo'] = '0';

		# footer-menu-typo
		$defaults['footer-menu-typo'] = array( 'font-family' => 'Poppins',
			'variant' => 'regular',
			'subsets' => array( 'latin-ext' ),
			'font-size' => '16px',
			'line-height' => '24px',
			'letter-spacing' => '0',
			'color' => '#848280',
			'text-align' => 'center',
			'text-transform' => 'none' );


	# Social
	$defaults['social-facebook'] = '#';
	$defaults['social-twitter'] = '#';
	$defaults['social-google-plus'] = '#';
	$defaults['social-instagram'] = '#';

	# Typography
	$defaults['menu-typo'] = array(
		'font-family' => 'Poppins',
		'font-size' => '16px',
		'line-height' => '90px',
		'letter-spacing' => '0px',
		'text-transform' => 'none'
	);

	$defaults['body-content-typo'] = array(
		'font-family' => 'Open Sans',
		'font-size' => '16px',
		'line-height' => '26px',
		'letter-spacing' => '0px',
		'color' => '#3b3e47'
	);
	
	$defaults['h1'] = array(
		'font-family' => 'Poppins',
		'font-size' => '30px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);

	$defaults['h2'] = array(
		'font-family' => 'Poppins',
		'font-size' => '24px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);

	$defaults['h3'] = array(
		'font-family' => 'Poppins',
		'font-size' => '18px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);

	$defaults['h4'] = array(
		'font-family' => 'Poppins',
		'font-size' => '16px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);

	$defaults['h5'] = array(
		'font-family' => 'Poppins',
		'font-size' => '14px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);

	$defaults['h6'] = array(
		'font-family' => 'Poppins',
		'font-size' => '13px',
		'line-height' => '1.5',
		'letter-spacing' => '0.06em',
		'color' => '#20232B',
		'text-align' => 'initial',
		'text-transform' => 'none'
	);				

	if( !empty( $key ) && array_key_exists( $key, $defaults) ) {
		return $defaults[$key];
	}

	return '';
}

function mount_resort_image_positions() {

	$positions = array( "top left" => esc_attr__('Top Left','mountresort'),
		"top center"    => esc_attr__('Top Center','mountresort'),
		"top right"     => esc_attr__('Top Right','mountresort'),
		"center left"   => esc_attr__('Center Left','mountresort'),
		"center center" => esc_attr__('Center Center','mountresort'),
		"center right"  => esc_attr__('Center Right','mountresort'),
		"bottom left"   => esc_attr__('Bottom Left','mountresort'),
		"bottom center" => esc_attr__('Bottom Center','mountresort'),
		"bottom right"  => esc_attr__('Bottom Right','mountresort'),
	);

	return $positions;
}

function mount_resort_image_repeats() {

	$image_repeats = array( "repeat" => esc_attr__('Repeat','mountresort'),
		"repeat-x"  => esc_attr__('Repeat in X-axis','mountresort'),
		"repeat-y"  => esc_attr__('Repeat in Y-axis','mountresort'),
		"no-repeat" => esc_attr__('No Repeat','mountresort')
	);

	return $image_repeats;
}

function mount_resort_border_styles() {

	$image_repeats = array(
		"dotted" => esc_attr__('Dotted','mountresort'),
		"dashed" => esc_attr__('Dashed','mountresort'),
		"solid"	 => esc_attr__('Solid','mountresort'),
		"double" => esc_attr__('Double','mountresort'),
		"groove" => esc_attr__('Groove','mountresort'),
		"ridge"	 => esc_attr__('Ridge','mountresort'),
	);

	return $image_repeats;
}

function mount_resort_animations() {

	$animations = array(
		'' 					 => esc_html__('Default','mountresort'),	
		"bigEntrance"        =>  esc_attr__("bigEntrance",'mountresort'),
        "bounce"             =>  esc_attr__("bounce",'mountresort'),
        "bounceIn"           =>  esc_attr__("bounceIn",'mountresort'),
        "bounceInDown"       =>  esc_attr__("bounceInDown",'mountresort'),
        "bounceInLeft"       =>  esc_attr__("bounceInLeft",'mountresort'),
        "bounceInRight"      =>  esc_attr__("bounceInRight",'mountresort'),
        "bounceInUp"         =>  esc_attr__("bounceInUp",'mountresort'),
        "bounceOut"          =>  esc_attr__("bounceOut",'mountresort'),
        "bounceOutDown"      =>  esc_attr__("bounceOutDown",'mountresort'),
        "bounceOutLeft"      =>  esc_attr__("bounceOutLeft",'mountresort'),
        "bounceOutRight"     =>  esc_attr__("bounceOutRight",'mountresort'),
        "bounceOutUp"        =>  esc_attr__("bounceOutUp",'mountresort'),
        "expandOpen"         =>  esc_attr__("expandOpen",'mountresort'),
        "expandUp"           =>  esc_attr__("expandUp",'mountresort'),
        "fadeIn"             =>  esc_attr__("fadeIn",'mountresort'),
        "fadeInDown"         =>  esc_attr__("fadeInDown",'mountresort'),
        "fadeInDownBig"      =>  esc_attr__("fadeInDownBig",'mountresort'),
        "fadeInLeft"         =>  esc_attr__("fadeInLeft",'mountresort'),
        "fadeInLeftBig"      =>  esc_attr__("fadeInLeftBig",'mountresort'),
        "fadeInRight"        =>  esc_attr__("fadeInRight",'mountresort'),
        "fadeInRightBig"     =>  esc_attr__("fadeInRightBig",'mountresort'),
        "fadeInUp"           =>  esc_attr__("fadeInUp",'mountresort'),
        "fadeInUpBig"        =>  esc_attr__("fadeInUpBig",'mountresort'),
        "fadeOut"            =>  esc_attr__("fadeOut",'mountresort'),
        "fadeOutDownBig"     =>  esc_attr__("fadeOutDownBig",'mountresort'),
        "fadeOutLeft"        =>  esc_attr__("fadeOutLeft",'mountresort'),
        "fadeOutLeftBig"     =>  esc_attr__("fadeOutLeftBig",'mountresort'),
        "fadeOutRight"       =>  esc_attr__("fadeOutRight",'mountresort'),
        "fadeOutUp"          =>  esc_attr__("fadeOutUp",'mountresort'),
        "fadeOutUpBig"       =>  esc_attr__("fadeOutUpBig",'mountresort'),
        "flash"              =>  esc_attr__("flash",'mountresort'),
        "flip"               =>  esc_attr__("flip",'mountresort'),
        "flipInX"            =>  esc_attr__("flipInX",'mountresort'),
        "flipInY"            =>  esc_attr__("flipInY",'mountresort'),
        "flipOutX"           =>  esc_attr__("flipOutX",'mountresort'),
        "flipOutY"           =>  esc_attr__("flipOutY",'mountresort'),
        "floating"           =>  esc_attr__("floating",'mountresort'),
        "hatch"              =>  esc_attr__("hatch",'mountresort'),
        "hinge"              =>  esc_attr__("hinge",'mountresort'),
        "lightSpeedIn"       =>  esc_attr__("lightSpeedIn",'mountresort'),
        "lightSpeedOut"      =>  esc_attr__("lightSpeedOut",'mountresort'),
        "pullDown"           =>  esc_attr__("pullDown",'mountresort'),
        "pullUp"             =>  esc_attr__("pullUp",'mountresort'),
        "pulse"              =>  esc_attr__("pulse",'mountresort'),
        "rollIn"             =>  esc_attr__("rollIn",'mountresort'),
        "rollOut"            =>  esc_attr__("rollOut",'mountresort'),
        "rotateIn"           =>  esc_attr__("rotateIn",'mountresort'),
        "rotateInDownLeft"   =>  esc_attr__("rotateInDownLeft",'mountresort'),
        "rotateInDownRight"  =>  esc_attr__("rotateInDownRight",'mountresort'),
        "rotateInUpLeft"     =>  esc_attr__("rotateInUpLeft",'mountresort'),
        "rotateInUpRight"    =>  esc_attr__("rotateInUpRight",'mountresort'),
        "rotateOut"          =>  esc_attr__("rotateOut",'mountresort'),
        "rotateOutDownRight" =>  esc_attr__("rotateOutDownRight",'mountresort'),
        "rotateOutUpLeft"    =>  esc_attr__("rotateOutUpLeft",'mountresort'),
        "rotateOutUpRight"   =>  esc_attr__("rotateOutUpRight",'mountresort'),
        "shake"              =>  esc_attr__("shake",'mountresort'),
        "slideDown"          =>  esc_attr__("slideDown",'mountresort'),
        "slideExpandUp"      =>  esc_attr__("slideExpandUp",'mountresort'),
        "slideLeft"          =>  esc_attr__("slideLeft",'mountresort'),
        "slideRight"         =>  esc_attr__("slideRight",'mountresort'),
        "slideUp"            =>  esc_attr__("slideUp",'mountresort'),
        "stretchLeft"        =>  esc_attr__("stretchLeft",'mountresort'),
        "stretchRight"       =>  esc_attr__("stretchRight",'mountresort'),
        "swing"              =>  esc_attr__("swing",'mountresort'),
        "tada"               =>  esc_attr__("tada",'mountresort'),
        "tossing"            =>  esc_attr__("tossing",'mountresort'),
        "wobble"             =>  esc_attr__("wobble",'mountresort'),
        "fadeOutDown"        =>  esc_attr__("fadeOutDown",'mountresort'),
        "fadeOutRightBig"    =>  esc_attr__("fadeOutRightBig",'mountresort'),
        "rotateOutDownLeft"  =>  esc_attr__("rotateOutDownLeft",'mountresort')
    );

	return $animations;
}