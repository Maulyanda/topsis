-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 03:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `sifat`) VALUES
('kr002', 'Grade', 4, 1, 2, 3, 4, 5, 'cost'),
('kr003', 'Sertifikasi', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr004', 'Keikutsertaan', 3, 1, 2, 3, 4, 5, 'cost'),
('kr005', 'Tema', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr006', 'Kedisiplinan', 2, 1, 2, 3, 4, 5, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_peserta` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_peserta`, `id_kriteria`, `nilai`) VALUES
(91, 'al001', 'kr002', 1),
(92, 'al001', 'kr003', 2),
(93, 'al001', 'kr004', 3),
(94, 'al001', 'kr005', 2),
(95, 'al001', 'kr006', 2),
(96, 'al002', 'kr002', 2),
(97, 'al002', 'kr003', 1),
(98, 'al002', 'kr004', 3),
(99, 'al002', 'kr005', 2),
(100, 'al002', 'kr006', 3),
(101, 'al003', 'kr002', 1),
(102, 'al003', 'kr003', 1),
(103, 'al003', 'kr004', 2),
(104, 'al003', 'kr005', 3),
(105, 'al003', 'kr006', 5),
(106, 'al004', 'kr002', 3),
(107, 'al004', 'kr003', 2),
(108, 'al004', 'kr004', 2),
(109, 'al004', 'kr005', 3),
(110, 'al004', 'kr006', 1),
(111, 'al005', 'kr002', 1),
(112, 'al005', 'kr003', 3),
(113, 'al005', 'kr004', 2),
(114, 'al005', 'kr005', 1),
(115, 'al005', 'kr006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id_pre` int(11) NOT NULL,
  `nm_peserta` varchar(35) NOT NULL,
  `nilai` double NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` varchar(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nm_peserta` varchar(35) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `judul`, `nm_peserta`, `tanggal`) VALUES
('al001', 'Seminar ajglkjajkahsfkj', 'Deni Murdani', '0000-00-00'),
('al002', 'Diklat jkcjkdahkldhas', 'R.Swasono Amoeng Widodo', '0000-00-00'),
('al003', '', 'Rama Fikli', '0000-00-00'),
('al004', '', 'Beni Arief Budiman', '0000-00-00'),
('al005', '', 'Sudiyanto', '12/15/2019'),
('al006', 'Seminar ajglkjajkahsfkj', 'Deni Murdani', '12/15/2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Dieni Hanifah', 'dieni', '54c054bb61018ba3d1a28fc2d54670bf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
