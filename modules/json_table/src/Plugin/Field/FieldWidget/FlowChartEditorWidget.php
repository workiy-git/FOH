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
 *   id = "flowchart_editor_widget",
 *   label = @Translation("Flowchart editor"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class FlowChartEditorWidget extends WidgetBase {

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
        'data-id' => $id,
        'class' => ['flowchart-editor', 'js-hide', 'visually-hidden'],
      ],
      '#description' => '<div id="' . $id . '" class="json-table-flowchart">
<div id="' . $id . '-palette" class="palette"></div>
  <div id="' . $id . '-diagram" class="diagram"></div>
</div>',
      '#attached' => ['library' => ['json_table/flowchart']],
    ];
    return $elements;
  }

}
