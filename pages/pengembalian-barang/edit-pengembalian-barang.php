<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start();
    include "../../partials/config.php";

    $sql = "SELECT * FROM barang_kembali WHERE id_barang_kembali = '$_POST[id]'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $rowa = $result->fetch_assoc();
    }
    ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <input type="hidden" name="id" value="<?= $rowa['id_barang_kembali'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="id_produk" class="form-label">Nama Produk</label>
                <select class="form-select" name="id_produk" id="id_produk" data-trigger="">
                    <option value="">Pilih Produk</option>
                    <?php
                    $sql = "SELECT * FROM produk";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_produk'] ?>" <?= $row['id_produk'] == $rowa['id_produk'] ? 'selected' : '' ?>> <?= $row['nama_produk'] ?>
                            </option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"
                    value="<?= $rowa['jumlah'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal"
                    value="<?= $rowa['tanggal'] ?>">
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
                            <option value="<?= $row['id_supplier'] ?>" <?= $row['id_supplier'] == $rowa['id_supplier'] ? 'selected' : '' ?>><?= $row['nama_supplier'] ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"
                    placeholder="Keterangan"><?php echo $rowa['keterangan'] ?></textarea>
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
            url: "pages/pengembalian-barang/proses-pengembalian-barang.php?aksi=update-pengembalian-barang",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Transaksi Berhasil Diubah');
                } else {
                    alertify.error('Transaksi Gagal Diubah');
                }
            }
        });
    });
</script>