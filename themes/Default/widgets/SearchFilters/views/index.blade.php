<form role="form">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="form-group">
      {!! Form::label("ZxAjaxGeo-search", trans("frontend.ad.search.geolocation"), ['class' => 'label-text']) !!}
      <div class="input-group">
        <input type="hidden" id="ZxAjaxGeo-search"
        data-components=""
        data-max-length = "20"
        data-zedx-type="location"
        data-zedx-location-address=""
        data-zedx-location-lat="{{ $lat }}"
        data-zedx-location-lng="{{ $lng }}"
        data-zedx-location-radius="{{ $radius }}"
        placeholder= "{!! trans('frontend.ad.search.geolocation') !!}"
        name="geolocation_id" class="w100 zedx-listen-search" value="{{ $location }}">

        <span class="input-group-btn">
        <button id="findmeSearch" class="btn btn-primary btn" type="button" style=""><i class='fa fa-map-marker'></i></button>
        </span>
      </div><!-- /input-group -->
      </div>
      @if (ZEDx\Models\Category::count() == 1)
      {{--*/ $category = ZEDx\Models\Category::first(); /*--}}
      <input type="hidden" class="zedx-listen-search" id="fist_category_id" data-zedx-type="category" name="category_id" value="{{ $category->id }}" data-category-api-url= "{{ route('zxajax.category.searchFields', $category->id) }}">
      @else
      <div class="form-group">
        {!! Form::label("category_id", trans("frontend.ad.search.category"), ['class' => 'label-text']) !!}
        <select class="select2 form-control zedx-listen-search" id="category_id" data-zedx-type="category" name="category_id">
        <option value="all">{!! trans("frontend.ad.search.choose_category") !!}</option>
        @foreach (ZEDx\Models\Category::getNestedList('name', 'id', '-') as $id => $name)
        <option value="{{ $id }}" data-category-api-url= "{{ route('zxajax.category.searchFields', $id) }}" {{ $id == $category_id ? 'selected': '' }}>
        {{ $name }}</option>
        @endforeach
        </select>
      </div>
      @endif
      <div id="adFields" data-fields="{{ isset($fields) ? json_encode($fields) : "" }}" data-type = "search"></div>
      <script type="x-tmpl-mustache" id="adFieldsTemplate_multiple">
      <div class="form-group">
        <label class="label-text" for="field_@{{id}}">@{{name}}</label>
        <br />
        @{{#select}}
        <div class="checkbox">
          @{{#selected}}
          <input type="checkbox" class="zedx-listen-search " id="field_@{{parentId}}_@{{id}}" checked value="@{{id}}" name="fields[@{{parentId}}][]" data-zedx-type="checkbox" data-zedx-field-name="@{{parentName}}" data-zedx-field-text="@{{name}}" data-zedx-field-id="@{{parentId}}">
          @{{/selected}}
          @{{^selected}}
          <input type="checkbox" class="zedx-listen-search " id="field_@{{parentId}}_@{{id}}" name="fields[@{{parentId}}][]" value="@{{id}}" data-zedx-type="checkbox"  data-zedx-field-name="@{{parentName}}" data-zedx-field-text="@{{name}}" data-zedx-field-id="@{{parentId}}">
          @{{/selected}}

          <label for="field_@{{parentId}}_@{{id}}">
           @{{name}} @{{unit}}
          </label>
        </div>
        @{{/select}}
      </div>
      </script>
      <script type="x-tmpl-mustache" id="adFieldsTemplate_selectbox">
        <div class="form-group">
        <label class="label-text" for="field_@{{id}}">@{{name}}</label>
        <select class="appendSelect2 select2 w100 zedx-listen-search" id="field_@{{id}}" data-zedx-type="select" data-zedx-field-name="@{{name}}" data-zedx-field-id="@{{id}}">
          <option value="">@{{name}}</option>
          @{{#select}}
          @{{#selected}}
          <option value="@{{id}}" selected>@{{name}} @{{unit}}</option>
          @{{/selected}}

          @{{^selected}}
          <option value="@{{id}}">@{{name}} @{{unit}}</option>
          @{{/selected}}
          @{{/select}}

        </select>
        </div>
      </script>
      <script type="x-tmpl-mustache" id="adFieldsTemplate_input">
        <div class="form-group">
        <label class="label-text" for="field_@{{id}}">@{{name}}</label>
        @{{#minmax}}
          <input type="text" class="rangeslider zedx-listen-search" data-min="@{{search.min}}" data-max="@{{search.max}}" data-step="@{{search.step}}" data-postfix=" @{{unit}}" data-type="double" data-maxPostfix="+" data-zedx-type="field_range" data-zedx-field-name="@{{name}}" data-zedx-field-id="@{{id}}" data-from="@{{_from}}" data-to="@{{_to}}" />
        @{{/minmax}}
        </div>
      </script>
    </div>
    <div class="panel-footer text-center">
      <button type="submit" class="btn btn-primary zedx-search" data-zedx-url-search="{{ route('ad.search') }}"><i class="fa fa-refresh"></i><span class="hidden-sm hidden-md"> {!! trans('frontend.ad.search.update_search') !!}</span></button>
    </div>
  </div>
</form>
