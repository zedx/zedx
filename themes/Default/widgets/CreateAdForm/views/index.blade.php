<div class="panel panel-default">
  {!! Form::open(['route' => ['user.ad.store', $adtype->id], 'files' => true]) !!}
  @include('widget_frontend_theme_createadform::_form', array("submitButton" => trans('frontend.user.ad.add_ad')))
  {!! Form::close() !!}
</div>
