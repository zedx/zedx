<?php

namespace ZEDx\Widgets\Backend\ZEDx\LatestMembers;

use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Models\User;

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
        return view('widget_backend_zedx_latestmembers::index', [
            'config' => $this->config,
            'users'  => User::limit(10)->get(),
        ]);
    }

    public function setting($url)
    {
        return view('widget_backend_zedx_latestmembers::setting');
    }
}
