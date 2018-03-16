<?php
/*
================================================================================================
Splendid Portfolio - content-none.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
404 and Search as well as recent posts.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php if (is_404()) {
                esc_html_e('Page Not Available', 'splendid-portfolio');
            } else if (is_search()) {
                printf(__('Nothing found for: <small>', 'splendid-portfolio') . get_search_query() . '</small>');
            } else {
                esc_html_e('Nothing Found', 'splendid-portfolio');
            }
            ?>
        </h1>
    </header>
    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'splendid-portfolio' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif (is_404()) : ?>
            <p><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'splendid-portfolio' ); ?></p>
            <?php get_search_form(); ?>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'splendid-portfolio' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'splendid-portfolio' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>

<div class="recent-posts">
    <?php if (is_404() || is_search()) { ?>
        <h3 class="recent-posts"><?php esc_html_e('Most Recent Posts', 'splendid-portfolio'); ?></h3>
            <ul>
                <?php
                    $args = array('numberposts' => '10', 'post_status' => 'publish');
                    $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) {
                            echo '<li><a href="' . esc_url(get_permalink($recent["ID"])) . '">' .   $recent["post_title"].'</a> </li>';
                        }
                ?>
            </ul>
    <?php
    }
    ?>
</div>