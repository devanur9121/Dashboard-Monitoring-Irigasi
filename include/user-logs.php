<!--page-content-wrapper-->
<div class="page-content-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Table</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="index.php?include=dashboard-admin"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data User Logs</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">User Logs</h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Nama Pengguna</th>
                <th>Email Pengguna</th>
                <th>Waktu Login</th>
                <th>Waktu Logout</th>
                <th>Aktivitas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('koneksi/koneksi.php');
              $sql = "SELECT log_user.login_time, log_user.logout_time, 
              log_user.aktivitas, user.id_user, user.username, user.email FROM `log_user` 
              LEFT JOIN user ON log_user.id_user = user.id_user 
              ORDER BY `login_time` DESC";
              $query = mysqli_query($koneksi, $sql);
              $no = 1;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['login_time']; ?></td>
                  <td><?php echo $row['logout_time']; ?></td>
                  <td><?php echo $row['aktivitas']; ?></td>
                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>