<div class="panel panel-default">
  <div class="panel-body">
  <form role="form">
    <div class="col-md-12">
    <div class="input-group">
      <input type="text" class="form-control zedx-listen-search" placeholder="{!! trans("frontend.ad.search.search") !!}" id="search-keywords" data-zedx-type="keywords" value="{{ $query }}">
      <div class="input-group-btn">
        <button class="btn btn-default zedx-search" type="submit" data-zedx-url-search="{{ route('ad.search') }}"><i class="fa fa-search"></i></button>
      </div>
    </div>
    </div>
  </form>
  </div>
</div>
