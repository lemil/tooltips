<?php
/**
 * Welcome Screen Class
 */
class consultx_screen {

	public function __construct() {

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'consultx_activation_admin_notice' ) );

	}
	
	public function consultx_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'consultx_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen	 * 
	 */
	public function consultx_admin_notice() {
		?>			
		<div class="updated notice is-dismissible consultx-notice">
			<h1><?php
			$theme_info = wp_get_theme();
			printf( esc_html__('Thanks for installing  %1$s , You rock!', 'consultx'), esc_html( $theme_info->Name ), esc_html( $theme_info->Version ) ); ?>
			</h1>
			<p><?php echo sprintf( esc_html__("Welcome! Thank you for choosing consultx WordPress theme. To take full advantage of the features this theme has to offer visit our %1\$s welcome page %2\$s.", "consultxe"), '<a href="' . esc_url( admin_url( 'themes.php?page=consultx_upgrade' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=consultx_upgrade' ) ); ?>" class="button button-blue-secondary button_info" style="text-decoration: none;"><?php echo esc_html__('Get started with consultx','consultx'); ?></a></p>
		</div>
		<?php
	}
	
}

$GLOBALS['consultx_screen'] = new consultx_screen();