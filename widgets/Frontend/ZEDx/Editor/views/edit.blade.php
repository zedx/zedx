@section('css')
<link rel="stylesheet" href="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/theme/monokai.css') }}">
<style>
  .CodeMirror {
    border: 1px solid #eee;
    height: auto;
  }
  .CodeMirror-scroll {
    overflow: auto;
    height: auto;
    overflow: visible;
    position: relative;
    outline: none;
    min-height: 300px;
  }
</style>
@append

{!! Form::open(['method' => 'PATCH', 'url' => $url]) !!}

<div class="row">
  <div class="col-md-4">
    <label class="radio-inline">
      <input type="radio" class="zedx-editor-widget-type" name="config[type]" value="none" @if($type == "none") checked @endif> Sans Editeur
    </label>
  </div>
  <div class="col-md-4">
    <label class="radio-inline">
      <input type="radio" class="zedx-editor-widget-type" name="config[type]" value="code" @if($type == "code") checked @endif> Éditeur de Code
    </label>
  </div>
  <div class="col-md-4">
    <label class="radio-inline">
      <input type="radio" class="zedx-editor-widget-type" name="config[type]" value="html" @if($type == "html") checked @endif> Editeur Html
    </label>
  </div>
</div>

<hr />

<textarea id="zedx-editor-widget-content" style="width:100%" rows="15" name="config[content]">{{ $content }}</textarea>
<hr>
<div class="form-group">
  <div class="checkbox">
    <label>
      <input type="checkbox" name="config[is_panel]" @if($is_panel) checked @endif>
      Afficher le contenu dans un panneau
    </label>
  </div>

</div>
<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Enregistrer</button>

{!! Form::close() !!}

@section('script')
  <script type="text/javascript" src="{{ public_asset('widgets/frontend/zedx/editor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/lib/codemirror.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/xml/xml.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/javascript/javascript.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/css/css.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/mode/htmlmixed/htmlmixed.js') }}"></script>
  <script src="{{ public_asset('widgets/frontend/zedx/editor/CodeMirror/addon/edit/matchbrackets.js') }}"></script>

  <script>
    $(function(){
      var cm = null,
        selector = 'zedx-editor-widget-content';

      var removeEditor = function() {
        tinymce.EditorManager.execCommand('mceRemoveEditor',true, selector);
        if (cm) {
          cm.toTextArea();
        }
      }

      var setCodeEditor = function() {
        cm = CodeMirror.fromTextArea(document.getElementById(selector), {
          lineNumbers: true,
          mode: "text/html",
          autoCloseBrackets: true,
          matchBrackets: true,
          lineWrapping: true,
          gutter: true,
          showCursorWhenSelecting: true,
          theme: "monokai",
          tabSize: 2
        });
      }

      var setHtmlEditor = function() {
        tinymce.init({
          selector: '#' + selector,
          relative_urls : false,
          remove_script_host : true,
          document_base_url : "{{ url("") }}",
          language: 'fr_FR',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
          ],
          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'print preview media | forecolor backcolor emoticons',
          image_advtab: true
        });
      }

      var initEditor = function(value) {
        var value = $('.zedx-editor-widget-type:checked').val();

        removeEditor();

        if (value == 'html') {
          setHtmlEditor();
        }else if (value == 'code') {
          setCodeEditor();
        }
      }

      $(".zedx-editor-widget-type").on('ifChecked', function() {
        initEditor();
      });

      initEditor();

    });

  </script>
@append
