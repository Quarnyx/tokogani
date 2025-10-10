/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : 127.0.0.1:3306
 Source Schema         : gani

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/10/2025 17:50:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang_keluar
-- ----------------------------
DROP TABLE IF EXISTS `barang_keluar`;
CREATE TABLE `barang_keluar`  (
  `id_barang_keluar` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pengguna` int NOT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_jual` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_keluar`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 461 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_keluar
-- ----------------------------
INSERT INTO `barang_keluar` VALUES (460, '2025-10-10', 28, 30, '2025-10-10 14:57:09', 1, 'as', 6000.00);

-- ----------------------------
-- Table structure for barang_kembali
-- ----------------------------
DROP TABLE IF EXISTS `barang_kembali`;
CREATE TABLE `barang_kembali`  (
  `id_barang_kembali` int NOT NULL AUTO_INCREMENT,
  `id_produk` int NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal` date NULL DEFAULT NULL,
  `id_pengguna` int NULL DEFAULT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_barang_masuk` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_kembali`) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_kembali_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_kembali
-- ----------------------------

-- ----------------------------
-- Table structure for barang_masuk
-- ----------------------------
DROP TABLE IF EXISTS `barang_masuk`;
CREATE TABLE `barang_masuk`  (
  `id_barang_masuk` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `id_produk` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `no_surat_jalan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pengguna` int NULL DEFAULT NULL,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_masuk`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_masuk_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_masuk
-- ----------------------------
INSERT INTO `barang_masuk` VALUES (47, '2025-09-12', 32, 1, 'AA-236', 2, '2025-09-12 10:24:16', 1, 'PO-003');
INSERT INTO `barang_masuk` VALUES (48, '2025-09-12', 28, 50, 'AA-235', 2, '2025-09-12 10:28:15', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (49, '2025-09-12', 32, 49, 'AA-235', 2, '2025-09-12 10:28:15', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (51, '2025-10-08', 32, 1, 'SJ-0004', 2, '2025-10-03 23:58:07', 1, 'PO-002');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('Owner','Admin Gudang') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'Administrasi', 'admin', '0192023a7bbd73250516f069df18b500', 'Owner');
INSERT INTO `pengguna` VALUES (4, 'Yanto', 'yanto', 'b5d8b455512443450de17c04c4ef3b36', 'Admin Gudang');

-- ----------------------------
-- Table structure for permintaan_barang
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_barang`;
CREATE TABLE `permintaan_barang`  (
  `id_permintaan_barang` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah_diminta` int NOT NULL,
  `status` enum('Proses','Disetujui','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_pengguna` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_permintaan_barang`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `permintaan_barang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `permintaan_barang_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permintaan_barang
-- ----------------------------

-- ----------------------------
-- Table structure for po_detail
-- ----------------------------
DROP TABLE IF EXISTS `po_detail`;
CREATE TABLE `po_detail`  (
  `id_po_detail` int NOT NULL AUTO_INCREMENT,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id_po_detail`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_purchase_order`(`no_po` ASC) USING BTREE,
  CONSTRAINT `po_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of po_detail
-- ----------------------------
INSERT INTO `po_detail` VALUES (15, 'PO-001', 28, 50);
INSERT INTO `po_detail` VALUES (16, 'PO-001', 32, 50);
INSERT INTO `po_detail` VALUES (19, 'PO-002', 32, 1);
INSERT INTO `po_detail` VALUES (20, 'PO-003', 29, 10);

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `satuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `buffer_stock` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga_beli` decimal(15, 2) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (28, 'Indomie Goreng A', 'IND-001', 'PCS', 0, '2025-09-04 12:36:26', '2025-09-06 05:32:42', 5000.00, 6000.00);
INSERT INTO `produk` VALUES (29, 'Cat Nippon A', 'CAT-001', 'Kaleng', 10, '2025-09-04 12:36:26', '2025-09-04 12:36:26', 50000.00, 55000.00);
INSERT INTO `produk` VALUES (32, 'Indomie Rebus A', 'IND-003', 'PCS', 10, '2025-09-04 12:40:23', '2025-09-04 12:40:23', 4000.00, 4500.00);
INSERT INTO `produk` VALUES (33, 'Cat B', 'CAT-003', 'Kaleng', 0, '2025-09-04 12:40:23', '2025-09-04 17:26:04', 40000.00, 45000.00);

-- ----------------------------
-- Table structure for purchase_order
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE `purchase_order`  (
  `id_purchase_order` int NOT NULL AUTO_INCREMENT,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_supplier` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` int NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_purchase_order`) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `purchase_order_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------
INSERT INTO `purchase_order` VALUES (8, 'PO-001', '2025-09-12', 2, 'Diterima Sebagian', 1, NULL);
INSERT INTO `purchase_order` VALUES (11, 'PO-002', '2025-09-12', 2, 'Diterima', 1, 'Backorder dari PO-001 - sisa qty');
INSERT INTO `purchase_order` VALUES (12, 'PO-003', '2025-10-03', 2, 'Dipesan', 1, NULL);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `id_supplier` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lama_pengantaran_maksimal` int NULL DEFAULT NULL,
  `avg_lama_pengantaran` int NULL DEFAULT NULL,
  `kode_supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (2, 'PT. Maju Jaya', 'Tangerang', '085682224', 10, 7, 'SP-0001');
INSERT INTO `supplier` VALUES (3, 'PT Roda Maju', 'Tangerang', '082525525252', 12, 7, 'SP-0002');
INSERT INTO `supplier` VALUES (5, 'PT. Siba Surya', 'Semarang', '99299292', 7, 4, 'SP-0003');

-- ----------------------------
-- View structure for v_arus_kas_summary
-- ----------------------------
DROP VIEW IF EXISTS `v_arus_kas_summary`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_arus_kas_summary` AS select `v_laporan_arus_kas`.`aktivitas` AS `aktivitas`,`v_laporan_arus_kas`.`bulan` AS `bulan`,`v_laporan_arus_kas`.`kas_masuk` AS `kas_masuk`,`v_laporan_arus_kas`.`kas_keluar` AS `kas_keluar`,`v_laporan_arus_kas`.`arus_kas_bersih` AS `arus_kas_bersih` from `v_laporan_arus_kas` union all select 'TOTAL' AS `aktivitas`,'KESELURUHAN' AS `bulan`,sum(`v_laporan_arus_kas`.`kas_masuk`) AS `kas_masuk`,sum(`v_laporan_arus_kas`.`kas_keluar`) AS `kas_keluar`,sum(`v_laporan_arus_kas`.`arus_kas_bersih`) AS `arus_kas_bersih` from `v_laporan_arus_kas`;

-- ----------------------------
-- View structure for v_detail_po
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_po`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_detail_po` AS select `po_detail`.`id_po_detail` AS `id_po_detail`,`po_detail`.`id_produk` AS `id_produk`,`po_detail`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`po_detail`.`no_po` AS `no_po`,`produk`.`harga_beli` AS `harga_beli`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan` from (`po_detail` join `produk` on((`po_detail`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_laporan_arus_kas
-- ----------------------------
DROP VIEW IF EXISTS `v_laporan_arus_kas`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_laporan_arus_kas` AS select 'Operasional' AS `aktivitas`,date_format(`summary_bulanan`.`periode`,'%Y-%m') AS `bulan`,coalesce(`summary_bulanan`.`kas_masuk`,0) AS `kas_masuk`,coalesce(`summary_bulanan`.`kas_keluar`,0) AS `kas_keluar`,(coalesce(`summary_bulanan`.`kas_masuk`,0) - coalesce(`summary_bulanan`.`kas_keluar`,0)) AS `arus_kas_bersih`,`summary_bulanan`.`periode` AS `tanggal_periode` from (select date_format(`transaksi_kas`.`tanggal`,'%Y-%m-01') AS `periode`,sum((case when (`transaksi_kas`.`jenis` = 'masuk') then `transaksi_kas`.`jumlah` else 0 end)) AS `kas_masuk`,sum((case when (`transaksi_kas`.`jenis` = 'keluar') then `transaksi_kas`.`jumlah` else 0 end)) AS `kas_keluar` from (select `bk`.`tanggal` AS `tanggal`,'masuk' AS `jenis`,sum((`bk`.`jumlah` * coalesce(`bk`.`harga_jual`,`p`.`harga_jual`))) AS `jumlah` from (`barang_keluar` `bk` join `produk` `p` on((`bk`.`id_produk` = `p`.`id_produk`))) group by `bk`.`tanggal` union all select `bm`.`tanggal` AS `tanggal`,'keluar' AS `jenis`,sum((`bm`.`jumlah` * `p`.`harga_beli`)) AS `jumlah` from (`barang_masuk` `bm` join `produk` `p` on((`bm`.`id_produk` = `p`.`id_produk`))) group by `bm`.`tanggal` union all select `bkb`.`tanggal` AS `tanggal`,'masuk' AS `jenis`,sum((`bkb`.`jumlah` * `p`.`harga_beli`)) AS `jumlah` from (`barang_kembali` `bkb` join `produk` `p` on((`bkb`.`id_produk` = `p`.`id_produk`))) group by `bkb`.`tanggal`) `transaksi_kas` group by date_format(`transaksi_kas`.`tanggal`,'%Y-%m-01')) `summary_bulanan` order by `summary_bulanan`.`periode`;

-- ----------------------------
-- View structure for v_penerimaan_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_penerimaan_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penerimaan_barang` AS select `barang_masuk`.`id_barang_masuk` AS `id_barang_masuk`,`barang_masuk`.`tanggal` AS `tanggal`,`barang_masuk`.`id_produk` AS `id_produk`,`barang_masuk`.`jumlah` AS `jumlah`,`barang_masuk`.`no_surat_jalan` AS `no_surat_jalan`,`barang_masuk`.`id_supplier` AS `id_supplier`,`barang_masuk`.`created_at` AS `created_at`,`barang_masuk`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan`,`barang_masuk`.`no_po` AS `no_po`,`produk`.`harga_beli` AS `harga_beli` from (((`barang_masuk` join `pengguna` on((`barang_masuk`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `produk` on((`barang_masuk`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_masuk`.`id_supplier` = `supplier`.`id_supplier`)));

-- ----------------------------
-- View structure for v_pengeluaran_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengeluaran_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengeluaran_barang` AS select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`barang_keluar`.`tanggal` AS `tanggal`,`barang_keluar`.`id_produk` AS `id_produk`,`barang_keluar`.`jumlah` AS `jumlah`,`barang_keluar`.`created_at` AS `created_at`,`barang_keluar`.`id_pengguna` AS `id_pengguna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`barang_keluar`.`harga_jual` AS `harga_jual` from ((`barang_keluar` join `produk` on((`barang_keluar`.`id_produk` = `produk`.`id_produk`))) join `pengguna` on((`barang_keluar`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_pengembalian_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengembalian_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengembalian_barang` AS select `barang_kembali`.`id_barang_kembali` AS `id_barang_kembali`,`barang_kembali`.`id_produk` AS `id_produk`,`barang_kembali`.`keterangan` AS `keterangan`,`barang_kembali`.`tanggal` AS `tanggal`,`barang_kembali`.`id_pengguna` AS `id_pengguna`,`barang_kembali`.`id_supplier` AS `id_supplier`,`barang_kembali`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`barang_kembali`.`no_po` AS `no_po`,`barang_masuk`.`no_surat_jalan` AS `no_surat_jalan`,`barang_masuk`.`jumlah` AS `jumlah_masuk`,`barang_masuk`.`tanggal` AS `tanggal_masuk` from ((((`barang_kembali` join `produk` on((`barang_kembali`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_kembali`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`barang_kembali`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `barang_masuk` on(((`pengguna`.`id_pengguna` = `barang_masuk`.`id_pengguna`) and (`produk`.`id_produk` = `barang_masuk`.`id_produk`) and (`supplier`.`id_supplier` = `barang_masuk`.`id_supplier`) and (`barang_kembali`.`id_barang_masuk` = `barang_masuk`.`id_barang_masuk`))));

-- ----------------------------
-- View structure for v_permintaan_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_permintaan_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_permintaan_barang` AS select `permintaan_barang`.`id_permintaan_barang` AS `id_permintaan_barang`,`permintaan_barang`.`tanggal` AS `tanggal`,`permintaan_barang`.`id_produk` AS `id_produk`,`permintaan_barang`.`jumlah_diminta` AS `jumlah_diminta`,`permintaan_barang`.`status` AS `status`,`permintaan_barang`.`catatan` AS `catatan`,`permintaan_barang`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`satuan` AS `satuan` from ((`permintaan_barang` join `pengguna` on((`permintaan_barang`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `produk` on((`permintaan_barang`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_purchase_order
-- ----------------------------
DROP VIEW IF EXISTS `v_purchase_order`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_purchase_order` AS select `purchase_order`.`id_purchase_order` AS `id_purchase_order`,`purchase_order`.`no_po` AS `no_po`,`purchase_order`.`tanggal` AS `tanggal`,`purchase_order`.`id_supplier` AS `id_supplier`,`purchase_order`.`status` AS `status`,`purchase_order`.`id_pengguna` AS `id_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`purchase_order`.`keterangan` AS `keterangan` from ((`purchase_order` join `supplier` on((`purchase_order`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`purchase_order`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_stok
-- ----------------------------
DROP VIEW IF EXISTS `v_stok`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stok` AS select `p`.`id_produk` AS `id_produk`,`p`.`kode_produk` AS `kode_produk`,`p`.`nama_produk` AS `nama_produk`,`p`.`satuan` AS `satuan`,ifnull(`m`.`total_masuk`,0) AS `total_masuk`,ifnull(`k`.`total_keluar`,0) AS `total_keluar`,ifnull(`bk`.`total_kembali`,0) AS `total_kembali`,((ifnull(`m`.`total_masuk`,0) - ifnull(`k`.`total_keluar`,0)) - ifnull(`bk`.`total_kembali`,0)) AS `stok_tersedia`,`p`.`buffer_stock` AS `buffer_stock`,`p`.`harga_beli` AS `harga_beli`,`p`.`harga_jual` AS `harga_jual` from (((`produk` `p` left join (select `barang_masuk`.`id_produk` AS `id_produk`,sum(`barang_masuk`.`jumlah`) AS `total_masuk` from `barang_masuk` group by `barang_masuk`.`id_produk`) `m` on((`p`.`id_produk` = `m`.`id_produk`))) left join (select `barang_keluar`.`id_produk` AS `id_produk`,sum(`barang_keluar`.`jumlah`) AS `total_keluar` from `barang_keluar` group by `barang_keluar`.`id_produk`) `k` on((`p`.`id_produk` = `k`.`id_produk`))) left join (select `barang_kembali`.`id_produk` AS `id_produk`,sum(`barang_kembali`.`jumlah`) AS `total_kembali` from `barang_kembali` group by `barang_kembali`.`id_produk`) `bk` on((`p`.`id_produk` = `bk`.`id_produk`)));

-- ----------------------------
-- Procedure structure for sp_laporan_arus_kas
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_laporan_arus_kas`;
delimiter ;;
CREATE PROCEDURE `sp_laporan_arus_kas`(IN p_tanggal_awal DATE,
    IN p_tanggal_akhir DATE)
BEGIN
    SELECT 
        'Operasional' as aktivitas,
        DATE_FORMAT(periode, '%M %Y') as bulan,
        FORMAT(COALESCE(kas_masuk, 0), 0, 'id_ID') as kas_masuk,
        FORMAT(COALESCE(kas_keluar, 0), 0, 'id_ID') as kas_keluar,
        FORMAT((COALESCE(kas_masuk, 0) - COALESCE(kas_keluar, 0)), 0, 'id_ID') as arus_kas_bersih
    FROM (
        SELECT 
            DATE_FORMAT(tanggal, '%Y-%m-01') as periode,
            SUM(CASE WHEN jenis = 'masuk' THEN jumlah ELSE 0 END) as kas_masuk,
            SUM(CASE WHEN jenis = 'keluar' THEN jumlah ELSE 0 END) as kas_keluar
        FROM (
            -- Penjualan Barang (Kas Masuk)
            SELECT 
                bk.tanggal,
                'masuk' as jenis,
                SUM(bk.jumlah * COALESCE(bk.harga_jual, p.harga_jual)) as jumlah
            FROM barang_keluar bk
            JOIN produk p ON bk.id_produk = p.id_produk
            WHERE bk.tanggal BETWEEN p_tanggal_awal AND p_tanggal_akhir
            GROUP BY bk.tanggal
            
            UNION ALL
            
            -- Pembelian Barang (Kas Keluar)
            SELECT 
                bm.tanggal,
                'keluar' as jenis,
                SUM(bm.jumlah * p.harga_beli) as jumlah
            FROM barang_masuk bm
            JOIN produk p ON bm.id_produk = p.id_produk
            WHERE bm.tanggal BETWEEN p_tanggal_awal AND p_tanggal_akhir
            GROUP BY bm.tanggal
            
            UNION ALL
            
            -- Retur Barang ke Supplier (Kas Masuk)
            SELECT 
                bkb.tanggal,
                'masuk' as jenis,
                SUM(bkb.jumlah * p.harga_beli) as jumlah
            FROM barang_kembali bkb
            JOIN produk p ON bkb.id_produk = p.id_produk
            WHERE bkb.tanggal BETWEEN p_tanggal_awal AND p_tanggal_akhir
            GROUP BY bkb.tanggal
        ) transaksi_kas
        GROUP BY DATE_FORMAT(tanggal, '%Y-%m-01')
    ) summary_bulanan
    ORDER BY periode;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
