<?php
// Sembunyikan semua pesan error bawaan PHP
error_reporting(E_ALL);
ini_set("display_errors", "0");

/**
 * Fungsi untuk menangani error.
 * Fungsi ini wajib memiliki 4 parameter.
 */
function tanganiError(int $level, string $message, string $file, int $line): bool {
    $message = htmlspecialchars($message, ENT_QUOTES, "UTF-8");
    $file = htmlspecialchars($file, ENT_QUOTES, "UTF-8");

    echo "<div style='padding: 2rem; background: rgba(200, 0, 0, 0.5); color: white'>";
    echo    "<b>Terjadi Error</b>";
    echo    "<p>[{$level}] {$message} - {$file}:{$line}</p>";
    echo "</div>";

    return true;
}

set_error_handler('tanganiError');

// Contoh pemicu error terukur
trigger_error("Contoh error dengan custom error handler", E_USER_NOTICE);
