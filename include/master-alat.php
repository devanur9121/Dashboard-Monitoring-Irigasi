<?php
// Proses form tambah data
if (isset($_POST['submit'])) {
  $nama_alat = $_POST['nama_alat'];
  $status_alat = $_POST['status_alat'];

  $query = "INSERT INTO master_alat (nama_alat, status_alat, created_at, updated_at) VALUES ('$nama_alat', '$status_alat', NOW(), NOW())";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Data berhasil ditambah.'); window.location.href='index.php?include=master-alat';</script>";
  } else {
    echo "<script>alert('Data Gagal Ditambah.'); window.location.href='index.php?include=master-alat';</script>";
  }
}

// Proses form edit data
if (isset($_POST['edit'])) {
  $id_alat = $_POST['id_alat'];
  $nama_alat = $_POST['nama_alat'];
  $status_alat = $_POST['status_alat'];

  $query = "UPDATE master_alat SET nama_alat='$nama_alat', status_alat='$status_alat', updated_at=NOW() WHERE id_alat=$id_alat";

  $result_edit = mysqli_query($koneksi, $query);

  if ($result_edit) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href='index.php?include=master-alat';</script>";
    exit();
  } else {
    echo "<script>alert('Data Gagal Diupdate.'); window.location.href='index.php?include=master-alat';</script>";
    exit();
  }
}

if (isset($_POST['id_alat'])) {
  $id_alat = mysqli_real_escape_string($koneksi, $_POST['id_alat']);

  // Query untuk menghapus data
  $delete_query = "DELETE FROM `master_alat` WHERE `id_alat`='$id_alat'";
  $result_delete = mysqli_query($koneksi, $delete_query);

  // Menampilkan pesan berhasil atau gagal menghapus data
  if ($result_delete) {
    echo "<script>alert('Data berhasil dihapus.'); window.location.href='index.php?include=master-alat';</script>";
    exit();
  } else {
    echo "<script>alert('Data gagal dihapus.'); window.location.href='index.php?include=master-alat';</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Data Master Alat</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0 text-md-start">Master Alat
            <button class="btn btn-sm float-end" style="background-color:#b7d5ac" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i> Tambah Alat</button>
          </h4>
        </div>
        <hr>
        <div class="table-responsive">
          <table id="example3" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Nama Alat</th>
                <th>Status</th>
                <th>Terakhir Diupdate</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `master_alat`";
              $query = mysqli_query($koneksi, $sql);
              $no = 1;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama_alat']; ?></td>
                  <td><?php echo $row['status_alat']; ?></td>
                  <td><?php echo $row['updated_at']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_alat']; ?>"><i class="bx bx-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id_alat']; ?>"><i class="bx bx-trash"></i></a>
                  </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id_alat']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Alat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="POST" action="">
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="nama_alat" class="form-label">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?php echo $row['nama_alat']; ?>" required>
                          </div>
                          <div class="mb-3">
                            <label for="status_alat" class="form-label">Status</label>
                            <select class="form-select" id="status_alat" name="status_alat">
                              <option value="Aktif" <?php if ($row['status_alat'] == 'Aktif') {
                                                      echo 'selected';
                                                    } ?>>Aktif</option>
                              <option value="Maintenance" <?php if ($row['status_alat'] == 'Maintenance') {
                                                            echo 'selected';
                                                          } ?>>Maintenance</option>
                            </select>
                          </div>
                          <input type="hidden" name="id_alat" value="<?php echo $row['id_alat']; ?>">
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
                <div class="modal fade" id="deleteModal<?php echo $row['id_alat']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Alat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <strong>Anda yakin ingin menghapus data ini?</strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <form id="deleteForm" method="POST">
                          <input type="hidden" name="id_alat" value="<?php echo $row['id_alat']; ?>">
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
                  <h5 class="modal-title" id="addModalLabel">Tambah Alat</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="mb-3">
                      <label for="nama_alat" class="form-label">Nama Alat</label>
                      <input type="text" class="form-control" id="nama_alat" name="nama_alat" required>
                    </div>
                    <div class="mb-3">
                      <label for="status_alat" class="form-label">Status Alat</label>
                      <select class="form-control" id="status_alat" name="status_alat" required>
                        <option value="">-Pilih Status-</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Maintenance">Maintenance</option>
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