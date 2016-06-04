<?php

namespace ZEDx\Widgets\Frontend\Theme\SearchAdsList;

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

        $search = (object) (new AdService())->search($params);

        return view('widget_frontend_theme_searchadslist::index', $search->data);
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
        return view('widget_frontend_theme_searchadslist::setting', [
            'config' => $this->config,
        ]);
    }
}
