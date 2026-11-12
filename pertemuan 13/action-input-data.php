<?php 
//cek button 
if (isset($_POST['Submit']) && $_POST['Submit'] == "Submit") { 
    $id_mahasiswa = $_POST['id_mahasiswa']; 
    $nama = $_POST['nama']; 
    $jurusan = $_POST['jurusan']; 
    $alamat = $_POST['alamat']; 
    $telepon = $_POST['telepon']; 

    //validasi data kosong
    if (empty($id_mahasiswa) || empty($nama) || empty($alamat) || empty($telepon)) { 
?> 
        <script language="JavaScript"> 
            alert('Data Harap Dilengkapi!'); 
            document.location='download-script-form-input-data.php'; 
        </script> 
<?php 
    } else { 
        // Memanggil file koneksi yang tadi dibuat
        // Pastikan file koneksi-tutor.php berada di folder yang sama
        include "koneksi-tutor.php"; 

        //cek aNIM di database menggunakan mysqli_query dan menyertakan variabel $koneksi
        $query_cek = mysqli_query($koneksi, "SELECT id_mahasiswa FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
        $cek = mysqli_num_rows($query_cek); 

        if ($cek > 0) { 
?> 
            <script language="JavaScript"> 
                alert('NIM sudah dipakai!, silahkan ganti NIM yang lain'); 
                document.location='download-script-form-input-data.php'; 
            </script> 
<?php 
        } else {
            //Masukan data ke Table 
            $input = "INSERT INTO mahasiswa (id_mahasiswa, nama, jurusan, alamat, telepon) VALUES ('$id_mahasiswa', '$nama', '$jurusan', '$alamat', '$telepon')"; 
            $query_input = mysqli_query($koneksi, $input); 

            if ($query_input) { 
                //Jika Sukses 
?> 
                <script language="JavaScript"> 
                    alert('Input Data Mahasiswa Berhasil'); 
                    document.location='download-script-form-input-data.php'; 
                </script>
<?php 
            } else { 
                //Jika Gagal 
                echo "Input Data Mahasiswa Gagal!, Silahkan diulangi! Error: " . mysqli_error($koneksi); 
            } 
            //Tutup koneksi engine MySQL 
            mysqli_close($koneksi); 
        } 
    } 
} 
?>