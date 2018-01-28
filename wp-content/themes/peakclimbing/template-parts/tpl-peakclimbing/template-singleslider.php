<?php
global $product;
$attachment_ids = $product->get_gallery_image_ids();
$image_id       = get_post_thumbnail_id(get_the_ID() );
$image_url 		= wp_get_attachment_url($image_id);
$bg_img 		= aq_resize( $image_url, 825, 413, true, true, true);
$alt 			= get_alt_text($image_id);
?>
<div id="singleCarousel" class="carousel slide" data-ride="carousel">
<?php
if( ! empty($attachment_ids) ) { ?>
  	<ol class="carousel-indicators">
	    <?php $j=0; foreach( $attachment_ids as $attar_id) : ?>
	    	<li data-target="#singleCarousel" data-slide-to="<?=$j; ?>" class="<?= $j==0 ? 'active' : ''; ?>"></li>
	    <?php $j++; endforeach; ?>
  	</ol>
  	<div class="carousel-inner" role="listbox">
	    <?php
	     $i=0;
	     foreach( $attachment_ids as $image_slide) {
	     $image_url 		= wp_get_attachment_url($image_slide);

	     $galleryes_src  = aq_resize( $image_url, 825, 413, true, true, true);
	     $alt            = get_alt_text($image_slide); 
	     	switch ($i) {
	  			case 0:
	  				$carousel_class = 'carousel-item carousel-item-next carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block wow fadeInUp';
	  				break;
	  			case 1:
	  				$carousel_class = 'carousel-item';
	  				$carousel_caption = 'carousel-caption d-none d-md-block wow fadeInUpk';
	  				break;
	  			case 2:
	  				$carousel_class = 'carousel-item active carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block wow fadeInUp';
	  				break;
	  			case 3:
	  				$carousel_class = 'carousel-item carousel-item-next carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block wow fadeInUp';
	  				break;			
	  			
	  			default:
	  				$carousel_class = 'carousel-item';
	  				$carousel_caption = 'carousel-caption d-none d-md-block wow fadeInUp';
	  				break;
	  		}
	      ?>
		    <div class="<?=$carousel_class; ?>">
		      <img class="first-slide" src="<?=$galleryes_src; ?>" alt="<=$alt; ?>">
		        <div class="<?=$carousel_caption; ?>">
		          Climbing adventure is an excellent
		      </div>
		    </div>
	    <?php
	     $i++;
	     } 
	    ?>
  	</div>
  <a class="carousel-control-prev" href="#singleCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#singleCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <?php }else{ ?>
<img src="<?php echo $bg_img; ?>" alt="<?=$alt; ?>">
<?php } ?>
</div>