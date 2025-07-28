<?php
$title = 'Penerimaan Produk';
$subTitle = 'Penerimaan Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Tabel Penerimaan Produk Kode PO <?php echo $_GET['kodepo'] ?></h4>
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
        // Ambil parameter dari URL
        const params = new URLSearchParams(window.location.search);
        const kodepo = params.get('kodepo');
        const aksi = params.get('aksi');

        // Tentukan URL file berdasarkan ada tidaknya 'aksi'
        let page = aksi
            ? 'pages/penerimaan-barang-detail/tabel-penerimaan-barang-detail.php'
            : 'pages/penerimaan-barang-detail/tabel-penerimaan-barang.php';

        // Gabungkan URL lengkap
        let url = page + '?kodepo=' + encodeURIComponent(kodepo ?? '');

        // Load ke elemen dengan id "tabel"
        $('#tabel').load(url);
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