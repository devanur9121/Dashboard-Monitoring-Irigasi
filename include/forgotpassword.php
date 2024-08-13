<link rel="icon" href="assets/images/4.png" type="image/png" />

<body class="bg-forgot">
  <div class="col-sm-12" style="margin-top: 10px; padding-right:10px; padding-left:10px ">
    <?php
    if (isset($_GET['success'])) {
      $success = $_GET['success'];

      if ($success == 'email_sent') {
        echo '<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">Reset Password Berhasil Dikirim, Silakan periksa email anda.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
    if (isset($_GET['error'])) {
      $error = $_GET['error'];

      if ($error == 'email_not_registered') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Email Tidak Terdaftar!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      } else if ($error == 'email_not_sent') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Anda Gagal Mengirim Reset Password!
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
          <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
          <p class="text-muted">Enter your registered email ID to receive a password reset link</p>
          <form action="index.php?include=konfirmasi-forgot-password" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-4">
              <label class="form-label">Email id</label>
              <input type="text" name="email" class="form-control form-control-lg radius-30" placeholder="example@user.com" required />
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="forgot" class="btn btn-success btn-lg radius-30">Send</button>
              <a href="index.php?include=login" class="btn btn-light radius-30"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/script.php") ?>
</body>