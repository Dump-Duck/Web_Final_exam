-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2023 lúc 07:53 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mangadb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_types`
--

CREATE TABLE `account_types` (
  `id` int(1) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_types`
--

INSERT INTO `account_types` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'normal member'),
(3, 'upload member');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Drama'),
(2, 'Romance'),
(3, 'Action'),
(4, 'Comedy'),
(5, 'Adventure'),
(6, 'Fantasy'),
(7, 'Isekai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chaps`
--

CREATE TABLE `chaps` (
  `id` int(10) NOT NULL,
  `chap_id` int(10) NOT NULL,
  `chap_content` text DEFAULT NULL,
  `name_id` int(10) NOT NULL,
  `img_content` longblob DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contents`
--

CREATE TABLE `contents` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `create_date` date NOT NULL,
  `category` varchar(250) NOT NULL,
  `upload_by` varchar(50) NOT NULL,
  `type_content` int(10) NOT NULL,
  `cover_img` blob DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contents`
--

INSERT INTO `contents` (`id`, `name`, `description`, `create_date`, `category`, `upload_by`, `type_content`, `cover_img`, `update_date`) VALUES
(1, 'One Piece', 'As a child, Monkey D. Luffy was inspired to become a pirate by listening to the tales of the buccaneer \"Red-Haired\" Shanks. But his life changed when Luffy accidentally ate the Gum-Gum Devil Fruit and gained the power to stretch like rubber...at the cost of never being able to swim again! Years later, still vowing to become the king of the pirates, Luffy sets out on his adventure...one guy alone in a rowboat, in search of the legendary \"One Piece,\" said to be the greatest treasure in the world... ', '2022-12-15', 'Action Comedy Adventure Fantasy ', 'dump_duck', 1, 0x6f6e652d70696563652d3130393432332e6a7067, '2022-12-15 11:28:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saves_comic`
--

CREATE TABLE `saves_comic` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `save_content` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_contents`
--

CREATE TABLE `type_contents` (
  `id` int(10) NOT NULL,
  `type_of_content` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_contents`
--

INSERT INTO `type_contents` (`id`, `type_of_content`) VALUES
(1, 'Manga'),
(2, 'Light Novel'),
(3, 'Composed');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_name`, `password`, `account_type`) VALUES
('admin1', 'Hoainam2003', 1),
('dump_duck', '12', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chaps`
--
ALTER TABLE `chaps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `update_time` (`update_time`),
  ADD KEY `name_id` (`name_id`);

--
-- Chỉ mục cho bảng `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_content` (`type_content`),
  ADD KEY `upload_by` (`upload_by`);

--
-- Chỉ mục cho bảng `saves_comic`
--
ALTER TABLE `saves_comic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `save_content` (`save_content`);

--
-- Chỉ mục cho bảng `type_contents`
--
ALTER TABLE `type_contents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `account_type` (`account_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chaps`
--
ALTER TABLE `chaps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `saves_comic`
--
ALTER TABLE `saves_comic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `type_contents`
--
ALTER TABLE `type_contents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chaps`
--
ALTER TABLE `chaps`
  ADD CONSTRAINT `chaps_ibfk_1` FOREIGN KEY (`name_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`type_content`) REFERENCES `type_contents` (`id`),
  ADD CONSTRAINT `contents_ibfk_2` FOREIGN KEY (`upload_by`) REFERENCES `users` (`user_name`);

--
-- Các ràng buộc cho bảng `saves_comic`
--
ALTER TABLE `saves_comic`
  ADD CONSTRAINT `saves_comic_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`),
  ADD CONSTRAINT `saves_comic_ibfk_2` FOREIGN KEY (`save_content`) REFERENCES `contents` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`account_type`) REFERENCES `account_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
