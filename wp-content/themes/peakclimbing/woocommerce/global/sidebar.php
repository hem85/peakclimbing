<?php
/**
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<aside class="col-md-4 col-xl-3">
  <div class="rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span class="label-aero"> 5.0 - Excellent</span><p> <span>Based on 5 Reviews</span></p>
    <button class="btn btn-outline-success"> <i class="far fa-edit"></i> Write your own review</button>
  </div>
  <div class="free">
    <p> <i class="far fa-check-circle"></i> Free Cancellation</p>
    <p> <i class="fas fa-dollar-sign"></i> Best Price Guarantee</p>
    <p> <i class="far fa-check-circle"></i> Hassle-Free Booking</p>
  </div>
  <div class="box booking">
    From<br/>
    <span class="cost">US $ 2,055</span>  per person<br/>
     <i class="fas fa-bolt text-warning"></i> Instant Booking
     <br/><br/>
     <form class="form" id="avability-date">
          <div class="input-group date mb-3">
          <input type="text" class="form-control" placeholder="Select a travel date" aria-label="Select a travel date" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-secondary" type="button"><i class="fas fa-calendar-alt"></i></button>
          </div>
      </div>
            <button type="button" class="btn btn-success btn-block text-uppercase">Check Availiability</button>
          </form>
  </div>
  <div class="box q-enquiry sticky-top">
    <h2>Make an Enquiry</h2>
    <form class="" id="enquiry-form" method="post" action="" onsubmit="">
      <div class="form-group">
        <input type="text" id="n_firstName" name="n_firstName" placeholder="Full Name" class="form-control">
      </div>
      <div class="form-group">
        <input type="email" id="txtemail" placeholder="Email address" class="form-control">
      </div>
      <div class="form-group" id="enquiry-date">
              <div class="input-group date mb-3">
          <input type="text" class="form-control" placeholder="Select a travel date" aria-label="Select a travel date" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-secondary" type="button"><i class="fas fa-calendar-alt"></i></button>
          </div>
      </div>
            </div>

      <div class="form-group">
        <textarea type="text" id="n_message" placeholder="Message...." class="form-control" rows="4"></textarea>
      </div>

      <div class="form-group">
              <div class="g-recaptcha" data-theme="dark" data-sitekey="6Ld5oCQUAAAAAP0Is8GaYUrTXKO1buRFbjHH6Sak" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"><div><div><iframe src="https://www.google.com/recaptcha/api2/anchor?k=6Ld5oCQUAAAAAP0Is8GaYUrTXKO1buRFbjHH6Sak&amp;co=aHR0cDovL3d3dy5uZXBhbHBsYW5ldHRyZWtzLmNvbTo4MA..&amp;hl=en&amp;v=v1514934548259&amp;theme=dark&amp;size=normal&amp;cb=kv7g41vosbot" width="304" height="78" role="presentation" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div></div></div>
            </div>
        <div class="form-group">
          <button class="btn btn-info btn-block text-uppercase"> Proceed for enquiry</button>
        </div>
    </form>
  </div>
  <img src="https://www.bookmundi.com/themes/global/resources/images/travel-ins.jpg">
</aside>