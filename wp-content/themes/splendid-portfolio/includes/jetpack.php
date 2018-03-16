<?php
/*
================================================================================================
Splendid Portfolio - jetpack.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for
a theme. The jetpack.php template file allows you to enable certain features within jetpack's
plugin. In this case, the only feature is supported in this theme is portfolio feature. 

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Jetpack Setup
 2.0 - Jetpack Portfolio Title
================================================================================================
*/

/*
================================================================================================
 1.0 - Jetpack Setup
================================================================================================
*/
function splendid_portfolio_jetpack_setup() {
    add_theme_support('jetpack-portfolio', array(
        'title' => true,
    ));
}
add_action('after_setup_theme', 'splendid_portfolio_jetpack_setup');

/*
================================================================================================
 2.0 - Jetpack Portfolio Title
================================================================================================
*/
function splendid_portfolio_portfolio_title_setup($before = '', $after = '') {
    $portfolio_title = get_option('jetpack_portfolio_title', __('Projects', 'splendid-portfolio'));
    $title = '';
    
    if (isset($portfolio_title) && '' != $portfolio_title) {
        $title = esc_html($portfolio_title);
    } else {
        $title = esc_html(post_type_archive_title('', false));
    }
    echo $before . $title . $after;
}