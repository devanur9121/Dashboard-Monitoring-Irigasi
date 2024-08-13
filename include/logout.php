<?php
// Hancurkan session
$id_user = $_SESSION['id_user'];
session_destroy();

// Perbarui data aktivitas menjadi logout di tabel log_user
if (!empty($id_user)) {
  $log_sql = "UPDATE log_user SET aktivitas='Logout', logout_time=NOW() WHERE id_user='$id_user' AND login_time IS NOT NULL AND logout_time IS NULL";
  mysqli_query($koneksi, $log_sql);
}

// Redirect ke halaman home
header('Location: index.php?include=home');
exit();
