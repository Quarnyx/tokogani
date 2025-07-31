<?php
include "../../partials/config.php";
$sql = "SELECT * FROM produk WHERE id_produk = '$_POST[id]'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<div class="alert alert-info bg-info-100 text-info-600 border-info-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 mb-10"
    role="alert">
    <div class="d-flex align-items-center justify-content-between text-lg">
        Proses Buffer Stock dan Stok Minimal
        <button class="remove-button text-info-600 text-xxl line-height-1">
            <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
        </button>
    </div>
    <p class="fw-medium text-info-600 text-sm mt-8">
        Buffer Stock = (Pengantaran Terlama - Pengantaran Normal) x Rata-rata pengeluaran harian<br>
        Stok Minimal = Rata-rata pengeluaran harian selama 30 hari × Pengantaran normal
    </p>
</div>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
    <?php
    // Ambil data barang keluar 30 hari terakhir
    $sql = "SELECT tanggal, SUM(jumlah) as total 
            FROM barang_keluar 
            WHERE id_produk = {$row['id_produk']}
            AND tanggal >= CURDATE() - INTERVAL 30 DAY 
            GROUP BY tanggal";

    $result = mysqli_query($link, $sql);

    $harian = [];
    while ($rowa = mysqli_fetch_assoc($result)) {
        $harian[] = $rowa['total'];
    }

    if (count($harian) === 0)
        return 0;

    $max_harian = ceil(max($harian));
    $avg_harian = ceil(array_sum($harian) / count($harian));
    ?>
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" name="kode_produk" id="kode_produk"
                        placeholder="Kode Produk" value="<?= $row['kode_produk'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                        placeholder="Nama Produk" value="<?= $row['nama_produk'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="max_harian" class="form-label">Pengeluaran Maksimal</label>
                    <input type="text" class="form-control" name="max_harian" id="max_harian" placeholder="Max Harian"
                        value="<?= $max_harian ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="avg_harian" class="form-label">Rata-rata Harian</label>
                    <input type="text" class="form-control" name="avg_harian" id="avg_harian" placeholder="Avg Harian"
                        value="<?= $avg_harian ?>" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="id_supplier" class="form-label">Supplier</label>
                    <select class="form-select" name="id_supplier" id="id_supplier" data-trigger="">
                        <option value="">Pilih Supplier</option>
                        <?php
                        $sql = "SELECT * FROM supplier";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option data-lamapengantaran="<?= $row['avg_lama_pengantaran'] ?>"
                                    data-pengantaranmaksimal="<?= $row['lama_pengantaran_maksimal'] ?>"
                                    value="<?= $row['id_supplier'] ?>"><?= $row['nama_supplier'] ?></option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="lama_pengantaran" class="form-label">Pengantaran Normal</label>
                    <input type="text" class="form-control" name="lama_pengantaran" id="lama_pengantaran"
                        placeholder="Lama Pengantaran" readonly>
                </div>
                <div class="col-md-4">
                    <label for="pengantaran_maksimal" class="form-label">Pengantaran Maksimal</label>
                    <input type="text" class="form-control" name="pengantaran_maksimal" id="pengantaran_maksimal"
                        placeholder="Pengantaran Maksimal" readonly>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="buffer_stock" class="form-label">Buffer Stock</label>
                    <input type="text" class="form-control" name="buffer_stock" id="buffer_stock"
                        placeholder="Buffer Stock" readonly>
                </div>
                <div class="col-md-6">
                    <label for="stok_minimal" class="form-label">Stok Minimal</label>
                    <input type="text" class="form-control" name="stok_minimal" id="stok_minimal"
                        placeholder="Stok Minimal" readonly>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
<script>

    $('#id_supplier').on('change', function () {
        var selectedOption = $(this).find('option:selected');
        var lamaPengantaran = selectedOption.data('lamapengantaran');
        var pengantaranMaksimal = selectedOption.data('pengantaranmaksimal');
        var maxHarian = $('#max_harian').val();
        var avgHarian = $('#avg_harian').val();

        $('#lama_pengantaran').val(lamaPengantaran);
        $('#pengantaran_maksimal').val(pengantaranMaksimal);
        // hitung buffer stock
        var bufferStock = (pengantaranMaksimal - lamaPengantaran) * avgHarian;
        $('#buffer_stock').val(bufferStock);
        // hitung stok minimal
        var stokMinimal = avgHarian * lamaPengantaran;
        $('#stok_minimal').val(stokMinimal);
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