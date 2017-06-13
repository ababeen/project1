        </div><!-- **Container - End** -->

        </div><!-- **Main - End** --><?php

        do_action( 'mount_resort_hook_content_after' );

        $footer = (int) get_theme_mod( 'show-footer', mount_resort_defaults('show-footer') );
        $show_copyright_section = (int) get_theme_mod( 'show-copyright-text', mount_resort_defaults('show-copyright-text') );?>
        <!-- **Footer** -->
        <footer id="footer">
            <?php if( !empty( $footer ) ) :
                $darkbg =(int) get_theme_mod( 'enable-footer-darkbg', mount_resort_defaults('enable-footer-darkbg') );
                $class = ( $darkbg ) ? 'dt-sc-dark-bg' : '';
                $columns = (int) get_theme_mod( 'footer-columns', mount_resort_defaults('footer-columns') );?>
                <div class="footer-widgets <?php echo esc_attr( $class ); ?>">
                    <div class="container"><?php
                        mount_resort_show_footer_widgetarea( $columns );?>
                    </div>
                </div>
            <?php endif;

            $copyright = get_theme_mod( 'copyright-text', mount_resort_defaults('copyright-text') );
            $copyright = stripslashes ( $copyright );
            $copyright = do_shortcode( $copyright );

            $copyright_next = get_theme_mod( 'copyright-next', mount_resort_defaults('copyright-next') );

            $darkbg = get_theme_mod( 'enable-copyright-darkbg', mount_resort_defaults('enable-copyright-darkbg') );
            $class = ( $darkbg ) ? 'dt-sc-dark-bg' : '';
			
			$center = ( $copyright_next == 'disable' ) ? 'align-center' : '';?>
            <div class="footer-copyright <?php echo esc_attr( $class ); ?>">
                <div class="container">
                    <div class="column dt-sc-one-half first <?php echo esc_attr( $center );?>"><?php
                        if( !empty( $show_copyright_section ) ) :
                            echo mount_resort_wp_kses( $copyright );
                        endif; ?>
                    </div>
                    <div class="column dt-sc-one-half <?php echo esc_attr( $copyright_next ); ?>"><?php
                        if( $copyright_next == 'sociable' ) :
                            $sociables = get_theme_mod( 'footer-sociables', mount_resort_defaults( 'footer-sociables' ) );
				    
				    $start = $end = $list = '';

                            if( !empty( $sociables ) ) {
                                $start = '<ul class="dt-sc-sociable">';
                                $end = '</ul>';
                            }

                            foreach( $sociables as $social ) {
                                $value = get_theme_mod( 'social-'.$social, '#' );
                                if( !empty( $value) ) {
                                    $list .= '<li class="'.esc_attr( $social ).'"><a target="_blank" href="'.esc_attr( $value ).'"></a></li>';
                                }
                            }

                            echo $start.$list.$end;
                        elseif( $copyright_next == 'footer-menu' ):
                            wp_nav_menu( array(
                                'container' => false,
                                'menu_id' => 'menu-footer-menu',
                                'menu_class' => 'menu-links',
                                'theme_location' => 'footer-menu',
                                'depth' => 0
                            ) );
                        endif;?>
                    </div>
                </div>
            </div>
           </footer><!-- **Footer - End** -->
    </div><!-- **Inner Wrapper - End** -->
</div><!-- **Wrapper - End** -->
<?php do_action( 'mount_resort_hook_bottom' ); ?>
<?php wp_footer(); ?>
</body>
</html>