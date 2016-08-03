{{--*/ $adFields = getAdFields($ad); /*--}}

@foreach($ad->category->fields()->whereIsInAdsList(true)->get() as $field)
  @if(in_array($field->type, [1,2,3]))
    @include('widget_frontend_theme_searchadslist::_partials.selectField')
  @elseif(in_array($field->type, [4,5]))
    @include('widget_frontend_theme_searchadslist::_partials.inputField')
  @endif
@endforeach
