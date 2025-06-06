<form id="tambah-produk" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div class="row">
            <?php
            require_once '../../partials/config.php';
            // generate kode produk
            $query = mysqli_query($link, "SELECT MAX(kode_produk) AS kode_produk FROM produk");
            $data = mysqli_fetch_array($query);
            $max = $data['kode_produk'] ? substr($data['kode_produk'], 5, 3) : "000";
            $no = $max + 1;
            $char = "PRDK-";
            $kode = $char . sprintf("%03s", $no);
            ?>
            <div class="col-md-6">
                <label for="kode_produk" class="form-label">Kode Produk</label>
                <input type="text" class="form-control" name="kode_produk" id="kode_produk" placeholder="Kode Produk"
                    value="<?= $kode ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan">
            </div>
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual">
            </div>
            <div class="col-md-6">
                <label for="buffer_stock" class="form-label">Buffer Stock</label>
                <input type="number" class="form-control" name="buffer_stock" id="buffer_stock"
                    placeholder="Buffer Stock">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="minimum_stock" class="form-label">Minimum Stock</label>
                <input type="number" class="form-control" name="minimum_stock" id="minimum_stock"
                    placeholder="Minimum Stock">
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
    $("#tambah-produk").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/produk/proses-produk.php?aksi=tambah-produk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Produk Berhasil Ditambah');
                } else {
                    alertify.error('Produk Gagal Ditambah');
                }
            }
        });
    });
</script>