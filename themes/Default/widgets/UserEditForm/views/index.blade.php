<div class="panel panel-default">
  {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update'], 'class' => 'form-horizontal', 'files' => true]) !!}
    <div class="panel-body">
      @if (!$user->is_validate)
      <div class="alert alert-danger">
        <i class="fa fa-info-circle"></i> {!! trans('frontend.user.profile.valid_email_password') !!}
      </div>
      @endif

      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail div-center-outer">
            <div id="user-avatar-container" class="image div-center">
              @if ($user->avatar != '')
              <img id="user-avatar" src="{{ image_route('avatar', $user->avatar) }}" class="img-circle">
              @else
              <div id="user-avatar" class="avatar-circle-lg">
                <span class="initials">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
              </div>
              @endif
            </div>
            <div class="caption">
              <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group">
                  <div class="btn btn-xs btn-primary btn-file btn-block"><i class="fa fa-picture-o"></i> <span class="text">{{ trans("frontend.user.profile.edit_avatar") }}</span> <input type="file" id="user-upload-avatar" name="avatar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label("name", trans("frontend.user.profile.name"), ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
              {!! Form::text("name", null, ['class' => 'form-control']) !!}
              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label("email", trans("frontend.user.profile.email"), ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
              {!! Form::text("email", null, ['class' => 'form-control']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
            {!! Form::label("phone", trans("frontend.user.profile.phone_number"), ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
              {!! Form::text("phone", null, ['class' => 'form-control']) !!}
              {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
          <div class="form-group {{ $errors->has('is_phone') ? 'has-error' : ''}}">
            {!! Form::label("is_phone", trans("frontend.user.profile.show_phone_number"), ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-9">
              {!! Form::select("is_phone", [trans("frontend.user.profile.no"), trans("frontend.user.profile.yes")], null, ['class' => 'form-control']) !!}
              {!! $errors->first('is_phone', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
      </div>
      <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        {!! Form::label("status", trans("frontend.user.profile.status"), ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
          {!! Form::select("status", [trans('frontend.user.profile.personal_account'), trans('frontend.user.profile.professional_account')], null, ['id' => 'status', 'class' => 'form-control']) !!}
          {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div id="professionnal" {!! $user->status == '0' ? 'class="hide"' : '' !!}>
        <div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
          {!! Form::label("company", trans("frontend.user.profile.corporate_name"), ['class' => 'control-label col-md-2']) !!}
          <div class="col-md-10">
            {!! Form::text("company", null, ['class' => 'form-control']) !!}
            {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
        <div class="form-group {{ $errors->has('siret') ? 'has-error' : ''}}">
          {!! Form::label("siret", trans("frontend.user.profile.business_identification_number"), ['class' => 'control-label col-md-2']) !!}
          <div class="col-md-10">
            {!! Form::text("siret", null, ['class' => 'form-control']) !!}
            {!! $errors->first('siret', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label("password", trans("frontend.user.profile.password"), ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
          <input class="form-control" name="password" type="password" id="password">
          {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label("password_confirmation", trans("frontend.user.profile.password_confirmation"), ['class' => 'control-label col-md-2']) !!}
        <div class="col-md-10">
          <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
          {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
      </div>
      @if ($user->is_validate)
      <hr>
      <div class="form-group {{ $errors->has('current_password') ? 'has-error' : ''}}">
        {!! Form::label("current_password", trans("frontend.user.profile.current_password"), ['class' => 'control-label col-md-2 color-red']) !!}
        <div class="col-md-10">
          <input class="form-control" name="current_password" type="password" id="current_password">
          {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
        </div>
      </div>
      @endif
    </div>
    <div class="panel-footer">
        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-refresh"></i> {!! trans('frontend.user.profile.edit') !!}</button>
        <div class="clearfix"></div>
    </div>

  {!! Form::close() !!}
</div>
