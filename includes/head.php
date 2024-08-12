<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Irrigation Website</title>
<!--favicon-->
<link rel="icon" href="assets/images/4.png" type="image/png" />
<!-- Vector CSS -->
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
<!--plugins-->
<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
<!-- loader-->
<link href="assets/css/pace.min.css" rel="stylesheet" />
<script src="assets/js/pace.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
<!-- Icons CSS -->
<link rel="stylesheet" href="assets/css/icons.css" />
<!-- App CSS -->
<link rel="stylesheet" href="assets/css/app.css" />
<link rel="stylesheet" href="assets/css/dark-sidebar.css" />
<link rel="stylesheet" href="assets/css/dark-theme.css" />
<!--Data Tables -->
<link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/assets_grafik/js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="assets/assets_grafik/js/mdb.min.js"></script>

<!-- memanggil data grafik -->
<script type="text/javascript">
  var refreshid = setInterval(function () {
    $('#responsecontainer').load('include/data.php');
  }, 5000);
</script>
<style>
  body {
    overflow-y: scroll;
    /* Pastikan ada scrollbar untuk konten yang melebihi */
  }

  body::-webkit-scrollbar {
    width: 0px;
    /* Sembunyikan scrollbar */
    background: transparent;
    /* Pilihan: untuk tampilan yang lebih menarik */
  }

  body::-webkit-scrollbar-thumb {
    background: transparent;
    /* Menghindari tampilan scrollbar yang tidak diinginkan */
  }
</style>
</style>