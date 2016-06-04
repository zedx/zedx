$(function() {

  $(".select2").select2();
  $('[data-toggle="tooltip"]').tooltip();
  $('.metis-menu').metisMenu();

  $('#localisation-popover').popover({
    container: 'body',
    trigger: "click",
    html: true
  });

  $(document).on("click", "#localisation-close", function(e) {
    $("#localisation-popover").popover('hide');
  });

  $('body').on('click', function(e) {
    $('[data-toggle="popover"]').each(function() {
      if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
        $(this).popover('hide');
      }
    });
  });

  // Dialog show event handler
  $('.confirmationDialog').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body .modal-message').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var parent = $(e.relatedTarget).parent();
      $(this).find('.modal-footer #confirm').data('parent', parent);
  });

})
