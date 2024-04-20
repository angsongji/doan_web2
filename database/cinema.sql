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
  `STT` int DEFAULT NULL,
  `HANGGHE` char(1) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `MAGHE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--


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
  `NGAY` date NOT NULL,
  `PHANTRAMGIATANG` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `MAPM` varchar(10) NOT NULL,
  `PATHTRAILER` varchar(255) DEFAULT NULL,
  `MOTA` text DEFAULT NULL,
  `THOILUONG` varchar(255) DEFAULT NULL,
  `NGAYCHIEU` date DEFAULT NULL,
  `QUOCGIA` varchar(255) DEFAULT NULL,
  `DANHGIA` float DEFAULT NULL,
  `DOTUOI` tinyint(4) DEFAULT NULL,
  `LUOTXEM` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(4) DEFAULT NULL,
  `TENPHIM` varchar(255) DEFAULT NULL,
  `NAMEANH` varchar(255)  DEFAULT NULL
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
  `TENQUYEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suatchieu`
--

CREATE TABLE `suatchieu` (
  `MASC` varchar(10) NOT NULL,
  `NGAY` date DEFAULT NULL,
  `THOIGIANBATDAU` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `NGAYTAOTK` date DEFAULT NULL,
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
  `TENUUDAI` varchar(255) DEFAULT NULL,
  `PHANTRAMUUDAI` int NOT NULL,
  `DIEUKIEN` varchar(255) NOT NULL,
  `TRANGTHAI` smallint 	DEFAULT NULL
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
  `NGAY` date NOT NULL,
  `THOIGIAN` time NOT NULL,
  `PHUONGTHUCTHANHTOAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table `thongke`(
	`NGAY` date  NOT NULL,
    `TONGDOANHTHU` int  NOT NULL,
    `TONGVE` int DEFAULT NULL
    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table `chitietthongke`(
	`NGAY` date NOT NULL,
    `MAPM` varchar(10) NOT NULL,
    `TONGDOANHTHU` int DEFAULT NULL,
    `TONGVE` int DEFAULT NULL
    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphim_dienvien`
--
ALTER TABLE `thongke`
ADD primary KEY (`NGAY`);

ALTER TABLE `chitietthongke`
ADD primary KEY (`NGAY`,`MAPM`);



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


INSERT INTO phim(MAPM, PATHTRAILER, MOTA, THOILUONG, NGAYCHIEU, QUOCGIA, DANHGIA, DOTUOI, LUOTXEM, TRANGTHAI, TENPHIM,NAMEANH)
VALUES
('PM001', 'https://www.youtube.com/watch?v=8Pq08VsVUFk', 'Ký ức tình đầu ùa về khi Jimmy nhận được tấm bưu thiếp từ Ami. Cậu quyết định một mình bước lên chuyến tàu đến Nhật Bản gặp lại người con gái cậu đã bỏ lỡ 18 năm trước. Mối tình day dứt thời thanh xuân, liệu sẽ có một kết cục nào tốt đẹp khi đoàn tụ?', '123 phút', '2024-04-08', 'Trung Quốc', 8.4, 13, 1000, 0, 'Thanh Xuân 18x2: Lữ Trình Hướng Về Em','thanhxuan18x2.jpg'),
('PM002', 'https://www.youtube.com/watch?v=AVAnQaJ49l8', 'When a young American woman is sent to Rome to bengin a life of service to the church, she encounters a darkness that causes her to question her own faith and uncovers a terrifying conspiracy that hopes to bring about the birth of evil incarnate.', '123 phút', '2024-04-05', 'Mỹ', 5.7, 18, 700, 0, 'Điềm Báo Của Quỷ','diembaocuaquy.jpg'),
('PM003', 'https://www.youtube.com/watch?v=QGlgPf9jGMA', 'Trong một tương lai gần, một nhóm các phóng viên chiến trường quả cảm phải đấu tranh với thời gian và bom đạn nguy hiểm để đến kịp Nhà Trắng giữa bối cảnh nội chiến Hoa Kỳ đang tiến đến cao trào.', '109 phút', '2024-04-12', 'Hoa Kỳ', 7.8, 16, 1200, 0, 'Ngày Tàn Của Đế Quốc','ngaytancuadequoc.jpg'),
('PM004', 'https://www.youtube.com/watch?v=Y4Fbcvq-9RU', 'Sau các sự kiện của Ghostbusters: Afterlife, gia đình Spengler đang tìm kiếm cuộc sống mới ở Thành phố New York. Nhóm săn ma bao gồm Ray, Winston và Podcast sử dụng công nghệ mới để chống lại các mối đe dọa chết người cổ xưa đang ẩn náu trong các vật dụng hàng ngày. Thế nhưng, họ sẽ phải đối đầu với một thế lực đen tối hùng mạnh mới.', '119 phút', '2024-04-12', 'Mỹ', 5.0, 13, 2000, 0, 'Biệt Đội Săn Ma: Kỷ Nguyên Băng Giá','bietdoisanma.jpg'),
('PM005', 'https://www.youtube.com/watch?v=B2Jlyq_Tf3Y', 'Sau cuộc đối đầu nổ lực, Godzilla và Kong phải hợp tác chống lại một mối đe dọa khổng lồ chưa được khám phá ẩn sâu trong thế giới của chúng ta, thách thức sự tồn tại của chính chúng – và của chúng ta.', '125 phút', '2024-03-29', 'Mỹ', 9.3, 0, 2400, 0, 'Godzilla x Kong: Đế Chế Mới','Kong.jpg'),
('PM006', 'https://www.youtube.com/watch?v=N_ieracfsts', 'Chuyện phim xoay quanh Lee Soo-yeon (Park Ji-yeon) - một nữ minh tinh màn bạc đang ở đỉnh cao sự nghiệp nhưng bất chợt tuột dốc không phanh vì tai nạn chết người do chính cô gây ra trong lúc say rượu. Sau thời gian dài “ở ẩn” để trả giá cho sai lầm, Lee Soo-yeon bắt đầu nuôi mộng trở lại với khán giả nhưng bê bối từ quá khứ của cô luôn bị người đời đay nghiến, châm chọc. Lòng đố kỵ và khát khao danh vọng trỗi dậy trong Soo-yeon khi hằng ngày chứng kiến sự thành công của “ngôi sao mới lên” Song Ga-young (Kim Nu-ri) - hậu bối cùng công ty quản lý được sắp xếp sống chung với Soo-yeon trong căn hộ sang trọng. Sau một cuộc tranh cãi gay gắt với Ga-young, Soo-yeon đã tìm đến rượu để “an thần”, nhưng khi thức dậy cô đã phát hiện Ga-young chết trong căn hộ đầy bí ẩn. Liệu án mạng này sẽ ảnh hưởng như thế nào đến con đường lấy lại hào quang của Soo-yeon khi chính cô là nghi phạm duy nhất?', '112 phút', '2024-04-12', 'Hàn Quốc', 10.0, 18, 3000, 0, 'Hào Quang Đẫm Máu','haoquangdammau.jpg'),
('PM007', 'https://www.youtube.com/watch?v=DqRVx0wfOBQ', 'Toy Story phiên bản kinh dị sắp làm khán giả ngất luôn tại rạp! Chú gấu nhồi bông trông thì bình thường dễ thương nhưng lại sai khiến cô bạn nhỏ chơi một trò chơi đen tối với những thử thách kỳ lạ!', '114 phút', '2024-04-12', 'Mỹ', 9.0, 13, 2100, 0, 'Người “Bạn” Trong Tưởng Tượng','nguoibantrongtuongtuong.jpg'),
('PM008', 'https://www.youtube.com/watch?v=zEOXpArv940', 'Kid, một thanh niên vô danh sống trong một câu lạc bộ chiến đấu ngầm, nơi mà đêm này qua đêm khác anh đeo mặt nạ khỉ đột để chiến đấu trong lồng sắt kiếm tiền. Sau nhiều năm kìm nén cơn thịnh nộ trong bản thân mình, Kid tìm ra cách thâm nhập vào khu vực của giới thượng lưu độc ác thành phố. Khi những kí ức đau thương thời thơ ấu của anh trở về, đôi bàn tay đầy sẹo bí ẩn của anh sẽ đặt dấu chấm hết cho những kẻ đã cướp đi cuộc sống này.', '113 phút', '2024-04-05', 'Hoa Kỳ', 8.2, 18, 1700, 0, 'Monkey Man Báo Thù','monkeymanbaothu.jpg'),
('PM009', 'https://www.youtube.com/watch?v=5APPENpUdu0', 'Trong bối cảnh năm 1885 tại Pháp, đầu bếp tài ba Eugenie đã làm việc cho nhà quý tộc sành ăn Dodin Bouffant suốt 20 năm qua. Công việc nấu nướng và lòng ngưỡng mộ mà cả hai dành cho nhau dần dẫn tới một mối quan hệ lãng mạn. Họ cùng nhau tạo ra những tuyệt tác ẩm thực, khiến ngay cả những đầu bếp lừng lẫy nhất thế giới cũng phải thán phục. Nhưng Eugenie yêu thích sự tự do của mình và chưa bao giờ muốn kết hôn với Dodin. Khi Dodin nhận ra tình cảm sâu sắc của mình dành cho người phụ nữ đã luôn kề bên những năm tháng qua, cũng là lúc ông phát hiện Eugenie lâm bệnh nặng. Liệu mối tình lãng mạn này có thể kết thúc với hạnh phúc trọn vẹn?', '135 phút', '2024-03-22', 'Pháp', 8.5, 13, 1100, 0, 'Muôn Vị Nhân Gian','muonvinhangian.jpg'),
('PM010', 'https://www.youtube.com/watch?v=Svt6DK9T130', 'Hãy theo dõi hành trình thần thoại của Paul Atreides khi anh đoàn kết với Chani và Fremen trong khi trên con đường trả thù những kẻ âm mưu phá hoại gia đình anh. Đứng trước sự lựa chọn giữa tình yêu của đời mình và số phận của vũ trụ đã biết, Paul cố gắng ngăn chặn một tương lai khủng khiếp mà chỉ có anh mới có thể nhìn thấy.', '166 phút', '2024-03-01', 'Mỹ', 9.4, 16, 4000, 0, 'Dune: Hành Tinh Cát – Phần Hai','dune.jpg'),
('PM011', 'https://www.youtube.com/watch?v=vPwSfR_O9Jo', 'Câu chuyện bắt đầu từ lúc Thế giới sụp đổ, Furiosa phải tự cứu lấy mình để trở về nhà. Một cuộc phiêu lưu hành động độc lập khốc liệt, tiền truyện về quái nữ đồng hành với Max Rockatansky.', '100 phút', '2024-05-17', 'Mỹ', 9.0, 16, 0, 1, 'Furiosa: Câu Chuyện Từ Max Điên', 'furiosa.jpg'),
('PM012', 'https://www.youtube.com/watch?v=d1ZHdosjNX8', 'Trách nhiệm thuộc về ai?', '127 phút', '2024-04-26', 'Việt Nam', 9.6, 0, 0, 1, 'Lật Mặt 7: Một Điều Ước', 'latmat7.jpg'),
('PM013', 'https://www.youtube.com/watch?v=JToYSVWY4N8', 'Hồn ma Nak với sức mạnh khủng khiếp nhất, đáng sợ nhất mà bộ đôi mỏ hỗn Balloon & First phải đối mặt để giải cứu cho trai đẹp Min Joon. Liệu hội bạn này sẽ giải được nghiệp mình tạo ra hay sẽ tan rã từ đây?', '112 phút', '2024-05-31', 'Thái Lan', 9.5, 16, 0, 1, 'Ngôi Đền Kỳ Quái 4', 'ngoidenkyquai.jpg'),
('PM014', 'https://www.youtube.com/watch?v=hlBA_G5_PGk', 'Trong bộ phim hoạt hình này, chú mèo mê đồ ăn Garfield bị cuốn vào một vụ trộm để giúp cha mình - một tên trộm đường phố, khỏi một chú mèo biểu diễn khác đang muốn trả thù ông. Bắt đầu như một mối quan hệ hợp tác miễn cưỡng và kết thúc bằng việc Garfield và Vic nhận ra rằng cha con họ không hề khác biệt như vẻ ngoài của mình.', '100 phút', '2024-05-31', 'Mỹ', 9.1, 0, 0, 1, 'Garfield – Mèo Béo Siêu Quậy','garfield.jpg'),
('PM015', 'https://www.youtube.com/watch?v=m30S4Ax9BOM', 'Một vài thế hệ trong tương lai sau thời đại của Caesar, loài khỉ trở thành loài thống trị và sống hòa bình trong khi loài người bị suy yếu và sống trong bóng tối. Khi một nhà lãnh đạo khỉ độc tài mới xây dựng đế chế của mình, một chú khỉ trẻ bắt đầu một cuộc hành trình đầy gian nan, khiến anh ta phải nghi ngờ tất cả những gì anh ta biết về quá khứ và phải đưa ra những lựa chọn sẽ định hình tương lai cho cả loài khỉ và loài người.', '123 phút', '2024-05-24', 'Mỹ', 8.8, 16, 0, 1, 'Hành Tinh Khỉ: Vương Quốc Mới', 'hanhtinhkhi.jpg'),
('PM016', 'https://www.youtube.com/watch?v=bo2Y9Soatsg', 'Colt Seavers là một diễn viên đóng thế “lão làng. Bất ngờ, anh được mời làm “bản sao” cho một nhân vật nổi tiếng trong phim do người yêu cũ – Jody (Emily Blunt) đạo diễn. Mọi chuyện dần chệch hướng khi ngôi sao của bộ phim bỗng mất tích, không ai có thể liên lạc được. Để cứu lấy công việc và giành lại tình yêu của đời mình, Colt vướng vào âm mưu khó lường khi cố gắng đi tìm diễn viên đó.', '114 phút', '2024-05-03', 'Mỹ', 7.5, 13, 0, 1, 'Kẻ Thế Thân', 'kethethan.jpg'),
('PM017', 'https://www.youtube.com/watch?v=dFnSgtLNgtQ', 'Một cuộc phiêu lưu hoàn toàn mới bên trong đầu của Riley với một bộ của xúc mới', '123 phút', '2024-06-14', 'Mỹ', 9.9, 0, 0, 1, 'Những Mảnh Ghép Cảm Xúc 2', 'nhungmanhghepcamxuc.jpg'),
('PM018', 'https://www.youtube.com/watch?v=U46X1pXfolk', 'Bà Dương và ông Thoại luôn cố gắng để xây dựng một hình ảnh gia đình tài giỏi và danh giá trong mắt mọi người. Tuy nhiên dưới lớp vỏ bọc hào nhoáng ấy là những biến cố và lục dục gia đình đầy sóng gió. Nhìn kĩ hơn một chút bức tranh gia đình hạnh phúc ấy, rất nhiều “khuyết điểm” sẽ lộ ra gây bất ngờ', '115 phút', '2024-04-18', 'Việt Nam', 8.7, 0, 0, 1, 'Cái Giá Của Hạnh Phúc', 'caigiacuahanhphuc.jpg');

INSERT INTO theloai (MATHELOAI, TENTHELOAI, MOTA) 
VALUES 
('TL1', 'Hành Động', 'Thường bao gồm sự đối đầu giữa “cái thiện” và “cái ác” với nhiều cuộc chiến ác liệt bằng tay không hoặc vũ khí, tiết tấu nhanh và kĩ xảo điện ảnh cao'),
('TL2', 'Phiêu Lưu', 'Bao gồm các chuyến du hành mạo hiểm chứa đựng nhiều hiểm nguy hoặc may mắn, đôi khi có yếu tố thần thoại'),
('TL3', 'Bí Ẩn', 'Thường là quá trình điều tra về một bí ẩn chưa được khám phá'),
('TL4', 'Hài Kịch', 'Chứa đựng nhiều chi tiết hài hước để gây cười cho người xem'),
('TL5', 'Kinh Dị', 'Chứa những hình ảnh rùng rợn, ánh sáng mờ ảo, âm thanh rùng rợn, do đó thể loại phim này có thể đi đôi với các thể loại giả tưởng, viễn tưởng'),
('TL6', 'Giật Gân', 'Là một thể loại rộng lớn của văn chương có sử dụng yếu tố hồi hộp, căng thẳng như là yếu tố chính của phim'),
('TL7', 'Kỳ Ảo', 'Bối cảnh thường không có thật, thường liên quan đến hiện tượng siêu nhiên, magic'),
('TL8', 'Chính Kịch', 'Thường tập trung nói về cuộc đời hoặc một giai đoạn trong cuộc đời nhân vật chính'),
('TL9', 'Lãng Mạn', 'Tập trung khai thác tình yêu lãnh mạn giữa các nhân vật chính');


INSERT INTO dienvien (MADV, TENDV, NAMEANH) 
VALUES 
('PM001DV1', 'Greg Hsu', 'greghsu.jpg'),
('PM001DV2', 'Kaya Kiyohara', 'kayakiyohara.jpg'),
('PM002DV1', 'Nell Tiger Free', 'nell.jpg'),
('PM002DV2', 'Tawfeek Barhom', 'tawfeek.jpg'),
('PM002DV3', 'Sônia Braga', 'sonia.jpg'),
('PM003DV1', 'Kirsten Dunst', 'kirsten.jpg'),
('PM003DV2', 'Wagner Moura', 'wagner.jpg'),
('PM004DV1', 'Paul Rudd', 'paul.jpg'),
('PM004DV2', 'Carrie Coon', 'carrie.jpg'),
('PM004DV3', 'Finn Wolfhard', 'finn.jpg'),
('PM004DV4', 'Mckenna Grace', 'mckenna.jpg'),
('PM005DV1', 'Rebecca Hall', 'rebecca.jpg'),
('PM005DV2', 'Brian Tyree Henry', 'brian.jpg'),
('PM006DV1', 'Park Ji-yeon', 'parkjiyeon.jpg'),
('PM006DV2', 'Song Ji-eun', 'songjieun.jpg'),
('PM006DV3', 'Kim Nu-ri', 'kimnuri.jpg'),
('PM007DV1', 'DeWanda Wise', 'dewanda.jpg'),
('PM007DV2', 'Taegen Burns', 'taegen.jpg'),
('PM007DV3', 'Pyper Braun', 'pyper.jpg'),
('PM008DV1', 'Dev Patel', 'dev.jpg'),
('PM009DV1', 'Benoît Magimel', 'benoit.jpg'),
('PM009DV2', 'Juliette Binoche', 'juliette.jpg'),
('PM010DV1', 'Timothée Chalamet', 'timo.jpg'),
('PM010DV2', 'Zendaya', 'zendaya.jpg'),
('PM011DV1', 'Anya Taylor-Joy', 'anya.jpg'),
('PM011DV2', 'Chris Hemsworth', 'chris.jpg'),
('PM012DV1', 'Thanh Hiền', 'thanhhiien.jpg'),
('PM012DV2', 'Đinh Y Nhung', 'dinhynhung.jpg'),
('PM013DV1', 'Phiravich Attachitsataporn', 'phiravich.jpg'),
('PM013DV2', 'Witthawat Rattanaboonbaramee', 'witthawat.jpg'),
('PM014DV1', 'Chris Pratt', 'pratt.jpg'),
('PM014DV2', 'Samuel L. Jackson', 'samuel.jpg'),
('PM015DV1', 'Owen Teague', 'owen.jpg'),
('PM015DV2', 'Freya Allan', 'freya.jpg'),
('PM016DV1', 'Ryan Gosling', 'ryan.jpg'),
('PM016DV2', 'Emily Blunt', 'emily.jpg'),
('PM017DV1', 'Amy Poehler', 'amy.jpg'),
('PM017DV2', 'Phyllis Smith', 'phyllis.jpg'),
('PM018DV1', 'Thái Hòa', 'thaihoa.jpg'),
('PM018DV2', 'Xuân Lan', 'xuanlan.jpg'),
('PM018DV3', 'Uyển Ân', 'uyenan.jpg');


INSERT INTO chitietphim_theloai (MAPM, MATHELOAI) 
VALUES
('PM001', 'TL9'),
('PM002', 'TL5'),
('PM003', 'TL1'),
('PM003', 'TL7'),
('PM003', 'TL8'),
('PM004', 'TL2'),
('PM004', 'TL4'),
('PM004', 'TL7'),
('PM005', 'TL1'),
('PM005', 'TL2'),
('PM005', 'TL7'),
('PM006', 'TL6'),
('PM007', 'TL3'),
('PM007', 'TL5'),
('PM008', 'TL1'),
('PM008', 'TL6'),
('PM009', 'TL8'),
('PM009', 'TL9'),
('PM010', 'TL1'),
('PM010', 'TL2'),
('PM010', 'TL7'),
('PM011', 'TL1'),
('PM011', 'TL6'),
('PM011', 'TL7'),
('PM012', 'TL4'),
('PM012', 'TL9'),
('PM013', 'TL4'),
('PM013', 'TL5'),
('PM014', 'TL4'),
('PM014', 'TL7'),
('PM015', 'TL1'),
('PM015', 'TL7'),
('PM016', 'TL1'),
('PM016', 'TL4'),
('PM016', 'TL6'),
('PM017', 'TL4'),
('PM017', 'TL8'),
('PM018', 'TL6'),
('PM018', 'TL9');


INSERT INTO chitietphim_dienvien (MAPM, MADV) 
VALUES
('PM001', 'PM001DV1'),
('PM001', 'PM001DV2'),
('PM002', 'PM002DV1'),
('PM002', 'PM002DV2'),
('PM002', 'PM002DV3'),
('PM003', 'PM003DV1'),
('PM003', 'PM003DV2'),
('PM004', 'PM004DV1'),
('PM004', 'PM004DV2'),
('PM004', 'PM004DV3'),
('PM004', 'PM004DV4'),
('PM005', 'PM005DV1'),
('PM005', 'PM005DV2'),
('PM006', 'PM006DV1'),
('PM006', 'PM006DV2'),
('PM006', 'PM006DV3'),
('PM007', 'PM007DV1'),
('PM007', 'PM007DV2'),
('PM007', 'PM007DV3'),
('PM008', 'PM008DV1'),
('PM009', 'PM009DV1'),
('PM009', 'PM009DV2'),
('PM010', 'PM010DV1'),
('PM010', 'PM010DV2'),
('PM011', 'PM011DV1'),
('PM011', 'PM011DV2'),
('PM012', 'PM012DV1'),
('PM012', 'PM012DV2'),
('PM013', 'PM013DV1'),
('PM013', 'PM013DV2'),
('PM014', 'PM014DV1'),
('PM014', 'PM014DV2'),
('PM015', 'PM015DV1'),
('PM015', 'PM015DV2'),
('PM016', 'PM016DV1'),
('PM016', 'PM016DV2'),
('PM017', 'PM017DV1'),
('PM017', 'PM017DV2'),
('PM018', 'PM018DV1'),
('PM018', 'PM018DV2'),
('PM018', 'PM018DV3');





INSERT INTO suatchieu(MASC, NGAY,THOIGIANBATDAU) 
VALUES
('SC0001','2024-4-11','7:30:00'),
('SC0002','2024-4-11','9:30:00'),
('SC0003','2024-4-11','11:30:00'),
('SC0004','2024-4-11','13:30:00'),
('SC0005','2024-4-11','15:30:00'),
('SC0006','2024-4-11','17:30:00'),
('SC0007','2024-4-11','19:30:00'),
('SC0008','2024-4-11','21:30:00'),
('SC0009','2024-4-11','23:30:00');


INSERT INTO phongchieu(MAPHONGCHIEU, TENPHONGCHIEU,TRANGTHAI, SOGHE) 
VALUES
('PC1', 'Phong chieu so 1',1,80),
('PC2', 'Phong chieu so 2',1,80),
('PC3', 'Phong chieu so 3',1,80),
('PC4', 'Phong chieu so 4',1,80),
('PC5', 'Phong chieu so 5',1,80);


INSERT INTO lichchieuphim(MAPM, MASC,MAPHONGCHIEU, MALICHCHIEU) 
VALUES
('PM001','SC0001','PC1','LC0001'),
('PM002','SC0001','PC2','LC0002'),
('PM003','SC0002','PC3','LC0003'),
('PM004','SC0002','PC4','LC0004'),
('PM005','SC0003','PC5','LC0005'),
('PM006','SC0003','PC1','LC0006'),
('PM007','SC0004','PC2','LC0007'),
('PM008','SC0004','PC3','LC0008'),
('PM009','SC0005','PC4','LC0009'),
('PM010','SC0005','PC5','LC0010'),
('PM011','SC0006','PC1','LC0011'),
('PM012','SC0006','PC2','LC0012'),
('PM013','SC0007','PC3','LC0013'),
('PM014','SC0007','PC4','LC0014'),
('PM015','SC0008','PC5','LC0015'),
('PM016','SC0008','PC1','LC0016'),
('PM017','SC0009','PC2','LC0017'),
('PM018','SC0009','PC3','LC0018');


INSERT INTO ve(MAVE, USERNAME,MALICHCHIEU, TONGTIEN,NGAY,THOIGIAN,PHUONGTHUCTHANHTOAN) 
VALUES
('MV0001','Tuan123', 'LC0001',100000,'2024-3-1','10:40:32','Ngân hàng'),
('MV0002','Tuan13', 'LC0001',100000,'2024-1-1','14:41:22','Momo'),
('MV0003','Oanh314', 'LC0002',100000,'2024-4-23','12:11:12','Ngân hàng'),
('MV0004','Oanh342', 'LC0002',100000,'2024-2-21','15:10:52','Momo'),
('MV0005','Quynh131', 'LC0003',100000,'2024-1-11','12:16:12','Momo'),
('MV0006','Quynh131', 'LC0003',100000,'2024-4-11','11:17:42','Momo'),
('MV0007','Quynh422', 'LC0004',100000,'2024-3-12','17:37:46','ZaloPay');

INSERT INTO chitietve_ghe(MAVE, MAGHE,PRICE) 
VALUES
('MV0001','PC1A1',100000),
('MV0002','PC1D5',100000),
('MV0003','PC2C4',100000),
('MV0004','PC2B2',100000),
('MV0005','PC3A6',100000),
('MV0006','PC3A8',100000),
('MV0007','PC4E2',100000);

INSERT INTO chitietthongke(NGAY, MAPM, TONGDOANHTHU, TONGVE) 
VALUES
('2024-4-13', 'PM002',1200000,12),
('2024-4-13', 'PM004',1900000,19),
('2024-4-13', 'PM001',100000,1),
('2024-4-13', 'PM013',2000000,20),
('2024-4-13', 'PM011',3000000,30),

('2024-4-14', 'PM001',400000,4),
('2024-4-14', 'PM006',1400000,14),
('2024-4-14', 'PM011',600000,6),
('2024-4-14', 'PM003',1900000,19),
('2024-4-14', 'PM009',2500000,25);


INSERT INTO thongke(NGAY, TONGDOANHTHU,TONGVE) 
VALUES

('2024-4-13', 8200000,82),
('2024-4-14', 6800000,68);


INSERT INTO ngayle(NGAY, PHANTRAMGIATANG) 
VALUES 
('2024-9-2', 20),
('2024-3-8', 25),
('2024-6-1', 25),
('2024-11-19', 20),
('2024-10-20', 20),
('2024-2-14', 25),
('2024-4-18', 20),
('2024-4-14', 25);


INSERT INTO ghe(STT,MAGHE,MAPHONGCHIEU, MALOAIGHE,HANGGHE,TRANGTHAI) 
VALUES 
(1, 'PC1A1','PC1','STD','A',1),
(2, 'PC1A2','PC1','STD','A',1),
(3, 'PC1A3','PC1','STD','A',1),
(4, 'PC1A4','PC1','STD','A',1),
(5, 'PC1A5','PC1','STD','A',1),
(6, 'PC1A6','PC1','STD','A',1),
(7, 'PC1A7','PC1','STD','A',1),
(8, 'PC1A8','PC1','STD','A',1),
(9, 'PC1A9','PC1','STD','A',1),
(10, 'PC1A10','PC1','STD','A',1),
(11, 'PC1B1','PC1','STD','B',1),
(12, 'PC1B2','PC1','STD','B',1),
(13, 'PC1B3','PC1','STD','B',1),
(14, 'PC1B4','PC1','STD','B',1),
(15, 'PC1B5','PC1','STD','B',1),
(16, 'PC1B6','PC1','STD','B',1),
(17, 'PC1B7','PC1','STD','B',1),
(18, 'PC1B8','PC1','STD','B',1),
(19, 'PC1B9','PC1','STD','B',1),
(20, 'PC1B10','PC1','STD','B',1),
(21, 'PC1C1','PC1','STD','C',1),
(22, 'PC1C2','PC1','STD','C',1),
(23, 'PC1C3','PC1','STD','C',1),
(24, 'PC1C4','PC1','STD','C',1),
(25, 'PC1C5','PC1','STD','C',1),
(26, 'PC1C6','PC1','STD','C',1),
(27, 'PC1C7','PC1','STD','C',1),
(28, 'PC1C8','PC1','STD','C',1),
(29, 'PC1C9','PC1','STD','C',1),
(30, 'PC1C10','PC1','STD','C',1),
(31, 'PC1D1','PC1','BIZ','D',1),
(32, 'PC1D2','PC1','BIZ','D',1),
(33, 'PC1D3','PC1','BIZ','D',1),
(34, 'PC1D4','PC1','BIZ','D',1),
(35, 'PC1D5','PC1','BIZ','D',1),
(36, 'PC1D6','PC1','BIZ','D',1),
(37, 'PC1D7','PC1','BIZ','D',1),
(38, 'PC1D8','PC1','BIZ','D',1),
(39, 'PC1D9','PC1','BIZ','D',1),
(40, 'PC1D10','PC1','BIZ','D',1),
(41, 'PC1E1','PC1','BIZ','E',1),
(42, 'PC1E2','PC1','BIZ','E',1),
(43, 'PC1E3','PC1','BIZ','E',1),
(44, 'PC1E4','PC1','BIZ','E',1),
(45, 'PC1E5','PC1','BIZ','E',1),
(46, 'PC1E6','PC1','BIZ','E',1),
(47, 'PC1E7','PC1','BIZ','E',1),
(48, 'PC1E8','PC1','BIZ','E',1),
(49, 'PC1E9','PC1','BIZ','E',1),
(50, 'PC1E10','PC1','BIZ','E',1),
(51, 'PC1F1','PC1','BIZ','F',1),
(52, 'PC1F2','PC1','BIZ','F',1),
(53, 'PC1F3','PC1','BIZ','F',1),
(54, 'PC1F4','PC1','BIZ','F',1),
(55, 'PC1F5','PC1','BIZ','F',1),
(56, 'PC1F6','PC1','BIZ','F',1),
(57, 'PC1F7','PC1','BIZ','F',1),
(58, 'PC1F8','PC1','BIZ','F',1),
(59, 'PC1F9','PC1','BIZ','F',1),
(60, 'PC1F10','PC1','BIZ','F',1),
(61, 'PC1G1','PC1','DOI','G',1),
(62, 'PC1G2','PC1','DOI','G',1),
(63, 'PC1G3','PC1','DOI','G',1),
(64, 'PC1G4','PC1','DOI','G',1),
(65, 'PC1G5','PC1','DOI','G',1),
(66, 'PC2A1','PC2','STD','A',1),
(67, 'PC2A2','PC2','STD','A',1),
(68, 'PC2A3','PC2','STD','A',1),
(69, 'PC2A4','PC2','STD','A',1),
(70, 'PC2A5','PC2','STD','A',1),
(71, 'PC2A6','PC2','STD','A',1),
(72, 'PC2A7','PC2','STD','A',1),
(73, 'PC2A8','PC2','STD','A',1),
(74, 'PC2A9','PC2','STD','A',1),
(75, 'PC2A10','PC2','STD','A',1),
(76, 'PC2B1','PC2','STD','B',1),
(77, 'PC2B2','PC2','STD','B',1),
(78, 'PC2B3','PC2','STD','B',1),
(79, 'PC2B4','PC2','STD','B',1),
(80, 'PC2B5','PC2','STD','B',1),
(81, 'PC2B6','PC2','STD','B',1),
(82, 'PC2B7','PC2','STD','B',1),
(83, 'PC2B8','PC2','STD','B',1),
(84, 'PC2B9','PC2','STD','B',1),
(85, 'PC2B10','PC2','STD','B',1),
(86, 'PC2C1','PC2','STD','C',1),
(87, 'PC2C2','PC2','STD','C',1),
(88, 'PC2C3','PC2','STD','C',1),
(89, 'PC2C4','PC2','STD','C',1),
(90, 'PC2C5','PC2','STD','C',1),
(91, 'PC2C6','PC2','STD','C',1),
(92, 'PC2C7','PC2','STD','C',1),
(93, 'PC2C8','PC2','STD','C',1),
(94, 'PC2C9','PC2','STD','C',1),
(95, 'PC2C10','PC2','STD','C',1),
(96, 'PC2D1','PC2','BIZ','D',1),
(97, 'PC2D2','PC2','BIZ','D',1),
(98, 'PC2D3','PC2','BIZ','D',1),
(99, 'PC2D4','PC2','BIZ','D',1),
(100, 'PC2D5','PC2','BIZ','D',1),
(101, 'PC2D6','PC2','BIZ','D',1),
(102, 'PC2D7','PC2','BIZ','D',1),
(103, 'PC2D8','PC2','BIZ','D',1),
(104, 'PC2D9','PC2','BIZ','D',1),
(105, 'PC2D10','PC2','BIZ','D',1),
(106, 'PC2E1','PC2','BIZ','E',1),
(107, 'PC2E2','PC2','BIZ','E',1),
(108, 'PC2E3','PC2','BIZ','E',1),
(109, 'PC2E4','PC2','BIZ','E',1),
(110, 'PC2E5','PC2','BIZ','E',1),
(111, 'PC2E6','PC2','BIZ','E',1),
(112, 'PC2E7','PC2','BIZ','E',1),
(113, 'PC2E8','PC2','BIZ','E',1),
(114, 'PC2E9','PC2','BIZ','E',1),
(115, 'PC2E10','PC2','BIZ','E',1),
(116, 'PC2F1','PC2','BIZ','F',1),
(117, 'PC2F2','PC2','BIZ','F',1),
(118, 'PC2F3','PC2','BIZ','F',1),
(119, 'PC2F4','PC2','BIZ','F',1),
(120, 'PC2F5','PC2','BIZ','F',1),
(121, 'PC2F6','PC2','BIZ','F',1),
(122, 'PC2F7','PC2','BIZ','F',1),
(123, 'PC2F8','PC2','BIZ','F',1),
(124, 'PC2F9','PC2','BIZ','F',1),
(125, 'PC2F10','PC2','BIZ','F',1),
(126, 'PC2G1','PC2','DOI','G',1),
(127, 'PC2G2','PC2','DOI','G',1),
(128, 'PC2G3','PC2','DOI','G',1),
(129, 'PC2G4','PC2','DOI','G',1),
(130, 'PC2G5','PC2','DOI','G',1),
(131, 'PC3A1','PC3','STD','A',1),
(132, 'PC3A2','PC3','STD','A',1),
(133, 'PC3A3','PC3','STD','A',1),
(134, 'PC3A4','PC3','STD','A',1),
(135, 'PC3A5','PC3','STD','A',1),
(136, 'PC3A6','PC3','STD','A',1),
(137, 'PC3A7','PC3','STD','A',1),
(138, 'PC3A8','PC3','STD','A',1),
(139, 'PC3A9','PC3','STD','A',1),
(140, 'PC3A10','PC3','STD','A',1),
(141, 'PC3B1','PC3','STD','B',1),
(142, 'PC3B2','PC3','STD','B',1),
(143, 'PC3B3','PC3','STD','B',1),
(144, 'PC3B4','PC3','STD','B',1),
(145, 'PC3B5','PC3','STD','B',1),
(146, 'PC3B6','PC3','STD','B',1),
(147, 'PC3B7','PC3','STD','B',1),
(148, 'PC3B8','PC3','STD','B',1),
(149, 'PC3B9','PC3','STD','B',1),
(150, 'PC3B10','PC3','STD','B',1),
(151, 'PC3C1','PC3','STD','C',1),
(152, 'PC3C2','PC3','STD','C',1),
(153, 'PC3C3','PC3','STD','C',1),
(154, 'PC3C4','PC3','STD','C',1),
(155, 'PC3C5','PC3','STD','C',1),
(156, 'PC3C6','PC3','STD','C',1),
(157, 'PC3C7','PC3','STD','C',1),
(158, 'PC3C8','PC3','STD','C',1),
(159, 'PC3C9','PC3','STD','C',1),
(160, 'PC3C10','PC3','STD','C',1),
(161, 'PC3D1','PC3','BIZ','D',1),
(162, 'PC3D2','PC3','BIZ','D',1),
(163, 'PC3D3','PC3','BIZ','D',1),
(164, 'PC3D4','PC3','BIZ','D',1),
(165, 'PC3D5','PC3','BIZ','D',1),
(166, 'PC3D6','PC3','BIZ','D',1),
(167, 'PC3D7','PC3','BIZ','D',1),
(168, 'PC3D8','PC3','BIZ','D',1),
(169, 'PC3D9','PC3','BIZ','D',1),
(170, 'PC3D10','PC3','BIZ','D',1),
(171, 'PC3E1','PC3','BIZ','E',1),
(172, 'PC3E2','PC3','BIZ','E',1),
(173, 'PC3E3','PC3','BIZ','E',1),
(174, 'PC3E4','PC3','BIZ','E',1),
(175, 'PC3E5','PC3','BIZ','E',1),
(176, 'PC3E6','PC3','BIZ','E',1),
(177, 'PC3E7','PC3','BIZ','E',1),
(178, 'PC3E8','PC3','BIZ','E',1),
(179, 'PC3E9','PC3','BIZ','E',1),
(180, 'PC3E10','PC3','BIZ','E',1),
(181, 'PC3F1','PC3','BIZ','F',1),
(182, 'PC3F2','PC3','BIZ','F',1),
(183, 'PC3F3','PC3','BIZ','F',1),
(184, 'PC3F4','PC3','BIZ','F',1),
(185, 'PC3F5','PC3','BIZ','F',1),
(186, 'PC3F6','PC3','BIZ','F',1),
(187, 'PC3F7','PC3','BIZ','F',1),
(188, 'PC3F8','PC3','BIZ','F',1),
(189, 'PC3F9','PC3','BIZ','F',1),
(190, 'PC3F10','PC3','BIZ','F',1),
(191, 'PC3G1','PC3','DOI','G',1),
(192, 'PC3G2','PC3','DOI','G',1),
(193, 'PC3G3','PC3','DOI','G',1),
(194, 'PC3G4','PC3','DOI','G',1),
(195, 'PC3G5','PC3','DOI','G',1),
(196, 'PC4A1','PC4','STD','A',1),
(197, 'PC4A2','PC4','STD','A',1),
(198, 'PC4A3','PC4','STD','A',1),
(199, 'PC4A4','PC4','STD','A',1),
(200, 'PC4A5','PC4','STD','A',1),
(201, 'PC4A6','PC4','STD','A',1),
(202, 'PC4A7','PC4','STD','A',1),
(203, 'PC4A8','PC4','STD','A',1),
(204, 'PC4A9','PC4','STD','A',1),
(205, 'PC4A10','PC4','STD','A',1),
(206, 'PC4B1','PC4','STD','B',1),
(207, 'PC4B2','PC4','STD','B',1),
(208, 'PC4B3','PC4','STD','B',1),
(209, 'PC4B4','PC4','STD','B',1),
(210, 'PC4B5','PC4','STD','B',1),
(211, 'PC4B6','PC4','STD','B',1),
(212, 'PC4B7','PC4','STD','B',1),
(213, 'PC4B8','PC4','STD','B',1),
(214, 'PC4B9','PC4','STD','B',1),
(215, 'PC4B10','PC4','STD','B',1),
(216, 'PC4C1','PC4','STD','C',1),
(217, 'PC4C2','PC4','STD','C',1),
(218, 'PC4C3','PC4','STD','C',1),
(219, 'PC4C4','PC4','STD','C',1),
(220, 'PC4C5','PC4','STD','C',1),
(221, 'PC4C6','PC4','STD','C',1),
(222, 'PC4C7','PC4','STD','C',1),
(223, 'PC4C8','PC4','STD','C',1),
(224, 'PC4C9','PC4','STD','C',1),
(225, 'PC4C10','PC4','STD','C',1),
(226, 'PC4D1','PC4','BIZ','D',1),
(227, 'PC4D2','PC4','BIZ','D',1),
(228, 'PC4D3','PC4','BIZ','D',1),
(229, 'PC4D4','PC4','BIZ','D',1),
(230, 'PC4D5','PC4','BIZ','D',1),
(231, 'PC4D6','PC4','BIZ','D',1),
(232, 'PC4D7','PC4','BIZ','D',1),
(233, 'PC4D8','PC4','BIZ','D',1),
(234, 'PC4D9','PC4','BIZ','D',1),
(235, 'PC4D10','PC4','BIZ','D',1),
(236, 'PC4E1','PC4','BIZ','E',1),
(237, 'PC4E2','PC4','BIZ','E',1),
(238, 'PC4E3','PC4','BIZ','E',1),
(239, 'PC4E4','PC4','BIZ','E',1),
(240, 'PC4E5','PC4','BIZ','E',1),
(241, 'PC4E6','PC4','BIZ','E',1),
(242, 'PC4E7','PC4','BIZ','E',1),
(243, 'PC4E8','PC4','BIZ','E',1),
(244, 'PC4E9','PC4','BIZ','E',1),
(245, 'PC4E10','PC4','BIZ','E',1),
(246, 'PC4F1','PC4','BIZ','F',1),
(247, 'PC4F2','PC4','BIZ','F',1),
(248, 'PC4F3','PC4','BIZ','F',1),
(249, 'PC4F4','PC4','BIZ','F',1),
(250, 'PC4F5','PC4','BIZ','F',1),
(251, 'PC4F6','PC4','BIZ','F',1),
(252, 'PC4F7','PC4','BIZ','F',1),
(253, 'PC4F8','PC4','BIZ','F',1),
(254, 'PC4F9','PC4','BIZ','F',1),
(255, 'PC4F10','PC4','BIZ','F',1),
(256, 'PC4G1','PC4','DOI','G',1),
(257, 'PC4G2','PC4','DOI','G',1),
(258, 'PC4G3','PC4','DOI','G',1),
(259, 'PC4G4','PC4','DOI','G',1),
(260, 'PC4G5','PC4','DOI','G',1),
(261, 'PC5A1','PC5','STD','A',1),
(262, 'PC5A2','PC5','STD','A',1),
(263, 'PC5A3','PC5','STD','A',1),
(264, 'PC5A4','PC5','STD','A',1),
(265, 'PC5A5','PC5','STD','A',1),
(266, 'PC5A6','PC5','STD','A',1),
(267, 'PC5A7','PC5','STD','A',1),
(268, 'PC5A8','PC5','STD','A',1),
(269, 'PC5A9','PC5','STD','A',1),
(270, 'PC5A10','PC5','STD','A',1),
(271, 'PC5B1','PC5','STD','B',1),
(272, 'PC5B2','PC5','STD','B',1),
(273, 'PC5B3','PC5','STD','B',1),
(274, 'PC5B4','PC5','STD','B',1),
(275, 'PC5B5','PC5','STD','B',1),
(276, 'PC5B6','PC5','STD','B',1),
(277, 'PC5B7','PC5','STD','B',1),
(278, 'PC5B8','PC5','STD','B',1),
(279, 'PC5B9','PC5','STD','B',1),
(280, 'PC5B10','PC5','STD','B',1),
(281, 'PC5C1','PC5','STD','C',1),
(282, 'PC5C2','PC5','STD','C',1),
(283, 'PC5C3','PC5','STD','C',1),
(284, 'PC5C4','PC5','STD','C',1),
(285, 'PC5C5','PC5','STD','C',1),
(286, 'PC5C6','PC5','STD','C',1),
(287, 'PC5C7','PC5','STD','C',1),
(288, 'PC5C8','PC5','STD','C',1),
(289, 'PC5C9','PC5','STD','C',1),
(290, 'PC5C10','PC5','STD','C',1),
(291, 'PC5D1','PC5','BIZ','D',1),
(292, 'PC5D2','PC5','BIZ','D',1),
(293, 'PC5D3','PC5','BIZ','D',1),
(294, 'PC5D4','PC5','BIZ','D',1),
(295, 'PC5D5','PC5','BIZ','D',1),
(296, 'PC5D6','PC5','BIZ','D',1),
(297, 'PC5D7','PC5','BIZ','D',1),
(298, 'PC5D8','PC5','BIZ','D',1),
(299, 'PC5D9','PC5','BIZ','D',1),
(300, 'PC5D10','PC5','BIZ','D',1),
(301, 'PC5E1','PC5','BIZ','E',1),
(302, 'PC5E2','PC5','BIZ','E',1),
(303, 'PC5E3','PC5','BIZ','E',1),
(304, 'PC5E4','PC5','BIZ','E',1),
(305, 'PC5E5','PC5','BIZ','E',1),
(306, 'PC5E6','PC5','BIZ','E',1),
(307, 'PC5E7','PC5','BIZ','E',1),
(308, 'PC5E8','PC5','BIZ','E',1),
(309, 'PC5E9','PC5','BIZ','E',1),
(310, 'PC5E10','PC5','BIZ','E',1),
(311, 'PC5F1','PC5','BIZ','F',1),
(312, 'PC5F2','PC5','BIZ','F',1),
(313, 'PC5F3','PC5','BIZ','F',1),
(314, 'PC5F4','PC5','BIZ','F',1),
(315, 'PC5F5','PC5','BIZ','F',1),
(316, 'PC5F6','PC5','BIZ','F',1),
(317, 'PC5F7','PC5','BIZ','F',1),
(318, 'PC5F8','PC5','BIZ','F',1),
(319, 'PC5F9','PC5','BIZ','F',1),
(320, 'PC5F10','PC5','BIZ','F',1),
(321, 'PC5G1','PC5','DOI','G',1),
(322, 'PC5G2','PC5','DOI','G',1),
(323, 'PC5G3','PC5','DOI','G',1),
(324, 'PC5G4','PC5','DOI','G',1),
(325, 'PC5G5','PC5','DOI','G',1);


INSERT INTO loaighe(MALOAIGHE, TENLOAIGHE,PRICE) 
VALUES 
('STD', 'thường',80000),
('BIZ', 'vip',100000),
('DOI', 'đôi',150000);




INSERT INTO quyen(MAQUYEN,TENQUYEN)
VALUES ('QKH','Quyền khách hàng'),
('QQL','Quyền quản lí'),
('QAD','Quyền Admin');

INSERT INTO taikhoan(USERNAME,PASSWORD,NGAYTAOTK,TRANGTHAI,EMAIL,HOTEN,NAMEANH,MAQUYEN,THOIGIANTAOTK)
VALUES ("Oanhle2222","Hoichima33","2023-9-21",1,"3122hehehe@gmail.com","Oanh le",'Oanhle2222.png','QKH','20:30:00'),
("Tuankhung2","Tuilatuankhung","2023-10-21",1,"tuan33@gmail.com","Tuan vo",'Tuankhung2.png','QKH','21:30:00'),
("Quynhquynh","meomeo122","2023-10-2",1,"quynhnt@gmail.com","Quynh ne",'Quynhquynh.png','QQL','8:30:00'),
("Trung442","trung3312","2023-8-2",1,"trung22@gmail.com","Trunggg",'Trung442.png','QAD','10:30:00');

INSERT INTO chucnang(MACHUCNANG,TENCHUCNANG)
VALUES
 ('LCP','Lịch chiếu phim'),
('PM','Phim'),
('PC','Phòng chiếu'),
('PQ','Phân quyền'),
('TK','Tài khoản'),
('DV','Dịch vụ'),
('UUDAI','Ưu đãi');

INSERT INTO chitietquyen_chucnang(MAQUYEN,MACHUCNANG,HANHDONG)
VALUES ('QKH','DV','Xem'),
('QKH','LCP','Xem'),
('QKH','PM','Xem'),
('QKH','PC','Xem'),
('QKH','TK','Xem'),
('QKH','UUDAI','Xem'),
('QQL','DV','Xem'),
('QQL','DV','Sửa'),
('QQL','DV','Xóa'),
('QQL','LCP','Xem'),
('QQL','LCP','Sửa'),
('QQL','LCP','Xóa'),
('QQL','LCP','Thêm'),
('QQL','PM','Xem'),
('QQL','PM','Sửa'),
('QQL','PM','Xóa'),
('QQL','PM','Thêm'),
('QQL','PC','Xem'),
('QQL','PC','Sửa'),
('QQL','TK','Xem'),
('QQL','TK','Sửa'),
('QQL','TK','Xóa'),
('QQL','UUDAI','Xem'),
('QQL','UUDAI','Thêm'),
('QQL','UUDAI','Xóa'),
('QQL','PQ','Xem'),
('QQL','PQ','Thêm'),
('QQL','PQ','Sửa'),
('QQL','PQ','Xóa'),
('QAD','TK','Xem'),
('QAD','TK','Thêm'),
('QAD','TK','Sửa');







INSERT INTO dichvu(MADICHVU, TENDICHVU, NAMEANH, MOTA, PRICE)
VALUES 
('MDV001', 'Nước CoCa', 'cocacola.jpg', '1 lon nước có gas', 20000),
('MDV002', 'Nước Fanta Cam', 'fantacam.jpg', '1 lon nước có gas', 20000),
('MDV003', 'Nước Pepsi', 'pepsi.jpg', '1 lon nước có gas', 20000),
('MDV004', 'Nước Suối', 'nuocsuoi.jpg', '1 chai nước tinh khiết', 15000),
('MDV005', 'Bắp Phô Mai', 'bapphomai.jpg', '1 bắp phô mai', 35000),
('MDV006', 'Bắp Nguyên Bản', 'bapnguyenban.jpg', '1 bắp nguyên bản', 35000),
('MDV007', 'Combo 2 nước + 1 bắp', 'combo2nuoc1bap.jpg', 'TIẾT KIỆM 15K!!! Gồm: 2 nước có gas + 1 bắp', 60000),
('MDV008', 'Combo 2 bắp 1 nước', 'combo2bap1nuoc.jpg', 'TIẾT KIỆM 15K!!! Gồm: 2 bắp + 1 nước có gas', 70000);

INSERT INTO uudai(CODE, TENUUDAI, PHANTRAMUUDAI,DIEUKIEN,TRANGTHAI)
VALUES 
('MUD001', 'Hoá Đơn trên 150.000đ giảm 5%', 5,'150000',1),
('MUD002', 'Hoá Đơn trên 250.000đ giảm 10%', 10,'250000',0),
('MUD003', 'Hoá Đơn trên 350.000đ giảm 15%', 15,'350000',0),
('MUD004', 'Hoá Đơn trên 450.000đ giảm 20%', 20,'450000',1),
('MUD005', 'Hoá Đơn trên 500.000đ giảm 25%', 25,'500000',1),
('MUD006', 'Hoá Đơn trên 1.000.000đ giảm 40%', 30,'1000000',0),
('MUD007', 'Khách hàng mới giảm 5%', 5,'KHM',1),
('MUD008', 'Ưu đãi thứ 3 hàng tuần', 15,'TUESDAY',1);





COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
