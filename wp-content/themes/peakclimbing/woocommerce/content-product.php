<?php
/**
 * @author  wildstone family
 * @package WooCommerce/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
global $product;
$image_id       = get_post_thumbnail_id(get_the_ID() );
$bg_img     = imgr($image_id, '', 290, 260, true );
$alt      = get_alt_text($image_id); 
$image     = imgr($attr_id, '', 290, 262, true);
$elevation = get_post_meta(get_the_ID(), 'peak_detail_elevation', true);
$tour_price = $product->get_price_html();
?>

<div class="col-lg-3 col-md-6 col-sm-6">
  <div class="p-item">
    <figure>
        <img src="<?=$bg_img['url']; ?>" alt="<?=$alt; ?>" title="">
        <div class="infos">
          <div class="info rating">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <a href="#">(3)</a>
          </div>
          <div class="info"><?php if( ! empty($tour_price) ) : ?> <i class="fas fa-tag"></i> US <strong> <?=$tour_price; ?></strong><?php endif; ?> </div>
        </div>
    </figure>
    
    <div class="desc">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <i class="far fa-clock"></i> 13 days <?php if( ! empty($elevation) ): ?><i class="far fa-image"> </i>  
        <?=$elevation; endif; ?>  
    </div>
  </div>
</div>


