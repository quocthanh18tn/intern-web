-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2018 at 08:22 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyenviec`
--

CREATE TABLE IF NOT EXISTS `chuyenviec` (
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msgd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenviec`
--

INSERT INTO `chuyenviec` (`mskhungtu`, `msnv`, `msgd`, `date_start`, `date_finish`) VALUES
('11111111101101', '1017', '2', '2018-07-25 13:29:32', NULL),
('11111111101101', '1030', '2', '2018-07-25 13:29:54', NULL),
('11111111101101', '1037', '2', '2018-07-25 13:31:47', NULL),
('11111111101101', '1055', '2', '2018-07-25 13:34:49', NULL),
('11111111101101', '1017', '6', '2018-07-26 19:51:57', '2018-07-26 20:20:36'),
('11111111101101', '1024', '6', '2018-07-26 19:52:35', '2018-07-26 20:20:36'),
('11111111101101', '1055', '6', '2018-07-26 19:53:01', '2018-07-26 20:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `sdt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `msduan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `landat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`sdt`, `msduan`, `landat`) VALUES
('111', '111111', '01');

-- --------------------------------------------------------

--
-- Table structure for table `duan`
--

CREATE TABLE IF NOT EXISTS `duan` (
  `msduan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `duan`
--

INSERT INTO `duan` (`msduan`, `tenduan`) VALUES
('111111', 'bao');

-- --------------------------------------------------------

--
-- Table structure for table `giaidoan`
--

CREATE TABLE IF NOT EXISTS `giaidoan` (
  `msgd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tengd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaidoan`
--

INSERT INTO `giaidoan` (`msgd`, `tengd`) VALUES
('1', 'EA'),
('2', 'MC'),
('3', 'BUSBAR'),
('4', 'PC'),
('5', 'CW'),
('6', 'TW'),
('7', 'QC');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE IF NOT EXISTS `holiday` (
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `holiday_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`ten`, `holiday_date`) VALUES
('1-5', '2018-05-01'),
('30-4', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `mskh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencongty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`mskh`, `tenkh`, `tencongty`, `diachi`, `sdt`) VALUES
('000', 'thanh bao', 'hai nam', 'giang ninh', '0933992598'),
('111', 'bao thanh', 'hai nam', 'tay cong', '111');

-- --------------------------------------------------------

--
-- Table structure for table `khungtu`
--

CREATE TABLE IF NOT EXISTS `khungtu` (
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mstu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khungtu`
--

INSERT INTO `khungtu` (`mskhungtu`, `mstu`) VALUES
('11111111101101', '111111111011'),
('11111111101102', '111111111011'),
('11111111101103', '111111111011'),
('11111111101104', '111111111011'),
('11111111101105', '111111111011'),
('11111111101201', '111111111012'),
('11111111101202', '111111111012'),
('11111111101203', '111111111012'),
('11111111101204', '111111111012'),
('11111111101205', '111111111012'),
('11111111101206', '111111111012'),
('11111111101207', '111111111012'),
('11111111101208', '111111111012'),
('11111111101209', '111111111012'),
('11111111101210', '111111111012'),
('11111111101211', '111111111012'),
('11111111101212', '111111111012'),
('11111111101301', '111111111013'),
('11111111101302', '111111111013'),
('11111111101303', '111111111013'),
('11111111101304', '111111111013'),
('11111111101305', '111111111013'),
('11111111101306', '111111111013'),
('11111111101307', '111111111013'),
('11111111101308', '111111111013'),
('11111111101309', '111111111013'),
('11111111101310', '111111111013'),
('11111111101311', '111111111013'),
('11111111101312', '111111111013'),
('11111111101313', '111111111013'),
('11111111101314', '111111111013'),
('11111111101315', '111111111013'),
('11111111101401', '111111111014'),
('11111111101402', '111111111014'),
('11111111101403', '111111111014'),
('11111111101404', '111111111014'),
('11111111101405', '111111111014');

-- --------------------------------------------------------

--
-- Table structure for table `loitu`
--

CREATE TABLE IF NOT EXISTS `loitu` (
  `mstu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenloi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE IF NOT EXISTS `nhanvien` (
  `msnv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subdep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`msnv`, `hoten`, `mahoten`, `dep`, `subdep`) VALUES
('1', 'q', NULL, 'PRODUCTION', 'Electrical Training for QC'),
('10', 'thanh', NULL, 'dir', 'vice'),
('1015', 'thanh dep trai qua', NULL, 'PRODUCTION', 'Electrical Training for QC'),
('1016', 'thanh bao', NULL, 'PRODUCTION', 'assembly blokset'),
('1017', 'TRAN THANH TIEN', '1017 TRAN THANH TIEN', 'PRODUCTION', 'assembly blokset'),
('1018', 'MAI HOANG ANH', '1018 MAI HOANG ANH', 'PRODUCTION', 'assembly blokset'),
('1020', 'LE DUC LOI', '1020 LE DUC LOI', 'PRODUCTION', 'Electrical'),
('1021', 'HUYNH THANH TUAN', '1021 HUYNH THANH TUAN', 'PRODUCTION', 'Busbar'),
('1022', 'TRAN MINH TRI', '1022 TRAN MINH TRI', 'PRODUCTION', 'Assembly'),
('1024', 'LE QUANG KHANG', '1024 LE QUANG KHANG', 'PRODUCTION', 'Assembly'),
('1030', 'LE VAN TOAI', '1030 LE VAN TOAI', 'PRODUCTION', 'Welding'),
('1032', 'LE VAN CHUONG', '1032 LE VAN CHUONG', 'PRODUCTION', 'Busbar'),
('1037', 'NGUYEN MINH HOANG', '1037 NGUYEN MINH HOANG', 'PRODUCTION', 'Painting'),
('1054', 'NGUYEN THANH LUU', '1054 NGUYEN THANH LUU', 'QC', 'QC'),
('1055', 'PHAN VAN BEO', '1055 PHAN VAN BEO', 'PRODUCTION', 'assembly blokset'),
('1056', 'THAI NGUYEN QUOC THANG', '1056 THAI NGUYEN QUOC THANG', 'PRODUCTION', 'Busbar'),
('1057', 'NGUYEN VAN BEN', '1057 NGUYEN VAN BEN', 'PRODUCTION', 'Busbar'),
('1058', 'VO VAN DANH', '1058 VO VAN DANH', 'PRODUCTION', 'Welding'),
('1059', 'LE MINH TAM', '1059 LE MINH TAM', 'PRODUCTION', 'Busbar'),
('1060', 'LE HUU TAI', '1060 LE HUU TAI', 'PRODUCTION', 'Welding'),
('1068', 'TRUONG VAN NGUU', '1068 TRUONG VAN NGUU', 'QC', 'QC'),
('1070', 'NGUYEN NGOC TAN', '1070 NGUYEN NGOC TAN', 'PRODUCTION', 'Electrical'),
('1079', 'TRAN VAN VIET', '1079 TRAN VAN VIET', 'PRODUCTION', 'CNC'),
('1080', 'PHAM VAN THAM', '1080 PHAM VAN THAM', 'PRODUCTION', 'Painting'),
('1088', 'LE VAN PHU', '1088 LE VAN PHU', 'PRODUCTION', 'assembly DB'),
('1090', 'HUYNH VAN HAN', '1090 HUYNH VAN HAN', 'PRODUCTION', 'Painting'),
('1121', 'TRAN MONG KHA', '1121 TRAN MONG KHA', 'PRODUCTION', 'CNC'),
('1123', 'TRAN THI THU THAO', '1123 TRAN THI THU THAO', 'PRODUCTION', 'CNC'),
('1126', 'VU THANH PHA', '1126 VU THANH PHA', 'PRODUCTION', 'Welding'),
('1131', 'PHUNG NGOC DE', '1131 PHUNG NGOC DE', 'PRODUCTION', 'CNC'),
('1136', 'TRAN QUOC CUONG', '1136 TRAN QUOC CUONG', 'PRODUCTION', 'assembly '),
('1141', 'NGUYEN VAN NGHIEM', '1141 NGUYEN VAN NGHIEM', 'PRODUCTION', 'Electrical'),
('1143', 'MAI THANH HUONG', '1143 MAI THANH HUONG', 'PRODUCTION', 'Electrical'),
('1147', 'NGUYEN THANH THUONG', '1147 NGUYEN THANH THUONG', 'PRODUCTION', 'CNC'),
('1149', 'PHAM XUAN HAN', '1149 PHAM XUAN HAN', 'PRODUCTION', 'CNC'),
('1151', 'TRAN TAN VU', '1151 TRAN TAN VU', 'PRODUCTION', 'Electrical'),
('1152', 'LUONG THANH TRUNG', '1152 LUONG THANH TRUNG', 'PRODUCTION', 'Electrical'),
('1156', 'LE VAN DAI', '1156 LE VAN DAI', 'QC', 'QC'),
('1157', 'NGUYEN NGOC TOAN', '1157 NGUYEN NGOC TOAN', 'PRODUCTION', 'Electrical'),
('1158', 'DOAN GIANG TINH', '1158 DOAN GIANG TINH', 'PRODUCTION', 'Electrical'),
('1159', 'DAO VIET LONG', '1159 DAO VIET LONG', 'PRODUCTION', 'Electrical'),
('1160', 'TRAN XUAN VINH', '1160 TRAN XUAN VINH', 'PRODUCTION', 'Electrical'),
('1161', 'TRUONG VAN PHO', '1161 TRUONG VAN PHO', 'PRODUCTION', 'Busbar'),
('1162', 'TRAN QUOC QUAN', '1162 TRAN QUOC QUAN', 'PRODUCTION', 'Busbar'),
('1163', 'DANG MINH SANG', '1163 DANG MINH SANG', 'PRODUCTION', 'CNC'),
('1166', 'PHAM VAN HIEU', '1166 PHAM VAN HIEU', 'PRODUCTION', 'Painting'),
('1167', 'TRAN VAN HIEU', '1167 TRAN VAN HIEU', 'QC', 'QC'),
('1174', 'NGUYEN DUY THANG', '1174 NGUYEN DUY THANG', 'PRODUCTION', 'Electrical'),
('1175', 'NGO PHUOC TRIEU', '1175 NGO PHUOC TRIEU', 'PRODUCTION', 'Electrical'),
('1176', 'TONG TRUONG TU HAO', '1176 TONG TRUONG TU HAO', 'PRODUCTION', 'CNC'),
('1178', 'NGUYEN THI THANH TUYET', '1178 NGUYEN THI THANH TUYET', 'PRODUCTION', 'CNC'),
('1179', 'NGUYEN THANH TRI', '1179 NGUYEN THANH TRI', 'PRODUCTION', 'Electrical'),
('1180', 'LE VAN TAM', '1180 LE VAN TAM', 'PRODUCTION', 'assembly blokset'),
('1181', 'NGUYEN MINH TOAN', '1181 NGUYEN MINH TOAN', 'PRODUCTION', 'assembly blokset'),
('1183', 'HOANG LE VINH', '1183 HOANG LE VINH', 'QC', 'QC'),
('1186', 'TRAN THI LE HOA', '1186 TRAN THI LE HOA', 'PRODUCTION', 'Label'),
('1189', 'BUI MAI DUNG', '1189 BUI MAI DUNG', 'PRODUCTION', 'Electrical'),
('1191', 'NGUYEN NGOC TU', '1191 NGUYEN NGOC TU', 'PRODUCTION', 'assembly DB'),
('1192', 'LY DIEU AI', '1192 LY DIEU AI', 'PRODUCTION', 'Label'),
('1193', 'NGUYEN THANH TAN', '1193 NGUYEN THANH TAN', 'QC', 'QC'),
('1194', 'DOAN VAN TOAN', '1194 DOAN VAN TOAN', 'QC', 'QC'),
('1217', 'PHAN THANH LAM', '1217 PHAN THANH LAM', 'PRODUCTION', 'CNC'),
('1218', 'MAI VAN DUY', '1218 MAI VAN DUY', 'SERVICE', 'Training in ELECTRICAl'),
('1220', 'VO THANH KHIEM', '1220 VO THANH KHIEM', 'QC', 'QC'),
('1221', 'HUYNH MINH TRI', '1221 HUYNH MINH TRI', 'PRODUCTION', 'Electrical Training for QC'),
('1222', 'LE HUU DUC', '1222 LE HUU DUC', 'QC', 'QC'),
('1223', 'NGUYEN DUC NHA', '1223 NGUYEN DUC NHA', 'PRODUCTION', 'Electrical'),
('1224', 'PHAN NGOC QUYEN', '1224 PHAN NGOC QUYEN', 'PRODUCTION', 'Electrical'),
('1225', 'NGUYEN VAN HAP', '1225 NGUYEN VAN HAP', 'QC', 'QC'),
('1226', 'PHAN THI HA', '1226 PHAN THI HA', 'QC', 'QC'),
('1227', 'PHAM DUY CUONG', '1227 PHAM DUY CUONG', 'PRODUCTION', 'Electrical'),
('1228', 'THACH CON', '1228 THACH CON', 'PRODUCTION', 'Label'),
('1231', 'TIEU TIEN THINH', '1231 TIEU TIEN THINH', 'PRODUCTION', 'Electrical'),
('1233', 'LE THANH TU', '1233 LE THANH TU', 'PRODUCTION', 'Electrical'),
('1234', 'NGUYEN HOANG NGHIA', '1234 NGUYEN HOANG NGHIA', 'PRODUCTION', 'Electrical'),
('1236', 'LE HONG THANH', '1236 LE HONG THANH', 'PRODUCTION', 'Label'),
('1237', 'CAO TIEN DAT', '1237 CAO TIEN DAT', 'PRODUCTION', 'Welding'),
('1238', 'HUYNH MINH DUONG', '1238 HUYNH MINH DUONG', 'PRODUCTION', 'Welding'),
('1239', 'DOAN THANH LONG', '1239 DOAN THANH LONG', 'PRODUCTION', 'Welding'),
('1243', 'DINH HOANG PHUC', '1243 DINH HOANG PHUC', 'PRODUCTION', 'Painting'),
('1245', 'NGUYEN HOAI AN', '1245 NGUYEN HOAI AN', 'PRODUCTION', 'Painting'),
('1246', 'TRAN VAN TRUNG', '1246 TRAN VAN TRUNG', 'PRODUCTION', 'Painting'),
('1259', 'PHAM THI TUYET NGAN', '1259 PHAM THI TUYET NGAN', 'PRODUCTION', 'Electrical'),
('1260', 'LE VAN QUANG', '1260 LE VAN QUANG', 'PRODUCTION', 'Electrical'),
('1261', 'TRAN MINH QUAN', '1261 TRAN MINH QUAN', 'PRODUCTION', 'Electrical'),
('1262', 'TRAN QUOC BAO', '1262 TRAN QUOC BAO', 'PRODUCTION', 'Electrical'),
('1264', 'NGUYEN TRAN XUAN HUNG', '1264 NGUYEN TRAN XUAN HUNG', 'QC', 'QC'),
('1269', 'DANH THI THUY NGUYEN', '1269 DANH THI THUY NGUYEN', 'PRODUCTION', 'Electrical'),
('1270', 'NGUYEN KIM THANH', '1270 NGUYEN KIM THANH', 'PRODUCTION', 'Busbar'),
('1271', 'NGUYEN VAN QUY', '1271 NGUYEN VAN QUY', 'PRODUCTION', 'Label'),
('1274', 'THACH MINH TRUONG', '1274 THACH MINH TRUONG', 'PRODUCTION', 'Busbar'),
('1275', 'NGUYEN KIM TU', '1275 NGUYEN KIM TU', 'PRODUCTION', 'Electrical'),
('1276', 'VO VAN CHIEN', '1276 VO VAN CHIEN', 'PRODUCTION', 'Electrical'),
('1277', 'HOANG KIM DINH', '1277 HOANG KIM DINH', 'PRODUCTION', 'Electrical'),
('1278', 'VO VAN NGOC', '1278 VO VAN NGOC', 'PRODUCTION', 'Electrical'),
('1279', 'NGUYEN HOANG THAI', '1279 NGUYEN HOANG THAI', 'PRODUCTION', 'Electrical'),
('1280', 'DINH THANH BINH', '1280 DINH THANH BINH', 'PRODUCTION', 'Electrical'),
('1282', 'NGUYEN TRUONG GIANG', '1282 NGUYEN TRUONG GIANG', 'QC', 'QC'),
('1285', 'PHAM MINH PHUNG', '1285 PHAM MINH PHUNG', 'PRODUCTION', 'Assembly'),
('1290', 'LE VAN HIEN', '1290 LE VAN HIEN', 'PRODUCTION', 'Label'),
('1292', 'PHAN HOAI EM', '1292 PHAN HOAI EM', 'PRODUCTION', 'Busbar'),
('1293', 'BUI VAN MEN', '1293 BUI VAN MEN', 'PRODUCTION', 'ELECTRICAL'),
('1294', 'TRAN PHAM HIEU', '1294 TRAN PHAM HIEU', 'PRODUCTION', 'Assembly'),
('1295', 'VU VAN BINH', '1295 VU VAN BINH', 'PRODUCTION', 'Electrical'),
('1302', 'NGUYEN NGOC XUAN', '1302 NGUYEN NGOC XUAN', 'PRODUCTION', 'ASSEMBLY'),
('1304', 'NGUYEN THI THUY DUONG', '1304 NGUYEN THI THUY DUONG', 'PRODUCTION', 'Label'),
('1306', 'HUYNH VAN NHO', '1306 HUYNH VAN NHO', 'PRODUCTION', 'Electrical'),
('1308', 'PHAN LAI THAI BAO', '1308 PHAN LAI THAI BAO', 'PRODUCTION', 'Busbar'),
('1310', 'NGUYEN MINH CONG', '1310 NGUYEN MINH CONG', 'PRODUCTION', 'Label'),
('1311', 'TRAN LAM HO', '1311 TRAN LAM HO', 'PRODUCTION', 'Electrical'),
('1313', 'LE THI YEN NHI', '1313 LE THI YEN NHI', 'PRODUCTION', 'Label'),
('1315', 'VU LAM THIEN', '1315 VU LAM THIEN', 'PRODUCTION', 'Electrical Training for Services'),
('1316', 'PHAM DINH TUONG', '1316 PHAM DINH TUONG', 'PRODUCTION', 'Electrical Training for Services'),
('1317', 'MAI THANH TUAN', '1317 MAI THANH TUAN', 'PRODUCTION', 'Electrical'),
('1319', 'BUI NGOC NIEN', '1319 BUI NGOC NIEN', 'PRODUCTION', 'Electrical'),
('1320', 'NGUYEN THI TRUC LY', '1320 NGUYEN THI TRUC LY', 'PRODUCTION', 'Electrical'),
('1321', 'GIANG MY PHUONG', '1321 GIANG MY PHUONG', 'PRODUCTION', 'Electrical'),
('1322', 'LE QUOC TOAN', '1322 LE QUOC TOAN', 'PRODUCTION', 'Busbar'),
('1323', 'BUI VAN THANH', '1323 BUI VAN THANH', 'PRODUCTION', 'Busbar'),
('1324', 'LY THANH NHAN', '1324 LY THANH NHAN', 'PRODUCTION', 'assembly DB'),
('1326', 'PHAM VAN PHU', '1326 PHAM VAN PHU', 'PRODUCTION', 'Assembly DB'),
('1328', 'THAI VAN PHONG', '1328 THAI VAN PHONG', 'PRODUCTION', 'Label'),
('1330', 'TRAN VU CA', '1330 TRAN VU CA', 'PRODUCTION', 'Assembly'),
('1331', 'VAN HIEN QUI', '1331 VAN HIEN QUI', 'PRODUCTION', 'Electrical Training for QC'),
('1333', 'TRAN THANH PHAT', '1333 TRAN THANH PHAT', 'PRODUCTION', 'Assembly'),
('1336', 'VO VAN DUC', '1336 VO VAN DUC', 'PRODUCTION', 'Busbar'),
('1340', 'NGUYEN CHI HIEU', '1340 NGUYEN CHI HIEU', 'QC', 'QC'),
('1342', 'NGUYEN VAN VO', '1342 NGUYEN VAN VO', 'PRODUCTION', 'Busbar'),
('1343', 'DANG NHU HOANG NGHIA', '1343 DANG NHU HOANG NGHIA', 'PRODUCTION', 'assembly'),
('1344', 'QUACH VAN DUNG', '1344 QUACH VAN DUNG', 'PRODUCTION', 'CNC'),
('1345', 'NGUYEN HOANG HIEP', '1345 NGUYEN HOANG HIEP', 'PRODUCTION', 'Label'),
('1348', 'DANG XUAN THUAT', '1348 DANG XUAN THUAT', 'PRODUCTION', 'Painting'),
('1349', 'NGUYEN KHAC QUYEN', '1349 NGUYEN KHAC QUYEN', 'PRODUCTION', 'Painting'),
('1350', 'LE MINH TRI', '1350 LE MINH TRI', 'PRODUCTION', 'Welding'),
('1351', 'HUYNH CHI NGUYEN', '1351 HUYNH CHI NGUYEN', 'PRODUCTION', 'Painting'),
('1352', 'NGUYEN VU LUAN', '1352 NGUYEN VU LUAN', 'PRODUCTION', 'Welding'),
('1354', 'NGUYEN VAN DUOC', '1354 NGUYEN VAN DUOC', 'PRODUCTION', 'Label'),
('1355', 'HOANG VAN DUNG', '1355 HOANG VAN DUNG', 'PRODUCTION', 'Label'),
('1357', 'NGUYEN NGOC PHUONG', '1357 NGUYEN NGOC PHUONG', 'PRODUCTION', 'Welding'),
('1359', 'LE HOI BAO', '1359 LE HOI BAO', 'PRODUCTION', 'Assembly'),
('1360', 'NGUYEN THANH VU', '1360 NGUYEN THANH VU', 'PRODUCTION', 'Label'),
('1361', 'NGUYEN THANH VO', '1361 NGUYEN THANH VO', 'PRODUCTION', 'Label'),
('1362', 'HOANG TRUNG BAC', '1362 HOANG TRUNG BAC', 'PRODUCTION', 'Busbar'),
('1363', 'NGUYEN DOAN SANG', '1363 NGUYEN DOAN SANG', 'PRODUCTION', 'Label'),
('1364', 'VO TRONG NGUYEN', '1364 VO TRONG NGUYEN', 'PRODUCTION', 'Label'),
('1365', 'LE VAN HAI', '1365 LE VAN HAI', 'PRODUCTION', 'Welding'),
('1366', 'TRAN HOANG TUAN HIEN', '1366 TRAN HOANG TUAN HIEN', 'PRODUCTION', 'Busbar'),
('1367', 'NGO XUAN VUNG', '1367 NGO XUAN VUNG', 'PRODUCTION', 'Electrical'),
('1368', 'TRAN NGOC CUONG', '1368 TRAN NGOC CUONG', 'PRODUCTION', 'Welding'),
('1369', 'TRAN ANH TUAN', '1369 TRAN ANH TUAN', 'PRODUCTION', 'Welding'),
('1370', 'PHAM NGOC TIEN', '1370 PHAM NGOC TIEN', 'PRODUCTION', 'Electrical'),
('1371', 'DANG VAN VIET', '1371 DANG VAN VIET', 'PRODUCTION', 'Assembly'),
('1372', 'VO TRONG DUC', '1372 VO TRONG DUC', 'PRODUCTION', 'CNC'),
('1375', 'LE TUAN TAI', '1375 LE TUAN TAI', 'PRODUCTION', 'Busbar'),
('1377', 'TRAN QUOC CHIEN', '1377 TRAN QUOC CHIEN', 'PRODUCTION', 'Electrical'),
('1380', 'LE DUY NHAT', '1380 LE DUY NHAT', 'PRODUCTION', 'Welding'),
('1381', 'TRAN THI HONG THAM', '1381 TRAN THI HONG THAM', 'PRODUCTION', 'Label'),
('1382', 'NGUYEN THI NHAT TOI', '1382 NGUYEN THI NHAT TOI', 'PRODUCTION', 'Label'),
('1383', 'NGUYEN QUOC VUONG', '1383 NGUYEN QUOC VUONG', 'PRODUCTION', 'Label'),
('1385', 'TRAN VAN TRUNG', '1385 TRAN VAN TRUNG', 'PRODUCTION', 'Label'),
('1386', 'PHAM DINH TAN', '1386 PHAM DINH TAN', 'PRODUCTION', 'Busbar'),
('1387', 'HOANG HAI THACH', '1387 HOANG HAI THACH', 'QC', 'QC'),
('1388', 'NGUYEN MINH TUAN', '1388 NGUYEN MINH TUAN', 'QC', 'QC'),
('1389', 'NGUYEN PHUOC HIEP', '1389 NGUYEN PHUOC HIEP', 'PRODUCTION', 'assembly DB'),
('1392', 'DUONG THI BICH THUY', '1392 DUONG THI BICH THUY', 'PRODUCTION', 'CNC'),
('1393', 'NGAN VAN BINH', '1393 NGAN VAN BINH', 'PRODUCTION', 'Busbar'),
('1396', 'NGUYEN ANH TUNG', '1396 NGUYEN ANH TUNG', 'QC', 'QC'),
('1403', 'NGUYEN LUONG AN', '1403 NGUYEN LUONG AN', 'QC', 'QC'),
('1404', 'TRUONG MINH HAI', '1404 TRUONG MINH HAI', 'PRODUCTION', 'Busbar'),
('1405', 'LUU VAN NHAT', '1405 LUU VAN NHAT', 'PRODUCTION', 'Electrical'),
('1406', 'PHAM VAN TUYEN', '1406 PHAM VAN TUYEN', 'PRODUCTION', 'Electrical'),
('1407', 'TRAN DUY NAM', '1407 TRAN DUY NAM', 'PRODUCTION', 'Busbar'),
('1412', 'DAO VAN NGOC', '1412 DAO VAN NGOC', 'QC', 'QC'),
('1413', 'PHAM VU PHONG', '1413 PHAM VU PHONG', 'PRODUCTION', 'Busbar'),
('1414', 'TRAN DUC THE', '1414 TRAN DUC THE', 'PRODUCTION', 'Welding'),
('1415', 'LE VAN CUONG', '1415 LE VAN CUONG', 'QC', 'QC'),
('1416', 'VO HOANG MINH', '1416 VO HOANG MINH', 'PRODUCTION', 'Assembly'),
('1417', 'DUONG VU PHUONG', '1417 DUONG VU PHUONG', 'PRODUCTION', 'CNC'),
('1418', 'LE VAN LUONG', '1418 LE VAN LUONG', 'PRODUCTION', 'CNC'),
('1419', 'TRAN TUAN PHAT', '1419 TRAN TUAN PHAT', 'PRODUCTION', 'Busbar'),
('1420', 'NGUYEN TRINH CHI TAI', '1420 NGUYEN TRINH CHI TAI', 'PRODUCTION', 'Busbar'),
('1421', 'TRAN VAN GO', '1421 TRAN VAN GO', 'PRODUCTION', 'Busbar'),
('1422', 'TRAN VAN THUAN', '1422 TRAN VAN THUAN', 'PRODUCTION', 'CNC'),
('1423', 'PHAM GIAU', '1423 PHAM GIAU', 'PRODUCTION', 'CNC'),
('1424', 'HO CHI TAM', '1424 HO CHI TAM', 'PRODUCTION', 'Assembly DB'),
('1425', 'TRAN VAN SANG', '1425 TRAN VAN SANG', 'PRODUCTION', 'Busbar'),
('1427', 'TRAN MINH TAM', '1427 TRAN MINH TAM', 'PRODUCTION', 'Assembly DB'),
('1430', 'PHAN VAN CUONG', '1430 PHAN VAN CUONG', 'PRODUCTION', 'Painting'),
('1433', 'PHAN QUOC GIAU', '1433 PHAN QUOC GIAU', 'PRODUCTION', 'Painting'),
('1434', 'VO TRIEU VI', '1434 VO TRIEU VI', 'PRODUCTION', 'Electrical'),
('1435', 'PHAN NGOC PHONG', '1435 PHAN NGOC PHONG', 'PRODUCTION', 'Assembly'),
('1436', 'NGUYEN VO LE QUOC', '1436 NGUYEN VO LE QUOC', 'PRODUCTION', 'CNC'),
('1437', 'NGUYEN VAN DUONG', '1437 NGUYEN VAN DUONG', 'PRODUCTION', 'Welding'),
('1439', 'PHAN HIEN NHAN', '1439 PHAN HIEN NHAN', 'PRODUCTION', 'Packing'),
('1443', 'BUI PHU CUONG', '1443 BUI PHU CUONG', 'PRODUCTION', 'Packing'),
('1445', 'HOANG DUY TAN', '1445 HOANG DUY TAN', 'QC', 'QC'),
('1446', 'HOANG VAN DUC', '1446 HOANG VAN DUC', 'PRODUCTION', 'Assembly'),
('1450', 'TRAN HOANG TUAN TAI', '1450 TRAN HOANG TUAN TAI', 'PRODUCTION', 'Label'),
('1451', 'NGUYEN CHI LINH', '1451 NGUYEN CHI LINH', 'PRODUCTION', 'Busbar'),
('1454', 'TRAN THI THUY TRANG', '1454 TRAN THI THUY TRANG', 'PRODUCTION', 'Label'),
('1457', 'LE HOANG KHA', '1457 LE HOANG KHA', 'PRODUCTION', 'Busbar'),
('1458', 'PHAN QUOC CHI', '1458 PHAN QUOC CHI', 'PRODUCTION', 'Assembly'),
('1459', 'VU CONG NGUYEN', '1459 VU CONG NGUYEN', 'QC', 'QC'),
('1460', 'PHAN CA SUL', '1460 PHAN CA SUL', 'PRODUCTION', 'Assembly'),
('1461', 'DANG XUAN GIANG', '1461 DANG XUAN GIANG', 'PRODUCTION', 'Assembly'),
('1462', 'LE VAN PHONG', '1462 LE VAN PHONG', 'PRODUCTION', 'Assembly'),
('1463', 'TO VAN VEN', '1463 TO VAN VEN', 'PRODUCTION', 'Painting'),
('1464', 'NGUYEN VAN TANG', '1464 NGUYEN VAN TANG', 'PRODUCTION', 'Painting'),
('1465', 'NGUYEN THANH TONG', '1465 NGUYEN THANH TONG', 'PRODUCTION', 'Assembly'),
('1466', 'NGUYEN VAN HIEU', '1466 NGUYEN VAN HIEU', 'PRODUCTION', 'Assembly'),
('1467', 'TO VAN DUC', '1467 TO VAN DUC', 'PRODUCTION', 'Painting'),
('1468', 'NGUYEN VIET NAM', '1468 NGUYEN VIET NAM', 'PRODUCTION', 'Welding'),
('1469', 'NGUYEN VAN TU', '1469 NGUYEN VAN TU', 'PRODUCTION', 'Welding'),
('1474', 'DUONG THANH TRUNG', '1474 DUONG THANH TRUNG', 'PRODUCTION', 'Electrical'),
('1475', 'LE TUAN VU', '1475 LE TUAN VU', 'PRODUCTION', 'Welding'),
('1476', 'NGUYEN VAN KHANH', '1476 NGUYEN VAN KHANH', 'PRODUCTION', 'Welding'),
('1477', 'NGUYEN VAN SANG', '1477 NGUYEN VAN SANG', 'PRODUCTION', 'Welding'),
('1478', 'CHAU TAN DAT', '1478 CHAU TAN DAT', 'QC', 'QC'),
('1480', 'PHAM MINH TIEN', '1480 PHAM MINH TIEN', 'QC', 'QC'),
('1482', 'LUU VAN DANH', '1482 LUU VAN DANH', 'PRODUCTION', 'Electrical'),
('1490', 'VO HOANG MINH', '1490 VO HOANG MINH', 'PRODUCTION', 'Welding'),
('1492', 'LY XUAN DAT', '1492 LY XUAN DAT', 'PRODUCTION', 'Electrical'),
('1493', 'NGUYEN THANH TUNG', '1493 NGUYEN THANH TUNG', 'QC', 'QC'),
('1494', 'LE DINH DUNG', '1494 LE DINH DUNG', 'PRODUCTION', 'Electrical'),
('1495', 'TRAN HONG AN', '1495 TRAN HONG AN', 'PRODUCTION', 'Painting'),
('1496', 'TRAN QUOC PHUC', '1496 TRAN QUOC PHUC', 'PRODUCTION', 'Painting'),
('1497', 'CHU VAN LAM', '1497 CHU VAN LAM', 'PRODUCTION', 'Painting'),
('1498', 'TA HAI AU', '1498 TA HAI AU', 'PRODUCTION', 'Painting'),
('1500', 'TRAN VAN DUC', '1500 TRAN VAN DUC', 'PRODUCTION', 'Painting'),
('1502', 'NGUYEN PHUOC DIEP', '1502 NGUYEN PHUOC DIEP', 'PRODUCTION', 'Painting'),
('1505', 'LE VAN TIN', '1505 LE VAN TIN', 'PRODUCTION', 'Painting'),
('1506', 'DANH BAL', '1506 DANH BAL', 'PRODUCTION', 'Welding'),
('1507', 'PHAM VAN MUN', '1507 PHAM VAN MUN', 'PRODUCTION', 'Painting'),
('1509', 'NGUYEN NGOC LONG', '1509 NGUYEN NGOC LONG', 'PRODUCTION', 'Electrical'),
('1511', 'TRINH TRONG PHU', '1511 TRINH TRONG PHU', 'PRODUCTION', 'Label'),
('1512', 'NGUYEN LAM QUOC HUY', '1512 NGUYEN LAM QUOC HUY', 'PRODUCTION', 'Electrical');

-- --------------------------------------------------------

--
-- Table structure for table `qtsx`
--

CREATE TABLE IF NOT EXISTS `qtsx` (
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msgd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL,
  `minutes_dukien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qtsx`
--

INSERT INTO `qtsx` (`mskhungtu`, `msnv`, `msgd`, `date_start`, `date_finish`, `minutes_dukien`) VALUES
('11111111101101', '1020', '1', '2018-07-25 10:21:16', NULL, 500),
('11111111101101', '1018', '2', '2018-07-23 10:40:13', NULL, 500),
('11111111101101', '1021', '3', NULL, NULL, 450),
('11111111101101', '1022', '4', NULL, NULL, 500),
('11111111101101', '1018', '5', '2018-07-25 04:33:56', NULL, 500),
('11111111101101', '1018', '6', '2018-07-26 18:14:15', NULL, 600),
('11111111101101', '1020', '7', NULL, NULL, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE IF NOT EXISTS `quanly` (
  `msquanly` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `msloai` varchar(255) DEFAULT NULL,
  `loai` varchar(255) DEFAULT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `sdt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quanly`
--

INSERT INTO `quanly` (`msquanly`, `password`, `msloai`, `loai`, `ten`, `sdt`) VALUES
('1', 'baodeptrai', '1', 'quan ly tong', NULL, NULL),
('2', 'baodeptrai', '2', 'quan ly giai doan tong', NULL, NULL),
('21', 'baodeptrai', '21', 'quan ly giai doan 1', NULL, NULL),
('22', 'baodeptrai', '22', 'quan ly giai doan2', NULL, NULL),
('23', 'baodeptrai', '23', 'quan ly giai doan 3', NULL, NULL),
('24', 'baodeptrai', '24', 'quan ly giai doan 4', NULL, NULL),
('25', 'baodeptrai', '25', 'quan ly giai doan 5', NULL, NULL),
('26', 'baodeptrai', '26', 'quan ly giai doan 6', NULL, NULL),
('27', 'baodeptrai', '27', 'quan ly giai doan 7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tamdung`
--

CREATE TABLE IF NOT EXISTS `tamdung` (
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msgd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamdung` datetime DEFAULT NULL,
  `tieptuc` datetime DEFAULT NULL,
  `lydo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tamdung`
--

INSERT INTO `tamdung` (`mskhungtu`, `msnv`, `msgd`, `tamdung`, `tieptuc`, `lydo`) VALUES
('11111111101101', '1018', '2', '2018-07-23 13:17:41', '2018-07-23 13:19:35', '1'),
('11111111101101', '1018', '2', '2018-07-23 13:20:07', '2018-07-23 13:21:40', '5'),
('11111111101101', '1018', '2', '2018-07-23 13:47:46', '2018-07-23 13:48:00', ''),
('11111111101101', '1018', '2', '2018-07-23 13:48:10', '2018-07-25 13:19:08', ''),
('11111111101101', '1018', '2', '2018-07-25 13:23:20', '2018-07-25 13:29:15', 'Chá»n lÃ½ do ...'),
('11111111101101', '1018', '6', '2018-07-26 19:09:17', '2018-07-26 19:20:04', 'Chá»n lÃ½ do ...'),
('11111111101101', '1018', '6', '2018-07-26 20:20:36', NULL, 'Chá»n lÃ½ do ...');

-- --------------------------------------------------------

--
-- Table structure for table `tangca`
--

CREATE TABLE IF NOT EXISTS `tangca` (
  `mskhungtu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msgd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_finish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tangca`
--

INSERT INTO `tangca` (`mskhungtu`, `msnv`, `msgd`, `date_start`, `date_finish`) VALUES
('11111111101101', '1018', '6', '2018-07-26 18:22:29', '2018-07-26 19:09:18'),
('11111111101101', '1018', '6', '2018-07-26 19:20:05', '2018-07-26 19:54:13'),
('11111111101101', '1018', '6', '2018-07-26 19:56:52', '2018-07-26 19:57:05'),
('11111111101101', '1018', '6', '2018-07-26 20:14:46', '2018-07-26 20:14:58'),
('11111111101101', '1018', '6', '2018-07-26 20:20:18', '2018-07-26 20:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `tu`
--

CREATE TABLE IF NOT EXISTS `tu` (
  `mstu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tentu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatdukien` date DEFAULT NULL,
  `giaohangdukien` date DEFAULT NULL,
  `fathieuchinh` date DEFAULT NULL,
  `giaohanghieuchinh` date DEFAULT NULL,
  `giaohangthucte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tu`
--

INSERT INTO `tu` (`mstu`, `msduan`, `tentu`, `fatdukien`, `giaohangdukien`, `fathieuchinh`, `giaohanghieuchinh`, `giaohangthucte`) VALUES
('111111111011', '111111', 'DB Panel', '2018-12-31', '2018-12-31', NULL, NULL, NULL),
('111111111012', '111111', 'Total Panel', '2018-12-31', '2018-12-31', NULL, NULL, NULL),
('111111111013', '111111', 'null', '2018-12-31', '2018-12-31', NULL, NULL, NULL),
('111111111014', '111111', 'null', '2018-12-31', '2018-12-31', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyenviec`
--
ALTER TABLE `chuyenviec`
  ADD KEY `chuyenviec_fk1_idx` (`mskhungtu`),
  ADD KEY `chuyenviec_fk2_idx` (`msnv`),
  ADD KEY `chuyenviec_fk3_idx` (`msgd`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD KEY `donhang_ibfk1` (`sdt`),
  ADD KEY `donhang_ibfk2` (`msduan`);

--
-- Indexes for table `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`msduan`);

--
-- Indexes for table `giaidoan`
--
ALTER TABLE `giaidoan`
  ADD PRIMARY KEY (`msgd`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`sdt`);

--
-- Indexes for table `khungtu`
--
ALTER TABLE `khungtu`
  ADD PRIMARY KEY (`mskhungtu`),
  ADD KEY `khungtu_fk_idx` (`mstu`);

--
-- Indexes for table `loitu`
--
ALTER TABLE `loitu`
  ADD KEY `msgd_idx` (`mskhungtu`),
  ADD KEY `mstu_idx` (`mstu`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`msnv`);

--
-- Indexes for table `qtsx`
--
ALTER TABLE `qtsx`
  ADD KEY `qtsx_fk1_idx` (`mskhungtu`),
  ADD KEY `qtsx_fk2_idx` (`msnv`),
  ADD KEY `qtsx_fk3_idx` (`msgd`),
  ADD KEY `tangca_fk1_idx` (`mskhungtu`),
  ADD KEY `tangca_fk2_idx` (`msnv`),
  ADD KEY `tangca_fk3_idx` (`msgd`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`msquanly`);

--
-- Indexes for table `tamdung`
--
ALTER TABLE `tamdung`
  ADD KEY `tamdung_fk1_idx` (`mskhungtu`),
  ADD KEY `tamdung_fk2_idx` (`msnv`),
  ADD KEY `tamdung_fk3_idx` (`msgd`);

--
-- Indexes for table `tangca`
--
ALTER TABLE `tangca`
  ADD KEY `tangca_fk1` (`mskhungtu`),
  ADD KEY `tangca_fk2` (`msnv`),
  ADD KEY `tangca_fk3` (`msgd`);

--
-- Indexes for table `tu`
--
ALTER TABLE `tu`
  ADD PRIMARY KEY (`mstu`),
  ADD KEY `maduan_idx` (`msduan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyenviec`
--
ALTER TABLE `chuyenviec`
  ADD CONSTRAINT `chuyenviec_fk1` FOREIGN KEY (`mskhungtu`) REFERENCES `khungtu` (`mskhungtu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyenviec_fk2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chuyenviec_fk3` FOREIGN KEY (`msgd`) REFERENCES `giaidoan` (`msgd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk1` FOREIGN KEY (`sdt`) REFERENCES `khachhang` (`sdt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk2` FOREIGN KEY (`msduan`) REFERENCES `duan` (`msduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khungtu`
--
ALTER TABLE `khungtu`
  ADD CONSTRAINT `khungtu_fk` FOREIGN KEY (`mstu`) REFERENCES `tu` (`mstu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loitu`
--
ALTER TABLE `loitu`
  ADD CONSTRAINT `loitu_fk1` FOREIGN KEY (`mstu`) REFERENCES `tu` (`mstu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loitu_fk2` FOREIGN KEY (`mskhungtu`) REFERENCES `khungtu` (`mskhungtu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qtsx`
--
ALTER TABLE `qtsx`
  ADD CONSTRAINT `qtsx_fk1` FOREIGN KEY (`mskhungtu`) REFERENCES `khungtu` (`mskhungtu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qtsx_fk2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qtsx_fk3` FOREIGN KEY (`msgd`) REFERENCES `giaidoan` (`msgd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tamdung`
--
ALTER TABLE `tamdung`
  ADD CONSTRAINT `tamdung_fk1` FOREIGN KEY (`mskhungtu`) REFERENCES `khungtu` (`mskhungtu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tamdung_fk2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tamdung_fk3` FOREIGN KEY (`msgd`) REFERENCES `giaidoan` (`msgd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tangca`
--
ALTER TABLE `tangca`
  ADD CONSTRAINT `tangca_fk1` FOREIGN KEY (`mskhungtu`) REFERENCES `khungtu` (`mskhungtu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tangca_fk2` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tangca_fk3` FOREIGN KEY (`msgd`) REFERENCES `giaidoan` (`msgd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tu`
--
ALTER TABLE `tu`
  ADD CONSTRAINT `tu_fk1` FOREIGN KEY (`msduan`) REFERENCES `duan` (`msduan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
