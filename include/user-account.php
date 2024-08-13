<?php
// Proses form tambah data
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $level =  $_POST['level'];

  $query = "INSERT INTO user (nama, email, username, password, level, created_at, updated_at) VALUES ('$nama', '$email', '$username', '$password', '$level', NOW(), NOW())";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Data berhasil ditambah.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  } else {
    echo "<script>alert('Data Gagal Ditambah.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  }
}

// Proses form edit data
if (isset($_POST['edit'])) {
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $level =  $_POST['level'];

  $query = "UPDATE user SET nama='$nama', email='$email', username='$username', level='$level', updated_at=NOW() WHERE id_user=$id_user";

  $result_edit = mysqli_query($koneksi, $query);

  if ($result_edit) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  } else {
    echo "<script>alert('Data Gagal Diupdate.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  }
}

if (isset($_POST['id_user'])) {
  $id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);

  // Query untuk menghapus data
  $delete_query = "DELETE FROM `user` WHERE `id_user`='$id_user'";
  $result_delete = mysqli_query($koneksi, $delete_query);

  // Menampilkan pesan berhasil atau gagal menghapus data
  if ($result_delete) {
    echo "<script>alert('Data berhasil dihapus.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  } else {
    echo "<script>alert('Data gagal dihapus.'); window.location.href='index.php?include=user-account';</script>";
    exit();
  }
}

?>

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
            <li class="breadcrumb-item active" aria-current="page">Data Master User</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0 text-md-start">Users Account
            <button class="btn btn-sm float-end" style="background-color:#b7d5ac" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i> Tambah User</button>
          </h4>
        </div>
        <hr>
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Nama</th>
                <th>email</th>
                <th>username</th>
                <th>level</th>
                <th class="no-export">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `user` ORDER BY created_at DESC";
              $query = mysqli_query($koneksi, $sql);
              $no = 1;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['level']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_user']; ?>"><i class="bx bx-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id_user']; ?>"><i class="bx bx-trash"></i></a>
                  </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="POST" action="">
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="level" name="level">
                              <option value="Admin" <?php if ($row['level'] == 'Admin') {
                                                      echo 'selected';
                                                    } ?>>Admin</option>
                              <option value="User" <?php if ($row['level'] == 'User') {
                                                      echo 'selected';
                                                    } ?>>User</option>
                            </select>
                          </div>
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal Delete -->
                <div class="modal fade" id="deleteModal<?php echo $row['id_user']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <strong>Anda yakin ingin menghapus data ini?</strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <form id="deleteForm" method="POST">
                          <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                          <button type="" class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php $no++;
              } ?>
            </tbody>
          </table>

          <!-- Modal Tambah Alat -->
          <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addModalLabel">Tambah User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                      <label for="inputChoosePassword" class="form-label">Password</label>
                      <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="level" class="form-label">Level</label>
                      <select class="form-control" id="level" name="level" required>
                        <option value="">-Pilih Level-</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>