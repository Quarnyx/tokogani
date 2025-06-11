<?php
$title = 'Data Persediaan Produk';
$subTitle = 'Persediaan Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Persediaan Produk</h4>
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

<div class="row mt-10">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Permintaan Barang</h4>
            </div><!-- end card header -->
            <div class="card-body" id="tabel_permintaan">
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>

<script>
    function loadTable() {
        $('#tabel').load('pages/persediaan-barang/tabel-persediaan-produk.php');
        $('#tabel_permintaan').load('pages/persediaan-barang/tabel-permintaan-barang.php');
    }
    $(document).ready(function () {
        loadTable();
    });
</script>