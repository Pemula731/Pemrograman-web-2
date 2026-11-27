<?php
// Cek apakah form sudah disubmit dan data $_FILES tersedia
if (isset($_POST['upload']) && isset($_FILES['berkas'])) {
    $nama_file   = $_FILES['berkas']['name'];
    $ukuran_file = $_FILES['berkas']['size'];
    $tmp_file    = $_FILES['berkas']['tmp_name'];
    $error_file  = $_FILES['berkas']['error'];

    // Cek kode error bawaan PHP saat upload
    if ($error_file === UPLOAD_ERR_OK) {
        $folder_tujuan = "uploads/";
        
        // Pastikan folder tujuan tersedia
        if (!is_dir($folder_tujuan)) {
            mkdir($folder_tujuan, 0777, true);
        }

        if (move_uploaded_file($tmp_file, $folder_tujuan . basename($nama_file))) {
            echo "Berhasil! File <b>" . htmlspecialchars($nama_file) . "</b> (" . round($ukuran_file / 1024, 2) . " KB) berhasil diunggah.";
        } else {
            echo "Gagal memindahkan file ke folder tujuan.";
        }
    } elseif ($error_file === UPLOAD_ERR_INI_SIZE || $error_file === UPLOAD_ERR_FORM_SIZE) {
        echo "Gagal Upload: Ukuran file melebihi batas upload_max_filesize di php.ini!";
    } else {
        echo "Terjadi kegagalan upload dengan kode error: " . $error_file;
    }
} else {
    // Kondisi ini terjadi jika ukuran file melebihi post_max_size di php.ini sehingga $_POST dan $_FILES dikosongkan oleh PHP
    echo "Proses upload gagal! Kemungkinan ukuran file melebihi batas post_max_size di php.ini atau form belum disubmit.";
}
?>