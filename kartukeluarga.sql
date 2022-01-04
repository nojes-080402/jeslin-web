-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 03:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kartukeluarga`
--
CREATE DATABASE IF NOT EXISTS `kartukeluarga` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kartukeluarga`;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `idagama` int(20) NOT NULL,
  `namaagama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`idagama`, `namaagama`) VALUES
(1, 'ISLAM'),
(2, 'PROTESTAN'),
(3, 'KATHOLIK'),
(4, 'HINDU'),
(5, 'BUDHA'),
(6, 'KONGHUCU');

-- --------------------------------------------------------

--
-- Table structure for table `desakelurahan`
--

DROP TABLE IF EXISTS `desakelurahan`;
CREATE TABLE `desakelurahan` (
  `iddesa` int(10) NOT NULL,
  `namadesa` varchar(100) NOT NULL,
  `idkecematan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desakelurahan`
--

INSERT INTO `desakelurahan` (`iddesa`, `namadesa`, `idkecematan`) VALUES
(1, 'LETNEO SELATAN', 1),
(3, 'ATMEN', 1),
(4, 'BANNAE', 1),
(5, 'LAPEOM', 1),
(6, 'LETNEO ', 1),
(7, 'NIFUNENAS', 1),
(8, 'OABIKASE', 1),
(9, 'SUBUN', 1),
(10, 'SUBUN BESTOBE', 1),
(11, 'SUBUN TUALELE', 1),
(12, 'USAPINONOT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecematan`
--

DROP TABLE IF EXISTS `kecematan`;
CREATE TABLE `kecematan` (
  `idkecematan` int(20) NOT NULL,
  `namakecematan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecematan`
--

INSERT INTO `kecematan` (`idkecematan`, `namakecematan`) VALUES
(1, 'INSANA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

DROP TABLE IF EXISTS `kk`;
CREATE TABLE `kk` (
  `idkk` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `jenispekerjaan` varchar(100) NOT NULL,
  `iddesa` int(10) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`idkk`, `nama`, `nik`, `jk`, `tempatlahir`, `tanggallahir`, `agama`, `pendidikan`, `jenispekerjaan`, `iddesa`, `rt`, `rw`) VALUES
(2, 'DAVID SALUAT', '5303201105670001', 'L', 'KISKASEN', '1967-05-11', 'KATHOLIK', 'SMA', 'PETANI', 1, '2', '3'),
(3, 'KRISTINA EA', '5303204105780001', 'P', 'BAJAWA', '1978-05-02', 'KATHOLIK', 'SD', 'IBU RUMAH TANGGA', 1, '2', '3'),
(4, 'MARIA APFIAN JESLIN NAIOBE', '5303204804020001', 'P', 'BAJAWA', '2002-04-08', 'KATHOLIK', 'S1', 'MAHASISWA', 1, '2', '3'),
(5, 'FRANSISKA TEI NAIOBE', '5303205809030001', 'P', 'DENPASAR', '2003-09-18', 'KATHOLIK', 'SMK', 'PELAJAR', 1, '2', '3'),
(6, 'JUBERTUS MUDA NAIOBE', '5303200706070001', 'L', 'MAMSENA', '2007-06-07', 'KATHOLIK', 'SMP', 'PELAJAR', 3, '2', '3'),
(7, 'RAYMUNDUS MATEOS NAIOBE', '5303203008120001', 'L', 'KISKASEN', '2012-08-30', 'KATHOLIK', 'SD', 'PELAJAR', 1, '2', '3'),
(14, 'MARTEN HATI NAIOBE', '5303201003170001', 'L', 'MAMSENA', '2017-03-10', 'KATHOLIK', 'TK/PAUD', 'PELAJAR', 1, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan` (
  `idpekerjaan` int(10) NOT NULL,
  `jenispekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`idpekerjaan`, `jenispekerjaan`) VALUES
(1, 'PETANI'),
(2, 'PNS'),
(3, 'WIRASWASTA'),
(4, 'TNI'),
(5, 'POLRI'),
(7, 'MAHASISWA'),
(8, 'IBU RUMAH TANGGA'),
(9, 'PENGANGGURAN'),
(10, 'PELAJAR');

-- --------------------------------------------------------

--
-- Table structure for table `penddidikan`
--

DROP TABLE IF EXISTS `penddidikan`;
CREATE TABLE `penddidikan` (
  `idpendidikan` int(10) NOT NULL,
  `jenispendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penddidikan`
--

INSERT INTO `penddidikan` (`idpendidikan`, `jenispendidikan`) VALUES
(1, 'TIDAK SEKOLAH'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA'),
(5, 'S1'),
(6, 'S2'),
(7, 'S3'),
(9, 'SMK'),
(10, 'TK/PAUD');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

DROP TABLE IF EXISTS `rt`;
CREATE TABLE `rt` (
  `idrt` int(10) NOT NULL,
  `namart` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`idrt`, `namart`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

DROP TABLE IF EXISTS `rw`;
CREATE TABLE `rw` (
  `idrw` int(10) NOT NULL,
  `namarw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`idrw`, `namarw`) VALUES
(1, '001'),
(2, '002'),
(3, '003'),
(4, '004'),
(5, '005'),
(6, '006'),
(7, '007'),
(8, '008'),
(9, '009'),
(10, '010');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `iduser` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `user`, `pass`, `nama`) VALUES
(1, 'admin', '080402', 'JHESLIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`idagama`);

--
-- Indexes for table `desakelurahan`
--
ALTER TABLE `desakelurahan`
  ADD PRIMARY KEY (`iddesa`);

--
-- Indexes for table `kecematan`
--
ALTER TABLE `kecematan`
  ADD PRIMARY KEY (`idkecematan`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`idkk`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`idpekerjaan`);

--
-- Indexes for table `penddidikan`
--
ALTER TABLE `penddidikan`
  ADD PRIMARY KEY (`idpendidikan`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`idrt`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`idrw`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `idagama` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desakelurahan`
--
ALTER TABLE `desakelurahan`
  MODIFY `iddesa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kecematan`
--
ALTER TABLE `kecematan`
  MODIFY `idkecematan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `idkk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `idpekerjaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penddidikan`
--
ALTER TABLE `penddidikan`
  MODIFY `idpendidikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `idrt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `idrw` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
