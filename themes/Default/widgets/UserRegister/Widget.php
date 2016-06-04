<?php

namespace ZEDx\Widgets\Frontend\Theme\UserRegister;

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
        return view('widget_frontend_theme_userregister::index');
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
        return view('widget_frontend_theme_userregister::setting', [
            'config' => $this->config,
        ]);
    }
}
