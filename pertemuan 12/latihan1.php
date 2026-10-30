<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$sql = "UPDATE tbl_mhs SET Age = '36' WHERE FirstName = 'Karina' AND LastName = 'Suwandi'";

if (mysqli_query($con, $sql)) {
    echo "Data Karina Suwandi berhasil diperbarui!";
} else {
    echo "Gagal memperbarui data: " . mysqli_error($con);
}

mysqli_close($con);
?>