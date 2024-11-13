-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2024 lúc 03:30 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1_n2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_variant` int(5) NOT NULL,
  `amount_buy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `id_user`, `id_variant`, `amount_buy`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `img_url_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `img_url_category`) VALUES
(1, 'category_1', 'img/zzzzz'),
(2, 'category_2', 'img/xxxxxxxxxx'),
(5, 'yyyyy', 'uploads/2109_2050_8s.jpg'),
(6, 'ooo9', 'uploads/lenovo-ideapad-slim-3-15amn8-r5-82xq00j0vn-thumb-600x600.jpg'),
(7, 'uuuuull', 'uploads/acer-aspire-3-a314-42p-r3b3-r7-nxksfsv001-thumb-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(5) NOT NULL,
  `name_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name_color`) VALUES
(1, 'xanh'),
(2, 'đỏ'),
(3, 'bạc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `content_comment` text NOT NULL,
  `id_variant` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `pay` enum('Ship COD','Banking','Credit/Card') NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` enum('Chờ xác nhận','Đã xác nhận','Đang giao hàng','Đơn hàng đã được giao') NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_address` varchar(5555) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `pay`, `total_price`, `status`, `user_name`, `user_address`, `user_phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ship COD', 0, 'Chờ xác nhận', '', '', 0, '2024-11-08 00:00:00', '2024-11-08 09:48:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(5) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_variant` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `variant_name` varchar(200) NOT NULL,
  `variant_img` varchar(200) NOT NULL,
  `variant_price_sale` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_variant`, `quantity`, `price`, `variant_name`, `variant_img`, `variant_price_sale`) VALUES
(1, 1, 2, 2, 10000, '', '', 0),
(2, 1, 3, 4, 999999, '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name_products` varchar(255) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `amount` int(5) NOT NULL,
  `price` int(9) NOT NULL DEFAULT 0,
  `id_category` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_products`, `img_url`, `description`, `amount`, `price`, `id_category`) VALUES
(1, 'product_1', 'uploads/4410b95393b8e2be4065f181932cf3b9.png', 'hihihi', 5, 88888, 1),
(2, 'product_1', 'jpg/', 'jjjjjjjj', 999, 2000000, 2),
(3, 'sp111ewew', 'uploads/5e8e0225b7f45864fb8c4dbf7b151533.png', 'sp1111111111111', 2, 3333, 2),
(5, 'sp1118888', 'uploads/lenovo-ideapad-slim-3-15iah8-i5-83er00evn-thumb-600x600.jpg', 'rrrrrrrrr', 32, 434, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(5) NOT NULL,
  `name_size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name_size`) VALUES
(1, '13.5 inch'),
(2, '15 inch'),
(3, '17 inch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `address` varchar(200) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `user_img` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `address`, `phone_number`, `user_img`, `email`, `pass`) VALUES
(1, 'Vy Minh Ky', 'user', 'Gia Lâm, Hà Nội', 0, '', 'feeder20gg@gmail.com', '12345'),
(2, 'user_2', 'user', 'zzzzz', 123456789, 'img/url', 'z@gmail.com', '1'),
(3, 'user_3', 'user', 'zzz', 123213, 'img', 'd@ddd', '123'),
(4, 'user_3', 'user', 'zzz', 123213, 'img', 'd@ddd', '123'),
(5, '.', 'user', '234234', 43423, 'img', 'a@gmail.com', '131'),
(13, 'm', 'user', 'yuu', 213213, 'img', 'kyvmph44180@fpt.edu.vn', '123'),
(14, 'mwwww', 'user', '121', 1212, 'img', 'kyvmph44180@fpt.edu.vn', '111'),
(15, 'm132', 'user', 'Hn', 434324, 'img', 'kyvmph44180@fpt.edu.vn', '323232'),
(16, 'm', 'user', 'dewdwe', 9999, 'img', 'a@gmail.com', '666666');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` int(5) NOT NULL,
  `id_products` int(5) NOT NULL,
  `id_color` int(5) NOT NULL,
  `id_size` int(5) NOT NULL,
  `price_variant` int(9) NOT NULL,
  `amount_variant` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `id_products`, `id_color`, `id_size`, `price_variant`, `amount_variant`) VALUES
(1, 3, 3, 2, 10000, 999),
(2, 1, 1, 3, 29000, 5),
(3, 2, 3, 3, 99000, 9),
(4, 3, 2, 2, 99999, 8);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carts_users` (`id_user`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_id_user` (`id_user`),
  ADD KEY `fk_comments_variants` (`id_variant`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users` (`id_user`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_order_detail` (`id_order`),
  ADD KEY `fk_orders_variants` (`id_variant`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`id_category`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_variants_color` (`id_color`),
  ADD KEY `fk_variants_sizes` (`id_size`),
  ADD KEY `fk_variants_products` (`id_products`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_comments_variants` FOREIGN KEY (`id_variant`) REFERENCES `variants` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orders_order_detail` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orders_variants` FOREIGN KEY (`id_variant`) REFERENCES `variants` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `fk_variants_color` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_variants_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_variants_sizes` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
