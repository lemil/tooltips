<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			echo esc_html(the_title( '<h4>', '</h4>' ));
			else :
			echo esc_html(the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ));
		endif;
     	if ( 'post' === get_post_type() ) : ?>
			<ul class="meta">
				<?php consultx_posted_on(); ?>
			</ul><!-- .entry-meta -->
	<?php endif; ?>     
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php consultx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->