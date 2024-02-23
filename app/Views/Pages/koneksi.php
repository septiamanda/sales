<?php

// Koneksi Database
$server = "localhost";
$user = "root";
$password = "";
$database = "salesyak";
$port = "3307";

// Buat Koneksi
$koneksi = mysqli_connect($server, $user, $password, $database, $port) or die(mysqli_error($koneksi));

?>
