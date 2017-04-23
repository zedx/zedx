{!! Form::open(['method' => 'PATCH', 'class' => 'form-horizontal', 'url' => $url]) !!}
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label("config[max]", "Nombre maximum d'annonces", ['class' => 'label-text']) !!}
        {!! Form::text("config[max]", isset($config['max']) && is_numeric($config['max']) ? $config['max'] : 3, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Enregistrer</button>
</div>
{!! Form::close() !!}
