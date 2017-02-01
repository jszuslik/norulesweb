// Counter
var Counter = function() {
  'use strict';

  // Handle Counter
  var handleCounter = function() {
    jQuery('.js__counter').counterUp();
  }

  return {
    init: function() {
      handleCounter(); // initial setup for Counter
    }
  }
}();

jQuery(document).ready(function() {
  Counter.init();
});