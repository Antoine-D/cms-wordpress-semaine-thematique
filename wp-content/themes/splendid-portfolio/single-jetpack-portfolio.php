<?php
/*
================================================================================================
Splendid Portfolio - single-portfolio.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="portfolio-layout" class="<?php echo esc_attr(get_theme_mod('portfolio_layout', 'left-sidebar')); ?>">
        <div id="content-area" class="content-area">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('jetpack-portfolio/content', 'jetpack-portfolio'); ?>
            <?php endwhile; ?>
                <div class="paging-navigation">
                    <?php the_post_navigation(); ?>
                </div>
            <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
        <?php if ('left-sidebar' == get_theme_mod('portfolio_layout')) { ?>
            <?php get_sidebar('portfolio'); ?>
        <?php } ?>
        <?php if ('right-sidebar' == get_theme_mod('portfolio_layout')) { ?>
            <?php get_sidebar('portfolio'); ?>
        <?php } ?>
    </section>
<?php get_footer(); ?>