<?php

$host_koneksi = "localhost";
$username_koneksi = "root";
$password_koneksi = "";
$database_name = "db_laundry_aldo";

$config = mysqli_connect($host_koneksi, $username_koneksi, $password_koneksi, $database_name);
if (!$config) echo "Koneksi Gagal";
