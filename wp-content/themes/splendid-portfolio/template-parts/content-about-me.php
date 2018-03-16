<?php
/*
================================================================================================
Splendid Portfolio - content-aobut-me.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content-about-me.php will display about me information.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title">', '</h1>')); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php wp_link_pages(); ?>
</article>
<?php comments_template(); ?>