-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 10:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `no` int(11) NOT NULL,
  `id_buku` char(20) DEFAULT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `harga_buku` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`no`, `id_buku`, `judul_buku`, `pengarang`, `harga_buku`) VALUES
(1, '1111', 'Tantei wa Mou, Shinderu', 'Nigojū', '140000'),
(2, '1112', 'Classroom of The Elite', 'Shougo Kinugasa', '200000'),
(3, '1113', 'Natsu e no Tunnel', 'Mei Hachimoku', '300000'),
(4, '1114', 'Kimi no Nawa', 'Makoto Shinkai', '350000'),
(5, '1115', 'Roshidere', 'SunSunSun ', '240000'),
(6, '1116', 'Otonari no Tenshi', 'Saekisan', '320000'),
(28, '1117', 'Otonari Asobi', 'Nekokuro', '350000'),
(30, '1118', 'Xyura in your dream', 'Xyura Iofifteen.', '500000'),
(34, '1119', 'Date A Live', 'Kōshi Tachibana', '260000'),
(35, '1120', 'Re : Zero', 'Tappei Nagatsuki', '340000'),
(36, '1121', 'Wistoria Wand &amp; Sword', 'Fujino Ōmori', '600000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'xyura', '$2y$10$4uWWY1HEZg7CNDiDthpS2OdrmxbX8JXurUVjG2ARvZHuoMBdwwvY6'),
(4, 'ifkar', '$2y$10$XSQgIs4A56oNQx49NKV9r.1EP5N0s3r8M6m1uJfYo8/l.f.hpeLiG'),
(5, 'xyuraa', '$2y$10$NoVwJ8LMH5sgFJIMfyZ/i.b3oPgxjjYsuzLD3xdGY3K90PM9lEwem'),
(6, 'bnn', '$2y$10$s2PaXMB1Lh03W1m.9d5qieTBtVZQ.5PI24JjXoWyi5AWfw9C3Q95G'),
(7, 'xyuraja', '$2y$10$V.cBK.7BUZuuXYF5/YA2zuWUaSb.SA6PUswMlilTszEOhyw6Mm5IG'),
(8, 'hai', '$2y$10$w.WOHLfT9Bk67mPeYb.qKuqdTSAMvASAjOW30nOrOnfED1wU3RLOC'),
(10, '', '$2y$10$VPaxQDpUHmRLn7yKUhED3uPdEaSu1F/7BjP/jNNdRcocweJ/3qvqS'),
(11, 'aku', '$2y$10$5riaMzKzM5gdMBUQMBpXRuA39h7mz9Jei3HB2Ijd5AaMhH28zwSK.'),
(12, 'halo', '$2y$10$M2xXnv4CutQV5LYNtu2jVeA31iYip8lTj9MGzeQ/DsC8sf0ZfE6ZO'),
(13, 'akukaya', '$2y$10$Ug3hBunKG7lEKSkamW1fiuguwoUs1iytgFsa6j1hil7F2DDs5qiQa'),
(14, 'a', '$2y$10$oHfSTuHf3Ps10t04P6swd.uLXDHcpyVjSU1v1VH7nT1JFEljupR2.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
