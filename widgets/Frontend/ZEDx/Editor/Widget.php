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
            'content'  => array_get($this->config, 'content'),
            'is_panel' => array_get($this->config, 'is_panel'),
        ]);
    }

    public function setting($url)
    {
        return view('widget_frontend_zedx_editor::edit', [
            'content'  => array_get($this->config, 'content'),
            'type'     => array_get($this->config, 'type'),
            'is_panel' => array_get($this->config, 'is_panel'),
            'url'      => $url,
        ]);
    }
}
