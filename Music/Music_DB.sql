-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2022 lúc 04:37 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Pop'),
(2, 'Rock'),
(3, 'Hip Hop'),
(4, 'Country'),
(5, 'Funk');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nationals`
--

CREATE TABLE `nationals` (
  `id` int(11) NOT NULL,
  `national` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nationals`
--

INSERT INTO `nationals` (`id`, `national`) VALUES
(1, 'VietNam'),
(2, 'US'),
(3, 'UK'),
(4, 'Japan'),
(5, 'China'),
(6, 'Korea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` text NOT NULL,
  `genre_id` int(11) NOT NULL,
  `national_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `date_uploaded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `genre_id`, `national_id`, `image`, `user`, `date_uploaded`) VALUES
(1, 'Tại Vì Sao', 'MCK', 3, 1, 'Tại vì sao.png', 'darkmikuss1', '2022-12-05 01:18:09'),
(2, 'Yoru ni Kakeru', 'YOASOBI', 1, 4, 'Yoru ni Kakeru.png', 'admin1', '2022-12-05 02:11:45'),
(3, 'Sorry Sorry', 'SUPER JUNIOR', 1, 6, 'Sorry Sorry.png', 'admin1', '2022-12-05 02:14:19'),
(4, 'Waiting For You', 'MONO, Onionn', 1, 1, 'Waiting for you.png', 'admin1', '2022-12-05 02:15:35'),
(5, 'Đáp Án Cuối Cùng', 'Quân A.P', 1, 1, 'Đáp án cuối cùng.png', 'darkmikuss1', '2022-12-05 03:05:50'),
(6, 'Blank Space', 'Taylor Swift', 1, 2, 'Blank Space.png', 'admin1', '2022-12-05 11:32:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nationals`
--
ALTER TABLE `nationals`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `national_id` (`national_id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nationals`
--
ALTER TABLE `nationals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`national_id`) REFERENCES `nationals` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
