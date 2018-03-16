<?php
/*
================================================================================================
Splendid Portfolio - custom-full-width.php
Template Name: Full Width Template
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being content-full-width.php). The custom-full-width.php template file 
allows you to use the this template as a custom one to allow to set Full Width in pages. It will
use the content-full-wdith.php to display the output.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="no-sidebar" class="no-sidebar">
        <div id="content-area" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'page'); ?>
            <?php endwhile; ?>
        </div>
    </section>
<?php get_footer(); ?>