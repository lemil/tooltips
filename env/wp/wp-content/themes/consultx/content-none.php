<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'consultx' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) {
			?>

			<p><?php printf( wp_kses( esc_html( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'consultx' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			<?php
		} elseif ( is_search() ) {
			?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'consultx' ); ?></p>
			<?php
				get_search_form();

		} else {
			?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'consultx' ); ?></p>
			<?php
				get_search_form();
		}
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->