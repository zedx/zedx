<span class="label label-primary no-radius">{{ $field->name }}</span>@foreach($field->select as $option)@if (isset($adFields[$field->id]) && in_array($option->id, make_array($adFields[$field->id])))<span class="label label-secondary no-radius">{{ $option->name }} {{ getAdCurrency($ad, $field->unit) }}</span>@endif
@endforeach
