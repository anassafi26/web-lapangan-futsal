-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 07:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapangan_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(12) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_tlp`, `alamat`, `jenis_kelamin`, `password`) VALUES
(1, 'safi anas', '0895', 'donokerto', 'pria', '123'),
(2, 'reza zul', '089599177900', 'wonorejo', 'pria', '123'),
(3, 'hanif', '089599890900', 'perak', 'pria', '123'),
(4, 'tasya', '089599890988', 'kenjeran', 'wanita', '123'),
(5, 'wahyu', '081299890988', 'peneleh', 'pria', '123'),
(6, 'laily', '081299123988', 'kenjeran', 'wanita', '123'),
(7, 'sudirman', '081271123988', 'gembong', 'pria', '123'),
(8, 'ikbal', '081271155588', 'donorejo', 'pria', '123'),
(9, 'ina', '081271155523', 'kapasan', 'wanita', '123'),
(10, 'mitha', '081271911523', 'manyar', 'wanita', '123'),
(11, 'ridho', '085271911523', 'ampel', 'pria', '123'),
(12, 'bagas', '085271000523', 'pogot', 'pria', '123'),
(13, 'isa', '085271000023', 'pogot', 'pria', '123'),
(14, 'ilyas', '085974000023', 'pogot', 'pria', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `kd_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`kd_lapangan`, `nama_lapangan`, `keterangan`, `harga`, `id_admin`) VALUES
(1, 'lap 1', 'lt Vinyl', 90000, 1),
(2, 'lap 2', 'lt Vinyl', 90000, 2),
(3, 'lap 3', 'lt Vinyl', 90000, 3),
(4, 'lap 4', 'lt rumput sintetis', 80000, 4),
(5, 'lap 5', 'lt rumput sintetis', 80000, 5),
(6, 'lap 6', 'lt rumput sintetis', 80000, 6),
(7, 'lap 7', 'lt rumput sintetis', 80000, 7),
(8, 'lap 8', 'lt rumput sintetis', 80000, 8),
(9, 'lap 9', 'lt karpet plastik', 70000, 9),
(10, 'lap 10', 'lt karpet plastik', 70000, 10),
(11, 'lap 11', 'lt karpet plastik', 70000, 11),
(12, 'lap 12', 'lt semen', 50000, 12),
(13, 'lap 13', 'lt semen', 50000, 13),
(14, 'lap 14', 'lt semen', 50000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_booking` date NOT NULL,
  `kd_lapangan` int(11) DEFAULT NULL,
  `lama_sewa` varchar(20) NOT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_booking`, `kd_lapangan`, `lama_sewa`, `total_biaya`, `id_user`, `id_admin`) VALUES
(1, '2022-06-01', 1, '08.00-09.00', 90000, 1, 1),
(3, '2022-06-02', 2, '10.00-12.00', 180000, 3, 2),
(4, '2022-06-02', 3, '15.00-17.00', 180000, 4, 3),
(5, '2022-06-03', 14, '08.00-10.00', 100000, 5, 14),
(6, '2022-06-03', 11, '11.00-12.00', 70000, 6, 11),
(7, '2022-06-03', 10, '15.00-17.00', 140000, 7, 10),
(8, '2022-06-04', 1, '09.00-11.00', 180000, 8, 1),
(9, '2022-06-04', 3, '12.00-14.00', 180000, 9, 3),
(10, '2022-06-04', 2, '14.00-16.00', 180000, 10, 2),
(11, '2022-06-05', 6, '08.00-11.00', 240000, 11, 6),
(12, '2022-06-05', 5, '13.00-14.00', 80000, 12, 5),
(13, '2022-06-05', 1, '14.00-15.00', 90000, 13, 1),
(14, '2022-06-06', 1, '08.00-10.00', 180000, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_telp`) VALUES
(1, 'afif', '08974000111'),
(2, 'udin', '08977700111'),
(3, 'saipul', '08977780111'),
(4, 'agus', '08977792641'),
(5, 'aziz', '08972222641'),
(6, 'ikhwan', '08972113641'),
(7, 'mamat', '08972113900'),
(8, 'rio', '08966113900'),
(9, 'widyanto', '08966113944'),
(10, 'anto', '08968101944'),
(11, 'azhar', '08218101944'),
(12, 'nana', '08218104444'),
(13, 'lili', '08218500414'),
(14, 'dimas', '08211170414'),
(15, 'fayi', '08216666414');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`kd_lapangan`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kd_lapangan` (`kd_lapangan`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `no_telp` (`no_telp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `fk_id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_lapangan` FOREIGN KEY (`kd_lapangan`) REFERENCES `lapangan` (`kd_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
