<?php
/*
================================================================================================
Splendid Portfolio - header-image.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of required file to display
header image by using wp_add_inline_style();.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
function splendid_portfolio_header_image_setup() {
        $header_image = esc_url(get_theme_mod('header_image'));
        $custom_css = "
            .site-header.header-image{
                background: url({$header_image});
                background-repeat: no-repeat;
                background-position: top;
                background-attachment: fixed;
            }
        ";
        wp_add_inline_style('splendid-portfolio-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'splendid_portfolio_header_image_setup');