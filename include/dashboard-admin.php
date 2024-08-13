<?php
include('koneksi/koneksi.php');

$sql = "SELECT `id_sensor`, `nilai_sensor` from `sensor`";
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_assoc($query)) {
	$id_sensor = $data['id_sensor'];
	$nilai_sensor = $data['nilai_sensor'];
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
	while ($data = mysqli_fetch_assoc($query2)) {
		$status = $data['status'];
	}

	$sql3 = "UPDATE `sensor` SET `id_status` = '$id_status' WHERE `id_sensor` = '$id_sensor'";
	$query3 = mysqli_query($koneksi, $sql3);
	if (!$query3) {
		die(mysqli_error($koneksi));
	}

	$sql4 = "SELECT COUNT(*) AS total_user FROM user";
	$query4 = mysqli_query($koneksi, $sql4);
	if (!$query4) {
		die(mysqli_error($koneksi));
	} else {
		$data = mysqli_fetch_assoc($query4);
		$total_user = $data['total_user'];
	}

	$sql5 = "SELECT COUNT(*) AS total_histori FROM sensor";
	$query5 = mysqli_query($koneksi, $sql5);
	if (!$query5) {
		die(mysqli_error($koneksi));
	} else {
		$data = mysqli_fetch_assoc($query5);
		$total_histori = $data['total_histori'];
	}
}
?>
<script type="text/javascript">
	window.setTimeout(function() {
		window.location.reload();
	}, 3000);
</script>

<!--page-content-wrapper-->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="col-sm-12" style="margin-top: 10px; padding-right:10px; padding-left:10px ">
			<?php
			if (isset($_SESSION['login_success'])) {
				echo '<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">Selamat anda berhasil login!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
				unset($_SESSION['login_success']); // unset the session variable to avoid showing the message again on refresh
			}
			?>
		</div>
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="card radius-15 overflow-hidden" style="background-color: rgba(444,555,0, 0.1)">
					<div class="card-body">
						<div class="d-flex">
							<div>
								<p class="mb-0 font-weight-bold">Status Keadaan Air</p>
								<h2 class="mb-0" style="font-size:21px"><?php echo $status; ?></h2>
							</div>
							<div class="ms-auto align-self-end">
								<p class="mb-0" style="font-size:45px; color:666666"><i class='bx bx-stats bx-flip-horizontal bx-flashing'></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card radius-15 overflow-hidden" style="background-color: #F0F8FF">
					<div class="card-body">
						<div class="d-flex">
							<div>
								<p class="mb-0 font-weight-bold">Histori</p>
								<h2 class="mb-0"><?php echo $total_histori; ?></h2>
							</div>
							<div class="ms-auto align-self-end">
								<p class="mb-0" style="font-size:45px; color:cornflowerblue"><i class='bx bx-water bx-flashing bx-flip-horizontal'></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card radius-15 overflow-hidden" style="background-color: rgba(0,204,0, 0.1)">
					<div class="card-body">
						<div class="d-flex">
							<div>
								<p class="mb-0 font-weight-bold">Total User</p>
								<h2 class="mb-0"><?php echo $total_user; ?></h2>
							</div>
							<div class="ms-auto align-self-end">
								<p class="mb-0" style="font-size:45px; color: #6eaa5e"><i class='bx bxs-user-plus bx-flashing'></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-12">
				<div class="card radius-15">
					<div class="card-body">
						<h5 class="card-title">Data Sensor Terakhir Masuk</h5>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:50px; text-align: center;">No</th>
										<th style="text-align: center;">Nilai Sensor</th>
										<th style="text-align: center;">Status Ketinggian Air</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql5 = "SELECT sensor.id_sensor, sensor.nilai_sensor, 
									status.status FROM sensor INNER JOIN status ON 
									sensor.id_status=status.id_status ORDER BY id_sensor 
									DESC LIMIT 5";
									$query5 = mysqli_query($koneksi, $sql5);
									$no = 1;
									while ($data = mysqli_fetch_assoc($query5)) {
										echo "<tr>";
										echo "<td style='text-align: center;'>" . $no . "</td>";
										echo "<td style='text-align: center;'>" . $data['nilai_sensor'] . " cm</td>";
										echo "<td style='text-align: center;'>" . $data['status'] . "</td>";
										echo "</tr>";
										$no++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--end row-->
		<!--end page-content-wrapper-->
	</div>
	<!--end page-wrapper-->