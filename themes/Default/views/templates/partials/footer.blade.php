<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>
            <span class="pull-left">Copyright &copy; <a href="{{ setting('website_url') }}">{{ setting('website_name') }}</a> {{ \Carbon\Carbon::now()->format("Y") }}</span>
            <span class="pull-right">
              <i class="fa fa-heart" style="color:#dd4b39"></i> {!! trans('frontend.zedx.credits') !!}
            </span>
            </p>
        </div>
    </div>
    <!-- /.row -->
</footer>
