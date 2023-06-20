/**
 * @file
 * Custom JS for the JSON table field formatter.
 */

(function ($, Drupal, once) {
  'use strict';

  /**
   * Attach behavior for JSON Fields.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.json_table = {
    attach: function (context) {
      // Initialize the Quick Edit app once per page load.
      $(once('json-table-field', '.field--type-json.field--widget-json-table-widget', context)).each(function () {
        $(once('table-add-row', '.add-row', context)).on('click', function () {
          let tbody = $(this).closest('.json-table-wrapper').find('table tbody');
          let tr = tbody.children().first().clone();
          tbody.append(tr);
          pasteFromClipBoard();
          keyupInputTable();
          convertTable2Json($(this).closest('.json-table-wrapper').find('table tbody'));
        });
        $(once('table-add-col', '.add-col', context)).on('click', function () {
          $(this).closest('.json-table-wrapper').find('table tbody tr').append('<td><input class="form-control form-element form-text"/></td>');
          keyupInputTable();
          convertTable2Json($(this).closest('.json-table-wrapper').find('table tbody'));
        });
        $(once('table-remove-row', '.remove-row', context)).on('click', function () {
          $(this).closest('.json-table-wrapper').find('table tbody tr:last').remove();
          convertTable2Json($(this).closest('.json-table-wrapper').find('table tbody'));
        });
        $(once('table-remove-col', '.remove-col', context)).on('click', function () {
          $(this).closest('.json-table-wrapper').find('table tbody tr td:last-child').remove();
          convertTable2Json($(this).closest('.json-table-wrapper').find('table tbody'));
        });
        pasteFromClipBoard();
        keyupInputTable();
        function getHeaderArray(that){
          var header = [];
          let $table = that.closest('table'),
            header_associative = $table.data('associative');
          if(header_associative == '1'){
            // This loop is not very efficient. It crashes browser.
            $table.find('thead th').each(function (key,value) {
              header.push(value.innerHTML);
            });
          }
          return header;
        }
        function convertTable2Json(that) {
          let $textarea = that.closest('.field--widget-json-table-widget').find('textarea.json-table');
          var table = [];
          var header = getHeaderArray(that);
          that.closest('table').find('tbody tr').each(function (row, tr) {

            let rows = $(this).find('td');
            table[row] = {};
            $.each(rows, function (col, value) {
              let associative = col;
              if(header[col] !== undefined){
                associative = header[col];
              }
              table[row][associative] = $(this).find('input,select,textarea').val();
            });
          });
          $textarea.val(JSON.stringify(table));
        }
        function keyupInputTable(){
          $(once('convertTbl2json','.json-table input,.json-table select,.json-table textarea')).on('change keyup', function (e) {
            convertTable2Json($(this))
          });
        }
        function pasteFromClipBoard() {
          $(once('paste','.json-table input.paste')).on('paste', function (e) {
            var $this = $(this),
              header = getHeaderArray($this);
            $.each(e.originalEvent.clipboardData.items, function (i, v) {
              if (v.type === 'text/plain') {
                v.getAsString(function (text) {
                  if(text.includes('\r\n') || text.includes('\t')){
                    let tbody = $this.closest('tbody');
                    let $textarea = $this.closest('.form-element--type-textarea').find('textarea');
                    let table = [];
                    text = text.trim('\r\n');
                    tbody.html('');
                    text.split('\r\n').forEach((v2,row) => {
                      let rows = v2.split('\t');
                      table[row] = {};
                      let tr = $('<tr></tr>');
                      rows.forEach((v3,col) => {
                        let cell = 'cell-' + row + '-' + col;
                        let td = $('<td><input class="form-control form-element form-text ' + cell + '" value="' + v3 + '"/></td>');

                        let associative = col;
                        if(header[col] !== undefined){
                          associative = header[col];
                        }
                        table[row][associative] = v3;
                        td.appendTo(tr);
                      });
                      tr.appendTo(tbody);
                    });
                    $textarea.val(JSON.stringify(table));
                  }
                });
              }
            });
          });
        }
      });
    }
  };
}(jQuery, Drupal, once));
