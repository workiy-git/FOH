<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'json_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "json_flowchart_formatter",
 *   label = @Translation("Json Flowchart"),
 *   field_types = {
 *     "json",
 *   },
 *   quickedit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class JsonFlowchartFormatter extends FormatterBase {

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_name = $items->getName();
    $elements = !empty($items) ? [
      '#attached' => [
        'library' => ['json_table/flowchart'],
      ],
    ] : [];
    $flowchart = [];
    foreach ($items as $delta => $item) {
      $id = Html::getUniqueId($field_name . '-' . $delta);
      $elements[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'div',
        '#langcode' => $langcode,
        '#attributes' => [
          'data-json-field' => $field_name,
          'data-id' => $id,
          'class' => ['flowchart-display', 'json-table-flowchart'],
        ],
        '#value' => '<div id="' . $id . '-diagram" class="diagram"></div>',
      ];

      $flowchart[$id] = $item->value;
    }
    if (!empty($flowchart)) {
      $elements['#attached']['drupalSettings']['json_flowchart'] = $flowchart;
    }
    return $elements;
  }

}
