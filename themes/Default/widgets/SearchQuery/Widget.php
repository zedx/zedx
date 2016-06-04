<?php

namespace ZEDx\Widgets\Frontend\Theme\SearchQuery;

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
        $query = Request::get('q');

        return view('widget_frontend_theme_searchquery::index', compact('query'));
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
        return view('widget_frontend_theme_searchquery::setting', [
            'config' => $this->config,
        ]);
    }
}
