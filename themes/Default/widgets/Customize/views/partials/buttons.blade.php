{{--*/ $buttons = ['primary', 'secondary']; /*--}}
@foreach ($buttons as $button)
<fieldset>
    <legend>Bouton primaire</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Fond</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][background_color]" value="{{ $customize->buttons->$button->background_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Fond actif</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][background_active_color]" value="{{ $customize->buttons->$button->background_active_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Bordure</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][border_color]" value="{{ $customize->buttons->$button->border_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Texte</label>
                <input type="text" class="form-control minicolors" name="buttons[{{$button}}][font_color]" value="{{ $customize->buttons->$button->font_color }}" />
            </div>
        </div>
    </div>
</fieldset>
@endforeach
