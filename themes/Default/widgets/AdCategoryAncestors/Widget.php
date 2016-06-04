<?php

namespace ZEDx\Widgets\Frontend\Theme\AdCategoryAncestors;

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

        return view('widget_frontend_theme_adcategoryancestors::index', [
            'ad' => $ad,
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
        return view('widget_frontend_theme_adcategoryancestors::setting', [
            'config' => $this->config,
        ]);
    }
}
