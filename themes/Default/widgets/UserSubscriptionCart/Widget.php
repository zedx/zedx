<?php

namespace ZEDx\Widgets\Frontend\Theme\UserSubscriptionCart;

use Request;
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
        $subscription = Request::route()->parameter('subscription');
        $item = (object) (new SubscriptionService())->cart($subscription);

        if (!$item->data) {
            back()->send();
        }

        return view('widget_frontend_theme_usersubscriptioncart::index', $item->data);
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
        return view('widget_frontend_theme_usersubscriptioncart::setting', [
            'config' => $this->config,
        ]);
    }
}
