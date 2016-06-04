<?php

namespace ZEDx\Widgets\Frontend\ZEDx\Maps;

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
        $defaultMap = \Maps::getDefaultMap();

        return view('widget_frontend_zedx_maps::index', [
            'config'     => $this->config,
            'defaultMap' => $defaultMap,
        ]);
    }

    public function setting($url)
    {
        return '<p class="text-center">'.trans('backend.page.widget_no_setting').'</p>';
    }
}
