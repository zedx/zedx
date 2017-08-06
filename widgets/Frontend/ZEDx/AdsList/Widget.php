<?php

namespace ZEDx\Widgets\Frontend\ZEDx\AdsList;

use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Models\Ad;

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
        $max = array_get($this->config, 'max', 3);
        $max = is_numeric($max) ? $max : 3;
        $show_type = array_get($this->config, 'show_type', 'horizontal');

        return view("widget_frontend_zedx_adslist::$show_type", [
            'config'    => $this->config,
            'ads'       => $this->getAds()->limit($max)->get(),
        ])->render();
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
        return view('widget_frontend_zedx_adslist::setting', [
            'config' => $this->config,
            'url'    => $url,
        ]);
    }

    protected function getAds()
    {
        $ads = Ad::validate();
        $this->filterByAdType($ads);
        $this->filterByUserType($ads);
        $this->filterByPhotos($ads);
        $this->setOrder($ads);

        return $ads;
    }

    protected function setOrder(&$ads)
    {
        $order = array_get($this->config, 'order', 'date');

        if ($order == 'date') {
            return $ads->orderBy('published_at', 'DESC');
        }

        return $ads->orderBy('views', 'DESC');
    }

    protected function filterByAdType(&$ads)
    {
        $ad_type = array_get($this->config, 'ad_type', 'all');

        if ($ad_type == 'all') {
            return $ads;
        }

        return $ads->whereHas('adtype', function ($scope) use ($ad_type) {
            $scope->where('is_headline', $ad_type == 'premium');
        });
    }

    protected function filterByPhotos(&$ads)
    {
        $photos = array_get($this->config, 'photos', 'all');

        if ($photos == 'with') {
            return $ads->has('photos');
        }

        if ($photos == 'without') {
            return $ads->doesntHave('photos');
        }

        return $ads;
    }

    protected function filterByUserType(&$ads)
    {
        $user_type = array_get($this->config, 'user_type', 'all');

        if ($user_type == 'all') {
            return $ads;
        }

        return $ads->whereHas('user', function ($scope) use ($user_type) {
            $scope->where('status', $user_type == 'pro');
        });
    }
}
