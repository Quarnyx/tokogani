<?php
$title = 'Laporan Pengembalian Produk';
$subTitle = 'Pengembalian Produk';
?>
<?php include './partials/breadcrumb.php' ?>

<div class="row d-print-none">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Pilih Tanggal Laporan</h5>
            </div><!-- end card header -->
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
            $daritanggal = "";
            $sampaitanggal = "";

            if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) {
                $daritanggal = $_GET['dari_tanggal'];
                $sampaitanggal = $_GET['sampai_tanggal'];
            }

            ?>
            <div class="card-body">
                <form action="" method="get" class="row g-3">
                    <input type="hidden" name="page" value="laporan-pengembalian-barang">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault01" required=""
                            name="dari_tanggal">
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault02" required=""
                            name="sampai_tanggal">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Pilih</button>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>
<!-- end row-->
<?php if (isset($_GET['dari_tanggal']) && isset($_GET['sampai_tanggal'])) { ?>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow-none">
                <h5 class="text-center mt-3 "><b>TOKO CAT GANI</b><br><b>Laporan Pengembalian Barang</b></h5>
                <h6 class="text-center mb-3"><br>Periode <?php
                if (!empty($_GET["dari_tanggal"]) && !empty($_GET["sampai_tanggal"])) {
                    echo tanggal($_GET['dari_tanggal']) . " s.d " . tanggal($_GET['sampai_tanggal']);
                } else {
                    echo "Semua";
                }
                ?>
                </h6>
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
                                <th>No. Surat Masuk</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Jumlah Keluar</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '././partials/config.php';
                            $no = 1;
                            $sql = "SELECT * FROM v_pengembalian_barang where tanggal between '$daritanggal' and '$sampaitanggal' ORDER BY no_surat_jalan";
                            $result = $link->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['no_surat_jalan'] ?></td>
                                    <td><?= $row['tanggal_masuk'] ?></td>
                                    <td><?= $row['nama_produk'] ?></td>
                                    <td><?= $row['jumlah_masuk'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td><?= $row['satuan'] ?></td>
                                    <td><?= $row['keterangan'] ?></td>
                                    <td><?= $row['nama_pengguna'] ?></td>
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
<?php }
?>

<script>
</script>