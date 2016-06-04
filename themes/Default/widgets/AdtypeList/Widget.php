<?php

namespace ZEDx\Widgets\Frontend\Theme\AdtypeList;

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
        $item = (object) (new AdtypeService())->index();

        return view('widget_frontend_theme_adtypelist::index', $item->data);
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
        return view('widget_frontend_theme_adtypelist::setting', [
            'config' => $this->config,
        ]);
    }
}
