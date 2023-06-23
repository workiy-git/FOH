<?php

namespace Drupal\json_table\Plugin\Field\FieldWidget;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'luckysheet_widget' widget.
 *
 * @FieldWidget(
 *   id = "luckysheet_widget",
 *   label = @Translation("Luckysheet editor"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class LuckySheetWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'edit',
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
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $id = Html::getUniqueId($items->getName() . '-' . $delta);
    $field = $items[0]->getFieldDefinition();
    $field_widget_default = $field->getDefaultValueLiteral();
    $field_default = !empty($field_widget_default[$delta]) ? $field_widget_default[$delta]['value'] : '';
    $default_value = $items[$delta]->value ?? $field_default;
    $elements['value'] = [
      '#title' => $this->fieldDefinition->getLabel(),
      '#type' => 'textarea',
      '#default_value' => $default_value,
      '#attributes' => [
        'data-mode' => $this->getSetting('mode'),
        'data-id' => $id,
        'data-title' => $this->fieldDefinition->getLabel(),
        'class' => ['json-luckysheet', 'js-hide', $this->getSetting('mode')],
      ],
      '#attached' => [
        'library' => ['json_table/luckysheet'],
        'drupalSettings' => [
          'mode' => [$delta => $this->getSetting('mode')],
          'load-Url' => [$delta => $this->getSetting('load-Url')],
          'options' => [$delta => $this->getSetting('options')],
        ],
      ],
      '#element_validate' => [
        [$this, 'validateJsonData'],
      ],
    ];
    if (!empty($this->getSetting('options'))) {
      foreach ($this->getSetting('options') as $config => $option) {
        $elements['value']['#attributes']["data-$config"] = $option ? 'true' : 'false';
      }
    }
    if (!empty($this->getSetting('load-Url'))) {
      $elements['value']['#attributes']['data-loadUrl'] = $this->getSetting('load-Url');
    }
    if ($this->getSetting('mode') == 'read') {
      $elements[$delta]['#attributes']["data-edit-Mode"] = 'false';
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
        'enable-Add-Back-Top' => $this->t('Allow back to top'),
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

  /**
   * {@inheritDoc}
   */
  public static function validateJsonData($element, FormStateInterface $form_state) {
    json_decode($element['#value']);
    return json_last_error() == JSON_ERROR_NONE;
  }

}
