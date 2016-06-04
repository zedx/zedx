<?php

namespace ZEDx\Widgets\Backend\ZEDx\LatestAds;

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
        return view('widget_backend_zedx_latestads::index', [
            'config' => $this->config,
            'ads'    => Ad::with('content')->limit(5)->get(),
        ]);
    }

    public function setting($url)
    {
        return view('widget_backend_zedx_latestads::setting');
    }
}
