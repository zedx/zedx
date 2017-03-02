<div class="panel panel-default">
  <div class="tabbable-panel">
    <div class="tabbable-line tabs-below">
    <ul class="nav nav-tabs">
        <li @if (Route::is('user.ad.index') || Route::is('user.index')) class="active" @endif><a href="{{ route('user.ad.index') }}" class="color-darken"><i class="fa fa-list-ul color-darken"></i> <span class="hidden-xs">{!! trans('frontend.user.ad.all_ads') !!}</span></a></li>
        <li @if (isset($adstatus) && $adstatus->title == 'pending') class="active" @endif><a href="{{ route('user.ad.status', 'pending') }}" class="color-blue"><i class="fa fa-hourglass-start color-blue"></i> <span class="hidden-xs hidden-sm">{!! trans('frontend.user.ad.pending') !!}</span></a></li>
        <li @if (isset($adstatus) && $adstatus->title == 'validate') class="active" @endif><a href="{{ route('user.ad.status', 'validate') }}" class="color-green"><i class="fa fa-check color-green"></i> <span class="hidden-xs hidden-sm">{!! trans('frontend.user.ad.validated') !!}</span></a></li>
        <li @if (isset($adstatus) && $adstatus->title == 'expired') class="active" @endif><a href="{{ route('user.ad.status', 'expired') }}" class="color-orange"><i class="fa fa-hourglass-end color-orange"></i> <span class="hidden-xs hidden-sm">{!! trans('frontend.user.ad.expired') !!}</span></a></li>
        <li @if (isset($adstatus) && $adstatus->title == 'banned') class="active" @endif><a href="{{ route('user.ad.status', 'banned') }}" class="color-red"><i class="fa fa-ban color-red"></i> <span class="hidden-xs hidden-sm">{!! trans('frontend.user.ad.banished') !!}</span></a></li>
      </ul>
    </div>
  </div>

  <div class="panel-body">
  @forelse ($ads as $ad)
    <div data-element-parent-action data-id="{{ $ad->id }}" class="ad-details" data-title="{{ str_limit($ad->content->title, 20) }}">
      <div class="row">
        <div class="col-md-2">
            @if ($ad->adstatus->title == 'validate')
              <div class="label label-success"><i class="fa fa-check"></i> {!! trans('frontend.user.ad.validated_ad') !!}</div>
            @elseif ($ad->adstatus->title == 'pending')
              <div class="label label-info"><i class="fa fa-hourglass-start"></i> {!! trans('frontend.user.ad.pending_ad') !!}</div>
            @elseif ($ad->adstatus->title == 'expired')
              <div class="label label-warning"><i class="fa fa-hourglass-end"></i> {!! trans('frontend.user.ad.expired_ad') !!}</div>
            @elseif ($ad->adstatus->title == 'banned')
              <div class="label label-danger"><i class="fa fa-ban"></i> {!! trans('frontend.user.ad.banished_ad') !!}</div>
            @endif
            <br /><br />
            @if ($ad->adstatus->title == 'validate')
            <div><small>{!! trans('frontend.user.ad.published_at', ['time' => $ad->published_at->diffForHumans()]) !!}</small></div>
            @elseif ($ad->adstatus->title == 'expired')
            <div><small>{!! trans('frontend.user.ad.expired_at', ['time' => $ad->expired_at->diffForHumans()]) !!}</small></div>
            @else
            <div><small>{!! trans('frontend.user.ad.created_at', ['time' => $ad->created_at->diffForHumans()]) !!}</small></div>
            @endif

        </div>
        <div class="col-md-2">
            @if ($main_pic = $ad->photos()->main()->first())
            <a href="{{ route('ad.preview', array($ad->id, str_slug($ad->content->title))) }}">
                <img class="img-responsive img-rounded" src="{{ image_route('medium', $main_pic->path) }}" alt="">
            </a>
            @else
              <a href="{{ route('ad.preview', array($ad->id, str_slug($ad->content->title))) }}">
                <i class="fa fa-picture-o" style="font-size:70px"></i>
              </a>
            @endif
        </div>
        <div class="col-md-5">
        <h4><a href="{{ route('ad.preview', array($ad->id, str_slug($ad->content->title))) }}">{{ $ad->content->title }}</a></h4>
            <p>{{ str_limit(strip_tags($ad->content->body), 100, "...") }}</p>

            @include('widget_frontend_theme_userads::_partials.fields')

            @if ($ad->adstatus->title == 'expired' && $ad->adtype->can_renew)
            {!! Form::model($ad, ['method' => 'PUT', 'route' => ['user.ad.renew', $ad->id]]) !!}
                <p><button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-level-up"></i> {!! trans("frontend.user.ad.renew_ad") !!}</button></p>
            {!! Form::close() !!}
            @elseif ($ad->adstatus->title == 'validate')
              @if (!$ad->expired_at)

              @elseif ($ad->expired_at->diffInDays(null, false) >= 0 )
                <p><code>{!! trans('frontend.user.ad.expire_today') !!}</code></p>
              @else
                <p><code>{!! trans_choice('frontend.user.ad.expire_in', $ad->expired_at->diffInDays()) !!} </code></p>
              @endif
            @endif

        </div>
         <div class="col-md-3">
            <h4>{{ ($price = $ad->price()) && isset($price->pivot) ? number_format($price->pivot->value, trans('frontend.format.number.decimals') , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep'))." ".getAdCurrency($ad, $price->unit) : ""  }}</h4>

          <div class="dropdown pull-right ad-setting">
              <button class="btn btn-default btn-circle dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu">
                @if ($ad->adtype->can_edit)
                <li><a href="{{ route('user.ad.edit', $ad->id) }}"><i class="fa fa-edit"> {!! trans('frontend.user.ad.edit') !!}</i></a></li>
                <li class="divider"></li>
                @endif
                <li><a href="#" data-url = '{{ route("user.ad.destroy", [$ad->id]) }}' data-toggle="modal" data-target="#confirmDeleteAction" data-title="{{ $ad->content->title }}" data-message="{!! trans('frontend.user.ad.delete_ad_confirmation') !!}"><i class="fa fa-trash"> {!! trans('frontend.user.ad.delete') !!}</i></a></li>
              </ul>
          </div>
        </div>
      </div>
      <hr />
    </div>
    <!-- /.row -->
    @empty
    <p class="text-center">{!! trans("frontend.user.ad.empty_ads_text") !!}</p>
    @endforelse
    <center>{!! $ads->render() !!}</center>
  </div>
</div>
@include('widget_frontend_theme_userads::modals.delete')
