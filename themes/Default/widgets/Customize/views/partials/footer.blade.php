<fieldset>
    <legend>{!! trans('backend.customize_theme.footer.footer_menus') !!}</legend>
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.footer.above_background_color') !!}</label>
                <input type="text" class="form-control minicolors" name="footer[above_background_color]" value="{{ $customize->footer->above_background_color }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.footer.above_link_color') !!}</label>
                <input type="text" class="form-control minicolors" name="footer[above_link_color]" value="{{ $customize->footer->above_link_color }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.footer.above_link_active_color') !!}</label>
                <input type="text" class="form-control minicolors" name="footer[above_link_active_color]" value="{{ $customize->footer->above_link_active_color }}" />
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>{!! trans('backend.customize_theme.footer.footer') !!}</legend>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.footer.below_background_color') !!}</label>
                <input type="text" class="form-control minicolors" name="footer[below_background_color]" value="{{ $customize->footer->below_background_color }}" />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.footer.below_font_color') !!}</label>
                <input type="text" class="form-control minicolors" name="footer[below_font_color]" value="{{ $customize->footer->below_font_color }}" />
            </div>
        </div>
    </div>
</fieldset>
