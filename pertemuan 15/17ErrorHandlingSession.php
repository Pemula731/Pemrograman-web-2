<?php
// Contoh redirect menggunakan header

if (headers_sent()) {
    exit("Redirect gagal: header sudah dikirim.");
}

header("Location: 17Header.php", true, 302);
exit;
