<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TalkingBusiness_Lite
 */
?>

<div class="header-container__flex">
	<div class="site-branding">
		<?php talkingbusiness_lite_header_logo() ?>
		<?php talkingbusiness_lite_site_description(); ?>
	</div>

	<?php talkingbusiness_lite_social_list( 'header' ); ?>

	<?php 
		talkingbusiness_lite_main_menu(); 
	?>
</div>
