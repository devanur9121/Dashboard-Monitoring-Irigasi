<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasi-login.php");
  } else if ($include == "logout") {
    include("include/logout.php");
  } else if ($include == "konfirmasi-register") {
    include("include/konfirmasi-register.php");
  } else if ($include == "konfirmasi-forgot-password") {
    include("include/konfirmasi-forgot-password.php");
  } else if ($include == "konfirmasi-reset-password") {
    include("include/konfirmasi-reset-password.php");
  } else if ($include == "konfirmasi-edit-profile") {
    include("include/konfirmasi-edit-profile.php");
  } else if ($include == "konfirmasi-edit-master-alat") {
    include("include/konfirmasi-edit-master-alat.php");
  } else if ($include == "konfirmasi-add-master-alat") {
    include("include/konfirmasi-edit-master-alat.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/head.php") ?>
</head>

<?php
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if (isset($_SESSION['id_user'])) {
?>

    <body>
      <!-- wrapper -->
      <div class="wrapper">
        <!--sidebar-wrapper-->
        <?php include("includes/sidebar.php") ?>
        <!--end sidebar-wrapper-->
        <!--header-->
        <?php include("includes/header.php") ?>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
          <!--page-content-wrapper-->
          <?php
          if ($include == "dashboard-admin") {
            include("include/dashboard-admin.php");
          } else if ($include == "dashboard-user") {
            include("include/dashboard-user.php");
          } else if ($include == "profile") {
            include("include/profile.php");
          } else if ($include == "data-histori-sensor") {
            include("include/data-histori-sensor.php");
          } else if ($include == "user-logs") {
            include("include/user-logs.php");
          } else if ($include == "informasi") {
            include("include/informasi.php");
          } else if ($include == "master-alat") {
            include("include/master-alat.php");
          } else if ($include == "user-account") {
            include("include/user-account.php");
          } else if ($include == "master-contact") {
            include("include/master-contact.php");
          } else if ($include == "contact") {
            include("include/contact.php");
          } else if ($include == "chart") {
            include("include/chart.php");
          }
          ?>
          <!--end row-->
          <!--end page-content-wrapper-->

          <!--end page-wrapper-->
          <!--start overlay-->
          <div class="overlay toggle-btn-mobile"></div>
          <!--end overlay-->
          <!--Start Back To Top Button-->
          <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
          <!--End Back To Top Button-->
          <!--footer -->
          <div class="footer">
            <?php include("includes/footer.php") ?>
          </div>
          <!-- end footer -->
        </div>
        <!-- end wrapper -->
        <!--start switcher-->
        <?php include("includes/switchertema.php") ?>
        <!--end switcher-->
        <!-- JavaScript -->

        <!-- Bootstrap JS -->
        <?php include("includes/script.php") ?>
    </body>
<?php
  } else {
    if ($include == "register") {
      include("include/register.php");
    } else if ($include == "forgotpassword") {
      include("include/forgotpassword.php");
    } else if ($include == "resetpassword") {
      include("include/resetpassword.php");
    } else if ($include == "login") {
      include("include/login.php");
    } else {
      include("include/home.php");
    }
  }
} else {
  include("include/home.php"); // Jika tidak ada include yang diatur, maka akan menampilkan halaman home.php
}
?>

</html>