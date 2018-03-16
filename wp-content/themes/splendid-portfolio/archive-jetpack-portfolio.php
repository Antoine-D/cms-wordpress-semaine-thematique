<?php
/*
================================================================================================
Splendid Portfolio - archive-jetpack-portfolio.php
================================================================================================
This will display automatically for portfolio, once you have succuessfully added content in the
portfolio in the dashboad. this is where all information  will come in and uses the the following
file content-archive-jetpack-portfolio.php to display information.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
<div id="content-area" class="content-area">
    <?php if (have_posts()) : ?>
            <?php get_template_part('jetpack-portfolio/content', 'archive-jetpack-portfolio'); ?>
    <?php else : ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>