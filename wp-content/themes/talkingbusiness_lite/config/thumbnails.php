<?php
/**
 * Thumbnails configuration.
 *
 * @package TalkingBusiness_Lite
 */

add_action( 'after_setup_theme', 'talkingbusiness_lite_register_image_sizes', 5 );
function talkingbusiness_lite_register_image_sizes() {
	set_post_thumbnail_size( 540, 510, true );

	// Registers a new image sizes.
	add_image_size( 'talkingbusiness_lite-thumb-s', 150, 150, true );
	add_image_size( 'talkingbusiness_lite-thumb-345-302', 345, 302, true );
	add_image_size( 'talkingbusiness_lite-thumb-m', 400, 400, true );
	add_image_size( 'talkingbusiness_lite-thumb-l', 1280, 510, true );
	add_image_size( 'talkingbusiness_lite-thumb-xl', 1920, 1080, true );
	add_image_size( 'talkingbusiness_lite-author-avatar', 512, 512, true );

	add_image_size( 'talkingbusiness_lite-thumb-240-100', 240, 100, true );
	add_image_size( 'talkingbusiness_lite-thumb-536-272', 536, 272, true );
	add_image_size( 'talkingbusiness_lite-thumb-560-390', 560, 390, true );
}
