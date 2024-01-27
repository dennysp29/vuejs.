<?php
include 'koneksi.php';

$query = "SELECT * FROM participants";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Photo</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td><img src="' . $row['photo'] . '" alt="Participant Photo" style="max-width: 100px;"></td>';
        echo '<td>';
        echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm">Edit</a>';
        echo '<a href="hapus.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm ml-1">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p>No participants yet.</p>";
}
?>
