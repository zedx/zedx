{{--*/ $countries = \ZEDx\Models\Country::enabled()->get() /*--}}
<style>

.d3-tip {
  line-height: 1;
  font-weight: bold;
  padding: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  border-radius: 2px;
}

/* Creates a small triangle extender for the tooltip */
.d3-tip:after {
  box-sizing: border-box;
  display: inline;
  font-size: 10px;
  width: 100%;
  line-height: 1;
  color: rgba(0, 0, 0, 0.8);
  content: "\25BC";
  position: absolute;
  text-align: center;
}

/* Style northward tooltips differently */
.d3-tip.n:after {
  margin: -1px 0 0 0;
  top: 100%;
  left: 0;
}
</style>
@if ($countries->count() > 1)
  @foreach ($countries as $map)
    <i class="mapLoad flag-icon flag-icon-{{ strtolower($map->code) }}" data-code = "{{ strtolower($map->code) }}"></i>&nbsp;
  @endforeach
@endif
<div class="text-center">
<div id="ZxMap" data-url="{{ route('zxajax.map.show', '') }}" data-base-url="{{ url('/') }}" data-default="{{ $defaultMap }}"></div>
</div>
@section('script')
    <script type="text/javascript" src="https://d3js.org/d3.v3.min.js"></script>
    <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
    <script type="text/javascript" src="{{ public_asset('widgets/frontend/zedx/maps/js/mapReader.js') }}"></script>
    <script type="text/javascript" src="{{ public_asset('widgets/frontend/zedx/maps/js/spy.js') }}"></script>
@append
