<?php
/**
 * consultx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package consultx
 */

if ( ! function_exists( 'consultx_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function consultx_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on consultx, use a find and replace
		 * to change 'consultx' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'consultx', get_template_directory() . '/lang' );

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
		add_theme_support( 'nav-menus' );
		register_nav_menu('primary', esc_html__( 'Primary Menu', 'consultx' ) );

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
//About Theme		
		if ( is_admin() ) {
			require( get_template_directory() . '/extra/noticebar.php');
		}	
	 

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		consultx_custom_header_setup();
		consultx_theme_prefix_setup();
	}
	endif;
add_action( 'after_setup_theme', 'consultx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function consultx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'consultx_content_width', 640 );
}



/*
** Enqueue scripts and styles
*/
function consultx_scripts() {
	//Theme fonts 
	wp_enqueue_style('consultx-font', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600',''  			        );
	// bootstrap style
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.css' )           );
		// animate style
	wp_enqueue_style( 'animate', get_theme_file_uri( '/assets/css/animate.css' )      		   );
	// owl-carousel style
	wp_enqueue_style( 'jQuery-owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.css' )      		   );
	// nivo lightbox style
	wp_enqueue_style( 'nivo-lightbox', get_theme_file_uri( '/assets/css/nivo-lightbox.css' )   );
	// slicknav style
	wp_enqueue_style( 'slicknav', get_theme_file_uri( '/assets/css/slicknav.css' )   		   );
	// slick style
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.css' )   		   );
		// slick theme style
	wp_enqueue_style( 'slick-theme', get_theme_file_uri( '/assets/css/slick-theme.css' )   		   );
	// FontAwesome Icons
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/font-awesome.css' )      );
	// Theme Stylesheet
	wp_enqueue_style( 'consultx-style', get_stylesheet_uri()			   				       );
	// custom style
	wp_enqueue_style( 'consultx-custom', get_theme_file_uri( '/assets/css/custom.css' )       );

	//bootstrap js
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js'), 
		array( 'jquery' )						      					   					   );

	//nivo-lightbox js
	wp_enqueue_script( 'nivo-lightbox-js', get_theme_file_uri( '/assets/js/nivo-lightbox.js' ), 
		array( ) 							      					   						   );
	
	//imageloaded js
	wp_enqueue_script( 'imageloaded', get_theme_file_uri( '/assets/js/imageloaded.js' ), 
		array( ) 							      					   						   );
	//isotope js
	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.js' ), 
		array( ) 							      					   						   );
	//owl-carousel js
	wp_enqueue_script( 'jQuery-owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.js' ), 
		array( ) 							      					   						   );
	//slick js
	wp_enqueue_script( 'slick-js', get_theme_file_uri( '/assets/js/slick.js' ), 
		array( ) 	  );
									      		
	//slicknav js
	wp_enqueue_script( 'slicknav', get_theme_file_uri( '/assets/js/jquery.slicknav.js' ), 
		array( ) 							      					   						   );

	//main js
	wp_enqueue_script( 'consultx-main', get_theme_file_uri( '/assets/js/main.js' )			   );
	
	//Skip Link JS
	wp_enqueue_script( 'consultx-skip-links', get_theme_file_uri( '/assets/js/skip-links.js' )			   );
	
}
add_action( 'wp_enqueue_scripts', 'consultx_scripts' );

function consultx_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function consultx_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'consultx' ),
		'id'            => 'main-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'consultx' ),
		'before_widget' => '<section id="%1$s" class="widget co-blog-sidebar clearfix %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'consultx' ),
		'id'            => 'consultx-footer-sidebar-1',
		'description'   => esc_html__( 'Footer location 1', 'consultx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="sec-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'consultx' ),
		'id'            => 'consultx-footer-sidebar-2',
		'description'   => esc_html__( 'Footer location 2', 'consultx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="sec-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'consultx' ),
		'id'            => 'consultx-footer-sidebar-3',
		'description'   => esc_html__( 'Footer location 3', 'consultx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="sec-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'consultx_widgets_init' );

/**
 * admin  JS scripts
 */
function consultx_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/assets/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'consultx-admin', 
		get_template_directory_uri() . '/assets/backend/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'consultx_admin_enqueue_scripts' );

add_action( 'admin_init', 'consultx_detect_button' );
	function consultx_detect_button() {
	wp_enqueue_style( 'consultx-info-button', get_template_directory_uri() . '/assets/notice.css' );
}


/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/extra/upgrade/class-customize.php' );

/**
 * include breadcrumbs.
 */
include get_template_directory() . '/extra/breadcrumbs.php';

/**
 * Load scripts and styles.
 */
require get_template_directory() . '/extra/assetloader.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/extra/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/extra/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/extra/customizer.php';

/**
 * Load Customized theme functions.
 */
require get_template_directory() . '/extra/custom-functions.php';

require get_template_directory(). '/extra/extras.php';

/**
 * Logo Style
 */
function consultx_logo_style() {
?>
	  <script type="text/javascript">
    /*----------------------------------------------
    ----------- Slick Nav  --------------------
    -------------------------------------------------*/
    if (jQuery('#menu').length) {
        jQuery('#menu').slicknav({
            brand: '<?php if(consultx_get_the_logo_url()){ ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php the_custom_logo(); ?></a> <h1> <?php } else{ bloginfo( 'name' ); } ?></h1>',
            appendTo: 'header',
        });
    } 
      </script>
	  <?php
}?>