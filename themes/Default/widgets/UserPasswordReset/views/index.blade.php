<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">{{ trans('frontend.user.password_reset.reset_password') }}</div>

            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.password.reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">{{ trans('frontend.user.password_reset.email_address') }}</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">{{ trans('frontend.user.password_reset.password') }}</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">{{ trans('frontend.user.password_reset.password_confirmation') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-refresh"></i> {{ trans('frontend.user.password_reset.reset_password') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="top-buffer pull-right"><a href="{{ route('user.login') }}">{{ trans('frontend.user.login.login_in') }}</a></div>
            </div>
        </div>
    </div>
</div>
