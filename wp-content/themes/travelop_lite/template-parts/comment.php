<footer class="comment-meta">
	<div class="comment-author vcard">
		<?php echo travelop_lite_comment_author_avatar(); ?>
    </div>
	<div class="comment-metadata">
		<?php printf( __( '<span class="posted-by">&mdash;&nbsp;&nbsp;&nbsp;By</span> %s', 'travelop_lite' ), travelop_lite_get_comment_author_link() ); ?>
		<?php echo travelop_lite_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
	</div>
</footer>
<div class="comment-content">
	<?php echo travelop_lite_get_comment_text(); ?>
</div>
<div class="reply">
	<?php echo travelop_lite_get_comment_reply_link( array( 'reply_text' => '<i class="material-icons">reply</i>' ) ); ?>
</div>