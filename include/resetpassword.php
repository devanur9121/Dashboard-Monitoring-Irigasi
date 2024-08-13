<link rel="icon" href="assets/images/4.png" type="image/png" />

<body class="bg-forgot">
  <div class="col-sm-12" style="margin-top: 10px; padding-right:10px; padding-left:10px ">
    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];

      if ($error == 'password_tidak_sama') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Password dan konfirmasi password tidak sama!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      } else if ($error == 'token_invalid') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Token tidak valid atau telah kadaluarsa!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      }
    }
    ?>
  </div>
  <!-- wrapper -->
  <div class="wrapper">
    <div class="authentication-forgot d-flex align-items-center justify-content-center">
      <div class="card shadow-lg forgot-box">
        <div class="card-body p-md-5">
          <div class="text-center">
            <img src="assets/images/icons/forgot-3.png" width="140" alt="" />
          </div>
          <h4 class="mt-5 font-weight-bold">Reset Password</h4>
          <p class="text-muted">Masukan password baru anda</p>
          <form action="index.php?include=konfirmasi-reset-password" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
            <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
            <div class="mb-3 mt-4">
              <label class="form-label">Password Baru</label>
              <div class="input-group" id="show_hide_password">
                <input type="password" name="password" class="form-control form-control-lg radius-30" id="inputChoosePassword" value="" placeholder="Masukan password baru" required>
                <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <div class="input-group" id="show_hide_password">
                <input type="password" name="confirm_password" class="form-control form-control-lg radius-30" id="inputChoosePassword" value="" placeholder="Konfirmasi password baru" required>
                <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
              </div>
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="reset" class="btn btn-success btn-lg radius-30">Reset Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/script.php") ?>
</body>