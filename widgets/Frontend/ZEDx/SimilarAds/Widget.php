<?php

namespace ZEDx\Widgets\Frontend\ZEDx\SimilarAds;

use Request;
use ZEDx\Components\Widget as BaseWidget;

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
        $max = array_get($this->config, 'max', 3);
        $max = is_numeric($max) ? $max : 3;

        return view('widget_frontend_zedx_similarads::index', [
            'config' => $this->config,
            'ads'    => $ad->category->ads()->validate()->limit($max)->get(),
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
        return view('widget_frontend_zedx_similarads::setting', [
            'config' => $this->config,
            'url'    => $url,
        ]);
    }
}
