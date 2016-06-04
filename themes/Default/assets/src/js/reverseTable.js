$(function() {
  $(".reverseTable").each(function() {
    var $this = $(this);
    var newrows = [];
    $this.find("tr").each(function() {
      var i = 0;
      $(this).find("td").each(function() {
        i++;
        if (newrows[i] === undefined) {
          newrows[i] = $("<tr></tr>");
        }
        newrows[i].append($(this));
      });
    });
    $this.find("tr").remove();
    $.each(newrows, function() {
      $this.append(this);
    });
  });
});
