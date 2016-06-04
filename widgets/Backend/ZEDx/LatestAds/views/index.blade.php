<ul class="products-list product-list-in-box">
  @foreach($ads as $ad)
  <li class="item">
    <div class="product-img">
      @if ($main_pic = $ad->photos()->main()->first())
        <img src="{{ image_route('thumb', $main_pic->path) }}" class="img-responsive img-rounded">
      @else
        <i class="fa fa-picture-o" style="font-size:70px"></i>
      @endif
    </div>
    <div class="product-info">
      <a href="{{ route('ad.preview', array($ad->id, str_slug($ad->content->title))) }}">{{ $ad->content->title }}
        <span class="label label-warning pull-right">{{ ($price = $ad->price()) && isset($price->pivot) ? $price->pivot->value." ".getAdCurrency($ad, $price->unit) : ""  }}</span></a>
          <span class="product-description">
            {{ str_limit(strip_tags($ad->content->body, 50)) }}
          </span>
    </div>
  </li>
  @endforeach
  <!-- /.item -->
</ul>
