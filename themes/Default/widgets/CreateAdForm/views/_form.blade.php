<div class="panel-body">
  <div class="form-group {{ $errors->has('content.title') ? 'has-error' : ''}}">
    {!! Form::label("content[title]", trans("frontend.user.ad.ad_title"), ['class' => 'label-text']) !!}
    {!! Form::text("content[title]", null, ['class' => 'form-control', 'placeholder' => 'Ex : Lamborghini egoista V10 600 hp']) !!}
    {!! $errors->first('content.title', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group">
    {!! Form::label("ZxAjaxGeo", trans("frontend.user.ad.geolocation"), ['class' => 'label-text']) !!}
    <div class="input-group input-group">
      <input type="hidden" id="ZxAjaxGeo" data-max-length = "55" placeholder= "{!! trans('frontend.user.ad.choose_a_geolocation') !!}"
      name="geolocation_data" class="w100" data-zedx-location-lat="" data-zedx-location-lng=""
      value="{{ old('geolocation_data') }}">
        <span class="input-group-btn">
          <button id="findme" class="btn btn-primary btn" type="button" style=""><i class='fa fa-search'></i> {!! trans('frontend.user.ad.geolocate_me') !!}</button>
        </span>
    </div><!-- /input-group -->
  </div>
  <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label("category_id", trans("frontend.user.ad.category"), ['class' => 'label-text']) !!}
    <select class="select2 form-control" id="category_id" name="category_id">
      <option value="all">{!! trans("frontend.user.ad.choose_a_category") !!}</option>
    @foreach (ZEDx\Models\Category::all() as $category)
      <option value="{{ $category->id }}" {{ !$category->isLeaf() ? 'disabled' : '' }} data-category-api-url= "{{ route('zxajax.category.adFields', $category->id) }}" {{ old('category_id') == $category->id ? 'selected': '' }}>
      {{ str_repeat('-', $category->depth) }} {{ $category->name }}</option>
    @endforeach
    </select>
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
  </div>
  @include('widget_frontend_theme_createadform::_partials.fields')
  <div class="form-group {{ $errors->has('content.body') ? 'has-error' : ''}}">
    {!! Form::label("content[body]", trans('frontend.user.ad.description'), ['class' => 'label-text']) !!}
    {!! Form::textarea("content[body]", null, ['class' => 'form-control wysihtml5', 'placeholder' => 'Ex : Lamborghini egoista V10 600 hp']) !!}
    {!! $errors->first('content.body', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group">
    {!! Form::label("photos", trans("frontend.user.ad.photos"), ['class' => 'label-text']) !!}
  </div>
  <div id="photos" class="row" data-text-update="{!! trans('frontend.user.ad.edit') !!}" data-text-delete="{!! trans('frontend.user.ad.delete') !!}" data-can-add-photo="{{ $adtype->can_add_pic && $adtype->nbr_pic > 0 }}" data-max-photos="{{ $adtype->nbr_pic }}" data-photos="[]">

    <script type="x-tmpl-mustache" id="newPhotoTemplate">
      <div data-empty-photo class="col-md-3 uploadedPhoto">
        <div class="thumbnail">
          <span class="image"><center><i class="fa fa-picture-o" style="font-size:100px"></i></center></span>
          <div class="caption">
            <div class="btn-group btn-group-justified" role="group">
              <div class="btn-group">
                <div class="btn btn-xs btn-primary btn-file btn-block"><i class="fa fa-picture-o"></i> <span class="text">{!! trans('frontend.user.ad.add_a_photo') !!}</span> <input class="addAdPhotos" type="file" name="photos[]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </script>
    <script type="x-tmpl-mustache" id="photoTemplate">
      @{{#.}}
        <div class="col-md-3" data-photo>
          <div class="thumbnail">
            <img class="img-rounded" src="{{ image_route('medium', '') }}/@{{path}}" />
            <div class="caption">
              <button type="button" class="btn btn-xs btn-block btn-danger remove-photo"><i class="fa fa-remove"></i> {!! trans('frontend.user.ad.delete') !!}</button>
            </div>
          </div>
          <input type="hidden" name="oldPhotos[][path]" value="@{{path}}">
        </div>
      @{{/.}}
    </script>
  </div>
  <div class="form-group">
    {!! Form::label("inputVideo", trans("frontend.user.ad.videos"), ['class' => 'label-text']) !!}
    @if ($adtype->can_add_video && $adtype->nbr_video > 0)
    <div id="form-add-video" class="input-group input-group-sm">
      <input type="text" id="inputVideo" class="form-control" placeholder="https://www.youtube.com/watch?v=ujn7jEQ4ib4" />
      <span class="input-group-btn">
        <button id="add_video" class="btn btn-success" type="button">{!! trans('frontend.user.ad.add_video') !!}</button>
      </span>
    </div><!-- /input-group -->
    @else
    <div class="alert alert-info">
      <i class="fa fa-info-circle"></i> {!! trans('frontend.user.ad.not_enough_permission_to_add_video') !!}
    </div>
    @endif
  </div>
  <div id="videos" class="row" data-max-videos="{{ $adtype->nbr_video }}" data-videos="[]">
    <script type="x-tmpl-mustache" id="videoTemplate">
      @{{#.}}
        <div class="col-md-3" data-video id="video_@{{link}}">
            <div class="thumbnail">
              <div class="js-lazyYT" data-youtube-id="@{{link}}" data-ratio="16:9"></div>
              <div class="caption">
                <a href="javascript:void(0)" class="btn btn-danger btn-xs btn-block remove-video" data-video-link="@{{link}}"><i class="fa fa-remove"></i> {!! trans('frontend.user.ad.delete') !!}</a>
              </div>
            </div>
          <input type="hidden" name="videos[][link]" value="@{{link}}">
        </div>
      @{{/.}}
    </script>
  </div>
</div>
<div class="panel-footer">
  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-export"></i> {{ $submitButton }}</button>
  <div class="clearfix"></div>
</div>
