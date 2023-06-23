<?php

namespace Drupal\json_table\Plugin\Field\FieldWidget;

use Symfony\Component\Yaml\Yaml;
use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\Render\ElementInfoManagerInterface;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'json_editor_widget' widget.
 *
 * @FieldWidget(
 *   id = "json_table_widget",
 *   label = @Translation("Json table"),
 *   field_types = {
 *     "json",
 *   }
 * )
 */
class JsonTableWidget extends WidgetBase {

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, array $third_party_settings, ElementInfoManagerInterface $element_info, RendererInterface $renderer) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $third_party_settings);
    $this->elementInfo = $element_info;
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($plugin_id, $plugin_definition, $configuration['field_definition'], $configuration['settings'], $configuration['third_party_settings'], $container->get('element_info'), $container->get('renderer'));
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'header' => '',
      'customtype' => '',
      'header_associative' => TRUE,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritDoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $textPaste = $this->t('Paste your Excel data here');
    $field_name = $items->getName();
    $id = Html::getUniqueId($field_name . '-' . $delta);
    $header = [];

    $field = $items[0]->getFieldDefinition();
    $field_widget_default = $field->getDefaultValueLiteral();
    $field_default = !empty($field_widget_default[$delta]) ? $field_widget_default[$delta]['value'] : '';
    $valuesRow = $items[$delta]->value ?? $field_default;

    $checkJson = json_decode($this->getSetting('header'), TRUE);
    if (!$checkJson && !empty($this->getSetting('header'))) {
      $header = str_replace([
        ',',
        ';',
        "\r\n",
        "\r",
        "\t",
      ], "\n", $this->getSetting('header'));
      $header = explode("\n", $header);
    }
    elseif (is_array($checkJson)) {
      $header = $checkJson;
    }
    $container = [
      '#type' => 'container',
      '#attributes' => [
        'class' => [
          'json-table-wrapper',
        ],
      ],
      'btn' => [
        '#markup' => Markup::create(
          '<button type="button" class="button button-action button--primary btn btn-primary add-row">' . $this->t('Add row') . '</button>
<button type="button" class="button button-action button--primary btn btn-primary add-col">' . $this->t('Add column') . '</button>
<button type="button" class="button button--danger btn btn-danger remove-row"><i class="bi bi-grip-horizontal"></i> ' . $this->t('Remove row') . '</button>
<button type="button" class="button button--danger btn btn-danger remove-col"><i class="bi bi-grip-vertical"></i> ' . $this->t('Remove column') . '</button>'),
      ],
      'table' => [
        '#type' => 'table',
        '#header' => $header,
        '#attributes' => [
          'id' => $id,
          'class' => [
            'json-table',
          ],
          'data-associative' => $this->getSetting('header_associative'),
        ],
      ],
    ];
    $customtype = Yaml::parse($this->getSetting("customtype"));
    if (empty($valuesRow)) {
      $x = 0;
      $y = 0;
      $inputRow = $this->getCustomFieldType($x, $y, $customtype, '', $textPaste, $y);
      $container['table'][0] = [$inputRow];
      if (!empty($header) && count($header) > 1) {
        foreach (range(1, count($header) - 1) as $y) {
          $container['table'][0][] = $this->getCustomFieldType($x, $y, $customtype, $y);
        }
      }
    }
    else {
      $data = json_decode($valuesRow, TRUE);
      foreach ($data as $x => $row) {
        $y = 0;
        foreach ($row as $index => $colValue) {
          $container['table'][$x][$y] = $this->getCustomFieldType($x, $y++, $customtype, $colValue, $index);
        }
      }
    }

    $elements['value'] = [
      '#title' => $this->fieldDefinition->getLabel(),
      '#type' => 'textarea',
      '#default_value' => $items[$delta]->value ?? NULL,
      '#description' => Markup::create($this->renderer->render($container)),
      '#attributes' => [
        'data-json-table' => $this->getSetting('mode'),
        'class' => ['json-table', 'js-hide', $this->getSetting('mode')],
      ],
      '#attached' => [
        'library' => ['json_table/json_table'],
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
  public function getCustomFieldType($x, $y, $customtype, $value = '', $placeholder = '', $indexCol = 0) {
    $typeField = 'textfield';
    $field = [
      '#type' => $typeField,
      '#attributes' => [
        'class' => [
          'table-row-' . $x,
          'table-col-' . $y,
          'form-control',
          'form-text',
          'form-element',
          $x == 0 && $y == 0 ? 'paste' : '',
        ],
        'placeholder' => $placeholder,
        'data-index' => $indexCol,
      ],
    ];
    if (!empty($value)) {
      $field['#value'] = $value;
    }
    $get_custom_setting = [];
    if (!empty($customtype)) {
      if (!empty($customtype['row']) && !empty($customtype['row'][$x])) {
        $get_custom_setting = $customtype['row'][$x];
      }
      if (!empty($customtype['col']) && !empty($customtype['col'][$y])) {
        $get_custom_setting = $customtype['col'][$y];
      }
      if (!empty($customtype["row_{$x}_col_{$y}"])) {
        $get_custom_setting = $customtype["row_{$x}_col_{$y}"];
      }
    }
    if (!empty($get_custom_setting)) {
      foreach ($get_custom_setting as $custom_key => $custom_setting) {
        $field["#" . $custom_key] = $custom_setting;
      }
    }
    return $field;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements['header'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Defined header'),
      '#description' => $this->t('You can set the header separated by tab, comma ",", semicolon ";" or with a json object if you want switch to json viewer, for example:') .
      json_encode(['name' => "Col Name", 'age' => 'Col Age']),
      '#default_value' => $this->getSetting('header'),
    ];

    $elements['customtype'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Custom configured format field type'),
      '#default_value' => $this->getSetting('customtype'),
      '#description' => $this->t('Use format yml validated. Please <a href="http://www.yamllint.com/">check</a> before paste'),
      '#attributes' => [
        'placeholder' => "col:
    2:
      type: textfield
row:
    3:
      type: select
      options:
        foo: foo
        foo2: foo2",
      ],
    ];
    $elements['header_associative'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use header as associative key'),
      '#description' => $this->t('Save header as associative array') .
      json_encode(['Name' => 'Col Name', 'Age' => 'Col Age']),
      '#default_value' => $this->getSetting('header_associative'),
    ];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    if (!empty($this->getSetting('header'))) {
      $summary[] = $this->t('Custom header');
    }
    if (!empty($this->getSetting('customtype'))) {
      $summary[] = $this->t('Custom type field');
    }
    if (!empty($this->getSetting('header_associative'))) {
      $summary[] = $this->t('Associative header');
    }
    return $summary;
  }

  /**
   * Check the submitted JSON against the configured JSON Schema.
   *
   * {@inheritdoc}
   */
  public static function validateJsonData($element, FormStateInterface $form_state) {
    json_decode($element['#value']);
    return json_last_error() == JSON_ERROR_NONE;
  }

}
