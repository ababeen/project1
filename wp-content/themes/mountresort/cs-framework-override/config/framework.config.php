<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Mount Resort '.esc_html__('Options', 'mountresort'),
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'mount-resort-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Mount Resort',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// ------------------------------
// General                       
// ------------------------------
$options[10]      = array(
	'name'        => 'general',
	'title'       => esc_html__('General', 'mountresort'),
	'icon'        => 'fa fa-gears',
	'fields'      => array(
		array(
			'type'    => 'subheading',
			'content' => esc_html__( 'General Options', 'mountresort' ),
		),

		array(
			'id'  	 	=> 'show-pagecomments',
			'type'	 	=> 'switcher',
			'title'		=> esc_html__('Globally Show Page Comments', 'mountresort'),
			'default'	=> true,
			'info'	 	=> esc_html__('YES! to show comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings.', 'mountresort')
		),

		array(
			'id'  	 => 'showall-pagination',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show all pages in Pagination', 'mountresort'),
			'info'	 => esc_html__('YES! to show all the pages instead of dots near the current page.', 'mountresort')
		),

		array(
			'id'  	 => 'enable-stylepicker',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Style Picker', 'mountresort'),
			'info'	 => esc_html__('YES! to show the style picker.', 'mountresort')
		),

		array(
			'id'      => 'google-map-key',
			'type'    => 'text',
			'title'   => esc_html__('Google Map API Key','mountresort'),
			'attributes' => array(
				'placeholder' => 'GNIzaSyKIHOTR6h1tdLOWv01IrJj6lss2LISnatYq0'
			),
			'after' 	=> '<p class="cs-text-info">'.__('Put a valid google account api key here','mountresort').'</p>',
		),
		array(
			'id'      => 'mailchimp-key',
			'type'    => 'text',
			'title'   => esc_html__('Mailchimp API Key','mountresort'),
			'attributes' => array( 
				'placeholder' => 'b5G4SaN1d38eb2547dh601a324kajaA4da4lao3-us3'
			),
			'after' 	=> '<p class="cs-text-info">'.__('Put a valid mailchimp account api key here','mountresort').'</p>',
		),
	),
);

// ------------------------------
// General Page Options                       
// ------------------------------
$options[20]      = array(
	'name'        => 'allpage_options',
	'title'       => esc_html__('All Page Options', 'mountresort'),
	'icon'        => 'fa fa-files-o',
	'sections' => array(

		// -----------------------------------------
		// Post Options
		// -----------------------------------------		
		array(
		  	'name'      => 'post_options',
		  	'title'     => 'Post Options',
		  	'icon'      => 'fa fa-file',
		  	'fields'      => array(
		  		array(
		  			'type'    => 'subheading',
		  			'content' => esc_html__( "Single Post Options", 'mountresort' ),
		  		),
		  		array(
		  			'id'  		 => 'single-post-authorbox',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Single Author Box','mountresort'),
		  			'info'		 => esc_html__('YES! to display author box in single blog posts.','mountresort')
		  		),
		  		array(
		  			'id'  		 => 'single-post-related',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Single Related Posts','mountresort'),
		  			'info'		 => esc_html__('YES! to display related blog posts in single posts.','mountresort')
		  		),
		  		array(
		  			'id'  		 => 'single-post-comments',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Posts Comments','mountresort'),
		  			'info'		 => esc_html__('YES! to display single blog post comments.','mountresort'),
		  			'default' => true,
		  		),
		  		array(
		  			'type'    => 'subheading',
		  			'content' => esc_html__( "Post Archives Page Layout", 'mountresort' ),
		  		),
		  		array(
		  			'id'      	 => 'post-archives-page-layout',
		  			'type'       => 'image_select',
		  			'title'      => esc_html__('Page Layout','mountresort'),
		  			'options'    => array(
		  				'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
		  				'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
		  				'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
		  				'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
		  			),
		  			'default'      => 'content-full-width',
		  			'attributes'   => array( 'data-depend-id' => 'post-archives-page-layout'),
		  		),
		  		array(
		  			'id'  		 => 'show-standard-left-sidebar-for-post-archives',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Show Standard Left Sidebar','mountresort'),
		  			'dependency' => array( 'post-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  		),
		  		array(
		  			'id'  		 => 'show-standard-right-sidebar-for-post-archives',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Show Standard Right Sidebar','mountresort'),
		  			'dependency' => array( 'post-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  		),

		  		array(
		  			'type'    => 'subheading',
		  			'content' => esc_html__( "Post Archives Post Layout", 'mountresort' ),
		  		),
		  		array(
		  			'id'      	   => 'post-archives-post-layout',
		  			'type'         => 'image_select',
		  			'title'        => esc_html__('Post Layout','mountresort' ),
		  			'options'      => array(
		  				'one-column' 		  => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-column.png',
		  				'one-half-column'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-half-column.png',
		  				'one-third-column'  => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-third-column.png',
		  			),
		  			'default'      => 'one-half-column',
		  		),
		  		array(
		  			'id'  		 => 'post-archives-enable-excerpt',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Allow Excerpt','mountresort' ),
		  			'info'		 => esc_html__('YES! to allow excerpt','mountresort' ),
		  			'default'    => true,
		  		),
		  		array(
		  			'id'  		 => 'post-archives-excerpt',
		  			'type'  	 => 'number',
		  			'title' 	 => esc_html__('Excerpt Length','mountresort' ),
		  			'after'		 => '<span class="cs-text-desc"> '.__('Put Excerpt Length','mountresort' ).'</span>',
		  			'default' 	 => 40,
		  		),
		  		array(
		  			'id'  		 => 'post-archives-enable-readmore',
		  			'type'  	 => 'switcher',
		  			'title' 	 => esc_html__('Read More','mountresort' ),
		  			'info'		 => esc_html__('YES! to enable read more button','mountresort' ),
		  			'default'	 => true,
		  		),
		  		array(
		  			'id'  		 => 'post-archives-readmore',
		  			'type'  	 => 'textarea',
		  			'title' 	 => esc_html__('Read More Shortcode','mountresort' ),
		  			'info'		 => esc_html__('Paste any button shortcode here','mountresort' ),
		  			'default'	 => '[dt_sc_button title="Read More" style="filled" icon_type="fontawesome" iconalign="icon-right with-icon" iconclass="fa fa-long-arrow-right"]',
		  		),
		  		array(
		  			'type'    => 'subheading',
		  			'content' => esc_html__( "Single Post & Post Archive options", 'mountresort' ),
		  		),
		  		array(
		  			'id'           => 'post-style',
		  			'type'         => 'select',
		  			'title'        => esc_html__('Post Style','mountresort' ),
		  			'options'      => array(
		  				'default'      				 => __('Default','mountresort'),
		  				'entry-date-left'      	  => __('Title & Icons Overlay','mountresort'),
		  				'entry-date-author-left'  => __('Title Overlay','mountresort'),
		  				'blog-medium-style'       => __('Icons Only','mountresort'),
		  				'blog-medium-style dt-blog-medium-highlight'   => __('Classic','mountresort'),
		  				'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight'  => __('Minimal Icons','mountresort'),
		  			),
		  			'class'        => 'chosen',
		  			'default'      => 'default',
		  			'info'       	 => esc_html__('Choose post style to display single blog posts and archives.','mountresort'),
		  		),
		  		array(
		  			'id'      => 'post-format-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Post Format Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post format meta information','mountresort' ),
		  			'default' => true
		  		),
		  		array(
		  			'id'      => 'post-author-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Author Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post author meta information','mountresort' ),
		  			'default' => true
		  		),
		  		array(
		  			'id'      => 'post-date-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Date Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post date meta information','mountresort'),
		  			'default' => true
		  		),
		  		array(
		  			'id'      => 'post-comment-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Comment Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post comment meta information','mountresort'),
		  			'default' => true
		  		),
		  		array(
		  			'id'      => 'post-category-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Category Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post category information','mountresort'),
		  			'default' => true
		  		),
		  		array(
		  			'id'      => 'post-tag-meta',
		  			'type'    => 'switcher',
		  			'title'   => esc_html__('Tag Meta', 'mountresort' ),
		  			'info'	  => esc_html__('YES! to show post tag information','mountresort'),
		  			'default' => true
		  		),
			),
		),

		// -----------------------------------------
		// 404 Options
		// -----------------------------------------
		array(
			'name'      => '404_options',
			'title'     => esc_html__('404 Options','mountresort'),
			'icon'      => 'fa fa-warning',
			'fields'    => array(

				array(
					'type'    => 'subheading',
					'content' => esc_html__( "404 Message", 'mountresort' ),
				),

				array(
					'id'      => 'enable-404message',
					'type'    => 'switcher',
					'title'   => esc_html__('Enable Message', 'mountresort' ),
					'info'	  => esc_html__('YES! to enable not-found page message.','mountresort' ),
					'default' => true
				),

				array(
					'id'           => 'notfound-style',
					'type'         => 'select',
					'title'        => esc_html__('Template Style','mountresort' ),
					'options'      => array(
						'type1'	   => esc_html__('Modern','mountresort' ),
						'type2'    => esc_html__('Classic','mountresort' ),
						'type4'    => esc_html__('Diamond','mountresort' ),
						'type5'    => esc_html__('Shadow','mountresort' ),
						'type6'    => esc_html__('Diamond Alt','mountresort' ),
						'type7'    => esc_html__('Stack','mountresort' ),
						'type8'    => esc_html__('Minimal','mountresort' ),
					),
					'class'        => 'chosen',
					'default'      => 'type1',
					'info'         => esc_html__('Choose the style of not-found template page.','mountresort' ),
				),

				array(
					'id'      => 'notfound-darkbg',
					'type'    => 'switcher',
					'title'   => esc_html__('404 Dark BG', 'mountresort' ),
					'info'	  => esc_html__('YES! to use dark bg notfound page for this site.','mountresort' ),
				),

				array(
					'id'           => 'notfound-pageid',
					'type'         => 'select',
					'title'        => esc_html__('Custom Page','mountresort' ),
					'options'      => 'pages',
					'class'        => 'chosen',
					'default_option' => esc_html__('Choose the page','mountresort' ),
					'info'       	 => esc_html__('Choose the page for not-found content.','mountresort' ),
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__("Background Options", 'mountresort' ),
				),

				array(
					'id'    => 'notfound_background',
					'type'  => 'background',
					'title' => esc_html__('Background','mountresort' ),
				),

				array(
					'id'  		 => 'notfound-bg-style',
					'type'  	 => 'textarea',
					'title' 	 => esc_html__('Custom Styles','mountresort' ),
					'info'		 => esc_html__('Paste custom CSS styles for not found page.','mountresort' ),
				),			  
			),
		),
	
		// -----------------------------------------
		// Under construction Options
		// -----------------------------------------
		array(
			'name'      => 'comingsoon_options',
			'title'     => esc_html__('Under Construction Options','mountresort' ),
			'icon'      => 'fa fa-thumbs-down',
			'fields'      => array(

				array(
					'type'    => 'subheading',
					'content' => esc_html__("Under Construction", 'mountresort' ),
				),

				array(
					'id'      => 'enable-comingsoon',
					'type'    => 'switcher',
					'title'   => esc_html__('Enable Coming Soon', 'mountresort' ),
					'info'	  => esc_html__('YES! to check under construction page of your website.','mountresort' ),
				),

				array(
					'id'           => 'comingsoon-style',
					'type'         => 'select',
					'title'        => 'Template Style',
					'options'      => array(
						'type1'    => esc_html__('Diamond','mountresort' ),
						'type2'    => esc_html__('Teaser','mountresort' ),
						'type3'    => esc_html__('Minimal','mountresort' ),
						'type4'    => esc_html__('Counter Only','mountresort' ),
						'type5'    => esc_html__('Belt','mountresort' ),
						'type6'    => esc_html__('Classic','mountresort' ),
						'type7'    => esc_html__('Boxed','mountresort' ),
					),
					'class'        => 'chosen',
					'default'      => 'type1',
					'info'         => esc_html__('Choose the style of coming soon template.','mountresort' ),
				),

				array(
					'id'      => 'uc-darkbg',
					'type'    => 'switcher',
					'title'   => esc_html__('Coming Soon Dark BG', 'mountresort' ),
					'info'	  => esc_html__('YES! to use dark bg coming soon page for this site.','mountresort' ),
				),

				array(
					'id'           => 'comingsoon-pageid',
					'type'         => 'select',
					'title'        => esc_html__('Custom Page','mountresort' ),
					'options'      => 'pages',
					'class'        => 'chosen',
					'default_option' => esc_html__('Choose the page','mountresort' ),
					'info'       	 => esc_html__('Choose the page for comingsoon content.','mountresort' ),
				),

				array(
					'id'      => 'show-launchdate',
					'type'    => 'switcher',
					'title'   => esc_html__('Show Launch Date', 'mountresort' ),
					'info'	  => esc_html__('YES! to show launch date text.','mountresort' ),
				),

				array(
					'id'      => 'comingsoon-launchdate',
					'type'    => 'text',
					'title'   => esc_html__('Launch Date','mountresort'),
					'attributes' => array( 
						'placeholder' => '10/30/2016 12:00:00'
					),
					'after' 	=> '<p class="cs-text-info">'.__('Put Format:','mountresort').' 12/30/2016 12:00:00 month/day/year hour:minute:second</p>',
				),

				array(
					'id'           => 'comingsoon-timezone',
					'type'         => 'select',
					'title'        => esc_html__('UTC Timezone','mountresort'),
					'options'      => array(
						'-12' => '-12', '-11' => '-11', '-10' => '-10', '-9' => '-9', '-8' => '-8', '-7' => '-7', '-6' => '-6', '-5' => '-5', 
						'-4' => '-4', '-3' => '-3', '-2' => '-2', '-1' => '-1', '0' => '0', '+1' => '+1', '+2' => '+2', '+3' => '+3', '+4' => '+4',
						'+5' => '+5', '+6' => '+6', '+7' => '+7', '+8' => '+8', '+9' => '+9', '+10' => '+10', '+11' => '+11', '+12' => '+12'
					),
					'class'        => 'chosen',
					'default'      => '0',
					'info'         => esc_html__('Choose utc timezone, by default UTC:00:00','mountresort'),
				),

				array(
					'id'    => 'comingsoon_background',
					'type'  => 'background',
					'title' => esc_html__('Background','mountresort'),
				),

				array(
					'id'  		 => 'comingsoon-bg-style',
					'type'  	 => 'textarea',
					'title' 	 => esc_html__('Custom Styles','mountresort'),
					'info'		 => esc_html__('Paste custom CSS styles for under construction page.','mountresort'),
				),
			),
		),
  	),
);

// -----------------------------------------
// Widget area Options
// -----------------------------------------
$options[30]      = array(
	'name'        => 'widgetarea_options',
	'title'       => esc_html__('Widget Area', 'mountresort'),
	'icon'        => 'fa fa-trello',
	'fields'      => array(
		array(
			'type'    => 'subheading',
			'content' => esc_html__( "Custom Widget Area for Sidebar", 'mountresort' ),
		),
		array(
			'id'           => 'wtitle-style',
			'type'         => 'select',
			'title'        => esc_html__('Sidebar widget Title Style','mountresort' ),
			'options'      => array(
				'type1'	   => esc_html__( 'Double Border','mountresort'),
				'type2'    => esc_html__( 'Tooltip','mountresort'),
				'type3'    => esc_html__( 'Title Top Border','mountresort'),
				'type4'    => esc_html__( 'Left Border & Pattren','mountresort'),
				'type5'    => esc_html__( 'Bottom Border','mountresort'),
				'type6'    => esc_html__( 'Tooltip Border','mountresort'),
				'type7'    => esc_html__( 'Boxed Modern','mountresort'),
				'type8'    => esc_html__( 'Elegant Border','mountresort'),
				'type9'    => esc_html__( 'Needle','mountresort'),
				'type10'   => esc_html__( 'Ribbon','mountresort'),
				'type11'   => esc_html__( 'Content Background','mountresort'),
				'type12'   => esc_html__( 'Classic BG','mountresort'),
				'type13'   => esc_html__( 'Tiny Boders','mountresort'),
				'type14'   => esc_html__( 'BG & Border','mountresort'),
				'type15'   => esc_html__( 'Classic BG Alt','mountresort'),
				'type16'   => esc_html__( 'Left Border & BG','mountresort'),
				'type17'   => esc_html__( 'Basic','mountresort'),
				'type18'   => esc_html__( 'BG & Pattern','mountresort'),
			),
			'class'          => 'chosen',
			'default_option' => 'Choose any type',
			'info'           => 'Choose the style of sidebar widget title.',
		),
		array(
			'id'              => 'widgetarea-custom',
			'type'            => 'group',
			'title'           => esc_html__('Custom Widget Area','mountresort'),
			'button_title'    => esc_html__('Add New','mountresort'),
			'accordion_title' => esc_html__('Add New Widget Area','mountresort'),
			'fields'          => array(
				array(
					'id'          => 'widgetarea-custom-name',
					'type'        => 'text',
					'title'       => esc_html__('Name','mountresort'),
				),
			)
		),
	),
);

// -----------------------------------------
// Hook Options
// -----------------------------------------
$options[40]      = array(
	'name'        => 'hook_options',
	'title'       => esc_html__('Hooks', 'mountresort'),
	'icon'        => 'fa fa-paperclip',
	'fields'      => array(
		array(
			'type'    => 'subheading',
			'content' => esc_html__( "Top Hook", 'mountresort' ),
		),
		array(
			'id'  	=> 'enable-top-hook',
			'type'  => 'switcher',
			'title' => esc_html__('Enable Top Hook','mountresort' ),
			'info'	=> esc_html__("YES! to enable top hook.",'mountresort' ),
		),
		array(
			'id'  		 => 'top-hook',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Top Hook','mountresort' ),
			'info'		 => esc_html__('Paste your top hook, Executes after the opening &lt;body&gt; tag.','mountresort' ),
		),
		array(
			'type'    => 'subheading',
			'content' => esc_html__( "Content Before Hook", 'mountresort' ),
		),
		array(
			'id'  	=> 'enable-content-before-hook',
			'type'  => 'switcher',
			'title' => esc_html__('Enable Content Before Hook','mountresort' ),
			'info'	=> esc_html__("YES! to enable content before hook.",'mountresort' ),
		),
		array(
			'id'  		 => 'content-before-hook',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Content Before Hook','mountresort' ),
			'info'		 => esc_html__('Paste your content before hook, Executes before the opening &lt;#primary&gt; tag.','mountresort' ),
		),
		array(
			'type'    => 'subheading',
			'content' => esc_html__( "Content After Hook", 'mountresort' ),
		),
		array(
			'id'  	=> 'enable-content-after-hook',
			'type'  => 'switcher',
			'title' => esc_html__('Enable Content After Hook','mountresort' ),
			'info'	=> esc_html__("YES! to enable content after hook.",'mountresort' ),
		),
		array(
			'id'  		 => 'content-after-hook',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Content After Hook','mountresort' ),
			'info'		 => esc_html__('Paste your content after hook, Executes after the closing &lt;/#main&gt; tag.','mountresort' ),
		),
		array(
			'type'    => 'subheading',
			'content' => esc_html__( "Bottom Hook", 'mountresort' ),
		),
		array(
			'id'  	=> 'enable-bottom-hook',
			'type'  => 'switcher',
			'title' => esc_html__('Enable Bottom Hook','mountresort' ),
			'info'	=> esc_html__("YES! to enable bottom hook.",'mountresort' ),
		),
		array(
			'id'  		 => 'bottom-hook',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Bottom Hook','mountresort' ),
			'info'		 => esc_html__('Paste your bottom hook, Executes after the closing &lt;/body&gt; tag.','mountresort' ),
		),
	),
);

// -----------------------------------------
// Woocommerce Options
// -----------------------------------------
if( function_exists( 'is_woocommerce' ) ){

	$options[100]      = array(
		'name'        => 'woocommerce_options',
		'title'       => esc_html__('Woocommerce', 'mountresort'),
		'icon'        => 'fa fa-shopping-cart',
		'fields'      => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__( "Woocommerce Shop Page Options", 'mountresort' ),
			),
			array(
				'id'  		 => 'shop-product-per-page',
				'type'  	 => 'number',
				'title' 	 => 'Products Per Page',
				'after'		 => '<span class="cs-text-desc">'.esc_html__( 'Number of products to show in catalog / shop page','mountresort').'</span>',
				'default' 	 => 12,
			),
			array(
				'id'           => 'product-style',
				'type'         => 'select',
				'title'        => esc_html__('Product Style','mountresort'),
				'options'      => array(
					'type1'	   => esc_html__('Thick Border','mountresort'),
					'type2'    => esc_html__('Pattern Overlay','mountresort'),
					'type3'    => esc_html__('Thin Border','mountresort'),
					'type4'    => esc_html__('Diamond Icons','mountresort'),
					'type5'    => esc_html__('Girly','mountresort'),
					'type6'    => esc_html__('Push Animation','mountresort'),
					'type7'    => esc_html__('Dual Color BG','mountresort'),
					'type8'	   => esc_html__('Modern','mountresort'),
					'type9'    => esc_html__('Diamond & Border','mountresort'),
					'type10'   => esc_html__('Easing','mountresort'),
					'type11'   => esc_html__('Boxed','mountresort'),
					'type12'   => esc_html__('Easing Alt','mountresort'),
					'type13'   => esc_html__('Parallel','mountresort'),
					'type14'   => esc_html__('Pointer','mountresort'),
					'type15'   => esc_html__('Diamond Flip','mountresort'),
					'type16'   => esc_html__('Stack','mountresort'),
					'type17'   => esc_html__('Bouncy','mountresort'),
					'type18'   => esc_html__('Hexagon','mountresort'),
					'type19'   => esc_html__('Masked Diamond','mountresort'),
					'type20'   => esc_html__('Masked Circle','mountresort'),
					'type21'   => esc_html__('Classic','mountresort'),
				),
				'class'        => 'chosen',
				'default' 	   => 'type1',
				'info'         => esc_html__('Choose products style to display shop & archive pages.','mountresort'),
		  	),
		  	array(
		  		'id'      	 => 'shop-page-product-layout',
				'type'       => 'image_select',
				'title'      => esc_html__('Product Layout','mountresort'),
				'options'    => array(
					'one-half-column'     => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-half-column.png',
					'one-third-column'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-third-column.png',
					'one-fourth-column'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
				),
				'default'      => 'one-third-column',
				'attributes'   => array( 'data-depend-id' => 'shop-page-product-layout' ),
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__( "Product Detail Page Options", 'mountresort' ),
			),
			array(
				'id'      	   => 'product-layout',
				'type'         => 'image_select',
				'title'        => esc_html__('Layout', 'mountresort'),
				'options'      => array(
					'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				),
				'default'      => 'content-full-width',
				'attributes'   => array( 'data-depend-id' => 'product-layout' ),
			),
			array(
				'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'mountresort'),
				'dependency'   	 => array( 'product-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
			),
			array(
				'id'  			 => 'show-shop-standard-right-sidebar-for-product-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Right Sidebar','mountresort' ),
				'dependency' 	 => array( 'product-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
			),
			array(
				'id'  		 	 => 'enable-related',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Related Products','mountresort' ),
				'info'	  		 => "YES! to display related products on single product's page."
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__( "Product Category Page Options", 'mountresort' ),
			),
			array(
				'id'      	   => 'product-category-layout',
				'type'         => 'image_select',
				'title'        => esc_html__('Layout','mountresort' ),
				'options'      => array(
					'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				),
				'default'      => 'content-full-width',
				'attributes'   => array( 'data-depend-id' => 'product-category-layout', ),
			),
			array(
				'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-category-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Left Sidebar','mountresort' ),
				'dependency'   	 => array( 'product-category-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
			),
			array(
				'id'  			 => 'show-shop-standard-right-sidebar-for-product-category-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Right Sidebar','mountresort' ),
				'dependency' 	 => array( 'product-category-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__( "Product Tag Page Options", 'mountresort' ),
			),
			array(
				'id'      	   => 'product-tag-layout',
				'type'         => 'image_select',
				'title'        => esc_html__('Layout','mountresort' ),
				'options'      => array(
					'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				),
				'default'      => 'content-full-width',
				'attributes'   => array( 'data-depend-id' => 'product-tag-layout' ),
			),
			array(
				'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-tag-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Left Sidebar','mountresort' ),
				'dependency'   	 => array( 'product-tag-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
			),
			array(
				'id'  			 => 'show-shop-standard-right-sidebar-for-product-tag-layout',
				'type'  		 => 'switcher',
				'title' 		 => esc_html__('Show Shop Standard Right Sidebar','mountresort' ),
				'dependency' 	 => array( 'product-tag-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
			),
		),
	);
}

// ------------------------------
// backup                       
// ------------------------------
$options[999]   = array(
	'name'     => 'backup_section',
	'title'    => 'Backup',
	'icon'     => 'fa fa-shield',
	'fields'   => array(
  		array(
  			'type'    => 'notice',
  			'class'   => 'warning',
  			'content' => esc_html__('You can save your current options. Download a Backup and Import.','mountresort'),
  		),
  		array(
  			'type'    => 'backup',
  		),
  	)
);

// ------------------------------
// license                      
// ------------------------------
$options[1000]   = array(
	'name'     => 'theme_version',
	'title'    => constant('MOUNT_RESORT_THEME_NAME').esc_html__(' Log', 'mountresort'),
	'icon'     => 'fa fa-info-circle',
	'fields'   => array(
  		array(
  			'type'    => 'heading',
  			'content' => constant('MOUNT_RESORT_THEME_NAME').' '.esc_html__('Theme Change Log','mountresort')
  		),

  		array(
  			'type'    => 'content',
  			'content' => '<pre>2017.06.08 - version 1.1 <br/>* Improved Demo Content <br/>* Included Premium EForm Plugin </pre>',
  		),
		

  		array(
  			'type'    => 'content',
  			'content' => '<pre>2017.05.26 - version 1.0 <br/>* First release!</pre>',
  		),
  	)
);
CSFramework::instance( $settings, $options );