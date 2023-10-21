<?php
/**
 * GrandMart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grandmart
 */

if ( ! function_exists( 'grandmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grandmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GrandMart, use a find and replace
		 * to change 'grandmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'grandmart', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 450, 600, true );
		add_image_size( 'grandmart-thumbnail', 500, 500, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary Menu', 'grandmart' ),
			'social' 	=> esc_html__( 'Social Menu', 'grandmart' ),
			'footer' 	=> esc_html__( 'Footer Menu', 'grandmart' ),
			) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'grandmart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for page excerpt.
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widget.php' );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
	           	'name' => esc_html__( 'Dark', 'grandmart' ),
	           	'slug' => 'dark',
	           	'color' => '#333',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'grandmart' ),
	           	'slug' => 'orange',
	           	'color' => '#f77358',
	       	),
	       	array(
	           	'name' => esc_html__( 'Gray', 'grandmart' ),
	           	'slug' => 'gray',
	           	'color' => '#484848',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'grandmart' ),
		       	'shortName' => esc_html__( 'S', 'grandmart' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'grandmart' ),
		       	'shortName' => esc_html__( 'M', 'grandmart' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'large', 'grandmart' ),
		       	'shortName' => esc_html__( 'L', 'grandmart' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'extra large', 'grandmart' ),
		       	'shortName' => esc_html__( 'XL', 'grandmart' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'grandmart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grandmart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grandmart_content_width', 819 );
}
add_action( 'after_setup_theme', 'grandmart_content_width', 0 );

if ( ! function_exists( 'grandmart_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function grandmart_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'grandmart' ) ) {
		$fonts[] = 'Poppins:200,300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'grandmart' ) ) {
		$fonts[] = 'Oxygen: 200,300,400,500,600,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since GrandMart 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function grandmart_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'grandmart-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'grandmart_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grandmart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grandmart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grandmart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar', 'grandmart' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'grandmart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce', 'grandmart' ),
		'id'            => 'woocommerce',
		'description'   => esc_html__( 'Add widgets here for WooCommerce pages.', 'grandmart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'grandmart_widgets_init' );

/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function grandmart_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Enqueue scripts and styles.
 */
function grandmart_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'grandmart-fonts', grandmart_fonts_url(), array(), null );

	// slick
	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick' . grandmart_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'jquery-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . grandmart_min() . '.css' );

	// font awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . grandmart_min() . '.css' );

	// blocks
	wp_enqueue_style( 'grandmart-blocks', get_template_directory_uri() . '/assets/css/blocks' . grandmart_min() . '.css' );

	wp_enqueue_style( 'grandmart-style', get_stylesheet_uri() );
	wp_style_add_data( 'grandmart-style', 'rtl', 'replace' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5' . grandmart_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'grandmart-navigation', get_template_directory_uri() . '/assets/js/navigation' . grandmart_min() . '.js', array(), '20151215', true );

	$grandmart_l10n = array(
		'quote'          => grandmart_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'grandmart' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'grandmart' ),
		'icon'           => grandmart_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	wp_localize_script( 'grandmart-navigation', 'grandmart_l10n', $grandmart_l10n );

	wp_enqueue_script( 'grandmart-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . grandmart_min() . '.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'imagesloaded', '', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . grandmart_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-packery', get_template_directory_uri() . '/assets/js/packery.pkgd' . grandmart_min() . '.js', array( 'jquery', 'imagesloaded' ), '', true );

	wp_enqueue_script( 'grandmart-custom', get_template_directory_uri() . '/assets/js/custom' . grandmart_min() . '.js', array( 'jquery', 'imagesloaded', 'jquery-packery' ), '20151215', true );

	$grandmart_woo = array(
		'compare'         => esc_html__( 'Compare', 'grandmart' ),
		'quick_view'      => esc_html__( 'Quick View', 'grandmart' ),
		'add_to_wl'       => esc_html__( 'Add to Wishlist', 'grandmart' ),
		'browse_wl'       => esc_html__( 'Browse Wishlist', 'grandmart' ),
	);
	wp_localize_script( 'grandmart-custom', 'grandmart_woo', $grandmart_woo );

}
add_action( 'wp_enqueue_scripts', 'grandmart_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function grandmart_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'grandmart-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . grandmart_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'grandmart-fonts', grandmart_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'grandmart_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WooCommerce plugin compatibility.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * OCDI plugin demo importer compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/demo-import.php';
}
