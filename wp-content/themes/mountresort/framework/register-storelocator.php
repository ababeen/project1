<?php
add_filter( 'wpsl_templates', 'mount_resort_wpsl_custom_templates' );
function mount_resort_wpsl_custom_templates( $templates ) {

    $templates[] = array (
        'id'   => 'custom',
        'name' => __('Custom template', 'mountresort' ),
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}

add_filter( 'wpsl_thumb_size', 'mount_resort_wpsl_custom_thumb_size' );
function mount_resort_wpsl_custom_thumb_size() {    
    $size = array( 90, 90 );
    return $size;	
}