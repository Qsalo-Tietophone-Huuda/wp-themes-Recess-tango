<?php
/**
 * RecessTango functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme Qsalo
 * @subpackage RecessTango
 * @since RecessTango 0.01
 */

if ( ! function_exists( 'RecessTango_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function RecessTango_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RecessTango, use a find and replace
		 * to change 'RecessTango' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'RecessTango', get_template_directory() . '/languages' );

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
		add_image_size( 'RecessTango-featured-category-image', 450, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'RecessTango' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'RecessTango_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// This setup supports logo, site-title & site-description
		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 120,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Add WooCommerce support 
		add_theme_support( 'woocommerce' );
		if ( class_exists( 'WooCommerce' ) ) {
	    	global $woocommerce;

	    	if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
	      		add_theme_support( 'wc-product-gallery-zoom' );
				add_theme_support( 'wc-product-gallery-lightbox' );
				add_theme_support( 'wc-product-gallery-slider' );
			}
	  	}

	  	/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/unminified/editor-style.css', RecessTango_fonts_url() ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'RecessTango' ),
				'slug' => 'blue',
				'color' => '#5EABDF',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'RecessTango' ),
	           	'slug' => 'black',
	           	'color' => '#333',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'RecessTango' ),
	           	'slug' => 'grey',
	           	'color' => '#909599',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'RecessTango' ),
		       	'shortName' => esc_html__( 'S', 'RecessTango' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'RecessTango' ),
		       	'shortName' => esc_html__( 'M', 'RecessTango' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'RecessTango' ),
		       	'shortName' => esc_html__( 'L', 'RecessTango' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'RecessTango' ),
		       	'shortName' => esc_html__( 'XL', 'RecessTango' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
/**
 * Load theme plugins
 * 
**/
function cfct_load_plugins() {
    $files = cfct_files(CFCT_PATH.'plugins');
    if (count($files)) {
        foreach ($files as $file) {
            if (file_exists(CFCT_PATH.'plugins/'.$file)) {
                include_once(CFCT_PATH.'plugins/'.$file);
            }
// child theme support
            if (file_exists(STYLESHEETPATH.'/plugins/'.$file)) {
                include_once(STYLESHEETPATH.'/plugins/'.$file);
            }
        }
    }
}

/**
 * Get a list of php files within a given path as well as files in corresponding child themes
 * 
 * @param sting $path Path to the directory to search
 * @return array Files within the path directory
 * 
**/
function cfct_files($path) {
    $files = apply_filters('cfct_files_'.$path, false);
    if ($files) {
        return $files;
    }
    $files = wp_cache_get('cfct_files_'.$path, 'cfct');
    if ($files) {
        return $files;
    }
    $files = array();
    $paths = array($path);
    if (STYLESHEETPATH.'/' != CFCT_PATH) {
        // load child theme files
        $paths[] = STYLESHEETPATH.'/'.str_replace(CFCT_PATH, '', $path);
    }
    foreach ($paths as $path) {
        if (is_dir($path) && $handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                $path = trailingslashit($path);
                if (is_file($path.$file) && strtolower(substr($file, -4, 4)) == ".php") {
                    $files[] = $file;
                }
            }
            closedir($handle);
        }
    }
    $files = array_unique($files);
    wp_cache_set('cfct_files_'.$path, $files, 'cfct', 3600);
    return $files;
}
function set_up_cssCrush() {
	require_once 'plugins/css-crush/CssCrush.php';
	$color_options = RecessTango_get_theme_options(); // get theme options
	$theme_color = !empty( $color_options['theme_color'] ) ? $color_options['theme_color'] : 'blue';
    $color_style = get_template_directory_uri() .'/assets/css/'. esc_attr( $theme_color ).'.min.css';
    $options['output_file'] = 'current';
    copy('wp-content/themes/RecessTango/assets/css/'.$theme_color.'.min.css', 'wp-content/themes/RecessTango/assets/css/current.css');
	return '/'.csscrush_file('wp-content/themes/RecessTango/style.css');
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function RecessTango_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'RecessTango_content_width', 640 );
}
add_action( 'after_setup_theme', 'RecessTango_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function RecessTango_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'RecessTango' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'RecessTango' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'RecessTango' ),
		'id'            => 'header_advertisement',
		'description'   => esc_html__( 'Header advertisement sidebar is best suited to use with advertisement widget.', 'RecessTango' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'RecessTango' ),
		'id'            => 'front_page_sidebar',
		'description'   => esc_html__( 'Add widgets here to display in frontpage.', 'RecessTango' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Popular Articles Sidebar', 'RecessTango' ),
		'id'            => 'popular_articles_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'RecessTango' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Latest News Sidebar', 'RecessTango' ),
		'id'            => 'latest_news_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'RecessTango' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar 1', 'RecessTango' ),
		'id'            => 'optional_sidebar_1',
		'description'   => esc_html__( 'This is optional sidebar 1.', 'RecessTango' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar 2', 'RecessTango' ),
		'id'            => 'optional_sidebar_2',
		'description'   => esc_html__( 'This is optional sidebar 2.', 'RecessTango' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	$footer_args = array(
		'name'          => esc_html__('Footer Sidebar %d', 'RecessTango' ),
	    'id'            => 'RecessTango_footer_sidebar',          
		'description'   => esc_html__( 'Add widgets here.', 'RecessTango' ),
		'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>' 
	);
	register_sidebars( 4, $footer_args );
}
add_action( 'widgets_init', 'RecessTango_widgets_init' );


if ( ! function_exists( 'RecessTango_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function RecessTango_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'RecessTango' ) ) {
		$fonts[] = 'Oxygen:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function RecessTango_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'RecessTango-fonts', RecessTango_fonts_url(), array(), null );

	// Load animate css
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/plugins/css/animate.min.css', array(), '' );
	// Load font awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/plugins/css/font-awesome.min.css', array(), '4.6.3' );

	// Load jquery slidr light css
	wp_enqueue_style( 'jquery-sidr', get_template_directory_uri() .'/assets/plugins/css/jquery.sidr.light.min.css', array(), '' );

	// Load magnific popup css
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/plugins/css/magnific-popup.min.css', array(), '' );

	// blocks
	wp_enqueue_style( 'RecessTango-blocks', get_template_directory_uri() . '/assets/css/blocks.min.css', array(), '' );

	// Load theme color layout css

	wp_enqueue_style( 'RecessTango-style', set_up_cssCrush(), array(), '' );
	// Load JS files

	// Load the html5 shiv.
	wp_enqueue_script( 'RecessTango-html5', get_template_directory_uri() . '/assets/js/html5.min.js', array(), '3.7.3' );
	wp_script_add_data( 'RecessTango-html5', 'conditional', 'lt IE 9' );

	// Load skip link focus fix js
	wp_enqueue_script( 'RecessTango-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20160412', true );

	// Load navigation js
	wp_enqueue_script( 'RecessTango-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), '20151215', true );

	// Load jquery sidr js
	wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/assets/plugins/js/jquery.sidr.min.js', array( 'jquery' ), '', true );

	// Load slick js
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/plugins/js/slick.min.js', array( 'jquery' ), '1.6.0', true );
    // Load owl carousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/js/owl.carousel.min.js', array( 'jquery' ), '2.2.3', true );
	
	// Load magnific popup js
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/plugins/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

	// Load wow js
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/plugins/js/wow.min.js', array(), '1.1.2', true );

	// Load animation js
	wp_enqueue_script( 'RecessTango-animation', get_template_directory_uri() . '/assets/js/animation.min.js', array( 'jquery' ), '', true );

	// Load custom js
	wp_enqueue_script( 'RecessTango-custom-js', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), '', true );

	// Load comment-reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'RecessTango_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since RecessTango 1.0.0
 */
function RecessTango_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'RecessTango-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.min.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'RecessTango-fonts', RecessTango_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'RecessTango_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';
