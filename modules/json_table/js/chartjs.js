(function (Drupal, $, once) {
  Drupal.behaviors.chartJs = {
    attach: function (context, settings) {
      $(once('chartJs', '.chartjs', context)).each(function () {
        // Check if table contains expandable hidden rows.
        let selector = $(this).attr('id');
        let dataTable = settings.chartjs[selector]['data'];
        let ctx = document.getElementById(selector);
        new Chart(ctx, {
          type: dataTable['type'],
          data: dataTable,
        });
      });
    }
  };

}(Drupal, jQuery, once));
