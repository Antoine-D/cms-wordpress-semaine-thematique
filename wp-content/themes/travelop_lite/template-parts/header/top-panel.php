<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop_lite
 */

// Don't show top panel if all elements are disabled
if ( ! travelop_lite_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel">
    <div class="container">
        <div <?php echo travelop_lite_get_container_classes( array( 'top-panel__wrap' ) ); ?>><?php
            travelop_lite_top_message( '<div class="top-panel__message">%s</div>' );
            travelop_lite_top_search( '<div class="top-panel__search">%s</div>' );
            travelop_lite_top_menu();
        ?></div>
    </div><!-- .container -->
</div><!-- .top-panel -->