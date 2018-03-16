<?php
/*
================================================================================================
Splendid Portfolio - custom-right-sidebar.php
Template Name: Right Sidebar Template
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required files to
display sidebar to the right by using this template under pages only.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="right-sidebar" class="right-sidebar">
        <div id="content-area" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'page'); ?>
            <?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </section>
<?php get_footer(); ?>