<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'json_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "json_formatter",
 *   label = @Translation("Json view"),
 *   field_types = {
 *     "json",
 *   },
 *   quickedit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class JsonFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => [
        'collapse' => TRUE,
        'nl2br' => FALSE,
        'recursive_collapser' => FALSE,
        'escape' => FALSE,
        'strict' => FALSE,
      ],
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['mode'] = [
      '#title' => $this->t('Mode'),
      '#type' => 'checkboxes',
      '#options' => [
        'collapse' => $this->t('Collapse all nodes when rendering first time'),
        'nl2br' => $this->t('Convert new line to') . '<br>',
        'recursive_collapser' => $this->t('Collapse nodes recursively'),
        'escape' => $this->t('Escape HTML in key'),
        'strict' => $this->t('In strict mode, invalid JSON value type will throw a error'),
      ],
      '#default_value' => $this->getSetting('mode'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary['mode'] = implode(', ', array_diff($this->getSetting('mode'), [0]));
    return $summary;
  }

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_name = $items->getName();
    $settings = array_diff($this->getSetting('mode'), [0]);
    $settings = array_fill_keys($settings, TRUE);
    $elements = !empty($items) ? [
      '#attached' => [
        'library' => ['json_table/jquery_jsonview'],
        'drupalSettings' => [
          'json_view' => [$field_name => $settings],
        ],
      ],
    ] : [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'html_tag',
        '#tag' => 'pre',
        '#value' => $item->value,
        '#langcode' => $langcode,
        '#attributes' => [
          'data-json-field' => $field_name,
          'class' => ['json-view'],
        ],
      ];
    }
    return $elements;
  }

}
