<div class="panel @if (Route::is('ad.preview')) ad-preview panel-primary @else panel-default @endif">
    @if (Route::is('ad.preview'))
    <div class="panel-heading">
      <h4 class="text-center"><i class="fa fa-home"></i> {!! trans('frontend.ad.preview_mode') !!} </h4>
      <div class="text-center fs18">
      @if ($ad->adstatus->title == 'validate')
        <span class="label label-success"><i class="fa fa-check"></i> {!! trans('frontend.ad.validated_ad') !!}</span>
      @elseif ($ad->adstatus->title == 'pending')
        <span class="label label-info"><i class="fa fa-hourglass-start"></i> {!! trans('frontend.ad.pending_ad') !!}</span>
      @elseif ($ad->adstatus->title == 'expired')
        <span class="label label-warning"><i class="fa fa-hourglass-end"></i> {!! trans('frontend.ad.expired_ad') !!}</span>
      @elseif ($ad->adstatus->title == 'banned')
        <span class="label label-danger"><i class="fa fa-ban"></i> {!! trans('frontend.ad.banished_ad') !!}</span>
      @elseif ($ad->adstatus->title == 'trashed')
        <span class="label label-danger"><i class="fa fa-trash"></i> {!! trans('frontend.ad.trashed_ad') !!}</span>
      @endif
      </div>
    </div>
    @endif
    <div class="panel-body">
        <div class="panel-title">
          <div class="ad-details-header">
            <h1 id="zedx-ad-title" class="ad-title no-margin mb10">{{ $ad->content->title }}</h1>
            <div class="ad-details-header-info fs13">
              @if ($ad->adstatus->title == 'validate')
              <small>{!! trans('frontend.user.ad.published_at', ['time' => $ad->published_at->diffForHumans()]) !!}</small>
              @elseif ($ad->adstatus->title == 'expired')
              <small>{!! trans('frontend.user.ad.expired_at', ['time' => $ad->expired_at->diffForHumans()]) !!}</small>
              @else
              <small>{!! trans('frontend.user.ad.created_at', ['time' => $ad->created_at->diffForHumans()]) !!}</small>
              @endif
            </div>
            @if (($price = $ad->price()) && isset($price->pivot))
            <h2 class="ad-price-label text-center fs18 no-margin">
              <span class="ad-price">{{ number_format($price->pivot->value, trans('frontend.format.number.decimals') , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }}
              </span>
              <span class="ad-currency">{{ getAdCurrency($ad, $price->unit) }}</span>
            </h2>
            @endif
          </div>
        </div>

        {{--*/ $photos = $ad->photos;  /*--}}
        @if ($photos->count())
        <div class="row">
          <div class="col-md-12">
            <ul class="bxslider">
              @foreach ($photos as $photo)
                <li><img class="img-rounded center-block" src="{{ image_route('large', $photo->path) }}" /></li>
              @endforeach
            </ul>
          </div>
        </div>

        @if ($photos->count() > 1)
        <div class="ad-photos">
          <div id="bx-pager" class="row">
            @foreach ($photos as $key => $photo)
              <a data-slide-index="{{ $key }}" href=""><img class="img-rounded small-image" src="{{ image_route('thumb', $photo->path) }}" /></a>
            @endforeach
          </div>
        </div>
        @endif
        @endif

        @if ($ad->videos()->count())
        <div class="row">
          <div class="ad-videos" id="videos" data-videos="{{ $ad->videos }}">
            <script type="x-tmpl-mustache" id="videoTemplate">
            @{{#.}}
              <div class="col-md-3" id="video_@{{link}}">
                  <div class="thumbnail">
                    <div class="js-lazyYT" data-youtube-id="@{{link}}" data-ratio="16:9"></div>
                  </div>
                <input type="hidden" name="videos[][link]" value="@{{link}}">
              </div>
            @{{/.}}
            </script>
          </div>
        </div>
        @endif

        @if ($fields->count())
        <div class="row">
          <div class="col-md-12">
            <div class="ad-fields">
              <table class="table table-striped table-hover ">
                <tbody id="adFields" data-currency="{{ getAdCurrency($ad, '{currency}') }}" data-fields="{{ $fields }}" data-type = "show" data-category-api-url= "{{ route('zxajax.category.searchFields', $ad->category->id) }}">
                </tbody>
              </table>
              <script type="x-tmpl-mustache" id="adFieldsTemplate_multiple">
                <tr>
                  <td><strong>@{{name}}</strong></td> :
                  <td>
                    @{{#select}}
                      @{{#selected}}
                      <span class="label label-primary margin-right-10">@{{name}} @{{unit}}</span>
                      @{{/selected}}
                    @{{/select}}
                  </td>
                </tr>
              </script>
              <script type="x-tmpl-mustache" id="adFieldsTemplate_selectbox">
                <tr>
                  <td><strong>@{{name}}</strong></td> :
                    @{{#select}}
                      @{{#selected}}
                      <td>@{{name}} @{{unit}}</td>
                      @{{/selected}}
                    @{{/select}}
                </tr>
              </script>
              <script type="x-tmpl-mustache" id="adFieldsTemplate_input" data-format-decimals = "{{ trans('frontend.format.number.decimals') }}" data-format-dec = "{{ trans('frontend.format.number.dec_point') }}" data-format-thousands = "{{ trans('frontend.format.number.thousands_sep') }}" >
              @{{#value}}
                <tr>
                  <td><strong>@{{name}}</strong></td> :
                @{{#input}}
                  <td>@{{value}}</td>
                @{{/input}}

                @{{#inputGroup}}
                    <td>@{{value}} @{{unit}}</td>
                @{{/inputGroup}}
                </tr>
              @{{/value}}
              </script>
            </div>
          </div>
        </div>
        @endif
        <div class="row">
          <div class="col-md-12">
            <div class="ad-description">{{ $ad->content->body }}</div>
          </div>
        </div>
    </div>
</div>
