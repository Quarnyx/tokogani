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

 Date: 30/07/2025 15:21:38
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
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pengguna` int NOT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_keluar`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_keluar_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_keluar
-- ----------------------------

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
  PRIMARY KEY (`id_barang_kembali`) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_kembali_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_kembali
-- ----------------------------
INSERT INTO `barang_kembali` VALUES (15, 7, 'bbv', '2025-07-30', 1, 2, 1, 'PO-001');
INSERT INTO `barang_kembali` VALUES (16, 8, 'bbv', '2025-07-30', 1, 2, 1, 'PO-001');

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
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_masuk
-- ----------------------------
INSERT INTO `barang_masuk` VALUES (35, '2025-05-01', 7, 2, 'AA--12123', 2, '2025-07-28 15:22:14', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (36, '2025-05-01', 8, 3, 'AA--12123', 2, '2025-07-28 15:22:15', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (37, '2025-05-01', 7, 100, 'BB-123', 2, '2025-07-30 15:11:56', 1, 'PO-002');
INSERT INTO `barang_masuk` VALUES (38, '2025-05-01', 9, 100, 'BB-123', 2, '2025-07-30 15:11:56', 1, 'PO-002');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of po_detail
-- ----------------------------
INSERT INTO `po_detail` VALUES (7, 'PO-001', 7, 2);
INSERT INTO `po_detail` VALUES (8, 'PO-001', 8, 3);
INSERT INTO `po_detail` VALUES (9, 'PO-002', 7, 100);
INSERT INTO `po_detail` VALUES (10, 'PO-002', 9, 100);

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
  `minimum_stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga_beli` decimal(15, 2) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (7, 'No Drop Tinting', 'PRDK-001', 'kg', 201, '63', '2025-07-13 17:15:15', '2025-07-28 20:47:52', 50000.00, 65000.00);
INSERT INTO `produk` VALUES (8, 'No Drop 4 kg', 'PRDK-002', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 80000.00, 95000.00);
INSERT INTO `produk` VALUES (9, 'Decolith 5kg', 'PRDK-003', 'kg', 19, '32', '2025-07-13 17:15:15', '2025-07-28 09:29:28', 60000.00, 75000.00);
INSERT INTO `produk` VALUES (10, 'No Brand 1kg', 'PRDK-004', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 30000.00, 45000.00);
INSERT INTO `produk` VALUES (11, 'No Brand Acrylic Emulsion Paint', 'PRDK-005', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 40000.00, 55000.00);
INSERT INTO `produk` VALUES (12, 'Lippo Super Glass Synthetic Paint', 'PRDK-006', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 70000.00, 85000.00);
INSERT INTO `produk` VALUES (13, 'Pillar Emulsion Wall Paint', 'PRDK-007', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 65000.00, 80000.00);
INSERT INTO `produk` VALUES (14, 'Pillar Interior', 'PRDK-008', 'kg', 64, '56', '2025-07-13 17:15:15', '2025-07-28 20:49:09', 60000.00, 75000.00);
INSERT INTO `produk` VALUES (15, 'Lippo Alkaseal', 'PRDK-009', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 50000.00, 65000.00);
INSERT INTO `produk` VALUES (16, 'Nu Colour 25kg', 'PRDK-010', 'kg', 3, '7', '2025-07-13 17:15:15', '2025-07-28 20:48:40', 250000.00, 275000.00);
INSERT INTO `produk` VALUES (17, 'Nu Colour Exterior', 'PRDK-011', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 240000.00, 265000.00);
INSERT INTO `produk` VALUES (18, 'Vinotex 5kg', 'PRDK-012', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 65000.00, 80000.00);
INSERT INTO `produk` VALUES (19, 'Avitex 1kg', 'PRDK-013', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 30000.00, 45000.00);
INSERT INTO `produk` VALUES (20, 'Nippon Flaww Less', 'PRDK-014', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 80000.00, 95000.00);
INSERT INTO `produk` VALUES (21, 'Nippon Satin Glow', 'PRDK-015', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 85000.00, 100000.00);
INSERT INTO `produk` VALUES (22, 'Nippon Satin', 'PRDK-016', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 80000.00, 95000.00);
INSERT INTO `produk` VALUES (23, 'Nippon Paint Vinilex', 'PRDK-017', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 90000.00, 110000.00);
INSERT INTO `produk` VALUES (24, 'Nippon Kimex', 'PRDK-018', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 85000.00, 100000.00);
INSERT INTO `produk` VALUES (25, 'Dulux Catylac Eksterior', 'PRDK-019', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 95000.00, 115000.00);

-- ----------------------------
-- Table structure for purchase_order
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE `purchase_order`  (
  `id_purchase_order` int NOT NULL AUTO_INCREMENT,
  `no_po` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_supplier` int NOT NULL,
  `status` enum('Dipesan','Diterima') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` int NOT NULL,
  PRIMARY KEY (`id_purchase_order`) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `purchase_order_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------
INSERT INTO `purchase_order` VALUES (4, 'PO-001', '2025-07-28', 2, 'Diterima', 1);
INSERT INTO `purchase_order` VALUES (5, 'PO-002', '2025-07-28', 2, 'Diterima', 1);

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
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (2, 'PT. Maju Jaya', 'Tangerang', '085682224', 10, 7);
INSERT INTO `supplier` VALUES (3, 'PT Roda Maju', 'Tangerang', '082525525252', 12, 7);

-- ----------------------------
-- View structure for v_detail_po
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_po`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_detail_po` AS select `po_detail`.`id_po_detail` AS `id_po_detail`,`po_detail`.`id_produk` AS `id_produk`,`po_detail`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`po_detail`.`no_po` AS `no_po`,`produk`.`harga_beli` AS `harga_beli`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan` from (`po_detail` join `produk` on((`po_detail`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_penerimaan_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_penerimaan_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penerimaan_barang` AS select `barang_masuk`.`id_barang_masuk` AS `id_barang_masuk`,`barang_masuk`.`tanggal` AS `tanggal`,`barang_masuk`.`id_produk` AS `id_produk`,`barang_masuk`.`jumlah` AS `jumlah`,`barang_masuk`.`no_surat_jalan` AS `no_surat_jalan`,`barang_masuk`.`id_supplier` AS `id_supplier`,`barang_masuk`.`created_at` AS `created_at`,`barang_masuk`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan`,`barang_masuk`.`no_po` AS `no_po` from (((`barang_masuk` join `pengguna` on((`barang_masuk`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `produk` on((`barang_masuk`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_masuk`.`id_supplier` = `supplier`.`id_supplier`)));

-- ----------------------------
-- View structure for v_pengeluaran_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengeluaran_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengeluaran_barang` AS select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`barang_keluar`.`tanggal` AS `tanggal`,`barang_keluar`.`id_produk` AS `id_produk`,`barang_keluar`.`jumlah` AS `jumlah`,`barang_keluar`.`keterangan` AS `keterangan`,`barang_keluar`.`created_at` AS `created_at`,`barang_keluar`.`id_pengguna` AS `id_pengguna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna` from ((`barang_keluar` join `produk` on((`barang_keluar`.`id_produk` = `produk`.`id_produk`))) join `pengguna` on((`barang_keluar`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_pengembalian_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengembalian_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengembalian_barang` AS select `barang_kembali`.`id_barang_kembali` AS `id_barang_kembali`,`barang_kembali`.`id_produk` AS `id_produk`,`barang_kembali`.`keterangan` AS `keterangan`,`barang_kembali`.`tanggal` AS `tanggal`,`barang_kembali`.`id_pengguna` AS `id_pengguna`,`barang_kembali`.`id_supplier` AS `id_supplier`,`barang_kembali`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`barang_kembali`.`no_po` AS `no_po` from (((`barang_kembali` join `produk` on((`barang_kembali`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_kembali`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`barang_kembali`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_permintaan_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_permintaan_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_permintaan_barang` AS select `permintaan_barang`.`id_permintaan_barang` AS `id_permintaan_barang`,`permintaan_barang`.`tanggal` AS `tanggal`,`permintaan_barang`.`id_produk` AS `id_produk`,`permintaan_barang`.`jumlah_diminta` AS `jumlah_diminta`,`permintaan_barang`.`status` AS `status`,`permintaan_barang`.`catatan` AS `catatan`,`permintaan_barang`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`satuan` AS `satuan` from ((`permintaan_barang` join `pengguna` on((`permintaan_barang`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `produk` on((`permintaan_barang`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_purchase_order
-- ----------------------------
DROP VIEW IF EXISTS `v_purchase_order`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_purchase_order` AS select `purchase_order`.`id_purchase_order` AS `id_purchase_order`,`purchase_order`.`no_po` AS `no_po`,`purchase_order`.`tanggal` AS `tanggal`,`purchase_order`.`id_supplier` AS `id_supplier`,`purchase_order`.`status` AS `status`,`purchase_order`.`id_pengguna` AS `id_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`pengguna`.`nama_pengguna` AS `nama_pengguna` from ((`purchase_order` join `supplier` on((`purchase_order`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`purchase_order`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_stok
-- ----------------------------
DROP VIEW IF EXISTS `v_stok`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stok` AS select `p`.`id_produk` AS `id_produk`,`p`.`kode_produk` AS `kode_produk`,`p`.`nama_produk` AS `nama_produk`,`p`.`satuan` AS `satuan`,ifnull(`m`.`total_masuk`,0) AS `total_masuk`,ifnull(`k`.`total_keluar`,0) AS `total_keluar`,ifnull(`bk`.`total_kembali`,0) AS `total_kembali`,((ifnull(`m`.`total_masuk`,0) - ifnull(`k`.`total_keluar`,0)) - ifnull(`bk`.`total_kembali`,0)) AS `stok_tersedia`,`p`.`buffer_stock` AS `buffer_stock`,`p`.`minimum_stock` AS `minimum_stock`,`p`.`harga_beli` AS `harga_beli` from (((`produk` `p` left join (select `barang_masuk`.`id_produk` AS `id_produk`,sum(`barang_masuk`.`jumlah`) AS `total_masuk` from `barang_masuk` group by `barang_masuk`.`id_produk`) `m` on((`p`.`id_produk` = `m`.`id_produk`))) left join (select `barang_keluar`.`id_produk` AS `id_produk`,sum(`barang_keluar`.`jumlah`) AS `total_keluar` from `barang_keluar` group by `barang_keluar`.`id_produk`) `k` on((`p`.`id_produk` = `k`.`id_produk`))) left join (select `barang_kembali`.`id_produk` AS `id_produk`,sum(`barang_kembali`.`jumlah`) AS `total_kembali` from `barang_kembali` group by `barang_kembali`.`id_produk`) `bk` on((`p`.`id_produk` = `bk`.`id_produk`)));

SET FOREIGN_KEY_CHECKS = 1;
