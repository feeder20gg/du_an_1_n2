-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2024 lúc 01:06 PM
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
(21, 22, 19, 1),
(25, 21, 12, 3),
(27, 1, 17, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `description_category` varchar(300) NOT NULL,
  `img_url_category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `description_category`, `img_url_category`) VALUES
(1, 'Laptop Gaming', 'Mời bạn xem các sản phẩm laptop gaming mạnh mẽ nhất!', 'category_3.jpg'),
(2, 'Laptop Văn Phòng', 'Các mẫu laptop lý tưởng hiệu năng ổn định cho công việc văn phòng . ', 'category_1.jpg'),
(5, 'Laptop Cao Cấp', 'Laptop thiết kế sang trọng, mỏng nhẹ, cấu hình ngon.', 'category_2.jpg'),
(8, 'zzzzzzzzzzz', '222', 'Screenshot 2024-05-22 000005.png');

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
-- Cấu trúc bảng cho bảng `cpu`
--

CREATE TABLE `cpu` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cpu`
--

INSERT INTO `cpu` (`id`, `name`) VALUES
(1, 'Core i3'),
(2, 'Core i5'),
(3, 'Core i7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `pay` enum('Ship COD','Banking','Credit/Card') NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` enum('Đã hủy đơn','Chờ xác nhận','Đã xác nhận','Đang giao hàng','Đơn hàng đã được giao') NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_address` varchar(5555) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(5) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_variant` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(33, 'Laptop Lenovo Ideapad Slim 3 15IAH8 i5 12450H/16GB/512GB/Win11 (83ER000EVN)', 'upload/lenovo-ideapad-slim-3-15iah8-i5-83er00evn-thumb-600x600 (1).jpg', 'Laptop Gaming G15 5511 sở hữu cấu hình cực khủng với bộ vi xử lý Intel Core i7 11800H và card đồ họa RTX 3060, đủ sức để “chiến” tốt mọi tựa game bom tấn AAA đồ họa cao, tha hồ tận hưởng hiệu ứng chân thực, hình ảnh mãn nhãn trên màn hình 120Hz mượt mà.', 9, 8, 1),
(34, 'Laptop Dell Latitude L3540 i5 1235U/16GB/512GB/15.6', 'upload/acer-aspire-lite-14-51m-59bn-i5-nxktxsv001-100624-101857-600x600.jpg', 'Cùng chạm đến trải nghiệm gaming đỉnh cao với Acer Nitro 5 Tiger AN515-58-773Y – chiếc laptop sở hữu chip Intel Core i7 12700H mạnh mẽ kết hợp cùng card đồ họa rời RTX 3050Ti. Ngoài ra, máy còn được trang bị màn hình 144Hz cực mượt và có hệ thống tản nhiệt hết sức xịn sò.\r\nAcer Nitro 5 Tiger AN515-58-773Y được trang bị cấu hình nổi bật với sự góp mặt của chip Intel Core i7 12700H. Bộ vi xử lý 14 nhân, 20 luồng mạnh mẽ này cung cấp hiệu năng gaming cao cấp, đồng thời hỗ trợ tối ưu cho mọi tác vụ, từ video call, duyệt web, livestream, nghe nhạc, ghi âm và các công cụ văn phòng một cách cực kỳ hiệu quả.\r\n\r\nNgoài ra, máy còn sở hữu 16GB RAM cùng ổ cứng 512GB, thể hiện hiệu năng đa nhiệm tuyệt vời khi chơi game và cho phép game thủ lưu trữ vô số trò chơi yêu thích. Lợi thế mà ổ cứng SSD đem lại giúp thiết bị khởi chạy mọi tác vụ cực nhanh trong chớp mắt, giúp tiết kiệm thời gian và đem lại trải nghiệm tốt khi làm việc, học tập, giải trí.', 5, 2147499, 2),
(36, 'Laptop MSI Gaming Katana 15 B13UDXK-2213VN i5 13500H/16GB/1TB/15.6', 'upload/dell-inspiron-15-3520-i5-25p231-250424-020344-600x600.jpg', 'Laptop MSI Gaming Katana 15 B13UDXK-2213VN là sự kết hợp hoàn hảo giữa hiệu suất mạnh mẽ và thiết kế hiện đại, dành cho các game thủ và những người làm việc yêu cầu cấu hình cao. Với bộ vi xử lý Intel Core i5-13500H thế hệ mới, máy đem đến khả năng xử lý mượt mà cho mọi tác vụ từ gaming đến các công việc đồ họa nặng. Đi kèm là 16GB RAM giúp đa nhiệm mượt mà và 1TB SSD mang đến không gian lưu trữ rộng lớn với tốc độ truy xuất dữ liệu cực nhanh.\r\n\r\nMàn hình 15.6\" Full HD cho hình ảnh sắc nét và sống động, mang đến trải nghiệm game đắm chìm và làm việc hiệu quả. Đặc biệt, máy được trang bị card đồ họa rời NVIDIA GeForce RTX 3050 6GB, mang lại hiệu suất đồ họa mạnh mẽ, xử lý mượt mà các game 3D, video độ phân giải cao và phần mềm thiết kế chuyên nghiệp.\r\n\r\nVới hệ điều hành Windows 11, máy có giao diện thân thiện và khả năng tối ưu hóa các ứng dụng, cùng các tính năng bảo mật hiện đại. Ngoài ra, laptop còn đi kèm với balo MSI Gaming giúp bảo vệ và thuận tiện khi di chuyển.\r\n\r\nĐây là sự lựa chọn lý tưởng cho những ai muốn một chiếc laptop gaming mạnh mẽ, hiệu suất ổn định và thiết kế sang trọng, phù hợp cho mọi nhu cầu từ học tập, làm việc đến giải trí đỉnh cao.', 9, 6666666, 5),
(38, 'Laptop Microsoft Surface Pro 9 i5 1235U/8GB/256GB/13', 'upload/lenovo-ideapad-5-14iah8-i5-83bf003wvn-thumb-laptop-638632059812795496-600x600.jpg', 'Một chiếc laptop mạnh mẽ hay một chiếc máy tính bảng linh hoạt, dù trong bất cứ vai trò nào, Microsoft Surface Pro 9 vẫn thể hiện vô cùng xuất sắc, cho bạn sản phẩm có hiệu suất cao, thời lượng pin cả ngày và một thiết kế cực chất mà ai cũng phải ngước nhìn.\r\nHiệu suất chuyên nghiệp cho công việc\r\nĐể đáp ứng hoàn hảo mọi nhu cầu của bạn, Surface Pro 9 trang bị cấu hình mạnh mẽ với những linh kiện hàng đầu, được chứng nhận chuẩn Intel Evo cao cấp. Bộ vi xử lý Intel Core i5 1235U sở hữu tới 10 lõi 12 luồng, tốc độ tối đa lên đến 4.40GHz, đủ sức để chạy mượt các công việc đòi hỏi cấu hình cao. GPU đồ họa tích hợp Intel Iris Xe cho hiệu suất đồ họa không thua kém gì card rời để bạn làm các công việc sáng tạo như thiết kế, chỉnh sửa ảnh, biên tập video. Ngoài ra, Surface Pro 9 còn sử dụng RAM DDR5 4800MHz và SSD tốc độ cao, đảm bảo tốc độ cũng như hiệu quả đa nhiệm.', 7, 6, 5),
(39, 'Laptop Asus TUF Gaming F15 FX507ZC4 i5 12500H/16GB/512GB/4GB RTX3050/144Hz/Win11 (HN330W)', 'upload/asus-gaming-tuf-f15-fx507zc4-i5-hn330wthumb-600x600.jpg', 'Laptop Asus TUF Gaming F15 FX507ZC4 là một sự lựa chọn lý tưởng cho các game thủ và người dùng cần một máy tính mạnh mẽ nhưng vẫn đảm bảo tính bền bỉ và ổn định. Được trang bị bộ vi xử lý Intel Core i5-12500H thế hệ mới, máy có khả năng xử lý đa nhiệm và các tác vụ nặng mượt mà, từ chơi game cho đến làm việc với các phần mềm đồ họa chuyên nghiệp.\r\n\r\nVới 16GB RAM và 512GB SSD, chiếc laptop này mang lại hiệu suất vượt trội, giúp tải ứng dụng nhanh chóng và lưu trữ đủ các tệp tin lớn. Card đồ họa rời NVIDIA GeForce RTX 3050 4GB hỗ trợ hiệu suất chơi game và đồ họa mạnh mẽ, giúp bạn tận hưởng những trải nghiệm game 3D mượt mà và hiệu suất ổn định khi làm việc với video và thiết kế đồ họa.\r\n\r\nMàn hình 15.6 inch Full HD với tần số quét 144Hz giúp hình ảnh hiển thị mượt mà, đặc biệt là trong các game hành động nhanh, cho bạn cảm giác trải nghiệm chân thực và không bị gián đoạn. Cùng với đó, máy còn được cài sẵn hệ điều hành Windows 11, mang lại giao diện hiện đại và tối ưu hóa cho công việc và giải trí.\r\n\r\nLaptop Asus TUF Gaming F15 FX507ZC4 được thiết kế với khả năng chống chịu tốt, đảm bảo độ bền cao trong môi trường sử dụng khắc nghiệt, lý tưởng cho những ai yêu thích sự mạnh mẽ và ổn định. Đây là lựa chọn tuyệt vời cho cả gaming, làm việc, và giải trí.', 5, 555555, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram`
--

CREATE TABLE `ram` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ram`
--

INSERT INTO `ram` (`id`, `name`) VALUES
(1, 'Ram 8GB'),
(2, 'Ram 16GB'),
(3, 'Ram 32GB');

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
(20, 'admin', 'admin', 'admin', 12345, NULL, 'admin@gmail.com', '1'),
(21, 'm', 'user', 'Hn', 0, 'img', 'a1@gmail.com', '1'),
(22, 'h', 'user', 'yuu', 1, 'img', 'a2@gmail.com', '1'),
(23, 'hihihi', 'user', 'kkkkkkkkk', 1212321321, 'img', 'zzz@gmail.com', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_cpu` int(5) DEFAULT NULL,
  `id_ram` int(5) NOT NULL,
  `price_variant` int(9) NOT NULL,
  `amount_variant` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `id_product`, `id_cpu`, `id_ram`, `price_variant`, `amount_variant`) VALUES
(22, 39, NULL, 1, 10000000, 5),
(23, 39, NULL, 3, 9999999, 8),
(24, 38, NULL, 2, 13500000, 6),
(25, 38, NULL, 1, 9500000, 9),
(26, 38, NULL, 3, 15000000, 9),
(27, 36, NULL, 1, 14000000, 8),
(28, 36, NULL, 2, 16000000, 5),
(29, 34, NULL, 2, 9000000, 8);

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
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_id_user` (`id_user`),
  ADD KEY `fk_comments_variants` (`id_variant`);

--
-- Chỉ mục cho bảng `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `ram`
--
ALTER TABLE `ram`
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
  ADD KEY `fk_variants_products` (`id_product`),
  ADD KEY `fk_variants_cpu` (`id_cpu`),
  ADD KEY `fk_variants_ram` (`id_ram`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `fk_order_detail_variants` FOREIGN KEY (`id_variant`) REFERENCES `variants` (`id`),
  ADD CONSTRAINT `fk_orders_detail_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `fk_variants_cpu` FOREIGN KEY (`id_cpu`) REFERENCES `cpu` (`id`),
  ADD CONSTRAINT `fk_variants_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_variants_ram` FOREIGN KEY (`id_ram`) REFERENCES `ram` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
