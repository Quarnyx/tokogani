<?php
include "../../partials/config.php";
$sql = "SELECT * FROM produk WHERE id_produk = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" name="kode_produk" id="kode_produk"
                        placeholder="Kode Produk" value="<?= $row['kode_produk'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                        placeholder="Nama Produk" value="<?= $row['nama_produk'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="id_supplier" class="form-label">Supplier</label>
                <select class="form-select" name="id_supplier" id="id_supplier" data-trigger="">
                    <?php
                    $sql = "SELECT * FROM supplier";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_supplier'] ?>"><?= $row['nama_supplier'] ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $("#harga_beli").on("keyup", function () {
        var value = $(this).val().replace(/[^\d]/g, "");
        $(this).val("Rp. " + value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    });
    $("#harga_jual").on("keyup", function () {
        var value = $(this).val().replace(/[^\d]/g, "");
        $(this).val("Rp. " + value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    })
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'pages/stok-minimal/proses-stok-minimal.php?aksi=edit-stok-minimal',
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