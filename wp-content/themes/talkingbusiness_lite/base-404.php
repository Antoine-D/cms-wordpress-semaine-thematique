<?php get_header( talkingbusiness_lite_template_base() ); ?>

	<?php do_action( 'talkingbusiness_lite_render_widget_area', 'full-width-header-area' ); ?>

	<?php talkingbusiness_lite_site_breadcrumbs(); ?>

	<div class="site-content_wrap">

		<?php do_action( 'talkingbusiness_lite_render_widget_area', 'before-content-area' ); ?>

			<div id="primary">

				<?php do_action( 'talkingbusiness_lite_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include talkingbusiness_lite_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'talkingbusiness_lite_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

		<?php do_action( 'talkingbusiness_lite_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'talkingbusiness_lite_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( talkingbusiness_lite_template_base() ); ?>
