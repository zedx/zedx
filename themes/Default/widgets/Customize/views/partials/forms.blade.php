<fieldset>
    <legend>Champs</legend>
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Bordure</label>
                <input type="text" class="form-control minicolors" name="forms[border_color]" value="{{ $customize->forms->border_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Bordure active</label>
                <input type="text" class="form-control minicolors" name="forms[border_active_color]" value="{{ $customize->forms->border_active_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Texte</label>
                <input type="text" class="form-control minicolors" name="forms[font_color]" value="{{ $customize->forms->font_color }}" />
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="email" class="label-text">Texte fictif</label>
                <input type="text" class="form-control minicolors" name="forms[placeholder_color]" value="{{ $customize->forms->placeholder_color }}" />
            </div>
        </div>
    </div>
</fieldset>
