-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 03:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitename`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` mediumint(8) UNSIGNED NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `order_level` int(11) NOT NULL,
  `diskontiniu` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `kategori`, `harga_satuan`, `stok`, `order_level`, `diskontiniu`) VALUES
(1, 'Blender', 'Elektronik', 500000, 100, 50, 'Tidak'),
(2, 'Hoodie', 'Fashion', 120000, 50, 20, 'Tidak'),
(3, 'Celana Training', 'Olahraga', 75000, 200, 100, 'Tidak'),
(4, 'Snack Hampers', 'Makanan', 40000, 300, 150, 'Ya'),
(5, 'Kopi Gula Aren', 'Mimuman', 15000, 300, 150, 'Ya'),
(6, 'Komik Manga', 'Buku', 100000, 75, 30, 'Tidak'),
(7, 'Kosmetik', 'Kecantikan', 120000, 150, 75, 'Tidak'),
(8, 'Kabel Bintik', 'Otomotif', 30000, 40, 15, 'Tidak'),
(9, 'Rice Cooker', 'Elektronik', 1500000, 25, 10, 'Tidak'),
(10, 'Sepatu Running', 'Olahraga', 500000, 20, 10, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `registration_date`) VALUES
(2, 'John', 'Lennon', 'john@beatles.com', '2a50435b0f512f60988db719106a258fb7e338ff', '2023-04-14 07:50:51'),
(4, 'George', 'Harrison', 'george@beatles.com ', '1af17e73721dbe0c40011b82ed4bb1a7dbe3ce29', '2023-04-14 07:50:51'),
(5, 'Ringo', 'Starr', 'ringo@beatles.com', '520f73691bcf89d508d923a2dbc8e6fa58efb522', '2023-04-14 07:50:51'),
(6, 'David', 'Jones', 'davey@monkees.com', 'ec23244e40137ef72763267f17ed6c7ebb2b019f', '2023-04-14 07:52:42'),
(7, 'Peter', 'Tork', 'peter@monkees.com', 'b8f6bc0c646f68ec6f27653f8473ae4ae81fd302', '2023-04-14 07:52:42'),
(9, 'Mike', 'Nesmith', 'mike@monkees.com', '804a1773e9985abeb1f2605e0cc22211cc58cb1b', '2023-04-14 07:52:42'),
(10, 'David', 'Sedaris', 'david@authors.com', 'f54e748ae9624210402eeb2c15a9f506a110ef72', '2023-04-14 07:52:42'),
(11, 'Nick', 'Hornby', 'nick@authors.com', '815f12d7b9d7cd690d4781015c2a0a5b3ae207c0', '2023-04-14 07:52:42'),
(12, 'Melissa', 'Bank', 'melissa@authors.com', '15ac6793642add347cbf24b8884b97947f637091', '2023-04-14 07:52:42'),
(13, 'Toni', 'Morrison', 'toni@authors.com', 'ce3a79105879624f762c01ecb8abee7b31e67df5', '2023-04-14 07:52:42'),
(14, 'Jonathan', 'Franzen', 'jonathan@authors.com', 'c969581a0a7d6f790f4b520225f34fd90a09c86f', '2023-04-14 07:52:42'),
(15, 'Don', 'DeLillo', 'don@authors.com', '01a3ff9a11b328afd3e5affcba4cc9e539c4c455', '2023-04-14 07:52:42'),
(16, 'Graham', 'Greene', 'graham@authors.com', '7c16ec1fcbc8c3ec99790f25c310ef63febb1bb3', '2023-04-14 07:52:42'),
(17, 'Michael', 'Chabon', 'michael@authors.com', 'bd58cc413f97c33930778416a6dbd2d67720dc41', '2023-04-14 07:52:42'),
(18, 'Richard', 'Brautigan', 'mike@authors.com', 'b1f8414005c218fb53b661f17b4f671bccecea3d', '2023-04-14 07:52:42'),
(19, 'Russell', 'Banks', 'russell@authors.com', '6bc4056557e33f1e209870ab578ed362f8b3c1b8', '2023-04-14 07:52:42'),
(20, 'Homer', 'Simpson', 'homer@simpson.com', '54a0b2dcbc5a944907d29304405f0552344b3847', '2023-04-14 07:52:42'),
(21, 'Marge', 'Simpson', 'marge@simpson.com', 'cea9be7b57e183dea0e4cf000489fe073908c0ca', '2023-04-14 07:52:42'),
(22, 'Bart', 'Simpson', 'bart@simpson.com', '73265774abd1028ed8ef06afc5fa0f9a7ccbb6aa', '2023-04-14 07:52:42'),
(23, 'Lisa', 'Simpson', 'lisa@simpson.com', 'a09bb16971ec0759dfff75c088f004e205c9e27b', '2023-04-14 07:52:42'),
(24, 'Maggie', 'Simpson', 'maggie@simpson.com', '0e87350b393ceced1d4751b828d18102be123edb', '2023-04-14 07:52:42'),
(25, 'Abe', 'Simpson', 'abe@simpson.com', '6591827c8e3d4624e8fc1ee324f31fa389fdafb4', '2023-04-14 07:52:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
