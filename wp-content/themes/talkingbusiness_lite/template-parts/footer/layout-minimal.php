<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package TalkingBusiness_Lite
 */
?>

<div class="footer-container">
	<div <?php echo talkingbusiness_lite_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__mid-box">
			<?php talkingbusiness_lite_footer_copyright(); ?>
			<?php talkingbusiness_lite_footer_menu(); ?>
			<?php talkingbusiness_lite_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
