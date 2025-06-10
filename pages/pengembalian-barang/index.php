<?php
$title = 'Data Pengembalian Produk';
$subTitle = 'Pengembalian Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<button class="btn btn-primary mb-3" id="tambah">Tambah Transaksi Pengembalian</button>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Transaksi Pengembalian</h4>
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
        $('#tabel').load('pages/pengembalian-barang/tabel-pengembalian-barang.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Barang');
            $('.modal-body').load('pages/pengembalian-barang/tambah-pengembalian-barang.php');
        });
    });
</script>