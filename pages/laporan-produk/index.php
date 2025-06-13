<?php
function tanggal($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
}
?>
<div class="row">
    <div class="col-12">
        <div class="card shadow-none">
            <h4 class="text-center mt-3 mb-3"><b>TOKO CAT GANI</b><br><b>Laporan Data Barang</b><br>
            </h4>
            <hr>

            <div class="mt-5 p-10">
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 150px;">Pencetak</td>
                        <td style="width: 10px;">:</td>
                        <td><?= $_SESSION['nama_pengguna'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Dicetak Tanggal</td>
                        <td style="width: 10px;">:</td>
                        <td><?= tanggal(date('Y-m-d')) ?></td>
                    </tr>

                </table>
            </div>
            <div class="card-body">


                <table id="table-data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Buffer Stock</th>
                            <th>Minimum Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '././partials/config.php';
                        $no = 1;
                        $sql = "SELECT * FROM produk";
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_produk'] ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['satuan'] ?></td>
                                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
                                <td><?= $row['buffer_stock'] ?></td>
                                <td><?= $row['minimum_stock'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>


                <div class="mt-4 mb-1">
                    <div class="text-end d-print-none">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                class="mdi mdi-printer me-1"></i> Print</a>
                    </div>
                </div>
            </div> <!-- end card body-->

        </div> <!-- end card -->

    </div><!-- end col-->
</div>
<!-- end row-->

<script>
</script>