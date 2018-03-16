<?php
/*
================================================================================================
Splendid Portfolio - functions.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other being template-tags.php). This functions.php template file allows you to 
add features and functionality to a WordPress theme which is stored in the theme's sub-directory
in the theme folder. The second template file template-tags.php allows you to add additional 
features and functionality to the WordPress theme which is stored in the includes folder and its 
called in the functions.php.

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
 1.0 - Content Width
 2.0 - Theme Setup
 3.0 - Pingback Setup
 4.0 - Enqueue Scripts and Styles
 5.0 - Register Sidebars
 6.0 - Required Files
================================================================================================
*/

/*
================================================================================================
 1.0 - Content Width
================================================================================================
Content Width is a theme feature that allows you set maximum allowed width for any content in 
the theme like OEmbeds and images added to posts.
================================================================================================
*/
function splendid_portfolio_content_width_setup() {
    $GLOBALS['content_width'] = apply_filters('splendid_portfolio_content_width_setup', 840);
}
add_action('after_setup_theme', 'splendid_portfolio_content_width_setup', 0);
/*

/*
================================================================================================
 2.0 - Theme Setup
================================================================================================
The theme setup uses the after_setup_theme hook to initialize basic setup, registration and init 
action for a theme. 
================================================================================================
*/
function splendid_portfolio_theme_setup() {
    /*
    ================================================================================================
    Enable and activate add_theme_support('title-tag); for Splendid Portfolio. This feature should
    be used in place instead of wp_title() function. 
    ================================================================================================
    */
    add_theme_support('title-tag');
	
    /*
    ================================================================================================
    Enable and activate load_theme_textdomain('splendid-portfolio'); for Splendid Portfolio. 
    ================================================================================================
    */
    load_theme_textdomain('splendid-portfolio');
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('automatic-feed-links'); for Splendid Portfolio. This feature
    enables Automtic Feed Links for posts and comments in the head. This should be used in place of
    the deprected automatic_feed_links() function. 
    ================================================================================================
    */
    add_theme_support('automatic-feed-links');
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('html5'); for Splendid Portfolio. This feature allows the
    use of HTML5 markup for search forms, comment forms, comment list, gallery, and captions.
    ================================================================================================
    */
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'caption'
    ));
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('custom-background'); for Splendid Portfolio. This feature
    enables custom backgrounds and colors for a theme.
    ================================================================================================
    */
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    /*
    ================================================================================================
    Enable and activate add_theme_support('post-thumbnails); for Splendid Portfolio. This feature
    enables Post Thumbnails (Featured Images) support for a theme. If you wish to display thumbnails,
    use the following to display the_post_thumbnail();. If you need to to check of there is a post
    thumbnail, then use has_post_thumbnail();.
    ================================================================================================
    */
    add_theme_support('post-thumbnails');
    add_image_size('splendid-portfolio-featured-image', 1200, 372, true);
    add_image_size('splendid-portfolio-jetpack-portfolio', 1200, 630, true);
    
    /*
    ================================================================================================
    Enable and activate add_post_type_suport('page', 'excerpt'); for Splendid Portfolio. This feature
    enables excerpt for pages only that needs it. Excerpts is already supported in posts.
    ================================================================================================
    */
    add_post_type_support('page', 'excerpt');
    
    /*
    ================================================================================================
    Enable and activate register_nav_menus(); for Primary and Social Navigation. This feature when
    enabled allows you to create multiple custom navigation menus in the dashboard. 
    ================================================================================================
    */
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'splendid-portfolio'),
        'social-navigation'     => esc_html__('Social Navigation', 'splendid-portfolio'),
    ));
}
add_action('after_setup_theme', 'splendid_portfolio_theme_setup');

/*
================================================================================================
 3.0 - Pingback Setup
================================================================================================
WordPress has an enqueuing system for adding scripts and styles locally or remotely to prevent
conflicts with plugins. 
================================================================================================
*/
function splendid_portfolio_pingback_setup() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
	}
}
add_action('wp_head', 'splendid_portfolio_pingback_setup');

/*
================================================================================================
 4.0 - Enqueue Scripts and Styles
================================================================================================
WordPress has an enqueuing system for adding scripts and styles locally or remotely to prevent
conflicts with plugins. 
================================================================================================
*/
function slendid_portflio_enqueue_scripts_setup() {
    /*
    ============================================================================================
    Enable and activate the main theme stylesheet for Splendid Portfolio.
    ============================================================================================
    */
    wp_enqueue_style('splendid-portfolio-style', get_stylesheet_uri());
    
    /*
    ================================================================================================
    Enable and activate Google Fonts (Sanchez and Merriweather Sans) locally for Splendid Portfolio.
    For more information regarding this feature, please go the following url to begin the awesomeness
    of Google WebFonts Helper (https://google-webfonts-helper.herokuapp.com/fonts)
    ================================================================================================
    */
    wp_enqueue_style('splendid-portfolio-custom-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '01012017', true);
    
    /*
    ================================================================================================
    Enable and activate Font Awesome 4.7 locally for Splendid Portfolio. For more information about
    Font Awesome, please navigate to the URL for more information. (http://fontawesome.io/)
    ================================================================================================
    */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '01012017', true);
    
    /*
    ================================================================================================
    Enable and activate JavaScript/JQuery to support Navigation for Primary Navigation for Splendid
    Portfolio. This allows you to use click feature for dropdowns and multiple depths, When using 
    this new feature of the navigation. The Menu for mobile side is now at the bottom of the page.
    ================================================================================================
    */
    wp_enqueue_script('splendidportfolionavigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20160601', true);
	wp_localize_script('splendidportfolionavigation', 'splendidportfolioscreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'splendid-portfolio') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'splendid-portfolio') . '</span>',
	));
    
    /*
    ================================================================================================
    Enable and activate the threaded comments for Splendid Portfolio. This allows users to comment
    by clicking on reply so that it gets nested to the comments you are trying to respnse too. 
    ================================================================================================
    */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'slendid_portflio_enqueue_scripts_setup');

/*
================================================================================================
 4.0 - Register Sidebars
================================================================================================
Registers one or more sidebars to be use in the current theme. Most themes have only one sidebar.
For this theme, It contains three sidebars (Primary, Secondary, and Custom Sidebar).
================================================================================================
*/
function splendid_portfolio_widgets_init_setup() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'splendid-portfolio'),
        'description'   => __('When using the Primary Sidebar, widgets will display in the Posts section.', 'splendid-portfolio'),
        'id'            => 'primary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'splendid-portfolio'),
        'description'   => __('When using the Custom Sidebar, widgets will display in the Pages section.', 'splendid-portfolio'),
        'id'            => 'custom',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('About Me Sidebar', 'splendid-portfolio'),
        'description'   => __('When using the About Me, widgets will display in the About Me Template when is set as static page.', 'splendid-portfolio'),
        'id'            => 'about-me',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Portfolio Sidebar', 'splendid-portfolio'),
        'description'   => __('When using the Portfolio Sidebar, widgets will display in the Portfolio when is set as static page.', 'splendid-portfolio'),
        'id'            => 'portfolio',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Contact Me Sidebar', 'splendid-portfolio'),
        'description'   => __('When using the Contact Me Sidebar, widgets will display in the Portfolio when is set as static page.', 'splendid-portfolio'),
        'id'            => 'contact-me',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'splendid_portfolio_widgets_init_setup');

/*
================================================================================================
 5.0 - Required Files
================================================================================================
Required Files are set of files that are needed as part of the theme to help manage and add new
features to the theme.
================================================================================================
*/
require_once(get_template_directory() . '/extras/inline-styles/header-image.php');
require_once(get_template_directory() . '/includes/custom-header.php');
require_once(get_template_directory() . '/includes/customizer.php');
require_once(get_template_directory() . '/includes/jetpack.php');
require_once(get_template_directory() . '/includes/template-tags.php');