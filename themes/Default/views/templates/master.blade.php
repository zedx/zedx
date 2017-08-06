<!DOCTYPE html>
<html lang="{{ env('APP_LOCALE', 'env') }}">
    <head>
        <title>{{ $page->name }}</title>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="{{ $page->description }}" name="description"/>
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
        <meta content="ZEDx - the PHP Classifieds CMS" name="generator"/>
        <meta content="#da532c" name="msapplication-TileColor"/>
        <meta content="#ffffff" name="theme-color"/>
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="{{ setting('website_name') }}" />
        @yield('meta')

        <link href="{{ public_asset(elixir_frontend('css/styles.css')) }}" rel="stylesheet" type="text/css"/>
        <link href="{{ public_asset('build/frontend/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-57x57.png') }}" rel="apple-touch-icon" sizes="57x57"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-60x60.png') }}" rel="apple-touch-icon" sizes="60x60"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-76x76.png') }}" rel="apple-touch-icon" sizes="76x76"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114"/>
        <link href="{{ public_asset('favicons/apple-touch-icon-120x120.png') }}" rel="apple-touch-icon" sizes="120x120"/>
        <link href="{{ public_asset('favicons/favicon-32x32.png') }}" rel="icon" sizes="32x32" type="image/png"/>
        <link href="{{ public_asset('favicons/favicon-96x96.png') }}" rel="icon" sizes="96x96" type="image/png"/>
        <link href="{{ public_asset('favicons/favicon-16x16.png') }}" rel="icon" sizes="16x16" type="image/png"/>
        <link href="{{ public_asset('favicons/manifest.json') }}" rel="manifest"/>
        <link color="#1abc9c" href="{{ public_asset('favicons/safari-pinned-tab.svg') }}" rel="mask-icon"/>
        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
       @yield('__body')
       <script src="{{ public_asset(elixir_frontend('js/scripts.js')) }}"></script>
       @yield('script')
       {!! setting()->website_tracking_code !!}
       <script src="{{ public_asset('build/frontend/js/custom.js') }}"></script>
    </body>
</html>
