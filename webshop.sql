-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 02:31 PM
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
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoryshop`
--

CREATE TABLE `categoryshop` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `server` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoryshop`
--

INSERT INTO `categoryshop` (`id`, `category`, `name`, `server`, `link`) VALUES
(1, 'rank', 'ยศ', 'Survival', 'rank'),
(2, 'money', 'เงิน', 'Minigame', 'money');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `redeem` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `point` int(11) NOT NULL,
  `keynum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `name`, `redeem`, `command`, `point`, `keynum`) VALUES
(4, 'Code', '5rt4hRSDjE4JgbP1', '', 0, 1),
(5, '5AnN2j9u70QLkYmF', '5AnN2j9u70QLkYmF', '', 0, 1),
(6, 'ySVC2lfYolByZso6', 'ySVC2lfYolByZso6', '', 0, 1),
(7, 'f2UKAhjzoualb2Fp', 'f2UKAhjzoualb2Fp', '1', 0, 1),
(8, '4XAGt4atppBn24cK', '4XAGt4atppBn24cK', '0', 0, 1),
(9, 'lhEzXFHcO3ALQ8L8', 'lhEzXFHcO3ALQ8L8', '1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `truewallet` varchar(255) NOT NULL,
  `truemoney` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `truewallet`, `truemoney`, `amount`, `name`, `date`) VALUES
(3, '50001476973771', '', '100.00', 'Min', '19-01-2019 23:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `img`) VALUES
(2, './_image/1.png'),
(3, './_image/qr.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `command1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `command2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `command3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `command10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `price` int(11) NOT NULL,
  `page` varchar(255) CHARACTER SET latin1 NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 NOT NULL,
  `server` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `command1`, `command2`, `command3`, `command4`, `command5`, `command6`, `command7`, `command8`, `command9`, `command10`, `image`, `price`, `page`, `category`, `server`) VALUES
(1, '1', 'say {user} Hiiii', '', '', '', '', '', '', '', '', '', 'https://www.picz.in.th/images/2018/03/24/S2UrP2.jpg', 1, '1', 'rank', 'Survival'),
(2, 'Test', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', 'https://www.picz.in.th/images/2018/03/24/S2UrP2.jpg', 1, '1', 'money', 'Minigame');

-- --------------------------------------------------------

--
-- Table structure for table `jackpot`
--

CREATE TABLE `jackpot` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `point` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `keynum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jackpot`
--

INSERT INTO `jackpot` (`id`, `number`, `name`, `point`, `command`, `keynum`) VALUES
(1, '1', 'Diamond × 3', '10', 'give {user} Diamond 3', '3'),
(2, '2', '10 พอยท์', '10', 'give {user} Diamond 6', '2');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `rconpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `name`, `ip`, `port`, `rconpass`) VALUES
(1, 'Survival', '35.200.181.222', '19132', 'OW5DoJsAIJ'),
(2, 'Minigame', '127.0.0.1', '19132', '1212312121');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` int(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `point`, `credits`, `avatar`, `rank`, `admin`) VALUES
(8, 'Min', '12345', 1167, 0, 'https://www.picz.in.th/images/2018/03/28/SV5bWR.gif', 'member', 'true'),
(21, 'AnuchitZaza', '123456', 1000, 0, '', '', 'false'),
(22, 'root3', '1234567890', 0, 0, '', 'member', 'false'),
(23, '_SlothCraft_', 'tinnapop123', 0, 0, '', 'member', 'false'),
(24, 'Sukito', 'zaxzx12', 0, 0, '', 'member', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoryshop`
--
ALTER TABLE `categoryshop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_3` (`name`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jackpot`
--
ALTER TABLE `jackpot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoryshop`
--
ALTER TABLE `categoryshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jackpot`
--
ALTER TABLE `jackpot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
