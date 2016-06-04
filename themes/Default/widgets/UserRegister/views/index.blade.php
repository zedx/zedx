{!! Form::open(['route' => ['user.register']]) !!}
{{--*/ $hasProviders = false /*--}}
<div class="panel panel-default">
  <div class="panel-body">
    <h3 class="text-center"><a href="{{ route('user.login' )}}">{!! trans('frontend.user.account.login_in') !!}</a> {!! trans('frontend.user.account.or') !!} {!! trans('frontend.user.account.create_account') !!}</h3>
    <hr />
    <div class="row">
      <div class="text-center">
        @foreach (json_decode(setting('social_auths')) as $providerName => $provider)
        @if ($provider->enabled)
        {{--*/ $hasProviders = true /*--}}
        <a href="{{ route('auth.provider', $providerName) }}" class="btn azm-social azm-size-64 azm-circle azm-long-shadow azm-{{ $provider->icon }}"><i class="fa fa-{{ $provider->icon }}"></i></a>
        @endif
        @endforeach
      </div>
    </div>
    @if ($hasProviders)
    <div class="connexion-separator">
        <div class="line l"></div>
        <span>{{ trans('frontend.user.account.or') }}</span>
        <div class="line r"></div>
    </div>
    @endif
    <div class="row">
      <div class="col-sm-8 col-md-offset-2">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
              {!! Form::label("name", trans("frontend.user.account.name"), ['class' => 'label-text']) !!}
              {!! Form::text("name", null, ['class' => 'form-control']) !!}
              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
              {!! Form::label("status", trans("frontend.user.account.status"), ['class' => 'label-text']) !!}
              {!! Form::select("status", [trans('frontend.user.account.personal_account'), trans('frontend.user.account.professional_account')], null, ['id' => 'status', 'class' => 'form-control']) !!}
              {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-md-offset-2">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
          {!! Form::label("email", trans("frontend.user.account.email"), ['class' => 'label-text']) !!}
          {!! Form::email("email", null, ['class' => 'form-control']) !!}
          {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div id="professionnal" class="hide">
          <div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
            {!! Form::label("company", trans("frontend.user.account.corporate_name"), ['class' => 'label-text']) !!}
            {!! Form::text("company", null, ['class' => 'form-control']) !!}
            {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
          </div>
          <div class="form-group {{ $errors->has('siret') ? 'has-error' : ''}}">
            {!! Form::label("siret", trans("frontend.user.account.business_identification_number"), ['class' => 'label-text']) !!}
            {!! Form::text("siret", null, ['class' => 'form-control']) !!}
            {!! $errors->first('siret', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-md-offset-2">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
              {!! Form::label("phone", trans("frontend.user.account.phone_number"), ['class' => 'label-text']) !!}
              {!! Form::text("phone", null, ['class' => 'form-control']) !!}
              {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('is_phone') ? 'has-error' : ''}}">
              {!! Form::label("is_phone", trans("frontend.user.account.show_phone_number"), ['class' => 'label-text']) !!}
              {!! Form::select("is_phone", [1 => trans('frontend.user.account.yes'), 0 => trans('frontend.user.account.no')], null, ['class' => 'form-control']) !!}
              {!! $errors->first('is_phone', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-md-offset-2">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
              {!! Form::label("password", trans("frontend.user.account.password"), ['class' => 'label-text']) !!}
              <input class="form-control" name="password" type="password" id="password">
              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
              {!! Form::label("password_confirmation", trans("frontend.user.account.password_confirmation"), ['class' => 'label-text']) !!}
              <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <p class="text-center"><button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> {!! trans('frontend.user.account.create_my_account') !!}</button></p>
  </div>
</div>
{!! Form::close() !!}
