  // wow
  new WOW().init();

// 
//(function($){
jQuery(document).ready(function($){

		if ($('.boxed .fullscreen-bg').length>0) {
			$("body").addClass("transparent-page-wrapper");
		};

		//Show dropdown on hover only for desktop devices
		//-----------------------------------------------
		if (Modernizr.mq('only all and (min-width: 992px)')) {
		$('.main-navigation:not(.onclick) .navbar-nav>li.dropdown, .main-navigation:not(.onclick) li.dropdown>ul>li.dropdown').hover(
			function(){
				var $this = $(this);
				$this.addClass('show');
				$this.find('>.dropdown-menu').addClass('show');
			}, function(){
				$(this).removeClass('show');
				$(this).find('>.dropdown-menu').removeClass('show');
			});
		};

		//Show dropdown on click only for mobile devices
		//-----------------------------------------------
		if (Modernizr.mq('only all and (max-width: 991px)') || $(".main-navigation.onclick").length>0 ) {
			$('.header [data-toggle=dropdown], .header-top [data-toggle=dropdown]').on('click', function(event) {
				// Avoid following the href location when clicking
				event.preventDefault();

				// Avoid having the menu to close when clicking
				event.stopPropagation();

				// close all the siblings
				$(this).parent().siblings().removeClass('show');
				$(this).parent().siblings().find('.dropdown-menu').removeClass('show');

				// close all the submenus of siblings
				$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('show');

				// opening the one you clicked on
				$(this).parent().toggleClass('show');
				$(this).siblings('.dropdown-menu').toggleClass('show');
			});
		};

		

		
		//Mega menu fixed width
		if ($('html[dir="ltr"] .container .mega-menu--wide').length>0 && Modernizr.mq('only all and (min-width: 992px)')) {
			var headerSecondLeft = parseInt($('.main-navigation--mega-menu').closest('.header-second').parent().offset().left + 15),
			headerFirstLeft = parseInt($('.header-first').offset().left),
			megaMenuLeftPosition = headerFirstLeft - headerSecondLeft;
			$('.mega-menu--wide > .dropdown-menu').css('left', megaMenuLeftPosition + 'px');
			$(window).resize(function() {
				var headerSecondLeft = parseInt($('.main-navigation--mega-menu').closest('.header-second').parent().offset().left + 15),
				headerFirstLeft = parseInt($('.header-first').offset().left),
				megaMenuLeftPosition = headerFirstLeft - headerSecondLeft;
				$('.mega-menu--wide > .dropdown-menu').css('left', megaMenuLeftPosition + 'px');
			});
		}
		if ($('html[dir="rtl"] .container .mega-menu--wide').length>0 && Modernizr.mq('only all and (min-width: 992px)')) {
			var headerSecond = $('.main-navigation--mega-menu').closest('.header-second').parent(),
			headerSecondRight = parseInt(headerSecond.offset().left + headerSecond.outerWidth()),
			headerFirstRight = parseInt($('.header-first').offset().left + $('.header-first').outerWidth() + 15),
			megaMenuRightPosition = headerSecondRight - headerFirstRight;
			$('.mega-menu--wide > .dropdown-menu').css('right', megaMenuRightPosition + 'px');
			$(window).resize(function() {
				var headerSecond = $('.main-navigation--mega-menu').closest('.header-second').parent(),
				headerSecondRight = parseInt(headerSecond.offset().left + headerSecond.outerWidth()),
				headerFirstRight = parseInt($('.header-first').offset().left + $('.header-first').outerWidth() + 15),
				megaMenuRightPosition = headerSecondRight - headerFirstRight;
				$('.mega-menu--wide > .dropdown-menu').css('right', megaMenuRightPosition + 'px');
			});
		}

		//Mega menu full width
		if ($('html[dir="ltr"] .container-fluid .mega-menu--wide').length>0 && Modernizr.mq('only all and (min-width: 992px)')) {
			var headerSecondLeft = parseInt($('.main-navigation--mega-menu').closest('.header-second').parent().offset().left + 15),
			headerFirstLeft = parseInt($('.header-first').offset().left),
			megaMenuLeftPosition = headerFirstLeft - headerSecondLeft,
			megaMenuWidth = parseInt($('.header .container-fluid').width());
			$('.mega-menu--wide > .dropdown-menu').css('left', megaMenuLeftPosition + 'px');
			$('.mega-menu--wide > .dropdown-menu').css('width', megaMenuWidth + 'px');
			$(window).resize(function() {
				var headerSecondLeft = parseInt($('.main-navigation--mega-menu').closest('.header-second').parent().offset().left + 15),
				headerFirstLeft = parseInt($('.header-first').offset().left),
				megaMenuLeftPosition = headerFirstLeft - headerSecondLeft,
				megaMenuWidth = parseInt($('.header .container-fluid').width());
				$('.mega-menu--wide > .dropdown-menu').css('left', megaMenuLeftPosition + 'px');
				$('.mega-menu--wide > .dropdown-menu').css('width', megaMenuWidth + 'px');
			});
		}
		if ($('html[dir="rtl"] .container-fluid .mega-menu--wide').length>0 && Modernizr.mq('only all and (min-width: 992px)')) {
			var headerSecond = $('.main-navigation--mega-menu').closest('.header-second').parent(),
			headerSecondRight = parseInt(headerSecond.offset().left + headerSecond.outerWidth()),
			headerFirstRight = parseInt($('.header-first').offset().left + $('.header-first').outerWidth() + 15),
			megaMenuRightPosition = headerSecondRight - headerFirstRight;
			megaMenuWidth = parseInt($('.header .container-fluid').width());
			$('.mega-menu--wide > .dropdown-menu').css('right', megaMenuRightPosition + 'px');
			$('.mega-menu--wide > .dropdown-menu').css('width', megaMenuWidth + 'px');
			$(window).resize(function() {
				var headerSecond = $('.main-navigation--mega-menu').closest('.header-second').parent(),
				headerSecondRight = parseInt(headerSecond.offset().left + headerSecond.outerWidth()),
				headerFirstRight = parseInt($('.header-first').offset().left + $('.header-first').outerWidth() + 15),
				megaMenuRightPosition = headerSecondRight - headerFirstRight;
				megaMenuWidth = parseInt($('.header .container-fluid').width());
				$('.mega-menu--wide > .dropdown-menu').css('right', megaMenuRightPosition + 'px');
				$('.mega-menu--wide > .dropdown-menu').css('width', megaMenuWidth + 'px');
			});
		}

		//This will prevent the event from bubbling up and close the dropdown when you type/click on text boxes (Header Top).
		//-----------------------------------------------
		$('.header-top .dropdown-menu input').click(function(e) {
			e.stopPropagation();
		});

}); // End document ready

//})(this.jQuery);


// Responsive Tab
jQuery(document).ready(function ($) {
            var $tabs = $('#horizontalTab');
            $tabs.responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                disabled: [8,9],
                click: function(e, tab) {
                    $('.tabinfo').html('Tab <strong>' + tab.id + '</strong> clicked!');
                },
                activate: function(e, tab) {
                    $('.tabinfo').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    //console.log(state);
                    $('.tabinfo').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });

            $('#start-rotation').on('click', function() {
                $tabs.responsiveTabs('startRotation', 1000);
            });
            $('#stop-rotation').on('click', function() {
                $tabs.responsiveTabs('stopRotation');
            });
            $('#start-rotation').on('click', function() {
                $tabs.responsiveTabs('active');
            });
            $('#enable-tab').on('click', function() {
                $tabs.responsiveTabs('enable', 3);
            });
            $('#disable-tab').on('click', function() {
                $tabs.responsiveTabs('disable', 3);
            });
            $('.select-tab').on('click', function() {
                $tabs.responsiveTabs('activate', $(this).val());
            });

        });

// header affix top
function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 100,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();

// header affix 

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

// collapse
$(".open-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('show');
});

$(".close-button").on("click", function() {
  $(this).closest('.collapse-group').find('.collapse').collapse('hide');
});

//date picker
$('#avability-date .input-group.date').datepicker({
	maxViewMode: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true
});

$('#enquiry-date .input-group.date').datepicker({
	maxViewMode: 0,
    calendarWeeks: true,
    autoclose: true,
    todayHighlight: true
});

// Single Nav
$(window).scroll(function() {

    if ($(this).scrollTop()>150)
     {
        $('#single-nav').fadeIn();
     }
    else
     {
      $('#single-nav').fadeOut();
     }
 });

// scroll
offsetHeight = 150;

$('body').scrollspy({ 
  target: '#single-nav',
  offset: offsetHeight
});

// Add smooth scrolling on all links inside the navbar
$("#single-nav a").on('click', function(event) {
// Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {
  // Prevent default anchor click behavior
    event.preventDefault();
    // Store hash
    var hash = this.hash;
    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
        scrollTop: $(hash).offset().top-110
    }, 800, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      // window.location.hash = hash;
    });
  }  // End if
});


// google translate
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}