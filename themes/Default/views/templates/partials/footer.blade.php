<footer class="text-center">
    {{--*/ $_footerMenus = renderMenu('footer') /*--}}
    @if ($_footerMenus)
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        {!! $_footerMenus !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="pull-left">Copyright &copy; <a href="{{ setting('website_url') }}">{{ setting('website_name') }}</a> {{ \Carbon\Carbon::now()->format("Y") }}</span>
                    <span class="pull-right">
                      <i class="fa fa-heart" style="color:#dd4b39"></i> {!! trans('frontend.zedx.credits') !!}
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
