-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.infinityfree.com
-- Generation Time: Nov 17, 2023 at 09:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35285348_simklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `KodeDokter` varchar(30) NOT NULL,
  `NamaDokter` varchar(50) NOT NULL,
  `Sex` enum('Perempuan','Laki-Laki') NOT NULL,
  `TempatLahir` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelepon` varchar(15) NOT NULL,
  `SIP` varchar(30) DEFAULT NULL,
  `Spesialisasi` varchar(100) DEFAULT NULL,
  `BagiHsil` double(5,2) DEFAULT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `KodeObat` varchar(30) NOT NULL,
  `NamaObat` varchar(50) NOT NULL,
  `HargaModal` double(15,2) DEFAULT NULL,
  `HargaJual` double(15,2) DEFAULT NULL,
  `Stok` double(15,2) DEFAULT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `NomorRekamMedik` varchar(30) NOT NULL,
  `NamaPasien` varchar(50) NOT NULL,
  `NomorIdentitas` varchar(30) NOT NULL,
  `JenisKelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `GolonganDarah` enum('O','A','B','AB') NOT NULL,
  `Agama` enum('Islam','Katolik','Kristen','Hindu','Budha') NOT NULL,
  `TempatLahir` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `NoTelepon` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `StatusNikah` enum('Nikah','Belum Nikah','Janda','Duda') NOT NULL,
  `Pekerjaan` varchar(15) DEFAULT NULL,
  `NamaKerabat` varchar(50) DEFAULT NULL,
  `StatusKerabat` enum('Ayah','Ibu','Suami','Istri','Anak','Saudara','Lain-Lain') DEFAULT NULL,
  `NoTeleponKerabat` varchar(15) DEFAULT NULL,
  `TanggalRekam` datetime NOT NULL DEFAULT current_timestamp(),
  `KodePetugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `IdDaftar` int(11) NOT NULL,
  `NomorRekamMedik` varchar(30) NOT NULL,
  `WaktuDaftar` datetime NOT NULL DEFAULT current_timestamp(),
  `WaktuJanji` datetime DEFAULT current_timestamp(),
  `Keluhan` text NOT NULL,
  `Diagnosa` text NOT NULL,
  `NomorAntri` int(11) NOT NULL,
  `KodePetugas` varchar(10) NOT NULL,
  `KodeDokter` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `KodePetugas` varchar(10) NOT NULL,
  `NamaPetugas` varchar(50) NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rawatobat`
--

CREATE TABLE `rawatobat` (
  `IdRawatObat` int(11) NOT NULL,
  `KodeObat` varchar(30) NOT NULL,
  `IdDaftar` int(11) NOT NULL,
  `Dosis` int(11) NOT NULL,
  `KodePetugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rawattindakan`
--

CREATE TABLE `rawattindakan` (
  `IdRawatTindakan` int(11) NOT NULL,
  `IdDaftar` int(11) NOT NULL,
  `NomorRekamMedik` varchar(30) NOT NULL,
  `WaktuTindakan` datetime NOT NULL DEFAULT current_timestamp(),
  `KodeTindakan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `KodeTindakan` varchar(4) NOT NULL,
  `NamaTindakan` varchar(50) NOT NULL,
  `Harga` double(12,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`KodeDokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`KodeObat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`NomorRekamMedik`),
  ADD KEY `KodePetugas` (`KodePetugas`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`IdDaftar`),
  ADD KEY `IndexNoRM` (`NomorRekamMedik`),
  ADD KEY `KodeDokter` (`KodeDokter`),
  ADD KEY `KodePetugas` (`KodePetugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`KodePetugas`);

--
-- Indexes for table `rawatobat`
--
ALTER TABLE `rawatobat`
  ADD PRIMARY KEY (`IdRawatObat`),
  ADD KEY `IndexKodeObat` (`KodeObat`),
  ADD KEY `IdDaftar` (`IdDaftar`),
  ADD KEY `KodePetugas` (`KodePetugas`),
  ADD KEY `KodePetugas_2` (`KodePetugas`);

--
-- Indexes for table `rawattindakan`
--
ALTER TABLE `rawattindakan`
  ADD PRIMARY KEY (`IdRawatTindakan`),
  ADD KEY `IndexIdDaftar` (`IdDaftar`),
  ADD KEY `KodeTindakan` (`KodeTindakan`),
  ADD KEY `NomorRekamMedik` (`NomorRekamMedik`),
  ADD KEY `IdDaftar` (`IdDaftar`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`KodeTindakan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `IdDaftar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawatobat`
--
ALTER TABLE `rawatobat`
  MODIFY `IdRawatObat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rawattindakan`
--
ALTER TABLE `rawattindakan`
  MODIFY `IdRawatTindakan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`NomorRekamMedik`) REFERENCES `pasien` (`NomorRekamMedik`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`KodeDokter`) REFERENCES `dokter` (`KodeDokter`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`KodePetugas`) REFERENCES `petugas` (`KodePetugas`);

--
-- Constraints for table `rawatobat`
--
ALTER TABLE `rawatobat`
  ADD CONSTRAINT `rawatobat_ibfk_1` FOREIGN KEY (`IdDaftar`) REFERENCES `pendaftaran` (`IdDaftar`),
  ADD CONSTRAINT `rawatobat_ibfk_2` FOREIGN KEY (`KodeObat`) REFERENCES `obat` (`KodeObat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
