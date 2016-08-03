<?php

namespace ZEDx\Widgets\Frontend\Theme\AdDetails;

use Request;
use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Models\Ad;

class Widget extends BaseWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Display widget.
     *
     * @return Response
     */
    public function run()
    {
        $ad = Request::route()->parameter('adValidated') ?: Request::route()->parameter('adPreview');

        return view('widget_frontend_theme_addetails::index', [
            'ad'     => $ad,
            'fields' => getAdFields($ad),
        ]);
    }

    /**
     * Display the setting page of widget.
     *
     * @param string $url
     *
     * @return Response
     */
    public function setting($url)
    {
        return view('widget_frontend_theme_addetails::setting', [
            'config' => $this->config,
        ]);
    }
}
