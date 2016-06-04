<div class="panel panel-default">
  <div class="tabbable-panel">
    <div class="tabbable-line tabs-below">
    <ul class="nav nav-tabs">
        <li class="{{ !in_array(\Request::get('us'), ['0', '1']) ? 'active' : '' }}">
          <a href="javascript:void(0)" class="zedx-search color-darken" data-zedx-url-search="{{ route('ad.search') }}" data-zedx-us="all"><i class="fa fa-list-alt color-darken"></i> <span class="hidden-xs hidden-sm hidden-md">{!! trans('frontend.ad.search.all_ads') !!}</span></a>
        </li>
        <li class="{{ \Request::get('us') == '1' ? 'active' : ''}}">
          <a href="javascript:void(0)" class="zedx-search color-green" data-zedx-url-search="{{ route('ad.search') }}" data-zedx-us="1"><i class="fa fa-briefcase color-green"></i> <span class="hidden-xs hidden-sm hidden-md">{!! trans('frontend.ad.search.professional') !!}</span></a>
        </li>
        <li class="{{ \Request::get('us') == '0' ? 'active' : ''}}">
        <a href="javascript:void(0)" class="zedx-search color-blue" data-zedx-url-search="{{ route('ad.search') }}" data-zedx-us="0"><i class="fa fa-user color-blue"></i> <span class="hidden-xs hidden-sm hidden-md">{!! trans('frontend.ad.search.personal') !!}</span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="panel-body">
  @forelse ($ads as $ad)
     <div class="row">
      <div class="col-md-2">
        @if ($main_pic = $ad->photos()->main()->first())
        <a href="{{ route('ad.show', array($ad->id, str_slug($ad->title))) }}">
          <img class="img-responsive img-rounded" src="{{ image_route('thumb', $main_pic->path) }}" alt="">
        </a>
        @else
        <a href="{{ route('ad.show', array($ad->id, str_slug($ad->title))) }}">
          <i class="fa fa-picture-o" style="font-size:70px"></i>
        </a>
        @endif
      </div>
      <div class="col-md-7">
         <h4><a href="{{ route('ad.show', array($ad->id, str_slug($ad->title))) }}">@if ($ad->is_headline) <i class="fa fa-star color-orange"></i> @endif {{ $ad->title }}</a></h4>
        <div>
        {{ $ad->published_at->diffForHumans() }}
        </div>

      </div>
       <div class="col-md-3">
        <h5>{{ ($price = $ad->price()) && isset($price->pivot) ? number_format($price->pivot->value, trans('frontend.format.number.decimals') , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep'))." ".getAdCurrency($ad, $price->unit) : ""  }}</h5>
      </div>
    </div>
    <!-- /.row -->
    <hr>
  @empty
    <p class="text-center">{!! trans("frontend.ad.search.empty_ads_text") !!}</p>
  @endforelse

  </div>
</div>
