-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 19 Apr 2017 pada 09.42
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('al001', 'Daerah A'),
('al002', 'Daerah B'),
('al003', 'Daerah C'),
('al004', 'Daerah D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `sifat` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `sifat`) VALUES
('kr001', 'Harga Tanah', 4, 1, 2, 3, 4, 5, 'benefit'),
('kr002', 'UMR', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr003', 'Pajak', 3, 1, 2, 3, 4, 5, 'benefit'),
('kr004', 'Suplai Air', 5, 1, 2, 3, 4, 5, 'benefit'),
('kr005', 'SDM', 2, 1, 2, 3, 4, 5, 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_matrik`
--

CREATE TABLE IF NOT EXISTS `nilai_matrik` (
  `id_matrik` int(7) NOT NULL AUTO_INCREMENT,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL,
  PRIMARY KEY (`id_matrik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data untuk tabel `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(87, 'al006', 'kr007', 0.75),
(88, 'al006', 'kr008', 0.5),
(89, 'al001', 'kr001', 2),
(90, 'al001', 'kr002', 2),
(91, 'al001', 'kr003', 2),
(92, 'al001', 'kr004', 4),
(93, 'al001', 'kr005', 5),
(94, 'al002', 'kr001', 4),
(95, 'al002', 'kr002', 4),
(96, 'al002', 'kr003', 3),
(97, 'al002', 'kr004', 3),
(98, 'al002', 'kr005', 2),
(99, 'al003', 'kr001', 2),
(100, 'al003', 'kr002', 3),
(101, 'al003', 'kr003', 2),
(102, 'al003', 'kr004', 4),
(103, 'al003', 'kr005', 4),
(104, 'al004', 'kr001', 3),
(105, 'al004', 'kr002', 4),
(106, 'al004', 'kr003', 5),
(107, 'al004', 'kr004', 5),
(108, 'al004', 'kr005', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_preferensi`
--

CREATE TABLE IF NOT EXISTS `nilai_preferensi` (
  `id_pre` int(11) NOT NULL AUTO_INCREMENT,
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL,
  PRIMARY KEY (`id_pre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
