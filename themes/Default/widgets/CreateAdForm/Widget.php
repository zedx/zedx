<?php

namespace ZEDx\Widgets\Frontend\Theme\CreateAdForm;

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
        $adtype = Request::route()->parameter('adtypeNotCustomized');

        return view('widget_frontend_theme_createadform::index', compact('adtype'));
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
        return view('widget_frontend_theme_createadform::setting', [
            'config' => $this->config,
        ]);
    }
}
