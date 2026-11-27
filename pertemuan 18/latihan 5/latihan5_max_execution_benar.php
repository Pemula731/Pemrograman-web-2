<?php
// Menambah batas waktu eksekusi khusus untuk skrip ini menjadi 9999 detik (atau 0 untuk tanpa batas)
set_time_limit(9999);

echo "Memulai proses berat...<br>";

// Simulasi proses yang memakan waktu 4 detik
sleep(4);

echo "Proses selesai dengan aman tanpa Fatal Error!";
?>
