<?php
if (! class_exists ( 'DTRoomPostType' )) {
	class DTRoomPostType {

		/**
		 * A function constructor calls initially
		 */
		function __construct() {

			// Add Hook into the 'init()' action
			add_action ( 'init', array ( $this, 'dt_init_rooms' ) );

			add_action ( 'admin_init', array ( $this, 'dt_admin_init' ) );

			add_filter( 'cs_framework_options', array( $this, 'dt_room_addon_options')  );

			add_filter( 'cs_metabox_options', array( $this, 'dt_room_addon_metabox_options') );

			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array ( $this, 'dt_template_include' ) );

			add_action( 'widgets_init', array( $this, 'register_sidebars' ) , 100 );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 * Works in both front and back end
		 */
		function dt_init_rooms() {

			$postslug	 	= 'dt_rooms'; 
			$taxslug  		= 'room_entries';
			$singular_name  = __('Room', 'veda-room');
			$plural_name  	= __('Rooms', 'veda-room');
			$tax_sname 		= __( 'Category','veda-room' );	
			$tax_pname    = __( 'Categories','veda-room' );

			if( function_exists( 'mount_resort_cs_get_option' ) ) :
				$postslug 		=	mount_resort_cs_get_option( 'single-room-slug',  $postslug );
				$taxslug  		=	mount_resort_cs_get_option( 'room-category-slug',  $taxslug );
				$singular_name  =	mount_resort_cs_get_option( 'singular-room-name', $singular_name );
				$plural_name	=	mount_resort_cs_get_option( 'plural-room-name', $plural_name );
				$tax_sname	  	=	mount_resort_cs_get_option( 'singular-room-tax-name',$tax_sname );
				$tax_pname		=	mount_resort_cs_get_option( 'plural-room-tax-name', $tax_pname );
			endif;

			$labels = array (
				'name'				=> 	$plural_name,
				'all_items' 		=> 	__ ( 'All ', 'veda-room' ) . $plural_name,
				'singular_name' 	=> 	$singular_name,
				'add_new' 			=> 	__ ( 'Add New', 'veda-room' ),
				'add_new_item' 		=> 	__ ( 'Add New ', 'veda-room' ) . $singular_name,
				'edit_item' 		=> 	__ ( 'Edit ', 'veda-room' ) . $singular_name,
				'new_item' 			=> 	__ ( 'New ', 'veda-room' ) . $singular_name,
				'view_item' 		=> 	__ ( 'View ', 'veda-room' ) . $singular_name,
				'search_items' 		=>	__ ( 'Search ', 'veda-room' ) . $plural_name,
				'not_found' 		=> 	__ ( 'No ', 'veda-room' ) . $plural_name . __ ( ' found', 'veda-room' ),
				'not_found_in_trash' => __ ( 'No ', 'veda-room' ) . $plural_name . __ ( ' found in Trash', 'veda-room' ),
				'parent_item_colon' => 	__ ( 'Parent ', 'veda-room' ) . $singular_name . ':',
				'menu_name' 		=> 	$plural_name
			);
			
			$args = array (
				'labels' => $labels,
				'hierarchical' => false,
				'description' => __( 'This is custom post type ', 'veda-room' ) . $plural_name,
				'supports' => array ( 'title', 'editor', 'comments', 'thumbnail', 'excerpt' ),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 10,
				'menu_icon' => 'dashicons-store',
				'show_in_nav_menus' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'has_archive' => true,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => array( 'slug' => $postslug ),
				'capability_type' => 'post'
			);

			register_post_type ( 'dt_rooms', $args );

			$labels = array(
				'name'              => 	$tax_pname,
				'singular_name'     => 	$tax_sname,
				'search_items'      => 	__( 'Search ', 'veda-room' ) . $tax_pname,
				'all_items'         => 	__( 'All ', 'veda-room' ) . $tax_pname,
				'parent_item'       => 	__( 'Parent ', 'veda-room' ) . $tax_sname,
				'parent_item_colon' => 	__( 'Parent ', 'veda-room' ) . $tax_sname . ':',
				'edit_item'         => 	__( 'Edit ', 'veda-room' ) . $tax_sname,
				'update_item'       => 	__( 'Update ', 'veda-room' ) . $tax_sname,
				'add_new_item'      => 	__( 'Add New ', 'veda-room' ) . $tax_sname,
				'new_item_name'     => 	__( 'New ', 'veda-room') . $tax_sname . __(' Name', 'veda-room' ),
				'menu_name'         => 	$tax_pname
			);

			register_taxonomy ( 'room_entries', array ( 'dt_rooms' 
				), array (
					'hierarchical' 		=> 	true,
					'labels' 			=> 	$labels,
					'show_ui'           => 	true,
					'show_admin_column' => 	true,
					'rewrite' 			=> 	array( 'slug' => $taxslug ),
					'query_var' 		=> 	true 
			) );
		}

		function dt_admin_init() {
			add_filter ( "manage_edit-dt_rooms_columns", array ( $this, "dt_rooms_edit_columns" ) );
			add_action ( "manage_posts_custom_column", array ( $this, "dt_rooms_columns_display" ), 10, 2 );
		}

		function dt_rooms_edit_columns($columns) {
			
			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_room_thumb" => __("Image", "veda-room"),
				"title" => __("Title", "veda-room"),
				"author" => __("Author", "veda-room")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		function dt_rooms_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {
				case "dt_room_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
					endif;				    
				break;
			}
		}

		function dt_room_addon_options( $options ) {

			$cptitle = mount_resort_cs_get_option( 'singular-room-name', esc_html__('Room', 'veda-room') );
			$taxtitle = mount_resort_cs_get_option( 'singular-room-tax-name', esc_html__('Categories', 'veda-room') );

			$options[300] = array(
				'name' => 'cp_rooms',
				'title' => $cptitle,
				'icon' => 'dashicons dashicons-store',
				'fields' => array(
					array(
						'type'    => 'subheading',
						'content' => esc_html__( "$cptitle Archive Settings", 'veda-room' ),
					),

					array(
						'id'      	 => 'rooms-archive-page-layout',
						'type'         => 'image_select',
						'title'        => esc_html__('Page Layout', 'veda-room' ),
						'options'      => array(
							'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
							'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
							'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
							'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
						),
						'default'      => 'content-full-width',
						'attributes'   => array( 'data-depend-id' => 'rooms-archive-page-layout' )
					),

					array(
						'id'  		 => 'show-standard-left-sidebar-for-room-archive',
						'type'  		 => 'switcher',
						'title' 		 => esc_html__('Show Standard Left Sidebar', 'veda-room' ),
						'dependency'   => array( 'rooms-archive-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
					),

					array(
						'id'  		 => 'show-standard-right-sidebar-for-room-archive',
						'type'  		 => 'switcher',
						'title' 		 => esc_html__('Show Standard Right Sidebar', 'veda-room' ),
						'dependency'   => array( 'rooms-archive-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
					),

					array(
						'id'		=> 'rooms-archive-post-layout',
						'type'      => 'image_select',
						'title'     => esc_html__('Post Layout', 'veda-room' ),
						'options'   => array(
							'thumb' => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/thumb.png',			
							'one-column'   		=> MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-column.png',
							'one-half-column'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-half-column.png',
							'one-third-column'  => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-third-column.png',
							'one-fourth-column' => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',			
						),
						'default'	=> 'one-half-column'
					),

			  		array(
			  			'type'    => 'subheading',
			  			'content' => esc_html__( "$cptitle Custom Fields", 'veda-room' ),
			  		),

			  		array(
			  			'id'              => 'rooms-custom-fields',
			  			'type'            => 'group',
			  			'title'           => esc_html__('Custom Fields','veda-room' ),
			  			'info'            => esc_html__('Click button to add custom fields','veda-room' ),
			  			'button_title'    => esc_html__('Add New Field','veda-room' ),
			  			'accordion_title' => esc_html__('Adding New Custom Field','veda-room' ),
			  			'fields'          => array(
			  				array(
			  					'id'          => 'rooms-custom-fields-text',
			  					'type'        => 'text',
			  					'title'       => esc_html__('Enter Label','veda-room' ),
			  				),

			  				array(
			  					'id'          => 'rooms-custom-fields-icon',
			  					'type'        => 'icon',
			  					'title'       => esc_html__('Icon','veda-room' ),
			  				),			  				
			  			),
					),

					array(
						'type'    => 'subheading',
						'content' => esc_html__( 'Permalinks', 'veda-room' ),
					),

					array(
						'id'      => 'single-room-slug',
						'type'    => 'text',
						'title'   => esc_html__('Single Room Slug','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. room-item After made changes save permalinks.','veda-room').'</p>',
			    	),

					array(
						'id'      => 'room-category-slug',
						'type'    => 'text',
						'title'   => esc_html__('Room Category Slug','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. room type After made changes save permalinks.','veda-room').'</p>',
			    	), 

					array(
						'id'      => 'singular-room-name',
						'type'    => 'text',
						'title'   => esc_html__('Singular Room Name','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Room", save options & reload.','veda-room').'</p>',
			    	),

					array(
						'id'      => 'plural-room-name',
						'type'    => 'text',
						'title'   => esc_html__('Plural Room Name','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Rooms", save options & reload.','veda-room').'</p>',
			    	),

					array(
						'id'      => 'singular-room-tax-name',
						'type'    => 'text',
						'title'   => esc_html__('Singular Room Name','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Category", save options & reload.','veda-room').'</p>',
			    	),
			    	
					array(
						'id'      => 'plural-room-tax-name',
						'type'    => 'text',
						'title'   => esc_html__('Plural Room Name','veda-room'),
						'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Categories", save options & reload.','veda-room').'</p>',
			    	),
  				)
			);

			return $options;
		}

		function dt_room_addon_metabox_options( $options ) {

			$cf_rooms_fields = array();
			$cf_rooms_fields[] = array(
				'id'    => 'sub_title',
				'type'  => 'text',
				'title' => esc_html__('Sub Title','veda-room'),
				'desc' => esc_html__('"You can set sub title.','veda-room')
			);
			
			$cf_rooms_fields[] = array(
				'id'    => 'no_beds',
				'type'  => 'text',
				'title' => esc_html__('No.of Beds','veda-room'),
				'desc' => esc_html__('"You can given no.of beds in room.','veda-room')
			);

			$cf_rooms_fields[] = array(
				'id'    => 'no_people',
				'type'  => 'text',
				'title' => esc_html__('No.of People','veda-room'),
				'desc' => esc_html__('You can given no.of people in room.','veda-room')
			);

			$cf_rooms_fields[] = array(
				'id'    => 'room_size',
				'type'  => 'text',
				'title' => esc_html__('Room Size','veda-room'),
				'desc' => esc_html__('You can given size of room.','veda-room')
			);

			$cf_rooms_fields[] = array(
				'id'    => 'ac_nonac',
				'type'  => 'text',
				'title' => esc_html__('AC / Non AC','veda-room'),
				'desc' => esc_html__('You can given ac / non-ac of room.','veda-room')
			);

			$cf_rooms_fields[] = array(
				'id'    => 'price',
				'type'  => 'text',
				'title' => esc_html__('Price / Ngt','veda-room'),
				'desc' => esc_html__('You can given room price.','veda-room')
			);

			$cf_rooms_fields[] = array(
				'id'    => 'offer',
				'type'  => 'text',
				'title' => esc_html__('Offer Text','veda-room'),
				'desc' => esc_html__('You can given room offer.','veda-room')
			);
									
			$cf_rooms = mount_resort_cs_get_option( 'rooms-custom-fields', array() );
			foreach( $cf_rooms as $key => $fields ) {

				$cf_rooms_fields[] = array(
					'id'    => 'rooms-custom-fields-text-'.$key,
					'type'  => 'text',
					'title' => $fields['rooms-custom-fields-text']
				);
			}

			$options[] = array(
				'id'        => '_custom_settings',
				'title'     => esc_html__('Settings','veda-room'),
				'post_type' => 'dt_rooms',
				'context'   => 'normal',
				'priority'  => 'high',
				'sections'  => array(
					array(
						'name'  => 'layout_section',
						'title' => esc_html__('Layout', 'veda-room'),
						'icon'  => 'fa fa-cog',
						'fields' =>  array(

							array(
								'id'  => 'layout',
								'type' => 'image_select',
								'title' => esc_html__('Page Layout', 'veda-room' ),
								'options'      => array(
									'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
									'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
									'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
									'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
								),
								'default'      => 'content-full-width',
								'attributes'   => array( 'data-depend-id' => 'page-layout' )
							),

							array(
								'id'  		 	=> 'show-standard-sidebar-left',
								'type'  		=> 'switcher',
								'title' 		=> esc_html__('Show Standard Left Sidebar', 'veda-room' ),
								'dependency'	=> array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
							),

							array(
								'id'  		 	=> 'widget-area-left',
								'type'  		=> 'select',
								'title' 		=> esc_html__('Choose Left Widget Areas', 'veda-room' ),
								'class'         => 'chosen',
								'options'		=> mount_resort_custom_widgets(),
								'attributes'    => array( 
									'multiple' => 'multiple',
									'data-placeholder' => esc_html__('Select Left Widget Areas','veda-room'),
									'style' => 'width: 400px;'
								),
								'dependency'	=> array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
							),

							array(
								'id'  		 => 'show-standard-sidebar-right',
								'type'  		 => 'switcher',
								'title' 		 => esc_html__('Show Standard Right Sidebar', 'veda-room' ),
								'dependency'   => array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
							),

							array(
								'id'  		 	=> 'widget-area-right',
								'type'  		=> 'select',
								'title' 		=> esc_html__('Choose Right Widget Areas', 'veda-room' ),
								'class'         => 'chosen',
								'options'		=> mount_resort_custom_widgets(),
								'attributes'    => array( 
									'multiple' => 'multiple',
									'data-placeholder' => esc_html__('Select Right Widget Areas','veda-room'),
									'style' => 'width: 400px;'
								),
								'dependency'	=> array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
							),							
						)
					),

					array(
						'name'  => 'custom_fields_section',
						'title' => esc_html__('Custom Fields', 'veda-room'),
						'icon'  => 'fa fa-hand-o-right',
						'fields' => $cf_rooms_fields
					),

					array(
						'name'  => 'gallery_section',
						'title' => esc_html__('Gallery', 'veda-room'),
						'icon'  => 'fa fa-image',
						'fields' =>  array(

							array(
								'id'          => 'gallery',
								'type'        => 'gallery',
								'title'       => esc_html__('Add Images','veda-room'),
								'add_title'   => esc_html__('Add Image(s)','veda-room'),
								'edit_title'  => esc_html__('Edit Image(s)','veda-room'),
								'clear_title' => esc_html__('Clear Image(s)','veda-room'),
							),
						)
					),					

				)				
			);

			return $options;
		}

		function dt_template_include( $template ) {

			if (is_singular( 'dt_rooms' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_rooms.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_rooms.php';
				}
			} elseif (is_tax ( 'room_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-room_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-room_entries.php';
				}
			}
			return $template;
		}

		function register_sidebars() {

			$layout = "";
			$layout = cs_get_option('rooms-archive-page-layout');

			$layout = !empty($layout) ? $layout : "content-full-width";
			$wtstyle = cs_get_option( 'wtitle-style' );
			
			$before_title = '<h3 class="widgettitle">';
			$after_title = '</h3>';
		
			if( $wtstyle == 'type17' ):
				$before_title = ' <div class="mz-title"> <div class="mz-title-content"> <h3 class="widgettitle">';
				$after_title  = '</h3> </div> </div>';
			elseif( $wtstyle == 'type18' ):
				$before_title = ' <div class="mz-stripe-title"> <div class="mz-stripe-title-content"> <h3 class="widgettitle">';
				$after_title  = '</h3> </div> </div>';
			endif;
			
			switch($layout) :
				case 'with-left-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Rooms Archive | Left Sidebar",'veda-room'),
						'id'			=>	'rooms-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of Rooms Archive Page.","veda-room"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-right-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Rooms Archive | Right Sidebar",'veda-room'),
						'id'			=>	'rooms-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of Rooms Archive Page.","veda-room"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;

				case 'with-both-sidebar':
					register_sidebar(array(
						'name' 			=>	esc_html__("Rooms Archive | Left Sidebar",'veda-room'),
						'id'			=>	'rooms-archives-sidebar-left',
						'description'   =>  esc_html__("Appears in the Left side of Rooms Archive Page.","veda-room"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));

					register_sidebar(array(
						'name' 			=>	esc_html__("Rooms Archive | Right Sidebar",'veda-room'),
						'id'			=>	'rooms-archives-sidebar-right',
						'description'   =>  esc_html__("Appears in the Right side of Rooms Archive Page.","veda-room"),
						'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
						'after_widget' 	=> 	'</aside>',
						'before_title' 	=> 	$before_title,
						'after_title' 	=> 	$after_title));
				break;
			endswitch;
		}
	}
}?>