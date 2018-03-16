<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelop_lite
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( 'fullwidth' === $sidebar_position ) {
	return;
}

if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
if ( is_404() ) {
	return;
}
?>

<?php do_action( 'travelop_lite_render_widget_area', 'sidebar-primary' ); ?>
