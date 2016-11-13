@section('css')
<link rel="stylesheet" href="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/theme/monokai.css') }}">
@append

<div class="modal fade confirmationDialog" id="customizeCssAction" role="dialog" aria-labelledby="customizeCssLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{!! trans('backend.customize_theme.style.edit_style') !!}</h4>
      </div>
      <div class="modal-body">
        <textarea name="css" id="zedx-editor-css">{!! $customize->css !!}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm">{{trans('backend.customize_theme.validate') }}</button>
      </div>
    </div>
  </div>
</div>

@section('script')
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/lib/codemirror.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/css/css.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/addon/edit/matchbrackets.js') }}"></script>

  <script>
    $(function(){
      var editor = CodeMirror.fromTextArea(document.getElementById('zedx-editor-css'), {
        lineNumbers: true,
        mode: "text/css",
        autoCloseBrackets: true,
        matchBrackets: true,
        lineWrapping: true,
        showCursorWhenSelecting: true,
        gutter: true,
        theme: "monokai",
        tabSize: 2
      });

      $('#customizeCssAction').on('shown.bs.modal', function() {
        editor.refresh();
      });

    });
  </script>
@append
