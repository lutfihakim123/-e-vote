-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 03:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id_candidate` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `v_leader_id` int(11) NOT NULL,
  `candidate` varchar(100) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(500) NOT NULL,
  `img_candidate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id_candidate`, `leader_id`, `v_leader_id`, `candidate`, `visi`, `misi`, `img_candidate`) VALUES
(14, 8, 28, 'Candidate 1', 'Indonesia Maju', '-. Menumbuhkan rasa nasionalisme\r\n-. Meningkatkan kualitas pendidikan\r\n-. Meningkatkan daya jual beli barang indonesia di dunia internasional', 'Jokowi_dan_Maruf_Amiin.jpg'),
(15, 12, 19, 'Candidate 2', 'Indonesia No 1 in Asia', '-. Tingkatkan Impor\r\n-. Dukung UMKM secara sepenuhnya \r\n-. Jangan batasi anak muda dalam berkarya', 'Prabowo_dan_Sandiaga_Uno.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `id_leader` int(11) NOT NULL,
  `nama_lengkap_leader` varchar(100) NOT NULL,
  `sd_leader` varchar(100) NOT NULL,
  `smp_leader` varchar(100) NOT NULL,
  `smk_leader` varchar(100) NOT NULL,
  `achievement_1_leader` varchar(100) NOT NULL,
  `achievement_2_leader` varchar(100) NOT NULL,
  `img_leader` varchar(100) NOT NULL,
  `is_candidate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`id_leader`, `nama_lengkap_leader`, `sd_leader`, `smp_leader`, `smk_leader`, `achievement_1_leader`, `achievement_2_leader`, `img_leader`, `is_candidate`) VALUES
(8, 'Jokowi Dodo', 'SDN 1 Bojong Soang', 'SMPN 1 Bojong Soang', 'SMA 1 Bojong Soang', 'Best IPK 2020', 'Best IPK 2021', 'Jokowi_Dodo.jpg', 'Candidate 1'),
(12, 'Prabowo', 'SDN 1 Cisarua', 'SMPN 1 Cisarua', 'SMKN 1 Cisarua', 'Best IPK 2020', 'Best IPK 2021', 'Prabowo.jpg', 'Candidate 2');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id_voter` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id_voter`, `candidate_id`, `email`, `password`, `is_active`) VALUES
(13, 14, 'lutfirahmanhakim.r19mi@plb.ac.id', 'c459aeac248f88673ba00949975f0c94', 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_leader`
--

CREATE TABLE `v_leader` (
  `id_v_leader` int(11) NOT NULL,
  `nama_lengkap_v_leader` varchar(100) NOT NULL,
  `sd_v_leader` varchar(100) NOT NULL,
  `smp_v_leader` varchar(100) NOT NULL,
  `smk_v_leader` varchar(100) NOT NULL,
  `achievement_1_v_leader` varchar(100) NOT NULL,
  `achievement_2_v_leader` varchar(100) NOT NULL,
  `img_v_leader` varchar(100) NOT NULL,
  `is_candidate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_leader`
--

INSERT INTO `v_leader` (`id_v_leader`, `nama_lengkap_v_leader`, `sd_v_leader`, `smp_v_leader`, `smk_v_leader`, `achievement_1_v_leader`, `achievement_2_v_leader`, `img_v_leader`, `is_candidate`) VALUES
(19, 'Sandiaga Uno', 'SD 1 Cisarua', 'SMP 1 Cisarua', 'SMK 2 Cimahi', 'Third Place robotic internasional competition', 'Best Student SMK 2 Cimahi 2020-2021', 'Sandiaga_Uno.jpg', 'Candidate 2'),
(28, 'Ma\'ruf Amiin', 'SDN 1 Subang', 'SMPN 1 Subang', 'SMAN 1 Subang', 'Ranking 1 2020-2021', 'Ranking 1 2018-2019', 'Maruf_Amin.jpg', 'Candidate 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_candidate`),
  ADD KEY `leader_id` (`leader_id`),
  ADD KEY `v_leader_id` (`v_leader_id`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id_leader`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id_voter`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `v_leader`
--
ALTER TABLE `v_leader`
  ADD PRIMARY KEY (`id_v_leader`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leader`
--
ALTER TABLE `leader`
  MODIFY `id_leader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id_voter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `v_leader`
--
ALTER TABLE `v_leader`
  MODIFY `id_v_leader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `leader` (`id_leader`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`v_leader_id`) REFERENCES `v_leader` (`id_v_leader`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
