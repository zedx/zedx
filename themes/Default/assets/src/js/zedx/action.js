$(document).ready(function() {
  var token = $('meta[name="csrf-token"]').attr('content');

  /* Delete */
  $('#confirmDeleteAction').find('.modal-footer #confirm').on('click', function(){
      var $element = $(this).data('parent').children(),
        $parent = $element.closest("[data-element-parent-action]")
        url = $element.data('url');

      $.ajax({
        url: url,
        type: "DELETE",
        data: {
          _token: token
        },
        success: function() {
          $parent.fadeOut("slow");
        }
      });
  });

  /* Subscribe */
  $('#confirmSubscribeAction').find('.modal-footer #confirm').on('click', function(){
      var $element = $(this).data('parent').children(),
        url = $element.data('url');

      $.ajax({
        url: url,
        type: "PATCH",
        data: {
          _token: token
        },
        success: function() {
          window.location.reload();
        }
      });
  });
});
