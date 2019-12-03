-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 03:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(5) NOT NULL,
  `judul_kegiatan` varchar(45) NOT NULL,
  `kategori_kegiatan` varchar(100) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul_kegiatan`, `kategori_kegiatan`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `sifat`) VALUES
('kr001', 'Harga Tanah', '', 4, 1, 2, 3, 4, 5, 'benefit'),
('kr002', 'UMR', '', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr003', 'Pajak', '', 3, 1, 2, 3, 4, 5, 'benefit'),
('kr004', 'Suplai Air', '', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr005', 'SDM', '', 2, 1, 2, 3, 4, 5, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_peserta` varchar(7) NOT NULL,
  `id_kegiatan` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_peserta`, `id_kegiatan`, `nilai`) VALUES
(1, 'al001', 'kr001', 2),
(2, 'al001', 'kr002', 2),
(3, 'al001', 'kr003', 3),
(4, 'al001', 'kr004', 4),
(5, 'al001', 'kr005', 2),
(6, 'al002', 'kr001', 2),
(7, 'al002', 'kr002', 2),
(8, 'al002', 'kr003', 3),
(9, 'al002', 'kr004', 4),
(10, 'al002', 'kr005', 4),
(11, 'al003', 'kr001', 3),
(12, 'al003', 'kr002', 3),
(13, 'al003', 'kr003', 2),
(14, 'al003', 'kr004', 2),
(15, 'al003', 'kr005', 1),
(16, 'al004', 'kr001', 5),
(17, 'al004', 'kr002', 4),
(18, 'al004', 'kr003', 3),
(19, 'al004', 'kr004', 3),
(20, 'al004', 'kr005', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id_pre` int(11) NOT NULL,
  `nm_peserta` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` varchar(5) NOT NULL,
  `nm_peserta` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nm_peserta`) VALUES
('al001', 'Daerah A'),
('al002', 'Daerah B'),
('al003', 'Daerah C'),
('al004', 'Daerah D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id_pre`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
