<?php
// Proses form tambah data
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['no_telp'];

  $query = "INSERT INTO contact (nama, no_telp) VALUES ('$nama', '$telp')";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    echo "<script>alert('Data berhasil ditambah.'); window.location.href='index.php?include=master-contact';</script>";
    exit();
  } else {
    echo "<script>alert('Data Gagal Ditambah.'); window.location.href='index.php?include=master-contact';</script>";
    exit();
  }
}

// Proses form edit data
if (isset($_POST['edit'])) {
  $id_contact = $_POST['id_contact'];
  $nama = $_POST['nama'];
  $telp = $_POST['no_telp'];

  $query = "UPDATE contact SET nama='$nama', no_telp='$telp' WHERE id_contact=$id_contact";

  $result_edit = mysqli_query($koneksi, $query);

  if ($result_edit) {
    echo "<script>alert('Data berhasil diupdate.'); window.location.href='index.php?include=master-contact';</script>";
    exit();
  } else {
    echo "<script>alert('Data Gagal Diupdate.'); window.location.href='index.php?include=master-contact';</script>";
    exit();
  }
}

if (isset($_POST['id_contact'])) {
  $id_contact = mysqli_real_escape_string($koneksi, $_POST['id_contact']);

  // Query untuk menghapus data
  $delete_query = "DELETE FROM `contact` WHERE `id_contact`='$id_contact'";
  $result_delete = mysqli_query($koneksi, $delete_query);

  // Menampilkan pesan berhasil atau gagal menghapus data
  if ($result_delete) {
    echo "<script>alert('Data berhasil dihapus.'); window.location.href='index.php?include=master-contact';</script>";
    exit();
  } else {
    echo "<script>alert('Data gagal dihapus.'); window.location.href='index.php?include=master-contact';</script>";
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
            <li class="breadcrumb-item active" aria-current="page">Data Master Contact</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0 text-md-start">Data Contact
            <button class="btn btn-sm float-end" style="background-color:#b7d5ac" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bx bx-plus"></i> Tambah Contact</button>
          </h4>
        </div>
        <hr>
        <div class="table-responsive">
          <table id="example3" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th width="5px">No</th>
                <th>Petugas</th>
                <th>No.Telp</th>
                <th class="no-export">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM `contact` ORDER BY id_contact DESC";
              $query = mysqli_query($koneksi, $sql);
              $no = 1;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['no_telp']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id_contact']; ?>"><i class="bx bx-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id_contact']; ?>"><i class="bx bx-trash"></i></a>
                  </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id_contact']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="POST" action="">
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="nama" class="form-label">Petugas</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                          </div>
                          <div class="mb-3">
                            <label for="no_telp" class="form-label">No.Telp</label>
                            <input type="tel" class="form-control" id="no_telp" name="no_telp" value="<?php echo $row['no_telp']; ?>">
                          </div>

                          <input type="hidden" name="id_contact" value="<?php echo $row['id_contact']; ?>">
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
                <div class="modal fade" id="deleteModal<?php echo $row['id_contact']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <strong>Anda yakin ingin menghapus data ini?</strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <form id="deleteForm" method="POST">
                          <input type="hidden" name="id_contact" value="<?php echo $row['id_contact']; ?>">
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
                  <h5 class="modal-title" id="addModalLabel">Tambah Contact</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Petugas</label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="no_telp" class="form-label">No.Telp</label>
                      <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
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