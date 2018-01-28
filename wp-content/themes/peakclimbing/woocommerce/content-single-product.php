<?php
/**
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
global $post;

$travel_infos     = get_post_meta( get_the_ID(), 'peak_detail_peakclimbing', true );
$detal_itl        = get_post_meta( get_the_ID(), 'dtl_itinery_peakclimbing', true );
$good_to_knw      = get_post_meta( get_the_ID(), 'travel_info_peakclimbing', true );
$price_include    = get_post_meta( get_the_ID(), 'price__inc_desc', true );
$price_not_inc    = get_post_meta( get_the_ID(), 'price__not_desc', true );

//custom peak Details 
$defficulty       = get_post_meta( get_the_ID(), 'peak_detail_difficulty', true );
$min_participant  = get_post_meta( get_the_ID(), 'peak_detail_participants', true ); 
$transportaion    = get_post_meta( get_the_ID(), 'peak_detail_transportation', true );
$accommodation    = get_post_meta( get_the_ID(), 'peak_detail_accommodation', true );
//$meeting          = get_post_meta( get_the_ID(), '', true ); 
$Meals            = get_post_meta( get_the_ID(), 'peak_detail_meals', true ); 

//   
?>
<section  class="section-contents single single-bg">
  <div class="container">
    <div class="row">
      <main class="col-md-8 col-xl-9">
        <div id="overview" class="box facts">
          <h2>Peak Details</h2>
          <div class="row">
          <?php if( ! empty($defficulty) ) : ?>
            <div class="col-sm-6 col-md-4 info">
              <i class="fas fa-tachometer-alt"></i> Difficulty 
              <strong><?=$defficulty; ?></strong>
            </div>
          <?php endif; ?>
          <?php if( ! empty($min_participant) ) : ?>
            <div class="col-sm-6 col-md-4 info">
              <i class="fas fa-users"></i> Minimum Participants 
              <strong><?=$min_participant; ?></strong>
            </div>
          <?php endif; ?>
          <?php if( ! empty($transportaion) ) : ?>
            <div class="col-sm-6 col-md-4 info">
              <i class="fas fa-taxi"></i> Transportation 
              <strong><?=$transportaion; ?></strong>
            </div>
          <?php endif; ?>
          <?php if( ! empty($accommodation) ) : ?>
            <div class="col-sm-6 col-md-4 info">
              <i class="fas fa-bed"></i> Accommodation 
              <strong><?=$accommodation; ?></strong>
            </div>
          <?php endif; ?>
          <?php if( ! empty($Meals) ) : ?>
            <div class="col-sm-6 col-md-4 info">
              <i class="fas fa-utensils"></i> Meals 
              <strong><?=$Meals; ?></strong>
            </div>
          <?php endif; ?>
            <?php 
            if( ! empty($travel_infos) ) :
                foreach($travel_infos as $travel_info) { 
                  //var_dump($travel_info);
                  $title = $travel_info['title'];
                  $icon  = $travel_info['icon'];
                  $value = $travel_info['peak_detail_informatin'];
                  ?>
                  <div class="col-sm-6 col-md-4 info">
                    <i class="<?= ! empty($icon) ? $icon : 'fas fa-utensils'; ?>"></i> <?=$title; ?> 
                    <strong><?=$value; ?></strong>
                  </div>
                  <?php
                } 
            endif;
            ?>
          </div>
        </div>
        <?php get_template_part('template-parts/tpl-peakclimbing/template','singleslider'); ?>
        <?php if( ! empty(get_the_content( get_the_ID()) ) ) : ?>
          <div id="highlights" class="box highlights">
            <h2>Highlights</h2>
              <?php the_content(); ?>
          </div>
        <?php endif; ?>

        <?php if( ! empty($detal_itl) ) : ?>
          <div id="itinerary" class="box itinerary">
            <h2>Itinerary</h2>
            <div class="collapse-group">
                <div class="controls">
                  <button class="btn btn-outline-success open-button" type="button">
                    Open all
                  </button>
                  <button class="btn btn-outline-danger close-button" type="button">
                    Close all
                  </button>
                </div>
                <?php 
                $dt=1; 
                foreach($detal_itl as $dtl_row) :

                  if ($dtl_row === reset($detal_itl)){
                    $maker = 'marker';
                    $flag  = 'fas fa-map-marker-alt';
                  }elseif($dtl_row === end($detal_itl)){
                    $maker = 'marker';
                    $flag  = 'far fa-flag';
                  }else{
                    $maker = 'marker small';
                    $flag  = '';
                  }
                      
                  //$dt_first  = $dt==1 ? 'marker' : 'marker small';
                  $dtl_day   = $dtl_row['itl_day'];
                  $dtl_title = $dtl_row['itl_title'];
                  $dtl_time  = $dtl_row['itl_time'];
                  $dtl_stay  = $dtl_row['itl_stay'];
                  $dtl_desc  = $dtl_row['dtl_itinery_desc'];
                 ?>
                <div class="item">
                  <span class="<?=$maker; ?>"><i class="<?=$flag; ?>"></i></span>
                  <div role="tab" id="heading<?=$dt; ?>">
                    <h4> 
                      <a role="button" data-toggle="collapse" href="#collapse<?=$dt; ?>" aria-expanded="true" aria-controls="collapse<?=$dt; ?>" class="trigger collapsed">
                        <?=$dtl_day; ?>: <strong><?=$dtl_title; ?></strong></a>
                    </h4>
                  </div>
                  <div id="collapse<?=$dt; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$dt; ?>">
                      <p class="day"><i class="far fa-clock"></i> <?=$dtl_time; ?> <span></span><i class="fas fa-bed"></i> <?=$dtl_stay; ?></p>
                      <?php echo $dtl_desc; ?>
                  </div>
                  <hr/>
                </div>
                <?php $dt++; endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if( ! empty($price_include) || ! empty($price_not_inc) ) : ?>
          <div id="included" class="box in-ex">
              <?php if( ! empty($price_include) ) : ?>  
                <div class="include">
                  <h2>What's included?</h2>
                  <?php echo  $price_include; ?>
                </div>
              <?php endif; ?>
              <?php if( ! empty($price_not_inc) ) : ?>
                <div class="exclude">
                  <h2>What's not included?</h2>
                  <?php echo $price_not_inc; ?>
                </div>
              <?php endif; ?>  
          </div>
        <?php endif; ?>

        <?php get_template_part('template-parts/tpl-peakclimbing/template', 'fixeddeparture'); ?>

        <?php get_template_part('template-parts/tpl-peakclimbing/template', 'singlereview'); ?>
        <?php
         if( ! empty($good_to_knw) ) :
             $j= 0;
            foreach( $good_to_knw as $good_toknow){
              $good_to_know_title = $good_toknow['travel_info_title'];
              $good_to_know_desc  = $good_toknow['travel_info_desc'];
         ?>
        <div id="infos-<?=$j; ?>" class="box ess-info">
          <h2><?=$good_to_know_title; ?></h2>
          <?php echo $good_to_know_desc; ?>
        </div>
        <?php $j++; } endif; ?>
        
      </main>

      <?php do_action( 'woocommerce_sidebar' ); ?>

    </div>
  </div>
</section>

        
