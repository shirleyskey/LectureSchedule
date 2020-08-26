-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2020 lúc 08:32 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lecture_schedule`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bais`
--

CREATE TABLE `bais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hocphan` int(11) NOT NULL,
  `sotiet` int(11) NOT NULL,
  `tenbai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giangvien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bais`
--

INSERT INTO `bais` (`id`, `id_hocphan`, `sotiet`, `tenbai`, `id_giangvien`) VALUES
(1, 1, 4, 'Bài 1 - Học phần 2', 2),
(2, 1, 9, 'Bài 2 - Học phần 3', 1),
(9, 1, 9, 'Bài 2 - Học phần 7', 1),
(10, 1, 9, 'Bài 2 - Học phần 6', 1),
(12, 2, 9, 'Bài 2 - Học phần 3', 1),
(13, 2, 9, 'Bài 2 - Học phần 7', 0),
(14, 2, 9, 'Bài 2 - Học phần 3', 0),
(15, 2, 9, 'Bài 2 - Học phần 3', 0),
(16, 2, 4, 'Bài 1 - Học phần 2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chambais`
--

CREATE TABLE `chambais` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `thoigian` date DEFAULT NULL,
  `ghichu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chambais`
--

INSERT INTO `chambais` (`id`, `id_giangvien`, `thoigian`, `ghichu`) VALUES
(1, 2, '2020-08-15', 'AAAA'),
(2, 1, '2020-08-15', 'AAA1111'),
(4, 1, '2020-08-21', 'aaa111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtacs`
--

CREATE TABLE `congtacs` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `tiendo` int(11) DEFAULT NULL,
  `thoigian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `congtacs`
--

INSERT INTO `congtacs` (`id`, `id_giangvien`, `ten`, `tiendo`, `thoigian`) VALUES
(1, 1, 'Công Tác 0000000', 1, '2020-08-27'),
(2, 1, 'Công Tác 4', 2, '2020-08-15'),
(3, 2, 'Công Tác 2', 3, '2020-08-29'),
(6, 1, 'Công tác Mư', 1, '2020-08-08'),
(8, 3, 'Công tác Mường Nhé', 2, '2020-08-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangs`
--

CREATE TABLE `dangs` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangs`
--

INSERT INTO `dangs` (`id`, `id_giangvien`, `ten`, `thoigian`) VALUES
(1, 3, 'Đảng 1', '2020-08-28'),
(2, 1, 'Đảng 2', '0000-00-00'),
(3, 2, 'Đảng 1', '0000-00-00'),
(4, 1, 'Đảng 2', '0000-00-00'),
(6, 2, 'Công tác Mường Nhé Dang', '2020-08-08'),
(7, 2, 'Công tác Mường Nhé', '2020-08-14'),
(9, 2, 'Công tác Mường Nhéqqq', '2020-08-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daygiois`
--

CREATE TABLE `daygiois` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) DEFAULT NULL,
  `thoigian` date NOT NULL,
  `ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `daygiois`
--

INSERT INTO `daygiois` (`id`, `id_giangvien`, `ten`, `thoigian`, `ghichu`) VALUES
(1, 1, 'Day Gioi 1', '0000-00-00', 'aaaa'),
(2, 1, 'Day Gioi2', '0000-00-00', 'ssss'),
(3, 2, 'Day Gioi 1', '0000-00-00', 'oooo'),
(4, 1, 'Day Gioi2', '0000-00-00', 'uuuu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dotxuats`
--

CREATE TABLE `dotxuats` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `thoigian` date NOT NULL,
  `ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dotxuats`
--

INSERT INTO `dotxuats` (`id`, `id_giangvien`, `ten`, `thoigian`, `ghichu`) VALUES
(1, 2, 'Dot Xuat 1', '0000-00-00', ''),
(2, 1, 'Dot Xuat 2', '0000-00-00', '7777777'),
(3, 2, 'Dot Xuat 1', '0000-00-00', '111222'),
(4, 1, 'Dot Xuat 2', '0000-00-00', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_hocphan` int(11) NOT NULL,
  `id_bai` int(11) DEFAULT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp(),
  `lesson` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `id_lop`, `id_hocphan`, `id_bai`, `thoigian`, `lesson`, `title`, `start`, `end`) VALUES
(3, 1, 1, 2, '2020-08-26 00:00:00', '1,2,3,4,5,6,7', 'Tiết 6', '2020-08-24 00:00:00', '2020-08-24 18:26:19'),
(4, 2, 1, 2, '2020-08-26 00:00:03', '1,2,3,4,5,6,7', 'Tiết 8', '2020-08-28 00:00:00', '2020-08-28 18:26:19'),
(5, 1, 1, 2, '2020-08-28 13:06:42', '1,2,3,4,5,6,7', 'Tiết 2-2', '2020-09-02 00:00:00', '2020-09-02 18:26:19'),
(6, 1, 1, 2, '2020-08-29 13:06:35', '1,2,3,4,5,6,7,8', 'Tiết 2-4', '2020-09-04 00:00:00', '2020-09-04 18:26:19'),
(7, 1, 1, 2, '2020-08-30 13:06:27', '5,6,7', 'Web Developer', '2020-08-13 18:26:00', '2020-08-28 18:26:00'),
(9, 1, 1, 2, '0000-00-00 00:00:00', '', 'Web Develo', '2020-08-13 18:26:00', '2020-08-28 18:26:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangviens`
--

CREATE TABLE `giangviens` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `chucvu` varchar(500) DEFAULT NULL,
  `hesoluong` float DEFAULT NULL,
  `diachi` varchar(500) DEFAULT NULL,
  `chucdanh` varchar(500) DEFAULT NULL,
  `trinhdo` varchar(500) DEFAULT NULL,
  `cothegiang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangviens`
--

INSERT INTO `giangviens` (`id`, `ten`, `chucvu`, `hesoluong`, `diachi`, `chucdanh`, `trinhdo`, `cothegiang`) VALUES
(1, 'Lê Thái S', 'Phó Khoa', 4.55, 'Hà Đông, Hà Nội', 'AAAA', 'Tiến Sĩ', 1),
(2, 'Bùi Thị Dung', 'Giảng Viên', 4.55, 'Hòa Bình', 'BBBB', 'Thạc Sĩ', 1),
(3, 'Bùi Văn B', 'Giáo Vụ', 4.55, 'Hà Nội', 'CCCC', 'Thạc Sĩ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphans`
--

CREATE TABLE `hocphans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lop` int(11) NOT NULL,
  `mahocphan` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotiet` int(11) NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `tenhocphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphans`
--

INSERT INTO `hocphans` (`id`, `id_lop`, `mahocphan`, `sotiet`, `sotinchi`, `tenhocphan`, `start`, `end`) VALUES
(1, 1, 'ANĐT', 60, 3, 'ĐTH', '2020-08-13', '2020-08-28'),
(2, 1, 'HTTT', 60, 3, 'PPĐT', '2020-08-19', '2020-09-10'),
(3, 2, 'DGTH', 30, 1, 'HP02', '2020-08-29', '2020-09-30'),
(4, 2, 'CS', 30, 1, 'HP03', '2020-09-10', '2020-11-12'),
(5, 2, 'MS', 60, 3, 'HP04', '2020-10-21', '2021-01-25'),
(6, 2, 'TK', 40, 2, 'TTTT', '2020-08-11', '2020-08-29'),
(7, 3, '', 40, 2, 'TGG', '2020-11-25', '2020-10-30'),
(8, 3, '', 40, 2, 'PPĐT', '2020-08-27', '2020-11-25'),
(9, 4, '', 40, 2, 'BTTTT', '2020-10-08', '2020-08-19'),
(11, 4, '', 80, 4, 'ĐTTTTG', '2020-08-26', '2020-11-26'),
(12, 1, '', 90, 5, 'ĐTHS', '2020-08-22', '2020-08-22'),
(13, 1, '', 90, 5, 'ĐTHS', '2020-08-22', '2020-08-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoctaps`
--

CREATE TABLE `hoctaps` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `thoigian` date NOT NULL,
  `ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoctaps`
--

INSERT INTO `hoctaps` (`id`, `id_giangvien`, `ten`, `thoigian`, `ghichu`) VALUES
(1, 2, 'Hoc Tap 1', '0000-00-00', ''),
(2, 1, 'Hoc Tap 2', '0000-00-00', ''),
(3, 2, 'Hoc Tap 1', '0000-00-00', ''),
(4, 1, 'Hoc Tap 2', '0000-00-00', ''),
(6, 2, 'ttttyyyyyy', '2020-08-18', 'yyyy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtuans`
--

CREATE TABLE `lichtuans` (
  `id` int(11) NOT NULL,
  `thoigian` datetime NOT NULL,
  `diadiem` varchar(500) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `thanhphan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichtuans`
--

INSERT INTO `lichtuans` (`id`, `thoigian`, `diadiem`, `noidung`, `thanhphan`) VALUES
(1, '2020-08-19 14:06:21', '13h30 - HTL', 'Xem phim phóng sự học tập chuyên đề năm 2020', 'Tất Cả'),
(2, '2020-08-19 14:06:21', '9h30 - 501N3', 'Xét HPCM cho lớp VB2N16T11', 'Sơn B'),
(3, '2020-08-20 14:06:21', '9h30 - 501N3', 'Xét HPCM cho lớp VB2N16 Nghệ An', 'Sơn A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lops`
--

CREATE TABLE `lops` (
  `id` int(10) UNSIGNED NOT NULL,
  `malop` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenlop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quymo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `songuoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lops`
--

INSERT INTO `lops` (`id`, `malop`, `tenlop`, `quymo`, `songuoi`) VALUES
(1, 'ATTT-D48', 'B14D48 - ATTT', 'C', 20),
(2, 'CLC-D49', 'B11D49 - CLC', 'B', 30),
(3, 'ĐT-D50', 'B1D50 - ANĐT', 'A', 50),
(4, '', 'B3LT11 - QLNN', 'A', 100),
(9, '', 'B2D51', 'C', 98);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_13_062838_add_attribute_into_users_table', 2),
(4, '2020_08_13_064151_create_table_lops_table', 3),
(5, '2020_08_13_064221_create_table_hocphans_table', 3),
(6, '2020_08_13_064250_create_table_bais_table', 3),
(7, '2020_08_13_064312_create_table_tiets_table', 3),
(8, '2020_08_13_064335_create_table_nckhs_table', 3),
(9, '2020_08_13_090836_laratrust_setup_tables', 4),
(10, '2020_08_13_115058_add_attribute_users_table', 5),
(11, '2020_08_15_080259_create_events_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nckhs`
--

CREATE TABLE `nckhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiendo` int(11) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nckhs`
--

INSERT INTO `nckhs` (`id`, `id_giangvien`, `ten`, `tiendo`, `thoigian`) VALUES
(1, 1, 'NCKH 0888888', 4, '2020-08-26'),
(2, 2, 'NCKH 02222', 2, '2020-08-22'),
(8, 1, 'Công tác Mường Nhé', 13, '2020-08-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'read-dashboard', 'Read Dashboard', 'Read Dashboard', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(2, 'create-users', 'Create Users', 'Create Users', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(3, 'read-users', 'Read Users', 'Read Users', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(4, 'update-users', 'Update Users', 'Update Users', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(5, 'delete-users', 'Delete Users', 'Delete Users', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(6, 'create-acl', 'Create Acl', 'Create Acl', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(7, 'read-acl', 'Read Acl', 'Read Acl', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(8, 'update-acl', 'Update Acl', 'Update Acl', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(9, 'delete-acl', 'Delete Acl', 'Delete Acl', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(10, 'read-profile', 'Read Profile', 'Read Profile', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(11, 'update-profile', 'Update Profile', 'Update Profile', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(12, 'create-lop', 'Create Lop', 'Create Lop', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(13, 'read-lop', 'Read Lop', 'Read Lop', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(14, 'update-lop', 'Update Lop', 'Update Lop', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(15, 'delete-lop', 'Delete Lop', 'Delete Lop', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(16, 'create-hocphan', 'Create Hocphan', 'Create Hocphan', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(17, 'read-hocphan', 'Read Hocphan', 'Read Hocphan', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(18, 'update-hocphan', 'Update Hocphan', 'Update Hocphan', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(19, 'delete-hocphan', 'Delete Hocphan', 'Delete Hocphan', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(20, 'create-bai', 'Create Bai', 'Create Bai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(21, 'read-bai', 'Read Bai', 'Read Bai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(22, 'update-bai', 'Update Bai', 'Update Bai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(23, 'delete-bai', 'Delete Bai', 'Delete Bai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(24, 'create-tiet', 'Create Tiet', 'Create Tiet', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(25, 'read-tiet', 'Read Tiet', 'Read Tiet', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(26, 'update-tiet', 'Update Tiet', 'Update Tiet', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(27, 'delete-tiet', 'Delete Tiet', 'Delete Tiet', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(28, 'create-nckh', 'Create Nckh', 'Create Nckh', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(29, 'read-nckh', 'Read Nckh', 'Read Nckh', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(30, 'update-nckh', 'Update Nckh', 'Update Nckh', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(31, 'delete-nckh', 'Delete Nckh', 'Delete Nckh', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(32, 'create-giangvien', 'Create Giangvien', 'Create Giangvien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(33, 'read-giangvien', 'Read Giangvien', 'Read Giangvien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(34, 'update-giangvien', 'Update Giangvien', 'Update Giangvien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(35, 'delete-giangvien', 'Delete Giangvien', 'Delete Giangvien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(36, 'create-chambai', 'Create Chambai', 'Create Chambai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(37, 'read-chambai', 'Read Chambai', 'Read Chambai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(38, 'update-chambai', 'Update Chambai', 'Update Chambai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(39, 'delete-chambai', 'Delete Chambai', 'Delete Chambai', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(40, 'create-congtac', 'Create Congtac', 'Create Congtac', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(41, 'read-congtac', 'Read Congtac', 'Read Congtac', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(42, 'update-congtac', 'Update Congtac', 'Update Congtac', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(43, 'delete-congtac', 'Delete Congtac', 'Delete Congtac', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(44, 'create-dang', 'Create Dang', 'Create Dang', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(45, 'read-dang', 'Read Dang', 'Read Dang', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(46, 'update-dang', 'Update Dang', 'Update Dang', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(47, 'delete-dang', 'Delete Dang', 'Delete Dang', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(48, 'create-daygioi', 'Create Daygioi', 'Create Daygioi', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(49, 'read-daygioi', 'Read Daygioi', 'Read Daygioi', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(50, 'update-daygioi', 'Update Daygioi', 'Update Daygioi', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(51, 'delete-daygioi', 'Delete Daygioi', 'Delete Daygioi', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(52, 'create-dotxuat', 'Create Dotxuat', 'Create Dotxuat', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(53, 'read-dotxuat', 'Read Dotxuat', 'Read Dotxuat', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(54, 'update-dotxuat', 'Update Dotxuat', 'Update Dotxuat', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(55, 'delete-dotxuat', 'Delete Dotxuat', 'Delete Dotxuat', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(56, 'create-sangkien', 'Create Sangkien', 'Create Sangkien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(57, 'read-sangkien', 'Read Sangkien', 'Read Sangkien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(58, 'update-sangkien', 'Update Sangkien', 'Update Sangkien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(59, 'delete-sangkien', 'Delete Sangkien', 'Delete Sangkien', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(60, 'create-xaydung', 'Create Xaydung', 'Create Xaydung', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(61, 'read-xaydung', 'Read Xaydung', 'Read Xaydung', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(62, 'update-xaydung', 'Update Xaydung', 'Update Xaydung', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(63, 'delete-xaydung', 'Delete Xaydung', 'Delete Xaydung', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(64, 'create-hoctap', 'Create Hoctap', 'Create Hoctap', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(65, 'read-hoctap', 'Read Hoctap', 'Read Hoctap', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(66, 'update-hoctap', 'Update Hoctap', 'Update Hoctap', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(67, 'delete-hoctap', 'Delete Hoctap', 'Delete Hoctap', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(68, 'update-file-manager', 'Update File-manager', 'Update File-manager', '2020-08-17 05:20:42', '2020-08-17 05:20:42'),
(69, 'read-file-manager', 'Read File-manager', 'Read File-manager', '2020-08-17 05:20:43', '2020-08-17 05:20:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(24, 1),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(28, 1),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(68, 2),
(69, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2020-08-17 05:20:41', '2020-08-17 05:20:41'),
(2, 'administrator', 'Administrator', 'Administrator', '2020-08-17 05:20:43', '2020-08-17 05:20:43'),
(3, 'user', 'User', 'User', '2020-08-17 05:20:43', '2020-08-17 05:20:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(3, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sangkiens`
--

CREATE TABLE `sangkiens` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `thoigian` date NOT NULL,
  `ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sangkiens`
--

INSERT INTO `sangkiens` (`id`, `id_giangvien`, `ten`, `thoigian`, `ghichu`) VALUES
(1, 2, 'Sang kien 1', '0000-00-00', 'eeee'),
(2, 1, 'Sang Kien 2', '0000-00-00', 'ggggg'),
(4, 1, 'Sang Kien 2', '0000-00-00', 'fssd'),
(7, 2, 'Caaaa', '2020-08-14', 'aaa111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiets`
--

CREATE TABLE `tiets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lop` int(11) NOT NULL,
  `id_bai` int(11) DEFAULT NULL,
  `id_hocphan` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `sogio` int(11) NOT NULL,
  `lession` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chucvu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hesoluong` double(8,3) DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trinhdo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cothegiang` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `id_giangvien`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`, `avatar`, `chucvu`, `hesoluong`, `diachi`, `chucdanh`, `trinhdo`, `cothegiang`) VALUES
(1, 'Superadministrator', 1, 'superadministrator@app.com', '$2y$10$LXyVxcjMSAHSnmg8YeEOmONbkZeqdOActe9RtLfFICPOia62kqWmK', 1, 'IhlKpwqclsEMJk6othSeIfvFHsQVmXHAmGU0eiVgupQ0npyjEm4vVSm7fEe5', '2020-08-17 05:20:43', '2020-08-17 05:20:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Administrator', 1, 'administrator@app.com', '$2y$10$wvw5uxKyE1NAl7s4d1IvOOBJn5F9OOOGm1y3k41CKS2xurmVdN5Ti', 1, NULL, '2020-08-17 05:20:43', '2020-08-17 05:20:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'User', 2, 'user@app.com', '$2y$10$FYi/0p2x4dd/IoEkp1TJEukMUnuQhrmwciVlQoZIkZx1TuqzuSHiO', 1, 'u7VUqi4dqqpxzQY28nknu1YRbOwdpju0E0tetEUF5BavEmfS2Uffhlp6zJU8', '2020-08-17 05:20:44', '2020-08-17 05:20:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Bùi Lê', 2, 'shishirley1812@gmail.com', '$2y$10$OBTnaqSm6PVp7Z5o8PPPa.x7ZDyJBo2YFIjy3XEwJeaXcjB8TKJ4e', 1, NULL, '2020-08-22 08:54:42', '2020-08-22 08:54:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xaydungs`
--

CREATE TABLE `xaydungs` (
  `id` int(11) NOT NULL,
  `id_giangvien` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `thoigian` date NOT NULL,
  `ghichu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xaydungs`
--

INSERT INTO `xaydungs` (`id`, `id_giangvien`, `ten`, `thoigian`, `ghichu`) VALUES
(1, 2, 'Xay Dung 1', '0000-00-00', ''),
(2, 1, 'Xay Dung 2', '0000-00-00', ''),
(3, 2, 'Xay Dung 1', '0000-00-00', ''),
(4, 1, 'Xay Dung 2', '0000-00-00', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bais`
--
ALTER TABLE `bais`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chambais`
--
ALTER TABLE `chambais`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `congtacs`
--
ALTER TABLE `congtacs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dangs`
--
ALTER TABLE `dangs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daygiois`
--
ALTER TABLE `daygiois`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dotxuats`
--
ALTER TABLE `dotxuats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giangviens`
--
ALTER TABLE `giangviens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocphans`
--
ALTER TABLE `hocphans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoctaps`
--
ALTER TABLE `hoctaps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichtuans`
--
ALTER TABLE `lichtuans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lops`
--
ALTER TABLE `lops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nckhs`
--
ALTER TABLE `nckhs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sangkiens`
--
ALTER TABLE `sangkiens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tiets`
--
ALTER TABLE `tiets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xaydungs`
--
ALTER TABLE `xaydungs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bais`
--
ALTER TABLE `bais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `chambais`
--
ALTER TABLE `chambais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `congtacs`
--
ALTER TABLE `congtacs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dangs`
--
ALTER TABLE `dangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `daygiois`
--
ALTER TABLE `daygiois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dotxuats`
--
ALTER TABLE `dotxuats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `giangviens`
--
ALTER TABLE `giangviens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hocphans`
--
ALTER TABLE `hocphans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `hoctaps`
--
ALTER TABLE `hoctaps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lichtuans`
--
ALTER TABLE `lichtuans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lops`
--
ALTER TABLE `lops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nckhs`
--
ALTER TABLE `nckhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sangkiens`
--
ALTER TABLE `sangkiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tiets`
--
ALTER TABLE `tiets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `xaydungs`
--
ALTER TABLE `xaydungs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
