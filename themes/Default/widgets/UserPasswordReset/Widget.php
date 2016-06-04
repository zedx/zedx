<?php

namespace ZEDx\Widgets\Frontend\Theme\UserPasswordReset;

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
        $email = Request::get('email');
        $token = Request::route()->parameter('token');

        return view('widget_frontend_theme_userpasswordreset::index', [
            'config' => $this->config,
            'email'  => $email,
            'token'  => $token,
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
        return view('widget_frontend_theme_userpasswordreset::setting', [
            'config' => $this->config,
        ]);
    }
}
