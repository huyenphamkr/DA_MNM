-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2022 lúc 07:07 PM
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
-- Cơ sở dữ liệu: `furniture`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Trang trí', 'Các phụ kiện nhập khẩu từ các hãng thiết kế nội thất uy tín của Australia mang lại điểm nhấn đặc biệt sang trọng cho không gian nội thất', 1, '2022-10-22 14:27:31', '2022-10-22 14:27:31'),
(2, 'Phòng Ngủ', 'Các sản phẩm giường ngủ da thật của MILD được bọc bằng chất liệu da bò Ý mềm mại, \n                cao cấp với khung sườn của sản phẩm sử dụng vật liệu thân thiện với môi trường, được chế tạo cẩn thận nhằm đảm bảo chất lượng và tuổi thọ.\n                Với thiết kế độc đáo và đẳng cấp, giường ngủ da thật của MILD mang lại sự thoải mái tuyệt đối trong không gian đẳng cấp', 1, '2022-10-22 14:27:31', '2022-10-22 14:27:31'),
(3, 'Phòng Làm Việc', 'Các sản phẩm dành cho phòng làm việc được bọc bằng chất liệu cao cấp \n                với khung sườn của sản phẩm sử dụng vật liệu thân thiện với môi trường, được chế tạo cẩn thận nhằm đảm bảo chất lượng và tuổi thọ.\n                Với thiết kế độc đáo và đẳng cấp.', 1, '2022-10-22 14:27:31', '2022-10-22 14:27:31'),
(4, 'Phòng Khách', 'Nét hiện đại cho căn hộ là lựa chọn thông minh cho phòng khách sang trọng, tiện nghi và đẳng cấp. \n                Được thiết kế có tính năng độc đáo, tiện lợi, chắc chắn sẽ đem đến những phút giây thư giãn tuyệt vời mỗi khi trở về nhà.', 1, '2022-10-22 14:27:31', '2022-10-22 14:27:31'),
(5, 'Phòng Ăn', 'Mỗi khoảnh khắc quây quần bên bàn ăn luôn là những phút giây đầm ấm tuyệt đẹp.\n                Với chất liệu mẫu mã đa dạng cùng thiết kế độc đáo, từng sản phẩm của Cozy hướng tới kiến tạo không gian sang trọng nhưng cũng vô cùng đầm ấm và tinh tế.', 1, '2022-10-22 13:51:32', '2022-10-10 14:27:19'),
(18, 'Phòng tắm', 'Phòng tắm', 0, '2022-10-23 16:25:36', '2022-10-23 16:25:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_10_20_094211_create_all__table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `product_id`, `status_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 11, 3, 1, 500000, NULL, NULL),
(1, 17, 3, 1, 1000000, NULL, NULL),
(1, 34, 3, 1, 500000, NULL, NULL),
(2, 15, 1, 4, 40000, NULL, NULL),
(2, 16, 1, 4, 20000, NULL, NULL),
(3, 8, 5, 1, 200000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `total`, `note`, `payment`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-09-12', 2000000, 'note', 'Thanh toán khi nhận hàng', NULL, NULL),
(2, 5, '2022-10-21', 200000, 'note', 'Thanh toán khi nhận hàng', NULL, NULL),
(3, 6, '2022-10-12', 200000, 'note', 'Thanh toán khi nhận hàng', NULL, NULL);

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
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `image`, `amount`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, 5, 'Bàn ăn 6 người', '<p><strong>Bộ bàn ăn 6 ghế</strong> đây là bộ<strong>bàn ăn </strong>được nhiều khách hàng lựa chọn. cũng là sản phẩm như bán chạy nhất hiện nay. Sản phẩm có thể mở rộng ngồi tới 8-10 người. Chúng tôi tập trung thiết kế các mẫu bàn ăn chất lượng. thiết kế đẹp mắt bắt kịp xu hướng tiêu dùng. Màu sắc đa dạng phù hợp với không gian nội thất từng gia đình.</p>', 'image/product/ban_an_6_nguoi.jpg', 10, 1200000, '1', NULL, NULL),
(2, 4, 'Bàn phòng khách', '\n<li>Xuất xứ: Nhập Khẩu</li>\n<li>Bảo hành: 12 Tháng</li>\n<li>Màu sắc mẫu&nbsp;<strong>bàn trà phòng khách đẹp</strong>: Trắng - Đen giúp không gian hiện đại, sang trọng hơn.</li>\n<li>Chất liệu: Gỗ + bàn mặt đá cẩm thạch được lựa chọn chất liệu cao cấp, bền đẹp.</li>\n<li>Vân bàn trà có đường vân tự nhiên, sắc nét .</li>\n<li>Kích thước: 1300*700 mm</li>\n<li>Thiết kế tạo điểm nhấn với nhiều chi tiết được gia công tỉ mỉ, mặt bàn bo cạnh tinh tế, chống va chạm.</li>\n<li>Thân bàn ngăn kéo đôi tăng thêm công năng sử dụng</li>\n', 'image/product/ban.jpg', 250, 500000, '1', NULL, NULL),
(3, 3, 'Bàn ghế bệt', '<p>Bộ bàn ghế bệt có thiết kế đặc biệt gồm nhiều chức năng tích hợp trên cùng một chiếc bàn giúp bạn đồng thời có thể để laptop, dụng cụ học tập, các thiết bị công nghệ … thật gọn gàng và ngăn nắp. Bàn được làm từ gỗ cao cấp đã qua xử lý chống cong vênh, chống mối mọt, bên ngoài được bảo vệ bởi một lớp phủ melamin chống thấm đảm bảo độ bền cho sản phẩm. Ngoài ra, chân bàn có thể xếp gọn gàng nên bạn có thể gấp lại và cất gọn khi không sử dụng để tiết kiệm không gian. Ghế ngồi tựa lưng, với nhiều góc gập khác nhau cho bạn thoải mái trong mọi tư thế, vừa làm việc, vừa nghĩ ngơi thư giản, giải trí, vừa là giường mini để có thể ngã lưng.</p>', 'image/product/banghebet.jpg', 140, 1400000, '1', NULL, NULL),
(4, 2, 'Bàn trang điểm', '<p>Với nhiều chức năng đặc biệt khác nhau, chưa bao giờ bàn trang điểm trở thành món đồ nội thất kém đi tính thẩm mỹ sản phẩm gồm 1 chiếc ghế đơn, một chiếc gương kết hợp với kệ để đồ trang điểm và một chiếc bàn nhỏ. Món đồ nội thất này kết hợp với giường ngủ cao cấp tủ quần áo tạo nên không gian nội thất phòng ngủ ấn tượng.</p>', 'image/product/bantrangdiem1.jpg', 50, 500000, '1', NULL, NULL),
(5, 1, 'Bộ 5 khung tranh treo tường', '<p>Bộ 5 khung tranh treo tường phòng khách sáng tạo độc đáo với thiết kế đơn giản mà hiện đại, giúp phòng khách nội thất của bạn trở lên sáng tạo và có hồn hơn.</p>\n', 'image/product/5khungtranhtreotuong.jpg', 80, 500000, '1', NULL, NULL),
(6, 1, 'Bộ 11 khung tranh treo tường', '<p>Bộ 11 khung tranh treo tường phòng khách sáng tạo độc đáo với thiết kế đơn giản mà hiện đại, giúp phòng khách nội thất của bạn trở lên sáng tạo và có hồn hơn.</p>', 'image/product/11khungtranhtreotuong.jpg', 80, 1000000, '1', NULL, NULL),
(7, 1, 'Đèn đọc sách', '<p>Sản phẩm đèn bàn với chất liệu kim loại, độ bền cao, giúp dễ dàng trong việc trang trí, cải tạo, nâng cấp mọi không gian. Ngoài ra, với công tắc đèn tiện dụng, bạn có thể dễ dàng tắt/mở đèn, tạo không gian riêng để nghỉ ngơi, đọc sách, làm việc…</p>', 'image/product/den.jpg', 25, 150000, '1', NULL, NULL),
(8, 1, 'Đèn thả trần trang trí', '<p>Đèn thả trần trang trí nội thất mang phong cách hiện đại. Sử dụng chất liệu Sắt sơn tĩnh điện chống gỉ đèn có độ bền lâu dài, chao vải bóng chống xước giúp dễ dàng lắp đặt, thi công. Rất được ưa chuộng trong trang trí thả quán cafe, nhà hàng, quầy bar, shop thời trang, quán trà sữa, quán ăn nhanh, hair salon, tiệm cắt tóc, thả bàn ăn, phòng ngủ, homestay,...</p>', 'image/product/den1.jpg', 50, 200000, '1', NULL, NULL),
(9, 1, 'Đồng hồ Shouse', '<p>Kích thước tổng thể: 70cm x 70cm. Mặt đồng hồ: 24cm (có logo SHOUSE dưới số 12). Chất liệu thép mạ sơn tĩnh điện 3 lớp, mạ vàng và được phủ thêm 1 lớp sơn bóng bảo vệ (giúp màu bền đẹp tối thiểu 15 năm). Động cơ máy đồng hồ kim trôi, không gây tiếng động. Pin Pin AA (1,5V) đây loại pin thông thường nên mua ở đâu cũng có.</p>', 'image/product/dongho1.jpg', 350, 1150000, '1', NULL, NULL),
(10, 1, 'Đồng hồ treo tường', '<p>Đồng hồ được thiết kế đơn giản nên phù hợp với bất cứ nội thất nào cho căn nhà của bạn. Dùng rất bền, ít hư hỏng, thích hợp dùng làm quà tặng rất có ý nghĩa.</p>', 'image/product/dongho.jpg', 100, 100000, '1', NULL, NULL),
(11, 1, 'Ghế xích đu', '<p>Xích đu treo 1 chỗ ngồi có đệm. Phần thân làm từ thép. Thích hợp cho trong nhà và ngoài trời. Xích đu treo 1 chỗ ngồi có đệm. Phần thân làm từ thép. Thích hợp cho trong nhà và ngoài trời.</p>', 'image/product/ghexichdu.jpg', 10, 500000, '1', NULL, NULL),
(12, 1, 'Gương treo tường', '<p>Được làm bằng lớp kính thủy của bỉ bo viền mịn không gây nguy hiểm. Bề mặt là lớp kính bảo vệ giúp chịu tác động của các vật thể nhẹ. Lớp tráng gương sáng bóng giúp ta có thể soi mội vật một cách chân thật nhất. Lớp cách nhiện, cách điện chống chịu nhiệt độ cao và tránh bị truyền điện. lớp sơn tĩnh điện chống ẩm mốc bề mặt gương.</p>', 'image/product/guong.jpg', 100, 100000, '1', NULL, NULL),
(13, 1, 'Thảm phòng khách trải sàn lông trắng xám', '<p>Thảm phòng khách là loại thảm trải sàn có kích thước phù hợp với phòng khách có tác dụng làm ấm quanh khu vực bàn sofa của phòng khách. Bên cạnh đó, những tấm thảm phòng khách sẽ tạo ra phong cách riêng, nét cá tính, điểm nhấn cho phòng khách của gia đình bạn.Thảm có mặt trước làm bằng chất liệu polyester, mặt sau làm bằng cotton. Do đó, mang lại cảm giác mềm mại, khi sử dụng. Đặc biệt, với chất liệu này, bạn có thể dễ dàng vệ sinh và khô nhanh khi giặt.</p>', 'image/product/tham.jpg', 50, 100000, '1', NULL, NULL),
(14, 1, 'Thảm phòng khách trải sàn lông xám', '<p>Thảm phòng khách là loại thảm trải sàn có kích thước phù hợp với phòng khách có tác dụng làm ấm quanh khu vực bàn sofa của phòng khách. Bên cạnh đó, những tấm thảm phòng khách sẽ tạo ra phong cách riêng, nét cá tính, điểm nhấn cho phòng khách của gia đình bạn.Thảm có mặt trước làm bằng chất liệu polyester, mặt sau làm bằng cotton. Do đó, mang lại cảm giác mềm mại, khi sử dụng. Đặc biệt, với chất liệu này, bạn có thể dễ dàng vệ sinh và khô nhanh khi giặt.</p>', 'image/product/tham1.jpg', 50, 70000, '1', NULL, NULL),
(15, 1, 'Thảm phòng khách lục giác', '<p>Thảm phòng khách là loại thảm trải sàn có kích thước phù hợp với phòng khách có tác dụng làm ấm quanh khu vực bàn sofa của phòng khách. Bên cạnh đó, những tấm thảm phòng khách sẽ tạo ra phong cách riêng, nét cá tính, điểm nhấn cho phòng khách của gia đình bạn.Thảm có mặt trước làm bằng chất liệu polyester, mặt sau làm bằng cotton. Do đó, mang lại cảm giác mềm mại, khi sử dụng. Đặc biệt, với chất liệu này, bạn có thể dễ dàng vệ sinh và khô nhanh khi giặt.</p>', 'image/product/tham2.jpg', 50, 40000, '1', NULL, NULL),
(16, 1, 'Thảm phòng khách họa tiết', '<p>Thảm phòng khách là loại thảm trải sàn có kích thước phù hợp với phòng khách có tác dụng làm ấm quanh khu vực bàn sofa của phòng khách. Bên cạnh đó, những tấm thảm phòng khách sẽ tạo ra phong cách riêng, nét cá tính, điểm nhấn cho phòng khách của gia đình bạn.Thảm có mặt trước làm bằng chất liệu polyester, mặt sau làm bằng cotton. Do đó, mang lại cảm giác mềm mại, khi sử dụng. Đặc biệt, với chất liệu này, bạn có thể dễ dàng vệ sinh và khô nhanh khi giặt.</p>', 'image/product/tham3.jpg', 50, 20000, '1', NULL, NULL),
(17, 1, 'Xích đu hình bán cầu giọt nước', '<p>Xích đu được làm hoàn toàn bằng kính acrylic có độ bền cao, trong suốt trong khi khung được làm bằng inox không gỉ. Một điểm đặc biệt của mẫu xích đu này là khi bắt lên trần là bạn có thể tỳ chỉnh theo chiều cao của ngôi nhà sao cho phù hợp, kết hợp với khả năng chịu lực cao lên tới 220kg giúp cho XD02 được đánh giá là mẫu xích đu có độ chắc vào hàng top hiện nay.</p>', 'image/product/xichdubancau.jpg', 200, 1000000, '1', NULL, NULL),
(18, 2, 'Bàn trang điểm phòng ngủ tân cổ điển', '<p>Bàn trang điểm phòng ngủ gây ấn tượng với thiết kế hiện đại độc đáo có tính thẩm mỹ cao gương soi gắn trên mặt bàn có kiểu dáng tròn nhỏ gọn bắt mắt, được làm từ gỗ công nghiệp phun sơn bọc da, kích thước bàn: R120 x C75 x S40cm</p>', 'image/product/bantrangdiem.jpg', 10, 2500000, '1', NULL, NULL),
(19, 2, 'Bàn trang điểm phòng ngủ hiện đại', '<p>Bàn trang điểm phòng ngủ gây ấn tượng với thiết kế hiện đại độc đáo có tính thẩm mỹ cao gương soi gắn trên mặt bàn có kiểu dáng tròn nhỏ gọn bắt mắt, được làm từ gỗ công nghiệp phun sơn bọc da, kích thước bàn: R120 x C75 x S40cm</p>', 'image/product/bantrangdiem1.jpg', 10, 1500000, '1', NULL, NULL),
(20, 2, 'Giường ngủ gỗ sồi ngăn kéo', '<p>Bộ giường ngủ sử dụng gỗ công nghiệp cao cấp đã qua xử lý mối mọt, chống cong vênh. bề mặt gỗ được phủ sơn tĩnh điện, chống trầy xước, hạn chế phai màu theo thời gian. Các đường nét góc cạnh được xử lý tỉ mỉ, mang đến vẻ đẹp hiện đại mới mẽ cho không gian sống tuyệt vời, được phủ sơn bóng, tăng độ bền cho sản phẩm, giúp việc vệ sinh trở nên dễ dàng.</p>', 'image/product/giuong.jpg', 100, 17000000, '1', NULL, NULL),
(21, 2, 'Giường ngủ gỗ sồi bệt', '<p>Bộ giường ngủ sử dụng gỗ công nghiệp cao cấp đã qua xử lý mối mọt, chống cong vênh. bề mặt gỗ được phủ sơn tĩnh điện, chống trầy xước, hạn chế phai màu theo thời gian. Các đường nét góc cạnh được xử lý tỉ mỉ, mang đến vẻ đẹp hiện đại mới mẽ cho không gian sống tuyệt vời, được phủ sơn bóng, tăng độ bền cho sản phẩm, giúp việc vệ sinh trở nên dễ dàng.</p>', 'image/product/giuong1.jpg', 50, 15000000, '1', NULL, NULL),
(22, 2, 'Giường ngủ bọc vải', '<p>Bộ giường ngủ sử dụng gỗ công nghiệp cao cấp đã qua xử lý mối mọt, chống cong vênh. bề mặt gỗ được phủ sơn tĩnh điện, chống trầy xước, hạn chế phai màu theo thời gian. Các đường nét góc cạnh được xử lý tỉ mỉ, mang đến vẻ đẹp hiện đại mới mẽ cho không gian sống tuyệt vời, được phủ sơn bóng, tăng độ bền cho sản phẩm, giúp việc vệ sinh trở nên dễ dàng.</p>', 'image/product/giuong2.jpg', 50, 10000000, '1', NULL, NULL),
(23, 2, 'Tủ đầu giường ba ngăn', '<p>Được làm bằng gỗ MDF nhập khẩu loại tốt, phủ nhựa menamin bóng láng. Bề mặt vật liệu không thấm nước, cấu trúc bền vững không ẩm mốc mối mọt. Kích thước : 42x25x40 ( dài x rộng x cao )</p>', 'image/product/tudaugiuong.jpg', 100, 8000000, '1', NULL, NULL),
(24, 2, 'Tủ đầu giường hai ngăn', '<p>Chất liệu gỗ ván dăm, màu gỗ sồi trắng, chiều dài: 50cm - chiều rộng: 37.5cm - chiều cao: 45cm</p>', 'image/product/tudaugiuong1.jpg', 100, 5000000, '1', NULL, NULL),
(25, 2, 'Tủ quần áo ba cánh liền kệ', '<p>Tủ quần áo ba cánh liền kệ, chất liệu MDF phủ melamine cao cấp(dày 18mm) vân gỗ sần kết hợp sơn trắng 2k chống trày, chống cong vênh, mối mọt.</p>', 'image/product/tuquanao.jpg', 60, 15000000, '1', NULL, NULL),
(26, 2, 'Tủ quần áo gỗ công nghiệp', '<p>Tủ quần áo gỗ công nghiệp melamine, chất liệu MDF phủ melamine cao cấp(dày 18mm) vân gỗ sần kết hợp sơn trắng 2k chống trày, chống cong vênh, mối mọt.</p>', 'image/product/tuquanao1.jpg', 100, 12000000, '1', NULL, NULL),
(27, 2, 'Tủ quần áo bốn cánh', '<p>Tủ quần áo gỗ công nghiệp melamine, chất liệu MDF phủ melamine cao cấp(dày 18mm) vân gỗ sần kết hợp sơn trắng 2k chống trày, chống cong vênh, mối mọt.</p>', 'image/product/tuquanao2.jpg', 100, 10000000, '1', NULL, NULL),
(28, 3, 'Bàn làm việc chân sắt tròn', '<p>Bàn làm việc được làm từ gỗ keo tự nhiên chắc chắn, bền bỉ. Bàn có thiết kế mạnh mẽ nhưng lại đầy tinh tế bằng cách pha trộn những chi tiết cổ điển làm nó trở nên trang nhã và sang trọng hơn, và cũng phù hợp với những phong cách trang trí hiện đại.</p>', 'image/product/banlamviec.jpg', 25, 2550000, '1', NULL, NULL),
(29, 3, 'Bàn làm việc có kệ', '<p>Cốt gỗ là MFC cao cấp phủ Melamine Hàn Quốc chống ẩm mốc cực tốt, dễ lau chùi vệ sinh hàng ngày. Diện tích mặt bàn rộng, màu vân gỗ bắt mắt cho khách hàng dễ dàng kết hợp với nhiều không gian văn phòng khác nhau.</p>', 'image/product/banlamviec1.jpg', 15, 2000000, '1', NULL, NULL),
(30, 3, 'Bàn làm việc có tủ kéo', '<p>Bàn làm việc được làm từ gỗ keo tự nhiên chắc chắn, bền bỉ. Bàn có thiết kế mạnh mẽ nhưng lại đầy tinh tế bằng cách pha trộn những chi tiết cổ điển làm nó trở nên trang nhã và sang trọng hơn, và cũng phù hợp với những phong cách trang trí hiện đại. Bàn còn có thêm ngăn kéo nhỏ để cất giữ những vật dụng cần thiết.</p>', 'image/product/banlamviec2.jpg', 25, 1800000, '1', NULL, NULL),
(31, 3, 'Ghế văn phòng lưng quạt chân xoay', '<p>Ghế văn phòng là mẫu ghế xoay 360 độ linh hoạt, có tay vịn chắc chắn, đệm ngồi và lưng tựa bọc vải hoặc da êm ái. Khung tựa và tay vịn bằng nhựa PP có độ bền cao, thân thiện với da và dễ dàng lau sạch bụi bẩn bằng khăn ướt.\nTựa lưng bọc da công nghiệp hoặc vải nỉ chuyên dụng, có khả năng chịu lực rất tốt. Đệm ngồi có mút dày bọc vải và mép ngồi vát cong kiểu thác nước giúp máu lưu thông tốt, giảm thiểu tình trạng tê mỏi do thiếu oxy đến các cơ thể.</p>\n', 'image/product/ghevanphong.jpg', 10, 250000, '1', NULL, NULL),
(32, 3, 'Ghế lưới xoay lưng cao chân sắt', '<p>Ghế văn phòng là mẫu ghế xoay 360 độ linh hoạt, có tay vịn chắc chắn, đệm ngồi và lưng tựa bọc vải hoặc da êm ái. Khung tựa và tay vịn bằng nhựa PP có độ bền cao, thân thiện với da và dễ dàng lau sạch bụi bẩn bằng khăn ướt.\nTựa lưng bọc da công nghiệp hoặc vải nỉ chuyên dụng, có khả năng chịu lực rất tốt. Đệm ngồi có mút dày bọc vải và mép ngồi vát cong kiểu thác nước giúp máu lưu thông tốt, giảm thiểu tình trạng tê mỏi do thiếu oxy đến các cơ thể.</p>\n', 'image/product/ghevanphong1.jpg', 20, 220000, '1', NULL, NULL),
(33, 3, 'Ghế văn phòng xoay lưng lưới dày xanh lá', '<p>Ghế văn phòng là mẫu ghế xoay 360 độ linh hoạt, có tay vịn chắc chắn, đệm ngồi và lưng tựa bọc vải hoặc da êm ái. Khung tựa và tay vịn bằng nhựa PP có độ bền cao, thân thiện với da và dễ dàng lau sạch bụi bẩn bằng khăn ướt.\nTựa lưng bọc da công nghiệp hoặc vải nỉ chuyên dụng, có khả năng chịu lực rất tốt. Đệm ngồi có mút dày bọc vải và mép ngồi vát cong kiểu thác nước giúp máu lưu thông tốt, giảm thiểu tình trạng tê mỏi do thiếu oxy đến các cơ thể.</p>\n', 'image/product/ghevanphong2.jpg', 5, 200000, '1', NULL, NULL),
(34, 3, 'Tủ kệ sách gỗ công nghiệp', '<p>Sự hòa trộn khéo léo các mảng màu trắng, vàng, vân gỗ, xanh ngọc tạo nên 1 chiếc tủ sách đẹp nhẹ nhàng và tinh tế. Kiểu dáng đơn giản, không có chi tiết thừa thãi, không gian lưu trữ rộng rãi.</p>', 'image/product/tukesach1.jpg', 5, 500000, '1', NULL, NULL),
(35, 3, 'Tủ kệ sách đứng', '<p>Sự hòa trộn khéo léo các mảng màu trắng, vàng, vân gỗ, xanh ngọc tạo nên 1 chiếc tủ sách đẹp nhẹ nhàng và tinh tế. Kiểu dáng đơn giản, không có chi tiết thừa thãi, không gian lưu trữ rộng rãi.</p>', 'image/product/tukesach2.jpg', 35, 300000, '1', NULL, NULL),
(36, 3, 'Tủ kệ sách gỗ MA', '<p>Sự hòa trộn khéo léo các mảng màu trắng, vàng, vân gỗ, xanh ngọc tạo nên 1 chiếc tủ sách đẹp nhẹ nhàng và tinh tế. Kiểu dáng đơn giản, không có chi tiết thừa thãi, không gian lưu trữ rộng rãi.</p>', 'image/product/tukesach3.jpg', 25, 100000, '1', NULL, NULL),
(37, 4, 'Bàn ghế tựa trứng bộ gỗ sồi Nga', '<p>Sản phẩm bộ ghế tựa trứng bộ gỗ sồi Nga có kết cấu khá đơn giản như nhiều loại bộ ghế gỗ tựa khác. Nó bao gồm 1 ghế tựa dài, 2 ghế tựa đơn, 1 bàn kính, 1 bàn phụ và 1-2 đôn vuông. Ghế tựa dài có chiều dài 230cm nên khá thoải mái cho việc ngồi nằm xem tivi giải trí hoặc ngủ nghỉ. Nó được phân tách khá kĩ thành 3 phần tương tự nhau nên có thể ngồi 3 người lớn chắc chắn. Các nét điêu khắc được làm khá đơn điệu nhưng không gây ra cảm giác nhàm chán với kiểu hình khối xếp lại. Điểm nhấn của ghế này là nó khá giống với thiết kế của các bộ ghế sofa với phần ở dưới là phần gỗ giống dạng hình hộp nhưng vẫn mang lại sự chắc chắn cho người ngồi.</p>', 'image/product/banghe1.jpg', 25, 2000000, '1', NULL, NULL),
(38, 4, 'Bàn ghế Tần Thủy Hoàng gỗ hương đá ', '<p>Sản phẩm bộ ghế Tần Thủy Hoàng được làm bằng gỗ hương đá. Những họa tiết chạm trổ truyền thống đặc trưng được phô bày từ đỉnh ghế, lưng ghế, tay vịn đến cả mặt bàn. Sự giao thoa văn hóa giữa hai nền dân tộc với vẻ đẹp mang theo sự uyển chuyển của những nụ hoa sen, của hình tượng long lân quy tụ bên trong vòng tròn viên mãn hay hình ảnh trống đồng với tổ quốc hình chữ S ở trung tâm. Tất cả đã tạo nên giá trị văn hóa - nghệ thuật không thể tách rời.</p>', 'image/product/banghe2.jpg', 250, 1900000, '1', NULL, NULL),
(39, 4, 'Bàn trà mặt đá nhập khẩu ', '<p>Sở hữu thiết kế hiện đại, kiểu dáng nhỏ gọn đáp ứng tốt nhu cầu sử dụng của khách hàng Chất lượng sản phẩm vượt trội Đáp ứng mọi không gian phòng khách, như chung cư, nhà có phòng khách nhỏ hẹp, văn phòng, bàn tiếp khách Dễ kết hợp với các bộ ghế sofa và kệ tivi. Giá thành phải chăng, hợp lý.</p>\n', 'image/product/ban1.jpg', 250, 300000, '1', NULL, NULL),
(40, 4, 'Bàn ghế phòng khách với thiết kế tựa cong hoa văn trống đồng', '<p>Sở hữu thiết kế hiện đại, kiểu dáng nhỏ gọn đáp ứng tốt nhu cầu sử dụng của khách hàng Chất lượng sản phẩm vượt trội Đáp ứng mọi không gian phòng khách, như chung cư, nhà có phòng khách nhỏ hẹp, văn phòng, bàn tiếp khách Dễ kết hợp với các bộ ghế sofa và kệ tivi. Giá thành phải chăng, hợp lý.</p>', 'image/product/ban2.jpg', 25, 200000, '1', NULL, NULL),
(41, 4, 'Bàn ghế tựa ngang gỗ sồi', '<p>Sở hữu thiết kế hiện đại, kiểu dáng nhỏ gọn đáp ứng tốt nhu cầu sử dụng của khách hàng Chất lượng sản phẩm vượt trội Đáp ứng mọi không gian phòng khách, như chung cư, nhà có phòng khách nhỏ hẹp, văn phòng, bàn tiếp khách Dễ kết hợp với các bộ ghế sofa và kệ tivi. Giá thành phải chăng, hợp lý.</p>', 'image/product/ban3.jpg', 25, 150000, '1', NULL, NULL),
(42, 4, 'Ghế sofa văng vải hiện đại', '<p>Kích thước : D180cm x R80cm x C85cm. Khung: gỗ đã qua xử lí. Nệm mút: D40. Chân sắt: Sơn tĩnh điện. Chất liệu: Nhung nỉ, nhung, vải thô ...</p>', 'image/product/sofa.jpg', 250, 2550000, '1', NULL, NULL),
(43, 4, 'Sofa văng', '<p>Kích thước : 1m8 – 2m. Chất liệu : Vải nhung nhập khẩu Malaysia. Khung ghế : Khung gỗ dầu tự nhiên chống mối mọt (qua quy trình sấy hiện đại 72H). Nệm mút : mouse D55 không xẹp lún độ bền trên 10 năm (có tùy chọn lò xo trợ nhún). Chân ghế : Chân theo bộ. Tính năng nổi bật: Chất liệu không bám bụi, dễ lau chùi, nêm/gối tháo giặt được</p>', 'image/product/sofa1.jpg', 200, 2350000, '1', NULL, NULL),
(44, 4, 'Sofa da', '<p>Sofa da đẹp hiện đại loại da nhập khẩu chính hãng từ HÀN QUỐC. Sofa góc L, kích thước:1m7x3m3, Loại da bọc nhập khẩu Hàn Quốc, Nệm mút: D40-D50-K43 cao cấp chính hãng.. Khung được làm bằng gỗ sồi sấy đạt độ ẩm 12%, xử lý mối mọt PD3.</p>', 'image/product/sofa2.jpg', 100, 2000000, '1', NULL, NULL),
(45, 4, 'Tủ giày dép CNC', '<p>Tủ kệ để giày dép CNC với màu vàng tươi sáng của gỗ Sồi sẽ giúp căn nhà bạn trở nên tươi trẻ và sinh động hơn</p>', 'image/product/tugiaydep1.jpg', 20, 1000000, '1', NULL, NULL),
(46, 4, 'Tủ giày dép cửa lật', '<p>Tủ giày cửa chớp lật giúp đựng nhiều giày dép hơn nhưng vẫn phù hợp cho cả những căn hộ có không gian nhỏ, sản phẩm được làm từ gỗ sồi trắng nhập khẩu từ Mỹ, gỗ thịt nguyên khối đảm bộ độ bền sản phẩm và mang đến sự sang trọng cho căn nhà của bạn</p>', 'image/product/tugiaydep2.jpg', 33, 500000, '1', NULL, NULL),
(47, 4, 'Tủ tivi gỗ tự nhiên', '<p>Với không gian diện tích nhỏ các bạn nên lựa chọn những món đồ nội thất nhỏ gọn xinh xắn để căn hộ nhà bạn vẫn đầy đủ tiện nghi mà không bị bừa bộn hay cảm thấy chật hẹp chút nào.<br />\nKích thước: 2.4*0.9*0.45m chất liệu gỗ tự nhiên 100%</p>', 'image/product/tutivi1.jpg', 25, 1000000, '1', NULL, NULL),
(48, 4, 'Tủ tivi gỗ sồi màu nâu', '<p>Chất Liệu: Tủ kệ tivi thanh lý này được làm từ gỗ sồi loại cao cấp sơn PU màu nâu. Kích Thước : 1m4 x 60cm x 40cm. Tình Trạng : Tủ kệ tivi gỗ sồi thanh lý này là hàng tồn kho thanh lý chưa qua sữ dụng. Tủ kệ tivi gỗ sồi tạo sự sang trọng cho không gian phòng khách của bạn</p>\n', 'image/product/tutivi2.jpg', 25, 900000, '1', NULL, NULL),
(49, 4, 'Tủ tivi gỗ sồi màu vàng', '<p>Kiểu dáng dạng hộp gồm 2 tầng tiện lợi, tầng giữa được chia thành 3 tầng nhỏ hơn để mang đến sự tiện lợi hơn cho việc bày trí của khách hàng. Thiết kế bo góc tiện lợi với những góc cạnh được vát vuông góc, bo đều 2 đầu để tạo nên sự cân bằng tốt nhất cho sản phẩm. Màu vàng sồi tự nhiên được giả vân gỗ khá đẹp mắt, bề mặt tủ được chạy chỉ sọc đối xứng 2 mặt tủ khá đẹp và ưa nhìn, toàn bộ mặt ngoài của kệ tivi đều được dán một lớp phủ veneer ngoài. Đảm bảo khả năng chống trầy xước, ẩm mốc, tiện lợi hơn trong việc vệ sinh và lau chùi trong quá trình sử dụng. Kích thước đa dạng từ 80 - 180cm, giúp cho người mua hàng có nhiều lựa chọn để phù hợp với diện tích phòng khách của mình. Chất liệu gỗ MDF cao cấp, bền, chịu lực tốt, các phụ kiện như tay nắm, bánh ray trượt hộc tủ có chất lượng tốt, chống han gỉ hiệu quả.</p>', 'image/product/tutivi3.jpg', 25, 500000, '1', NULL, NULL),
(50, 4, 'Tủ trưng bày', '<p>Tủ trưng bày là sự kết hợp của 2 vật liệu là khung sắt và gỗ có khả năng chịu lực tốt và bền bỉ theo thời gian. Kiểu dáng hiện đại, đẹp mắt đáp ứng nhiều mục đích sử dụng khác, như làm kệ trưng bày sản phẩm, kệ trang trí phòng khách, kệ vách ngăn...từ không gia gia đình, nhà ở đến văn phòng, công ty đều phù hợp.</p>', 'image/product/tutrungbay.jpg', 250, 230000, '1', NULL, NULL),
(51, 5, 'Bộ bàn ăn gỗ', '<p>Gỗ Sồi Nga tự nhiên đã được tẩm sấy đảm bảo chắc, bền, đẹp, không sợ nước, không mọt hay nứt nẻ. Kiểu dáng đẹp, hiện đại, đa năng, an toàn khi sử dụng, phù hợp với mọi không gian phòng khách hoặc phòng ăn</p>', 'image/product/bobanangho.jpg', 25, 10000000, '1', NULL, NULL),
(52, 5, 'Bộ bàn ăn hiện đại', '<p>Là mẫu bàn ăn cao cấp, hiện đại mang đến trải nghiệm sử dụng tuyệt vời cho không gian sống.Kích thước bộ bàn ghế ăn: 1600*900*750 mm Chất liệu: Khung thép phủ titan chống han rỉ và mang tới thẩm mỹ cao Bàn ăn sử dụng mặt đá marble đẹp, có họa tiết sang trọng Mặt bàn đá dễ vệ sinh, lau chùi, có khả năng chống nhiệt, chống trầy xước tốt Ghế ăn chân thép bọc da cao cấp chuyên dụng trong sản xuất sofa đẹp mang tới cảm giác êm ái khi sử dụng Kiểu dáng thiết kế đẹp, độc đáo thích hợp sử dụng cho không gian hiện đại.</p>', 'image/product/bobananhiendai.jpg', 25, 15000000, '1', NULL, NULL),
(53, 5, 'Tủ bếp cao cấp', '<p>Đầy đủ công năng, đó là trợ thủ đắc lực cho người nấu bếp, người giữ lửa gia đình. Bữa cơm gia đình là linh hồn của sự đoàn tụ đầy yêu thương, nuôi dưỡng tâm hồn các thành viên trong gia đình thì tủ bếp là linh hồn của gian bếp, là vật trung gian giúp người nấu ăn thuận tiện trong việc giữ lửa gia đình.</p>', 'image/product/tubepcaocap.jpg', 95, 10000000, '1', NULL, NULL),
(54, 5, 'Tủ bếp chữ I', '<p>Đầy đủ công năng, đó là trợ thủ đắc lực cho người nấu bếp, người giữ lửa gia đình. Bữa cơm gia đình là linh hồn của sự đoàn tụ đầy yêu thương, nuôi dưỡng tâm hồn các thành viên trong gia đình thì tủ bếp là linh hồn của gian bếp, là vật trung gian giúp người nấu ăn thuận tiện trong việc giữ lửa gia đình.</p>', 'image/product/tubepchu_i.jpg', 55, 10000000, '1', NULL, NULL),
(55, 5, 'Tủ bếp gỗ chữ L', '<p>Đầy đủ công năng, đó là trợ thủ đắc lực cho người nấu bếp, người giữ lửa gia đình. Bữa cơm gia đình là linh hồn của sự đoàn tụ đầy yêu thương, nuôi dưỡng tâm hồn các thành viên trong gia đình thì tủ bếp là linh hồn của gian bếp, là vật trung gian giúp người nấu ăn thuận tiện trong việc giữ lửa gia đình.</p>', 'image/product/tubepgochu_l.jpg', 65, 18550000, '1', NULL, NULL),
(56, 5, 'Tủ trữ đồ nhà bếp', '<p>Kích thước 120 x 82 x 40cm; 120 x 162 x 40cm (Dài x Cao x Rộng). Màu sắc Sồi + Trắng; Trắng Full. Chất liệu Gỗ HMR (MDF lõi xanh chống ẩm). Bề mặt phủ melamine chống trầy, kháng nước, bền màu.</p>', 'image/product/tutrudonhabep.jpg', 250, 17500000, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `purchasedetail`
--

INSERT INTO `purchasedetail` (`purchase_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 1000000, NULL, NULL),
(1, 22, 1, 10000000, NULL, NULL),
(1, 44, 5, 2000000, NULL, NULL),
(2, 24, 2, 5000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `supplier_id`, `date`, `total`, `note`, `payment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-10-10', 30000000, 'Nhập hàng', 'Thanh toán khi nhận hàng', NULL, NULL),
(2, 2, 3, '2022-10-10', 10000000, 'Nhập hàng', 'Thanh toán khi nhận hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'Admin', NULL, NULL),
(2, 'Admin', 'Employee', NULL, NULL),
(3, 'Member', 'Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chờ Xác Nhận', 'Đơn hàng khách hàng đã đặt hàng chưa qua xử lý', '2022-10-20 14:53:12', NULL),
(2, 'Đã Xác Nhận', 'Đơn hàng đã được xác nhận thành công (khách hàng có mua hàng)', NULL, NULL),
(3, 'Đang đóng gói', '​Đơn hàng đang được chuẩn bị và đóng gói sản phẩm', NULL, NULL),
(4, 'Đang giao', 'Đơn hàng đang được chuyển đi cho khách hàng', NULL, NULL),
(5, 'Thành công', '​Đơn hàng đã được giao thành công cho khách hàng.', NULL, NULL),
(6, 'Khách Hàng hủy đơn', 'Khách hàng hủy không mua hàng nữa', NULL, NULL),
(7, 'Admin hủy đơn', 'Đơn hàng đã bị hủy bởi Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone_number`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Nhà Cung Cấp TPHCM', 'HCM', '0366135030', 1, NULL, NULL),
(2, 'Nhà Cung Cấp Bến Tre', 'Bến Tre', '0843739379', 1, NULL, NULL),
(3, 'Nhà Cung Cấp Hà Nội', 'HCM', '0843455652', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `address`, `phone_number`, `gender`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.com', 1, NULL, '$2y$10$oILD9yzhJ04A9Evyare7Zu9sthgYDk0K9GQzan4ku/QyEagkltrfO', 'HCM', '0366135030', 'Nữ', 1, NULL, NULL, NULL),
(2, 'Employee', 'employee@gmail.com', 2, NULL, '$2y$10$953k7O1wz/.RGf7E9FSPfOkbjd8MA.qk4p3bMS6.lwTmGqlwpQNJ2', 'HCM', '0366135030', 'Nam', 1, NULL, NULL, NULL),
(3, 'Custumer', 'customer@gmail.com', 3, NULL, '$2y$10$953k7O1wz/.RGf7E9FSPfOkbjd8MA.qk4p3bMS6.lwTmGqlwpQNJ2', 'HCM', '03112343321', 'Nam', 1, NULL, NULL, NULL),
(4, 'Phạm Thị Ngọc Huyền', 'huyen@gmail.com', 3, NULL, '2y$10$ERdWric4YYw.i2otH00K8.uJqCFAurJpFlXZgw39fZfAri7.Clw2G', 'Bến Tre', '0853335392', 'Nữ', 1, NULL, NULL, NULL),
(5, 'Nguyễn Thị Xuân Hoài', 'hoai@gmail.com', 3, NULL, '2y$10$ERdWric4YYw.i2otH00K8.uJqCFAurJpFlXZgw39fZfAri7.Clw2G', 'Phú Yên', '01222333444', 'Nữ', 1, NULL, NULL, NULL),
(6, 'Trần Thúy Ngân', 'ngan@gmail.com', 3, NULL, '2y$10$ERdWric4YYw.i2otH00K8.uJqCFAurJpFlXZgw39fZfAri7.Clw2G', 'Cà Mau', '09999888765', 'Nữ', 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`product_id`) USING BTREE,
  ADD KEY `orderdetails_product_id_foreign` (`product_id`),
  ADD KEY `orderdetails_status_id_foreign` (`status_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD PRIMARY KEY (`purchase_id`,`product_id`) USING BTREE,
  ADD KEY `purchasedetails_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `purchasedetail`
--
ALTER TABLE `purchasedetail`
  MODIFY `purchase_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orderdetails_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD CONSTRAINT `purchasedetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `purchasedetails_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Các ràng buộc cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
