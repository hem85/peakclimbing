<?php
/**
 * @author 		Wildstone Family
 * @package 	serene/template/category
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
if ( is_product_category() ){
  global $wp_query;
  $term = $wp_query->get_queried_object();
  $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
  $image = wp_get_attachment_url( $thumbnail_id, 'full' );
  $children = get_terms( $term->taxonomy, array(
    'parent'    => $term->term_id,
    'hide_empty' => true
    ) );
  $slogun = get_term_meta($term->term_id, 'climbing_extra_info', true);
  $if_no_img = get_template_directory_uri(). '/assets/images/welcome.jpg';
  $bg_img    = ! empty($image) ? $image : $if_no_img;
?>
<section class="section-top">
    <div class="parallax-window" data-parallax="scroll" data-position="bottom" data-bleed="50" data-image-src="<?=$bg_img;?>">
    <div class="container">
      <h1><?php woocommerce_page_title(); ?>
        <span><?=$slogun; ?></span></h1>
          <nav class="breadcrumb">
            <?php do_action( 'woocommerce_before_main_content' ); ?>
          </nav>
      </div>
    </div>
  </section>
  <section class="section-contents">
    <div class="container">
    <?php do_action( 'woocommerce_archive_description' ); ?>
    </div>
  </section>
  <section class="parallax-window tab-item" data-parallax="scroll" data-position="middle" data-bleed="10" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/peak-bg.jpg">
    <div class="container">
      <h2 class="wow fadeInUp">Peak  Climbing
      <span>All the given Peak climbing package trips are listed by as per their altitude in descending order.</span></h2>
    </div>
      <div id="horizontalTab" class="wow fadeInUp">
        <ul>
          <?php foreach($children as $child): ?>
            <li><a href="#<?=$child->slug; ?>"><?=$child->name;?></a></li>
          <?php endforeach; ?>
        </ul>
        
       <?php foreach($children as $child){ ?> 
        <div id="<?=$child->slug; ?>">
          <div class="row">
            <?php
              $args = array(
                  'post_type' => 'product',
                  'product_cat' => $child->slug,
                  'post_per_page' => -1
              );
              $climbing = new wp_query($args);
              if($climbing->have_posts() ): 
                while ($climbing->have_posts() ) : $climbing->the_post(); 
                    wc_get_template_part( 'content', 'product' );
                  endwhile;
              endif;  
             ?>
          </div>
        </div>
        <?php } ?>
  </section>
  <?php } ?>

  <section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-7 post wow fadeInLeft">
                <h2>From the BLOG</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/blog.jpg" alt="" title="">
                    </div>
                    <div class="col-md-6">
                        <h3>Family Friendly Trekking Holidays in Nepal</h3>
                        <p class="auth"><i class="far fa-calendar-check"></i> 30  Jun 2017   <i class="far fa-user"></i>  Raj Bhatta</p>
                        <p>At REI, we believe that a life outdoors is a life well lived. We've been sharing our passion for the outdoors since 1938.</p>
                        <p> At REI, we believe that a life outdoors is a life well lived. We've been sharing our passion for </p>
                        <a href="" class="btn btn-outline-success">View Details <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 video wow fadeInRight">
               <h2>Featured Video</h2>
               <iframe width="854" height="480" src="https://www.youtube.com/embed/dW5kRBq30m4" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
               <p>Video by Robin Wallace. Documentary i made a few years ago covering the entire trek from Lukla to Everest Base camp, staying in Tea Houses.</p>
            </div>
        </div>
    </div>
  </section>

<?php get_footer(); ?>