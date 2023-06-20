<?php

namespace Drupal\json_table\Plugin\Field\FieldWidget;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'json_editor_widget' widget.
 *
 * @FieldWidget(
 *   id = "json_editor_widget",
 *   label = @Translation("WYSIWYG Json editor"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class JsonEditorWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'code',
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
        'data-json-editor' => $this->getSetting('mode'),
        'data-id' => $id,
        'class' => ['json-editor', 'js-hide', $this->getSetting('mode')],
      ],
      '#description' => '<div id="' . $id . '"></div>',
      '#attached' => [
        'library' => ['json_table/json_editor'],
        'drupalSettings' => [
          'json_editor' => [$delta => $this->getSetting('mode')],
        ],
      ],
      '#element_validate' => [
        [$this, 'validateJsonData'],
      ],
    ];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements['mode'] = [
      '#type' => 'select',
      '#options' => [
        'tree' => $this->t('Tree'),
        'code' => $this->t('Code'),
        'text' => $this->t('Text'),
      ],
      '#title' => $this->t('Editor mode'),
      '#default_value' => $this->getSetting('mode'),
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
