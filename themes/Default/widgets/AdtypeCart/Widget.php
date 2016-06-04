<?php

namespace ZEDx\Widgets\Frontend\Theme\AdtypeCart;

use Request;
use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Services\Frontend\User\AdtypeService;

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
        $adtype = Request::route()->parameter('adtypeNotCustomized');
        $item = (object) (new AdtypeService())->cart($adtype);

        if (!$item->data) {
            back()->send();
        }

        return view('widget_frontend_theme_adtypecart::index', $item->data);
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
        return view('widget_frontend_theme_adtypecart::setting', [
            'config' => $this->config,
        ]);
    }
}
