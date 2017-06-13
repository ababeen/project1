<?php
if (! class_exists ( 'DTPortfolioPostType' )) {
	class DTPortfolioPostType {
		
		/**
		 * A function constructor calls initially
		 */
		function __construct() {
			// Add Hook into the 'init()' action
			add_action ( 'init', array ( $this, 'dt_init' ) );
			
			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array ( $this, 'dt_admin_init' ) );
			
			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array ( $this, 'dt_template_include' ) );
			
			add_filter ( 'cs_metabox_options', array ( $this, 'dt_portfolio_cs_metabox_options'  ) );

			add_filter ( 'cs_framework_options', array ( $this, 'dt_portfolio_cs_framework_options'  ) );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			$this->createPostType ();
		}

		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			add_filter ( "manage_edit-dt_portfolios_columns", array (
					$this,
					"dt_portfolios_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_portfolios_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {

			$portslug = mount_resort_cs_get_option( 'single-portfolio-slug', 'dt_portfolios' );
			$taxslug = mount_resort_cs_get_option( 'portfolio-category-slug', 'portfolio_entries' );

			$labels = array (
					'name' => esc_html__( 'Portfolios', 'designthemes-core' ),
					'all_items' => esc_html__( 'All Portfolios', 'designthemes-core' ),
					'singular_name' => esc_html__( 'Portfolio', 'designthemes-core' ),
					'add_new' => esc_html__( 'Add New', 'designthemes-core' ),
					'add_new_item' => esc_html__( 'Add New Portfolio', 'designthemes-core' ),
					'edit_item' => esc_html__( 'Edit Portfolio', 'designthemes-core' ),
					'new_item' => esc_html__( 'New Portfolio', 'designthemes-core' ),
					'view_item' => esc_html__( 'View Portfolio', 'designthemes-core' ),
					'search_items' => esc_html__( 'Search Portfolios', 'designthemes-core' ),
					'not_found' => esc_html__( 'No Portfolios found', 'designthemes-core' ),
					'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'designthemes-core' ),
					'parent_item_colon' => esc_html__( 'Parent Portfolio:', 'designthemes-core' ),
					'menu_name' => esc_html__( 'Portfolios', 'designthemes-core' ) ,					
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => esc_html__( 'This is custom post type portfolios', 'designthemes-core' ),
					'supports' => array (
							'title',
							'editor',
							'comments',
							'thumbnail'
					),
					
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 5,
					'menu_icon' => 'dashicons-format-gallery',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $portslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_portfolios', $args );

			register_taxonomy ( 'portfolio_entries', array (
					'dt_portfolios' 
			), array (
					"hierarchical" => true,
					"label" => esc_html__( "Categories",'designthemes-core' ),
					"singular_label" => esc_html__( "Category",'designthemes-core' ),
					"show_admin_column" => true,
					"rewrite" => array( 'slug' => $taxslug ),
					"query_var" => true 
			) );
		}

		/**
		 */
		function dt_portfolio_cs_metabox_options( $options ) {

			$fields = cs_get_option( 'portfolio-custom-fields');
			$bothfields = $fielddef = $x = array();
			$before = '';

			if(!empty($fields)) :

				$i = 1;
				foreach($fields as $field):
					$x['id'] = 'portfolio_opt_flds_title_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Title';
					$x['attributes'] = array( 'style' => 'background-color: #f0eff9;' );
					$bothfields[] = $x;
					unset($x);
			
					$x['id'] = 'portfolio_opt_flds_value_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Value';
					$bothfields[] = $x;

					$fielddef['portfolio_opt_flds_title_'.$i] = $field['portfolio-custom-fields-text'];

					$i++;
				endforeach;	
			else:
				$before = '<span>Go to options panel add few custom fields, then return back here.</span>';
			endif;
			
			$options[]    = array(
			  'id'        => '_portfolio_settings',
			  'title'     => "Custom Portfolio Options",
			  'post_type' => 'dt_portfolios',
			  'context'   => 'normal',
			  'priority'  => 'default',
			  'sections'  => array(
			
				array(
				  'name'  => 'general_section',
				  'title' => 'General Options',
				  'icon'  => 'fa fa-cogs',
				  
				  'fields' => array(
			
					array(
					  'id'    => 'breadcrumb_background',
					  'type'  => 'background',
					  'title' => 'Background',
					  'desc'  => 'Choose background options for breadcrumb title section.',
					),

					array(
					  'id'      	 => 'layout',
					  'type'         => 'image_select',
					  'title'        => 'Layout',
					  'options'      => array(
						'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
						'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
						'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					  ),
					  'default'      => 'content-full-width',
					  'attributes'   => array(
						'data-depend-id' => 'layout',
					  ),
					),

					array(
					  'id'  		 => 'show-standard-sidebar-left',
					  'type'  		 => 'switcher',
					  'title' 		 => 'Show Standard Left Sidebar',
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'widget-area-left',
					  'type'  		 => 'select',
					  'title' 		 => 'Choose Widget Area - Left Sidebar',
					  'class'		 => 'chosen',
					  'options'   	 => mount_resort_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => 'Select Widget Areas',
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'show-standard-sidebar-right',
					  'type'  		 => 'switcher',
					  'title' 		 => 'Show Standard Right Sidebar',
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),
					
					array(
					  'id'  		 => 'widget-area-right',
					  'type'  		 => 'select',
					  'title' 		 => 'Choose Widget Area - Right Sidebar',
					  'class'		 => 'chosen',
					  'options'   	 => mount_resort_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => 'Select Widget Areas',
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),
					
					array(
					  'id'      	 => 'portfolio-layout',
					  'type'         => 'image_select',
					  'title'        => 'Portfolio Layout',
					  'options'      => array(
						'full-width-portfolio'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/portfolio-fullwidth.png',
						'with-left-portfolio'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/portfolio-with-left-gallery.png',
						'with-right-portfolio'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/portfolio-with-right-gallery.png',
					  ),
					  'default'      => 'full-width-portfolio',
					),
					
					array(
					  'id'           => 'masonry-size',
					  'type'         => 'select',
					  'title'        => 'Masonry Size',
					  'options'      => array(
									''     => 'Default',
						'grid-sizer-1'     => 'Grid Size 1',
						'grid-sizer-2'     => 'Grid Size 2',
						'grid-sizer-3'     => 'Grid Size 3',
						'grid-sizer-4'     => 'Grid Size 4',
						'grid-sizer-5'     => 'Grid Size 5',
					  ),
					  'class'        => 'chosen',
					  'default'      => '',
					  'info'       	 => 'It works with portfolio infinite shortcode only.',
					),
				  
				  ), // end: fields
				), // end: a section

				array(
				  'name'  => 'gallery_section',
				  'title' => 'Gallery Options',
				  'icon'  => 'fa fa-picture-o',
				  
				  'fields' => array(
				  
					array(
					  'id'          => 'portfolio-gallery',
					  'type'        => 'gallery',
					  'title'       => 'Gallery Images',
					  'desc'        => 'Simply add images to gallery items.',
					  'add_title'   => 'Add Images',
					  'edit_title'  => 'Edit Images',
					  'clear_title' => 'Remove Images',
					),

				  ), // end: fields
				), // end: a section

				array(
				  'name'  => 'optional_section',
				  'title' => 'Optional Fields',
				  'icon'  => 'fa fa-plug',

				  'fields' => array(

					array(
					  'id'        => 'portfolio_opt_flds',
					  'type'      => 'fieldset',
					  'title'     => 'Optional Fields',
					  'fields'    => $bothfields,
					  'default'   => $fielddef,
					  'before' 	  => $before
					),

				  ), // end: fields
				), // end: a section

			  ),
			);
			
			return $options;
		}			

		/**
		 */
		function dt_portfolio_cs_framework_options( $options ) {
			
			$options[200]      = array(
			  'name'        => 'portfolios',
			  'title'       => esc_html__('Portfolios', 'mount-resort'),
			  'icon'        => 'fa fa-photo',
			
			  'fields'      => array(

				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Detail Options', 'mount-resort' ),
				),
				
				array(
				  'id'  		 => 'single-portfolio-related',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Show Related Portfolios',
				  'label'		 => 'YES! to show related portfolio items in single portfolio.',
				),
				
				array(
				  'id'           => 'single-portfolio-related-style',
				  'type'         => 'select',
				  'title'        => 'Style',
				  'options'      => array(
					'type1'      => 'Modern Title',
					'type2'      => 'Title & Icons Overlay',
					'type3'      => 'Title Overlay',
					'type4'      => 'Icons Only',
					'type5'      => 'Classic',
					'type6'      => 'Minimal Icons',
					'type7'      => 'Presentation',
					'type8'      => 'Girly',
					'type9'      => 'Art',
				  ),
				  'class'        => 'chosen',
				  'default'      => 'type1',
				  'info'       	 => 'Choose post style to display related portfolio items.',
				  'dependency'   => array( 'single-portfolio-related', '==', 'true' ),
				),
				
				array(
				  'id'  		 => 'single-portfolio-comments',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Show Portfolio Comment',
				  'label'		 => 'YES! to display comments in single portfolios.',
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Archives Page Layout', 'mount-resort' ),
				),
				
				array(
				  'id'      	 => 'portfolio-archives-page-layout',
				  'type'         => 'image_select',
				  'title'        => 'Page Layout',
				  'options'      => array(
					'content-full-width'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				  ),
				  'default'      => 'content-full-width',
				  'attributes'   => array(
					'data-depend-id' => 'portfolio-archives-page-layout',
				  ),
				),
				
				array(
				  'id'  		 => 'show-standard-left-sidebar-for-portfolio-archives',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Show Standard Left Sidebar',
				  'dependency'   => array( 'portfolio-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
				),
			
				array(
				  'id'  		 => 'show-standard-right-sidebar-for-portfolio-archives',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Show Standard Right Sidebar',
				  'dependency'   => array( 'portfolio-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Archives Post Layout', 'mount-resort' ),
				),
				
				array(
				  'id'      	 => 'portfolio-archives-post-layout',
				  'type'         => 'image_select',
				  'title'        => 'Post Layout',
				  'options'      => array(
					'one-half-column'   => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-half-column.png',
					'one-third-column'  => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-third-column.png',
					'one-fourth-column' => MOUNT_RESORT_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
				  ),
				  'default'      => 'one-half-column',
				),
				
				array(
				  'id'           => 'portfolio-archives-post-style',
				  'type'         => 'select',
				  'title'        => 'Style',
				  'options'      => array(
					'type1'      => 'Modern Title',
					'type2'      => 'Title & Icons Overlay',
					'type3'      => 'Title Overlay',
					'type4'      => 'Icons Only',
					'type5'      => 'Classic',
					'type6'      => 'Minimal Icons',
					'type7'      => 'Presentation',
					'type8'      => 'Girly',
					'type9'      => 'Art',
				  ),
				  'class'        => 'chosen',
				  'default'      => 'type1',
				  'info'       	 => 'Choose post style to display archive page portfolio items.',
				),
				
				array(
				  'id'  		 => 'portfolio-allow-grid-space',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Allow Grid Space',
				  'label'		 => 'YES! to allow grid space',
				),

				array(
				  'id'  		 => 'portfolio-allow-full-width',
				  'type'  		 => 'switcher',
				  'title' 		 => 'Allow Full Width',
				  'label'		 => 'YES! to allow full width',
				),

				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Custom Fields', 'mount-resort' ),
				),

				array(
				  'id'              => 'portfolio-custom-fields',
				  'type'            => 'group',
				  'title'           => 'Custom Fields',
				  'info'            => 'Click button to add custom fields like name, url and date etc',
				  'button_title'    => 'Add New Field',
				  'accordion_title' => 'Adding New Custom Field',
				  'fields'          => array(
					array(
					  'id'          => 'portfolio-custom-fields-text',
					  'type'        => 'text',
					  'title'       => 'Enter Text',
					),
				  )
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Permalinks', 'mount-resort' ),
				),
				
				array(
				  'id'      => 'single-portfolio-slug',
				  'type'    => 'text',
				  'title'   => 'Single Portfolio Slug',
				  'after' 	=> '<p class="cs-text-info">Do not use characters not allowed in links. Use, eg. portfolio-item <br> <b>After made changes save permalinks.</b></p>',
				),
				
				array(
				  'id'      => 'portfolio-category-slug',
				  'type'    => 'text',
				  'title'   => 'Portfolio Category Slug',
				  'after' 	=> '<p class="cs-text-info">Do not use characters not allowed in links. Use, eg. portfolio-types <br> <b>After made changes save permalinks.</b></p>',
				),

			  ),
			);

			return $options;
		}

		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_portfolios_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_portfolio_thumb" => esc_html__("Image", 'designthemes-core'),
				"title" => esc_html__("Title", 'designthemes-core'),
				"author" => esc_html__("Author", 'designthemes-core')
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_portfolios_columns_display($columns, $id) {
			global $post;

			switch ($columns) {

				case "dt_portfolio_thumb" :

				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo ($image);
				    else:
						$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
						$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();

						if( array_key_exists("portfolio-gallery", $portfolio_settings)) {
							$items = explode(',', $portfolio_settings["portfolio-gallery"]);
							echo wp_get_attachment_image( $items[0], array(75, 75) );
						}
					endif;
				break;
			}
		}

		/**
		 * To load portfolio pages in front end
		 *
		 * @param string $template
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_portfolios' )) {
				if (! file_exists ( get_stylesheet_directory () . '/single-dt_portfolios.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_portfolios.php';
				}			
			} elseif (is_tax ( 'portfolio_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-portfolio_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-portfolio_entries.php';
				}
			} elseif (is_post_type_archive ( 'dt_portfolios' )) {
				if (! file_exists ( get_stylesheet_directory () . '/archive-dt_portfolios.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/archive-dt_portfolios.php';
				}					
			}
			return $template;
		}
	}
}
?>