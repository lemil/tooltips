<?php
/**
 * The sidebar containing the main home columns widget areas
 *
 * @subpackage fdesign
 * @author tishonator
 * @since fdesign 1.6.1
 *
 */
?>

<?php if ( is_active_sidebar( 'homepage-widget-area' ) ) : ?>

		<div id="top-widget">
			<div id="top-widget-inner">
				<?php dynamic_sidebar( 'homepage-widget-area' ); ?>
			</div><!-- #top-widget-inner -->
		</div><!-- #top-widget -->

<?php endif; ?>
