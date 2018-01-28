<?php
/**
 * Related Products
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
	<section class="parallax-window tab-item" data-parallax="scroll" data-position="middle" data-bleed="10" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/peak-bg.jpg">
	    <div class="container">
	      <h2 class="wow fadeInUp">Similar trips you may like
	      <span>All the given Peak climbing package trips are listed by as per their altitude in descending order.</span></h2>
	    </div>
	    <div class="container-fluid">
	      	<div class="row">
	      		<?php woocommerce_product_loop_start(); ?>
	      			<?php foreach ( $related_products as $related_product ) : ?>
	      				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>
				    <?php endforeach; ?>    
		        <?php woocommerce_product_loop_end(); ?>
	      	</div>
	    </div>       
	</section>

<?php endif;

wp_reset_postdata();
