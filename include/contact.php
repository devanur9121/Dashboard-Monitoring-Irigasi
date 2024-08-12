<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-12">
        <div class="card radius-15">
          <div class="card-body">
            <h5 class="card-title"><strong>MOHON PERHATIAN</strong></h5>
            <h6 style="text-align:justify">
              Jika anda mengalami masalah/kendala tertentu, atau ingin menyampaikan hal penting,
              atau ingin mengajukan pertanyaan mengenai irigasi otomatis. Silakan anda dapat
              menghubungi nomor telepon yang terkait dibawah ini.
            </h6>
          </div>
        </div>
      </div>
      <div class="col-8 mx-auto">
        <div class="card radius-15">
          <div class="card-body">
            <div class="card-title">
              <h4 class="mb-0">Data Contact</h4>
            </div>
            <hr />
            <div class="table-responsive">
              <table id="example3" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th width="5px">No</th>
                    <th>Petugas</th>
                    <th>No.Telp</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `contact`";
                  $query = mysqli_query($koneksi, $sql);
                  $no = 1;
                  while ($row = mysqli_fetch_assoc($query)) {
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['no_telp']; ?></td>
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
  </div>
</div>