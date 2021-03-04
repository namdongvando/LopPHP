-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 12:58 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlytintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bh_danhmuc`
--

CREATE TABLE `bh_danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `CapCha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bh_danhmuc`
--

INSERT INTO `bh_danhmuc` (`MaDM`, `TenDM`, `GhiChu`, `HinhAnh`, `CapCha`) VALUES
(1, 'Tin Trong Nước1', 'Ghi Chu', 'HInh aNH', 0),
(3, 'Tin Xa Hoi', 'Ghi Chu', 'HInh aNH', 1),
(4, 'Kinh Tê\r\n', 'Ghi Chu', 'HInh aNH', 1),
(5, 'Quân Sư\r\n', 'Ghi Chu', 'HInh aNH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bh_hanghoa`
--

CREATE TABLE `bh_hanghoa` (
  `MaHH` int(11) NOT NULL,
  `Code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHH` text COLLATE utf8_unicode_ci NOT NULL,
  `Gia` decimal(15,0) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `QuyCachDongGoi` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bh_loai`
--

CREATE TABLE `bh_loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bh_nhacungcap`
--

CREATE TABLE `bh_nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenCTY` text COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiLienHe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `Website` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bh_nhacungcap`
--

INSERT INTO `bh_nhacungcap` (`MaNCC`, `TenCTY`, `DienThoai`, `Email`, `NguoiLienHe`, `DiaChi`, `Website`, `Fax`, `GhiChu`) VALUES
(1, '', '', '', '', '', '', '', ''),
(2, '', 'asd', 'asdasd', 'asdas', 'dasd', '', 'sdas', 'das');

-- --------------------------------------------------------

--
-- Table structure for table `bh_tintuc`
--

CREATE TABLE `bh_tintuc` (
  `MaTin` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayViet` datetime NOT NULL,
  `NgayDang` datetime NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nn_admin`
--

CREATE TABLE `nn_admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Randomkey` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BOD` date DEFAULT NULL,
  `Sex` int(1) DEFAULT NULL,
  `Address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` int(1) NOT NULL,
  `GGCode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_admin`
--

INSERT INTO `nn_admin` (`Id`, `Name`, `Username`, `Password`, `Randomkey`, `Email`, `Phone`, `BOD`, `Sex`, `Address`, `Active`, `GGCode`) VALUES
(1, 'adas', 'abc', 'asda', 'sda', 'sdasd', 'asd', '2021-01-05', 1, 'asdas', 1, '1'),
(4, 'adas', 'abczsda', 'asda', 'sda', 'sdasdasda', 'asd', '2021-01-05', 1, 'asdas', 1, '1'),
(5, 'adas', 'ASa', 'asda', 'sda', 'asdas', 'asd', '2021-01-05', 1, 'asdas', 1, '1'),
(6, 'Name', 'Username', 'Password', '123456', 'Email', 'Phone', '2021-01-05', 1, 'Address', 1, NULL),
(8, 'asdasdas', 'asdasd', '', '', 'asdasdas@gmail.com', '2342342342', '0000-00-00', 1, '', 0, NULL),
(15, 'zsdas das das', '2342342342', 'a90388147802150e6b27517e0aabe9e287f7bb9f', '20e21a790186440e46f', 'asasdasdasdasdas@gmail.com', 'asdasd as', '0000-00-00', 1, '', 1, NULL),
(16, 'zsdas das das', '2342342342342', 'bb08d2476e13b3198158531b444042cb3515049a', '3b50d56ae3100f59cfe', 'asdasda@gmail.com', '23423423', '0000-00-00', 1, '', 1, NULL),
(17, 'asd asdas', 'dasd23423423', 'a4e122549149c0d132812fcb44733403678d0408', '7beb3e8ccdd76166b75', 'asdaasdasdassdas@gmail.com', 'asdas', '0000-00-00', 1, '', 1, NULL),
(18, 'adas', 'abczsdaasdas', 'asda', 'sda', 'sdasdasdasd asd asa', 'asd', '2021-01-05', 1, 'asdas', 1, '1'),
(19, 'zsdas das das', '2342342342asdas', 'a90388147802150e6b27517e0aabe9e287f7bb9f', '20e21a790186440e46f', 'asasdasdasdasdas@gmaiasdasl.com', 'asdasd as', '0000-00-00', 1, '', 1, NULL),
(20, 'adas', 'abcasdas das das', 'asdaasdas', 'sda', 'sdasdas dasd as', 'asd', '2021-01-05', 1, 'asdas', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `nn_danhmuc`
--

CREATE TABLE `nn_danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `CapCha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_danhmuc`
--

INSERT INTO `nn_danhmuc` (`MaDM`, `TenDM`, `GhiChu`, `HinhAnh`, `CapCha`) VALUES
(1, 'Tin Trong Nước1', 'Ghi Chu', 'HInh aNH', 0),
(3, 'Tin Xa Hoi', 'Ghi Chu', 'HInh aNH', 1),
(4, 'Kinh Tê\r\n', 'Ghi Chu', 'HInh aNH', 1),
(5, 'Quân Sư\r\n', 'Ghi Chu', 'HInh aNH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nn_hanghoa`
--

CREATE TABLE `nn_hanghoa` (
  `MaHH` int(11) NOT NULL,
  `Code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHH` text COLLATE utf8_unicode_ci NOT NULL,
  `Gia` decimal(15,0) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `QuyCachDongGoi` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_hanghoa`
--

INSERT INTO `nn_hanghoa` (`MaHH`, `Code`, `TenHH`, `Gia`, `SoLuong`, `QuyCachDongGoi`, `MaLoai`, `MaNCC`, `NgayTao`, `SoLanXem`, `TomTat`, `GhiChu`, `NoiDung`, `HinhAnh`) VALUES
(1, 'Code', 'TenHH', '1', 1, 'QuyCachDongGoi', 1, 1, '2021-03-02 00:00:00', 0, 'TomTat', 'GhiChu', 'NoiDung', 'HinhAnh');

-- --------------------------------------------------------

--
-- Table structure for table `nn_loai`
--

CREATE TABLE `nn_loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_loai`
--

INSERT INTO `nn_loai` (`MaLoai`, `TenLoai`, `GhiChu`, `HinhAnh`) VALUES
(11, 'sdasd', 'sdas', './public/loai/11-Home_one_02 - Copy.gif'),
(12, 'asdas', 'dasd', 'asdas'),
(13, 'as dasd', 'asd asasdas', ''),
(14, 'asd asd', 'as asdas', ''),
(15, 'asd asdas', 'd asdas', ''),
(16, 'ASas', 'sASa', './public/loai/1611668380Home_one_05 - Copy.gif'),
(17, 'qweqw', 'eqweqw', './public/loai/1611668392Home_one_02 - Copy.gif'),
(18, 'sdasd', 'sdas', './public/loai/11-Home_one_02 - Copy.gif'),
(19, 'asdas', 'dasd', 'asdas'),
(20, 'as dasd', 'asd asasdas', ''),
(21, 'asd asd', 'as asdas', ''),
(22, 'asd asdas', 'd asdas', ''),
(23, 'ASas', 'sASa', './public/loai/1611668380Home_one_05 - Copy.gif'),
(24, 'qweqw', 'eqweqw', './public/loai/1611668392Home_one_02 - Copy.gif'),
(25, 'sdasd', 'sdas', './public/loai/11-Home_one_02 - Copy.gif'),
(26, 'asdas', 'dasd', 'asdas'),
(27, 'as dasd', 'asd asasdas', ''),
(28, 'asd asd', 'as asdas', ''),
(29, 'asd asdas', 'd asdas', ''),
(30, 'ASas', 'sASa', './public/loai/1611668380Home_one_05 - Copy.gif'),
(31, 'qweqw', 'eqweqw', './public/loai/1611668392Home_one_02 - Copy.gif'),
(32, 'sdasd', 'sdas', './public/loai/11-Home_one_02 - Copy.gif'),
(33, 'asdas', 'dasd', 'asdas'),
(34, 'as dasd', 'asd asasdas', ''),
(35, 'asd asd', 'as asdas', ''),
(36, 'asd asdas', 'd asdas', ''),
(37, 'ASas', 'sASa', './public/loai/1611668380Home_one_05 - Copy.gif'),
(38, 'qweqw', 'eqweqw', './public/loai/1611668392Home_one_02 - Copy.gif');

-- --------------------------------------------------------

--
-- Table structure for table `nn_nhacungcap`
--

CREATE TABLE `nn_nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenCTY` text COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiLienHe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `Website` text COLLATE utf8_unicode_ci NOT NULL,
  `Fax` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nn_nhacungcap`
--

INSERT INTO `nn_nhacungcap` (`MaNCC`, `TenCTY`, `DienThoai`, `Email`, `NguoiLienHe`, `DiaChi`, `Website`, `Fax`, `GhiChu`) VALUES
(3, 'SamSung', '23423423', 'asdasdas@gmail.com', 'asdas', 'asda', '', 'asdas', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `nn_tintuc`
--

CREATE TABLE `nn_tintuc` (
  `MaTin` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayViet` datetime NOT NULL,
  `NgayDang` datetime NOT NULL,
  `SoLanXem` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_danhmuc`
--
ALTER TABLE `bh_danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `bh_hanghoa`
--
ALTER TABLE `bh_hanghoa`
  ADD PRIMARY KEY (`MaHH`),
  ADD UNIQUE KEY `Code` (`Code`);

--
-- Indexes for table `bh_loai`
--
ALTER TABLE `bh_loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `bh_nhacungcap`
--
ALTER TABLE `bh_nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `bh_tintuc`
--
ALTER TABLE `bh_tintuc`
  ADD PRIMARY KEY (`MaTin`);

--
-- Indexes for table `nn_admin`
--
ALTER TABLE `nn_admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `nn_danhmuc`
--
ALTER TABLE `nn_danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Indexes for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  ADD PRIMARY KEY (`MaHH`),
  ADD UNIQUE KEY `Code` (`Code`);

--
-- Indexes for table `nn_loai`
--
ALTER TABLE `nn_loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nn_nhacungcap`
--
ALTER TABLE `nn_nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `nn_tintuc`
--
ALTER TABLE `nn_tintuc`
  ADD PRIMARY KEY (`MaTin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_danhmuc`
--
ALTER TABLE `bh_danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bh_loai`
--
ALTER TABLE `bh_loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bh_nhacungcap`
--
ALTER TABLE `bh_nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nn_admin`
--
ALTER TABLE `nn_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nn_danhmuc`
--
ALTER TABLE `nn_danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nn_hanghoa`
--
ALTER TABLE `nn_hanghoa`
  MODIFY `MaHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nn_loai`
--
ALTER TABLE `nn_loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nn_nhacungcap`
--
ALTER TABLE `nn_nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
