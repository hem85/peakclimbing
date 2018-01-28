<?php
get_header();
$args = array(
	'post_type' => 'post',
	'post_per_page' => 3,
	'category_name' => 'blog-post',

);
//page_have_image( get_the_ID() );
$page_image = get_post_thumbnail_id( get_the_ID(), 'full');
//var_dump($page_image);
$blog_post = new WP_Query($args);

 ?>
<section class="section-top">
    <div class="parallax-window" data-parallax="scroll" data-position="bottom" data-bleed="50" data-image-src="images/welcome.jpg">
    <div class="container">
      <h1>Recent Post
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
	          <!-- Blog Post Item -->
	       <?php
	        if($blog_post->have_posts() ){
    			while($blog_post->have_posts() ) : $blog_post->the_post(); ?>   
		        <div class="post-item  wow fadeInUp">
		        	<?php
		        	 if( has_post_thumbnail() ) : 
		        	 	$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
		        	 	$image = aq_resize( $image_url, 730, 365, true, true, true);
		        	 ?>
			            <figure>
			              <img src="<?=$image; ?>" alt="">
			            </figure>
		        	<?php endif; ?>
		            <div class="desc">
		              <h3><a href="<?php echo  the_permalink(); ?>"><?php the_title(); ?></a></h3>
		              <p class="auth"><i class="far fa-calendar-check"></i> <?php echo get_the_date('j M Y'); ?>   <i class="far fa-user"></i>  <?php echo  get_the_author( get_the_ID() ); ?></p>
		              <?php echo wp_trim_words( get_the_content(get_the_ID()), 30, '...') ?><br/>
		              <a href="<?php echo  the_permalink(); ?>" class="btn btn-outline-success">Read More</a>
		            </div>
		        </div>
		    <?php endwhile; wp_reset_postdata(); ?>
	        <?php }else{ ?>
	             <h1>Sorry ! blog not updated </h1>
	        <?php } ?>
        </main>
        <!-- single sidebar here -->
        <?php get_sidebar(); ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>