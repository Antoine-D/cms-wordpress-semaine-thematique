<?php
/*
================================================================================================
Splendid Portfolio - contact-me.php
Template Name: Contact Me Template
================================================================================================
The contact me template is mainly for the users that created a contact me page and use this as
a default template for that.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="contact-layout" class="<?php echo esc_attr(get_theme_mod('contact_layout', 'left-sidebar')); ?>">
        <div id="content-area" class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'contact-me'); ?>
            <?php endwhile; ?>
        </div>
        <?php if ('left-sidebar' == get_theme_mod('contact_layout')) { ?>
            <?php get_sidebar('contact-me'); ?>
        <?php } ?>
        <?php if ('right-sidebar' == get_theme_mod('contact_layout')) { ?>
            <?php get_sidebar('contact-me'); ?>
        <?php } ?>
    </section>
<?php get_footer(); ?>