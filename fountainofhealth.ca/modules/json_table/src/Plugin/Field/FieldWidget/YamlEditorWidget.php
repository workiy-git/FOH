<?php

namespace Drupal\json_table\Plugin\Field\FieldWidget;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Serialization\Yaml;

/**
 * Plugin implementation of the 'json_editor_widget' widget.
 *
 * @FieldWidget(
 *   id = "yaml_editor_widget",
 *   label = @Translation("Yaml editor"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class YamlEditorWidget extends WidgetBase {

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
      '#default_value' => json_encode(json_decode($default_value, TRUE)),
      '#attributes' => [
        'data-id' => $id,
        'class' => ['yaml-editor', 'js-hide', 'visually-hidden'],
      ],
      '#description' => '<div id="' . $id . '"></div>',
      '#attached' => ['library' => ['json_table/yaml_editor']],
      '#element_validate' => [[$this, 'validateYamlData']],
    ];
    return $elements;
  }

  /**
   * {@inheritDoc}
   */
  public static function validateYamlData($element, FormStateInterface $form_state) {
    $yaml = Yaml::decode($element['#value']);
    if (!empty($element['#value']) && !empty($yaml)) {
      return TRUE;
    }
    return FALSE;
  }

}
