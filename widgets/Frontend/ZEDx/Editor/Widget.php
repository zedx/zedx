<?php

namespace ZEDx\Widgets\Frontend\ZEDx\Editor;

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
        return view('widget_frontend_zedx_editor::index', [
            'content' => array_get($this->config, 'content'),
        ]);
    }

    public function setting($url)
    {
        return view('widget_frontend_zedx_editor::edit', [
            'content' => array_get($this->config, 'content'),
            'type'    => array_get($this->config, 'type'),
            'url'     => $url,
        ]);
    }
}
