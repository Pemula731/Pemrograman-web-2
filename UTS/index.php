<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }
        .container{
            width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2, h3{
            text-align: center;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        table, th, td{
            border: 1px solid black;
        }
        th, td{
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        input[type=text],
        input[type=number],
        input[type=date]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .btn{
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover{
            background: darkblue;
        }
        .info{
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }
        .alert-success {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <?php
    // Koneksi Database
    $host = "localhost";
    $user = "root";
    $pass = ""; 
    $db   = "db_pendaftaran";
    $koneksi = mysqli_connect($host, $user, $pass, $db);

    // Proses Simpan Data
    if(isset($_POST['simpan'])){
        $tgl_input = $_POST['tgl_input'];
        $kode = strtoupper($_POST['kode']);
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $mat = $_POST['mat'];
        $bing = $_POST['bing'];
        $umum = $_POST['umum'];

        $rata = ($mat + $bing + $umum) / 3;

        if($rata >= 70){
            $keterangan = "Lulus";
        }elseif($rata >= 60){
            $keterangan = "Cadangan";
        }else{
            $keterangan = "Tidak Lulus";
        }

        $kode_awal = substr($kode,0,1);
        if($kode_awal == "A"){
            $tempat_tes = "Gedung A";
        }elseif($kode_awal == "B"){
            $tempat_tes = "Gedung B";
        }elseif($kode_awal == "V"){
            $tempat_tes = "Viktor";
        }else{
            $tempat_tes = "Tidak Diketahui";
        }

        $query_insert = "INSERT INTO mahasiswa_baru (tgl_input, kode, nama, jk, asal_sekolah, pekerjaan_ortu, tempat_lahir, tgl_lahir, mat, bing, umum, rata, tempat_tes, keterangan) 
                         VALUES ('$tgl_input', '$kode', '$nama', '$jk', '$asal_sekolah', '$pekerjaan_ortu', '$tempat_lahir', '$tgl_lahir', '$mat', '$bing', '$umum', '$rata', '$tempat_tes', '$keterangan')";
        
        if(mysqli_query($koneksi, $query_insert)){
            echo "<div class='alert-success'>Data berhasil disimpan ke Database!</div>";
        }
    }
    ?>

    <form method="POST">
        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" required>

        <label>Umum</label>
        <input type="number" name="umum" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>
    </form>

    <hr style="margin-top: 30px;">
    <h3>DATA PENDAFTARAN MAHASISWA</h3>

    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Asal Sekolah</th>
            <th>Tempat Tes</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>

        <?php
        // Mengambil data dari database
        $query_tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa_baru ORDER BY id DESC");
        
        $no = 1;
        $jml_pendaftar = 0;
        $jml_lulus = 0;
        $jml_tidak_lulus = 0;

        while($data = mysqli_fetch_array($query_tampil)){
            $jml_pendaftar++;
            if($data['keterangan'] == "Lulus") {
                $jml_lulus++;
            } elseif($data['keterangan'] == "Tidak Lulus") {
                $jml_tidak_lulus++;
            }

            echo "<tr>
                <td>".$no++."</td>
                <td>".$data['kode']."</td>
                <td>".$data['nama']."</td>
                <td>".$data['jk']."</td>
                <td>".$data['tempat_lahir'].", ".$data['tgl_lahir']."</td>
                <td>".$data['asal_sekolah']."</td>
                <td>".$data['tempat_tes']."</td>
                <td>".number_format($data['rata'], 2)."</td>
                <td><b>".$data['keterangan']."</b></td>
            </tr>";
        }

        if($jml_pendaftar == 0){
            echo "<tr><td colspan='9'>Belum ada data pendaftar di database.</td></tr>";
        }
        ?>
    </table>

    <div class='info'>
        <h3>Rekap Data Keseluruhan:</h3>
        <p>Total Pendaftar : <b><?php echo $jml_pendaftar; ?></b></p>
        <p>Total Lulus : <b><?php echo $jml_lulus; ?></b></p>
        <p>Total Tidak Lulus : <b><?php echo $jml_tidak_lulus; ?></b></p>
    </div>

    <div class='info'>
        <h3>Keterangan Aturan:</h3>
        <p><b>Kode Tempat Tes:</b> A = Gedung A | B = Gedung B | V = Viktor</p>
        <p><b>Hasil Seleksi:</b> Rata-rata ≥ 70 (Lulus) | 60 - 69 (Cadangan) | < 60 (Tidak Lulus)</p>
    </div>

</div>

</body>
</html>