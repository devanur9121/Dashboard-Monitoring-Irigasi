<?php
// Variabel database
$koneksi = mysqli_connect("localhost", "root", "", "web_irigasi");

// Hapus data pada hari sebelumnya
mysqli_query($koneksi, "DELETE FROM sensor WHERE DATE(created_at) < CURDATE()");

// Ambil data tanggal dan ketinggian air per harian
$sql_data = mysqli_query($koneksi, "SELECT created_at, nilai_sensor FROM sensor WHERE DATE(created_at) >= CURDATE() ORDER BY id_sensor ASC");

$timestamp = [];
$ketinggian = [];

while ($data = mysqli_fetch_assoc($sql_data)) {
  $timestamp[] = $data['created_at'];
  $ketinggian[] = $data['nilai_sensor'];
}

?>

<!-- Tampilan grafik -->
<div class="panel panel-primary">
  <div class="panel-body">
    <!-- Siapkan canvas untuk grafik -->
    <canvas id="myChart"></canvas>

    <!-- Gambar grafik -->
    <script type="text/javascript">
      // Baca ID canvas tempat grafik akan diletakkan
      var canvas = document.getElementById('myChart');
      // Inisialisasi grafik pertama kali
      var myLineChart = null;

      // Fungsi untuk memperbarui grafik
      function updateChart() {
        // Hapus grafik sebelumnya jika ada
        if (myLineChart !== null) {
          myLineChart.destroy();
        }

        var tanggal = <?php echo json_encode($timestamp); ?>;
        var formattedTanggal = tanggal.map(function(t) {
          return new Date(t).toLocaleString();
        });

        // Buat data baru untuk grafik
        var newData = {
          labels: formattedTanggal,
          datasets: [{
            label: "Ketinggian Air",
            fill: true,
            backgroundColor: "rgba(153, 51, 255, 0.5)",
            borderColor: "rgba(76, 0, 153, 1)",
            lineTension: 0.5,
            pointRadius: 6,
            data: <?php echo json_encode($ketinggian); ?>
          }]
        };


        // Cetak grafik baru ke dalam canvas
        myLineChart = new Chart(canvas, {
          type: 'line',
          data: newData,
          options: {
            showLines: true,
            animation: {
              duration: 0
            }
          }
        });
      }

      // Inisialisasi grafik pertama kali
      updateChart();
    </script>
  </div>
</div>