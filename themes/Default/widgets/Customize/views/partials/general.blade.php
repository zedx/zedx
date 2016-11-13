<fieldset>
    <legend>{!! trans('backend.customize_theme.general.body') !!}</legend>
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.general.background_color') !!}</label>
                <input type="text" class="form-control minicolors" name="general[background_color]" value="{{ $customize->general->background_color }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.general.font_size') !!}</label>
                <input type="text" class="form-control" name="general[font_size]" value="{{ $customize->general->font_size }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.general.font_color') !!}</label>
                <input type="text" class="form-control minicolors" name="general[font_color]" value="{{ $customize->general->font_color }}" />
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Liens</legend>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.general.link_color') !!}</label>
                <input type="text" class="form-control minicolors" name="general[link_color]" value="{{ $customize->general->link_color }}" />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.general.link_active_color') !!}</label>
                <input type="text" class="form-control minicolors" name="general[link_active_color]" value="{{ $customize->general->link_active_color }}" />
            </div>
        </div>
    </div>
</fieldset>
