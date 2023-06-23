<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'json_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "json_tables_formatter",
 *   label = @Translation("Table"),
 *   field_types = {
 *     "json",
 *   },
 *   quickedit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class JsonTablesFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'header' => '',
      'mode' => 'table',
      'direction' => 'horizontal',
      'first_row' => TRUE,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['mode'] = [
      '#type' => 'select',
      '#options' => [
        'table' => $this->t('Table'),
        'datatables' => $this->t('Datatables'),
        'bootstrap-table' => $this->t('Bootstrap table'),
      ],
      '#default_value' => $this->getSetting('mode'),
    ];
    $form['direction'] = [
      '#title' => $this->t('Direction'),
      '#type' => 'select',
      '#options' => [
        'horizontal' => $this->t('Horizontal'),
        'vertical' => $this->t('Vertical'),
      ],
      '#default_value' => $this->getSetting('direction'),
    ];
    $form['first_row'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Using first row as a header'),
      '#default_value' => $this->getSetting('first_row'),
    ];
    $form['header'] = [
      '#title' => $this->t('Header'),
      '#type' => 'textarea',
      '#default_value' => $this->getSetting('header'),
      '#description' => $this->t('Separated par ,'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary['mode'] = "Mode: " . $this->getSetting('mode');
    $summary['direction'] = "Direction: " . $this->getSetting('direction');
    if (!empty($this->getSetting('header'))) {
      $summary['header'] = "Header: " . $this->getSetting('header');
    }
    return $summary;
  }

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_name = $items->getName();

    $header = [];
    if (!empty($this->getSetting('header'))) {
      $header = str_replace([',', ';', "\t", "\r\n", "\r"], "\n",
        $this->getSetting('header'));
      $header = explode("\n", $header);
    }
    $drupalSettings['json_table'][$field_name] = [
      'responsive' => TRUE,
      'stateSave' => TRUE,
      'dom' => 'Bfrtip',
      'buttons' => ['copy', 'excel', 'pdf', 'print'],
      'autoFill' => TRUE,
      'colReorder' => TRUE,
      'select' => TRUE,
      'lengthMenu' => [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
      ],
    ];
    $elements = [];
    if (!empty($items)) {
      switch ($this->getSetting('mode')) {
        case 'datatables':
          $elements['#attached'] = [
            'library' => ['json_table/json_datatables'],
            'drupalSettings' => $drupalSettings,
          ];
          break;

        case 'bootstrap-table':
          $elements['#attached'] = [
            'library' => ['json_table/json_bootstraptable'],
            'drupalSettings' => $drupalSettings,
          ];
          $data_option = [
            'toggle' => 'table',
            'search' => "true",
            'show-search-clear-button' => "true",
            'show-refresh' => "true",
            'show-toggle' => "true",
            'show-fullscreen' => "true",
            'show-columns' => "true",
            'show-columns-toggle-all' => "true",
            'show-export' => "true",
            'sortable' => "true",
            'click-to-select' => "true",
            'minimum-count-columns' => "2",
            'show-pagination-switch' => "true",
            'pagination' => "true",
            'page-list' => "[10, 25, 50, 100, all]",
            'show-footer' => "false",
          ];
          break;

        default:
          $elements = [];
      }
    }

    foreach ($items as $delta => $item) {
      $rows = json_decode($item->value, TRUE);
      if (!empty($rows["rows"])) {
        $data = [];
        $maxCol = 0;
        foreach ($rows["rows"] as $row => $valRow) {
          if (!empty($valRow["cells"])) {
            $maxCol = $maxCol < count($valRow["cells"]) ? count($valRow["cells"]) : $maxCol;
          }
          else {
            continue;
          }
        }
        foreach ($rows["rows"] as $row => $valRow) {
          $data[$row] = array_fill(0, $maxCol, '');
          foreach ($valRow["cells"] as $col => $valCol) {
            $data[$row][$col] = current($valCol);
          }
        }
        $rows = $data;
      }
      if ($this->getSetting('direction') == 'vertical') {
        $tableVertical = [];
        foreach ($rows as $row) {
          foreach ($row as $key => $col) {
            $tableVertical[] = [$key, $col];
          }
        }
        if (!empty($tableVertical)) {
          $rows = $tableVertical;
        }
      }
      $elements[$delta] = [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $rows,
        '#langcode' => $langcode,
        '#attributes' => [
          'data-json-field' => $field_name,
          'data-delta' => $delta,
          'class' => [
            'json-table',
            $this->getSetting('mode'),
            'table',
            'table-striped',
          ],
          'id' => Html::getUniqueId($field_name . '-' . $delta),
        ],
      ];
      if (!empty($data_option)) {
        if (empty($header)) {
          $elements[$delta]['#header'] = array_shift($rows);
          if (!$this->getSetting('first_row')) {
            $data_option['show-header'] = "false";
          }
          else {
            $elements[$delta]['#rows'] = $rows;
          }
        }
        foreach ($data_option as $dataTable => $valueData) {
          $elements[$delta]['#attributes']["data-$dataTable"] = $valueData;
        }
      }
    }
    return $elements;
  }

}
