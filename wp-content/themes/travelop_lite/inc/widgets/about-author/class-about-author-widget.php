<?php
/**
 * Widget about author.
 *
 * @package Travelop_lite
 */
if ( ! class_exists( 'Travelop_lite_About_Author_Widget' ) ) {

	class Travelop_lite_About_Author_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor
		 */
		public function __construct() {

			$this->widget_cssclass    = 'travelop_lite widget-about-author';
			$this->widget_description = esc_html__( 'Display an information about selected user.', 'travelop_lite' );
			$this->widget_id          = 'travelop_lite_widget_about_author';
			$this->widget_name        = esc_html__( 'About Author', 'travelop_lite' );
			$this->settings           = array(
				'title'  => array(
					'type'  => 'text',
					'value' => esc_html__( 'About Author', 'travelop_lite' ),
					'label' => esc_html__( 'Title', 'travelop_lite' ),
				),
				'user_id' => array(
					'type'             => 'select',
					'size'             => 1,
					'value'            => '',
					'options_callback' => array( $this, 'get_users_list' ),
					'options'          => false,
					'label'            => esc_html__( 'Select user to show', 'travelop_lite' ),
				),
				'avatar_size' => array(
					'type'       => 'slider',
					'max_value'  => 512,
					'min_value'  => 0,
					'value'      => 250,
					'step_value' => 1,
					'label'      => esc_html__( 'Author avatar size (set 0 to hide avatar, applied only for Gravatar)', 'travelop_lite' ),
				),
				'avatar_img' => array(
					'type'               => 'media',
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Select image', 'travelop_lite' ),
					'label'              => esc_html__( 'Custom avatar image (override default user avatar)', 'travelop_lite' ),
				),
				'link' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Link (leave empty to hide)', 'travelop_lite' ),
				),
				'link_text' => array(
					'type'  => 'text',
					'value' => esc_html__( 'Read More', 'travelop_lite' ),
					'label' => esc_html__( 'Link label', 'travelop_lite' ),
				),
			);

			remove_filter('pre_user_description', 'wp_filter_kses');
			add_filter( 'pre_user_description', 'wp_filter_post_kses' );

			parent::__construct();
		}

		/**
		 * Get blog user list array
		 *
		 * @return array
		 */
		public function get_users_list() {

			$users = get_users();

			$result = array( '0' => __( 'Select a user', 'travelop_lite' ) );

			if ( empty( $users ) ) {
				return array();
			}

			foreach ( $users as $user ) {
				$result[ $user->data->ID ] = $user->data->user_nicename;
			}

			return $result;
		}

		/**
		 * Get author name
		 *
		 * @return string
		 */
		public function get_author_name() {
			$user = get_userdata( intval( $this->instance['user_id'] ) );

			if ( ! $user ) {
				return;
			}

			return sprintf( '<h5 class="about-author_name">%s</h5>', $user->display_name );
		}

		/**
		 * Get author name
		 *
		 * @return string
		 */
		public function get_author_avatar() {

			$format = '<div class="about-author_avatar">%s</div>';

			if ( ! empty( $this->instance['avatar_img'] ) ) {
				return sprintf( $format, wp_get_attachment_image( intval( $this->instance['avatar_img'] ), 'full' ) );
			}

			if ( empty( $this->instance['avatar_size'] ) || ( '0' === $this->instance['avatar_size'] ) ) {
				return;
			}

			$size    = intval( $this->instance['avatar_size'] );
			$user_id = intval( $this->instance['user_id'] );

			$user = get_userdata( $user_id );

			if ( ! $user ) {
				return;
			}

			$avatar = get_avatar( $user_id, $size, '', $user->display_name );

			return sprintf( $format, $avatar );
		}

		/**
		 * Get current author description
		 *
		 * @return string
		 */
		public function get_author_description() {
			$user = get_userdata( intval( $this->instance['user_id'] ) );

			if ( ! $user ) {
				return;
			}

			return sprintf(
				'<div class="about-author_description">%s</div>',
				wp_filter_post_kses( $user->description )
			);
		}

		/**
		 * Get author button
		 *
		 * @return string
		 */
		public function get_author_button() {

			if ( empty( $this->instance['link'] ) ) {
				return;
			}

			$btn_class = 'btn';

			if ( 'footer-area' === $this->args['id'] ) {
				$btn_class .= ' btn-secondary';
			}

			$link_text = $this->use_wpml_translate( 'link_text' );
			$link      = $this->use_wpml_translate( 'link' );

			return sprintf(
				'<div class="about-author_btn_box"><a href="%2$s" class="about-author_btn %3$s">%1$s</a></div>',
				wp_kses( $link_text, wp_kses_allowed_html( 'post' ) ),
				esc_url( $link ),
				$btn_class
			);

		}

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			if ( empty( $instance['user_id'] ) || '0' == $instance['user_id'] ) {
				return;
			}

			if ( $this->get_cached_widget( $args ) ) {
				return;
			}

			ob_start();

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			$template = locate_template( 'inc/widgets/about-author/view/about-author.php' );

			include $template;

			$this->widget_end( $args );
			$this->reset_widget_data();
			wp_reset_postdata();

			echo $this->cache_widget( $args, ob_get_clean() );
		}
	}
}

add_action( 'widgets_init', 'travelop_lite_register_about_author_widgets' );
function travelop_lite_register_about_author_widgets() {
	register_widget( 'Travelop_lite_About_Author_Widget' );
}
