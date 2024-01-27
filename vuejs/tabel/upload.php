<?php
include 'koneksi.php';

$name = $_POST['name'];
$photo_name = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];

$upload_dir = 'uploads/';
$photo_path = $upload_dir . $photo_name;

// Pindahkan file yang diunggah ke folder uploads
if (move_uploaded_file($photo_tmp, __DIR__ . '/' . $upload_dir . $photo_name)) {
    $photo_path = $upload_dir . $photo_name; // Simpan path relatif ke database
    $query = "INSERT INTO participants (name, photo) VALUES ('$name', '$photo_path')";
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("Location: index.php?tambah_berhasil=1");
        exit;
    } else {
        // Redirect dengan pesan kesalahan jika gagal menambahkan data
        header("Location: index.php?upload_error=Gagal menambahkan data.");
        exit;
    }
} else {
    // Redirect dengan pesan kesalahan jika gagal mengunggah file
    header("Location: index.php?upload_error=Gagal mengunggah file.");
    exit;
}
?>
