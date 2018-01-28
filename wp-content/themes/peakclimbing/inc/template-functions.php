<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package peakclimbing
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function peakclimbing_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'peakclimbing_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function peakclimbing_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'peakclimbing_pingback_header' );

//custom code

function peakclimbing_logo(){
    if ( function_exists( 'the_custom_logo' ) ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>
		<a href="<?php echo  home_url( '/' ) ?>">
			<img src="<?php echo $image[0]; ?>"  alt="peakclimbing-logo" class="img-responsive logo animated bounceIn"></a>
    	<?php 
	}
}

function responsive_logo(){
    if ( function_exists( 'the_custom_logo' ) ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>
		<a class="navbar-brand d-lg-none" href="<?php home_url('/') ?>">
			<img src="<?php echo $image[0]; ?>"  alt="peakclimbing-logo" class="img-responsive logo">
	    </a>
    	<?php
    }
}


/**
 * @return bool
 */
function peakclimbing_has_logo() {
    if ( function_exists( 'has_custom_logo' ) ) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}

function get_is_empty_image(){ ?> 
	<img src="<?php echo get_template_directory_uri() .'/assets/images/image-soon.png' ?>" alt="image-soon">
<?php }


function imgr( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	global $wpdb;
	if( $attach_id) {
		$img_url = get_attached_file( $attach_id );
	}elseif($image_url){
		$id = $wpdb->get_var($query);
		$img_url = get_attached_file( $id);
	}else{
		$img_url = false;
	}
	if(file_exists($img_url)) {
		$old_img_info = pathinfo( $img_url );
		$old_img_ext = '.'. $old_img_info['extension'];
		$old_img_path = $old_img_info['dirname'] .'/'. $old_img_info['filename'];
		$new_img_dir = str_replace(ABSPATH, '/', $old_img_info['dirname']);
		$new_img_path = $old_img_path .'-'. $width .'x'. $height . $old_img_ext;
		$new_img = wp_get_image_editor( $img_url );
		$new_img->resize( $width, $height, $crop );
		$new_img = $new_img->save( $new_img_path );
		$real_img = array (
			'url' => site_url().'/'.$new_img_dir .'/'. $new_img['file'],
			'width' => $new_img['width'],
			'height' => $new_img['height']
		);
		return $real_img;
	}else{
		return $real_img = false;
	}
}



function get_alt_text( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	$data =  array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'title' => $attachment->post_title
	);

	if ($data['alt']):
		$alt = $data['alt'];
	elseif($data['caption']):
		$alt = $data['caption'];
	elseif($data['title']):
		$alt = $data['description'];
	elseif($data['description']):
		$alt = $data['title'];
	else:
		$alt = '';
	endif;
	return $alt;
}

//Detail Itineary Group Repatable filds 
if( class_exists( 'CMB2_Bootstrap_230', false ) ){
	add_action( 'cmb2_admin_init', 'peakclimbing_detail_itineary_group' );

	function peakclimbing_detail_itineary_group() {
		$prefix = 'dtl_itinery_';

		$cmb_group = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Detail Itineary', 'cmb2' ),
			'object_types' => array( 'product' ),
		) );

		// $group_field_id is the field id string, so in this case: $prefix . 'demo'
		$group_field_id = $cmb_group->add_field( array(
			'id'          => $prefix . 'peakclimbing',
			'type'        => 'group',
			'priority'   => 'low',
			'options'     => array(
				'group_title'   => esc_html__( 'Itineary {#}', 'cmb2' ), 
				'add_button'    => esc_html__( 'Add Detail Itineary', 'cmb2' ),
				'remove_button' => esc_html__( 'Remove Detail Itineary', 'cmb2' ),
				'sortable'     	 => false, // beta
				'closed'    	 => true, 
			),
		) );

		/**
		 * Group fields works the same, except ids only need
		 * to be unique to the group. Prefix is not needed.
		 *
		 * The parent field's id needs to be passed as the first argument.
		 */
		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Itineary Day', 'cmb2' ),
			'id'         => 'itl_day',
			'type'       => 'text_small',
		) );

		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Rest Time', 'cmb2' ),
			'id'         => 'itl_time',
			'type'       => 'text_small',
		) );

		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Itineary Title', 'cmb2' ),
			'id'         => 'itl_title',
			'type'       => 'text',
		) );

		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Stay Places', 'cmb2' ),
			'id'         => 'itl_stay',
			'type'       => 'text',
		) );

		$cmb_group->add_group_field($group_field_id, array(
			'name'    => esc_html__( 'Description', 'cmb2' ),
			'desc'    => esc_html__( 'Trip detail itineary description', 'cmb2' ),
			'id'      => $prefix . 'desc',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 5,
			),
		) );

	}

	//close Detail Itineary group fields 


	add_action( 'cmb2_admin_init', 'peakclimbing_good_to_know_info_section' );

	function peakclimbing_good_to_know_info_section() {
		$prefix = 'travel_info_';

		$cmb_group = new_cmb2_box( array(
			'id'          	=> $prefix . 'metabox_new',
			'title'        	=> esc_html__( 'Travel Info', 'cmb2' ),
			'object_types' 	=> array( 'product' ),
			//'context'    	=> 'advance',
		) );

		// $group_field_id is the field id string, so in this case: $prefix . 'demo'
		$group_field_id = $cmb_group->add_field( array(
			'id'          => $prefix . 'peakclimbing',
			'type'        => 'group',
			'priority'   => 'normal',
			'options'     => array(
				'group_title'   => esc_html__( 'Travel Info {#}', 'cmb2' ), 
				'add_button'    => esc_html__( 'Add another info', 'cmb2' ),
				'remove_button' => esc_html__( 'Remove Info', 'cmb2' ),
				'sortable'      => false, // beta
				'closed'     => true, 
			),
		) );
		//group section
		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Title', 'cmb2' ),
			'id'         => $prefix.'title',
			'type'       => 'text',
		) );

		$cmb_group->add_group_field($group_field_id, array(
			'name'    => esc_html__( 'Description', 'cmb2' ),
			'desc'    => esc_html__( 'Trip detail itineary description', 'cmb2' ),
			'id'      => $prefix . 'desc',
			'type'    => 'wysiwyg',
			'options' => array(
				'textarea_rows' => 5,
			),
		) );

	}

	add_action( 'cmb2_admin_init', 'peakclimbing_travel_info' );

	function peakclimbing_travel_info() {
		$prefix = 'peak_detail_';

		$cmb_group = new_cmb2_box( array(
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Peak Details', 'cmb2' ),
			'context'    => 'side',
			'priority'   => 'low',
			'object_types' => array( 'product' ),
		) );

		$cmb_group->add_field( array(
			'name'    => 'Elevation',
			'desc'    => '',
			'default' => '',
			'id'      => $prefix.'elevation',
			'type'    => 'text',
		) );

		$cmb_group->add_field( array(
			'name'    => 'Difficulty',
			'desc'    => 'which type of peak( Adventurous, modest, easy, difficulty). ',
			'default' => 'Adventures',
			'id'      => $prefix.'difficulty',
			'type'    => 'text',
		) );

		$cmb_group->add_field( array(
			'name'    => 'Accommodation',
			'desc'    => 'free accommodation during tour/peakclimbing.',
			'default' => 'tea/coffee',
			'id'      => $prefix.'accommodation',
			'type'    => 'text',
		) );

		$cmb_group->add_field( array(
			'name'    => 'Minimum Participants',
			'desc'    => 'no of Participants ',
			'default' => '1',
			'id'      => $prefix.'participants',
			'type'    => 'text',
		) );

		$cmb_group->add_field( array(
			'name'    => 'Transportation',
			'desc'    => 'which type of vehicle you provide?',
			'default' => 'pravite/bus',
			'id'      => $prefix.'transportation',
			'type'    => 'text',
		) );

		$cmb_group->add_field( array(
			'name'    => 'Meals',
			'desc'    => 'which type of Meals you provide?',
			'default' => 'pravite/bus',
			'id'      => $prefix.'meals',
			'type'    => 'text',
		) );

		// $group_field_id is the field id string, so in this case: $prefix . 'demo'
		$group_field_id = $cmb_group->add_field( array(
			'id'          => $prefix . 'peakclimbing',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => esc_html__( 'Peak Detail {#}', 'cmb2' ), 
				'add_button'    => esc_html__( 'Add More Peak Detail', 'cmb2' ),
				'remove_button' => esc_html__( 'Remove Peak Detail', 'cmb2' ),
				'sortable'      => false, // beta
				'closed'     => true, 
			),
		) );
		//group section
		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Title', 'cmb2' ),
			'id'         => 'title',
			'type'       => 'text',
		) );

		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Icon', 'cmb2' ),
			'id'         => 'icon',
			'type'       => 'text',
		) );

		$cmb_group->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Information', 'cmb2' ),
			'id'         => $prefix.'informatin',
			'type'       => 'text',
		) );
	}

    //price included 
	add_action( 'cmb2_admin_init', 'peakclimbing_price_encluded' );

	function peakclimbing_price_encluded(){
		$prefix = 'price_';

		$cmb_included = new_cmb2_box( array(
			'id'           => $prefix . 'included',
			'title'        => esc_html__( 'Price Included', 'cmb2' ),
			'object_types' => array( 'product' ),
		) );

		$cmb_included->add_field(array(
			'name' 	=> 'Price Included',
			'desc' 	=> 'what services you provided within price included',
			'id' 	=> $prefix . '_inc_desc',
			'type' 	=> 'wysiwyg',
			'options' => array(
				'textarea_rows' => 5,
			),	
		));
		
	}
    
    //price not included
	add_action( 'cmb2_admin_init', 'peakclimbing_price_not_encluded' );

	function peakclimbing_price_not_encluded(){
		$prefix = 'price_';

		$cmb_included = new_cmb2_box( array(
			'id'           => $prefix . '_not_included',
			'title'        => esc_html__( 'Price not Included', 'cmb2' ),
			'object_types' => array( 'product' ),
		) );

		$cmb_included->add_field(array(
			'name' 	=> 'Price Exclude',
			'desc' 	=> 'what services you provided within price included',
			'id' 	=> $prefix . '_not_desc',
			'type' 	=> 'wysiwyg',
			'options' => array(
				'textarea_rows' => 5,
			),	
		));
	}


	//functioin for creatin extra fields in category section 
	add_action( 'cmb2_admin_init', 'meta_fields_in_category_section' );
	function meta_fields_in_category_section(){
		$prefix = 'climbing_';
		$cmb_term = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'Category Metabox', 'cmb2' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'product_cat' ),
		'new_term_section' => true,
	) );
	$cmb_term->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'cmb2' ),
		'desc'     => esc_html__( 'your slogun', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'text',
		'on_front' => false,
	) );
	}

}

