<?php
$title = 'Data Pengeluaran Produk';
$subTitle = 'Pengeluaran Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<button class="btn btn-primary mb-3" id="tambah">Tambah Transaksi Keluar</button>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Transaksi Keluar</h4>
            </div><!-- end card header -->
            <div class="card-body" id="tabel">
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<script>
    function loadTable() {
        $('#tabel').load('pages/pengeluaran-barang/tabel-pengeluaran-barang.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Barang Keluar');
            $('.modal-body').load('pages/pengeluaran-barang/tambah-pengeluaran-barang.php');
        });
    });
</script>