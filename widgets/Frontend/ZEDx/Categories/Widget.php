<?php

namespace ZEDx\Widgets\Frontend\ZEDx\Categories;

use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Models\Category;

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
     * Display widget
     *
     * @return Response
     */
    public function run()
    {
        return view("widget_frontend_zedx_categories::index", [
            'config' => $this->config,
        ]);
    }

    /**
     * Display the setting page of widget.
     *
     * @param  string  $url
     * @return Response
     */
    public function setting($url)
    {
        return view("widget_frontend_zedx_categories::setting", [
            'config' => $this->config,
        ]);
    }
}
