/**
 * Clinic Website Control - Admin Interactivity
 */
(function ($) {
  'use strict';

  $(document).ready(function () {
    // Dynamic color code preview next to color inputs
    $('input[type="color"]').on('input change', function () {
      var val = $(this).val();
      $(this).next('.cwc-color-code').text(val);
    });

    // Auto-fill raw phone on formatted phone blur
    $('#phone').on('blur', function () {
      var val = $(this).val();
      var digits = val.replace(/[^0-9+]/g, '');
      if (!$('#phone_raw').val()) {
        $('#phone_raw').val(digits);
      }
    });
  });

})(jQuery);
