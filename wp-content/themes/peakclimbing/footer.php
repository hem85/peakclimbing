<?php 
 $facebook  = get_theme_mod('socail_section_1');
 $twitter   = get_theme_mod('socail_section_2');
 $gogle_plu = get_theme_mod('socail_section_3');
 $skype     = get_theme_mod('socail_section_4');
 $youtube   = get_theme_mod('socail_section_5');
 $link_In   = get_theme_mod('socail_section_6');
 $instagram = get_theme_mod('socail_section_7');

 $phone     = get_theme_mod('componey_section_1');
 $mobile    = get_theme_mod('componey_section_2');
 $com_email = get_theme_mod('componey_section_3');
 $per_email = get_theme_mod('componey_section_4');
 $post_box  = get_theme_mod('componey_section_5');
 $address   = get_theme_mod('componey_section_6');
 $assocaiteds = get_theme_mod( 'associated_us_settings_id' );
   ?>

  <section class="container-fluid reco">
    <div class="row">
      <?php if( ! empty($assocaiteds) ) :  ?>
      <div class="container wow fadeInUp">
          <h2>Recommended and Associated with</h2>
          <div class="clearfix"></div>
            <?php
              foreach($assocaiteds as $assocaited){
                  $image_url = imgr($assocaited['assed_image'], '', '','','',false);
                  $alt       = get_alt_text($assocaited['assed_image']);
                  ?>
                  <img src="<?php echo $image_url['url']; ?>" alts="<?php echo  $alt; ?>">
                  <?php
              }
            ?>
      </div>
    <?php  endif;  ?>
    </div>
  </section>
  <footer class="container-fluid footer">
    <div class="row">
      <div class="container">
          <div class="row">
            <div class="col-md-4 contact">
              <h3>Contact & Support</h3>
                <?php if( ! empty($post_box) || ! empty($address) ): ?>
                  <p><i class="fas fa-map-marker-alt svg"></i> <?=$post_box; ?>  <?=$address; ?></p>
                <?php endif; ?>
                   <?php if( ! empty($phone) || ! empty($mobile) ) : ?> 
                  <p> <i class="fas fa-phone-volume svg"></i> <?=$mobile; ?>,<?=$phone; ?></p>
                <?php endif; ?>
                <?php if(! empty($com_email) || ! empty($per_email) ) : ?>
                  <p><i class="far fa-envelope svg"></i> <?php echo  ! empty($com_email) ? $com_email : $per_email; ?></p>
                <?php endif; ?>
                <?php if(! empty($skype) ) : ?>
                  <p><i class="fab fa-skype svg"></i><?=$skype; ?></p>
                <?php endif; ?>
                  <div class="social">
                <?php if( ! empty($facebook) ): ?>
                    <a class="outline fb" href="<?=$facebook; ?>"><i class="fab fa-facebook-f fa-lg"></i></a>
                <?php endif; ?>
                <?php if( ! empty($twitter) ) : ?>
                  <a class="outline tw" href="<?=$twitter; ?>"><i class="fab fa-twitter fa-lg"></i></a>
                <?php endif; ?>
                <?php if( ! empty($youtube) ) : ?>
                  <a class="outline yt" href="<?=$youtube; ?>"><i class="fab fa-youtube fa-lg" ></i></a>
                <?php endif; ?>
                <?php if( ! empty($link_In) ) : ?>
                  <a class="outline in" href="<?=$link_In; ?>"><i class="fab fa-linkedin fa-lg" ></i></a>
                <?php endif; ?>
                <?php if( ! empty($gogle_plu) ) : ?>
                  <a class="outline gp" href="<?=$gogle_plu; ?>"><i class="fab fa-google-plus fa-lg" ></i></a>
                <?php endif; ?>
                <?php if( ! empty($instagram ) ) : ?>
                  <a class="outline ig" href="<?=$instagram; ?>"><i class="fab fa-instagram fa-lg" ></i></a>
                <?php endif; ?>
                </div>
              </div>
              <div class="col-md-5 col-sm-7">
                <?php if( has_nav_menu('peak_footer') ) : ?>
                  <h3>Adventure Trips with Grade</h3>
                    <?php 
                      wp_nav_menu( array(
                          'theme_location' => 'peak_footer',
                          'container'      => false,
                          'menu_class'     => 'atg',
                          'depth'          => 1,
                      ) );
                    endif;
                    ?>
              </div>
              <div class="col-md-3 col-sm-5 newsletter">
                  <h3>Newsletter</h3>
                  <p>Join over 5,000 people who get free and fresh travel newsletter deliver automatically each time we publish.</p>
                  <div class="input-group">
              <input type="text" class="form-control" placeholder="Email Address">
              <span class="input-group-btn">
              <button class="btn btn-warning" type="button"><i class="fas fa-angle-right"></i> </button>
              </span>
              </div>
                  <h4>We Accept</h4>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/payment.jpg" alt="">
              </div>
          </div>
      </div>
    </div>
    <div class="row copyright">
        <div class="container">
            @<?= date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. 
            <a href=""> Privacy Policy</a>   <br/>
         Developed By : <a href="http://wildstonesolution.com" targe="t_blank">Wildstone Solution</a>
        </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  <script>
    FontAwesomeConfig = { searchPseudoElements: true };
  </script>
  </body>
</html>