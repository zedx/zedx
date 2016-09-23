$(document).ready(function() {
  $('.bxslider').bxSlider({
    pagerCustom: '#bx-pager'
  });

  function in_array(needle, haystack) {
    var key = '';

    for (key in haystack) {
      if (haystack[key] == needle) {
        return true;
      }
    }

    return false;
  }
  String.prototype.trimToLength = function(m) {
    return (this.length > m) ? jQuery.trim(this).substring(0, m) + "..." : this;
  };

  var $adFields = $("#adFields");
  var isSearch = $adFields.data("type") === "search";
  var isAdShow = $adFields.data("type") === "show";
  var adFields = $adFields.data("fields");
  var currency = $adFields.data("currency");

  var renderSelectbox = function(field) {
    field.show = false;
    $.each(field.select, function(key, option) {
      field.select[key].parentId = field.id;
      field.select[key].parentName = field.name;
      option.unit = field.unit;

      if (adFields.hasOwnProperty(field.id)) {
        var values = isSearch ? adFields[field.id].value : adFields[field.id];
        option.selected = in_array(option.id, $.makeArray(values));
      }else{
        option.selected = false;
      }

      if (option.selected) {
        field.show = true;
      }
    });

    if (! field.show && isAdShow) {
      return '';
    }
    var templateType = !isSearch && field.type == 3 || isSearch && in_array(field.type, ['2', '3']) ? 'multiple' : 'selectbox';

    return Mustache.to_html($("#adFieldsTemplate_" + templateType).html(), field);
  }

  function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + (Math.round(n * k) / k)
          .toFixed(prec);
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
      .split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
      .length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1)
        .join('0');
    }
    return s.join(dec);
  }

  var formatNumber = function(element, number) {
    $element = $(element);
    var decimals = $element.data("format-decimals"),
      dec_point = $element.data("format-dec"),
      thousands_sep = $element.data("format-thousands");

    if (decimals === undefined || decimals === null) {
      return number;
    }
    return number_format(number, decimals, dec_point, thousands_sep);
  }

  var renderInput = function(field) {
    field.minmax = field.search !== null;
    field.input = true;
    field.inputType = field.type == 4 ? 'number' : 'text';
    if (adFields.hasOwnProperty(field.id)) {
      if (isSearch) {
        if (field.minmax) {
          field._from = adFields[field.id].value.min;
          field._to = adFields[field.id].value.max;
        }
      }else{
        var value = adFields[field.id];
        field.value = field.is_format ? formatNumber("#adFieldsTemplate_input", value) : value;
      }
    }
    if (field.unit !== "" && field.input === true) {
      field.inputGroup = true;
      field.input = false;
    } else {
      field.inputGroup = false;
    }

    return Mustache.to_html($("#adFieldsTemplate_input").html(), field);
  }

  var syncFields = function(fields) {
    $("#adFields").html('');
    var contentHtml;

    $.each(fields, function(key, field) {
      contentHtml = '';
      if (field.unit == '{currency}') {
        field.unit = currency;
      }
      if (in_array(field.type, ['1', '2', '3'])) {
        contentHtml = renderSelectbox(field);
      }else{
        contentHtml = renderInput(field);
      }

      $("#adFields").append(contentHtml);
    });

    $(".appendSelect2").select2();
    $(".rangeslider").ionRangeSlider({
      prettify: true,
      hasGrid: true,
    });
  }

  var updateFields = function(url) {
    if (!url) {
      $("#adFields").html("");
    }else{
      $.getJSON( url, function( fields ) {
        syncFields(fields);
      });
    }
  }

  $("#category_id").change(function() {
    var url = $("option:selected", this).data("category-api-url");
    updateFields(url);
  });

  if (!isAdShow) {
    $("#category_id").trigger("change");
  }else{
    var url = $adFields.data("category-api-url");
    updateFields(url);
  }
  /*
  $('.summernote').summernote({
    onkeyup: function(e) {
      $(".summernote").val($(".summernote").code());
    },
    height: 180,
    focus: false,
    tabsize: 2
  });
*/

  // Geolocalisation Google Maps autocomplete
  function GeoFormatResult(data) {
    var markup = '<div class="row-fluid"><div class="span12 profile-info"><strong><i class="fa fa-map-marker"></i> ' + data.formatted_address + '</strong></div></div>';
    return markup;
  }

  function GeoFormatSelection(data) {
    $("#ZxAjaxGeo").val(JSON.stringify(data));
    var maxLength = $("#ZxAjaxGeo").data("max-length");
    if (data.formatted_address) {
      return data.formatted_address.trimToLength(maxLength);
    }
  }
  $("#ZxAjaxGeo").select2({
    minimumInputLength: 1,
    allowClear: true,
    id: "formatted_address",
    blurOnChange: true,
    openOnEnter: false,
    ajax: {
      url: "https://maps.google.com/maps/api/geocode/json",
      type: "GET",
      dataType: 'json',
      data: function(term, page) {
        return {
          address: term, // search term
          sensor: false
        };
      },
      results: function(data, page) {
        return {
          results: data.results
        };
      }
    },
    initSelection: function(element, callback) {
      var formatted_address = $(element).val();
      if (formatted_address !== "") {
        $.ajax("https://maps.google.com/maps/api/geocode/json", {
          data: {
            sensor: false,
            address: formatted_address,
          },
          dataType: "json",
          type: "GET",
        }).done(function(data, page) {
          var lat = $("#ZxAjaxGeo").data("zedx-location-lat"),
            lng = $("#ZxAjaxGeo").data("zedx-location-lng"),
            selectedVal = data.results[0];
          $.each(data.results, function(index, val) {
            if (val.geometry.location.lat === lat && val.geometry.location.lng === lng) {
              selectedVal = val;
              return;
            }
          });
          callback(selectedVal);
        });
      }
    },
    formatResult: GeoFormatResult, // omitted for brevity, see the source of this page
    formatSelection: GeoFormatSelection, // omitted for brevity, see the source of this page
    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
    escapeMarkup: function(m) {
      return m;
    } // we do not want to escape markup since we are displaying html in results
  });
  $("#findme").click(function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        $("#ZxAjaxGeo").data("zedx-location-lat", position.coords.latitude);
        $("#ZxAjaxGeo").data("zedx-location-lng", position.coords.longitude);
        $("#ZxAjaxGeo").select2("val", position.coords.latitude + "," + position.coords.longitude);
      });
    }
  });

  // Photos
  var photos = $("#photos").data("photos");
  if (photos && photos.length > 0) {
    var html = Mustache.to_html($("#photoTemplate").html(), photos);
    $("#photos").append(html);
  }

  var appendNewPhoto = function() {
    var $photos = $("#photos");
    var emptyPhoto = $photos.children('[data-empty-photo]').length;
    if ($photos.data("can-add-photo") == '1' && !emptyPhoto) {
      var nbrMax = parseInt($photos.data("max-photos"));
      nbrMax = nbrMax - $photos.children('[data-photo]').length;
      if (nbrMax > 0) {
        var html = Mustache.to_html($("#newPhotoTemplate").html());
        $("#photos").append(html);
      }
    }
  }
  appendNewPhoto();

  var updatePhotoPreview = function(src, $this) {
    var emptyPhotoAttr = $this.attr('data-empty-photo');
    if (typeof emptyPhotoAttr !== typeof undefined && emptyPhotoAttr !== false) {
      var $photos = $("#photos"),
      updateText = $photos.data("text-update"),
      deleteText = $photos.data("text-delete");

      $this.removeAttr('data-empty-photo');
      $this.attr('data-photo', '');
      $this.find('.image').html('<center><img class="img-rounded" src="' + src + '" /></center');
      var $uploadButton = $this.find('.addAdPhotos').parent();
      $uploadButton.removeClass('btn-block');
      $uploadButton.children('.text').text(updateText);
      var deleteContent = '<div class="btn-group">';
      deleteContent += '<button type="button" class="btn btn-xs btn-danger remove-photo"><i class="fa fa-remove"></i> ' + deleteText + '</button>';
      deleteContent += '</div>';

      $(deleteContent).insertBefore($uploadButton.parent());
    }else{
      $this.find('.image').html('<center><img class="img-rounded" src="' + src + '" /></center');
    }
  }

  var makeSmartPreview = function($this) {
    if (typeof (FileReader) != "undefined") {
      var src,
        html,
        regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/,
        files = $this[0].files;

      $(files).each(function (index, file) {
        if (regex.test(file.name.toLowerCase())) {
          var reader = new FileReader();
          reader.onload = function (e) {
            src= e.target.result;
            var existingPhoto = $this.closest('.uploadedPhoto');
            updatePhotoPreview(src, existingPhoto);
            appendNewPhoto();
          }
          reader.readAsDataURL(file);
        } else {
          alert(file.name + " is not a valid image file.");
          return false;
        }
      });

    } else {
      alert("This browser does not support HTML5 FileReader.");
    }
  }
  $(document).on("change", ".addAdPhotos", function () {
    makeSmartPreview($(this));
  });

  $(document).on("click", ".remove-photo", function() {
    $(this).closest('[data-photo]').remove();
    appendNewPhoto();
  });

  // Videos
  var getNbrVideoToAdd = function() {
    var $videos = $("#videos"),
      nbrMax = parseInt($videos.data("max-videos")),
      nbrMax = nbrMax - $videos.children('[data-video]').length;

    return nbrMax;
  }
  var youtube_parser = function(url) {
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    if (match && match[7].length == 11) {
      return match[7];
    } else {
      return null;
    }
  }
  var _videos = [];
  var videos = $("#videos").data("videos");
  if (videos && videos.length > 0) {
    var html = Mustache.to_html($("#videoTemplate").html(), videos);
    $("#videos").append(html);
    $('.js-lazyYT').lazyYT();
    $('.ytp-thumbnail').YouTubeModal({autoplay:true, width:640, height:480});
  }

  if (getNbrVideoToAdd() == 0) {
    $('#form-add-video').addClass('hide');
  }

  $("#add_video").on("click", function() {
    var nbrMax = getNbrVideoToAdd();
    if (nbrMax > 0) {
      var videoUrl = $('#inputVideo').val();
      if ((videoId = youtube_parser(videoUrl)) !== null && _videos.indexOf(videoId) === -1) {
        var html = Mustache.to_html($("#videoTemplate").html(), [{
          link: videoId
        }]);
        _videos.push(videoId);
        $("#videos").append(html);
        $('.js-lazyYT').lazyYT();
        $('.ytp-thumbnail').YouTubeModal({autoplay:true, width:640, height:480});
      }
      $('#inputVideo').val("");
      if (getNbrVideoToAdd() == 0) {
        $('#form-add-video').addClass('hide');
      }
    }
  });

  $(document).on("click", ".remove-video", function() {
    var videoId = $(this).data('video-link');
    var index;
    $('#video_' + videoId).remove();
    if ((index = _videos.indexOf(videoId)) > -1) {
      _videos.splice(index, 1);
    }
    $('#form-add-video').removeClass('hide');
  });

  // Build Search Url
  var obj_zx_url = new Object();
  obj_zx_url.fields_input = new Object();
  obj_zx_url.fields_select = new Object();

  function __init($this) {
    _val = $this.val();
    _zxty = $this.data("zedx-type");
    if (_zxty !== undefined) {
      if (_zxty == 'checkbox' && $this.is(":checked")) {
        field_id = $this.data("zedx-field-id");
        if (typeof(obj_zx_url.fields_select[field_id]) === "object") {
          var _oldVal = obj_zx_url.fields_select[field_id].val;
          var _oldText = obj_zx_url.fields_select[field_id].text;
          obj_zx_url.fields_select[field_id].val = _oldVal + '|' + _val;
          obj_zx_url.fields_select[field_id].text = _oldText + '-' + $this.data("zedx-field-text");
        }else {
          obj_zx_url.fields_select[field_id] = {
            "id": field_id,
            "name": $this.data("zedx-field-name"),
            "text": $this.data("zedx-field-text"),
            "val": _val
          }
        }
      }else if (_zxty == 'select') {
        field_id = $this.data("zedx-field-id");
        obj_zx_url.fields_select[field_id] = {
          "id": field_id,
          "name": $this.data("zedx-field-name"),
          "text": $this.find(':selected').text(),
          "val": _val
        };
      } else if (_zxty == 'field_range') {
        field_id = $this.data("zedx-field-id");
        if (typeof(obj_zx_url.fields_input[field_id]) !== "object") {
          obj_zx_url.fields_input[field_id] = new Object();
        }
        obj_zx_url.fields_input[field_id].name = $this.data("zedx-field-name");
        var value = _val.split(";"),
          fieldMin = value[0] == $this.data("min") ? "*" : value[0],
          fieldMax = value[1] == $this.data("max") ? "*" : value[1];
        obj_zx_url.fields_input[field_id].min = {
          "id": field_id,
          "text": fieldMin,
          "val": fieldMin
        };
        obj_zx_url.fields_input[field_id].max = {
          "id": field_id,
          "text": fieldMax,
          "val": fieldMax
        };
      } else if (_zxty == 'keywords') {
        obj_zx_url.query = _val;
      } else if (_zxty == 'category') {
        obj_zx_url.category = {
          "name": $this.find(':selected').text(),
          "val": _val
        };
      } else if (_zxty == 'location') {
        if (!$this.data("zedx-location-address")) {
          return;
        }
        obj_zx_url.location = {
          "radius": $this.data("zedx-location-radius"),
          "lng": $this.data("zedx-location-lng"),
          "lat": $this.data("zedx-location-lat"),
          "address": $this.data("zedx-location-address")
        };
      }
    }
  }

  function construct_url() {
    url_text = "";
    obj_zx_url.fields_input = new Object();
    obj_zx_url.fields_select = new Object();

    $(".zedx-listen-search").each(function() {
      __init($(this));
    })
    // Create url
    url_text += (typeof(obj_zx_url.category) === "object" && obj_zx_url.category.name !== "") ? obj_zx_url.category.name + "/" : "categories/";
    url_category = (typeof(obj_zx_url.category) === "object" && obj_zx_url.category.val != 0) ? "c=" + obj_zx_url.category.val : null; // c=<cat_id>
    url_text += (typeof(obj_zx_url.location) === "object" && obj_zx_url.location.address != "") ? obj_zx_url.location.address + "/" : "-/";
    url_geolocation = (typeof(obj_zx_url.location) === "object") ? "lat=" + obj_zx_url.location.lat + "&lng=" + obj_zx_url.location.lng + "&radius=" + obj_zx_url.location.radius : null; // lat=<location_lat>&lng=<location_lng>&radius=<location_radius>
    url_fields = "";
    $.each(obj_zx_url.fields_input, function(field_id, value) {
      if (typeof(value.min) !== "object") {
        value.min = new Object();
        value.min.text = "min"
        value.min.val = "0";
      }
      if (typeof(value.max) !== "object") {
        value.max = new Object();
        value.max.text = "max";
        value.max.val = "0";
      }
      url_text += (value.max.val != 0 || value.min.val != 0) ? value.name + "-" + value.min.text + "-to-" + value.max.text + "-" : "";
      url_fields += (value.max.val != 0 || value.min.val != 0) ? "f" + field_id + "a" + value.min.val + "b" + value.max.val : ""; //f<field_id>a<field_value_min>b<field_value_max>
    });
    $.each(obj_zx_url.fields_select, function(field_id, value) {
      url_text += (value.val != 0) ? value.name + "-" + value.text + "-" : "";
      url_fields += (value.val != 0) ? "f" + field_id + "a" + value.val : ""; //f<field_id>a<field_value>
    });
    url_code = (typeof(obj_zx_url.query) !== "undefined") ? "?q=" + encodeURIComponent(obj_zx_url.query).replace(/%20+/g, '+') : "?q=";
    if (url_category !== null) {
      url_code += "&" + url_category;
    }
    if (url_geolocation !== null) {
      url_code += "&" + url_geolocation;
    }
    if (url_fields !== "") {
      url_code += "&fields=" + url_fields;
    }

    // Purify Text & create url
    var zedx_url_search = url_text.toLowerCase().replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.? ])+/g, '-').replace(/^(-)+|(-)+$/g, '') + url_code;
    return zedx_url_search.replace("/?", "?");
  }
  //radius
  function radius(p1, p2) {
    var xs = 0;
    var ys = 0;
    xs = p2.lat - p1.lat;
    xs = xs * xs;
    ys = p2.lng - p1.lng;
    ys = ys * ys;
    return (Math.sqrt(xs + ys) / 2);
  }
  // Geolocalisation Google Maps autocomplete
  $("#findmeSearch").click(function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        $("#ZxAjaxGeo-search").data("zedx-location-lat", position.coords.latitude);
        $("#ZxAjaxGeo-search").data("zedx-location-lng", position.coords.longitude);
        $("#ZxAjaxGeo-search").select2("val", position.coords.latitude + "," + position.coords.longitude);
      });
    }
  });

  function GeoSearchFormatResult(data) {
    var markup = '<i class="fa fa-map-marker pad-select"></i> ' + data.formatted_address + '';
    return markup;
  }

  function GeoSearchFormatSelection(data) {
    var maxLength = $("#ZxAjaxGeo-search").data("max-length");
    var _radius = radius(data.geometry.viewport.southwest, data.geometry.viewport.northeast);
    var lat = data.geometry.location.lat;
    var lng = data.geometry.location.lng;
    var address = data.formatted_address;
    $("#ZxAjaxGeo-search").data("zedx-location-lat", lat);
    $("#ZxAjaxGeo-search").data("zedx-location-lng", lng);
    $("#ZxAjaxGeo-search").data("zedx-location-address", address);
    $("#ZxAjaxGeo-search").data("zedx-location-radius", _radius);
    obj_zx_url.location = {
      "radius": _radius,
      "lng": lng,
      "lat": lat,
      "address": address
    };
    if (data.formatted_address) {
      return '<i class="fa fa-map-marker pad-select"></i> ' + data.formatted_address.trimToLength(maxLength);
    }
  }
  $("#ZxAjaxGeo-search").select2({
    minimumInputLength: 1,
    allowClear: true,
    id: "formatted_address",
    blurOnChange: true,
    openOnEnter: false,
    ajax: {
      url: "https://maps.google.com/maps/api/geocode/json",
      type: "GET",
      dataType: 'json',
      data: function(term, page) {
        return {
          address: term, // search term
          components: $("#ZxAjaxGeo-search").data("components"), // Filter by country
          sensor: false
        };
      },
      results: function(data, page) {
        return {
          results: data.results
        };
      }
    },
    initSelection: function(element, callback) {
      var id = $(element).val();
      if (id !== "") {
        $.ajax("https://maps.google.com/maps/api/geocode/json", {
          data: {
            sensor: false,
            components: $("#ZxAjaxGeo-search").data("components"), // Filter by country
            address: id,
          },
          dataType: "json",
          type: "GET",
        }).done(function(data, page) {
          var lat = $("#ZxAjaxGeo-search").data("zedx-location-lat"),
            lng = $("#ZxAjaxGeo-search").data("zedx-location-lng"),
            selectedVal = data.results[0];
          $.each(data.results, function(index, val) {
            if (val.geometry.location.lat === lat && val.geometry.location.lng === lng) {
              selectedVal = val;
              return;
            }
          });
          callback(selectedVal);
        });
      }
    },
    formatResult: GeoSearchFormatResult, // omitted for brevity, see the source of this page
    formatSelection: GeoSearchFormatSelection, // omitted for brevity, see the source of this page
    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
    escapeMarkup: function(m) {
      return m;
    } // we do not want to escape markup since we are displaying html in results
  });

  $("#ZxAjaxGeo-search").on("select2-removed", function (e) {
    $this = $(this);
    $this.select2("val", "");
    $this.data("zedx-location-lat", null);
    $this.data("zedx-location-lng", null);
    $this.data("zedx-location-address", null);
    $this.data("zedx-location-radius", null);
    obj_zx_url.location = undefined;
    e.preventDefault();
  });

  $('#search-ads-order-by').change(function(e) {
    $('#search-ads-us').find('.active').find('a').trigger('click');
  });

  $(".zedx-search").on("click", function(e) {
    e.preventDefault();

    var $this = $(this),
        _tmp_path = $this.data("zedx-url-search"),
        _url = _tmp_path + "/" + construct_url() + "&us=",
        us = $this.data("zedx-us");

    _url += us !== undefined ? us : 'all';
    _url += '&o=' + $("#search-ads-order-by").val();

    $(location).attr('href', _url);
  });


  // Ad/Show
  $(".small-image").on('click', function() {
    $this = $(this);
    var mainImage = $('#main_image'),
        path = $this.data('path'),
        src = mainImage.data('rootPath') + '/' + $this.data('path');

    mainImage.attr("src", src);
  });

  // Contact Announcer
  var errorsToList= function(errors) {
      if (!$.isPlainObject(errors)) {
        return errors;
      }

      var html = '<ul>';
      $.each(errors, function(name, content) {
        html += '<li>' + content[0] + '</li>';
      });

      html += '</ul>';
      return html;
    }

    $('#sendMailForm').ajaxForm({
        beforeSubmit: function() {
            $('#sendMailForm').find('#contact-response #contact-respose-success').addClass('hide');
            $('#sendMailForm').find('#contact-response #contact-respose-fail').addClass('hide');
            $('#sendMailForm').find('#contact-response #contact-respose-error').addClass('hide');
        },
        success: function(responseText, statusText, xhr, $form) {
            var subClass = responseText.error ? 'fail' : 'success';
            var response = responseText.message;
            var response = responseText.error ? errorsToList(response) : response;
            $('#sendMailForm').find('#contact-response #contact-respose-' + subClass)
              .removeClass('hide')
              .html(response);

            if (!responseText.error) {
                $('#sendMailForm').clearForm();

                $('#contactAction').modal('hide');

                $.notify({
                  icon: 'fa fa-check-square-o',
                  message: response
                },{
                  type: 'success',
                  delay: 2000,
                });
            }
        },
        error: function() {
            $('#sendMailForm').find('#contact-response #contact-respose-error').removeClass('hide');
        },
        url: $('#sendMailForm').data('url'),
        type: 'post',
    });

  // Show Phone number
  $('#showPhoneNumber').on('click', function() {
    var token = $('meta[name="csrf-token"]').attr('content'),
      $this = $(this),
      url = $this.data('url');

    $.post(url, { _token: token }).done(function( data ) {
      $this.replaceWith('<img src="' + data + '">');
    });

  });
});
