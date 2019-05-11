<?php
/**
 * min functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package min
 */

if ( ! function_exists( 'min_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function min_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on min, use a find and replace
		 * to change 'min' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'min', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'min' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		if (!function_exists('searchform_hideable')) {
			function searchform_hideable() {
				?>
				<form role="search" method="get" class="search-form hidden" action="http://localhost/" wtx-context="46BAD25B-5711-4970-AF68-E68D30F901A1" name="form">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search ..." value="" name="s" wtx-context="7CAD94C8-71F2-4A93-8B2A-390F32FA3256">
					</label>
					<a class="search-submit glitch" onclick="form.submit()">search</a>
					<a class="search-hide glitch" id="search-hide-trigger">hide</a>
				</form>
				<?php
			}
		}

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'min_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        function min_add_woocommerce_support() {
            add_theme_support( 'woocommerce', array(
                'thumbnail_image_width' => 150,
                'single_image_width'    => 300,

                'product_grid'          => array(
                    'default_rows'    => 3,
                    'min_rows'        => 2,
                    'max_rows'        => 8,
                    'default_columns' => 4,
                    'min_columns'     => 2,
                    'max_columns'     => 5,
                ),
            ) );
	        add_theme_support( 'wc-product-gallery-zoom' );
	        add_theme_support( 'wc-product-gallery-lightbox' );
	        add_theme_support( 'wc-product-gallery-slider' );
        }

        add_action( 'after_setup_theme', 'min_add_woocommerce_support' );
	}
endif;
add_action( 'after_setup_theme', 'min_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function min_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'min_content_width', 640 );
}
add_action( 'after_setup_theme', 'min_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function min_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'min' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'min' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'min_widgets_init' );

/**
 * Optimize scripts
 */
/*add_filter( 'clean_url', function( $url )
{
	if ( FALSE === strpos( $url, '.js' ) )
	{ // not our file
		return $url;
	}
	// Must be a ', not "!
	return "$url' defer='defer";
}, 11, 1 );*/

/**
 * Enqueue scripts and styles.
 */
function min_scripts() {
    //wp_enqueue_script( 'min-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'min-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20190510', true );

	// Night mode
	wp_enqueue_script('min-night-mode-script', get_template_directory_uri() . '/js/night_mode.js', array(), '20190510', true );

	// Glitch effect
	wp_enqueue_script('min-glitch-effect-script', get_template_directory_uri() . '/js/glitch.js', array(), '20190510', true );

	// Search form
	wp_enqueue_script('min-search-form', get_template_directory_uri() . '/js/search.js', array(), '20190510', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'min_scripts' );

/* Load optmized styles */
function min_styles_to_footer() {
	wp_enqueue_style( 'min-style', get_stylesheet_uri());

	wp_enqueue_style('min-layout', get_template_directory_uri() . '/layouts/content-sidebar.css');
}

add_action( 'get_footer', 'min_styles_to_footer' );

/* Add custom attrubutes to menu links for glitch effect */
add_filter( 'nav_menu_link_attributes', 'min_glitch_menu_atts', 10, 3 );
function min_glitch_menu_atts( $atts, $item, $args )
{
  $atts['data-glitch'] = $item->title;
  $atts['class'] = 'glitch';
  return $atts;
}

/** Visual Composer Support */
// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );

function vc_before_init_actions() {

	// Setup VC to be part of a theme
	if( function_exists('vc_set_as_theme') ){

		vc_set_as_theme( true );

	}

	// Link your VC elements's folder
	if( function_exists('vc_set_shortcodes_templates_dir') ){

		vc_set_shortcodes_templates_dir( get_template_directory() . 'vc-elements' );

	}

	// Disable Instructional/Help Pointers
	if( function_exists('vc_pointer_load') ){

		remove_action( 'admin_enqueue_scripts', 'vc_pointer_load' );

	}

}

// After VC Init
add_action( 'vc_after_init', 'vc_after_init_actions' );

function vc_after_init_actions() {

	// Enable VC by default on a list of Post Types
	if( function_exists('vc_set_default_editor_post_types') ){

		$list = array(
			'page',
			'post',
			'your-custom-posttype-slug', // add here your custom post types slug
		);

		vc_set_default_editor_post_types( $list );

	}

	// Disable AdminBar VC edit link
	if( function_exists('vc_frontend_editor') ){

		remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );

	}

	// Disable Frontend VC links
	if( function_exists('vc_disable_frontend') ){

		vc_disable_frontend();

	}

}

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load styles for editor
 */

function min_site_block_editor_styles() {
	wp_enqueue_style( 'site-block-editor-styles', get_theme_file_uri( '/editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'min_site_block_editor_styles' );

