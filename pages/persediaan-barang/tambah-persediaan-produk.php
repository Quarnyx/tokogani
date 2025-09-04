<?php
include "../../partials/config.php";
$sql = "SELECT * FROM v_stok WHERE id_produk = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Ambil data barang keluar 30 hari terakhir
    $sqla = "SELECT tanggal, SUM(jumlah) as total 
            FROM barang_keluar 
            WHERE id_produk = '$_POST[id]'
            AND tanggal >= CURDATE() - INTERVAL 30 DAY 
            GROUP BY tanggal";

    $resulta = mysqli_query($link, $sqla);

    if (mysqli_num_rows($resulta) > 0) {
        $harian = [];
        while ($rowa = mysqli_fetch_assoc($resulta)) {
            $harian[] = $rowa['total'];
        }

        $avg_harian = array_sum($harian) / count($harian);
    } else {
        $avg_harian = 0;
    }
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
    <?php session_start(); ?>
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
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
                        placeholder="Nama Produk" value="<?= $row['nama_produk'] ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan"
                        value="<?= $row['satuan'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <label for="buffer_stock" class="form-label">Buffer Stock</label>
                <input type="number" class="form-control" name="buffer_stock" id="buffer_stock"
                    placeholder="Buffer Stock" value="<?= $row['buffer_stock'] ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div>
                    <label for="stok" class="form-label">Stok Tersedia</label>
                    <input type="text" class="form-control" name="stok" id="stok" placeholder=""
                        value="<?= $row['stok_tersedia'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="stok_keluar" class="form-label">Stok Keluar Per Hari</label>
                    <input type="text" class="form-control" name="stok_keluar" id="stok_keluar" placeholder=""
                        value="<?= number_format($avg_harian, 0, '', '') ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <label for="id_supplier" class="form-label">Supplier</label>
                <select class="form-select" name="id_supplier" id="id_supplier" data-trigger="">
                    <option value="">Pilih Supplier</option>
                    <?php
                    $sql = "SELECT * FROM supplier";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['id_supplier'] ?>" data-avgleadtime="<?= $row['avg_lama_pengantaran'] ?>">
                                <?= $row['nama_supplier'] ?>
                            </option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="lead_time" class="form-label">Lama Pengantaran</label>
                <input type="number" class="form-control" name="avg_lama_pengantaran" id="lead_time"
                    placeholder="Lama Pengantaran" value="<?= $row['avg_lama_pengantaran'] ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="jumlah_diminta" class="form-label">Jumlah Diminta</label>
                <input type="number" class="form-control" name="jumlah_diminta" id="jumlah_diminta"
                    placeholder="Jumlah Diminta">
            </div>
        </div>
    </div>
    <div class="alert mt-3 alert-info bg-info-100 text-info-600 border-info-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 mb-10"
        role="alert">
        <div class="d-flex align-items-center justify-content-between text-lg">
            Rekomendasi Jumlah Permintaan
            <button class="remove-button text-info-600 text-xxl line-height-1">
                <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
            </button>
        </div>
        <p class="fw-medium text-info-600 text-sm mt-8">Perhitungan Jumlah Pesan = (Rata-rata pemakaian harian × Lama
            pengantaran) + Buffer stock - Stok saat ini
        </p>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>
    $('#id_supplier').change(function () {
        var avg_lama_pengantaran = $(this).find(':selected').data('avgleadtime');
        var buffer_stock = parseInt($('#buffer_stock').val());
        var avg_harian = parseInt($('#stok_keluar').val());
        var stok = $('#stok').val();
        $('#lead_time').val(avg_lama_pengantaran);
        // Jumlah Pesan = (Rata-rata pemakaian harian × Lead time) + Buffer stock - Stok saat ini
        var jumlah_diminta = (avg_lama_pengantaran * parseInt(avg_harian)) + buffer_stock - stok;
        // console.log(jumlah_diminta, avg_lama_pengantaran, avg_harian, buffer_stock, stok);
        $('#jumlah_diminta').val(jumlah_diminta);
    });
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'pages/persediaan-barang/proses-persediaan-produk.php?aksi=tambah-persediaan-produk',
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