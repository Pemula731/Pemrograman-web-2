<?php
$filePath = __DIR__ . "/mytestfile.txt";

if (!is_file($filePath)) {
    http_response_code(404);
    exit("Error: File mytestfile.txt tidak ditemukan.");
}

$file = fopen($filePath, "r");
if ($file === false) {
    http_response_code(500);
    exit("Error: File tidak dapat dibuka.");
}

echo htmlspecialchars((string) fread($file, filesize($filePath)), ENT_QUOTES, "UTF-8");
fclose($file);
