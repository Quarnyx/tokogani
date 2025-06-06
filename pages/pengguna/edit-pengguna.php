<?php
include "../../partials/config.php";
$sql = "SELECT * FROM pengguna WHERE id_pengguna = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_pengguna'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control " name="nama_pengguna" id="nama" placeholder="Nama"
                        value="<?= $row['nama_pengguna'] ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control " name="username" id="username" placeholder="Username"
                        value="<?= $row['username'] ?>">
                </div>
            </div>
            <div class="col-md-4">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level">
                    <?php
                    $query = mysqli_query($link, "SHOW COLUMNS FROM pengguna LIKE 'level'");
                    $enum = explode("','", substr(mysqli_fetch_array($query)['Type'], 6, -2));
                    foreach ($enum as $key => $value) {
                        echo "<option value='$value' " . ($row['level'] == $value ? 'selected' : '') . ">$value</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'pages/pengguna/proses-pengguna.php?aksi=edit-pengguna',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Edit Berhasil');

                } else {
                    alertify.error('Edit Gagal');

                }
            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>