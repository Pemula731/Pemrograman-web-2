<?php
// 1. Koneksi langsung menyertakan database 'lat_dbase'
$con = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

// 2. Query DELETE
$sql = "DELETE FROM tbl_mhs WHERE LastName='Prabowo'";

// 3. Eksekusi query dengan menyertakan parameter $con
if (mysqli_query($con, $sql)) {
    echo "Data dengan LastName 'Prabowo' berhasil dihapus!";
} else {
    echo "Gagal menghapus data: " . mysqli_error($con);
}

// 4. Tutup koneksi
mysqli_close($con);
?>