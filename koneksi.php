<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "hotel";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed" . mysqli_connect_error());
}
// echo "connection failed";
?>