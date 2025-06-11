<?php
$title = 'Data Buffer Stock';
$subTitle = 'Buffer Stock';
?>
<?php include './partials/breadcrumb.php' ?>
<div class="alert alert-info bg-info-100 text-info-600 border-info-100 px-24 py-11 mb-0 fw-semibold text-lg radius-8 mb-10"
    role="alert">
    <div class="d-flex align-items-center justify-content-between text-lg">
        Proses Buffer Stock
        <button class="remove-button text-info-600 text-xxl line-height-1">
            <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
        </button>
    </div>
    <p class="fw-medium text-info-600 text-sm mt-8">Perhitungan buffer stock produk dilakukan 1 bulan sekali menggunakan
        data barang keluar 30 hari sebelumnya dan lama pengantaran supplier
    </p>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Buffer Stock</h4>
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
        $('#tabel').load('pages/stok-minimal/tabel-stok-minimal.php');
    }
    $(document).ready(function () {
        loadTable();
    });
</script>