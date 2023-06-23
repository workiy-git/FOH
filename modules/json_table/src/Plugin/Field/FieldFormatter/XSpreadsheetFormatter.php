<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'x_spreadsheet_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "x_spreadsheet_formatter",
 *   label = @Translation("X-Spreadsheet"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class XSpreadsheetFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'read',
      'options' => [
        'show-Contextmenu' => FALSE,
        'show-Grid' => TRUE,
        'show-Toolbar' => TRUE,
      ],
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_name = $items->getName();
    $elements = !empty($items) ? [
      '#attached' => [
        'library' => ['json_table/x-spreadsheet'],
      ],
    ] : [];

    foreach ($items as $delta => $item) {
      $id = Html::getUniqueId($field_name . '-' . $delta);
      $elements[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#langcode' => $langcode,
        '#attributes' => [
          'data-mode' => $this->getSetting('mode'),
          'data-id' => $id,
          'id' => $id,
          'class' => ['json-x-spreadsheet-display'],
        ],
      ];
      $elements['#attached']['drupalSettings'] = [
        'json_table' => [$id => $item->value],
      ];
      if (!empty($this->getSetting('options'))) {
        foreach ($this->getSetting('options') as $config => $option) {
          $elements['value']['#attributes']["data-$config"] = $option ? 'true' : 'false';
        }
      }
    }
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements['mode'] = [
      '#type' => 'select',
      '#options' => [
        'edit' => $this->t('Edit'),
        'read' => $this->t('Read'),
      ],
      '#title' => $this->t('Editor mode'),
      '#default_value' => $this->getSetting('mode'),
    ];
    $elements['options'] = [
      '#type' => 'checkboxes',
      '#options' => [
        'show-Toolbar' => $this->t('Show the top information bar'),
        'show-Contextmenu' => $this->t('Show menu'),
        'show-Grid' => $this->t('Show grid'),
      ],
      '#title' => $this->t('Options'),
      '#default_value' => $this->getSetting('options'),
    ];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Mode: @mode', ['@mode' => $this->getSetting('mode')]);
    return $summary;
  }

}
