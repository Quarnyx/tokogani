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

 Date: 13/07/2025 17:29:07
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
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang_keluar
-- ----------------------------
INSERT INTO `barang_keluar` VALUES (12, '2025-07-03', 22, 1, NULL, '2012-11-30 06:21:44', 1, NULL);
INSERT INTO `barang_keluar` VALUES (13, '2025-07-08', 7, 3, NULL, '2000-06-01 21:22:48', 1, NULL);
INSERT INTO `barang_keluar` VALUES (14, '2025-07-02', 15, 4, NULL, '2014-02-02 04:22:02', 4, NULL);
INSERT INTO `barang_keluar` VALUES (15, '2025-06-12', 20, 1, NULL, '2013-10-18 05:16:39', 1, NULL);
INSERT INTO `barang_keluar` VALUES (17, '2025-06-16', 21, 5, NULL, '2008-12-24 20:10:26', 1, NULL);
INSERT INTO `barang_keluar` VALUES (18, '2025-06-30', 18, 3, NULL, '2009-09-02 23:35:12', 1, NULL);
INSERT INTO `barang_keluar` VALUES (19, '2025-06-21', 10, 2, NULL, '2017-06-02 22:54:21', 4, NULL);
INSERT INTO `barang_keluar` VALUES (20, '2025-07-02', 13, 3, NULL, '2013-04-21 07:24:57', 1, NULL);
INSERT INTO `barang_keluar` VALUES (21, '2025-06-23', 12, 2, NULL, '2020-05-18 06:31:51', 4, NULL);
INSERT INTO `barang_keluar` VALUES (22, '2025-06-24', 9, 2, NULL, '2006-10-13 21:01:26', 4, NULL);
INSERT INTO `barang_keluar` VALUES (23, '2025-07-05', 9, 4, NULL, '2018-05-30 02:47:25', 4, NULL);
INSERT INTO `barang_keluar` VALUES (24, '2025-06-15', 13, 4, NULL, '2019-10-04 00:47:44', 1, NULL);
INSERT INTO `barang_keluar` VALUES (25, '2025-07-08', 8, 2, NULL, '2005-07-24 22:37:04', 4, NULL);
INSERT INTO `barang_keluar` VALUES (26, '2025-06-20', 15, 2, NULL, '2001-05-12 21:12:00', 4, NULL);
INSERT INTO `barang_keluar` VALUES (27, '2025-06-10', 23, 4, NULL, '2023-07-07 19:25:18', 1, NULL);
INSERT INTO `barang_keluar` VALUES (28, '2025-07-10', 14, 3, NULL, '2009-02-12 16:07:37', 4, NULL);
INSERT INTO `barang_keluar` VALUES (29, '2025-07-04', 21, 4, NULL, '2022-07-14 12:47:31', 4, NULL);
INSERT INTO `barang_keluar` VALUES (31, '2025-06-10', 11, 3, NULL, '2000-05-21 07:00:57', 1, NULL);
INSERT INTO `barang_keluar` VALUES (32, '2025-07-01', 8, 3, NULL, '2008-05-16 20:14:04', 1, NULL);
INSERT INTO `barang_keluar` VALUES (33, '2025-06-20', 18, 4, NULL, '2024-05-04 21:01:11', 4, NULL);
INSERT INTO `barang_keluar` VALUES (34, '2025-06-28', 10, 1, NULL, '2004-09-25 07:35:07', 1, NULL);
INSERT INTO `barang_keluar` VALUES (35, '2025-07-05', 19, 5, NULL, '2000-04-08 04:57:52', 4, NULL);
INSERT INTO `barang_keluar` VALUES (36, '2025-06-14', 20, 1, NULL, '2025-06-28 14:43:29', 1, NULL);
INSERT INTO `barang_keluar` VALUES (37, '2025-06-30', 24, 1, NULL, '2001-10-29 16:52:41', 1, NULL);
INSERT INTO `barang_keluar` VALUES (38, '2025-07-03', 12, 2, NULL, '2005-12-19 15:21:04', 4, NULL);
INSERT INTO `barang_keluar` VALUES (40, '2025-06-12', 23, 3, NULL, '2023-09-20 04:27:39', 4, NULL);
INSERT INTO `barang_keluar` VALUES (41, '2025-06-14', 19, 3, NULL, '2004-05-01 00:11:46', 4, NULL);
INSERT INTO `barang_keluar` VALUES (42, '2025-07-11', 21, 3, NULL, '2018-09-23 09:13:52', 4, NULL);
INSERT INTO `barang_keluar` VALUES (43, '2025-07-03', 8, 4, NULL, '2008-10-14 07:04:55', 4, NULL);
INSERT INTO `barang_keluar` VALUES (44, '2025-06-27', 21, 4, NULL, '2004-01-13 04:12:29', 1, NULL);
INSERT INTO `barang_keluar` VALUES (45, '2025-06-11', 7, 1, NULL, '2022-09-28 11:08:28', 4, NULL);
INSERT INTO `barang_keluar` VALUES (46, '2025-06-22', 15, 5, NULL, '2008-01-20 00:30:59', 4, NULL);
INSERT INTO `barang_keluar` VALUES (47, '2025-06-29', 18, 2, NULL, '2013-02-28 00:33:02', 4, NULL);
INSERT INTO `barang_keluar` VALUES (48, '2025-06-16', 25, 1, NULL, '2001-12-28 13:46:40', 1, NULL);
INSERT INTO `barang_keluar` VALUES (49, '2025-07-07', 7, 1, NULL, '2017-08-25 21:52:37', 1, NULL);
INSERT INTO `barang_keluar` VALUES (50, '2025-06-10', 25, 2, NULL, '2018-12-25 04:40:28', 1, NULL);
INSERT INTO `barang_keluar` VALUES (51, '2025-06-13', 21, 3, NULL, '2015-02-07 00:07:05', 1, NULL);
INSERT INTO `barang_keluar` VALUES (52, '2025-06-14', 24, 5, NULL, '2015-06-26 18:56:22', 4, NULL);
INSERT INTO `barang_keluar` VALUES (53, '2025-06-28', 17, 3, NULL, '2004-10-29 14:57:54', 4, NULL);
INSERT INTO `barang_keluar` VALUES (54, '2025-06-13', 19, 3, NULL, '2002-09-16 21:05:33', 1, NULL);
INSERT INTO `barang_keluar` VALUES (55, '2025-06-23', 19, 1, NULL, '2020-12-06 17:46:04', 1, NULL);
INSERT INTO `barang_keluar` VALUES (56, '2025-06-24', 13, 2, NULL, '2025-01-30 22:09:09', 4, NULL);
INSERT INTO `barang_keluar` VALUES (57, '2025-06-16', 11, 1, NULL, '2006-03-18 00:30:16', 1, NULL);
INSERT INTO `barang_keluar` VALUES (58, '2025-06-27', 15, 2, NULL, '2020-09-07 08:55:47', 1, NULL);
INSERT INTO `barang_keluar` VALUES (59, '2025-06-12', 24, 3, NULL, '2020-02-19 06:17:21', 1, NULL);
INSERT INTO `barang_keluar` VALUES (60, '2025-06-23', 8, 2, NULL, '2022-07-11 09:24:43', 4, NULL);
INSERT INTO `barang_keluar` VALUES (61, '2025-07-11', 22, 2, NULL, '2009-12-05 14:23:38', 1, NULL);
INSERT INTO `barang_keluar` VALUES (62, '2025-06-25', 18, 2, NULL, '2013-05-14 22:22:22', 1, NULL);
INSERT INTO `barang_keluar` VALUES (63, '2025-06-10', 23, 2, NULL, '2020-07-11 09:48:14', 1, NULL);
INSERT INTO `barang_keluar` VALUES (64, '2025-07-11', 25, 4, NULL, '2014-11-19 15:40:36', 1, NULL);
INSERT INTO `barang_keluar` VALUES (65, '2025-06-21', 13, 3, NULL, '2018-03-01 21:22:39', 4, NULL);
INSERT INTO `barang_keluar` VALUES (66, '2025-06-20', 20, 4, NULL, '2023-02-14 17:49:40', 4, NULL);
INSERT INTO `barang_keluar` VALUES (68, '2025-06-11', 17, 4, NULL, '2017-01-08 00:31:05', 4, NULL);
INSERT INTO `barang_keluar` VALUES (69, '2025-06-18', 16, 3, NULL, '2017-02-03 01:04:04', 4, NULL);
INSERT INTO `barang_keluar` VALUES (70, '2025-06-19', 25, 4, NULL, '2020-03-27 13:06:00', 4, NULL);
INSERT INTO `barang_keluar` VALUES (71, '2025-06-12', 16, 3, NULL, '2008-11-24 17:07:36', 1, NULL);
INSERT INTO `barang_keluar` VALUES (72, '2025-06-30', 24, 3, NULL, '2024-12-29 19:49:27', 4, NULL);
INSERT INTO `barang_keluar` VALUES (73, '2025-06-12', 12, 3, NULL, '2007-03-07 15:16:26', 4, NULL);
INSERT INTO `barang_keluar` VALUES (74, '2025-06-27', 16, 2, NULL, '2000-10-01 22:08:43', 4, NULL);
INSERT INTO `barang_keluar` VALUES (75, '2025-06-21', 10, 3, NULL, '2004-12-21 08:52:43', 4, NULL);
INSERT INTO `barang_keluar` VALUES (76, '2025-06-29', 11, 3, NULL, '2007-08-31 05:49:16', 1, NULL);
INSERT INTO `barang_keluar` VALUES (77, '2025-07-10', 19, 4, NULL, '2014-07-09 14:17:53', 1, NULL);
INSERT INTO `barang_keluar` VALUES (78, '2025-06-13', 16, 2, NULL, '2025-03-09 14:43:04', 4, NULL);
INSERT INTO `barang_keluar` VALUES (79, '2025-06-19', 9, 5, NULL, '2017-03-15 19:58:36', 4, NULL);
INSERT INTO `barang_keluar` VALUES (80, '2025-06-14', 17, 2, NULL, '2018-01-29 05:10:47', 4, NULL);
INSERT INTO `barang_keluar` VALUES (81, '2025-07-01', 11, 5, NULL, '2010-07-13 17:28:06', 4, NULL);
INSERT INTO `barang_keluar` VALUES (82, '2025-06-14', 9, 3, NULL, '2008-03-24 08:53:23', 1, NULL);
INSERT INTO `barang_keluar` VALUES (83, '2025-07-05', 19, 2, NULL, '2006-10-19 08:26:59', 4, NULL);
INSERT INTO `barang_keluar` VALUES (84, '2025-06-18', 20, 1, NULL, '2007-10-21 18:17:13', 4, NULL);
INSERT INTO `barang_keluar` VALUES (85, '2025-06-22', 23, 3, NULL, '2020-12-04 03:10:52', 4, NULL);
INSERT INTO `barang_keluar` VALUES (86, '2025-06-27', 24, 2, NULL, '2006-01-18 07:19:39', 1, NULL);
INSERT INTO `barang_keluar` VALUES (87, '2025-06-25', 17, 5, NULL, '2012-04-25 00:30:32', 4, NULL);
INSERT INTO `barang_keluar` VALUES (88, '2025-06-23', 18, 4, NULL, '2005-08-30 15:09:07', 4, NULL);
INSERT INTO `barang_keluar` VALUES (89, '2025-07-05', 11, 2, NULL, '2018-02-13 14:57:38', 1, NULL);
INSERT INTO `barang_keluar` VALUES (90, '2025-06-27', 8, 1, NULL, '2004-09-24 19:39:29', 4, NULL);
INSERT INTO `barang_keluar` VALUES (91, '2025-06-15', 21, 4, NULL, '2006-09-16 13:53:28', 1, NULL);
INSERT INTO `barang_keluar` VALUES (93, '2025-07-05', 19, 2, NULL, '2012-01-31 12:16:46', 4, NULL);
INSERT INTO `barang_keluar` VALUES (94, '2025-06-29', 9, 5, NULL, '2017-12-09 15:48:43', 1, NULL);
INSERT INTO `barang_keluar` VALUES (95, '2025-06-17', 12, 2, NULL, '2010-01-07 17:51:58', 1, NULL);
INSERT INTO `barang_keluar` VALUES (96, '2025-07-04', 20, 3, NULL, '2018-02-18 16:41:46', 1, NULL);
INSERT INTO `barang_keluar` VALUES (97, '2025-06-22', 13, 2, NULL, '2024-11-17 05:45:43', 4, NULL);
INSERT INTO `barang_keluar` VALUES (98, '2025-07-10', 24, 2, NULL, '2003-06-01 11:22:58', 4, NULL);
INSERT INTO `barang_keluar` VALUES (99, '2025-06-24', 12, 5, NULL, '2000-04-09 06:11:36', 1, NULL);
INSERT INTO `barang_keluar` VALUES (100, '2025-07-11', 11, 1, NULL, '2010-08-04 19:44:20', 1, NULL);
INSERT INTO `barang_keluar` VALUES (101, '2025-06-27', 16, 3, NULL, '2003-07-09 17:20:47', 1, NULL);
INSERT INTO `barang_keluar` VALUES (102, '2025-06-30', 13, 3, NULL, '2017-12-19 22:59:44', 4, NULL);
INSERT INTO `barang_keluar` VALUES (103, '2025-06-20', 19, 4, NULL, '2010-01-30 19:36:52', 1, NULL);
INSERT INTO `barang_keluar` VALUES (104, '2025-07-06', 17, 1, NULL, '2015-02-05 16:27:03', 4, NULL);
INSERT INTO `barang_keluar` VALUES (105, '2025-06-22', 20, 4, NULL, '2009-06-26 03:42:12', 1, NULL);
INSERT INTO `barang_keluar` VALUES (106, '2025-06-22', 25, 4, NULL, '2021-06-25 03:14:14', 1, NULL);
INSERT INTO `barang_keluar` VALUES (107, '2025-06-30', 19, 3, NULL, '2006-04-16 21:41:06', 1, NULL);
INSERT INTO `barang_keluar` VALUES (108, '2025-06-12', 24, 2, NULL, '2015-12-18 10:13:31', 4, NULL);
INSERT INTO `barang_keluar` VALUES (109, '2025-06-10', 15, 2, NULL, '2020-12-21 00:19:52', 4, NULL);
INSERT INTO `barang_keluar` VALUES (110, '2025-07-02', 23, 2, NULL, '2005-10-15 10:20:14', 4, NULL);
INSERT INTO `barang_keluar` VALUES (111, '2025-07-08', 16, 1, NULL, '2008-11-07 10:43:57', 4, NULL);

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
  PRIMARY KEY (`id_barang_kembali`) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  CONSTRAINT `barang_kembali_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_kembali_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id_barang_masuk`) USING BTREE,
  INDEX `id_produk`(`id_produk` ASC) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  INDEX `id_supplier`(`id_supplier` ASC) USING BTREE,
  CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `barang_masuk_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang_masuk
-- ----------------------------
INSERT INTO `barang_masuk` VALUES (8, '2025-06-02', 13, 24, NULL, 3, '2008-11-18 17:48:22', 4);
INSERT INTO `barang_masuk` VALUES (9, '2025-06-01', 22, 33, NULL, 2, '2001-12-09 11:19:48', 1);
INSERT INTO `barang_masuk` VALUES (10, '2025-06-02', 18, 34, NULL, 2, '2020-05-13 12:29:05', 1);
INSERT INTO `barang_masuk` VALUES (11, '2025-06-01', 14, 29, NULL, 2, '2012-03-08 11:45:20', 4);
INSERT INTO `barang_masuk` VALUES (12, '2025-06-02', 21, 46, NULL, 2, '2006-01-19 11:10:51', 1);
INSERT INTO `barang_masuk` VALUES (13, '2025-06-02', 23, 29, NULL, 2, '2020-05-15 10:19:50', 4);
INSERT INTO `barang_masuk` VALUES (14, '2025-06-02', 19, 26, NULL, 3, '2004-12-07 16:16:09', 1);
INSERT INTO `barang_masuk` VALUES (15, '2025-06-02', 11, 32, NULL, 2, '2024-08-30 12:32:29', 4);
INSERT INTO `barang_masuk` VALUES (16, '2025-06-01', 12, 22, NULL, 2, '2002-01-10 14:54:34', 1);
INSERT INTO `barang_masuk` VALUES (17, '2025-06-02', 9, 19, NULL, 3, '2019-05-15 11:55:38', 4);
INSERT INTO `barang_masuk` VALUES (18, '2025-06-01', 24, 46, NULL, 2, '2017-02-08 16:47:22', 1);
INSERT INTO `barang_masuk` VALUES (19, '2025-06-01', 17, 49, NULL, 2, '2015-08-05 13:48:42', 1);
INSERT INTO `barang_masuk` VALUES (20, '2025-06-01', 10, 14, NULL, 2, '2010-09-16 15:38:27', 4);
INSERT INTO `barang_masuk` VALUES (21, '2025-06-02', 20, 42, NULL, 2, '2005-12-09 14:46:56', 1);
INSERT INTO `barang_masuk` VALUES (22, '2025-06-02', 16, 16, NULL, 3, '2007-11-24 09:43:39', 4);
INSERT INTO `barang_masuk` VALUES (23, '2025-06-02', 7, 32, NULL, 2, '2015-01-19 10:49:24', 4);
INSERT INTO `barang_masuk` VALUES (24, '2025-06-01', 8, 49, NULL, 2, '2024-06-12 13:43:14', 1);
INSERT INTO `barang_masuk` VALUES (25, '2025-06-02', 15, 29, NULL, 3, '2003-03-10 16:04:09', 4);
INSERT INTO `barang_masuk` VALUES (26, '2025-06-02', 25, 25, NULL, 2, '2020-08-24 16:20:55', 4);

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('Admin','Gudang') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'Administrasi', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin');
INSERT INTO `pengguna` VALUES (4, 'Yanto', 'yanto', 'b5d8b455512443450de17c04c4ef3b36', 'Gudang');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of po_detail
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (7, 'No Drop Tinting', 'PRDK-001', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 50000.00, 65000.00);
INSERT INTO `produk` VALUES (8, 'No Drop 4 kg', 'PRDK-002', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 80000.00, 95000.00);
INSERT INTO `produk` VALUES (9, 'Decolith 5kg', 'PRDK-003', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 60000.00, 75000.00);
INSERT INTO `produk` VALUES (10, 'No Brand 1kg', 'PRDK-004', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 30000.00, 45000.00);
INSERT INTO `produk` VALUES (11, 'No Brand Acrylic Emulsion Paint', 'PRDK-005', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 40000.00, 55000.00);
INSERT INTO `produk` VALUES (12, 'Lippo Super Glass Synthetic Paint', 'PRDK-006', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 70000.00, 85000.00);
INSERT INTO `produk` VALUES (13, 'Pillar Emulsion Wall Paint', 'PRDK-007', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 65000.00, 80000.00);
INSERT INTO `produk` VALUES (14, 'Pillar Interior', 'PRDK-008', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 60000.00, 75000.00);
INSERT INTO `produk` VALUES (15, 'Lippo Alkaseal', 'PRDK-009', 'kg', 10, '5', '2025-07-13 17:15:15', '2025-07-13 17:15:15', 50000.00, 65000.00);
INSERT INTO `produk` VALUES (16, 'Nu Colour 25kg', 'PRDK-010', 'kg', 41, '20', '2025-07-13 17:15:15', '2025-07-13 17:27:37', 250000.00, 275000.00);
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (2, 'PT. Maju Jaya', 'Tangerang', '085682224', 10, 7);
INSERT INTO `supplier` VALUES (3, 'PT Roda Maju', 'Tangerang', '082525525252', 12, 7);

-- ----------------------------
-- View structure for v_detail_po
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_po`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_detail_po` AS select `po_detail`.`id_po_detail` AS `id_po_detail`,`po_detail`.`id_produk` AS `id_produk`,`po_detail`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`po_detail`.`no_po` AS `no_po`,`produk`.`harga_beli` AS `harga_beli` from (`po_detail` join `produk` on((`po_detail`.`id_produk` = `produk`.`id_produk`)));

-- ----------------------------
-- View structure for v_penerimaan_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_penerimaan_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penerimaan_barang` AS select `barang_masuk`.`id_barang_masuk` AS `id_barang_masuk`,`barang_masuk`.`tanggal` AS `tanggal`,`barang_masuk`.`id_produk` AS `id_produk`,`barang_masuk`.`jumlah` AS `jumlah`,`barang_masuk`.`no_surat_jalan` AS `no_surat_jalan`,`barang_masuk`.`id_supplier` AS `id_supplier`,`barang_masuk`.`created_at` AS `created_at`,`barang_masuk`.`id_pengguna` AS `id_pengguna`,`pengguna`.`nama_pengguna` AS `nama_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan` from (((`barang_masuk` join `pengguna` on((`barang_masuk`.`id_pengguna` = `pengguna`.`id_pengguna`))) join `produk` on((`barang_masuk`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_masuk`.`id_supplier` = `supplier`.`id_supplier`)));

-- ----------------------------
-- View structure for v_pengeluaran_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengeluaran_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengeluaran_barang` AS select `barang_keluar`.`id_barang_keluar` AS `id_barang_keluar`,`barang_keluar`.`tanggal` AS `tanggal`,`barang_keluar`.`id_produk` AS `id_produk`,`barang_keluar`.`jumlah` AS `jumlah`,`barang_keluar`.`keterangan` AS `keterangan`,`barang_keluar`.`created_at` AS `created_at`,`barang_keluar`.`id_pengguna` AS `id_pengguna`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna` from ((`barang_keluar` join `produk` on((`barang_keluar`.`id_produk` = `produk`.`id_produk`))) join `pengguna` on((`barang_keluar`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_pengembalian_barang
-- ----------------------------
DROP VIEW IF EXISTS `v_pengembalian_barang`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pengembalian_barang` AS select `barang_kembali`.`id_barang_kembali` AS `id_barang_kembali`,`barang_kembali`.`id_produk` AS `id_produk`,`barang_kembali`.`keterangan` AS `keterangan`,`barang_kembali`.`tanggal` AS `tanggal`,`barang_kembali`.`id_pengguna` AS `id_pengguna`,`barang_kembali`.`id_supplier` AS `id_supplier`,`barang_kembali`.`jumlah` AS `jumlah`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`supplier`.`nama_supplier` AS `nama_supplier`,`produk`.`satuan` AS `satuan`,`pengguna`.`nama_pengguna` AS `nama_pengguna` from (((`barang_kembali` join `produk` on((`barang_kembali`.`id_produk` = `produk`.`id_produk`))) join `supplier` on((`barang_kembali`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`barang_kembali`.`id_pengguna` = `pengguna`.`id_pengguna`)));

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
