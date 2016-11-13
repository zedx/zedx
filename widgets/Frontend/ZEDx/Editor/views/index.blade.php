@if ($is_panel)
<div class="panel panel-default">
  <div class="panel-body">
    {!! $content !!}
  </div>
</div>
@else
{!! $content !!}
@endif
