<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.php" class="sidebar-logo">
            <img src="assets/images/logo.png" alt="site logo" class="light-logo">
            <img src="assets/images/logo.png" alt="site logo" class="dark-logo">
            <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Owner') { ?>
                <li>
                    <a href="?dashboard">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-group-title">Data Master</li>
                <li>
                    <a href="?page=pengguna">
                        <iconify-icon icon="mingcute:user-5-line" class="menu-icon"></iconify-icon>
                        <span>Data Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="?page=produk">
                        <iconify-icon icon="mingcute:empty-box-line" class="menu-icon"></iconify-icon>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="?page=supplier">
                        <iconify-icon icon="mingcute:floating-dust-line" class="menu-icon"></iconify-icon>
                        <span>Supplier</span>
                    </a>
                </li>

                <li class="sidebar-menu-group-title">Transaksi</li>

                <li>
                    <a href="?page=penerimaan-barang">
                        <iconify-icon icon="mingcute:transfer-line" class="menu-icon"></iconify-icon>
                        <span>Penerimaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengeluaran-barang">
                        <iconify-icon icon="mingcute:transfer-line" class="menu-icon"></iconify-icon>
                        <span>Pengeluaran Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengembalian-barang">
                        <iconify-icon icon="mingcute:transformation-line" class="menu-icon"></iconify-icon>
                        <span>Pengembalian Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=purchase-order">
                        <iconify-icon icon="mingcute:hand-card-line" class="menu-icon"></iconify-icon>
                        <span>Purchase Order</span>
                    </a>
                </li>
                <li>
                    <a href="?page=persediaan-barang">
                        <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                        <span>Persediaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=stok-minimal">
                        <iconify-icon icon="mingcute:box-line" class="menu-icon"></iconify-icon>
                        <span>Buffer Stock</span>
                    </a>
                </li>

                <li class="sidebar-menu-group-title">Laporan</li>

                <li>
                    <a href="?page=laporan-pengguna">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Data Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-produk">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-supplier">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Data Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-penerimaan-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Penerimaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-pengeluaran-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Pengeluaran Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-persediaan-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Persediaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-pengembalian-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Pengembalian Barang</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'Admin Gudang') { ?>
                <li>
                    <a href="?dashboard">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-menu-group-title">Transaksi</li>

                <li>
                    <a href="?page=penerimaan-barang">
                        <iconify-icon icon="mingcute:transfer-line" class="menu-icon"></iconify-icon>
                        <span>Penerimaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengeluaran-barang">
                        <iconify-icon icon="mingcute:transfer-line" class="menu-icon"></iconify-icon>
                        <span>Pengeluaran Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengembalian-barang">
                        <iconify-icon icon="mingcute:transformation-line" class="menu-icon"></iconify-icon>
                        <span>Pengembalian Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=persediaan-barang">
                        <iconify-icon icon="mingcute:storage-line" class="menu-icon"></iconify-icon>
                        <span>Persediaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=stok-minimal">
                        <iconify-icon icon="mingcute:box-line" class="menu-icon"></iconify-icon>
                        <span>Buffer Stock</span>
                    </a>
                </li>

                <li class="sidebar-menu-group-title">Laporan</li>


                <li>
                    <a href="?page=laporan-produk">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Data Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-supplier">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Laporan Data Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-penerimaan-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Penerimaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-pengeluaran-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Pengeluaran Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-persediaan-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Persediaan Barang</span>
                    </a>
                </li>
                <li>
                    <a href="?page=laporan-pengembalian-barang">
                        <iconify-icon icon="mingcute:chart-horizontal-line" class="menu-icon"></iconify-icon>
                        <span>Return Barang</span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</aside>