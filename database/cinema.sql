-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2024 lúc 05:41 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cinema`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphim_dienvien`
--

CREATE TABLE `chitietphim_dienvien` (
  `MAPM` varchar(10) NOT NULL,
  `MADV` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphim_theloai`
--

CREATE TABLE `chitietphim_theloai` (
  `MAPM` varchar(10) NOT NULL,
  `MATHELOAI` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquyen_chucnang`
--

CREATE TABLE `chitietquyen_chucnang` (
  `MAQUYEN` varchar(10) NOT NULL,
  `MACHUCNANG` varchar(10) NOT NULL,
  `HANHDONG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietve_ghe`
--

CREATE TABLE `chitietve_ghe` (
  `MAVE` varchar(10) NOT NULL,
  `MAGHE` varchar(10) NOT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `MACHUCNANG` varchar(10) NOT NULL,
  `TENCHUCNANG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MADICHVU` varchar(10) NOT NULL,
  `TENDICHVU` varchar(255) DEFAULT NULL,
  `NAMEANH` varchar(255) DEFAULT NULL,
  `MOTA` varchar(255) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienvien`
--

CREATE TABLE `dienvien` (
  `MADV` varchar(10) NOT NULL,
  `TENDV` varchar(255) DEFAULT NULL,
  `NAMEANH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghe`
--

CREATE TABLE `ghe` (
  `MAPHONGCHIEU` varchar(10) DEFAULT NULL,
  `MALOAIGHE` varchar(10) DEFAULT NULL,
  `STT` tinyint(4) DEFAULT NULL,
  `HANGGHE` char(1) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `MAGHE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MAPM` varchar(10) NOT NULL,
  `STT` varchar(10) NOT NULL,
  `NAMEANH` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichchieuphim`
--

CREATE TABLE `lichchieuphim` (
  `MAPM` varchar(10) DEFAULT NULL,
  `MASC` varchar(10) DEFAULT NULL,
  `MAPHONGCHIEU` varchar(10) DEFAULT NULL,
  `MALICHCHIEU` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaighe`
--

CREATE TABLE `loaighe` (
  `MALOAIGHE` varchar(10) NOT NULL,
  `TENLOAIGHE` varchar(255) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngayle`
--

CREATE TABLE `ngayle` (
  `NGAY` varchar(2) NOT NULL,
  `PHANTRAMGIATANG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `MAPM` varchar(10) NOT NULL,
  `PATHTRAILER` varchar(255) DEFAULT NULL,
  `MOTA` varchar(255) DEFAULT NULL,
  `THOILUONG` smallint(6) DEFAULT NULL,
  `NGAYCHIEU` varchar(2) DEFAULT NULL,
  `QUOCGIA` varchar(255) DEFAULT NULL,
  `DANHGIA` float DEFAULT NULL,
  `DOTUOI` tinyint(4) DEFAULT NULL,
  `LUOTXEM` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `TENPHIM` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongchieu`
--

CREATE TABLE `phongchieu` (
  `MAPHONGCHIEU` varchar(10) NOT NULL,
  `TENPHONGCHIEU` varchar(255) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `SOGHE` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MAQUYEN` varchar(10) DEFAULT NULL,
  `TENQUEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suatchieu`
--

CREATE TABLE `suatchieu` (
  `MASC` varchar(10) NOT NULL,
  `NGAY` varchar(2) DEFAULT NULL,
  `THOIGIANBATDAU` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NGAYTAOTK` varchar(2) DEFAULT NULL,
  `TRANGTHAI` smallint(6) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `HOTEN` varchar(255) DEFAULT NULL,
  `NAMEANH` varchar(255) DEFAULT NULL,
  `MAQUYEN` varchar(10) DEFAULT NULL,
  `THOIGIANTAOTK` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `MATHELOAI` varchar(10) NOT NULL,
  `TENTHELOAI` varchar(255) DEFAULT NULL,
  `MOTA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uudai`
--

CREATE TABLE `uudai` (
  `CODE` varchar(10) NOT NULL,
  `TENUUDAI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `MAVE` varchar(10) NOT NULL,
  `USERNAME` varchar(255) DEFAULT NULL,
  `MALICHCHIEU` varchar(10) DEFAULT NULL,
  `TONGTIEN` int(11) DEFAULT NULL,
  `PHUONGTHUCTHANHTOAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphim_dienvien`
--
ALTER TABLE `chitietphim_dienvien`
  ADD PRIMARY KEY (`MAPM`,`MADV`);

--
-- Chỉ mục cho bảng `chitietphim_theloai`
--
ALTER TABLE `chitietphim_theloai`
  ADD PRIMARY KEY (`MAPM`,`MATHELOAI`);

--
-- Chỉ mục cho bảng `chitietquyen_chucnang`
--
ALTER TABLE `chitietquyen_chucnang`
  ADD PRIMARY KEY (`MAQUYEN`,`MACHUCNANG`,`HANHDONG`);

--
-- Chỉ mục cho bảng `chitietve_ghe`
--
ALTER TABLE `chitietve_ghe`
  ADD PRIMARY KEY (`MAVE`,`MAGHE`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`MACHUCNANG`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MADICHVU`);

--
-- Chỉ mục cho bảng `dienvien`
--
ALTER TABLE `dienvien`
  ADD PRIMARY KEY (`MADV`);

--
-- Chỉ mục cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`MAGHE`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`MAPM`,`STT`);

--
-- Chỉ mục cho bảng `lichchieuphim`
--
ALTER TABLE `lichchieuphim`
  ADD PRIMARY KEY (`MALICHCHIEU`);

--
-- Chỉ mục cho bảng `loaighe`
--
ALTER TABLE `loaighe`
  ADD PRIMARY KEY (`MALOAIGHE`);

--
-- Chỉ mục cho bảng `ngayle`
--
ALTER TABLE `ngayle`
  ADD PRIMARY KEY (`NGAY`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`MAPM`);

--
-- Chỉ mục cho bảng `phongchieu`
--
ALTER TABLE `phongchieu`
  ADD PRIMARY KEY (`MAPHONGCHIEU`);

--
-- Chỉ mục cho bảng `suatchieu`
--
ALTER TABLE `suatchieu`
  ADD PRIMARY KEY (`MASC`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MATHELOAI`);

--
-- Chỉ mục cho bảng `uudai`
--
ALTER TABLE `uudai`
  ADD PRIMARY KEY (`CODE`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`MAVE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
