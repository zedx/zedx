{!! Form::open(['route' => ['user.subscription.checkout', $subscription->id]]) !!}
  <div class="panel">
    <div class="panel-heading">
      <div class="panel-title"><h3>{!! trans("frontend.user.subscription.cart.buy_subscription") !!}<span class="label label-primary pull-right">{{ $subscription->title }}</span></h3></div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <p>{!! trans('frontend.user.subscription.cart.display_time') !!} : @if ($subscription->days >= 9999) <span class="label label-success">ILLIMITÉ</span> @elseif ($subscription->days == 0) <i class="fa fa-times-circle-o fa-lg text-danger"></i> @else <b><span class="text-info">{!! trans_choice('frontend.user.subscription.cart.nbr_days', $subscription->days) !!}</span></b> @endif</p>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-12">
          @if (count($gateways) == 1)
          <select class="select2 form-control" name="gateway">
            <option value="{{ $gateways->first()->id }}">{{ ucfirst(strtolower($gateways->first()->name)) }}</option>
          </select>
          @else
          <select class="select2 form-control" name="gateway">
            <option value="all">{!! trans("frontend.user.subscription.cart.choose_gateway") !!}</option>
            @foreach($gateways as $gateway)
              <option value="{{ $gateway->id }}">{{ ucfirst(strtolower($gateway->name)) }}</option>
            @endforeach
          </select>
          @endif
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <h3>{!! trans('frontend.user.subscription.cart.total_price') !!}</h3>
        </div>
        <div class="col-md-6">
          <h3 class="text-right"><span id="cart-total-price">{{ number_format($subscription->price, 2 , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }}</span> {{ $currency }}</h3>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <a href="{{ route('user.subscription.index') }}" class="pull-left btn btn-secondary"><i class="fa fa-reply"></i> {!! trans('frontend.user.subscription.cart.cancel') !!}</a>
      <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-shopping-cart"></i> {!! trans('frontend.user.subscription.cart.buy_now') !!}</button>
      <div class="clearfix"></div>
    </div>
  </div>
{!! Form::close() !!}
