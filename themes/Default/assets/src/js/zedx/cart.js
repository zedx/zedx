$(document).ready(function() {
  $(document).on('click', '.number-spinner [data-dir]', function() {
    var btn = $(this),
      oldValue = btn.closest('.number-spinner').find('input').val().trim(),
      newVal = 0;
    if (btn.attr('data-dir') == 'up') {
      newVal = parseInt(oldValue) + 1;
    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    var spiner = btn.closest('.number-spinner'),
      unitPrice = parseFloat(spiner.data('unit-price')),
      totalPrice = parseFloat(newVal * unitPrice).toFixed(2);

    spiner.find('input').val(newVal);

    $('#cart-total-price').text(totalPrice);
  });
});
