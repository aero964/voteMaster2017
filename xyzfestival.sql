-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 12 月 05 日 20:07
-- サーバのバージョン： 5.7.19
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyzfestival`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `userComment`
--

CREATE TABLE IF NOT EXISTS `userComment` (
  `memberID` int(8) NOT NULL DEFAULT '0',
  `gakunen` varchar(2048) NOT NULL DEFAULT '1',
  `gakubu` varchar(2048) NOT NULL DEFAULT '××学部',
  `msmr_01koukouep` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_02tokuiry` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_03kikkake` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_04jiman` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_05sakunen` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_06type` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `msmr_07date` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `krok_comment` varchar(2048) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `reserve0` varchar(108) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `reserve1` varchar(108) NOT NULL DEFAULT 'ここに内容を記述して下さい',
  `reserve2` varchar(108) NOT NULL DEFAULT 'ここに内容を記述して下さい'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `voteMaster`
--

CREATE TABLE IF NOT EXISTS `voteMaster` (
  `memberID` int(8) NOT NULL DEFAULT '0',
  `point` int(8) NOT NULL DEFAULT '0',
  `name` varchar(2048) NOT NULL DEFAULT '田中 太郎',
  `furigana` varchar(2048) NOT NULL DEFAULT 'ﾀﾅｶ ﾀﾛｳ',
  `availability` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `webUserInformation`
--

CREATE TABLE IF NOT EXISTS `webUserInformation` (
  `userprivkey` varchar(1024) NOT NULL DEFAULT '0',
  `IP` varchar(1024) NOT NULL DEFAULT '0',
  `UA` varchar(2048) NOT NULL DEFAULT '0',
  `couponHash` varchar(16) NOT NULL DEFAULT '0',
  `v_ms` int(5) NOT NULL DEFAULT '0',
  `v_mr` int(5) NOT NULL DEFAULT '0',
  `v_dms` int(5) NOT NULL DEFAULT '0',
  `v_hidems` int(5) NOT NULL DEFAULT '0',
  `v_hidemr` int(5) NOT NULL DEFAULT '0',
  `v_karaoke` int(5) NOT NULL DEFAULT '0',
  `v_boku` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userComment`
--
ALTER TABLE `userComment`
  ADD UNIQUE KEY `memberID` (`memberID`);

--
-- Indexes for table `voteMaster`
--
ALTER TABLE `voteMaster`
  ADD UNIQUE KEY `memberID` (`memberID`);

--
-- Indexes for table `webUserInformation`
--
ALTER TABLE `webUserInformation`
  ADD UNIQUE KEY `userprivkey` (`userprivkey`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
