<?php
/**
 * Custom functions that act independently of the tm-content-builder plugin.
 *
 * @package TalkingBusiness_Lite
 */

add_action( 'tm_builder_load_user_modules', 'talkingbusiness_lite_builder_load_user_modules' );
add_filter( 'tm_pb_pre_set_style', 'talkingbusiness_lite_pb_pre_set_style_team_member', 10, 2 );

function talkingbusiness_lite_builder_load_user_modules( $modules_loader ) {

	$modules = array(
		'Tm_Builder_Module_Link_Box' => trailingslashit( TALKINGBUSINESS_LITE_THEME_DIR ) . 'builder/modules/class-builder-module-link-box.php',
		'TM_Builder_Module_Custom_Team_Member' => trailingslashit( TALKINGBUSINESS_LITE_THEME_DIR ) . 'builder/modules/class-builder-module-custom-team-member.php',
	);

	foreach( $modules as $className => $path ) {
		include $path;
		$modules_loader->add_module( $className, $path );
	}
}



function talkingbusiness_lite_pb_pre_set_style_team_member( $style, $function_name ) {

	if ( 'tm_pb_custom_team_member' !== $function_name ) {
		return $style;
	}

	if ( false !== strpos( $style['declaration'], 'background' ) || false !== strpos( $style['declaration'], 'border' ) ) {
		$style['selector'] .= ' .tm_pb_team_member_wrap';
	}

	return $style;
}
