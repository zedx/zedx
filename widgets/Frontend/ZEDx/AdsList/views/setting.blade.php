{!! Form::open(['method' => 'PATCH', 'class' => 'form-horizontal', 'url' => $url]) !!}
<div class="box-body">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[max]", "Nombre d'annonces à afficher", ['class' => 'label-text']) !!}
            {!! Form::text("config[max]", isset($config['max']) && is_numeric($config['max']) ? $config['max'] : 3, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[show_type]", "Type d'affichage", ['class' => 'label-text']) !!}
            {!! Form::select('config[show_type]', ['horizontal' => 'Horizontal', 'vertical' => 'Vertical'], isset($config['show_type']) ? $config['show_type'] : '', ['id' => 'show_type', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[photos]", "Photos", ['class' => 'label-text']) !!}
            {!! Form::select('config[photos]', ['all' => 'Peu importe', 'with' => 'Uniquement avec photos', 'without' => 'Uniquement sans photos'], isset($config['photos']) ? $config['photos'] : '', ['id' => 'photos', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[ad_type]", "Types d'annonces", ['class' => 'label-text']) !!}
            {!! Form::select('config[ad_type]', ['all' => 'Toutes les annonces', 'premium' => 'Uniquement les annonces premiums', 'normal' => 'Uniquement les annonces normales'], isset($config['ad_type']) ? $config['ad_type'] : '', ['id' => 'ad_type', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[user_type]", "Types d'annonceurs", ['class' => 'label-text']) !!}
            {!! Form::select('config[user_type]', ['all' => 'Tous les annonceurs', 'pro' => 'Uniquement les professionnels', 'particular' => 'Uniquement les particuliers'], isset($config['user_type']) ? $config['user_type'] : '', ['id' => 'user_type', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label("config[order]", "Classement par", ['class' => 'label-text']) !!}
            {!! Form::select('config[order]', ['date' => "Date d'ajout", 'views' => 'Nombre de vues'], isset($config['order']) ? $config['order'] : '', ['id' => 'order', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Enregistrer</button>
</div>
{!! Form::close() !!}
