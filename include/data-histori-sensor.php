<?php
include('koneksi/koneksi.php');

$sql = "SELECT * FROM `sensor` ORDER BY `created_at` DESC";
$query = mysqli_query($koneksi, $sql);

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
            <li class="breadcrumb-item"><a href="index.php?include=dashboard"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data Histori Sensor</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="card-title">
          <h4 class="mb-0">Data Sensor</h4>
        </div>
        <hr />
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Datetime</th>
                <th>Nilai Sensor</th>
                <th>Status Keadaan Air</th>
                <th class="no-export">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)) {
                $nilai_sensor = $data['nilai_sensor'];
                $created_at   = $data['created_at'];

                // Mengatur id_status berdasarkan nilai sensor
                if ($nilai_sensor > 10) {
                  $id_status = 1;
                } else if ($nilai_sensor >= 6 && $nilai_sensor <= 10) {
                  $id_status = 2;
                } else {
                  $id_status = 3;
                }

                $sql2 = "SELECT `status` from `status` WHERE `id_status` = '$id_status'";
                $query2 = mysqli_query($koneksi, $sql2);
                while ($data2 = mysqli_fetch_assoc($query2)) {
                  $status = $data2['status'];
                }
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $created_at; ?></td>
                  <td><?php echo $nilai_sensor; ?></td>
                  <td><?php echo $status; ?></td>
                  <td class="no-export">
                    <button type="button" class="btn btn-danger" onclick="deleteSensor('<?php echo $data['id_sensor']; ?>')" data-toggle="modal" data-target="#deleteSensorModal"><i class='bx bxs-trash'></i></button>
                  </td>

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
<!-- Modal Delete -->
<div class="modal fade" id="deleteSensorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Sensor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <strong>Anda yakin ingin menghapus data ini?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <form id="deleteForm" method="POST">
          <input type="hidden" name="id_sensor" value="">
          <button type="" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// Memeriksa apakah id_sensor sudah terisi atau belum
if (isset($_POST['id_sensor'])) {
  $id_sensor = mysqli_real_escape_string($koneksi, $_POST['id_sensor']);

  // Query untuk menghapus data
  $delete_query = "DELETE FROM `sensor` WHERE `id_sensor`='$id_sensor'";
  $result_delete = mysqli_query($koneksi, $delete_query);

  // Menampilkan pesan berhasil atau gagal menghapus data
  if ($result_delete) {
    echo "<script>alert('Data berhasil dihapus.'); window.location.href='index.php?include=data-histori-sensor';</script>";
    exit();
  } else {
    echo "<script>alert('Data gagal dihapus.'); window.location.href='index.php?include=data-histori-sensor';</script>";
    exit();
  }
}
?>


<script>
  function editSensor(nilai_sensor, id_sensor) {
    $('#nilai_sensor').val(nilai_sensor);
    $('#id_sensor').val(id_sensor);
    $('#editSensorModal').modal('show');
  }
</script>
<script>
  function deleteSensor(id_sensor) {
    // set value for input fields in the delete sensor modal
    document.getElementById('deleteForm').querySelector('input[name="id_sensor"]').value = id_sensor;

    // show delete sensor modal
    $('#deleteSensorModal').modal('show');
  }
</script>