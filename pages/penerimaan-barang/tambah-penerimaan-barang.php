<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="id_produk" class="form-label">Nama Barang</label>
                <select class="form-select" name="id_produk" id="id_produk" data-trigger="">
                    <option value="">Pilih Barang</option>
                    <?php
                    include "../../partials/config.php";
                    $sql = "SELECT * FROM produk";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_produk'] ?>">
                                <?= $row['nama_produk'] ?>
                            </option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
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
        <div class="row">
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="no_surat_jalan" class="form-label">No Surat Jalan</label>
                <textarea class="form-control" name="no_surat_jalan" id="no_surat_jalan"
                    placeholder="No Surat Jalan"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        new Selectr('.form-select');
    })
    $("#tambah-barang").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/penerimaan-barang/proses-penerimaan-barang.php?aksi=tambah-penerimaan-barang",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Transaksi Berhasil Ditambah');
                } else {
                    alertify.error('Transaksi Gagal Ditambah');
                }
            }
        });
    });
</script>