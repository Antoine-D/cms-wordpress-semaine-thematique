<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop_lite
 */
?>
<div class="container">
    <div class="site-branding">
        <?php travelop_lite_header_logo() ?>
        <?php travelop_lite_site_description(); ?>
    </div>
</div>

<?php travelop_lite_social_list( 'header' ); ?>
<?php travelop_lite_main_menu(); ?>

