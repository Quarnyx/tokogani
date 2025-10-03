<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List Produk</h4>
                <table id="tabel-data" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require_once '../../partials/config.php';
                        $total = 0;
                        $harga_beli = 0;
                        $harga_jual = 0;
                        $query = mysqli_query($link, "SELECT * FROM v_detail_po WHERE no_po = '$_POST[no_po]'");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $data['no_po'] ?></td>
                                <td><?= $data['kode_produk'] ?></td>
                                <td><?= $data['nama_produk'] ?></td>
                                <td>Rp. <?= number_format($data['harga_beli'], 0, ',', '.') ?></td>
                                <td><?= $data['jumlah'] ?></td>
                                <td>Rp. <?= number_format($data['harga_beli'] * $data['jumlah'], 0, ',', '.') ?></td>
                                <td>
                                    <button data-id="<?= $data['id_po_detail'] ?>" id="delete" type="button"
                                        class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <?php
                            $harga_beli += $data['harga_beli'] * $data['jumlah'];
                            $total += ($data['harga_beli'] * $data['jumlah']);
                        }
                        ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<form id="tambah-po" enctype="multipart/form-data">
    <input type="hidden" name="no_po" value="<?= $_POST['no_po'] ?>" id="no_po">
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <input type="hidden" name="harga_beli" value="<?= $harga_beli ?>">
    <div class="row">
        <div class=" col-lg-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="id_supplier" class="form-label">Supplier</label>
                            <select class="form-select" name="id_supplier" id="id_supplier" data-trigger="">
                                <?php
                                $sql = "SELECT * FROM supplier";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $row['id_supplier'] ?>"><?= $row['kode_supplier'] ?> -
                                            <?= $row['nama_supplier'] ?></option>

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pesan</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Total</label>
                                <input type="text" name="total" class="form-control" id="total"
                                    value="<?= number_format($harga_beli, 0, ',', '.') ?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div> <!-- end card body-->
        </div>

    </div>
</form>

<script>
    $(document).ready(function () {
        try {
            new simpleDatatables.DataTable("#tabel-data", {
                searchable: true,
                fixedHeight: false,
            })
        } catch (err) { }

        $('#tabel-data').on('click', '#delete', function () {
            const id = $(this).data('id');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus transaksi ini? ', function () {
                $.ajax({
                    type: 'POST',
                    url: 'pages/purchase-order/proses-po.php?aksi=hapus-detail-po',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            alertify.success(response.message);
                            loadTable();
                        } if (response.status == 'error') {
                            alertify.error(response.message);
                        }
                    },
                    error: function (data) {
                        alertify.error('Gagal');
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });

        $("#tambah-po").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var no_po = $('#no_po').val();

            $.ajax({
                type: 'POST',
                url: 'pages/purchase-order/proses-po.php?aksi=tambah-purchase-order',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".modal").modal('hide');
                    window.location.reload();

                },
                error: function (data) {
                    alertify.error(data);
                }
            });
        });


    });
</script>