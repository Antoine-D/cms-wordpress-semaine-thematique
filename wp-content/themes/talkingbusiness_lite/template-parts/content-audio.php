<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TalkingBusiness_Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $utility = talkingbusiness_lite_utility()->utility; ?>

	<div class="post-list__item-content">

		<?php $cats_visible = talkingbusiness_lite_is_meta_visible( 'blog_post_categories', 'loop' ) ? 'true' : 'false'; ?>

		<?php $utility->meta_data->get_terms( array(
				'visible' => $cats_visible,
				'type'    => 'category',
				'icon'    => '',
				'before'  => '<div class="post__cats">',
				'after'   => '</div>',
				'echo'    => true,
			) );
		?>

		<?php talkingbusiness_lite_sticky_label(); ?>

		<header class="entry-header">
			<?php
				$utility->attributes->get_title( array(
					'class' => 'entry-title',
					'html'  => '<h4 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h4>',
					'echo'  => true,
				) );
			?>
		</header><!-- .entry-header -->

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<span class="post__date">
					<?php $date_visible = talkingbusiness_lite_is_meta_visible( 'blog_post_publish_date', 'loop' ) ? 'true' : 'false';

						$utility->meta_data->get_date( array(
							'visible' => $date_visible,
							'class'   => 'post__date-link',
							'echo'    => true,
						) );
					?>
				</span>

				<?php $author_visible = talkingbusiness_lite_is_meta_visible( 'blog_post_author', 'loop' ) ? 'true' : 'false'; ?>

				<?php $utility->meta_data->get_author( array(
						'visible' => $author_visible,
						'class'   => 'posted-by__author',
						'prefix'  => esc_html__( 'by ', 'talkingbusiness_lite' ),
						'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
						'echo'    => true,
					) );
				?>

				<span class="post__comments">
					<?php $comment_visible = talkingbusiness_lite_is_meta_visible( 'blog_post_comments', 'loop' ) ? 'true' : 'false';

						$utility->meta_data->get_comment_count( array(
							'visible' => $comment_visible,
							'class'   => 'post__comments-link',
							'sufix'  => _n_noop( 'comment (%1$s)', 'comments (%1$s)', 'talkingbusiness_lite' ),
							'echo'    => true,
						) );
					?>
				</span>
				<?php 
				?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

		<div class="entry-post-format-audio">
			<?php $utility->media->get_image( array(
					'size'        => 'talkingbusiness_lite-thumb-560-390',
					'class'       => 'post-thumbnail__link',
					'html'        => '<a href="%1$s" %2$s><img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s></a>',
					'placeholder' => false,
					'echo'        => true,
				) );
			?>

			<?php 
				$media = get_attached_media( 'audio', get_the_ID() );
				$media = array_shift( $media );
			?>

			<div class="post-format-audio">
				<div class="post-format-audio-center">
					<div class="post-format-audio-header">
						<h6 class="post-format-audio-caption"><?php echo $media->post_excerpt; ?></h6>
						<div class="post-format-audio-description"><?php echo $media->post_content; ?></div>
					</div>
					<?php do_action( 'cherry_post_format_audio' ); ?>
				</div>
			</div>
		</div>

		<div class="entry-content">
			<?php $embed_args = array(
					'fields' => array( 'soundcloud' ),
					'height' => 310,
					'width'  => 310,
				);

				$embed_content = apply_filters( 'cherry_get_embed_post_formats', false, $embed_args );

				if ( false === $embed_content ) {

					$blog_content = get_theme_mod( 'blog_posts_content', talkingbusiness_lite_theme()->customizer->get_default( 'blog_posts_content' ) );
					$length       = ( 'full' === $blog_content ) ? 0 : 55;

					$utility->attributes->get_content( array(
						'length'       => $length,
						'content_type' => 'post_excerpt',
						'echo'         => true,
					) );

				} else {
					printf( '<div class="embed-wrapper">%s</div>', $embed_content );
				}
			?>
		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		<?php $utility->attributes->get_button( array(
				'class' => 'btn btn-primary',
				'text'  => get_theme_mod( 'blog_read_more_text', talkingbusiness_lite_theme()->customizer->get_default( 'blog_read_more_text' ) ),
				'icon'  => '<i class="material-icons">arrow_forward</i>',
				'html'  => '<a href="%1$s" %3$s><span class="btn__text">%4$s</span>%5$s</a>',
				'echo'  => true,
			) );
		?>
		<?php talkingbusiness_lite_share_buttons( 'loop' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
