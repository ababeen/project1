<?php
/*
Template Name: Custom Template
Template Post Type: wpsl_stores
*/
get_header();?>

	<section id="primary" class="content-full-width">

		<!-- #post-<?php the_ID(); ?> -->
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

            if( have_posts() ):

                while( have_posts() ):

                    the_post();

                    $content = get_the_content();

                    echo do_shortcode( $content );

                    edit_post_link( esc_html__( ' Edit ','mountresort' ) );

                endwhile;

            endif;?>

		</div><!-- #post-<?php the_ID(); ?> -->

	</section>
<?php get_footer();?>