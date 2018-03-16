<?php
/*
================================================================================================
Splendid Portfolio - custom-sidebar.php
Template Name: Custom Sidebar Template
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files that 
allows users to choose a custom sidebar template, this will show in customizer to allow users
to switch left or right siderbar and even full width if needed.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="custom-layout" class="<?php echo esc_attr(get_theme_mod('custom_layout', 'left-sidebar')); ?>">
        <div id="content-area" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'page'); ?>
            <?php endwhile; ?>
        </div>
        <?php if ('left-sidebar' == get_theme_mod('custom_layout')) { ?>
            <?php get_sidebar('custom'); ?>
        <?php } ?>
        <?php if ('right-sidebar' == get_theme_mod('custom_layout')) { ?>
            <?php get_sidebar('custom'); ?>
        <?php } ?>
    </section>
<?php get_footer(); ?>