<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Consultx
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<!-------------------------------------------------------
------------------------Slider Section Start-------------
-------------------------------------------------------->

<?php 
if ( is_front_page() && !is_home() ) {

if ( is_front_page() && !is_home() ) {
if(get_theme_mod('consultx_showslide_area') != '') {
    for($i=1; $i<=3; $i++) {
      if( get_theme_mod('consultx_slidepgebx'.$i,false)) {
       $slider_Arr[] = absint( get_theme_mod('consultx_slidepgebx'.$i,true));
      }
    }
?> 
<div class="slider-area multi-slider-area">
    <?php if(!empty($slider_Arr)){ ?>
        <div class="slider-main owl-carousel">
  <?php 


    
    $i=1;
    
    $consultx_slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr ) );

    while( $consultx_slidequery->have_posts() ) :  $consultx_slidequery->the_post(); 
    $consultx_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
    $consultx_thumbnail_id = get_post_thumbnail_id( $post->ID );
    $consultx_alt = get_post_meta($consultx_thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<!-- slider item  -->
    <div class="item">                    
        <?php if(!empty($consultx_image)){ ?>
            <img src="<?php echo esc_url( $consultx_image ); ?>" alt="<?php echo esc_attr($consultx_alt); ?>" />
        <?php } 
		else{ ?>
            <img src="<?php echo esc_attr__('#','consultx'); ?>" alt="<?php echo esc_attr($consultx_alt); ?>" />
        <?php } ?>
        <div class="overlay">
            <div class="slide-text text-center">
                <h2><?php echo esc_html(the_title()); ?></h2>
                <p><?php echo esc_html(wp_trim_words( get_the_content(), 25, '.' )); ?></p>
                <div class="slider-btns">
                    <?php
                        if( !empty(get_theme_mod('consultx_slidereadmore_btn') && get_theme_mod('consultx_slidereadmore_button_url')) ){ ?>
                            <a class="btn btn-custom" href="<?php echo esc_url(get_theme_mod('consultx_slidereadmore_button_url','consultx')); ?>"><?php echo esc_html(get_theme_mod('consultx_slidereadmore_btn','consultx')); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- slider item ends  -->
    <?php 
    $i++; 
    endwhile;
    wp_reset_postdata(); ?>  
    </div>
    <div class="slider-nav">
        <div class="sld-prev">
            <span><?php echo esc_html__('Prev','consultx'); ?></span>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/slider-nav.png" alt="<?php echo esc_attr__("slide-nav",'consultx')?>">
        </div>
        <div class="sld-next">
            <span><?php echo esc_html__('Next','consultx'); ?></span>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/slider-nav.png" alt="<?php echo esc_attr__("slide-nav",'consultx')?>">
        </div>
    </div>
</div>
<!-- slider section ends --> 
<?php } ?>


<?php } 

else
{
?>

<?php

consultx_breadcrumbs();?>


<?php
} }?>

<?php if ( is_front_page() && ! is_home() ) {
 if( get_theme_mod('consultx_show_service_section') != ''){ ?>
<!-- about section  -->
        <section class="section-padding" id="aboutus">
            <div class="container">
                <?php
                     if( !empty(get_theme_mod('consultx_service_tittletext')) ){ ?>
                        <h2 class="primary-title"><?php echo esc_html(get_theme_mod('consultx_service_tittletext','consultx')); ?></h2>
                <?php } ?>                
                <div class="row">
                    <?php 
                        for($n=1; $n<=4; $n++) {    
                        if( get_theme_mod('consultx_servicepage'.$n,false)) {      
                            $consultx_queryvar = new WP_Query('page_id='.absint(get_theme_mod('consultx_servicepage'.$n,true)) );     
                            while( $consultx_queryvar->have_posts() ) : $consultx_queryvar->the_post(); 
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="info-box text-center">
                            <?php if(has_post_thumbnail() ) { ?>
                               <?php the_post_thumbnail();?>       
                            <?php } ?> 
                            <h4>
                                <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>
                            </h4>
                            <p><?php $excerpt = get_the_excerpt(); echo esc_html( consultx_string_limit_words( $excerpt,20 ) ); ?></p>
                        </div>
                    </div>
                     <?php endwhile;
                            wp_reset_postdata();                                  
                        } } 
                    ?>    
                </div>
            </div>
        </section>
        <!-- service section  ends -->
   <?php } } ?>
   
   

<!-------------------------------------------------------
------------------------About Section Start------------
-------------------------------------------------------->
    <?php if( get_theme_mod('consultx_show_aboutus_pagebox') != ''){ 
            if( get_theme_mod('consultx_aboutus_pagebox',false)) {     
                $consultx_queryvar = new WP_Query('page_id='.absint(get_theme_mod('consultx_aboutus_pagebox',true)) );
                    while( $consultx_queryvar->have_posts() ) : $consultx_queryvar->the_post(); ?>
                        <section class="section-padding" id="aboutus">
                            <div class="container">
                                <div class="row about-main secondry-padding">
                                    <div class="col-md-6">
                                        <h2 class="primary-title"><?php echo esc_html(the_title()); ?></h2>   
                                        <?php the_content();  ?>         
                                    </div> 
                                    <div class="col-md-6">
                                        <?php the_post_thumbnail();?>
                                    </div>
                                </div>
                            </div>
                        </section>
                <?php endwhile;
                     wp_reset_postdata(); ?>
    <?php } } ?>

<!-------------------------------------------------------
------------------------About Section End--------------
-------------------------------------------------------->

<!-------------------------------------------------------
------------------------Project Section Start------------
-------------------------------------------------------->
    <?php if( get_theme_mod('consultx_show_current_project_section') != ''){ ?>
    <!-- projects section -->
        <section class="project-section section-padding" id="works">
            <div class="container">
                <?php
                    if( !empty(get_theme_mod('consultx_project_tittletext')) ){ ?>
                       <h2 class="primary-title"><?php echo esc_html(get_theme_mod('consultx_project_tittletext','consultx')); ?></h2>
                <?php } ?>                        
                <div class="row">
                    <div class="col-md-12">
                        <div class="row project-items text-center">
                            <!-- service  -->
                            <?php 
                                for($n=1; $n<=6; $n++) {    
                                if( get_theme_mod('consultx_current_project_pagebx'.$n,false)) {      
                                    $consultx_queryvar = new WP_Query('page_id='.absint(get_theme_mod('consultx_current_project_pagebx'.$n,true)) );     
                                    while( $consultx_queryvar->have_posts() ) : $consultx_queryvar->the_post(); 
                            ?>  
                            <div class="col-xs-6 col-sm-6 col-md-4 grid-item marketing">
                                <div class="project">
                                    <?php if(has_post_thumbnail()){ 
                                        the_post_thumbnail(); 
                                    } 
									else
									{ ?>
										<li>
											<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/portfolio.jpg" alt="<?php echo esc_attr__("Portfolio Image",'consultx')?>">
										</li>
									<?php
									}	
									
									?>
									<?php if(has_post_thumbnail()){ ?>
										<div class="dimmer">
											<div class="overlay">
												<a href="<?php echo esc_url(the_permalink()); ?>" class="link" title="<?php echo esc_attr__('project Link','consultx'); ?>">
													<i class="fa fa-link"></i>
												</a>
												<h4><?php echo esc_html(the_title()); ?></h4>
											</div>
										</div>
									<?php }
										else
										{?>
											<div class="dimmer">
											<div class="overlay">
												<a href="<?php echo esc_attr__('#','consultx'); ?>" class="link" title="<?php echo esc_attr__('project Link','consultx'); ?>">
													<i class="fa fa-link"></i>
												</a>
												<h4><?php echo esc_html(the_title()); ?></h4>
											</div>
										</div>
									<?php }											
									?>	
                                </div>
                            </div>
                            <!-- service ends -->
                           <?php endwhile;
                                    wp_reset_postdata();                                  
                                } } 
                            ?>   
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- projects section ends -->
    <?php } ?>
<!-------------------------------------------------------
------------------------Project Section End--------------
-------------------------------------------------------->

<!-------------------------------------------------------
------------------------Blog & Client Section Start------------
-------------------------------------------------------->


<?php $blog_enable=get_theme_mod('consultx_show_blog_section',true);
if($blog_enable)

    { 
	if( get_theme_mod('consultx_show_client_section') != ''){ 
		$divclass= "col-md-6";
	}
	else
	{
		$divclass= "col-md-12";
	}
	?>
	    <div class="news-section">
            <div class="container">
                <div class="row">
                    <div class="<?php echo $divclass; ?>">
                        <section class="news-section section-padding" id="blog">
                             <?php
                                if( !empty(get_theme_mod('consultx_blog_tittletext')) ){ ?>
                                   <h2 class="primary-title"><?php echo esc_html(get_theme_mod('consultx_blog_tittletext','consultx')); ?></h2>
                            <?php } ?>        
                            <div class="news-slider">
                                <?php 
                                    $consultx_latest_blog_posts = new WP_Query( array( 'posts_per_page' => 6 ) );
                                    if ( $consultx_latest_blog_posts->have_posts() ) : 
                                        while ( $consultx_latest_blog_posts->have_posts() ) : $consultx_latest_blog_posts->the_post(); 
                                ?>
                                <!-- item -->
                                <div class="item">
                                    <div class="news">
                                        <div class="row">
                                            <?php if(has_post_thumbnail()){ ?>
                                                <div class="col-xs-5">
                                                    <div class="featured-pic">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <?php if(!has_post_thumbnail()): ?>
                                            <div class="col-xs-7 blog-img">
                                            <?php else: ?>
                                            <div class="col-xs-7">
                                            <?php endif; ?>
                                                <div class="news-detail">
                                                    <h4>
                                                        <a title="<?php echo esc_attr__('News Title','consultx'); ?>" href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>                            
                                                    </h4>
                                                    <p><?php echo esc_html(wp_trim_words( get_the_content(), 20, '.' )); ?></p>
                                                    <ul class="clearfix">
                                                        <li>
                                                            <i class="fa fa-calendar"></i>
                                                            <span><?php echo get_the_date();?></span>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo esc_url(the_permalink()); ?>">
                                                                <?php echo esc_html__( 'Read More', 'consultx' ); ?>
                                                                <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item ends  -->
                                <?php 
                                    endwhile; 
                                    endif; 
                                ?>      
                            </div>
                        </section>
                    </div>
					<?php if( get_theme_mod('consultx_show_client_section') != ''){ ?>
						<div class="col-md-6">
							<section class="partner-section section-padding">
								<?php
									if( !empty(get_theme_mod('consultx_client_tittletext')) ){ ?>
									   <h2 class="primary-title"><?php echo esc_html(get_theme_mod('consultx_client_tittletext')); ?></h2>
								<?php } ?>    
								<ul class="clearfix">
									<?php
									for($n=1; $n<=6; $n++) {    
										if( get_theme_mod('consultx_client_pagebx'.$n,false)) {      
											$consultx_queryvar = new WP_Query('page_id='.absint(get_theme_mod('consultx_client_pagebx'.$n,true)) );  
									   while( $consultx_queryvar->have_posts() ) : $consultx_queryvar->the_post();
									?>
									<?php if(has_post_thumbnail()){ ?>
									<li>
										<?php the_post_thumbnail(); ?>
									</li>
									 <?php }
									else
									{ ?>
										<li>
											<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/client.jpg" alt="<?php echo esc_attr__("Portfolio Image",'consultx')?>">
										</li>
									<?php
									}			

									 endwhile;
										  wp_reset_postdata(); } }
									?>     
								</ul>
							</section>
						</div>
					<?php } ?>	
                </div>
            </div>
        </div>
	</div>	
<?php } } else {

require get_template_directory() . '/index.php';
}

    ?>

<?php get_footer();