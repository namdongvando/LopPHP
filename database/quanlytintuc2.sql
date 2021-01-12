-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 01:53 PM
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
-- Database: `quanlytintuc2`
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
  `Website` text COLLATE utf8_unicode_ci NOT NULL,
  `Fax` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_danhmuc`
--
ALTER TABLE `nn_danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nn_loai`
--
ALTER TABLE `nn_loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_nhacungcap`
--
ALTER TABLE `nn_nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
