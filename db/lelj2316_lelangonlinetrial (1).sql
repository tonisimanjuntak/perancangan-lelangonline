-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2022 at 03:08 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelj2316_lelangonlinetrial`
--
CREATE DATABASE IF NOT EXISTS `lelj2316_lelangonlinetrial` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lelj2316_lelangonlinetrial`;

DELIMITER $$
--
-- Functions
--
DROP FUNCTION IF EXISTS `create_idbank`$$
CREATE FUNCTION `create_idbank` () RETURNS CHAR(3) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	
	SELECT MAX(RIGHT(RTRIM(idbank),jumlah_digit)) FROM bank INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_idbid`$$
CREATE FUNCTION `create_idbid` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idbid),jumlah_digit)) FROM bid  
		WHERE LEFT(idbid,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_iditem`$$
CREATE FUNCTION `create_iditem` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(iditem),jumlah_digit)) FROM item_lelang  
		WHERE LEFT(iditem,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_idpaket`$$
CREATE FUNCTION `create_idpaket` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idpaket),jumlah_digit)) FROM paket_jadwal  
		WHERE LEFT(idpaket,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_idpembayaran`$$
CREATE FUNCTION `create_idpembayaran` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idpembayaran),jumlah_digit)) FROM pembayaran  
		WHERE LEFT(idpembayaran,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_idpengguna`$$
CREATE FUNCTION `create_idpengguna` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idpengguna),jumlah_digit)) FROM pengguna  
		WHERE LEFT(idpengguna,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `create_idpesertalelang`$$
CREATE FUNCTION `create_idpesertalelang` (`_tgl` DATE) RETURNS CHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idpesertalelang),jumlah_digit)) FROM peserta_lelang  
		WHERE LEFT(idpesertalelang,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END$$

DROP FUNCTION IF EXISTS `hitung_jumlahitempaket`$$
CREATE FUNCTION `hitung_jumlahitempaket` (`var_idpaket` CHAR(10)) RETURNS INT(11) BEGIN
	DECLARE nItem INT(11);
	SELECT COUNT(*) INTO nItem FROM v_paket_detail WHERE idpaket = var_idpaket;
	IF nItem IS NULL THEN
		SET nItem = 0;
	END IF;
	RETURN nItem;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `idbank` CHAR(3) NOT NULL,
  `namabank` VARCHAR(50) DEFAULT NULL,
  `cabang` VARCHAR(50) DEFAULT NULL,
  `norekening` CHAR(25) DEFAULT NULL,
  `logobank` VARCHAR(255) DEFAULT NULL,
  `statusaktif` ENUM('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idbank`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`idbank`, `namabank`, `cabang`, `norekening`, `logobank`, `statusaktif`) VALUES
('001', 'Bank Central Asia', 'Pontianak', '45453212', '2560px-Bank_Central_Asia_svg.png', 'Aktif'),
('002', 'Bank Mandiri', 'Pontianak', '56545224545', 'Bank_Mandiri_logo_2016_svg1.png', 'Aktif'),
('003', 'Bank Rakyat Indonesia', 'Pontianak', '536456462', '2560px-BANK_BRI_logo_svg.png', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `idbid` CHAR(10) NOT NULL,
  `tglbid` DATETIME DEFAULT NULL,
  `idpaket` CHAR(10) DEFAULT NULL,
  `idpesertalelang` CHAR(10) DEFAULT NULL,
  `totalhargabid` DECIMAL(11,0) DEFAULT NULL,
  `idpengguna` CHAR(10) DEFAULT NULL,
  `statusbid` ENUM('Menunggu','Kalah','Menang') DEFAULT NULL,
  `tglinsert` DATETIME DEFAULT NULL,
  `tglupdate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`idbid`),
  KEY `idpaket` (`idpaket`),
  KEY `idpesertalelang` (`idpesertalelang`),
  KEY `idpengguna` (`idpengguna`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`idbid`, `tglbid`, `idpaket`, `idpesertalelang`, `totalhargabid`, `idpengguna`, `statusbid`, `tglinsert`, `tglupdate`) VALUES
('2206230005', '2022-06-23 12:15:46', '2206220004', '2206220001', '9500000', NULL, 'Menang', '2022-06-23 12:15:46', '2022-06-23 12:15:46'),
('2206240001', '2022-06-24 17:50:57', '2206240001', '2206240001', '26500000', NULL, 'Menang', '2022-06-24 17:50:57', '2022-06-24 17:50:57'),
('2206250001', '2022-06-25 06:50:04', '2206250001', '2206240001', '20500000', NULL, 'Menang', '2022-06-25 06:50:04', '2022-06-25 06:50:04'),
('2206250004', '2022-06-25 10:31:54', '2206250002', '2206250001', '15250000', NULL, 'Menang', '2022-06-25 10:31:54', '2022-06-25 10:31:54'),
('2207010009', '2022-07-01 01:24:01', '2206290001', '2207010001', '43000000', NULL, 'Menang', '2022-07-01 01:24:01', '2022-07-01 01:24:01'),
('2207020001', '2022-07-02 15:38:46', '2207020001', '2206290001', '58000000', NULL, 'Menang', '2022-07-02 15:38:46', '2022-07-02 15:38:46'),
('2207110001', '2022-07-11 15:24:17', '2207100001', '2206290001', '19000000', NULL, 'Menang', '2022-07-11 15:24:17', '2022-07-11 15:24:17'),
('2207110002', '2022-07-11 15:27:25', '2207100001', '2206250001', '18500000', NULL, 'Kalah', '2022-07-11 15:27:25', '2022-07-11 15:27:25'),
('2207110003', '2022-07-11 22:56:44', '2207110001', '2206290001', '23500000', NULL, 'Menunggu', '2022-07-11 22:56:44', '2022-07-11 22:56:44'),
('2207120001', '2022-07-12 00:12:33', '2207070001', '2206250001', '62100000', NULL, 'Menang', '2022-07-12 00:12:33', '2022-07-12 00:12:33'),
('2207120002', '2022-07-12 00:13:13', '2207110001', '2206250001', '24000000', NULL, 'Menunggu', '2022-07-12 00:13:13', '2022-07-12 00:13:13'),
('2207120003', '2022-07-12 00:14:56', '2207070001', '2206300002', '62200000', NULL, 'Kalah', '2022-07-12 00:14:56', '2022-07-12 00:14:56'),
('2207120004', '2022-07-12 00:15:41', '2207110001', '2206300002', '24400000', NULL, 'Menunggu', '2022-07-12 00:15:41', '2022-07-12 00:15:41'),
('2207120005', '2022-07-12 00:17:15', '2207110001', '2206240001', '22700000', NULL, 'Menunggu', '2022-07-12 00:17:15', '2022-07-12 00:17:15'),
('2207120006', '2022-07-12 00:19:34', '2207070001', '2206240001', '65000000', NULL, 'Kalah', '2022-07-12 00:19:34', '2022-07-12 00:19:34'),
('2207120007', '2022-07-12 15:57:22', '2207110001', '2207120001', '29000000', NULL, 'Menunggu', '2022-07-12 15:57:22', '2022-07-12 15:57:22'),
('2207120008', '2022-07-12 16:01:08', '2207070001', '2206290001', '66100000', NULL, 'Kalah', '2022-07-12 16:01:08', '2022-07-12 16:01:08'),
('2207120009', '2022-07-12 16:01:31', '2207110001', '2207120002', '25000000', NULL, 'Menunggu', '2022-07-12 16:01:31', '2022-07-12 16:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `bid_detail`
--

DROP TABLE IF EXISTS `bid_detail`;
CREATE TABLE IF NOT EXISTS `bid_detail` (
  `idbid` CHAR(10) DEFAULT NULL,
  `iditem` CHAR(10) DEFAULT NULL,
  `hargadasar` DECIMAL(18,0) DEFAULT NULL,
  `hargabid` DECIMAL(18,0) DEFAULT NULL,
  KEY `idbid` (`idbid`),
  KEY `iditem` (`iditem`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid_detail`
--

INSERT INTO `bid_detail` (`idbid`, `iditem`, `hargadasar`, `hargabid`) VALUES
('2206230005', '2206220001', '8000000', '9500000'),
('2206240001', '2206240001', '24000000', '26500000'),
('2206250001', '2206220003', '13000000', '13500000'),
('2206250001', '2206220004', '6500000', '7000000'),
('2206250004', '2206210001', '14000000', '15250000'),
('2207010009', '2206290002', '8000000', '10000000'),
('2207010009', '2206290009', '19000000', '20000000'),
('2207010009', '2206290008', '13000000', '13000000'),
('2207020001', '2206290001', '24000000', '25000000'),
('2207020001', '2206290004', '32000000', '33000000'),
('2207110001', '2206290005', '18000000', '19000000'),
('2207110002', '2206290005', '18000000', '18500000'),
('2207110003', '2206290007', '8000000', '8500000'),
('2207110003', '2207040007', '14000000', '15000000'),
('2207120001', '2207040005', '8000000', '8200000'),
('2207120001', '2207040006', '10000000', '10700000'),
('2207120001', '2207030001', '23000000', '23700000'),
('2207120001', '2207040004', '19000000', '19500000'),
('2207120002', '2206290007', '8000000', '9000000'),
('2207120002', '2207040007', '14000000', '15000000'),
('2207120003', '2207040005', '8000000', '8100000'),
('2207120003', '2207040006', '10000000', '11100000'),
('2207120003', '2207030001', '23000000', '23700000'),
('2207120003', '2207040004', '19000000', '19300000'),
('2207120004', '2206290007', '8000000', '9200000'),
('2207120004', '2207040007', '14000000', '15200000'),
('2207120005', '2206290007', '8000000', '8600000'),
('2207120005', '2207040007', '14000000', '14100000'),
('2207120006', '2207040005', '8000000', '9700000'),
('2207120006', '2207040006', '10000000', '11300000'),
('2207120006', '2207030001', '23000000', '24000000'),
('2207120006', '2207040004', '19000000', '20000000'),
('2207120007', '2206290007', '8000000', '9000000'),
('2207120007', '2207040007', '14000000', '20000000'),
('2207120008', '2207040005', '8000000', '10000000'),
('2207120008', '2207040006', '10000000', '12000000'),
('2207120008', '2207030001', '23000000', '25000000'),
('2207120008', '2207040004', '19000000', '19100000'),
('2207120009', '2206290007', '8000000', '10000000'),
('2207120009', '2207040007', '14000000', '15000000');

-- --------------------------------------------------------

--
-- Table structure for table `item_lelang`
--

DROP TABLE IF EXISTS `item_lelang`;
CREATE TABLE IF NOT EXISTS `item_lelang` (
  `iditem` CHAR(10) NOT NULL,
  `merk` VARCHAR(25) DEFAULT NULL,
  `tipe` VARCHAR(25) DEFAULT NULL,
  `thnpembuatan` CHAR(4) DEFAULT NULL,
  `warna` ENUM('Putih','Hitam','Merah','Biru','Hijau','Coklat','Kuning','Abu-abu') DEFAULT NULL,
  `isisilinder` CHAR(10) DEFAULT NULL,
  `norangka` CHAR(25) DEFAULT NULL,
  `nomesin` CHAR(25) DEFAULT NULL,
  `nobpkb` CHAR(25) DEFAULT NULL,
  `nopolisi` CHAR(10) DEFAULT NULL,
  `grade` ENUM('A','B','C','D','E') DEFAULT NULL,
  `harga` DECIMAL(11,0) DEFAULT NULL,
  `fotoitem` VARCHAR(255) DEFAULT NULL,
  `statusitem` ENUM('Terjual','Belum Terjual') DEFAULT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_lelang`
--

INSERT INTO `item_lelang` (`iditem`, `merk`, `tipe`, `thnpembuatan`, `warna`, `isisilinder`, `norangka`, `nomesin`, `nobpkb`, `nopolisi`, `grade`, `harga`, `fotoitem`, `statusitem`) VALUES
('2206210001', 'Honda', 'Beat F1', '2017', 'Hitam', '120', '24564654654', '546321454', '654521245', 'KB2898RR', 'B', '14000000', 'download.jpg', 'Terjual'),
('2206220001', 'Yamaha', 'Mio 100', '2011', 'Kuning', '100', '8923829', '83293019', '1294898', 'KB2981GG', 'A', '8000000', 'images.jpg', 'Terjual'),
('2206220002', 'Suzuki', 'Thunder 123', '2018', 'Kuning', '150', '8293829', '383478', '1289239', 'KB8811EE', 'C', '15000000', '24222001.jpg', 'Belum Terjual'),
('2206220003', 'Honda', 'Beat F1', '2016', 'Coklat', '100', '90128912891', '123891238', '23892839', 'KB8899WW', 'D', '13000000', '44428-sepeda-motor-listrik-asal-india-istimewa.jpg', 'Terjual'),
('2206220004', 'Yamaha', 'Mio 671', '2016', 'Hijau', '100', '839328', '912892389', '232399', 'KB2899RR', 'E', '6500000', '2022040413060837143Y39470.png', 'Terjual'),
('2206240001', 'Honda', '160 PCX', '2021', 'Hitam', '160', '68271763616', '6716236123', '847616236161', 'KB 1113 MH', 'B', '24000000', 'pcx.png', 'Terjual'),
('2206290001', 'Honda', 'ADV 150', '2022', 'Hitam', '150', '87346367287', '83278476367', '3837647632', 'KB 4461 MH', 'A', '24000000', 'Honda_ADV_150_2022.png', 'Terjual'),
('2206290002', 'Honda', 'BeAT eSP', '2019', 'Biru', '150', '36247623874', '92384863286', '7246376473', 'KB 5432 JK', 'B', '8000000', 'Honda_BeAT_eSP.png', 'Terjual'),
('2206290003', 'Honda', 'BeAT POP eSP', '2019', 'Merah', '125', '82476372', '827726376', '298389727', 'KB 8768 TO', 'A', '10000000', '', 'Belum Terjual'),
('2206290004', 'Honda', 'Forza', '2021', 'Merah', '125', '273678', '28836', '726167', 'KB 7757 TO', 'B', '32000000', 'Honda_Forza_125.png', 'Terjual'),
('2206290005', 'Honda', 'Scoopy', '2022', 'Merah', '150', '823787', '83282', '129378', 'KB 8228 JH', 'B', '18000000', 'Honda_Scoopy.png', 'Terjual'),
('2206290006', 'Honda', 'SH150i', '2019', 'Putih', '135', '829378', '928873', '938987', 'KB 6757 KJ', 'C', '10000000', 'Honda_SH150i.png', 'Belum Terjual'),
('2206290007', 'Honda', 'Vario 125 eSP', '2021', 'Putih', '125', '72637', '827386', '92897382', 'KB 7675 GT', 'C', '8000000', 'Honda_Vario_125_eSP.png', 'Belum Terjual'),
('2206290008', 'Honda', 'Vario 150 eSP', '2018', 'Merah', '150', '827366', '25367', '98287', 'KB 9993', 'B', '13000000', 'Honda_Vario_150_eSP.png', 'Terjual'),
('2206290009', 'Honda', 'PCX ', '2019', 'Merah', '150', '7626565', '542615', '87765', 'KB 8726', 'B', '19000000', 'PCX_150.png', 'Terjual'),
('2207030001', 'Honda', 'PCX 150', '2019', 'Merah', '150', '72873656', '9896765', '8986645', 'KB 865O JH', 'B', '23000000', 'HHonda_PCX_150.png', 'Belum Terjual'),
('2207040001', 'Honda', 'ADV 150', '2019', 'Merah', '150', '921756167', '8175451', '92876550', 'KB 9876 GH', 'C', '15000000', 'Honda_ADV150.png', 'Belum Terjual'),
('2207040002', 'Honda', 'Vorza', '2019', 'Abu-abu', '150', '828637625', '82752672', '9132873626', 'KB 7535', 'B', '34000000', 'Honda_Forza.png', 'Belum Terjual'),
('2207040003', 'Honda', 'Genio', '2019', 'Merah', '135', '91776516', '8176451', '987654', 'KB 5667', 'C', '12000000', 'Honda_Genio.png', 'Belum Terjual'),
('2207040004', 'Honda', 'Scoopy Fi Stylish', '2019', 'Merah', '150', '9876645526', '562346678', '9187642', 'KB 9999', 'B', '19000000', 'Honda_Scoopy_Fi_Stylish.png', 'Belum Terjual'),
('2207040005', 'Honda', 'Honda SH150i', '2019', 'Hitam', '150', '9287656', '9887625', '987650', 'KB 4444', 'C', '8000000', 'Honda_SH150i1.png', 'Belum Terjual'),
('2207040006', 'Honda', 'Honda Spacy Fi', '2019', 'Hitam', '135', '198752171', '1762515617', '871652451', 'KB 9222', 'B', '10000000', 'Honda_Spacy_Fi.png', 'Belum Terjual'),
('2207040007', 'Honda', 'Vario Techno 125 CBS', '2019', 'Hitam', '125', '092487763', '2877632', '5245719', 'KB 4777', 'B', '14000000', 'Honda_Vario_Techno_125_CBS_2019.png', 'Belum Terjual'),
('2207040008', 'Honda', 'Vario 110 eSP CBS ISS', '2019', 'Merah', '110', '029737267', '98726561', '24678989', 'KB 4444', 'B', '10000000', 'Vario_110_eSP_CBS_ISS.png', 'Belum Terjual');

-- --------------------------------------------------------

--
-- Table structure for table `paket_detail`
--

DROP TABLE IF EXISTS `paket_detail`;
CREATE TABLE IF NOT EXISTS `paket_detail` (
  `idpaket` CHAR(10) DEFAULT NULL,
  `iditem` CHAR(10) DEFAULT NULL,
  `hargadasar` DECIMAL(11,0) DEFAULT NULL,
  KEY `idpaket` (`idpaket`),
  KEY `iditem` (`iditem`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_detail`
--

INSERT INTO `paket_detail` (`idpaket`, `iditem`, `hargadasar`) VALUES
('2206220004', '2206220001', '8000000'),
('2206240001', '2206240001', '24000000'),
('2206250002', '2206210001', '14000000'),
('2206290001', '2206290002', '8000000'),
('2206290001', '2206290009', '19000000'),
('2206290001', '2206290008', '13000000'),
('2207020001', '2206290001', '24000000'),
('2207020001', '2206290004', '32000000'),
('2206250001', '2206220003', '13000000'),
('2206250001', '2206220004', '6500000'),
('2207100001', '2206290005', '18000000'),
('2207070001', '2207040005', '8000000'),
('2207070001', '2207040006', '10000000'),
('2207070001', '2207030001', '23000000'),
('2207070001', '2207040004', '19000000'),
('2207110001', '2206290007', '8000000'),
('2207110001', '2207040007', '14000000');

-- --------------------------------------------------------

--
-- Table structure for table `paket_jadwal`
--

DROP TABLE IF EXISTS `paket_jadwal`;
CREATE TABLE IF NOT EXISTS `paket_jadwal` (
  `idpaket` CHAR(10) NOT NULL,
  `namapaket` VARCHAR(40) DEFAULT NULL,
  `deskripsi` VARCHAR(75) DEFAULT NULL,
  `tgljammulai` DATETIME DEFAULT NULL,
  `tgljamselesai` DATETIME DEFAULT NULL,
  `totalhargadasarpaket` DECIMAL(11,0) DEFAULT NULL,
  `statuspaket` ENUM('Terjual','Belum Terjual') DEFAULT NULL,
  `idbidpemenang` CHAR(10) DEFAULT NULL,
  `idpengguna` CHAR(10) DEFAULT NULL,
  `tglinsert` DATETIME DEFAULT NULL,
  `tglupdate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`idpaket`),
  KEY `idpengguna` (`idpengguna`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_jadwal`
--

INSERT INTO `paket_jadwal` (`idpaket`, `namapaket`, `deskripsi`, `tgljammulai`, `tgljamselesai`, `totalhargadasarpaket`, `statuspaket`, `idbidpemenang`, `idpengguna`, `tglinsert`, `tglupdate`) VALUES
('2206220004', 'PAKET MARET', '1 uNIT Honda', '2022-06-22 23:51:00', '2022-06-23 23:51:00', '8000000', 'Terjual', '2206230005', '2206190001', '2022-06-22 18:51:12', '2022-06-22 18:51:12'),
('2206240001', 'Paket PCX', 'Tersedia PCX bekas tahun 2020', '2022-06-24 17:48:51', '2022-06-25 17:48:51', '24000000', 'Terjual', '2206240001', '2206190001', '2022-06-24 17:49:13', '2022-06-24 17:49:13'),
('2206250001', 'Paket Juni 2022', 'Motor Grade Gabungan', '2022-07-07 20:46:31', '2022-07-10 20:46:31', '19500000', 'Terjual', '2206250001', '2206190001', '2022-06-25 06:47:02', '2022-07-07 20:47:08'),
('2206250002', 'Paket Meriah Juni 2022', 'Beat Honda', '2022-06-24 10:27:44', '2022-06-26 10:27:44', '14000000', 'Terjual', '2206250004', '2206190001', '2022-06-25 06:47:52', '2022-06-25 10:28:23'),
('2206290001', 'Promo Bulan Kurban', 'Lelang Motor FIFGROUP Cabang Pontianak Eid Mubarak', '2022-06-29 22:49:21', '2022-07-05 22:49:21', '40000000', 'Terjual', '2207010009', '2206190001', '2022-06-29 22:30:14', '2022-06-29 22:50:30'),
('2207020001', 'Paket Idul Adha', 'Promo Idul Adha  ', '2022-02-07 15:32:54', '2022-10-07 15:32:54', '56000000', 'Terjual', '2207020001', '2206190001', '2022-07-02 15:36:48', '2022-07-02 15:36:48'),
('2207070001', 'PROMO HAJI RAYA', 'Pelelangan Sepeda Motor Promo Haji Raya', '2022-07-11 15:20:30', '2022-07-14 15:20:30', '60000000', 'Belum Terjual', '2207120001', '2206190001', '2022-07-07 20:44:07', '2022-07-11 15:20:45'),
('2207100001', 'Paket Hari Raya', 'Murah Meriah Honda Scoopy', '2022-07-10 22:49:01', '2022-07-13 22:49:01', '18000000', 'Terjual', '2207110001', '2206190001', '2022-07-10 22:50:41', '2022-07-10 22:50:41'),
('2207110001', 'Paket Libur Lebaran', 'Lelang Murah Meriah Honda Vario', '2022-07-11 15:37:45', '2022-07-14 15:37:45', '22000000', 'Belum Terjual', NULL, '2206190001', '2022-07-11 15:41:33', '2022-07-11 15:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `idpembayaran` CHAR(10) NOT NULL,
  `tglpembayaran` DATETIME DEFAULT NULL,
  `idbid` CHAR(10) DEFAULT NULL,
  `namabankpengirim` ENUM('BRI (Bank Rakyat Indonesia)','BNI (Bank Negara Indonesia)','Mandiri','BCA (Bank Central Asia)') DEFAULT NULL,
  `norekpengirim` CHAR(20) DEFAULT NULL,
  `nominalbayar` DECIMAL(11,0) DEFAULT NULL,
  `fotopembayaran` VARCHAR(255) DEFAULT NULL,
  `statuspembayaran` ENUM('Menunggu Konfirmasi','Ditolak','Sudah Diterima') DEFAULT NULL,
  `idpengguna` CHAR(10) DEFAULT NULL,
  `tglinsert` DATETIME DEFAULT NULL,
  `tglupdate` DATETIME DEFAULT NULL,
  `idbank` CHAR(10) DEFAULT NULL,
  PRIMARY KEY (`idpembayaran`),
  KEY `idbid` (`idbid`),
  KEY `idpengguna` (`idpengguna`),
  KEY `idbank` (`idbank`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `tglpembayaran`, `idbid`, `namabankpengirim`, `norekpengirim`, `nominalbayar`, `fotopembayaran`, `statuspembayaran`, `idpengguna`, `tglinsert`, `tglupdate`, `idbank`) VALUES
('2206230004', '2022-06-23 14:32:24', '2206230005', 'BRI (Bank Rakyat Indonesia)', '2222', '9500000', 'bukti-pembayaran-STAIM00021.jpg', 'Sudah Diterima', NULL, '2022-06-23 14:32:24', '2022-06-23 14:32:24', '003'),
('2206240001', '2022-06-24 17:57:04', '2206240001', 'Mandiri', '6102817663621', '26500000', 'buktitransfer.png', 'Sudah Diterima', NULL, '2022-06-24 17:57:04', '2022-06-24 17:57:04', '002'),
('2206250001', '2022-06-25 10:35:07', '2206250004', 'Mandiri', '56213113123', '15250000', 'bukti_tf.jpg', 'Sudah Diterima', NULL, '2022-06-25 10:35:07', '2022-06-25 10:35:07', '002'),
('2207010001', '2022-07-01 01:25:29', '2207010009', 'BRI (Bank Rakyat Indonesia)', '08293939939', '43000000', '4191470590_(1).jpg', 'Sudah Diterima', NULL, '2022-07-01 01:25:29', '2022-07-01 01:25:29', '003'),
('2207020001', '2022-07-02 15:46:35', '2207020001', 'BCA (Bank Central Asia)', '8737647367', '58000000', 'logo.png', 'Sudah Diterima', NULL, '2022-07-02 15:46:35', '2022-07-02 15:46:35', '001'),
('2207070001', '2022-07-07 20:56:09', '2206250001', 'BCA (Bank Central Asia)', '8737647367', '20500000', 'struk_transfer.png', 'Sudah Diterima', NULL, '2022-07-07 20:56:09', '2022-07-07 20:56:09', '001'),
('2207110001', '2022-07-11 15:31:44', '2207110001', 'BCA (Bank Central Asia)', '8737647367', '19000000', 'struk_transfer1.png', 'Sudah Diterima', NULL, '2022-07-11 15:31:44', '2022-07-11 15:31:44', '001');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `idpengguna` CHAR(10) NOT NULL,
  `namapengguna` VARCHAR(40) DEFAULT NULL,
  `jeniskelamin` ENUM('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` VARCHAR(75) DEFAULT NULL,
  `email` VARCHAR(40) DEFAULT NULL,
  `notelp` CHAR(14) DEFAULT NULL,
  `username` VARCHAR(30) DEFAULT NULL,
  `password` VARCHAR(50) DEFAULT NULL,
  `level` ENUM('Admin','Pimpinan') DEFAULT NULL,
  `statusaktif` ENUM('Aktif','Tidak Aktif') DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`idpengguna`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `jeniskelamin`, `alamat`, `email`, `notelp`, `username`, `password`, `level`, `statusaktif`, `foto`) VALUES
('2206190001', 'Jesi Rahayu Sinta', 'Perempuan', 'Jl. Sungai Raya Dalam, Komplek Mitra Indah Utama 6, No. A4, Kecamatan Sunga', 'jhesirazak01@gmail.com', '082151914149', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Aktif', '6_FOTO_W.jpg'),
('2206240001', 'Fajar Anugrah', 'Laki-laki', 'Pontianak', 'fajar@gmail.com', '08736162331321', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pimpinan', 'Aktif', 'fajar.jpg'),
('2207070001', 'Muhammad Baso Hikmah', 'Laki-laki', 'jl.M.Sohor No.17A, Pontianak Kota, Kalimantan Barat', 'basohikmah@gmail.com', '082186755334', 'pimpinan1', 'a1475279de60efc1b418fa651f695384', 'Pimpinan', 'Aktif', 'Baso_Hikmah1.png');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_lelang`
--

DROP TABLE IF EXISTS `peserta_lelang`;
CREATE TABLE IF NOT EXISTS `peserta_lelang` (
  `idpesertalelang` CHAR(10) NOT NULL,
  `tgldaftar` DATETIME DEFAULT NULL,
  `nibusaha` VARCHAR(20) DEFAULT NULL,
  `namausaha` VARCHAR(40) DEFAULT NULL,
  `emailusaha` VARCHAR(75) DEFAULT NULL,
  `notelpusaha` CHAR(14) DEFAULT NULL,
  `nikpemilik` CHAR(16) DEFAULT NULL,
  `namapemilik` VARCHAR(40) DEFAULT NULL,
  `jeniskelaminpemilik` ENUM('Laki-laki','Perempuan') DEFAULT NULL,
  `alamatpemilik` VARCHAR(75) DEFAULT NULL,
  `emailpemilik` VARCHAR(40) DEFAULT NULL,
  `notelppemilik` CHAR(14) DEFAULT NULL,
  `username` VARCHAR(30) DEFAULT NULL,
  `password` VARCHAR(50) DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `statusaktif` ENUM('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idpesertalelang`),
  UNIQUE KEY `emailusaha` (`emailusaha`),
  UNIQUE KEY `emailpemilik` (`emailpemilik`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_lelang`
--

INSERT INTO `peserta_lelang` (`idpesertalelang`, `tgldaftar`, `nibusaha`, `namausaha`, `emailusaha`, `notelpusaha`, `nikpemilik`, `namapemilik`, `jeniskelaminpemilik`, `alamatpemilik`, `emailpemilik`, `notelppemilik`, `username`, `password`, `foto`, `statusaktif`) VALUES
('2206200001', '2022-06-20 10:15:29', '123456789', 'CV. Maju Abadi Jaya', 'majujaya@gmail.com', '08130000000', '1234567890123456', 'M. Dodi Irawan', 'Laki-laki', 'Jl. Pahlawan NO.12', 'dodi@gmail.com', '081200000000', NULL, NULL, 'download.jpg', 'Aktif'),
('2206220001', '2022-06-22 06:24:38', '45654212', 'PT. Mitra', 'mitra@gmail.com', '21893823', '2323', 'budi', 'Laki-laki', 'asdf', 'budi@gmail.com', '129182', 'mitra', '92706ba4fd3022cede6d1610b17a0d2d', 'photo-1633332755192-727a05c4013d1.jpg', 'Aktif'),
('2206240001', '2022-06-24 04:20:01', 'MMB/002/SK/2019', 'CV Mirsuma Mitra Bersama', 'mirsumamitrabersama@gmail.com', '085348099494', '6101010909890004', 'Zulfani Mirsuma', 'Laki-laki', 'Jl. Sungai Raya Dalam, Komplek Mitra Indah Utama 6, No. A4, Kecamatan Sunga', 'qba.dsixth@gmail.com', '085348099494', 'mirsuma', '37285fd09a69c158db986fb4901e4d4d', 'MMB_BLUE_BLACK.jpeg', 'Aktif'),
('2206250001', '2022-06-25 10:22:12', '201/SK/11/2018', 'CV Wira Buana Motor', 'wirabuanamotor@gmail.com', '0873613126123', '61120408850003', 'Lim Kek Shiong', 'Laki-laki', 'Jl. Tanjung Pura No. 14, Pontianak', 'limkekshiong@gmail.com', '0873613126123', 'buana', 'ba0d84374d702a18afb8584bfff5a672', 'logo.jpg', 'Aktif'),
('2206290001', '2022-06-29 22:33:43', '11219919980121', 'CV. JHESIMPLE SEJAHTERA', 'jhesimple@gmail.com', '082152924249', '912193849382', 'Zeeldan Farish', 'Laki-laki', 'Sungai Raya Dalam, Mitra Indah Utama 6 No.A4', 'zeeldan@gmail.com', '082137738287', 'jesi', '1efb6e086a761eb835cff13e9d5b0aeb', 'logo.png', 'Aktif'),
('2206300002', '2022-06-30 00:01:38', '82736276472617', 'CV.KARYA BAKTI', 'karyabakti@gmail.com', '082929837728', '6112076265615667', 'Doni Danuar', 'Laki-laki', 'Parit Teladan Darat, Kalibandung, Kecamatan Sungai Raya, Kabupaten Kubu Ray', 'donidanuar@gmail.com', '028176656556', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'kb.png', 'Aktif'),
('2206300003', '2022-06-30 19:15:36', '068176326161', 'cv mantap jaya', 'mantapjaya@gmail.com', '0847167236161', '611223300192714', 'antoni', 'Laki-laki', 'pontianak', 'antoni@gmail.com', 'antoni', 'mantapjaya', '8db2dcfa9030b542c3e7bd6f112d6832', '', 'Aktif'),
('2207010001', '2022-07-01 01:06:46', '2918210', 'Bumi Abadi Jaya', 'bumiabadi@gmail.com', '081200000000', '61102929000291', 'Tirta Susilo', 'Laki-laki', 'Jl. Pemuda', 'tirta@gmail.com', '08110000000', 'bumiabadi', '336495261a1c5188a1cd4909d2b1ebbc', '', 'Aktif'),
('2207120001', '2022-07-12 15:56:15', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', '202cb962ac59075b964b07152d234b70', NULL, 'Aktif'),
('2207120002', '2022-07-12 15:59:46', '321', '321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '321', 'caf1a3dfb505ffed0d024130f58c5cfa', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bid`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_bid`;
CREATE TABLE IF NOT EXISTS `v_bid` (
`idbid` CHAR(10)
,`tglbid` DATETIME
,`idpaket` CHAR(10)
,`idpesertalelang` CHAR(10)
,`totalhargabid` DECIMAL(11,0)
,`idpengguna` CHAR(10)
,`tglinsert` DATETIME
,`statusbid` ENUM('Menunggu','Kalah','Menang')
,`tglupdate` DATETIME
,`namapaket` VARCHAR(40)
,`deskripsi` VARCHAR(75)
,`tgljammulai` DATETIME
,`tgljamselesai` DATETIME
,`totalhargadasarpaket` DECIMAL(11,0)
,`statuspaket` ENUM('Terjual','Belum Terjual')
,`namausaha` VARCHAR(40)
,`nibusaha` VARCHAR(20)
,`emailusaha` VARCHAR(75)
,`notelpusaha` CHAR(14)
,`nikpemilik` CHAR(16)
,`namapemilik` VARCHAR(40)
,`jeniskelaminpemilik` ENUM('Laki-laki','Perempuan')
,`alamatpemilik` VARCHAR(75)
,`emailpemilik` VARCHAR(40)
,`notelppemilik` CHAR(14)
,`foto` VARCHAR(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bid_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_bid_detail`;
CREATE TABLE IF NOT EXISTS `v_bid_detail` (
`idbid` CHAR(10)
,`iditem` CHAR(10)
,`hargadasar` DECIMAL(18,0)
,`hargabid` DECIMAL(18,0)
,`tglbid` DATETIME
,`merk` VARCHAR(25)
,`tipe` VARCHAR(25)
,`thnpembuatan` CHAR(4)
,`fotoitem` VARCHAR(255)
,`grade` ENUM('A','B','C','D','E')
,`warna` ENUM('Putih','Hitam','Merah','Biru','Hijau','Coklat','Kuning','Abu-abu')
,`isisilinder` CHAR(10)
,`norangka` CHAR(25)
,`nomesin` CHAR(25)
,`nobpkb` CHAR(25)
,`nopolisi` CHAR(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_paket_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_paket_detail`;
CREATE TABLE IF NOT EXISTS `v_paket_detail` (
`idpaket` CHAR(10)
,`iditem` CHAR(10)
,`hargadasar` DECIMAL(11,0)
,`tgljammulai` DATETIME
,`tgljamselesai` DATETIME
,`merk` VARCHAR(25)
,`tipe` VARCHAR(25)
,`thnpembuatan` CHAR(4)
,`warna` ENUM('Putih','Hitam','Merah','Biru','Hijau','Coklat','Kuning','Abu-abu')
,`isisilinder` CHAR(10)
,`norangka` CHAR(25)
,`nomesin` CHAR(25)
,`nobpkb` CHAR(25)
,`nopolisi` CHAR(10)
,`grade` ENUM('A','B','C','D','E')
,`harga` DECIMAL(11,0)
,`fotoitem` VARCHAR(255)
,`statusitem` ENUM('Terjual','Belum Terjual')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_paket_jadwal`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_paket_jadwal`;
CREATE TABLE IF NOT EXISTS `v_paket_jadwal` (
`idpaket` CHAR(10)
,`namapaket` VARCHAR(40)
,`deskripsi` VARCHAR(75)
,`tgljammulai` DATETIME
,`tgljamselesai` DATETIME
,`totalhargadasarpaket` DECIMAL(11,0)
,`statuspaket` ENUM('Terjual','Belum Terjual')
,`idbidpemenang` CHAR(10)
,`idpengguna` CHAR(10)
,`namapengguna` VARCHAR(40)
,`tglinsert` DATETIME
,`tglupdate` DATETIME
,`tglbid` DATETIME
,`totalhargabid` DECIMAL(11,0)
,`namausaha` VARCHAR(40)
,`nibusaha` VARCHAR(20)
,`namapemilik` VARCHAR(40)
,`nikpemilik` CHAR(16)
,`idpesertalelang` CHAR(10)
,`jumlahitem` INT(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembayaran`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_pembayaran`;
CREATE TABLE IF NOT EXISTS `v_pembayaran` (
`idpembayaran` CHAR(10)
,`tglpembayaran` DATETIME
,`idbid` CHAR(10)
,`tglbid` DATETIME
,`norekpengirim` CHAR(20)
,`namabankpengirim` ENUM('BRI (Bank Rakyat Indonesia)','BNI (Bank Negara Indonesia)','Mandiri','BCA (Bank Central Asia)')
,`nominalbayar` DECIMAL(11,0)
,`fotopembayaran` VARCHAR(255)
,`statuspembayaran` ENUM('Menunggu Konfirmasi','Ditolak','Sudah Diterima')
,`idpengguna` CHAR(10)
,`tglinsert` DATETIME
,`tglupdate` DATETIME
,`idbank` CHAR(10)
,`namabank` VARCHAR(50)
,`cabang` VARCHAR(50)
,`norekening` CHAR(25)
,`idpaket` CHAR(10)
,`namapaket` VARCHAR(40)
,`idpesertalelang` CHAR(10)
,`namausaha` VARCHAR(40)
,`nibusaha` VARCHAR(20)
,`nikpemilik` CHAR(16)
,`namapemilik` VARCHAR(40)
,`totalhargadasarpaket` DECIMAL(11,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembayaran_detail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_pembayaran_detail`;
CREATE TABLE IF NOT EXISTS `v_pembayaran_detail` (
`idpembayaran` CHAR(10)
,`tglpembayaran` DATETIME
,`idbid` CHAR(10)
,`iditem` CHAR(10)
,`hargadasar` DECIMAL(18,0)
,`hargabid` DECIMAL(18,0)
,`tglbid` DATETIME
,`idpaket` CHAR(10)
,`idpesertalelang` CHAR(10)
,`merk` VARCHAR(25)
,`tipe` VARCHAR(25)
,`thnpembuatan` CHAR(4)
,`warna` ENUM('Putih','Hitam','Merah','Biru','Hijau','Coklat','Kuning','Abu-abu')
,`isisilinder` CHAR(10)
,`norangka` CHAR(25)
,`nomesin` CHAR(25)
,`nobpkb` CHAR(25)
,`nopolisi` CHAR(10)
,`grade` ENUM('A','B','C','D','E')
,`fotoitem` VARCHAR(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_bid`
--
DROP TABLE IF EXISTS `v_bid`;

CREATE VIEW `v_bid`  AS SELECT `bid`.`idbid` AS `idbid`, `bid`.`tglbid` AS `tglbid`, `bid`.`idpaket` AS `idpaket`, `bid`.`idpesertalelang` AS `idpesertalelang`, `bid`.`totalhargabid` AS `totalhargabid`, `bid`.`idpengguna` AS `idpengguna`, `bid`.`tglinsert` AS `tglinsert`, `bid`.`statusbid` AS `statusbid`, `bid`.`tglupdate` AS `tglupdate`, `paket_jadwal`.`namapaket` AS `namapaket`, `paket_jadwal`.`deskripsi` AS `deskripsi`, `paket_jadwal`.`tgljammulai` AS `tgljammulai`, `paket_jadwal`.`tgljamselesai` AS `tgljamselesai`, `paket_jadwal`.`totalhargadasarpaket` AS `totalhargadasarpaket`, `paket_jadwal`.`statuspaket` AS `statuspaket`, `peserta_lelang`.`namausaha` AS `namausaha`, `peserta_lelang`.`nibusaha` AS `nibusaha`, `peserta_lelang`.`emailusaha` AS `emailusaha`, `peserta_lelang`.`notelpusaha` AS `notelpusaha`, `peserta_lelang`.`nikpemilik` AS `nikpemilik`, `peserta_lelang`.`namapemilik` AS `namapemilik`, `peserta_lelang`.`jeniskelaminpemilik` AS `jeniskelaminpemilik`, `peserta_lelang`.`alamatpemilik` AS `alamatpemilik`, `peserta_lelang`.`emailpemilik` AS `emailpemilik`, `peserta_lelang`.`notelppemilik` AS `notelppemilik`, `peserta_lelang`.`foto` AS `foto` FROM ((`bid` JOIN `paket_jadwal` ON(`bid`.`idpaket` = `paket_jadwal`.`idpaket`)) JOIN `peserta_lelang` ON(`bid`.`idpesertalelang` = `peserta_lelang`.`idpesertalelang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_bid_detail`
--
DROP TABLE IF EXISTS `v_bid_detail`;

CREATE VIEW `v_bid_detail`  AS SELECT `bid_detail`.`idbid` AS `idbid`, `bid_detail`.`iditem` AS `iditem`, `bid_detail`.`hargadasar` AS `hargadasar`, `bid_detail`.`hargabid` AS `hargabid`, `bid`.`tglbid` AS `tglbid`, `item_lelang`.`merk` AS `merk`, `item_lelang`.`tipe` AS `tipe`, `item_lelang`.`thnpembuatan` AS `thnpembuatan`, `item_lelang`.`fotoitem` AS `fotoitem`, `item_lelang`.`grade` AS `grade`, `item_lelang`.`warna` AS `warna`, `item_lelang`.`isisilinder` AS `isisilinder`, `item_lelang`.`norangka` AS `norangka`, `item_lelang`.`nomesin` AS `nomesin`, `item_lelang`.`nobpkb` AS `nobpkb`, `item_lelang`.`nopolisi` AS `nopolisi` FROM ((`bid_detail` JOIN `bid` ON(`bid_detail`.`idbid` = `bid`.`idbid`)) JOIN `item_lelang` ON(`bid_detail`.`iditem` = `item_lelang`.`iditem`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_paket_detail`
--
DROP TABLE IF EXISTS `v_paket_detail`;

CREATE VIEW `v_paket_detail`  AS SELECT `paket_detail`.`idpaket` AS `idpaket`, `paket_detail`.`iditem` AS `iditem`, `paket_detail`.`hargadasar` AS `hargadasar`, `paket_jadwal`.`tgljammulai` AS `tgljammulai`, `paket_jadwal`.`tgljamselesai` AS `tgljamselesai`, `item_lelang`.`merk` AS `merk`, `item_lelang`.`tipe` AS `tipe`, `item_lelang`.`thnpembuatan` AS `thnpembuatan`, `item_lelang`.`warna` AS `warna`, `item_lelang`.`isisilinder` AS `isisilinder`, `item_lelang`.`norangka` AS `norangka`, `item_lelang`.`nomesin` AS `nomesin`, `item_lelang`.`nobpkb` AS `nobpkb`, `item_lelang`.`nopolisi` AS `nopolisi`, `item_lelang`.`grade` AS `grade`, `item_lelang`.`harga` AS `harga`, `item_lelang`.`fotoitem` AS `fotoitem`, `item_lelang`.`statusitem` AS `statusitem` FROM ((`paket_detail` JOIN `paket_jadwal` ON(`paket_detail`.`idpaket` = `paket_jadwal`.`idpaket`)) JOIN `item_lelang` ON(`paket_detail`.`iditem` = `item_lelang`.`iditem`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_paket_jadwal`
--
DROP TABLE IF EXISTS `v_paket_jadwal`;

CREATE VIEW `v_paket_jadwal`  AS SELECT `paket_jadwal`.`idpaket` AS `idpaket`, `paket_jadwal`.`namapaket` AS `namapaket`, `paket_jadwal`.`deskripsi` AS `deskripsi`, `paket_jadwal`.`tgljammulai` AS `tgljammulai`, `paket_jadwal`.`tgljamselesai` AS `tgljamselesai`, `paket_jadwal`.`totalhargadasarpaket` AS `totalhargadasarpaket`, `paket_jadwal`.`statuspaket` AS `statuspaket`, `paket_jadwal`.`idbidpemenang` AS `idbidpemenang`, `paket_jadwal`.`idpengguna` AS `idpengguna`, `pengguna`.`namapengguna` AS `namapengguna`, `paket_jadwal`.`tglinsert` AS `tglinsert`, `paket_jadwal`.`tglupdate` AS `tglupdate`, `bid`.`tglbid` AS `tglbid`, `bid`.`totalhargabid` AS `totalhargabid`, `peserta_lelang`.`namausaha` AS `namausaha`, `peserta_lelang`.`nibusaha` AS `nibusaha`, `peserta_lelang`.`namapemilik` AS `namapemilik`, `peserta_lelang`.`nikpemilik` AS `nikpemilik`, `bid`.`idpesertalelang` AS `idpesertalelang`, `hitung_jumlahitempaket`(`paket_jadwal`.`idpaket`) AS `jumlahitem` FROM (((`paket_jadwal` LEFT JOIN `bid` ON(`bid`.`idbid` = `paket_jadwal`.`idbidpemenang`)) LEFT JOIN `peserta_lelang` ON(`bid`.`idpesertalelang` = `peserta_lelang`.`idpesertalelang`)) LEFT JOIN `pengguna` ON(`paket_jadwal`.`idpengguna` = `pengguna`.`idpengguna`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembayaran`
--
DROP TABLE IF EXISTS `v_pembayaran`;

CREATE VIEW `v_pembayaran`  AS SELECT `pembayaran`.`idpembayaran` AS `idpembayaran`, `pembayaran`.`tglpembayaran` AS `tglpembayaran`, `pembayaran`.`idbid` AS `idbid`, `bid`.`tglbid` AS `tglbid`, `pembayaran`.`norekpengirim` AS `norekpengirim`, `pembayaran`.`namabankpengirim` AS `namabankpengirim`, `pembayaran`.`nominalbayar` AS `nominalbayar`, `pembayaran`.`fotopembayaran` AS `fotopembayaran`, `pembayaran`.`statuspembayaran` AS `statuspembayaran`, `pembayaran`.`idpengguna` AS `idpengguna`, `pembayaran`.`tglinsert` AS `tglinsert`, `pembayaran`.`tglupdate` AS `tglupdate`, `pembayaran`.`idbank` AS `idbank`, `bank`.`namabank` AS `namabank`, `bank`.`cabang` AS `cabang`, `bank`.`norekening` AS `norekening`, `bid`.`idpaket` AS `idpaket`, `paket_jadwal`.`namapaket` AS `namapaket`, `bid`.`idpesertalelang` AS `idpesertalelang`, `peserta_lelang`.`namausaha` AS `namausaha`, `peserta_lelang`.`nibusaha` AS `nibusaha`, `peserta_lelang`.`nikpemilik` AS `nikpemilik`, `peserta_lelang`.`namapemilik` AS `namapemilik`, `paket_jadwal`.`totalhargadasarpaket` AS `totalhargadasarpaket` FROM ((((`pembayaran` JOIN `bank` ON(`pembayaran`.`idbank` = `bank`.`idbank`)) JOIN `bid` ON(`pembayaran`.`idbid` = `bid`.`idbid`)) JOIN `paket_jadwal` ON(`bid`.`idpaket` = `paket_jadwal`.`idpaket`)) JOIN `peserta_lelang` ON(`bid`.`idpesertalelang` = `peserta_lelang`.`idpesertalelang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembayaran_detail`
--
DROP TABLE IF EXISTS `v_pembayaran_detail`;

CREATE VIEW `v_pembayaran_detail`  AS SELECT `pembayaran`.`idpembayaran` AS `idpembayaran`, `pembayaran`.`tglpembayaran` AS `tglpembayaran`, `bid_detail`.`idbid` AS `idbid`, `bid_detail`.`iditem` AS `iditem`, `bid_detail`.`hargadasar` AS `hargadasar`, `bid_detail`.`hargabid` AS `hargabid`, `bid`.`tglbid` AS `tglbid`, `bid`.`idpaket` AS `idpaket`, `bid`.`idpesertalelang` AS `idpesertalelang`, `item_lelang`.`merk` AS `merk`, `item_lelang`.`tipe` AS `tipe`, `item_lelang`.`thnpembuatan` AS `thnpembuatan`, `item_lelang`.`warna` AS `warna`, `item_lelang`.`isisilinder` AS `isisilinder`, `item_lelang`.`norangka` AS `norangka`, `item_lelang`.`nomesin` AS `nomesin`, `item_lelang`.`nobpkb` AS `nobpkb`, `item_lelang`.`nopolisi` AS `nopolisi`, `item_lelang`.`grade` AS `grade`, `item_lelang`.`fotoitem` AS `fotoitem` FROM (((`bid_detail` JOIN `item_lelang` ON(`bid_detail`.`iditem` = `item_lelang`.`iditem`)) JOIN `bid` ON(`bid_detail`.`idbid` = `bid`.`idbid`)) JOIN `pembayaran` ON(`pembayaran`.`idbid` = `bid`.`idbid`)) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`idpaket`) REFERENCES `paket_jadwal` (`idpaket`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`idpesertalelang`) REFERENCES `peserta_lelang` (`idpesertalelang`),
  ADD CONSTRAINT `bid_ibfk_3` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `bid_detail`
--
ALTER TABLE `bid_detail`
  ADD CONSTRAINT `bid_detail_ibfk_1` FOREIGN KEY (`idbid`) REFERENCES `bid` (`idbid`),
  ADD CONSTRAINT `bid_detail_ibfk_2` FOREIGN KEY (`iditem`) REFERENCES `item_lelang` (`iditem`);

--
-- Constraints for table `paket_detail`
--
ALTER TABLE `paket_detail`
  ADD CONSTRAINT `paket_detail_ibfk_1` FOREIGN KEY (`idpaket`) REFERENCES `paket_jadwal` (`idpaket`),
  ADD CONSTRAINT `paket_detail_ibfk_2` FOREIGN KEY (`iditem`) REFERENCES `item_lelang` (`iditem`);

--
-- Constraints for table `paket_jadwal`
--
ALTER TABLE `paket_jadwal`
  ADD CONSTRAINT `paket_jadwal_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idbid`) REFERENCES `bid` (`idbid`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`idbank`) REFERENCES `bank` (`idbank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
