{!! Form::open(['route' => 'zxadmin.theme.customize']) !!}
<div class="box box-success">
    <div class="box-body">
        <div class="row">
            <div class="col-md-7">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#customize-general" data-toggle="tab" aria-expanded="true">Général</a></li>
                      <li><a href="#customize-navbar" data-toggle="tab" aria-expanded="false">Navigation</a></li>
                      <li><a href="#customize-footer" data-toggle="tab" aria-expanded="false">Bas de page</a></li>
                      <li><a href="#customize-buttons" data-toggle="tab" aria-expanded="false">Boutons</a></li>
                      <li><a href="#customize-forms" data-toggle="tab" aria-expanded="true">Formulaires</a></li>
                      <li><a href="#customize-blocks" data-toggle="tab" aria-expanded="true">Blocs</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="customize-general">
                        @include('widget_frontend_theme_customize::partials.general')
                      </div>
                      <div class="tab-pane" id="customize-navbar">
                        @include('widget_frontend_theme_customize::partials.navbar')
                      </div>
                      <div class="tab-pane" id="customize-footer">
                        @include('widget_frontend_theme_customize::partials.footer')
                      </div>
                      <div class="tab-pane" id="customize-buttons">
                        @include('widget_frontend_theme_customize::partials.buttons')
                      </div>
                      <div class="tab-pane" id="customize-forms">
                        @include('widget_frontend_theme_customize::partials.forms')
                      </div>
                      <div class="tab-pane" id="customize-blocks">

                      </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <div class="col-md-5">
                <fieldset>
                    <legend>{!! trans('backend.customize_theme.style.customize_styles') !!}</legend>
                    <p><small>{!! trans('backend.customize_theme.style.customize_styles_help') !!}</small></p>
                    <center><a href="#" class='btn btn-info' data-toggle="modal" data-target="#customizeCssAction"><i class="fa fa-paint-brush"></i> {!! trans('backend.customize_theme.style.edit_style') !!}</a></center>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <center><button class="btn btn-primary" type="submit"><i class="fa fa-edit"></i> {!! trans('backend.customize_theme.apply_updates') !!}</button></center>
    </div>
</div>

@include('widget_frontend_theme_customize::partials.custom_css')
{!! Form::close() !!}
