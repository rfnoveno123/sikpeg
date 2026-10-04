/*
 Navicat Premium Dump SQL

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : sikpeg

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 04/10/2026 11:13:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `data_keluarga`;
CREATE TABLE `data_keluarga`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tunjangan` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_keluarga_pegawai_id_foreign`(`pegawai_id` ASC) USING BTREE,
  CONSTRAINT `data_keluarga_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_keluarga
-- ----------------------------

-- ----------------------------
-- Table structure for dokumen_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_pegawai`;
CREATE TABLE `dokumen_pegawai`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `jenis_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `dokumen_pegawai_pegawai_id_foreign`(`pegawai_id` ASC) USING BTREE,
  CONSTRAINT `dokumen_pegawai_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen_pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for golongan
-- ----------------------------
DROP TABLE IF EXISTS `golongan`;
CREATE TABLE `golongan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of golongan
-- ----------------------------
INSERT INTO `golongan` VALUES (1, 'IV/c', 'Pembina Utama Muda', NULL, NULL);
INSERT INTO `golongan` VALUES (2, 'IV/b', 'Pembina Tingkat I', NULL, NULL);
INSERT INTO `golongan` VALUES (3, 'IV/a', 'Pembina', NULL, NULL);
INSERT INTO `golongan` VALUES (4, 'III/d', 'Penata Tingkat I', NULL, NULL);
INSERT INTO `golongan` VALUES (5, 'III/c', 'Penata', NULL, NULL);
INSERT INTO `golongan` VALUES (6, 'III/b', 'Penata Muda Tingkat I', NULL, NULL);
INSERT INTO `golongan` VALUES (7, 'III/a', 'Penata Muda', NULL, NULL);
INSERT INTO `golongan` VALUES (8, 'II/c', 'Pengatur', NULL, NULL);

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eselon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'Kepala Dinas', 'Struktural', 'II.b', NULL, NULL);
INSERT INTO `jabatan` VALUES (2, 'Sekretaris Dinas', 'Struktural', 'III.a', NULL, NULL);
INSERT INTO `jabatan` VALUES (3, 'Kepala Bidang', 'Struktural', 'III.b', NULL, NULL);
INSERT INTO `jabatan` VALUES (4, 'Analis Kebijakan Ahli Muda', 'Fungsional', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (5, 'Pranata Komputer Ahli Pertama', 'Fungsional', NULL, NULL, NULL);
INSERT INTO `jabatan` VALUES (6, 'Pengadministrasi Umum', 'Pelaksana', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2026_10_04_023319_create_sikpeg_tables', 1);
INSERT INTO `migrations` VALUES (2, '2026_10_04_035508_add_username_to_users_table', 2);
INSERT INTO `migrations` VALUES (3, '2026_10_04_035920_drop_unused_columns_from_users_table', 3);

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar_depan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gelar_belakang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `golongan_darah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `no_ponsel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_kedinasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_pribadi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kontak_darurat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_pegawai_id` bigint UNSIGNED NULL DEFAULT NULL,
  `no_karpeg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_taspen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `pegawai_nip_unique`(`nip` ASC) USING BTREE,
  UNIQUE INDEX `pegawai_nik_unique`(`nik` ASC) USING BTREE,
  INDEX `pegawai_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `pegawai_status_pegawai_id_foreign`(`status_pegawai_id` ASC) USING BTREE,
  CONSTRAINT `pegawai_status_pegawai_id_foreign` FOREIGN KEY (`status_pegawai_id`) REFERENCES `status_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (1, NULL, '19801221 201408 2 005', '5102042401088609', 'Ratna Tiara Nurdiyanti S.Gz', NULL, NULL, 'Samarinda', '1980-12-21', 'P', 'Konghucu', 'Kawin', 'AB', 'Jr. M.T. Haryono No. 112, Pontianak 50742, Kaltim', '0375 3408 6931', 'gilang.nainggolan@pemda.go.id', 'rahayu.mansur@prastuti.my.id', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (2, NULL, '19820109 201008 2 006', '1105810107026975', 'Diah Farida', 'Dr.', 'S.E.', 'Palangka Raya', '1982-01-09', 'P', 'Buddha', 'Cerai Mati', 'B', 'Kpg. Bah Jaya No. 205, Tanjung Pinang 32800, Sultra', '(+62) 260 5717 361', 'kmahendra@pemda.go.id', 'olivia96@padmasari.or.id', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (3, NULL, '19870305 201907 1 004', '3329295211088874', 'Dono Budiyanto', 'Drs.', NULL, 'Pagar Alam', '1987-03-05', 'L', 'Islam', 'Kawin', 'O', 'Kpg. Baing No. 475, Solok 99021, Lampung', '0900 6317 583', 'rina20@pemda.go.id', 'dinda.saptono@yuliarti.biz.id', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (4, NULL, '19990701 201104 2 006', '1813534301080714', 'Fitriani Jane Fujiati', 'Ir.', 'M.T.', 'Sabang', '1999-07-01', 'P', 'Islam', 'Kawin', 'A', 'Dk. Lembong No. 268, Medan 24009, Sultra', '(+62) 767 9464 5527', 'maryanto40@pemda.go.id', 'sirait.saadat@jailani.ac.id', NULL, 3, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (5, NULL, '19850616 202012 2 008', '3325862002163605', 'Intan Hasanah', NULL, 'S.E.', 'Palangka Raya', '1985-06-16', 'P', 'Katolik', 'Cerai Hidup', NULL, 'Kpg. Bakti No. 990, Administrasi Jakarta Barat 69973, Sumut', '(+62) 747 2585 3843', 'bambang47@pemda.go.id', 'ana.rahayu@pradipta.my.id', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (6, NULL, '19880208 200207 1 008', '7471331007174867', 'Pangestu Paiman Prasasta', 'Dr.', 'S.H.', 'Metro', '1988-02-08', 'L', 'Buddha', 'Kawin', 'AB', 'Gg. Asia Afrika No. 458, Lhokseumawe 41405, DIY', '0447 8343 9370', 'hamima.winarsih@pemda.go.id', 'zalindra.suryono@yahoo.com', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (7, NULL, '19891230 202307 2 006', '1803464804185894', 'Lala Lalita Uyainah', NULL, 'S.E.', 'Samarinda', '1989-12-30', 'P', 'Hindu', 'Kawin', NULL, 'Jr. Suryo No. 444, Gunungsitoli 16398, Riau', '(+62) 678 5481 966', 'jarwa14@pemda.go.id', 'nasim87@gmail.com', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (8, NULL, '19850223 201206 2 001', '1702342806009672', 'Latika Pudjiastuti', 'Drs.', 'S.E.', 'Malang', '1985-02-23', 'P', 'Katolik', 'Belum Kawin', 'O', 'Ds. Bahagia No. 675, Tanjung Pinang 21652, Kaltim', '(+62) 341 3244 9505', 'nova.puspita@pemda.go.id', 'ewaskita@yahoo.com', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (9, NULL, '20010523 200411 1 002', '3529880611124037', 'Artawan Natsir', 'Drs.', 'S.Kom', 'Bitung', '2001-05-23', 'L', 'Kristen', 'Cerai Hidup', 'AB', 'Ki. Tangkuban Perahu No. 345, Bontang 53513, Riau', '(+62) 684 5005 646', 'gutama@pemda.go.id', 'sabrina06@situmorang.ac.id', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (10, NULL, '19770809 200208 2 006', '7313991312984771', 'Cici Maryati', 'Dr.', 'S.Kom', 'Metro', '1977-08-09', 'P', 'Katolik', 'Cerai Mati', 'AB', 'Ds. Baan No. 777, Binjai 85079, NTB', '(+62) 585 9480 3063', 'hhalimah@pemda.go.id', 'irawan.luis@kurniawan.ac.id', NULL, 1, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (11, NULL, '19790430 202008 1 001', '5312090408265545', 'Gatra Hutasoit', 'Ir.', NULL, 'Pangkal Pinang', '1979-04-30', 'L', 'Katolik', 'Cerai Mati', 'AB', 'Psr. Rajawali No. 564, Palangka Raya 74586, Sultra', '0787 7193 261', 'pastuti@pemda.go.id', 'yprakasa@lailasari.asia', NULL, 3, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (12, NULL, '19770304 201312 1 006', '7403445112102963', 'Rendy Waluyo S.I.Kom', 'Ir.', 'M.Si', 'Balikpapan', '1977-03-04', 'L', 'Konghucu', 'Kawin', 'O', 'Kpg. Ters. Jakarta No. 874, Sawahlunto 91060, NTT', '0319 3314 211', 'manah.laksmiwati@pemda.go.id', 'nyana37@nugroho.com', NULL, 3, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (13, NULL, '19991014 202107 1 007', '1501401303151851', 'Perkasa Hidayat', NULL, NULL, 'Batu', '1999-10-14', 'L', 'Kristen', 'Kawin', 'B', 'Dk. Bagonwoto  No. 958, Padangsidempuan 44391, Jateng', '0959 7076 801', 'elisa.firgantoro@pemda.go.id', 'restu.safitri@simanjuntak.web.id', NULL, 3, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (14, NULL, '19930628 201507 1 006', '3603721904985513', 'Jagapati Anggriawan S.I.Kom', NULL, 'S.H.', 'Gunungsitoli', '1993-06-28', 'L', 'Kristen', 'Cerai Hidup', 'AB', 'Gg. Kebangkitan Nasional No. 412, Blitar 79944, Kepri', '(+62) 511 4949 774', 'raden92@pemda.go.id', 'taswir57@nugroho.com', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (15, NULL, '19970326 200510 1 007', '6206872411201256', 'Danuja Gambira Waluyo S.Pt', NULL, 'S.E.', 'Cimahi', '1997-03-26', 'L', 'Kristen', 'Belum Kawin', 'AB', 'Kpg. Barat No. 205, Tasikmalaya 53208, Jatim', '0649 3636 135', 'kastuti@pemda.go.id', 'hassanah.tomi@astuti.com', NULL, 3, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (16, NULL, '190980365439273909', '7305450506187774', 'Maria Puspasari', 'Ir.', 'M.T.', 'Administrasi Jakarta Barat', '2000-05-29', 'P', 'Konghucu', 'Cerai Hidup', 'AB', 'Kpg. Jakarta No. 931, Dumai 85043, Jateng', '(+62) 303 4239 391', 'uzulkarnain@pemda.go.id', 'ridwan92@andriani.in', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (17, NULL, '197405199416676912', '1402091311159718', 'Dinda Amalia Suryatmi', NULL, 'S.Kom', 'Pekanbaru', '1995-12-06', 'P', 'Kristen', 'Cerai Hidup', 'O', 'Ds. Ahmad Dahlan No. 940, Pematangsiantar 69128, Sulteng', '(+62) 493 2696 0461', 'aryani.gaduh@pemda.go.id', 'mandasari.muni@usada.asia', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (18, NULL, '194816706942797336', '1373184106233618', 'Lintang Puspasari', 'Drs.', 'S.E.', 'Bandar Lampung', '1993-08-06', 'P', 'Islam', 'Cerai Hidup', NULL, 'Jln. Imam Bonjol No. 1, Madiun 75073, Papua', '(+62) 20 6249 189', 'lulut42@pemda.go.id', 'kasiyah48@gmail.co.id', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (19, NULL, '197177740489419342', '1275175903008203', 'Ilsa Icha Anggraini', NULL, NULL, 'Bitung', '1979-08-14', 'P', 'Konghucu', 'Cerai Hidup', 'A', 'Psr. Umalas No. 116, Semarang 10323, Aceh', '(+62) 561 6489 902', 'brajata@pemda.go.id', 'pradana.eva@gmail.co.id', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `pegawai` VALUES (20, NULL, '191248314273205528', '9124300803104545', 'Dasa Simanjuntak', 'Ir.', 'S.H.', 'Cilegon', '1978-02-28', 'L', 'Katolik', 'Cerai Mati', 'O', 'Gg. Jend. Sudirman No. 103, Bekasi 24378, DKI', '(+62) 818 9542 4892', 'widiastuti.fathonah@pemda.go.id', 'slamet47@yahoo.co.id', NULL, 2, NULL, NULL, '2026-10-04 03:03:07', '2026-10-04 03:03:07');

-- ----------------------------
-- Table structure for riwayat_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_jabatan`;
CREATE TABLE `riwayat_jabatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `unit_kerja_id` bigint UNSIGNED NOT NULL,
  `golongan_id` bigint UNSIGNED NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `riwayat_jabatan_pegawai_id_foreign`(`pegawai_id` ASC) USING BTREE,
  INDEX `riwayat_jabatan_jabatan_id_foreign`(`jabatan_id` ASC) USING BTREE,
  INDEX `riwayat_jabatan_unit_kerja_id_foreign`(`unit_kerja_id` ASC) USING BTREE,
  INDEX `riwayat_jabatan_golongan_id_foreign`(`golongan_id` ASC) USING BTREE,
  CONSTRAINT `riwayat_jabatan_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_jabatan_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_jabatan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `riwayat_jabatan_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerja` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of riwayat_jabatan
-- ----------------------------
INSERT INTO `riwayat_jabatan` VALUES (1, 1, 6, 3, 4, '2025-11-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (2, 2, 5, 4, 1, '2024-11-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (3, 3, 4, 2, 4, '2025-11-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (4, 4, 6, 5, 3, '2023-10-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (5, 5, 4, 3, 5, '2026-02-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (6, 6, 2, 3, 2, '2024-03-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (7, 7, 6, 2, 6, '2024-06-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (8, 8, 2, 5, 4, '2026-08-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (9, 9, 4, 2, 1, '2026-07-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (10, 10, 6, 5, 3, '2025-01-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (11, 11, 3, 5, 3, '2026-02-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (12, 12, 2, 2, 4, '2024-03-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (13, 13, 6, 4, 7, '2025-04-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (14, 14, 3, 2, 7, '2026-04-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (15, 15, 6, 5, 7, '2025-10-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (16, 16, 6, 4, 8, '2026-07-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (17, 17, 3, 1, 4, '2024-02-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (18, 18, 4, 4, 8, '2026-01-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (19, 19, 3, 3, 5, '2024-01-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');
INSERT INTO `riwayat_jabatan` VALUES (20, 20, 1, 1, 3, '2024-02-04', 1, '2026-10-04 03:03:07', '2026-10-04 03:03:07');

-- ----------------------------
-- Table structure for riwayat_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_pendidikan`;
CREATE TABLE `riwayat_pendidikan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `tingkat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_institusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `riwayat_pendidikan_pegawai_id_foreign`(`pegawai_id` ASC) USING BTREE,
  CONSTRAINT `riwayat_pendidikan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of riwayat_pendidikan
-- ----------------------------
INSERT INTO `riwayat_pendidikan` VALUES (1, 1, 'S1', 'Universitas Tangerang', 'Manajemen Informatika', '2013', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (2, 2, 'S1', 'Universitas Palu', 'Manajemen Informatika', '2009', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (3, 3, 'S1', 'Universitas Kotamobagu', 'Manajemen Informatika', '2018', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (4, 4, 'S1', 'Universitas Dumai', 'Manajemen Informatika', '2010', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (5, 5, 'S1', 'Universitas Batam', 'Manajemen Informatika', '2019', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (6, 6, 'S1', 'Universitas Cilegon', 'Manajemen Informatika', '2001', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (7, 7, 'S1', 'Universitas Ternate', 'Manajemen Informatika', '2022', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (8, 8, 'S1', 'Universitas Administrasi Jakarta Selatan', 'Manajemen Informatika', '2011', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (9, 9, 'S1', 'Universitas Pasuruan', 'Manajemen Informatika', '2003', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (10, 10, 'S1', 'Universitas Banjarmasin', 'Manajemen Informatika', '2001', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (11, 11, 'S1', 'Universitas Padang', 'Manajemen Informatika', '2019', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (12, 12, 'S1', 'Universitas Kediri', 'Manajemen Informatika', '2012', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (13, 13, 'S1', 'Universitas Gorontalo', 'Manajemen Informatika', '2020', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (14, 14, 'S1', 'Universitas Prabumulih', 'Manajemen Informatika', '2014', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (15, 15, 'S1', 'Universitas Kupang', 'Manajemen Informatika', '2004', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (16, 16, 'S1', 'Universitas Tanjung Pinang', 'Manajemen Informatika', '2019', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (17, 17, 'S1', 'Universitas Banjar', 'Manajemen Informatika', '2011', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (18, 18, 'S1', 'Universitas Lhokseumawe', 'Manajemen Informatika', '2013', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (19, 19, 'S1', 'Universitas Ambon', 'Manajemen Informatika', '2003', NULL, NULL);
INSERT INTO `riwayat_pendidikan` VALUES (20, 20, 'S1', 'Universitas Bekasi', 'Manajemen Informatika', '2011', NULL, NULL);

-- ----------------------------
-- Table structure for status_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `status_pegawai`;
CREATE TABLE `status_pegawai`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_pegawai
-- ----------------------------
INSERT INTO `status_pegawai` VALUES (1, 'PNS Aktif', NULL, NULL);
INSERT INTO `status_pegawai` VALUES (2, 'P3K Aktif', NULL, NULL);
INSERT INTO `status_pegawai` VALUES (3, 'CPNS', NULL, NULL);
INSERT INTO `status_pegawai` VALUES (4, 'Tugas Belajar', NULL, NULL);
INSERT INTO `status_pegawai` VALUES (5, 'Cuti Diluar Tanggungan Negara', NULL, NULL);

-- ----------------------------
-- Table structure for unit_kerja
-- ----------------------------
DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE `unit_kerja`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit_kerja
-- ----------------------------
INSERT INTO `unit_kerja` VALUES (1, 'Sekretariat Daerah', 'SETDA', NULL, NULL, NULL);
INSERT INTO `unit_kerja` VALUES (2, 'Dinas Kesehatan', 'DINKES', NULL, NULL, NULL);
INSERT INTO `unit_kerja` VALUES (3, 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', NULL, NULL, NULL);
INSERT INTO `unit_kerja` VALUES (4, 'Dinas Pendidikan', 'DISDIK', NULL, NULL, NULL);
INSERT INTO `unit_kerja` VALUES (5, 'Inspektorat Daerah', 'INSPEKTORAT', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', NULL, '$2y$12$4QIpEtEtVwJ4WeAROQvkQulbUy1QQq5zV3z4h2u0WjOvArh1atFOq', NULL, '2026-10-04 03:55:57', '2026-10-04 03:55:57');

SET FOREIGN_KEY_CHECKS = 1;
