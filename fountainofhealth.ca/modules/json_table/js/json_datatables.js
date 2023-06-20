/**
 * @file
 * Custom JS for the JSON table field formatter.
 */
(function ($, Drupal, drupalSettings, once) {
  'use strict';
  /**
   * Attach behavior for JSON Fields.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.json_datatables = {
    attach(context) {
      $(once('json-table', '.json-table', context)).each(function (index, element) {
          let fieldName = $(this).data('json-table');
          let config = drupalSettings.json_table[fieldName];
          $(this).DataTable(config);
        });
    }
  };

})(jQuery, Drupal, drupalSettings, once);
