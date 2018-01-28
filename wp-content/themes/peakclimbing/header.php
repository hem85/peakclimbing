<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
  </head>
<body>
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
          <?php
            if(peakclimbing_has_logo() ){
               peakclimbing_logo();
            }else{
              bloginfo('name');
            } 
          ?>
        </div>
        <div class="col-lg-9">
          <div class="topbar">
            <div class="row">
              <div class="col-md-9">
                <?php
                 $phone     = get_theme_mod('componey_section_1');
                 $mobile    = get_theme_mod('componey_section_2');
                 $com_email = get_theme_mod('componey_section_3');
                 $per_email = get_theme_mod('componey_section_4');
                 if( ! empty($phone) || !empty($mobile) ): 
                 ?>
                <span class="call">Get A Call:</span> 
                  <?php 
                    endif;
                    if( ! empty($mobile) ):
                  ?><a href="tel:<?=$mobile; ?>">
                  <i class="fas fa-mobile"></i> <?=$mobile; ?></a>
                  <?php endif; ?>
                  <?php if(! empty($phone) ): ?><a href="tel:<?=$phone; ?>"> 
                  <i class="fas fa-phone-volume"></i> <?=$phone ?>
                  <?php endif; ?>
                  <?php if(! empty($com_email) ||  ! empty($per_email) ): ?>
                  <a href="mailto:<?= ! empty($com_email) ? $com_email : $per_email; ?>"> 
                  <i class="far fa-envelope"></i> <?= ! empty($com_email) ? $com_email : $per_email; ?></a>
                <?php endif; ?>
              </div>
              <div class="col-md-3 text-right d-none d-md-block">
                <!-- <div id="google_translate_element"></div> -->
              </div>
            </div>
          </div>
          <div class="main-navigation main-navigation--mega-menu  animated">
            <nav class="row navbar navbar-expand-lg navbar-light">
                <?php responsive_logo(); ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPcn" aria-controls="navbarPcn" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarPcn">
                  <?php
                  if(has_nav_menu('peak_primay')){
                    wp_nav_menu( array(
                        'theme_location' => 'peak_primay',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav mr-auto',
                        'depth'          => 3,
                        'walker'         => new WP_Bootstrap_Navwalker()
                    ) );
                  }
                    ?>
                  <ul class="navbar-nav ml-auto">
                      <li class="dropdown searchbtn">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-search"></i>
                        </button>
                      <div class="dropdown-menu dropdown-menu-right search" aria-labelledby="search">
                          <form class="full-search" action="" method="GET" name="frm" onsubmit="">
                          <h4>Filter your desire</h4>
                          <select name="trip-cat" id="trip-cat" class="form-control">
                            <option value="" selected="selected">
                              Trip type
                            </option>
                            <option value="2">
                              Hiking/Trekking/Biking (Moderate)
                            </option>
                            <option value="3">
                             Adventures (6000m-6500m)
                            </option>
                            <option value="4">
                              Challenging Adventure (6501m-7000m)
                            </option>
                            <option value="42">
                              Multi Country Tours
                            </option>
                            <option value="">
                              Technical & Serious Climbing (7001m-8848m)
                            </option>
                            <option value="">
                               Unique Adventure (Multiple Peaks)
                            </option>
                          </select>
                                 
                          <select name="dur" id="mydur" class="form-control">
                            <option value="">Any Duration</option>
                            <option value="1-7">1-7 Days</option>
                            <option value="7-15">7-15 Days</option>
                            <option value="15-25">15-25 Days</option>
                            <option value="25+">25+ Days</option>
                          </select>
                          <button type="submit" value="submit" class="btn btn-sm btn-success"><i class="fa fa-search"></i> Search</button>
                          </form>
                            <hr/>
                          <form role="search" method="get" id="searchform" action="">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </li>
                  </ul>
          </div>
        </div>
      </div>
    </div>
  </header>