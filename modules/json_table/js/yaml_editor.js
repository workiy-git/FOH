(function ($, Drupal, once) {

  "use strict";

  function parseJson(string) {
    try {
      return JSON.parse(string);
    }
    catch (e) {
      return null;
    }
  }

  Drupal.behaviors.yamlEditor = {
    attach: function (context) {
      let initEditor = function () {
        $(once('json-yaml-editor', '.yaml-editor', context)).each(function () {
          // Init ace editor.
          let $textarea = $(this);
          let $editDiv = $('#' + $(this).data('id'));
          let editor = ace.edit($editDiv[0]);

          let code = parseJson($textarea.val());
          editor.setSession(ace.createEditSession(code, 'ace/mode/yaml'))
          editor.getSession().setTabSize(2);
          //editor.setTheme('ace/theme/chrome');
          editor.setOptions({
            minLines: 3,
            maxLines: 20
          });

          // Update Drupal textarea value.
          editor.getSession().on('change', function () {
            $textarea.val(JSON.stringify(editor.getSession().getValue()));
          });

        });
      };

      // Check if Ace editor is already available and load it from source cdn otherwise.
      if (typeof ace !== 'undefined') {
        initEditor();
      }
    }
  };

}(jQuery, Drupal, once));
