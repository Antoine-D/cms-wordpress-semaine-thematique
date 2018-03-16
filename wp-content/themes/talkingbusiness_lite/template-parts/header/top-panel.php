<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TalkingBusiness_Lite
 */

// Don't show top panel if all elements are disabled.
if ( ! talkingbusiness_lite_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel">
	<div <?php echo talkingbusiness_lite_get_container_classes( array( 'top-panel__wrap' ), 'header' ); ?>><?php
		talkingbusiness_lite_top_menu();
		talkingbusiness_lite_top_message( '<div class="top-panel__message">%s</div>' );
		talkingbusiness_lite_top_search( '<div class="top-panel__search">%s</div>' );
	?></div>
</div><!-- .top-panel -->