<span class="label label-primary no-radius">{{ $field->name }}</span>@foreach($field->select as $option)@if (isset($adFields[$field->id]) && in_array($option->id, make_array($adFields[$field->id]['value'])))<span class="label label-success no-radius">{{ $option->name }} {{ getAdCurrency($ad, $field->unit) }}</span>@endif
@endforeach
