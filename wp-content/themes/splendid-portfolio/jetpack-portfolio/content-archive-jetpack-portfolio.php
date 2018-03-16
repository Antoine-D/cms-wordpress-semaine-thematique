<?php
/*
================================================================================================
Splendid Portfolio - content-archive-jetpack-portfolio.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
archive in many ways. This should only works for jetpack portfolio.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php echo splendid_portfolio_portfolio_title_setup(); ?></h1>
    </header>
    <div class="entry-content cf">
        <ul class="portfolio-grid cf">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_post_thumbnail('splendid_portfolio_portfolio'); ?>
                    </a>
                    <div class="portfolio-caption">
                        <h3 class="portfolio-caption-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="portfolio-navigation">
        <?php
            the_posts_navigation( array(
                'prev_text'          => esc_html__( 'Older Projects', 'splendid-portfolio' ),
                'next_text'          => esc_html__( 'Newer Projects', 'splendid-portfolio' ),
                'screen_reader_text' => esc_html__( 'Portfolio Navigation', 'splendid-portfolio' ),
            ) );
        ?>
    </div>
</article>

