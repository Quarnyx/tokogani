<?php
$title = 'Data Supplier';
$subTitle = 'Supplier';
?>
<?php include './partials/breadcrumb.php' ?>
<button id="tambah" type="button" class="btn btn-primary  mb-3" data-bs-toggle="modal" data-bs-target="#modal">
    Tambah Supplier
</button>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Supplier</h4>
            </div>
            <div class="card-body">
                <div id="content"></div>
            </div>
        </div>
    </div>
</div>


<script>
    function loadTable() {
        $('#content').load('pages/supplier/tabel-supplier.php');
    }
    $(document).ready(function () {
        loadTable();
        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Supplier');
            $('.modal-body').load('pages/supplier/tambah-supplier.php');
        });


    });

</script>