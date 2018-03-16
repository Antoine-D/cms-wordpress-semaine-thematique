<?php
/**
 * Template part for centered Header layout.
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

	<div class="site-menu">
		<?php
			talkingbusiness_lite_main_menu();

		?>
	</div>
</div>
