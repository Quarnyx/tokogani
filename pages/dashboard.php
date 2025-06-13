<?php
$title = 'Toko Cat Gani';
$subTitle = 'Aplikasi Manajamen Barang';
?>
<?php include './partials/breadcrumb.php' ?>
<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <?php
                    include "././partials/config.php";
                    $sql = "SELECT * FROM produk";
                    $result = $link->query($sql);
                    $count = $result->num_rows;
                    ?>
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Produk</p>
                        <h6 class="mb-0"><?= $count ?></h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mingcute:empty-box-fill" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    Total Produk di Toko
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <?php
                    $sql = "SELECT * FROM barang_masuk WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())";
                    $result = $link->query($sql);
                    $count = $result->num_rows;
                    ?>
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Barang Masuk</p>
                        <h6 class="mb-0"><?= $count ?></h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mingcute:download-line" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    Total Barang Masuk Bulan Ini
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <?php
                    $sql = "SELECT * FROM barang_keluar WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())";
                    $result = $link->query($sql);
                    $count = $result->num_rows;
                    ?>
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Barang Keluar</p>
                        <h6 class="mb-0"><?= $count ?></h6>
                    </div>
                    <div
                        class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mingcute:upload-2-line" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    Total Barang Keluar Bulan Ini
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-5 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <?php
                    $sql = "SELECT * FROM v_stok WHERE stok_tersedia < buffer_stock";
                    $result = $link->query($sql);
                    $count = $result->num_rows;
                    ?>
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Produk Dibawah Buffer Stock</p>
                        <h6 class="mb-0"><?= $count ?></h6>
                    </div>
                    <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mingcute:battery-1-line" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    Total Produk Yang Sudah Dibawah Buffer Stock
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-5 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <?php
                    $sql = "SELECT * FROM v_stok WHERE stok_tersedia < minimum_stock";
                    $result = $link->query($sql);
                    $count = $result->num_rows;
                    ?>
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Produk DIbawah Stok Minimal</p>
                        <h6 class="mb-0"><?= $count ?></h6>
                    </div>
                    <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="mingcute:battery-2-line" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    Total Produk Yang Sudah Dibawah Stok Minimal
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col-xxl-4 col-lg-6">
        <div class="card h-100">

            <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                    <h6 class="mb-2 fw-bold text-lg mb-0">Produk Dibawah Buffer Stock</h6>
                    <a href="?page=persediaan-barang"
                        class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        Lihat Semua
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>

                <div class="mt-32">
                    <?php
                    $sql = "SELECT * FROM v_stok WHERE stok_tersedia < buffer_stock";
                    $result = $link->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="d-flex align-items-center justify-content-between gap-3 mb-32">
                            <div class="d-flex align-items-center gap-2">
                                <div class="flex-grow-1">
                                    <h6 class="text-md mb-0 fw-normal"><?= $row['nama_produk'] ?></h6>
                                    <span class="text-sm text-secondary-light fw-normal"><?php echo $row['kode_produk']; ?>
                                        | Buffer
                                        Stock: <?= $row['buffer_stock'] ?></span>
                                </div>
                            </div>
                            <span class="text-primary-light text-md fw-medium">Stok: <?= $row['stok_tersedia'] ?> </span>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-lg-6">
        <div class="card h-100">

            <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                    <h6 class="mb-2 fw-bold text-lg mb-0">Produk Dibawah Stok Minimal</h6>
                    <a href="?page=persediaan-barang"
                        class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        Lihat Semua
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>

                <div class="mt-32">
                    <?php
                    $sql = "SELECT * FROM v_stok WHERE stok_tersedia < minimum_stock";
                    $result = $link->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="d-flex align-items-center justify-content-between gap-3 mb-32">
                            <div class="d-flex align-items-center gap-2">
                                <div class="flex-grow-1">
                                    <h6 class="text-md mb-0 fw-normal"><?= $row['nama_produk'] ?></h6>
                                    <span class="text-sm text-secondary-light fw-normal"><?php echo $row['kode_produk']; ?>
                                        | Stok Minimal: <?= $row['minimum_stock'] ?></span>
                                </div>
                            </div>
                            <span class="text-primary-light text-md fw-medium">Stok: <?= $row['stok_tersedia'] ?></span>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>