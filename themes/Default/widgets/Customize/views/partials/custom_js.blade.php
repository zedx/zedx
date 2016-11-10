<div class="modal fade confirmationDialog" id="customizeJsAction" role="dialog" aria-labelledby="customizeJsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{!! trans('backend.customize_theme.javascript.edit_javascript') !!}</h4>
      </div>
      <div class="modal-body">
        <textarea name="js" id="zedx-editor-js">{!! $customize->js !!}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm">{{trans('backend.customize_theme.validate') }}</button>
      </div>
    </div>
  </div>
</div>

@section('script')
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/javascript/javascript.js') }}"></script>
  <script>
    $(function(){
      var editor = CodeMirror.fromTextArea(document.getElementById('zedx-editor-js'), {
        lineNumbers: true,
        mode: "text/javascript",
        autoCloseBrackets: true,
        matchBrackets: true,
        lineWrapping: true,
        showCursorWhenSelecting: true,
        gutter: true,
        theme: "monokai",
        tabSize: 2
      });

      $('#customizeJsAction').on('shown.bs.modal', function() {
        editor.refresh();
      });
    });
  </script>
@append
