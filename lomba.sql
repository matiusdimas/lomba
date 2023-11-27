-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 12:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lomba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` enum('ADMIN','USER') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `role`, `alamat`, `no_hp`) VALUES
(2, 'ucup', 'ucup', 'ucup', 'USER', 'bekasi', '0192380912'),
(3, 'lomba17', '$2y$10$1Sj1.fYbCeXB9V5sIx9vE.JhsFfVpS5sYnXG7sdEMb41TVcDxTuT.', 'matius dimas', 'ADMIN', 'bekasi', '09812038'),
(4, 'matius', '$2y$10$jySCaUEd9KCBwN/wuHV4H.K9WYADwO73S2Z7yxOCZ9nVxnHYd.VKW', 'prasetia dimas', 'USER', 'bekasi', '089378173');

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id_lb` int(11) NOT NULL,
  `kat_lb` varchar(255) NOT NULL,
  `max_ps` int(11) NOT NULL,
  `total_ps` int(11) DEFAULT 0,
  `nama_pj` varchar(255) NOT NULL,
  `venue_lb` varchar(255) NOT NULL,
  `waktu_lb` datetime NOT NULL,
  `waktu_selesai_lb` datetime NOT NULL,
  `biaya_lb` int(11) NOT NULL,
  `juara1` int(11) NOT NULL,
  `juara2` int(11) NOT NULL,
  `juara3` int(11) NOT NULL,
  `usia_min` int(11) NOT NULL,
  `usia_max` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id_lb`, `kat_lb`, `max_ps`, `total_ps`, `nama_pj`, `venue_lb`, `waktu_lb`, `waktu_selesai_lb`, `biaya_lb`, `juara1`, `juara2`, `juara3`, `usia_min`, `usia_max`, `gambar`) VALUES
(4, 'Lomba Makan Kerupuk 2023', 4, 2, 'Hadi (0821322)', 'Kampung Damai', '2023-11-16 10:19:00', '2023-11-02 22:18:00', 10000, 50000, 25000, 15000, 5, 10, 'img1701077002.jpg'),
(5, 'Lomba Balap Karung 2023', 20, 1, 'Tius (0821368724)', 'Kampung Rawa Rontek', '2023-11-23 13:50:00', '2023-11-23 16:00:00', 10000, 50000, 40000, 30000, 5, 10, 'img1701077196.jpg'),
(6, 'Lomba Estafet 2023', 20, 0, 'hadji (081239813)', 'Kampung Barat', '2023-08-17 16:27:00', '2023-08-17 18:28:00', 10000, 100000, 50000, 20000, 5, 10, 'img1701077441.jpg'),
(7, 'Lomba Tarik Tambang 2023', 30, 0, 'udin (08120312038)', 'Kampung Timur', '2023-08-17 16:31:00', '2023-08-17 19:31:00', 10000, 10000000, 5000000, 2500000, 18, 30, 'img1701077552.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `no_ps` int(11) NOT NULL,
  `nama_ps` varchar(255) NOT NULL,
  `hp_ps` varchar(255) NOT NULL,
  `alamat_ps` varchar(255) NOT NULL,
  `jk_ps` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `id_lb` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `juara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`no_ps`, `nama_ps`, `hp_ps`, `alamat_ps`, `jk_ps`, `tgl_lahir`, `tgl_daftar`, `id_lb`, `bayar`, `juara`) VALUES
(3, 'Matius Dimasas', '85125125', 'bekasi', 'LAKI-LAKI', '2016-10-24', '2023-11-23 00:13:20', 4, 10000, 0),
(4, 'Siti', '0861273681', 'bekasi', 'PEREMPUAN', '2015-01-24', '2023-11-23 00:13:48', 5, 20000, 1),
(6, 'jodi', '08345234', 'kalimalang', 'LAKI-LAKI', '2015-06-23', '2023-11-23 13:43:38', 4, 10000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lb`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`no_ps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id_lb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `no_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
