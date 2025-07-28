<?php
require_once '../../partials/config.php';
$sqlpo = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['kodepo'] . "'";
$resultpo = $link->query($sqlpo);
$rowpo = $resultpo->fetch_assoc();
session_start();
?>
<form action="pages/penerimaan-barang-detail/proses-penerimaan-barang.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
    <div class="row">
        <p>Kode PO : <b><?= $rowpo['no_po'] ?></b></p>
        <input name="no_po" type="hidden" value="<?= $rowpo['no_po'] ?>">
        <p>Supplier : <b><?= $rowpo['nama_supplier'] ?></b></p>
        <input type="hidden" name="id_supplier" value="<?= $rowpo['id_supplier'] ?>">
        <p>Tanggal Pesan : <b><?= $rowpo['tanggal'] ?></b></p>
        <p>Tanggal Penerimaan : <?= $rowpo['tanggal'] ?></p>
        <p>No Surat Jalan : <?= $rowpo['no_surat_jalan'] ?></p>
    </div>

    <table id="table-data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah dipesan</th>
                <th>Satuan</th>
                <th>Jumlah Diterima</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../../partials/config.php';
            $no = 1;
            $sql = "SELECT * FROM v_penerimaan_barang WHERE no_po = '" . $_GET['kodepo'] . "'";
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['kode_produk'] ?></td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();

    });
</script>