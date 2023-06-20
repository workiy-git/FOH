/**
 * @file
 * Custom JS for the JSON table field formatter.
 */
(function ($, Drupal, once) {
  'use strict';

  function parseJson(string) {
    try {
      return JSON.parse(string);
    }
    catch (e) {
      return null;
    }
  }

  /**
   * Attach behavior for JSON Fields.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.json_editor = {
    attach(context) {
      $(once('json_editor', '.json-editor', context)).each(function () {
        let $textarea = $(this);
        let mode = $(this).data('json-editor');
        let id = $(this).data('id');
        $textarea.after('<div id="' + id + '">');
        let data = parseJson($textarea.val());
        let container = document.getElementById(id);
        let editor = new JSONEditor(container, {
          mode: mode,
          modes: ['code', 'form', 'text', 'tree'],
          onChange: function () {
            $textarea.text(editor.getText());
          }
        },data);
      });
    }
  };
})(jQuery, Drupal, once);
