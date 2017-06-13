<?php
class DTRoomShortcodesDefinition {

     function __construct() {
          
          /* Room */
          add_shortcode ( "dt_sc_room", array (
               $this,
               "dt_sc_room"
          ) );

          /* Room List */
          add_shortcode ( "dt_sc_room_list", array (
               $this,
               "dt_sc_room_list"
          ) );

          /* Room Image */
          add_shortcode ( "dt_sc_room_image", array (
               $this,
               "dt_sc_room_image"
          ) );

          /* Room Details */
          add_shortcode ( "dt_sc_room_details", array (
               $this,
               "dt_sc_room_details"
          ) );

          /* Room Meta */
          add_shortcode ( "dt_sc_room_meta", array (
               $this,
               "dt_sc_room_meta"
          ) );

     }
     
     function dt_sc_room( $attrs, $content = null ) {
          extract(shortcode_atts(array(
               'id' => '',
               'style' => 'type-2',
               'fields' => ''
          ), $attrs));
          
          $out = "";
          
          if( !empty( $id ) ){
               
               $p = get_post( $id );
               
               if( $p->post_type === "dt_rooms" ) {

                    $title = get_the_title($id);
                    $permalink = get_permalink($id);

                    $room_settings = get_post_meta($id, '_custom_settings', true);
                    $room_settings = is_array ( $room_settings ) ? $room_settings : array ();
                    $room_settings = array_filter( $room_settings );

                    $out .= '<div class="dt-sc-hotel-room">';

                    // Type 1                
                    if( $style == 'type-1' ) {

                         $out .= '<div class="dt-sc-hotel-room-type-1">';

                         if(has_post_thumbnail( $id )) {

                              $out .= '<div class="dt-sc-hotel-room-thumb">';
                              $out .= ' <a href="'.$permalink.'" title="'.$title.'">'.get_the_post_thumbnail($id, 'full', array( 'title' => $title, 'alt'=> $title )).'</a>';
                              $out .= '</div>';
                         }

                         $out .= '<div class="dt-sc-hotel-room-details">';
                         $out .= ' <h4> <a href="'.$permalink.'" title="'.$title.'">'.$title.'</a> </h4>';
                         $out .= ' <div class="dt-sc-hotel-room-content">';
                         $out .= '      <p>'.get_the_excerpt( $id ).'</p>';
                         $out .= ' </div>';
                         $out .= ' <div class="dt-sc-hotel-room-thumb-overlay">';
                                             if(array_key_exists('sub_title', $room_settings)) {
                                                  $out .= '<h3>'.$room_settings['sub_title'].'</h3>';
                                             }

                                             if(array_key_exists('price', $room_settings)) {
                                                  $out .= '<p> <span class="price">'.esc_html__('Starts From', 'veda-room').' '.$room_settings['price'].'</span></p>';
                                             }
                         $out .= ' </div>';
                         $out .= '</div>';

                         $out .= '<div class="dt-sc-hotel-room-buttons">';
                         $out .= ' <a href="#booknow-'.$id.'" title="'.$title.'" class="dt-sc-button medium filled btn-book"> <span>'.esc_html__('Book Now', 'veda-room').'</span> </a>';
                         $out .= ' <a href="'.$permalink.'" title="'.$title.'" class="dt-sc-button medium filled"> <span>'.esc_html__('Enquire', 'veda-room').'</span> </a>';
                         $out .= '</div>';

                         $out .= '<div style="display:none;">';
                         $out .= '<div id="booknow-'.$id.'" class="booknow-container">';
                         $out .= ' <div class="ajax_message"> </div>';
                         $out .= ' <form name="frmbooknow" class="booknow-frm" action="'. plugin_dir_url ( __FILE__ ) .'booknow.php" method="post">';
                         $out .= '      <p><input type="text" name="txtfname" required="required" placeholder="'.esc_html__('Name (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="email" name="txtemail" required="required" placeholder="'.esc_html__('Email (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="text" class="txtarrivedate" name="txtdate" required="required" placeholder="'.esc_html__('Date of Arrival (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="text" name="txtphone" placeholder="'.esc_html__('Phone', 'veda-room').'" /></p>';
                         $out .= '      <p><textarea name="txtmessage" rows="2" cols="32" placeholder="'.esc_html__('Message', 'veda-room').'"></textarea></p>';
                         $out .= '      <p><input type="submit" name="subsend" value="'.esc_html__('Send', 'veda-room').'" /></p>';
                         $out .= '      <input type="hidden" name="hidbookadminemail" value="'.get_bloginfo('admin_email').'" />';
                         $out .= '      <input type="hidden" name="hidbooksuccess" value="'.esc_html__('Thanks for Booking us, We will call back to you soon.', 'veda-room').'" />';
                         $out .= '      <input type="hidden" name="hidbookerror" value="'.esc_html__('Sorry your message not sent, Try again Later.', 'veda-room').'" />';
                         $out .= '      <input type="hidden" name="hidroomname" value="'.$title.'"/>';
                        $out .= '  </form>';
                        $out .= '</div>';
                         $out .= '</div>';                       
                         $out .= '</div>';                       
                    }

                    // Type 2
                    if( $style == 'type-2' ) {

                         $out .= '<div class="dt-sc-hotel-room-type-2">';
                         $out .= '<div class="dt-sc-pr-tb-col type1">';
                              if( has_post_thumbnail( $id ) ) {

                                   $out .= '<div class="dt-sc-tb-thumb">';
                                   $out .= ' <a href="'.$permalink.'" title="'.$title.'">'.get_the_post_thumbnail($id, 'full', array( 'title' => $title, 'alt'=> $title )).'</a>';
                                   $out .= '</div>';
                              }

                              $out .= '<div class="dt-sc-tb-content-wrapper">';
                              $out .= ' <h4> <a href="'.$permalink.'" title="'.$title.'">'.$title.'</a> </h4>';
                                             $values = (array) vc_param_group_parse_atts(  $attrs['fields'] );
                                             $out .= '<ul class="dt-sc-tb-content">';
                                             foreach ( $values as $data ) {
                                                  if( $data['show_field'] == 'yes' &&   array_key_exists( $data['field'] ,  $room_settings ) ) {
                                                       $out .= '<li>'. $room_settings[$data['field']] .'</li>';
                                                  }
                                             }
                                             $out .= '</ul>';
                                             if(array_key_exists('price', $room_settings)) {
                                                  $out .= '<p> <span class="price">'.esc_html__('Starts From', 'veda-room').' <strong>'.$room_settings['price'].'</strong></span></p>';
                                             }                                            
                              $out .= '</div>';

                              $out .= '<div class="dt-sc-buy-now">';
                              $out .= ' <a href="#type-2-booknow-'.$id.'" title="'.$title.'" class="btn-book dt-sc-button">'.esc_html__('Book Now', 'veda-room').'</a>';
                              $out .= '</div>';
                         $out .= '</div>';

                         $out .= '<div style="display:none;">';
                         $out .= '<div id="type-2-booknow-'.$id.'" class="booknow-container">';
                         $out .= ' <div class="ajax_message"> </div>';
                         $out .= ' <form name="frmbooknow" class="booknow-frm" action="'. plugin_dir_url ( __FILE__ ) .'booknow.php" method="post">';
                         $out .= '      <p><input type="text" name="txtfname" required="required" placeholder="'.esc_html__('Name (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="email" name="txtemail" required="required" placeholder="'.esc_html__('Email (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="text" class="txtarrivedate" name="txtdate" required="required" placeholder="'.esc_html__('Date of Arrival (required)', 'veda-room').'" /></p>';
                         $out .= '      <p><input type="text" name="txtphone" placeholder="'.esc_html__('Phone', 'veda-room').'" /></p>';
                         $out .= '      <p><textarea name="txtmessage" rows="2" cols="32" placeholder="'.esc_html__('Message', 'veda-room').'"></textarea></p>';
                         $out .= '      <p><input type="submit" name="subsend" value="'.esc_html__('Send', 'veda-room').'" /></p>';
                         $out .= '      <input type="hidden" name="hidbookadminemail" value="'.get_bloginfo('admin_email').'" />';
                         $out .= '      <input type="hidden" name="hidbooksuccess" value="'.esc_html__('Thanks for Booking us, We will call back to you soon.', 'veda-room').'" />';
                         $out .= '      <input type="hidden" name="hidbookerror" value="'.esc_html__('Sorry your message not sent, Try again Later.', 'veda-room').'" />';
                         $out .= '      <input type="hidden" name="hidroomname" value="'.$title.'"/>';
                        $out .= '  </form>';
                        $out .= '</div>';
                         $out .= '</div>';
                         $out .= '</div>';
                    }

                    // Type 3
                    if( $style == 'type-3' ) {

                         $out .= '<div class="dt-sc-hotel-room-type-3">';

                              if( has_post_thumbnail( $id ) ) {

                                   $out .= '<div class="dt-sc-tb-thumb">';
                                   $out .= ' <a href="'.$permalink.'" title="'.$title.'">'.get_the_post_thumbnail($id, 'full', array( 'title' => $title, 'alt'=> $title )).'</a>';
                                   $out .= '</div>';
                              }

                              $out .= '<h4> <a href="'.$permalink.'" title="'.$title.'">'.$title.'</a> </h4>';
                              if(array_key_exists('price', $room_settings)) {
                                   $out .= '<p> <span class="price">'.$room_settings['price'].'</span></p>';
                              }

                         $out .= '</div>';
                    }

                    $out .= '</div>';
               }
          }
          
          return $out;
     }

     /**

      * room list
      * @return string
      */
     function dt_sc_room_list($attrs, $content = null) {
          extract(shortcode_atts(array(
               'limit' => -1,
               'categories' => '',
               'posts_column' => 'thumb',
               'allow_excerpt' => 'yes',
               'filter' => 'yes',
               'excerpt_length' => '40',
               'allow_fields' => 'yes'
          ), $attrs));

          $out = "";
          $post_layout = $posts_column;
          $div_class = $tempcls = "";

          #Post layout check...
          switch($post_layout) {
               case "thumb":
                    $div_class = "dt-sc-one-column column";
                    $tempcls = "dt-sc-hotel-room-list-view";
                    break;

               case "one-half-column":
                    $div_class = "dt-sc-one-half column"; break;

               case "one-third-column":
                    $div_class = "dt-sc-one-third column"; break;

               case "one-fourth-column":
                    $div_class = "dt-sc-one-fourth column"; break;
          }
          
          if(empty($categories)) {
               $cats = get_categories('taxonomy=room_entries&hide_empty=1');
               $cats = get_terms( array('room_entries'), array('fields' => 'ids'));
          } else {
               $cats = explode(',', $categories);
          }

          if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
          elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
          else { $paged = 1; }

          #Performing query...
          $args = array('post_type' => 'dt_rooms', 'paged' => $paged , 'posts_per_page' => $limit,
               'tax_query' => array( array( 
                    'taxonomy' => 'room_entries', 
                    'field' => 'id', 
                    'terms' => $cats
               ))
          );
          $the_query = new WP_Query($args);
          if($the_query->have_posts()):

               if($filter != "no"):
                    $out .= '<div class="dt-sc-hotel-room-sorting">';
                         $out .= '<a href="#" class="active-sort" data-filter="*">'.esc_html__("All", "veda-room").'</a>';
                         foreach($cats as $term) {
                              $myterm = get_term_by('id', $term, 'room_entries');
                              $out .= '<a href="#" title="'.$myterm->name.'" data-filter=".'.strtolower($myterm->slug).'">'.$myterm->name.'</a>';
                         }
                    $out .= '</div>';
               endif;

               $out .= '<div class="dt-sc-rooms-container">';
                    while($the_query->have_posts()): $the_query->the_post();
                         $PID = get_the_ID();
                         $terms = wp_get_post_terms($PID, 'room_entries', array("fields" => "slugs"));

                         $out .= '<div class="'.$div_class." ".strtolower(implode(" ", $terms)).'">';
                              $out .= '<div class="dt-sc-hotel-room '.$tempcls.'">';

                                   $room_settings = get_post_meta($PID, '_custom_settings', true);
                                   $room_settings = is_array ( $room_settings ) ? $room_settings : array ();
                                   $room_settings = array_filter( $room_settings );

                                   if(has_post_thumbnail()):
                                        $out .= '<div class="dt-sc-hotel-room-thumb">';
                                             $attr = array('title' => get_the_title(), 'alt' => get_the_title());
                                             $out .= '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail($PID, 'room-type', $attr).'</a>';

                                             if(array_key_exists('price', $room_settings)):
                                                  $out .= '<div class="dt-sc-hotel-room-thumb-overlay">';
                                                       $out .= '<div>'.esc_html__('Starts From', 'veda-room').'<p><span class="price">'.$room_settings['price'].'</span><span class="splitter"> / </span>'.esc_html__('Per Night', 'veda-room').'</p> </div>';
                                                  $out .= '</div>';
                                             endif;
                                        $out .= '</div>';
                                   endif;

                                   $out .= '<div class="dt-sc-hotel-room-details">';
                                        $out .= '<div class="dt-sc-hotel-room-content">';
                                             $out .= '<a href="'.get_permalink().'" title="'.get_the_title().'"><h4>'.get_the_title().'</a></h4>';
                                             if($allow_excerpt != 'no') $out .= mount_resort_excerpt($excerpt_length);
                                        $out .= '</div>';
                                        
                                        if( $allow_fields == 'yes' ) :
                                             $out .= '<ul>';
                                                  if(array_key_exists('no_beds', $room_settings))
                                                       $out .= '<li> <i class="fa fa-bed"> </i> <span>'.esc_html__('No. of Beds', 'veda-room').'</span> : '.$room_settings['no_beds'].'</li>';
                                                  if(array_key_exists('no_people', $room_settings))
                                                       $out .= '<li> <i class="fa fa-user"> </i> <span>'.esc_html__('No. of People', 'veda-room').'</span> : '.$room_settings['no_people'].'</li>';
                                                  if(array_key_exists('room_size', $room_settings))
                                                       $out .= '<li> <i class="fa fa-expand"> </i> <span>'.esc_html__('Room size', 'veda-room').'</span> : '.$room_settings['room_size'].'</li>';
                                                  if(array_key_exists('ac_nonac', $room_settings))
                                                       $out .= '<li> <i class="fa fa-spinner"> </i> <span>'.esc_html__('AC / Non AC', 'veda-room').'</span> : '.$room_settings['ac_nonac'].'</li>';

                                                  // Custom Fields
                                                  $cf_rooms = mount_resort_cs_get_option( 'rooms-custom-fields', array() );
                                                  foreach( $cf_rooms as $key => $fields ) {

                                                       $title = $fields['rooms-custom-fields-text'];
                                                       $title = !empty( $title ) ? '<span>'. esc_html( $title ).'</span>' : '';

                                                       $icon = $fields['rooms-custom-fields-icon'];
                                                       $icon = !empty( $icon ) ? '<i class="'.$icon.'"></i>' : '';
     
                                                       $value = array_key_exists('rooms-custom-fields-text-'.$key,  $room_settings ) ? ':'.$room_settings['rooms-custom-fields-text-'.$key] : '';
                                                       $out .= !empty( $value ) ? '<li>'.$icon.$title.$value.'</li>' : '';
                                                  }
                                                  // Custom Fields
                                             $out .= '</ul>';
                                        endif;
                                        $out .= '<div class="dt-sc-hotel-room-buttons">';
                                             $out .= '<a href="#booknow_wrapper" title="'.get_the_title().'" class="dt-sc-button medium filled btn-book">'.esc_html__('Book a Stay', 'veda-room').'</a>';
                                             $out .= '<a href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('View Details', 'veda-room').'<span class="fa fa-angle-right"> </span> </a>';
                                        $out .= '</div>';
                                   $out .= '</div>';
                              $out .= '</div>';
                         $out .= '</div>';
                    endwhile;
               $out .= '</div>';

               $out .= '<div style="display:none;">';
                  $out .= '<div id="booknow_wrapper" class=" booknow-container">';
                      $out .= '<div class="ajax_message"> </div>';
                      $out .= '<form name="frmbooknow" class="booknow-frm" action="'. plugin_dir_url ( __FILE__ ) .'booknow.php" method="post">';
                           $out .= '<p><input type="text" name="txtfname" required="required" placeholder="'.esc_html__('Name (required)', 'veda-room').'" /></p>';
                           $out .= '<p><input type="email" name="txtemail" required="required" placeholder="'.esc_html__('Email (required)', 'veda-room').'" /></p>';
                           $out .= '<p><input type="text" class="txtarrivedate" name="txtdate" required="required" placeholder="'.esc_html__('Date of Arrival (required)', 'veda-room').'" /></p>';
                           $out .= '<p><input type="text" name="txtphone" placeholder="'.esc_html__('Phone', 'veda-room').'" /></p>';
                           $out .= '<p><textarea name="txtmessage" rows="2" cols="32" placeholder="'.esc_html__('Message', 'veda-room').'"></textarea></p>';
                           $out .= '<p><input type="submit" name="subsend" value="'.esc_html__('Send', 'veda-room').'" /></p>';
                           $out .= '<input type="hidden" name="hidbookadminemail" value="'.get_bloginfo('admin_email').'" />';
                           $out .= '<input type="hidden" name="hidbooksuccess" value="'.esc_html__('Thanks for Booking us, We will call back to you soon.', 'veda-room').'" />';
                           $out .= '<input type="hidden" name="hidbookerror" value="'.esc_html__('Sorry your message not sent, Try again Later.', 'veda-room').'" />';
                           $out .= '<input type="hidden" name="hidroomname" value="'.$title.'"/>';
                      $out .= '</form>';
                  $out .= '</div>';
               $out .= '</div>';
          wp_reset_postdata();
          else:
               $out .= '<h2>'.esc_html__("Nothing Found.", "veda-room").'</h2>';
               $out .= '<p>'.esc_html__("Apologies, but no results were found for the requested archive.", "veda-room").'</p>';
          endif;

          return $out;
     }

     /**
      * room image
      * @return string
      */
     function dt_sc_room_image($attrs, $content = null) {

          global $post;
          $out = "";

          $out = '<div class="dt-room-single-slider-wrapper">';
               $out .= '<ul class="dt-room-single-slider">';
                    $room_settings = get_post_meta($post->ID, '_custom_settings', true);
                    $room_settings = is_array ( $room_settings ) ? $room_settings : array ();
                    $room_settings = array_filter( $room_settings );

                    if( has_post_thumbnail() )
                         $out .= '<li>'.get_the_post_thumbnail($post->ID, 'full').'</li>';

                    if( array_key_exists("gallery",$room_settings) ) {
                         $ids = explode( ',', $room_settings['gallery'] );                                              
                         foreach ( $ids as $id ) {
                              $attachment = wp_get_attachment_image_src( $id, 'full' );
                              $out .= "<li> <img src='".esc_url($attachment[0])."' alt='".get_the_title()."' /></li>";
                         }
                    }                   
               $out .= '</ul>';

               if( array_key_exists("gallery",$room_settings) ) {
                    $out .= '<div id="bx-pager">';
                         if( has_post_thumbnail() ){
                              $out .= '<a data-slide-index="0" href="">'.get_the_post_thumbnail($post->ID, 'full').'</a>';
                         }

                         if( array_key_exists("gallery",$room_settings) ) {
                              $ids = explode( ',', $room_settings['gallery'] );                                              
                              foreach ( $ids as $key => $id ) {
                                   $i = $key + 1;
                                   $attachment = wp_get_attachment_image_src( $id, 'full' );

                                   $out .= "<a data-slide-index='".esc_attr($i)."' href=''>";
                                   $out .= "<img src='".esc_url($attachment[0])."' alt='".get_the_title()."' />";
                                   $out .= "</a>";
                              }
                         }
                    $out .= '</div>';
               }
          $out .= '</div>';

          return $out;
     }
     
     /**
      *
      * @param string $content
      * @return string
      */
     function dtShortcodeHelper($content = null) {
          $content = do_shortcode ( shortcode_unautop ( $content ) );
          $content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
          $content = preg_replace ( '#<br \/>#', '', $content );
          return trim ( $content );
     }

     /**
      * room details
      * @return string
      */
     function dt_sc_room_details($attrs, $content = null) {

          global $post;
          $out = "";

          $out = '<div class="dt-sc-hotel-room-single-details">';
               $out .= '<h3>'.get_the_title($post->ID).'</h3>';
               $out .= DTRoomShortcodesDefinition::dtShortcodeHelper($content);
          $out .= '</div>';

          return $out;
     }

     /**
      * room meta
      * @return string
      */
     function dt_sc_room_meta($attrs, $content = null) {
          extract(shortcode_atts(array(
               'show_meta' => '',
               'meta_title' => esc_html__('Features', 'veda-room'),
               'reservation' => ''
          ), $attrs));

          global $post;
          $out = "";

          $out .= '<div class="dt-sc-hotel-room-single-metadata">';
               $room_settings = get_post_meta($post->ID, '_custom_settings', true);
               $room_settings = is_array ( $room_settings ) ? $room_settings : array ();
               $room_settings = array_filter( $room_settings );

               if(array_key_exists('price', $room_settings)):
                    $out .= '<div class="price-wrapper">'.esc_html__('From', 'veda-room').'<p><span class="price">'.$room_settings['price'].'</span></p></div>';
               endif;

               if($reservation != 'no'):
                    $out .= '<form name="frmreserve" class="reserve-frm" action="'. plugin_dir_url ( __FILE__ ) .'reservation.php" method="post">';
                         $out .= '<p class="room-date">';
                              $out .= '<label>'.esc_html__('Check In Date', 'veda-room').':</label>';
                              $out .= '<input type="text" name="txtchkindate" id="txtchkindate" placeholder="mm/dd/yy" required="required">';
                         $out .= '</p>';
                         $out .= '<p class="room-date">';
                              $out .= '<label>'.esc_html__('Check Out Date', 'veda-room').':</label>';
                              $out .= '<input type="text" name="txtchkoutdate" id="txtchkoutdate" placeholder="mm/dd/yy" required="required">';
                         $out .= '</p>';
						 $out .= '<p class="room-count">';
                              $out .= '<label>'.esc_html__('No Of Rooms', 'veda-room').':</label>';
                              $out .= '<input type="number" name="room_count" id="room_count" min="1" max="20" value="1" required="required">';
						 $out .= '</p>';						 
                         $out .= '<p>';
                              $out .= '<label>'.esc_html__('Name', 'veda-room').':</label>';
                              $out .= '<input type="text" name="txtuname" id="txtuname">';
                         $out .= '</p>';
                         $out .= '<p>';
                              $out .= '<label>'.esc_html__('Email', 'veda-room').':</label>';
                              $out .= '<input type="email" name="txtuemail" id="txtuemail" required="required">';
                         $out .= '</p>';
                         $out .= '<p>';
                              $out .= '<label>'.esc_html__('Phone', 'veda-room').':</label>';
                              $out .= '<input type="text" name="txtuphone" id="txtuphone">';
                         $out .= '</p>';

                         $out .= '<input type="submit" name="subreserve" value="'.esc_html__('Reserve Now', 'veda-room').'">';
                         $out .= '<input type="hidden" name="hidbookadminemail" value="'.get_bloginfo('admin_email').'" />';
                         $out .= '<input type="hidden" name="hidbooksuccess" value="'.esc_html__('Thanks for Booking us, We will call back to you soon.', 'veda-room').'" />';
                         $out .= '<input type="hidden" name="hidbookerror" value="'.esc_html__('Sorry your message not sent, Try again Later.', 'veda-room').'" />';
                         $out .= '<input type="hidden" name="hidroomname" value="'.get_the_title().'" />';
                    $out .= '</form>';
                    $out .= '<div id="ajax_message"> </div>';
               endif;

               if($show_meta != 'no'):
                    $out .= '<div class="dt-sc-hr-invisible-small"> </div>';
                    $out .= '<h4>'.$meta_title.'</h4>';
                    $out .= '<ul>';
                         if(array_key_exists('no_beds', $room_settings))
                              $out .= '<li> <i class="fa fa-bed"> </i> <span>'.esc_html__('No. of Beds', 'veda-room').'</span> : '.$room_settings['no_beds'].'</li>';
                         if(array_key_exists('no_people', $room_settings))
                              $out .= '<li> <i class="fa fa-user"> </i> <span>'.esc_html__('No. of People', 'veda-room').'</span> : '.$room_settings['no_people'].'</li>';
                         if(array_key_exists('room_size', $room_settings))
                              $out .= '<li> <i class="fa fa-expand"> </i> <span>'.esc_html__('Room size', 'veda-room').'</span> : '.$room_settings['room_size'].'</li>';
                         if(array_key_exists('ac_nonac', $room_settings))
                              $out .= '<li> <i class="fa fa-spinner"> </i> <span>'.esc_html__('AC / Non AC', 'veda-room').'</span> : '.$room_settings['ac_nonac'].'</li>';

                         $cf_rooms = mount_resort_cs_get_option( 'rooms-custom-fields', array() );
                         foreach( $cf_rooms as $key => $fields ) {

                              $title = $fields['rooms-custom-fields-text'];
                              $title = !empty( $title ) ? '<span>'. esc_html( $title ).'</span>' : '';

                              $icon = $fields['rooms-custom-fields-icon'];
                              $icon = !empty( $icon ) ? '<i class="'.$icon.'"></i>' : '';

                              $value = array_key_exists('rooms-custom-fields-text-'.$key,  $room_settings ) ? ':'.$room_settings['rooms-custom-fields-text-'.$key] : '';

                              $out .= !empty( $value ) ? '<li>'.$icon.$title.$value.'</li>' : '';
                         }                        
                    $out .= '</ul>';
               endif;

               $out .= DTRoomShortcodesDefinition::dtShortcodeHelper($content);

          $out .= '</div>';

          return $out;
     }
}?>