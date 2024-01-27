<!-- Form Edit Peserta -->
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="edit_name">Nama:</label>
        <input type="text" class="form-control" id="edit_name" name="edit_name" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="edit_photo">Foto:</label>
        <input type="file" class="form-control-file" id="edit_photo" name="edit_photo">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
