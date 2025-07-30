<?php
$title = 'Data Pengembalian Produk';
$subTitle = 'Pengembalian Produk';
?>
<?php include './partials/breadcrumb.php' ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Pengembalian Barang</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <select class="form-select mb-3" id="penerimaan-barang" name="penerimaan-barang">
                    <?php
                    include "partials/config.php";
                    $sql = "SELECT * FROM v_penerimaan_barang GROUP BY no_po";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?= $row['no_po'] ?>">Surat jalan : <?= $row['no_surat_jalan'] ?>, PO :
                                <?= $row['no_po'] ?>, Tanggal
                                : <?= $row['tanggal'] ?>
                            </option>
                            <?php
                        }
                    } else {
                        echo '<option value="">Tidak ada penerimaan barang</option>';
                    }
                    ?>
                </select>
                <button class="btn btn-primary mb-3" id="baru">Tambah Transaksi Pengembalian</button>
            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
</div>
<!-- end col -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Transaksi Pengembalian</h4>
            </div><!-- end card header -->
            <div class="card-body overflow-auto" id="tabel">
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<script>
    var no_po = $('#penerimaan-barang option:selected').val();

    function loadTable() {
        $('#tabel').load('pages/pengembalian-barang/tabel-pengembalian-barang.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#penerimaan-barang').change(function () {
            no_po = $(this).val();
        });
        $('#baru').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Pengembalian Barang - ' + no_po);
            $('.modal-body').load('pages/pengembalian-barang/tambah-pengembalian-barang.php?no_po=' + no_po);
        });
    });
</script>