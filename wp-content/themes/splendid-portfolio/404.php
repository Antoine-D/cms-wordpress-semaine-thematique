<?php
/*
================================================================================================
Splendid Portfolio - 404.php
================================================================================================
This will get redirect to content-none.php and instead of having its own information to be called

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="content-area" class="content-area">
        <?php get_template_part('template-parts/content', 'none'); ?>
    </div>
<?php get_footer(); ?>