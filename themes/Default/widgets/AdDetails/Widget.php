<?php

namespace ZEDx\Widgets\Frontend\Theme\AdDetails;

use Request;
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
        $ad = Request::route()->parameter('adValidated') ?: Request::route()->parameter('adPreview');

        return view('widget_frontend_theme_addetails::index', [
            'ad'     => $ad,
            'fields' => $this->getAdFields($ad),
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
        return view('widget_frontend_theme_addetails::setting', [
            'config' => $this->config,
        ]);
    }

    protected function getAdFields(Ad $ad)
    {
        $mergedFields = [];

        if (!$ad->has('fields')) {
            return [];
        }

        $fields = $ad->fields()->orderBy('is_price', 'desc')->with('select')->whereIsInAd(true)->get();

        foreach ($fields as $field) {
            if (isset($mergedFields[$field->id])) {
                $value = $mergedFields[$field->id]['value'];
                $mergedFields[$field->id]['value'] = is_array($value) ? array_merge($value, [$field->pivot->value]) : [$value, $field->pivot->value];
            } else {
                $mergedFields[$field->id] = ['value' => $field->pivot->value];
            }
        }

        return collect($mergedFields);
    }
}
