<?php

namespace ZEDx\Widgets\Frontend\Theme\UserSubscriptionsList;

use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Services\Frontend\User\SubscriptionService;

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
        $item = (object) (new SubscriptionService())->index();

        return view('widget_frontend_theme_usersubscriptionslist::index', $item->data);
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
        return view('widget_frontend_theme_usersubscriptionslist::setting', [
            'config' => $this->config,
        ]);
    }
}
