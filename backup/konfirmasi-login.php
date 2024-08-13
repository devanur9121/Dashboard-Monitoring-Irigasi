<?php
error_reporting(0);

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['level'] == "admin") {
      // Jika level = admin, arahkan ke halaman admin
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['login_success'] = true; // Menandakan bahwa login sukses
      $_SESSION['level'] = "admin"; // Menandakan level sebagai admin

      // Cek apakah data waktu login sudah tersedia pada tabel log_user
      $log_sql = "SELECT * FROM log_user WHERE id_user='" . $row['id_user'] . "'";
      $log_result = mysqli_query($koneksi, $log_sql);

      if ($log_result->num_rows > 0) {
        // Jika sudah tersedia, update data waktu login
        $log_row = mysqli_fetch_assoc($log_result);
        $id_user = $log_row['id_user'];
        $log_update_sql = "UPDATE log_user SET login_time=NOW(), logout_time=NULL WHERE id_user='$id_user'";
        mysqli_query($koneksi, $log_update_sql);
      } else {
        // Jika belum tersedia, insert data waktu login baru
        $log_insert_sql = "INSERT INTO log_user (id_user, login_time) VALUES ('" . $row['id_user'] . "', NOW())";
        mysqli_query($koneksi, $log_insert_sql);
      }

      header("Location: index.php?include=dashboard-admin");
    } else {
      // Jika level = user, arahkan ke halaman user
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['login_success'] = true; // Menandakan bahwa login sukses
      $_SESSION['level'] = "user"; // Menandakan level sebagai user

      // Cek apakah data waktu login sudah tersedia pada tabel log_user
      $log_sql = "SELECT * FROM log_user WHERE id_user='" . $row['id_user'] . "'";
      $log_result = mysqli_query($koneksi, $log_sql);

      if ($log_result->num_rows > 0) {
        // Jika sudah tersedia, update data waktu login
        $log_row = mysqli_fetch_assoc($log_result);
        $id_user = $log_row['id_user'];
        $log_update_sql = "UPDATE log_user SET login_time=NOW(), logout_time=NULL WHERE id_user='$id_user'";
        mysqli_query($koneksi, $log_update_sql);
      } else {
        // Jika belum tersedia, insert data waktu login baru
        $log_insert_sql = "INSERT INTO log_user (id_user, login_time) VALUES ('" . $row['id_user'] . "', NOW())";
        mysqli_query($koneksi, $log_insert_sql);
      }

      header("Location: index.php?include=dashboard-user");
    }
  } else {
    header("Location: index.php?include=login&error=login_failed");
  }
}
