<?php
// menu icons
$searchicon = (int) get_theme_mod( 'menu-search-icon', mount_resort_defaults('menu-search-icon') );
$carticon = (int) get_theme_mod( 'menu-cart-icon', mount_resort_defaults('menu-cart-icon') );
if( !empty($searchicon) || !empty($carticon) ) : ?>
	<div class="menu-icons-wrapper"><?php
		if( !empty($searchicon) ):
			$type = get_theme_mod( 'search-box-type', mount_resort_defaults('search-box-type') );?>
			<div class="search">
			<?php if($type == 'type1'): ?>
				<a href="javascript:void(0)" class="dt-search-icon"> <span class="fa fa-search"> </span> </a>
				<div class="top-menu-search-container">
					<?php get_search_form(); ?>
				</div>
			<?php else: ?>
				<div class="overlay overlay-search">
					<div class="overlay-close"></div>
					<?php get_search_form(); ?>
                </div>				
			<?php endif;?>
			</div><?php
		endif;
		if( !empty($carticon) && function_exists("is_woocommerce")) : ?>
			<div class="cart">
				<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View Shopping Cart', 'mountresort' ); ?>">
					<span class="fa fa-shopping-cart"> </span><?php
					$count = WC()->cart->cart_contents_count;														
					if( $count > 0 ) : ?>
						<sup><?php echo ($count);?></sup><?php
					endif;?>
				</a>
			</div><?php
		endif; ?>
	</div><?php
endif; ?>