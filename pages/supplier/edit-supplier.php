<?php
include "../../partials/config.php";
$sql = "SELECT * FROM supplier WHERE id_supplier = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_supplier'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-12">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                    placeholder="Nama Supplier" value="<?= $row['nama_supplier'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="lama_pengantaran_maksimal" class="form-label">Lama Pengantaran Maksimal (Hari)</label>
                <input type="number" class="form-control" name="lama_pengantaran_maksimal"
                    id="lama_pengantaran_maksimal" placeholder="Lama Pengantaran Maksimal"
                    value="<?= $row['lama_pengantaran_maksimal'] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="avg_lama_pengantaran" class="form-label">Rata-Rata Lama Pengantaran (Hari)</label>
                <input type="number" class="form-control" name="avg_lama_pengantaran"
                    value="<?= $row['avg_lama_pengantaran'] ?>" id="avg_lama_pengantaran"
                    placeholder="Avg Lama Pengantaran" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"
                    required><?= $row['alamat'] ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Telepon"
                    value="<?= $row['kontak'] ?>" required>
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
            type: "POST",
            url: "pages/supplier/proses-supplier.php?aksi=edit-supplier",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Supplier berhasil diupdate');
                } else {
                    alertify.error('Supplier gagal diupdate');
                }
            }
        });
    });
</script>