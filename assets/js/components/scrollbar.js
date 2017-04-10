// Scrollbar
var Scrollbar = function() {
  'use strict';

  // Handle Scrollbar
  var handleScrollbar = function() {
    jQuery('.js__scrollbar').mCustomScrollbar({
      theme: 'minimal'
    });
  }


  return {
    init: function() {
      handleScrollbar(); // initial setup for Scrollbar
    }
  }
}();

jQuery(document).ready(function() {
  Scrollbar.init();
});
