<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS Animation for hiding alerts */
        .hide-alert {
            animation: hideAlert 5s forwards;
        }

        @keyframes hideAlert {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                display: none; /* Hide the alert after animation */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Participant List</h1>

        <!-- Alert for File Upload Error -->
        <?php
        if(isset($_GET['upload_error'])) {
            echo '<div id="uploadErrorAlert" class="alert alert-danger" role="alert">' . $_GET['upload_error'] . '</div>';
        }
        ?>

        <!-- Alert for Success Messages -->
        <?php
        if(isset($_GET['tambah_berhasil']) && $_GET['tambah_berhasil'] == '1') {
            echo '<div id="tambahAlert" class="alert alert-success hide-alert" role="alert">Data berhasil ditambahkan!</div>';
        }
        if(isset($_GET['edit_berhasil']) && $_GET['edit_berhasil'] == '1') {
            echo '<div id="editAlert" class="alert alert-success hide-alert" role="alert">Data berhasil diubah!</div>';
        }
        if(isset($_GET['hapus_berhasil']) && $_GET['hapus_berhasil'] == '1') {
            echo '<div id="hapusAlert" class="alert alert-success hide-alert" role="alert">Data berhasil dihapus!</div>';
        }
        ?>

        <!-- Button to Add Data -->
        <button type="button" class="btn btn-primary mt-3 btn-move" data-toggle="modal" data-target="#tambahModal">
            Tambah Data
        </button>

        <!-- Display Participants -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM participants";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td><img src="' . $row['photo'] . '" class="img-fluid" style="max-width: 100px;" alt="Participant Photo"></td>';
                        echo '<td>';
                        echo '<button type="button" class="btn btn-primary btn-sm btn-move mr-2" data-toggle="modal" data-target="#editModal_' . $row['id'] . '">Edit</button>';
                        echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm btn-move" onclick="return confirm(\'Are you sure you want to delete this participant?\')">Delete</a>';
                        echo '</td>';
                        echo '</tr>';

                        // Modal Edit for each participant
                        echo '<div class="modal fade" id="editModal_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_' . $row['id'] . '" aria-hidden="true">';
                        echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="editModalLabel_' . $row['id'] . '">Edit Data</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                        include 'form_edit.php'; // Edit Form
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modal to Add Data -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to Add Participant -->
                        <?php include 'form_tambah.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
