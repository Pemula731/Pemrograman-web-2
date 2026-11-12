<?php
$host = "localhost";
$user = "root";       // Username default XAMPP/Laragon
$pass = "";           // Password default (dikosongkan)
$db   = "lat_dbase";  // Nama database Anda

// Membuat koneksi menggunakan mysqli
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>