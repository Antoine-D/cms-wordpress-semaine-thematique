<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop_lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<div class="post-list__item-content">

	<div class="post-featured-content format-quote invert">
		<?php travelop_lite_meta_categories( 'loop' ); ?>
		<?php travelop_lite_sticky_label(); ?>
		<?php do_action( 'cherry_post_format_quote' ); ?>
	</div><!-- .post-featured-content -->

	<div class="entry-content">
		<?php
			if ( get_theme_mod( 'blog_layout_type' ) !== 'default')
				travelop_lite_blog_content();
			else '';
		?>
	</div><!-- .entry-content -->

    <?php if ( 'post' === get_post_type() ) : ?>

        <div class="entry-meta">

            <?php
            travelop_lite_meta_author(
                'loop',
                array(
                    'before' => esc_html__( '&mdash;&nbsp;&nbsp; By', 'travelop_lite' ) . ' ',
                )
            );
            ?>

            <?php
            travelop_lite_meta_date( 'loop', array(
                'before' => '<i></i>',
            ) );

            travelop_lite_meta_comments( 'loop', array(
                'before' => '<i class="material-icons">mode_comment</i>',
                'zero'   => '0 Comments',
                'one'    => '1 Comment',
                'plural' => '% Comments',
            ) );

            travelop_lite_meta_tags( 'loop', array(
                'before'    => '<i></i>',
                'separator' => ', ',
            ) );
            ?>
        </div><!-- .entry-meta -->

    <?php endif; ?>

	</div>

	<footer class="entry-footer">
		<?php travelop_lite_share_buttons( 'loop' ); ?>
		<?php travelop_lite_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
