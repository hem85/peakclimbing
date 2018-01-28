<?php
/**
* @package peakclimbing travel website
* @version 1.0.0
* @author wildsonte family
*/
 $slider_option = get_theme_mod('homepage_slider_choice');
 $sliders_img 	= get_theme_mod( 'homepage_slider_settings_id' );
 $sliders_video = get_theme_mod( 'home_page_slider_video' );
if($slider_option =='image' && !empty($sliders_img)){
	?>
	<ol class="carousel-indicators">
		<?php
		 $i=0; 
		 foreach($sliders_img as $slider) {
		 	$class = $i==0 ? 'active' : '';
		 ?>
	  		<li data-target="#myCarousel" data-slide-to="<?=$i; ?>" class="<?=$class; ?>"></li>
	  	<?php $i++; } ?>
	</ol>
	<div class="carousel-inner" role="listbox">
	  <?php
	    $j = 0;
	  	foreach( $sliders_img as $slide) {
	  		switch ($j) {
	  			case 0:
	  				$carousel_class = 'carousel-item carousel-item-next carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block text-left';
	  				break;
	  			case 1:
	  				$carousel_class = 'carousel-item';
	  				$carousel_caption = 'carousel-caption d-none d-md-block';
	  				break;
	  			case 2:
	  				$carousel_class = 'carousel-item active carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block text-right';
	  				break;
	  			case 3:
	  				$carousel_class = 'carousel-item carousel-item-next carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block text-left';
	  				break;			
	  			
	  			default:
	  				$carousel_class = 'carousel-item carousel-item-next carousel-item-left';
	  				$carousel_caption = 'carousel-caption d-none d-md-block text-left';
	  				break;
	  		}

	  	$image_url = imgr($slide['link_image_dipak'], '', '', '', '', false);
	    $alt       = get_alt_text($slide['link_image_dipak']);
	    $image_title = $slide['link_text'];
	    $image_place = $slide['title_textdee'];
	    $image_desc  = $slide['link_desc'];
	    $image_link  = $slide['link_url']; 	
	   ?> 
		  	<div class="<?=$carousel_class; ?>">
			    <div class="overlay"></div>
			    <img class="first-slide" src="<?=$image_url['url']; ?>" alt="<?=$alt; ?>">
			    
			    <div class="<?=$carousel_caption; ?>">
			        <h3 class="wow fadeInDown"><?=$image_title; ?> </h3>
			        <h2 class="wow fadeInDown"><?=$image_place; ?></h2>
			         <?php echo $image_desc; ?>
			         <a class="btn btn-outline-secondary btn-lg wow fadeInUpBig" href="<?=$image_link; ?>" role="button">Browse Expedition</a>
			    </div>
		  	</div>
		<?php $j++; } ?>
	</div>

	<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="sr-only">Next</span>
	</a>
	<?php 
}else{ ?>
 <iframe width="1366" height="768" src="https://www.youtube.com/embed/zjFvdA4eDrw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php  
}	
