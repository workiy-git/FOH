<?php

namespace Drupal\json_table\Plugin\Field\FieldWidget;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'x_spreadsheet_widget' widget.
 *
 * @FieldWidget(
 *   id = "x_spreadsheet_widget",
 *   label = @Translation("X-Spreadsheet editor"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class XSpreadsheetWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'edit',
      'loadUrl' => '',
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
        'class' => ['json-x-spreadsheet', 'js-hide', $this->getSetting('mode')],
      ],
      '#attached' => [
        'library' => ['json_table/x-spreadsheet'],
        'drupalSettings' => [
          'mode' => [$delta => $this->getSetting('mode')],
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

  /**
   * {@inheritDoc}
   */
  public static function validateJsonData($element, FormStateInterface $form_state) {
    json_decode($element['#value']);
    return json_last_error() == JSON_ERROR_NONE;
  }

}
