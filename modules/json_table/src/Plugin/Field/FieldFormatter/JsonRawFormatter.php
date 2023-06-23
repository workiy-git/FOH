<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'json_string_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "json_raw_formatter",
 *   label = @Translation("Json raw"),
 *   field_types = {
 *     "json",
 *   },
 * )
 */
class JsonRawFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [] + parent::defaultSettings();
  }

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $element[$delta] = ['#markup' => $item->value];
    }
    return $element;
  }

}
