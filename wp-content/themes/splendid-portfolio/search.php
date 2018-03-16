<?php
/*
================================================================================================
Splendid Portfolio - search.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other content-search.php). The search.php template file allows you to search
contents and display them in an excerpt format.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="global-layout" class="<?php echo esc_attr(get_theme_mod('global_layout', 'left-sidebar')); ?>">
        <div id="content-area" class="content-area">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'search'); ?>
            <?php endwhile; ?>
                <div class="post-navigation">
                    <?php the_post_navigation(); ?>
                </div>
            <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
        <?php if ('sidebar-left' == get_theme_mod('global_layout')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
        <?php if ('sidebar-right' == get_theme_mod('global_layout')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
    </section>
<?php get_footer(); ?>