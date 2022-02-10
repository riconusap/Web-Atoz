-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2022 at 06:25 PM
-- Server version: 10.2.41-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atox3513_db_atoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(8) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password_user` text NOT NULL,
  `nama` varchar(32) NOT NULL,
  `instagram` varchar(16) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password_user`, `nama`, `instagram`, `foto`) VALUES
('U0000002', 'admin', 'eb366d05aababe3731e06b54fd605ad3', 'ADMIN', '', '619a1096b364b6.24041200.png');

-- --------------------------------------------------------

--
-- Table structure for table `foto_project`
--

CREATE TABLE `foto_project` (
  `id_foto_project` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama_foto` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_project`
--

INSERT INTO `foto_project` (`id_foto_project`, `id_project`, `foto`, `nama_foto`) VALUES
(29, 7, '612fe7f6109ae0.83345450.png', 'nama'),
(30, 7, '612fe7f6113e20.31568393.jpg', '2'),
(31, 7, '612fe7f612e3d4.07543339.webp', '3'),
(32, 7, '612fe84b50da86.73004478.png', '4'),
(33, 7, '612fe84b523582.51766363.jpg', '5'),
(34, 7, '612fe84b540811.85712516.jpg', '6'),
(35, 7, '61306fc9ab9ca2.35571466.png', 'sadasd'),
(36, 9, '6197a649db0078.01276160.jpeg', ''),
(37, 9, '6197a649db4de8.19272868.jpeg', ''),
(38, 9, '6197a649db7787.09479779.jpeg', ''),
(39, 9, '6197a649dbd927.48894554.jpeg', ''),
(40, 9, '6197a649dc0133.12996317.jpeg', ''),
(41, 9, '6197a649dc1e71.13085395.jpeg', ''),
(42, 8, '6197a9e16da0e6.96401372.png', 'test'),
(43, 10, '6197ac2f33a777.75034381.png', '1'),
(44, 10, '6197ac2f3429f0.00154889.jpg', '2'),
(45, 11, '6197b0bc274a15.36041992.jpeg', ''),
(46, 11, '6197b0bc27a649.68937640.jpeg', ''),
(47, 11, '6197b0bc27fad3.01961521.jpeg', ''),
(48, 11, '6197b0bc283341.45880719.jpeg', ''),
(49, 11, '6197b0bc2868f9.64108618.jpeg', ''),
(50, 11, '6197b0bc289e57.46770625.jpeg', ''),
(51, 12, '6197b260901159.81494591.jpeg', ''),
(52, 12, '6197b22ab09fe9.39365899.jpeg', ''),
(53, 12, '6197b22ab0c3e8.90012482.jpeg', ''),
(54, 12, '6197b22ab0df09.82009322.jpeg', ''),
(55, 12, '6197b22ab100b3.60465567.jpeg', ''),
(56, 12, '6197b22ab12133.99951729.jpeg', ''),
(57, 13, '6197b4da71b020.39597904.jpg', ''),
(58, 13, '6197b4da71f212.90680113.jpg', ''),
(59, 13, '6197b4da7218b4.05571218.jpg', ''),
(60, 13, '6197b4da723f76.69630374.jpg', ''),
(61, 13, '6197b4da725ab4.91627599.jpg', ''),
(62, 12, '6198db4b8a2528.69974860.jpeg', ''),
(63, 14, '6199ff6e737d95.25332537.jpeg', ''),
(64, 14, '6199ff6e73d903.62785423.jpeg', ''),
(65, 14, '6199ff6e741083.52607678.jpeg', ''),
(66, 14, '6199ff6e744664.40733947.jpeg', ''),
(67, 14, '6199ff6e7479c1.40147797.jpeg', ''),
(68, 14, '6199ff6e74a858.10725705.jpeg', ''),
(69, 15, '619a00029fa0a9.38436700.jpeg', ''),
(70, 15, '619a0002a02f31.55788219.jpeg', ''),
(71, 15, '619a0002a0a2e0.79917339.jpeg', ''),
(72, 15, '619a0002a110d7.01432905.jpeg', ''),
(73, 15, '619a0002a17e01.75903387.jpeg', ''),
(74, 15, '619a0002a1ea62.81869119.jpeg', ''),
(75, 15, '619a0002a26303.13801893.jpeg', ''),
(76, 15, '619a0002a2cfd9.50955364.jpeg', ''),
(77, 16, '619a00813dff83.48617135.jpeg', ''),
(78, 16, '619a00813ec1b6.35499321.jpeg', ''),
(79, 16, '619a00813f4e74.82615336.jpeg', ''),
(80, 17, '619ba49cca9d36.24287340.jpeg', ''),
(81, 17, '619ba49ccb10a1.49686606.jpeg', ''),
(82, 17, '619ba49ccb68d4.91877315.jpeg', ''),
(83, 17, '619ba49ccbbfb6.86355405.jpeg', ''),
(84, 17, '619ba49ccc1530.60525886.jpeg', ''),
(85, 18, '619ba4dee545b5.49432146.jpeg', ''),
(86, 18, '619ba4dee599e1.56306124.jpeg', ''),
(87, 18, '619ba4dee5ccc8.24469188.jpeg', ''),
(88, 19, '619ba55f2fd334.70468704.jpeg', ''),
(89, 19, '619ba55f3064d6.81990000.jpeg', ''),
(90, 19, '619ba55f30cb55.43918541.jpeg', ''),
(91, 20, '61a0fc5fbd3dc7.88647923.jpg', ''),
(92, 20, '61a0fc5fc56284.49868295.jpg', ''),
(93, 20, '61a0fc64c67486.11362746.jpg', ''),
(97, 21, '61a131cfa64a76.34455820.jpeg', ''),
(98, 21, '61a131cfa6ac57.17426855.jpeg', ''),
(99, 22, '61a1327c886576.93566927.jpeg', ''),
(100, 22, '61a1327c88bb03.42420749.png', ''),
(101, 22, '61a1327c890c98.32634819.jpeg', ''),
(102, 23, '61a1343c169340.37626352.jpeg', ''),
(103, 24, '61a134816e35e3.88361005.jpeg', ''),
(104, 25, '61a134bf157f03.25452129.jpeg', ''),
(105, 26, '61a135848e2fa5.83576993.jpeg', ''),
(106, 26, '61a135848ed9f4.58135985.jpeg', ''),
(107, 27, '61a135b66a5861.24347812.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `about_us` text NOT NULL,
  `bg_home` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `isi`, `about_us`, `bg_home`) VALUES
(1, 'Design, Create and Manage<br>Exhibition and Interior Spaces', 'PT Atoz is an exhibition and interior design contractor. We support you to demonstrate your best qualities in every situation. We really understand that consumers need fast service with the best quality and competitive prices. For these, we are ready to provide solutions and serve.', '6199ff29949650.60191874.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_proposal`
--

CREATE TABLE `inbox_proposal` (
  `id_proposal` int(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `pdf_proposal` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `respon` varchar(12) NOT NULL DEFAULT 'On Hold'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox_proposal`
--

INSERT INTO `inbox_proposal` (`id_proposal`, `judul`, `pdf_proposal`, `id_user`, `timestamp`, `respon`) VALUES
(7, 'Contoh Teks Artikel dan Struktur', '613ce16b936854.90425080.pdf', 5, '2021-09-11 17:04:04', 'tolak'),
(8, 'Contoh Teks Artikel dan Struktur', '613ef39b81b233.09954378.pdf', 5, '2021-09-13 06:46:25', 'terima');

-- --------------------------------------------------------

--
-- Table structure for table `profile_perusahaan`
--

CREATE TABLE `profile_perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(32) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `no_telp1` varchar(13) NOT NULL,
  `no_telp2` varchar(13) NOT NULL,
  `logo` text NOT NULL,
  `email` varchar(26) NOT NULL,
  `place_id` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_perusahaan`
--

INSERT INTO `profile_perusahaan` (`id`, `nama_perusahaan`, `no_telp`, `no_telp1`, `no_telp2`, `logo`, `email`, `place_id`, `alamat`) VALUES
(1, 'PT. ATOZ MANDIRI PERKASA', '2122784007', '85692565612', '81395861883', '613025e3357ee4.98815124.png', 'hello@atozmp.co.id', 'ChIJ91zRQBeLaS4Rq9_6RdB9Tgo', 'Jl. Raya Bekasi, KM.18 No.187 Pulogadung, Jakarta Timur.');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `nama_event` varchar(42) NOT NULL,
  `lokasi` varchar(32) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `thumbnail` text NOT NULL,
  `id_admin` varchar(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `nama_event`, `lokasi`, `tahun`, `thumbnail`, `id_admin`, `timestamp`) VALUES
(14, 'Asian Games Invitation Tournament ', 'Jakarta', '2018', '6199ff42ba49e6.37663884.jpeg', 'U0000002', '2021-11-21 08:11:46'),
(15, 'Telkom PRJ, Telkom ASIAN GAMES', 'Jakarta', '2018', '6199ffb8bce411.23456323.jpeg', 'U0000002', '2021-11-21 08:13:44'),
(16, 'Jolly TIme @PRJ', 'Jakarta', '2018', '619a005a07bc67.16770542.jpeg', 'U0000002', '2021-11-21 08:16:26'),
(17, 'Generali Insurace', 'Jakarta', '2019', '619ba47c14ea23.62534525.jpeg', 'U0000002', '2021-11-22 14:09:00'),
(18, 'GGF Corp ', 'Chandra Supermarket', '2021', '619ba4cf734345.07201518.jpeg', 'U0000002', '2021-11-22 14:10:23'),
(19, 'Sunpride', 'Jakarta', '2021', '619ba54b39fd58.84102847.jpeg', 'U0000002', '2021-11-22 14:12:27'),
(20, 'Panin Daichi', '', '2019', '619ba593cf9625.23757762.jpg', 'U0000002', '2021-11-22 14:13:39'),
(21, 'Movic', 'Bandara Soekarno Hatta', '2019', '61a131bbc316d4.31647321.jpeg', 'U0000002', '2021-11-26 19:12:59'),
(22, 'Palmerhaus', '', '2018', '61a1325463db92.45307475.png', 'U0000002', '2021-11-26 19:15:32'),
(23, 'Hulala Ice Cream', '', '', '61a132aa235d44.26297791.jpeg', 'U0000002', '2021-11-26 19:16:58'),
(24, 'Balitbang ESDM', '', '2019', '61a13476b551d3.94295863.jpeg', 'U0000002', '2021-11-26 19:24:38'),
(25, 'Branding Wall Lamborghini', 'Jakarta', '2019', '61a134b1c08561.99364532.jpeg', 'U0000002', '2021-11-26 19:25:37'),
(26, 'Voksel ', 'Electric Power', '2019', '61a13575396754.68577689.jpeg', 'U0000002', '2021-11-26 19:28:53'),
(27, 'Tostem', 'Hotel Mulia', '2019', '61a135abd77e72.48029763.jpeg', 'U0000002', '2021-11-26 19:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password_user` text NOT NULL,
  `nama` varchar(32) NOT NULL,
  `instansi` varchar(16) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password_user`, `nama`, `instansi`, `foto`) VALUES
(1, 'rico.nusa.p@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'opul', 'PT ATOZ', '60604082bbe187.55354655.jpg'),
(5, 'rico.nusa.p@hotmail.com', 'f939ee54c4293270480125281bc4aa93', 'Riko Nusa Pratama', 'PT ATOZ', '613cb41fb4db90.39625279.jpg'),
(6, 'test@gmail.com', 'f939ee54c4293270480125281bc4aa93', 'Test USer', 'PT ATOZ', '613ef331b12f16.36923893.jpg'),
(7, 'test2@gmail.com', '202cb962ac59075b964b07152d234b70', 'riko', 'pppp', '613ef37b676431.87670925.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `foto_project`
--
ALTER TABLE `foto_project`
  ADD PRIMARY KEY (`id_foto_project`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_proposal`
--
ALTER TABLE `inbox_proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `profile_perusahaan`
--
ALTER TABLE `profile_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_project`
--
ALTER TABLE `foto_project`
  MODIFY `id_foto_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inbox_proposal`
--
ALTER TABLE `inbox_proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
