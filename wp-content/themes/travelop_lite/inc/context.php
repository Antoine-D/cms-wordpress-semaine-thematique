<?php
/**
 * Contextual functions for the header, footer, content and sidebar classes.
 *
 * @package Travelop_lite
 */

/**
 * Prints site header CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function travelop_lite_header_class( $classes = array() ) {
	$classes[] = 'site-header';
	$classes[] = get_theme_mod( 'header_layout_type' );
	echo travelop_lite_get_container_classes( $classes );
}

/**
 * Prints site content CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function travelop_lite_content_class( $classes = array() ) {
	$classes[] = 'site-content';
	echo travelop_lite_get_container_classes( $classes );
}

/**
 * Prints site footer CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function travelop_lite_footer_class( $classes = array() ) {
	$classes[] = 'site-footer';
	$classes[] = get_theme_mod( 'footer_layout_type' );
	echo travelop_lite_get_container_classes( $classes );
}

/**
 * Retrieve a CSS class attribute for container based on `Page Layout Type` option.
 *
 * @since  1.0.0
 * @param  array  $classes Additional classes.
 * @return string
 */
function travelop_lite_get_container_classes( $classes ) {
	$layout_type = get_theme_mod( 'page_layout_type' );

	if ( 'boxed' == $layout_type ) {
		$classes[] = 'container';
	}

	return 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints primary content wrapper CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function travelop_lite_primary_content_class( $classes = array() ) {
	echo travelop_lite_get_layout_classes( 'content', $classes );
}

/**
 * Prints sidebar CSS class.
 *
 * @since  1.0.0
 * @param  array  $classes Additional classes.
 * @return void
 */
function travelop_lite_sidebar_class( $classes = array() ) {
	echo travelop_lite_get_layout_classes( 'sidebar', $classes );
}

/**
 * Get CSS class attribute for passed layout context.
 *
 * @since  1.0.0
 * @param  string $layout  Layout context.
 * @param  array  $classes Additional classes.
 * @return string
 */
function travelop_lite_get_layout_classes( $layout = 'content', $classes = array() ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );
	$sidebar_width    = get_theme_mod( 'sidebar_width' );

	if ( 'fullwidth' === $sidebar_position || is_404() ) {
		$sidebar_width = 0;
	}
	if ( is_404() ) {
		$sidebar_position = 'fullwidth';
	}

	$layout_classes = ! empty( travelop_lite_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] ) ? travelop_lite_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] : array();

	if ( ! empty( $classes ) ) {
		$layout_classes = array_merge( $layout_classes, $classes );
	}

	if ( empty( $layout_classes ) ) {
		return '';
	}

	$layout_classes = apply_filters( "travelop_lite_{$layout}_classes", $layout_classes );

	return 'class="' . join( ' ', $layout_classes ) . '"';
}

/**
 * Retrieve or print `class` attribute for Post List wrapper.
 *
 * @since  1.0.0
 * @param  array       $classes Additional classes.
 * @param  boolean     $echo    True for print. False - return.
 * @return string|void
 */
function travelop_lite_posts_list_class( $classes = array(), $echo = true ) {
	$layout_type      = get_theme_mod( 'blog_layout_type', travelop_lite_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sidebar_position = get_theme_mod( 'sidebar_position', travelop_lite_theme()->customizer->get_default( 'sidebar_position' ) );

	$classes[] = 'posts-list';
	$classes[] = 'posts-list--' . sanitize_html_class( $layout_type );
	$classes[] = sanitize_html_class( $sidebar_position );

	if ( in_array( $layout_type, array( 'grid-2-cols', 'grid-3-cols' ) ) ) {
		$classes[] = 'card-deck';
	}

	if ( in_array( $layout_type, array( 'masonry-2-cols', 'masonry-3-cols' ) ) ) {
		$classes[] = 'card-columns';
	}

	$sidebars = array(
		'full-width-header-area',
		'before-content-area',
		'before-loop-area',
	);

	$has_sidebars = false;

	foreach ( $sidebars as $sidebar ) {
		if ( travelop_lite_widget_area()->is_active_sidebar( $sidebar ) ) {
			$has_sidebars = true;
		}
	}

	if ( ! $has_sidebars && is_home() ) {
		$classes[] = 'no-sidebars-before';
	}

	$classes = apply_filters( 'travelop_lite_posts_list_class', $classes );

	$output = 'class="' . join( ' ', $classes ) . '"';

	if ( ! $echo ) {
		return $output;
	}

	echo $output;
}

/**
 * Print boxed or fullwidth conainer class.
 *
 * @since  1.0.0
 * @return void
 */
function travelop_lite_layout_wrap() {
	$layout = get_theme_mod( 'page_layout_type', travelop_lite_theme()->customizer->get_default( 'page_layout_type' ) );
	printf( '%s-wrap', esc_attr( $layout ) );
}
