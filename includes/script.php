<script src="assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script>
<script src="assets/js/index.js"></script>
<!-- App JS -->
<script src="assets/js/app.js"></script>

<script>
  // Set timeout for success alert to disappear after 2 seconds
  setTimeout(function() {
    document.getElementById("success-alert").style.display = "none";
  }, 2000);
</script>
<script>
  // Set timeout for success alert to disappear after 2 seconds
  setTimeout(function() {
    document.getElementById("danger-alert").style.display = "none";
  }, 2000);
</script>

<!--Password show & hide js -->
<script>
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass("bx-hide");
        $('#show_hide_password i').removeClass("bx-show");
      } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass("bx-hide");
        $('#show_hide_password i').addClass("bx-show");
      }
    });
  });
</script>

<!--Data Tables js-->
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    //Default data table
    var table = $('#example2').DataTable({
      lengthChange: true,
      buttons: [{
          extend: 'copy',
          exportOptions: {
            columns: ':not(.no-export)'
          }
        },
        {
          extend: 'excel',
          exportOptions: {
            columns: ':not(.no-export)'
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: ':not(.no-export)'
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: ':not(.no-export)'
          }
        },
        'colvis'
      ]
    });
    table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(document).ready(function() {
    //Default data table
    var table = $('#example3').DataTable({
      lengthChange: true,
    });
  });
</script>