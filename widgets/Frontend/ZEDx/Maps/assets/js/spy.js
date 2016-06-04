jQuery(function($){
  var defaultMap = $("#ZxMap").data("default");
  if (defaultMap) {
    $(document).trigger("ZxMapLoad", defaultMap);
  }
	$(".mapLoad").click(function () {
		var code = $(this).data("code");
		$(document).trigger("ZxMapLoad", code);
	})
});
