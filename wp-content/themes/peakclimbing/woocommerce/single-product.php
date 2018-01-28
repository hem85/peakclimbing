<?php
/**
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
get_header();
?>

<?php
while ( have_posts() ) : the_post();
	global $post;
	global $product;
	$travel_infos   = get_post_meta( get_the_ID(), 'travel_info_serene', true );
	$detal_itl      = get_post_meta( get_the_ID(), 'dtl_itinery_serene', true );
	$good_to_knw    = get_post_meta( get_the_ID(), 'travel_info_peakclimbing', true );
	$price_include  = get_post_meta( get_the_ID(), 'price__inc_desc', true );
	$price_not_inc  = get_post_meta( get_the_ID(), 'price__not_desc', true );
	$elevation 		  = get_post_meta(get_the_ID(), 'peak_detail_elevation', true);
	$tour_price	    = $product->get_price_html();
	$image_id       = get_post_thumbnail_id(get_the_ID() );
	$bg_img 		    = imgr($image_id, '', '', '', false );

	?>

	<section class="section-top single">
    <div class="parallax-window" data-parallax="scroll" data-position="bottom" data-bleed="50" data-image-src="<?php echo $bg_img['url']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <h1><?php the_title(); ?>
        <span><?php if(! empty($elevation) ) : ?><i class="far fa-image"></i> <?php echo $elevation; endif; ?> <i class="far fa-clock"></i> 3 weeks</span></h1></div>
        <div class="col-sm-4 text-right">
        	<?php if( ! empty($tour_price) ) : ?>
          	<div class="price"><span>US <?=$tour_price; ?></span> per person</div>
      		<?php endif; ?>
          <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <a href="#">(3)</a> <span>Reviews</span></div>
        </div>
      </div>
          <nav class="breadcrumb">
            <?php do_action( 'woocommerce_before_main_content' ); ?>
          </nav>
      </div>
    </div>
</section>

<div id="single-nav" class="fixed-top">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2><?php the_title(); ?>
        <span><?php if(! empty($elevation) ) : ?><i class="far fa-image"></i> <?php echo $elevation; endif; ?>  <i class="far fa-clock"></i> 3 weeks</span></h2>
      </div>
      <div class="col-md-4 text-right">
        <?php if( ! empty($tour_price) ) : ?>
          	<div class="price"><span>US <?=$tour_price; ?></span> per person</div>
      	<?php endif; ?>
        <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <a href="#reviews">(3)</a> <span>Reviews</span></div>
      </div>
    </div>
    <nav class="navbar navbar-expand-sm p-0">
      <ul class="navbar-nav nav-pills">
          <li class="nav-item active"><a class="nav-link" href="#overview">Peak Details</a></li>
          <li class="nav-item"><a class="nav-link" href="#highlights">Highlights</a></li>
          <li class="nav-item"><a class="nav-link" href="#itinerary">Itinerary</a></li>
          <li class="nav-item"><a class="nav-link" href="#included">What's Included?</a></li>
          <li class="nav-item"><a class="nav-link" href="#dates" contenteditable="false">Departure Dates</a></li>
          <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
          <?php
            $i= 0;
           if( ! empty($good_to_knw) ) : 
           	foreach($good_to_knw as $good_to_kn){
           		$title = $good_to_kn['travel_info_title'];
           	?>
          	<li class="nav-item"><a class="nav-link" href="#infos-<?=$i; ?>"><?= ucfirst($title); ?></a></li>
      	  <?php $i++; } endif; ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="#" class="btn btn-sm btn-success">Check Availiability</a></li>
      </ul>
    </nav>
  </div>
</div>
 <?php

 wc_get_template_part( 'content', 'single-product' );

do_action( 'woocommerce_after_single_product_summary' );
?>

<?php endwhile; get_footer(); ?>