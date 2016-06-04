{!! Form::open(['route' => ['user.adtype.checkout', $adtype->id]]) !!}
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">{!! trans("frontend.user.adtype.cart.buy_ad") !!}</div>
  </div>
  <div class="panel-body">
    @if ($errors->has('quantity'))
    <div class="row">
      <div class="alert alert-danger">
      {!! $errors->first('quantity', '<p>:message</p>') !!}
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-9">
        <h3>{{ $adtype->title }}</h3>
      </div>
      <div class="col-md-3">
        <h3>
        <div class="input-group number-spinner" data-unit-price="{{ $adtype->price }}">
          <span class="input-group-btn">
            <a href="javascript:void(0)" class="btn btn-success" data-dir="dwn"><span class="fa fa-minus"></span></a>
          </span>

          {!! Form::text('quantity', 1, ['class' => 'form-control text-center']) !!}

          <span class="input-group-btn">
            <a href="javascript:void(0)" class="btn btn-success" data-dir="up"><span class="fa fa-plus"></span></a>
          </span>
        </div>
        </h3>
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
          <option value="all">{!! trans("frontend.user.adtype.cart.choose_gateway") !!}</option>
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
        <h3>{!! trans('frontend.user.adtype.cart.total_price') !!}</h3>
      </div>
      <div class="col-md-6">
        <h3 class="text-right"><span id="cart-total-price">{{ number_format($adtype->price, 2 , trans('frontend.format.number.dec_point'), trans('frontend.format.number.thousands_sep')) }}</span> {{ $currency }}</h3>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <a href="{{ route('user.adtype.index') }}" class="pull-left btn btn-primary"><i class="fa fa-reply"></i> {!! trans('frontend.user.adtype.cart.cancel') !!}</a>
    <button type="submit" class="pull-right btn btn-success"><i class="fa fa-shopping-cart"></i> {!! trans('frontend.user.adtype.cart.buy_now') !!}</button>
    <div class="clearfix"></div>
  </div>
</div>
{!! Form::close() !!}
