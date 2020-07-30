<?php    
/**
 *Social Care Lite Theme Customizer
 *
 * @package Social Care Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function consultx_customize_register( $wp_customize ) {	
	
	function consultx_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function consultx_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'consultx_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Theme Homepage Sections', 'consultx' ),		
	) );
	
	$wp_customize->add_setting('consultx_color_scheme',array(
		'default' => esc_html__('#b015c8','consultx'),
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'consultx_color_scheme',array(
			'label' => esc_html__('Color Scheme','consultx'),			
			'description' => esc_html__('More color options in PRO Version','consultx'),
			'section' => 'colors',
			'settings' => 'consultx_color_scheme'
		))
	);	
	
	 
	//Header Contact info
	$wp_customize->add_section('consultx_hdr_contact_section',array(
		'title' => esc_html__('Header Contact info','consultx'),				
		'priority' => null,
		'panel' => 	'consultx_panel_area',
	));	
		
	$wp_customize->add_setting('consultx_header_contactno',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_header_contactno',array(	
		'type' => 'text',
		'label' => esc_html__('Add phone number here','consultx'),
		'section' => 'consultx_hdr_contact_section',
		'setting' => 'consultx_header_contactno'
	));	

	$wp_customize->add_setting('consultx_header_email',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_email'	
	));
	
	$wp_customize->add_control('consultx_header_email',array(	
		'type' => 'text',
		'label' => esc_html__('Add E-mail here(Use Correct Email Format)','consultx'),
		'section' => 'consultx_hdr_contact_section',
		'setting' => 'consultx_header_email'
	));	

	$wp_customize->add_setting('consultx_header_officehrs',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_header_officehrs',array(	
		'type' => 'text',
		'label' => esc_html__('Add Office Hrs here','consultx'),
		'section' => 'consultx_hdr_contact_section',
		'setting' => 'consultx_header_officehrs'
	));	
	
	
	$wp_customize->add_setting('consultx_quote_button',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_quote_button',array(	
		'type' => 'text',
		'label' => esc_html__('Add button name','consultx'),
		'section' => 'consultx_hdr_contact_section',
		'setting' => 'consultx_donatenow_button'
	)); // donate now Button Text
	
	$wp_customize->add_setting('consultx_quote_button_url',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('consultx_quote_button_url',array(
		'label' => esc_html__('Add Button link here','consultx'),
		'section' => 'consultx_hdr_contact_section',
		'setting' => 'consultx_quote_button_url'
	));	
	
	$wp_customize->add_setting('consultx_show_header_contact_info',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_header_contact_info', array(
	   'settings' => 'consultx_show_header_contact_info',
	   'section'   => 'consultx_hdr_contact_section',
	   'label'     => esc_html__('Check To show This Section','consultx'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
	 
	 $wp_customize->add_setting('consultx_show_header_contact_info_footer',array(
		'default' => esc_html__('false','consultx'),
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_header_contact_info_footer', array(
	   'settings' => 'consultx_show_header_contact_info_footer',
	   'section'   => 'consultx_hdr_contact_section',
	   'label'     => esc_html__('Check To show This Section in footer','consultx'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
			
	 
	// Slider Section		
	$wp_customize->add_section( 'consultx_slide_panelarea', array(
		'title' => esc_html__('Slider Section', 'consultx'),
		'priority' => null,
		'description' => esc_html__('Default image size(1400 x 633 pixel) also please select 3 different slide page for slider do not select same page for slider.','consultx'), 
		'panel' => 	'consultx_panel_area',           			
    ));
	
	$wp_customize->add_setting('consultx_slidepgebx1',array(
		'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('consultx_slidepgebx1',array(
		'type' => 'dropdown-pages',
		'label' => esc_html__('Select page for slide one:','consultx'),
		'section' => 'consultx_slide_panelarea'
	));	
	
	$wp_customize->add_setting('consultx_slidepgebx2',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('consultx_slidepgebx2',array(
		'type' => 'dropdown-pages',
		'label' => esc_html__('Select page for slide two:','consultx'),
		'section' => 'consultx_slide_panelarea'
	));	
	
	$wp_customize->add_setting('consultx_slidepgebx3',array(
		'default' => 0,				
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('consultx_slidepgebx3',array(
		'type' => 'dropdown-pages',
		'label' => esc_html__('Select page for slide three:','consultx'),
		'section' => 'consultx_slide_panelarea'
	));	// Slider Section	
	
	$wp_customize->add_setting('consultx_slidereadmore_btn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_slidereadmore_btn',array(	
		'type' => 'text',
		'label' => esc_html__('Add slider Read more button name here','consultx'),
		'section' => 'consultx_slide_panelarea',
		'setting' => 'consultx_slidereadmore_btn'
	)); // Slider Read More Button Text

		$wp_customize->add_setting('consultx_slidereadmore_button_url',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('consultx_slidereadmore_button_url',array(
		'label' => esc_html__('Add Slider Button link here','consultx'),
		'section' => 'consultx_slide_panelarea',
		'setting' => 'consultx_slidereadmore_button_url'
	));	 
	
	$wp_customize->add_setting('consultx_showslide_area',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'consultx_showslide_area', array(
	   'settings' => 'consultx_showslide_area',
	   'section'   => 'consultx_slide_panelarea',
	   'label'     => esc_html__('Check To show Slider Section','consultx'),
	   'type'      => 'checkbox'
	   ));//Show Slider Section	

	 
	 
	 // Four column Our Service section
	$wp_customize->add_section('consultx_service_section', array(
		'title' => esc_html__('Our Service Section','consultx'),
		'description' => esc_html__('Select pages from the dropdown for our service section','consultx'),
		'priority' => null,
		'panel' => 	'consultx_panel_area',          
	));	
	
	$wp_customize->add_setting('consultx_service_tittletext',array(
		'default' => null,	
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_service_tittletext',array(	
		'type' => 'text',
		'label' => esc_html__('Add services title here','consultx'),
		'section' => 'consultx_service_section',
		'setting' => 'consultx_service_tittletext'
	)); 
	
	$wp_customize->add_setting('consultx_servicepage1',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_servicepage1',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_service_section',
	));		
	
	$wp_customize->add_setting('consultx_servicepage2',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_servicepage2',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_service_section',
	));
	
	$wp_customize->add_setting('consultx_servicepage3',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_servicepage3',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_service_section',
	));
	
	$wp_customize->add_setting('consultx_servicepage4',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_servicepage4',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_service_section',
	));
	
	
	$wp_customize->add_setting('consultx_show_service_section',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_service_section', array(
	   'settings' => 'consultx_show_service_section',
	   'section'   => 'consultx_service_section',
	   'label'     => esc_html__('Check To Show This Section','consultx'),
	   'type'      => 'checkbox'
	 ));//Show services section	 

	// About UsSection 
	$wp_customize->add_section('consultx_aboutus_section', array(
		'title' => esc_html__('About Us Section','consultx'),
		'description' => esc_html__('Select Pages from the dropdown for about us section','consultx'),
		'priority' => null,
		'panel' => 	'consultx_panel_area',          
	));		
	
	$wp_customize->add_setting('consultx_aboutus_pagebox',array(
		'default' =>0,		
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_aboutus_pagebox',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_aboutus_section',
	));		
	
	$wp_customize->add_setting('consultx_show_aboutus_pagebox',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_aboutus_pagebox', array(
	    'settings' => 'consultx_show_aboutus_pagebox',
	    'section'   => 'consultx_aboutus_section',
	    'label'     => esc_html__('Check To Show This Section','consultx'),
	    'type'      => 'checkbox'
	));//Show about Section 	 
	 
	
	// Current Projects section
	$wp_customize->add_section('consultx_current_project_section', array(
		'title' => esc_html__('Current Projects Section','consultx'),
		'description' => esc_html__('Select pages from the dropdown for current project section Note - Please upload the featured image on page which you select otherwise it shows dummy image','consultx'),
		'priority' => null,
		'panel' => 	'consultx_panel_area',          
	));	
	
	$wp_customize->add_setting('consultx_project_tittletext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_project_tittletext',array(	
		'type' => 'text',
		'label' => esc_html__('Add Project title here','consultx'),
		'section' => 'consultx_current_project_section',
		'setting' => 'consultx_project_tittletext'
	)); 
	
	$wp_customize->add_setting('consultx_current_project_pagebx1',array(
		'default' => 0,		
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));		
	
	$wp_customize->add_setting('consultx_current_project_pagebx2',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));

	$wp_customize->add_setting('consultx_current_project_pagebx3',array(
		'default' => 0,		
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));

	$wp_customize->add_setting('consultx_current_project_pagebx4',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx4',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));

	$wp_customize->add_setting('consultx_current_project_pagebx5',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx5',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));

	$wp_customize->add_setting('consultx_current_project_pagebx6',array(
		'default' => 0,	
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_current_project_pagebx6',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_current_project_section',
	));
	
	
	$wp_customize->add_setting('consultx_show_current_project_section',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_current_project_section', array(
	   'settings' => 'consultx_show_current_project_section',
	   'section'   => 'consultx_current_project_section',
	   'label'     => esc_html__('Check To Show This Section','consultx'),
	   'type'      => 'checkbox'
	 ));//Show current project section 
	 
	
	// Current Client section
	$wp_customize->add_section('consultx_client_section', array(
		'title' => esc_html__('Our Partner Section','consultx'),
		'description' => esc_html__('Select pages from the dropdown for current Client section Note - Please upload the featured image on page which you select otherwise it shows dummy image','consultx'),
		'priority' => null,
		'panel' => 	'consultx_panel_area',          
	));	
	
	$wp_customize->add_setting('consultx_client_tittletextu',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_client_tittletext',array(	
		'type' => 'text',
		'label' => esc_html__('Add Client title here','consultx'),
		'section' => 'consultx_client_section',
		'setting' => 'consultx_client_tittletext'
	)); 
	
	$wp_customize->add_setting('consultx_client_pagebx1',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));		
	
	$wp_customize->add_setting('consultx_client_pagebx2',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));

	$wp_customize->add_setting('consultx_client_pagebx3',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));

	$wp_customize->add_setting('consultx_client_pagebx4',array(
		'default' => 0,			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx4',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));

	$wp_customize->add_setting('consultx_client_pagebx5',array(
		'default' => 0,		
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx5',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));

	$wp_customize->add_setting('consultx_client_pagebx6',array(
		'default' => 0,		
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'consultx_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'consultx_client_pagebx6',array(
		'type' => 'dropdown-pages',			
		'section' => 'consultx_client_section',
	));
	
	
	$wp_customize->add_setting('consultx_show_client_section',array(
		'default' => false,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_client_section', array(
	   'settings' => 'consultx_show_client_section',
	   'section'   => 'consultx_client_section',
	   'label'     => esc_html__('Check To Show This Section','consultx'),
	   'type'      => 'checkbox'
	 ));//Show Client section 

	
	 // About UsSection 
	$wp_customize->add_section('consultx_blog_section', array(
		'title' => esc_html__('Blog Section','consultx'),
		'description' => esc_html__('Select Pages from the dropdown for blog section','consultx'),
		'priority' => null,
		'panel' => 	'consultx_panel_area',          
	));		

	$wp_customize->add_setting('consultx_blog_tittletext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('consultx_blog_tittletext',array(	
		'type' => 'text',
		'label' => esc_html__('Add Blog title here','consultx'),
		'section' => 'consultx_blog_section',
		'setting' => 'consultx_blog_tittletext'
	)); 
	
	$wp_customize->add_setting('consultx_show_blog_section',array(
		'default' => true,
		'sanitize_callback' => 'consultx_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'consultx_show_blog_section', array(
	    'settings' => 'consultx_show_blog_section',
	    'section'   => 'consultx_blog_section',
	    'label'     => esc_html__('Check To Show This Section','consultx'),
	    'type'      => 'checkbox'
	));//Show about Section 
		 
}
add_action( 'customize_register', 'consultx_customize_register' );

function consultx_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blogpost_lyout h2 a:hover,
        #sidebar ul li a:hover,								
        .blogpost_lyout h3 a:hover,
		.aboutus_contentcol h3 span,					
        .recent-post h6:hover,
		.header-socialicons a:hover,       						
        .postmeta a:hover,		
        .button:hover,
		.infobox i,			
		.features_column:hover h3 a,		
		.fivecol_missionbx:hover h3 a,		           
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a,
		.blog-detail-area .meta li a:hover,
		.co-blog-sidebar ul li a:hover,
		.header-strip i,
		.info-box:hover a,
		.news-detail h4 a:hover,
		.news ul a:hover,
		.sec-title,
		.comment-section .reply,
		.logo-footer,
		.footer-main a:hover, .main-navigation,
		.contact-bar i,
		.comment-body .reply a
            { color:<?php echo esc_html( get_theme_mod('consultx_color_scheme','#b015c8')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,				
        .learnmore,
		.news-title,
		.header-navigation,		
		.donatenow,
		h3.widget-title,
		.features_column:hover .imagebox,
		.nivo-caption .slide_more, 		
		.fivecol_missionbx .pagereadmore,												
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .toggle a,
        	.tagcloud a:hover,
        	.copyright, .project .overlay a.link:before, .slick-dots li :before,
        	.header-strip .btn-quote:hover,
        	.slide-text a.btn-custom,
        	.slider-main .owl-dots .owl-dot.active,
        	.project .overlay a i,
        	.project .overlay a.popup-box:before, .main-navigation .sub-menu li a:hover,
        	.slick-dots li button,
        	#wp-calendar tbody td#today,
        	.footer .btn-holder:hover,
        	.search-form input[type="submit"]	
            { background-color:<?php echo esc_html( get_theme_mod('consultx_color_scheme','#b015c8')); ?> !important;}
			



		.nivo-caption .slide_more:hover,
		.infobox i,	
		.tagcloud a:hover,
		.mainhdrnav ul li ul li,
		.info-box:hover,
		.search-form input[type="submit"],
		#wp-calendar,	
		.features_column .imagebox,
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('consultx_color_scheme','#b015c8')); ?>;}	
			
	   .mainhdrnav ul li a:hover, 
	   .mainhdrnav ul li.current-menu-item a,
	   .mainhdrnav ul li.current-menu-parent a.parent,
	   .mainhdrnav ul li.current-menu-item ul.sub-menu li a:hover	, 
	   .mainhdrnav ul li ul        
            { background-color:<?php echo esc_html( get_theme_mod('consultx_hover_color_scheme','#8f2817')); ?>;}		
					
			
         	
    </style> 
<?php                   
}
         
add_action('wp_head','consultx_custom_css');