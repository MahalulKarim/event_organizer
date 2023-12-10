-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2023 at 05:36 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `bayar_awal` int(100) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `produk_id`, `user_id`, `tgl_booking`, `mulai`, `selesai`, `total_bayar`, `bayar_awal`, `bukti_bayar`, `tgl_bayar`, `alamat`, `keterangan`, `status`) VALUES
(20, 5, 9, '2023-06-23', '2023-06-30', '2023-07-01', 250000000, 125000000, 'Bayar180priscilla-du-preez-5GwaCXXFpgw-unsplash 1.png20', '2023-06-23', 'Kepil Wonosobo', '', 7),
(21, 6, 8, '2023-06-23', '2023-07-01', '2023-07-04', 17990000, 8995000, '', NULL, 'Sukoharjo, Wonosobo', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_booking`
--

CREATE TABLE `deskripsi_booking` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsi_booking`
--

INSERT INTO `deskripsi_booking` (`id`, `booking_id`, `deskripsi`) VALUES
(82, 20, 'MC'),
(83, 20, 'Pengamanan'),
(84, 20, 'Request Band/Solo'),
(85, 20, 'Denny Caknan'),
(86, 21, 'Adat Jawa'),
(87, 21, 'Full katering untuk 100 tamu');

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_produk`
--

CREATE TABLE `deskripsi_produk` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsi_produk`
--

INSERT INTO `deskripsi_produk` (`id`, `produk_id`, `deskripsi`) VALUES
(22, 5, 'MC'),
(23, 5, 'Pengamanan'),
(24, 5, 'Request Band/Solo'),
(30, 8, 'Stands Baris berdiri'),
(31, 8, 'Mulai dari 40 peserta'),
(32, 8, 'Publikasi'),
(33, 8, 'Dokumentasi'),
(34, 8, 'Keamanan'),
(35, 8, 'Hiburan'),
(36, 7, 'MC'),
(37, 7, 'Snack 30 orang (bisa disesuaikan dengan request)'),
(38, 6, 'Adat Jawa'),
(39, 6, 'Full katering untuk 100 tamu'),
(40, 6, 'Pagar Ayu');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`) VALUES
(5, 'Konser Musik', 200000000),
(6, 'Pernikahan', 17990000),
(7, 'Seminar', 2000000),
(8, 'EXPO', 70500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `avatar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `type`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `avatar`) VALUES
(1, 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Jeni', 'Perempuan', '873462343', 'Wonosobo', 'user222avatar-2.jpg'),
(8, 'git@mail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 'Gitin', 'Laki-laki', '65756745', 'Sukoharjo, Wonosobo', 'user179sad monkey meme.jpg'),
(9, 'janata@mail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 'Janata acta', 'Perempuan', '042423423442', 'Kepil Wonosobo', 'user119WhatsApp Image 2023-06-23 at 23.30.471.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deskripsi_booking`
--
ALTER TABLE `deskripsi_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `deskripsi_produk`
--
ALTER TABLE `deskripsi_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `deskripsi_booking`
--
ALTER TABLE `deskripsi_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `deskripsi_produk`
--
ALTER TABLE `deskripsi_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `deskripsi_booking`
--
ALTER TABLE `deskripsi_booking`
  ADD CONSTRAINT `deskripsi_booking_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`);

--
-- Constraints for table `deskripsi_produk`
--
ALTER TABLE `deskripsi_produk`
  ADD CONSTRAINT `deskripsi_produk_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
