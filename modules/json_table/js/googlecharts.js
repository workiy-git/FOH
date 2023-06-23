(function (Drupal, $, once) {
  Drupal.behaviors.googlecharts = {
    attach: function (context, settings) {
      $(once('googleCharts', '.googleCharts', context)).each(function () {
        // Check if table contains expandable hidden rows.
        let field = $(this).data('json-field');
        let options = settings.googleCharts[field]['options'];
        let type = settings.googleCharts[field]['chart_type'];
        let selector = $(this).attr('id');
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          let dataTable = settings.googleCharts[selector]['data'];
          let data = google.visualization.arrayToDataTable(dataTable);
          let view = new google.visualization.DataView(data);
          let chart = new google.visualization[type](document.getElementById(selector.replace(/#/i, "")));
          chart.draw(view, options);
        }
      });
    }
  };

}(Drupal, jQuery, once));
