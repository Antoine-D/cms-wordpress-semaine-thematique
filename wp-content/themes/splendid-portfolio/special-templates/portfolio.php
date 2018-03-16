<?php
/*
================================================================================================
Splendid Portfolio - portfolio.php
Template Name: Portfolio Template
================================================================================================
This is the most special template file in a WordPress theme and is one of the required files 
for a theme. The portfolio.php template file is a custom template that you can use to create a 
static page in the reading section to display your porfolio.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
<header class="portfolio-header">
    <h1 class="portfolio-title"><?php echo splendid_portfolio_portfolio_title_setup(); ?></h1>
</header>

<div class="portfolio-content cf">
    <ul class="portfolio-grid cf">
        <?php $posts_per_page = get_option('jetpack_portfolio_posts_per_page'); ?>
        <?php $query = new WP_Query(array('post_type'   => 'jetpack-portfolio', 'posts_per_page' => $posts_per_page)); ?>

        <?php if ($query->have_posts()) { ?>
            <?php while ($query->have_posts()) { ?>
                <?php $query->the_post(); ?>
                   <?php if ( has_post_thumbnail() ) { ?>
                    <li>
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php the_post_thumbnail('splendid_portfolio_portfolio'); ?>
                            </a>
                            <div class="portfolio-caption">
                                <h3 class="portfolio-caption-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                            </div>
                    </li>
                <?php } ?>
            <?php } ?> 
            <?php wp_reset_postdata(); ?>
        <?php } ?>
    </ul>
</div>
<?php get_footer(); ?>