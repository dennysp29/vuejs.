<?php
include 'koneksi.php';

// Periksa apakah data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai ID dari formulir edit
    $id = $_POST['id'];
    
    // Ambil nilai nama dari formulir edit
    $nama = $_POST['edit_name'];
    
    // Proses update data ke dalam database
    $query = "UPDATE participants SET name='$nama' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    
    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("Location: index.php?edit_berhasil=1");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal mengupdate data.";
    }
}
?>
