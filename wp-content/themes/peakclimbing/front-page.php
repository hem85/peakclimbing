<?php
 get_header();

 $welcome = get_theme_mod( 'welcome_content' );
 $why_us  = get_theme_mod( 'whywith_us_settings_id' );
?>    
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <?php
       get_template_part('template-parts/tpl-peakclimbing/template','homeslider'); 
       ?>
  </div>
  <div class="clearfix"></div>
  <!-- Welcome -->
  <section class="parallax-window welcome" data-parallax="scroll" data-position="middle" data-bleed="10" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/welcome.jpg">
    <div class="container">
      <div class="row">
      <div class="col-md-6 text wow fadeInLeft">
        <h1><span>Welcome</span> Nepal Guide Treks & Expedition</h1>
        <?php echo $welcome; ?>
      </div>
      <div class="col-md-6 why wow fadeInRight">
        <h2>"The strongest survive but best succeed"</h2>
        <?php foreach($why_us as $why_peak) : ?>
            <p><i class="<?=$why_peak['why_title']; ?>"></i> <?=$why_peak['why_text']; ?></p>
        <?php endforeach; ?>
      </div>
      </div>
    </div>
  </section>

  <section class="trending container">
    <?php get_template_part('template-parts/tpl-peakclimbing/template','mosttendering');   ?>
  </section>
  <section class="parallax-window tab-item" data-parallax="scroll" data-position="middle" data-bleed="10" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/peak-bg.jpg">
    <?php get_template_part('template-parts/tpl-peakclimbing/template','peakexpedition');   ?>
  </section>
  <section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-7 post wow fadeInLeft">
                <h2>From the BLOG</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog.jpg" alt="" title="">
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
  <section class="parallax-window review-home" data-parallax="scroll" data-position="bottom" data-bleed="10" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/review-bg.jpg">
    <div class="container">
      <h2 class="wow fadeInUp">Travelers Reviews</h2>
      <div class="row wow fadeInUp">
        <div class="col-lg-8 review">
          <div class="row">
            <div class="col-sm-4 text-center">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/review-img.jpg" class="rounded-circle img-responsive" >
              <p><strong>Robort R.</strong> <br/> Germany</p>
            </div>
            <div class="col-sm-8">
              <h3>Thanks NGT for a Great Assistance</h3>
              <p><i class="far fa-calendar-check"></i> 30  Jun 2017</p>
              <p>We were a group of 5 people from Poland who wanted to climb Chulu East Peak. Fortunately, we jumped into Nepal Guide Treks and Expedition’s office with our inquiries.</p>
              <p> Eexpedition for any kind of adventure related activities in Nepal. We guarantee that you won’ <a  href="">Read More </a></p>
              <a href="" class="btn btn-success">View Details <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div id="bookmundi-widget-sidebar"><a href="https://www.bookmundi.com/companies/nepal-guide-treks-and-expedition/c1324" target="_blank" id="bookmundi-link">Nepal Guide Treks & Expedition</a></div><script src="https://www.bookmundi.com/review-widget/?c=6781"></script>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>

