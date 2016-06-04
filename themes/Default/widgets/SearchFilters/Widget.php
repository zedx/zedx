<?php

namespace ZEDx\Widgets\Frontend\Theme\SearchFilters;

use Request;
use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Services\Frontend\Ad\AdService;

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
        $params = Request::route()->parameter('params', '');

        $data = (new AdService())->getFilters($params);

        return view('widget_frontend_theme_searchfilters::index', $data);
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
        return view('widget_frontend_theme_searchfilters::setting', [
            'config' => $this->config,
        ]);
    }
}
