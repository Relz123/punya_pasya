-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 05:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `ukk_makanan`
--

CREATE TABLE `ukk_makanan` (
  `id` int(255) NOT NULL,
  `id_pelanggan` int(25) NOT NULL,
  `nama_makanan` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kode_makanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukk_makanan`
--

INSERT INTO `ukk_makanan` (`id`, `id_pelanggan`, `nama_makanan`, `stok`, `deskripsi`, `kategori`, `kode_makanan`) VALUES
(13, 1213213, 'adwsawd', '2', 'djsajwj', 'hsdbwakj', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES
(4, 'admin1', 'admin0@gmail.com', '62f04a011fbb80030bb0a13701c20b41', 0),
(5, 'kgswahyu', 'kgswahyu80@gmail.com', '8cdba008ce329f75002f9c0bb9c82f31', 0),
(6, 'admin', 'admin0@gmail.com', '62f04a011fbb80030bb0a13701c20b41', 0),
(7, 'hakim', 'hakim@gmail.com', 'c96041081de85714712a79319cb2be5f', 0),
(8, 'aira', 'aira@gmail.com', '9019765c5b67f42a3ccfc3dd76c5b92f', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ukk_makanan`
--
ALTER TABLE `ukk_makanan`
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
-- AUTO_INCREMENT for table `ukk_makanan`
--
ALTER TABLE `ukk_makanan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
