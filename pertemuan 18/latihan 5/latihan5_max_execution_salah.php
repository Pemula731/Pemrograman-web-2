<?php
// Simulasi: membatasi waktu eksekusi menjadi 2 detik, lalu menjalankan proses yang memakan waktu 4 detik
ini_set('max_execution_time', 2);

echo "Memulai proses berat...<br>";

// Simulasi proses yang berjalan selama 4 detik (melebihi batas 2 detik)
sleep(4);

echo "Proses selesai!"; // Baris ini tidak akan tercetak karena Fatal Error muncul di detik ke-2
?>