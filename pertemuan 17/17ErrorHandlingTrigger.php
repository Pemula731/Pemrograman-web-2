<?php
error_reporting(E_ALL);
ini_set("display_errors", "0");

function tampilkanError(int $level, string $message): bool {
    $pesan = htmlspecialchars($message, ENT_QUOTES, "UTF-8");
    echo "<b>Error:</b> [$level] {$pesan}<br>";
    return true;
}

set_error_handler("tampilkanError", E_USER_NOTICE);

$test = 2;

if ($test >= 1) {
    trigger_error("Nilai harus 1 atau kurang", E_USER_NOTICE);
}
