<form id="tambah-supplier" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <?php
                require_once '../../partials/config.php';

                $takeKode = "SELECT count(*) as count FROM supplier";
                $resultKode = $link->query($takeKode);
                $rowKode = $resultKode->fetch_assoc();
                $count = $rowKode['count'];
                $noUrut = $count + 1;
                $prefix = "SP";
                $kodeSupplier = $prefix . "-" . sprintf("%04s", $noUrut);
                ?>
                <label for="kode_supplier" class="form-label">Kode Supplier</label>
                <input type="text" class="form-control" name="kode_supplier" id="kode_supplier"
                    placeholder="Kode Supplier" value="<?= $kodeSupplier ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                    placeholder="Nama Supplier" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="lama_pengantaran_maksimal" class="form-label">Lama Pengantaran Maksimal (Hari)</label>
                <input type="number" class="form-control" name="lama_pengantaran_maksimal"
                    id="lama_pengantaran_maksimal" placeholder="Lama Pengantaran Maksimal" required>
            </div>
            <div class="col-md-6">
                <label for="avg_lama_pengantaran" class="form-label">Rata-Rata Lama Pengantaran (Hari)</label>
                <input type="number" class="form-control" name="avg_lama_pengantaran" id="avg_lama_pengantaran"
                    placeholder="Avg Lama Pengantaran" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"
                    required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="KontakTelepon" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<script>
    $("#tambah-supplier").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "pages/supplier/proses-supplier.php?aksi=tambah-supplier",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Supplier berhasil ditambahkan');
                } else {
                    alertify.error('Supplier gagal ditambahkan');
                }
            }
        });
    });
</script>