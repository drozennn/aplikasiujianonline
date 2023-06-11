-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 03:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_kuis_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_peserta`
--

CREATE TABLE `jawaban_peserta` (
  `id` int(10) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `id_soal` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban_peserta`
--

INSERT INTO `jawaban_peserta` (`id`, `jawaban`, `id_soal`, `id_user`) VALUES
(1, '2', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_soal`
--

CREATE TABLE `master_soal` (
  `id` int(10) NOT NULL,
  `soal` varchar(255) DEFAULT NULL,
  `jawaban_benar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `paket` varchar(10) DEFAULT NULL,
  `poin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_soal`
--

INSERT INTO `master_soal` (`id`, `soal`, `jawaban_benar`, `gambar`, `paket`, `poin`) VALUES
(1, '1 + 1 sama dengan = ?', '2', NULL, 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `token` int(50) NOT NULL,
  `nilai` int(10) DEFAULT NULL,
  `status` enum('belum','sudah','selesai') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `nama`, `nim`, `email`, `password`, `token`, `nilai`, `status`) VALUES
(2, 'test', 2107411031, 'test@gmail.com', '123', 12345, NULL, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE `opsi` (
  `id` int(10) NOT NULL,
  `id_soal` int(10) DEFAULT NULL,
  `opsi_1` varchar(255) DEFAULT NULL,
  `opsi_2` varchar(255) DEFAULT NULL,
  `opsi_3` varchar(255) DEFAULT NULL,
  `opsi_4` varchar(255) DEFAULT NULL,
  `opsi_5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id`, `id_soal`, `opsi_1`, `opsi_2`, `opsi_3`, `opsi_4`, `opsi_5`) VALUES
(1, 1, '1', '2', '3', '4', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jawabansoal` (`id_soal`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `master_soal`
--
ALTER TABLE `master_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opsi`
--
ALTER TABLE `opsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soal` (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_soal`
--
ALTER TABLE `master_soal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `opsi`
--
ALTER TABLE `opsi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD CONSTRAINT `fk_jawabansoal` FOREIGN KEY (`id_soal`) REFERENCES `master_soal` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `master_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `opsi`
--
ALTER TABLE `opsi`
  ADD CONSTRAINT `fk_soal` FOREIGN KEY (`id_soal`) REFERENCES `master_soal` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
