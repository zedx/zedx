<?php

namespace ZEDx\Widgets\Frontend\Theme\UserEditForm;

use Auth;
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
        $user = Auth::user();

        return view('widget_frontend_theme_usereditform::index', compact('user'));
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
        return view('widget_frontend_theme_usereditform::setting', [
            'config' => $this->config,
        ]);
    }
}
