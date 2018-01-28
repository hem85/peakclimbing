<?php
/**
 * @package peakclimbing
 */

get_header(); 

while( have_posts() ): the_post(); ?>
<section class="section-top">
    <div class="parallax-window" data-parallax="scroll" data-position="bottom" data-bleed="50" data-image-src="images/welcome.jpg">
    <div class="container">
      <h1>Latest Blog
        <span>Our expert team of guides for mountaineering, trekking and mountaineering</span></h1>
          <nav class="breadcrumb">
            <?php do_action( 'woocommerce_before_main_content' ); ?>
          </nav>
      </div>
    </div>
  </section>
  <section class="section-contents">
    <div class="container blog-post">
      <div class="row">
        <main class="col-md-8">
        	<?php
        	 if( has_post_thumbnail() ) : 
        	 	$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
        	 	$image = aq_resize( $image_url, 730, 365, true, true, true);
        	 ?>
	            <figure>
	              <img src="<?=$image; ?>" alt="">
	            </figure>
        	<?php endif; ?>
              <h3><a href="#"><?php the_title(); ?></a></h3>
              <p class="auth"><i class="far fa-calendar-check"></i> <?php echo get_the_date('j M Y'); ?>   <i class="far fa-user"></i>  <?php echo  get_the_author( get_the_ID() ); ?></p>
              
              <?php the_content(); ?>
        </main>
        <?php get_sidebar('single'); ?>
      </div>
    </div>
  </section>
<?php
endwhile;
get_footer();
