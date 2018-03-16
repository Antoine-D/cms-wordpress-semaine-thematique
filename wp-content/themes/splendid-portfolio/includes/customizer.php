<?php
/*
================================================================================================
Splendid Portfolio - customizer.php
================================================================================================
The customizer.php gives the user the ability to change features within the customizer. This has
been setup to allow users to set different layouts within the theme and other features that the
WordPress functionality is included.

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
 1.0 - Customize Custom Classes (Setup)
 2.0 - Customize Register (Layout Setup)
 3.0 - Customize Register (Validation)
 4.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Custom Classes (Setup)
================================================================================================
*/
function splendid_portfolio_custom_classes_setup($wp_customize) {
    class Splendid_Portfolio_Control_Radio_Image extends WP_Customize_Control {
        public $type = 'radio-image';

        public function enqueue() {
            wp_enqueue_script('splendid-portfolio-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array('jquery'));
            wp_enqueue_style('splendid-portfolio-customize-controls', get_template_directory_uri() . '/css/customize-controls.css');
        }

        public function to_json() {
            parent::to_json();

            // We need to make sure we have the correct image URL.
            foreach ( $this->choices as $value => $args )
                $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

            $this->json['choices'] = $this->choices;
            $this->json['link']    = $this->get_link();
            $this->json['value']   = $this->value();
            $this->json['id']      = $this->id;
        }

        public function content_template() { ?>

            <# if ( ! data.choices ) {
                return;
            } #>

            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <# _.each( data.choices, function( args, choice ) { #>
                <label>
                    <input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

                    <span class="screen-reader-text">{{ args.label }}</span>

                    <img src="{{ args.url }}" alt="{{ args.label }}" />
                </label>
            <# } ) #>
        <?php }
    }
    
    $wp_customize->register_control_type('Splendid_Portfolio_Control_Radio_Image');
}
add_action('customize_register', 'splendid_portfolio_custom_classes_setup');

/*
================================================================================================
 2.0 - Customize Register (Layout Setup)
================================================================================================
*/
function splendid_portfolio_customize_register_layout_setup($wp_customize) {
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    
    // Enable and activate General Layout for Splendid Portfolio.
    $wp_customize->add_panel('general_layouts', array(
        'title' => esc_html__('General Layouts', 'splendid-portfolio'),
        'priority'  => 5
    ));
    
    // Enable Global Layout
    $wp_customize->add_section('global_layout', array(
        'title'     => esc_html__('Global Layout', 'splendid-portfolio'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('global_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'splendid_portfolio_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Splendid_Portfolio_Control_Radio_Image($wp_customize, 'global_layout', array(
        'label'     => __('General Layout', 'splendid-portfolio'),
        'description'   => __('General Layout applies to all layouts that supports in this theme.', 'splendid-portfolio'),
        'section'   => 'global_layout',
        'settings'  => 'global_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'left-sidebar' => array(
                'label' => esc_html__('Left Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cl.png',
            ),
            'right-sidebar' => array(
                'label' => esc_html__('Right Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cr.png',
            ),
            'no-sidebar' => array(
                'label' => esc_html__('No Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate Custom Layout for Splendid Portfolio.
    $wp_customize->add_section('custom_layout', array(
        'title'     => esc_html__('Custom Layout', 'splendid-portfolio'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('custom_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'splendid_portfolio_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Splendid_Portfolio_Control_Radio_Image($wp_customize, 'custom_layout', array(
        'label'         => __('Custom Layout', 'splendid-portfolio'),
        'description'   => __('custom Layout uses the Custom Sidebar Template to be able to switch layouts which only applies to pages only', 'splendid-portfolio'),
        'section'       => 'custom_layout',
        'settings'      => 'custom_layout',
        'type'          => 'radio-image',
        'choices'       => array(
            'left-sidebar' => array(
                'label' => esc_html__('Left Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cl.png',
            ),
            'right-sidebar' => array(
                'label' => esc_html__('Right Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/2cr.png',
            ),
            'no-sidebar' => array(
                'label' => esc_html__('No Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate About Layout for Splendid Portfolio.
    $wp_customize->add_section('about_layout', array(
        'title'     => esc_html__('About Me Layout', 'splendid-portfolio'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('about_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'splendid_portfolio_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Splendid_Portfolio_Control_Radio_Image($wp_customize, 'about_layout', array(
        'label'     => __('About Me Layout', 'splendid-portfolio'),
        'section'   => 'about_layout',
        'settings'  => 'about_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'left-sidebar' => array(
                'label' => esc_html__('Left Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cl.png',
            ),
            'right-sidebar' => array(
                'label' => esc_html__('Right Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/2cr.png',
            ),
            'no-sidebar' => array(
                'label' => esc_html__('No Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate Portfolio Layout for Splendid Portfolio.
    $wp_customize->add_section('portfolio_layout', array(
        'title'     => esc_html__('Portfolio Layout', 'splendid-portfolio'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('portfolio_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'splendid_portfolio_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Splendid_Portfolio_Control_Radio_Image($wp_customize, 'portfolio_layout', array(
        'label'     => __('Portfolio Layout', 'splendid-portfolio'),
        'section'   => 'portfolio_layout',
        'settings'  => 'portfolio_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'left-sidebar' => array(
                'label' => esc_html__('Left Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cl.png',
            ),
            'right-sidebar' => array(
                'label' => esc_html__('Right Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/2cr.png',
            ),
            'no-sidebar' => array(
                'label' => esc_html__('No Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
    
    // Enable and activate Contact Layout for Splendid Portfolio.
    $wp_customize->add_section('contact_layout', array(
        'title'     => esc_html__('Contact Layout', 'splendid-portfolio'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('contact_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'splendid_portfolio_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Splendid_Portfolio_Control_Radio_Image($wp_customize, 'contact_layout', array(
        'label'     => __('Contact Layout', 'splendid-portfolio'),
        'section'   => 'contact_layout',
        'settings'  => 'contact_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'left-sidebar' => array(
                'label' => esc_html__('Left Sidebar (Default)', 'splendid-portfolio'),
                'url'   => '%s/images/2cl.png',
            ),
            'right-sidebar' => array(
                'label' => esc_html__('Right Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/2cr.png',
            ),
            'no-sidebar' => array(
                'label' => esc_html__('No Sidebar', 'splendid-portfolio'),
                'url'   => '%s/images/1col.png',
            ),
        ),
    )));
}
add_action('customize_register', 'splendid_portfolio_customize_register_layout_setup');

if (class_exists('Jetpack_Portfolio')) {
    function splendid_portfolio_jetpack_customize_register_setup($wp_customize) {
        $wp_customize->get_section('jetpack_portfolio')->title = esc_html__('Portfolio', 'splendid-portfolio');
        $wp_customize->get_section('jetpack_portfolio')->priority = 10;
        $wp_customize->get_setting('jetpack_portfolio_title')->transport = 'postMessage';
    }
    add_action('customize_register', 'splendid_portfolio_jetpack_customize_register_setup', 11);
}


/*
================================================================================================
 3.0 - Customize Register (Validation)
================================================================================================
*/
function splendid_portfolio_sanitize_layout($value) {
    if (!in_array($value, array('left-sidebar', 'right-sidebar', 'no-sidebar'))) {
        $value = 'left-sidebar';
    }
    return $value;
}
function splendid_portfolio_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

/*
================================================================================================
 4.0 - Customize Register (Preview)
================================================================================================
*/
function splendid_portfolio_customize_preview_js() {
    // Enable and activate Customize Preview JavaScript for White Spektrum.
    wp_enqueue_script('splendid-portfoloio-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('jquery', 'customize-preview'), '11172014', true);
}
add_action('customize_preview_init', 'splendid_portfolio_customize_preview_js');