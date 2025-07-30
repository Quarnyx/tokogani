<form id="tambah-barang" enctype="multipart/form-data">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <input type="hidden" name="no_po" value="<?= $_GET['no_po'] ?>">
    <div class="d-grid gap-3">
        <div id="barang-rows">
            <div class="row barang-row">
                <div class="col-md-6">
                    <label for="id_produk_0" class="form-label">Nama Barang</label>
                    <select class="form-select" name="id_produk[]" id="id_produk_0" data-trigger="">
                        <option value="">Pilih Barang</option>
                        <?php
                        include "../../partials/config.php";
                        $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "'";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?= $row['id_produk'] ?>">
                                    <?= $row['nama_produk'] ?> - Jumlah diterima <?= $row['jumlah'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="jumlah_0" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah[]" id="jumlah_0" placeholder="Jumlah">
                </div>
                <div class="col-md-3">
                    <label for="id_supplier_0" class="form-label">Supplier</label>
                    <select class="form-select" name="id_supplier[]" id="id_supplier_0" data-trigger="">
                        <?php
                        $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "' GROUP BY id_supplier";
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
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-remove-row" style="display:none;">-</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success mt-2" id="add-row">Tambah Barang</button>
        <div class="row">
            <div class="col-md-12">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        new Selectr('.form-selectable');
    });

    var barangRowHtml = `
    <div class="row barang-row">
        <div class="col-md-6">
            <label class="form-label">Nama Barang</label>
            <select class="form-select form-selectable" name="id_produk[]" data-trigger="">
                <option value="">Pilih Barang</option>
                <?php
                $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?= $row['id_produk'] ?>">
                            <?= $row['nama_produk'] ?> - Jumlah diterima <?= $row['jumlah'] ?>
                        </option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah">
        </div>
        <div class="col-md-3">
            <label class="form-label">Supplier</label>
            <select class="form-select" name="id_supplier[]" data-trigger="">
                <?php
                $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['no_po'] . "' GROUP BY id_supplier";
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
        <div class="col-md-1 d-flex align-items-end">
            <button type="button" class="btn btn-danger btn-remove-row">-</button>
        </div>
    </div>
    `;

    // Add new row
    $('#add-row').click(function () {
        $('#barang-rows').append(barangRowHtml);
        new Selectr($('#barang-rows .barang-row:last .form-select .form-selectable')[0]);
        $('#barang-rows .barang-row').find('.btn-remove-row').show();
    });

    // Remove row
    $('#barang-rows').on('click', '.btn-remove-row', function () {
        $(this).closest('.barang-row').remove();
        if ($('#barang-rows .barang-row').length === 1) {
            $('#barang-rows .barang-row .btn-remove-row').hide();
        }
    });

    // Hide remove button if only one row
    if ($('#barang-rows .barang-row').length === 1) {
        $('#barang-rows .barang-row .btn-remove-row').hide();
    }

    $("#tambah-barang").submit(function (e) {
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "pages/pengembalian-barang/proses-pengembalian-barang.php?aksi=tambah-pengembalian-barang",
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