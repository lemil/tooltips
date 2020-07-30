<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultx
 */

?>
<div class="news news-block">
    <?php if ( has_post_thumbnail() ) { ?>	                                               	
		<div class="featured-pic">
			<?php the_post_thumbnail(); ?>
		</div>
    <?php } ?>
    <div class="news-detail">
    	<?php
			if ( is_single() ) :
				echo esc_html(the_title( '<h4>', '</h4>' ));
				else :
				echo esc_html(the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ));
			endif;
	     ?>
        <?php the_excerpt(); ?>
        <?php 
        if ( 'post' === get_post_type() ) : ?>
				<ul class="clearfix">
		            <li>
		                <i class="fa fa-calendar"></i>
		                <a href="<?php echo esc_url( get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ) ) ; ?>"><?php echo esc_html(get_the_date());?></a>
		            </li>
		            <li>
		                <i class="fa fa-user"></i>
		                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html__( 'By', 'consultx' ); ?> <?php the_author(); ?></a>
		            </li>
		            <li>
		                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__('News Read More','consultx'); ?>">
		                    <?php echo esc_html__('Read More','consultx'); ?>
		                    <i class="fa fa-long-arrow-right"></i>
		                </a>
		            </li>
		        </ul>
		<?php endif; ?>         
    </div>
</div>