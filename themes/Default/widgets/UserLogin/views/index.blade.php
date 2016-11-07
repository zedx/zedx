{{--*/ $hasProviders = false /*--}}
<div class="panel panel-default">
    <div class="panel-body">
        <h3 class="text-center">{!! trans('frontend.user.login.login_in') !!} {!! trans('frontend.user.login.or') !!} <a href="{{ route('user.register' )}}">{!! trans('frontend.user.login.create_account') !!}</a></h3>
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
          <div class="col-md-6 col-md-offset-3 col-xs-12">
            {!! Form::open(['route' => 'user.login']) !!}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!! Form::label("email", trans("frontend.user.login.email_address"), ['class' => 'control-label']) !!}
                    {!! Form::email("email", null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    {!! Form::label("password", trans("frontend.user.login.password"), ['class' => 'control-label']) !!}
                    {!! Form::password("password", ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="checkbox">
                    {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!}
                    {!! Form::label("remember", trans("frontend.user.login.remember_me")) !!}
                </div>
                <button type="submit" class="btn btn-secondary btn-block">{!! trans('frontend.user.login.connection') !!}</button>
            {!! Form::close() !!}
            <div class="top-buffer pull-right"><a href="{{ route('auth.password.email') }}">{{ trans('frontend.user.login.forgot_my_password') }}</a></div>

          </div>
        </div>
    </div>
</div>
