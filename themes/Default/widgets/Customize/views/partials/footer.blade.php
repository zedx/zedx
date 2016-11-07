<fieldset>
    <legend>Menus en bas de page</legend>
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">Fond</label>
                <input type="text" class="form-control minicolors" name="footer[above_background_color]" value="{{ $customize->footer->above_background_color }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">Texte</label>
                <input type="text" class="form-control minicolors" name="footer[above_link_color]" value="{{ $customize->footer->above_link_color }}" />
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <label for="email" class="label-text">Texte actif</label>
                <input type="text" class="form-control minicolors" name="footer[above_link_active_color]" value="{{ $customize->footer->above_link_active_color }}" />
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Bas de page</legend>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">Fond</label>
                <input type="text" class="form-control minicolors" name="footer[below_background_color]" value="{{ $customize->footer->below_background_color }}" />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email" class="label-text">Texte</label>
                <input type="text" class="form-control minicolors" name="footer[below_font_color]" value="{{ $customize->footer->below_font_color }}" />
            </div>
        </div>
    </div>
</fieldset>
