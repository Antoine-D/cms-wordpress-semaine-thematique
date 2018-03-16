<?php
/**
 * Menus configuration.
 *
 * @package TalkingBusiness_Lite
 */

add_action( 'after_setup_theme', 'talkingbusiness_lite_register_menus', 5 );
function talkingbusiness_lite_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'talkingbusiness_lite' ),
		'main'   => esc_html__( 'Main', 'talkingbusiness_lite' ),
		'footer' => esc_html__( 'Footer', 'talkingbusiness_lite' ),
		'social' => esc_html__( 'Social', 'talkingbusiness_lite' ),
	) );
}
