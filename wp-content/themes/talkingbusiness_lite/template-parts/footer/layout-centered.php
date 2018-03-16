<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package TalkingBusiness_Lite
 */

?>

<div class="footer-full-width-area-wrap">
	<div class="container">
		<?php do_action( 'talkingbusiness_lite_render_widget_area', 'footer-full-width-area' ); ?>
	</div>
</div>

<div class="footer-area-wrap invert">
	<div class="container">
		<?php do_action( 'talkingbusiness_lite_render_widget_area', 'footer-area' ); ?>
	</div>
</div>

<div class="footer-container">
	<div <?php echo talkingbusiness_lite_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__mid-box">
			<?php talkingbusiness_lite_footer_copyright(); ?>
			<?php talkingbusiness_lite_footer_menu(); ?>
			<?php talkingbusiness_lite_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
