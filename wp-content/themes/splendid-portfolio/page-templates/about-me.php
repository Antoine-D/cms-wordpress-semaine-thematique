<?php
/*
================================================================================================
Splendid Portfolio - about-me.php
Template Name: About Me Template
================================================================================================
The About Me Tempate only works or should work if you have an about me page. 

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="about-layout" class="<?php echo esc_attr(get_theme_mod('about_layout', 'left-sidebar')); ?>">
        <div id="content-area" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'about-me'); ?>
            <?php endwhile; ?>
        </div>
        <?php if ('left-sidebar' == get_theme_mod('about_layout')) { ?>
            <?php get_sidebar('about-me'); ?>
        <?php } ?>
        <?php if ('right-sidebar' == get_theme_mod('about_layout')) { ?>
            <?php get_sidebar('about-me'); ?>
        <?php } ?>
    </section>
<?php get_footer(); ?>
