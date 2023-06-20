/**
 * @file
 * Custom JS for the JSON table field formatter.
 */
(function ($, Drupal, drupalSettings, once) {
  'use strict';

  function parseJson(string) {
    try {
      return JSON.parse(string);
    } catch (e) {
      return null;
    }
  }

  const removeEmptyColumns = arr => {
    // detect empty columns
    const emptyColumns = (arr[0] || []).map((c, i) => arr.some(a => a[i]))
    // filter empty columns
    return arr.map(a => a.filter((_, i) => emptyColumns[i])).filter(function (a) {
      return a.join("") != ""
    });

  }
  /**
   * Attach behavior for JSON Fields.
   *
   * @type {Drupal~behavior}
   */

  $('.json-luckysheet').each(function () {
    let $textarea = $(this);
    let data = $(this).data();
    let options = data;
    let id = options.id;
    let height = 500;
    $textarea.after('<div id="' + id + '" class="lucky-sheet">');
    if($textarea.val().length){
      options = parseJson($textarea.val());
      Object.entries(data).forEach(entry => {
        const [key, value] = entry;
        options[key] = value;
      });
    }
    options.container = id;
    $('#' + id).height(height);
    options.hook = {
      updated: function (operate) {
        let table = removeEmptyColumns(operate.curdata);
        $textarea.val(JSON.stringify(luckysheet.toJson()));
      }
    };
    let lucky_editor = luckysheet.create(options);
  });
  $('.json-luckysheet-display').each(function () {
    let id = $(this).attr('id');
    let data = $(this).data();
    let options = data;
    let height = 500;
    $(this).height(height);
    options = parseJson(drupalSettings.json_table[id]);
    Object.entries(data).forEach(entry => {
      const [key, value] = entry;
      options[key] = value;
    });
    options.container = id;
    let lucky_reader = luckysheet.create(options);
  });
}(jQuery, Drupal, drupalSettings, once));
