<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'web_irigasi');

if (!$koneksi) {
  die("Error koneksi " . mysqli_connect_errno());
}
