-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 07:10 PM
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
  `id_adm` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_adm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `username`, `password`, `nama_adm`) VALUES
(1, 'admin', 'admin', 'fahmi');

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id_lb` int(11) NOT NULL,
  `kat_lb` varchar(255) NOT NULL,
  `max_ps` int(11) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `venue_lb` varchar(255) NOT NULL,
  `waktu_lb` datetime NOT NULL,
  `waktu_selesai_lb` datetime NOT NULL,
  `biaya_lb` int(11) NOT NULL,
  `juara1` int(11) NOT NULL,
  `juara2` int(11) NOT NULL,
  `juara3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id_lb`, `kat_lb`, `max_ps`, `nama_pj`, `venue_lb`, `waktu_lb`, `waktu_selesai_lb`, `biaya_lb`, `juara1`, `juara2`, `juara3`) VALUES
(4, 'Lomba Makan Kerupuk', 50, 'Hadi', 'Aula Desa', '2023-11-16 10:19:00', '2023-11-02 22:18:00', 10000, 50000, 25000, 15000),
(5, 'Lomba Balap Sarung', 20, 'Tius', 'Gedung Dpr', '2023-11-23 13:50:00', '2023-11-23 16:00:00', 20000, 50000, 40000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_byr` int(11) NOT NULL,
  `id_dft` int(11) NOT NULL,
  `id_adm` int(11) NOT NULL,
  `tgl_byr` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_dft` int(11) NOT NULL,
  `no_ps` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `tgl_dft` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Matius Dimasas', '85125125', 'bekasi', 'LAKI-LAKI', '2023-11-24', '2023-11-23 00:13:20', 4, 10000, NULL),
(4, 'Siti', '0861273681', 'bekasi', 'PEREMPUAN', '2023-11-24', '2023-11-23 00:13:48', 5, 20000, 1),
(5, 'YAdi', '081238123', 'kalmina', 'LAKI-LAKI', '2023-11-08', '2023-11-23 01:09:14', 4, 10000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lb`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_byr`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_dft`);

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
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id_lb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_byr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_dft` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `no_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
