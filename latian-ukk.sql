-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2021 at 03:31 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latian-ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('50083123', 'I Gede Surya Amerta', 'gdamerta', 'admin123', '081338103073'),
('5108040201030003', 'admin', 'admin', '123123', '081338103073'),
('5108040201030004', 'Ary pradnya', 'arypradnya', '123123', '081338103073');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2021-03-26', '50083123', 'isi data                        ', 'image_2021-01-09_21-52-33.png', 'selesai'),
(2, '2021-03-27', '5108040201030003', 'Ruel â€˜Readyâ€™ EP Available Now\r\nSTREAM\r\nApple Music - http://smarturl.it/RUELREADY/applemus...â€‹\r\nSpotify - http://smarturl.it/RUELREADY/spotify?...â€‹\r\nAmazon - http://smarturl.it/RUELREADY/az?IQid=ytâ€‹\r\nSoundcloud - http://smarturl.it/RUELREADY/soundclo...â€‹\r\nDeezer - http://smarturl.it/RUELREADY/deezer?I...â€‹\r\n \r\nDOWNLOAD\r\niTunes - http://smarturl.it/RUELREADY/itunes?I...â€‹\r\nAmazon - http://smarturl.it/RUELREADY/az?IQid=ytâ€‹\r\nGoogle Play - http://smarturl.it/RUELREADY/googlepl...â€‹\r\n \r\nSign up for Ruel\'s Newsletter: http://smarturl.it/RuelNewsletter?IQi...â€‹\r\nFollow Ruel:\r\nhttp://www.instagram.com/oneruelâ€‹  \r\nhttp://www.facebook.com/oneruelâ€‹\r\nhttp://www.twitter.com/oneruelâ€‹\r\nhttp://www.soundcloud.com/oneruelâ€‹\r\n\r\nDirected by Grey Ghost', 'image_2021-03-17_19-46-03.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(2, 'Ary Pradnya', 'arypradnya', 'admin123', '081338103073', 'admin'),
(4, 'I Gede Surya Amerta', 'gdamerta', 'petugas123', '081338103073', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 1, '2021-03-27', 'isi tanggapan', 4),
(2, 1, '2021-03-27', '\r\nProduction Company - Ghostie Studios\r\nDirector - Grey Ghost (Jeremy Koren) @grey_ghost\r\nProducer - Fabiana Weiner @fabestelle\r\n \r\nDOP - Sherwin Akbarzadeh @sherwin_akbarzadeh\r\n \r\nProduction Designer/Art Director - Sarah Hanisch\r\nCostume Designer - Milana De Mina\r\n \r\nHair & Make Up Artist - Danielle Ruth, Wow FX\r\n                                                           \r\nEditor - Joel Chamaa & Raechel Harding \r\nColourist - Nick Rieve for Kilogram\r\nSound Designer  - John Servedio\r\n \r\nChoreographer - Yvette Lee @yvettelee_\r\n \r\n1st AD - Jess OFarrell\r\n2nd Camera - Joey Knox\r\nGaffer - Tom Savige for Savage Film Services \r\nGrip - Tim Delaney \r\n \r\nBand:\r\nKylie Chirunga \r\nJosh Albert \r\nCristian Barbieri  \r\nWill Rimmington', 4),
(3, 2, '2021-03-27', 'masukan masukan intinya', 4),
(4, 2, '2021-03-27', 'masih belom', 4),
(5, 1, '2021-03-27', 'Dah kelar ni bous', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
