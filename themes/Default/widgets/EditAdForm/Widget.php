<?php

namespace ZEDx\Widgets\Frontend\Theme\EditAdForm;

use Request;
use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Services\Frontend\User\AdService;

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
        $ad = Request::route()->parameter('adUser');

        $item = (object) (new AdService())->edit($ad);

        return view('widget_frontend_theme_editadform::index', $item->data)->render();
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
        return view('widget_frontend_theme_editadform::setting', [
            'config' => $this->config,
        ]);
    }
}
