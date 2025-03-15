<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
include('connect.php');

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

    // Query update
    $query = "UPDATE tb_buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun_terbit' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman katalog setelah update sukses
        header("Location: katalog_buku.php?pesan=update_sukses");
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak valid.";
    exit();
}
?>
