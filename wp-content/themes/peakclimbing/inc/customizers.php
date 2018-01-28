<?php
// 
add_action( 'init', function () {
	Kirki::add_config( 'theme_config_id', array(
	    'capability'    => 'edit_theme_options',
	    'option_type'   => 'theme_mod',
	) );

	Kirki::add_panel( 'ads_section', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Home Page Setting', 'serene_treaking' ),
	    'description' => esc_attr__( 'serene_treaking panel for advertisements.', 'serene_treaking' ),
	) );
     


	// front page ad setting 
	foreach ( range( 1, 2 ) as $index ) {
		$section_id = 'section_id_' . $index;

		switch ($index) {
			case '1':
				$title = 'Most Trending';
				break;
			case '2':
				$title = 'Feature Trips';
				break;

			default:
				$title = 'Add me';
				break;
		}

		Kirki::add_section( $section_id, array(
			'title'       => esc_attr__( 'Home Section ', 'serene_treaking' ) . ' #' . $title,
			'description' => esc_attr__( 'Ad section description.', 'serene_treaking' ),
			'panel'       => 'ads_section',
			'priority'    => 160,
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'text',
			'settings' => 'title_setting' . $index,
			'label'    => __( 'Title', 'serene_treaking' ),
			'section'  => $section_id,
			'default'  => esc_attr__( ' ', 'serene_treaking' ),
			'priority' => 10,
		) );

		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'textarea',
			'settings' => 'shortdesc_setting' . $index,
			'label'    => __( 'Write Short description', 'serene_treaking' ),
			'section'  => $section_id,
			'default'  => esc_attr__( ' ', 'serene_treaking' ),
			'priority' => 10,
		) );
        
	    Kirki::add_field( 'theme_config_id', array(
			'type'        => 'radio',
			'settings'    => 'my_setting_cho_' . $index,
			'label'       => __( 'Ad type', 'textdomain' ),
			'description' => esc_attr__( 'Select the ad type for the current ad section.', 'serene_treaking' ),
			'section'     => $section_id,
			'default'     => 'category',
			'priority'    => 10,
			'choices'     => array(
				'product'   => esc_attr__( 'Product', 'serene_treaking' ),
				'category' 	=> esc_attr__( 'Category', 'serene_treaking' ),
			),
		) );

	    //get production Section
		Kirki::add_field( 'theme_config_id', array(
			'type'     => 'select',
			'settings' => 'my_setting_product_' . $index,
			'label'    => esc_attr__( 'Select Product', 'serene_treaking' ),
			'section'  => $section_id,
			'default'  => '70',
			'priority' => 10,
			'multiple' => 999,
			'choices'  => Kirki_Helper::get_posts( array(
				'posts_per_page' => 10,
				'post_type'      => 'product'
			) ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'product',
		        ),
		    ),
		) );
	    
	    //category section
		Kirki::add_field( 'theme_config_id', array(
			'type'        => 'select',
			'settings'    => 'my_setting_category_' . $index,
			'label'       => esc_attr__( 'Select Category', 'serene_treaking' ),
			'section'     => $section_id,
			'default'     => '18',
			'priority'    => 10,
			'multiple'    => 999,
			'choices'     => Kirki_Helper::get_terms( array( 'taxonomy'=> 'product_cat', 'hide_empty'=> false) ),
			'active_callback' => array(
		        array(
		            'setting'  => 'my_setting_cho_' . $index,
		            'operator' => '==',
		            'value'    => 'category',
		        ),
		    ),
		) );
	}
   // close for loop

    Kirki::add_section( 'socail_section_id', array(
		'title'       => esc_attr__( 'Social Section ', 'serene_treaking' ),
		'description' => esc_attr__( 'Add your Site socail links.', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );
   
    foreach ( range(1, 7) as $socail_indes ){
    	$scl_section_id = 'socail_section_id_' . $socail_indes;

    	switch ( $socail_indes ) {
    		case '1':
    			$label = 'Facebook';
    			break;
    		case '2':
    			$label = 'Twitter';
    			break;
    		case '3':
    			$label = 'Google Plus';
    			break;
    		case '4':
    			$label = 'Skype';
    			break;
    		case '5':
    			$label = 'YouTube';
    			break;
    		case '6':
    			$label = 'Link In';
    			break;
    		case '7':
    			$label = 'Instragram';
    			break;							
    		default:
    			$label = ' Add Label';
    			break;
    	}

    	Kirki::add_field( 'theme_config_id', array(
			'type'     => 'url',
			'settings' => 'socail_section_' .$socail_indes,
			'label'    => __( $label, 'serene_treaking' ),
			'section'  => 'socail_section_id',
			'default'  => esc_attr__( ' ', 'serene_treaking' ),
			'priority' => 10,
		) );
    }
    
    //Componey Information Section
    Kirki::add_section( 'componey_section_id', array(
		'title'       => esc_attr__( 'Componey Info ', 'serene_treaking' ),
		'description' => esc_attr__( 'Componey Information .', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );
   
    foreach ( range(1, 7) as $componey_indes ){
    	$cmp_section_id = 'componey_section_id_' . $componey_indes;

    	switch ( $componey_indes ) {
    		case '1':
    			$label = 'Phone No';
    			break;
    		case '2':
    			$label = 'Mobile No';
    			break;
    		case '3':
    			$label = 'Componey Email';
    			break;
    		case '4':
    			$label = 'Personal Email';
    			break;
    		case '5':
    			$label = 'P.O.BOX No';
    			break;
    		case '6':
    			$label = 'Address';
    			break;
    		case '7':
    			$label = 'Google Map URL';
    			break;							
    		default:
    			$label = ' Add Label';
    			break;
    	}

    	if( $componey_indes === 7 ){
    		$type = 'textarea';
    	}else{
    		$type = 'text';
    	}

    	Kirki::add_field( 'theme_config_id', array(
			'type'     => $type,
			'settings' => 'componey_section_' .$componey_indes,
			'label'    => __( $label, 'serene_treaking' ),
			'section'  => 'componey_section_id',
			'default'  => esc_attr__( ' ', 'serene_treaking' ),
			'priority' => 10,
		) );
    } 

    //close Componey information section

	//slider Section

     Kirki::add_section( 'homepage_slider_section_id', array(
		'title'       => esc_attr__( 'Home Page Slider ', 'serene_treaking' ),
		'description' => esc_attr__( 'Choose Which Images and text you want to display in Slider in home page and other page .', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );
     
    Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio',
		'settings'    => 'homepage_slider_choice',
		'label'       => __( 'Ad type', 'textdomain' ),
		'description' => esc_attr__( 'Select the ad type for the current ad section.', 'serene_treaking' ),
		'section'     => 'homepage_slider_section_id',
		'default'     => 'image',
		'priority'    => 10,
		'choices'     => array(
			'image'   => esc_attr__( 'image', 'serene_treaking' ),
			'video'   => esc_attr__( 'video', 'serene_treaking' ),
		),
	) ); 


    Kirki::add_field( 'theme_config_id', array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Home Page Slider', 'serene_treaking' ),
		'section'     => 'homepage_slider_section_id',
		'priority'    => 10,
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_attr__('your custom value', 'serene_treaking' ),
			'field' => 'link_text',
		),
		'active_callback' => array(
		        array(
		            'setting'  => 'homepage_slider_choice',
		            'operator' => '==',
		            'value'    => 'image',
		        ),
		    ),
		'settings'    => 'homepage_slider_settings_id',
		
		'fields' => array(
			'link_text' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Slider Text', 'textdomain' ),
				'description' => esc_attr__( 'Write your text for slider', 'serene_treaking' ),
				'default'     => '',
			),

			'title_textdee' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Place Name', 'textdomain' ),
				'description' => esc_attr__( 'Write Tour Location', 'serene_treaking' ),
				'default'     => '',
			),

			'link_desc' => array(
				'type'        => 'textarea',
				'label'       => esc_attr__( 'Short Text Slug', 'serene_treaking' ),
				'description' => esc_attr__( 'Give short description', 'serene_treaking' ),
				'default'     => '',
			),

			'link_url' => array(
				'type'        => 'url',
				'label'       => esc_attr__( 'Slider URL', 'serene_treaking' ),
				'description' => esc_attr__( 'Enter Slider Image URL', 'serene_treaking' ),
				'default'     => '',
			),

			'link_image_dipak' => array(
				'type'        => 'image',
				'label'       => esc_attr__( 'Images', 'serene_treaking' ),
				'description' => esc_attr__( 'Select Image', 'serene_treaking' ),
				'default'     => '',
			),

		)
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'embed',
		'settings' => 'home_page_slider_video',
		'label'    => __( 'Video URL', 'serene_treaking' ),
		'section'  => 'homepage_slider_section_id',
		'default'  => esc_attr__( ' ', 'serene_treaking' ),
		'priority' => 10,
		'active_callback' => array(
		        array(
		            'setting'  => 'homepage_slider_choice',
		            'operator' => '==',
		            'value'    => 'video',
		        ),
		    ),
	) );


    //clsoe slider section

	//why us Section

    Kirki::add_section( 'homepage_whywith_us_section_id', array(
		'title'       => esc_attr__( 'Why With Us Section ', 'serene_treaking' ),
		'description' => esc_attr__( 'Choose Which Icon and text you want to display in Slider in home page and other page .', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );

	Kirki::add_field('theme_config_id',
		array(
			'type'        => 'editor',
			'settings'    => 'welcome_content',
			'label'       => esc_attr__( 'First Editor Control', 'kirki' ),
			'description' => esc_attr__( 'This is an editor control.', 'kirki' ),
			'section'     => 'homepage_whywith_us_section_id',
			'default'     => '',
		)
	);

    Kirki::add_field( 'theme_config_id', array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Why with us', 'serene_treaking' ),
		'section'     => 'homepage_whywith_us_section_id',
		'priority'    => 10,
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_attr__('your custom value', 'serene_treaking' ),
			'field' => 'link_text',
		),
		'settings'    => 'whywith_us_settings_id',
		'fields' => array(
			'why_text' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Title', 'textdomain' ),
				'description' => esc_attr__( 'Write a title', 'serene_treaking' ),
				'default'     => '',
			),

			'why_title' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Font awersome Icon', 'textdomain' ),
				'description' => esc_attr__( 'Write a  font awersome', 'serene_treaking' ),
				'default'     => 'fa fa-users',
			),
			
		)
	) );
    //clsoe Why with Us   


    //front page travel blog page
    Kirki::add_section( 'homepage_reviews_section_id', array(
		'title'       => esc_attr__( 'Select  Reviews  ', 'serene_treaking' ),
		'description' => esc_attr__( 'Choose Reviews which you want to share with your clints or friends.', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );

	Kirki::add_field( 'my_config', array(
		'type'     => 'select',
		'settings' => 'homepage_reviews_setting',
		'label'    => esc_attr__( 'Select Reviews', 'serene_treaking' ),
		'section'  => 'homepage_reviews_section_id',
		'default'  => '',
		'priority' => 10,
		'multiple' => 999,
		'choices'  => Kirki_Helper::get_posts( array(
			'posts_per_page' => 10,
			'post_type'      => 'post'
		) ),
	));
    //end reviews

    //associated with 
    Kirki::add_section( 'homepage_associated_with_section_id', array(
		'title'       => esc_attr__( 'Associated With Section', 'serene_treaking' ),
		'description' => esc_attr__( 'Choose Which Icon and text you want to display in Slider in home page and other page .', 'serene_treaking' ),
		'panel'       => 'ads_section',
		'priority'    => 160,
	) );

    Kirki::add_field( 'theme_config_id', array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Associated With', 'serene_treaking' ),
		'section'     => 'homepage_associated_with_section_id',
		'priority'    => 10,
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_attr__('your Associated', 'serene_treaking' ),
			'field' => 'link_text',
		),
		'settings'    => 'associated_us_settings_id',
		'fields' => array(
			'assed_image' => array(
				'type'        => 'image',
				'label'       => esc_attr__( 'Select your image', 'serene_treaking' ),
				'description' => esc_attr__( ' ', 'serene_treaking' ),
				'default'     => '',
			),

			'assed_url' => array(
				'type'        => 'url',
				'label'       => esc_attr__( 'Image URL', 'serene_treaking' ),
				'description' => esc_attr__( 'Enter image URL', 'serene_treaking' ),
				'default'     => '',
			),

		)
	) );
	//close associated with 
    

		


} );


