<?php

namespace ZEDx\Widgets\Frontend\Theme\Customize;

use File;
use Themes;
use ZEDx\Components\Widget as BaseWidget;
use ZEDx\Support\Json;

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
        $customize = $this->getCustomizedElements();

        return view('widget_frontend_theme_customize::index', compact('customize'))->render();
    }

    /**
     * Get the setting page.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function setting($request)
    {
        $this->setCustomizedElements($request);
    }

    protected function getCustomizedElements()
    {
        return $this->getJson()->getAttributes(false);
    }

    protected function getJson()
    {
        $path = storage_path('app/themes');
        $pathFile = $path.'/'.Themes::getActive().'.json';

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        if (!File::exists($pathFile)) {
            File::copy(base_path('themes/'.Themes::getActive().'/widgets/Customize/config.json'), $pathFile);
        }

        return new Json($pathFile);
    }

    protected function setCustomizedElements($request)
    {
        $inputs = $request->except('_token');
        $this->getJson()->update($inputs);

        @File::put(public_path('build/frontend/css/custom.css'), $this->generateCss($inputs));
        @File::put(public_path('build/frontend/js/custom.js'), $inputs['js']);
    }

    protected function generateCss($inputs)
    {
        $content = '';
        $stubsPath = base_path('themes/'.Themes::getActive().'/widgets/Customize/stubs');
        $stubs = File::glob("{$stubsPath}/*.css");
        foreach ($stubs as $stub) {
            $name = basename($stub, '.css');
            $stubContent = File::get($stub);
            if (isset($inputs[$name])) {
                $input = array_dot($inputs[$name]);
                $search = preg_filter('/^/', '@@', array_keys($input));
                $content .= str_replace($search, $input, $stubContent).PHP_EOL;
            }
        }

        $content .= $inputs['css'];

        return $content;
    }
}
