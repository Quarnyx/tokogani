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
            <div class="row">
                <div class="col-4" style="align-content: center;">

                    <img src="assets/images/logo.png" alt="site logo"
                        style="width: 200%; height: auto; vertical-align: middle;">

                </div>
                <div class="col-8">
                    <h5 class="text-center mt-3 "><b>TOKO CAT GANI</b><br><b>Laporan Penerimaan Barang</b></h5>
                    <h6 class="text-center mb-3"><br>Periode <?php
                    if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                        echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                    } else {
                        echo "Semua";
                    }
                    ?>
                    </h6>
                </div>
            </div>

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
                            <th>Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Lama Pengantaran</th>
                            <th>Avg. Lama Pengantaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "././partials/config.php";
                        $no = 1;
                        $sql = "SELECT * FROM supplier ORDER BY id_supplier DESC";
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_supplier'] ?></td>
                                <td><?= $row['nama_supplier'] ?></td>
                                <td class="text-wrap"><?= $row['alamat'] ?></td>
                                <td><?= $row['kontak'] ?></td>
                                <td><?= $row['lama_pengantaran_maksimal'] ?> Hari</td>
                                <td><?= $row['avg_lama_pengantaran'] ?> Hari</td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="mt-3" style="text-align:end;">
                    <hr>
                    <p class="font-weight-bold">Kendal, <?= tanggal(date('Y-m-d')) ?><br></p>
                    <div class="mt-5">
                        <p class="font-weight-bold">Abdul Ghani</p>
                    </div>
                </div>

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