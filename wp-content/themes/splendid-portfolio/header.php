<?php
/*
================================================================================================
Splendid Portfolio - header.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other footer.php). The header.php template file only displays the header section
of this theme. This also displays the navigation menu as well or any extra features such s social
navigation.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <div id="social-navigation" class="social-navigation cf">
        <div id="align-center" class="align-center cf">
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'social-navigation',
                    'container'         => 'nav',
                    'container_id'      => 'menu-social',
                    'container_class'   => 'menu-social',
                    'menu_id'           => 'menu-social-items',
                    'menu_class'        => 'menu-items',
                    'depth'             => 1,
                    'link_before'       => '<span class="screen-reader-text">',
                    'link_after'        => '</span>',
                    'fallback_cb'       => '',
                ));                                  
            ?>
        </div>
    </div>
    <div id="logo-navigation" class="logo-navigation">
        <div id="align-center" class="align-center">
            <div id="site-logo" class="site-logo">
                <?php $site_title = get_bloginfo('name'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <div class="screen-reader-text">
                        <?php printf(esc_html__('Go to the home page of %1$s', 'splendid-portfolio'), $site_title); ?>	
                    </div>
                    <?php
                    if (has_site_icon()) {
                        $site_icon = get_site_icon_url(270); ?>
                        <img class="site-icon" src="<?php echo esc_url($site_icon); ?>">
                    <?php } else { ?>
                        <div class="site-firstletter" aria-hidden="true">
                            <?php echo substr($site_title, 0, 1); ?>
                        </div>
                    <?php } ?>
                </a>
            </div>
            <?php if (has_nav_menu('primary-navigation')) { ?>
                <nav id="site-navigation" class="primary-navigation">
                    <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'splendid-portfolio'); ?></button>
                    <?php wp_nav_menu(array(
                        'theme_location'    => 'primary-navigation',
                        'menu_id'           => 'primary-menu',
                        'menu_class'        => 'nav-menu'   
                    )); 
                    ?>
                </nav>            
            <?php } ?>
        </div>
    </div>
    <?php if (get_header_image()) { ?>
        <header id="site-header" class="site-header" style="background: url(<?php header_image(); ?>);">
            <div id="site-branding" class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
        </header>
    <?php } else { ?>
        <header id="site-header" class="site-header header-image-background">
            <div id="site-branding" class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <h4 class="site-description"><?php bloginfo('description'); ?></h4>
            </div>
        </header>
    <?php } ?>
    <section id="site-content" class="site-content cf">
        <div id="site-main" class="site-main">