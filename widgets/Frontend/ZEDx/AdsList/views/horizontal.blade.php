@if ($ads->count())
  @foreach ($ads->chunk(4) as $chunk)
    <div class="row">
      @foreach ($chunk as $ad)
      <div class="col-sm-12 col-md-3">
        <div class="thumbnail">
          @if ($main_pic = $ad->photos()->main()->first())
          <a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
            <img class="img-rounded" src="{{ image_route('medium', $main_pic->path) }}" alt="">
          </a>
          @else
          <a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
            <center><i class="fa fa-picture-o" style="font-size:95px"></i></center>
          </a>
          @endif
          <div class="caption">
            <h4><center>{{ ($price = $ad->price()) && isset($price->pivot) ? number_format($price->pivot->value, trans('frontend.format.number.decimals') , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep'))." ".getAdCurrency($ad, $price->unit) : ""  }}</center></h4>
            <hr>
            <h4>
              <a href="{{ route('ad.show', array($ad->id, str_slug($ad->content->title))) }}">
                @if ($ad->adtype->is_headline) <i class="fa fa-star color-orange"></i> @endif {{ $ad->content->title }}
              </a>
            </h4>
            <p>{{ $ad->published_at->diffForHumans() }}</p>
          </div>
        </div>
      </div>
      @endforeach
  </div>
  @endforeach
@endif

