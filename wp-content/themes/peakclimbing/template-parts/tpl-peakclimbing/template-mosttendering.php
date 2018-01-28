<?php 
/**
* @package peakclimbing
* @author wildstone family
* @version 1.0.0
*/
$active_section 	= get_theme_mod( 'my_setting_cho_1' );

$top_title			= get_theme_mod( 'title_setting1' );

$short_desc			= get_theme_mod( 'shortdesc_setting1' );
?>
<h2 class="wow fadeInUp"><?= ! empty($top_title) ? $top_title : 'Most Trending Climbing' ?> 
	<span><?= ! empty($short_desc) ? $short_desc : 'Offering most selling Nepal trekking, hike and tour packages to make your holidays pleasurable and memorable'; ?></span>
</h2>
<div class="row wow fadeInUp">
	<?php if($active_section == 'product' ){
		$selected_products	= get_theme_mod( 'my_setting_product_1' );
		foreach($selected_products as $selected_product ){
			//$Climbing = get_post($selected_product);  
	 		?>
			<div class="col-md-4">
			  	<div class="p-item">
				    <figure>
				        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/item1.jpg" alt="" title="">
				    </figure>
				    <div class="desc">
				        <h3><a href="#">Mera Peak Climbing</a></h3>
				        <i class="far fa-image"></i> 6520m/23500ft. Mera Summit 
				    </div>
				    <div class="infos">
				        <div class="info rating">
				            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <a href="#">(3)</a>
				        </div>
				        <div class="info"> <i class="far fa-clock"></i> 13 days</div>
				        <div class="info"> <i class="fas fa-tag"></i> US <strong>$1985</strong></div>
				    </div>
				</div>
			</div>
		<?php } ?>
	<?php }elseif($active_section=='category'){
		$selected_categories 	= get_theme_mod( 'my_setting_category_1' );
		foreach($selected_categories as $selected_category){
		    ?>
			<div class="col-md-4">
			  	<div class="p-item">
				    <figure>
				        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/item1.jpg" alt="" title="">
				    </figure>
				    <div class="desc">
				        <h3><a href="#">Mera Peak Climbing</a></h3>
				        <i class="far fa-image"></i> 6520m/23500ft. Mera Summit 
				    </div>
				</div>
			</div>
		<?php } ?>	
	<?php }else{ ?>
		<h1>Sorry ! trip was not showing by admin.</h1>	
	<?php } ?>
</div>

