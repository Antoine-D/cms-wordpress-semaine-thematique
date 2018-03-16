<?php
/**
 * Theme Customizer.
 *
 * @package TalkingBusiness_Lite
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function talkingbusiness_lite_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'talkingbusiness_lite_get_customizer_options' , array(
		'prefix'     => 'talkingbusiness_lite',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'talkingbusiness_lite' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'talkingbusiness_lite' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'talkingbusiness_lite' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'talkingbusiness_lite' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'       => esc_html__( 'Logo &amp; Favicon', 'talkingbusiness_lite' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'talkingbusiness_lite' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'talkingbusiness_lite' ),
					'text'  => esc_html__( 'Text', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'talkingbusiness_lite' ),
				'description'     => esc_html__( 'Upload logo image', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'talkingbusiness_lite' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'Raleway, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => talkingbusiness_lite_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '800',
				'field'           => 'select',
				'choices'         => talkingbusiness_lite_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => '48',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => talkingbusiness_lite_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'talkingbusiness_lite_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'talkingbusiness_lite' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'talkingbusiness_lite' ),
					'minified' => esc_html__( 'Minified', 'talkingbusiness_lite' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'talkingbusiness_lite' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'talkingbusiness_lite' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'talkingbusiness_lite' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'talkingbusiness_lite' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'talkingbusiness_lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_label' => array(
				'title'   => esc_html__( 'Social sharing label on single blog post', 'talkingbusiness_lite' ),
				'section' => 'social_links',
				'default' => esc_html__( 'Like this post? Share it!', 'talkingbusiness_lite' ),
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'talkingbusiness_lite' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'talkingbusiness_lite' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'talkingbusiness_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'talkingbusiness_lite' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'talkingbusiness_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'talkingbusiness_lite' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'talkingbusiness_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'talkingbusiness_lite' ),
				'section'     => 'page_layout',
				'default'     => 1788,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'talkingbusiness_lite' ),
				'section' => 'page_layout',
				'default' => '1/4',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Configure Color Scheme', 'talkingbusiness_lite' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'talkingbusiness_lite' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#ff771d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#2da1b5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#1e1e1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_button_text_color' => array(
				'title'   => esc_html__( 'Button text color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#1e1e1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#1e1e1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#ff771d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#1e1e1e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'talkingbusiness_lite' ),
				'section' => 'regular_scheme',
				'default' => '#3f3f3f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'talkingbusiness_lite' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#f9fafc',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#eaeaea',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ff771d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#d3d3d3',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'talkingbusiness_lite' ),
				'section' => 'invert_scheme',
				'default' => '#969696',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Configure typography settings', 'talkingbusiness_lite' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'talkingbusiness_lite' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'body_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'body_typography',
				'default'     => '19',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'body_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'talkingbusiness_lite' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h1_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h1_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h1_typography',
				'default'     => '62',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h1_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h1_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'talkingbusiness_lite' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h2_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h2_typography',
				'default'     => '39',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h2_typography',
				'default'     => '1.30;',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'talkingbusiness_lite' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h3_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h3_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h3_typography',
				'default'     => '36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h3_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'talkingbusiness_lite' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h4_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h4_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h4_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h4_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h4_typography',
				'default'     => '1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'talkingbusiness_lite' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h5_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h5_typography',
				'default' => '100',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h5_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h5_typography',
				'default'     => '1.7',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'talkingbusiness_lite' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'h6_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'h6_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'h6_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'talkingbusiness_lite' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'main_menu_typography' => array(
				'title'       => esc_html__( 'Main Menu', 'talkingbusiness_lite' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'main_menu_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'main_menu_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'main_menu_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'main_menu_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'main_menu_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '17',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'main_menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '1.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'main_menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'main_menu_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'main_menu_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'main_menu_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Button typography` section */
			'button_typography' => array(
				'title'       => esc_html__( 'Button', 'talkingbusiness_lite' ),
				'priority'    => 43,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'button_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'button_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'button_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'button_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'button_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'button_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs', 'talkingbusiness_lite' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Raleway, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'talkingbusiness_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'talkingbusiness_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'talkingbusiness_lite' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'talkingbusiness_lite' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => talkingbusiness_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'talkingbusiness_lite' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'talkingbusiness_lite' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_text_color' => array(
				'title'   => esc_html__( 'Text Color', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#fff',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#024383',
				'type'    => 'control',
				'active_callback' => 'talkingbusiness_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
				'active_callback' => 'talkingbusiness_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'talkingbusiness_lite' ),
					'repeat'     => esc_html__( 'Tile', 'talkingbusiness_lite' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'talkingbusiness_lite' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
				'active_callback' => 'talkingbusiness_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'talkingbusiness_lite' ),
					'center' => esc_html__( 'Center', 'talkingbusiness_lite' ),
					'right'  => esc_html__( 'Right', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
				'active_callback' => 'talkingbusiness_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'talkingbusiness_lite' ),
					'fixed'  => esc_html__( 'Fixed', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
				'active_callback' => 'talkingbusiness_lite_is_not_transparent_header_layout_type',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'talkingbusiness_lite' ),
				'section' => 'header_styles',
				'default' => 'transparent',
				'field'   => 'select',
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'talkingbusiness_lite' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'HTML formatting support', 'talkingbusiness_lite' ),
				'section'     => 'header_top_panel',
				'default'     => false,
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_search' => array(
				'title'   => esc_html__( 'Enable search', 'talkingbusiness_lite' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'talkingbusiness_lite' ),
				'section' => 'header_top_panel',
				'default' => '#ff771d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'talkingbusiness_lite' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'talkingbusiness_lite' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable title attributes', 'talkingbusiness_lite' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title' => array(
				'title'    => esc_html__( 'Hidden menu items title', 'talkingbusiness_lite' ),
				'section'  => 'header_main_menu',
				'default'  => esc_html__( 'More', 'talkingbusiness_lite' ),
				'field'    => 'input',
				'type'     => 'control'
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'talkingbusiness_lite' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'talkingbusiness_lite' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'talkingbusiness_lite' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'talkingbusiness_lite' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'talkingbusiness_lite' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'talkingbusiness_lite' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'talkingbusiness_lite' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'talkingbusiness_lite' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'talkingbusiness_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'talkingbusiness_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'talkingbusiness_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'talkingbusiness_lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'talkingbusiness_lite' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => '%s/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'default' => talkingbusiness_lite_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control'
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'default' => 'default',
				'field'   => 'select',
				'type' => 'control'
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area color', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'default' => '#16161e',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'type'    => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'talkingbusiness_lite' ),
				'section' => 'footer_options',
				'default' => '#024383',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'talkingbusiness_lite' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'talkingbusiness_lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => 'Listing',
				'field'   => 'select',
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'talkingbusiness_lite' ),
				'description' => esc_html__( 'Label for sticky post', 'talkingbusiness_lite' ),
				'section'     => 'blog',
				'default'     => 'icon:material:star_border',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'talkingbusiness_lite' ),
					'full'    => esc_html__( 'Full content', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'   => esc_html__( 'Featured image', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'talkingbusiness_lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'talkingbusiness_lite' ),
				),
				'type' => 'control',
			),
			'blog_read_more_text' => array(
				'title'   => esc_html__( 'Read More button text', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => esc_html__( 'More', 'talkingbusiness_lite' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'talkingbusiness_lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'talkingbusiness_lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'talkingbusiness_lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
	) ) );
}
/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function talkingbusiness_lite_is_header_logo_image( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */

	function talkingbusiness_lite_is_header_logo_text( $control ) {

		if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'text' ) {
			return true;
		}

		return false;
	}
	/**
 	* Return true if header layout type is transparent. Otherwise - return false.
 	*
 	* @param  object  $control
 	* @return bool
 	*/
	function talkingbusiness_lite_is_transparent_header_layout_type( $control ) {

		if ( $control->manager->get_setting( 'header_layout_type' )->value() == 'transparent' ) {
		return true;
		}

		return false;
	}

	/**
	 * Return true if header layout type is NOT transparent. Otherwise - return false.
 	*
 	* @param  object  $control
 	* @return bool
 	*/
	function talkingbusiness_lite_is_not_transparent_header_layout_type( $control ) {
		return ! talkingbusiness_lite_is_transparent_header_layout_type( $control );
	}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'talkingbusiness_lite_customizer_change_core_controls', 20 );
function talkingbusiness_lite_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'talkingbusiness_lite_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'talkingbusiness_lite' );
}

////////////////////////////////////
// Typography utility function    //
////////////////////////////////////
function talkingbusiness_lite_get_font_styles() {
	return apply_filters( 'talkingbusiness_lite_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'talkingbusiness_lite' ),
		'italic'  => esc_html__( 'Italic', 'talkingbusiness_lite' ),
		'oblique' => esc_html__( 'Oblique', 'talkingbusiness_lite' ),
		'inherit' => esc_html__( 'Inherit', 'talkingbusiness_lite' ),
	) );
}

function talkingbusiness_lite_get_character_sets() {
	return apply_filters( 'talkingbusiness_lite_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'talkingbusiness_lite' ),
		'greek'        => esc_html__( 'Greek', 'talkingbusiness_lite' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'talkingbusiness_lite' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'talkingbusiness_lite' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'talkingbusiness_lite' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'talkingbusiness_lite' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'talkingbusiness_lite' ),
	) );
}

function talkingbusiness_lite_get_text_aligns() {
	return apply_filters( 'talkingbusiness_lite_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'talkingbusiness_lite' ),
		'center'  => esc_html__( 'Center', 'talkingbusiness_lite' ),
		'justify' => esc_html__( 'Justify', 'talkingbusiness_lite' ),
		'left'    => esc_html__( 'Left', 'talkingbusiness_lite' ),
		'right'   => esc_html__( 'Right', 'talkingbusiness_lite' ),
	) );
}

function talkingbusiness_lite_get_font_weight() {
	return apply_filters( 'talkingbusiness_lite_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function talkingbusiness_lite_get_dynamic_css_options() {
	return apply_filters( 'talkingbusiness_lite_get_dynamic_css_options', array(
		'prefix'    => 'talkingbusiness_lite',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/header.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/social.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/post.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/content-builder.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/booked.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/site/mp-timetable.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			TALKINGBUSINESS_LITE_THEME_DIR . '/assets/css/dynamic/widgets/about_author.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'main_menu_font_family',
			'main_menu_font_style',
			'main_menu_font_weight',
			'main_menu_font_size',
			'main_menu_line_height',
			'main_menu_letter_spacing',
			'main_menu_character_set',

			'button_font_family',
			'button_font_weight',
			'button_character_set',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_button_text_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_text_color',
			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg_image',
			'footer_bg',
		),

	) );
}


/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function talkingbusiness_lite_get_fonts_options() {
	return apply_filters( 'talkingbusiness_lite_get_fonts_options', array(
		'prefix'  => 'talkingbusiness_lite',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'main_menu' => array(
				'family'  => 'main_menu_font_family',
				'style'   => 'main_menu_font_style',
				'weight'  => 'main_menu_font_weight',
				'charset' => 'main_menu_character_set',
			),
			'button' => array(
				'family'  => 'button_font_family',
				'weight'  => 'button_font_weight',
				'charset' => 'button_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		)
	) );
}
/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function talkingbusiness_lite_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% All rights reserved by TalkingBusiness_Lite', 'talkingbusiness_lite' );
}
