<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

?>
<div class="news-detail" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	<?php
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'consultx' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consultx' ),
			'after'  => '</div>',
		) );
		if (has_tag()) : ?>					                   
	    <div class="co-blog-sidebar">
	        <h4><?php echo esc_html__('Tags :', 'consultx' ); ?></h4>
	        <div class="tags-cloud">
	            <?php the_tags('&nbsp;'); ?>
	        </div>
	    </div>
	<?php endif; ?>
</div>