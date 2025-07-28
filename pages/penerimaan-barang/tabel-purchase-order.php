<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabel-data-1" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Kode PO</th>
                            <th>Tanggal Pesan</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require_once '../../partials/config.php';

                        $query = mysqli_query($link, "SELECT * FROM v_purchase_order ORDER BY tanggal DESC");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $data['no_po'] ?></td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['nama_supplier'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <td>
                                    <?php if ($data['status'] != "Diterima") { ?>
                                        <form action="" method="get" style="display: inline;">
                                            <input type="hidden" name="page" value="penerimaan-barang-detail">
                                            <input type="hidden" name="kodepo" value="<?= $data['no_po'] ?>">
                                            <button type="submit" class="btn btn-success text-sm">Penerimaan Barang</button>
                                        </form>
                                    <?php } else { ?>
                                        <form action="" method="get" style="display: inline;">
                                            <input type="hidden" name="page" value="penerimaan-barang-detail">
                                            <input type="hidden" name="aksi" value="detail">
                                            <input type="hidden" name="kodepo" value="<?= $data['no_po'] ?>">
                                            <button type="submit" class="btn btn-info text-sm">Detail Penerimaan</button>
                                        </form>
                                        <form
                                            action="pages/penerimaan-barang/proses-penerimaan-barang.php?aksi=hapus-penerimaan-barang"
                                            method="post" style="display: inline;">
                                            <input type="hidden" name="kodepo" value="<?= $data['no_po'] ?>">
                                            <button type="submit" class="btn btn-danger text-sm">Batalkan</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->


<script>
    $(document).ready(function () {
        $('#tabel-data-1').DataTable();




    });
</script>