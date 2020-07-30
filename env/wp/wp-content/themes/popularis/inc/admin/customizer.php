<?php
/**
 * Popularis Theme Customizer
 *
 */

$popularis_sections = array( 'info', 'demo' );

foreach( $popularis_sections as $section ){
    require get_template_directory() . '/inc/admin/customizer/' . $section . '.php';
}

function popularis_customizer_scripts() {
    wp_enqueue_style( 'popularis-customize',get_template_directory_uri().'/inc/admin/customizer/css/customize.css', '', 'screen' );
    wp_enqueue_script( 'popularis-customize', get_template_directory_uri() . '/inc/admin/customizer/js/customize.js', array( 'jquery' ), '20170404', true );
}
add_action( 'customize_controls_enqueue_scripts', 'popularis_customizer_scripts' );
