<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package peakclimbing
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
  return;

}
//dynamic_sidebar( 'sidebar-1' );
?>
<aside class="col-md-4">
  <!-- Search -->
  <div class="blog-search">
    <h3>Search the Blog</h3>
    <form action="#">
      <div class="input-group">
        <input type="text" class="form-control" name="s" id="s" placeholder="What are you looking for?">
        <span class="input-group-btn">
        <button type="button"><i class="fas fa-search"></i></button>
        </span>
      </div>
    </form>
  </div>
  <!-- Related Post -->
  <?php 
    $args= array(
      'post_type' => 'post',
      'post_per_page' => 5,
      'category_name' => 'blog-post',
      'orderby'    =>  'date',
      'post__not_in' => array(get_the_ID()),
    );
  $related_post = new WP_Query($args);  
  if($related_post->have_posts() ) :
    ?>
  <div class="latest-post">
    <h3>Latest Posts</h3>
    <?php 
      while($related_post->have_posts() ): $related_post->the_post();
        $image_url = wp_get_attachment_url( get_post_thumbnail_id() );
        $image = aq_resize( $image_url, 79, 86, true, true, true);
        $alt  = get_alt_text(get_post_thumbnail_id());
        ?>
          <div class="row post-items">
            <div class="col-4"><a href=""><img src="<?=$image; ?>" alt="<?=$alt; ?>"></a></div>
            <div class="col-8"><a href=""><?php the_title(); ?></a>
            <p class="auth"><i class="far fa-calendar-check"></i> <?php echo get_the_date('j M Y'); ?>   <i class="far fa-user"></i>  <?php echo  get_the_author( get_the_ID() ); ?></p></div>
          </div>
          <hr>
        <?php
      endwhile;
    ?>
  </div>
  <?php wp_reset_postdata(); endif; ?>
</aside>