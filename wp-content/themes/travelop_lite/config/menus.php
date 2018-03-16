<?php
/**
 * Menus configuration.
 *
 * @package Travelop_lite
 */

add_action( 'after_setup_theme', 'travelop_lite_register_menus', 5 );
function travelop_lite_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'travelop_lite' ),
		'main'   => esc_html__( 'Main', 'travelop_lite' ),
		'footer' => esc_html__( 'Footer', 'travelop_lite' ),
		'social' => esc_html__( 'Social', 'travelop_lite' ),
	) );
}
