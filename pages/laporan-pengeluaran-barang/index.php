<?php
$title = 'Laporan Pengeluaran Produk';
$subTitle = 'Pengeluaran Produk';
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
                <form action="" method="get" class="row g-3" id="laporanForm">
                    <input type="hidden" name="page" value="laporan-pengeluaran-barang">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault01" required="" name="dari_tanggal"
                            value="<?= htmlspecialchars($daritanggal) ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault02" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="validationDefault02" required=""
                            name="sampai_tanggal" value="<?= htmlspecialchars($sampaitanggal) ?>">
                    </div>

                    <!-- validation error message -->
                    <div class="col-12">
                        <small id="dateError" class="text-danger" style="display:none;">Dari Tanggal harus lebih kecil
                            dari Sampai Tanggal.</small>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" id="pilihBtn">Pilih</button>
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tanggal Keluar</th>
                                <th>Harga Jual</th>
                                <th>Total</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '././partials/config.php';
                            $no = 1;
                            $total = 0;
                            $sql = "SELECT * FROM v_pengeluaran_barang WHERE tanggal BETWEEN '$daritanggal' AND '$sampaitanggal'";
                            $result = $link->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $total += $row['harga_jual'] * $row['jumlah'];
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_produk'] ?></td>
                                    <td><?= $row['nama_produk'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td><?= $row['satuan'] ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['harga_jual'] * $row['jumlah'], 0, ',', '.') ?></td>
                                    <td><?= $row['nama_pengguna'] ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <h6 class="text-end me-3">Total: Rp <?= number_format($total, 0, ',', '.') ?></h6>
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
<?php }
?>

<script>
    (function () {
        const dariInput = document.getElementById('validationDefault01');
        const sampaiInput = document.getElementById('validationDefault02');
        const pilihBtn = document.getElementById('pilihBtn');
        const dateError = document.getElementById('dateError');
        const form = document.getElementById('laporanForm');

        function validateDates() {
            const dari = dariInput.value;
            const sampai = sampaiInput.value;

            // if either empty, enable button (HTML required will handle submit)
            if (!dari || !sampai) {
                dateError.style.display = 'none';
                pilihBtn.disabled = false;
                return;
            }

            // compare as strings in YYYY-MM-DD form works; convert to Date for clarity
            const dariDate = new Date(dari);
            const sampaiDate = new Date(sampai);

            if (dariDate >= sampaiDate) {
                dateError.style.display = 'inline';
                pilihBtn.disabled = true;
            } else {
                dateError.style.display = 'none';
                pilihBtn.disabled = false;
            }
        }

        // validate on load in case values are prefilled
        window.addEventListener('load', validateDates);
        dariInput.addEventListener('change', validateDates);
        sampaiInput.addEventListener('change', validateDates);

        // prevent submit if invalid (extra safety)
        form.addEventListener('submit', function (e) {
            if (pilihBtn.disabled) {
                e.preventDefault();
            }
        });
    })();
</script>