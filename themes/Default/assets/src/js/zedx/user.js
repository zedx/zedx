$(document).ready(function() {

  // User Login
  $("#user-go-password-reset").on('click', function(){
    $('#user-login-form').hide();
    $('#user-password-reset-form').show();
  });

  $("#user-go-login").on('click', function(){
    $('#user-login-form').show();
    $('#user-password-reset-form').hide();
  });
  // Status
  var updateStatus = function(obj) {
    if (obj.val() == 1) {
      $("#professionnal").removeClass("hide");
    }else{
      $("#professionnal").addClass("hide");
    }
  }

  updateStatus($("#status"));

  $("#status").change(function() {
    updateStatus($(this));
  });

  // Avatar
  var isValidImage = function(fileName) {
    var fileTypes = ['jpg', 'jpeg', 'gif', 'png', 'bmp'],
      extension = fileName.split('.').pop().toLowerCase();

    return fileTypes.indexOf(extension) > -1;
  }

  var previewAvatar = function($this) {
    if (!FileReader) {
      alert("This browser does not support HTML5 FileReader.");
    }

    var src,
      files = $this[0].files;

    $(files).each(function (index, file) {
      if (isValidImage(file.name)) {
        var reader = new FileReader();
        reader.onload = function (e) {
          src= e.target.result;
          $("#user-avatar-container").html('<img id="user-avatar" src="' + src + '" class="img-circle">');
        }
        reader.readAsDataURL(file);
      } else {
        alert(file.name + " is not a valid image file.");
        return false;
      }
    });
  }

  $(document).on("change", "#user-upload-avatar", function () {
    previewAvatar($(this));
  });

})
