<?php
// Contoh penggunaan header Location

$a1 = 10;

if ($a1 < 0) {
    echo "Nilai A negatif";
} else {
    if (headers_sent()) {
        exit("Redirect gagal: header sudah dikirim.");
    }

    header("Location: 17ErrorHandlingTrigger.php", true, 302);
    exit;
}
