<?php
$koneksi = mysqli_connect("localhost", "root", "mysql", "bsc_db");

if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
