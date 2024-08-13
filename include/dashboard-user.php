<?php
include('koneksi/koneksi.php');

$sql = "SELECT `id_sensor`, `nilai_sensor`, `created_at` from `sensor`";
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_assoc($query)) {
	$id_sensor = $data['id_sensor'];
	$nilai_sensor = $data['nilai_sensor'];
	$created_at = $data['created_at'];
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
			<div class="col-12 col-lg-6">
				<div class="card radius-30 overflow-hidden" style="background-color: #F0F8FF">
					<div class="card-body">
						<div class="d-flex">
							<div>
								<p class="mb-0 font-weight-bold">Water Level</p>
								<h2 class="mb-0"><?php echo $nilai_sensor; ?> Cm</h2>
							</div>
							<div class="ms-auto align-self-end">
								<p class="mb-0" style="font-size:45px; color:cornflowerblue"><i class='bx bx-water bx-flashing bx-flip-horizontal'></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card radius-30 overflow-hidden" style="background-color: rgba(444,555,0, 0.1)">
					<div class="card-body">
						<div class="d-flex">
							<div>
								<p class="mb-0 font-weight-bold">Status Keadaan Air</p>
								<h3 class="mb-0"><?php echo $status; ?></h3>
							</div>
							<div class="ms-auto align-self-end">
								<p class="mb-0" style="font-size:45px; color:666666"><i class='bx bx-stats bx-flip-horizontal bx-flashing'></i></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>&nbsp;
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="card radius-15" style="background-color: #dbead5;">
						<div class="card-body">
							<h5 class="card-title" style="text-align:center"><strong>Pantau Irigasi Otomatis</strong></h5><br>
							<div class="row justify-content-center">
								<div class="col-8">
									<div class="card radius-15" style="background-color:azure;">
										<div class="card-body">
											<h5 class="text-center">
												<strong>Keadaan Air</strong><br><br>
												Jarak Air : <?php echo $nilai_sensor; ?> Cm <br>
												Status : Air <?php echo $status; ?><br>
												Waktu : <?php echo $created_at; ?>
											</h5><br>
											<p class="text-justify">
												*Jarak Air = jarak antara sensor dengan permukaan air.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--end row-->
		<!--end page-content-wrapper-->
	</div>
	<!--end page-wrapper-->