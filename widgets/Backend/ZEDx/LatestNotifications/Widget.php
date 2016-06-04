<?php

namespace ZEDx\Widgets\Backend\ZEDx\LatestNotifications;

use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Models\Notification;

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
        return view('widget_backend_zedx_latestnotifications::index', [
            'config'        => $this->config,
            'currency'      => setting('currency'),
            'notifications' => Notification::visible()->recents()->limit(6)->get(),
        ]);
    }

    public function setting($url)
    {
        return view('widget_backend_zedx_latestnotifications::setting');
    }
}
