<div class="comment-body__holder">
	<div class="comment-body__author vcard">
		<?php echo talkingbusiness_lite_comment_author_avatar(); ?>
	</div>
	<div class="comment-body__comment">
		<div class="comment-meta">
			<div class="comment-metadata">
				<?php printf(  '<span class="posted-by">%1s</span> %2s', 
				esc_html__( 'Posted by', 'talkingbusiness_lite' ), 
				talkingbusiness_lite_get_comment_author_link() ); ?>
			</div>
		</div>
		<div class="comment-content">
			<?php echo talkingbusiness_lite_get_comment_text(); ?>
		</div>
	</div>
</div>
<div class="reply">
	<?php echo talkingbusiness_lite_get_comment_reply_link( array( 'reply_text' => '<i class="material-icons">reply</i>' ) ); ?>
</div>