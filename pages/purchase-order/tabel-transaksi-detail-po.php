<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="tabel-data-1" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No PO</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require_once '../../partials/config.php';

                        $query = mysqli_query($link, "SELECT * FROM v_purchase_order");
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $data['no_po'] ?></td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['nama_supplier'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <td>
                                    <form action="" method="post" style="display: inline;">
                                        <input type="hidden" name="hapus-po" value="<?= $data['id_purchase_order'] ?>">
                                        <input type="hidden" name="id" value="<?= $data['id_purchase_order'] ?>">
                                        <input type="hidden" name="no_po" value="<?= $data['no_po'] ?>">
                                        <button type="submit" class="btn btn-danger text-sm">Hapus</button>
                                    </form>
                                    <?php if ($data['status'] != "Diterima") { ?>
                                        <form action="" method="post" style="display: inline;">
                                            <input type="hidden" name="status" value="Diterima">
                                            <input type="hidden" name="id" value="<?= $data['id_purchase_order'] ?>">
                                            <button type="submit" class="btn btn-success text-sm">Diterima</button>
                                        </form>
                                    <?php } ?>
                                    <a href="pages/purchase-order/cetak-detail.php?id=<?= $data['no_po'] ?>" target="_blank"
                                        class="btn btn-primary text-sm">Cetak</a>
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