<?php
/**
 * Template part to display subscribe form.
 *
 * @package TalkingBusiness_Lite
 * @subpackage widgets
 */
?>
<div class="subscribe-block">
	<div class="subscribe-block-descr">
		<?php echo $this->get_block_title( 'subscribe' ); ?>
		<?php echo $this->get_block_message( 'subscribe' ); ?>
	</div>

	<form method="POST" action="#" class="subscribe-block__form"><?php
		wp_nonce_field( 'talkingbusiness_lite_subscribe', 'talkingbusiness_lite_subscribe' );
	?><div class="subscribe-block__input-group"><?php
		echo $this->get_subscribe_input();
		$btn = 'btn';
		if ( 'footer-area' === $this->args['id'] ) {
			$btn .= ' btn-secondary';
		}
		echo $this->get_subscribe_submit( $btn );
	?></div><?php
		echo $this->get_subscribe_messages();
	?></form>
</div>