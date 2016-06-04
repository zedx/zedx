<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">{!! trans('frontend.user.password_reset.reset_password') !!}</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">{!! trans('frontend.user.password_reset.email_address') !!}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> {!! trans('frontend.user.password_reset.send_reset_link') !!}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="top-buffer pull-right"><a href="{{ route('user.login') }}">{{ trans('frontend.user.login.login_in') }}</a></div>
            </div>
        </div>
    </div>
</div>
