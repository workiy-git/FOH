<?php

namespace Drupal\json_table\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'json_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "json_chart_formatter",
 *   label = @Translation("Json Chart"),
 *   field_types = {
 *     "json",
 *   },
 *   quickedit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class JsonChartFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'mode' => 'googleCharts',
      'chart_type' => 'LineChart',
      'chart_width' => 900,
      'chart_height' => 300,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['mode'] = [
      '#type' => 'select',
      '#options' => [
        'googleCharts' => $this->t('Google chart'),
        'chartjs' => $this->t('Chart js'),
      ],
      '#default_value' => $this->getSetting('mode'),
    ];
    $form['chart_type'] = [
      '#title' => $this->t('Chart type'),
      '#description' => '<a href="https://developers-dot-devsite-v2-prod.appspot.com/chart/interactive/docs/gallery" target="_blank">' . $this->t('Google charts') . '</a>' .
      ' Or <a href="https://www.chartjs.org/docs/latest/samples/information.html" target="_blank">' . $this->t('ChartJs') . '</a>',
      '#type' => 'select',
      '#default_value' => $this->getSetting('chart_type'),
      '#options' => $this->googleChartsOption(),
      '#empty_option' => $this->t('Default Line Chart'),
    ];
    $form['chart_width'] = [
      '#title' => $this->t('Chart width'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('chart_width'),
    ];
    $form['chart_height'] = [
      '#title' => $this->t('Chart height'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('chart_height'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary['mode'] = "Mode: " . $this->getSetting('mode');
    $summary['chart_type'] = "Type: " . $this->getSetting('chart_type');
    return $summary;
  }

  /**
   * {@inheritDoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $field_name = $items->getName();
    $setting = $this->getSettings();
    $options = $this->googleChartsOption($setting['chart_type']);
    $mode = $this->getSetting('mode');
    $fieldName = $this->fieldDefinition->getLabel();
    $entity = $items->getEntity();
    $form_display = \Drupal::service('entity_display.repository')
      ->getFormDisplay($entity->getEntityTypeId(), $entity->bundle(), $form_mode = 'default');
    $widgetSettings = $form_display->getComponent($field_name)['settings'];
    $header = [];
    if (!empty($widgetHeader = $widgetSettings['header'])) {
      $checkJson = json_decode($widgetHeader, TRUE);
      if (!$checkJson && !empty($widgetHeader)) {
        $header = str_replace([
          ',',
          ';',
          "\r\n",
          "\r",
          "\t",
        ], "\n", $widgetHeader);
        $header = explode("\n", $header);
      }
      elseif (is_array($checkJson)) {
        $header = $checkJson;
      }
    }
    $options['url'] = FALSE;
    if (!empty($setting['caption'])) {
      $options['title'] = $setting['caption'];
    }
    $setting['options'] = $options;
    $elements['#attached'] = [
      'drupalSettings' => [
        $mode => [$field_name => $setting],
      ],
    ];
    if (!empty($items)) {
      switch ($mode) {
        case 'googleCharts':
          $elements['#attached']['library'] = ['json_table/googleCharts'];
          break;

        case 'chartjs':
          $elements['#attached']['library'] = ['json_table/chartjs'];
          break;

        default:
          $elements = [];
      }
    }
    if (is_numeric($setting['chart_width'])) {
      $setting['chart_width'] .= 'px';
    }
    if (is_numeric($setting['chart_height'])) {
      $setting['chart_height'] .= 'px';
    }
    if (empty($setting['chart_width'])) {
      $setting['chart_width'] = '100%';
    }

    foreach ($items as $delta => $item) {
      $value = $item->value;
      if (empty($value)) {
        continue;
      }
      $id = Html::getUniqueId($field_name . '-' . $delta);
      $elements[$delta] = [
        '#theme' => 'json_table_chart',
        '#settings' => $setting,
        '#id_field_name' => $field_name,
        '#langcode' => $langcode,
        '#attributes' => [
          'data-json-field' => $field_name,
          'data-delta' => $delta,
          'class' => [$mode, $field_name],
          'id' => $id,
        ],
      ];
      $value = json_decode($value, JSON_OBJECT_AS_ARRAY);
      if (!empty($value)) {
        foreach ($value as $key => $row) {
          foreach ($row as $col => $val) {
            if (is_numeric($val)) {
              $value[$key][$col] = $val + 0;
            }
          }
          $value[$key] = array_values($value[$key]);
        }
      }
      switch ($mode) {
        case 'googleCharts':
          if (!empty($header)) {
            array_unshift($value, $header);
          }
          $elements['#attached']['drupalSettings'][$mode][$id]['data'] = $value;
          break;

        case 'chartjs':
          if (empty($header)) {
            $header = array_shift($value);
          }
          $chartJsOption = $this->chartJsOption($setting['chart_type']);
          $datasets = [];
          if (!empty($value)) {
            foreach ($value as $delta => $row) {
              $datasets[] = [
                'label' => $fieldName . ' ' . (!empty($delta) ? $delta : ''),
                'data' => $row,
              ];
            }
          }
          $elements['#attached']['drupalSettings'][$mode][$id]['data'] = [
            'type' => $chartJsOption['type'],
            'labels' => $header,
            'datasets' => $datasets,
          ];

          break;
      }
    }
    return $elements;
  }

  /**
   * {@inheritDoc}
   */
  private function googleChartsOption($option = FALSE) {
    $options = [
      'BarChart' => [
        'title' => $this->t('Bar'),
        'option' => [
          'bar' => ['groupWidth' => "95%"],
          'legend' => ['position' => "none"],
        ],
      ],
      'BubbleChart' => [
        'title' => $this->t('Bubble'),
        'option' => [
          'bubble' => ['textStyle' => ['fontSize' => 11]],
        ],
      ],
      'LineChart' => [
        'title' => $this->t('Line'),
        'option' => [
          'legend' => ['position' => "bottom"],
          'curveType' => 'function',
        ],
      ],
      'ColumnChart' => [
        'title' => $this->t('Column'),
        'option' => [
          'bar' => ['groupWidth' => "95%"],
          'legend' => ['position' => "none"],
        ],
      ],
      'ComboChart' => [
        'title' => $this->t('Combo'),
        'option' => [
          'seriesType' => 'bars',
        ],
      ],
      'PieChart' => [
        'title' => $this->t('Pie'),
        'option' => [
          'is3D' => TRUE,
        ],
      ],
      'ScatterChart' => [
        'title' => $this->t('Scatter'),
        'option' => [
          'legend' => ['position' => "none"],
        ],
      ],
      'SteppedAreaChart' => [
        'title' => $this->t('Stepped Area'),
        'option' => [
          'isStacked' => TRUE,
        ],
      ],
      'AreaChart' => [
        'title' => $this->t('Area'),
        'option' => [
          'legend' => ['position' => "top", 'maxLines' => 3],
          'isStacked' => 'relative',
        ],
      ],
      'Histogram' => [
        'title' => $this->t('Histogram'),
        'option' => [
          'legend' => ['position' => "top", 'maxLines' => 3],
          'interpolateNulls' => FALSE,
        ],
      ],
      'CandlestickChart' => [
        'title' => $this->t('Candlestick'),
        'option' => [
          'notHeader' => TRUE,
          'legend' => 'none',
          'bar' => ['groupWidth' => '100%'],
        ],
      ],
    ];
    if ($option) {
      return $options[$option]['option'];
    }
    $titleOptions = [];
    foreach ($options as $type => $option) {
      $titleOptions[$type] = $option['title'];
    }
    return $titleOptions;
  }

  /**
   * {@inheritdoc}
   */
  private function chartJsOption($option) {
    $options = [
      'BarChart' => [
        'type' => 'bar',
        'option' => [
          'indexAxis' => 'y',
        ],
      ],
      'BubbleChart' => [
        'type' => 'bubble',
      ],
      'LineChart' => [
        'type' => 'line',
      ],
      'ColumnChart' => [
        'type' => 'bar',
      ],
      'ComboChart' => [
        'type' => 'doughnut',
      ],
      'PieChart' => [
        'type' => 'pie',
      ],
      'ScatterChart' => [
        'type' => 'scatter',
        'option' => [
          'scales' => [
            'x' => [
              'type' => 'linear',
              'position' => 'bottom',
            ],
          ],
        ],
      ],
      'SteppedAreaChart' => [
        'type' => 'radar',
        'option' => [
          'elements' => [
            'line' => ['borderWidth' => 3],
          ],
        ],
      ],
      'AreaChart' => [
        'type' => 'polarArea',
      ],
    ];
    return $options[$option] ?? $options['BarChart'];
  }

}
