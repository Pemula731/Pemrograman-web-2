<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>
<!-- Menentukan Form Input -->
<form method="POST" action="">
    Masukkan Bilangan Pertama  :  <br>
    <input type="text" name="A" size="10" required> <br>
    Masukkan Bilangan Kedua :  <br>
    <input type="text" name="B" size="10" required> <br>
    <input type="submit" value="hitung" name="hitung">
</form>

<!-- Membandingkan 2 buah bilangan yang diinput -->
<?php
// Cek apakah tombol "hitung" sudah ditekan
if (isset($_POST["hitung"])) {
    
    // Ambil data (perhatikan $_POST harus huruf besar)
    $A = $_POST["A"]; 
    $B = $_POST["B"];

    function jumlah($A, $B) {    
        $jumlahbil = $A + $B;
        return $jumlahbil;
    }

    function kurang($A, $B) {       
        $kurangbil = $A - $B;
        return $kurangbil;
    }

    function kali($A, $B) {
        $kalibil = $A * $B;
        return $kalibil;
    }

    function bagi($A, $B) {
        // Mencegah error pembagian dengan 0
        if ($B == 0) return 0; 
        $bagibil = $A / $B;
        return $bagibil;
    }

    echo "<br>";
    echo "Bilangan Pertama : " . $A . "<br>";
    echo "Bilangan Kedua : " . $B . "<br><br>";

    echo "Hasil Penjumlahan 2 buah bilangan <br>";
    $jumlahbil = jumlah($A, $B);
    printf("Penjumlahan antara : %d + %d = %d<br><br>", $A, $B, $jumlahbil);

    echo "Hasil Pengurangan 2 buah bilangan <br>";
    $kurangbil = kurang($A, $B);
    printf("Pengurangan antara : %d - %d = %d<br><br>", $A, $B, $kurangbil);

    echo "Hasil Perkalian 2 buah bilangan <br>";
    $kalibil = kali($A, $B);
    printf("Perkalian antara : %d * %d = %d<br><br>", $A, $B, $kalibil);

    echo "Hasil Pembagian 2 buah bilangan <br>";
    $bagibil = bagi($A, $B);
    // Menggunakan %f untuk pembagian karena hasilnya bisa berupa desimal (float)
    printf("Pembagian antara : %d / %d = %.2f<br><br>", $A, $B, $bagibil);
}
?>
</body>
</html>