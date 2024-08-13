<?php

//Variabel database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_irigasi";

$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

// Prepare the SQL statement

$result = mysqli_query($conn, "INSERT INTO sensor (nilai_sensor) 
    VALUES ('" . $_GET["nilai_sensor"] . "')");

if (!$result) {
    die('Invalid query: ' . mysqli_error($conn));
}
