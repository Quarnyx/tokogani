<?php
$title = 'Data Buffer Stock';
$subTitle = 'Buffer Stock';
?>
<?php include './partials/breadcrumb.php' ?>


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