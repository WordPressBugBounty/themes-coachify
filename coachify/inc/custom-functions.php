<?php
/**
 * Coachify Custom functions and definitions
 *
 * @package Coachify
 */

if ( ! function_exists( 'coachify_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coachify_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Coachify, use a find and replace
		 * to change 'coachify' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coachify', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'coachify' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'coachify_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			apply_filters(
				'coachify_custom_logo_args',
				array(
					'height'      => 70,
					'width'       => 70,
					'flex-height' => true,
					'flex-width'  => true,
					'header-text' => array( 'site-title', 'site-description' ),
				)
			)
		);

		/**
		 * Add support for custom header.
		*/
		add_theme_support(
			'custom-header',
			apply_filters(
				'coachify_custom_header_args',
				array(
					'default-image'    => '',
					'video'            => true,
					'width'            => 1920,
					'height'           => 760,
					'header-text'      => false,
					'wp-head-callback' => 'coachify_header_style',
				)
			)
		);

		/**
		 * Add Custom Images sizes.
		*/
		add_image_size( 'coachify-withsidebar', 760, 500, true );
		add_image_size( 'coachify-blog-home', 360, 240, true );
		add_image_size( 'coachify-header-bg-img', 1920, 350, true );
		add_image_size( 'coachify-fullwidth', 1140, 540, true );
		add_image_size( 'coachify-related', 360, 235, true );

		/** Starter Content */
		$starter_content = array(
			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus' => array(
				// Assign a menu to the "top" location.
				'primary' => array(
					'name'  => __( 'Primary', 'coachify' ),
					'items' => array(
						'page_home',
						'page_blog',
					),
				),
			),
		);

		$starter_content = apply_filters( 'coachify_starter_content', $starter_content );

		add_theme_support( 'starter-content', $starter_content );

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		$colorDefaults = coachify_get_color_defaults();
		add_theme_support(
			'editor-color-palette',
			apply_filters(
				'coachify-editor-color-palette',
				array(
					array(
						'name'  => esc_attr__( 'Primary Color', 'coachify' ),
						'slug'  => 'primary-color',
						'color' => 'var(--g-primary-color, ' . $colorDefaults['primary_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Secondary Color', 'coachify' ),
						'slug'  => 'secondary-color',
						'color' => 'var(--g-secondary-color, ' . $colorDefaults['secondary_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Body Font Color', 'coachify' ),
						'slug'  => 'body-font-color',
						'color' => 'var(--g-font-color, ' . $colorDefaults['body_font_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Heading Color', 'coachify' ),
						'slug'  => 'heading-color',
						'color' => 'var(--g-heading-color, ' . $colorDefaults['heading_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Primary Accent Color', 'coachify' ),
						'slug'  => 'primary-accent-color',
						'color' => 'var(--g-primary-accent-color, ' . $colorDefaults['primary_accent_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Secondary Accent Color', 'coachify' ),
						'slug'  => 'secondary-accent-color',
						'color' => 'var(--g-secondary-accent-color, ' . $colorDefaults['secondary_accent_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Tertiary Accent Color', 'coachify' ),
						'slug'  => 'tertiary-accent-color',
						'color' => 'var(--g-tertiary-accent-color, ' . $colorDefaults['tertiary_accent_color'] . ')',
					),

					array(
						'name'  => esc_attr__( 'Site Background Color', 'coachify' ),
						'slug'  => 'site-bg-color',
						'color' => 'var(--g-background-color, ' . $colorDefaults['site_bg_color'] . ')',
					),
				)
			)
		);

		// Add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for block editor styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for padding control
		add_theme_support( 'custom-spacing' );
		
		// Add support for border
		add_theme_support( 'border' );

		// Add support for link color
		add_theme_support( 'link-color' );

		// Add support for custom line height
		add_theme_support( 'custom-line-height' );
	}
endif;
add_action( 'after_setup_theme', 'coachify_setup' );

if ( ! function_exists( 'coachify_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function coachify_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'coachify_content_width', 790 );
	}
endif;
add_action( 'after_setup_theme', 'coachify_content_width', 0 );

if ( ! function_exists( 'coachify_template_redirect_content_width' ) ) :
	/**
	 * Adjust content_width value according to template.
	 *
	 * @return void
	 */
	function coachify_template_redirect_content_width() {
		$sidebar = coachify_sidebar();
		if ( $sidebar ) {
			$GLOBALS['content_width'] = 790;
		} else {
			if ( is_singular() ) {
				if ( coachify_sidebar( true ) === 'full-width centered' ) {
					$GLOBALS['content_width'] = 790;
				} else {
					$GLOBALS['content_width'] = 1170;
				}
			} else {
				$GLOBALS['content_width'] = 1170;
			}
		}
	}
endif;
add_action( 'template_redirect', 'coachify_template_redirect_content_width' );

if ( ! function_exists( 'coachify_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
 	 * @return void
	 * 
	 */
	function coachify_scripts() {
		// Use minified libraries if SCRIPT_DEBUG is false
		$build         = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix        = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		$defaults      = coachify_get_general_defaults();
		
		$ed_localgoogle_fonts   = get_theme_mod( 'ed_localgoogle_fonts', $defaults['ed_localgoogle_fonts'] );
		$ed_preload_local_fonts = get_theme_mod( 'ed_preload_local_fonts', $defaults['ed_preload_local_fonts'] );

		if ( coachify_is_woocommerce_activated() ) {
			wp_enqueue_style( 'coachify-woocommerce', get_template_directory_uri() . '/assets/css' . $build . '/woocommerce' . $suffix . '.css', array(), COACHIFY_THEME_VERSION );
		}

		wp_enqueue_style( 'coachify-google-fonts', coachify_google_fonts_url(), array(), null );

		if ( coachify_is_elementor_activated_post() ) {
			wp_enqueue_style( 'coachify-elementor', get_template_directory_uri() . '/assets/css' . $build . '/elementor' . $suffix . '.css', array(), COACHIFY_THEME_VERSION );
		}

		if ( coachify_is_wol_activated() ) {
			wp_enqueue_style( 'coachify-wol', get_template_directory_uri() . '/assets/css' . $build . '/wol' . $suffix . '.css', array(), COACHIFY_THEME_VERSION );
		}

		wp_enqueue_style( 'coachify-style', get_template_directory_uri() . '/style' . $suffix . '.css', array(), filemtime(get_template_directory() . '/style.css' ) );

		wp_enqueue_script( 'coachify-custom', get_template_directory_uri() . '/assets/js' . $build . '/custom' . $suffix . '.js', array(), COACHIFY_THEME_VERSION, true );
		wp_enqueue_script( 'coachify-accessibility', get_template_directory_uri() . '/assets/js' . $build . '/modal-accessibility' . $suffix . '.js', array(), COACHIFY_THEME_VERSION, true );

		if ( coachify_is_lms_plugin_activated() ) {
			wp_enqueue_style( 'coachify-lms', get_template_directory_uri() . '/assets/css' . $build . '/lms' . $suffix . '.css', array(), COACHIFY_THEME_VERSION );
		}

		wp_style_add_data( 'coachify-style', 'rtl', 'replace' );

		if ( $suffix ) {
			wp_style_add_data( 'coachify-style', 'suffix', $suffix );
		}

		$array = array(
			'rtl'      => is_rtl(),
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'coachify-custom', 'coachify_data', $array );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( $ed_localgoogle_fonts &&
		! is_customize_preview() &&
		! is_admin() &&
		$ed_preload_local_fonts ) {
			coachify_preload_local_fonts( coachify_google_fonts_url() );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'coachify_scripts' );

if ( ! function_exists( 'coachify_register_dependencies' ) ) :
	/**
	 * Register Dependecies for meta slotfill
	 * @return void
	 */
	function coachify_register_dependencies() {

		register_post_meta(
			'post',
			'_coachify_sidebar_layout',
			array(
				'show_in_rest'  => true,
				'single'        => true,
				'type'          => 'string',
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			'page',
			'_coachify_sidebar_layout',
			array(
				'show_in_rest'  => true,
				'single'        => true,
				'type'          => 'string',
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

	}
endif;
add_action( 'init', 'coachify_register_dependencies' );

if ( ! function_exists( 'coachify_admin_scripts' ) ) :
	/**
	 * Enqueue admin scripts and styles.
 	 * @return boolean
	 * 
	 */
	function coachify_admin_scripts( $hook ) {
		$current_screen = get_current_screen();
		wp_enqueue_style( 'coachify-admin', get_template_directory_uri() . '/inc/css/admin.css' );
		
		if(method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor()) {
			if ( $hook == 'post-new.php' || $hook == 'post.php' || $hook == 'user-new.php' || $hook == 'user-edit.php' || $hook == 'profile.php' ) {
				
				wp_enqueue_style(
					'coachify-slotfill-meta',
					get_template_directory_uri() . '/dist/meta.css',
					[],
					COACHIFY_THEME_VERSION
				);
		
				$dependencies_file_path = get_template_directory() . '/dist/meta/meta.asset.php';
				
				if ( file_exists( $dependencies_file_path ) ) {
					$meta_assets = require $dependencies_file_path;
					$meta_js_dep = ( ! empty( $meta_assets['dependencies'] ) ) ? $meta_assets['dependencies'] : [];
					$meta_ver    = ( ! empty( $meta_assets['version'] ) ) ? $meta_assets['version'] : COACHIFY_THEME_VERSION;

					wp_enqueue_script(
						'coachify-meta',
						get_template_directory_uri() . '/dist/meta/meta.js',
						$meta_js_dep,
						$meta_ver,
						true
					);
				}
			}
		}
	}
endif;
add_action( 'admin_enqueue_scripts', 'coachify_admin_scripts' );

if ( ! function_exists( 'coachify_block_editor_styles' ) ) :
	/**
	 * Enqueue editor styles for Gutenberg
	 *
	 * @return void
	 */
	function coachify_block_editor_styles() {
		// Use minified libraries if SCRIPT_DEBUG is false
		$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		// Block styles.
		wp_register_style('coachify-block-editor-style', get_template_directory_uri() . '/assets/css' . $build . '/editor-block' . $suffix . '.css', array(), COACHIFY_THEME_VERSION);
		wp_enqueue_style( 'coachify-block-editor-style' );
		$css = coachify_gutenberg_inline_style();
		wp_add_inline_style( 'coachify-block-editor-style', coachify_minify_css( $css ) );

		// Add custom fonts.
		wp_enqueue_style( 'coachify-google-fonts', coachify_google_fonts_url(), array(), null );

	}
endif;
add_action( 'enqueue_block_editor_assets', 'coachify_block_editor_styles' );

if ( ! function_exists( 'coachify_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function coachify_body_classes( $classes ) {
		$defaults              = coachify_get_general_defaults();
		$ed_last_widget_sticky = get_theme_mod( 'ed_last_widget_sticky', $defaults['ed_last_widget_sticky'] );
		$ed_breadcrumb 		   = get_theme_mod( 'ed_breadcrumb', $defaults['ed_breadcrumb'] );

		if ( coachify_pro_is_activated() ) {
			$prodefaults    = coachify_pro_get_customizer_defaults();
			$blog_layout    = get_theme_mod( 'blog_layouts', $prodefaults['blog_layouts'] );
			$archive_layout = get_theme_mod( 'archive_layouts', $prodefaults['archive_layouts'] );
			$single_layout  = coachify_pro_single_meta_layout();
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if( is_page_template( 'event.php' ) ){
			$classes[] = 'chfy-event';
		}

		// Adds a class of custom-background-image to sites with a custom background image.
		if ( get_background_image() ) {
			$classes[] = 'custom-background-image';
		}

		// Adds a class of custom-background-color to sites with a custom background color.
		if ( get_background_color() != 'ffffff' ) {
			$classes[] = 'custom-background-color';
		}

		if ( $ed_last_widget_sticky ) {
			$classes[] = 'widget-sticky';
		}

		if ( coachify_pro_is_activated() && is_single() ) {
			$classes[] = 'post-layout-' . $single_layout;
			if(is_singular('event')) $classes[] = 'chfy-event';
		} elseif ( is_single() ) {
			$classes[] = 'post-layout-one';
		}

		if ( coachify_pro_is_activated() && is_home() ) {
			$classes[] = 'blog-layout-' . $blog_layout;
		} elseif ( coachify_pro_is_activated() && ( is_archive() || is_search() ) ) {
			$classes[] = 'blog-layout-' . $archive_layout;
		} elseif ( is_home() || is_archive() || is_search() ) {
			$classes[] = 'blog-layout-one';
		}

		if ( ! is_404() ) {
			$classes[] = coachify_sidebar( true );
		}

		if( !$ed_breadcrumb ){
			$classes[] = 'no-breadcrumb';
		}
		return $classes;
	}
endif;
add_filter( 'body_class', 'coachify_body_classes' );

if ( ! function_exists( 'coachify_post_classes' ) ) :
	/**
	 * Add custom classes to the array of post classes.
	 * 
	 * @param array $classes Classes for the post element.
	 * @return array
	 */
	function coachify_post_classes( $classes ) {

		if ( is_search() ) {
			$classes[] = 'search-post';
		}

		if ( ! is_singular() ) {
			$classes[] = 'image-hover-transition-effect';
		}

		return $classes;
	}
endif;
add_filter( 'post_class', 'coachify_post_classes' );

if ( ! function_exists( 'coachify_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 * @return void
	 */
	function coachify_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'wp_head', 'coachify_pingback_header' );

if ( ! function_exists( 'coachify_change_comment_form_default_fields' ) ) :
	/**
	 * Change Comment form default fields i.e. author, email & url.
	 * @return mixed
	 */
	function coachify_change_comment_form_default_fields( $fields ) {
		// get the current commenter if available
		$commenter = wp_get_current_commenter();

		// core functionality
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		// Change just the author field
		$fields['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'coachify' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'coachify' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';

		$fields['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'coachify' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'coachify' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';

		$fields['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'coachify' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'coachify' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'coachify_change_comment_form_default_fields' );

if ( ! function_exists( 'coachify_change_comment_form_defaults' ) ) :
	/**
	 * Change Comment Form defaults
	 * @return mixed
	 */
	function coachify_change_comment_form_defaults( $defaults ) {
		$defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'coachify' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'coachify' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';

		return $defaults;
	}
endif;
add_filter( 'comment_form_defaults', 'coachify_change_comment_form_defaults' );

if ( ! function_exists( 'coachify_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... *
	 * @return string
	 */
	function coachify_excerpt_more( $more ) {
		return is_admin() ? $more : ' &hellip; ';
	}

endif;
add_filter( 'excerpt_more', 'coachify_excerpt_more' );

if ( ! function_exists( 'coachify_excerpt_length' ) ) :
	/**
	 * Changes the default 55 character in excerpt
	 * @param int $length Length of the excerpt
	 * @return int
	 */
	function coachify_excerpt_length( $length ) {
		$defaults       = coachify_get_general_defaults();
		$excerpt_length = get_theme_mod( 'excerpt_length', $defaults['excerpt_length'] );
		return is_admin() ? $length : absint( $excerpt_length );
	}
endif;
add_filter( 'excerpt_length', 'coachify_excerpt_length', 999 );

if ( ! function_exists( 'coachify_get_the_archive_title' ) ) :
	/**
	 * Filter Archive Title
	 * @param string $title Title of the respective archive page
	 */
	function coachify_get_the_archive_title( $title ) {
		$defaults  = coachify_get_general_defaults();
		$ed_prefix = get_theme_mod( 'ed_prefix_archive', $defaults['ed_prefix_archive'] );
		$ed_title  = get_theme_mod( 'ed_archive_title', $defaults['ed_archive_title'] );

		if ( is_post_type_archive( 'product' ) ) {
			$title = '<h1 class="page-title">' . get_the_title( get_option( 'woocommerce_shop_page_id' ) ) . '</h1>';
		} elseif ( is_post_type_archive( 'sfwd-courses' ) ) {
			$title = '<h1 class="page-title">' . __('Courses', 'coachify') . '</h1>';
		} elseif ( is_category() ) {
			$page_title = $ed_title ? '<h1 class="page-title">' . esc_html( single_cat_title( '', false ) ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . esc_html__( 'Browsing Category', 'coachify' ) . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		} elseif ( is_tag() ) {
			$page_title = $ed_title ? '<h1 class="page-title">' . esc_html( single_tag_title( '', false ) ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . esc_html__( 'Browsing Tag', 'coachify' ) . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		} elseif ( is_year() ) {
			$page_title = $ed_title ? '<h1 class="page-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'coachify' ) ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . esc_html__( 'Browsing Year', 'coachify' ) . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		} elseif ( is_month() ) {
			$page_title = $ed_title ? '<h1 class="page-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'coachify' ) ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . esc_html__( 'Browsing Month', 'coachify' ) . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		} elseif ( is_day() ) {
			$page_title = $ed_title ? '<h1 class="page-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'coachify' ) ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . esc_html__( 'Browsing Day', 'coachify' ) . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		} elseif ( is_tax() ) {
			$tax        = get_taxonomy( get_queried_object()->taxonomy );
			$page_title = $ed_title ? '<h1 class="page-title">' . single_term_title( '', false ) . '</h1>' : '';

			if ( ! $ed_prefix ) {
				$title = '<div class="archive-title-wrapper"><span class="sub-title">' . $tax->labels->singular_name . '</span>' . $page_title . '</div>';
			} else {
				$title = $page_title;
			}
		}
		return $title;
	}
endif;
add_filter( 'get_the_archive_title', 'coachify_get_the_archive_title' );

if ( ! function_exists( 'coachify_get_comment_author_link' ) ) :
	/**
	 * Filter to modify comment author link
	 * 
	 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
	 */
	function coachify_get_comment_author_link( $return, $author, $comment_ID ) {
		$comment = get_comment( $comment_ID );
		$url     = get_comment_author_url( $comment );
		$author  = get_comment_author( $comment );

		if ( empty( $url ) || 'http://' == $url ) {
			$return = '<span itemprop="name">' . esc_html( $author ) . '</span>';
		} else {
			$return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';
		}

		return $return;
	}
endif;
add_filter( 'get_comment_author_link', 'coachify_get_comment_author_link', 10, 3 );

if ( ! function_exists( 'coachify_admin_notice' ) ) :
	/**
	 * Addmin notice for getting started page
	 * @return mixed
	 */
	function coachify_admin_notice() {
		global $pagenow;
		$theme_args     = wp_get_theme();
		$theme_meta     = get_option( 'coachify_admin_notice' );
		$current_theme  = $theme_args->get( 'Name' );
		$current_screen = get_current_screen();
		$dismissnonce    = wp_create_nonce( 'coachify_admin_notice' );

		if ( 'themes.php' == $pagenow && ! $theme_meta ) {

			if ( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
				return;
			}

			if ( is_network_admin() ) {
				return;
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			} ?>

		<div class="welcome-message notice notice-info">
			<div class="notice-wrapper">
				<div class="notice-text">
					<h3><?php esc_html_e( 'Congratulations!', 'coachify' ); ?></h3>
					<p><?php 
					/* translators: %1$s: Theme Name*/ 
					printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'coachify' ), esc_html( $current_theme ) ); ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=coachify-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'coachify' ); ?></a></p>
					<p class="dismiss-link"><strong><a href="?coachify_admin_notice=1&_wpnonce=<?php echo esc_attr( $dismissnonce ); ?>"><?php esc_html_e( 'Dismiss', 'coachify' ); ?></a></strong></p>
				</div>
			</div>
		</div>
			<?php
		}
	}
endif;
add_action( 'admin_notices', 'coachify_admin_notice' );

if ( ! function_exists( 'coachify_update_admin_notice' ) ) :
	/**
	 * Updating admin notice on dismiss
	 */
	function coachify_update_admin_notice() {

		if (!current_user_can('manage_options')) {
			return;
		}
	
		 // Bail if the nonce doesn't check out
		 if ( ( isset( $_GET['coachify_admin_notice'] ) && $_GET['coachify_admin_notice'] = '1' ) && wp_verify_nonce( $_GET['_wpnonce'], 'coachify_admin_notice' ) ) {
			update_option( 'coachify_admin_notice', true );
		}
	}
endif;
add_action( 'admin_init', 'coachify_update_admin_notice' );

if ( ! function_exists( 'coachify_dynamic_mce_css' ) ) :
	/**
	 * Add Editor Style
	 * Add Link Color Option in Editor Style (MCE CSS)
	 * 
	 * @return void
	 */
	function coachify_dynamic_mce_css( $mce_css ) {
		$mce_css .= ', ' . add_query_arg(
			array(
				'action' => 'coachify_dynamic_mce_css',
				'_nonce' => wp_create_nonce(
					'coachify_dynamic_mce_nonce',
					__FILE__
				),
			),
			admin_url( 'admin-ajax.php' )
		);
		return $mce_css;
	}
endif;
add_filter( 'mce_css', 'coachify_dynamic_mce_css' );

if ( ! function_exists( 'coachify_dynamic_mce_css_ajax_callback' ) ) :
	/**
	 * Ajax Callback
	 * 
	 * @return void
	 */
	function coachify_dynamic_mce_css_ajax_callback() {

		/* Check nonce for security */
		$nonce = isset( $_REQUEST['_nonce'] ) ? $_REQUEST['_nonce'] : '';
		if ( ! wp_verify_nonce( $nonce, 'coachify_dynamic_mce_nonce' ) ) {
			die(); // don't print anything
		}

		$typo_defaults = coachify_get_typography_defaults();

		/* Get Link Color */
		$primary_font  = wp_parse_args( get_theme_mod( 'primary_font' ), $typo_defaults['primary_font'] );
		$heading_one   = wp_parse_args( get_theme_mod( 'heading_one' ), $typo_defaults['heading_one'] );
		$heading_two   = wp_parse_args( get_theme_mod( 'heading_two' ), $typo_defaults['heading_two'] );
		$heading_three = wp_parse_args( get_theme_mod( 'heading_three' ), $typo_defaults['heading_three'] );
		$heading_four  = wp_parse_args( get_theme_mod( 'heading_four' ), $typo_defaults['heading_four'] );
		$heading_five  = wp_parse_args( get_theme_mod( 'heading_five' ), $typo_defaults['heading_five'] );
		$heading_six   = wp_parse_args( get_theme_mod( 'heading_six' ), $typo_defaults['heading_six'] );
		$accent_font   = wp_parse_args( get_theme_mod( 'accent_font' ), $typo_defaults['accent_font'] );

		$primary_font_family       = coachify_get_font_family( $primary_font );
		$accent_font_family        = coachify_get_font_family( $accent_font );
		$heading_one_font_family   = coachify_get_font_family( $heading_one );
		$heading_two_font_family   = coachify_get_font_family( $heading_two );
		$heading_three_font_family = coachify_get_font_family( $heading_three );
		$heading_four_font_family  = coachify_get_font_family( $heading_four );
		$heading_five_font_family  = coachify_get_font_family( $heading_five );
		$heading_six_font_family   = coachify_get_font_family( $heading_six );

		$h1FontFamily = $heading_one_font_family === '"Default Family"' ? 'inherit' : $heading_one_font_family;
		$h2FontFamily = $heading_two_font_family === '"Default Family"' ? 'inherit' : $heading_two_font_family;
		$h3FontFamily = $heading_three_font_family === '"Default Family"' ? 'inherit' : $heading_three_font_family;
		$h4FontFamily = $heading_four_font_family === '"Default Family"' ? 'inherit' : $heading_four_font_family;
		$h5FontFamily = $heading_five_font_family === '"Default Family"' ? 'inherit' : $heading_five_font_family;
		$h6FontFamily = $heading_six_font_family === '"Default Family"' ? 'inherit' : $heading_six_font_family;
		$accFontFamily = $accent_font_family === '"Default Family"' ? 'inherit' : $accent_font_family;

		/* Set File Type and Print the CSS Declaration */
		header( 'Content-type: text/css' );
		echo ':root .mce-content-body {
		--g-primary-font: ' . wp_kses_post( $primary_font_family ) . ';
		--g-secondary-font: ' . wp_kses_post( $h1FontFamily ) . ';
		--g-accent-font: ' . wp_kses_post( $accFontFamily ) . ';
	}
	.mce-content-body h1{
		font-family :' . wp_kses_post( $h1FontFamily ) . ';
	}
	.mce-content-body h2{
		font-family :' . wp_kses_post( $h2FontFamily ) . '; 
	}
	.mce-content-body h3{
		font-family :' . wp_kses_post( $h3FontFamily ) . '; 
	}
	.mce-content-body h4{
		font-family :' . wp_kses_post( $h4FontFamily ) . '; 
	}
	.mce-content-body h5{
		font-family :' . wp_kses_post( $h5FontFamily ) . '; 
	}
	.mce-content-body h6{
		font-family :' . wp_kses_post( $h6FontFamily ) . '; 
	}';
		die(); // end ajax process.
	}
endif;
add_action( 'wp_ajax_coachify_dynamic_mce_css', 'coachify_dynamic_mce_css_ajax_callback' );
add_action( 'wp_ajax_no_priv_coachify_dynamic_mce_css', 'coachify_dynamic_mce_css_ajax_callback' );