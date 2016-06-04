<div class="panel panel-default">
  {!! Form::model($ad, ['method' => 'PATCH', 'route' => ['user.ad.update', $ad->id], 'files' => true]) !!}
    @include('widget_frontend_theme_editadform::_form', array("submitButton" => trans('frontend.user.ad.edit_ad')))
  {!! Form::close() !!}
</div>
