-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 25, 2024 lúc 04:42 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtttn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name`, `diachi`, `phone`, `username`, `password`, `admin_status`) VALUES
(1, 'ADMIN', '', '0914756340', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(21, 'Võ Văn Bảo ', 'Việt Hàn', '333355555333', 'vovanbaoadmin@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(24, 'Nguyễn Thị Hoa', 'Hòa Quý', '05478385940 ', 'hoa123@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int NOT NULL,
  `id_khachhang` int NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int NOT NULL,
  `thoigian` datetime NOT NULL,
  `cart_payment` varchar(50) NOT NULL,
  `cart_shipping` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `thoigian`, `cart_payment`, `cart_shipping`) VALUES
(14, 1, '3622', 2, '2023-12-22 21:43:25', 'chuyenkhoan', 2),
(15, 2, '591', 2, '2023-12-22 21:58:55', 'MOMO', 3),
(16, 2, '9837', 1, '2023-12-22 22:17:53', 'MOMO', 3),
(17, 1, '9603', 1, '2023-12-22 22:22:28', 'vnpay', 2),
(18, 1, '3175', 0, '2023-12-22 22:26:13', 'chuyenkhoan', 2),
(19, 1, '1590', 0, '2023-12-23 02:46:48', 'chuyenkhoan', 2),
(20, 1, '8840', 5, '2024-01-04 23:04:16', 'chuyenkhoan', 2),
(21, 1, '5717', 2, '2024-01-05 04:09:44', 'vnpay', 2),
(22, 1, '6854', 5, '2024-01-05 14:45:43', 'vnpay', 2),
(23, 2, '2435', 5, '2024-01-06 13:07:58', 'MOMO', 3),
(24, 2, '7328', 5, '2024-01-06 15:28:28', 'chuyenkhoan', 3),
(25, 2, '6698', 0, '2024-01-23 22:29:46', 'chuyenkhoan', 3),
(26, 5, '7310', 1, '2024-05-24 20:02:16', 'tienmat', 4),
(27, 5, '5090', 2, '2024-05-24 20:07:28', 'MOMO', 4),
(28, 5, '8380', 1, '2024-05-24 23:46:01', 'tienmat', 4),
(29, 5, '2010', 1, '2024-05-24 23:48:18', 'MOMO', 4),
(30, 27, '2359', 2, '2024-05-25 00:01:35', 'tienmat', 5),
(31, 27, '7643', 2, '2024-05-25 02:19:47', 'tienmat', 5),
(32, 27, '5583', 2, '2024-05-25 02:21:20', 'tienmat', 5),
(33, 5, '3757', 2, '2024-05-25 10:58:56', 'MOMO', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int NOT NULL,
  `soluongmua` int NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`, `thoigian`) VALUES
(14, '3622', 2, 1, '2023-12-22 21:43:25'),
(15, '591', 7, 1, '2023-12-22 21:58:55'),
(16, '9603', 3, 1, '2023-12-22 22:22:28'),
(17, '3175', 6, 1, '2023-12-22 22:26:13'),
(18, '1590', 12, 1, '2023-12-23 02:46:48'),
(19, '8840', 24, 1, '2024-01-04 23:04:16'),
(20, '5717', 23, 1, '2024-01-05 04:09:44'),
(21, '6854', 30, 1, '2024-01-05 14:45:43'),
(22, '2435', 24, 1, '2024-01-06 13:07:58'),
(23, '7328', 24, 1, '2024-01-06 15:28:28'),
(24, '6698', 24, 1, '2024-01-23 22:29:46'),
(25, '7310', 36, 4, '2024-05-24 20:02:16'),
(26, '5090', 32, 1, '2024-05-24 20:07:28'),
(27, '8380', 34, 1, '2024-05-24 23:46:01'),
(28, '2010', 32, 1, '2024-05-24 23:48:18'),
(29, '2359', 31, 3, '2024-05-25 00:01:35'),
(30, '7643', 34, 1, '2024-05-25 02:19:47'),
(31, '5583', 10, 1, '2024-05-25 02:21:20'),
(32, '3757', 10, 1, '2024-05-25 10:58:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`, `level`) VALUES
(2, 'Tuấn Đạt', 'tuanquynh2204@gmail.com', 'Quảng Ngãi', '202cb962ac59075b964b07152d234b70', '0914756340', 3),
(3, 'Võ Văn Bảo ', 'baovv.22ns@vku.udn.vn', 'VKU :)', '202cb962ac59075b964b07152d234b70', '0382182410', 3),
(5, 'Tuấn Tú', 'tuanquynhaz11@gmail.com', '209 Phù Đổng Thiên Vương,TP.Hội An,tỉnh Quảng Nam', '202cb962ac59075b964b07152d234b70', '0914756340', 3),
(25, 'Thanh Thảo', 'thanhthao@gmail.com', 'Quãng Bình', '202cb962ac59075b964b07152d234b70', '0789456230', 3),
(26, 'Huỳnh Ngọc Tuấn Quỳnh', 'tuanquynhaz11@gmail.com', '209 Phù Đổng Thiên Vương,TP.Hội An,tỉnh Quảng Nam', '202cb962ac59075b964b07152d234b70', '0914756340', 3),
(27, 'Phạm Hùng', 'phammanhhung10x@gmail.com', 'Hà Nội \r\n', '1b87c3b50ca546faddc76761bd138071', '0356524955', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int NOT NULL,
  `hovaten` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `vande` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `hovaten`, `email`, `vande`) VALUES
(1, 'Phạm Hùng', 'phammanhhung10x@gmail.com', 'Quần áo đẹp.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `id_loaisanpham` int NOT NULL,
  `tenloaisanpham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`id_loaisanpham`, `tenloaisanpham`, `mota`) VALUES
(1, 'Quần áo Nam', 'Quần áo thoáng mát dành riêng cho nam giới: Áo phông, Ba lỗ, ... Quần áo lịch sự dành riêng cho công sở.'),
(2, 'Quần áo Nữ ', 'Quần áo xinh xẻo cho các nàng, Váy công sở, Chân váy, ...'),
(3, 'Quần áo Trẻ em', 'Đẹp dễ mặc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_mausac`
--

CREATE TABLE `tbl_mausac` (
  `id_mausac` int NOT NULL,
  `id_sanpham` int NOT NULL,
  `loaimau` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hinhanh` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_mausac`
--

INSERT INTO `tbl_mausac` (`id_mausac`, `id_sanpham`, `loaimau`, `hinhanh`) VALUES
(1, 36, 'Đỏ', 'mau_do.jpg'),
(2, 36, 'Trắng', 'mau_trang.jpg'),
(3, 36, 'Xanh Lá Cây Đậm', 'mau_xanhlacaydam.jpg'),
(4, 35, 'Nâu', 'mau_nau.jpg'),
(5, 34, 'Xanh Đậm', 'mau_xanhdam.png'),
(6, 33, 'Xám', 'mau_xam.png'),
(7, 32, 'Đỏ Đậm', 'mau_dodam.png'),
(8, 31, 'Đen', 'mau_den.webp'),
(9, 30, 'Đen', 'mau_den.webp'),
(10, 29, 'Đen', 'mau_den.webp'),
(11, 28, 'Trắng', 'mau_trang.jpg'),
(12, 27, 'Xanh', 'product_color.png'),
(13, 26, 'Đỏ Đậm', 'mau_dodam.png'),
(14, 25, 'Xám', 'mau_xam.png'),
(15, 24, 'Đen', 'mau_den.webp'),
(16, 23, 'Xám', 'mau_xam.png'),
(17, 22, 'Đen', 'mau_den.webp'),
(18, 21, 'Trắng', 'mau_trang.jpg'),
(19, 20, 'Đỏ', 'mau_do.png'),
(20, 19, 'Xám', 'mau_xam.png'),
(21, 18, 'Đỏ', 'mau_do.png'),
(22, 17, 'Xanh Đậm', 'mau_xanhdam.png'),
(23, 16, 'Xám', 'mau_xam.png'),
(24, 15, 'Đen', 'mau_den.webp'),
(25, 14, 'Xám', 'mau_xam.png'),
(26, 13, 'Đen', 'mau_den.webp'),
(27, 12, 'Trắng', 'mau_trang.jpg'),
(28, 11, 'Xanh Lá Cây', 'mau_xanhlacay.png'),
(29, 10, 'Trắng', 'mau_trang.jpg'),
(30, 9, 'Đỏ', 'mau_do.png'),
(31, 8, 'Vàng', 'mau_vang.png'),
(32, 7, 'Trắng', 'mau_trang.jpg'),
(33, 6, 'Trắng', 'mau_trang.jpg'),
(34, 5, 'Hồng', 'mau_hongdam.png'),
(35, 4, 'Đỏ', 'mau_dodam.png'),
(36, 3, 'Xanh Lá Cây Đậm', 'mau_xanhlacaydam.jpg'),
(37, 2, 'Đen', 'mau_den.webp'),
(39, 1, 'Đen', 'mau_den.webp'),
(40, 1, 'Xanh Lá Cây', 'mau_xanhlacay.png'),
(41, 1, 'Đỏ', 'mau_do.png'),
(42, 2, 'Xanh', 'product_color.png'),
(43, 2, 'Nâu', 'mau_nau.jpg'),
(44, 3, 'Đỏ', 'mau_do.png'),
(45, 3, 'Xám', 'mau_xam.png'),
(46, 4, 'Xanh Lá Cây', 'mau_xanhlacay.png'),
(47, 4, 'Nâu', 'mau_nau.jpg'),
(48, 5, 'Đỏ', 'mau_do.png'),
(49, 5, 'Trắng', 'mau_trang.jpg'),
(50, 6, 'Xám', 'mau_xam.png'),
(51, 6, 'Đỏ', 'mau_do.png'),
(52, 7, 'Xám', 'mau_xam.png'),
(53, 7, 'Đỏ', 'mau_do.png'),
(54, 8, 'Xám', 'mau_xam.png'),
(55, 8, 'Xanh', 'product_color.png'),
(56, 9, 'Trắng', 'mau_trang.jpg'),
(57, 9, 'Nâu', 'mau_nau.jpg'),
(58, 10, 'Đỏ', 'mau_do.png'),
(59, 10, 'Nâu', 'mau_nau.jpg'),
(60, 11, 'Đỏ', 'mau_do.png'),
(61, 11, 'Trắng', 'mau_trang.jpg'),
(62, 12, 'Đỏ', 'mau_do.png'),
(63, 12, 'Hồng', 'mau_hongdam.png'),
(64, 13, 'Đỏ', 'mau_do.png'),
(65, 13, 'Xanh', 'product_color.png'),
(66, 14, 'Đỏ', 'mau_do.png'),
(67, 14, 'Nâu', 'mau_nau.jpg'),
(68, 15, 'Đỏ', 'mau_do.png'),
(69, 15, 'Hồng', 'mau_hongdam.png'),
(70, 16, 'Đỏ', 'mau_do.png'),
(71, 16, 'Nâu', 'mau_nau.jpg'),
(72, 17, 'Xanh Lá Cây', 'mau_xanhlacay.png'),
(73, 17, 'Đỏ Đậm', 'mau_dodam.png'),
(74, 18, 'Xám', 'mau_xam.png'),
(75, 18, 'Nâu', 'mau_nau.jpg'),
(76, 19, 'Đỏ', 'mau_do.png'),
(77, 19, 'Nâu', 'mau_nau.jpg'),
(78, 20, 'Đỏ Đậm', 'mau_dodam.png'),
(79, 20, 'Trắng', 'mau_trang.jpg'),
(80, 21, 'Đỏ', 'mau_do.png'),
(81, 21, 'Nâu', 'mau_nau.jpg'),
(82, 22, 'Đỏ', 'mau_do.png'),
(83, 22, 'Trắng', 'mau_trang.jpg'),
(84, 23, 'Đỏ', 'mau_do.png'),
(85, 23, 'Xanh', 'product_color.png'),
(86, 24, 'Trắng', 'mau_trang.jpg'),
(87, 24, 'Xám', 'mau_xam.png'),
(88, 25, 'Vàng', 'mau_vang.png'),
(89, 25, 'Nâu', 'mau_nau.jpg'),
(90, 26, 'Đỏ', 'mau_do.png'),
(91, 26, 'Nâu', 'mau_nau.jpg'),
(92, 27, 'Xám', 'mau_xam.png'),
(93, 27, 'Trắng', 'mau_trang.jpg'),
(94, 28, 'Xám', 'mau_xam.png'),
(95, 28, 'Xanh', 'product_color.png'),
(96, 29, 'Đỏ Đậm', 'mau_dodam.png'),
(97, 29, 'Nâu', 'mau_nau.jpg'),
(98, 30, 'Đỏ Đậm', 'mau_dodam.png'),
(99, 30, 'Nâu', 'mau_nau.jpg'),
(100, 31, 'Đỏ Đậm', 'mau_dodam.png'),
(101, 31, 'Nâu', 'mau_nau.jpg'),
(102, 32, 'Nâu', 'mau_nau.jpg'),
(103, 32, 'Xanh', 'product_color.png'),
(104, 33, 'Nâu', 'mau_nau.jpg'),
(105, 33, 'Đỏ Đậm', 'mau_dodam.png'),
(106, 34, 'Xanh', 'product_color.png'),
(107, 34, 'Nâu', 'mau_nau.jpg'),
(108, 35, 'Đỏ', 'mau_do.png'),
(109, 35, 'Xám', 'mau_xam.png'),
(110, 36, 'Xám', 'mau_xam.png'),
(111, 36, 'Vàng', 'mau_vang.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int NOT NULL,
  `partner_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `order_id` int NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_info` varchar(100) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_momo`
--

INSERT INTO `tbl_momo` (`id_momo`, `partner_code`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`, `code_cart`) VALUES
(1, 'MOMOBKUN20180529', 1701171803, '7200000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3105023689', 'napas', '5394'),
(2, 'MOMOBKUN20180529', 1701171803, '7200000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3105023689', 'napas', '3858'),
(3, 'MOMOBKUN20180529', 1702626726, '23000000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3108067857', 'napas', '1506'),
(4, 'MOMOBKUN20180529', 1703256872, '9960000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3110111706', 'napas', '7812'),
(5, 'MOMOBKUN20180529', 1703257092, '9960000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3110131713', 'napas', '591'),
(6, 'MOMOBKUN20180529', 1703257092, '9960000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3110131713', 'napas', '9837'),
(7, 'MOMOBKUN20180529', 1704521213, '1950000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '3114090608', 'napas', '2435'),
(8, 'MOMOBKUN20180529', 1716555915, '375000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '4048009203', 'napas', '5090'),
(9, 'MOMOBKUN20180529', 1716569207, '375000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '4048056732', 'napas', '2010'),
(10, 'MOMOBKUN20180529', 1716609439, '179000', 'Thanh toán qua mã QR MOMO', 'momo_wallet', '4048213560', 'napas', '3757');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id_nhacungcap` int NOT NULL,
  `tennhacungcap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sodienthoai` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`id_nhacungcap`, `tennhacungcap`, `diachi`, `sodienthoai`) VALUES
(1, 'Nhà may Phương Thảo', 'Hà Nội', '0987665497'),
(2, 'Nhà may Việt Hoàng', 'Hà Nam', '0979452647'),
(3, 'Nhà may Huy Phương', 'Hải Dương', '0987566477'),
(4, 'Nhà may Hạnh Phúc', 'Hà Nội', '0987256723');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int NOT NULL,
  `tensanpham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int NOT NULL,
  `hinhanh` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loaisanpham` int NOT NULL,
  `id_nhacungcap` int NOT NULL,
  `trangthai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `id_loaisanpham`, `id_nhacungcap`, `trangthai`) VALUES
(1, 'Đồng phục học sinh tiểu học 1', 'DPHS-0032', 199000, 6, 'kid_p1.jpg', 'Đồng phục cho học sinh tiểu học năng động, phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 1, 0),
(2, 'Đồng phục học sinh tiểu học 2', 'DPHS-0028', 159000, 5, 'kid_p2.jpg', 'Đồng phục cho học sinh tiểu học năng động, phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 2, 0),
(3, 'Đồng phục học sinh tiểu học 0033', 'DPHS-0033', 149000, 7, 'kid_p3.jpg', 'Đồng phục cho trẻ năng động, thoáng mát, phá cách, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 3, 0),
(4, 'Đồng phục học sinh tiểu học 0024', 'DPHS-0024', 300000, 8, 'kid_p4.jpg', 'Đồng phục cho học sinh tiểu học năng động, phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 4, 1),
(5, 'Đồng phục học sinh tiểu học 41', 'DPHS-0066', 210000, 10, 'kid_p5.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 4, 0),
(6, 'Đồng phục học sinh tiểu học 0067', 'DPHS-0067', 195000, 6, 'kid_p6.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 3, 0),
(7, 'Đồng phục mầm non 29', 'DPMN-0029', 190000, 4, 'kid_p7.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 2, 0),
(8, 'Đồng phục mầm non 28', 'DPMN-0028', 190000, 5, 'kid_p8.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 1, 0),
(9, 'Đồng phục mầm non 27', 'DPMN-0027', 149000, 5, 'kid_p9.jpg', 'Đồng phục cho trẻ năng động, thoáng mát, phá cách, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 2, 0),
(10, 'Đồng phục mầm non 26', 'DPMN-0026', 179000, 0, 'kid_p10.jpg', 'Đồng phục cho trẻ năng động, thoáng mát, phá cách, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 3, 1),
(11, 'Đồng phục mầm non 25', 'DPMN-0025', 249000, 4, 'kid_p11.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, cá tính, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 4, 0),
(12, 'Đồng phục mầm non 07', 'DPMN-0007', 229000, 6, 'kid_p12.jpg', 'Đồng phục cho học sinh tiểu học phổ biến, thoáng mát, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 3, 1, 0),
(13, 'Áo Khoác Gió Nữ AK 017', 'DPAK-017', 375000, 4, 'woman_p1.jpg', 'Đồng phục ngoài trời, thoải mái, thời trang ...', 'Xuất xứ: Việt Nam, Chất liệu: Bông', 2, 2, 0),
(14, 'Áo Khoác Gió Nữ AK 018', 'DPAK-018', 499000, 2, 'woman_p2.jpg', 'Đồng phục ngoài trời, thoải mái, thời trang ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 3, 0),
(15, 'Áo Khoác Gió Nữ AK 011', 'DPAK-011', 619000, 3, 'woman_p3.jpg', 'Đồng phục ngoài trời, thoải mái, thời trang ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 1, 0),
(16, 'Áo Khoác Gió Nữ AK 012', 'DPAK-012', 550000, 4, 'woman_p4.jpg', 'Đồng phục ngoài trời, thoải mái, thời trang ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 4, 0),
(17, 'Áo Khoác Gió Nữ AK 014', 'DPAK-014', 600000, 7, 'woman_p5.jpg', 'Đồng phục ngoài trời, thoải mái, nhẹ ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 1, 0),
(18, 'Áo Khoác Gió Nữ AK 016', 'DPAK-016', 350000, 6, 'woman_p6.jpg', 'Đồng phục ngoài trời cho nữ, thoải mái, thoáng mát ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 2, 1),
(19, 'Áo Khoác Gió Nữ AK 015', 'DPAK-015', 25000, 4, 'woman_p7.jpg', 'Đồng phục ngoài trời cho nữ, thoải mái, thoáng mát ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 1, 0),
(20, 'Thời trang công sở nữ 0073', 'DPCS-0073', 615000, 3, 'woman_p8.jpg', 'Đồng phục công sở nữ lịch sự, sang trọng, thoải mái, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 4, 0),
(21, 'Thời trang công sở nữ 0058', 'DPCS-0058', 500000, 5, 'woman_p9.jpg', 'Đồng phục công sở nữ lịch sự, sang trọng, thoải mái, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 3, 0),
(22, 'Thời trang công sở nữ 0075', 'DPCS-0075', 450000, 7, 'woman_p10.jpg', 'Đồng phục công sở nữ lịch sự, sang trọng, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 2, 0),
(23, 'Thời trang công sở nữ 0060', 'DPCS-0060', 320000, 5, 'woman_p11.jpg', 'Đồng phục công sở nữ lịch sự, sang trọng, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 1, 0),
(24, 'Thời trang công sở nữ 0061', 'DPCS-0061', 412000, 5, 'woman_p12.jpg', 'Đồng phục công sở nữ lịch sự, sang trọng, trang nghiêm, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 2, 3, 0),
(25, 'Áo Khoác Gió Nam AK 010', 'DPAK-010', 364000, 3, 'man_p1.jpg', 'Đồng phục khoác gió nam, thoải mái và hoàn hảo cho mọi hoạt động ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 4, 0),
(26, 'Áo polo công sở 0048', 'DPCS-0048', 370000, 5, 'man_p2.jpg', 'Đồng phục công sở, thoải mái, trẻ trung, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 2, 0),
(27, 'Áo sơ mi công sở 0020', 'DPCS-0020', 350000, 7, 'man_p3.jpg', 'Đồng phục công sở, thoải mái, trẻ trung, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 4, 0),
(28, 'Áo sơ mi công sở 0019', 'DPCS-0019', 321000, 5, 'man_p4.jpg', 'Đồng phục công sở, thoải mái, trẻ trung, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 1, 0),
(29, 'Áo vest nam công sở 0045', 'DPCS-0045', 365000, 7, 'man_p5.jpg', 'Đồng phục công sở, thoải mái, sang trọng ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 3, 0),
(30, 'Áo vest nam công sở 0043', 'DPCS-0043', 400000, 5, 'man_p6.jpg', 'Đồng phục công sở, thoải mái, sang trọng, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 2, 0),
(31, 'Áo vest nam công sở 0041', 'DPCS-0041', 390000, 0, 'man_p7.jpg', 'Đồng phục công sở, thoải mái, sang trọng, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 4, 0),
(32, 'Áo vest nam công sở 0042', 'DPCS-0042', 375000, 2, 'man_p8.jpg', 'Đồng phục công sở, thoải mái, trẻ trung, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 3, 1),
(33, 'Áo vest nam công sở 0044', 'DPCS-0044', 621000, 6, 'man_p9.jpg', 'Đồng phục công sở nam lịch sự, thoải mái, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 1, 0),
(34, 'Áo vest nam công sở 0046', 'DPCS-0046', 550000, 5, 'man_p10.jpg', 'Đồng phục công sở nam lịch sự, thoải mái, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 4, 0),
(35, 'Áo vest nam công sở 0040', 'DPCS-0040', 690000, 8, 'man_p11.jpg', 'Đồng phục công sở nam lịch sự, sang trọng, ...', 'Xuất xứ: Việt Nam, Chất liệu: Cotton', 1, 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_dangky` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(3, 'Tuấn Đạt', '0914756230', 'tuanquynh2204@gmail.com', 'Nhớ gửi sớm nhé', 2),
(4, 'Tuấn Tú', '0914756340', 'Việt Hàn', 'nhanh nha', 5),
(5, 'Phạm Mạnh Hùng', '0356524955', 'Hà Nội', '', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id_size` int NOT NULL,
  `id_sanpham` int NOT NULL,
  `loaisize` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`id_size`, `id_sanpham`, `loaisize`) VALUES
(1, 36, 'S'),
(2, 36, 'M'),
(3, 36, 'L'),
(4, 36, 'XL'),
(5, 36, 'XXL'),
(6, 35, 'XXL'),
(7, 35, 'XL'),
(8, 35, 'L'),
(9, 34, 'L'),
(10, 34, 'XL'),
(11, 34, 'XXL'),
(12, 33, 'XL'),
(13, 33, 'L'),
(14, 33, 'S'),
(15, 32, 'S'),
(17, 32, 'XL'),
(18, 32, 'L'),
(19, 31, 'S'),
(21, 31, 'XL'),
(22, 31, 'L'),
(23, 30, 'L'),
(24, 30, 'XL'),
(25, 30, 'XXL'),
(26, 29, 'L'),
(27, 29, 'XL'),
(28, 29, 'XXL'),
(29, 28, 'XXL'),
(30, 28, 'L'),
(31, 28, 'XL'),
(32, 27, 'L'),
(33, 27, 'XL'),
(34, 27, 'XXL'),
(35, 26, 'XL'),
(36, 26, 'L'),
(37, 26, 'XXL'),
(38, 25, 'L'),
(39, 25, 'XL'),
(40, 25, 'XXL'),
(41, 24, 'L'),
(42, 24, 'XL'),
(43, 24, 'XXL'),
(44, 23, 'XL'),
(45, 23, 'XXL'),
(46, 23, 'L'),
(47, 22, 'XL'),
(48, 22, 'XXL'),
(49, 22, 'L'),
(50, 21, 'L'),
(51, 21, 'XL'),
(52, 21, 'XXL'),
(53, 20, 'L'),
(54, 20, 'XL'),
(55, 20, 'XXL'),
(56, 19, 'L'),
(57, 19, 'XL'),
(58, 19, 'XXL'),
(59, 18, 'L'),
(60, 18, 'XL'),
(61, 18, 'XXL'),
(62, 17, 'L'),
(63, 17, 'XXL'),
(64, 16, 'XL'),
(65, 16, 'L'),
(66, 16, 'XXL'),
(67, 15, 'L'),
(68, 15, 'XL'),
(69, 15, 'XXL'),
(70, 14, 'L'),
(71, 14, 'XL'),
(72, 14, 'XXL'),
(73, 13, 'L'),
(74, 13, 'XL'),
(75, 13, 'XXL'),
(76, 12, 'M'),
(77, 12, 'S'),
(78, 12, 'L'),
(79, 11, 'M'),
(80, 11, 'S'),
(81, 11, 'L'),
(82, 10, 'M'),
(83, 10, 'S'),
(84, 10, 'L'),
(85, 9, 'M'),
(86, 9, 'S'),
(87, 9, 'L'),
(88, 8, 'M'),
(89, 8, 'S'),
(90, 8, 'L'),
(91, 7, 'M'),
(92, 7, 'S'),
(93, 7, 'L'),
(94, 6, 'L'),
(95, 6, 'M'),
(96, 6, 'XL'),
(97, 5, 'L'),
(98, 5, 'M'),
(99, 5, 'XL'),
(100, 4, 'L'),
(101, 4, 'M'),
(102, 4, 'XL'),
(103, 3, 'M'),
(104, 3, 'L'),
(105, 3, 'XL'),
(106, 2, 'M'),
(107, 2, 'L'),
(108, 2, 'XL'),
(109, 1, 'M'),
(110, 1, 'L'),
(111, 1, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int NOT NULL,
  `ngaydat` varchar(50) NOT NULL,
  `donhang` int NOT NULL,
  `doanhthu` varchar(150) NOT NULL,
  `soluongban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(3, '2023-11-29', 1, '3600000', 2),
(4, '2023-12-05', 8, '16000000', 8),
(5, '2023-12-22', 2, '11960000', 2),
(6, '2024-01-05', 4, '10400000', 4),
(7, '2024-01-06', 3, '6400000', 3),
(8, '2024-01-23', 1, '1950000', 1),
(9, '2024-05-24', 1, '375000', 1),
(10, '2024-05-25', 4, '1298000', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `cart_shipping` (`cart_shipping`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `tbl_mausac`
--
ALTER TABLE `tbl_mausac`
  ADD PRIMARY KEY (`id_mausac`),
  ADD KEY `ms_sp` (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id_nhacungcap`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `LoaiSanPham_SanPham` (`id_loaisanpham`),
  ADD KEY `NhaCungCap_SanPham` (`id_nhacungcap`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id_size`),
  ADD KEY `s_sp` (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `id_loaisanpham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_mausac`
--
ALTER TABLE `tbl_mausac`
  MODIFY `id_mausac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id_nhacungcap` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id_size` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD CONSTRAINT `tbl_shipping_ibfk_1` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_dangky` (`id_dangky`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
