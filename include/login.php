<body class="bg-login">
  <div class="col-sm-12" style="margin-top: 10px; padding-right:10px; padding-left:10px ">
    <?php
    if (isset($_GET['success'])) {
      $success = $_GET['success'];

      if ($success == 'password_berhasil_diubah') {
        echo '<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">Selamat, password anda berhasil diubah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      } else if ($success == 'berhasil_register') {
        echo '<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Anda berhasil mendaftar!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
    if (isset($_GET['error'])) {
      $error = $_GET['error'];

      if ($error == 'login_failed') {
        echo '<div id="danger-alert" class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Email dan Password Anda Salah!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
    }
    ?>
  </div>
  <!-- wrapper -->
  <div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
      <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
          <div class="card radius-15 overflow-hidden">
            <div class="row g-0">
              <div class="col-xl-6">
                <div class="card-body p-5">
                  <div class="text-center">
                    <img src="assets/images/2.png" width="80" alt="">
                    <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                  </div>
                  <div class="">
                    <div class="form-body">
                      <form action="index.php?include=konfirmasi-login" method="POST" class="row g-3">
                        <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">Username</label>
                          <input type="username" name="username" class="form-control" id="inputEmailAddress"
                            placeholder="Username" required>
                        </div>
                        <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">Enter Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" name="password" class="form-control border-end-0"
                              id="inputChoosePassword" value="" placeholder="Enter Password" required>
                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                class="bx bx-hide"></i></a>
                          </div>
                        </div>
                        <div class="col-md-12 text-end"> <a href="index.php?include=forgotpassword">Forgot Password
                            ?</a>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-success"><i
                                class="bx bxs-lock-open"></i>Sign in</button>
                          </div>
                        </div>
                        <div class="col-12 text-center">
                          <p>Don't have an account yet? <a href="index.php?include=register">Sign up here</a></p>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                <img src="assets/images/login-images/logo-login-bg.png" class="img-fluid" alt="...">
              </div>
            </div>
            <!--end row-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end wrapper -->
  <!--plugins-->
  <?php include ("includes/script.php") ?>
</body>