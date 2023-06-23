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
  Drupal.behaviors.json_view = {
    attach(context) {
      $(once('json_view', '.json-view', context)).each(function (index, element) {
          let fieldName = $(this).data('json-field');
          let config = drupalSettings.json_view[fieldName];
          $(this).JSONView($(this).text(), config);
        });
    }
  };

}(jQuery, Drupal, drupalSettings, once));
