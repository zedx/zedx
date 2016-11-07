<fieldset>
    <legend>{!! trans('backend.customize_theme.navbar.navbar') !!}</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.default_background') !!}</label>
                <input type="text" class="form-control minicolors" name="background" value="{{ $customize->background }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.active_background') !!}</label>
                <input type="text" class="form-control minicolors" name="blocks" value="{{ $customize->blocks }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.default_text') !!}</label>
                <input type="text" class="form-control minicolors" name="blocks" value="{{ $customize->blocks }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.navbar.active_text') !!}</label>
                <input type="text" class="form-control minicolors" name="blocks" value="{{ $customize->blocks }}" />
            </div>
        </div>
    </div>
</fieldset>
