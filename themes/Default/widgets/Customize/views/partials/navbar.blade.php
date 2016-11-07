<fieldset>
    <legend>{!! trans('backend.customize_theme.navbar.navbar') !!}</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.default_background') !!}</label>
                <input type="text" class="form-control minicolors" name="navigation[background_color]" value="{{ $customize->navigation->background_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.active_background') !!}</label>
                <input type="text" class="form-control minicolors" name="navigation[background_active_color]" value="{{ $customize->navigation->background_active_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.default_text') !!}</label>
                <input type="text" class="form-control minicolors" name="navigation[font_color]" value="{{ $customize->navigation->font_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.active_text') !!}</label>
                <input type="text" class="form-control minicolors" name="navigation[font_active_color]" value="{{ $customize->navigation->font_active_color }}" />
            </div>
        </div>
    </div>
</fieldset>
