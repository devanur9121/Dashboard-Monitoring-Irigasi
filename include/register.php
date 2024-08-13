<?php include("include/konfirmasi-register.php") ?>

<body class="bg-register">
  <div class="col-sm-12" style="margin-top: 10px; padding-right:10px; padding-left:10px ">
    <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];

      if ($error == 'gagal_register') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Woops! Terjadi kesalahan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } else if ($error == 'email_sudah_terdaftar') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Email Anda Telah Terdaftar!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } else if ($error == 'password_tidak_sesuai') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Password Anda Tidak Sesuai!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }
    ?>
  </div>
  <!-- wrapper -->
  <div class="wrapper">
    <div class="section-authentication-register d-flex align-items-center justify-content-center">
      <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
          <div class="card radius-15 overflow-hidden">
            <div class="row g-0">
              <div class="col-xl-6">
                <div class="card-body p-md-5">
                  <div class="text-center">
                    <img src="assets/images/2.png" width="80" alt="">
                    <h3 class="mt-4 font-weight-bold">Create an Account</h3>
                  </div>
                  <div class="">
                    <div class="d-grid"></div>
                    <div class="form-body">
                      <form action="index.php?include=konfirmasi-register" method="POST" class="row g-3">
                        <div class="col-sm-6">
                          <label for="inputFirstName" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" id="inputFirstName" placeholder="" required>
                        </div>
                        <div class="col-sm-6">
                          <label for="inputLastName" class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" id="inputLastName" placeholder="" required>
                        </div>
                        <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">Alamat Email</label>
                          <input type="email" class="form-control" id="inputEmailAddress" value="<?php echo $email; ?>" name="email" placeholder="example@user.com" required>
                        </div>
                        <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" name="password" value="<?php echo $password; ?>" id="inputChoosePassword" value="" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                          </div>
                        </div>
                        <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">Konfirmasi Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" name="cpassword" value="<?php echo $password; ?>" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-success"><i class="bx bx-user me-1"></i>Sign up</button>
                          </div>
                        </div>
                        <div class="col-12 text-center">
                          <p>Already have an account? <a href="index.php?include=login">Sign in here</a></p>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                <img src="assets/images/login-images/register-bg.png" class="img-fluid" alt="...">
              </div>
            </div>
            <!--end row-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end wrapper -->
  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php include("includes/script.php") ?>