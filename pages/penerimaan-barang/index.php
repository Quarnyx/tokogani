<?php
$title = 'Data Penerimaan Produk';
$subTitle = 'Penerimaan Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Penerimaan Purchase Order</h4>
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
        $('#tabel').load('pages/penerimaan-barang/tabel-purchase-order.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Barang');
            $('.modal-body').load('pages/penerimaan-barang/tambah-penerimaan-barang.php');
        });
    });
</script>