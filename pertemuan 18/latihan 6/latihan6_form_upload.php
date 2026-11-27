<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 6 - Upload File PHP</title>
</head>
<body>
    <h3>Form Upload File</h3>
    <!-- Atribut enctype="multipart/form-data" wajib ada untuk upload file -->
    <form action="latihan6_proses_upload.php" method="POST" enctype="multipart/form-data">
        <label for="berkas">Pilih File:</label><br><br>
        <input type="file" name="berkas" id="berkas" required><br><br>
        <button type="submit" name="upload">Upload File</button>
    </form>
</body>
</html>