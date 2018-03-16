<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop_lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		travelop_lite_meta_categories( 'single' );
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">

				<?php
				travelop_lite_meta_author(
					'single',
					array(
						'before' => esc_html__( '&mdash;&nbsp;&nbsp; By', 'travelop_lite' ) . ' ',
					)
				);

				travelop_lite_meta_date( 'single', array(
					'before' => '<i></i>',
				) );

				travelop_lite_meta_comments( 'single', array(
					'before' => '<i class="material-icons">mode_comment</i>',
					'zero'   => '0 Comments',
					'one'    => '1 Comment',
					'plural' => '% Comments',
				) );
				?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="post-featured-content format-quote invert">
		<?php travelop_lite_sticky_label(); ?>
		<?php do_action( 'cherry_post_format_quote' ); ?>

	</div><!-- .post-featured-content -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		<?php
		travelop_lite_meta_tags( 'single', array(
			'before'    => '<i></i>',
			'separator' => ', ',
		) );
		?>
		<?php travelop_lite_share_buttons( 'single' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
