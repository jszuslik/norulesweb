// Portfolio
var Portfolio = function() {
  'use strict';

  // Handle Portfolio
  var handlePortfolio = function() {
    // init cubeportfolio
    jQuery('.js__grid-faq').cubeportfolio({
        filters: '.js__filters-faq',
        defaultFilter: '*',
        animationType: 'sequentially',
        gridAdjustment: 'default',
        displayType: 'default',
        caption: 'expand',
        gapHorizontal: 0,
        gapVertical: 0
    });
  };

  return {
    init: function() {
      handlePortfolio(); // initial setup for Portfolio
    }
  }
}();

jQuery(document).ready(function() {
  Portfolio.init();
});