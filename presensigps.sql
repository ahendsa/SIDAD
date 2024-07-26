/*
 Navicat Premium Data Transfer

 Source Server         : opendk1
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : presensigps

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 26/07/2024 19:20:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cabang
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang`  (
  `kode_cabang` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_cabang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `lokasi_cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `radius` smallint NULL DEFAULT NULL,
  PRIMARY KEY (`kode_cabang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES ('3205062014', 'SUKAMUKTI', '-7.157588188411854,107.94095885429822', 10);
INSERT INTO `cabang` VALUES ('3205062015', 'SUKARATU', '-7.156567649803912,107.94117305142032', 20);
INSERT INTO `cabang` VALUES ('3205062017', 'BAGENDIT', '-7.15624348994808,107.95114284723766', 50);

-- ----------------------------
-- Table structure for departemen
-- ----------------------------
DROP TABLE IF EXISTS `departemen`;
CREATE TABLE `departemen`  (
  `kode_dept` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_dept` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`kode_dept`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departemen
-- ----------------------------
INSERT INTO `departemen` VALUES ('320506', 'BANYURESMI');
INSERT INTO `departemen` VALUES ('320507', 'KADUNGORA');
INSERT INTO `departemen` VALUES ('320508', 'LELES');
INSERT INTO `departemen` VALUES ('320509', 'WANARAJA');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `nik` char(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_lenkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `jabatan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_dept` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `kode_cabang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('12345', 'Hendra Firdaus', 'Direktur IT', '0812204427990', '$2y$12$SsaAQbJXNZoYsqHxqw7dYe3c/vPkaAyEwDP5b9UwDoK4aGcLrPOoi', '12345.jpg', '320506', NULL, '3205062015');
INSERT INTO `karyawan` VALUES ('12346', 'Desi', 'Sekretaris', '121212', '$2y$12$kb7ZG5ADNPtn9kkP7/TOGeejrISxHPCbH5G7m1L2WLmZwB6UWOixO', '123456.jpg', '320506', NULL, '3205062014');
INSERT INTO `karyawan` VALUES ('12347', 'FAHRI', 'Sekretaris Desa', '1212121212', '$2y$12$MyOCN96IbSJ49OdbQpznlOAWiTliWj6sJZHmunw.O/I1BdRM5M8ki', '12347.jpg', '320506', NULL, '3205062014');

-- ----------------------------
-- Table structure for konfigurasi_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi_lokasi`;
CREATE TABLE `konfigurasi_lokasi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `lokasi_kantor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `radius` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi_lokasi
-- ----------------------------
INSERT INTO `konfigurasi_lokasi` VALUES (1, '-7.151291,107.946144', 100);

-- ----------------------------
-- Table structure for presensi
-- ----------------------------
DROP TABLE IF EXISTS `presensi`;
CREATE TABLE `presensi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time NOT NULL,
  `jam_out` time NULL DEFAULT NULL,
  `foto_in` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `lokasi_in` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `lokasi_out` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of presensi
-- ----------------------------
INSERT INTO `presensi` VALUES (47, '12345', '2024-07-26', '01:40:14', '01:40:40', '12345-2024-07-26_in.png', '12345-2024-07-26_out.png', '-7.1565312,107.9410688', '-7.1565312,107.9410688');

-- ----------------------------
-- Table structure for tbl_izin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_izin`;
CREATE TABLE `tbl_izin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `tgl_izin` date NULL DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `status_upproved` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT '0' COMMENT '0 : Pending 1 : Disetujui 2 : Ditolak',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_izin
-- ----------------------------
INSERT INTO `tbl_izin` VALUES (8, '12345', '2024-07-16', '2', 'Sakit Perut', '0');
INSERT INTO `tbl_izin` VALUES (9, '12345', '2024-07-24', '1', 'kepala puyeng', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$12$2NkJmdIMpXt66DnlnAJKJ.FZj5ukt06VQaHBWJjzHaMW8Sp10lgoq', NULL, NULL, NULL);

-- ----------------------------
-- View structure for quer_laporan
-- ----------------------------
DROP VIEW IF EXISTS `quer_laporan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `quer_laporan` AS select `presensi`.`nik` AS `nik`,`karyawan`.`kode_cabang` AS `kode_cabang`,max(if((dayofmonth(`presensi`.`tgl_presensi`) = 22),concat(`presensi`.`jam_in`,'.',ifnull(`presensi`.`jam_out`,'00:00:00')),'')) AS `tgl_22` from (`presensi` join `karyawan` on((`presensi`.`nik` = `karyawan`.`nik`))) where ((month(`presensi`.`tgl_presensi`) = 7) and (year(`presensi`.`tgl_presensi`) = 2024)) group by `presensi`.`nik`,`karyawan`.`kode_cabang`;

SET FOREIGN_KEY_CHECKS = 1;
