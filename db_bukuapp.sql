-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 04:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukuapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `ringkasan` text NOT NULL,
  `cover` varchar(1000) DEFAULT NULL,
  `id_genre` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `ringkasan`, `cover`, `id_genre`) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka (Yogyakarta)', 2005, 'Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah di sebuah sekolah Muhammadiyah di Belitung yang penuh dengan keterbatasan.', 'laskarpelangi.jpg', 1),
(3, 'Filosofi Kopi', 'Dewi Lestari', 'Trudee Books & GagasMedia', 2006, 'Perjuangan seorang yang memiliki hobi terhadap kopi dan memaknai kopi dari sudut pandang kehidupan.', 'filosofikopi.jpg', 3),
(4, 'Dracula ', 'Bram Stoker', ' Archibald Constable dan Company of Westminster', 1992, 'Dracula adalah novel tentang seorang bangsawan vampir bernama Count Dracula, karya penulis Irlandia, Bram Stoker. Novel ini merupakan novel kelima dari sang penulis dan dipublikasikan pertama kali oleh Archibald Constable dan Company of Westminster.>', 'dracula.jpg', 4),
(8, 'Ngenest: ngetawain hidup ala Ernest', 'Ernest Prakasa', 'Rak Buku', 2013, '\"Ngenest: Ngetawain Hidup Ala Ernest\" bercerita tentang serba-serbi hidup Ernest Prakasa, dibagi kepada dua puluh tiga cerita pendek di dalamnya. Ringan. Bikin ketagihan tapi tidak terasa kosong. Yang pasti isinya humor berat. Dari mulai menyinggung ras, politik, lantas beranjak ke sosial. Dari yang sehari-hari sampai yang tidak pernah diperhatikan, karena sepele, dibahas oleh Ernest Prakasa dengan gaya humor kritisnya.', 'ngenest.jpg', 2),
(14, 'MILYHYA', 'Manca Ilyasa Yahya', 'Youtube', 2018, 'WKWKWKWKWKWKWKWK.', 'milyhya.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(2) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Novel'),
(2, 'Humor'),
(3, 'Komik'),
(4, 'Horor'),
(5, 'Drama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
