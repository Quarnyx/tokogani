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

 Date: 05/08/2025 08:29:26
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
) ENGINE = InnoDB AUTO_INCREMENT = 456 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_keluar
-- ----------------------------
INSERT INTO `barang_keluar` VALUES (266, '2025-07-18', 11, 5, 'Optimism is the one quality more                  ', '2025-07-25 14:38:28', 1, 'jMksSkXnOJ');
INSERT INTO `barang_keluar` VALUES (267, '2025-07-12', 21, 2, 'It wasn’t raining when Noah built the ark.', '2025-07-17 11:37:07', 1, 'HWIy6Z8XWB');
INSERT INTO `barang_keluar` VALUES (268, '2025-07-05', 13, 3, 'A man’s best friends are his ten fingers.       ', '2025-07-11 12:46:25', 1, 'rTeROV51gk');
INSERT INTO `barang_keluar` VALUES (269, '2025-07-01', 22, 4, 'The Navigation pane employs tree                  ', '2025-07-08 14:51:10', 1, 'kgTW7IABTh');
INSERT INTO `barang_keluar` VALUES (270, '2025-07-02', 19, 4, 'Navicat provides a wide range advanced            ', '2025-07-04 15:01:09', 1, 'FDiUiDpDf9');
INSERT INTO `barang_keluar` VALUES (271, '2025-07-04', 24, 3, 'Genius is an infinite capacity for taking pains.', '2025-07-22 06:33:42', 1, 'smTb8igd4I');
INSERT INTO `barang_keluar` VALUES (272, '2025-07-07', 10, 3, 'The Information Pane shows the                    ', '2025-07-28 09:00:25', 4, 'XOSfgU1BA7');
INSERT INTO `barang_keluar` VALUES (273, '2025-07-28', 14, 2, 'Navicat Data Modeler is a powerful                ', '2025-07-09 11:55:23', 4, 'yJx5L1q7kB');
INSERT INTO `barang_keluar` VALUES (274, '2025-07-12', 17, 3, 'If it scares you, it might be a good thing to try.', '2025-07-25 09:22:58', 1, 'hcXDIltkau');
INSERT INTO `barang_keluar` VALUES (275, '2025-07-01', 9, 4, 'Secure Sockets Layer(SSL) is a                    ', '2025-07-08 11:30:17', 1, 'ctnuapTqvk');
INSERT INTO `barang_keluar` VALUES (276, '2025-07-26', 15, 2, 'If you wait, all that happens is you get older.   ', '2025-07-31 20:34:55', 1, 'unRFnCNcQc');
INSERT INTO `barang_keluar` VALUES (277, '2025-07-10', 12, 4, 'HTTP Tunneling is a method for                    ', '2025-07-12 05:37:25', 4, 'jBuFercNVl');
INSERT INTO `barang_keluar` VALUES (278, '2025-07-18', 16, 4, 'Anyone who has ever made anything                 ', '2025-07-12 18:01:58', 1, 'G4zQwoe7TE');
INSERT INTO `barang_keluar` VALUES (279, '2025-07-31', 8, 4, 'Navicat Cloud could not connect                   ', '2025-07-21 17:22:08', 4, 'Z3mlJdTvbL');
INSERT INTO `barang_keluar` VALUES (280, '2025-07-28', 23, 2, 'To start working with your server                 ', '2025-07-26 18:44:15', 1, '1v8Ir8fwCX');
INSERT INTO `barang_keluar` VALUES (281, '2025-07-18', 20, 4, 'It can also manage cloud databases                ', '2025-07-12 13:52:33', 1, '3zHGitgvML');
INSERT INTO `barang_keluar` VALUES (282, '2025-07-07', 18, 4, 'The On Startup feature allows you                 ', '2025-07-24 05:49:17', 4, 'bvz7ui6aXQ');
INSERT INTO `barang_keluar` VALUES (283, '2025-07-30', 7, 5, 'Instead of wondering when your                    ', '2025-07-10 02:42:45', 1, 'v1PDI5HEJH');
INSERT INTO `barang_keluar` VALUES (284, '2025-07-11', 25, 3, 'In the middle of winter I at last                 ', '2025-07-29 19:39:01', 4, 'guQx3MQzGD');
INSERT INTO `barang_keluar` VALUES (285, '2025-07-14', 9, 4, 'Such sessions are also susceptible                ', '2025-07-20 09:34:59', 4, 'HdYZFg5EwO');
INSERT INTO `barang_keluar` VALUES (286, '2025-07-04', 25, 2, 'You will succeed because most people are lazy.', '2025-07-25 19:30:21', 4, 'nPFmP3Cw0I');
INSERT INTO `barang_keluar` VALUES (287, '2025-07-24', 21, 3, 'In the middle of winter I at last                 ', '2025-07-04 03:46:56', 1, 'l7K1bpCuzA');
INSERT INTO `barang_keluar` VALUES (288, '2025-07-05', 12, 4, 'I destroy my enemies when I make them my friends.', '2025-07-01 18:03:09', 1, 'xEQJ0YeLmI');
INSERT INTO `barang_keluar` VALUES (289, '2025-07-27', 23, 5, 'All the Navicat Cloud objects are                 ', '2025-07-04 13:26:20', 1, 'cH7fg5UBmN');
INSERT INTO `barang_keluar` VALUES (290, '2025-07-13', 8, 4, 'Navicat Monitor requires a repository             ', '2025-07-08 13:02:58', 4, 'ehF8biCsLl');
INSERT INTO `barang_keluar` VALUES (291, '2025-07-04', 22, 2, 'Always keep your eyes open. Keep                  ', '2025-07-29 15:35:01', 1, 'fLW8PZlcZM');
INSERT INTO `barang_keluar` VALUES (292, '2025-07-22', 11, 3, 'If you wait, all that happens is you get older.', '2025-07-16 01:39:00', 4, 'pix9PZvQQD');
INSERT INTO `barang_keluar` VALUES (293, '2025-07-12', 8, 4, 'In the Objects tab, you can use                   ', '2025-07-25 12:44:14', 1, 'x08euexmeo');
INSERT INTO `barang_keluar` VALUES (294, '2025-07-17', 17, 4, 'You cannot save people, you can just love them.', '2025-07-04 06:23:33', 4, 'YRjma1zeVv');
INSERT INTO `barang_keluar` VALUES (295, '2025-07-08', 19, 4, 'Navicat allows you to transfer                    ', '2025-07-27 07:47:34', 4, 'Q9fQmx2Gm1');
INSERT INTO `barang_keluar` VALUES (296, '2025-07-25', 7, 2, 'To start working with your server                 ', '2025-07-22 14:40:22', 4, 'B936QljLbU');
INSERT INTO `barang_keluar` VALUES (297, '2025-07-31', 8, 2, 'Champions keep playing until they get it right.', '2025-07-22 23:50:07', 1, 'H0voB9nLhr');
INSERT INTO `barang_keluar` VALUES (298, '2025-07-17', 24, 1, 'I may not have gone where I intended              ', '2025-07-03 22:24:11', 1, 'FXAsiwvqlh');
INSERT INTO `barang_keluar` VALUES (299, '2025-07-03', 14, 1, 'To get a secure connection, the                   ', '2025-07-02 06:24:52', 1, 'bU5hlD6OQI');
INSERT INTO `barang_keluar` VALUES (300, '2025-07-27', 22, 4, 'To start working with your server                 ', '2025-07-25 21:21:25', 1, 'aukGKTImae');
INSERT INTO `barang_keluar` VALUES (301, '2025-07-25', 14, 3, 'The Main Window consists of several               ', '2025-07-05 22:41:16', 1, '4A8LxoWE4P');
INSERT INTO `barang_keluar` VALUES (302, '2025-07-12', 24, 3, 'With its well-designed Graphical                  ', '2025-07-13 16:21:17', 1, 'yuCsmqIpDT');
INSERT INTO `barang_keluar` VALUES (303, '2025-07-17', 22, 1, 'Navicat provides a wide range advanced            ', '2025-07-27 14:33:04', 1, '0AvYYJI5m1');
INSERT INTO `barang_keluar` VALUES (304, '2025-07-07', 8, 4, 'To successfully establish a new                   ', '2025-07-14 17:16:00', 4, '55jNp05Qol');
INSERT INTO `barang_keluar` VALUES (305, '2025-07-15', 12, 3, 'Difficult circumstances serve as                  ', '2025-07-28 10:44:46', 4, '4wgNna5O1J');
INSERT INTO `barang_keluar` VALUES (306, '2025-07-09', 7, 3, 'A comfort zone is a beautiful place,              ', '2025-07-03 07:55:38', 1, 'bKqR562eXE');
INSERT INTO `barang_keluar` VALUES (307, '2025-07-20', 18, 4, 'I destroy my enemies when I make them my friends.', '2025-07-09 11:33:00', 4, 'fwx1n0YE7M');
INSERT INTO `barang_keluar` VALUES (308, '2025-07-10', 23, 4, 'In the middle of winter I at last                 ', '2025-07-13 00:41:52', 4, 'NozTH5MrLG');
INSERT INTO `barang_keluar` VALUES (309, '2025-07-17', 22, 2, 'All journeys have secret destinations             ', '2025-07-19 06:21:20', 4, 'K2XKkRdwtw');
INSERT INTO `barang_keluar` VALUES (310, '2025-07-06', 20, 3, 'After logged in the Navicat Cloud                 ', '2025-07-26 23:21:07', 1, 'h2OdUg8h7a');
INSERT INTO `barang_keluar` VALUES (311, '2025-07-03', 23, 1, 'Navicat allows you to transfer                    ', '2025-07-22 06:06:34', 1, '5VbnQCa57T');
INSERT INTO `barang_keluar` VALUES (312, '2025-07-27', 14, 3, 'Navicat Monitor can be installed                  ', '2025-07-05 08:06:17', 4, 'dxCvn2cAT4');
INSERT INTO `barang_keluar` VALUES (313, '2025-07-30', 13, 2, 'To open a query using an external                 ', '2025-07-09 08:19:54', 4, 'A6TSJNhajX');
INSERT INTO `barang_keluar` VALUES (314, '2025-07-22', 18, 2, 'Optimism is the one quality more                  ', '2025-07-13 05:32:12', 1, 'EkJtmHXHnX');
INSERT INTO `barang_keluar` VALUES (315, '2025-07-15', 14, 4, 'Creativity is intelligence having fun.', '2025-07-14 14:04:47', 4, 'iZFddiNwnx');
INSERT INTO `barang_keluar` VALUES (316, '2025-07-29', 14, 1, 'In the Objects tab, you can use                   ', '2025-07-16 18:13:35', 1, 'JUFkAYqk5B');
INSERT INTO `barang_keluar` VALUES (317, '2025-07-30', 9, 4, 'Anyone who has never made a mistake               ', '2025-07-28 18:53:19', 1, '2wfVgvS74A');
INSERT INTO `barang_keluar` VALUES (318, '2025-07-08', 19, 4, 'You cannot save people, you can just love them.', '2025-07-09 04:03:10', 4, '9HBPqImp3W');
INSERT INTO `barang_keluar` VALUES (319, '2025-07-27', 11, 3, 'After logged in the Navicat Cloud                 ', '2025-07-16 02:37:47', 1, 'JwnElDHH9k');
INSERT INTO `barang_keluar` VALUES (320, '2025-07-08', 22, 3, 'Navicat is a multi-connections                    ', '2025-07-11 20:59:40', 4, 'MAAunOp42h');
INSERT INTO `barang_keluar` VALUES (321, '2025-07-02', 19, 3, 'A comfort zone is a beautiful place,              ', '2025-07-28 01:41:28', 4, 'bbb7HBEV0R');
INSERT INTO `barang_keluar` VALUES (322, '2025-07-05', 25, 4, 'Navicat is a multi-connections                    ', '2025-07-04 09:04:05', 1, 'iuWmVlQOVZ');
INSERT INTO `barang_keluar` VALUES (323, '2025-07-03', 13, 3, 'Genius is an infinite capacity for taking pains.', '2025-07-09 23:02:20', 1, '1fzaJGPm2X');
INSERT INTO `barang_keluar` VALUES (324, '2025-07-17', 23, 2, 'Navicat provides powerful tools                   ', '2025-07-03 18:55:59', 1, 'Sc4EgpjWcL');
INSERT INTO `barang_keluar` VALUES (325, '2025-07-06', 12, 4, 'To get a secure connection, the                   ', '2025-07-30 21:25:59', 4, '3QIdZCCIRv');
INSERT INTO `barang_keluar` VALUES (326, '2025-07-05', 17, 4, 'I will greet this day with love in my heart.', '2025-07-25 20:22:57', 4, 'SiHhnynMNe');
INSERT INTO `barang_keluar` VALUES (327, '2025-07-18', 13, 4, 'Always keep your eyes open. Keep                  ', '2025-07-16 04:59:31', 4, 'euLnx8zsvz');
INSERT INTO `barang_keluar` VALUES (328, '2025-07-06', 10, 1, 'It collects process metrics such                  ', '2025-07-17 01:53:10', 4, 'wWNBGUiA71');
INSERT INTO `barang_keluar` VALUES (329, '2025-07-20', 16, 5, 'Anyone who has ever made anything                 ', '2025-07-08 05:04:24', 1, 'WgvcqlUcms');
INSERT INTO `barang_keluar` VALUES (330, '2025-07-24', 17, 4, 'Navicat provides powerful tools                   ', '2025-07-15 05:02:59', 4, 'FeZS5rSUDW');
INSERT INTO `barang_keluar` VALUES (331, '2025-07-01', 23, 4, 'You cannot save people, you can just love them.', '2025-07-12 06:09:07', 4, '76YMHncESD');
INSERT INTO `barang_keluar` VALUES (332, '2025-07-13', 17, 3, 'Anyone who has ever made anything                 ', '2025-07-15 15:14:28', 1, '3Aj7KUQADs');
INSERT INTO `barang_keluar` VALUES (333, '2025-07-15', 25, 3, 'If you wait, all that happens is you get older.   ', '2025-07-01 02:28:45', 4, 'FBh3gtmRYj');
INSERT INTO `barang_keluar` VALUES (334, '2025-07-26', 22, 4, 'Export Wizard allows you to export                ', '2025-07-28 08:17:08', 4, 'mlIpkxiCW2');
INSERT INTO `barang_keluar` VALUES (335, '2025-07-29', 20, 3, 'A man’s best friends are his ten fingers.', '2025-07-16 10:53:19', 1, 'Qd0Bo0vOju');
INSERT INTO `barang_keluar` VALUES (336, '2025-07-08', 23, 2, 'To clear or reload various internal               ', '2025-07-29 23:44:17', 4, '7y8ikUBQbL');
INSERT INTO `barang_keluar` VALUES (337, '2025-07-03', 16, 2, 'Navicat Data Modeler enables you                  ', '2025-07-22 11:41:32', 1, '7UOTuv5LY1');
INSERT INTO `barang_keluar` VALUES (338, '2025-07-21', 12, 4, 'Actually it is just in an idea                    ', '2025-07-17 21:17:05', 1, 'BD6f8tsz9y');
INSERT INTO `barang_keluar` VALUES (339, '2025-07-29', 22, 2, 'It provides strong authentication                 ', '2025-07-25 01:51:28', 4, 'mPK1aHhKx7');
INSERT INTO `barang_keluar` VALUES (340, '2025-07-18', 13, 3, 'Champions keep playing until they get it right.', '2025-07-11 14:18:01', 4, 'v0qmnK1gv5');
INSERT INTO `barang_keluar` VALUES (341, '2025-07-15', 12, 2, 'SQL Editor allows you to create                   ', '2025-07-21 03:40:25', 4, 'lWOkqLDnNa');
INSERT INTO `barang_keluar` VALUES (342, '2025-07-28', 23, 2, 'A man’s best friends are his ten fingers.', '2025-07-23 00:56:40', 4, 'wwOgMuMHwc');
INSERT INTO `barang_keluar` VALUES (343, '2025-07-30', 12, 4, 'To clear or reload various internal               ', '2025-07-10 20:03:11', 4, 'OtpN1HpJmz');
INSERT INTO `barang_keluar` VALUES (344, '2025-07-16', 17, 2, 'How we spend our days is, of course,              ', '2025-07-21 20:45:52', 1, 'yaTbmwlLwb');
INSERT INTO `barang_keluar` VALUES (345, '2025-07-25', 8, 2, 'If the Show objects under schema                  ', '2025-07-24 17:39:51', 4, 'FAMDVz72Jf');
INSERT INTO `barang_keluar` VALUES (346, '2025-07-18', 11, 3, 'The Navigation pane employs tree                  ', '2025-07-02 03:31:39', 1, 'aV4WQ1HHLr');
INSERT INTO `barang_keluar` VALUES (347, '2025-07-01', 25, 4, 'If it scares you, it might be a good thing to try.', '2025-07-20 16:50:59', 1, '8DKSiIEoWq');
INSERT INTO `barang_keluar` VALUES (348, '2025-07-17', 8, 2, 'It provides strong authentication                 ', '2025-07-30 11:21:43', 4, '9Ln9IDYujz');
INSERT INTO `barang_keluar` VALUES (349, '2025-07-28', 22, 3, 'It wasn’t raining when Noah built the ark.', '2025-07-15 07:21:41', 4, 'jDablynX8q');
INSERT INTO `barang_keluar` VALUES (350, '2025-07-24', 24, 1, 'In a Telnet session, all communications,          ', '2025-07-12 08:23:38', 1, 'GeaeBsKeCc');
INSERT INTO `barang_keluar` VALUES (351, '2025-07-25', 15, 5, 'After comparing data, the window                  ', '2025-07-26 14:55:04', 1, 'EUXcCK90Xj');
INSERT INTO `barang_keluar` VALUES (352, '2025-07-29', 16, 2, 'Navicat Cloud could not connect                   ', '2025-07-31 16:13:18', 1, '1kjno0WjW2');
INSERT INTO `barang_keluar` VALUES (353, '2025-07-25', 14, 5, 'A man’s best friends are his ten fingers.       ', '2025-07-09 15:08:36', 4, 'MB41cbvpnh');
INSERT INTO `barang_keluar` VALUES (354, '2025-07-20', 25, 5, 'A comfort zone is a beautiful place,              ', '2025-07-27 14:41:18', 1, 'X4qd6iS9iI');
INSERT INTO `barang_keluar` VALUES (355, '2025-07-05', 24, 4, 'The On Startup feature allows you                 ', '2025-07-01 20:51:32', 4, 'dt9GJflWI3');
INSERT INTO `barang_keluar` VALUES (356, '2025-07-12', 23, 5, 'If opportunity doesn’t knock, build a door.     ', '2025-07-25 07:07:31', 1, 'cb8uCPK4OF');
INSERT INTO `barang_keluar` VALUES (357, '2025-07-16', 16, 2, 'Secure SHell (SSH) is a program                   ', '2025-07-07 22:12:51', 4, 'PXJoMy1w4h');
INSERT INTO `barang_keluar` VALUES (358, '2025-07-08', 14, 5, 'Navicat provides powerful tools                   ', '2025-07-19 08:54:52', 1, 'St2u2sWsOh');
INSERT INTO `barang_keluar` VALUES (359, '2025-07-28', 23, 1, 'It can also manage cloud databases                ', '2025-07-16 20:08:06', 1, 'mwgFFpwxa2');
INSERT INTO `barang_keluar` VALUES (360, '2025-07-17', 20, 2, 'SQL Editor allows you to create                   ', '2025-07-03 23:14:50', 1, 'PD5VUCXWRU');
INSERT INTO `barang_keluar` VALUES (361, '2025-07-07', 22, 2, 'Navicat is a multi-connections                    ', '2025-07-04 17:02:28', 1, 'sGntEqt5CV');
INSERT INTO `barang_keluar` VALUES (362, '2025-07-19', 21, 4, 'Navicat is a multi-connections                    ', '2025-07-23 22:05:43', 1, 'wmh5xO13YY');
INSERT INTO `barang_keluar` VALUES (363, '2025-07-07', 17, 4, 'Anyone who has ever made anything                 ', '2025-07-23 08:11:29', 1, 'OVD57HaQEZ');
INSERT INTO `barang_keluar` VALUES (364, '2025-07-31', 21, 4, 'Navicat provides a wide range advanced            ', '2025-07-19 20:18:25', 1, 'DfPJavVmjm');
INSERT INTO `barang_keluar` VALUES (365, '2025-07-24', 20, 5, 'With its well-designed Graphical                  ', '2025-07-30 01:44:20', 1, 'SaLQ5t0I9s');
INSERT INTO `barang_keluar` VALUES (366, '2025-07-16', 10, 2, 'Champions keep playing until they get it right.', '2025-07-12 10:09:41', 4, 'SUMmy0ZNLL');
INSERT INTO `barang_keluar` VALUES (367, '2025-07-27', 25, 3, 'HTTP Tunneling is a method for                    ', '2025-07-17 10:02:56', 4, 'JDRdWaBLFm');
INSERT INTO `barang_keluar` VALUES (368, '2025-07-21', 16, 2, 'The reason why a great man is great               ', '2025-07-12 17:13:06', 1, 'iBXLVhz5Y3');
INSERT INTO `barang_keluar` VALUES (369, '2025-07-25', 21, 3, 'Navicat is a multi-connections                    ', '2025-07-07 21:45:19', 4, 'G1XwUeK8rc');
INSERT INTO `barang_keluar` VALUES (370, '2025-07-05', 24, 1, 'If it scares you, it might be a good thing to try.', '2025-07-09 10:35:59', 4, 'Dbyx4ycnmR');
INSERT INTO `barang_keluar` VALUES (371, '2025-07-31', 11, 1, 'I will greet this day with love in my heart.', '2025-07-03 21:37:21', 4, '681x5TMihP');
INSERT INTO `barang_keluar` VALUES (372, '2025-07-12', 7, 3, 'There is no way to happiness. Happiness           ', '2025-07-31 19:11:25', 1, '5o2bBzbaB9');
INSERT INTO `barang_keluar` VALUES (373, '2025-07-20', 18, 5, 'It can also manage cloud databases                ', '2025-07-17 01:05:19', 4, '15xPkwTEVW');
INSERT INTO `barang_keluar` VALUES (374, '2025-07-01', 9, 2, 'Instead of wondering when your                    ', '2025-07-19 13:17:03', 1, 'pkkAcDUVgr');
INSERT INTO `barang_keluar` VALUES (375, '2025-07-11', 20, 5, 'It wasn’t raining when Noah built the ark.', '2025-07-05 04:27:05', 4, 'XtoZH7b6oj');
INSERT INTO `barang_keluar` VALUES (376, '2025-07-06', 10, 1, 'HTTP Tunneling is a method for                    ', '2025-07-06 19:08:34', 4, 'AfPboUy7YD');
INSERT INTO `barang_keluar` VALUES (377, '2025-07-01', 25, 2, 'In a Telnet session, all communications,          ', '2025-07-04 04:37:55', 1, 'ZSx2L0Sc4I');
INSERT INTO `barang_keluar` VALUES (378, '2025-07-15', 15, 2, 'You can select any connections,                   ', '2025-07-12 00:22:46', 1, 'LjohP9m4JU');
INSERT INTO `barang_keluar` VALUES (379, '2025-07-11', 15, 3, 'It collects process metrics such                  ', '2025-07-18 14:25:58', 1, 'M3lUymAm8d');
INSERT INTO `barang_keluar` VALUES (380, '2025-07-18', 16, 4, 'Navicat provides powerful tools                   ', '2025-07-09 03:19:24', 4, 'NW87NuXPkE');
INSERT INTO `barang_keluar` VALUES (381, '2025-07-30', 13, 4, 'Navicat Cloud could not connect                   ', '2025-07-19 05:11:28', 1, 'VUeJgzR4vM');
INSERT INTO `barang_keluar` VALUES (382, '2025-07-29', 16, 2, 'Navicat allows you to transfer                    ', '2025-07-07 18:21:32', 1, 'IlBSIyKjjO');
INSERT INTO `barang_keluar` VALUES (383, '2025-07-21', 8, 4, 'You can select any connections,                   ', '2025-07-13 20:38:30', 4, 'X8kxS5v6lW');
INSERT INTO `barang_keluar` VALUES (384, '2025-07-30', 17, 3, 'Navicat authorizes you to make                    ', '2025-07-22 16:15:37', 1, 'aLYrsGQ70L');
INSERT INTO `barang_keluar` VALUES (385, '2025-07-02', 8, 1, 'Export Wizard allows you to export                ', '2025-07-11 06:39:00', 1, '3rgODuuaYb');
INSERT INTO `barang_keluar` VALUES (386, '2025-07-26', 21, 4, 'With its well-designed Graphical                  ', '2025-07-29 19:24:43', 1, 'ksZ7QUneAx');
INSERT INTO `barang_keluar` VALUES (387, '2025-07-07', 20, 2, 'If opportunity doesn’t knock, build a door.     ', '2025-07-27 18:03:12', 1, 'GGzLSRbLvO');
INSERT INTO `barang_keluar` VALUES (388, '2025-07-16', 8, 4, 'Navicat Cloud provides a cloud                    ', '2025-07-29 15:03:16', 4, 'UkKxlxPXIm');
INSERT INTO `barang_keluar` VALUES (389, '2025-07-04', 14, 4, 'SSH serves to prevent such vulnerabilities        ', '2025-07-19 01:17:20', 4, '5bJuX5w2xl');
INSERT INTO `barang_keluar` VALUES (390, '2025-07-29', 16, 4, 'A comfort zone is a beautiful place,              ', '2025-07-11 08:25:03', 4, 'shANdnQJIR');
INSERT INTO `barang_keluar` VALUES (391, '2025-07-03', 11, 3, 'In a Telnet session, all communications,          ', '2025-07-23 01:46:09', 4, '8t5aFOpuG3');
INSERT INTO `barang_keluar` VALUES (392, '2025-07-28', 25, 1, 'A comfort zone is a beautiful place,              ', '2025-07-06 17:15:45', 1, 'XwZ5nIxn33');
INSERT INTO `barang_keluar` VALUES (393, '2025-07-26', 13, 4, 'Navicat Monitor can be installed                  ', '2025-07-30 10:30:19', 1, 'DpCfEXHuxq');
INSERT INTO `barang_keluar` VALUES (394, '2025-07-16', 18, 2, 'Export Wizard allows you to export                ', '2025-07-29 16:21:46', 1, 'flEhWLyjoe');
INSERT INTO `barang_keluar` VALUES (395, '2025-07-20', 19, 1, 'You cannot save people, you can just love them.', '2025-07-23 02:02:27', 1, 'Kz9zR49zaK');
INSERT INTO `barang_keluar` VALUES (396, '2025-07-09', 25, 3, 'To start working with your server                 ', '2025-07-27 18:52:43', 4, 'VJedFlmxxu');
INSERT INTO `barang_keluar` VALUES (397, '2025-07-14', 15, 1, 'In a Telnet session, all communications,          ', '2025-07-13 17:09:47', 4, 'ZnqKVNDMbI');
INSERT INTO `barang_keluar` VALUES (398, '2025-07-01', 9, 2, 'Optimism is the one quality more                  ', '2025-07-18 22:16:44', 1, 'g3UODox8C9');
INSERT INTO `barang_keluar` VALUES (399, '2025-07-03', 15, 1, 'It can also manage cloud databases                ', '2025-07-28 04:16:13', 4, '6GAtNzBsq6');
INSERT INTO `barang_keluar` VALUES (400, '2025-07-09', 10, 2, 'Navicat 15 has added support for                  ', '2025-07-04 04:49:06', 1, '8FcsodkRXc');
INSERT INTO `barang_keluar` VALUES (401, '2025-07-08', 19, 3, 'Navicat allows you to transfer                    ', '2025-07-06 07:11:13', 4, 'OkdRI4hFtm');
INSERT INTO `barang_keluar` VALUES (402, '2025-07-24', 15, 3, 'You cannot save people, you can just love them.', '2025-07-08 22:26:43', 4, 'k9tSbCyy9W');
INSERT INTO `barang_keluar` VALUES (403, '2025-07-23', 7, 1, 'If the Show objects under schema                  ', '2025-07-12 01:52:30', 1, '5XP5c5UWlg');
INSERT INTO `barang_keluar` VALUES (404, '2025-07-21', 21, 1, 'To open a query using an external                 ', '2025-07-03 14:09:27', 1, '87ye2gOGdh');
INSERT INTO `barang_keluar` VALUES (405, '2025-07-09', 12, 2, 'Success consists of going from                    ', '2025-07-09 14:58:23', 4, 'zRiO6pLfIL');
INSERT INTO `barang_keluar` VALUES (406, '2025-07-15', 19, 3, 'What you get by achieving your                    ', '2025-07-16 12:56:38', 4, '6etcOpJuGw');
INSERT INTO `barang_keluar` VALUES (407, '2025-07-13', 13, 5, 'It provides strong authentication                 ', '2025-07-15 11:22:39', 4, 'o4urRquR4J');
INSERT INTO `barang_keluar` VALUES (408, '2025-07-17', 21, 2, 'The Navigation pane employs tree                  ', '2025-07-04 07:05:02', 1, 'cLXMQys7oi');
INSERT INTO `barang_keluar` VALUES (409, '2025-07-01', 20, 3, 'Creativity is intelligence having fun.', '2025-07-17 07:16:18', 1, 'jqki47XHWj');
INSERT INTO `barang_keluar` VALUES (410, '2025-07-28', 9, 4, 'How we spend our days is, of course,              ', '2025-07-12 06:37:53', 1, 'A0k2Kynjvj');
INSERT INTO `barang_keluar` VALUES (411, '2025-07-20', 16, 4, 'To start working with your server                 ', '2025-07-23 00:20:28', 4, 'mnxiKxB0S0');
INSERT INTO `barang_keluar` VALUES (412, '2025-07-14', 15, 1, 'To open a query using an external                 ', '2025-07-12 17:54:20', 1, 'DuEZkaig4Z');
INSERT INTO `barang_keluar` VALUES (413, '2025-07-28', 12, 5, 'Navicat provides powerful tools                   ', '2025-07-31 22:35:23', 4, 'PUQvXLqX15');
INSERT INTO `barang_keluar` VALUES (414, '2025-07-26', 18, 1, 'Monitored servers include MySQL,                  ', '2025-07-15 17:05:15', 4, 'i2jPblEYbX');
INSERT INTO `barang_keluar` VALUES (415, '2025-07-25', 20, 1, 'Actually it is just in an idea                    ', '2025-07-08 19:24:14', 1, '6j3QAWrmZu');
INSERT INTO `barang_keluar` VALUES (416, '2025-07-23', 11, 3, 'It collects process metrics such                  ', '2025-07-26 12:09:11', 4, 'FIOD3NtCru');
INSERT INTO `barang_keluar` VALUES (417, '2025-07-22', 12, 1, 'Optimism is the one quality more                  ', '2025-07-21 14:29:55', 4, '6iQDgoq8pO');
INSERT INTO `barang_keluar` VALUES (418, '2025-07-18', 14, 5, 'Navicat provides a wide range advanced            ', '2025-07-02 03:02:25', 4, 'QhfLJ61UFL');
INSERT INTO `barang_keluar` VALUES (419, '2025-07-03', 11, 4, 'If the Show objects under schema                  ', '2025-07-28 19:59:06', 1, 'kJPHn4hdqx');
INSERT INTO `barang_keluar` VALUES (420, '2025-07-29', 9, 3, 'There is no way to happiness. Happiness           ', '2025-07-28 03:06:14', 1, 'tzWrJT4DWy');
INSERT INTO `barang_keluar` VALUES (421, '2025-07-12', 20, 3, 'SSH serves to prevent such vulnerabilities        ', '2025-07-26 12:55:23', 4, 'hFO6ZNXEP2');
INSERT INTO `barang_keluar` VALUES (422, '2025-07-19', 7, 4, 'Genius is an infinite capacity for taking pains.', '2025-07-15 15:21:50', 1, 'wStEMFy49z');
INSERT INTO `barang_keluar` VALUES (423, '2025-07-27', 19, 4, 'Success consists of going from                    ', '2025-07-20 13:24:20', 4, '0h7KY9YI3J');
INSERT INTO `barang_keluar` VALUES (424, '2025-07-29', 17, 2, 'It wasn’t raining when Noah built the ark.', '2025-07-04 03:19:19', 1, 'lAW0Gk4kfL');
INSERT INTO `barang_keluar` VALUES (425, '2025-07-22', 11, 4, 'Success consists of going from                    ', '2025-07-14 11:01:29', 1, 'H34XCIxTlz');
INSERT INTO `barang_keluar` VALUES (426, '2025-07-26', 15, 2, 'What you get by achieving your                    ', '2025-07-08 04:11:27', 4, 'NknV7FFBbz');
INSERT INTO `barang_keluar` VALUES (427, '2025-07-10', 13, 4, 'The reason why a great man is great               ', '2025-07-26 03:55:39', 1, 'PBVzXSdvX6');
INSERT INTO `barang_keluar` VALUES (428, '2025-07-14', 11, 4, 'All journeys have secret destinations             ', '2025-07-08 14:34:43', 4, 'mO02V23emV');
INSERT INTO `barang_keluar` VALUES (429, '2025-07-03', 7, 5, 'Actually it is just in an idea                    ', '2025-07-30 10:00:08', 1, 'eY2ioH1DAa');
INSERT INTO `barang_keluar` VALUES (430, '2025-07-10', 15, 2, 'Navicat provides powerful tools                   ', '2025-07-18 15:28:54', 1, '4X9gMorPUN');
INSERT INTO `barang_keluar` VALUES (431, '2025-07-30', 18, 3, 'Difficult circumstances serve as                  ', '2025-07-30 11:39:27', 4, 'CIz851ohqa');
INSERT INTO `barang_keluar` VALUES (432, '2025-07-03', 24, 3, 'Navicat Cloud could not connect                   ', '2025-07-14 13:17:05', 1, 'FrvFvKn44v');
INSERT INTO `barang_keluar` VALUES (433, '2025-07-18', 7, 4, 'Navicat Cloud provides a cloud                    ', '2025-07-12 01:38:28', 4, 'F0TNqLnXpd');
INSERT INTO `barang_keluar` VALUES (434, '2025-07-16', 9, 3, 'Monitored servers include MySQL,                  ', '2025-07-24 23:55:18', 4, 'l1GAElfvp5');
INSERT INTO `barang_keluar` VALUES (435, '2025-07-29', 17, 3, 'Navicat provides powerful tools                   ', '2025-07-23 06:04:05', 1, 'LpPirVphcZ');
INSERT INTO `barang_keluar` VALUES (436, '2025-07-22', 19, 4, 'It is used while your ISPs do not                 ', '2025-07-11 03:05:14', 4, '2PzR1QfR1L');
INSERT INTO `barang_keluar` VALUES (437, '2025-07-10', 7, 1, 'The Synchronize to Database function              ', '2025-07-07 16:48:04', 1, '06t4qg9rHr');
INSERT INTO `barang_keluar` VALUES (438, '2025-07-14', 18, 4, 'There is no way to happiness. Happiness           ', '2025-07-08 22:04:46', 4, 'v2KYerRBGS');
INSERT INTO `barang_keluar` VALUES (439, '2025-07-06', 21, 2, 'You must be the change you wish                   ', '2025-07-29 23:58:20', 1, 'ZI2zVOb4cT');
INSERT INTO `barang_keluar` VALUES (440, '2025-07-24', 24, 3, 'The Information Pane shows the                    ', '2025-07-25 05:50:02', 1, 'jY90cvPKm1');
INSERT INTO `barang_keluar` VALUES (441, '2025-07-09', 10, 2, 'You will succeed because most people are lazy.', '2025-07-03 22:10:10', 1, 'spCtARXieq');
INSERT INTO `barang_keluar` VALUES (442, '2025-07-05', 7, 4, 'It is used while your ISPs do not                 ', '2025-07-28 02:21:13', 1, '7jPsJeM1pd');
INSERT INTO `barang_keluar` VALUES (443, '2025-07-31', 10, 3, 'Remember that failure is an event, not a person.', '2025-07-17 17:12:05', 1, 'NFHRdcQoYM');
INSERT INTO `barang_keluar` VALUES (444, '2025-07-18', 10, 1, 'The Navigation pane employs tree                  ', '2025-07-12 15:06:36', 4, 'rSw1upID3X');
INSERT INTO `barang_keluar` VALUES (445, '2025-07-04', 21, 2, 'Navicat provides a wide range advanced            ', '2025-07-08 06:09:05', 4, 'CykVxZYNWC');
INSERT INTO `barang_keluar` VALUES (446, '2025-07-30', 24, 2, 'A query is used to extract data                   ', '2025-07-27 19:07:34', 1, '98Lps9VI0K');
INSERT INTO `barang_keluar` VALUES (447, '2025-07-02', 24, 5, 'Navicat Monitor can be installed                  ', '2025-07-27 11:43:52', 4, 'sEOev2RuHR');
INSERT INTO `barang_keluar` VALUES (448, '2025-07-11', 18, 3, 'A man is not old until regrets                    ', '2025-07-08 12:09:53', 1, 'Pz7YkL50FI');
INSERT INTO `barang_keluar` VALUES (449, '2025-07-18', 13, 1, 'Secure SHell (SSH) is a program                   ', '2025-07-31 08:16:04', 4, '9HOyAn67Pm');
INSERT INTO `barang_keluar` VALUES (450, '2025-07-08', 18, 4, 'In the middle of winter I at last                 ', '2025-07-31 05:40:27', 1, 'jcWU0eWcPg');
INSERT INTO `barang_keluar` VALUES (451, '2025-07-07', 9, 4, 'Navicat allows you to transfer                    ', '2025-07-04 10:35:43', 4, 'OgRcnDUMGJ');
INSERT INTO `barang_keluar` VALUES (452, '2025-07-02', 19, 4, 'In the Objects tab, you can use                   ', '2025-07-20 05:36:26', 1, 'gFLU94Ysh9');
INSERT INTO `barang_keluar` VALUES (453, '2025-07-15', 9, 3, 'In the Objects tab, you can use                   ', '2025-07-08 18:22:30', 4, 'I8pklHsleE');
INSERT INTO `barang_keluar` VALUES (454, '2025-07-28', 10, 2, 'Typically, it is employed as an                   ', '2025-07-28 14:52:58', 4, 'lv9AkdTQB0');
INSERT INTO `barang_keluar` VALUES (455, '2025-07-12', 10, 5, 'I may not have gone where I intended              ', '2025-07-26 23:43:52', 1, 'eWmvj6D4CJ');

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_kembali
-- ----------------------------
INSERT INTO `barang_kembali` VALUES (17, 7, 'aaaddd', '2025-08-05', 1, 2, 10, 'PO-002', 37);
INSERT INTO `barang_kembali` VALUES (18, 9, 'aaaddd', '2025-08-05', 1, 2, 6, 'PO-002', 38);

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
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of barang_masuk
-- ----------------------------
INSERT INTO `barang_masuk` VALUES (35, '2025-05-01', 7, 2, 'AA--12123', 2, '2025-07-28 15:22:14', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (36, '2025-05-01', 8, 3, 'AA--12123', 2, '2025-07-28 15:22:15', 1, 'PO-001');
INSERT INTO `barang_masuk` VALUES (37, '2025-05-01', 7, 100, 'BB-123', 2, '2025-07-30 15:11:56', 1, 'PO-002');
INSERT INTO `barang_masuk` VALUES (38, '2025-05-01', 9, 100, 'BB-123', 2, '2025-07-30 15:11:56', 1, 'PO-002');
INSERT INTO `barang_masuk` VALUES (39, '2025-07-30', 10, 100, 'AD1', 3, '2025-07-30 15:22:23', 1, 'PO-003');
INSERT INTO `barang_masuk` VALUES (40, '2025-07-30', 11, 100, 'AD1', 3, '2025-07-30 15:22:23', 1, 'PO-003');

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of po_detail
-- ----------------------------
INSERT INTO `po_detail` VALUES (7, 'PO-001', 7, 2);
INSERT INTO `po_detail` VALUES (8, 'PO-001', 8, 3);
INSERT INTO `po_detail` VALUES (9, 'PO-002', 7, 100);
INSERT INTO `po_detail` VALUES (10, 'PO-002', 9, 100);
INSERT INTO `po_detail` VALUES (11, 'PO-003', 10, 100);
INSERT INTO `po_detail` VALUES (12, 'PO-003', 11, 100);

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
INSERT INTO `produk` VALUES (7, 'No Drop Tinting', 'PRDK-001', 'kg', 22, '28', '2025-07-13 17:15:15', '2025-07-31 07:05:43', 50000.00, 65000.00);
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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of purchase_order
-- ----------------------------
INSERT INTO `purchase_order` VALUES (4, 'PO-001', '2025-07-28', 2, 'Diterima', 1);
INSERT INTO `purchase_order` VALUES (5, 'PO-002', '2025-07-28', 2, 'Diterima', 1);
INSERT INTO `purchase_order` VALUES (6, 'PO-003', '2025-07-01', 3, 'Diterima', 1);

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
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_purchase_order` AS select `purchase_order`.`id_purchase_order` AS `id_purchase_order`,`purchase_order`.`no_po` AS `no_po`,`purchase_order`.`tanggal` AS `tanggal`,`purchase_order`.`id_supplier` AS `id_supplier`,`purchase_order`.`status` AS `status`,`purchase_order`.`id_pengguna` AS `id_pengguna`,`supplier`.`nama_supplier` AS `nama_supplier`,`pengguna`.`nama_pengguna` AS `nama_pengguna` from ((`purchase_order` join `supplier` on((`purchase_order`.`id_supplier` = `supplier`.`id_supplier`))) join `pengguna` on((`purchase_order`.`id_pengguna` = `pengguna`.`id_pengguna`)));

-- ----------------------------
-- View structure for v_stok
-- ----------------------------
DROP VIEW IF EXISTS `v_stok`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_stok` AS select `p`.`id_produk` AS `id_produk`,`p`.`kode_produk` AS `kode_produk`,`p`.`nama_produk` AS `nama_produk`,`p`.`satuan` AS `satuan`,ifnull(`m`.`total_masuk`,0) AS `total_masuk`,ifnull(`k`.`total_keluar`,0) AS `total_keluar`,ifnull(`bk`.`total_kembali`,0) AS `total_kembali`,((ifnull(`m`.`total_masuk`,0) - ifnull(`k`.`total_keluar`,0)) - ifnull(`bk`.`total_kembali`,0)) AS `stok_tersedia`,`p`.`buffer_stock` AS `buffer_stock`,`p`.`minimum_stock` AS `minimum_stock`,`p`.`harga_beli` AS `harga_beli` from (((`produk` `p` left join (select `barang_masuk`.`id_produk` AS `id_produk`,sum(`barang_masuk`.`jumlah`) AS `total_masuk` from `barang_masuk` group by `barang_masuk`.`id_produk`) `m` on((`p`.`id_produk` = `m`.`id_produk`))) left join (select `barang_keluar`.`id_produk` AS `id_produk`,sum(`barang_keluar`.`jumlah`) AS `total_keluar` from `barang_keluar` group by `barang_keluar`.`id_produk`) `k` on((`p`.`id_produk` = `k`.`id_produk`))) left join (select `barang_kembali`.`id_produk` AS `id_produk`,sum(`barang_kembali`.`jumlah`) AS `total_kembali` from `barang_kembali` group by `barang_kembali`.`id_produk`) `bk` on((`p`.`id_produk` = `bk`.`id_produk`)));

SET FOREIGN_KEY_CHECKS = 1;
