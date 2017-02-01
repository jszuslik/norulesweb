// Global Javascript Initialization
var Global = function() {
  'use strict';

  // Bootstra Components
  var handleBootstrapComponents = function() {
    // Bootstrap Carousel
    jQuery('.carousel').carousel({
      interval: 5000,
      pause: 'hover'
    });

    // Tooltips
    jQuery('.tooltips').tooltip();
    jQuery('.tooltips-show').tooltip('show');
    jQuery('.tooltips-hide').tooltip('hide');
    jQuery('.tooltips-toggle').tooltip('toggle');
    jQuery('.tooltips-destroy').tooltip('destroy');

    // Popovers
    jQuery('.popovers').popover();
    jQuery('.popovers-show').popover('show');
    jQuery('.popovers-hide').popover('hide');
    jQuery('.popovers-toggle').popover('toggle');
    jQuery('.popovers-destroy').popover('destroy');
  };

  // Scroll To Section
  var handleScrollToSection = function() {
    jQuery(function() {
      jQuery('a[href*="#js__scroll-to-"]:not([href="#js__scroll-to-"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = jQuery(this.hash);
          target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            jQuery('html,body').animate({
              scrollTop: target.offset().top - 90
            }, 1000);
            return false;
          }
        }
      });
    });
  };

  // Handle Promo Section
  var handlePromoSection = function() {
    jQuery('.js__fullwidth-img').each(function() {
      jQuery(this).css('background-image', 'url(' + jQuery(this).children('img').attr('src') + ')');
      jQuery(this).children('img').hide();
    });
  };

  // Handle Overlay
  var handleOverlay = function() {
    var overlay = jQuery('.js__bg-overlay'),
      headerOverlay = jQuery('.js__header-overlay'),
      trigger = jQuery('.js__trigger');

    trigger.on('click', function() {
      overlay.toggleClass('-is-open');
      headerOverlay.toggleClass('-is-open');
      trigger.toggleClass('-is-active');
    });
  };

  // Vertical Center Aligned
  // Note! This works only with promo block and background image via CSS.
  var handleVerticalCenterAligned = function() {
    jQuery('.js__ver-center-aligned').each(function() {
      jQuery(this).css('padding-top', jQuery(this).parent().height() / 2 - jQuery(this).height() / 2);
    });
    jQuery(window).resize(function() {
      jQuery('.js__ver-center-aligned').each(function() {
        jQuery(this).css('padding-top', jQuery(this).parent().height() / 2 - jQuery(this).height() / 2);
      });
    });
  };

  // handle group element heights
  var handleEqualHeight = function() {
   jQuery('[data-auto-height]').each(function() {
      var parent = jQuery(this);
      var items = jQuery('[data-height]', parent);
      var height = 0;
      var mode = parent.attr('data-mode');
      var offset = parseInt(parent.attr('data-offset') ? parent.attr('data-offset') : 0);

      items.each(function() {
        if (jQuery(this).attr('data-height') == "height") {
          jQuery(this).css('height', '');
        } else {
          jQuery(this).css('min-height', '');
        }

        var height_ = (mode == 'base-height' ? jQuery(this).outerHeight() : jQuery(this).outerHeight(true));
        if (height_ > height) {
          height = height_;
        }
      });

      height = height + offset;

      items.each(function() {
        if (jQuery(this).attr('data-height') == "height") {
          jQuery(this).css('height', height);
        } else {
          jQuery(this).css('min-height', height);
        }
      });

      if(parent.attr('data-related')) {
        jQuery(parent.attr('data-related')).css('height', parent.height());
      }
   });       
  };

  return {
    init: function() {
      handleBootstrapComponents(); // initial setup for Bootstrap Components
      handleScrollToSection(); // initial setup for Scroll To Section
      handlePromoSection(); // initial setup for Promo Section
      handleOverlay(); // initial setup for Overlay
      handleVerticalCenterAligned(); // initial setup for Vertical Center Aligned
      handleEqualHeight(); // initial setup for Equal Height
    }
  }
}();

jQuery(document).ready(function() {
  Global.init();
});
