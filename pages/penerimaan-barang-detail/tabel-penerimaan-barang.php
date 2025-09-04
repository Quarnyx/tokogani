<?php
require_once '../../partials/config.php';
$sqlpo = "SELECT * FROM v_purchase_order WHERE no_po = '" . $_GET['kodepo'] . "'";
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
        <p>Tanggal Penerimaan : <input class="" type="date" name="tanggal_penerimaan" required></p>
        <p>No Surat Jalan : <input type="text" name="no_surat_jalan" required></p>
    </div>

    <table id="table-data" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Jumlah dipesan</th>
                <th>Satuan</th>
                <th>Jumlah Diterima</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../../partials/config.php';
            $no = 1;
            $sql = "SELECT * FROM v_detail_po WHERE no_po = '" . $_GET['kodepo'] . "'";
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['kode_produk'] ?></td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td>Rp. <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['satuan'] ?></td>
                    <td>
                        <!-- changed: use class names instead of repeated IDs -->
                        <input type="hidden" class="jumlah" name="jumlah[]" value="<?= $row['jumlah'] ?>">
                        <input type="number" class="form-control jumlah_diterima" name="jumlah_diterima[]"
                            value="<?= $row['jumlah'] ?>" required>
                        <input type="hidden" name="idproduk[]" value="<?= $row['id_produk'] ?>">
                        <input type="hidden" name="no_po" value="<?= $_GET['kodepo'] ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
</form>
<script>
    $(document).ready(function () {
        $('#table-data').DataTable();
        let hasInvalid = false;
        function validateRows() {
            let invalid = false;
            const jumlahEls = $('.jumlah');
            const diterimaEls = $('.jumlah_diterima');
            for (let i = 0; i < jumlahEls.length; i++) {
                const jumlah = parseFloat($(jumlahEls[i]).val()) || 0;
                const diterima = parseFloat($(diterimaEls[i]).val()) || 0;
                if (diterima < jumlah) {
                    invalid = true;
                    break;
                }
            }
            if (invalid) {
                $('#btn-simpan').prop('disabled', true);
                if (!hasInvalid) {
                    if (window.alertify && typeof alertify.error === 'function') {
                        alertify.error('Jumlah diterima tidak boleh kurang dari jumlah dipesan');
                    } else {
                        alert('Jumlah diterima tidak boleh kurang dari jumlah dipesan');
                    }
                    hasInvalid = true;
                }
            } else {
                $('#btn-simpan').prop('disabled', false);
                hasInvalid = false;
            }
        }

        validateRows();

        $(document).on('keyup change', '.jumlah_diterima', function () {
            validateRows();
        });

    });
</script>