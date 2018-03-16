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

		<div class="post-featured-content">
			<?php do_action( 'cherry_post_format_video', array( 'width'  => 770, 'height' => 480, ) ); ?>
			<?php travelop_lite_meta_categories( 'loop' ); ?>
			<?php travelop_lite_sticky_label(); ?>
		</div><!-- .post-featured-content -->

        <?php if ( 'post' === get_post_type() ) : ?>

            <div class="entry-meta">
                <span></span>
                <?php
                travelop_lite_meta_author(
                    'loop',
                    array(
                        'before' => esc_html__( '&mdash;&nbsp;&nbsp; By', 'travelop_lite' ) . ' ',
                    )
                );
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
                    'before'    => '<span>Tags:&nbsp;</span>',
                    'separator' => ', ',
                ) );
                ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>

		<header class="entry-header">
			<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php travelop_lite_blog_content(); ?>
		</div><!-- .entry-content -->

	</div>
	<footer class="entry-footer">
		<?php travelop_lite_share_buttons( 'loop' ); ?>
		<?php travelop_lite_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
