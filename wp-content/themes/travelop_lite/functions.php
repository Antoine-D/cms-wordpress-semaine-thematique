<?php
if ( ! class_exists( 'Travelop_lite_Theme_Setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	class Travelop_lite_Theme_Setup {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * A reference to an instance of cherry framework core class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private $core = null;

		/**
		 * Holder for CSS layout scheme.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $layout = array();

		/**
		 * Holder for current customizer module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $customizer = null;

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Set the constants needed by the theme.
			add_action( 'after_setup_theme', array( $this, 'constants' ), 0 );

			// Load the core functions/classes required by the rest of the theme.
			add_action( 'after_setup_theme', array( $this, 'get_core' ), 1 );

			// Language functions and translations setup.
			add_action( 'after_setup_theme', array( $this, 'l10n' ), 2 );

			// Handle theme supported features.
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 3 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 4 );

			// Initialization of modules.
			add_action( 'after_setup_theme', array( $this, 'init' ), 10 );

			// Load admin files.
			add_action( 'wp_loaded', array( $this, 'admin' ), 1 );

			// Enqueue admin assets.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 10 );

		}

		/**
		 * Defines the constant paths for use within the core and theme.
		 *
		 * @since 1.0.0
		 */
		public function constants() {
			global $content_width;

			/**
			 * Fires before definitions the constants.
			 *
			 * @since 1.0.0
			 */
			do_action( 'travelop_lite_constants_before' );

			$template  = get_template();
			$theme_obj = wp_get_theme( $template );

			/** Sets the theme version number. */
			define( 'TRAVELOP_LITE_THEME_VERSION', $theme_obj->get( 'Version' ) );

			/** Sets the theme directory path. */
			define( 'TRAVELOP_LITE_THEME_DIR', get_template_directory() );

			/** Sets the theme directory URI. */
			define( 'TRAVELOP_LITE_THEME_URI', get_template_directory_uri() );

			/** Sets the path to the core framework directory. */
			define( 'CHERRY_DIR', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'cherry-framework' );

			/** Sets the path to the core framework directory URI. */
			define( 'CHERRY_URI', trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'cherry-framework' );

			/** Sets the theme includes paths. */
			define( 'TRAVELOP_LITE_THEME_CLASSES', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/classes' );
			define( 'TRAVELOP_LITE_THEME_WIDGETS', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/widgets' );
			define( 'TRAVELOP_LITE_THEME_EXT', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/extensions' );

			/** Sets the theme assets URIs. */
			define( 'TRAVELOP_LITE_THEME_CSS', trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/css' );
			define( 'TRAVELOP_LITE_THEME_JS', trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/js' );

			// Sets the content width in pixels, based on the theme's design and stylesheet.
			if ( ! isset( $content_width ) ) {
				$content_width = 710;
			}
		}

		/**
		 * Loads the core functions. These files are needed before loading anything else in the
		 * theme because they have required functions for use.
		 *
		 * @since  1.0.0
		 */
		public function get_core() {
			/**
			 * Fires before loads the core theme functions.
			 *
			 * @since 1.0.0
			 */
			do_action( 'travelop_lite_core_before' );

			if ( null !== $this->core ) {
				return $this->core;
			}

			if ( ! class_exists( 'Cherry_Core' ) ) {
				require_once( trailingslashit( CHERRY_DIR ) . 'cherry-core.php' );
			}

			$this->core = new Cherry_Core( array(
				'base_dir' => CHERRY_DIR,
				'base_url' => CHERRY_URI,
				'modules'  => array(
					'cherry-js-core' => array(
						'priority' => 999,
						'autoload' => true,
					),
					'cherry-ui-elements' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-widget-factory' => array(
						'priority' => 999,
						'autoload' => true,
					),
					'cherry-post-formats-api' => array(
						'priority' => 999,
						'autoload' => true,
						'args'     => array(
							'rewrite_default_gallery' => true,
							'gallery_args'            => array(
								'size'           => '__tm-post-thumbnail-large',
								'base_class'     => 'post-gallery',
								'container'      => '<div class="%2$s swiper-container" id="%4$s" %3$s><div class="swiper-wrapper">%1$s</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div></div>',
								'slide'          => '<figure class="%2$s swiper-slide">%1$s</figure>',
								'img_class'      => 'swiper-image',
								'slider_handle'  => 'jquery-swiper',
								'slider'         => 'sliderPro',
								'slider_init'    => array(
									'buttons' => false,
									'arrows'  => true,
								),
								'popup'          => 'magnificPopup',
								'popup_handle'   => 'magnific-popup',
								'popup_init'     => array(
									'type' => 'image',
								),
							),
							'image_args' => array(
								'size'         => '__tm-post-thumbnail-large',
								'popup'        => 'magnificPopup',
								'popup_handle' => 'magnific-popup',
								'popup_init'   => array(
									'type' => 'image',
								),
							),
						),
					),
					'cherry-customizer' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-dynamic-css' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-google-fonts-loader' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-term-meta' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-post-meta' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-breadcrumbs' => array(
						'priority' => 999,
						'autoload' => false,
					),
					'cherry-utility' => array(
						'priority'	=> 999,
						'autoload'	=> true,
						'args'		=> array(
							'meta_key'	=> array(
								'term_thumb' => '_tm_thumb'
							),
						)
					),
				),
			) );

			return $this->core;
		}

		/**
		 * Loads the theme translation file.
		 *
		 * @since 1.0.0
		 */
		public function l10n() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'travelop_lite', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'languages' );
		}

		/**
		 * Adds theme supported features.
		 *
		 * @since 1.0.0
		 */
		public function theme_support() {

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable HTML5 markup structure.
			add_theme_support( 'html5', array(
				'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
			) );

			// Enable default title tag.
			add_theme_support( 'title-tag' );

			// Enable post formats.
			add_theme_support( 'post-formats', array(
				'aside', 'gallery', 'image', 'link', 'quote', 'video', 'audio', 'status',
			) );

			// Enable custom background.
			add_theme_support( 'custom-background', array( 'default-color' => 'f3f3f3', ) );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );
		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			/**
			 * Configurations.
			 */
			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'config/layout.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'config/menus.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'config/sidebars.php';
			require_if_theme_supports( 'post-thumbnails', trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'config/thumbnails.php' );

			/**
			 * Functions.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/template-tags.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/template-menu.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/template-post.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/template-meta.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/template-comment.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/context.php';
				require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/extras.php';
			}

			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/customizer.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/hooks.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_DIR ) . 'inc/register-plugins.php';

			/**
			 * Widgets.
			 */
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'about-author/class-about-author-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'image-grid/class-image-grid-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'taxonomy-tiles/class-taxonomy-tiles-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'carousel/class-carousel-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'smart-slider/class-smart-slider-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'subscribe-follow/class-subscribe-follow-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'custom-posts/class-custom-posts-widget.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_WIDGETS ) . 'banner/class-banner-widget.php';

			/**
			 * Classes.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( TRAVELOP_LITE_THEME_CLASSES ) . 'class-wrapping.php';
			}
			require_once trailingslashit( TRAVELOP_LITE_THEME_CLASSES ) . 'class-widget-area.php';
			require_once trailingslashit( TRAVELOP_LITE_THEME_CLASSES ) . 'class-tgm-plugin-activation.php';

			/**
			 * Extensions.
			 */
			require_once trailingslashit( TRAVELOP_LITE_THEME_EXT ) . 'woocommerce.php';
		}

		/**
		 * Run initialization of modules.
		 *
		 * @since 1.0.0
		 */
		public function init() {
			$this->customizer = $this->get_core()->init_module( 'cherry-customizer', travelop_lite_get_customizer_options() );
			$this->get_core()->init_module( 'cherry-dynamic-css', travelop_lite_get_dynamic_css_options() );
			$this->get_core()->init_module( 'cherry-google-fonts-loader', travelop_lite_get_fonts_options() );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'category',
				'priority' => 10,
				'fields'   => array(
					'_tm_thumb' => array(
						'type'               => 'media',
						'value'              => '',
						'multi_upload'       => false,
						'library_type'       => 'image',
						'upload_button_text' => esc_html__( 'Set thumbnail', 'travelop_lite' ),
						'label'              => esc_html__( 'Category thumbnail', 'travelop_lite' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'post_tag',
				'priority' => 10,
				'fields'   => array(
					'_tm_thumb' => array(
						'type'               => 'media',
						'value'              => '',
						'multi_upload'       => false,
						'library_type'       => 'image',
						'upload_button_text' => esc_html__( 'Set thumbnail', 'travelop_lite' ),
						'label'              => esc_html__( 'Tag thumbnail', 'travelop_lite' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-post-meta', array(
				'id'            => 'post-layout',
				'title'         => esc_html__( 'Layout Options', 'travelop_lite' ),
				'page'          => array( 'post', 'page' ),
				'context'       => 'normal',
				'priority'      => 'high',
				'callback_args' => false,
				'fields'        => array(
					'_tm_sidebar_position' => array(
						'type'        => 'radio',
						'title'       => esc_html__( 'Layout', 'travelop_lite' ),
						'value'         => 'inherit',
						'display_input' => false,
						'options'       => array(
							'inherit' => array(
								'label'   => esc_html__( 'Inherit', 'travelop_lite' ),
								'img_src' => trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/images/admin/inherit.svg',
							),
							'one-left-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on left side', 'travelop_lite' ),
								'img_src' => trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/images/admin/page-layout-left-sidebar.svg',
							),
							'one-right-sidebar' => array(
								'label'   => esc_html__( 'Sidebar on right side', 'travelop_lite' ),
								'img_src' => trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/images/admin/page-layout-right-sidebar.svg',
							),
							'two-sidebars' => array(
								'label'   => esc_html__( '2 sidebars', 'travelop_lite' ),
								'img_src' => trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/images/admin/page-layout-both-sidebar.svg',
							),
							'fullwidth' => array(
								'label'   => esc_html__( 'No sidebar', 'travelop_lite' ),
								'img_src' => trailingslashit( TRAVELOP_LITE_THEME_URI ) . 'assets/images/admin/page-layout-fullwidth.svg',
							),
						)
					),
				),
			) );
		}

		/**
		 * Load admin files for the theme.
		 *
		 * @since 1.0.0
		 */
		public function admin() {

			// Check if in the WordPress admin.
			if ( ! is_admin() ) {
				return;
			}
			add_action( 'admin_notices',  array( $this, 'travelop_lite_premium_notice' ), 1 );
            add_action( 'admin_head', array( $this, 'travelop_lite_premium_notice_styles' ) );
            add_action( 'admin_menu', array( $this, 'travelop_lite_update_to_pro_appearance_menu_item' ) );
		}

		public function travelop_lite_premium_notice() {
            $id = 'travelop_lite_premium_notice';
            $class = 'notice';
            $message = __( 'Check out <a href="https://www.templatemonster.com/wordpress-themes/travelop-traveling-blog-wordpress-theme-58534.html" target="_blank">Travelop premium</a>! Get more features, widgets and 24/7 support.', '__travelop_lite' );

            printf( '<div id="%1$s" class="%2$s"><p>%3$s</p></div>', $id, $class, $message );
        }

        public function travelop_lite_premium_notice_styles() {
            ?>
            <style type="text/css">
                #travelop_lite_premium_notice {
                    color: #377900;
                    border: 1px solid #74a739;
                    border-radius: 3px;
                    background-color: #f0f8e2;
                    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                }
                #travelop_lite_premium_notice.notice p {
                    margin: 1em 0;
                }
                #travelop_lite-update-to-pro-wrapper {
                    max-width: 962px;
                }
                #travelop_lite-update-to-pro-wrapper p {
                    margin: 2em 0;
                }
                .travelop_lite-btns-wrapper {
                    max-width: 962px;
                    text-align: center;
                }
                .travelop_lite-btn {
                    margin: 0 10px;
                    padding: 0 45px;
                    display: inline-block;
                    height: 60px;
                    font-size: 14px;
                    line-height: 60px;
                    color: #fff;
                    border-radius: 3px;
                    text-decoration: none;
                    text-align: center;
                    outline: none;
                    background: #000;
                }
                .travelop_lite-btn:hover, .travelop_lite-btn:focus {
                    color: #fff;
                }
                .travelop_lite-btn:before {
                    vertical-align: top;
                    margin-right: 8px;
                    font-family: 'dashicons';
                    font-size: 20px;
                }
                .travelop_lite-btn.travelop_lite-btn-view {
                    background: #309df4;
                    background: linear-gradient(to bottom,#42a5f5 0,#2196f3 100%);
                }
                .travelop_lite-btn.travelop_lite-btn-view:before {
                    content: "\f504";
                }
                .travelop_lite-btn.travelop_lite-btn-view:hover {
                    background: #1b7bd8;
                    background: linear-gradient(to bottom,#2196f3 0,#1976d2 100%);
                }
                .travelop_lite-btn.travelop_lite-btn-to-pro {
                    background: #74a739;
                    background: linear-gradient(to bottom,#83bd40 0,#6a9e2e 100%);
                }
                .travelop_lite-btn.travelop_lite-btn-to-pro:before {
                    content: "\f174";
                }
                .travelop_lite-btn.travelop_lite-btn-to-pro:hover {
                    background: #65972b;
                    background: linear-gradient(to bottom,#72a536 0,#588821 100%);
                }
            </style>
            <?php
        }

        public function travelop_lite_update_to_pro_appearance_menu_item() {
            add_theme_page( 'Update to Pro', 'Update to Pro', 'edit_theme_options', 'travelop_lite-update-to-pro', array( $this, 'travelop_lite_update_to_pro_callback' ) );
        }


        public function travelop_lite_update_to_pro_callback() {
            ?>
            <div class="wrap">
                <h2>Update to Pro</h2>
                <div id="travelop_lite-update-to-pro-wrapper">
                    <img src="<?php echo TRAVELOP_LITE_THEME_URI ?>/assets/images/admin/travelop-premium.jpg">
                    <p><strong>Travelop Pro</strong> - great theme for personal blog. Give your blog more power with premium tools like extended set of widgets, multiple headers, footers and Live Customizer options. The theme is available under GPL3 license and comes with 24/7 support.</p>
                    <div class="travelop_lite-btns-wrapper">
                        <a href="https://www.templatemonster.com/wordpress-themes/travelop-traveling-blog-wordpress-theme-58534.html" class="travelop_lite-btn travelop_lite-btn-view" target="_blank">Travelop Free Demo</a>
                        <a href="#" class="travelop_lite-btn travelop_lite-btn-to-pro" target="_blank">Travelop Free</a>
                    </div>
                </div><!-- mnt-options -->
            </div><!-- wrap -->
            <?php
        }

		/**
		 * Enqueue admin-specific assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_admin_assets() {
			wp_enqueue_script( 'travelop_lite-admin-script', TRAVELOP_LITE_THEME_JS . '/admin.min.js', array( 'cherry-js-core' ), TRAVELOP_LITE_THEME_VERSION, true );
		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {
			wp_register_script( 'jquery-slider-pro', TRAVELOP_LITE_THEME_JS . '/jquery.sliderPro.min.js', array( 'jquery' ), '1.2.4', true );
			wp_register_script( 'jquery-swiper', TRAVELOP_LITE_THEME_JS . '/swiper.jquery.min.js', array( 'jquery' ), '3.3.0', true );
			wp_register_script( 'magnific-popup', TRAVELOP_LITE_THEME_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.1', true );
			wp_register_script( 'jquery-stickup', TRAVELOP_LITE_THEME_JS . '/jquery.stickup.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'jquery-totop', TRAVELOP_LITE_THEME_JS . '/jquery.ui.totop.min.js', array( 'jquery' ), '1.2.0', true );
			wp_register_script( 'jquery-isotope', TRAVELOP_LITE_THEME_JS . '/jquery.isotope.min.js', array( 'jquery' ), '4.0.0', true );

			wp_register_style( 'jquery-slider-pro', TRAVELOP_LITE_THEME_CSS . '/slider-pro.min.css', array(), '1.2.4' );
			wp_register_style( 'jquery-swiper', TRAVELOP_LITE_THEME_CSS . '/swiper.min.css', array(), '3.3.0' );
			wp_register_style( 'magnific-popup', TRAVELOP_LITE_THEME_CSS . '/magnific-popup.min.css', array(), '1.0.1' );
			wp_register_style( 'font-awesome', TRAVELOP_LITE_THEME_CSS . '/font-awesome.min.css', array(), '4.5.0' );
			wp_register_style( 'material-icons', TRAVELOP_LITE_THEME_CSS . '/material-icons.min.css', array(), '2.1.0' );
		}

		/**
		 * Enqueue assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {
			wp_enqueue_style( 'travelop_lite-theme-style', get_stylesheet_uri(), array( 'font-awesome', 'material-icons', 'magnific-popup' ), TRAVELOP_LITE_THEME_VERSION );

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$depends = apply_filters( 'travelop_lite_theme_script_depends', array( 'cherry-js-core', 'hoverIntent' ) );

			wp_enqueue_script( 'travelop_lite-theme-script', TRAVELOP_LITE_THEME_JS . '/theme-script.js', $depends, TRAVELOP_LITE_THEME_VERSION, true );

			/**
			 * Filter the strings that send to scripts.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$labels = apply_filters( 'travelop_lite_theme_localize_labels', array(
				'totop_button' => esc_html__( 'Top', 'travelop_lite' ),
			) );

			wp_localize_script( 'travelop_lite-theme-script', 'travelop_lite', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'labels'  => $labels,
			) );

			// Threaded Comments.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
}

/**
 * Returns instanse of main theme configuration class.
 *
 * @since  1.0.0
 * @return object
 */
function travelop_lite_theme() {
	return Travelop_lite_Theme_Setup::get_instance();
}

travelop_lite_theme();
