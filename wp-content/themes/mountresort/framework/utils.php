<?php
/* ---------------------------------------------------------------------------
 * Check activated plugins
 * --------------------------------------------------------------------------- */
function mount_resort_is_plugin_active($plugin) {
	return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || mount_resort_is_plugin_active_for_network( $plugin );
}

function mount_resort_is_plugin_active_for_network( $plugin ) {
	if ( !is_multisite() )
		return false;

	$plugins = get_site_option( 'active_sitewide_plugins');
	if ( isset($plugins[$plugin]) )
		return true;

	return false;
}

/* ---------------------------------------------------------------------------
 * Create function to get theme options
 * --------------------------------------------------------------------------- */
if( ! class_exists( 'CSFramework' ) ) {

	function mount_resort_cs_get_option($key, $value = '') {

		$v = cs_get_option( $key );

		if ( !empty( $v ) ) {
			return $v;
		} else {
			return $value;
		}
	}
}

/* ---------------------------------------------------------------------------
 * Visual Composer : Add Google Font
 * --------------------------------------------------------------------------- */
add_filter('vc_google_fonts_get_fonts_filter', 'veda_vc_google_fonts_get_fonts_filter');
function veda_vc_google_fonts_get_fonts_filter( $fonts ) {
	$fonts[] = json_decode (
		json_encode( array('font_family' => 'Poppins', 'font_styles' => '300,400,500,600,700', 'font_types' => '300 light regular:300:normal,400 regular:400:normal,500 bold regular:500:normal,600 bold regular:600:normal,700 bold regular:700:normal') ),	
	FALSE );	

	return $fonts;
}

/* ---------------------------------------------------------------------------
 * Load default theme options
 * - To return default options to store in database.
 * --------------------------------------------------------------------------- */
function mount_resort_show_footer_widgetarea( $count ) {
	$classes = array (
		"1" => "dt-sc-full-width",
		"dt-sc-one-half",
		"dt-sc-one-third",
		"dt-sc-one-fourth",
		"dt-sc-one-fifth",
		"dt-sc-one-sixth",
		"1-2" => "dt-sc-one-half",
		"1-3" => "dt-sc-one-third",
		"1-4" => "dt-sc-one-fourth",
		"3-4" => "dt-sc-three-fourth",
		"2-3" => "dt-sc-two-third" );

	if ($count <= 6) :
		for($i = 1; $i <= $count; $i ++) :

			$class = $classes [$count];
			$class = esc_attr( $class );

			$first = ($i == 1) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$i}" )) : endif;
			echo "</div>";
		endfor;
	elseif ($count == 12 || $count == 13) :

		$a = array (
			"1-4",
			"1-4",
			"1-2" );

		$a = ($count == 12) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
			echo "</div>";
		endforeach;
	elseif ($count == 7 || $count == 8) :
		$a = array (
			"1-4",
			"3-4");

		$a = ($count == 7) ? $a : array_reverse ( $a );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );


			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	elseif ($count == 9 || $count == 10) :
		$a = array ( 
			"1-3",
			"2-3" );
		$a = ($count == 9) ? $a : array_reverse ( $a );

		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );

			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );

			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) :endif;
			echo "</div>";
		endforeach;
	elseif ($count == 11 ) :
		$a = array ( "1-4", "1-2", "1-4" );
		foreach ( $a as $k => $v ) :
			$class = $classes [$v];
			$class = esc_attr( $class );
			$first = ($k == 0 ) ? "first" : "";
			$first = esc_attr( $first );
			echo "<div class='column {$class} {$first}'>";
				if (function_exists ( 'dynamic_sidebar' ) && dynamic_sidebar ( "footer-sidebar-{$k}-{$v}" )) : endif;
			echo "</div>";
		endforeach;
	endif;
}?>