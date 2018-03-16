<?php
/*
================================================================================================
Splendid Portfolio - template-tags.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being functions.php). This template-tags.php template file allows you to 
add additional features and functionality to a WordPress theme which is stored in the includes 
folder. The primary template file functions.php contains the main features and functionality to 
the WordPress theme which is stored in the root of the theme's directory.

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
 1.0 - Entry Posted On
 2.0 - Entry Taxonomies
================================================================================================
*/

/*
================================================================================================
 1.0 - Entry Posted On
================================================================================================
*/
function splendid_portfolio_posted_on_setup() {
    $author = sprintf(__('by %s', 'splendid-portfolio'), 
    '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
    );
    
    echo '<span>' . splendid_portfolio_time_stamp_setup() . '</span><span class="byline"> ' . $author . '</span>';
}

function splendid_portfolio_time_stamp_setup() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if (get_the_time('U') !== get_the_modified_time('U')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr(get_the_date('c')),
		esc_html(get_the_date()),
		esc_attr(get_the_modified_date('c')),
		esc_html(get_the_modified_date())
	);

	return sprintf(
		__('<span class="screen-reader-text">Posted on</span> %s', 'splendid-portfolio'),
		'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
	);
}

/*
================================================================================================
 2.0 - Entry Taxonomies
================================================================================================
*/
function splendid_portfolio_entry_taxonomies() {
    $cat_list = get_the_category_list(__(' | ', 'splendid-portfolio'));
    $tag_list = get_the_tag_list('', __(' | ', 'splendid-portfolio'));

    if ($cat_list) {
        printf('<div class="cat-link"> %1$s <span class="cat-list"l><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-folder-open-o"></i> Posted In', 'splendid-portfolio'),  
        $cat_list
        );
    }

    if ($tag_list) {
        printf('<div class="tag-link">%1$s <span class="tag-list"><b><i>%2$s</i></b></span></div>',
        __('<i class="fa fa-tags"></i> Tagged', 'splendid-portfolio'),  
        $tag_list 
        );
    }
}