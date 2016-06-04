<div class="panel panel-default">
  <div class="panel-body">
    <table class="table reverseTable">
      <tr>
        <td>&nbsp;</td>
        <td>{!! trans("frontend.user.subscription.subscription_type") !!}</td>
        @foreach (\ZEDx\Models\Adtype::all() as $adtype)
        <td>{!! trans("frontend.user.subscription.nbr_ads", ['title' => $adtype->title]) !!}</td>
        @endforeach
        <td>{!! trans("frontend.user.subscription.display_time") !!}</td>
        <td class="vcenter">{!! trans("frontend.user.subscription.price") !!}</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><h4>{!! trans('frontend.user.subscription.current') !!}</h4></td>
        <td>{{ $user_subscription->description }}</td>
        @foreach ($user->adtypes as $adtype)
        <td>@if ($adtype->pivot->number >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.subscription.unlimited')) !!}</span> @elseif ($adtype->pivot->number == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b><span class="text-info">{{ $adtype->pivot->number }}</span></b> @endif</td>
        @endforeach
        <td>
        @if (!$user->subscription_expired_at)
          <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.subscription.unlimited')) !!}</span>
        @elseif ($user->subscription_expired_at->diffInDays(null, false) >= 0 )
          <i class="fa fa-times-circle-o fa-lg text-danger"></i>
        @else
          <b><span class="text-info">{!! trans_choice('frontend.user.subscription.nbr_days', $user->subscription_expired_at->diffInDays()) !!} </span></b>
        @endif
        </td>
        <td></td>
        <td></td>
      </tr>
      @foreach ($subscriptions as $subscription)
      <tr>
        <td><h4>{{ $subscription->title }}</h4></td>
        <td>{{ $subscription->description }}</td>
        @foreach ($subscription->adtypes as $adtype)
        <td>@if ($adtype->pivot->number >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.subscription.unlimited')) !!}</span> @elseif ($adtype->pivot->number == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b><span class="text-info">{{ $adtype->pivot->number }}</span></b> @endif</td>
        @endforeach
        <td>@if ($subscription->days >= 9999) <span class="label label-success">{!! mb_strtoupper(trans('frontend.user.subscription.unlimited')) !!}</span> @elseif ($subscription->days == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b><span class="text-info">{{ $subscription->days }} Jours</span></b> @endif</td>
        <td>@if ($subscription->price > 0) <h3>{{ number_format($subscription->price, 2 , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }} {{ $currency }}</h3> @else <h3 class="text-success">{!! mb_strtoupper(trans('frontend.user.subscription.free')) !!}</h3> @endif</td>
        <td>
        @if ($subscription->price > 0)
          <a href="{{ route('user.subscription.cart', $subscription->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> {!! trans('frontend.user.subscription.purchase') !!}</a>
        @else

          <span>
            <a href="#" class="btn btn-success" data-url = '{{ route("user.subscription.swapForFree", [$subscription->id]) }}' data-toggle="modal" data-target="#confirmSubscribeAction" data-title="{{ $subscription->title }}" data-message="{!! trans('frontend.user.subscription.subscribe_confirmation') !!}"><i class="fa fa-check"></i> {!! trans("frontend.user.subscription.subscribe") !!}</a>
          </span>
        @endif
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@include('widget_frontend_theme_usersubscriptionslist::modals.subscribe')
