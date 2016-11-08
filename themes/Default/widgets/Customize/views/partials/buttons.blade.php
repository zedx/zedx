{{--*/ $buttons = ['primary', 'secondary']; /*--}}
@foreach ($buttons as $button)
<fieldset>
    <legend>{!! trans('backend.customize_theme.buttons.'.$button) !!}</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.buttons.background_color') !!}</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][background_color]" value="{{ $customize->buttons->$button->background_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.buttons.background_active_color') !!}</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][background_active_color]" value="{{ $customize->buttons->$button->background_active_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.buttons.border_color') !!}</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][border_color]" value="{{ $customize->buttons->$button->border_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">{!! trans('backend.customize_theme.buttons.font_color') !!}</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][font_color]" value="{{ $customize->buttons->$button->font_color }}" />
            </div>
        </div>
    </div>
</fieldset>
@endforeach
