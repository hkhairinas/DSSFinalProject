-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 05:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`) VALUES
(21, 'Budi Handayani'),
(23, 'Hani Sugiarto'),
(28, 'Sekar Hanum');

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `atribut` enum('Cost','Benefit','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `atribut`) VALUES
(35, 'Berprilaku Baik', 'Benefit'),
(34, 'IPK', 'Benefit'),
(38, 'Penghasilan Orang Tua', 'Cost'),
(39, 'Usia', 'Benefit'),
(40, 'Dokumen Kelengkapan', 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(22, 21, 34, 0.23151),
(23, 21, 35, 0.135101),
(24, 21, 38, 0.0972879),
(25, 21, 39, 0.0749296),
(26, 21, 40, 0.0365886),
(27, 23, 34, 0.234817),
(28, 23, 35, 0.13828),
(29, 23, 38, 0.0962417),
(30, 23, 39, 0.0784977),
(31, 23, 40, 0.036219),
(32, 28, 34, 0.232171),
(33, 28, 35, 0.133511),
(34, 28, 38, 0.098334),
(35, 28, 39, 0.0713616),
(36, 28, 40, 0.0369582);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(20, 21, 23, 34, 3),
(44, 23, 28, 39, 0.5),
(22, 21, 28, 34, 1),
(43, 21, 28, 39, 0.5),
(42, 21, 23, 39, 1),
(27, 23, 28, 34, 0.5),
(41, 23, 28, 38, 0.5),
(30, 21, 23, 35, 0.333333),
(32, 21, 28, 35, 1),
(40, 21, 28, 38, 0.333333),
(47, 23, 28, 40, 0.5),
(39, 21, 23, 38, 1),
(46, 21, 28, 40, 1),
(37, 23, 28, 35, 2),
(45, 21, 23, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(29, 39, 40, 3),
(28, 38, 40, 3),
(27, 38, 39, 2),
(26, 35, 40, 3),
(25, 35, 39, 2),
(24, 35, 38, 2),
(23, 34, 40, 5),
(22, 34, 39, 3),
(21, 34, 38, 3),
(20, 34, 35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(51, 21, 35, 0.210606),
(50, 28, 34, 0.387302),
(59, 21, 39, 0.25),
(48, 23, 34, 0.169841),
(57, 23, 38, 0.240909),
(46, 21, 34, 0.442857),
(56, 21, 38, 0.210606),
(53, 23, 35, 0.548485),
(58, 28, 38, 0.548485),
(55, 28, 35, 0.240909),
(60, 23, 39, 0.25),
(61, 28, 39, 0.5),
(62, 21, 40, 0.442857),
(63, 23, 40, 0.169841),
(64, 28, 40, 0.387302);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(40, 0.0633755),
(39, 0.12988),
(38, 0.168514),
(35, 0.234944),
(34, 0.403286);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_alternatif`, `nilai`) VALUES
(21, 0.325407),
(23, 0.271865),
(28, 0.402728);

-- --------------------------------------------------------

--
-- Table structure for table `topsis`
--

CREATE TABLE `topsis` (
  `id` int(11) NOT NULL,
  `id_alter` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `pangkat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topsis`
--

INSERT INTO `topsis` (`id`, `id_alter`, `id_kriteria`, `nilai`, `pangkat`) VALUES
(86, 21, 34, 3.5, 12.25),
(87, 21, 35, 85, 7225),
(88, 21, 38, 4650000, 21622500000000),
(89, 21, 39, 21, 441),
(90, 21, 40, 99, 9801),
(91, 23, 34, 3.55, 12.6025),
(92, 23, 35, 87, 7569),
(93, 23, 38, 4600000, 21160000000000),
(94, 23, 39, 22, 484),
(95, 23, 40, 98, 9604),
(96, 28, 34, 3.51, 12.3201),
(97, 28, 35, 84, 7056),
(98, 28, 38, 4700000, 22090000000000),
(99, 28, 39, 20, 400),
(100, 28, 40, 100, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `topsis_rank`
--

CREATE TABLE `topsis_rank` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `max` float NOT NULL,
  `min` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topsis_rank`
--

INSERT INTO `topsis_rank` (`id`, `id_alternatif`, `max`, `min`) VALUES
(19, 21, 0.00591663, 0.00406067),
(20, 23, 0.000000545408, 0.00946176),
(21, 28, 0.00925139, 0.000661439);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `topsis`
--
ALTER TABLE `topsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topsis_rank`
--
ALTER TABLE `topsis_rank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `topsis`
--
ALTER TABLE `topsis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `topsis_rank`
--
ALTER TABLE `topsis_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
