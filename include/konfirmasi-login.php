<?php
error_reporting(0);

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['level'] == "Admin") {
      // Jika level = admin, arahkan ke halaman admin
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['login_success'] = true; // Menandakan bahwa login sukses
      $_SESSION['level'] = "Admin"; // Menandakan level sebagai admin

      // Cek apakah data waktu login sudah tersedia pada tabel log_user
      $log_sql = "SELECT * FROM log_user WHERE id_user='" . $row['id_user'] . "'";
      $log_result = mysqli_query($koneksi, $log_sql);

      if ($log_result->num_rows > 0) {
        // Jika sudah tersedia, update data waktu login
        $log_row = mysqli_fetch_assoc($log_result);
        $id_user = $log_row['id_user'];
        // $aktivitas = "login";
        $log_insert_sql = "INSERT INTO log_user (id_user, login_time, aktivitas) VALUES ('" . $row['id_user'] . "', NOW(), 'login')";
        mysqli_query($koneksi, $log_insert_sql);
      }

      header("Location: index.php?include=dashboard-admin");
    } else {
      // Jika level = User, arahkan ke halaman user
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['login_success'] = true; // Menandakan bahwa login sukses
      $_SESSION['level'] = "User"; // Menandakan level sebagai user

      // Cek apakah data waktu login sudah tersedia pada tabel log_user
      $log_sql = "SELECT * FROM log_user WHERE id_user='" . $row['id_user'] . "'";
      $log_result = mysqli_query($koneksi, $log_sql);

      if ($log_result->num_rows > 0) {
        // Jika sudah tersedia, update data waktu login
        $log_row = mysqli_fetch_assoc($log_result);
        $id_user = $log_row['id_user'];
        // $aktivitas = "login";
        // Jika belum tersedia, insert data waktu login baru
        $log_insert_sql = "INSERT INTO log_user (id_user, login_time, aktivitas) VALUES ('" . $row['id_user'] . "', NOW(), 'Login')";
        mysqli_query($koneksi, $log_insert_sql);
      }

      header("Location: index.php?include=dashboard-user");
    }
  }
}
