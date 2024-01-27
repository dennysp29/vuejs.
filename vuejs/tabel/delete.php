<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query to delete participant by ID
    $query = "DELETE FROM participants WHERE id = $id";
    
    // Execute the query
    if(mysqli_query($koneksi, $query)) {
        // Redirect back to the index page with success message
        header("Location: index.php?hapus_berhasil=1");
        exit;
    } else {
        // Redirect back to the index page with error message
        header("Location: index.php?hapus_gagal=1");
        exit;
    }
} else {
    // Redirect back to the index page if ID is not provided
    header("Location: index.php");
    exit;
}
?>
