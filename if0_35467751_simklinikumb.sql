-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.infinityfree.com
-- Generation Time: Dec 20, 2023 at 07:01 AM
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
-- Database: `if0_35467751_simklinikumb`
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

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`KodeDokter`, `NamaDokter`, `Sex`, `TempatLahir`, `TanggalLahir`, `Alamat`, `NoTelepon`, `SIP`, `Spesialisasi`, `BagiHsil`, `Password`) VALUES
('02290703', 'Dr. M. Ichsan N.', 'Laki-Laki', 'Bengkulu', '2003-07-29', 'Bengkulu', '6281366880', '123/SIP/Dinkes/RI-2020', 'Kebidanan', 999.99, '02290703'),
('1234567890', 'Dr. Yelica Rachmat, SPPD.', 'Perempuan', 'Yugoslavia', '1970-01-01', 'Bandung', '62812121212', '123/SIP/Dinkes/RI-2020', 'Penyakit Dalam', 999.99, '1234567890'),
('2214201039', 'Ananda Ricky ', 'Perempuan', 'Aceh', '2023-12-07', 'Ananda Ricky ', '082281371727', '2214201039', 'Bedah', 999.99, '2214201039');

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

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`KodeObat`, `NamaObat`, `HargaModal`, `HargaJual`, `Stok`, `Keterangan`) VALUES
('1234567890', 'Paracetamol 500 mg', 6000.00, 6500.00, 100.00, 'Analgesik dan pereda sakit');

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

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`NomorRekamMedik`, `NamaPasien`, `NomorIdentitas`, `JenisKelamin`, `GolonganDarah`, `Agama`, `TempatLahir`, `TanggalLahir`, `NoTelepon`, `Alamat`, `StatusNikah`, `Pekerjaan`, `NamaKerabat`, `StatusKerabat`, `NoTeleponKerabat`, `TanggalRekam`, `KodePetugas`) VALUES
('', 'Winasya', '12345678', 'Perempuan', 'O', 'Islam', 'Lubuk pinang', '2012-12-17', '082315320768', 'Desa lubuk pinang,kabupaten mukomuko,provinsi bengkulu ', 'Belum Nikah', 'Mahasiswa ', 'Azwar', 'Ayah', '085975384071', '2023-12-06 22:13:14', 'Admin'),
('02039', 'Cici gendeng', '1679939072652345', 'Perempuan', 'O', 'Islam', 'Lubuklinggau', '2022-11-07', '085212391890', '', 'Belum Nikah', 'Pelajar', 'Via', 'Ayah', '082267987056', '2023-12-07 01:26:23', 'Admin'),
('021012', 'Harry Witriyono', '1771064802710001', 'Laki-laki', 'O', 'Islam', 'Cirebon', '1969-12-10', '08153902534', 'Bengkulu', 'Nikah', 'Dosen', 'Isti Herlena', 'Istri', '81217533304', '2023-11-29 13:24:06', 'Admin'),
('02101212', 'Isti Herlena', '1771064802710001', 'Perempuan', 'AB', 'Islam', 'Coko Enau', '1971-02-08', '08153902534', 'Kebun Kiwat', 'Nikah', 'Guru', 'Harry Witriyono', 'Suami', '8153902534', '2023-11-30 10:52:25', 'Admin'),
('040804', 'Suci chintia gunaska putri', '1633221124264388', 'Perempuan', 'O', 'Islam', 'Muko muko', '2010-12-07', '085212391890', 'Muko muko', 'Nikah', 'Ibu rumah tangg', 'Boy', 'Ayah', '082133982086', '2023-12-07 01:30:12', 'Admin'),
('1234567', 'Deva aprilia putri', '', 'Perempuan', 'O', 'Islam', 'Bengkulu 23-062002', '0000-00-00', '087659234577', '', 'Belum Nikah', 'Mahasiswa', 'Noni', 'Saudara', '085634826533', '2023-12-07 01:26:07', 'Admin'),
('12345678', 'Putri y', '2214201038', 'Perempuan', 'A', 'Islam', 'Bengkulu', '2001-07-07', '083165646388', 'Jl semangaka', 'Belum Nikah', 'Mahasiswa', 'Sella', 'Saudara', '083165646388', '2023-12-07 01:30:28', '2214201017'),
('200803', 'Indri Selvianisa ', '2214201019', 'Perempuan', 'AB', 'Islam', 'Bengkulu Utara ', '2003-08-20', '082278381455', 'Bengkulu Utara ', 'Belum Nikah', 'Pelajar', 'Anisa', 'Ibu', '082278382011', '2023-12-07 01:30:01', 'Admin'),
('2014201043', 'David Liandra', '2014201043', 'Laki-laki', 'O', 'Islam', 'Kota Bengkulu', '2000-11-18', '085156260733', 'Bentiring,kota bengkulu', 'Belum Nikah', 'Mahasiswa', 'Nike', 'Istri', '085156260733', '2023-12-07 01:34:09', '2214201017'),
('20220303088', 'Putri Regina Salines', '20220303088', 'Perempuan', 'B', 'Islam', 'Jakarta', '2002-04-18', '085158901829', 'Tangerang, Banten', 'Belum Nikah', 'Mahasiswa', 'Nurcahyo', 'Ayah', '085313513136', '2023-12-06 22:17:24', 'Admin'),
('2022121003', 'Lamalif findria nisa ', '2022121003', 'Perempuan', 'B', 'Islam', '', '2004-09-05', '', 'Pati, Jawa Tengah ', 'Belum Nikah', 'Mahasiswa ', 'Nisa', 'Saudara', '089503300579', '2023-12-06 22:15:15', 'Admin'),
('221420', 'Welda Putri ', '2215201014', 'Perempuan', 'A', 'Islam', 'Bungin tambun 1 ', '2004-11-15', '085369324235', 'Bungin tambun 1 ', 'Belum Nikah', 'Swasta ', 'Tora', 'Saudara', '085369324235', '2023-12-07 01:28:55', 'Admin'),
('2214201008', 'Tiara Tilova', '2214201008', 'Perempuan', 'A', 'Islam', 'Bengkulu', '2004-06-25', '082269945043', 'Seluma', 'Belum Nikah', 'Mahasiswa', 'Yudi', 'Ayah', '081369955565', '2023-12-07 01:32:14', 'Admin'),
('2214201011', 'Riri hartika', '2214201011', 'Perempuan', 'AB', 'Islam', 'Bengkulu utara', '2004-05-29', '082281072421', 'Bengkulu utara', 'Nikah', 'Perawat', 'Min yoongi', 'Suami', '082281072124', '2023-12-07 01:32:38', 'Admin'),
('22142010131', 'Deva aprilia putri', '2214201031', 'Perempuan', 'O', 'Islam', 'Bengkulu 28-07-2002', '2008-12-28', '087659234577', '', 'Belum Nikah', 'Mahasiswa', '', 'Ayah', '085634826533', '2023-12-07 01:29:38', 'Admin'),
('2214201015', 'Vioza Anggraeni', '123456789', 'Perempuan', 'O', 'Islam', 'Bengkulu', '2023-12-07', '085678912345', 'Kota bengkulu', 'Belum Nikah', 'Perawat', 'Johri', 'Saudara', '081234567891', '2023-12-07 01:32:34', 'Admin'),
('2214201016', 'Nelza nopita', '2214201016', 'Perempuan', 'A', 'Islam', 'Aturanmumpo', '2003-11-11', '', 'Jl kapuas', 'Belum Nikah', 'Mahasiswa', 'Winasya', 'Saudara', '', '2023-12-07 01:25:56', 'Admin'),
('2214201019', 'Indri Selvianisa ', '2214201019', 'Perempuan', 'AB', 'Islam', 'Bengkulu Utara ', '2023-12-07', '082278381455', '', 'Belum Nikah', 'Pelajar', 'Suwardi', 'Ayah', '082278382011', '2023-12-07 01:33:55', 'Admin'),
('2214201022', 'Cindi Ade ', '', 'Perempuan', 'AB', 'Islam', 'Kota donok', '2023-12-04', '082282635619', 'Lebong ', 'Belum Nikah', 'Mahasiswa ', '', 'Ayah', '082279892817', '2023-12-07 01:26:23', 'Admin'),
('2214201023', 'Dwi Salsabilla ', '222', 'Perempuan', 'A', 'Islam', 'Medan jaya', '2023-09-01', '085379154606', 'Ipuh', 'Belum Nikah', 'Mahasiswa ', 'Nanda', 'Saudara', '0812134506', '2023-12-07 01:26:58', 'Admin'),
('2214201025', 'Rika Riana ', '224201025', 'Perempuan', 'AB', 'Islam', 'Talang Curup ', '2004-01-07', '082383374203', 'Talang Curup Bengkulu Utara ', 'Belum Nikah', 'Mahasiswa ', 'Rike riana', 'Saudara', '082383374203', '2023-12-07 01:32:44', '2214201017'),
('2214201030', 'Erma Febriyani', '2214201030', 'Perempuan', 'B', 'Islam', 'Kota Bengkulu', '2004-02-19', '0895411676852', 'Rawa makmur', 'Belum Nikah', 'Mahasiswa', 'Ermi Dawati', 'Ibu', '085380057977', '2023-12-07 01:33:21', 'Admin'),
('2214201038', 'Putri y', '12345678', 'Perempuan', 'A', 'Islam', 'Bengkulu', '2001-07-16', '0831638272', 'Jl semangka', 'Belum Nikah', 'Mahasiswa', 'Sella', 'Saudara', '083165646388', '2023-12-07 01:39:27', '2214201017'),
('2214201039', 'Ananda Ricky ', '2214201039', 'Perempuan', 'O', 'Islam', 'Aceh', '2023-12-07', '082281371727', '', 'Nikah', 'Pelajar', 'Kim taehyung', 'Suami', '082281371727', '2023-12-07 01:31:07', 'Admin'),
('2214201045', 'Shalu Mellda Caroline', '2214201045', 'Perempuan', 'O', 'Islam', 'Lubuklinggau', '2023-12-31', '082177638300', 'Lubuklinggau', 'Belum Nikah', 'Mahasiswa', 'Nia Caroline', 'Saudara', '081377548024', '2023-12-07 01:31:02', 'Admin'),
('2214201049', 'Ananda Ricky ', '2214201039', 'Perempuan', 'O', 'Islam', 'Aceh', '2004-07-22', '082281371727', 'Bentiring', 'Belum Nikah', 'Pelajar', 'Toto', 'Ayah', '082281371727', '2023-12-07 01:28:08', 'Admin'),
('2214201090', 'KHARISMA SARI PALINGGA ', '1673084410040002', 'Perempuan', 'B', 'Islam', 'LUBUKLINGGAU', '2004-10-04', '085709094709', 'Jl.Gelatix 9', 'Belum Nikah', 'Mahasiswa ', 'M.Amin', 'Ayah', '085709094709', '2023-12-06 22:16:39', 'Admin'),
('2214201093', 'Cut Abel Aprilia', '2214201093', 'Perempuan', 'B', 'Islam', 'Sambirejo', '2004-03-31', '082181261382', 'Curup', 'Belum Nikah', 'Mahasiswa', 'Sudarman', 'Ayah', '081271156436', '2023-12-06 22:17:44', 'Admin'),
('2214201098', 'Winasya', '12345678', 'Perempuan', 'O', 'Islam', 'Lubuk pinang', '2012-12-17', '082315320768', 'Desa lubuk pinang,kabupaten mukomuko,provinsi bengkulu ', 'Belum Nikah', 'Mahasiswa ', 'Azwar', 'Ayah', '085975384071', '2023-12-06 22:15:17', 'Admin'),
('2214201105', 'Ayu Diliani', '2214201105', 'Perempuan', 'B', 'Islam', 'Pekan baru', '2003-06-07', '0831â€‘5006â€‘5', 'Tuguhiu', 'Belum Nikah', 'Mahasiswa', 'Sudir tanjung', 'Ayah', '081273420112', '2023-12-06 22:10:09', 'Admin'),
('2214201113', 'Sindi legita nopiyanti', '', 'Perempuan', 'A', 'Islam', 'Kepahiang', '2003-08-08', '082180593861', '', 'Belum Nikah', 'Mahasiswi', 'Riza', 'Lain-Lain', '081369561434', '2023-12-06 22:09:40', 'Admin'),
('2214201118', 'Riza fitria ningsih', '1702066603040003', 'Perempuan', 'A', 'Islam', 'Lubuk mumpo ', '2004-03-26', '083171930638', 'Hibrida x', 'Belum Nikah', 'Maha siswa ', 'Syarniwirawan', 'Ayah', '083171930638', '2023-12-06 22:13:18', 'Admin'),
('2214201121', 'Deni saputra', '', 'Laki-laki', 'B', 'Islam', 'Karang dapo', '2004-07-05', '085747978705', 'Karang dapo', 'Belum Nikah', 'Petani', 'Ari saputra', 'Lain-Lain', '', '2023-12-06 22:19:34', 'Admin'),
('2345678', 'Afrianti', '21042003', 'Perempuan', 'AB', 'Islam', 'Bengkulu', '2001-11-14', '089506652000', 'Jl. Raya bengkulu', 'Belum Nikah', 'Mahasiswa', '', 'Saudara', '083106010507', '2023-12-07 01:27:06', '2214201017');

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

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`IdDaftar`, `NomorRekamMedik`, `WaktuDaftar`, `WaktuJanji`, `Keluhan`, `Diagnosa`, `NomorAntri`, `KodePetugas`, `KodeDokter`) VALUES
(3, '021012', '2023-12-06 22:10:32', '2023-12-06 22:10:32', 'Sakit pada pinggang', '', 0, 'Admin', '1234567890'),
(4, '2214201105', '2023-12-06 22:10:47', '2023-12-06 22:10:47', 'Sakit kepala', '', 0, 'Admin', '1234567890'),
(5, '2214201113', '2023-12-06 22:11:07', '2023-12-06 22:11:07', 'Sakit kepala', '', 0, 'Admin', '1234567890'),
(7, '021012', '2023-12-06 22:12:45', '2023-12-06 22:12:45', 'sakit hati', '', 0, 'Admin', '1234567890'),
(8, '021012', '2023-12-06 22:12:49', '2023-12-06 22:12:49', 'sakit hati', '', 0, 'Admin', '1234567890'),
(11, '2214201118', '2023-12-06 22:14:10', '2023-12-06 22:14:10', 'Sakit gigi', '', 0, 'Admin', '02290703'),
(12, '021012', '2023-12-06 22:14:31', '2023-12-06 22:14:31', 'Sakit kepala', '', 0, 'Admin', '02290703'),
(13, '021012', '2023-12-06 22:15:10', '2023-12-06 22:15:10', 'Sakit kepala', '', 0, 'Admin', '02290703'),
(14, '2214201090', '2023-12-06 22:16:42', '2023-12-06 22:16:42', 'Batuk Demam', '', 0, 'Admin', '1234567890'),
(15, '2022121003', '2023-12-06 22:16:59', '2023-12-06 22:16:59', 'panas, batuk, pilek', '', 0, 'Admin', '02290703'),
(16, '2214201098', '2023-12-06 22:17:37', '2023-12-06 22:17:37', 'Sakit perut ', '', 0, 'Admin', '02290703'),
(17, '021012', '2023-12-06 22:18:04', '2023-12-06 22:18:04', 'Sesak nafas', '', 0, 'Admin', '02290703'),
(18, '2214201093', '2023-12-06 22:18:21', '2023-12-06 22:18:21', 'Sakit perut', '', 0, 'Admin', '1234567890'),
(19, '2214201105', '2023-12-06 22:27:44', '2023-12-06 22:27:44', 'Sakit kepala', '', 0, 'Admin', '1234567890'),
(20, '2214201016', '2023-12-07 01:26:37', '2023-12-07 01:26:37', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(21, '2214201016', '2023-12-07 01:26:40', '2023-12-07 01:26:40', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(22, '2214201016', '2023-12-07 01:26:40', '2023-12-07 01:26:40', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(23, '2214201016', '2023-12-07 01:26:41', '2023-12-07 01:26:41', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(24, '2214201016', '2023-12-07 01:26:41', '2023-12-07 01:26:41', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(25, '2214201016', '2023-12-07 01:26:42', '2023-12-07 01:26:42', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(26, '2214201016', '2023-12-07 01:26:42', '2023-12-07 01:26:42', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(27, '2214201016', '2023-12-07 01:26:42', '2023-12-07 01:26:42', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(28, '2214201016', '2023-12-07 01:26:42', '2023-12-07 01:26:42', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(29, '2214201016', '2023-12-07 01:26:43', '2023-12-07 01:26:43', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(30, '2214201016', '2023-12-07 01:26:43', '2023-12-07 01:26:43', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(31, '2214201016', '2023-12-07 01:26:44', '2023-12-07 01:26:44', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(32, '2214201016', '2023-12-07 01:26:45', '2023-12-07 01:26:45', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(33, '2214201016', '2023-12-07 01:26:45', '2023-12-07 01:26:45', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(34, '2214201016', '2023-12-07 01:26:45', '2023-12-07 01:26:45', 'Sakit kepala mual mual', '', 0, 'Admin', '02290703'),
(35, '2214201016', '2023-12-07 01:26:53', '2023-12-07 01:26:53', 'Diare', '', 0, 'Admin', '02290703'),
(36, '2214201022', '2023-12-07 01:26:53', '2023-12-07 01:26:53', 'Susah buang air besar', '', 0, 'Admin', '02290703'),
(37, '2214201022', '2023-12-07 01:27:53', '2023-12-07 01:27:53', 'Batuk, susah buang air besar, sakit kepala', '', 0, 'Admin', '02290703'),
(38, '2345678', '2023-12-07 01:28:05', '2023-12-07 01:28:05', 'Muntah dan pusing', '', 0, '2214201017', '02290703'),
(39, '2214201023', '2023-12-07 01:28:11', '2023-12-07 01:28:11', 'Sakit hati', '', 0, 'Admin', '02290703'),
(40, '2214201049', '2023-12-07 01:30:26', '2023-12-07 01:30:26', 'Batuk berdahak, pusing, beserta flu ', '', 0, '2214201017', '02290703'),
(41, '12345678', '2023-12-07 01:30:58', '2023-12-07 01:30:58', 'Mual pusing batuk', '', 0, '2214201017', '02290703'),
(42, '2214201039', '2023-12-07 01:31:29', '2023-12-07 01:31:29', 'Sakit gigi', '', 0, 'Admin', '02290703'),
(43, '2214201045', '2023-12-07 01:31:55', '2023-12-07 01:31:55', 'Sakit Dompet', '', 0, 'Admin', '1234567890'),
(44, '2214201008', '2023-12-07 01:32:54', '2023-12-07 01:32:54', 'Sakit perut', '', 0, 'Admin', '02290703'),
(45, '2214201030', '2023-12-07 01:34:03', '2023-12-07 01:34:03', 'Demam sejak 3 hari terakhir disertai batuk dan pilek', '', 0, 'Admin', '1234567890'),
(46, '2214201011', '2023-12-07 01:34:28', '2023-12-07 01:34:28', 'Demam sejak 3 hari terakhir ', '', 0, 'Admin', '02290703'),
(47, '2014201043', '2023-12-07 01:34:43', '2023-12-07 01:34:43', 'Nyeri ulu hati,Mual,muntah,lemas', '', 0, '2214201017', '02290703'),
(48, '2214201019', '2023-12-07 01:34:48', '2023-12-07 01:34:48', 'Kantong kering', '', 0, 'Admin', '02290703'),
(49, '2214201038', '2023-12-07 01:40:05', '2023-12-07 01:40:05', 'Mual pusing', '', 0, '2214201017', '02290703');

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
  `Level` enum('Pendaftaran','Perawat','Laboran','Lain-lain') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`KodePetugas`, `NamaPetugas`, `NomorTelepon`, `Username`, `Password`, `Level`) VALUES
('0210126903', 'Harry Witriyono', '628153902534', '0210126903', '0210126903', 'Pendaftaran'),
('177106', 'Keb', '085783897780', 'Admin ', 'Admin', 'Pendaftaran'),
('2214201004', 'Raldi', '+62 81366158680', 'Raldi', 'Raldi23', 'Pendaftaran'),
('2214201008', 'Tiara Tilova', '082269945043', '2214201008', '8001024122', 'Perawat'),
('2214201011', 'Riri hartika', '082281072421', 'Riri hartika', '2214201011', 'Perawat'),
('2214201013', 'Rindiana samtia', '085821980687', 'Admin', '', 'Perawat'),
('2214201014', 'Welda Putri ', '085369324235', '2214201014', '2214201014', 'Perawat'),
('2214201016', 'Nelzanopita', '083852296198', 'Nelzanopita', '2214201016', 'Perawat'),
('2214201017', 'Afrianti', '08950665200', 'Admin', 'Admin', 'Pendaftaran'),
('2214201019', 'Indri Selvianisa ', '+6282268381455', '2214201019', '2314201019', 'Perawat'),
('2214201020', 'Tiara sagita', '083809362143', 'Tiara sagita', '2214201020', 'Perawat'),
('2214201022', 'Cindi Ade Aktalia', '085377003270', '2214201022', '2214201022', 'Perawat'),
('2214201023', 'Dwi Salsabilla ', '085379154606', '2214201023', '2214201023', 'Perawat'),
('2214201025', 'Via Puspita sari ', '083179552115', 'Via Puspita sari', '', 'Pendaftaran'),
('2214201027', 'Sundari sapitri ', '0895336534488', 'Sundari8', '', 'Perawat'),
('2214201028', 'Nia Anggraini', '08978211145', 'Nia anggraini', '07032004', 'Perawat'),
('2214201030', 'Erma Febriyani', '0895411676852', '2214201030', '2214201030', 'Perawat'),
('2214201031', 'Deva Aprilia Putri ', '085783897780', '2214201031', '1301024122', 'Pendaftaran'),
('2214201032', 'Ambar prayoga', '089653297710', '2214201032', '2214201032', 'Pendaftaran'),
('2214201035', 'Suci chintia gunaska putri', '085212391890', '2214201032', '2214201032', 'Pendaftaran'),
('2214201038', 'Putri Y', '083165646388', 'Admin', 'Admin', 'Pendaftaran'),
('2214201039', 'Ananda Ricky ', '082281371727', '2214201039', '', 'Perawat'),
('2214201042', 'Yisamastriana ', '085234483940', '2214201043', '2214201042', 'Perawat'),
('2214201043', 'Anike Endah Sari', '082256010735', '2214201043', '2214201043', 'Perawat'),
('2214201044', 'Chika putri', '083147625385', 'Chika putri', '2214201044', 'Perawat'),
('2214201045', 'Shalu Mellda Caroline', '082177638300', '2214201045', '2214201045', 'Perawat'),
('2214201047', 'M.nuzul Nopriansyah ', '082383374202', '2214201047', '2214201047', 'Perawat'),
('2214201048', 'Eka Aprilia Indah ', '082279892817', '2214201048', '2214201048', 'Perawat'),
('2214201049', 'Tata Tiara Oktaviani', '081341343525', '2214201049', '2214201049', 'Perawat'),
('222015', 'Hasbi Asidiki', '+62 8578910112', 'Simklinik', 'Simklinik23', 'Perawat'),
('Admin', 'Admin', '628153902534', 'Admin', 'Admin', 'Pendaftaran');

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
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`KodeTindakan`, `NamaTindakan`, `Harga`) VALUES
('RS00', 'Restitusi Anak-Anak', 175000),
('Pr01', 'Partus Normal', 3500000),
('CM00', 'Cek Medic Normal', 50000);

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
  MODIFY `IdDaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
