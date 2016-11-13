<div id="adFields" data-currency="{{ isset($ad) ? getAdCurrency($ad, '{currency}') : '' }}" data-fields="{{ old('fields') ? json_encode(old('fields')) : (isset($fields) ? $fields : '[]') }}"></div>
<script type="x-tmpl-mustache" id="adFieldsTemplate_multiple">
<div class="form-group">
  <label class="label-text" for="field_@{{id}}">@{{name}}</label>
  <br />
  @{{#select}}
  <div class="checkbox checkbox-inline checkbox-primary">
    @{{#selected}}
    <input type="checkbox" id="field_@{{parentId}}_@{{id}}" checked name="fields[@{{parentId}}][]" value="@{{id}}">
    @{{/selected}}

    @{{^selected}}
    <input type="checkbox" id="field_@{{parentId}}_@{{id}}" name="fields[@{{parentId}}][]" value="@{{id}}">
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
  <select class="appendSelect2 select2 w100" id="field_@{{id}}" name="fields[@{{id}}]">
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
@{{#input}}
  <input type="text" id="field_@{{id}}" class="form-control" name="fields[@{{id}}]" value="@{{value}}">
@{{/input}}

@{{#inputGroup}}
  <div class="input-group">
     <input type="text" id="field_@{{id}}" class="form-control" name="fields[@{{id}}]" value="@{{value}}">
     <div class="input-group-addon">
        @{{unit}}
     </div>
  </div>
@{{/inputGroup}}
</div>
</script>
<script type="x-tmpl-mustache" id="adFieldsTemplate_date">
</script>
<script type="x-tmpl-mustache" id="adFieldsTemplate_dateRange">
</script>
