<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'luckysheet_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "luckysheet_formatter",
 *   label = @Translation("Luckysheet"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class LuckysheetFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'read',
      'load-Url' => '',
      'options' => [
        'allow-Update' => FALSE,
        'auto-Formatw' => FALSE,
        'allow-Copy' => TRUE,
        'showtoolbar' => TRUE,
        'showinfobar' => TRUE,
        'showsheetbar' => TRUE,
        'showstatistic-Bar' => TRUE,
        'enable-Add-Row' => TRUE,
        'enable-Add-Back-Top' => TRUE,
        'show-Config-Window-Resize' => TRUE,
        'force-Calculation' => FALSE,
      ],
      'showsheetbarConfig' => [
        'add' => FALSE,
        'menu' => FALSE,
        'sheet' => FALSE,
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
        'library' => ['json_table/luckysheet'],
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
          'data-title' => $this->fieldDefinition->getLabel(),
          'data-id' => $id,
          'id' => $id,
          'class' => ['json-luckysheet-display'],
        ],
      ];
      $elements['#attached']['drupalSettings'] = [
        'json_table' => [$id => $item->value],
      ];
      if (!empty($this->getSetting('options'))) {
        foreach ($this->getSetting('options') as $config => $option) {
          $elements[$delta]['#attributes']["data-$config"] = $option ? 'true' : 'false';
        }
      }
      if ($this->getSetting('mode') == 'read') {
        $elements[$delta]['#attributes']["data-edit-Mode"] = 'false';
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
        'allow-Update' => $this->t('Whether to allow back-end update after operating the table'),
        'auto-Formatw' => $this->t('Automatically format numbers with more than 4 digits into "billion format"'),
        'allow-Copy' => $this->t('Allow copy'),
        'showtoolbar' => $this->t('Show the toolbar'),
        'showinfobar' => $this->t('Show the top information bar'),
        'showsheetbar' => $this->t('Show the bottom sheet button'),
        'showstatistic-Bar' => $this->t('Show the bottom count bar'),
        'enable-Add-Row' => $this->t('Allow additional rows'),
        'enable-AddBack-Top' => $this->t('Allow back to top'),
        'show-Config-Window-Resize' => $this->t('Show configuration of chart'),
        'force-Calculation' => $this->t('Force calculation'),
      ],
      '#title' => $this->t('Options'),
      '#default_value' => $this->getSetting('options'),
    ];
    $elements['load-Url'] = [
      '#title' => $this->t('URL load data through ajax'),
      '#type' => 'url',
      '#default_value' => $this->getSetting('load-Url'),
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
