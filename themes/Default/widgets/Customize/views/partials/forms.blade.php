<fieldset>
    <legend>{!! trans('backend.customize_theme.forms.inputs') !!}</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.forms.border_color') !!}</label>
                <input type="text" class="form-control minicolors" name="forms[border_color]" value="{{ $customize->forms->border_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.forms.border_active_color') !!}</label>
                <input type="text" class="form-control minicolors" name="forms[border_active_color]" value="{{ $customize->forms->border_active_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.forms.font_color') !!}</label>
                <input type="text" class="form-control minicolors" name="forms[font_color]" value="{{ $customize->forms->font_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.forms.placeholder_color') !!}</label>
                <input type="text" class="form-control minicolors" name="forms[placeholder_color]" value="{{ $customize->forms->placeholder_color }}" />
            </div>
        </div>
    </div>
</fieldset>
