-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 09:21 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(50) NOT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `temperatur` int(10) DEFAULT NULL,
  `kelembaban` int(10) DEFAULT NULL,
  `angin` int(10) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `wilayah`, `temperatur`, `kelembaban`, `angin`, `status`) VALUES
(35, 'serang', 30, 50, 70, 'Hujan Ringan'),
(36, 'serang', 70, 70, 70, 'Hujan Sedang'),
(37, 'serang', 70, 70, 70, 'Hujan Sedang'),
(38, 'serang', 70, 76, 70, 'Hujan Sedang'),
(45, 'Serang', 40, 30, 40, 'Hujan Lebat'),
(46, 'Serang', 40, 30, 40, 'Hujan Lebat'),
(47, 'Serang', 30, 60, 40, 'Hujan Lebat'),
(48, 'Serang', 30, 60, 40, 'Tidak Hujan'),
(49, 'Serang', 30, 60, 40, 'Hujan Lebat'),
(50, 'serang', 30, 40, 50, 'Hujan Lebat'),
(54, 'serang', 30, 30, 30, 'Hujan Lebat'),
(55, 'serang', 30, 30, 30, 'Hujan Lebat'),
(56, 'serang', 30, 30, 30, 'Hujan Lebat'),
(57, 'serang', 30, 30, 30, 'Hujan Lebat'),
(58, 'serang', 30, 30, 30, 'Hujan Lebat'),
(59, 'serang', 30, 30, 30, 'Hujan Lebat'),
(60, 'serang', 30, 30, 30, 'Hujan Lebat'),
(61, 'serang', 30, 30, 30, 'Hujan Lebat'),
(62, 'serang', 30, 30, 30, 'Hujan Lebat');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`) VALUES
(1, 'Beranda', 'index.php'),
(2, 'Curah Hujan', 'inputnew.php'),
(3, 'Data Curah Hujan', 'data_hujan.php'),
(4, 'Data Rule', 'data_rule.php'),
(5, 'Logout', 'proses_login.php?action=logout');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(10) NOT NULL,
  `temperatur` varchar(50) DEFAULT NULL,
  `kelembaban` varchar(50) DEFAULT NULL,
  `angin` varchar(50) DEFAULT NULL,
  `hasil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id`, `temperatur`, `kelembaban`, `angin`, `hasil`) VALUES
(1, 'rendah', 'rendah', 'rendah', 'lebat'),
(2, 'rendah', 'rendah', 'sedang', 'lebat'),
(3, 'rendah', 'rendah', 'tinggi', 'ringan'),
(4, 'rendah', 'sedang', 'rendah', 'sedang'),
(5, 'rendah', 'sedang', 'sedang', 'ringan'),
(6, 'rendah', 'sedang', 'tinggi', 'lebat'),
(7, 'rendah', 'tinggi', 'rendah', 'ringan'),
(8, 'rendah', 'tinggi', 'sedang', 'lebat'),
(9, 'rendah', 'tinggi', 'tinggi', 'ringan'),
(10, 'sedang', 'rendah', 'rendah', 'ringan'),
(11, 'sedang', 'rendah', 'sedang', 'ringan'),
(12, 'sedang', 'rendah', 'tinggi', 'sedang'),
(13, 'sedang', 'sedang', 'rendah', 'sedang'),
(14, 'sedang', 'sedang', 'sedang', 'sedang'),
(15, 'sedang', 'sedang', 'tinggi', 'lebat'),
(16, 'sedang', 'tinggi', 'rendah', 'ringan'),
(17, 'sedang', 'tinggi', 'sedang', 'sedang'),
(18, 'sedang', 'tinggi', 'tinggi', 'lebat'),
(19, 'tinggi', 'rendah', 'rendah', 'ringan'),
(20, 'tinggi', 'rendah', 'sedang', 'ringan'),
(21, 'tinggi', 'rendah', 'tinggi', 'sedang'),
(22, 'tinggi', 'sedang', 'rendah', 'ringan'),
(23, 'tinggi', 'sedang', 'sedang', 'sedang'),
(24, 'tinggi', 'sedang', 'tinggi', 'sedang'),
(25, 'tinggi', 'tinggi', 'rendah', 'lebat'),
(26, 'tinggi', 'tinggi', 'sedang', 'sedang'),
(27, 'tinggi', 'tinggi', 'tinggi', 'ringan');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `min` int(20) DEFAULT NULL,
  `max` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `min`, `max`) VALUES
(1, 'lebat', 60, 80),
(2, 'sedang', 20, 80),
(3, 'ringan', 20, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `status`) VALUES
(1, 'angga', 'Angga Firmansyah', 'angga@bantenhost.com', 'angga', 1),
(2, 'rodye', 'rodyestudio', 'rodyestudio17@gmail.com', 'rodye', 1),
(3, 'admin', 'admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
