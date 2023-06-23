/**
 * @file
 * Custom JS for the JSON table field formatter.
 */
(function ($, Drupal, drupalSettings, once) {
  'use strict';
  function parseJson(string) {
    try {
      return JSON.parse(string);
    }
    catch (e) {
      return null;
    }
  }

  function export_xlsx(data, fileName = 'Sheet.xlsx') {
    let new_wb = xtos(data);
    /* write file and trigger a download */
    XLSX.writeFile(new_wb, fileName, {});
  }

  /**
   * Attach behavior for JSON Fields.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.x_spreadsheet_editor = {
    attach(context) {
      $(once('json-spreadsheet', '.json-x-spreadsheet', context)).each(function () {
        let $textarea = $(this);
        let options = $(this).data();
        let id = options.id;
        $textarea.after('<div id="' + id + '" class="json-x-spreadsheet-editor">');
        let data = parseJson($textarea.val());
        if(!data){
          data = {};
        }
        var editor = new x_spreadsheet("#" + id, options)
          .loadData(data) // load data
          .change(data => {
            $textarea.text(JSON.stringify(data));
          });
      });
      $(once('json-spreadsheet-display', '.json-x-spreadsheet-display', context)).each(function () {
        let options = $(this).data();
        let id = $(this).data('id');
        let data = parseJson(drupalSettings.json_table[id]);
        if(!data){
          data = {};
        }
        let reader = new x_spreadsheet("#" + $(this).attr('id'), options)
          .loadData(data);
      });
    }
  };
}(jQuery, Drupal, drupalSettings, once));
