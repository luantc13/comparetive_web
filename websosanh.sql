-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 18, 2019 lúc 11:25 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websosanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Dell', 'dell', 'banner10.png', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(2, 'Hp', 'hp', 'banner11.jpg', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(3, 'Asus', 'asus', 'banner12.jpg', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(4, 'Msi', 'msi', 'banner13.jpg', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(5, 'Acer', 'acer', 'banner15.jpg', 1, '2018-02-24 05:09:22', '2018-04-12 22:03:28'),
(6, 'Lenovo', 'lenovo', 'banner16.jpg', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(7, 'Apple Macbook', 'apple-macbook', 'banner17.jpg', 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comparetive_link`
--

CREATE TABLE `comparetive_link` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_provider` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comparetive_link`
--

INSERT INTO `comparetive_link` (`id`, `id_product`, `id_provider`, `name`, `price`, `link`, `created_at`, `updated_at`) VALUES
(14, 13, 1, 'Dell Inspiron 7567-N7567E (Black) | i7-7700HQ | 8GB DDR4 | 1TB HDD (8GB SSHD) | Geforce GTX 1050Ti 4GB | 15.6 FHD IPS | Free Dos', 23990000, 'https://laptopnew.vn/dell-inspiron-7567-n7567e', '2018-04-21 07:22:25', '2018-05-15 03:08:53'),
(15, 13, 2, 'Dell Inspiron 7567 Intel&#174; Core™ i7 _7700HQ _8GB _1TB _128GB SSD _GeForce&#174; GTX1050Ti 4GB _Win 1O _Full HD', 24990000, 'http://laptopno1.com/Dell-Inspiron-7567-Intel-c2-ae-CoreTM-i7-_7700HQ-_8GB-_1TB-_128GB-SSD-_GeForce-c2-ae-GTX1050Ti-4GB-_Win-1O-_Full-HD/29023', '2018-04-21 07:22:25', '2018-04-21 07:22:25'),
(17, 14, 2, 'Dell Inspiron 5567R (M5I5384) Intel&#174; Kaby Lake Core™ i5 _7200U _8GB _1TB _AMD Radeon™ R7 M445 2GB DDR5 _Full HD _LED KEY _30817P', 15100000, 'http://laptopno1.com/Dell-Inspiron-5567R-(M5I5384)-Intel-c2-ae-Kaby-Lake-CoreTM-i5-_7200U-_8GB-_1TB-_AMD-RadeonTM-R7-M445-2GB-DDR5-_Full-HD-_LED-KEY-_30817P/18616', '2018-04-27 03:32:22', '2018-04-27 03:32:22'),
(18, 14, 3, 'Sản phẩm Dell Inspiron 5567 (M5I5384R)', 15690000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-5567-m5i5384r-12623-1372', '2018-04-27 03:32:22', '2018-04-27 03:32:22'),
(19, 14, 4, 'Máy xách tay/ Laptop Dell Inspiron 15 5567-CWJK61 (Xám)', 15290000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/laptop-dell-inspiron-5567-cwjk61-mau-xam.html', '2018-04-27 03:32:23', '2018-04-27 03:32:23'),
(20, 14, 5, 'Laptop Dell Inspiron 5567 i5 7200U/4GB/1TB/2G M445/Win10/(M5I5384W)', 16790000, 'https://www.thegioididong.com/laptop/dell-inspiron-5567-i5-7200u', '2018-04-27 03:32:24', '2018-04-27 03:32:24'),
(21, 13, 7, 'Laptop Dell Inspiron N7567D- P65F001- TI78504', 30550000, 'http://www.ankhang.vn/laptop-dell-inspiron-n7567d-p65f001-ti78504_id11256.html', '2018-04-27 04:43:13', '2018-04-27 04:44:24'),
(22, 13, 8, 'LAPTOP DELL 15 N7567-P65F001', 26990000, 'https://www.nguyenkim.com/dell-15-n7567-p65f001.html', '2018-04-27 04:50:23', '2018-04-27 04:50:23'),
(23, 14, 8, 'LAPTOP DELL INSPIRON 15 5567 (M5I5384W)', 16490000, 'https://www.nguyenkim.com/may-tinh-xach-tay-dell-inspiron-15-5567-m5i5384w-core-i5-7200u.html', '2018-04-27 04:51:06', '2018-04-27 04:51:06'),
(24, 14, 7, 'Laptop Dell Inspiron 15R N5567 M5I5384 Grey', 14150000, 'http://www.ankhang.vn/laptop-dell-inspiron-15r-n5567-m5i5384-grey_id10898.html', '2018-04-27 04:51:46', '2018-04-27 04:51:46'),
(25, 15, 1, 'Dell Inspiron 5570-244YV1 | i5-8250U | 8GB DDR4 | 1TB HDD | VGA Onboard | 15.6 FHD | Win10', 17050000, 'https://laptopnew.vn/dell-inspiron-5570-244yv1', '2018-04-27 05:02:07', '2018-04-27 05:02:07'),
(26, 15, 2, 'Dell Inspiron 5570 (M5I5238WR) Intel&#174; Core™ i5 _8250U _8GB _1TB _AMD Radeon&#174; 530 2GB GDDR5 _Full HD _Win 1O _Silver', 17300000, 'http://laptopno1.com/Dell-Inspiron-5570-(M5I5238WR)-Intel-c2-ae-CoreTM-i5-_8250U-_8GB-_1TB-_AMD-Radeon-c2-ae-530-2GB-GDDR5-_Full-HD-_Win-1O-_Silver/29063', '2018-04-27 05:02:08', '2018-04-27 05:02:08'),
(27, 15, 3, 'Sản phẩm Dell Inspiron 5570 (M5I5238W)', 16790000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-5570-m5i5238w-12956-6984', '2018-04-27 05:02:09', '2018-04-27 05:02:09'),
(28, 15, 4, 'Máy xách tay/ Laptop Dell Inspiron 15 5570-M5I5238W (Bạc)', 17490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/may-xach-tay-laptop-dell-inspiron-15-5570-m5i5238w-b-c.html', '2018-04-27 05:02:09', '2018-04-27 05:02:09'),
(29, 15, 5, 'Laptop Dell Inspiron 5570 i5 8250U/4GB/1TB/2GB M530/Win10/(M5I5238W)', 17990000, 'https://www.thegioididong.com/laptop/dell-inspiron-5570-i5-8250u-m5i5238w', '2018-04-27 05:02:10', '2018-04-27 05:02:10'),
(30, 15, 6, 'Dell Inspiron 5570', 17990000, 'https://fptshop.com.vn/may-tinh-xach-tay/Dell-Inspiron-5570', '2018-04-27 05:02:10', '2018-04-27 05:02:10'),
(31, 15, 7, 'Laptop Dell Inspiron 15 - LOKI15-N5570 M5I5238W- Silver', 16290000, 'http://www.ankhang.vn/laptop-dell-inspiron-15-loki15-n5570-m5i5238w-silver_id11375.html', '2018-04-27 05:02:10', '2018-04-27 05:02:10'),
(32, 15, 8, 'LAPTOP DELL INSPIRON 15 5570 - M5I5238W', 17490000, 'https://www.nguyenkim.com/laptop-dell-inspiron-15-5570-m5i5238w.html', '2018-04-27 05:02:11', '2018-04-27 05:02:11'),
(33, 16, 1, 'Dell Inspiron 7373-T7373A | i7-8550U | 8GB DDR4 | 256GB SSD | VGA Onboard | 13.3 FHD IPS Touch | Win 10 + Office365', 28500000, 'https://laptopnew.vn/dell-inspiron-7373-t7373a', '2018-04-27 05:22:21', '2018-04-27 05:22:21'),
(34, 16, 2, 'Dell Inspiron 7373 (T7373A) Intel&#174; Core™ i7 _8550U _8GB _256GB SSD _VGA INTEL _Win 10 _Full HD IPS Touch _LED KEY _318S', 28400000, 'http://laptopno1.com/Dell-Inspiron-7373-(T7373A)-Intel-c2-ae-CoreTM-i7-_8550U-_8GB-_256GB-SSD-_VGA-INTEL-_Win-10-_Full-HD-IPS-Touch-_LED-KEY-_318S/29342', '2018-04-27 05:22:21', '2018-04-27 05:22:21'),
(35, 16, 3, 'Sản phẩm Dell Inspiron 7373 (T7373A)', 28490000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-7373-t7373a-12709-1553', '2018-04-27 05:22:22', '2018-04-27 05:22:22'),
(36, 16, 4, 'Máy xách tay/ Laptop Dell Inspiron 13 7373-C3TI501OW (Xám)', 26990000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/may-xach-tay-laptop-dell-inspiron-13-7373-c3ti501ow-xam.html', '2018-04-27 05:22:22', '2018-04-27 05:22:22'),
(37, 16, 5, 'Laptop Dell Inspiron 7373 i7 8550U/8GB/256GB/Win10/Office365/(P83G001)', 29990000, 'https://www.thegioididong.com/laptop/dell-inspiron-7373-i7-8550u-p83g001', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(38, 16, 7, 'Laptop Dell Inspiron 7373 T7373A', 29990000, 'http://www.ankhang.vn/laptop-dell-inspiron-7373-t7373a_id11165.html', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(39, 16, 8, 'LAPTOP DELL INSPIRON 13 7373 (T7373A)', 29690000, 'https://www.nguyenkim.com/laptop-dell-inspiron-13-7373-t7373a.html', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(40, 17, 1, 'Dell Inspiron 7577-N7577A (Black) | i7-7700HQ | 8GB DDR4 | 128GB SSD + 1TB HDD | Geforce GTX 1050Ti 4GB | 15.6 FHD IPS | Office365 + Win10', 29990000, 'https://laptopnew.vn/dell-inspiron-7577-n7577a', '2018-04-27 05:25:42', '2018-04-27 05:25:42'),
(41, 17, 2, 'Dell Inspiron 7577 (N7577A)Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _1TB _128GB SSD _GeForce&#174; GTX1050Ti with 4GB _Win 10_ OFF 365 _Full HD IPS _318S', 27999000, 'http://laptopno1.com/Dell-Inspiron-7577-(N7577A)Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_1TB-_128GB-SSD-_GeForce-c2-ae-GTX1050Ti-with-4GB-_Win-10_-OFF-365-_Full-HD-IP/29341', '2018-04-27 05:25:42', '2018-04-27 05:25:42'),
(42, 17, 3, 'Sản phẩm Dell Inspiron 7577 (N7577A)', 29490000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-7577-n7577a-12706-3110', '2018-04-27 05:25:45', '2018-04-27 05:25:45'),
(43, 17, 4, 'Máy xách tay/ Laptop Dell Inspiron 15 7577-N7577A (Đen)', 29490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/may-xach-tay-laptop-dell-inspiron-15-7577-n7577a-den.html', '2018-04-27 05:25:46', '2018-04-27 05:25:46'),
(44, 17, 5, 'Laptop Dell Inspiron 7577A i7 7700HQ/8GB/1TB+128GB/4GB GTX1050Ti/Win10', 29990000, 'https://www.thegioididong.com/laptop/dell-inspiron-7577a-i7-7700hq', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(45, 17, 7, 'Laptop Dell  Inspiron N7577A P65F001', 29890000, 'http://www.ankhang.vn/laptop-dell-inspiron-n7577a-p65f001_id12852.html', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(46, 17, 8, 'LAPTOP DELL INSPIRON 15 7577 (N7577A - P72F001)', 29490000, 'https://www.nguyenkim.com/laptop-dell-inspiron-15-7577-n7577a-p72f001.html', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(47, 18, 1, 'Dell Inspiron 5468-70119161 | i7-7500U | 8GB RAM | 1TB HDD | Radeon R7 M440 2GB | 14.1 inch HD | Win 10', 18100000, 'https://laptopnew.vn/dell-inspiron-5468-70119161', '2018-04-27 05:33:50', '2018-04-27 05:33:50'),
(48, 18, 2, 'Dell Inspiron 5468 (‎70119161) Intel&#174; Kaby Lake Core™ i7 _7500U _8GB _1TB _Radeon™ R7 M440 2GB _Win 1O _5517F', 17350000, 'http://laptopno1.com/Dell-Inspiron-5468-(-e2-80-8e70119161)-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7500U-_8GB-_1TB-_RadeonTM-R7-M440-2GB-_Win-1O-_5517F/16687', '2018-04-27 05:33:50', '2018-04-27 05:33:50'),
(49, 18, 3, 'Sản phẩm Dell Inspiron 5468 (70119160)', 18350000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-5468-70119160-10876-702', '2018-04-27 05:33:51', '2018-04-27 05:33:51'),
(50, 18, 4, 'Máy xách tay/ Laptop Dell Inspiron 14 5468 (F5468-70119161) (Bạc)', 18890000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/may-xach-tay-laptop-dell-inspiron-14-5468-f5468-70119161-b-c.html', '2018-04-27 05:33:51', '2018-04-27 05:33:51'),
(51, 18, 5, 'Laptop Dell Inspiron 5468 i5 7200U/4GB/500GB/2GB R7M440/Win10/Office365/(K5CDP11)', 15990000, 'https://www.thegioididong.com/laptop/dell-inspiron-5468-i5-7200u', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(52, 18, 7, 'Laptop Dell Inspiron 14 5468 70119161', 17350000, 'http://www.ankhang.vn/laptop-dell-inspiron-14-5468-70119161_id9766.html', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(53, 18, 8, 'LAPTOP DELL INSPIRON 14 5468 (70119161)', 18790000, 'https://www.nguyenkim.com/dell-inspiron-14-series-5468-70119161.html', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(54, 19, 1, 'Dell Vostro 7570-70138566 | i7-7700HQ | 8GB RAM | 128GB SSD + 1TB HDD | GeForce GTX 1060 6GB | 15.6 FHD | Win10 + Office365', 32990000, 'https://laptopnew.vn/dell-vostro-7570-70138566', '2018-04-27 05:37:30', '2018-04-27 05:37:30'),
(55, 19, 2, 'Dell Vostro 7570 (‎70138566) Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _128GB SSD_1TB _GeForce&#174; GTX1060 with 6GB _Win 10 _OFF 365 _Full HD IPS _Finger _LED KEY _71117F', 30499000, 'http://laptopno1.com/Dell-Vostro-7570-(-e2-80-8e70138566)-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_128GB-SSD_1TB-_GeForce-c2-ae-GTX1060-with-6GB-_Win-10-_OFF-365-_Ful/28960', '2018-04-27 05:37:30', '2018-04-27 05:37:30'),
(56, 19, 3, 'Sản phẩm Dell Inspiron 7570 (782P81)', 28990000, 'http://www.hangchinhhieu.vn/san-pham/dell-inspiron-7570-782p81-12716-424', '2018-04-27 05:37:31', '2018-04-27 05:37:31'),
(57, 19, 7, 'Laptop Dell Vostro 7570 70138565', 27690000, 'http://www.ankhang.vn/laptop-dell-vostro-7570-70138565_id11401.html', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(58, 19, 8, 'LAPTOP DELL VOSTRO 7570 - 70138566', 32690000, 'https://www.nguyenkim.com/laptop-dell-vostro-7570-70138566.html', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(59, 20, 1, 'Dell Vostro 3568-XF6C621 | i7-7500U | 4GB DDR4 | 1TB HDD | DVD | Radeon R5 M420 2GB | 15.6inch FHD | FreeDOS', 16300000, 'https://laptopnew.vn/Dell-Vostro-3568-XF6C621', '2018-04-27 05:40:54', '2018-04-27 05:40:54'),
(60, 20, 2, 'Dell Vostro 3568 (XF6C621) Core™ i7 _ 7500U _4GB _1TB _AMD Radeon™ R5 M420 2GB _FHD _Finger _14317D', 15699000, 'http://laptopno1.com/Dell-Vostro-3568-(XF6C621)-CoreTM-i7-_-7500U-_4GB-_1TB-_AMD-RadeonTM-R5-M420-2GB-_FHD-_Finger-_14317D/16476', '2018-04-27 05:40:54', '2018-04-27 05:40:54'),
(61, 20, 3, 'Sản phẩm Dell Vostro 3568 (XF6C621)', 16290000, 'http://www.hangchinhhieu.vn/san-pham/dell-vostro-3568-xf6c621-10605-732', '2018-04-27 05:40:55', '2018-04-27 05:40:55'),
(62, 20, 4, 'Máy xách tay/ Laptop Dell Vostro 15 3568-XF6C621 (I7-7500U) (Đen)', 16940000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-vostro/may-xach-tay-laptop-dell-vostro-15-3568-xf6c621-i7-7500u-den.html', '2018-04-27 05:40:56', '2018-04-27 05:40:56'),
(63, 20, 5, 'Laptop Dell Vostro 3568 i7 7500U/4GB/1TB/2GB M420/Win10/(XF6C62)', 18490000, 'https://www.thegioididong.com/laptop/dell-vostro-3568-i7-7500u', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(64, 20, 7, 'Dell Vostro V3568 XF6C62', 16890000, 'http://www.ankhang.vn/dell-vostro-v3568-xf6c62_id9075.html', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(65, 20, 8, 'LAPTOP DELL VOSTRO 15 3568 (XF6C62)', 17990000, 'https://www.nguyenkim.com/may-tinh-xach-tay-dell-vostro-15-3568-xf6c62-core-i7-win10.html', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(66, 21, 1, 'Dell Vostro 5468-VTI5019 (Gold) | i5-7200U | 4GB DDR4 | 500GB HDD | VGA Onboard | 14.1 HD | Free Dos', 14600000, 'https://laptopnew.vn/dell-vostro-5468-vti5019', '2018-04-27 05:46:18', '2018-04-27 05:46:18'),
(67, 21, 2, 'Dell Vostro 5468 Intel&#174; Kaby Lake Core™ i5 _7200U _4GB _1TB _GeForce&#174; GT940MX 2GB DDR5 _Win 1O _Grey', 14690000, 'http://laptopno1.com/Dell-Vostro-5468-Intel-c2-ae-Kaby-Lake-CoreTM-i5-_7200U-_4GB-_1TB-_GeForce-c2-ae-GT940MX-2GB-DDR5-_Win-1O-_Grey/15593', '2018-04-27 05:46:18', '2018-04-27 05:46:18'),
(68, 21, 3, 'Sản phẩm Dell Vostro 5468 (VTI5019W)', 15600000, 'http://www.hangchinhhieu.vn/san-pham/dell-vostro-5468-vti5019w-12782-7556', '2018-04-27 05:46:19', '2018-04-27 05:46:19'),
(69, 21, 4, 'Máy xách tay/ Laptop Dell Vostro 5468-VTI5019W (Vàng đồng)', 16290000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-vostro/laptop-dell-vostro-5468-vti5019w-mau-gold.html', '2018-04-27 05:46:20', '2018-04-27 05:46:20'),
(70, 21, 5, 'Laptop Dell Inspiron 5468 i5 7200U/4GB/500GB/2GB R7M440/Win10/Office365/(K5CDP11)', 15990000, 'https://www.thegioididong.com/laptop/dell-inspiron-5468-i5-7200u', '2018-04-27 05:46:20', '2018-04-27 05:46:20'),
(71, 21, 7, 'Laptop Dell Vostro 5468 VTI5019', 14350000, 'http://www.ankhang.vn/laptop-dell-vostro-5468-vti5019_id12560.html', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(72, 21, 8, 'LAPTOP DELL VOSTRO 14 5468-VTI5019W', 16490000, 'https://www.nguyenkim.com/may-tinh-xach-tay-dell-vostro-14-5468-vti5019w-core-i5-win10.html', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(73, 13, 6, 'Dell N7567E', 26990000, 'https://fptshop.com.vn/may-tinh-xach-tay/Dell-N7567E', '2018-04-27 05:48:53', '2018-04-27 05:48:53'),
(74, 14, 6, 'Dell Ins N5567C/i7- 7500U', 18990000, 'https://fptshop.com.vn/may-tinh-xach-tay/dell-ins-n5567ci7-7500u', '2018-04-27 05:49:31', '2018-04-27 05:49:31'),
(75, 18, 6, 'Dell Vostro V5468A', 18190000, 'https://fptshop.com.vn/may-tinh-xach-tay/dell-vostro-v5468a', '2018-04-27 05:50:45', '2018-05-04 08:38:45'),
(76, 19, 6, 'Dell Inspiron N7570', 22990000, 'https://fptshop.com.vn/may-tinh-xach-tay/Dell-Inspiron-N7570', '2018-04-27 05:51:14', '2018-04-27 05:51:14'),
(77, 20, 6, 'Dell Vostro 3568', 10890000, 'https://fptshop.com.vn/may-tinh-xach-tay/Dell-Vostro-3568', '2018-04-27 05:51:49', '2018-04-27 05:51:49'),
(78, 22, 1, 'Dell Vostro 5471-VTI5207W (Rose-Finger) | i5-8250U | 4GB RAM | 1TB HDD | VGA Onboard | 14.1 FHD | Win10 + Office365', 16400000, 'https://laptopnew.vn/dell-vostro-5471-vti5207w-rose', '2018-04-27 05:55:34', '2018-04-27 05:55:34'),
(79, 22, 2, 'Dell Vostro 5471 (VTI5207W) Intel&#174; Core™ i5 _8250U _4GB _1TB _VGA INTEL _Win 10_ OFF 365 _Full HD _Rose _118P', 16100000, 'http://laptopno1.com/Dell-Vostro-5471-(VTI5207W)-Intel-c2-ae-CoreTM-i5-_8250U-_4GB-_1TB-_VGA-INTEL-_Win-10_-OFF-365-_Full-HD-_Rose-_118P/29193', '2018-04-27 05:55:34', '2018-04-27 05:55:34'),
(80, 22, 3, 'Sản phẩm Dell Vostro 5471 (VTI5207W) (Silver)', 16990000, 'http://www.hangchinhhieu.vn/san-pham/dell-vostro-5471-vti5207w-silver-12998-2443', '2018-04-27 05:55:35', '2018-04-27 05:55:35'),
(81, 22, 4, 'Máy xách tay/ Laptop Dell Vostro 5471-VTI5207W (Bạc)', 17490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-vostro/may-xach-tay-laptop-dell-vostro-5471-vti5207w-bac.html', '2018-04-27 05:55:36', '2018-04-27 05:55:36'),
(82, 22, 6, 'Dell Vostro 5471', 17990000, 'https://fptshop.com.vn/may-tinh-xach-tay/Dell-Vostro-5471', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(83, 22, 7, 'Laptop Dell Vostro 5471 VTI5207W Silver', 16450000, 'http://www.ankhang.vn/laptop-dell-vostro-5471-vti5207w-silver_id12259.html', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(84, 22, 8, 'LAPTOP DELL VOSTRO 14 - 5471 VTI5207W (BẠC)', 17490000, 'https://www.nguyenkim.com/laptop-dell-vostro-14-5471-vti5207w-bac.html', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(85, 23, 1, 'Dell Vostro 3468-K5P6W1 | i5-7200U | 4GB DDR4 | 1TB HDD | AMD Radeon R5 M420 2GB | 14.1 | Win10 license', 14050000, 'https://laptopnew.vn/dell-vostro-3468-k5p6w1', '2018-04-28 14:33:05', '2018-04-28 14:33:05'),
(86, 23, 2, 'Dell Vostro 3468 (K5P6W1) Core™ i5 _7200U _4GB _1TB _AMD Radeon™ R5 M420 2GB _Win 1O _Finger 19116D', 13999000, 'http://laptopno1.com/Dell-Vostro-3468-(K5P6W1)-CoreTM-i5-_7200U-_4GB-_1TB-_AMD-RadeonTM-R5-M420-2GB-_Win-1O-_Finger-19116D/15617', '2018-04-28 14:33:07', '2018-04-28 14:33:07'),
(87, 23, 3, 'Sản phẩm Dell Vostro 3468 (K5P6W12)', 14190000, 'http://www.hangchinhhieu.vn/san-pham/dell-vostro-3468-k5p6w12-12538-3233', '2018-04-28 14:33:08', '2018-04-28 14:33:08'),
(88, 23, 4, 'Máy xách tay/ Laptop Dell Vostro 3468 (F3468-70090698) (Đen)', 14090000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-vostro/laptop-dell-vostro-3468-70090698-mau-den.html', '2018-04-28 14:33:09', '2018-04-28 14:33:09'),
(89, 23, 5, 'Laptop Dell Vostro 3468 i5 7200U/4GB/1TB/Win10', 14490000, 'https://www.thegioididong.com/laptop/dell-vostro-3468-i5-7200u', '2018-04-28 14:33:12', '2018-04-28 14:33:12'),
(90, 23, 6, 'Dell V3468/Core i5-7200U', 13190000, 'https://fptshop.com.vn/may-tinh-xach-tay/dell-v3468core-i5-7200u', '2018-04-28 14:33:13', '2018-04-28 14:33:13'),
(91, 23, 7, 'Laptop Dell Vostro 14 3468 K5P6W12', 13850000, 'http://www.ankhang.vn/laptop-dell-vostro-14-3468-k5p6w12_id10746.html', '2018-04-28 14:33:13', '2018-04-28 14:33:13'),
(92, 23, 8, 'LAPTOP DELL VOSTRO 3468 (K5P6W11)', 14390000, 'https://www.nguyenkim.com/may-tinh-xach-tay-dell-vostro-3468-core-i5.html', '2018-04-28 14:33:23', '2018-04-28 14:33:23'),
(93, 24, 1, 'Dell Latitude 7280-70135937 | i7-7600U | 8GB DDR4 | 256GB SSD | VGA Onboard | 12.5 HD | Win 10', 31900000, 'https://laptopnew.vn/dell-latitude-7280-70135937', '2018-04-28 14:36:01', '2018-04-28 14:36:01'),
(94, 24, 2, 'Dell Latitude 7280 (70124696) Intel&#174; Core™ i7 _7600U _8GB _256GB SSD _12.5&quot; HD _Win 10_LED KEY _Finger _7617F', 33899000, 'http://laptopno1.com/Dell-Latitude-7280-(70124696)-Intel-c2-ae-CoreTM-i7-_7600U-_8GB-_256GB-SSD-_12-5-HD-_Win-10_LED-KEY-_Finger-_7617F/17370', '2018-04-28 14:36:02', '2018-04-28 14:36:02'),
(95, 24, 7, 'Laptop Dell Latitude 7280 70124696', 35690000, 'http://www.ankhang.vn/laptop-dell-latitude-7280-70124696_id10496.html', '2018-04-28 14:36:03', '2018-04-28 14:36:03'),
(96, 25, 1, 'Dell Latitude E5470-70085465 | i5-6200U | 4x2.3GHz~2.8GHz | 8GB DDR4 | 500GB HDD | NoDVD |  AMD Radeon R7 M360 2GB | 14.1 | Win10 license', 20600000, 'https://laptopnew.vn/Dell-Latitude-E5470-70085465-chinh-hang-gia-tot-tai-tphcm', '2018-04-28 14:38:20', '2018-04-28 14:38:20'),
(97, 26, 1, 'Dell XPS 13 9360-70148070 (Silver) | i5-8250U | 8GB RAM | 256GB SSD | VGA Onboard | 13.3 FHD | Win10 + Office365', 33200000, 'https://laptopnew.vn/dell-xps-13-9360-70148070', '2018-04-28 14:41:38', '2018-04-28 14:41:38'),
(98, 26, 2, 'Dell XPS13 9360 (70148070) Intel&#174; Core™ i5 _8250U _8GB _256GB SSD _VGA INTEL _Win 10 _OFF 365 _Full HD _Finger _LED KEY _418F', 31490000, 'http://laptopno1.com/Dell-XPS13-9360-(70148070)-Intel-c2-ae-CoreTM-i5-_8250U-_8GB-_256GB-SSD-_VGA-INTEL-_Win-10-_OFF-365-_Full-HD-_Finger-_LED-KEY-_418F/29972', '2018-04-28 14:41:39', '2018-04-28 14:41:39'),
(99, 26, 3, 'Sản phẩm Dell XPS 13 9360 (70126276)', 33190000, 'http://www.hangchinhhieu.vn/san-pham/dell-xps-13-9360-70126276-12301-7546', '2018-04-28 14:41:40', '2018-04-28 14:41:40'),
(100, 26, 4, 'Máy xách tay/ Laptop Dell XPS13 9360-99H103 (I7-7560U-SSD512G) (Bạc)', 46090000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-xps/may-xach-tay-laptop-dell-xps13-9360-99h103-i7-7560u-ssd512g-b-c.html', '2018-04-28 14:41:41', '2018-04-28 14:41:41'),
(101, 26, 6, 'Dell XPS 13 (9360)/Core i5-7200U', 35990000, 'https://fptshop.com.vn/may-tinh-xach-tay/dell-xps-13-9360core-i5-7200u', '2018-04-28 14:41:42', '2018-04-28 14:41:42'),
(102, 26, 7, 'Laptop Dell XPS 13 9360 70148070', 30990000, 'http://www.ankhang.vn/laptop-dell-xps-13-9360-70148070_id12587.html', '2018-04-28 14:41:43', '2018-04-28 14:41:43'),
(103, 27, 1, 'Dell XPS 15 9560-70123080 | i7-7700HQ | 16GB DDR4 | 512GB SSD | Geforce GTX 1050 4GB | 15.6 UHD Touch | Win10 + Office365', 48200000, 'https://laptopnew.vn/dell-xps-15-9560-70123080', '2018-04-28 14:44:36', '2018-04-28 14:44:36'),
(104, 27, 3, 'Sản phẩm Dell XPS 15 9560 (70126275)', 50990000, 'http://www.hangchinhhieu.vn/san-pham/dell-xps-15-9560-70126275-12303-8942', '2018-04-28 14:44:37', '2018-04-28 14:44:37'),
(105, 27, 6, 'Dell XPS 15 9560', 53990000, 'https://fptshop.com.vn/may-tinh-xach-tay/dell-xps-15-9560', '2018-04-28 14:44:39', '2018-04-28 14:44:39'),
(106, 27, 7, 'Laptop Dell XPS 15 9560 70123080', 48290000, 'http://www.ankhang.vn/laptop-dell-xps-15-9560-70123080_id10471.html', '2018-04-28 14:44:44', '2018-04-28 14:44:44'),
(107, 28, 2, 'New Dell Alienware 17 R4 i7 6700HQ - 8GB - 1TB - GTX 1060 - Full HD - Win 10', 40499000, 'http://laptopno1.com/New-Dell-Alienware-17-R4-i7-6700HQ-8GB-1TB-GTX-1060-Full-HD-Win-10/15596', '2018-04-28 14:47:00', '2018-04-28 14:47:00'),
(108, 29, 1, 'HP Spectre 13-v020TU | i7-6500U | 8GB RAM DDR3L | 256GB SSD PCIe | VGA Onboard |13.3 FHD | Win10 license', 41400000, 'https://laptopnew.vn/hp-compaq-hp-spectre-13-v020tu-i7-6500u-8gb-ram-ddr3l-256gb-ssd-pcie-vga-onboard-13-3-fhd-win10-license-p4114.html', '2018-04-28 14:49:32', '2018-04-28 14:49:32'),
(109, 29, 2, 'HP Spectre 13-af086TU (3CH51PA) | Core i7-8550U_8GB_256GB SSD_UHD 620_13.3&quot; FHD Touch_W10 Pro_318F', 36799000, 'http://laptopno1.com/HP-Spectre-13-af086TU-(3CH51PA)-Core-i7-8550U_8GB_256GB-SSD_UHD-620_13-3-FHD-Touch_W10-Pro_318F/29411', '2018-04-28 14:49:33', '2018-04-28 14:49:33'),
(110, 29, 4, 'Máy xách tay/ Laptop HP Spectre 13-af086TU (3CH51PA) (Bạc)', 38490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-doanh-nhan/laptop-hp/may-xach-tay-laptop-hp-spectre-13-af086tu-3ch51pa-b-c.html', '2018-04-28 14:49:35', '2018-04-28 14:49:35'),
(111, 29, 6, 'HP Spectre 13-v020TU', 37990000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-spectre-13-v020tu', '2018-04-28 14:49:36', '2018-04-28 14:49:36'),
(112, 29, 7, 'Laptop HP Spectre 13-v105TU Y4G02PA', 37990000, 'http://www.ankhang.vn/laptop-hp-spectre-13-v105tu-y4g02pa_id10661.html', '2018-04-28 14:49:36', '2018-04-28 14:49:36'),
(113, 30, 4, 'Máy xách tay/ Laptop HP EliteBook X360 1030 G2 (1GY36PA) (Bạc)', 35990000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-probook-elitebook/may-xach-tay-laptop-hp-elitebook-x360-1030-g2-1gy36pa-b-c.html', '2018-04-28 14:52:19', '2018-04-28 14:52:19'),
(114, 31, 1, 'HP Elitebook 1040 G3 - W8H15PA | i5-6200U | 4x2.5GHz~3.1GHz | 8GB DDR3 | 256Gb SSD | NoDVD | Vga Onboard | 14.1 FHD | Win10 license', 27390000, 'https://laptopnew.vn/hp-compaq-hp-elitebook-1040-g3-w8h15pa-i5-6200u-4x2-5ghz-3-1ghz-8gb-ddr3-256gb-ssd-nodvd-vga-onboard-14-1-fhd-win10-license-p4129.html', '2018-04-28 14:54:28', '2018-04-28 14:54:28'),
(115, 31, 8, 'LAPTOP HP ELITEBOOK 1040 G3 W8H15PA', 28990000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-elitebook-1040-g3-w8h15pa-core-i5-win10.html', '2018-04-28 14:54:34', '2018-04-28 14:54:34'),
(116, 32, 1, 'HP Envy 13-ad075TU (2LR93PA) | i5-7200U | 4GB RAM | 256GB SSD | VGA Onboard | 13.3 inch FHD | Win10', 20200000, 'https://laptopnew.vn/hp-envy-13-ad075tu-2lr93pa', '2018-04-28 14:57:04', '2018-04-28 14:57:04'),
(117, 32, 2, 'HP ENVY 13 ad159TU (3MR74PA) Intel&#174; Core™ i5 _8250U _4GB _256GB SSD PCIe _VGA INTEL _Win 10 _Full HD IPS _LED KEY _318F', 19999000, 'http://laptopno1.com/HP-ENVY-13-ad159TU-(3MR74PA)-Intel-c2-ae-CoreTM-i5-_8250U-_4GB-_256GB-SSD-PCIe-_VGA-INTEL-_Win-10-_Full-HD-IPS-_LED-KEY-_318F/29320', '2018-04-28 14:57:05', '2018-04-28 14:57:05'),
(118, 32, 3, 'Sản phẩm HP Envy 13-ad159TU (3MR74PA)', 20990000, 'http://www.hangchinhhieu.vn/san-pham/hp-envy-13-ad159tu-3mr74pa-13075-9601', '2018-04-28 14:57:07', '2018-04-28 14:57:07'),
(119, 32, 4, 'Máy xách tay/ Laptop HP Envy 13-ab011TU (Z4Q37PA) (Bạc)', 20990000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-envy/laptop-hp-envy-13-ab011tu-z4q37pa-mau-ba-c.html', '2018-04-28 14:57:10', '2018-04-28 14:57:10'),
(120, 32, 5, 'Laptop HP Envy 13 ad158TU i5 8250U/4GB/128GB/Win10/(3MR80PA)', 19990000, 'https://www.thegioididong.com/laptop/hp-envy-13-ad158tu-i5-8250u-3mr80pa', '2018-04-28 14:57:12', '2018-04-28 14:57:12'),
(121, 32, 6, 'HP ENVY 13-ad139TU', 20990000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-envy-13-ad139tu', '2018-04-28 14:57:14', '2018-04-28 14:57:14'),
(122, 32, 7, 'Laptop HP ENVY 13-ad159TU 3MR74PA', 19950000, 'http://www.ankhang.vn/laptop-hp-envy-13-ad159tu-3mr74pa_id12653.html', '2018-04-28 14:57:14', '2018-04-28 14:57:14'),
(123, 32, 8, 'LAPTOP HP ENVY 13-AB011TU', 19590000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-envy-13-ab011tu-core-i5.html', '2018-04-28 14:57:24', '2018-04-28 14:57:24'),
(124, 33, 1, 'Hp Envy 15-ae130TX | i7-6500U | 4x2.5GHz~3.1GHz | 8GB DDR3L | 1TB HDD | NoDVD | NVIDIA GeForce® GT 940M 2GB | 15.6 | Win10 license', 23200000, 'https://laptopnew.vn/Hp-envy-15-ae-130tx-chinh-hang-gia-tot-tai-tphcm', '2018-04-28 15:01:37', '2018-04-28 15:01:37'),
(125, 33, 2, 'HP Envy 15 as105TU (Y4G01PA) Intel&#174; Kaby Lake Core™ i7 _7500U _8GB _1TB_128GB SSD _VGA INTEL _Win 10 _Full HD IPS _20917F', 23799000, 'http://laptopno1.com/HP-Envy-15-as105TU-(Y4G01PA)-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7500U-_8GB-_1TB_128GB-SSD-_VGA-INTEL-_Win-10-_Full-HD-IPS-_20917F/18653', '2018-04-28 15:01:37', '2018-04-28 15:01:37'),
(126, 33, 4, 'Máy xách tay/ Laptop HP Envy 15-as104TU (Y4G00PA) (Bạc)', 19690000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-envy/laptop-hp-envy-15-as104tu-y4g00pa-mau-ba-c.html', '2018-04-28 15:01:39', '2018-04-28 15:01:39'),
(127, 33, 5, 'Laptop HP Envy 13 ad158TU i5 8250U/4GB/128GB/Win10/(3MR80PA)', 19990000, 'https://www.thegioididong.com/laptop/hp-envy-13-ad158tu-i5-8250u-3mr80pa', '2018-04-28 15:01:40', '2018-04-28 15:01:40'),
(128, 33, 6, 'HP Envy 15-ae130TX', 24990000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-envy-15-ae130tx', '2018-04-28 15:01:41', '2018-04-28 15:01:41'),
(129, 33, 7, 'Laptop HP ENVY 13-ad159TU 3MR74PA', 19950000, 'http://www.ankhang.vn/laptop-hp-envy-13-ad159tu-3mr74pa_id12653.html', '2018-04-28 15:01:41', '2018-04-28 15:01:41'),
(130, 33, 8, 'HP ENVY 15 AE130TX P6M95PA', 24990000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-envy-15-ae130tx-p6m95pa-core-i7.html', '2018-04-28 15:01:48', '2018-04-28 15:01:48'),
(131, 34, 1, 'HP ProBook 450 G4-Z6T22PA | i5-7200U | 4GB DDR4 | 500GB HDD | Geforce 930MX 2GB | 15.6 FHD | FreeDos', 15700000, 'https://laptopnew.vn/hp-probook-450-g4-z6t22pa-i5-7200u', '2018-04-28 15:04:23', '2018-04-28 15:04:23'),
(132, 34, 2, 'HP ProBook 450 G4 (Z6T22PA) Core™ i5_ 7200U _4GB _500GB _GeForce&#174; GT930MX 2GB _FHD _Finger _9126F', 15699000, 'http://laptopno1.com/HP-ProBook-450-G4-(Z6T22PA)-CoreTM-i5_-7200U-_4GB-_500GB-_GeForce-c2-ae-GT930MX-2GB-_FHD-_Finger-_9126F/15891', '2018-04-28 15:04:24', '2018-04-28 15:04:24'),
(133, 34, 3, 'Sản phẩm HP Probook 450 G4 (Z6T31PA)', 16990000, 'http://www.hangchinhhieu.vn/san-pham/hp-probook-450-g4-z6t31pa-9349-7461', '2018-04-28 15:04:24', '2018-04-28 15:04:24'),
(134, 34, 4, 'Máy xách tay/ Laptop HP Probook 450 G4-Z6T23PA (Bạc)', 17290000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-probook-elitebook/laptop-hp-probook-450-g4-z6t23pa-i5-7200u-8gb-500gb-15-6fhd-930mx-2g-dos-b-c.html', '2018-04-28 15:04:26', '2018-04-28 15:04:26'),
(135, 34, 6, 'HP ProBook 450 G4', 16490000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-probook-450-g4', '2018-04-28 15:04:27', '2018-04-28 15:04:27'),
(136, 35, 1, 'HP ProBook 450 G4-Z6T22PA | i5-7200U | 4GB DDR4 | 500GB HDD | Geforce 930MX 2GB | 15.6 FHD | FreeDos', 15700000, 'https://laptopnew.vn/hp-probook-450-g4-z6t22pa-i5-7200u', '2018-04-28 15:13:45', '2018-04-28 15:13:45'),
(137, 35, 2, 'HP ProBook 450 G4 (Z6T22PA) Core™ i5_ 7200U _4GB _500GB _GeForce&#174; GT930MX 2GB _FHD _Finger _9126F', 15699000, 'http://laptopno1.com/HP-ProBook-450-G4-(Z6T22PA)-CoreTM-i5_-7200U-_4GB-_500GB-_GeForce-c2-ae-GT930MX-2GB-_FHD-_Finger-_9126F/15891', '2018-04-28 15:13:46', '2018-04-28 15:13:46'),
(138, 35, 3, 'Sản phẩm HP Probook 450 G4 (Z6T31PA)', 16990000, 'http://www.hangchinhhieu.vn/san-pham/hp-probook-450-g4-z6t31pa-9349-7461', '2018-04-28 15:13:47', '2018-04-28 15:13:47'),
(139, 35, 4, 'Máy xách tay/ Laptop HP Probook 450 G4-Z6T23PA (Bạc)', 17290000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-probook-elitebook/laptop-hp-probook-450-g4-z6t23pa-i5-7200u-8gb-500gb-15-6fhd-930mx-2g-dos-b-c.html', '2018-04-28 15:13:48', '2018-04-28 15:13:48'),
(140, 35, 6, 'HP ProBook 450 G4', 16490000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-probook-450-g4', '2018-04-28 15:13:48', '2018-04-28 15:13:48'),
(141, 35, 8, 'LAPTOP HP PROBOOK 450 G4 Z6T19PA', 15390000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-probook-450-g4-z6t19pa-core-i5.html', '2018-04-28 15:13:55', '2018-04-28 15:13:55'),
(142, 36, 1, 'Hp Probook 450 G3-T9S20PA | i5-6200U | 4x2.3GHz~2.8GHz | 8GB DDR3L | 1Tb HDD | DVD | VGA Onboard | 15.6 | FreeDOS', 14400000, 'https://laptopnew.vn/Hp-Probook-450-G3-T9S20PA-chinh-hang-gia-tot-tai-tphcm', '2018-04-28 15:15:58', '2018-04-28 15:15:58'),
(143, 36, 6, 'HP ProBook 450 G3', 14490000, 'https://fptshop.com.vn/may-tinh-xach-tay/hp-probook-450-g3', '2018-04-28 15:15:59', '2018-04-28 15:15:59'),
(144, 37, 1, 'Hp Probook 440 G3 - X4K52PA | i5-6200U | 4x2.2GHz ~ 2.7GHz | 4GB DDR4 | 500GB HDD | DVD | AMD R7 M340 2GB | 15.6 | FreeDOS', 15350000, 'https://laptopnew.vn/hp-compaq-hp-probook-440-g3-x4k52pa-i5-6200u-4x2-2ghz-2-7ghz-4gb-ddr4-500gb-hdd-dvd-amd-r7-m340-2gb-15-6-freedos-p4121.html', '2018-04-28 15:17:34', '2018-04-28 15:17:34'),
(145, 38, 1, 'Hp Probook 440 G3 - Y7C91PA| i5-6200U | 4x2.2GHz ~ 2.7GHz | 4GB DDR4 | 500GB HDD | NoDVD | AMD R7 M340 2GB  | 15.6 | FreeDOS', 15700000, 'https://laptopnew.vn/hp-compaq-hp-probook-440-g3-y7c91pa-i5-6200u-4x2-2ghz-2-7ghz-4gb-ddr4-500gb-hdd-nodvd-amd-r7-m340-2gb-15-6-freedos-p4125.html', '2018-04-28 15:19:20', '2018-04-28 15:19:20'),
(146, 38, 8, 'HP PROBOOK 440 G3 T1A13PA', 15690000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-probook-440-g3-t1a13pa-core-i5.html', '2018-04-28 15:19:22', '2018-04-28 15:19:22'),
(147, 39, 1, 'HP ProBook 440 G4-Z6T33PA | i5-7200U | 8GB DDR4 | 500GB HDD | VGA Onboard | 14.1 | FreeDos', 15100000, 'https://laptopnew.vn/hp-probook-440-g4-z6t33pa-i5-7200u', '2018-04-28 15:22:01', '2018-04-28 15:22:01'),
(148, 39, 2, 'HP ProBook 440 G4 (Z6T13PA) Intel&#174; Kaby Lake Core™ i5 _7200U _4GB _500GB _VGA INTEL _Finger _Win 10 _5117F', 15250000, 'http://laptopno1.com/HP-ProBook-440-G4-(Z6T13PA)-Intel-c2-ae-Kaby-Lake-CoreTM-i5-_7200U-_4GB-_500GB-_VGA-INTEL-_Finger-_Win-10-_5117F/15974', '2018-04-28 15:22:02', '2018-04-28 15:22:02'),
(149, 39, 3, 'Sản phẩm HP Probook 440 G4 (Z6T12PA)', 14490000, 'http://www.hangchinhhieu.vn/san-pham/hp-probook-440-g4-z6t12pa-9238-8892', '2018-04-28 15:22:02', '2018-04-28 15:22:02'),
(150, 39, 4, 'Máy xách tay/ Laptop HP Probook 440 G4-Z6T13PA (Bạc)', 15390000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-hp/hp-probook-elitebook/may-xach-tay-laptop-hp-probook-440-g4-z6t13pa-b-c.html', '2018-04-28 15:22:04', '2018-04-28 15:22:04'),
(151, 39, 8, 'LAPTOP HP PROBOOK 440 G4 Z6T15PA', 15190000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-probook-440-g4-z6t15pa-core-i5.html', '2018-04-28 15:22:09', '2018-04-28 15:22:09'),
(152, 40, 8, 'HP PROBOOK 430 G3 T3Z09PA', 9990000, 'https://www.nguyenkim.com/may-tinh-xach-tay-hp-probook-430-g3-t3z09pa-core-i3-win10-den.html', '2018-04-28 15:23:46', '2018-04-28 15:23:46'),
(153, 41, 1, 'Asus FX503VD-E4082T | i5-7300HQ | 8GB DDR4 | 1TB HDD (SSHD 8GB) | Geforce GTX 1050 4GB | 15.6 FHD IPS | Win10', 20490000, 'https://laptopnew.vn/laptop-asus-fx503vd-e4082t', '2018-04-28 15:26:50', '2018-04-28 15:26:50'),
(154, 41, 2, 'Asus FX503VD E4082T Core i5-7300HQ_8GB_128GB SSD_1TB _GTX1050 4GB_W1O_FHD IPS_LED KEY_318S', 20499000, 'http://laptopno1.com/Asus-FX503VD-E4082T-Core-i5-7300HQ_8GB_128GB-SSD_1TB-_GTX1050-4GB_W1O_FHD-IPS_LED-KEY_318S/29410', '2018-04-28 15:26:51', '2018-04-28 15:26:51'),
(155, 41, 3, 'Sản phẩm ASUS FX503VD-E4082T', 19490000, 'http://www.hangchinhhieu.vn/san-pham/asus-fx503vd-e4082t-12587-3762', '2018-04-28 15:26:51', '2018-04-28 15:26:51'),
(156, 41, 4, 'Máy xách tay/ Laptop Asus FX503VD-E4082T (I5-7300HQ) (Đen)', 20490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-asus/laptop-asus-fx503vd-e4082t-i5-7300hq-8gb-ddr4-2400-geforce-gtx-1050-4gb-gddr5-intel-graphics-630-hdd-1tb-15-6-fhd-ips-60hz.html', '2018-04-28 15:26:53', '2018-04-28 15:26:53'),
(157, 41, 5, 'Laptop Asus FX503VD i7 7700HQ/8G/1TB+128GB/GTX1050 4GB/Win10/(E4119T)', 24490000, 'https://www.thegioididong.com/laptop/asus-fx503vd-i7-7700hq-e4119t', '2018-04-28 15:26:54', '2018-04-28 15:26:54'),
(158, 41, 6, 'Asus FX503VD-E4082T/Core i5-7300HQ', 20490000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-fx503vd-e4082tcore-i5-7300hq', '2018-04-28 15:26:55', '2018-04-28 15:26:55'),
(159, 41, 7, 'Laptop Asus FX503VD-E4082T', 19190000, 'http://www.ankhang.vn/laptop-asus-fx503vd-e4082t_id11283.html', '2018-04-28 15:26:56', '2018-04-28 15:26:56'),
(160, 41, 8, 'LAPTOP ASUS FX503VD-E4119T', 24990000, 'https://www.nguyenkim.com/laptop-asus-fx503vd-e4119t.html', '2018-04-28 15:26:57', '2018-04-28 15:26:57'),
(161, 42, 1, 'Asus ROG Strix Hero GL503VD-GZ119TS | i7-7700HQ | 8GB DDR4 | 128GB SSD + 1TB HDD (SSHD 8GB) | GeForce GTX 1050 4GB | 15.6 FHD IPS 120Hz | Win10', 27490000, 'https://laptopnew.vn/asus-rog-strix-hero-gl503vd-gz119ts', '2018-04-28 15:29:46', '2018-04-28 15:29:46'),
(162, 42, 2, 'Asus ROG Strix Hero Edition GL503VD GZ119T | i7_7700HQ_8GB_256GB_1TB_GTX1050 4GB_Win 10_FHD-120Hz_RGB_191117S', 27100000, 'http://laptopno1.com/Asus-ROG-Strix-Hero-Edition-GL503VD-GZ119T-i7_7700HQ_8GB_256GB_1TB_GTX1050-4GB_Win-10_FHD-120Hz_RGB_191117S/28979', '2018-04-28 15:29:47', '2018-04-28 15:29:47'),
(163, 42, 3, 'Sản phẩm ASUS ROG HERO GL503VD-GZ119T', 26990000, 'http://www.hangchinhhieu.vn/san-pham/asus-rog-hero-gl503vd-gz119t-12612-9488', '2018-04-28 15:29:48', '2018-04-28 15:29:48'),
(164, 42, 7, 'Laptop Asus ROG HERO GL503VD-GZ119T', 26990000, 'http://www.ankhang.vn/laptop-asus-rog-hero-gl503vd-gz119t_id11169.html', '2018-04-28 15:29:49', '2018-04-28 15:29:49'),
(165, 43, 1, 'Asus ROG Strix SCAR GL703VD-EE057T | i7-7700HQ | 8GB DDR4 | 1TB HDD (SSHD 8GB) | GeForce GTX 1050 4GB | 17.3 FHD 120Hz | Win10', 27490000, 'https://laptopnew.vn/asus-rog-strix-scar-gl703vd-ee057t', '2018-04-28 15:32:19', '2018-04-28 15:32:19'),
(166, 43, 2, 'Asus ROG Strix Scar Edition GL703VD EE057T Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _1TB_256GB SSD_GeForce&#174; GTX1050 with 4GB GDDR5 _Win 10 _17.3 inch 120MHz _LED Keyboard RGB _NC2', 27499000, 'http://laptopno1.com/Asus-ROG-Strix-Scar-Edition-GL703VD-EE057T-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_1TB_256GB-SSD_GeForce-c2-ae-GTX1050-with-4GB-GDDR5-_Win-10-_1/28924', '2018-04-28 15:32:20', '2018-04-28 15:32:20'),
(167, 43, 3, 'Sản phẩm ASUS ROG SCAR GL703VD-EE057T', 27490000, 'http://www.hangchinhhieu.vn/san-pham/asus-rog-scar-gl703vd-ee057t-12613-3447', '2018-04-28 15:32:23', '2018-04-28 15:32:23'),
(168, 43, 4, 'Máy xách tay/ Laptop Asus GL703VD-EE057T (I7-7700HQ)', 27490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-asus/may-xach-tay-laptop-asus-gl703vd-ee057t-i7-7700hq.html', '2018-04-28 15:32:26', '2018-04-28 15:32:26'),
(169, 43, 7, 'Laptop Asus ROG SCAR GL703VD-EE057T', 27490000, 'http://www.ankhang.vn/laptop-asus-rog-scar-gl703vd-ee057t_id11172.html', '2018-04-28 15:32:27', '2018-04-28 15:32:27'),
(170, 44, 1, 'Asus ROG Strix Hero GL503VM-GZ219TS2 | i7-7700HQ | 8GB DDR4 | 256GB SSD + 1TB HDD (SSHD 8GB) | GeForce GTX 1060 3GB | 15.6 FHD IPS 120Hz | Win10', 32490000, 'https://laptopnew.vn/asus-rog-strix-hero-gl503vm-gz219ts', '2018-04-28 15:34:53', '2018-04-28 15:34:53'),
(171, 44, 2, 'Asus ROG Strix Hero GL503VM GZ219T | Core i7 _7700HQ _8GB _256GB SSD_1TB Hybrid_GeForce GTX1060 3GB_Win 10_15.6&quot; FHD-120Hz _LED RGB _181117S', 31999000, 'http://laptopno1.com/Asus-ROG-Strix-Hero-GL503VM-GZ219T-Core-i7-_7700HQ-_8GB-_256GB-SSD_1TB-Hybrid_GeForce-GTX1060-3GB_Win-10_15-6-FHD-120Hz-_LED-RGB-_181117S/28980', '2018-04-28 15:34:54', '2018-04-28 15:34:54'),
(172, 44, 3, 'Sản phẩm ASUS ROG HERO GL503VM-GZ219T', 32490000, 'http://www.hangchinhhieu.vn/san-pham/asus-rog-hero-gl503vm-gz219t-12614-6181', '2018-04-28 15:34:55', '2018-04-28 15:34:55'),
(173, 44, 4, 'Máy xách tay/ Laptop Asus GL503VM-GZ219T (I7-7700HQ) (Đen)', 32490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-asus/may-xach-tay-laptop-asus-gl503vm-gz219t-i7-7700hq-den.html', '2018-04-28 15:34:56', '2018-04-28 15:34:56'),
(174, 44, 6, 'Asus GL503VM - GZ219T', 32490000, 'https://fptshop.com.vn/may-tinh-xach-tay/Asus-GL503VM-GZ219T', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(175, 44, 7, 'Laptop Asus ROG HERO GL503VM-GZ219T', 32490000, 'http://www.ankhang.vn/laptop-asus-rog-hero-gl503vm-gz219t_id11171.html', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(176, 45, 2, 'ASUS GL553VD FY305A Intel&#174; Core™ i7 _7700HQ _8GB _1TB _GeForce&#174; GTX1050 with 4GB GDDR5_Full HD IPS _LED KEY', 22400000, 'http://laptopno1.com/ASUS-GL553VD-FY305A-Intel-c2-ae-CoreTM-i7-_7700HQ-_8GB-_1TB-_GeForce-c2-ae-GTX1050-with-4GB-GDDR5_Full-HD-IPS-_LED-KEY/17395', '2018-04-28 15:36:52', '2018-04-28 15:36:52'),
(177, 45, 6, 'Asus GL553VD-FY305', 23990000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-gl553vd-fy305', '2018-04-28 15:36:54', '2018-04-28 15:36:54'),
(178, 45, 7, 'Asus GL553VD-FY175', 20290000, 'http://www.ankhang.vn/asus-gl553vd-fy175_id9580.html', '2018-04-28 15:36:55', '2018-04-28 15:36:55'),
(179, 46, 1, 'Asus ROG Strix SCAR GL703VM-EE095T | i7-7700HQ | 16GB DDR4 | 256GB SSD + 1TB HDD (SSHD 8GB) | GeForce GTX 1060 6GB | 17.3 FHD 120Hz | Win10', 40390000, 'https://laptopnew.vn/asus-rog-strix-scar-gl703vm-ee095t', '2018-04-28 15:38:22', '2018-04-28 15:38:22'),
(180, 46, 2, 'Asus Rog Strix Scar GL703VM EE095T Intel&#174; Kaby Lake Core™ i7 _7700HQ _16GB _1TB Hybrid _256GB SSD PCIe _GeForce&#174; GTX1060 with 6GB GDDR5 _Win 10 _17.3 inch 120MHz _LED Keyboard RGB _181017S', 38790000, 'http://laptopno1.com/Asus-Rog-Strix-Scar-GL703VM-EE095T-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_16GB-_1TB-Hybrid-_256GB-SSD-PCIe-_GeForce-c2-ae-GTX1060-with-6GB-GDDR5-_Wi/28822', '2018-04-28 15:38:22', '2018-04-28 15:38:22'),
(181, 46, 3, 'Sản phẩm ASUS ROG SCAR GL703VM-EE095T', 38990000, 'http://www.hangchinhhieu.vn/san-pham/asus-rog-scar-gl703vm-ee095t-12616-3091', '2018-04-28 15:38:23', '2018-04-28 15:38:23'),
(182, 47, 1, 'Asus ROG GX800VH-GY004T | i7-7820HK | 64GB DDR4 | 1.5TB SSD | Geforce GTX 1080 SLI 16GB | 18.4 4K | Win10 license', 145500000, 'https://laptopnew.vn/Asus-GX800VH-GY004T', '2018-04-28 15:40:16', '2018-04-28 15:40:16'),
(183, 47, 7, 'Laptop Asus ROG GX800VH(KBL)-GY004T', 155250000, 'http://www.ankhang.vn/laptop-asus-rog-gx800vhkbl-gy004t_id9821.html', '2018-04-28 15:40:17', '2018-04-28 15:40:17'),
(184, 48, 1, 'Asus ZenBook UX430UA-GV334T (Blue) | i5-8250U | 8GB DDR4 | 256GB SSD | VGA Onboard | 14.0 FHD IPS | Win10', 21300000, 'https://laptopnew.vn/asus-zenbook-ux430ua-gv334t', '2018-04-28 15:43:41', '2018-04-28 15:43:41'),
(185, 48, 2, 'Asus Zenbook UX430UA GV049 Intel&#174; Kaby Lake Core™ i5 _7200U _8GB _256GB SSD _VGA INTEL _Full HD _12517DF', 19390000, 'http://laptopno1.com/Asus-Zenbook-UX430UA-GV049-Intel-c2-ae-Kaby-Lake-CoreTM-i5-_7200U-_8GB-_256GB-SSD-_VGA-INTEL-_Full-HD-_12517DF/16798', '2018-04-28 15:43:43', '2018-04-28 15:43:43'),
(186, 48, 3, 'Sản phẩm ASUS UX430UA-GV334T', 20990000, 'http://www.hangchinhhieu.vn/san-pham/asus-ux430ua-gv334t-12645-4310', '2018-04-28 15:43:45', '2018-04-28 15:43:45'),
(187, 48, 4, 'Máy xách tay/ Laptop Asus UX430UA-GV334T (I5-8250U) (Xanh)', 21990000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-doanh-nhan/laptop-asus/may-xach-tay-laptop-asus-ux430ua-gv334t-i5-8250u-xanh.html', '2018-04-28 15:43:46', '2018-04-28 15:43:46'),
(188, 48, 5, 'Laptop Asus UX430UA i5 8250U/8GB/256GB/Win10/(GV334T)', 21990000, 'https://www.thegioididong.com/laptop/asus-ux430ua-i5-8250u-gv334t', '2018-04-28 15:43:48', '2018-04-28 15:43:48'),
(189, 48, 6, 'ASUS ZenBook UX430UA-GV126T', 19490000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-ux430ua-gv126t', '2018-04-28 15:43:49', '2018-04-28 15:43:49'),
(190, 48, 7, 'Laptop Asus UX430UA-GV334T', 21990000, 'http://www.ankhang.vn/laptop-asus-ux430ua-gv334t_id11638.html', '2018-04-28 15:43:56', '2018-04-28 15:43:56'),
(191, 48, 8, 'LAPTOP ASUS ZENBOOK UX430UA', 19090000, 'https://www.nguyenkim.com/may-tinh-xach-tay-asus-ux430ua-gv126t.html', '2018-04-28 15:43:58', '2018-04-28 15:43:58'),
(192, 49, 1, 'ASUS Zenbook 3 Deluxe UX490UA-BE009TS | i7-7500U | 8GB DDR4 | 512GB SSD | VGA Onboard | 14.1inch FHD | Win10 license', 38800000, 'https://laptopnew.vn/ASUS-UX490UA-BE009T', '2018-04-28 15:45:54', '2018-04-28 15:45:54'),
(193, 49, 2, 'ASUS ZenBook 3 Deluxe UX490UA BE009TS Intel&#174; Kaby Lake Core™ i7 _7500U _8GB _512GB SSD _VGA INTEL _Win 1O _OFF 365 _Full HD _Finger _LED KEY _418D', 39990000, 'http://laptopno1.com/ASUS-ZenBook-3-Deluxe-UX490UA-BE009TS-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7500U-_8GB-_512GB-SSD-_VGA-INTEL-_Win-1O-_OFF-365-_Full-HD-_Finger-_LED-KEY-_41/17382', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(194, 49, 3, 'Sản phẩm ASUS ZenBook 3 Deluxe UX490UA-BE009TS', 38990000, 'http://www.hangchinhhieu.vn/san-pham/asus-zenbook-3-deluxe-ux490ua-be009ts-12936-3725', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(195, 50, 1, 'Asus Vivobook S15 S510UN-BQ276T (Finger) | i5-8250U | 4GB DDR4 | 1TB HDD | Geforce MX150 2GB | 15.6 FHD IPS | Win10', 16350000, 'https://laptopnew.vn/asus-vivobook-s15-s510un-bq276t', '2018-04-28 15:48:18', '2018-04-28 15:48:18'),
(196, 50, 3, 'Sản phẩm ASUS S510UN-BQ319T', 18490000, 'http://www.hangchinhhieu.vn/san-pham/asus-s510un-bq319t-13137-6673', '2018-04-28 15:48:19', '2018-04-28 15:48:19'),
(197, 50, 6, 'Asus Vivobook S15 S510UQ-BQ475T/i5-8250U', 16990000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-vivobook-s15-s510uq-bq475ti5-8250u', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(198, 50, 8, 'LAPTOP ASUS VIVOBOOK S15 S510UQ-BQ475T', 17290000, 'https://www.nguyenkim.com/laptop-asus-vivobook-s15-s510uq-bq475t.html', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(199, 51, 1, 'MSI GV62 7RD-1882XVN | i7-7700HQ | 8GB DDR4 | 1TB HDD | GeForce GTX 1050 4GB | 15.6 FHD | FreeDos', 23990000, 'https://laptopnew.vn/msi-gv62-7rd-1882xvn', '2018-05-04 07:52:45', '2018-05-04 07:52:45'),
(200, 51, 2, 'MSI GV62 7RD 1882XVN | Core™ i7 _7700HQ _8GB _1TB _NVIDIA&#174; GeForce&#174; GTX1050 with 4GB _15.6 inch Full HD _LED KEY RED', 21799000, 'http://laptopno1.com/MSI-GV62-7RD-1882XVN-CoreTM-i7-_7700HQ-_8GB-_1TB-_NVIDIA-c2-ae-GeForce-c2-ae-GTX1050-with-4GB-_15-6-inch-Full-HD-_LED-KEY-RED/17672', '2018-05-04 07:52:45', '2018-05-04 07:52:45'),
(201, 51, 3, 'Sản phẩm MSI GV62 7RD-1882XVN', 21990000, 'http://www.hangchinhhieu.vn/san-pham/msi-gv62-7rd-1882xvn-12496-7004', '2018-05-04 07:52:46', '2018-05-04 07:52:46'),
(202, 51, 4, 'Máy xách tay/ Laptop MSI GV62 7RD-1882XVN (I7-7700HQ)', 23790000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-msi/laptop-msi-gaming-gv62-7rd-1882xvn-i7-7700hq-8gb-drr4-geforce-gtx-1050-4gb-ddr5-hdd-1tb-15-6-full-hd.html', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(203, 51, 6, 'MSI GV62 8RC-063VN/i5-8300H', 22990000, 'https://fptshop.com.vn/may-tinh-xach-tay/MSI-GV62-8RC-063VNi5-8300H', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(204, 51, 7, 'Laptop MSI GV62 7RD 1883XVN', 21290000, 'http://www.ankhang.vn/laptop-msi-gv62-7rd-1883xvn_id10758.html', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(205, 51, 8, 'LAPTOP MSI GV62 7RD-1882XVN', 23990000, 'https://www.nguyenkim.com/msi-gv62-7rd-1882xvn.html', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(206, 52, 1, 'MSI GV72 7RD-874XVNS | i7-7700HQ | 8GB DDR4 | 128GB SSD PCIe + 1TB HDD | GeForce GTX 1050 4GB | 17.3 FHD | FreeDos', 24490000, 'https://laptopnew.vn/msi-gv72-7rd-874xvns', '2018-05-04 07:55:54', '2018-05-04 07:55:54'),
(207, 52, 2, 'MSI GV72 7RD 874XVN Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _1TB _NVIDIA&#174; GeForce&#174; GTX1050 with 4GB _17.3 inch Full HD ', 22250000, 'http://laptopno1.com/MSI-GV72-7RD-874XVN-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_1TB-_NVIDIA-c2-ae-GeForce-c2-ae-GTX1050-with-4GB-_17-3-inch-Full-HD/17671', '2018-05-04 07:55:55', '2018-05-04 07:55:55'),
(208, 52, 3, 'Sản phẩm MSI GV72 7RD-874XVNS', 24390000, 'http://www.hangchinhhieu.vn/san-pham/msi-gv72-7rd-874xvns-12557-9502', '2018-05-04 07:55:55', '2018-05-04 07:55:55'),
(209, 52, 4, 'Máy xách tay/ Laptop MSI GV72 7RD-874XVN (I7-7700HQ)', 24490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-msi/laptop-msi-gaming-gv72-7rd-874xvn-i7-7700hq-8gb-ddr4-geforce-gtx-1050-4gb-ddr5-hdd-1tb-17-3-full-hd.html', '2018-05-04 07:55:56', '2018-05-04 07:55:56'),
(210, 52, 7, 'Laptop MSI GV72 7RD 874XVN (GeForce® GTX 1050, 4GB GDDR5)', 22290000, 'http://www.ankhang.vn/msi-gv72-7rd-geforce-gtx-1050-4gb-gddr5_id10245.html', '2018-05-04 07:55:57', '2018-05-04 07:55:57'),
(211, 53, 1, 'MSI GV72 7RE-1424XVN | i7-7700HQ | 8GB DDR4 | 1TB HDD | GeForce GTX 1050Ti 4GB | 17.3 FHD | FreeDos', 25990000, 'https://laptopnew.vn/msi-gv72-7re-1424xvn', '2018-05-04 07:58:18', '2018-05-04 07:58:18'),
(212, 53, 2, 'MSI GV72 7RE 1424XVN Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _1TB _GeForce&#174; GTX1050Ti with 4GB GDDR5 _Full HD _RED LED KEY', 24190000, 'http://laptopno1.com/MSI-GV72-7RE-1424XVN-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_1TB-_GeForce-c2-ae-GTX1050Ti-with-4GB-GDDR5-_Full-HD-_RED-LED-KEY/29073', '2018-05-04 07:58:18', '2018-05-04 07:58:18'),
(213, 53, 4, 'Máy xách tay/ Laptop MSI GV72 7RE-1424XVN (I7-7700HQ)', 25990000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-msi/may-xach-tay-laptop-msi-gv72-7re-1424xvn-i7-7700hq.html', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(214, 53, 7, 'Laptop MSI GV72 7RE 1494VN - Windows 10', 26890000, 'http://www.ankhang.vn/laptop-msi-gv72-7re-1494vn---windows-10_id12500.html', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(215, 54, 1, 'MSI GP72M 7REX-1216XVNS Leopard Pro | i7-7700HQ | 8GB DDR4 | 128GB SSD PCIe + 1TB HDD | NoDVD | GeForce GTX 1050Ti 4GB | 17.3 FHD 120Hz | FreeDos', 27990000, 'https://laptopnew.vn/msi-gp72m-7rex-1216xvns-leopard-pro', '2018-05-04 08:00:37', '2018-05-04 08:00:37'),
(216, 54, 2, 'MSI GP72M 7REX 873XVN Leopard Pro Intel&#174; Kaby Lake Core™ i7 _7700HQ _8GB _1TB _Nvidia&#174; GeForce&#174; GTX1050Ti with 4GB GDDR5 _17.3 inch 120MHz ', 26600000, 'http://laptopno1.com/MSI-GP72M-7REX-873XVN-Leopard-Pro-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_8GB-_1TB-_Nvidia-c2-ae-GeForce-c2-ae-GTX1050Ti-with-4GB-GDDR5-_17-3-inch-12/18681', '2018-05-04 08:00:38', '2018-05-04 08:00:38'),
(217, 54, 4, 'Máy xách tay/ Laptop MSI GP72M 7REX-1216XVN (I7-7700HQ)', 27999000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-msi/may-xach-tay-laptop-msi-gp72m-7rex-1216xvn-i7-7700hq.html', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(218, 54, 6, 'MSI GL72M 7REX - 1427XVN', 25990000, 'https://fptshop.com.vn/may-tinh-xach-tay/MSI-GL72M-7REX-1427XVN', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(219, 54, 7, 'Laptop MSI GP72M 7REX 1216XVN - Windows 10', 29590000, 'http://www.ankhang.vn/laptop-msi-gp72m-7rex-1216xvn---windows-10_id12234.html', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(220, 55, 1, 'MSI GP62M 7REX-1884XVNS2 Leopard Pro | i7-7700HQ | 16GB DDR4 | 256GB SSD PCIe + 1TB HDD | NoDVD | GeForce GTX 1050Ti 4GB | 15.6 FHD | FreeDos', 29400000, 'https://laptopnew.vn/msi-gp62m-7rex-1884xvns2-leopard-pro', '2018-05-04 08:03:51', '2018-05-04 08:03:51'),
(221, 55, 2, 'MSI GP62M 7REX Leopard 2686VN Intel&#174; Kaby Lake Core™ i7 _7700HQ _16GB _128GB SSD PCIe _1TB _GeForce&#174; GTX1050Ti with 4GB GDDR5 _Win 10 _Full HD _LED KEY _318', 28999000, 'http://laptopno1.com/MSI-GP62M-7REX-Leopard-2686VN-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_16GB-_128GB-SSD-PCIe-_1TB-_GeForce-c2-ae-GTX1050Ti-with-4GB-GDDR5-_Win-10-_Full/29290', '2018-05-04 08:03:51', '2018-05-04 08:03:51'),
(222, 55, 4, 'Máy xách tay/ Laptop MSI GP62M 7REX-1884XVN (I7-7700HQ)', 29490000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-msi/laptop-msi-gaming-gp62m-7rex-1884xvn-i7-7700hq-16gb-2x8gb-ddr4-geforce-gtx1050ti-4gb-gddr5-ssd-128gb-hdd-1tb-15-6-full-hd.html', '2018-05-04 08:03:52', '2018-05-04 08:03:52'),
(223, 55, 6, 'MSI GP62M 7REX-1884XVN/i7-7700HQ', 28000000, 'https://fptshop.com.vn/may-tinh-xach-tay/MSI-GP62M-7REX-1884XVNi7-7700HQ', '2018-05-04 08:04:13', '2018-05-04 08:04:13'),
(224, 55, 7, 'Laptop MSI GP62M 7REX 2686VN Leopard - Windows 10', 29690000, 'http://www.ankhang.vn/laptop-msi-gp62m-7rex-2686vn-leopard---windows-10_id12499.html', '2018-05-04 08:04:14', '2018-05-04 08:04:14'),
(225, 56, 1, 'MSI GE63VR 7RE-088XVNW Raider | i7-7700HQ | 16GB DDR4 | 128GB SSD + 1TB HDD | GeForce GTX 1060 6GB | 15.6 FHD IPS | Win 10', 42690000, 'https://laptopnew.vn/msi-ge63vr-7re-088xvnw-raider', '2018-05-04 08:05:41', '2018-05-04 08:05:41'),
(226, 56, 7, 'Laptop MSI GE63VR 7RE 088XVN - Windows 10', 42590000, 'http://www.ankhang.vn/laptop-msi-ge63vr-7re-088xvn---windows-10_id12231.html', '2018-05-04 08:05:42', '2018-05-04 08:05:42'),
(227, 57, 1, 'MSI GE73VR 7RF-414VN Raider | i7-7700HQ | 16GB DDR4 | 256GB SSD + 1TB HDD | GeForce GTX 1070 8GB | 17.3 FHD 120Hz | Win 10', 52690000, 'https://laptopnew.vn/msi-ge73vr-7rf-414vn-raider', '2018-05-04 08:07:27', '2018-05-04 08:07:27'),
(228, 57, 2, 'MSI GE73VR 7RF 414VN Raider Intel&#174; Kaby Lake Core™ i7 _7700HQ _16GB _1TB _256GB SSD PCIe _GeForce&#174; GTX1070 with 8GB GDDR5 _Full HD 120MHz _LED KEY _318', 48490000, 'http://laptopno1.com/MSI-GE73VR-7RF-414VN-Raider-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_16GB-_1TB-_256GB-SSD-PCIe-_GeForce-c2-ae-GTX1070-with-8GB-GDDR5-_Full-HD-120MHz-_/29288', '2018-05-04 08:07:27', '2018-05-04 08:07:27'),
(229, 57, 7, 'Laptop MSI GE73VR 7RF 414VN -  Windows 10', 50990000, 'http://www.ankhang.vn/laptop-msi-ge73vr-7rf-414vn---windows-10_id12496.html', '2018-05-04 08:07:27', '2018-05-04 08:07:27');
INSERT INTO `comparetive_link` (`id`, `id_product`, `id_provider`, `name`, `price`, `link`, `created_at`, `updated_at`) VALUES
(230, 58, 1, 'MSI GS63VR 7RF-259XVN | i7-7700HQ | 8x2.8GHz~3.8GHz | 16G DDR4 | 128GB SSD PCIe + 1TB HDD | NVIDIA GeForce® GTX 1060 6GB GDDR5 | 15.6 FHD IPS | FreeDOS', 49199000, 'https://laptopnew.vn/MSI-GS63VR-7RF-259xvn-giam-gia', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(231, 58, 2, 'MSI GS63VR 7RF 259XVN Stealth Pro Intel&#174; Kaby Lake Core™ i7 _7700HQ _16GB _1TB _128GB SSD PCIe _GeForce&#174; GTX1060 with 6GB GDDR5 _Win 10 _Full HD IPS _LED KEY', 50899000, 'http://laptopno1.com/MSI-GS63VR-7RF-259XVN-Stealth-Pro-Intel-c2-ae-Kaby-Lake-CoreTM-i7-_7700HQ-_16GB-_1TB-_128GB-SSD-PCIe-_GeForce-c2-ae-GTX1060-with-6GB-GDDR5-_Win-10-_Fu/29201', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(232, 58, 7, 'Laptop MSI GS63VR 7RF 259XVN - Windows 10', 50790000, 'http://www.ankhang.vn/laptop-msi-gs63vr-7rf-259xvn---windows-10_id12238.html', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(233, 59, 1, 'MSI GT83VR 7RF-278XVN Titan | i7-7920HQ | 32GB DDR4 | 512GB SSD PCIe + 1TB HDD | GeForce GTX 1080 SLI 8GB | 18.4 FHD | FreeDos', 122990000, 'https://laptopnew.vn/msi-gt83vr-7rf-278xvn-titan', '2018-05-04 08:11:41', '2018-05-04 08:11:41'),
(234, 59, 7, 'MSI GT83VR 7RF Titan SLI 238XVN', 110790000, 'http://www.ankhang.vn/msi-gt83vr-7rf-titan-sli-238xvn_id9437.html', '2018-05-04 08:11:42', '2018-05-04 08:11:42'),
(235, 60, 1, 'MSI GT75VR 7RE Titan | i7-7820HK | 16GB DDR4 | 256GB SSD PCIe + 1TB HDD | GeForce GTX 1070 8GB | 17.3 FHD 120Hz | FreeDos', 64490000, 'https://laptopnew.vn/msi-gt75vr-7re-titan', '2018-05-04 08:13:07', '2018-05-04 08:13:07'),
(236, 61, 1, 'Acer Aspire 7 A715-71G-52WP (NX.GP8SV.005) | i5-7300HQ | 8GB DDR4 | 1TB HDD | Geforce GTX 1050 2GB | 15.6 FHD IPS | Free Dos', 17990000, 'https://laptopnew.vn/acer-aspire-7-a715-71g-52wp-nxgp8sv005', '2018-05-04 08:16:18', '2018-05-04 08:16:18'),
(237, 61, 3, 'Sản phẩm Acer AS Nitro A715-71G-52WPS', 18490000, 'http://www.hangchinhhieu.vn/san-pham/acer-as-nitro-a715-71g-52wps-13142-9019', '2018-05-04 08:16:18', '2018-05-04 08:16:18'),
(238, 61, 7, 'Laptop Acer Aspire 7 A715-71G-52WP NX.GP8SV.005', 18490000, 'http://www.ankhang.vn/laptop-acer-aspire-7-a715-71g-52wp-nx.gp8sv.005_id11350.html', '2018-05-04 08:16:19', '2018-05-04 08:16:19'),
(239, 62, 2, 'Acer Gaming Nitro 5 AN515 51 5775 (NH.Q2SSV.004) Intel&#174; Kaby Lake Core™ i5 _7300HQ _8GB _1TB _NVIDIA&#174; GeForce&#174; GTX1050 with 2GB _Full HD IPS _21817F', 17950000, 'http://laptopno1.com/Acer-Gaming-Nitro-5-AN515-51-5775-(NH-Q2SSV-004)-Intel-c2-ae-Kaby-Lake-CoreTM-i5-_7300HQ-_8GB-_1TB-_NVIDIA-c2-ae-GeForce-c2-ae-GTX1050-with-2GB-_Full-/18521', '2018-05-04 08:19:07', '2018-05-04 08:19:07'),
(240, 62, 3, 'Sản phẩm Acer Nitro 5 AN515-51-5775', 18490000, 'http://www.hangchinhhieu.vn/san-pham/acer-nitro-5-an515-51-5775-12484-8120', '2018-05-04 08:19:07', '2018-05-04 08:19:07'),
(241, 62, 5, 'Laptop Acer Nitro 5 AN515 51 739L i7 7700HQ/8GB/1TB/2GB GTX1050/Win10/(NH.Q2SSV.007)', 23490000, 'https://www.thegioididong.com/laptop/acer-nitro-5-an515-51-739l-i7-7700hq', '2018-05-04 08:19:07', '2018-05-04 08:19:07'),
(242, 62, 6, 'Acer Nitro 5 AN515-51-5531/i5-7300HQ', 20499000, 'https://fptshop.com.vn/may-tinh-xach-tay/Acer-Nitro-5-AN515-51-5531i5-7300HQ', '2018-05-04 08:19:08', '2018-05-04 08:19:08'),
(243, 62, 7, 'Laptop Acer Nitro 5 AN515-51-5775 NH.Q2SSV.004', 18690000, 'http://www.ankhang.vn/laptop-acer-nitro-5-an515-51-5775-nhq2ssv004_id10712.html', '2018-05-04 08:19:08', '2018-05-04 08:19:08'),
(244, 62, 8, 'LAPTOP ACER NITRO 5 AN515-51-5775', 19990000, 'https://www.nguyenkim.com/acer-nitro-5-an515-51-5775.html', '2018-05-04 08:19:14', '2018-05-04 08:19:14'),
(245, 63, 1, 'Acer Spin 5 SP513-52N-53MT (NX.GR7SV.001) | i5-8250U | 8GB DDR4 | 256GB SSD  | VGA Onboard | 13.3 FHD Touch IPS | Win10', 19800000, 'https://laptopnew.vn/acer-spin-5-sp513-52n-53mt-nxgr7sv001', '2018-05-04 08:20:56', '2018-05-04 08:20:56'),
(246, 63, 2, 'Acer Spin 5 SP513 52N 53MT (NX.GR7SV.001) Intel&#174; Core™ i5 _8250U _8GB _256GB SSD _VGA INTEL _Win 10 _Full HD IPS _Multi Touch _Finger _118D', 18999000, 'http://laptopno1.com/Acer-Spin-5-SP513-52N-53MT-(NX-GR7SV-001)-Intel-c2-ae-CoreTM-i5-_8250U-_8GB-_256GB-SSD-_VGA-INTEL-_Win-10-_Full-HD-IPS-_Multi-Touch-_Finger-_118D/29069', '2018-05-04 08:20:57', '2018-05-04 08:20:57'),
(247, 63, 3, 'Sản phẩm Acer Spin 5 SP513-52N-53MT', 20990000, 'http://www.hangchinhhieu.vn/san-pham/acer-spin-5-sp513-52n-53mt-12937-9752', '2018-05-04 08:20:57', '2018-05-04 08:20:57'),
(248, 63, 4, 'Máy xách tay/ Laptop Acer Spin 5 SP513-52N-53MT (NX.GR7SV.001) (Xám)', 20989000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-acer/may-xach-tay-laptop-acer-spin-5-sp513-52n-53mt-nx-gr7sv-001-xam.html', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(249, 63, 7, 'Laptop Acer Spin 5 SP513-52N-53MT NX.GR7SV.001', 20890000, 'http://www.ankhang.vn/laptop-acer-spin-5-sp513-52n-53mt-nx.gr7sv.001_id11857.html', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(250, 64, 2, 'Acer AS VX5 591G 52YZ (NH.GM2SV.002) Intel&#174; Core™ i5 _7300HQ _8GB _1TB_128GB SSD _GeForce&#174; GTX1050 4GB GDDR5 _Full HD', 19000000, 'http://laptopno1.com/Acer-AS-VX5-591G-52YZ-(NH-GM2SV-002)-Intel-c2-ae-CoreTM-i5-_7300HQ-_8GB-_1TB_128GB-SSD-_GeForce-c2-ae-GTX1050-4GB-GDDR5-_Full-HD/16555', '2018-05-04 08:22:36', '2018-05-04 08:22:36'),
(251, 64, 3, 'Sản phẩm Acer AS VX5-591G-70XM', 22990000, 'http://www.hangchinhhieu.vn/san-pham/acer-as-vx5-591g-70xm-10537-9113', '2018-05-04 08:22:37', '2018-05-04 08:22:37'),
(252, 64, 4, 'Máy xách tay/ Laptop Acer AS VX5-591G-52YZ (NH.GM2SV.002) (Đen)', 18190000, 'https://phongvu.vn/may-tinh-xach-tay/laptop-choi-game/laptop-acer/may-xach-tay-laptop-acer-as-vx5-591g-52yz-nh-gm2sv-002-den.html', '2018-05-04 08:22:38', '2018-05-04 08:22:38'),
(253, 64, 6, 'Acer VX5-591G-52YZ', 21190000, 'https://fptshop.com.vn/may-tinh-xach-tay/acer-vx5-591g-52yz', '2018-05-04 08:22:40', '2018-05-04 08:22:40'),
(254, 65, 1, 'Lenovo Thinkpad E560-20EVA027VN | i5-6200U | 4GB DDR3L | 500GB HDD (SSHD 8GB) | AMD R7 M370 2GB | 15.6 HD | Win10', 11500000, 'https://laptopnew.vn/lenovo-thinkpad-e560-20eva027vn', '2018-05-04 08:24:19', '2018-05-04 08:24:19'),
(255, 65, 6, 'Lenovo Thinkpad E560', 15490000, 'https://fptshop.com.vn/may-tinh-xach-tay/lenovo-thinkpad-e560', '2018-05-04 08:24:20', '2018-05-04 08:24:20'),
(256, 65, 8, 'LAPTOP LENOVO THINKPAD E560 20EVA027VN', 15990000, 'https://www.nguyenkim.com/may-tinh-xach-tay-lenovo-thinkpad-e560-20eva027vn-core-i5-win10.html', '2018-05-04 08:24:24', '2018-05-04 08:24:24'),
(257, 66, 5, 'Laptop Apple Macbook Pro MPXR2SA/A i5 2.3GHz/8GB/128GB (2017)', 33990000, 'https://www.thegioididong.com/laptop/apple-macbook-pro-mpxr2sa-a', '2018-05-04 08:29:48', '2018-05-04 08:29:48'),
(258, 66, 6, 'Macbook Pro 13 inch 128GB (2017)', 33999000, 'https://fptshop.com.vn/may-tinh-xach-tay/macbook-pro-13-inch-128gb-2017', '2018-05-04 08:29:48', '2018-05-04 08:29:48'),
(259, 66, 8, 'MACBOOK PRO 13 INCH 128GB 2017 (MPXQ2SA/A)', 32990000, 'https://www.nguyenkim.com/macbook-pro-13-inch-128gb-2017-xam.html', '2018-05-04 08:29:49', '2018-05-04 08:29:49'),
(260, 67, 5, 'Laptop Apple Macbook Air MQD32SA/A i5 1.8GHz/8GB/128GB (2017)', 23990000, 'https://www.thegioididong.com/laptop/apple-macbook-air-mqd32sa-a-i5-5350u', '2018-05-04 08:36:19', '2018-05-04 08:36:19'),
(262, 67, 8, 'MACBOOK AIR 13.3 INCH 2017 (MQD32SA/A)', 22490000, 'https://www.nguyenkim.com/macbook-air-13-inch-128gb-2017.html', '2018-05-04 08:36:20', '2018-05-27 06:15:26'),
(278, 71, 1, 'Asus TUF Gaming FX504GE-E4059T | i7-8750H | 8GB DDR4 | 1TB HDD (SSHD 8GB) | Geforce GTX 1050Ti 4GB | 15.6 FHD IPS | Win10', 25990000, 'https://laptopnew.vn/asus-tuf-gaming-fx504ge-e4059t', '2018-05-20 15:11:26', '2018-05-20 15:11:26'),
(279, 71, 2, 'Asus Gaming TUF FX504GE E4059T Intel&#174; Core™ i7 _8750HQ _8GB _1TB Hybrid _NVIDIA&#174; GeForce&#174; GTX1050Ti with 4GB GDDR5 _Win 10 _Full HD IPS _LED KEY _418D', 25990000, 'http://laptopno1.com/Asus-Gaming-TUF-FX504GE-E4059T-Intel-c2-ae-CoreTM-i7-_8750HQ-_8GB-_1TB-Hybrid-_NVIDIA-c2-ae-GeForce-c2-ae-GTX1050Ti-with-4GB-GDDR5-_Win-10-_Full-HD-IP/30142', '2018-05-20 15:11:26', '2018-05-27 06:12:52'),
(280, 71, 3, 'Sản phẩm ASUS TUF Gaming FX504GD-E4081T', 24990000, 'http://www.hangchinhhieu.vn/san-pham/asus-tuf-gaming-fx504gd-e4081t-13115-3766', '2018-05-20 15:11:26', '2018-05-20 15:11:26'),
(281, 71, 6, 'Asus TUF FX504GE-E4059T', 25990000, 'https://fptshop.com.vn/may-tinh-xach-tay/Asus-TUF-FX504GE-E4059T', '2018-05-20 15:11:26', '2018-05-20 15:11:26'),
(282, 71, 7, 'Laptop Asus TUF Gaming FX504GD-E4081T', 24990000, 'http://www.ankhang.vn/laptop-asus-tuf-gaming-fx504gd-e4081t_id12734.html', '2018-05-20 15:11:27', '2018-05-20 15:11:27'),
(290, 84, 3, 's', 21490000, 'https://hangchinhhieu.vn/products/laptop-asus-zenbook-ux333fa-a4017t-i5-8265u', '2019-03-18 10:18:05', '2019-03-18 10:18:05'),
(291, 85, 3, 's', 21490000, 'https://hangchinhhieu.vn/products/laptop-asus-zenbook-ux333fa-a4017t-i5-8265u', '2019-03-18 10:19:17', '2019-03-18 10:19:17'),
(292, 86, 3, 's', 21490000, 'https://hangchinhhieu.vn/products/laptop-asus-zenbook-ux333fa-a4017t-i5-8265u', '2019-03-18 10:20:15', '2019-03-18 10:20:15'),
(293, 87, 6, 's', 22990000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-zenbook-ux333fa-a4181t-core-i5-8265u', '2019-03-18 10:23:23', '2019-03-18 10:23:23'),
(294, 88, 6, 'Asus Zenbook UX333FA-A4181T/Core i5-8265U/8GB/256GSSD/WIN10', 22990000, 'https://fptshop.com.vn/may-tinh-xach-tay/asus-zenbook-ux333fa-a4181t-core-i5-8265u', '2019-03-18 10:24:12', '2019-03-18 10:24:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_product` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`id`, `name`, `id_product`, `created_at`, `updated_at`) VALUES
(16, 'ILWI_dell-inspiron-7567-4.jpg', '13', '2018-04-21 07:22:25', '2018-04-21 07:22:25'),
(17, '6YUx_dell-inspiron-7567-1.jpg', '13', '2018-04-21 15:20:12', '2018-04-21 15:20:12'),
(18, 'luBy_dell-inspiron-7567-2.jpg', '13', '2018-04-21 15:20:12', '2018-04-21 15:20:12'),
(19, 'dGb_dell-inspiron-7567-3.jpg', '13', '2018-04-21 15:20:12', '2018-04-21 15:20:12'),
(20, 'HLvW_dell-inspiron-5567-1.jpg', '14', '2018-04-27 03:32:24', '2018-04-27 03:32:24'),
(21, 'Eqav_dell-inspiron-5567-2.jpg', '14', '2018-04-27 03:32:24', '2018-04-27 03:32:24'),
(22, 'hlH_dell-inspiron-5567-3.jpg', '14', '2018-04-27 03:32:24', '2018-04-27 03:32:24'),
(23, 'Joj_dell-inspiron-5567-4.jpg', '14', '2018-04-27 03:32:24', '2018-04-27 03:32:24'),
(24, 'znpp_dell-inspiron-5570-1.jpg', '15', '2018-04-27 05:02:11', '2018-04-27 05:02:11'),
(25, '2suK_dell-inspiron-5570-2.jpg', '15', '2018-04-27 05:02:11', '2018-04-27 05:02:11'),
(26, 'wBwA_dell-inspiron-5570-3.jpg', '15', '2018-04-27 05:02:11', '2018-04-27 05:02:11'),
(27, 'SfUF_dell-inspiron-5570-4.jpg', '15', '2018-04-27 05:02:11', '2018-04-27 05:02:11'),
(28, '6mc6_dell-inspiron-7373-1.jpg', '16', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(29, 'rEPd_dell-inspiron-7373-2.jpg', '16', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(30, 'qnLN_dell-inspiron-7373-3.jpg', '16', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(31, 'Q5vR_dell-inspiron-7373-4.jpg', '16', '2018-04-27 05:22:23', '2018-04-27 05:22:23'),
(32, 'Zb79_dell-inspiron-7577-1.jpg', '17', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(33, 'nMlU_dell-inspiron-7577-2.jpg', '17', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(34, 'vLJU_dell-inspiron-7577-3.jpg', '17', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(35, 'OUL_dell-inspiron-7577-4.jpg', '17', '2018-04-27 05:25:48', '2018-04-27 05:25:48'),
(36, 'uxPE_dell-inspiron-5468-1.jpg', '18', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(37, 'eUjb_dell-inspiron-5468-2.jpg', '18', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(38, 'sbnG_dell-inspiron-5468-3.jpg', '18', '2018-04-27 05:33:52', '2018-04-27 05:33:52'),
(39, 'vylQ_dell-inspiron-5468-4.jpg', '18', '2018-04-27 05:33:53', '2018-04-27 05:33:53'),
(40, 'S1oI_dell-vostro-7570-1.jpg', '19', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(41, 'hBbj_dell-vostro-7570-2.jpg', '19', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(42, 'OXmU_dell-vostro-7570-3.jpg', '19', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(43, 'QuYW_dell-vostro-7570-4.jpg', '19', '2018-04-27 05:37:32', '2018-04-27 05:37:32'),
(44, 'mrIx_dell-vostro-3568-1.jpg', '20', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(45, 'fzC0_dell-vostro-3568-2.jpg', '20', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(46, 'YTj_dell-vostro-3568-3.jpg', '20', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(47, 'N4kf_dell-vostro-3568-4.jpg', '20', '2018-04-27 05:40:57', '2018-04-27 05:40:57'),
(48, 'pz9s_dell-vostro-5468-1.jpg', '21', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(49, 'L710_dell-vostro-5468-2.jpg', '21', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(50, 'TGQ_dell-vostro-5468-3.jpg', '21', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(51, 'hNN5_dell-vostro-5468-4.jpg', '21', '2018-04-27 05:46:21', '2018-04-27 05:46:21'),
(52, 'RL6U_dell-vostro-5471-1.jpg', '22', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(53, 'Stqs_dell-vostro-5471-2.jpg', '22', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(54, 'ZWD9_dell-vostro-5471-3.jpg', '22', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(55, 'rwcF_dell-vostro-5471-4.jpg', '22', '2018-04-27 05:55:37', '2018-04-27 05:55:37'),
(56, 'Y9XM_dell-vostro-3468-1.jpg', '23', '2018-04-28 14:33:23', '2018-04-28 14:33:23'),
(57, 'hWsR_dell-vostro-3468-2.jpg', '23', '2018-04-28 14:33:23', '2018-04-28 14:33:23'),
(58, 'c6tB_dell-vostro-3468-3.jpg', '23', '2018-04-28 14:33:23', '2018-04-28 14:33:23'),
(59, 'MRwJ_dell-vostro-3468-4.jpg', '23', '2018-04-28 14:33:23', '2018-04-28 14:33:23'),
(60, 'BKvS_dell-lattitude-7280-1.jpg', '24', '2018-04-28 14:36:03', '2018-04-28 14:36:03'),
(61, '260a_dell-lattitude-7280-2.jpg', '24', '2018-04-28 14:36:03', '2018-04-28 14:36:03'),
(62, 'JSbs_dell-lattitude-7280-3.jpg', '24', '2018-04-28 14:36:03', '2018-04-28 14:36:03'),
(63, 'C1tr_dell-lattitude-7280-4.jpg', '24', '2018-04-28 14:36:03', '2018-04-28 14:36:03'),
(64, 'Z9US_dell-lattitude-e5470-1.jpg', '25', '2018-04-28 14:38:20', '2018-04-28 14:38:20'),
(65, 'khtf_dell-lattitude-e5470-2.jpg', '25', '2018-04-28 14:38:20', '2018-04-28 14:38:20'),
(66, 'XsYL_dell-lattitude-e5470-3.jpg', '25', '2018-04-28 14:38:21', '2018-04-28 14:38:21'),
(67, 'GzJh_dell-lattitude-e5470-4.jpg', '25', '2018-04-28 14:38:21', '2018-04-28 14:38:21'),
(68, 'tz2u_dell-xps-13-9360-1.jpg', '26', '2018-04-28 14:41:43', '2018-04-28 14:41:43'),
(69, '6T2s_dell-xps-13-9360-2.jpg', '26', '2018-04-28 14:41:43', '2018-04-28 14:41:43'),
(70, 'uVKQ_dell-xps-13-9360-3.jpg', '26', '2018-04-28 14:41:43', '2018-04-28 14:41:43'),
(71, 'Z5bN_dell-xps-13-9360-4.jpg', '26', '2018-04-28 14:41:43', '2018-04-28 14:41:43'),
(72, 't9HF_dell-xps-15-9560-1.jpg', '27', '2018-04-28 14:44:44', '2018-04-28 14:44:44'),
(73, 'BK67_dell-xps-15-9560-2.jpg', '27', '2018-04-28 14:44:44', '2018-04-28 14:44:44'),
(74, '7iG9_dell-xps-15-9560-3.jpg', '27', '2018-04-28 14:44:44', '2018-04-28 14:44:44'),
(75, 'KkIl_dell-xps-15-9560-4.jpg', '27', '2018-04-28 14:44:44', '2018-04-28 14:44:44'),
(76, 'aotj_dell-alienware-17-r4-1.jpg', '28', '2018-04-28 14:47:00', '2018-04-28 14:47:00'),
(77, 'XXUK_dell-alienware-17-r4-2.jpg', '28', '2018-04-28 14:47:01', '2018-04-28 14:47:01'),
(78, 'HMsu_dell-alienware-17-r4-3.jpg', '28', '2018-04-28 14:47:01', '2018-04-28 14:47:01'),
(79, 'YJqU_dell-alienware-17-r4-4.jpg', '28', '2018-04-28 14:47:01', '2018-04-28 14:47:01'),
(80, 'tCl8_hp-spectre-13-1.jpg', '29', '2018-04-28 14:49:37', '2018-04-28 14:49:37'),
(81, 'Xbsn_hp-spectre-13-2.jpg', '29', '2018-04-28 14:49:37', '2018-04-28 14:49:37'),
(82, 'F9zW_hp-spectre-13-3.jpg', '29', '2018-04-28 14:49:37', '2018-04-28 14:49:37'),
(83, 'Q673_hp-spectre-13-4.jpg', '29', '2018-04-28 14:49:37', '2018-04-28 14:49:37'),
(84, '429l_hp-elitebook-x360-g2-1.jpg', '30', '2018-04-28 14:52:19', '2018-04-28 14:52:19'),
(85, 'qnpV_hp-elitebook-x360-g2-2.jpg', '30', '2018-04-28 14:52:19', '2018-04-28 14:52:19'),
(86, 'pXA6_hp-elitebook-x360-g2-3.jpg', '30', '2018-04-28 14:52:19', '2018-04-28 14:52:19'),
(87, 'Tkoo_hp-elitebook-x360-g2-4.jpg', '30', '2018-04-28 14:52:20', '2018-04-28 14:52:20'),
(88, 'BE8U_hp-elitebook-1040-g3-1.jpg', '31', '2018-04-28 14:54:34', '2018-04-28 14:54:34'),
(89, 'E2fn_hp-elitebook-1040-g3-2.jpg', '31', '2018-04-28 14:54:34', '2018-04-28 14:54:34'),
(90, 'IC8K_hp-elitebook-1040-g3-3.jpg', '31', '2018-04-28 14:54:34', '2018-04-28 14:54:34'),
(91, '3qFq_hp-elitebook-1040-g3-4.jpg', '31', '2018-04-28 14:54:34', '2018-04-28 14:54:34'),
(92, 'HWLC_hp-envy-13-1.jpg', '32', '2018-04-28 14:57:24', '2018-04-28 14:57:24'),
(93, '1XLE_hp-envy-13-2.jpg', '32', '2018-04-28 14:57:24', '2018-04-28 14:57:24'),
(94, 'Cmxo_hp-envy-13-3.jpg', '32', '2018-04-28 14:57:24', '2018-04-28 14:57:24'),
(95, 'w3gc_hp-envy-13-4.jpg', '32', '2018-04-28 14:57:24', '2018-04-28 14:57:24'),
(96, 'IFT8_hp-envy-15-1.jpg', '33', '2018-04-28 15:01:48', '2018-04-28 15:01:48'),
(97, 'oKv4_hp-envy-15-2.jpg', '33', '2018-04-28 15:01:48', '2018-04-28 15:01:48'),
(98, 'hUtE_hp-envy-15-3.jpg', '33', '2018-04-28 15:01:48', '2018-04-28 15:01:48'),
(99, 'h3w_hp-envy-15-4.jpg', '33', '2018-04-28 15:01:48', '2018-04-28 15:01:48'),
(100, 'vVly_hp-probook-450-g4-1.jpg', '35', '2018-04-28 15:13:55', '2018-04-28 15:13:55'),
(101, 'JWu3_hp-probook-450-g4-2.jpg', '35', '2018-04-28 15:13:55', '2018-04-28 15:13:55'),
(102, 'hxHn_hp-probook-450-g4-3.jpg', '35', '2018-04-28 15:13:55', '2018-04-28 15:13:55'),
(103, '3vsC_hp-probook-450-g4-4.jpg', '35', '2018-04-28 15:13:55', '2018-04-28 15:13:55'),
(104, 'LiGJ_hp-probook-450-g3-1.jpg', '36', '2018-04-28 15:15:59', '2018-04-28 15:15:59'),
(105, 'Gitk_hp-probook-450-g3-2.jpg', '36', '2018-04-28 15:15:59', '2018-04-28 15:15:59'),
(106, 'rTAQ_hp-probook-450-g3-3.jpg', '36', '2018-04-28 15:15:59', '2018-04-28 15:15:59'),
(107, 'HlH2_hp-probook-450-g3-4.jpg', '36', '2018-04-28 15:15:59', '2018-04-28 15:15:59'),
(108, 'xInY_hp-probook-440-g3-1.jpg', '38', '2018-04-28 15:19:22', '2018-04-28 15:19:22'),
(109, 'MQJG_hp-probook-440-g3-2.jpg', '38', '2018-04-28 15:19:22', '2018-04-28 15:19:22'),
(110, 'xnA1_hp-probook-440-g3-3.jpg', '38', '2018-04-28 15:19:22', '2018-04-28 15:19:22'),
(111, 'nWYI_hp-probook-440-g3-4.jpg', '38', '2018-04-28 15:19:22', '2018-04-28 15:19:22'),
(112, '4htJ_hp-probook-440-g4-1.jpg', '39', '2018-04-28 15:22:10', '2018-04-28 15:22:10'),
(113, 'yxsh_hp-probook-440-g4-2.jpg', '39', '2018-04-28 15:22:10', '2018-04-28 15:22:10'),
(114, 'CDxI_hp-probook-440-g4-3.jpg', '39', '2018-04-28 15:22:10', '2018-04-28 15:22:10'),
(115, 'fFHQ_hp-probook-440-g4-4.jpg', '39', '2018-04-28 15:22:10', '2018-04-28 15:22:10'),
(116, 'lJ9q_hp-probook-430-g3-1.jpg', '40', '2018-04-28 15:23:46', '2018-04-28 15:23:46'),
(117, 'ZQNo_hp-probook-430-g3-2.jpg', '40', '2018-04-28 15:23:46', '2018-04-28 15:23:46'),
(118, 'G47q_hp-probook-430-g3-3.jpg', '40', '2018-04-28 15:23:46', '2018-04-28 15:23:46'),
(119, 'Hv6m_hp-probook-430-g3-4.jpg', '40', '2018-04-28 15:23:46', '2018-04-28 15:23:46'),
(120, 'bQv_asus-fx503vd-1.jpg', '41', '2018-04-28 15:26:57', '2018-04-28 15:26:57'),
(121, 'kDwZ_asus-fx503vd-2.jpg', '41', '2018-04-28 15:26:57', '2018-04-28 15:26:57'),
(122, 'UbHM_asus-fx503vd-3.jpg', '41', '2018-04-28 15:26:57', '2018-04-28 15:26:57'),
(123, '6NE4_asus-fx503vd-4.jpg', '41', '2018-04-28 15:26:57', '2018-04-28 15:26:57'),
(124, 'FSiy_asus-rog-strix-hero-gl503vd-1.jpg', '42', '2018-04-28 15:29:49', '2018-04-28 15:29:49'),
(125, 'p6FO_asus-rog-strix-hero-gl503vd-2.jpg', '42', '2018-04-28 15:29:49', '2018-04-28 15:29:49'),
(126, 'qgLb_asus-rog-strix-hero-gl503vd-3.jpg', '42', '2018-04-28 15:29:49', '2018-04-28 15:29:49'),
(127, 'y39Z_asus-rog-strix-hero-gl503vd-4.jpg', '42', '2018-04-28 15:29:49', '2018-04-28 15:29:49'),
(128, 'QMAQ_asus-rog-strix-scar-gl703vd-1.jpg', '43', '2018-04-28 15:32:27', '2018-04-28 15:32:27'),
(129, 'mxg_asus-rog-strix-scar-gl703vd-2.jpg', '43', '2018-04-28 15:32:27', '2018-04-28 15:32:27'),
(130, '1U1_asus-rog-strix-scar-gl703vd-3.jpg', '43', '2018-04-28 15:32:27', '2018-04-28 15:32:27'),
(131, 'ILhK_asus-rog-strix-scar-gl703vd-4.jpg', '43', '2018-04-28 15:32:27', '2018-04-28 15:32:27'),
(132, 'Gty9_asus-rog-strix-hero-gl503vm-1.jpg', '44', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(133, 'jAVX_asus-rog-strix-hero-gl503vm-2.jpg', '44', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(134, '5R7J_asus-rog-strix-hero-gl503vm-3.jpg', '44', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(135, 'loO_asus-rog-strix-hero-gl503vm-4.jpg', '44', '2018-04-28 15:34:59', '2018-04-28 15:34:59'),
(136, 'u766_asus-rog-gl553vd-1.jpg', '45', '2018-04-28 15:36:55', '2018-04-28 15:36:55'),
(137, 'YHsn_asus-rog-gl553vd-2.jpg', '45', '2018-04-28 15:36:55', '2018-04-28 15:36:55'),
(138, 'EtJw_asus-rog-gl553vd-3.jpg', '45', '2018-04-28 15:36:55', '2018-04-28 15:36:55'),
(139, 'SYo2_asus-rog-gl553vd-4.jpg', '45', '2018-04-28 15:36:55', '2018-04-28 15:36:55'),
(140, 'NKY_asus-rog-strix-hero-gl703vm-1.jpg', '46', '2018-04-28 15:38:23', '2018-04-28 15:38:23'),
(141, 'iZhj_asus-rog-strix-hero-gl703vm-2.jpg', '46', '2018-04-28 15:38:23', '2018-04-28 15:38:23'),
(142, 'jBX9_asus-rog-strix-hero-gl703vm-3.jpg', '46', '2018-04-28 15:38:23', '2018-04-28 15:38:23'),
(143, 'pgZ_asus-rog-strix-hero-gl703vm-4.jpg', '46', '2018-04-28 15:38:23', '2018-04-28 15:38:23'),
(144, 'ZHjA_asus-rog-gx800vh-1.jpg', '47', '2018-04-28 15:40:17', '2018-04-28 15:40:17'),
(145, 'No9p_asus-rog-gx800vh-2.jpg', '47', '2018-04-28 15:40:17', '2018-04-28 15:40:17'),
(146, '7dZM_asus-rog-gx800vh-3.jpg', '47', '2018-04-28 15:40:17', '2018-04-28 15:40:17'),
(147, '8uh0_asus-rog-gx800vh-4.jpg', '47', '2018-04-28 15:40:17', '2018-04-28 15:40:17'),
(148, 'w2JV_asus-zenbook-ux430-1.jpg', '48', '2018-04-28 15:43:58', '2018-04-28 15:43:58'),
(149, 'iey7_asus-zenbook-ux430-2.jpg', '48', '2018-04-28 15:43:58', '2018-04-28 15:43:58'),
(150, 't5tX_asus-zenbook-ux430-3.jpg', '48', '2018-04-28 15:43:58', '2018-04-28 15:43:58'),
(151, 'gY9_asus-zenbook-ux430-4.jpg', '48', '2018-04-28 15:43:58', '2018-04-28 15:43:58'),
(152, 'XqTh_asus-zenbook-3-deluxe-ux490-1.jpg', '49', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(153, '6FLv_asus-zenbook-3-deluxe-ux490-2.jpg', '49', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(154, 'W5Qn_asus-zenbook-3-deluxe-ux490-3.jpg', '49', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(155, 'etRO_asus-zenbook-3-deluxe-ux490-4.jpg', '49', '2018-04-28 15:45:55', '2018-04-28 15:45:55'),
(156, 'OlVo_asus-vivobook-s15-1.jpg', '50', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(157, 'IKH2_asus-vivobook-s15-2.jpg', '50', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(158, '4Nxp_asus-vivobook-s15-3.jpg', '50', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(159, 'oOI3_asus-vivobook-s15-4.jpg', '50', '2018-04-28 15:48:20', '2018-04-28 15:48:20'),
(160, 'Ak4I_msi-gv62-7rd-1.jpg', '51', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(161, '16Ti_msi-gv62-7rd-2.jpg', '51', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(162, 'tNBA_msi-gv62-7rd-3.jpg', '51', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(163, 'KEjH_msi-gv62-7rd-4.jpg', '51', '2018-05-04 07:52:47', '2018-05-04 07:52:47'),
(164, 'Qxi3_msi-gv72-7rd-1.jpg', '52', '2018-05-04 07:55:57', '2018-05-04 07:55:57'),
(165, 'Fz8a_msi-gv72-7rd-2.jpg', '52', '2018-05-04 07:55:57', '2018-05-04 07:55:57'),
(166, 'G5Gt_msi-gv72-7rd-3.jpg', '52', '2018-05-04 07:55:57', '2018-05-04 07:55:57'),
(167, 'k7l0_msi-gv72-7rd-4.jpg', '52', '2018-05-04 07:55:57', '2018-05-04 07:55:57'),
(168, '4pDY_msi-gv72-7re-1.jpg', '53', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(169, 'oB1p_msi-gv72-7re-2.jpg', '53', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(170, 'X59B_msi-gv72-7re-3.jpg', '53', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(171, 'vhDa_msi-gv72-7re-4.jpg', '53', '2018-05-04 07:58:19', '2018-05-04 07:58:19'),
(172, 'fCAo_msi-gp72m-7rex-1.jpg', '54', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(173, 'qgTs_msi-gp72m-7rex-2.jpg', '54', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(174, 'k0f3_msi-gp72m-7rex-3.jpg', '54', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(175, '8jHB_msi-gp72m-7rex-4.jpg', '54', '2018-05-04 08:00:40', '2018-05-04 08:00:40'),
(176, 'OKN8_msi-gp62m-7rex-1.jpg', '55', '2018-05-04 08:04:14', '2018-05-04 08:04:14'),
(177, 'k4SG_msi-gp62m-7rex-2.jpg', '55', '2018-05-04 08:04:14', '2018-05-04 08:04:14'),
(178, 'bd1w_msi-gp62m-7rex-3.jpg', '55', '2018-05-04 08:04:14', '2018-05-04 08:04:14'),
(179, 'vDWu_msi-gp62m-7rex-4.jpg', '55', '2018-05-04 08:04:14', '2018-05-04 08:04:14'),
(180, 'PZgr_msi-ge63vr-7re-1.jpg', '56', '2018-05-04 08:05:42', '2018-05-04 08:05:42'),
(181, 'CQN4_msi-ge63vr-7re-2.jpg', '56', '2018-05-04 08:05:42', '2018-05-04 08:05:42'),
(182, '5Oa4_msi-ge63vr-7re-3.jpg', '56', '2018-05-04 08:05:42', '2018-05-04 08:05:42'),
(183, 'gTFv_msi-ge63vr-7re-4.jpg', '56', '2018-05-04 08:05:42', '2018-05-04 08:05:42'),
(184, 'oC3p_msi-ge73vr-7rf-1.jpg', '57', '2018-05-04 08:07:28', '2018-05-04 08:07:28'),
(185, '2OAO_msi-ge73vr-7rf-2.jpg', '57', '2018-05-04 08:07:28', '2018-05-04 08:07:28'),
(186, 'NI4a_msi-ge73vr-7rf-3.jpg', '57', '2018-05-04 08:07:28', '2018-05-04 08:07:28'),
(187, 'cqdG_msi-ge73vr-7rf-4.jpg', '57', '2018-05-04 08:07:28', '2018-05-04 08:07:28'),
(188, 's1yR_msi-gs63vr-7rf-1.jpg', '58', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(189, 'KMQK_msi-gs63vr-7rf-2.jpg', '58', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(190, 'tDfk_msi-gs63vr-7rf-3.jpg', '58', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(191, 'BJhf_msi-gs63vr-7rf-4.jpg', '58', '2018-05-04 08:10:10', '2018-05-04 08:10:10'),
(192, 'ben5_msi-gt83vr-7rf-titan-1.jpg', '59', '2018-05-04 08:11:42', '2018-05-04 08:11:42'),
(193, '9QBQ_msi-gt83vr-7rf-titan-2.jpg', '59', '2018-05-04 08:11:42', '2018-05-04 08:11:42'),
(194, 'FNGh_msi-gt83vr-7rf-titan-3.jpg', '59', '2018-05-04 08:11:42', '2018-05-04 08:11:42'),
(195, 'jwja_msi-gt83vr-7rf-titan-4.jpg', '59', '2018-05-04 08:11:42', '2018-05-04 08:11:42'),
(196, '5YeD_msi-gt75vr-7re-titan-1.jpg', '60', '2018-05-04 08:13:07', '2018-05-04 08:13:07'),
(197, 'MO2V_msi-gt75vr-7re-titan-2.jpg', '60', '2018-05-04 08:13:07', '2018-05-04 08:13:07'),
(198, 'VyRo_msi-gt75vr-7re-titan-3.jpg', '60', '2018-05-04 08:13:07', '2018-05-04 08:13:07'),
(199, 'VM6i_msi-gt75vr-7re-titan-4.jpg', '60', '2018-05-04 08:13:07', '2018-05-04 08:13:07'),
(200, '6oJy_acer-aspire-7-a715-1.jpg', '61', '2018-05-04 08:16:19', '2018-05-04 08:16:19'),
(201, 'a0gB_acer-aspire-7-a715-2.jpg', '61', '2018-05-04 08:16:19', '2018-05-04 08:16:19'),
(202, 'NYsK_acer-aspire-7-a715-3.jpg', '61', '2018-05-04 08:16:19', '2018-05-04 08:16:19'),
(203, 'qoCz_acer-aspire-7-a715-4.jpg', '61', '2018-05-04 08:16:19', '2018-05-04 08:16:19'),
(204, 'yIL7_acer-nitro-5-an515-1.jpg', '62', '2018-05-04 08:19:14', '2018-05-04 08:19:14'),
(205, 'jvg_acer-nitro-5-an515-2.jpg', '62', '2018-05-04 08:19:14', '2018-05-04 08:19:14'),
(206, 'bxH1_acer-nitro-5-an515-3.jpg', '62', '2018-05-04 08:19:14', '2018-05-04 08:19:14'),
(207, 'HCiF_acer-nitro-5-an515-4.jpg', '62', '2018-05-04 08:19:14', '2018-05-04 08:19:14'),
(208, 'etZ_acer-spin-5-sp513-1.jpg', '63', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(209, 'lV9F_acer-spin-5-sp513-2.jpg', '63', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(210, 'unBu_acer-spin-5-sp513-3.jpg', '63', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(211, 'F432_acer-spin-5-sp513-4.jpg', '63', '2018-05-04 08:20:58', '2018-05-04 08:20:58'),
(212, 'WlLI_acer-vx5-591g-1.jpg', '64', '2018-05-04 08:22:40', '2018-05-04 08:22:40'),
(213, 'IiDq_acer-vx5-591g-2.jpg', '64', '2018-05-04 08:22:40', '2018-05-04 08:22:40'),
(214, 'abm3_acer-vx5-591g-3.jpg', '64', '2018-05-04 08:22:40', '2018-05-04 08:22:40'),
(215, 'zHHG_acer-vx5-591g-4.jpg', '64', '2018-05-04 08:22:40', '2018-05-04 08:22:40'),
(216, '92Iq_lenovo-thinkpad-e560-1.jpg', '65', '2018-05-04 08:24:24', '2018-05-04 08:24:24'),
(217, 'Wr8a_lenovo-thinkpad-e560-2.jpg', '65', '2018-05-04 08:24:24', '2018-05-04 08:24:24'),
(218, '8WkP_lenovo-thinkpad-e560-3.jpg', '65', '2018-05-04 08:24:24', '2018-05-04 08:24:24'),
(219, '4jb5_lenovo-thinkpad-e560-4.jpg', '65', '2018-05-04 08:24:24', '2018-05-04 08:24:24'),
(220, '2Anb_macbook-pro-2017-1.jpg', '66', '2018-05-04 08:29:49', '2018-05-04 08:29:49'),
(221, 'TOFx_macbook-pro-2017-2.jpg', '66', '2018-05-04 08:29:49', '2018-05-04 08:29:49'),
(222, 'bYQu_macbook-pro-2017-3.jpg', '66', '2018-05-04 08:29:49', '2018-05-04 08:29:49'),
(223, 'RILj_macbook-pro-2017-4.jpg', '66', '2018-05-04 08:29:49', '2018-05-04 08:29:49'),
(224, 'jLkp_macbook-air-2017-1.jpg', '67', '2018-05-04 08:36:20', '2018-05-04 08:36:20'),
(225, '06dM_macbook-air-2017-2.jpg', '67', '2018-05-04 08:36:20', '2018-05-04 08:36:20'),
(226, 'wK24_macbook-air-2017-3.jpg', '67', '2018-05-04 08:36:20', '2018-05-04 08:36:20'),
(227, 'Wpw3_macbook-air-2017-4.jpg', '67', '2018-05-04 08:36:20', '2018-05-04 08:36:20'),
(240, '2AU0_Asus_TUF_Gaming_FX504.png', '71', '2018-05-20 15:11:27', '2018-05-20 15:11:27'),
(241, 'KPlN_Asus_TUF_Gaming_FX504-1.png', '71', '2018-05-20 15:11:27', '2018-05-20 15:11:27'),
(242, '8OvR_Asus_TUF_Gaming_FX504-3.png', '71', '2018-05-20 15:11:27', '2018-05-20 15:11:27'),
(243, 'pr5N_Asus_TUF_Gaming_FX504-4.png', '71', '2018-05-20 15:11:27', '2018-05-20 15:11:27'),
(272, 'NnYi_Asus_Zenbook_13_UX333-Blue1.jpg', '79', '2019-03-18 10:00:19', '2019-03-18 10:00:19'),
(273, '5XY7_Asus_Zenbook_13_UX333-Blue-11.jpg', '79', '2019-03-18 10:00:19', '2019-03-18 10:00:19'),
(274, 'jY9E_Asus_Zenbook_13_UX333-Blue-21.jpg', '79', '2019-03-18 10:00:19', '2019-03-18 10:00:19'),
(275, 'smcV_Asus_Zenbook_13_UX333-Blue-51.jpg', '79', '2019-03-18 10:00:19', '2019-03-18 10:00:19'),
(276, 'uEMd_Asus_Zenbook_13_UX333-Blue1.jpg', '80', '2019-03-18 10:10:44', '2019-03-18 10:10:44'),
(277, 'LDrd_Asus_Zenbook_13_UX333-Blue-11.jpg', '80', '2019-03-18 10:10:44', '2019-03-18 10:10:44'),
(278, 'm8D9_Asus_Zenbook_13_UX333-Blue-21.jpg', '80', '2019-03-18 10:10:44', '2019-03-18 10:10:44'),
(279, 'k26E_Asus_Zenbook_13_UX333-Blue-51.jpg', '80', '2019-03-18 10:10:44', '2019-03-18 10:10:44'),
(280, 'joZF_Asus_Zenbook_13_UX333-Blue1.jpg', '81', '2019-03-18 10:13:38', '2019-03-18 10:13:38'),
(281, '41dO_Asus_Zenbook_13_UX333-Blue-11.jpg', '81', '2019-03-18 10:13:38', '2019-03-18 10:13:38'),
(282, 'toLS_Asus_Zenbook_13_UX333-Blue-21.jpg', '81', '2019-03-18 10:13:38', '2019-03-18 10:13:38'),
(283, 'K4Kp_Asus_Zenbook_13_UX333-Blue-51.jpg', '81', '2019-03-18 10:13:38', '2019-03-18 10:13:38'),
(284, 'ULoK_Asus_Zenbook_13_UX333-Blue1.jpg', '82', '2019-03-18 10:15:04', '2019-03-18 10:15:04'),
(285, 'u5n_Asus_Zenbook_13_UX333-Blue-11.jpg', '82', '2019-03-18 10:15:04', '2019-03-18 10:15:04'),
(286, 'UKDn_Asus_Zenbook_13_UX333-Blue-21.jpg', '82', '2019-03-18 10:15:04', '2019-03-18 10:15:04'),
(287, 'TNsY_Asus_Zenbook_13_UX333-Blue-51.jpg', '82', '2019-03-18 10:15:05', '2019-03-18 10:15:05'),
(288, 'NfAN_Asus_Zenbook_13_UX333-Blue1.jpg', '83', '2019-03-18 10:16:14', '2019-03-18 10:16:14'),
(289, 'fsF3_Asus_Zenbook_13_UX333-Blue-11.jpg', '83', '2019-03-18 10:16:14', '2019-03-18 10:16:14'),
(290, 'P49V_Asus_Zenbook_13_UX333-Blue-21.jpg', '83', '2019-03-18 10:16:14', '2019-03-18 10:16:14'),
(291, '2iT8_Asus_Zenbook_13_UX333-Blue-51.jpg', '83', '2019-03-18 10:16:14', '2019-03-18 10:16:14'),
(292, 'TrVX_Asus_Zenbook_13_UX333-Blue1.jpg', '84', '2019-03-18 10:18:05', '2019-03-18 10:18:05'),
(293, 'Fx2i_Asus_Zenbook_13_UX333-Blue-11.jpg', '84', '2019-03-18 10:18:05', '2019-03-18 10:18:05'),
(294, 'Wfq_Asus_Zenbook_13_UX333-Blue-21.jpg', '84', '2019-03-18 10:18:05', '2019-03-18 10:18:05'),
(295, '5brI_Asus_Zenbook_13_UX333-Blue-51.jpg', '84', '2019-03-18 10:18:05', '2019-03-18 10:18:05'),
(296, 'qgjF_Asus_Zenbook_13_UX333-Blue1.jpg', '85', '2019-03-18 10:19:17', '2019-03-18 10:19:17'),
(297, 'GjNT_Asus_Zenbook_13_UX333-Blue-11.jpg', '85', '2019-03-18 10:19:17', '2019-03-18 10:19:17'),
(298, 'VLCw_Asus_Zenbook_13_UX333-Blue-21.jpg', '85', '2019-03-18 10:19:17', '2019-03-18 10:19:17'),
(299, 'ZVVq_Asus_Zenbook_13_UX333-Blue-51.jpg', '85', '2019-03-18 10:19:17', '2019-03-18 10:19:17'),
(300, 'p1E0_Asus_Zenbook_13_UX333-Blue1.jpg', '86', '2019-03-18 10:20:15', '2019-03-18 10:20:15'),
(301, 'Li0p_Asus_Zenbook_13_UX333-Blue-11.jpg', '86', '2019-03-18 10:20:15', '2019-03-18 10:20:15'),
(302, 'uFsl_Asus_Zenbook_13_UX333-Blue-21.jpg', '86', '2019-03-18 10:20:15', '2019-03-18 10:20:15'),
(303, 'whTS_Asus_Zenbook_13_UX333-Blue-51.jpg', '86', '2019-03-18 10:20:15', '2019-03-18 10:20:15'),
(304, 'FqzZ_Asus_Zenbook_13_UX333-Blue1.jpg', '87', '2019-03-18 10:23:23', '2019-03-18 10:23:23'),
(305, 'SEsR_Asus_Zenbook_13_UX333-Blue-11.jpg', '87', '2019-03-18 10:23:23', '2019-03-18 10:23:23'),
(306, '54qU_Asus_Zenbook_13_UX333-Blue-21.jpg', '87', '2019-03-18 10:23:23', '2019-03-18 10:23:23'),
(307, 'GhJk_Asus_Zenbook_13_UX333-Blue-51.jpg', '87', '2019-03-18 10:23:23', '2019-03-18 10:23:23'),
(308, 'BojY_Asus_Zenbook_13_UX333-Blue1.jpg', '88', '2019-03-18 10:24:12', '2019-03-18 10:24:12'),
(309, 'x69D_Asus_Zenbook_13_UX333-Blue-11.jpg', '88', '2019-03-18 10:24:12', '2019-03-18 10:24:12'),
(310, 'ihcn_Asus_Zenbook_13_UX333-Blue-21.jpg', '88', '2019-03-18 10:24:12', '2019-03-18 10:24:12'),
(311, 'ZfXa_Asus_Zenbook_13_UX333-Blue-51.jpg', '88', '2019-03-18 10:24:12', '2019-03-18 10:24:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_range` int(11) NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT '0.00',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `id_range`, `rating`, `active`, `created_at`, `updated_at`) VALUES
(13, 'Dell Inspiron 7567', 'dell-inspiron-7567', 1, '4.06', 1, '2018-04-21 07:22:24', '2018-05-14 04:19:01'),
(14, 'Dell Inspiron 5567', 'dell-inspiron-5567', 1, '4.81', 1, '2018-04-27 03:32:21', '2018-05-06 05:40:00'),
(15, 'Dell Inspiron 5570', 'dell-inspiron-5570', 1, '3.56', 1, '2018-04-27 05:02:07', '2018-05-06 05:40:00'),
(16, 'Dell Inspiron 7373', 'dell-inspiron-7373', 1, '4.36', 1, '2018-04-27 05:22:20', '2018-05-06 05:40:00'),
(17, 'Dell Inspiron 7577', 'dell-inspiron-7577', 1, '4.12', 1, '2018-04-27 05:25:41', '2018-05-06 05:40:00'),
(18, 'Dell Inspiron 5468', 'dell-inspiron-5468', 1, '4.51', 1, '2018-04-27 05:33:49', '2018-05-06 05:40:00'),
(19, 'Dell Vostro 7570', 'dell-vostro-7570', 2, '3.18', 1, '2018-04-27 05:37:29', '2018-05-06 05:40:00'),
(20, 'Dell Vostro 3568', 'dell-vostro-3568', 2, '3.39', 1, '2018-04-27 05:40:54', '2018-05-06 05:40:00'),
(21, 'Dell Vostro 5468', 'dell-vostro-5468', 2, '4.40', 1, '2018-04-27 05:46:17', '2018-05-06 05:40:00'),
(22, 'Dell Vostro 5471', 'dell-vostro-5471', 2, '4.82', 1, '2018-04-27 05:55:33', '2018-05-06 05:40:00'),
(23, 'Dell Vostro 3468', 'dell-vostro-3468', 2, '3.90', 1, '2018-04-28 14:32:59', '2018-05-06 05:40:00'),
(24, 'Dell Lattitude 7280', 'dell-lattitude-7280', 3, '4.06', 1, '2018-04-28 14:36:00', '2018-05-06 05:40:00'),
(25, 'Dell Lattitude E5470', 'dell-lattitude-e5470', 3, '3.58', 1, '2018-04-28 14:38:17', '2018-05-13 00:46:01'),
(26, 'Dell XPS 13 9360', 'dell-xps-13-9360', 4, '4.73', 1, '2018-04-28 14:41:37', '2018-05-06 05:40:00'),
(27, 'Dell XPS 15 9560', 'dell-xps-15-9560', 4, '3.89', 1, '2018-04-28 14:44:34', '2018-05-06 05:40:00'),
(28, 'Dell Alienware 17 R4', 'dell-alienware-17-r4', 5, '4.29', 1, '2018-04-28 14:46:54', '2018-05-06 05:40:00'),
(29, 'Hp Spectre 13', 'hp-spectre-13', 6, '4.77', 1, '2018-04-28 14:49:29', '2018-05-06 05:40:00'),
(30, 'Hp Elitebook x360 G2', 'hp-elitebook-x360-g2', 7, '3.99', 1, '2018-04-28 14:52:18', '2018-05-06 05:40:00'),
(31, 'Hp Elitebook 1040 G3', 'hp-elitebook-1040-g3', 7, '4.65', 1, '2018-04-28 14:54:28', '2018-05-06 05:40:00'),
(32, 'Hp Envy 13', 'hp-envy-13', 8, '4.26', 1, '2018-04-28 14:56:57', '2018-05-06 05:40:00'),
(33, 'Hp Envy 15', 'hp-envy-15', 8, '4.37', 1, '2018-04-28 15:01:36', '2018-05-06 05:40:00'),
(35, 'Hp Probook 450 G4', 'hp-probook-450-g4', 9, '4.08', 1, '2018-04-28 15:13:40', '2018-05-06 05:40:00'),
(36, 'Hp Probook 450 G3', 'hp-probook-450-g3', 9, '4.27', 1, '2018-04-28 15:15:55', '2018-05-06 05:40:00'),
(38, 'Hp Probook 440 G3', 'hp-probook-440-g3', 9, '4.11', 1, '2018-04-28 15:19:17', '2018-05-06 05:40:00'),
(39, 'Hp Probook 440 G4', 'hp-probook-440-g4', 9, '4.74', 1, '2018-04-28 15:21:58', '2018-05-06 05:40:00'),
(40, 'Hp Probook 430 G3', 'hp-probook-430-g3', 9, '4.38', 1, '2018-04-28 15:23:41', '2018-05-06 05:40:00'),
(41, 'Asus FX503VD', 'asus-fx503vd', 10, '4.66', 1, '2018-04-28 15:26:49', '2018-05-06 05:40:00'),
(42, 'Asus ROG Strix Hero GL503VD', 'asus-rog-strix-hero-gl503vd', 10, '3.18', 1, '2018-04-28 15:29:45', '2018-05-06 05:40:00'),
(43, 'Asus ROG Strix Scar GL703VD', 'asus-rog-strix-scar-gl703vd', 10, '4.91', 1, '2018-04-28 15:32:17', '2018-05-06 05:40:00'),
(44, 'Asus ROG Strix Hero GL503VM', 'asus-rog-strix-hero-gl503vm', 10, '4.02', 1, '2018-04-28 15:34:52', '2018-05-06 05:40:00'),
(45, 'Asus ROG GL553VD', 'asus-rog-gl553vd', 10, '4.35', 1, '2018-04-28 15:36:49', '2018-05-06 05:40:00'),
(46, 'Asus ROG Strix Hero GL703VM', 'asus-rog-strix-hero-gl703vm', 10, '4.68', 1, '2018-04-28 15:38:21', '2018-05-06 05:40:00'),
(47, 'Asus ROG GX800VH', 'asus-rog-gx800vh', 10, '3.38', 1, '2018-04-28 15:40:12', '2018-05-06 05:40:00'),
(48, 'Asus Zenbook UX430', 'asus-zenbook-ux430', 11, '3.84', 1, '2018-04-28 15:43:37', '2018-05-06 05:40:00'),
(49, 'Asus Zenbook 3 Deluxe UX490', 'asus-zenbook-3-deluxe-ux490', 11, '4.05', 1, '2018-04-28 15:45:53', '2018-05-06 05:40:00'),
(50, 'Asus Vivobook S15', 'asus-vivobook-s15', 12, '3.74', 1, '2018-04-28 15:48:17', '2018-05-06 05:40:00'),
(51, 'Msi GV62 7RD', 'msi-gv62-7rd', 14, '3.55', 1, '2018-05-04 07:52:44', '2018-05-06 05:40:00'),
(52, 'Msi GV72 7RD', 'msi-gv72-7rd', 14, '3.55', 1, '2018-05-04 07:55:54', '2018-05-06 05:40:00'),
(53, 'Msi GV72 7RE', 'msi-gv72-7re', 14, '4.07', 1, '2018-05-04 07:58:16', '2018-05-06 05:40:00'),
(54, 'Msi GP72M 7REX', 'msi-gp72m-7rex', 15, '4.71', 1, '2018-05-04 08:00:36', '2018-05-06 05:40:00'),
(55, 'Msi GP62M 7REX', 'msi-gp62m-7rex', 15, '4.33', 1, '2018-05-04 08:03:50', '2018-05-06 05:40:00'),
(56, 'Msi GE63VR 7RE', 'msi-ge63vr-7re', 16, '4.52', 1, '2018-05-04 08:05:40', '2018-05-06 05:40:00'),
(57, 'Msi GE73VR 7RF', 'msi-ge73vr-7rf', 16, '4.60', 1, '2018-05-04 08:07:26', '2018-05-06 05:40:00'),
(58, 'Msi GS63VR 7RF', 'msi-gs63vr-7rf', 17, '4.45', 1, '2018-05-04 08:10:09', '2018-05-06 05:40:00'),
(59, 'Msi GT83VR 7RF Titan', 'msi-gt83vr-7rf-titan', 18, '3.45', 1, '2018-05-04 08:11:39', '2018-05-06 05:40:00'),
(60, 'Msi GT75VR 7RE Titan', 'msi-gt75vr-7re-titan', 18, '4.88', 1, '2018-05-04 08:13:07', '2018-05-06 05:40:00'),
(61, 'Acer Aspire 7 A715', 'acer-aspire-7-a715', 19, '3.07', 1, '2018-05-04 08:16:16', '2018-05-06 05:40:00'),
(62, 'Acer Nitro 5 AN515', 'acer-nitro-5-an515', 20, '3.70', 1, '2018-05-04 08:19:06', '2018-05-06 05:40:00'),
(63, 'Acer Spin 5 SP513', 'acer-spin-5-sp513', 21, '4.27', 1, '2018-05-04 08:20:55', '2018-05-06 05:40:00'),
(64, 'Acer VX5 591G', 'acer-vx5-591g', 22, '3.28', 1, '2018-05-04 08:22:36', '2018-05-06 05:40:00'),
(65, 'Lenovo Thinkpad E560', 'lenovo-thinkpad-e560', 23, '4.60', 1, '2018-05-04 08:24:18', '2018-05-06 05:40:00'),
(66, 'Macbook Pro 2017', 'macbook-pro-2017', 24, '4.15', 1, '2018-05-04 08:29:47', '2018-05-06 05:40:00'),
(67, 'Macbook Air 2017', 'macbook-air-2017', 25, '3.94', 1, '2018-05-04 08:36:19', '2018-05-06 05:40:00'),
(71, 'Asus TUF FX504', 'asus-tuf-fx504', 10, '0.00', 1, '2018-05-20 15:11:24', '2018-05-20 15:11:24'),
(88, 'Asus Zenbook 13 UX333FA', 'asus-zenbook-13-ux333fa', 11, '0.00', 1, '2019-03-18 10:24:12', '2019-03-18 10:24:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_range`
--

CREATE TABLE `product_range` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_range`
--

INSERT INTO `product_range` (`id`, `name`, `slug`, `id_category`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Dell Inspiron', 'dell-inspiron', 1, 1, '2018-02-24 05:09:22', '2018-04-17 02:58:51'),
(2, 'Dell Vostro', 'dell-vostro', 1, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(3, 'Dell Lattitude', 'dell-lattitude', 1, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(4, 'Dell XPS', 'dell-xps', 1, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(5, 'Dell Alienware', 'dell-alienware', 1, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(6, 'Hp Spectre', 'hp-spectre', 2, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(7, 'Hp Elitebook', 'hp-elitebook', 2, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(8, 'Hp Envy', 'hp-envy', 2, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(9, 'Hp Probook', 'hp-probook', 2, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(10, 'Republic Of Gamers', 'republic-of-gamers', 3, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(11, 'Asus Zenbook', 'asus-zenbook', 3, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(12, 'Asus Vivobook', 'asus-vivobook', 3, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(13, 'GL Gaming', 'gl-gaming', 4, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(14, 'GV Gaming', 'gv-gaming', 4, 1, '2018-02-24 05:09:22', '2018-02-24 05:09:22'),
(15, 'GP Gaming', 'gp-gaming', 4, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(16, 'GE Gaming', 'ge-gaming', 4, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(17, 'GS Gaming', 'gs-gaming', 4, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(18, 'GT Gaming', 'gt-gaming', 4, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(19, 'Acer Asprie', 'acer-asprie', 5, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(20, 'Acer Nitro', 'acer-nitro', 5, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(21, 'Acer Spin', 'acer-spin', 5, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(22, 'Acer Asprie V Nitro', 'acer-asprie-v-nitro', 5, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(23, 'Lenovo Thinkpad', 'lenovo-thinkpad', 6, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(24, 'Macbook Pro', 'macbook-pro', 7, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23'),
(25, 'Macbook Air', 'macbook-air', 7, 1, '2018-02-24 05:09:23', '2018-02-24 05:09:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name_pattern` text NOT NULL,
  `price_pattern` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `provider`
--

INSERT INTO `provider` (`id`, `name`, `slug`, `link`, `image`, `name_pattern`, `price_pattern`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Laptopnew', 'laptopnew', 'https://laptopnew.vn/', 'OhSi_laptopnew.png', '#<h1 class=\"title\" itemprop=\"name\">(.*?)</h1>#', '#<span id=\"product_price\" itemprop=\"price\">(.*?)<i class=\"sy\">đ</i> </span>#', 1, '2018-04-16 10:17:46', '2019-03-18 09:16:06'),
(2, 'Laptopno1', 'laptopno1', 'http://laptopno1.com/', 'BvWW_laptopno1.png', '#<h1 itemprop=\"name\" class=\"product-name\">\r\n    <a href=\".*?\" onclick=\"return false;\" title=\".*?\" itemprop=\"url\">\r\n        (.*?)\r\n    </a>\r\n</h1>#', '#<div class=\"price\" itemprop=\"price\">(.*?)</div>#', 1, '2018-04-16 10:20:25', '2018-04-23 02:40:37'),
(3, 'Hangchinhhieu', 'hangchinhhieu', 'https://hangchinhhieu.vn/', 'wbha_hangchinhhieuvn.jpg', '#<h1 class=\"title pdTitle\">(.*?)</h1>#', '#<span id=\"pdPriceNumber\">(.*?)₫</span>#', 1, '2018-04-16 10:21:42', '2019-03-18 10:01:27'),
(4, 'Phong Vũ', 'phong-vu', 'https://phongvu.vn/', '13Eu_phongvu.png', '#<h1 class=\"detail-product-name\">(.*?)</h1>#', '#<div class=\"detail-product-final-price\">(.*?) ₫</div>#', 1, '2018-04-16 10:23:12', '2018-04-23 02:42:15'),
(5, 'Thế giới di động', 'the-gioi-di-dong', 'https://www.thegioididong.com/', 'V9el_thegioididong.png', '#<h1>(.*?)</h1>#', '#<div class=\"area_price\">\r\n                <strong>(.*?)₫</strong>#', 1, '2018-04-16 10:25:11', '2018-04-23 06:15:06'),
(6, 'Fpt Shop', 'fpt-shop', 'https://fptshop.com.vn/', 'Sgu8_fptshop.png', '#<h1 class=\"fs-dttname\">(.*?) <span class=\"nosku\">.*?</span></h1>#', '#<p class=\"fs-dtprice \">\r\n(.*?) <strong>₫</strong>#', 1, '2018-04-16 10:26:02', '2018-04-27 04:27:33'),
(7, 'An Khang', 'an-khang', 'http://www.ankhang.vn/', 'VkYk_an-khang.jpg', '#<h1 class=\"text-700\" style=\"font-weight:700\">(.*?)</h1>#', '#<span class=\"pro-price\">(.*?) VNĐ</span>#', 1, '2018-04-27 04:42:48', '2018-04-27 04:42:48'),
(8, 'Nguyễn Kim', 'nguyen-kim', 'https://www.nguyenkim.com/', 'mVE2_nguyen_kim.jpg', '#<h1 class=\"product_info_name\">(.*?)</h1>#', '#<div class=\"product_info_price_value-final\">(.*?)đ</div>#', 1, '2018-04-27 04:50:05', '2018-04-27 04:50:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_product`
--

CREATE TABLE `review_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT '0.00',
  `id_product` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `review_product`
--

INSERT INTO `review_product` (`id`, `name`, `email`, `content`, `rating`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(2, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(3, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(4, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(5, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(6, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(7, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 02:46:37', '2018-05-14 03:23:27'),
(8, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.83', 13, '2018-05-14 04:16:53', '2018-05-14 04:17:22'),
(9, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5.00', 13, '2018-05-14 04:18:07', '2018-05-14 04:18:07'),
(10, 'Trần Công Luận', 'luantc13@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5.00', 13, '2018-05-14 04:19:01', '2018-05-14 04:19:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, '', 'banner00.jpg', 1, '2018-02-24 05:09:22', '2018-04-16 01:51:11'),
(2, '', 'banner01.jpg', 1, '2018-02-24 05:09:22', '2018-04-16 01:44:15'),
(3, '', 'banner02.jpg', 1, '2018-02-24 05:09:22', '2018-04-16 01:44:15'),
(4, '', 'banner03.jpg', 1, '2018-02-24 05:09:22', '2018-04-16 01:44:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comparetive_link`
--
ALTER TABLE `comparetive_link`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_range`
--
ALTER TABLE `product_range`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review_product`
--
ALTER TABLE `review_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comparetive_link`
--
ALTER TABLE `comparetive_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `product_range`
--
ALTER TABLE `product_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `review_product`
--
ALTER TABLE `review_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
