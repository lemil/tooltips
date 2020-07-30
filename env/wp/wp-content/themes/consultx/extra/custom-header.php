<?php
/**
 * Adds a custom logo.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package consultx
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'restricted access' );
}

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses consultx_header_style()
 */
function consultx_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'consultx_custom_header_args', array(
		'default-image'      => get_template_directory_uri() .'/assets/images/header.jpg',
		'default-text-color' => esc_html__('fff','consultx'),
		'width'              => 1000,
		'height'             => 250,
		'flex-height'        => true,
		'flex-wdidth'        => true,
		'wp-head-callback'   => 'consultx_header_style',
	) ) );
}

if ( ! function_exists( 'consultx_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see consultx_custom_header_setup().~
	 */
	function consultx_header_style() {

		$header_text_color = get_header_textcolor();
		

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
			?>
			.site-title a, .main-navigation a, .main-navigation .menu-item-has-children > a::after, 
		 	.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			.main-navigation .sub-menu li a:hover{
				background-color: #<?php echo esc_attr( $header_text_color ); ?>;
								color:#fff !important;
			}
			.main-navigation .sub-menu li a:hover
			{
				color:#<?php echo esc_attr( $header_text_color ); ?> !important;
			}
			 
		<?php endif; ?>
		<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>	
			.banner-area
			   {
				background-image:url('<?php esc_url(header_image()); ?>');
			   }
			<?php endif; ?>
		</style>
		<?php
	}
endif;

/**
 * Loads inline css from customizer settings.
 */
function consultx_customizer_css() {
	?>
	<style type="text/css" id="customizerinlinecss">
		header#masthead {
			background-color: <?php	echo esc_attr( get_theme_mod( 'mainheader_background', '#565656' ) ) . ';'; ?>
			<?php
			if ( true === get_theme_mod( 'headersticky' ) ) {
				?>
					position: sticky;
					top: 0;
					z-index: 1000;
				<?php
			}
			?>
		}
		.main-navigation a,
		.textwidget a {
			color: <?php echo esc_attr( get_theme_mod( 'navlink_color', '#fff' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'consultx_customizer_css' );