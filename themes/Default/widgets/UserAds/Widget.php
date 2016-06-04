<?php

namespace ZEDx\Widgets\Frontend\Theme\UserAds;

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
        $adstatus = Request::route()->parameter('adstatus');
        $service = new AdService();

        if ($adstatus) {
            $item = (object) $service->filterByStatus($adstatus);
        } else {
            $item = (object) $service->index();
        }

        return view('widget_frontend_theme_userads::index', $item->data);
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
        return view('widget_frontend_theme_userads::setting', [
            'config' => $this->config,
        ]);
    }
}
