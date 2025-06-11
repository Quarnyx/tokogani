<?php
$title = 'Data Purchase Order Produk';
$subTitle = 'Purchase Order';
?>
<?php include './partials/breadcrumb.php' ?>
<button class="btn btn-primary mb-4" id="lihat-transaksi"><i class="mdi mdi-eye"></i> Lihat Transaksi</button>

<!-- end row-->
<?php
include "././partials/config.php";
$query = mysqli_query($link, "SELECT MAX(no_po) AS no_po FROM purchase_order");
$data = mysqli_fetch_array($query);
$max = $data['no_po'] ? substr($data['no_po'], 4, 3) : "000";
$no = $max + 1;
$char = "PO-";
$kode = $char . sprintf("%03s", $no);
?>
<div class="row mt-4 mb-4">
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="header-title">Kode Purchase Order</h6>
                <h5><?php echo $kode ?></h5>
            </div>
        </div>
        <div class="card mt-10">
            <div class="card-body">
                <form id="purchase-order" enctype="multipart/form-data">
                    <input type="hidden" name="no_po" value="<?= $kode ?>">
                    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Produk</label>
                                <select class="form-select select2" data-toggle="select2" id="barang" name="id_produk">
                                    <option value="">Pilih Produk</option>
                                    <?php
                                    $sql = "SELECT * FROM v_stok";
                                    $result = $link->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>

                                        <option value="<?= $row['id_produk'] ?>" data-hargabeli="<?= $row['harga_beli'] ?>"
                                            data-stock="<?= $row['stok_tersedia'] ?>">
                                            <?= $row['nama_produk'] ?> - Stok
                                            <?= $row['stok_tersedia'] ?>
                                        </option>
                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Beli</label>
                                <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli"
                                    id="harga_beli">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" id="qty" name="jumlah" class="form-control" placeholder="Jumlah"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="tambah-barang" type="submit"
                                class="btn btn-primary-600 radius-8 px-10 py-10 d-flex align-items-center gap-2 text-sm"><i
                                    class="mdi mdi-plus"></i> Tambah</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-6">
        <div id="load-table"></div>

    </div>
</div>
<?php
if (isset($_POST['hapus-po'])) {
    $sql = "DELETE FROM po_detail WHERE no_po = '$_POST[no_po]'";
    $query = mysqli_query($link, $sql);

    $sql = "DELETE FROM purchase_order WHERE no_po = '$_POST[no_po]'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>window.location='index.php?page=purchase-order'</script>";
    } else {
        echo $link->error;
    }
}
if (isset($_POST['status'])) {

    $sql = "UPDATE purchase_order SET status = '$_POST[status]' WHERE id_purchase_order = '$_POST[id]'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>window.location='index.php?page=purchase-order'</script>";
    } else {
        echo $link->error;
    }
}
?>


<script>
    function loadTable() {
        var no_po = "<?php echo $kode; ?>";
        $('#load-table').load('pages/purchase-order/tabel-detail-po.php', { no_po: no_po })
    }
    $(document).ready(function () {
        new Selectr('.form-select');
        $('#lihat-transaksi').on('click', function () {
            $('.modal').modal('show');
            $('.modal-title').html('Data Purchase Order');
            // load form
            $('.modal-body').load('pages/purchase-order/tabel-transaksi-detail-po.php');
        });
        loadTable();
        $('#barang').on('change', function () {
            var hargabeli = $(this).find(':selected').data('hargabeli');

            $('#harga_beli').val(hargabeli.replace(/\.(\d+)?$/, ''));
        });

        $("#purchase-order").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'pages/purchase-order/proses-po.php?aksi=tambah-detail-purchase-order',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    var response = JSON.parse(data);
                    if (response.status == 'success') {
                        alertify.success(response.message);
                        $(".modal").modal('hide');
                        loadTable();
                    } if (response.status == 'error') {
                        alertify.error(response.message);
                    }
                },
                error: function (data) {
                    alertify.error('Gagal');
                }
            });
        });
    });
</script>