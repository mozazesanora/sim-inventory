-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 01:56 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simkampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `simkampus_admin`
--

CREATE TABLE IF NOT EXISTS `simkampus_admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_alias` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_level_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkampus_admin`
--

INSERT INTO `simkampus_admin` (`admin_username`, `admin_alias`, `admin_password`, `admin_level_id`) VALUES
('hmvc', 'Admin HMVC', 'ffc30c4bdf71e9ced8e3611dd0113840', 1);

-- --------------------------------------------------------

--
-- Table structure for table `simkampus_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `simkampus_mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `mahasiswa_nim` varchar(255) NOT NULL,
  `mahasiswa_alamat` text NOT NULL,
  `mahasiswa_foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simkampus_mahasiswa`
--

INSERT INTO `simkampus_mahasiswa` (`mahasiswa_id`, `mahasiswa_nama`, `mahasiswa_nim`, `mahasiswa_alamat`, `mahasiswa_foto`) VALUES
(5, 'Deny Qutara Putra', '201410370311175', 'Jalan Sawahan Atas RT.2 RW.5 Beji Sawahan Kecamatan Junrejo Kota Batu', 'foto-201410370311175-2018-08-05_17_04_55.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simkampus_mahasiswa`
--
ALTER TABLE `simkampus_mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simkampus_mahasiswa`
--
ALTER TABLE `simkampus_mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
