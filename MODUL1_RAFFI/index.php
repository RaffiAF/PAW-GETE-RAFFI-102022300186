<?php
// Inisialisasi variabel untuk menyimpan nilai input dan error

use Dom\DtdNamedNodeMap;

$nama = $email = $nim = "";
$namaErr = $emailErr = $nimErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // **********************  1  **************************  
    // Tangkap nilai nama yang ada pada form HTML
    // silakan taruh kode kalian di bawah
    if(empty($_POST["nama"])){
        $namaErr = "Nama Wajib diisi";
    }else{
        $nama = htmlspecialchars($_POST["nama"]); //untuk menampilkan inputan di textfield supaya tidak menghilang
    }


    // **********************  2  **************************  
    // Validasi format email agar sesuai dengan standar
    // silakan taruh kode kalian di bawah
    if(empty($_POST["email"])){
        $emailErr = "Email Wajib diisi";
    }else{
        $email = htmlspecialchars($_POST["email"]); //untuk menampilkan inputan di textfield supaya tidak menghilang
    }

    // **********************  3  **************************  
    // Pastikan NIM terisi dan  angka
    // silakan taruh kode kalian di bawah
    if(empty($_POST["nim"])){
        $nimErr = "Nim Wajib diisi";
    
    }elseif (!ctype_digit($_POST["nim"])){
        $nimErr = "NIM harus berupa angka";
    }else{
        $nim = htmlspecialchars($_POST["nim"]); //untuk menampilkan inputan di textfield supaya tidak menghilang
    }
}

    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (!empty($namaErr) || !empty($emailErr) || !empty($nimErr)) { ?>
                <div class="alert alert-danger">
                    <strong>Kesalahan!</strong> Harap perbaiki data yang salah.
                </div>
            <?php } else { ?>
                <div class="alert alert-success">
                    <strong>Berhasil!</strong> Data pendaftaran telah diterima.
                </div>
            <?php } ?>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

         <!-- **********************  4  ************************** -->
         <!-- Tambahkan kolom input untuk Nama, Email, dan NIM dengan mengambil class form-group sebagai referensi -->

            <div class="form-group">
                <!-- tambahkan label nama -->
                <label>Nama :</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <!-- Tampilkan pesan error jika variabel $namaErr tidak kosong -->
                <span class="error"><?php echo $namaErr; ?></span>
            </div>

            <div class="form-group">
                <!-- tambahkan label email -->
                 <label>Email :</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <!-- Tampilkan pesan error jika variabel $emailErr tidak kosong -->
                <span class="error"><?php echo $emailErr; ?></span>
            </div>

            <div class="form-group">
                <!-- tambahkan label nim -->
                 <label>NIM :</label>
                <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>">
                <!-- Tampilkan pesan error jika variabel $nimErr tidak kosong -->
                <span class="error"><?php echo $nimErr; ?></span>
            </div>

            <div class="button-container">
                <button type="submit">Daftar</button>
            </div>
        </form>
    </div>
</body>
</html>


