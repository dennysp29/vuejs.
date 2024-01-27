<!-- Form tambah peserta -->
<form action="tambah.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" class="form-control-file" id="photo" name="photo">
    </div>
    <button type="submit" class="btn btn-primary">Add Participant</button>
</form>
