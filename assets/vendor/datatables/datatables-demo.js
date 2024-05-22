// Call the dataTables jQuery plugin
$(document).ready(function() {
  var base_url = $("#base_url").val();
  $('.dataTable').DataTable({
    "language" : {
      "url": base_url+"assets/vendor/datatables/es_es.json"
    }
  });
});
