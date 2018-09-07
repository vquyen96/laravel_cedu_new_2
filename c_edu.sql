-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 06:59 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(10) UNSIGNED NOT NULL,
  `about_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_name`, `about_slug`, `about_text`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '<p><strong>GIỚI THIỆU CEDU</strong></p>\r\n\r\n<p>C&ocirc;ng ty TNHH Gi&aacute;o Dục C&ocirc;ng Nghệ Số CEDU l&agrave; C&ocirc;ng ty th&agrave;nh vi&ecirc;n của Tập đo&agrave;n CGroup với sứ mệnh &ldquo; Kết Nối Tri Thức &ndash; Tự Tin Tỏa S&aacute;ng&nbsp; &ldquo; , CEDU mang tới giải ph&aacute;p đ&agrave;o tạo trực tuyến thiết thực cho c&aacute;c bạn học sinh, sinh vi&ecirc;n v&agrave; c&aacute;c doanh nghiệp.</p>\r\n\r\n<p>L&agrave; một trong những đơn vị đầu ti&ecirc;n tham gia lĩnh vực gi&aacute;o dục trực tuyến , CEDU muốn x&acirc;y dựng nền tảng chia sẻ kiến thức ,nơi ai cũng c&oacute; thể học c&ugrave;ng chuy&ecirc;n gia , m&agrave; lại hiểu quả , tiết kiếm chi ph&iacute; .</p>\r\n\r\n<p>Hiện tại CEDU sẽ cho ra mắt c&aacute;c kh&oacute;a học thuộc c&aacute;c mảng ng&agrave;nh nghề kh&aacute;c nhau bao gồm :</p>\r\n\r\n<ul>\r\n	<li>Luyện Thi THPT Quốc Gia</li>\r\n	<li>C&ocirc;ng nghệ th&ocirc;ng tin</li>\r\n	<li>Thiết kế</li>\r\n	<li>Ph&aacute;t triển bản th&acirc;n</li>\r\n	<li>Kinh doanh, khởi nghiệp</li>\r\n	<li>Ngoại Ngữ</li>\r\n	<li>Marketing</li>\r\n</ul>\r\n\r\n<p>CEDU tin rằng&nbsp; sẽ l&agrave; nh&agrave; đồng h&agrave;nh tri thức&nbsp; đ&aacute;ng tin c&acirc;y cho c&aacute;c bạn học sinh, sinh vi&ecirc;n v&agrave; doanh nghiệp cho những dự định tương lai của c&aacute;c bạn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/c_edu/public/upload/files/7mj_baocaotaichinh2.jpg\" style=\"height:325px; width:639px\" /></p>', '2018-05-18 03:01:58', '2018-06-06 02:12:51'),
(2, 'Điều khoản', 'dieu-khoan', '<p><strong>ĐIỀU KHOẢN SỬ DỤNG DỊCH VỤ</strong></p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một số điều khoản sử dụng d&agrave;nh cho học vi&ecirc;n v&agrave; đối t&aacute;c CEDU</p>\r\n\r\n<p>Xin h&atilde;y đọc kĩ thỏa thuận trước khi bạn đăng k&iacute; tham gia tr&ecirc;n CEDU ( bao gồm : CTV, Giảng Vi&ecirc;n ) ch&uacute;ng t&ocirc;i sẽ hiểu rằng bạn đ&atilde; đọc v&agrave; đồng &yacute; to&agrave;n bộ điều khoản được đưa ra trong bản thỏa thuận n&agrave;y .</p>\r\n\r\n<p>Bản cập nhất mới nhất điều khoản của CEDU sẽ được cập nhật tại đ&acirc;y !</p>\r\n\r\n<p><strong>ĐIỀU KHOẢN CHUNG :</strong></p>\r\n\r\n<p><strong>Điều 1: Th&ocirc;ng tin t&agrave;i khoản c&aacute; nh&acirc;n</strong></p>\r\n\r\n<p>Khi đăng k&yacute; t&agrave;i khoản CEDU, để được hỗ trợ nhanh ch&oacute;ng, bạn cần cung cấp đầy đủ v&agrave; ch&iacute;nh x&aacute;c c&aacute;c th&ocirc;ng tin: Họ t&ecirc;n, Email, Mobile.</p>\r\n\r\n<p>Bạn cần đăng nhập v&agrave;o email c&aacute; nh&acirc;n để x&aacute;c nhận th&ocirc;ng tin. Ch&uacute;ng t&ocirc;i sẽ gửi email k&iacute;ch hoạt kh&oacute;a học, th&ocirc;ng b&aacute;o chương tr&igrave;nh khuyến m&atilde;i, x&aacute;c nhận đổi mật khẩu,... v&agrave;o địa chỉ email của bạn. Những trường hợp điền thiếu th&ocirc;ng tin hoặc th&ocirc;ng tin sai sự thật sẽ kh&ocirc;ng được giải quyết khi c&oacute; xảy ra c&aacute;c sự cố xảy ra với t&agrave;i khoản.</p>\r\n\r\n<p><strong>Điều 2: Việc bảo mật th&ocirc;ng tin</strong></p>\r\n\r\n<ul>\r\n	<li>Bạn c&oacute; tr&aacute;ch nhiệm tự m&igrave;nh bảo quản mật khẩu, nếu mật khẩu bị lộ ra ngo&agrave;i dưới bất kỳ h&igrave;nh thức n&agrave;o, CEDU sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm về mọi tổn thất ph&aacute;t sinh.</li>\r\n	<li>Mọi th&ocirc;ng tin c&aacute; nh&acirc;n của bạn sẽ được ch&uacute;ng t&ocirc;i bảo mật, kh&ocirc;ng tiết lộ ra ngo&agrave;i. Ch&uacute;ng t&ocirc;i kh&ocirc;ng b&aacute;n hay trao đổi những th&ocirc;ng tin n&agrave;y với bất kỳ một b&ecirc;n thứ ba n&agrave;o kh&aacute;c. Tuy nhi&ecirc;n, trong trường hợp cơ quan chức năng y&ecirc;u cầu, CEDU buộc phải cung cấp những th&ocirc;ng tin n&agrave;y theo quy định ph&aacute;p luật.</li>\r\n	<li>Bạn kh&ocirc;ng được download video, kh&ocirc;ng được chia sẻ video l&ecirc;n Internet với bất kỳ h&igrave;nh thức n&agrave;o. Nếu vi phạm, t&agrave;i khoản của bạn sẽ bị kho&aacute; v&agrave; bạn phải chịu tr&aacute;ch nhiệm trước ph&aacute;p luật về h&agrave;nh vi x&acirc;m phạm sở hữu tr&iacute; tuệ.</li>\r\n	<li>CEDU c&oacute; thể gửi th&ocirc;ng b&aacute;o t&igrave;nh h&igrave;nh học tập, chương tr&igrave;nh khuyến m&atilde;i (nếu c&oacute;), th&ocirc;ng b&aacute;o kh&oacute;a học mới sắp ra mắt để học vi&ecirc;n quan t&acirc;m c&oacute; thể đăng k&yacute; ngay để được ưu đ&atilde;i.</li>\r\n	<li>\r\n	<p><strong>Điều 3: Đ&aacute;nh gi&aacute; kh&oacute;a học v&agrave; thảo luận</strong></p>\r\n\r\n	<p>Học vi&ecirc;n khi tham gia kh&oacute;a học tr&ecirc;n CEDU c&oacute; quyền đ&aacute;nh gi&aacute; về chất lượng kh&oacute;a học.</p>\r\n\r\n	<p>Trong qu&aacute; tr&igrave;nh học, học vi&ecirc;n c&oacute; bất kỳ thắc mắc hay g&oacute;p &yacute; n&agrave;o c&oacute; thể đăng b&igrave;nh luận của m&igrave;nh l&ecirc;n phần Thảo luận - ngay trong giao diện b&agrave;i học để được chuy&ecirc;n vi&ecirc;n CEDU v&agrave; Giảng vi&ecirc;n hỗ trợ giải đ&aacute;p.</p>\r\n\r\n	<p>B&ecirc;n cạnh đ&oacute;, mỗi kh&oacute;a học tr&ecirc;n CEDU đều c&oacute; 1 Group Thảo luận ri&ecirc;ng cho c&aacute;c học vi&ecirc;n v&agrave; giảng vi&ecirc;n để trao đổi c&aacute;c vấn đề chuy&ecirc;n m&ocirc;n.</p>\r\n\r\n	<p><strong>Điều 4: Nghi&ecirc;m cấm sử dụng dịch vụ với c&aacute;c h&agrave;nh vi dưới đ&acirc;y</strong></p>\r\n	</li>\r\n	<li>Sử dụng bất kỳ c&ocirc;ng cụ hay h&igrave;nh thức n&agrave;o để can thiệp v&agrave;o c&aacute;c dịch vụ, kh&oacute;a học trong hệ thống CEDU</li>\r\n	<li>Ph&aacute;t t&aacute;n hoặc tuy&ecirc;n truyền cổ vũ c&aacute;c hoạt động ph&aacute;t t&aacute;n, can thiệp v&agrave; ph&aacute; hoại nội dung c&aacute;c b&agrave;i học tr&ecirc;n hệ thống của CEDU ra b&ecirc;n ngo&agrave;i. Mọi vi phạm khi bị ph&aacute;t hiện sẽ bị x&oacute;a t&agrave;i khoản v&agrave; c&oacute; thể xử l&yacute; theo quy định của ph&aacute;p luật về việc vi phạm bản quyền.</li>\r\n	<li>Sử dụng chung t&agrave;i khoản: với việc tr&ecirc;n 2 người c&ugrave;ng sử dụng chung một t&agrave;i khoản khi bị ph&aacute;t hiện sẽ bị x&oacute;a t&agrave;i khoản ngay lập tức.</li>\r\n	<li>H&agrave;nh vi mạo nhận hay cố &yacute; l&agrave;m người kh&aacute;c tưởng lầm m&igrave;nh l&agrave; một người sử dụng kh&aacute;c trong hệ thống dịch vụ của CEDU</li>\r\n	<li>H&agrave;nh vi, th&aacute;i độ l&agrave;m tổn hại đến uy t&iacute;n của c&aacute;c sản phẩm, dịch vụ, kh&oacute;a học trong hệ thống CEDU dưới bất kỳ h&igrave;nh thức n&agrave;o, phương thức n&agrave;o.</li>\r\n	<li>Mạo danh CEDU ảnh hưởng đến uy t&iacute;n của CEDU , g&acirc;y sự nhầm lẫn cho c&aacute;c học vi&ecirc;n v&agrave; đối t&aacute;c theo bất kỳ phương thức n&agrave;o (d&ugrave;ng địa chỉ email, t&ecirc;n miền website, fanpage c&oacute; chữ CEDU...)</li>\r\n	<li>Khi ph&aacute;t hiện những h&agrave;nh vi tr&ecirc;n từ t&agrave;i khoản của bạn, CEDU c&oacute; quyền tước bỏ mọi quyền lợi li&ecirc;n quan đối với t&agrave;i khoản (bao gồm việc kh&oacute;a t&agrave;i khoản) hoặc sử dụng những th&ocirc;ng tin m&agrave; bạn cung cấp khi đăng k&yacute; t&agrave;i khoản để chuyển cho cơ quan chức năng giải quyết theo quy định của ph&aacute;p luật.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ĐIỀU KHOẢN ĐỐI VỚI CTV</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Điều 5: Quy định về việc ph&acirc;n phối kh&oacute;a học d&agrave;nh cho CTV</strong></p>\r\n\r\n<ul>\r\n	<li>CTV của CEDU sẽ được cấp một m&atilde; CTV d&agrave;nh để b&aacute;n kh&oacute;a học v&agrave; quản l&yacute; kh&oacute;a học đ&atilde; b&aacute;n được.</li>\r\n	<li>CTV kh&ocirc;ng được cung cấp t&agrave;i khoản v&agrave; mật khẩu của m&igrave;nh tr&aacute;nh g&acirc;y mất m&aacute;t.</li>\r\n	<li>CTV kh&ocirc;ng được n&oacute;i xấu CEDU , nếu bị ph&aacute;t hiện sẽ kh&ocirc;ng được trả doanh thu b&aacute;n được trong th&aacute;ng đ&oacute;.</li>\r\n	<li>Nếu 3 th&aacute;ng trở l&ecirc;n m&agrave; CTV kh&ocirc;ng c&oacute; doanh số sẽ kh&ocirc;ng được b&aacute;n c&aacute;c kh&oacute;a học của CEDU .</li>\r\n</ul>\r\n\r\n<p><strong>ĐIỀU KHOẢN ĐỐI VỚI GIẢNG VI&Ecirc;N</strong></p>\r\n\r\n<p><strong>Điều 6: Về chương tr&igrave;nh khuyến m&atilde;i , trao tặng kh&oacute;a học .</strong></p>\r\n\r\n<p>CEDU được chủ động thực hiện c&aacute;c chương tr&igrave;nh khuyến mại, combo nhằm mục ti&ecirc;u gia tăng doanh thu cho đối t&aacute;c v&agrave; CEDU m&agrave; kh&ocirc;ng cần b&aacute;o trước cho đối t&aacute;c. Đối t&aacute;c gửi email th&ocirc;ng b&aacute;o tới info@ceduvn.com&nbsp; khi kh&ocirc;ng muốn tham gia v&agrave;o c&aacute;c chương tr&igrave;nh khuyến mại n&agrave;y hoặc điều chỉnh mức gi&aacute; trong phần C&agrave;i đặt kh&oacute;a học.</p>\r\n\r\n<p><strong>THANH TO&Aacute;N</strong></p>\r\n\r\n<p><strong>Điều 7: Thanh to&aacute;n hoa hồng , thưởng</strong></p>\r\n\r\n<p>Đối T&aacute;c của CEDU sẽ được chia sẻ doanh thu theo thỏa thuận của CEDU với Đối T&aacute;c. Đối với chương tr&igrave;nh hợp t&aacute;c giữa CTV v&agrave; Giảng vi&ecirc;n lợi nhuận s&eacute; được trả như sau :</p>\r\n\r\n<ul>\r\n	<li>Thanh to&aacute;n bằng chuyển khoản hoặc nhận trực tiếp tại văn ph&ograve;ng c&ocirc;ng ty</li>\r\n	<li>Doanh thu từ chương tr&igrave;nh đối t&aacute;c sẽ được hạch to&aacute;n theo th&aacute;ng v&agrave; chi trả chậm nhất v&agrave;o ng&agrave;y 15 của th&aacute;ng kế tiếp (c&oacute; trường hợp trễ do hệ thống ng&acirc;n h&agrave;ng hoặc tr&ugrave;ng v&agrave;o c&aacute;c ng&agrave;y nghỉ). Hạn mức thanh to&aacute;n: 500.000đ với CTV v&agrave; 1.000.000 với Giảng vi&ecirc;n. Nếu chưa đủ hạn mức th&igrave; thu nhập sẽ được tự động chuyển sang th&aacute;ng tiếp theo</li>\r\n	<li>ĐUA TOP CTV : Nhắm khuyến kh&iacute;ch đối t&aacute;c hoạt động t&iacute;ch cực hơn , CEDU c&oacute; cuộc đua top CTV nhằm kh&iacute;ch lệ những CTV c&oacute; hoạt động b&aacute;n h&agrave;ng v&agrave; doanh thu tốt nhất &ndash; Chương tr&igrave;nh đua TOP CTV sẽ tổng kết theo qu&yacute; v&agrave; đưa ra danh s&aacute;ch những bạn xếp top b&aacute;n h&agrave;ng v&agrave; c&oacute; c&aacute;c mức thưởng hấp dẫn kh&aacute;c .</li>\r\n</ul>\r\n\r\n<p><strong>HỦY THỎA THUẬN HỢP T&Aacute;C</strong></p>\r\n\r\n<p><strong>Điều 11: Hủy thỏa thuận hợp t&aacute;c</strong></p>\r\n\r\n<p>Bất kỳ hoạt động gian lận hay c&aacute;c h&agrave;nh vi vi phạm một trong c&aacute;c điều khoản n&oacute;i tr&ecirc;n sẽ dẫn đến việc dừng thoả thuận hợp t&aacute;c, hoặc cao hơn l&agrave; kh&oacute;a t&agrave;i khoản v&agrave; hủy mọi kết quả kiếm được tại Ceduvn.com m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o trước.</p>', '2018-05-18 03:07:59', '2018-06-06 02:14:53'),
(3, 'Chính sách bảo mật', 'chinh-sach-bao-mat', '<p><strong>I.Thu thập th&ocirc;ng tin c&aacute; nh&acirc;n</strong></p>\r\n\r\n<p>CEDU thu thập th&ocirc;ng tin c&aacute; nh&acirc;n như t&ecirc;n , địa chỉ email của kh&aacute;ch h&agrave;ng để thiết lập hồ sơ c&aacute; nh&acirc;n , th&ocirc;ng tin c&aacute; nh&acirc;n sẽ được m&atilde; h&oacute;a bảo mật tr&ecirc;n hệ thống.</p>\r\n\r\n<p><strong>II. Sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n</strong></p>\r\n\r\n<p>Khi y&ecirc;u cầu khai b&aacute;o c&aacute; nh&acirc;n , CEDU mong muốn cung cấp dịch vụ tốt nhất cho kh&aacute;ch h&agrave;ng . CEDU t&ocirc;n trọng sự ri&ecirc;ng tư v&agrave; sẽ bảo mật tuyệt đối th&ocirc;ng tin kh&aacute;ch h&agrave;ng .</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng tin thu thập của kh&aacute;ch h&agrave;ng th&ocirc;ng qua website gi&uacute;p CEDU :</p>\r\n\r\n<ul>\r\n	<li>Tư vấn cho kh&aacute;ch h&agrave;ng qua điện thoại.</li>\r\n	<li>Giải đ&aacute;p thắc mắc kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Cung cấp cho kh&aacute;ch h&agrave;ng th&ocirc;ng tin mới nhất về CEDU.</li>\r\n	<li>Thực hiện c&aacute;c bản khảo s&aacute;t kh&aacute;ch h&agrave;ng.</li>\r\n	<li>Thực hiện c&aacute;c hoạt động quảng b&aacute; li&ecirc;n quan đến c&aacute;c kh&oacute;a học.</li>\r\n</ul>\r\n\r\n<p>Bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng l&agrave; nhiệm vụ của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i lu&ocirc;n t&ocirc;n trong kh&aacute;ch h&agrave;ng v&agrave; mong muốn những th&ocirc;ng tin kh&aacute;ch h&agrave;ng cung cấp được bảo mật tốt nhất.</p>\r\n\r\n<p><strong>III. Thơi gian lưu trữ th&ocirc;ng tin</strong></p>\r\n\r\n<p>CEDU sẽ giữ th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng cho đến khi t&agrave;i khoản của học vi&ecirc;n ngừng hoạt động. CEDU sẽ lưu giữ v&agrave; sử dụng th&ocirc;ng tin của kh&aacute;ch h&agrave;ng khi cần tu&acirc;n theo nghĩa vụ ph&aacute;p l&yacute;, giải quyết tranh chấp v&agrave; thực thi c&aacute;c thoả thuận của CEDU</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng c&oacute; thể xo&aacute; hoặc v&ocirc; hiệu ho&aacute; t&agrave;i khoản bất k&igrave; l&uacute;c n&agrave;o bằng c&aacute;ch li&ecirc;n hệ với CEDU.</p>\r\n\r\n<p><strong>IV. Thu thập v&agrave; loại bỏ th&ocirc;ng tin</strong></p>\r\n\r\n<p>Nếu kh&aacute;ch h&agrave;ng muốn thay đổi th&ocirc;ng tin c&aacute; nh&acirc;n hoặc kh&ocirc;ng muốn sử dụng dịch vụ của CEDU nữa, kh&aacute;ch h&agrave;ng c&oacute; thể sửa chữa, thay đổi , bổ sung hoặc x&oacute;a c&aacute;c dịch vụ m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; đăng k&iacute;, li&ecirc;n hệ với Hỗ trợ Kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i hoặc gọi điện, gửi thư bưu điện đến địa điểm được ghi dưới đ&acirc;y. Ch&uacute;ng t&ocirc;i sẽ hồi đ&aacute;p y&ecirc;u cầu truy vấn th&ocirc;ng tin c&aacute; nh&acirc;n của bạn trong v&ograve;ng 15 ng&agrave;y. CEDU sẽ giữ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho đến khi t&agrave;i khoản của bạn ngưng hoạt động v&agrave;o c&aacute;c t&igrave;nh huống cần thiết để cung cấp dịch vụ cho bạn. Ch&uacute;ng t&ocirc;i sẽ lưu giữ v&agrave; sử dụng th&ocirc;ng tin của bạn khi cần thiết tu&acirc;n theo nghĩa vụ ph&aacute;p l&yacute;, giải quyết tranh chấp v&agrave; thực thi c&aacute;c thoả thuận của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<ul>\r\n	<li>Bi&ecirc;n tập hồ sơ của kh&aacute;ch h&agrave;ng: Kh&aacute;ch h&agrave;ng c&oacute; thể thay đổi hồ sơ bất k&igrave; l&uacute;c n&agrave;o bằng c&aacute;ch cập nhật trong t&agrave;i khoản c&aacute; nh&acirc;n. Thay đổi của kh&aacute;ch h&agrave;ng sẽ được cập nhật ngay sau đ&oacute;.</li>\r\n	<li>Xo&aacute; hoặc v&ocirc; hiệu ho&aacute; hồ sơ: Kh&aacute;ch h&agrave;ng c&oacute; thể xo&aacute; hoặc v&ocirc; hiệu ho&aacute; bất k&igrave; l&uacute;c n&agrave;o bằng c&aacute;ch li&ecirc;n hệ với CEDU.</li>\r\n	<li>Loại bỏ hồ sơ tr&aacute;i ph&eacute;p: Nếu kh&aacute;ch h&agrave;ng muốn y&ecirc;u cầu loại bỏ những hồ sơ tr&aacute;i ph&eacute;p, h&atilde;y li&ecirc;n hệ với CEDU.<strong>V. Địa chỉ của đơn vị thu thập th&ocirc;ng tin kh&aacute;ch h&agrave;ng\\</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>C&ocirc;ng ty TNHH Gi&aacute;o Dục C&ocirc;ng Nghệ Số CEDU</strong></p>\r\n\r\n<p>Trụ sở ch&iacute;nh : Tầng 6, To&agrave; nh&agrave; Cphone, 456 X&ocirc; Viết Nghệ Tĩnh, Phường 25, Quận B&igrave;nh Thạnh, Hồ Ch&iacute; Minh</p>\r\n\r\n<p>Số điện thoại : 02.822.691.333</p>\r\n\r\n<p>Văn ph&ograve;ng giao dịch : Tầng 5, T&ograve;a Nh&agrave; Diamond Flower, Số 1 Ho&agrave;ng Đạo Th&uacute;y, Thanh Xu&acirc;n, H&agrave; Nội</p>\r\n\r\n<p>Nếu bạn c&oacute; bất k&igrave; c&acirc;u hỏi n&agrave;o về hệ thống ch&iacute;nh s&aacute;ch, hoặc bất k&igrave; thắc mắc về CEDU, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i theo th&ocirc;ng tin sau để được hỗ trợ kịp thời.</p>\r\n\r\n<p>Hotline : 02.473.016.366</p>\r\n\r\n<p>Email : cskh@ceduvn.com</p>', '2018-05-18 03:08:25', '2018-06-06 02:15:48'),
(4, 'Quy chế hoạt động', 'quy-che-hoat-dong', '<p><strong>I.Nguyễn Tắc Chung</strong></p>\r\n\r\n<p>S&agrave;n giao dịch điện tử www.Ceduvn.com do C&ocirc;ng Ty TNHH Gi&aacute;o Dục C&ocirc;ng Nghệ Số CEDU thực hiện v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p><strong>II.Quy Định Chung</strong></p>\r\n\r\n<ul>\r\n	<li>Kh&oacute;a học trực tuyến: L&agrave; tập hợp c&aacute;c B&agrave;i giảng đa phương tiện theo một chủ đề nhất định</li>\r\n	<li>Gi&aacute; b&aacute;n (Ph&iacute; dịch vụ): l&agrave; chi ph&iacute; m&agrave; kh&aacute;ch h&agrave;ng phải trả để mua quyền truy cập 01 (một) Kh&oacute;a đ&agrave;o tạo trực tuyến cụ thể do CEDU cung cấp. Gi&aacute; b&aacute;n đăng tr&ecirc;n website CEDU đ&atilde; bao gồm Thuế gi&aacute; trị gia tăng. Kh&aacute;ch h&agrave;ng chỉ cần thanh to&aacute;n 1 kh&oacute;a học 1 lần v&agrave; c&oacute; thể học m&atilde;i m&atilde;i.</li>\r\n	<li>Đối t&aacute;c sản xuất nội dung: CEDU cộng t&aacute;c với c&aacute;c giảng vi&ecirc;n / chuy&ecirc;n gia / chuy&ecirc;n vi&ecirc;n / nh&acirc;n sự cấp cao / cấp quản l&yacute; / doanh nh&acirc;n c&oacute; năng lực, c&oacute; khả năng giảng dạy tốt, kỹ năng truyền đạt dễ hiểu, ng&ocirc;n ngữ cơ thể tốt.</li>\r\n	<li>C&aacute;c giảng vi&ecirc;n / chuy&ecirc;n gia / chuy&ecirc;n vi&ecirc;n hợp t&aacute;c với CEDU soạn thảo kh&oacute;a học chất lượng về nội dung. Video b&agrave;i giảng được quay phim, bi&ecirc;n tập h&igrave;nh ảnh v&agrave; sản xuất hậu kỳ chuy&ecirc;n nghiệp tại CEDU.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>III. QUY TR&Igrave;NH GIAO DỊCH</strong></p>\r\n\r\n<p><strong>1. Quy tr&igrave;nh d&agrave;nh cho người mua h&agrave;ng</strong></p>\r\n\r\n<p>T&igrave;m kiếm kh&oacute;a học bạn quan t&acirc;m</p>\r\n\r\n<p>T&igrave;m hiểu nội dung kh&oacute;a học</p>\r\n\r\n<p>Đặt mua kh&oacute;a học : Người mua lựa chọn c&aacute;ch thức thanh to&aacute;n (qua chuyển khoản, thanh to&aacute;n trực tiếp tại văn ph&ograve;ng ) .</p>\r\n\r\n<p>Cung cấp c&aacute;c th&ocirc;ng tin địa chỉ nhận h&agrave;ng (COD); Người mua nhận m&atilde;, tiến h&agrave;nh k&iacute;ch hoạt m&atilde;</p>\r\n\r\n<p>Người mua k&iacute;ch hoạt kh&oacute;a học trực tiếp tr&ecirc;n website Ceduvn.com</p>\r\n\r\n<p><strong>2. Quy trinh giao nhận vận chuyển</strong></p>\r\n\r\n<p><strong>Thanh to&aacute;n trực tiếp bằng tiền mặt</strong></p>\r\n\r\n<p>Khi kh&aacute;ch h&agrave;ng đ&oacute;ng tiền trực tiếp tại quầy giao dịch thuộc Hệ thống của CEDU , kh&aacute;ch h&agrave;ng sẽ được k&iacute;ch hoạt ngay t&agrave;i&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; khoản hoặc nhận Phiếu chứa m&atilde; k&iacute;ch hoạt</p>\r\n\r\n<p><strong>Thanh to&aacute;n trực tuyến bằng thẻ ATM hoặc Visa/Master</strong></p>\r\n\r\n<p>Sau khi kh&aacute;ch h&agrave;ng tiến h&agrave;nh thanh to&aacute;n trực tiếp th&agrave;nh c&ocirc;ng, kh&aacute;ch h&agrave;ng c&oacute; thể tiến h&agrave;nh học tập ngay lập tức.</p>\r\n\r\n<p><strong>Thanh to&aacute;n bằng chuyển khoản hoặc dịch vụ COD</strong></p>\r\n\r\n<p>Đối với h&igrave;nh thức COD : Khi chọn h&igrave;nh thức n&agrave;y bạn phải thanh to&aacute;n th&ecirc;m ph&iacute; ship</p>\r\n\r\n<p>Sau khi nhận được th&ocirc;ng tin đặt h&agrave;ng của Kh&aacute;ch h&agrave;ng, CEDU sẽ li&ecirc;n lạc để x&aacute;c nhận ch&iacute;nh x&aacute;c địa chỉ, số điện thoại. Nh&acirc;n vi&ecirc;n giao h&agrave;ng của CEDU sẽ li&ecirc;n lạc với bạn để giao M&atilde; k&iacute;ch hoạt để bạn c&oacute; thể tự k&iacute;ch hoạt t&agrave;i khoản của m&igrave;nh v&agrave; tham gia v&agrave;o học ngay.</p>\r\n\r\n<p>Thời gian giao h&agrave;ng: Chậm nhất 7 ng&agrave;y.</p>\r\n\r\n<p><strong>3. Quy tr&igrave;nh x&aacute;c nhận/hủy đơn h&agrave;ng v&agrave; bảo h&agrave;nh</strong></p>\r\n\r\n<p>Nếu Kh&aacute;ch h&agrave;ng đang học cảm thấy kh&oacute;a học kh&ocirc;ng hiệu quả, kh&aacute;ch h&agrave;ng c&oacute; thể gọi đến hotline 02.473.016.366 để được tư vấn hướng dẫn thay đổi kh&oacute;a học.</p>\r\n\r\n<p><strong>IV. QUY TR&Igrave;NH THANH TO&Aacute;N</strong></p>\r\n\r\n<p><strong>1. Giao kh&oacute;a học v&agrave; thu hộ COD</strong></p>\r\n\r\n<p>Bạn cung cấp cho CEDU th&ocirc;ng tin ch&iacute;nh x&aacute;c họ t&ecirc;n , địa chỉ , số điện thoại . Nh&acirc;n vi&ecirc;n giao h&agrave;ng của CEDU sẽ li&ecirc;n lạc v&agrave; giao m&atilde; k&iacute;ch hoạt cho bạn.</p>\r\n\r\n<p><strong>2. Thanh to&aacute;n trực tiếp tiền mặt</strong></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch đến quầy giao dịch thuộc Hệ thống CEDU để thực hiện thanh to&aacute;n, nh&acirc;n vi&ecirc;n của CEDU sẽ hướng dẫn Qu&yacute; kh&aacute;ch. Qu&yacute; kh&aacute;ch lưu &yacute; khi thanh to&aacute;n sẽ c&oacute; &ldquo;Phiếu thu&rdquo; của C&ocirc;ng ty TNHH Gi&aacute;o Dục C&ocirc;ng Nghệ Số CEDU.</p>\r\n\r\n<p>Địa chỉ văn ph&ograve;ng tại H&agrave; Nội :</p>\r\n\r\n<p>Tầng 5, T&ograve;a Nh&agrave; Diamond Flower, Số 1 Ho&agrave;ng Đạo Th&uacute;y, Thanh Xu&acirc;n, H&agrave; Nội</p>\r\n\r\n<p>(Thời gian l&agrave;m việc: từ 8:30 - 17:30 , từ Thứ 2 đến Thứ 6 h&agrave;ng tuần)</p>\r\n\r\n<p>Địa chỉ văn ph&ograve;ng tại th&agrave;nh phố Hồ Ch&iacute; Minh :</p>\r\n\r\n<p>Tầng 4, 5, 6 CPHONE Tower, Số 456 X&ocirc; Viết Nghệ Tĩnh, P25, Q B&igrave;nh Thạnh, HCM (Thời gian l&agrave;m việc: từ 8:30 - 17:30 , từ Thứ 2 đến Thứ 6 h&agrave;ng tuần)</p>\r\n\r\n<p><strong>3. Thanh to&aacute;n chuyển khoản :</strong></p>\r\n\r\n<p>Bạn c&oacute; thể đến bất kỳ ng&acirc;n h&agrave;ng n&agrave;o ở Việt Nam (hoặc sử dụng Internet Banking) để chuyển tiền theo th&ocirc;ng tin b&ecirc;n dưới:</p>\r\n\r\n<p>Số t&agrave;i khoản : 901118888</p>\r\n\r\n<p>Chủ t&agrave;i khoản : C&Ocirc;NG TY TNHH GI&Aacute;O DỤC C&Ocirc;NG NGHỆ SỐ CEDU</p>\r\n\r\n<p>Ng&acirc;n h&agrave;ng : Ng&acirc;n h&agrave;ng TMCP &Aacute; Ch&acirc;u ACB - Chi nh&aacute;nh : &nbsp;Linh Đ&agrave;m &ndash; H&agrave; Nội</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>V. ĐẢM BẢO AN TO&Agrave;N KHI GIAO DỊCH</strong></p>\r\n\r\n<p>Người mua tuyệt đối kh&ocirc;ng sử dụng bất kỳ chương tr&igrave;nh, c&ocirc;ng cụ hay h&igrave;nh thức n&agrave;o kh&aacute;c để can thiệp v&agrave;o hệ thống hay l&agrave;m thay đổi cấu tr&uacute;c dữ liệu. Nghi&ecirc;m cấm việc ph&aacute;t t&aacute;n, truyền b&aacute; hay cổ vũ cho bất kỳ hoạt động n&agrave;o nhằm can thiệp, ph&aacute; hoại hay x&acirc;m nhập của hệ thống website. Mọi vi phạm sẽ bị xử l&yacute; theo Quy chế v&agrave; quy định của ph&aacute;p luật.</p>\r\n\r\n<p>Mọi th&ocirc;ng tin giao dịch được bảo mật, trừ trường hợp buộc phải cung cấp khi Cơ quan ph&aacute;p luật y&ecirc;u cầu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>VI.TR&Aacute;CH NHIỆM TRONG TRƯỜNG HỢP PH&Aacute;T SINH LỖI </strong></p>\r\n\r\n<p>Nếu gặp kh&oacute; khăn về kỹ thuật kh&aacute;ch h&agrave;ng c&oacute; thể Li&ecirc;n hệ với CEDU trong giờ h&agrave;nh ch&iacute;nh để được hỗ trợ kịp thời.</p>\r\n\r\n<p>Hotline: 02.473.016.366</p>\r\n\r\n<p>Email: cskh@ceduvn.com</p>\r\n\r\n<p>C&aacute;c dịch vụ hỗ trợ cụ thể như sau:</p>\r\n\r\n<p>- Dịch vụ xử l&yacute; c&aacute;c lỗi kỹ thuật.</p>\r\n\r\n<p><strong>- </strong>Dịch vụ giải đ&aacute;p thắc mắc v&agrave; tư vấn về sản phẩm.</p>', '2018-05-18 03:10:47', '2018-06-06 02:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdrawn` bigint(20) DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gender` tinyint(4) DEFAULT '1',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `level` tinyint(4) NOT NULL COMMENT '1: Admin, 2: Quản trị viên, 3: Biên tập viên, 4: Kế toán, 5: Quản trị giáo viên, 6: Quản trị CTV, 7: Giáo viên, 8: CTV, 9: Người dùng',
  `teacher_wait` tinyint(4) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `img`, `email`, `withdrawn`, `phone`, `gender`, `address`, `birthday`, `password`, `content`, `level`, `teacher_wait`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(1, 'admin', 'hs_2018-06-12_1528789965.jpeg', 'admin@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$qesMSEyDH2JGnmUmJZBSJ.OULmfFopxUFyusW2mlhgZJO1oZZxaY.', '<p>Tao l&agrave; boss</p>', 1, 0, 'oymiF2tOa3AkdpmO6mb2BYSqFYyu77x9sJHoFrjRoh2lqlcc8y2EqdY8z9Hn', '2018-04-04 00:03:55', '2018-06-12 07:52:45', '', ''),
(3, 'Quyến Đỗ', 'hs_2018-08-24_1535100409.jpeg', 'vquyenaaa@gmail.com', NULL, '1788033008', 1, 'Hà Lội', '14/12/1996', '$2y$10$404NHMnsBCagsGQ0G6zUvebR7NUyPrwP2MnbMgQgi/xzhU/N8s4Pq', NULL, 9, 0, '19VgzAZXtiKax3H1JMEAgh0iDysHK2iUJrNNarCIV2a60wyan6lcOHoJ3tT6', '2018-04-04 00:03:55', '2018-08-24 09:42:53', '', ''),
(4, 'Xuân Hùng', 'hs_2018-06-12_1528789850.jpeg', 'xuanhung2401@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$S97XOu6vWRg1wKVnw6wNGuWyZMpOo/7eQycL6S.SExh4qCp0K6AUy', '<p>L&agrave; một nh&acirc;n vi&ecirc;n của một tập đo&agrave;n lớn của Việt Nam nhưng chị lu&ocirc;n d&agrave;nh thời gian rảnh rỗi của m&igrave;nh cho sở th&iacute;ch nấu nướng v&agrave; l&agrave;m b&aacute;nh. Tuy bận rộn nhưng chị lu&ocirc;n c&oacute; th&oacute;i quen t&igrave;m hiểu tận gốc nguy&ecirc;n liệu để tạo ra c&ocirc;ng thức nấu ăn cũng như l&agrave;m b&aacute;nh Từ năm 2016 chị bắt đầu l&agrave;m quen với kem bơ. Bằng việc lu&ocirc;n t&igrave;m t&ograve;i, nghi&ecirc;n cứu tận gốc c&ocirc;ng thức chị c&oacute; rất nhiều kinh nghiệm tạo ra những c&ocirc;ng thức cốt b&aacute;nh v&agrave; kem bơ ngon v&agrave; dễ ăn.</p>', 7, 0, '4lPpDrwu1ZJKdc4c7Kksa3n7EhXtrUTksvkMRjxIAW01dJsMQWFgu20Low9M', '2018-04-04 00:08:16', '2018-06-19 03:19:28', '', ''),
(5, 'Phan Huy', 'user.png', 'phanhuy@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$sdgwcuzBYJ04a76ZunNsYOOQYv2/L3K7XmAWtXmud2zbHNBnO3vCK', '<p>OK</p>', 9, 0, NULL, '2018-04-04 00:34:46', '2018-06-19 03:20:31', '', ''),
(11, 'Mỹ Duyên', 'hs_2018-06-12_1528789829.jpeg', 'duyenmy@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$23MQ8m4tGrPdfFbqarolyOzQeJNUei2QUXxj/g1LNiNd0vmCxUjlG', '<p>- Chuy&ecirc;n gia trang điểm Mỹ Duy&ecirc;n l&agrave; một trong những &ldquo;nữ ph&ugrave; thủy&rdquo; make-up với nhiều năm kinh nghiệm l&agrave;m đẹp v&agrave; đ&agrave;o tạo trang điểm. Mỹ Duy&ecirc;n l&agrave; nữ CEO trẻ tuổi xinh đẹp của c&ocirc;ng ty TNHH NYD về mỹ phẩm v&agrave; l&agrave;m đẹp.</p>\r\n\r\n<p>- Với t&acirc;m huyết chia sẻ điều m&igrave;nh c&oacute; để l&agrave;m đẹp cho ph&aacute;i yếu m&agrave; một trong những động lực gi&uacute;p Mỹ Duy&ecirc;n triển khai rất nhiều dự &aacute;n hỗ trợ v&agrave; chia sẻ kiến thức trang điểm, l&agrave;m đẹp đến với nhiều người.</p>', 7, 0, NULL, '2018-04-04 02:16:44', '2018-06-19 03:19:29', '', ''),
(12, 'Tuấn Sơn', 'hs_2018-06-12_1528789820.jpeg', 'tuanson.site3@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$EzZyZZB4OFHiAH.JjBQYkubAmowCYTJCV392ctJtXMxL0YYC7hnb2', '<p>Tổ trưởng bộ m&ocirc;n Kỹ năng sống tại trường song ngữ li&ecirc;n cấp quốc tế Wellspring S&agrave;i G&ograve;n , Tốt nghiệp Cử nh&acirc;n T&acirc;m l&yacute; - gi&aacute;o dục loại giỏi.</p>\r\n\r\n<p>- Tốt nghiệp kh&oacute;a học l&atilde;nh đạo Ch&acirc;u &Aacute; - Way to Success.</p>\r\n\r\n<p>- Quản l&yacute; c&aacute;c kh&oacute;a học Kỹ năng sống tại c&ocirc;ng ty tư vấn kinh doanh v&agrave; gi&aacute;o dục SeedGlobal Consultant Co.</p>\r\n\r\n<p>- Thiết kế chương tr&igrave;nh Tham vấn t&acirc;m l&yacute; cho sinh vi&ecirc;n Đại học FPT - TP. HCM.</p>\r\n\r\n<p>- Tham vấn t&acirc;m l&yacute; học đường cho 6 trường học tr&ecirc;n địa b&agrave;n TP. HCM.</p>\r\n\r\n<p>- Ph&aacute;t thanh vi&ecirc;n dự &aacute;n Đọc s&aacute;ch n&oacute;i cho người khiếm thị do Trung t&acirc;m hướng nghiệp v&agrave; c&ocirc;ng nghệ trợ gi&uacute;p cho người m&ugrave; Sao Mai.</p>', 7, 0, NULL, '2018-04-05 20:27:21', '2018-06-23 04:47:49', '', ''),
(13, 'Quyến Đỗ', 'hs_2018-06-12_1528789810.jpeg', 'quyendo.site3@cphonevn.com', NULL, '01688044008', 1, 'Hà Lội', '14/12/1996', '$2y$10$StgDdfa3PG94g3NrphSrOORKsHicygDeU1S0b8u8oyFJQ6hybwoJy', '<p>Anh <strong>Quyến</strong>&nbsp;hiện l&agrave; CEO của VinaLink - đơn vị đ&agrave;o tạo lớn nhất về Digital Marketing tại Việt Nam.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; nơi quy tụ những chuy&ecirc;n gia h&agrave;ng đầu Việt Nam gi&agrave;u kinh nghiệm trong c&aacute;c lĩnh vực Digital Marketing, SEO, Adwords, Brand v&agrave; Facebook ... từng tư vấn v&agrave; đ&agrave;o tạo chiến lược</p>\r\n\r\n<p>Digital Marketing cho c&aacute;c tập đo&agrave;n h&agrave;ng đầu Việt Nam như Vingroup, Vccorp, VNP Group, Bảo Việt, Viettel, Vietnam Airline v.v.</p>\r\n\r\n<p>Ngo&agrave;i c&ocirc;ng việc quản l&yacute; c&ocirc;ng ty, anh Tuấn H&agrave; hiện c&ograve;n l&agrave; Giảng vi&ecirc;n Cao học marketing Ph&aacute;p Việt CFVG, s&aacute;ng lập vi&ecirc;n Cộng đồng truyền th&ocirc;ng tiếp thị Việt Nam VMCC, Chủ tịch CLB SEO/SMM Việt nam, chuy&ecirc;n gia Viral marketing.</p>', 7, 0, 'bZXTHINweFQ72mgTPUEvLguO2Jn1iknlWlARebalMfgglh46dhMwXmBoXCG9', '2018-04-05 20:43:27', '2018-09-05 03:12:26', '', ''),
(14, 'Xuân Trường', 'user.png', 'xuantruong@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$afT5/PTAVPJbBSg7hMKqe.amPGZr6zRKy.uRjYmxkp3agDIC56SWm', '', 9, 0, NULL, '2018-04-22 23:32:44', '2018-06-19 03:20:31', '', ''),
(15, 'Tài smile', 'user.png', 'taismile@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$grUIoCnjLupKVy0xK1AXDOkDUcQKqYR64JXu2BlogPSMzXwicX6Xa', '', 9, 0, 'wcfpfNcSASf7Ymb9YTVRarYvx7eDkEnBCSW78AnUt21fSJBmavmszQiEclZs', '2018-04-22 23:40:12', '2018-06-19 03:20:31', '', ''),
(16, 'Sơn Lều', 'user.png', 'leuson@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$61OcvO4ySQKGvRoIFoe59eecbM/qqYut/3dhsy20Qn4l7.9waDChu', '', 9, 0, NULL, '2018-04-22 23:45:09', '2018-06-19 03:20:31', '', ''),
(17, 'Sơn Lều', 'user.png', 'leuson1@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$bnUCd9NgN3HK8kp/BVFEb.3bp.2o9CsYjYSPFrLG66kE/Yx9hJG0S', '', 9, 0, NULL, '2018-04-22 23:45:50', '2018-06-19 03:20:31', '', ''),
(18, 'DEV Quyến', 'hs_2018-06-12_1528793781.jpeg', 'quyendev@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$JeA6DVH7bU5edwb5pLbZ9e6r1yXpqJ/sG0aJ4Au57MbefbVj81X/e', '<p>OKe Oke</p>', 9, 0, 'VvTdeLge8vEho1WTlVMIl21LIJy8ZFWApq0GRUENlWjTD1mhla2idiXOPoY7', '2018-04-27 02:15:15', '2018-06-19 03:20:31', '', ''),
(19, 'Phương Bùi', 'user.png', 'phươngbui@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$nJg25veHLCcHkQcDl7whWO9lj8dbrPRG.IBVGSQfc4B1YFuyq.QwS', '', 9, 0, NULL, '2018-04-27 02:30:02', '2018-06-19 03:20:31', '', ''),
(21, 'Sơn Lều', 'hs_2018-06-12_1528793763.jpeg', 'sonleu@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$0DgXTmZlLZkEe3F2lUrf8u6ofDkG3B8MCcvHM2Y54K.XMmxMO.bqm', '<p>OK</p>', 8, 0, '2tNyDkCpkBKNbJgvaGG47ZzSA8p0xrzOM7y7jKlHQOWnNgeXguMDEfkkxZtM', '2018-04-27 02:34:54', '2018-09-06 02:46:58', '', ''),
(22, 'ai do', 'user.png', 'xuanhung24011@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$LhSFgJxQh6Xrw8PmcR7XCuoVqdqOzWUbkfTRlxrR444twLg2RGqYi', ' ', 9, 0, '8xsHu0Our5y5eRizlwGZRRzzh9pbFosfhx1KOstuSPvdIyM9vFfciet7eDI1', '2018-04-28 19:51:51', '2018-06-19 03:20:31', '', ''),
(23, 'OKEOK', '1525228673.jpg', 'okeoke@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$MFslt.imUbmpf1tF.l3yy.OfAMsOKgd6sdyEqd8/bURwrcgbDJ9Jy', '<p>OKe OKe</p>', 9, 0, 'Ql3cSMpSr8KiUgjQTvw94IgnVo0LHGJABXZWhNFG4YIxO3WnH6Kj3fIXsQVO', '2018-04-28 19:53:06', '2018-06-19 03:20:31', '', ''),
(24, 'Cao T.Linh', 'hs_2018-06-12_1528789777.jpeg', 'caolinh@gmail.com', NULL, '0123654789', 1, NULL, NULL, '$2y$10$K28HmvC5EOEV1pMIKzs.2O/d6KbMGzzcQVlQgMB8vSTNekuz8V4P2', '<p>fb: oke | Chủ đề giảng dạy: Design | Kinh Nghiệm: 5 năm</p>', 7, 0, 'xyCAaz8JjNml0tuPPTdOeKuSbfPPXJbaFMfvTPe36VR5nCno7yCIJ1Ku1C7Y', '2018-05-18 05:01:51', '2018-06-19 03:19:29', '', ''),
(25, 'Thư Uyển', 'hs_2018-06-12_1528789763.jpeg', 'thuuyen@gmail.com', NULL, '096963231', 1, NULL, NULL, '$2y$10$0aHodA8mtgOKg9W.2WK7SOgfDSH2vOAxa4QUQxCJ7v1qwxuqfqJIe', '<p>Giảng vi&ecirc;n: Thư Uyển&nbsp;(Cầm Xu) - Gi&aacute;m đốc Trung t&acirc;m Tiếng Trung Cầm Xu..L&agrave; người s&aacute;ng lập v&agrave; giảng dạy chương tr&igrave;nh &quot;Học Tiếng Trung dễ như ăn kẹo&quot; thu h&uacute;t nhiều người học nhất tr&ecirc;n Youtube, với gần 7 triệu lượt view v&agrave; 40 ng&agrave;n người theo d&otilde;i..</p>', 7, 0, 'b3s0rEu31oOsRGCP3FILJlCOxSSOnNRMxz978JYovxSTXeoFN9EjkUN8sIk1', '2018-05-18 05:23:05', '2018-06-23 04:43:48', '', ''),
(26, 'Phương Bùi', 'user.png', 'phuong_bui@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$oKUVyA2zOJ8KP7PKpO.YW.jfnKZU/c4WnCTAN1FCw7BB2OTYARK6y', ' ', 9, 0, 'RYhhdHqRjOhWeEMtsIJp7VEG2eqlkPDJyl1R5ThwtNauAQ7YjBuMkeVdf6mY', '2018-05-29 18:21:43', '2018-06-19 03:20:31', NULL, NULL),
(27, 'Đào Đức', 'user.png', 'dao_duc@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$JiF9721YUdBJ2cKmFb.rte.k5Ymm7CVMMGtZWdqjW4tFlF/jBm42u', ' ', 9, 0, 'bXrcVPP2ut70NR86MuBEnvjkEw7u9pfr8dBeeMcRmfwJrz7MeKOIWSdFM8Y7', '2018-05-30 00:39:26', '2018-06-19 03:20:32', NULL, NULL),
(28, 'Hà My', 'user.png', 'hamy@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$xc76bBzxEdMhoaGqQbFl7epvvVir5bve0IfbG/bh227n4FQUo5mbC', ' ', 9, 0, 'yT0bfxjjzikofG4ww78JnezHFkIec4T5h7X06F95dmqH4lOJCaJFUvu7KCbe', '2018-05-30 02:35:36', '2018-06-19 03:20:32', NULL, NULL),
(29, 'Bích Phương', 'user.png', 'bichphuong@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$EyeYQ2vhjVSgjE0UGgmHIuCIM7b2J7JqOmvvnvJ6fepvhEggRLxqW', ' ', 9, 0, 'aknudy5nJnBxHdh0hnwD7JZcef45IqUeX38qnwMwlTEUL1p8LeN0jA8kVj8i', '2018-05-30 05:39:28', '2018-06-19 03:20:32', NULL, NULL),
(30, 'Ngọc Chinh', 'user.png', 'ngoc_chinh@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$V.l1iNkp3zi4LD1UN1KgAuiFtKHKeeSDrQYoCA5C6bq1iypJXKCJ6', ' ', 9, 0, 'hD4NzszM9pJXrNfmtb83z6Wy6CBRaCJqLDoyfAfkW5aeFto2c47FtlEVqysS', '2018-06-04 03:34:43', '2018-06-19 03:20:32', NULL, NULL),
(31, 'Duy Anh', 'user.png', 'duy_anh@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$tY7SsBxmkXbsJ6ES7SHDt.ZNytaoR8LW1bT3wGagFFm4B0weR9kke', ' ', 9, 0, 'KBpMOuWzbaibxGzISO9WrXBCOc36Bgyk749tMjDjm68iuFuCxOxZFq9FG6zj', '2018-06-04 03:53:29', '2018-06-19 03:20:32', NULL, NULL),
(32, 'admin01', 'user.png', 'admin01@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$q7wkcJRr8oZicYPRoWPVeuLOEsZV8haYkoLJyshGwX/DuKP5JG2He', '<p>.......</p>', 2, 0, '6eAJDB6hLuubhvvyskerHRUrSgnvsnMwd9h0Nwecig0AXq87tNb1YKE9MOXq', '2018-06-04 06:50:44', '2018-06-04 06:51:02', NULL, NULL),
(33, 'Thu Chinh', 'user.png', 'thu_chinh@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$cfWcYWbMOHrCaPyZXtym3.oWLpo/X12Aj.sZ7l18suGahDtrh/RhO', ' ', 9, 0, '1kJmLpZS1paO1cPz5Nyt0YwIpgjQQ2fKXSsK2PhbNiGtipKYGoAm3DwKTf3e', '2018-06-04 18:43:12', '2018-06-19 03:20:32', NULL, NULL),
(34, 'Thanh Tươi', 'user.png', 'thanh_tuoi@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$ZfxxlYaw7qb4hyRE767mEu516RQoB6UIZDZUapMx065FsMs8ERTC.', ' ', 8, 0, '41gVWIo3KBk2Mtq9XfdwvaLFIt8YftOHjgTfzqPVI5RRQscV7kSmecw7WYsd', '2018-06-04 18:54:50', '2018-06-19 03:20:49', NULL, NULL),
(35, 'Ngọc Nga', 'user.png', 'ngoc_nga@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$HCevJfwlP8z6NjGRpZQa..5OPXRs5NanDa.zBnLC4XNTjcR/gou2a', ' ', 9, 0, 't9S1BUwmcCA8wl15a8tSKklHIl2zuz0VkKeBqfAgXL0u3S1mj78cYR2NUS6G', '2018-06-04 19:01:20', '2018-06-19 03:20:32', NULL, NULL),
(36, 'Long Sơn', 'user.png', 'long_son@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$Zuu4HC0HlHOSfnQsJX1JW.fn43Y/1KlnTv4yAwJcqH/6nH9EJ0W36', ' ', 9, 0, 'wWER1kdpi9GUtTsjUXxspX6Yt05IPj2CCNWupDHAU0ZD0Or7TZOoUELQYmWw', '2018-06-06 01:49:23', '2018-06-19 03:20:32', NULL, NULL),
(37, 'Xuân Tuấn', 'user.png', 'xuan_tuan@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$hhVo8jISl81IA2wVQcOoSup11hAeek7X/ZS3nUwipw83vFidBE96K', ' ', 8, 0, 'YVBqI05pCDdIBsk9OCDt5297o9XHp8tU3wJRHgxy8PPex0XxvEygECYFXVwK', '2018-06-07 08:47:31', '2018-06-19 03:20:49', NULL, NULL),
(38, 'Git Hub', 'user.png', 'github@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$XGYUPanWtqprF2JbhkYmGexNXTH8f3FYk.KhyILnB3p.9GJ.zqvMK', ' ', 9, 0, 'EEfsl7hBPtYeaixW8CyxxlgRFP6pUhBYI13IxCZ81OZ8SRQA8MANKAwEM7Bi', '2018-06-11 07:18:58', '2018-06-19 03:20:32', NULL, NULL),
(40, 'Linh Lỉnh', 'user.png', 'linh.linh@gmail.com', NULL, '03303003030', 1, NULL, NULL, '$2y$10$UnVo6AFPo0PwlMGr2k6oSOEzagHWWN97AqD13pOcV5isFaQqDHsbS', 'fb: https://www.facebook.com/linh.nguyenthi.3110567 | Chủ đề giảng dạy: Viết content | Kinh Nghiệm: 2 năm', 7, 0, '7yLABlwowdAWRWrzgH9vDs2oKdF8qznG40fIoNQrV6LihLRUNhlwnxWtJPay', '2018-06-13 03:41:36', '2018-06-19 03:19:29', NULL, NULL),
(41, 'Thanh Ngọc', 'user.png', 'thanhngoc@gmail.com', NULL, '034648645756', 1, NULL, NULL, '$2y$10$wgj5lOT5g9swJYLW9SYHV.hHxYFenSQPseAagmTUHa.ylVac8xvdK', 'fb: ahihi | Chủ đề giảng dạy: nấu Ăn | Kinh Nghiệm: 2 năm,', 7, 0, 'pAnlFNue3lO3IwSLauFGNk6bTeU7fj6XvyAASsw68dqzwQREEZS2V7YrDi4p', '2018-06-13 07:43:54', '2018-06-19 03:19:29', NULL, NULL),
(42, 'Võ Hoàng', 'user.png', 'vo_hoang@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$MrTLJEUB0CgGy/z4yT/Bvubd6CEtK0dmIZvuxh//YIFsdGnOPH8K.', ' ', 9, 0, '7Cy40KtlodykNpaO5SMIjifcaDqx7BXHpvUYvFgA0lD2NwHHS9WGaitB9XdM', '2018-06-13 08:34:17', '2018-06-19 03:20:32', NULL, NULL),
(43, 'Quyến Boss', 'hs_2018-07-06_1530842080.jpeg', 'thongminh.depzai@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$4rGjr3d/bYqF/uC.TwQ6QeuqGpXn5o92ygDllIIuzZ0/yC8TTQjRa', NULL, 9, 0, 'J5HzMl4rE8VVq9MmaeItz4Z9kqoRBAluyEfkrQoNhOE6mjkTLW4KVLYlCObp', '2018-06-13 09:11:42', '2018-07-06 01:55:24', NULL, NULL),
(44, 'Dương Chung', 'user.png', 'duongchung@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$r8xrmF2vf12tZj4Fv1IdfOIiSldvv0Og4Lovwz3YC0kLH1NSkjJ7G', ' ', 9, 0, 'ZfQPemmTPlAMK6mZ9kgfZXgch5y6BxnODOBqiyZBq9nGirq4SKOrZy1BMqni', '2018-06-18 01:37:12', '2018-06-19 03:20:32', NULL, NULL),
(45, 'Quản trị', 'user.png', 'quantri@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$h93rvyU1yJPs1Nk7O3N9neQcrRy91sWvaS3at51MPbJnoIAhYD3eC', NULL, 2, 0, 'bQ7TJ1k68QHqnDHsHQe2HhUl6rMpmO1HbqwUZwRLcgHIPRr84V67ysNBwdi1', '2018-06-19 03:32:25', '2018-06-19 03:40:14', NULL, NULL),
(46, 'Kế Toán', 'hs_2018-06-21_1529564881.jpeg', 'ketoan@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$WQb8E3oIg7vdcd9PKD3KyeXeFqq2mYi35pL/0Ap8Id8HpQ6b9Xpma', '<p>789</p>', 3, 0, 'kyBZZ6IAhgkcZwelwZt7i5wRaOXmtq2UT8ZXMmSUrDkXc8pngQJC3kBUgNbR', '2018-06-19 03:35:23', '2018-06-22 10:28:32', NULL, NULL),
(47, 'Quản trị giáo viên', 'user.png', 'quantri_giaovien@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$o.ynTq65L/9e6qPQAVkjVO2CoWfCN.IP37whaB9.5mvOWmSy06Ng6', '', 5, 0, 'xm5TtU2FFBFP5AMJTWBWDYlHnABuqDzyUeDV4TYaWMwDY3CtCWVybdVs6emd', '2018-06-19 03:36:37', '2018-06-19 03:36:37', NULL, NULL),
(48, 'Quản trị CTV', 'user.png', 'quantri_ctv@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$UjV2I0rdnvkEe.TRVW3qxeYdvxrcS/koJEqEzgIJ05RYsuMx8AQjO', '', 6, 0, 'rDDV07Uuomo7h5XuN1UwyfP2xMLDBZTGlRFYv0IRoy0hkVyLVaEK51B8bCJc', '2018-06-19 03:38:17', '2018-06-19 03:38:17', NULL, NULL),
(49, 'Uyên Phạm', 'user.png', 'uyenpham@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$E6.pTMXeTwLCYUBN90SiF.tMfHkYMaE1hOMSM8lZboggwX6iJyuUC', ' ', 9, 0, 'GbBmH1spxhx7rh7VoyOh70oKmP4XcQbVg2mtm3jS98BCcNMr82Aq4s61wPeR', '2018-06-25 04:02:48', '2018-06-25 04:02:48', NULL, NULL),
(50, 'Biên tập viên', 'hs_2018-07-03_1530607903.png', 'bien_tap_vien@cphonevn.com', NULL, '0', 1, NULL, NULL, '$2y$10$sc.UQUQe13VO02W9YOOf3OLl7hnvNjEUcENhZI9AS6P1lYpw6r0ce', '', 4, 0, 'ZsYe3uq6zNRCFimgxjRNemn9JpgPgTkfzaVv70YsVH62osya7NCfuslSZF7i', '2018-07-03 08:51:43', '2018-07-03 08:51:43', NULL, NULL),
(51, 'BuiPhuong', 'user.png', 'phuongphuongkma@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$hRU8i4FCUfE1G.rN.mWjfuea4DIqTvxVGaR70tV.O6gsreCjR023u', ' ', 9, 0, 'GJ2cRtGNZQmDaRHAD70Ouay30xlSeiQjpvq11KiMl89626IJsp5EpgQGRvUC', '2018-07-14 00:49:45', '2018-07-14 00:49:45', NULL, NULL),
(52, 'Cao Linh', 'user.png', 'kemiu.ngok@yahoo.com.vn', NULL, '0', 1, NULL, NULL, '$2y$10$sMtBGzNOVeT.bktv.XtTGuwy0eARPvCWgYEzbT1eOCeAL6ufJnl7m', ' ', 9, 0, 'u3SPASrP4Ff8kuihDCZUIEaAKGrAwK7iSNpLI2jBrRhRLvgSsFD9FDuHXczQ', '2018-07-30 19:49:28', '2018-07-30 19:49:28', NULL, NULL),
(53, 'Duy Anh', 'user.png', 'duyanh1998', NULL, '0', 1, NULL, NULL, '$2y$10$EXqBfodXwJuBB.QyF.sdWOb/xln/rotcq.46XCqyjAXewWIxPFtNK', ' ', 9, 0, '8v1fE4WVrSCGb5MbNurn1RVAcRJ0tPEOMxFj2iFqAN9OXUsibIQufLNSkEoP', '2018-09-06 08:05:46', '2018-09-06 08:05:46', NULL, NULL),
(54, 'Duy Anh', 'user.png', 'duyanh1998@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$EuWTf8z1fkGpO6xl7iU/9ugzH1x7qXG83XM8xYk5KyvhCz0Buzsjq', ' ', 9, 0, 'CVNcFxxoXwuo4WK2IlNEScDmttLzm5WPIrPjk1szHtlZYRwv1cAtJi1m6rUK', '2018-09-06 08:06:16', '2018-09-06 08:06:16', NULL, NULL),
(55, 'Đào Tuấn', 'user.png', 'daotuan1996', NULL, '0', 1, NULL, NULL, '$2y$10$rVsaXM1lsIosx6os5uRkTervcnhjDX2aH7XtmYLNvRU84F6NmtEw2', ' ', 9, 0, NULL, '2018-09-06 08:11:51', '2018-09-06 08:11:51', NULL, NULL),
(56, 'Đào Tuấn', 'user.png', 'daotuan1996@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$dodo7/0.ydf5V8dZwY3MoeLzz2YlOfJUM3j5/8SSmcqKHv1S9SC/K', ' ', 9, 0, 'Kg40a9rQ9MM8Il3KqEJOGBhWcmmkTyYrEcYaJRqJk2uidLYxmaAkWU17n9nQ', '2018-09-06 08:12:50', '2018-09-06 08:12:50', NULL, NULL),
(57, 'Đào Tuấn', 'user.png', 'daotuan.dev@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$pXIpmixUKkgGccxNaFo5X..6YdunVY/.4rf5er5d.dpucn5rZO0Bq', ' ', 9, 0, NULL, '2018-09-06 08:13:50', '2018-09-06 08:13:50', NULL, NULL),
(58, 'Quang Vinh', 'user.png', 'quangvinh@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$inaEY90nzx/.FvKpw1kFueplMNO1Oc/PZHJG8zxAbtBsSgtHLDuRG', ' ', 9, 0, NULL, '2018-09-06 08:23:33', '2018-09-06 08:23:33', NULL, NULL),
(59, 'Quỳnh búp bê', 'user.png', 'quynhbabe@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$JavRfTOVcbVyz5x/n.EoDOqvGEEFWugve8qDQ3P2V2TyPaJ4Kb8Fi', ' ', 9, 0, 'gZrPX5gIXz8YGNC56c48ZJhvkNmsVXOae5Zm21MubD4HydA4G1lmfMlPAGSu', '2018-09-06 08:25:24', '2018-09-06 08:25:24', NULL, NULL),
(60, 'Hoài Thương', 'user.png', 'hoaithuong@gmail.com', NULL, '0', 1, NULL, NULL, '$2y$10$oswKqVOfmVGawollUGCgiOfgv6fdZM31.8I2qZGuUh4BZPryzuswa', ' ', 9, 0, '7NPIMJ0gOV6Poqc924dhr0x4XCiSiMoWCtJaqOoLBjy5LKS0TDGpR0P9kCFJ', '2018-09-06 08:37:48', '2018-09-06 08:37:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_request`
--

CREATE TABLE `account_request` (
  `req_id` int(10) UNSIGNED NOT NULL,
  `req_status` int(11) NOT NULL,
  `req_acc_id` int(10) UNSIGNED NOT NULL,
  `req_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_request`
--

INSERT INTO `account_request` (`req_id`, `req_status`, `req_acc_id`, `req_amount`, `created_at`, `updated_at`) VALUES
(10, 1, 13, 6755000, '2018-07-06 04:14:06', '2018-07-06 04:14:06'),
(11, 1, 13, 599000, '2018-08-07 08:51:25', '2018-08-07 08:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `aff`
--

CREATE TABLE `aff` (
  `aff_id` int(10) UNSIGNED NOT NULL,
  `aff_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aff_acc_id` int(10) UNSIGNED NOT NULL,
  `aff_earnings` bigint(20) DEFAULT '0',
  `aff_order_num` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aff`
--

INSERT INTO `aff` (`aff_id`, `aff_code`, `aff_acc_id`, `aff_earnings`, `aff_order_num`, `created_at`, `updated_at`) VALUES
(1, '605852', 21, 5084000, 7, '2018-05-17 01:23:53', '2018-09-05 04:27:34'),
(2, '134078', 34, 798000, 2, '2018-06-04 18:54:51', '2018-09-05 04:27:34'),
(3, '535190', 37, 0, 0, '2018-06-07 08:47:32', '2018-06-07 08:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ban_id` int(10) UNSIGNED NOT NULL,
  `ban_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ban_id`, `ban_img`, `ban_name`, `ban_link`, `created_at`, `updated_at`) VALUES
(1, '1525923965.png', 'Banner Trang Chủ_Phía Trên1', 'courses', '2018-05-09 20:46:05', '2018-06-26 08:48:03'),
(5, '1528786995.png', 'Banner Thân Trang Chủ Bên Phải', NULL, '2018-05-21 02:08:19', '2018-06-12 07:03:15'),
(6, '1528786987.png', 'Banner Thân Trang Chủ Bên Phải', NULL, '2018-05-21 02:26:41', '2018-06-12 07:03:07'),
(7, '1528786979.png', 'Banner Thân Trang Chủ Bên Trái Phía Trên', 'affiliate', '2018-05-21 03:22:31', '2018-06-13 03:08:28'),
(8, '1528786971.png', 'Banner Thân Trang Chủ Bên Trái Phía Trên', 'affiliate', '2018-05-21 03:22:48', '2018-06-13 03:08:22'),
(9, '1528786956.png', 'Banner Thân Trang Chủ Bên Trái Phía Dưới', 'doitacgiaovien', '2018-05-21 03:24:56', '2018-06-13 03:07:57'),
(10, '1528786964.png', 'Banner Thân Trang Chủ Bên Trái Phía Dưới', 'doitacgiaovien', '2018-05-21 03:25:17', '2018-06-13 03:08:40'),
(11, '1529641369.png', 'Banner Trang Chủ_Phía Trên1', 'courses', '2018-06-22 04:22:50', '2018-07-09 02:04:14'),
(12, '1530003792.png', 'Banner Tài Liệu_Phía Trên', 'doc', '2018-06-26 09:03:12', '2018-06-26 09:03:12'),
(13, '1531101909.jpg', 'Banner Trang Chủ_Phía Trên', 'courses', '2018-07-09 02:05:10', '2018-07-09 02:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(10) UNSIGNED NOT NULL,
  `code_value` int(11) NOT NULL,
  `code_orderDe_id` int(10) UNSIGNED NOT NULL,
  `code_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_id`, `code_value`, `code_orderDe_id`, `code_status`, `created_at`, `updated_at`) VALUES
(1, 974159, 16, 1, '2018-06-05 03:21:09', '2018-06-05 03:36:16'),
(2, 921767, 20, 0, '2018-06-06 01:55:19', '2018-06-06 01:55:19'),
(3, 406467, 18, 0, '2018-06-06 01:56:25', '2018-06-06 01:56:25'),
(4, 364201, 18, 0, '2018-06-06 01:57:04', '2018-06-06 01:57:04'),
(5, 387351, 18, 0, '2018-06-06 01:59:52', '2018-06-06 01:59:52'),
(6, 961827, 15, 0, '2018-06-06 02:02:18', '2018-06-06 02:02:18'),
(7, 487161, 17, 0, '2018-06-06 02:02:48', '2018-06-06 02:02:48'),
(8, 188999, 17, 0, '2018-06-06 02:02:52', '2018-06-06 02:02:52'),
(9, 916478, 23, 1, '2018-06-06 11:18:45', '2018-06-06 13:18:24'),
(10, 750018, 24, 1, '2018-06-06 11:19:09', '2018-06-06 13:11:23'),
(11, 677107, 25, 1, '2018-06-08 01:16:33', '2018-06-08 01:17:16'),
(12, 555359, 26, 0, '2018-06-08 07:11:09', '2018-06-08 07:11:09'),
(15, 529766, 35, 1, '2018-06-12 04:24:07', '2018-06-27 06:39:37'),
(17, 770445, 37, 1, '2018-06-12 06:46:26', '2018-06-12 06:48:38'),
(18, 207464, 38, 0, '2018-06-12 08:21:01', '2018-06-12 08:21:01'),
(19, 313324, 44, 0, '2018-06-15 06:35:53', '2018-06-15 06:35:53'),
(20, 956618, 45, 0, '2018-06-18 08:40:02', '2018-06-18 08:40:02'),
(21, 519056, 47, 1, '2018-06-18 09:06:02', '2018-08-27 02:55:54'),
(22, 246116, 42, 1, '2018-06-19 06:25:15', '2018-07-06 01:58:07'),
(23, 380961, 50, 1, '2018-07-05 08:42:06', '2018-07-05 09:08:47'),
(24, 233313, 49, 1, '2018-07-05 09:13:55', '2018-07-05 09:14:06'),
(25, 753159, 51, 0, '2018-07-06 01:13:48', '2018-07-06 01:13:48'),
(26, 756742, 50, 0, '2018-07-06 02:01:40', '2018-07-06 02:01:40'),
(28, 883523, 54, 0, '2018-07-06 03:11:54', '2018-07-06 03:11:54'),
(29, 590902, 55, 0, '2018-07-06 03:33:28', '2018-07-06 03:33:28'),
(33, 620951, 59, 1, '2018-07-06 09:46:32', '2018-07-06 09:46:49'),
(34, 524023, 63, 1, '2018-09-06 08:59:00', '2018-09-06 08:59:29'),
(35, 899472, 64, 1, '2018-09-06 09:08:22', '2018-09-06 09:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_star` tinyint(4) NOT NULL,
  `com_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_acc_id` int(10) UNSIGNED NOT NULL,
  `com_cou_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_star`, `com_title`, `com_content`, `com_acc_id`, `com_cou_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'Hay lắm', 'Khóa học khá là hữu ích và mình học đưuọc rất nhiều', 11, 5, NULL, '2018-04-05 19:22:49'),
(3, 2, 'Chán lắm', 'Khóa học chả hay gì cả , giáo viên còn xấu nữa', 11, 3, NULL, '2018-04-05 19:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cou_id` int(10) UNSIGNED NOT NULL,
  `cou_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_price` int(11) NOT NULL COMMENT 'Giá tiền chính',
  `cou_price_old` int(11) DEFAULT NULL COMMENT 'Giá hiển thị nếu có giảm giá',
  `cou_level` tinyint(4) DEFAULT '3' COMMENT '1: Cơ bản, 2: Chuyên nghiệp, 3: Tất cả',
  `cou_type` tinyint(4) DEFAULT '1' COMMENT '1: Bài quiz, 2: Bài giảng theo chủ để',
  `cou_video` int(10) DEFAULT '0',
  `cou_star` float NOT NULL DEFAULT '0',
  `cou_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_student` int(10) NOT NULL DEFAULT '0',
  `cou_student_fake` int(11) DEFAULT '0',
  `cou_tag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cou_sale` int(5) DEFAULT NULL,
  `cou_featured` int(11) NOT NULL DEFAULT '0',
  `cou_gr_id` int(10) UNSIGNED NOT NULL,
  `cou_tea_id` int(10) UNSIGNED NOT NULL,
  `cou_status` int(11) NOT NULL DEFAULT '1' COMMENT '1: đang chạy , 2: chờ duyệt, 0: Dừng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cou_id`, `cou_name`, `cou_slug`, `cou_img`, `cou_price`, `cou_price_old`, `cou_level`, `cou_type`, `cou_video`, `cou_star`, `cou_content`, `cou_student`, `cou_student_fake`, `cou_tag`, `cou_sale`, `cou_featured`, `cou_gr_id`, `cou_tea_id`, `cou_status`, `created_at`, `updated_at`) VALUES
(1, 'Thai giáo - Phát triển trí tuệ và cảm xúc cho con từ trong bụng mẹ', 'thai-giao-phat-trien-tri-tue-va-cam-xuc-cho-con-tu-trong-bung-me', 'hs_2018-06-12_1528790863.png', 599000, NULL, 3, 1, 0, 2.5, '<p>Thai gi&aacute;o l&agrave; một lĩnh vực mới sử dụng những kết quả nghi&ecirc;n cứu y học mới để gi&uacute;p cho sự ph&aacute;t triển của con trẻ ngay từ trong bụng mẹ</p>\r\n\r\n<p>Gi&aacute;o tr&igrave;nh về thai gi&aacute;o được tổng hợp v&agrave; &aacute;p dụng với tất cả c&aacute;c gi&aacute;c quan của trẻ từ l&uacute;c c&ograve;n l&agrave; ph&ocirc;i thai cho tới khi sắp tới ng&agrave;y ch&agrave;o đời</p>\r\n\r\n<p>Kh&oacute;a học cũng tổng hợp những phương ph&aacute;p nu&ocirc;i dạy con từ trong bụng mẹ từ c&aacute;c chuy&ecirc;n gia trong v&agrave; ngo&agrave;i nước để đem tới c&aacute;i nh&igrave;n r&otilde; hơn về c&aacute;c phương ph&aacute;p mang lại sự ph&aacute;t triển to&agrave;n diện cho con trẻ trong gia đ&igrave;nh</p>\r\n\r\n<p>C&aacute;c b&agrave;i tập thực h&agrave;nh gi&uacute;p cho c&aacute;c b&agrave; mẹ c&oacute; thể chuẩn bị cho sự ch&agrave;o đời của con m&igrave;nh từ những thời điểm đầu ti&ecirc;n trong thai kỳ cho tới khi gần đủ 9 th&aacute;ng 10 ng&agrave;y</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>', 0, 0, '#mẹ', 0, 0, 1, 11, 1, '2018-04-04 03:25:32', '2018-09-05 09:04:07'),
(3, 'Guitar dem hat trong 30 ngay ahihi', 'guitar-dem-hat-trong-30-ngay-ahihi', 'hs_2018-06-12_1528790798.png', 699000, NULL, 3, 1, 0, 4, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Thực tế cho thấy những người c&oacute; khả năng chơi một loại nhạc cụ n&agrave;o đ&oacute; th&igrave; lu&ocirc;n biết c&aacute;ch l&agrave;m m&igrave;nh nổi bật giữa đ&aacute;m đ&ocirc;ng v&agrave; v&ocirc; c&ugrave;ng tự tin. Vậy tại sao bạn kh&ocirc;ng chọn một loại nhạc cụ v&agrave; bắt đầu luyện tập ngay từ b&acirc;y giờ? H&atilde;y đến với kho&aacute; học &quot;Guitar đệm h&aacute;t trong 30 ng&agrave;y&quot; của t&ocirc;i, bạn sẽ l&agrave;m chủ được c&acirc;y đ&agrave;n guitar trong tay v&agrave; ngh&ecirc;u ngao h&aacute;t c&ugrave;ng bạn b&egrave;.</p>\r\n\r\n<p>Tại sao bạn n&ecirc;n chọn kho&aacute; học n&agrave;y?</p>\r\n\r\n<p>1. T&ocirc;i lu&ocirc;n lắng nghe v&agrave; đọc tất cả c&aacute;c &yacute; kiến phản hồi, trả lời c&aacute;c thắc mắc của tất cả c&aacute;c học vi&ecirc;n v&agrave; những bạn đam m&ecirc; guitar th&ocirc;ng qua Facebook Page &quot;Hiển r&acirc;u guitar&quot; của t&ocirc;i. V&igrave; thế, t&ocirc;i sẽ hỗ trợ c&aacute;c bạn tr&ecirc;n con đường học nhạc một c&aacute;ch tốt nhất.</p>\r\n\r\n<p>2. T&ocirc;i lu&ocirc;n thường xuy&ecirc;n cập nhật v&agrave; thay đổi, th&ecirc;m c&aacute;c b&agrave;i tập mới v&agrave;o gi&aacute;o tr&igrave;nh.</p>\r\n\r\n<p>3. Lộ tr&igrave;nh của kho&aacute; học online được sắp xếp y hệt như giảng dạy ở ngo&agrave;i.</p>\r\n\r\n<p>4. Bạn thấy video n&agrave;y hướng dẫn chưa kỹ? T&ocirc;i sẽ l&agrave;m lại video đ&oacute; thật chi tiết hơn! Bạn thấy gi&aacute;o tr&igrave;nh c&ograve;n thiếu g&igrave;, nếu hợp l&yacute;, t&ocirc;i sẽ bổ sung v&agrave;o ngay!</p>\r\n\r\n<p>5. T&ocirc;i đ&atilde; chắt lọc những b&agrave;i học cơ bản nhất, cần thiết nhất d&agrave;nh cho guitar đệm h&aacute;t, để bất k&igrave; ai cũng c&oacute; thể học được.</p>\r\n\r\n<p>6. Chất lượng video cao, n&eacute;t, g&oacute;c m&aacute;y dễ nh&igrave;n, thu &acirc;m sạch, được quay từ m&aacute;y quay tốt v&agrave; setup ph&ograve;ng thu tốt, kh&ocirc;ng phải quay vu vơ bằng điện thoại v&agrave; m&aacute;y chất lượng k&eacute;m.</p>\r\n\r\n<p>7. Kh&oacute;a học l&agrave; nền tảng tốt nhất cho những ai muốn tiếp tục với những kiến thức cao hơn về Guitar!</p>\r\n\r\n<p>8. T&ocirc;i sẽ sớm c&oacute; kho&aacute; học về Guitar ở cấp độ cao hơn d&agrave;nh cho c&aacute;c bạn c&oacute; nhu cầu học v&agrave; n&acirc;ng cao tr&igrave;nh độ của bản th&acirc;n.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Một c&acirc;y guitar v&agrave; một t&acirc;m hồn y&ecirc;u th&iacute;ch &acirc;m nhạc</li>\r\n	<li>Kh&ocirc;ng cần phải c&oacute; bất k&igrave; một kiến thức n&agrave;o về guitar</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Được học những kiến thức b&agrave;i bản nhất v&agrave; đầy đủ nhất m&agrave; kh&ocirc;ng phải l&agrave; những l&yacute; thuyết cao si&ecirc;u kh&ocirc;ng cần thiết cho đệm h&aacute;t</li>\r\n	<li>Được hỗ trợ giải đ&aacute;p trong qu&aacute; tr&igrave;nh học tập</li>\r\n	<li>Được giảm gi&aacute; khi mua đ&agrave;n v&agrave; phụ kiện ở một số cửa h&agrave;ng nhạc cụ</li>\r\n	<li>Được tiếp cận một kho h&agrave;ng trăm b&agrave;i giảng đệm c&aacute;c b&agrave;i b&agrave;i h&aacute;t miễn ph&iacute;</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Tất cả mọi người, gi&agrave; trẻ lớn b&eacute;, muốn học đệm h&aacute;t hoặc muốn trau dồi cơ bản</li>\r\n	<li>Gi&aacute;o tr&igrave;nh n&agrave;y d&agrave;nh cho</li>\r\n	<li>C&aacute;c bạn kh&ocirc;ng c&oacute; thời gian đi học c&aacute;c lớp dạy đ&agrave;n offline</li>\r\n	<li>C&aacute;c bạn kh&ocirc;ng muốn học qu&aacute; nhiều kiến thức m&agrave; m&igrave;nh kh&ocirc;ng d&ugrave;ng hết</li>\r\n	<li>C&aacute;c bạn chưa từng chơi guitar</li>\r\n	<li>C&aacute;c bạn muốn trau dồi kiến thức nền cơ bản, vững v&agrave;ng về guitar</li>\r\n	<li>Gi&aacute;o tr&igrave;nh n&agrave;y kh&ocirc;ng d&agrave;nh cho</li>\r\n	<li>C&aacute;c bạn đ&atilde; c&oacute; kiến thức cao, thấy b&agrave;i g&igrave; l&agrave; đ&aacute;nh được ngay b&agrave;i đấy</li>\r\n	<li>C&aacute;c bạn lười v&agrave; kh&ocirc;ng c&oacute; sự chăm chỉ tập luyện</li>\r\n	<li>C&aacute;c bạn qu&aacute; k&eacute;n chọn nhạc v&agrave; tập qua loa, kh&ocirc;ng đặt hết t&acirc;m sức v&agrave;o mỗi b&agrave;i tập</li>\r\n	<li>C&aacute;c bạn chỉ th&iacute;ch kiến thức cao m&agrave; kh&ocirc;ng chịu bắt đầu từ những g&igrave; cơ bản</li>\r\n</ul>', 1, 0, '#giutar', 0, 0, 6, 11, 1, '2018-04-04 19:37:33', '2018-09-06 01:42:40'),
(4, 'Tìm hiểu mã nguồn mở', 'tim-hieu-ma-nguon-mo', 'hs_2018-06-12_1528790924.png', 399000, 399000, 3, 1, 0, 4.5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Nhằm đ&aacute;p ứng nhu cầu hiện tại v&agrave; xu hướng c&ocirc;ng nghệ to&agrave;n cầu, nắm bắt t&igrave;nh h&igrave;nh với mục ti&ecirc;u đ&agrave;o tạo những g&igrave; doanh nghiệp cần, Edumall đ&atilde; đưa kh&oacute;a học &quot;Dự &aacute;n m&atilde; nguồn mở&quot; v&agrave;o chương tr&igrave;nh đ&agrave;o tạo. Kh&oacute;a học &quot;Dự &aacute;n m&atilde; nguồn mở&quot; n&agrave;y sẽ cung cấp cho học vi&ecirc;n những kiến thức cơ bản nhất về m&atilde; nguồn mở, x&acirc;y dựng phần mềm m&atilde; nguồn mở, lập tr&igrave;nh web với PHP v&agrave; l&agrave;m việc với hệ quản trị cơ sở dữ liệu MySQL, c&aacute;ch khai th&aacute;c v&agrave; ứng dụng phần mềm m&atilde; nguồn mở trong x&acirc;y dựng hệ thống cơ sở dữ liệu cho doanh nghiệp..</p>\r\n\r\n<p>&ldquo;M&atilde; nguồn mở&rdquo; - cụm từ kh&ocirc;ng c&ograve;n xa lạ với c&aacute;c bạn trẻ y&ecirc;u th&iacute;ch lập tr&igrave;nh cũng như c&aacute;c lập tr&igrave;nh vi&ecirc;n (LTV) đang ng&agrave;y đ&ecirc;m ph&aacute;t triển c&aacute;c hệ thống, ứng dụng mới. Với ưu điểm cho ph&eacute;p người d&ugrave;ng t&ugrave;y chỉnh, cải tiến, n&acirc;ng cấp phần mềm theo nhu cầu ri&ecirc;ng, &quot;m&atilde; nguồn mở&quot; đang cực kỳ phổ biến v&agrave; được rất nhiều tổ chức, doanh nghiệp ng&agrave;y nay sử dụng trong x&acirc;y dựng hệ thống cơ sở dữ liệu.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>M&ocirc;i trường học y&ecirc;n tĩnh</li>\r\n	<li>C&oacute; khả năng truy cập Internet</li>\r\n	<li>N&ecirc;n sử dụng tai nghe trong qu&aacute; tr&igrave;nh học</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Nắm được những kiến thức cơ bản nhất về hệ điều h&agrave;nh nguồn mở,</li>\r\n	<li>C&oacute; khả năng sử dụng ng&ocirc;n ngữ shell để lập tr&igrave;nh.</li>\r\n	<li>Sử dụng c&aacute;c c&ocirc;ng cụ tr&ecirc;n Linux để bi&ecirc;n dịch v&agrave; c&agrave;i đặt c&aacute;c tr&igrave;nh C ( C++) trong kernel.</li>\r\n	<li>C&oacute; thể sử dụng c&ocirc;ng cụ nguồn mở PHP&amp;MySQL để ph&aacute;t triển c&aacute;c ứng dụng web.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Lập tr&igrave;nh vi&ecirc;n ph&aacute;t triển hệ thống, ứng dụng</li>\r\n	<li>Nh&agrave; quản trị hệ thống cơ sở dữ liệu doanh nghiệp</li>\r\n	<li>Tất cả những ai c&oacute; nhu cầu t&igrave;m hiểu về &quot;M&atilde; nguồn mở&quot;</li>\r\n</ul>', 0, 0, '#lập trình', 0, 2, 5, 11, 1, '2018-04-04 20:22:41', '2018-09-05 09:04:07'),
(5, 'Phân tích hệ thống', 'phan-tich-he-thong', 'hs_2018-06-12_1528790815.png', 549000, NULL, 1, 1, 0, 5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Hệ thống th&ocirc;ng tin tin học ho&aacute; l&agrave; một trong những ứng dụng đầy đủ v&agrave; to&agrave;n diện nhất c&aacute;c th&agrave;nh tựu của c&ocirc;ng nghệ th&ocirc;ng tin v&agrave;o một tổ chức, doanh nghiệp. Việc sở hữu một hệ thống th&ocirc;ng tin quản l&yacute; to&agrave;n diện gi&uacute;p bộ m&aacute;y c&ocirc;ng ty hoạt động tốt hơn, g&oacute;p một phần kh&ocirc;ng nhỏ trong sự th&agrave;nh c&ocirc;ng của một doanh nghiệp. Nắm được những nhu cầu về thiết kế hệ thống th&ocirc;ng tin của c&aacute;c tổ chức, doanh nghiệp đang rất cấp thiết hiện nay, Edumall cung cấp kh&oacute;a học &quot;Ph&acirc;n t&iacute;ch thiết kế hệ thống&quot; nhằm gi&uacute;p c&aacute;c lập tr&igrave;nh vi&ecirc;n n&acirc;ng cao chuy&ecirc;n m&ocirc;n để t&igrave;m được những cơ hội nghề nghiệp tốt hơn, đồng thời hỗ trợ c&aacute;c tổ chức, doanh nghiệp n&acirc;ng cao năng lực cho nh&acirc;n sự mảng th&ocirc;ng tin.</p>\r\n\r\n<p>Kho&aacute; học &quot;Ph&acirc;n t&iacute;ch thiết kế hệ thống&quot; được thiết kế dựa tr&ecirc;n c&aacute;c gi&aacute;o tr&igrave;nh đ&agrave;o tạo chuẩn của c&aacute;c trường Đại học khối ng&agrave;nh C&ocirc;ng Nghệ Th&ocirc;ng Tin, dưới sự dẫn dắt của giảng vi&ecirc;n ĐH B&aacute;ch Khoa H&agrave; Nội Thạch B&igrave;nh Cường. Kh&oacute;a học n&agrave;y gi&uacute;p học vi&ecirc;n hiểu được hệ thống th&ocirc;ng tin quản l&yacute;, phương ph&aacute;p luận v&agrave; c&ocirc;ng nghệ ph&acirc;n t&iacute;ch v&agrave; thiết kế một hệ thống th&ocirc;ng tin kinh tế theo 2 hướng cơ bản l&agrave; hướng cấu tr&uacute;c v&agrave; hướng đối tượng, c&oacute; hiểu biết căn bản về hệ thống th&ocirc;ng tin trong doanh nghiệp.</p>\r\n\r\n<p>Kho&aacute; học cũng hướng dẫn cho học vi&ecirc;n c&aacute;c quy tr&igrave;nh để ph&aacute;t triển hệ thống cũng như c&aacute;c phương ph&aacute;p x&aacute;c định, ph&acirc;n t&iacute;ch để ph&aacute;t triển hệ thống th&ocirc;ng tin.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>M&ocirc;i trường học y&ecirc;n tĩnh</li>\r\n	<li>C&oacute; khả năng truy cập Internet</li>\r\n	<li>N&ecirc;n sử dụng tai nghe trong qu&aacute; tr&igrave;nh học</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Được trang bị những kỹ năng thực h&agrave;nh về ph&acirc;n t&iacute;ch &ndash; thiết kế một hệ thống th&ocirc;ng tin quản l&yacute; đ&aacute;p ứng y&ecirc;u cầu quản l&yacute; của một tổ chức theo phương ph&aacute;p c&oacute; cấu tr&uacute;c</li>\r\n	<li>Nắm được c&aacute;ch l&agrave;m thế n&agrave;o để x&aacute;c định y&ecirc;u cầu, ph&acirc;n t&iacute;ch v&agrave; c&aacute;ch ph&aacute;t triển hệ thống th&ocirc;ng tin.</li>\r\n	<li>Thực h&agrave;nh ph&acirc;n t&iacute;ch thiết kế 1 hệ thống th&ocirc;ng tin cụ thể</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Lập tr&igrave;nh vi&ecirc;n ph&aacute;t triển hệ thống th&ocirc;ng tin</li>\r\n	<li>Nh&agrave; quản trị hệ thống cơ sở dữ liệu doanh nghiệp</li>\r\n	<li>Tất cả những ai c&oacute; nhu cầu t&igrave;m hiểu về &quot;Ph&acirc;n t&iacute;ch thiết kế hệ thống th&ocirc;ng tin&quot;</li>\r\n</ul>', 1, 0, '#it #lập trình # hệ thống', 0, 8, 5, 11, 1, '2018-04-04 20:43:14', '2018-09-05 09:04:07'),
(6, 'Đột phá thu nhập qua 6 kênh maketing online', 'dot-pha-thu-nhap-qua-6-kenh-maketing-online', 'hs_2018-06-12_1528790780.png', 699000, 999000, 3, 1, 643, 4, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>- Bạn đang mong muốn x&acirc;y dựng một Hệ thống Kinh doanh Online B&agrave;i Bản cho ri&ecirc;ng m&igrave;nh m&agrave; vẫn chưa t&igrave;m được hướng đi r&otilde; r&agrave;ng từ việc x&aacute;c định sản phẩm kinh doanh - m&ocirc; h&igrave;nh kinh doanh ph&ugrave; hợp, c&aacute;ch để li&ecirc;n hệ nh&agrave; cung cấp để đ&agrave;m ph&aacute;n nhập h&agrave;ng, c&aacute;ch nghi&ecirc;n cứu kh&aacute;ch h&agrave;ng, đối thủ, quảng c&aacute;o v&agrave; tối ưu...... ?<br />\r\n- Bạn đ&atilde; c&oacute; kinh nghiệm Kinh doanh online, v&agrave; đang mong muốn mở rộng Hệ Thống Online Đa K&ecirc;nh ngo&agrave;i k&ecirc;nh truyền thống sang Facebook, Instagram, Zalo, Youtube, Email Marketing, Website, SMS...?<br />\r\n- Bạn mong muốn ph&aacute;t triển to&agrave;n diện nội dung fanpage, group,.... B&agrave;i bản hơn bắt đầu từ việc ph&acirc;n t&iacute;ch thị hiếu kh&aacute;ch h&agrave;ng - cũng như ph&acirc;n t&iacute;ch to&agrave;n diện đối thủ cạnh tranh của m&igrave;nh ?<br />\r\n- Bạn đam m&ecirc; Marketing v&agrave; muốn l&ecirc;n một quy tr&igrave;nh Quảng c&aacute;o sản phẩm online b&agrave;i bản, hay mong muốn tối ưu quảng c&aacute;o hiệu quả ?</p>\r\n\r\n<p>- Bạn đang mong muốn x&acirc;y dựng một Hệ thống Kinh doanh Online B&agrave;i Bản cho ri&ecirc;ng m&igrave;nh m&agrave; vẫn chưa t&igrave;m được hướng đi r&otilde; r&agrave;ng từ việc x&aacute;c định sản phẩm kinh doanh - m&ocirc; h&igrave;nh kinh doanh ph&ugrave; hợp, c&aacute;ch để li&ecirc;n hệ nh&agrave; cung cấp để đ&agrave;m ph&aacute;n nhập h&agrave;ng, c&aacute;ch nghi&ecirc;n cứu kh&aacute;ch h&agrave;ng, đối thủ, quảng c&aacute;o v&agrave; tối ưu...... ?<br />\r\n- Bạn đ&atilde; c&oacute; kinh nghiệm Kinh doanh online, v&agrave; đang mong muốn mở rộng Hệ Thống Online Đa K&ecirc;nh ngo&agrave;i k&ecirc;nh truyền thống sang Facebook, Instagram, Zalo, Youtube, Email Marketing, Website, SMS...?<br />\r\n- Bạn mong muốn ph&aacute;t triển to&agrave;n diện nội dung fanpage, group,.... B&agrave;i bản hơn bắt đầu từ việc ph&acirc;n t&iacute;ch thị hiếu kh&aacute;ch h&agrave;ng - cũng như ph&acirc;n t&iacute;ch to&agrave;n diện đối thủ cạnh tranh của m&igrave;nh ?<br />\r\n- Bạn đam m&ecirc; Marketing v&agrave; muốn l&ecirc;n một quy tr&igrave;nh Quảng c&aacute;o sản phẩm online b&agrave;i bản, hay mong muốn tối ưu quảng c&aacute;o hiệu quả ?<br />\r\nCho d&ugrave; bạn l&agrave; người mới Khởi nghiệp Kinh Doanh Online, hay l&agrave; một nh&acirc;n vi&ecirc;n kinh doanh hoặc bạn đ&atilde; c&oacute; kinh nghiệm kinh doanh Online; c&oacute; sản phẩm dịch vụ v&agrave; muốn mở rộng c&ocirc;ng việc kinh doanh của m&igrave;nh hay đơn giản bạn muốn kinh doanh để c&oacute; th&ecirc;m nguồn thu nhập cho bản th&acirc;n th&igrave; đ&acirc;y l&agrave; kh&oacute;a chia sẻ d&agrave;nh cho bạn ! Tất cả những vấn đề tr&ecirc;n sẽ được mổ sẻ trong &quot;Khởi nghiệp Kinh Doanh Online Bền Vững&quot; - Kh&oacute;a học n&agrave;y cung cấp cho bạn một Quy tr&igrave;nh x&acirc;y dựng Hệ thống Marketing online thực tế, b&agrave;i bản, to&agrave;n diện với những v&iacute; dụ thực tế.</p>\r\n\r\n<p>Đừng chần chừ nữa, h&atilde;y đăng k&yacute; tham gia ngay c&ugrave;ng t&ocirc;i. V&agrave; chuẩn bị đ&oacute;n nhận những m&oacute;n qu&agrave; đầy bất ngờ.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Kh&ocirc;ng y&ecirc;u cầu đầu v&agrave;o</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Bạn sẽ biết, học được c&aacute;c c&aacute;ch:</li>\r\n	<li>- X&aacute;c định Sản phẩm kinh doanh ph&ugrave; hợp, M&ocirc; h&igrave;nh bạn sẽ Kinh doanh</li>\r\n	<li>- C&oacute; được Nguồn h&agrave;ng kinh doanh khi li&ecirc;n hệ trực tiếp với người b&aacute;n, nh&agrave; cung cấp</li>\r\n	<li>- Nhận diện ch&acirc;n dung kh&aacute;ch h&agrave;ng Tiềm năng của m&igrave;nh, c&aacute;ch x&acirc;y dựng ch&iacute;nh s&aacute;ch chăm s&oacute;c kh&aacute;ch h&agrave;n</li>\r\n	<li>- C&aacute;ch nghi&ecirc;n cứu, theo d&otilde;i v&agrave; học hỏi từ ch&iacute;nh Đối thủ cạnh tranh của bạn qua c&aacute;c c&ocirc;ng cụ Miễn ph&iacute;</li>\r\n	<li>Tự tin x&acirc;y dựng đồng bộ c&aacute;c k&ecirc;nh Marketing (Facebook, Instagram, Zalo, Youtube, Email Marketing,...) qua từng bước chia sẻ chi tiết</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Tất cả những ai muốn khởi nghiệp Kinh doanh Online b&agrave;i bản, bắt đầu từ những c&ocirc;ng việc cốt l&otilde;i nhất: x&aacute;c định sản phẩm kinh doanh, t&igrave;m kiếm nguồn h&agrave;ng kinh doanh, li&ecirc;n hệ nh&agrave; cung cấp, nghi&ecirc;n cứu kh&aacute;ch h&agrave;ng, đối thủ, x&acirc;y dựng nội dung b&aacute;n h&agrave;ng...</li>\r\n	<li>- Những ai mong muốn t&igrave;m hiểu, ph&aacute;t triển đồng bộ c&aacute;c k&ecirc;nh Marketing Online (Instagram, Zalo, Youtube, Email Marketing, Facebook, SMS) b&ecirc;n cạnh k&ecirc;nh truyền thống</li>\r\n	<li>- Những ai đang t&igrave;m kiếm c&aacute;c cơ hội kinh doanh Online, v&agrave; ph&aacute;t triển c&ocirc;ng việc Kinh Doanh Offline bền vững cho ri&ecirc;ng m&igrave;nh</li>\r\n</ul>\r\n\r\n<p>Thu gọn</p>', 12, 0, '#marketing #đột phá thu nhập', 30, 0, 3, 13, 1, '2018-04-05 20:57:58', '2018-09-06 09:36:46'),
(7, 'Học photoshop một cách bài bản để trở thành nhà thiết kế chuyên nghiệp', 'hoc-photoshop-mot-cach-bai-ban-de-tro-thanh-nha-thiet-ke-chuyen-nghiep', 'hs_2018-06-12_1528790807.png', 990000, 1299000, 1, 1, 274, 4.25, '<p>N&oacute;i về phần mềm chỉnh sửa ảnh, chắc ch&uacute;ng ta phải n&oacute;i về Adobe Photoshop đầu ti&ecirc;n.&nbsp;Adobe Photoshop nổi tiếng v&igrave; gi&uacute;p designers v&agrave; editors tối ưu c&ocirc;ng việc của họ. N&oacute; chuyển h&igrave;nh ảnh th&agrave;nh kiệt t&aacute;c. T&iacute;nh linh hoạt của n&oacute; đ&atilde; l&agrave;m cho nhu cầu trong thế giới s&aacute;ng tạo cho n&oacute; l&agrave; phần mềm chỉnh sửa ảnh tốt nhất. Chương tr&igrave;nh cung cấp cho bạn c&aacute;c t&iacute;nh năng tuyệt vời cho một thiết kế ho&agrave;n to&agrave;n tuyệt vời. Hơn thế nữa, Adobe Photoshop th&acirc;n thiện với người d&ugrave;ng v&agrave; n&oacute; cung cấp c&ocirc;ng cụ sẽ gi&uacute;p bạn trong việc chỉnh sửa ảnh.</p>\r\n\r\n<p>N&oacute;i về phần mềm chỉnh sửa ảnh, chắc ch&uacute;ng ta phải n&oacute;i về Adobe Photoshop đầu ti&ecirc;n.&nbsp;Adobe Photoshop nổi tiếng v&igrave; gi&uacute;p designers v&agrave; editors tối ưu c&ocirc;ng việc của họ. N&oacute; chuyển h&igrave;nh ảnh th&agrave;nh kiệt t&aacute;c. T&iacute;nh linh hoạt của n&oacute; đ&atilde; l&agrave;m cho nhu cầu trong thế giới s&aacute;ng tạo cho n&oacute; l&agrave; phần mềm chỉnh sửa ảnh tốt nhất. Chương tr&igrave;nh cung cấp cho bạn c&aacute;c t&iacute;nh năng tuyệt vời cho một thiết kế ho&agrave;n to&agrave;n tuyệt vời. Hơn thế nữa, Adobe Photoshop th&acirc;n thiện với người d&ugrave;ng v&agrave; n&oacute; cung cấp c&ocirc;ng cụ sẽ gi&uacute;p bạn trong việc chỉnh sửa ảnh.</p>\r\n\r\n<p>- Bạn l&agrave; người c&oacute; niềm đam m&ecirc; về ảnh v&agrave; muốn tạo ra những tấm ảnh ấn tượng?</p>\r\n\r\n<p>- Bạn l&agrave; designer, markerter, freelancer&nbsp;hay đang l&agrave;m c&ocirc;ng việc m&agrave; kĩ năng chỉnh sửa ảnh l&agrave; y&ecirc;u cầu bắt buộc?</p>\r\n\r\n<p>- Bạn&nbsp;cần một phần mềm chỉnh sửa ảnh chuy&ecirc;n nghiệp để tạo ra những poster, banner hay thậm ch&iacute; l&agrave; thiết kế giao diện web?</p>', 100, 0, '#photoshop #thiết kế', 24, 1, 1, 13, 0, '2018-04-06 01:43:23', '2018-09-07 04:37:50'),
(8, 'Tiếng Hàn sơ cấp cho người mới bắt đầu', 'tieng-han-so-cap-cho-nguoi-moi-bat-dau', 'hs_2018-06-12_1528790903.png', 899000, 1199000, 1, 1, 0, 0, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Bạn l&agrave; học sinh, sinh vi&ecirc;n muốn đi du học H&agrave;n Quốc? Bạn l&agrave; người muốn l&agrave;m việc tại c&aacute;c c&ocirc;ng ty H&agrave;n Quốc? Hay bạn l&agrave; người y&ecirc;u th&iacute;ch tiếng H&agrave;n, muốn t&igrave;m hiểu về văn h&oacute;a v&agrave; ng&ocirc;n ngữ H&agrave;n Quốc? H&atilde;y đến với kh&oacute;a học &quot;Tiếng H&agrave;n sơ cấp cho người mới bắt đầu&quot; để c&oacute; thể đọc th&ocirc;ng, viết thạo v&agrave; hiện thực h&oacute;a ước muốn của c&aacute;c bạn.<br />\r\nKh&oacute;a học của ch&uacute;ng t&ocirc;i sẽ mang đến:<br />\r\n- Những b&agrave;i học ngắn gọn, dễ hiểu ph&ugrave; hợp cho mọi đối tượng<br />\r\n- C&aacute;c b&agrave;i giảng được soạn một c&aacute;ch khoa học, ch&uacute; trọng tối đa tới khả năng &aacute;p dụng của người học<br />\r\n- 500 từ mới ứng dụng cho cuộc sống&nbsp;<br />\r\n- Gi&uacute;p học vi&ecirc;n giao tiếp cơ bản th&agrave;nh thạo với người bản ngữ&nbsp;<br />\r\n- Mẹo học nhanh v&agrave; hiệu quả<br />\r\nVậy bạn c&ograve;n chần chừ g&igrave; nữa? H&atilde;y đăng k&yacute; kh&oacute;a học ngay h&ocirc;m nay!</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Mạng Internet ổn định</li>\r\n	<li>- Kh&ocirc;ng gian học y&ecirc;n tĩnh v&agrave; tho&aacute;ng đ&atilde;ng</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Sau kh&oacute;a học, học vi&ecirc;n sẽ:</li>\r\n	<li>- Biết c&aacute;ch ph&aacute;t &acirc;m chuẩn, nắm vững bảng chữ c&aacute;i tiếng H&agrave;n</li>\r\n	<li>- Học được 500 từ mới theo c&aacute;c chủ đề ứng dụng cho cuộc sống</li>\r\n	<li>- Giao tiếp cơ bản th&agrave;nh thạo với người bản ngữ</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Sinh vi&ecirc;n sau khi tốt nghiệp c&oacute; mong muốn l&agrave;m việc trong c&aacute;c doanh nghiệp của H&agrave;n</li>\r\n	<li>- Người đang l&agrave;m việc tại c&ocirc;ng ty của H&agrave;n Quốc hay c&oacute; đối t&aacute;c H&agrave;n Quốc</li>\r\n	<li>- Người c&oacute; nhu cầu đi lao động tại H&agrave;n Quốc</li>\r\n	<li>- Học sinh, sinh vi&ecirc;n muốn đi du học H&agrave;n Quốc</li>\r\n</ul>', 10, 0, '#Ngoại ngữ #Tiếng Hàn', 25, 1, 19, 11, 1, '2018-05-09 19:11:42', '2018-09-05 09:04:07'),
(9, 'Chứng khoán cho người mới bắt đầu', 'chung-khoan-cho-nguoi-moi-bat-dau', 'hs_2018-06-12_1528790730.jpeg', 699000, 899000, 3, 1, 1012, 5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<p>- C&oacute; m&aacute;y t&iacute;nh kết nối Internet.</p>\r\n\r\n<p>- C&oacute; một khoản tiền nh&agrave;n rỗi (tối thiểu 10 triệu đồng để đầu tư).</p>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Người học nắm được c&aacute;c quy định giao dịch v&agrave; c&aacute;ch lựa chọn được c&aacute;c cổ phiếu tốt.</li>\r\n	<li>- Hiểu được c&aacute;ch thức vận h&agrave;nh của thị trường chứng kho&aacute;n Việt Nam.</li>\r\n	<li>- Nắm được c&aacute;ch tư duy để lựa chọn cổ phiếu tốt để kiếm lợi nhuận tr&ecirc;n thị trường chứng kho&aacute;n.</li>\r\n	<li>- Cải thiện kết quả đầu tư (với những người đ&atilde; đầu tư nhưng kết quả chưa tốt).</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Những ai muốn l&agrave;m gi&agrave;u từ thị trường chứng kho&aacute;n.</li>\r\n</ul>', 101, 0, '#chứng khoán #làm giàu #kinh doanh', 22, 2, 8, 11, 1, '2018-05-09 19:24:19', '2018-09-05 09:04:07'),
(10, 'YOGA trẻ hóa - Làm đẹp cho khuôn mặt', 'yoga-tre-hoa-lam-dep-cho-khuon-mat', 'hs_2018-06-12_1528790933.png', 99000, NULL, 3, 1, 0, 5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>- Cung cấp những th&ocirc;ng tin cơ bản nhất về nội dung, thời lượng học, c&aacute;ch thức &aacute;p dụng trong thực tế,...<br />\r\n- Chia sẻ của bản th&acirc;n giảng vi&ecirc;n về những trải nghiệm đ&uacute;c r&uacute;t được từ thực tế cuộc sống.<br />\r\n- &Yacute; nghĩa v&agrave; tầm quan trọng của việc học &amp; &aacute;p dụng những kỹ năng / kiến thức trong kh&oacute;a học đối với mục ti&ecirc;u c&aacute; nh&acirc;n của học vi&ecirc;n.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- C&oacute; m&aacute;y t&iacute;nh, laptop, tablet ... kết nối Internet ổn định.</li>\r\n	<li>- C&oacute; kh&ocirc;ng gian tập luyện y&ecirc;n tĩnh v&agrave; ph&ugrave; hợp.</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Chương tr&igrave;nh Yoga trực tuyến L&agrave;m đẹp cho khu&ocirc;n mặt gồm c&aacute;c b&agrave;i tập t&aacute;c động trực tiếp l&ecirc;n khu&ocirc;n mặt gi&uacute;p l&agrave;m đẹp cho l&agrave;n da, loại trừ nếp nhăn, k&eacute;o d&agrave;i sự trẻ trung cho l&agrave;n da của bạn.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Tất cả những ai c&oacute; nhu cầu luyện tập yoga r&egrave;n luyện sức khỏe.</li>\r\n	<li>- C&aacute;c bạn c&oacute; nhu cầu giữ d&aacute;ng, giảm c&acirc;n l&agrave;m đẹp cơ thể.</li>\r\n	<li>- D&acirc;n văn ph&ograve;ng, bận rộn, sức khỏe kh&ocirc;ng tốt.</li>\r\n	<li>- Những ai y&ecirc;u th&iacute;ch tập yoga nhưng kh&ocirc;ng c&oacute; thời gian đến trung t&acirc;m luyện tập.</li>\r\n</ul>', 1, 0, '#yoga #làm đẹp', 0, 0, 6, 12, 1, '2018-05-09 19:38:04', '2018-09-05 09:04:07'),
(12, 'QUẢN TRỊ MARKETING (BỘ BÀI GIẢNG 10 MODULES)', 'quan-tri-marketing-bo-bai-giang-10-modules', 'hs_2018-06-12_1528790834.png', 449000, 759000, 3, 1, 0, 5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Marketing đang trở th&agrave;nh xu thế của thời đại. Bất kể bạn l&agrave; sinh vi&ecirc;n hay người đi l&agrave;m, học tập v&agrave; l&agrave;m việc trong lĩnh vực Marketing hay kh&ocirc;ng, hiểu biết về Marketing chắc chắn l&agrave; c&ocirc;ng cụ hỗ trợ đắc lực cho bạn kh&ocirc;ng chỉ trong c&ocirc;ng việc m&agrave; c&ograve;n trong giải quyết c&aacute;c vấn đề của cuộc sống.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, ở đ&acirc;u đ&oacute;, khi t&igrave;m hiểu về Marketing, bạn sẽ &iacute;t nhiều gặp phải những kh&uacute;c mắc sau:</p>\r\n\r\n<p>Kh&ocirc;ng giỏi s&aacute;ng tạo c&oacute; học Marketing được kh&ocirc;ng?</p>\r\n\r\n<p>Người hướng nội c&oacute; n&ecirc;n học Marketing?</p>\r\n\r\n<p>Sinh vi&ecirc;n ngoại đạo, học tr&aacute;i tr&agrave;nh n&ecirc;n bắt đầu học Marketing từ đ&acirc;u?</p>\r\n\r\n<p>L&agrave;m Marketing lương c&oacute; cao kh&ocirc;ng?</p>\r\n\r\n<p>Chưa biết t&yacute; g&igrave; về Marketing, l&agrave;m thế n&agrave;o để lựa chọn cho m&igrave;nh chuy&ecirc;n m&ocirc;n y&ecirc;u th&iacute;ch?</p>\r\n\r\n<p>Marketer n&ecirc;n ph&aacute;t triển nghề nghiệp ở c&ocirc;ng ty nhỏ hay tập đo&agrave;n lớn?</p>\r\n\r\n<p>Tất tần tật c&acirc;u hỏi ph&iacute;a tr&ecirc;n sẽ được giải đ&aacute;p một c&aacute;nh tinh gọn nhất từ giảng vi&ecirc;n Mr Thuỳ Nguy&ecirc;n, MBA Markteting Management, Founder of TNI Group, bao gồm việc ph&aacute; bỏ ho&agrave;n to&agrave;n tư duy Marketing l&agrave; s&aacute;ng tạo, tới việc vẽ 1 lộ tr&igrave;nh ph&aacute;t triển nghề nghiệp r&otilde; r&agrave;ng cho bất cứ học vi&ecirc;n n&agrave;o tham gia,..</p>\r\n\r\n<p>Ngo&agrave;i ra, b&agrave;i bản, thực tiễn v&agrave; hệ thống, l&agrave; 3 ti&ecirc;u ch&iacute; h&agrave;ng đầu của kho&aacute; học n&agrave;y. V&agrave; để đạt được mục ti&ecirc;u tr&ecirc;n, kho&aacute; học sẽ tập trung v&agrave;o 4 trọng t&acirc;m ch&iacute;nh:</p>\r\n\r\n<p>1. Đầu ti&ecirc;n, học vi&ecirc;n sẽ được tiếp cận với hệ thống l&yacute; thuyết Quản trị Marketing b&agrave;i bản nhất bao gồm Tổng quan về Marketing,&nbsp;Nghi&ecirc;n cứu thị trường &amp; ph&acirc;n t&iacute;ch 3C, Định vị thương hiệu, Chiến lược gi&aacute; &amp; sản phẩm, Chiến lược k&ecirc;nh ph&acirc;n phối &amp; Truyền th&ocirc;ng</p>\r\n\r\n<p>2. Tiếp theo, học vi&ecirc;n sẽ được hướng dẫn để ho&agrave;n thiện một bản kế hoạch Marketing tổng thể m&agrave; bất cứ c&ocirc;ng ty chuy&ecirc;n nghiệp n&agrave;o cũng cần tới.</p>\r\n\r\n<p>3. Sau đ&oacute;, khi bạn c&oacute; được lượng kiến thức m&agrave; th&ocirc;ng thường một người sẽ mất 3 năm để c&oacute; thể ho&agrave;n th&agrave;nh trong kh&oacute;a học n&agrave;y, người học c&oacute; thể tự tin ph&aacute;t triển bản th&acirc;n ở c&aacute;c chuy&ecirc;n m&ocirc;n s&acirc;u hơn về Marketing, hay thậm ch&iacute; ứng dụng những l&yacute; thuyết n&agrave;y để tự m&igrave;nh khởi nghiệp kinh doanh.</p>\r\n\r\n<p>4. Cuối c&ugrave;ng, bạn sẽ được TNI Business School hỗ trợ hết m&igrave;nh: Giới thiệu việc l&agrave;m, kết nối bạn với doanh nghiệp tại N-Hub v&agrave; hỗ trợ, ươm mầm triển khai &yacute; tưởng khởi nghiệp v&agrave;o thực tế tại I-StartLab.<br />\r\nĐặc biệt nhất, khi c&aacute;c bạn l&agrave;m thực tế doanh nghiệp hoặc x&acirc;y dựng dự &aacute;n thật v&agrave; triển khai v&agrave;o thực tiễn sẽ c&ograve;n được hỗ trợ tham gia những hội thảo chia sẻ ho&agrave;n to&agrave;n Free v&agrave; nhiều kho&aacute; học ngắn hạn định hướng chuy&ecirc;n m&ocirc;n thực h&agrave;nh của &nbsp;TNI Business School do Mr. Thuỳ Nguy&ecirc;n s&aacute;ng lập.</p>\r\n\r\n<p>V&agrave; c&ograve;n nhiều hơn thế nữa, t&agrave;i liệu hấp dẫn tặng k&egrave;m kho&aacute; học:</p>\r\n\r\n<p>- Slide b&agrave;i giảng v&agrave; 1 cuốn s&aacute;ch ebook Quản trị Marketing do giảng vi&ecirc;n tự bi&ecirc;n soạn.</p>\r\n\r\n<p>- 1 template mẫu hướng dẫn chi tiết từng bước x&acirc;y dựng Marketing Master Plan bằng file exel.</p>\r\n\r\n<p>- 100 ebooks về Marketing để bạn nắm vững kiến thức nền tảng, chuẩn bị sẵn s&agrave;ng thực thi những chiến lược Marketing v&agrave;o thực tế</p>\r\n\r\n<p>Tỷ ph&uacute; Jack Ma khuy&ecirc;n c&aacute;c bạn trẻ thời nay rằng: &ldquo;Trước 30 tuổi, quan trọng kh&ocirc;ng phải l&agrave; theo c&ocirc;ng ty n&agrave;o m&agrave; theo người sếp n&agrave;o. Người sếp giỏi dạy ch&uacute;ng ta rất kh&aacute;c&rdquo;</p>\r\n\r\n<p><br />\r\nH&atilde;y đăng k&yacute; ngay kho&aacute; học n&agrave;y, để c&oacute; cơ hội được 1 người thầy, người anh, người &ldquo;sếp&rdquo; t&acirc;m huyến l&agrave; Mr Thuỳ Nguy&ecirc;n dẫn đường chỉ lối cho bạn vượt qua giai đoạn m&ocirc;ng lung nhất của đời người.</p>\r\n\r\n<p>Hẹn gặp c&aacute;c bạn trong kho&aacute; học v&agrave; c&ugrave;ng nhau thay đổi cuộc đời nh&eacute;!&nbsp;</p>\r\n\r\n<p>Kho&aacute; học nằm trong chương tr&igrave;nh MBA Marketing Management của trường TNI Business School. Chương tr&igrave;nh bao gồm tổng cộng 13 modules học tập hướng đến gi&uacute;p c&aacute;c bạn học vi&ecirc;n tự tin l&agrave;m việc ở bất cứ nơi đ&acirc;u v&agrave; khởi nghiệp kinh doanh ở bất cứ ng&agrave;nh nghề n&agrave;o th&ocirc;ng qua việc gi&uacute;p c&aacute;c bạn nắm vững kiến thức b&agrave;i bản, thực tiễn nhất về kinh doanh v&agrave; Marketing.</p>\r\n\r\n<p>Kho&aacute; học ng&agrave;y h&ocirc;m nay của ch&uacute;ng ta l&agrave;: Quản trị Marketing: Từ chiến lược cho tới thực thi kế hoạch Marketing. Chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng đăng k&yacute; đi th&ocirc;i!</p>\r\n\r\n<p>Học th&ecirc;m kho&aacute; kho&aacute; Quảng c&aacute;o: https://edumall.vn/course/basic-advertising---sang-tao-1-cach-tao-bao---thu-lua-trong-nganh-quang-cao-sang-tao</p>\r\n\r\n<p>V&agrave; kho&aacute; Facebook Marketing: https://edumall.vn/course/facebook-marketing-co-ban--nang-cao</p>\r\n\r\n<p>Để bắt đầu kiếm lợi nhuận từ dự &aacute;n kinh doanh của bạn ngay h&ocirc;m nay!</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Follow ngay giảng vi&ecirc;n tr&ecirc;n FB để được hỗ trợ to&agrave;n diện về chuy&ecirc;n m&ocirc;n v&agrave; việc l&agrave;m. Link: fb.com/thuynguyentni</li>\r\n	<li>- Học vi&ecirc;n cần một tư duy mở để tiếp nhận những kiến thức mới.</li>\r\n	<li>- Chuẩn bị thời gian v&agrave; sự tập trung do kh&oacute;a học c&oacute; h&agrave;m lượng kiến thức chất x&aacute;m cao.</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Khi c&oacute; được những kiến thức nền tảng trong kh&oacute;a học n&agrave;y, người học c&oacute; thể:</li>\r\n	<li>- Tự tin ph&aacute;t triển bản th&acirc;n ở c&aacute;c chuy&ecirc;n m&ocirc;n s&acirc;u hơn về Marketing</li>\r\n	<li>- Hiểu v&agrave; ph&aacute;t huy được mối quan hệ giữa c&aacute;c yếu tố, c&aacute;c c&ocirc;ng cụ trong Marketing</li>\r\n	<li>- Ứng dụng những l&yacute; thuyết n&agrave;y để tự m&igrave;nh khởi nghiệp kinh doanh</li>\r\n	<li>- Với những chủ doanh nghiệp, kh&oacute;a học sẽ cung cấp c&aacute;i nh&igrave;n tổng quan để quản trị được hệ thống Marketing cho doanh nghiệp m&igrave;nh</li>\r\n	<li>- Được hỗ trợ ĐỊNH HƯỚNG theo sau: khi ho&agrave;n th&agrave;nh kho&aacute; học bạn sẽ được giới thiệu việc l&agrave;m tại N-Hub, v&agrave; tham gia v&agrave;o những dự &aacute;n khởi nghiệp tại I-start lab. 2 tổ chức trực thuộc TNI Group.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Đối tượng ch&iacute;nh kh&oacute;a học l&agrave;:</li>\r\n	<li>- Sinh vi&ecirc;n muốn theo học ng&agrave;nh Marketing v&agrave; Kinh doanh</li>\r\n	<li>- C&aacute;c nh&acirc;n sự đang l&agrave;m việc tại c&aacute;c lĩnh vực li&ecirc;n quan đến Marketing v&agrave; Kinh Doanh muốn hệ thống h&oacute;a kiến thức Marketing</li>\r\n	<li>- C&aacute;c chủ doanh nghiệp muốn ứng dụng Marketing trong c&ocirc;ng việc kinh doanh của m&igrave;nh</li>\r\n	<li>H&atilde;y tham gia kho&aacute; học n&agrave;y! Kho&aacute; học được thiết kế d&agrave;nh ri&ecirc;ng cho bạn!</li>\r\n</ul>', 0, 0, '#marketing #quản trị', 41, 0, 2, 4, 1, '2018-05-16 06:04:48', '2018-09-06 10:26:36'),
(13, 'Tiếng Anh giao tiếp: Tự tin bộc lộ cảm xúc của bản thân bằng Tiếng Anh', 'tieng-anh-giao-tiep-tu-tin-boc-lo-cam-xuc-cua-ban-than-bang-tieng-anh', 'hs_2018-06-12_1528790874.png', 349000, 349000, 3, 1, 0, 2, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Kho&aacute; học với nội dung cơ bản, ngắn gọn, dễ hiểu, cần thiết</p>\r\n\r\n<p>&bull; Học vi&ecirc;n thường xuy&ecirc;n được kiểm tra, đ&aacute;nh gi&aacute; qua c&aacute;c b&agrave;i kiểm tra trong v&agrave; sau mỗi b&agrave;i học</p>\r\n\r\n<p>&bull; Luyện 4 kĩ năng quan trọng trong giao tiếp tiếng anh (nghe - n&oacute;i - phản xạ - ngữ &acirc;m) trong 1 b&agrave;i học</p>\r\n\r\n<p>&bull; Thể hiện 7 trạng th&aacute;i cảm x&uacute;c trong khi giao tiếp</p>\r\n\r\n<p>&bull; Tự tin, thoải m&aacute;i tr&ograve; chuyện v&agrave; chia sẻ cảm x&uacute;c với bạn b&egrave;, đồng nghiệp, đối t&aacute;c...</p>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<p>&bull; Những người th&iacute;ch học tiếng anh, muốn n&acirc;ng cao khả năng giao tiếp nhưng kh&ocirc;ng c&oacute; đủ điều kiện về thời gian v&agrave; t&agrave;i ch&iacute;nh hoặc chưa c&oacute; phương ph&aacute;p đ&uacute;ng đắn v&agrave; ph&ugrave; hợp</p>\r\n\r\n<p>&bull; Những người c&oacute; tr&igrave;nh độ Tiếng Anh giao tiếp ở mức cơ bản, vốn ngữ ph&aacute;p, từ vựng v&agrave; khả năng giao tiếp hạn chế, sợ nghe, ngại n&oacute;i</p>\r\n\r\n<p>&bull; Những người thường xuy&ecirc;n tiếp x&uacute;c với bạn b&egrave;, đồng nghiệp, đối t&aacute;c.... l&agrave; người nước ngo&agrave;i.</p>\r\n\r\n<p>&bull; Kho&aacute; học với 100% giảng vi&ecirc;n người bản ngữ, đến từ Topica Native</p>', 1, 0, '#Ngoại ngữ #Tiếng Anh # Giao tiếp', 0, 1, 12, 13, 1, '2018-06-05 08:48:57', '2018-09-05 09:04:08'),
(14, 'Tiếng Anh ứng dụng: Giải trí trong tiếng Anh', 'tieng-anh-ung-dung-giai-tri-trong-tieng-anh', 'hs_2018-06-12_1528790890.png', 349000, 349000, 3, 1, 274, 0, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Nếu bạn đ&atilde; hẹn được c&ocirc; n&agrave;ng/ anh ch&agrave;ng người nước ngo&agrave;i tới buổi hẹn m&agrave; bạn đ&atilde; mong chờ bấy l&acirc;u, bạn sẽ chuẩn bị những g&igrave;? Thiết kế cho m&igrave;nh một buổi hẹn tuyệt vời? C&oacute; một lời khuy&ecirc;n cho bạn rằng bạn n&ecirc;n trau dồi thật nhiều vốn tiếng Anh của m&igrave;nh về tất cả c&aacute;c mặt &quot;giải tr&iacute;&quot; để hai bạn c&oacute; thể thoải m&aacute;i lựa chọn, cũng như trao đổi với nhau. Người bạn kia chắc hẳn sẽ cảm thấy bạn l&agrave; người kh&aacute; t&acirc;m l&yacute; v&agrave; hiểu biết nhiều....</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Bạn n&ecirc;n c&oacute; một nền tảng từ vựng tiếng anh tương đối ổn.</li>\r\n	<li>H&atilde;y đảm bảo rằng bạn c&oacute; m&ocirc;i trường học tập y&ecirc;n tĩnh.</li>\r\n	<li>M&aacute;y t&iacute;nh kết nối Internet</li>\r\n	<li>Khuyến kh&iacute;ch sử dụng tai nghe trong l&uacute;c học</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>Ngay sau b&agrave;i học bạn c&oacute; thể:</li>\r\n	<li>Trao đổi, chia sẻ về một bộ phim hay một b&agrave;i h&aacute;t m&agrave; bạn y&ecirc;u th&iacute;ch với bạn người nước ngo&agrave;i của m&igrave;nh.</li>\r\n	<li>Thoải m&aacute;i n&oacute;i về mạng x&atilde; hội như một người Anh thực thụ.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Những người đi học, đi l&agrave;m trong m&ocirc;i trường giao tiếp tiếng anh nhiều (c&ocirc;ng ty đa quốc gia, c&oacute; đồng nghiệp người nước ngo&agrave;i, ở nước ngo&agrave;i).</li>\r\n	<li>Những người l&agrave;m việc với c&aacute;c đối t&aacute;c người nước ngo&agrave;i.</li>\r\n</ul>', 0, 0, '#Ngoại ngữ #Tiếng Anh # Giao tiếp #giải trí', 0, 1, 10, 13, 1, '2018-06-05 08:55:04', '2018-09-05 09:04:08'),
(15, 'Khóa học chuyên đề trà sữa và thạch có nhân', 'khoa-hoc-chuyen-de-tra-sua-va-thach-co-nhan', 'hs_2018-07-05_1530754358.jpeg', 799000, 899000, 3, 1, 0, 0, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Thị trường tr&agrave; sữa ng&agrave;y nay kh&ocirc;ng c&ograve;n l&agrave; một xu hướng mang t&iacute;nh thời điểm m&agrave; n&oacute; như đ&atilde; trở th&agrave;nh thức uống tinh thần của mọi người.</p>\r\n\r\n<p>Nếu bạn l&agrave; người c&oacute; ch&iacute; hướng kinh doanh, th&igrave; tr&agrave; sữa l&agrave; một lĩnh vực dễ l&agrave;m, c&oacute; vốn đầu tư kh&ocirc;ng qu&aacute; cao v&agrave; dễ tiếp cận kh&aacute;ch h&agrave;ng. Quan trọng hơn hết vẫn l&agrave; sự s&aacute;ng tạo trong c&aacute;ch tr&igrave;nh b&agrave;y một ly tr&agrave; sữa th&agrave;nh phẩm, hoặc l&agrave; phải c&oacute; một điểm nhấn về vị tr&agrave;, loại thạch, hạt tr&acirc;n ch&acirc;u sao cho kh&aacute;c biệt với những nơi kinh doanh tr&agrave; sữa kh&aacute;c. Khi đ&oacute;, bạn sẽ tạo dấu ấn cho kh&aacute;ch h&agrave;ng v&agrave; x&acirc;y dựng thương hiệu c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Nếu bạn l&agrave; người đam m&ecirc; về pha chế, đặc biệt l&agrave; tr&agrave; sữa, muốn tự m&igrave;nh l&agrave;m ra được nhiều loại tr&agrave; sữa với c&aacute;c loại thạch, hạt tr&acirc;n ch&acirc;u như những nơi kinh doanh, m&agrave; kh&ocirc;ng phải tốn qu&aacute; nhiều kinh ph&iacute; cho việc đi học tại c&aacute;c trung t&acirc;m pha chế hoặc tốn qu&aacute; nhiều thời gian cho việc tự học, tự nghi&ecirc;n cứu th&igrave; kh&oacute;a học online n&agrave;y sẽ l&agrave; giải ph&aacute;p th&iacute;ch hợp nhất cho c&aacute;c bạn.</p>\r\n\r\n<p>Kho&aacute; học online với chuy&ecirc;n đề tr&agrave; sữa v&agrave; thạch c&oacute; nh&acirc;n sẽ đ&aacute;p ứng được những nhu cầu cơ bản nhất cho c&aacute;c bạn mới bước ch&acirc;n v&agrave;o lĩnh vực pha chế n&agrave;y. Bạn c&oacute; thể học bất kỳ l&uacute;c n&agrave;o m&igrave;nh rảnh rỗi v&agrave; cũng dễ d&agrave;ng sắm cho m&igrave;nh một số dụng cụ, nguy&ecirc;n vật liệu để l&agrave;m ra được những ly tr&agrave; sữa thơm ngon v&agrave; hương vị ho&agrave;n to&agrave;n tự nhi&ecirc;n theo sở th&iacute;ch của m&igrave;nh, c&aacute;c loại thạch v&agrave; hạt tr&acirc;n ch&acirc;u đều được l&agrave;m bằng tay n&ecirc;n kh&ocirc;ng phải lo ngại về độ an to&agrave;n thực phẩm, kh&ocirc;ng sử dụng chất ho&aacute; học.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- C&oacute; kết nối internet ổn định.</li>\r\n	<li>- C&oacute; đủ nguy&ecirc;n liệu v&agrave; dụng cụ l&agrave;m tr&agrave; sữa.</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Sau kho&aacute; học, c&aacute;c bạn sẽ biết c&aacute;c kỹ năng:</li>\r\n	<li>+ Sử dụng v&agrave; pha trộn c&aacute;c vị tr&agrave;.</li>\r\n	<li>+ Kỹ thuật lắc tr&agrave; sữa v&agrave; tạo bọt.</li>\r\n	<li>+ C&ocirc;ng thức l&agrave;m c&aacute;c loại thạch, hạt tr&acirc;n ch&acirc;u homemade sao cho c&oacute; độ dẻo, độ dai m&agrave; kh&ocirc;ng sử dụng h&oacute;a chất hoặc sản phẩm đ&oacute;ng g&oacute;i sẵn.</li>\r\n	<li>+ C&ocirc;ng thức l&agrave;m kem bọt sữa - milk foam.</li>\r\n	<li>- Một số &yacute; tưởng s&aacute;ng tạo trang tr&iacute; th&agrave;nh phẩm một ly tr&agrave; sữa ho&agrave;n chỉnh.</li>\r\n	<li>- C&aacute;c sự cố hay gặp phải trong qu&aacute; tr&igrave;nh l&agrave;m v&agrave; ho&agrave;n thiện sản phẩm.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Những người c&oacute; kế hoạch kinh doanh trong lĩnh vực ăn uống.</li>\r\n	<li>- D&agrave;nh cho người đi học v&agrave; đi l&agrave;m (b&agrave; nội trợ, chị em văn ph&ograve;ng, sinh vi&ecirc;n y&ecirc;u th&iacute;ch c&ocirc;ng việc pha chế).</li>\r\n</ul>', 197, 0, '#trà sữa #nấu ăn', 11, 1, 6, 25, 1, '2018-07-05 01:32:38', '2018-09-05 09:04:08'),
(16, 'ĐỐI MẶT VÀ CHIẾN THẮNG UNG THƯ', 'doi-mat-va-chien-thang-ung-thu', 'hs_2018-07-05_1530755438.jpeg', 399000, 899000, 3, 1, 0, 5, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Căn bệnh ung thư đang trở th&agrave;nh một nạn dịch lan tr&agrave;n v&agrave; ph&aacute;t triển, đặc biệt l&agrave; ở Việt Nam.<br />\r\nL&agrave; một b&aacute;c sĩ, t&ocirc;i cũng lại l&agrave; một nạn nh&acirc;n của căn bệnh ung thư. Chỉ c&oacute; một điều kh&aacute;c biệt, t&ocirc;i đ&atilde; v&agrave; đang chiến thắng n&oacute; qua 10 năm vật lộn v&agrave; sống c&ugrave;ng n&oacute;.<br />\r\nT&ocirc;i sẽ chia sẻ c&ugrave;ng c&aacute;c bạn những kiến thức của một b&aacute;c sĩ v&agrave; những trải nghiệm của một người bệnh để biết c&aacute;ch đ&uacute;ng đắn chiến đấu v&agrave; chiến thắng căn bệnh hiểm ngh&egrave;o n&agrave;y.<br />\r\nPHẦN 1: Cần phải l&agrave;m những g&igrave; khi mắc bệnh ung thư<br />\r\nPHẦN 2: Lựa chọn phương &aacute;n điều trị hợp l&iacute;<br />\r\nPHẦN 3: Vấn đề dinh dưỡng v&agrave; chăm s&oacute;c<br />\r\nPHẦN 4: Những b&agrave;i học kinh nghiệm thực tế<br />\r\nPHẦN 5: Dự ph&ograve;ng ung thư</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- M&aacute;y t&iacute;nh, laptop, tablet ... kết nối Internet ổn định.</li>\r\n	<li>- C&oacute; sổ notebook để note lại những &yacute; ch&iacute;nh cần nhớ.</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Kh&ocirc;ng chỉ đứng tr&ecirc;n cương vị 1 b&aacute;c sĩ qu&acirc;n y m&agrave; c&ograve;n l&agrave; bệnh nh&acirc;n ung thư, b&aacute;c sĩ L&ecirc; chia sẻ c&aacute;ch tiếp nhận, chiến đấu v&agrave; chiến thắng căn bệnh qu&aacute;i &aacute;c n&agrave;y với t&acirc;m tư của 1 người bệnh - 1 người thầy thuốc. Kh&oacute;a học gi&uacute;p bệnh nh&acirc;n ung thư v&agrave; người nh&agrave; c&oacute; c&aacute;i nh&igrave;n lạc quan, khoa học, sẵn s&agrave;ng chiến đấu với căn bệnh n&agrave;y.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- D&agrave;nh cho tất cả mọi người.</li>\r\n</ul>', 90, 0, '#kỹ năng #khoa học', 56, 3, 6, 41, 1, '2018-07-05 01:50:38', '2018-09-05 09:04:08'),
(17, 'Con đường trở thành triệu phú đô la: giải mã những kỹ năng đỉnh cao của môi giới bất động sản', 'con-duong-tro-thanh-trieu-phu-do-la-giai-ma-nhung-ky-nang-dinh-cao-cua-moi-gioi-bat-dong-san', 'hs_2018-07-06_1530868561.jpeg', 599001, 599001, 3, 1, 581, 4, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>- M&ocirc;i giới bất động sản hiện nay đang cạnh tranh khốc liệt. Tỷ lệ những bạn thực sự l&agrave;m gi&agrave;u được nghề n&agrave;y chỉ khoảng 15 - 20%, với số tiền hoa hồng kiềm được l&ecirc;n tới h&agrave;ng chục tỷ một năm. Trong kh&oacute;a học n&agrave;y, học vi&ecirc;n sẽ được dẫn dắt qua rất nhiều kỹ năng t&igrave;m kiếm kh&aacute;ch h&agrave;ng, d&agrave;nh cho cả m&ocirc;i giới truyền thống v&agrave; m&ocirc;i giới hiện đại.</p>\r\n\r\n<p>- Học vi&ecirc;n sẽ n&acirc;ng cao kỹ năng telesales, SMS marketing, email marketing cho tới c&aacute;c c&ocirc;ng cụ digital marketing b&aacute; đạo như Facebook v&agrave; Google.</p>\r\n\r\n<p>- Ngo&agrave;i ra, kh&oacute;a học cũng sẽ hướng dẫn chi tiết c&aacute;ch chinh phục kh&aacute;ch h&agrave;ng tại nh&agrave; mẫu v&agrave; tại event mở b&aacute;n. Phần cuối sẽ l&agrave; những y&ecirc;u cầu để r&egrave;n luyện kỹ năng mềm cho học vi&ecirc;n, từ những phương ph&aacute;p NLP (Lập tr&igrave;nh ng&ocirc;n ngữ tư duy) suy nghĩ t&iacute;ch cực, tới c&aacute;ch quản l&yacute; thời gian, quản l&yacute; stress v&agrave; một số c&aacute;ch set target hiệu quả.</p>\r\n\r\n<p>- Những kinh nghiệm l&agrave;m nghề thực chiến, kết hợp với những kiến thức nền tảng vững chắc, sẽ gi&uacute;p học vi&ecirc;n hiểu r&otilde; r&agrave;ng con đường đi tới th&agrave;nh c&ocirc;ng. V&agrave; quan trọng nhất l&agrave; những kỹ năng t&iacute;ch lũy sẽ l&agrave; h&agrave;nh trang cho họ trong suốt cuộc đời n&agrave;y.&nbsp;<br />\r\nNhững kinh nghiệm xương m&aacute;u của Trainer Henry Kh&aacute;nh, người c&oacute; 20 năm kinh nghiệm tr&ecirc;n thương trường, sẽ d&agrave;nh trọn t&acirc;m huyết của m&igrave;nh cho học vi&ecirc;n. Với mong muốn được cho đi, được gi&uacute;p đỡ v&agrave; th&agrave;nh t&acirc;m mang lại th&agrave;nh c&ocirc;ng cho người kh&aacute;c.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Học vi&ecirc;n n&ecirc;n học trong trạng th&aacute;i open, dễ d&agrave;ng tiếp thu những kiến thức mới, những kinh nghiệm mới, những trải nghiệm mới.</li>\r\n	<li>- Học vi&ecirc;n khi học theo kh&oacute;a học th&igrave; n&ecirc;n d&agrave;nh thời gian để thực tập v&agrave; luyện tập n&acirc;ng cao kỹ năng li&ecirc;n tục, biến kiến thức mới th&agrave;nh kinh nghiệm v&agrave; kỹ năng.</li>\r\n	<li>- Học vi&ecirc;n n&ecirc;n t&igrave;m hiểu th&ecirc;m c&aacute;c kh&oacute;a học kh&aacute;c của c&ugrave;ng Trainer Henry Kh&aacute;nh, để c&oacute; sự li&ecirc;n kết v&agrave; hiểu chuy&ecirc;n s&acirc;u hơn.</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Sau kh&oacute;a học n&agrave;y, học vi&ecirc;n c&oacute; thể khởi nghiệp ngay bằng nghề m&ocirc;i giới bất động sản v&agrave; bắt đầu kiếm tiền.</li>\r\n	<li>- Học vi&ecirc;n sẽ c&oacute; khả năng t&igrave;m th&ecirc;m thu nhập ngay sau khi l&agrave;m nghề khoảng 1-2 th&aacute;ng, &iacute;t th&igrave; 20-30 triệu/th&aacute;ng, nhiều th&igrave; 100-300 triệu/th&aacute;ng.</li>\r\n	<li>- Ngo&agrave;i ra, khi đ&atilde; t&iacute;ch lũy đủ số vốn khoảng v&agrave;i trăm triệu cho tới 1-2 tỷ, học vi&ecirc;n c&oacute; thể trở th&agrave;nh nh&agrave; đầu tư bất động sản, sở hữu những bất động sản đầu ti&ecirc;n trong danh mục đầu tư của m&igrave;nh.</li>\r\n	<li>- Sau khi đ&atilde; c&oacute; kinh nghiệm v&agrave; t&iacute;ch lũy đủ vốn, quan hệ, học vi&ecirc;n ho&agrave;n to&agrave;n c&oacute; thể tự mở s&agrave;n giao dịch bất động sản v&agrave; trở th&agrave;nh Gi&aacute;m đốc s&agrave;n bất động sản.</li>\r\n	<li>- Trong rất nhiều kiến thức v&agrave; kỹ năng chia sẻ, chỉ cần học vi&ecirc;n lĩnh hội được khoảng 70-80% v&agrave; &aacute;p dụng v&agrave;o thực tế, l&agrave; đ&atilde; c&oacute; thể mang lại những th&agrave;nh c&ocirc;ng rực rỡ.</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- D&agrave;nh cho những m&ocirc;i giới bất động sản muốn n&acirc;ng cao kỹ năng của m&igrave;nh, để vươn tới th&agrave;nh c&ocirc;ng.</li>\r\n	<li>- Những bạn trẻ muốn khởi nghiệp v&agrave; l&agrave;m gi&agrave;u bằng nghề m&ocirc;i giới bất động sản.</li>\r\n</ul>', 1, 0, '#triệu phú #bất động sản', 0, 2, 8, 13, 1, '2018-07-06 09:16:02', '2018-09-05 09:04:08');
INSERT INTO `course` (`cou_id`, `cou_name`, `cou_slug`, `cou_img`, `cou_price`, `cou_price_old`, `cou_level`, `cou_type`, `cou_video`, `cou_star`, `cou_content`, `cou_student`, `cou_student_fake`, `cou_tag`, `cou_sale`, `cou_featured`, `cou_gr_id`, `cou_tea_id`, `cou_status`, `created_at`, `updated_at`) VALUES
(18, 'English for Beginners - Tiếng Anh cho người mới bắt đầu', 'english-for-beginners-tieng-anh-cho-nguoi-moi-bat-dau', 'hs_2018-08-20_1534732664.jpeg', 599000, 799000, 3, 1, 0, 0, '<p>Tổng qu&aacute;t</p>\r\n\r\n<p>1. Vấn đề của đối tượng học vi&ecirc;n:<br />\r\nĐa phần chủ shop online mở ra chỉ b&aacute;n được cho bạn b&egrave; người th&acirc;n sau đ&oacute; kh&ocirc;ng c&oacute; th&ecirc;m đơn h&agrave;ng, li&ecirc;n tục gặp kh&aacute;ch h&agrave;ng từ chối v&agrave; dần dần đ&oacute;ng cửa shop online của m&igrave;nh. Chỉ suy nghĩ đơn giản rằng b&aacute;n h&agrave;ng online chỉ cần đăng b&agrave;i l&ecirc;n b&aacute;n n&ecirc;n tr&ecirc;n tường của chủ shop online đa phần chỉ thấy sản phẩm v&agrave; sản phẩm n&ecirc;n rất nh&agrave;m ch&aacute;n. Bạn thực sự đang cần phải học lại từ đầu nền tảng căn bản đến n&acirc;ng cao về kinh doanh tr&ecirc;n mạng x&atilde; hội.<br />\r\nBạn l&agrave; người mới v&agrave; kh&ocirc;ng biết bắt đầu từ đ&acirc;u, chọn nguồn sản phẩm như thế n&agrave;o? X&acirc;y dựng thương hiệu v&agrave; h&igrave;nh ảnh tr&ecirc;n mạng x&atilde; hội ra sao? L&agrave;m sao để tư vấn v&agrave; chốt đơn h&agrave;ng, chăm s&oacute;c kh&aacute;ch h&agrave;ng?</p>\r\n\r\n<p>2. Nội dung kh&oacute;a học:<br />\r\n-Tại sao phải kinh doanh online.<br />\r\n-Tổng quan về c&aacute;c mạng x&atilde; hội.<br />\r\n-Tổng quan về b&aacute;n h&agrave;ng tr&ecirc;n mạng x&atilde; hội c&aacute; nh&acirc;n.<br />\r\n- Định vị sản phẩm kinh doanh d&agrave;nh cho người mới.<br />\r\n- Tam gi&aacute;c v&agrave;ng trong b&aacute;n h&agrave;ng tr&ecirc;n mạng x&atilde; hội c&aacute; nh&acirc;n (kỹ năng mềm, c&ocirc;ng nghệ kĩ thuật, đầu tư).<br />\r\n- Những sai lầm cần tr&aacute;nh của những chủ shop b&aacute;n h&agrave;ng online hiện tại.<br />\r\n- Ph&acirc;n t&iacute;ch t&acirc;m l&yacute; kh&aacute;ch h&agrave;ng khi mua h&agrave;ng qua mạng x&atilde; hội.<br />\r\n- Hướng dẫn căn bản về mạng x&atilde; hội (tạo t&agrave;i khoản, bảo mật,...).<br />\r\n- Hướng dẫn n&acirc;ng cao về mạng x&atilde; hội (gia tăng bạn, t&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng,...).<br />\r\n- X&acirc;y dựng h&igrave;nh ảnh c&aacute; nh&acirc;n chuy&ecirc;n nghiệp.<br />\r\n- Nội dung b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp.<br />\r\n- Chiến lược thời gian đăng b&agrave;i.<br />\r\n- Chiến lược chọn độ tuổi giới t&iacute;nh.<br />\r\n- Chiến lược ph&aacute; vỡ giới hạn kết bạn.<br />\r\n- Chiến lược phễu b&aacute;n h&agrave;ng zalo.<br />\r\n- Kh&acirc;u chuẩn bị chuy&ecirc;n nghiệp trước khi b&aacute;n h&agrave;ng.<br />\r\n- Chiến lược tiếp cận kh&aacute;ch h&agrave;ng.<br />\r\n- C&aacute;ch tư vấn chuy&ecirc;n nghiệp.<br />\r\n- Kỹ năng chốt sale.<br />\r\n- Telesales chuy&ecirc;n nghiệp.<br />\r\n- Chăm s&oacute;c kh&aacute;ch h&agrave;ng.<br />\r\n- Chiến lược remarketing.<br />\r\n- C&aacute;c c&ocirc;ng cụ hỗ trợ trong b&aacute;n h&agrave;ng tr&ecirc;n mạng x&atilde; hội.</p>\r\n\r\n<p>Y&ecirc;u cầu của kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- Thiết bị kết nối internet</li>\r\n</ul>\r\n\r\n<p>Lợi &iacute;ch từ kh&oacute;a học</p>\r\n\r\n<ul>\r\n	<li>- C&oacute; đơn h&agrave;ng đều khi l&agrave;m đ&uacute;ng theo hướng dẫn</li>\r\n	<li>- Hiểu được c&aacute;ch b&aacute;n h&agrave;ng chuy&ecirc;n nghiệp cho bất k&igrave; d&ograve;ng sản phẩm n&agrave;o</li>\r\n	<li>- X&acirc;y dựng được thương hiệu c&aacute; nh&acirc;n tr&ecirc;n mạng x&atilde; hội</li>\r\n</ul>\r\n\r\n<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>- Chủ shop online</li>\r\n	<li>- C&aacute;c bạn c&oacute; &yacute; định kinh doanh online</li>\r\n	<li>- C&aacute;c bạn y&ecirc;u th&iacute;ch kinh doanh</li>\r\n</ul>', 2, 0, '#ngoại ngữ', 10, 1, 12, 13, 1, '2018-08-20 02:37:44', '2018-09-06 08:59:30'),
(19, 'âsasasasa', 'asasasasa', 'hs_2018-09-07_1536294559.jpeg', 969000, NULL, 3, 1, 0, 0, '<p>Nội dung của kh&oacute;a học</p>', 0, 0, NULL, NULL, 0, 1, 13, 1, '2018-09-07 04:29:20', '2018-09-07 04:29:20'),
(20, 'Môi giới bất động sản hiện nay đang cạnh tranh khốc liệt', 'moi-gioi-bat-dong-san-hien-nay-dang-canh-tranh-khoc-liet', 'hs_2018-09-07_1536295458.jpeg', 790000, NULL, 3, 1, 0, 0, '<p>Nội dung của kh&oacute;a học</p>', 0, 0, NULL, NULL, 0, 1, 13, 1, '2018-09-07 04:44:19', '2018-09-07 04:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `doc_id` int(10) UNSIGNED NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_gr_id` int(10) UNSIGNED NOT NULL,
  `doc_acc_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`doc_id`, `doc_name`, `doc_img`, `doc_link`, `doc_gr_id`, `doc_acc_id`, `created_at`, `updated_at`) VALUES
(3, 'Giới thiệu', 'hs_2018-06-26_1530023489.jpeg', '1530023490.docx', 1, 1, '2018-06-26 14:31:30', '2018-06-26 14:31:30'),
(4, 'Tiếng Anh', 'hs_2018-06-26_1530023507.jpeg', '1530023507.doc', 1, 1, '2018-06-26 14:31:47', '2018-06-26 14:31:47'),
(5, 'Tài liệu 1', 'hs_2018-07-05_1530794377.jpeg', '1530794381.docx', 6, 1, '2018-07-05 12:39:41', '2018-07-05 12:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(10) UNSIGNED NOT NULL,
  `gift_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`gift_id`, `gift_email`, `gift_status`, `created_at`, `updated_at`) VALUES
(1, 'vquyenaaa@gmail.com', 1, '2018-07-03 03:10:55', '2018-07-03 03:10:55'),
(2, 'thongminh.depzai@gmail.com', 1, '2018-07-03 03:34:43', '2018-07-03 03:34:43'),
(3, 'quyendo.site3@cphonevn.com', 1, '2018-07-03 07:03:37', '2018-07-03 07:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gr_id` int(10) UNSIGNED NOT NULL,
  `gr_parent_id` int(11) NOT NULL DEFAULT '0',
  `gr_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gr_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gr_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gr_id`, `gr_parent_id`, `gr_name`, `gr_slug`, `gr_img`, `created_at`, `updated_at`) VALUES
(1, 0, 'Ngoại ngữ', 'ngoai-ngu', '1534143186.png', '2018-04-04 02:43:14', '2018-08-13 06:53:06'),
(2, 0, 'Maketing', 'maketing', '1534143197.png', '2018-04-04 02:43:58', '2018-08-13 06:53:17'),
(3, 0, 'Tin học văn phòng', 'tin-hoc-van-phong', '1534143443.png', '2018-04-04 02:44:10', '2018-08-13 06:57:23'),
(4, 0, 'Thiết kế đồ họa', 'thiet-ke-do-hoa', '1534143455.png', '2018-04-04 18:40:43', '2018-08-13 07:10:39'),
(5, 0, 'Công nghệ thông tin', 'cong-nghe-thong-tin', '1534143465.png', '2018-04-04 18:44:21', '2018-08-13 06:57:45'),
(6, 0, 'Kỹ năng mềm', 'ky-nang-mem', '1534144156.png', '2018-04-04 19:39:34', '2018-08-13 07:09:16'),
(7, 0, 'Luyện thi THPT Quốc Gia', 'luyen-thi-thpt-quoc-gia', '1534144171.png', '2018-04-18 19:05:32', '2018-08-13 07:09:31'),
(8, 0, 'Khởi nghiệp kinh doanh', 'khoi-nghiep-kinh-doanh', '1534144224.png', '2018-04-18 19:06:35', '2018-08-13 07:10:24'),
(9, 1, 'Toeic', 'toeic', '1534738917.png', '2018-08-20 04:15:40', '2018-08-20 04:21:57'),
(10, 1, 'Ielts', 'ielts', '1534738890.png', '2018-08-20 04:21:30', '2018-08-20 04:21:30'),
(11, 1, 'Mất gốc', 'mat-goc', '1534739052.png', '2018-08-20 04:24:12', '2018-08-20 04:24:12'),
(12, 1, 'Giao tiếp', 'giao-tiep', '1534739082.png', '2018-08-20 04:24:42', '2018-08-20 04:24:42'),
(13, 5, 'Java', 'java', '1536112964.png', '2018-09-05 02:02:45', '2018-09-05 02:02:45'),
(14, 5, 'PHP', 'php', '1536112981.png', '2018-09-05 02:03:01', '2018-09-05 02:03:01'),
(15, 5, 'C#', 'c', '1536112990.png', '2018-09-05 02:03:10', '2018-09-05 02:03:10'),
(16, 2, 'Digital Marketing', 'digital-marketing', '1536113347.jpg', '2018-09-05 02:09:07', '2018-09-05 02:09:07'),
(17, 2, 'Marketing truyền thống', 'marketing-truyen-thong', '1536113386.jpg', '2018-09-05 02:09:46', '2018-09-05 02:09:46'),
(18, 2, 'Affiliate Marketing', 'affiliate-marketing', '1536113460.jpg', '2018-09-05 02:11:00', '2018-09-05 02:11:00'),
(19, 1, 'Tiếng Hàn', 'tieng-han', '1536135435.jpg', '2018-09-05 08:17:16', '2018-09-05 08:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `les_id` int(10) UNSIGNED NOT NULL,
  `les_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `les_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `les_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `les_video_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `les_part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`les_id`, `les_name`, `les_slug`, `les_link`, `les_video_duration`, `les_part_id`, `created_at`, `updated_at`) VALUES
(2, 'Giới thiệu', 'gioi-thieu', '1526647592.mp4', '06:09', 13, '2018-05-18 05:46:32', '2018-05-18 05:46:32'),
(3, 'Tiếng Anh', 'tieng-anh', '1526647653.mp4', '04:33', 13, '2018-05-18 05:47:33', '2018-05-18 05:47:33'),
(4, 'Layer là gì', 'layer-la-gi', '1526698672.mp4', '04:33', 11, '2018-05-18 19:57:52', '2018-05-18 19:57:52'),
(5, 'Giới thiệu VNG Group', 'gioi-thieu-vng-group', '1528420405.mp4', '06:09', 13, '2018-06-08 01:13:25', '2018-06-08 01:13:25'),
(6, 'Giới thiệu', 'gioi-thieu', '1528794961.mp4', '06:09', 1, '2018-06-12 09:16:01', '2018-06-12 09:16:01'),
(7, 'Giới thiệu', 'gioi-thieu', '1528970867.mp4', '04:33', 14, '2018-06-14 10:07:47', '2018-06-14 10:07:47'),
(8, 'Layer là gì', 'layer-la-gi', '1529035537.mp4', '04:33', 8, '2018-06-15 04:05:37', '2018-06-15 04:05:37'),
(9, 'Quan trọng là thấn thái', 'quan-trong-la-than-thai', '1530870144.mp4', '03:41', 15, '2018-07-06 09:42:24', '2018-07-06 09:42:24'),
(10, 'Thần thái là gì', 'than-thai-la-gi', '1530870325.mp4', '02:55', 15, '2018-07-06 09:45:25', '2018-07-06 09:45:25'),
(11, 'Làm sao để đạt được thần thái', 'lam-sao-de-dat-duoc-than-thai', '1530871025.mp4', '03:05', 15, '2018-07-06 09:57:05', '2018-07-06 09:57:05'),
(12, 'Aloha', 'aloha', '1536285776.mp4', '02:47', 16, '2018-09-07 02:02:56', '2018-09-07 02:02:56'),
(13, 'Hình ảnh kỹ thuật số', 'hinh-anh-ky-thuat-so', '1536296255.mp4', '02:47', 11, '2018-09-07 04:57:35', '2018-09-07 04:57:35'),
(14, 'Tạo môi trường', 'tao-moi-truong', '1536296323.mp4', '02:47', 17, '2018-09-07 04:58:43', '2018-09-07 04:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2018_04_04_010904_accounts', 1),
(8, '2018_04_04_084547_groups', 2),
(10, '2018_04_04_084242_course', 3),
(15, '2018_04_05_091431_comment', 6),
(16, '2018_04_06_023537_news', 7),
(17, '2018_04_06_043155_part', 8),
(19, '2018_04_06_080504_rating', 10),
(22, '2018_04_06_064659_lesson', 11),
(23, '2018_05_01_041112_create_social_accounts_table', 12),
(30, '2018_05_09_042020_teacher', 16),
(32, '2018_05_09_044019_story', 17),
(33, '2018_05_09_084303_teacher_rating', 18),
(34, '2018_05_10_025634_banner', 19),
(37, '2018_04_05_041234_order', 20),
(38, '2018_04_05_042247_orderdetail', 20),
(39, '2018_05_17_070359_aff', 20),
(40, '2018_05_18_091921_about', 21),
(41, '2018_05_21_082211_alter2_users_table', 22),
(42, '2018_05_02_031745_code', 23),
(43, '2018_06_21_112310_account_request', 24),
(44, '2018_05_04_103933_groupdoc', 25),
(46, '2018_05_05_020540_doc', 26),
(47, '2018_07_03_094225_gift', 27),
(48, '2018_07_04_141253_notifitation', 28);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_type` tinyint(4) NOT NULL,
  `news_view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_slug`, `news_img`, `news_content`, `news_type`, `news_view`, `created_at`, `updated_at`) VALUES
(1, 'Làm ‘sáng’ website của bạn với 12 cách ‘phù phép’ màu sắc (tất cả các ngành hàng)', 'lam-sang-website-cua-ban-voi-12-cach-phu-phep-mau-sac-tat-ca-cac-nganh-hang', 'hs_2018-06-05_1528172091.jpeg', '<p>Muốn đạt được th&agrave;nh c&ocirc;ng trong kinh doanh, bạn cần lưu t&acirc;m tới rất nhiều thứ. Kh&ocirc;ng chỉ am hiểu về x&acirc;y dựng thương hiệu, c&aacute;ch thức ph&aacute;t triển chiến lược marketing &amp; quảng c&aacute;o hiệu quả, m&agrave; bạn c&ograve;n cần biết c&aacute;ch tạo ấn tượng thực sự với kh&aacute;ch h&agrave;ng. Website ch&iacute;nh l&agrave; c&ocirc;ng cụ tốt nhất để thực hiện mục ti&ecirc;u đ&oacute;.</p>\r\n\r\n<p>M&agrave;u sắc c&oacute; tầm ảnh hưởng đặc biệt đến h&agrave;nh vi, phản ứng, cảm x&uacute;c của kh&aacute;ch h&agrave;ng. Bằng c&aacute;ch sử dụng m&agrave;u sắc cho website một c&aacute;c hơp l&yacute;, bạn c&oacute; thể khiến cho kh&aacute;ch h&agrave;ng suy nghĩ, cảm nhận v&agrave; tương t&aacute;c với thương hiệu của bạn theo c&aacute;ch m&agrave; bạn muốn.</p>\r\n\r\n<p>H&atilde;y c&ugrave;ng t&igrave;m hiểu s&acirc;u hơn về kh&aacute;i niệm t&acirc;m l&yacute; m&agrave;u sắc v&agrave; c&aacute;ch ứng dụng n&oacute;. Đầu ti&ecirc;n, ch&uacute;ng ta h&atilde;y c&ugrave;ng xem một số c&aacute;ch phối m&agrave;u ảnh hưởng trực tiếp tới t&acirc;m l&yacute; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<h3>T&acirc;m l&iacute; m&agrave;u sắc l&agrave; g&igrave;?</h3>\r\n\r\n<p>H&atilde;y vắn tắt lại định nghĩa. T&acirc;m l&yacute; m&agrave;u sắc l&agrave; &ldquo;nghi&ecirc;n cứu sự ảnh hưởng của m&agrave;u sắc đến quyết định của con người&rdquo;. N&oacute;i c&aacute;ch kh&aacute;c, đ&oacute; l&agrave; c&aacute;ch m&agrave; m&agrave;u sắc ảnh hưởng đến c&aacute;ch h&agrave;nh xử của mỗi người.<br />\r\nTheo như t&acirc;m l&yacute; m&agrave;u sắc, những m&agrave;u sắc kh&aacute;c nhau đem đến những cảm x&uacute;c , cảm gi&aacute;c v&agrave; h&agrave;nh vi kh&aacute;c nhau. Dưới đ&acirc;y l&agrave; một c&aacute;i nh&igrave;n to&agrave;n thể về đặc t&iacute;nh t&acirc;m l&yacute; của những m&agrave;u sắc trong cầu vồng.</p>\r\n\r\n<h3>&Yacute; nghĩa của những sắc m&agrave;u</h3>\r\n\r\n<p><em><strong>Đỏ:</strong>&nbsp;</em>Năng lượng, hứng khởi, nhiệt huyết v&agrave; nguy hiểm. Đỏ l&agrave; m&agrave;u sắc tuyệt vời để th&uacute;c giục con người ta h&agrave;nh động.</p>\r\n\r\n<p><em><strong>Cam:</strong></em>&nbsp;Hạnh ph&uacute;c v&agrave; vui vẻ. M&agrave;u cam được biết đến rộng r&atilde;i như l&agrave; m&agrave;u của niềm vui v&agrave; sử dụng m&agrave;u cam trong nh&atilde;n hiệu l&agrave; một c&aacute;ch ho&agrave;n hảo để thể hiện t&iacute;nh h&agrave;i hước.</p>\r\n\r\n<p><em><strong>V&agrave;ng:</strong>&nbsp;</em>M&agrave;u của &aacute;nh nắng. V&agrave;ng gợi li&ecirc;n tưởng đến niềm h&acirc;n hoan, phấn khởi v&agrave; cởi mở.</p>\r\n\r\n<p><em><strong>Xanh l&aacute; c&acirc;y:</strong>&nbsp;</em>Khi nh&igrave;n thấy m&agrave;u xanh l&aacute;, mọi người sẽ nhớ ngay đến 2 thứ: thi&ecirc;n nhi&ecirc;n v&agrave; những tờ tiền giấy. M&agrave;u xanh l&aacute; cũng được chứng minh l&agrave; c&oacute; t&aacute;c dụng tĩnh t&acirc;m, do đ&oacute;, nếu bạn muốn b&igrave;nh ổn cảm x&uacute;c, xanh l&aacute; l&agrave; một sự lựa chọn tuyệt vời.</p>\r\n\r\n<p><em><strong>Xanh nước biển:</strong></em>&nbsp;Đ&acirc;y l&agrave; m&agrave;u sắc nhận được nhiều sự ưa th&iacute;ch nhất. Xanh nước biển tạo n&ecirc;n cảm gi&aacute;c tin tưởng, do đ&oacute; n&oacute; được rất nhiều nh&atilde;n h&agrave;ng ưa chuộng. Tr&ecirc;n thực thế, tr&ecirc;n một nửa c&aacute;c logo hiện nay đều c&oacute; m&agrave;u xanh nước biển.</p>\r\n\r\n<p><em><strong>T&iacute;m:</strong>&nbsp;</em>M&agrave;u của sự trung th&agrave;nh. T&iacute;m mang lại cảm gi&aacute;c vương giả, uy quyền, sắc sảo.</p>\r\n\r\n<p><em><strong>Hồng:</strong>&nbsp;</em>M&agrave;u hồng thường được d&ugrave;ng trong c&aacute;c nh&atilde;n hiệu d&agrave;nh ri&ecirc;ng cho ph&aacute;i đẹp, c&aacute;c sắc độ kh&aacute;c nhau của m&agrave;u hồng c&oacute; thể tạo ra rung cảm trẻ trung l&ocirc;i cuốn hơn đối với đ&agrave;n &ocirc;ng (#realmenwearpink). Hồng cũng l&agrave; m&agrave;u của Tổ chức n&acirc;ng cao nhận thức về ung thư v&uacute;, do đ&oacute;, m&agrave;u sắc n&agrave;y mang một sự gắn kết mạnh mẽ</p>\r\n\r\n<p><em><strong>Đen:</strong></em>&nbsp;Cổ điển, b&oacute;ng bẩy v&agrave; hiện đại, đen l&agrave; biểu tượng của sự xa xỉ rất th&iacute;ch hợp với c&aacute;c nh&atilde;n hiệu cao cấp.</p>\r\n\r\n<p><em><strong>Trắng:</strong>&nbsp;</em>Đ&ocirc;i khi, m&agrave;u sắc đẹp nhất l&agrave; &ldquo;kh&ocirc;ng c&oacute; m&agrave;u g&igrave; cả&rdquo;. Trắng l&agrave; m&agrave;u sắc hấp dẫn đối với c&aacute;c thương hiệu v&agrave; thường được coi l&agrave; biểu tượng của sự thuần khiết.</p>\r\n\r\n<p><em><strong>X&aacute;m:</strong></em>&nbsp;Nếu như bạn sở hữu một thương hiệu nghi&ecirc;m trang hơn, m&agrave;u x&aacute;m ch&iacute;nh l&agrave; lựa chọn d&agrave;nh cho bạn. N&oacute; mang đến cảm gi&aacute;c trưởng th&agrave;nh, uy quyền, v&agrave; cho mọi người thấy được bạn nghi&ecirc;m t&uacute;c với c&ocirc;ng việc kinh doanh của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac1_1519959610.png\" /></p>\r\n\r\n<p>Vậy n&ecirc;n, h&atilde;y chọn đ&uacute;ng c&aacute;ch phối m&agrave;u để nắm bắt cảm x&uacute;c.</p>\r\n\r\n<p>Mỗi m&agrave;u sắc lại sở hữu một &yacute; nghĩa ri&ecirc;ng biệt. Nhưng website lu&ocirc;n l&agrave; sự kết hợp của đa dạng sắc m&agrave;u chứ kh&ocirc;ng chỉ ri&ecirc;ng một m&agrave;u đơn điệu. V&igrave; vậy, cần phối hợp theo c&aacute;ch n&agrave;o đ&oacute; để t&aacute;c động &ldquo;k&eacute;p&rdquo; tới t&acirc;m l&yacute; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<h3>C&aacute;ch phối m&agrave;u tạo cho kh&aacute;ch h&agrave;ng niềm hứng th&uacute;</h3>\r\n\r\n<p>Mục ti&ecirc;u m&agrave; mọi doanh nghiệp đều mong muốn khi kh&aacute;ch h&agrave;ng gh&eacute; thăm website của họ ch&iacute;nh l&agrave; l&agrave;m kh&aacute;ch h&agrave;ng cảm thấy hứng khởi. Một người ti&ecirc;u d&ugrave;ng với t&acirc;m trạng hưng phấn sẽ c&oacute; khả năng h&agrave;nh động theo hướng t&iacute;ch cực, một trong số đ&oacute;, tất nhi&ecirc;n rồi, l&agrave; đặt mua sản phẩm!</p>\r\n\r\n<p>Một v&iacute; dụ tuyệt vời về phối m&agrave;u website đem tới cảm x&uacute;c t&iacute;ch cực cho kh&aacute;ch h&agrave;ng đ&oacute; l&agrave; c&aacute;c nh&atilde;n h&agrave;ng trẻ em. C&aacute;c thương hiệu n&agrave;y muốn khiến cho những đứa trẻ trở n&ecirc;n vui vẻ. V&agrave; những đứa trẻ ấy sẽ năn nỉ bố mẹ mua bằng được đồ chơi, quần &aacute;o&hellip; hoặc nh&agrave; hơi m&agrave; thương hiệu đ&oacute; đang b&aacute;n. Niềm hứng khởi của kh&aacute;ch h&agrave;ng ch&iacute;nh l&agrave; b&iacute; quyết kinh doanh th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>Vậy l&agrave;m thế n&agrave;o để khiến cho kh&aacute;ch h&agrave;ng đạt được mức hứng khởi ấy? C&acirc;u trả lời ch&iacute;nh l&agrave; sử dụng những gam m&agrave;u s&aacute;ng, s&ocirc;i nổi. Trẻ em thường bị thu h&uacute;t bởi những m&agrave;u sắc s&aacute;ng, sặc sỡ. H&atilde;y nhớ rằng, rất &iacute;t trẻ th&iacute;ch m&agrave;u nude hay m&agrave;u lục nhạt.</p>\r\n\r\n<p>Đối với hiệu d&agrave;nh cho trẻ em hay bất k&igrave; nh&atilde;n hiệu n&agrave;o, sử dụng m&agrave;u nổi bật sẽ khiến kh&aacute;ch h&agrave;ng sẵn r&uacute;t v&iacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac2_1519959642.png\" /></p>\r\n\r\n<h3>Phối m&agrave;u website n&acirc;ng cao cảm t&igrave;nh thương hiệu</h3>\r\n\r\n<p>Như ch&uacute;ng ta đ&atilde; đề cập đến trước đ&oacute;, những m&agrave;u sắc kh&aacute;c nhau tạo n&ecirc;n những phản ứng kh&aacute;c nhau t&ugrave;y theo từng nh&oacute;m người. Nhưng c&oacute; một số m&agrave;u chắc chắn đc ưa th&iacute;ch rộng r&atilde;i to&agrave;n diện tr&ecirc;n mọi lĩnh vực. Điều n&agrave;y rất cần thiết cho việc x&acirc;y l&ograve;ng trung th&agrave;nh đối với thương hiệu cũng như cảm x&uacute;c t&iacute;ch cực &ndash; thứ gi&uacute;p cho c&ocirc;ng việc kinh doanh của bạn ph&aacute;t triển trong tương lai gần.</p>\r\n\r\n<p>Vậy th&igrave;, bạn n&ecirc;n sử dụng m&agrave;u n&agrave;o để tạo được sự l&ocirc;i cuốn rộng r&atilde;i? C&acirc;u trả lời ch&iacute;nh l&agrave; xanh biển v&agrave; xanh l&aacute;.</p>\r\n\r\n<p>Theo như một nghi&ecirc;n cứu gần đ&acirc;y, cả phụ nữ v&agrave; nam giới đều chọn xanh nước biển v&agrave; xanh l&aacute; c&acirc;y l&agrave; 2 trong số những m&agrave;u sắc y&ecirc;u th&iacute;ch của họ, 25% phụ nữ v&agrave; hơn 57% đ&agrave;n &ocirc;ng khẳng định rằng xanh biển l&agrave; m&agrave;u m&agrave; họ th&iacute;ch nhất. 14% người được hỏi (cả nam v&agrave; nữ) chọn xanh l&aacute; c&acirc;y.</p>\r\n\r\n<p>Bằng c&aacute;ch bổ sung xanh nước biển v&agrave; xanh l&aacute; c&acirc;y v&agrave;o bảng phối m&agrave;u website, bạn sẽ n&iacute;u giữ được kh&aacute;ch h&agrave;ng ở lại website l&acirc;u hơn v&agrave; tạo ra thiện cảm ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac3_1519959666.png\" /></p>\r\n\r\n<h3>C&aacute;ch phối m&agrave;u website tăng sự t&iacute;n nhiệm</h3>\r\n\r\n<p>Mặt kh&aacute;c, nếu bạn đang muốn trở n&ecirc;n nghi&ecirc;m t&uacute;c hơn, điều m&agrave; bạn đang t&igrave;m kiếm kh&ocirc;ng phải l&agrave; sự h&agrave;o hứng, m&agrave; phải l&agrave; sự t&iacute;n nhiệm, bạn c&oacute; thể sử dụng những m&agrave;u trung t&iacute;nh hơn, m&agrave;u lặng (muted palette) với 1 hoặc 2 m&agrave;u được nhấn mạnh. Sử dụng bảng m&agrave;u s&aacute;ng sẽ dẫn đến cảm gi&aacute;c hơi ph&ocirc; trương v&agrave; c&oacute; thể l&agrave;m mất đi ấn tượng nghi&ecirc;m t&uacute;c m&agrave; bạn đang d&agrave;y c&ocirc;ng x&acirc;y dựng cho c&ocirc;ng việc kinh doanh của m&igrave;nh.</p>\r\n\r\n<p>C&aacute;c m&agrave;u trung t&iacute;nh như đen, n&acirc;u thường gợi li&ecirc;n tưởng những vấn đề mang t&iacute;nh chất nghi&ecirc;m trọng. Nếu mục ti&ecirc;u của bạn l&agrave; khiến cho website của m&igrave;nh được nh&igrave;n nhận một c&aacute;ch nghi&ecirc;m t&uacute;c, h&atilde;y sử dụng những t&ocirc;ng m&agrave;u n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac4_1519959693.png\" /></p>\r\n\r\n<h3>Kết hợp m&agrave;u website tăng sự tin tưởng</h3>\r\n\r\n<p>Muốn được nh&igrave;n nhận như một thương hiệu vững chắc v&agrave; đ&aacute;ng tin? H&atilde;y sử dụng m&agrave;u xanh nước biển. Xanh nước biển đ&atilde; được chứng minh l&agrave; c&oacute; thể l&agrave;m gia tăng cảm gi&aacute;c tin tưởng. Chắc chắn đ&acirc;y sẽ l&agrave; một lựa chọn tốt để định h&igrave;nh thương hiệu của bạn như một nơi m&agrave; người ti&ecirc;u d&ugrave;ng c&oacute; thể đặt niềm tin. Đ&oacute; l&agrave; l&yacute; do tại sao xanh nước biển l&agrave; m&agrave;u được ưa chuộng nhất ở Mỹ, c&oacute; mặt trong hơn 50% logo của c&aacute;c h&atilde;ng nh&atilde;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac5_1519959720.png\" /></p>\r\n\r\n<p><em>Sử dụng m&agrave;u sắc để kh&aacute;ch h&agrave;ng đồng &yacute; sử dụng sản phẩm v&agrave; dịch vụ.</em></p>\r\n\r\n<p>Giống như việc d&ugrave;ng m&agrave;u sắc để khơi n&ecirc;n những cảm gi&aacute;c đặc biệt, bạn cũng c&oacute; thể sử dụng n&oacute; để tạo n&ecirc;n những h&agrave;nh động đặc biệt nhờ chiến lược cụ thể. Phối hợp m&agrave;u sắc sẽ khiến cho kh&aacute;ch h&agrave;ng l&agrave;m theo ch&iacute;nh x&aacute;c những g&igrave; bạn muốn, hay n&oacute;i c&aacute;ch kh&aacute;c, c&oacute; th&ecirc;m những kh&aacute;ch h&agrave;ng đồng &yacute; chi tiền.</p>\r\n\r\n<p>Tất nhi&ecirc;n, c&aacute;ch phối m&agrave;u website c&oacute; thể gi&uacute;p bạn thực hiện điều đ&oacute;. Chiến lược sử dụng m&agrave;u sắc đ&uacute;ng chỗ, đ&uacute;ng thời điểm sẽ tạo n&ecirc;n được những hiệu quả đặc bi&ecirc;t.</p>\r\n\r\n<p>Bạn c&oacute; thể sử dụng m&agrave;u đỏ. M&agrave;u đỏ l&agrave; m&agrave;u sắc duy nhất được chứng minh l&agrave; c&oacute; khả năng tăng lượng kh&aacute;ch đồng &yacute; mua h&agrave;ng l&ecirc;n 34%.</p>\r\n\r\n<p>Nếu bạn muốn kh&aacute;ch h&agrave;ng cảm thấy t&ograve; m&ograve;, h&atilde;y thử d&ugrave;ng m&agrave;u xanh l&aacute; c&acirc;y &ndash; m&agrave;u c&oacute; khả năng khơi m&agrave;o s&aacute;ng tạo.</p>\r\n\r\n<p>Sử dụng những m&agrave;u đặc biệt sẽ khiến cho b&agrave;i viết tr&ecirc;n website của bạn th&uacute; vị tới nỗi, ch&uacute;ng như thể đang nhảy ra ngo&agrave;i m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh v&agrave; n&oacute;i với kh&aacute;ch h&agrave;ng &ldquo;Hey! Nh&igrave;n n&agrave;y&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac6_1519959803.png\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac7_1519959811.png\" /></p>\r\n\r\n<p><em>Sử dụng đ&uacute;ng m&agrave;u sắc cho từng ng&agrave;nh nghề.</em></p>\r\n\r\n<p>Cũng giống như việc kh&ocirc;ng c&oacute; c&aacute;ch chắc chắn n&agrave;o để 100% kh&aacute;ch h&agrave;ng tiềm năng sẽ trở th&agrave;nh kh&aacute;ch h&agrave;ng đồng &yacute; sử dụng sản phẩm, kh&ocirc;ng c&oacute; luật n&agrave;o quy định việc d&ugrave;ng m&agrave;u g&igrave; cho ng&agrave;nh kinh doanh n&agrave;o. Tuy nhi&ecirc;n, c&oacute; một số m&agrave;u sắc lại th&agrave;nh c&ocirc;ng trong việc gợi sự li&ecirc;n tưởng.</p>\r\n\r\n<h3>Xanh l&aacute; cho những thương hiệu th&acirc;n thiện với m&ocirc;i trường</h3>\r\n\r\n<p>Bởi m&agrave;u xanh l&aacute; gợi li&ecirc;n tưởng đến thi&ecirc;n nhi&ecirc;n n&ecirc;n thường được chọn l&agrave;m ưu ti&ecirc;n h&agrave;ng đầu cho c&aacute;c thương hiệu th&acirc;n thiện với m&ocirc;i trường.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac8_1519959826.png\" /></p>\r\n\r\n<h3>M&agrave;u xanh nước biển cho nước</h3>\r\n\r\n<p>Thường gợi nhớ đến biển (hoặc như trong phim Đi t&igrave;m Nemo đ&atilde; gọi,đ&oacute; l&agrave; &rdquo;Đại dương xanh&rdquo;) tuy nhi&ecirc;n, khi mọi người nghĩ tới nước, họ cũng nghĩ tới cả m&agrave;u xanh nước biển. Nếu ng&agrave;nh kinh doanh của bạn l&agrave; nước uống, hay c&oacute; li&ecirc;n quan đến nước, bạn sẽ tạo được ấn tượng cho thương hiệu của m&igrave;nh</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac9_1519959839.png\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac10_1519959848.png\" /></p>\r\n\r\n<h3>Xanh nước biển cho t&agrave;i ch&iacute;nh, kinh tế</h3>\r\n\r\n<p>Nếu c&ocirc;ng ty bạn l&agrave;m về c&oacute; nền tảng l&agrave; t&agrave;i ch&iacute;nh, cảm gi&aacute;c đầu ti&ecirc;n m&agrave; bạn phải mang lại cho kh&aacute;ch h&agrave;ng đ&oacute; l&agrave; sự tin tưởng. Đ&oacute; l&agrave; l&yacute; do tại sao m&agrave; xanh da trời &ndash; biểu tượng của niềm tin-l&agrave; một sự lựa chọn tuyệt vời.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac11_1519959861.png\" /></p>\r\n\r\n<h3>Đỏ cho ng&agrave;nh b&aacute;n lẻ</h3>\r\n\r\n<p>Nếu bạn l&agrave; một nh&agrave; kinh doanh b&aacute;n lẻ sản phẩm (c&ocirc;ng ty hoạt động trong một cửa tiệm thực sự,thường thấy tại c&aacute;c trung t&acirc;m thương mại, nơi kh&aacute;ch h&agrave;ng c&oacute; thể đến xem h&agrave;ng h&oacute;a v&agrave; tiếp x&uacute;c với nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng, hoặc thương mại điện tử), m&agrave;u đỏ l&agrave; một sự lựa chọn th&iacute;ch hợp. M&agrave;u đỏ thổi bừng l&ecirc;n sức sống v&agrave; khiến cho kh&aacute;ch h&agrave;ng hứng th&uacute; với việc mua sản phẩm của bạn. Nếu bạn kh&ocirc;ng tin, h&atilde;y nh&igrave;n v&agrave;o con số n&agrave;y: hơn 59% logo v&agrave; nh&atilde;n hiệu của c&aacute;c nh&agrave; b&aacute;n lẻ đều c&oacute; chứa m&agrave;u đỏ.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/Mausac12_1519959875.png\" /></p>\r\n\r\n<p>Như một nh&agrave; s&aacute;ng lập v&agrave; <a href=\"http://blog.edumall.vn/ebook-emyth-de-tro-thanh-nha-quan-ly-hieu-qua/\">quản l&yacute;</a>, bạn phải sẵn s&agrave;ng l&agrave;m tất cả mọi việc trong khả năng của m&igrave;nh để nhận được sự ủng hộ của kh&aacute;ch h&agrave;ng, kể cả l&agrave; phải thử hết tất cả c&aacute;c m&agrave;u để t&igrave;m ra m&agrave;u ph&ugrave; hợp nhất cho website của m&igrave;nh.</p>\r\n\r\n<p>Bạn đ&atilde; t&igrave;m ra c&aacute;ch phối m&agrave;u m&agrave;u bạn muốn cho website của m&igrave;nh chưa? Với vai tr&ograve; l&agrave; Agency thiết kế thương hiệu h&agrave;ng đầu, LogoArt lu&ocirc;n nỗ lực để tư vấn cho kh&aacute;ch h&agrave;ng những phương &aacute;n website hiệu quả nhất, để n&iacute;u giữ kh&aacute;ch h&agrave;ng ngay từ lần đầu ti&ecirc;n truy cập, v&agrave; gia tăng tỷ lệ mua h&agrave;ng mỗi ng&agrave;y.</p>', 1, 1545, '2018-04-05 19:57:23', '2018-09-05 01:46:59'),
(2, '4 thủ thuật tâm lý trong marketing giúp tăng doanh số', '4-thu-thuat-tam-ly-trong-marketing-giup-tang-doanh-so', 'hs_2018-06-05_1528172084.jpeg', '<p>Nếu bạn nắm bắt được yếu tố ảnh hưởng lớn nhất đến người mua, thời điểm họ muốn chi tiền, bạn c&oacute; thể d&ugrave;ng c&aacute;c kiến thức đ&oacute; để thu h&uacute;t kh&aacute;ch h&agrave;ng tiềm năng.</p>\r\n\r\n<p>Giữ được sự ch&uacute; &yacute; của một người trong v&agrave;i ph&uacute;t l&agrave; điều rất kh&oacute;. Đặc biệt ng&agrave;y nay, mạng x&atilde; hội tạo ra sự xao nh&atilde;ng lớn nơi con người bởi c&aacute;c th&ocirc;ng b&aacute;o li&ecirc;n tục về cập nhật mới. Để đạt được mục ti&ecirc;u kinh doanh, c&aacute;c doanh nghiệp cần t&igrave;m ra những c&aacute;ch đặc biệt để kết nối với kh&aacute;ch h&agrave;ng v&agrave; khuyến kh&iacute;ch họ mua sắm th&ocirc;ng qua c&aacute;c chiến lược marketing.</p>\r\n\r\n<p>&ldquo;Động lực th&uacute;c đẩy kh&aacute;ch h&agrave;ng h&agrave;nh động đều tương đồng tr&ecirc;n cả k&ecirc;nh trực tuyến lẫn trực tiếp. Những c&acirc;u chuyện hay sẽ l&agrave;m con người cảm động. Những thương hiệu c&oacute; th&ocirc;ng điệp r&otilde; r&agrave;ng, thiết kế bắt mắt v&agrave; &aacute;p dụng c&ocirc;ng nghệ dễ sử dụng sẽ th&uacute;c đẩy kh&aacute;ch h&agrave;ng h&agrave;nh động, bất kể l&agrave; tr&ecirc;n website, TV hay gặp trực tiếp tại sự kiện kh&aacute;ch h&agrave;ng&rdquo;, Rachel Clemens &ndash; CMO của Mighty Citizen cho biết.</p>\r\n\r\n<p>Sử dụng c&aacute;c thủ thuật t&acirc;m l&yacute; trong marketing l&agrave; c&aacute;ch tuyệt vời để thu h&uacute;t sự ch&uacute; &yacute; cho thương hiệu của bạn. Nếu bạn nắm bắt được điều ảnh hưởng lớn nhất đến người mua, thời điểm họ muốn chi tiền, bạn c&oacute; thể d&ugrave;ng c&aacute;c kiến thức đ&oacute; để thu h&uacute;t kh&aacute;ch h&agrave;ng tiềm năng. Trong b&agrave;i viết tr&ecirc;n trang Business News Daily, Rachel Clemens chia sẻ 4 thủ thuật t&acirc;m l&yacute; sẽ gi&uacute;p bạn cải thiện chiến lược marketing v&agrave; gia tăng doanh số. Đ&oacute; l&agrave;:</p>\r\n\r\n<h3>1. Cung cấp th&ocirc;ng tin nền</h3>\r\n\r\n<p>Khi kh&aacute;ch h&agrave;ng mua sắm trực tuyến, bạn cần tạo ra trải nghiệm tương đồng như khi họ mua sắm tại cửa h&agrave;ng. Thay v&igrave; chỉ đơn giản giới thiệu một sản phẩm, dịch vụ hiện c&oacute;, h&atilde;y cung cấp th&ecirc;m c&aacute;c th&ocirc;ng tin tham khảo được c&aacute; nh&acirc;n h&oacute;a theo trải nghiệm của kh&aacute;ch h&agrave;ng đang mua sắm.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/14838OnlineShopping_1520235951.jpg\" /></p>\r\n\r\n<p>&ldquo;Khi ra quyết định mua h&agrave;ng, con người thường th&iacute;ch c&oacute; th&ecirc;m nhiều th&ocirc;ng tin tham khảo. Họ muốn biết người kh&aacute;c đang chọn mua những mặt h&agrave;ng g&igrave;, v&agrave; họ sẽ c&oacute; xu hướng lựa chọn tương tự như vậy&rdquo;, Clemens n&oacute;i.</p>\r\n\r\n<p>V&igrave; vậy, h&atilde;y sắp xếp c&aacute;c sản phẩm của bạn theo gi&aacute; cả v&agrave; mức độ li&ecirc;n quan, hoặc dựa tr&ecirc;n lịch sử mua sắm của kh&aacute;ch h&agrave;ng đang truy cập. H&atilde;y cho kh&aacute;ch h&agrave;ng biết đ&acirc;u l&agrave; những sản phẩm đang được ưa chuộng để họ c&oacute; thể tự tin lựa chọn.</p>\r\n\r\n<h3>2. Sử dụng lựa chọn mặc định</h3>\r\n\r\n<p>Hiện nay, nhiều c&ocirc;ng ty đ&atilde; bắt đầu &aacute;p dụng thủ thuật tự động đ&aacute;nh dấu lựa chọn v&agrave;o những th&ocirc;ng tin bổ sung trong qu&aacute; tr&igrave;nh kh&aacute;ch h&agrave;ng thanh to&aacute;n. V&iacute; dụ như hệ thống sẽ tự chọn t&iacute;nh năng &ldquo;Giao h&agrave;ng nhanh&rdquo; hoặc &ldquo;Đăng k&yacute; nhận th&ocirc;ng tin từ c&ocirc;ng ty&rdquo; cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&ldquo;Khi một lựa chọn được tự động đ&aacute;nh dấu trước, kh&aacute;ch h&agrave;ng sẽ c&oacute; xu hướng dễ chấp nhận lựa chọn n&agrave;y hơn&rdquo;, Clemens chia sẻ với tờ Business News Daily, &ldquo;Điều n&agrave;y sẽ gi&uacute;p c&ocirc;ng ty c&oacute; th&ecirc;m được doanh thu lẫn lượng người đăng k&yacute; nhận th&ocirc;ng tin qua email&rdquo;.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, Clemens cũng lưu &yacute; bạn cần c&acirc;n nhắc thủ thuật n&agrave;y dựa tr&ecirc;n thực tế kh&aacute;ch h&agrave;ng của bạn. Nếu bạn để hệ thống tự chọn những sản phẩm c&oacute; t&iacute;nh ph&iacute;, kh&aacute;ch h&agrave;ng sẽ để &yacute; v&agrave; c&oacute; thể giảm sự tin tưởng đối với c&ocirc;ng ty của bạn.</p>\r\n\r\n<h3>3. Gợi &yacute; th&ecirc;m c&aacute;c sản phẩm, dịch vụ kh&aacute;c sau khi kh&aacute;ch h&agrave;ng thanh to&aacute;n xong</h3>\r\n\r\n<p>Khi một kh&aacute;ch h&agrave;ng đang tiến h&agrave;nh thanh to&aacute;n, họ sẽ thoải m&aacute;i hơn với &yacute; định mua th&ecirc;m sản phẩm kh&aacute;c, so với l&uacute;c đang lướt xem c&aacute;c sản phẩm tr&ecirc;n website. H&atilde;y nắm lấy cơ hội n&agrave;y để đưa ra những gợi &yacute; về c&aacute;c sản phẩm c&oacute; li&ecirc;n quan, hoặc c&aacute;c chương tr&igrave;nh khuyến m&atilde;i hiện c&oacute;. V&igrave; dụ, nếu họ vừa mua một chiếc quần jean, v&agrave; bạn đang c&oacute; khuyến m&atilde;i giảm gi&aacute; 50% với loại quần jean kh&aacute;c, h&atilde;y hiện pop-up th&ocirc;ng b&aacute;o đến kh&aacute;ch h&agrave;ng về khuyến m&atilde;i n&agrave;y trước khi họ ho&agrave;n tất thanh to&aacute;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.brandsvietnam.com/upload/forum2/2018/03/14838OnlineShopping_1520236076.jpg\" /></p>\r\n\r\n<p>&ldquo;Một khi kh&aacute;ch h&agrave;ng đ&atilde; quyết định mua h&agrave;ng, họ sẽ c&oacute; xu hướng cởi mở trong việc mua th&ecirc;m một sản phẩm nho nhỏ kh&aacute;c. V&igrave; vậy, bạn c&oacute; thể sử dụng yếu tố t&acirc;m l&yacute; n&agrave;y để đưa ra những gợi &yacute; về c&aacute;c sản phẩm phụ c&oacute; li&ecirc;n quan đến sản phẩm kh&aacute;ch h&agrave;ng vừa đặt mua trong thư cảm ơn sau đ&oacute;&rdquo;, Clemens chia sẻ.</p>\r\n\r\n<h3>4. Dẫn dắt kh&aacute;ch h&agrave;ng bằng t&acirc;m l&yacute; đ&aacute;m đ&ocirc;ng</h3>\r\n\r\n<p>Nếu c&aacute;c kh&aacute;ch h&agrave;ng của bạn nh&igrave;n thấy nhiều người đang c&ugrave;ng mua một sản phẩm đặc biệt n&agrave;o đ&oacute;, họ sẽ c&oacute; xu hướng c&ugrave;ng đặt mua sản phẩm đ&oacute;. Đ&acirc;y l&agrave; xu hướng bị đ&aacute;m đ&ocirc;ng dẫn dắt trong t&acirc;m l&yacute;, theo Clemens.</p>\r\n\r\n<p>Cụ thể, Clemens cho biết, website b&aacute;n h&agrave;ng thời trang Aeire đ&atilde; sử dụng chiến dịch #AerieREAL để truyền đi th&ocirc;ng điệp động vi&ecirc;n phụ nữ ở mọi v&oacute;c d&aacute;ng cảm thấy thoải m&aacute;i với ngoại h&igrave;nh của m&igrave;nh. Chiến dịch n&agrave;y đ&atilde; gi&uacute;p Aeire kh&ocirc;ng chỉ tăng lợi nhuận m&agrave; c&ograve;n tạo dựng được thương hiệu nơi kh&aacute;ch h&agrave;ng sau đ&oacute;.</p>\r\n\r\n<p>&ldquo;T&acirc;m l&yacute; bầy đ&agrave;n l&agrave; một trong những bản chất t&acirc;m l&yacute; của con người. V&igrave; vậy, ch&uacute;ng ta c&oacute; xu hướng đi theo đ&aacute;m đ&ocirc;ng, hoặc bị đ&aacute;m đ&ocirc;ng chi phối. Nếu ch&uacute;ng ta nh&igrave;n thấy số đ&ocirc;ng đang l&agrave;m một h&agrave;nh vi nhất định, ch&uacute;ng ta sẽ c&oacute; xu hướng muốn c&ugrave;ng tham gia v&agrave;o hoạt động đ&oacute;&rdquo;, Clemens chia sẻ.</p>\r\n\r\n<p>Nguồn: Brandsvietnam</p>', 1, 3663, '2018-04-19 02:38:54', '2018-09-01 02:27:23'),
(3, 'Mất an toàn thông tin: thiệt hại 12.300 tỷ đồng', 'mat-an-toan-thong-tin-thiet-hai-12300-ty-dong', 'hs_2018-06-05_1528172075.jpeg', '<p>Tuần qua, Trung t&acirc;m Ứng cứu khẩn cấp m&aacute;y t&iacute;nh Việt Nam (VNCERT) đ&atilde; ph&aacute;t lệnh cảnh b&aacute;o đến người d&ugrave;ng sau khi h&agrave;ng trăm ng&agrave;n password v&agrave; email đu&ocirc;i gov.vn bị lộ mật khẩu, đe dọa th&ocirc;ng tin của c&aacute;c cơ quan Ch&iacute;nh phủ c&oacute; thể bị lọt ra ngo&agrave;i.</p>\r\n\r\n<p>Một cơ sở dữ liệu dark web lớn nhất từ trước đến nay (41GB) được ph&aacute;t hiện trong Diễn đ&agrave;n Underground chứa gần 1,4 tỷ password dạng clear text, c&aacute;c hacker đ&atilde; tạo ta một dữ liệu đồ sộ về mật khẩu, email đăng nhập, đặc biệt những mật khẩu kh&ocirc;ng được m&atilde; h&oacute;a với hơn 80% được tổng hợp từ c&aacute;c vụ r&ograve; rỉ dữ liệu trước đ&oacute;.</p>\r\n\r\n<p>Đặc biệt nguy hiểm l&agrave; xu hướng người d&ugrave;ng đặt password theo sắp xếp alphabet hoặc d&ugrave;ng chung password cho nhiều dịch vụ trở th&agrave;nh miếng mồi cho c&aacute;c vụ tấn c&ocirc;ng.</p>\r\n\r\n<p>&Yacute; thức tu&acirc;n thủ c&aacute;c ch&iacute;nh s&aacute;ch bảo mật trong người d&ugrave;ng c&ocirc;ng sở tại Việt Nam c&ograve;n yếu, khiến việc dữ liệu dễ bị r&ograve; rỉ cao. C&aacute;c chuy&ecirc;n gia khuyến nghị người d&ugrave;ng thay đổi password c&aacute;c email c&ocirc;ng việc, t&agrave;i khoản ng&acirc;n h&agrave;ng theo x&aacute;c thực 2 bước, đặc biệt kh&ocirc;ng sử dụng email đơn vị đăng k&yacute; t&agrave;i khoản tr&ecirc;n mạng x&atilde; hội, dịch vụ trực tuyến.</p>\r\n\r\n<p><strong>M&atilde; độc đ&agrave;o tiền ảo sẽ ho&agrave;nh h&agrave;nh</strong></p>\r\n\r\n<p>Theo thống k&ecirc; từ hệ thống gi&aacute;m s&aacute;t của Bkav, kể từ khi m&atilde; độc đ&agrave;o tiền ảo b&ugrave;ng ph&aacute;t qua Facebook Messenger s&aacute;ng 19.12.2017, đến nay hơn 41.000 m&aacute;y t&iacute;nh tại Việt Nam bị nhiễm. Chuy&ecirc;n gia Bkav cảnh b&aacute;o, c&aacute;c hacker c&oacute; thể lập tr&igrave;nh để sinh tự động c&aacute;c biến thể mới với tần suất khoảng 10 ph&uacute;t/lần nhằm qua mặt c&aacute;c phần mềm an ninh.</p>\r\n\r\n<p>C&aacute;c biến thể m&atilde; độc đ&agrave;o tiền ảo c&ograve;n được c&agrave;i sẵn chức năng lấy cắp mật khẩu Facebook, chiếm quyền điều khiển m&aacute;y t&iacute;nh v&agrave; lợi dụng m&aacute;y nạn nh&acirc;n để đ&agrave;o tiền ảo. Dự b&aacute;o thời gian tới h&igrave;nh thức đ&agrave;o tiền ảo bằng c&aacute;ch ph&aacute;t t&aacute;n virus sẽ tiếp tục b&ugrave;ng nổ qua Facebook, email, c&aacute; lỗ hổng hệ điều h&agrave;nh hay USB&hellip; C&aacute;c chuy&ecirc;n gia khuyến nghị cần cập nhật c&aacute;c phần mềm chống m&atilde; độc, virus để ph&aacute;t hiện v&agrave; ngăn chặn, loại bỏ m&atilde; độc, đổi mật khẩu Facebook.</p>\r\n\r\n<p><strong>Cẩn trọng với m&atilde; độc v&agrave; tin tức giả mạo</strong></p>\r\n\r\n<p>Theo &ocirc;ng Ng&ocirc; Tuấn Anh, Ph&oacute; chủ tịch phụ tr&aacute;ch An ninh mạng Bkav, xu hướng 2018 sẽ tiếp tục b&ugrave;ng nổ c&aacute;c cuộc tấn c&ocirc;ng ph&aacute;t t&aacute;n m&atilde; độc nhằm thu lợi bất ch&iacute;nh như m&atilde; độc m&atilde; h&oacute;a tống tiền ransomware, m&atilde; độc đ&agrave;o tiền ảo&hellip; B&ecirc;n cạnh việc tạo ra mạng lưới botnet đ&agrave;o tiền ảo, hacker cũng nhắm tấn c&ocirc;ng trực tiếp v&agrave;o c&aacute;c s&agrave;n giao dịch tiền điện tử. Hiện nhiều nơi kh&ocirc;ng c&oacute; sự đảm bảo của ch&iacute;nh phủ n&ecirc;n nếu xảy ra tấn c&ocirc;ng, người d&ugrave;ng sẽ chịu mọi rủi ro.</p>\r\n\r\n<p>Mặt kh&aacute;c l&agrave; nạn b&ugrave;ng nổ tin tức giả mạo v&agrave; c&aacute;c h&agrave;nh vi lừa đảo tận dụng Facebook, Google, Twitter&hellip; Hiện 40% người d&ugrave;ng trở th&agrave;nh nạn nh&acirc;n hằng ng&agrave;y của c&aacute;c dạng tin tức giả mạo.</p>\r\n\r\n<p>Việc tấn c&ocirc;ng v&agrave;o thiết bị IoT sẽ c&oacute; xu hướng c&agrave;i đặt phần mềm gi&aacute;n điệp, thực hiện tấn c&ocirc;ng c&oacute; chủ đ&iacute;ch APT mang m&agrave;u sắc ch&iacute;nh trị. &ldquo;Cần x&acirc;y dựng khả năng đề kh&aacute;ng trước c&aacute;c th&ocirc;ng tin giả mạo, bằng c&aacute;ch biết đặt ra nghi vấn, chủ động kiểm chứng nguồn để trở th&agrave;nh người d&ugrave;ng mạng x&atilde; hội th&ocirc;ng th&aacute;i&rdquo;, &ocirc;ng Ng&ocirc; Tuấn Anh khuyến c&aacute;o.</p>', 1, 1073, '2018-04-19 02:40:21', '2018-09-05 01:47:39'),
(4, 'Đừng nghĩ phải có ý tưởng ‘điên rồ’ mới khởi nghiệp được', 'dung-nghi-phai-co-y-tuong-dien-ro-moi-khoi-nghiep-duoc', 'hs_2018-06-05_1528172065.jpeg', '<p>B&agrave;i học r&uacute;t ra kh&ocirc;ng phải để khoe ai gi&agrave;u, m&agrave; vấn đề l&agrave; kh&ocirc;ng phải c&ocirc;ng ty th&agrave;nh c&ocirc;ng n&agrave;o cũng bắt đầu bằng một &yacute; tưởng ngh&igrave;n tỷ. Kh&ocirc;ng phải c&aacute;c nh&agrave; đầu tư n&oacute;i kh&ocirc;ng nghĩa l&agrave; việc đ&oacute; kh&ocirc;ng đ&aacute;ng l&agrave;m. Kh&ocirc;ng phải chỉ l&ecirc;n truyền h&igrave;nh, đi thi Shark Tank, gọi vốn v&agrave;i tỷ th&igrave; mới l&agrave; khởi nghiệp đ&uacute;ng &ldquo;chuẩn&rdquo;. Mở một c&ocirc;ng ty kiếm được hai mươi triệu mỗi th&aacute;ng cũng đ&aacute;ng gi&aacute; từng đồng như việc b&igrave;nh định sao Hỏa của đại gia Elon Musk. Bắt đầu nhỏ v&agrave; cho những tham vọng của bạn kh&ocirc;ng gian v&agrave; thời gian để lớn dần.</p>', 1, 1236, '2018-04-19 02:41:03', '2018-09-01 02:27:18'),
(5, '6 yếu tố giúp bạn thu hút khách hàng cho quán Cà phê', '6-yeu-to-giup-ban-thu-hut-khach-hang-cho-quan-ca-phe', 'hs_2018-06-05_1528172057.jpeg', '<p>Bạn c&oacute; nhiều lựa chọn để định vị qu&aacute;n c&agrave; ph&ecirc; của m&igrave;nh, v&iacute; dụ qu&aacute;n c&agrave; ph&ecirc; với m&oacute;n chủ đạo l&agrave; c&agrave; ph&ecirc; trứng, hay qu&aacute;n c&agrave; ph&ecirc; chỉ b&aacute;n 100% hạt c&agrave; ph&ecirc; Arabica thượng hạng, hoặc qu&aacute;n C&agrave; ph&ecirc; Vợt, hay qu&aacute;n #CoffeeBike với m&oacute;n chủ đạo l&agrave; Espresso Sữa đ&aacute; với hạt Robusta chất lượng cao kết hợp c&ugrave;ng m&aacute;y chiết xuất nhập khẩu từ &Yacute;. Ngo&agrave;i định vị bằng thức uống C&agrave; ph&ecirc;, bạn cũng thể định vị m&igrave;nh bằng kh&ocirc;ng gian, hoặc 1 thức uống đặc biệt n&agrave;o đ&oacute; tạo sự ghi nhớ cho kh&aacute;ch h&agrave;ng. Nếu định vị của bạn chung chung, hoặc kh&ocirc;ng t&igrave;m được định vị bạn h&atilde;y b&igrave;nh tĩnh trước việc mở qu&aacute;n hoặc ph&aacute;t triển m&ocirc; h&igrave;nh kinh doanh c&agrave; ph&ecirc; của bạn</p>', 1, 3271, '2018-04-19 02:58:51', '2018-09-05 01:41:13'),
(6, 'Top những xu hướng sáng tạo của năm 2018', 'top-nhung-xu-huong-sang-tao-cua-nam-2018', 'hs_2018-06-05_1528172021.png', '<p>Ta sắp c&oacute; những kiểu s&aacute;ng tạo n&agrave;o trong năm 2018 ? Ch&uacute;ng ta đ&atilde; nh&igrave;n thấy những xu hướng thiết kế logo v&agrave; typography c&oacute; thể trở n&ecirc;n thịnh h&agrave;nh trong 12 th&aacute;ng tới, nhưng Shutterstock&nbsp;đang nh&igrave;n xa hơn nữa với Bản b&aacute;o c&aacute;o Xu hướng S&aacute;ng Tạo 2018.</p>', 1, 3269, '2018-04-19 02:59:48', '2018-07-14 12:45:29'),
(10, 'NỀN GIÁO DỤC 4.0 CƠ HỘI VÀ THÁCH THỨC', 'nen-giao-duc-40-co-hoi-va-thach-thuc', 'hs_2018-06-06_1528252248.jpeg', '<p>Cuộc c&aacute;ch mạng c&ocirc;ng nghiệp 4.0 đang l&agrave;m thay đổi s&acirc;u sắc qu&aacute; tr&igrave;nh ph&aacute;t triển của nhiều quốc gia tr&ecirc;n thế giới. Đặc biệt nền gi&aacute;o dục l&agrave; một lĩnh vực kh&aacute; nhạy cảm, chịu sự t&aacute;c động tất yếu từ những chuyển động x&atilde; hội, chắc chắn sẽ bị ảnh hưởng mạnh mẽ bởi sức lan tỏa của l&agrave;n s&oacute;ng c&ocirc;ng nghiệp 4.0</p>\r\n\r\n<p>Nền c&ocirc;ng nghiệp 4.0 &nbsp;ph&aacute;t triển ng&agrave;y một nhanh ch&oacute;ng v&agrave; nền để đi kịp l&agrave;n s&oacute;ng c&ocirc;ng nghiệp &nbsp;4.0 th&igrave; nền gi&aacute;o dục phải c&oacute; những những chuyển biến r&otilde; rệt , lượng th&ocirc;ng tin t&igrave;m kiếm trong lĩnh vực gi&aacute;o dục ng&agrave;y c&agrave;ng nhiều v&agrave; kh&ocirc;ng phải th&ocirc;ng tin n&agrave;o cũng được xem l&agrave; đ&uacute;ng v&agrave; phải chắt lọc n&oacute; một c&aacute;ch r&otilde; r&agrave;ng .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>M&ocirc; h&igrave;nh gi&aacute;o dục 4.0 được hiểu như thế n&agrave;o ? </strong></p>\r\n\r\n<p>Gi&aacute;o dục 4.0 l&agrave; một m&ocirc; h&igrave;nh gi&aacute;o dục th&ocirc;ng minh, li&ecirc;n kết chủ yếu giữa c&aacute;c yếu tố nh&agrave; trường - nh&agrave; quản l&yacute; - nh&agrave; doanh nghiệp, tạo điều kiện cho việc đổi mới, s&aacute;ng tạo v&agrave; năng suất lao động trong x&atilde; hội tri thức.</p>\r\n\r\n<p>M&ocirc; h&igrave;nh n&agrave;y cũng th&uacute;c đẩy tinh thần khởi nghiệp của giảng vi&ecirc;n, sinh vi&ecirc;n; tạo điều kiện cho hợp t&aacute;c giữa gi&aacute;o dục đại học v&agrave; sản xuất c&ocirc;ng nghiệp; gắn kết c&ugrave;ng c&aacute;c nỗ lực ph&aacute;t triển kinh tế khu vực v&agrave; địa phương&hellip; Gi&aacute;o dục 4.0 gi&uacute;p hoạt động dạy v&agrave; học diễn ra mọi l&uacute;c v&agrave; mọi nơi, gi&uacute;p người học c&oacute; thể c&aacute; nh&acirc;n h&oacute;a, ho&agrave;n to&agrave;n quyết định việc học tập theo nhu cầu của bản th&acirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/c_edu/public/upload/files/1.jpg\" /></p>\r\n\r\n<p>Nền gi&aacute;o dục 4.0 muốn hướng đến t&iacute;nh s&aacute;ng tạo v&agrave; tự chủ của người học , ch&iacute;nh hiểu được điều đấy CEDU đ&atilde; v&agrave; đang muốn hướng đến cho người học thời gian học linh hoạt v&agrave; gắn kết c&aacute;c kiến thức lại với nhau qua mạng internet c&ugrave;ng với c&aacute;c chuy&ecirc;n gia.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, Gi&aacute;o dục 4.0 sẽ gi&uacute;p thay đổi tư duy v&agrave; c&aacute;ch tiếp cận về m&ocirc; h&igrave;nh đại học. Trường đại học kh&ocirc;ng chỉ l&agrave; nơi đ&agrave;o tạo, nghi&ecirc;n cứu m&agrave; c&ograve;n l&agrave; trung t&acirc;m đổi mới s&aacute;ng tạo, giải quyết c&aacute;c vấn đề thực tiễn, mang gi&aacute; trị cho x&atilde; hội. Trường kh&ocirc;ng chỉ đ&oacute;ng khung trong c&aacute;c bức tường của giảng đường, lớp học hay ph&ograve;ng th&iacute; nghiệm, m&agrave; phải mở rộng kết hợp với c&aacute;c doanh nghiệp, với thị trường lao động để trở th&agrave;nh một hệ sinh th&aacute;i gi&aacute;o dục.</p>\r\n\r\n<p><strong>Gi&aacute;o dục Việt Nam trước m&ocirc; h&igrave;nh gi&aacute;o dục 4.0</strong></p>\r\n\r\n<p>Hiện nay, muốn h&ograve;a nhập v&agrave;o cuộc c&aacute;ch mạng c&ocirc;ng nghiệp 4.0, v&agrave;o nền kinh tế số, yếu tố then chốt l&agrave; nguồn nh&acirc;n lực. Việt Nam cần cải c&aacute;ch hệ thống gi&aacute;o dục, đ&agrave;o tạo.</p>\r\n\r\n<p>Nền gi&aacute;o dục Việt Nam n&oacute;i chung v&agrave; c&aacute;c trường đại học, nơi cung cấp cho x&atilde; hội nguồn nh&acirc;n lực, lao động sẽ phải nghi&ecirc;n cứu, điều chỉnh đ&agrave;o tạo theo chuẩn gi&aacute;o dục 4.0 theo hướng bảo đảm khối kiến thức nền tảng vững chắc cho học sinh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/c_edu/public/upload/files/2.jpg\" /></p>\r\n\r\n<p>Cụ thể l&agrave; &aacute;p dụng c&aacute;c thiết bị hiện đại v&agrave;o giảng dạy v&agrave; đ&agrave;o tạo , đưa c&aacute;c h&igrave;nh thức đ&agrave;o tạo trức tuyến v&agrave;o giảng dạy gi&uacute;p người học tự chủ thời gian học tập , đặc biệt hiện nay c&aacute;c trường đại học đang &aacute;p dụng m&ocirc; h&igrave;nh đ&agrave;o tạo từ xa , c&aacute;c h&igrave;nh thức đ&agrave;o tạo kĩ năng trực tuyến nổi bật như : Ceduvn.com, edumall.vn , unica.vn ,&hellip;..</p>\r\n\r\n<p>Về mặt quản l&yacute;, c&aacute;c cơ sở gi&aacute;o dục từ tuyến cơ sở trở đi cần chuyển hướng dần sang tự chủ trong tổ chức v&agrave; hoạt động, chủ động t&igrave;m kiếm c&aacute;c nguồn lực đầu tư b&ecirc;n ngo&agrave;i, mở rộng c&aacute;c hoạt động đầu tư li&ecirc;n danh, li&ecirc;n kết trong v&agrave; ngo&agrave;i nước về đ&agrave;o tạo, nghi&ecirc;n cứu khoa học. Gỡ bỏ c&aacute;c r&agrave;o cản để hướng sự đầu tư của c&aacute;c th&agrave;nh phần kinh tế v&agrave;o gi&aacute;o dục đ&aacute;p ứng y&ecirc;u cầu về nguồn nh&acirc;n lực phục vụ sự ph&aacute;t triển đất nước.</p>\r\n\r\n<p>Đối với việc học, cần chuyển từ học thuộc, nhớ nhiều sang h&igrave;nh th&agrave;nh năng lực vận dụng, th&iacute;ch nghi, giải quyết vấn đề, tư duy độc lập. Kh&ocirc;ng chỉ học chỉ trong s&aacute;ch vở, qua t&agrave;i liệu m&agrave; phải học qua nhiều h&igrave;nh thức kh&aacute;c như qua tr&ograve; chơi, li&ecirc;n hệ tương t&aacute;c, &hellip;.</p>\r\n\r\n<p>Đặc biệt, với học sinh, sinh vi&ecirc;n l&agrave; người lao động trong tương lai cần thay đổi suy nghĩ học một lần cho cả đời bằng việc học cả đời để l&agrave;m việc cả đời.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theo V&otilde; Ho&agrave;ng &ndash; Bi&ecirc;n tập vi&ecirc;n CEDU</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', 1, 2659, '2018-06-06 02:30:48', '2018-09-05 01:45:15'),
(11, 'NHỮNG SAI LẦM TRONG VIỆC QUẢN LÝ CONTENT MARKETING CỦA CÁC DOANH NGHIỆP', 'nhung-sai-lam-trong-viec-quan-ly-content-marketing-cua-cac-doanh-nghiep', 'hs_2018-06-12_1528768608.png', '<p><strong>Đầu tư v&agrave;o content marketing theo xu hướng, thế nhưng một số doanh nghiệp Việt lại tự l&agrave;m kh&oacute; m&igrave;nh khi kh&ocirc;ng x&aacute;c định được mục ti&ecirc;u cốt l&otilde;i của mỗi chiến dịch, để cuối c&ugrave;ng kh&ocirc;ng đạt đến th&agrave;nh c&ocirc;ng thực sự ở bất cứ phương diện g&igrave;.</strong></p>\r\n\r\n<p><strong>Trong giai đoạn marketing đang b&ugrave;ng nổ th&igrave; doanh nghiệp đang c&oacute; hướng tiếp cận kh&aacute;ch h&agrave;ng bằng content marketing hiệu quả n&oacute; mang lại doanh nghiệp rất lớn. </strong></p>\r\n\r\n<p>B&ecirc;n cạnh việc d&aacute;m mạo hiểm, kh&ocirc;ng ngần ngại thay đổi chiến thuật thường xuy&ecirc;n, doanh nghiệp cũng lu&ocirc;n cần b&aacute;m s&aacute;t c&aacute;c số liệu đo lường hiệu quả thực tế, tr&aacute;nh n&eacute;m tiền qua cửa sổ. Thế mạnh của mỗi doanh nghiệp ch&iacute;nh l&agrave; cơ sở đầu ti&ecirc;n để x&acirc;y dựng một chiến lược content marketing c&oacute; gi&aacute; trị.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/c_edu/public/upload/files/2(1).jpg\" /></p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một số sai lầm m&agrave; c&aacute;c doanh nghiệp Việt thường gặp phải :</p>\r\n\r\n<p><strong>1. C&oacute;p nhặt th&ocirc;ng tin tr&ecirc;n mạng </strong></p>\r\n\r\n<p>Tr&ecirc;n 90% doanh nghiệp hiện nay đang c&oacute;p nhặt th&ocirc;ng tin website bằng c&aacute;ch c&oacute;p nhặt th&ocirc;ng tin li&ecirc;n quan , đến lĩnh vực ng&agrave;nh nghề của họ, từ c&aacute;c tờ b&aacute;o v&agrave; tin tức kh&aacute;c .</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng tin được c&aacute;c doanh nghiệp c&oacute;p nhặt v&agrave; bi&ecirc;n tập lại để truyền tải th&ocirc;ng tin c&aacute;ch chuy&ecirc;n s&acirc;u hơn , n&oacute; sẽ đem lại mức chi ph&iacute; thấp nhưng g&acirc;y ra vi phạm bản quyền. Tuy nhi&ecirc;n, uy t&iacute;n thấp, thứ hạng website tr&ecirc;n c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm thấp, lượng truy cập thực tế &iacute;t ỏi v&agrave; khả năng quy ra ra gi&aacute; trị kinh tế thấp l&agrave; c&aacute;i gi&aacute; phải trả cho c&aacute;ch l&agrave;m &quot;tiết kiệm&quot; n&agrave;y.</p>\r\n\r\n<p>Giải ph&aacute;p : Để l&agrave;m content marketing tr&ecirc;n website , x&aacute;c định gi&aacute; trị về th&ocirc;ng tin cho kh&aacute;ch h&agrave;ng s&acirc;u nhất v&agrave; hữu &iacute;ch nhất, bạn c&oacute; thể mang lại cho kh&aacute;ch h&agrave;ng . T&iacute;ch cực chia sẻ c&aacute;c th&ocirc;ng tin l&ecirc;n c&aacute;c hội nh&oacute;m để tăng lượng kh&aacute;ch h&agrave;ng tiếp cận th&ocirc;ng tin .&nbsp;</p>\r\n\r\n<p><strong>2. Lạm dụng chuy&ecirc;n gia </strong></p>\r\n\r\n<p>Với những thế mạnh về kinh nghiệm, uy t&iacute;n, chỉ phải trả tiền khi h&agrave;i l&ograve;ng với chất lượng sản phẩm, ng&agrave;y c&agrave;ng nhiều doanh nghiệp kh&ocirc;ng ngần ngại bỏ tiền thu&ecirc; c&aacute;c chuy&ecirc;n gia, c&aacute;c c&ocirc;ng ty tư vấn x&acirc;y dựng v&agrave; vận h&agrave;nh c&aacute;c chiến dịch content marketing cho m&igrave;nh.</p>\r\n\r\n<p>Thường c&aacute;c doanh nghiệp , sẽ giao ph&oacute; 100% chiến lược nội dung của m&igrave;nh gửi cho c&aacute;c chuy&ecirc;n gia , đ&oacute; kh&ocirc;ng phải l&agrave; giải ph&aacute;p tốt cho doanh nghiệp .</p>\r\n\r\n<p>Thứ nhất: Chuy&ecirc;n gia c&oacute; thể chuy&ecirc;n s&acirc;u mảng n&agrave;y nhưng họ kh&ocirc;ng hiểu được sản phẩm b&ecirc;n m&igrave;nh b&aacute;n v&agrave; đ&ocirc;i khi kh&ocirc;ng hiểu được tầm nh&igrave;n chiến lược m&igrave;nh đang l&agrave;m.</p>\r\n\r\n<p>Thứ hai : Nếu doanh nghiệp bạn nhờ họ l&agrave;m th&igrave; tức l&agrave; c&aacute;c doanh nghiệp kh&aacute;c họ cũng sẽ nhờ họ l&agrave;m , đ&ocirc;i khi c&oacute; thể l&agrave; đối thủ của bạn , doanh nghiệp của bạn chắc sẽ c&oacute; thể bị r&ograve; rỉ th&ocirc;ng tin</p>\r\n\r\n<p>Giải ph&aacute;p: Thay v&igrave; bạn thu&ecirc; c&aacute;c chuy&ecirc;n gia với chi ph&iacute; cao th&igrave; bạn h&atilde;y x&acirc;y dựng một đội ngũ content marketing ri&ecirc;ng cho doanh nghiệp bạn. Sẽ tiết kiệm chi ph&iacute; v&agrave; bảo mật th&ocirc;ng tin tốt hơn.</p>\r\n\r\n<p><strong>3. N&ocirc;i dung hay nhưng sai đối tượng: </strong></p>\r\n\r\n<p>Hiện nay, c&aacute;c content marketing thường rất &iacute;t sử dụng c&aacute;c số liệu đo lường thực tế, dẫn đến &aacute;p đặt tư duy chủ quan của m&igrave;nh cho người d&ugrave;ng.</p>\r\n\r\n<p>Điều n&agrave;y đặc biệt nguy hiểm trong content marketing, nơi c&aacute;c chiến lược kh&ocirc;ng theo dạng &quot;đ&aacute;nh nhanh thắng nhanh&quot;, m&agrave; cần c&oacute; thời gian để thẩm thấu v&agrave; ph&aacute;t huy t&aacute;c dụng.</p>\r\n\r\n<p>Nội dung tốt vẫn ho&agrave;n to&agrave;n c&oacute; thể thất bại nếu truyền tải thiếu hiệu quả, sai đối tượng mục ti&ecirc;u, v&agrave;o thời điểm kh&ocirc;ng ph&ugrave; hợp, th&ocirc;ng qua c&aacute;c k&ecirc;nh ph&acirc;n phối kh&ocirc;ng ph&ugrave; hợp v&agrave; chưa đủ lượng thời gian cần thiết.</p>\r\n\r\n<p>Giải ph&aacute;p : Nghi&ecirc;n cứu kĩ đối tượng v&agrave; mục ti&ecirc;u sản phẩm trước khi l&ecirc;n một chiến lược Content marketing , d&ugrave;ng hết mọi nguồn lực để truyền b&aacute; sản phẩm để đạt kết quả cao nhất .</p>\r\n\r\n<p>DƯỚI Đ&Acirc;Y L&Agrave; MỘT SỐ ĐIỂM LƯU &Yacute; TRONG CONTENT MARKETING CHO DOANH NGHIỆP VIỆT</p>\r\n\r\n<p>&nbsp;</p>', 1, 2829, '2018-06-12 01:56:49', '2018-07-13 01:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(10) UNSIGNED NOT NULL,
  `noti_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `noti_link`, `noti_img`, `noti_name`, `noti_content`, `noti_status`, `created_at`, `updated_at`) VALUES
(1, 'http://demo2-cgroup.com/courses/detail/chung-khoan-cho-nguoi-moi-bat-dau.html', 'hs_2018-07-04_1530693220.jpeg', 'Cedu', 'Thông báo mang tính chất thử nghiệm', 1, '2018-07-04 08:33:40', '2018-07-09 03:24:32'),
(2, 'http://demo2-cgroup.com/doitacgiaovien', 'hs_2018-07-04_1530694537.png', 'Cedu', 'Trở thành giảng viên nổi tiếng cùng Cedu', 1, '2018-07-04 08:55:37', '2018-07-09 03:24:47'),
(3, 'http://demo2-cgroup.com/affiliate', 'hs_2018-07-04_1530695907.jpeg', 'Cedu', 'Cùng nhau cộng tác tạo nên lợi nhuận', 1, '2018-07-04 09:18:27', '2018-07-09 03:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` int(10) UNSIGNED NOT NULL,
  `ord_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ord_payment` tinyint(4) NOT NULL,
  `ord_total_price` int(11) NOT NULL,
  `ord_acc_id` int(10) UNSIGNED NOT NULL,
  `ord_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ord_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ord_note` text COLLATE utf8mb4_unicode_ci,
  `ord_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ord_id`, `ord_code`, `ord_payment`, `ord_total_price`, `ord_acc_id`, `ord_phone`, `ord_adress`, `ord_note`, `ord_status`, `created_at`, `updated_at`) VALUES
(8, NULL, 1, 699000, 3, '1688044009', 'Hà Nội | Tây hồ | 175 Xuân thủy | 175 Xuân thủy', 'Nhanh nhé', 2, '2018-05-17 02:03:45', '2018-05-17 02:06:20'),
(9, NULL, 1, 699000, 3, '1788033008', 'Hà Nội | OKe | hanoi | hanoi', 'Nhanh nhé', 0, '2018-05-18 05:58:51', '2018-05-18 06:01:15'),
(12, NULL, 1, 449000, 3, '1688044009', 'Hà Nội | OKe | 175 Xuân thủy | 175 Xuân thủy', 'Nhanh', 0, '2018-05-18 06:21:11', '2018-05-18 06:22:18'),
(13, NULL, 1, 699000, 26, '1788033008', 'Hà Nội | Tây hồ | số 3 Hai bà trưng | số 3 Hai bà trưng', 'Nhanh nhé', 0, '2018-05-29 18:22:01', '2018-05-30 20:08:45'),
(14, NULL, 1, 899000, 3, '1788033008', 'Hà Nội | Tây hồ | số 3 Hai bà trưng | số 3 Hai bà trưng', 'Nhanh nhé', -1, '2018-05-30 05:38:20', '2018-06-04 18:47:17'),
(16, NULL, 1, 899000, 29, '1788033008', 'Hà Nội | OKe | hanoi | hanoi', 'Nhanh nhé', 0, '2018-05-30 05:39:37', '2018-05-30 20:09:03'),
(17, NULL, 1, 699000, 30, '0233222332', 'Bình Định | Không biết | Chưa có | Đang đợi', 'Hello baby', 0, '2018-06-04 03:36:29', '2018-06-04 18:47:32'),
(18, NULL, 1, 699000, 30, '010010101010', 'Đồng Nai | Trên Sông | Trên Bè | Trên Giường', '500k', 0, '2018-06-04 03:37:49', '2018-06-04 04:18:24'),
(19, NULL, 1, 990000, 30, '01336644556', 'Hà Nội | Trên núi | Bên phải | Bên trái', 'Hello baby', 0, '2018-06-04 03:42:42', '2018-06-04 18:47:02'),
(20, NULL, 1, 449000, 30, '02313467923', 'Trà Vinh | 01 | 02 | 04', '05', -1, '2018-06-04 03:44:26', '2018-06-04 18:47:09'),
(21, NULL, 1, 99000, 31, '0336363636', 'Bà Rịa-Vũng Tàu | Trên Sông | trên ke | ....', '...', 0, '2018-06-04 03:53:52', '2018-06-04 04:18:44'),
(22, NULL, 1, 699000, 33, '040506070809', 'Hà Nội | 01 | 02 | 03', 'Hello baby', 0, '2018-06-04 18:43:36', '2018-06-04 18:46:35'),
(23, NULL, 1, 899000, 33, '0003413565', 'Cao Bằng | Trên núi | pasio | pánge', 'reitee', 0, '2018-06-04 18:44:54', '2018-06-04 18:46:45'),
(24, NULL, 1, 699000, 35, '0336363636', 'Bình Phước |  |  | 03', NULL, 0, '2018-06-04 19:03:43', '2018-06-06 02:02:22'),
(25, NULL, 1, 99000, 35, '020220202', 'Điện Biên |  | 1 | ', NULL, 0, '2018-06-04 19:04:47', '2018-06-05 03:24:38'),
(26, NULL, 1, 449000, 36, '...', 'Vĩnh Long | ... | ... | ..', NULL, 0, '2018-06-06 01:49:43', '2018-06-06 02:02:56'),
(27, NULL, 1, 349000, 36, 'xx', 'Điện Biên | xxxx | xx | xx', 'x', 0, '2018-06-06 01:50:42', '2018-06-06 01:59:59'),
(29, NULL, 1, 699000, 36, '22222222222', 'Điện Biên | 22222222 | 2222222 | 222222', '222222', 0, '2018-06-06 01:51:58', '2018-06-06 01:55:44'),
(31, NULL, 1, 699000, 36, '22222', 'Bình Thuận | 2222 | 2222 | 2222222', NULL, -1, '2018-06-06 01:54:17', '2018-06-06 02:02:28'),
(32, NULL, 1, 699000, 3, '1788033008', 'Hà Nội | Tây hồ | hanoi | hanoi', 'Nhanh', 0, '2018-06-06 11:08:44', '2018-06-06 11:18:49'),
(33, NULL, 1, 349000, 3, '1688044009', 'Hà Nội | Tây hồ | 175 Xuân thủy | 175 Xuân thủy', 'Nhanh', 0, '2018-06-06 11:09:41', '2018-06-06 11:19:13'),
(34, NULL, 1, 699000, 3, '1788033008', 'Hà Nội | OKe | 175 Xuân thủy | 175 Xuân thủy', 'Nhanh', 0, '2018-06-08 01:15:53', '2018-06-08 01:16:36'),
(35, NULL, 1, 699000, 34, '1688044009', 'Hà Nội | OKe | 175 Xuân thủy | 175 Xuân thủy', 'Nhanh nhé', 0, '2018-06-08 06:59:03', '2018-06-08 07:11:14'),
(38, NULL, 1, 99000, 1, NULL, NULL, NULL, 0, '2018-06-12 01:44:19', '2018-06-12 01:44:19'),
(41, NULL, 1, 449000, 3, NULL, NULL, NULL, 0, '2018-06-12 03:34:04', '2018-06-12 03:34:04'),
(42, NULL, 1, 990000, 3, NULL, NULL, NULL, 0, '2018-06-12 04:03:14', '2018-06-12 04:03:14'),
(44, NULL, 1, 449000, 3, NULL, NULL, NULL, 0, '2018-06-12 04:17:45', '2018-06-12 04:17:45'),
(45, NULL, 1, 699000, 3, NULL, NULL, NULL, 0, '2018-06-12 04:24:00', '2018-06-12 04:24:00'),
(47, NULL, 1, 549000, 3, NULL, NULL, NULL, 0, '2018-06-12 06:46:16', '2018-06-12 06:46:16'),
(48, NULL, 1, 549000, 1, NULL, NULL, NULL, 0, '2018-06-12 08:20:52', '2018-06-12 08:20:52'),
(52, NULL, 1, 699000, 43, '1788033008', 'Hà Nội | Tây hồ | 175 Xuân thủy | 175 Xuân thủy', NULL, 0, '2018-06-14 08:20:46', '2018-06-19 06:25:19'),
(54, NULL, 1, 99000, 3, NULL, NULL, NULL, 0, '2018-06-15 06:35:46', '2018-06-15 06:35:46'),
(55, '705979', 2, 899000, 44, NULL, NULL, NULL, 0, '2018-06-18 08:32:21', '2018-06-18 08:40:06'),
(57, '621346', 2, 990000, 44, NULL, NULL, NULL, 0, '2018-06-18 09:04:50', '2018-06-18 09:06:03'),
(58, NULL, 1, 0, 3, '1788033008', 'Bạc Liêu | Tây hồ | số 3 Hai bà trưng | số 3 Hai bà trưng', 'Nhanh nhé', -1, '2018-06-26 08:30:11', '2018-06-26 08:32:20'),
(59, '849395', 2, 699000, 1, NULL, NULL, NULL, 1, '2018-07-03 12:14:53', '2018-07-03 12:14:53'),
(60, '560244', 2, 799000, 3, NULL, NULL, NULL, 0, '2018-07-05 02:26:51', '2018-07-05 09:13:56'),
(61, 'CEDU_1530779926', 2, 399000, 3, NULL, NULL, NULL, 0, '2018-07-05 08:42:00', '2018-07-06 02:01:47'),
(62, NULL, 1, 399000, 44, '1688044009', 'Bình Dương | Trên Sông | hanoi | hanoi', 'Nhanh nhé', 0, '2018-07-06 01:12:14', '2018-07-06 01:13:49'),
(63, NULL, 1, 399000, 43, 'zzzz', 'Cao Bằng | zzzz | zzzzz | zzzz', 'zzzzz', 1, '2018-07-06 02:27:59', '2018-07-06 02:27:59'),
(65, 'CEDU_1530846612', 2, 799000, 43, NULL, NULL, NULL, 1, '2018-07-06 03:11:49', '2018-07-06 03:11:49'),
(66, 'CEDU_1530847909', 2, 549000, 43, NULL, NULL, NULL, 1, '2018-07-06 03:33:27', '2018-07-06 03:33:27'),
(70, NULL, 1, 599000, 3, '01688044009', 'Hà Nội | Thanh Xuân | Nhân Chính | số 1 Hoàng Đạo Thúy', 'Hello baby', 0, '2018-07-06 09:44:51', '2018-07-06 09:46:44'),
(71, NULL, 1, 2488000, 52, '(+84) 988947731', 'Bà Rịa-Vũng Tàu | hà noiik | deuyjud | dhuytjuytd', 'dtyjytjkd', 1, '2018-08-06 09:19:42', '2018-08-06 09:19:42'),
(72, NULL, 1, 599000, 60, '1788033008', 'Hà Nội |  | 175 Xuân thủy | 175 Xuân thủy', NULL, 0, '2018-09-06 08:39:00', '2018-09-06 09:14:55'),
(73, NULL, 1, 699000, 60, '1788033008', 'Hà Nội | 00000000000000000000000000000000000000000000000000000000000000000000000000000 | 175 Xuân thủy | 175 Xuân thủy', NULL, 0, '2018-09-06 09:02:26', '2018-09-06 09:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDe_id` int(10) UNSIGNED NOT NULL,
  `orderDe_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderDe_price` int(11) NOT NULL,
  `orderDe_qty` int(11) NOT NULL,
  `orderDe_ord_id` int(10) UNSIGNED NOT NULL,
  `orderDe_cou_id` int(10) UNSIGNED NOT NULL,
  `orderDe_aff_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderDe_id`, `orderDe_name`, `orderDe_price`, `orderDe_qty`, `orderDe_ord_id`, `orderDe_cou_id`, `orderDe_aff_id`, `created_at`, `updated_at`) VALUES
(1, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 8, 3, 21, '2018-05-17 02:03:47', '2018-05-17 02:03:47'),
(2, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 9, 9, 21, '2018-05-18 05:58:54', '2018-05-18 05:58:54'),
(3, 'QUẢN TRỊ MARKETING (BỘ BÀI GIẢNG 10 MODULES)', 449000, 1, 12, 12, NULL, '2018-05-18 06:21:13', '2018-05-18 06:21:13'),
(4, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 13, 3, NULL, '2018-05-29 18:22:04', '2018-05-29 18:22:04'),
(5, 'Tiếng Hàn sơ cấp cho người mới bắt đầu', 899000, 1, 14, 8, 21, '2018-05-30 05:38:22', '2018-05-30 05:38:22'),
(7, 'Tiếng Hàn sơ cấp cho người mới bắt đầu', 899000, 1, 16, 8, 21, '2018-05-30 05:39:39', '2018-05-30 05:39:39'),
(8, 'Đột phá thu nhập qua 6 kênh maketing online', 699000, 1, 17, 6, 21, '2018-06-04 03:36:31', '2018-06-04 03:36:31'),
(9, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 18, 9, 21, '2018-06-04 03:37:51', '2018-06-04 03:37:51'),
(10, 'Học photoshop một cách bài bản để trở thành nhà thiết kế chuyên nghiệp', 990000, 1, 19, 7, 21, '2018-06-04 03:42:44', '2018-06-04 03:42:44'),
(11, 'QUẢN TRỊ MARKETING (BỘ BÀI GIẢNG 10 MODULES)', 449000, 1, 20, 12, 21, '2018-06-04 03:44:29', '2018-06-04 03:44:29'),
(12, 'YOGA trẻ hóa - Làm đẹp cho khuôn mặt', 99000, 1, 21, 10, NULL, '2018-06-04 03:53:54', '2018-06-04 03:53:54'),
(13, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 22, 3, NULL, '2018-06-04 18:43:38', '2018-06-04 18:43:38'),
(14, 'Tiếng Hàn sơ cấp cho người mới bắt đầu', 899000, 1, 23, 8, NULL, '2018-06-04 18:44:56', '2018-06-04 18:44:56'),
(15, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 24, 3, 34, '2018-06-04 19:03:45', '2018-06-04 19:03:45'),
(16, 'YOGA trẻ hóa - Làm đẹp cho khuôn mặt', 99000, 1, 25, 10, 34, '2018-06-04 19:04:49', '2018-06-04 19:04:49'),
(17, 'QUẢN TRỊ MARKETING (BỘ BÀI GIẢNG 10 MODULES)', 449000, 1, 26, 12, NULL, '2018-06-06 01:49:45', '2018-06-06 01:49:45'),
(18, 'Tiếng Anh giao tiếp: Tự tin bộc lộ cảm xúc của bản thân bằng Tiếng Anh', 349000, 1, 27, 13, NULL, '2018-06-06 01:50:44', '2018-06-06 01:50:44'),
(20, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 29, 9, NULL, '2018-06-06 01:52:00', '2018-06-06 01:52:00'),
(22, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 31, 9, NULL, '2018-06-06 01:54:19', '2018-06-06 01:54:19'),
(23, 'Đột phá thu nhập qua 6 kênh maketing online', 699000, 1, 32, 6, NULL, '2018-06-06 11:08:47', '2018-06-06 11:08:47'),
(24, 'Tiếng Anh giao tiếp: Tự tin bộc lộ cảm xúc của bản thân bằng Tiếng Anh', 349000, 1, 33, 13, NULL, '2018-06-06 11:09:43', '2018-06-06 11:09:43'),
(25, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 34, 9, NULL, '2018-06-08 01:15:55', '2018-06-08 01:15:55'),
(26, 'Chứng khoán cho người mới bắt đầu', 699000, 1, 35, 9, 21, '2018-06-08 06:59:05', '2018-06-08 06:59:05'),
(32, 'Học photoshop một cách bài bản để trở thành nhà thiết kế chuyên nghiệp', 990000, 1, 42, 7, NULL, '2018-06-12 04:03:20', '2018-06-12 04:03:20'),
(35, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 45, 3, NULL, '2018-06-12 04:24:06', '2018-06-12 04:24:06'),
(37, 'Phân tích hệ thống', 549000, 1, 47, 5, NULL, '2018-06-12 06:46:25', '2018-06-12 06:46:25'),
(38, 'Phân tích hệ thống', 549000, 1, 48, 5, NULL, '2018-06-12 08:21:00', '2018-06-12 08:21:00'),
(42, 'Đột phá thu nhập qua 6 kênh maketing online', 699000, 1, 52, 6, NULL, '2018-06-14 08:20:48', '2018-06-14 08:20:48'),
(44, 'YOGA trẻ hóa - Làm đẹp cho khuôn mặt', 99000, 1, 54, 10, NULL, '2018-06-15 06:35:52', '2018-06-15 06:35:52'),
(45, 'Tiếng Hàn sơ cấp cho người mới bắt đầu', 899000, 1, 55, 8, NULL, '2018-06-18 08:32:23', '2018-06-18 08:32:23'),
(47, 'Học photoshop một cách bài bản để trở thành nhà thiết kế chuyên nghiệp', 990000, 1, 57, 7, NULL, '2018-06-18 09:04:51', '2018-06-18 09:04:51'),
(48, 'Đột phá thu nhập qua 6 kênh maketing online', 699000, 1, 59, 6, NULL, '2018-07-03 12:14:54', '2018-07-03 12:14:54'),
(49, 'Khóa học chuyên đề trà sữa và thạch có nhân', 799000, 1, 60, 15, NULL, '2018-07-05 02:26:52', '2018-07-05 02:26:52'),
(50, 'ĐỐI MẶT VÀ CHIẾN THẮNG UNG THƯ', 399000, 1, 61, 16, NULL, '2018-07-05 08:42:01', '2018-07-05 08:42:01'),
(51, 'ĐỐI MẶT VÀ CHIẾN THẮNG UNG THƯ', 399000, 1, 62, 16, 21, '2018-07-06 01:12:16', '2018-07-06 01:12:16'),
(52, 'ĐỐI MẶT VÀ CHIẾN THẮNG UNG THƯ', 399000, 1, 63, 16, 21, '2018-07-06 02:28:01', '2018-07-06 02:28:01'),
(54, 'Khóa học chuyên đề trà sữa và thạch có nhân', 799000, 1, 65, 15, NULL, '2018-07-06 03:11:51', '2018-07-06 03:11:51'),
(55, 'Phân tích hệ thống', 549000, 1, 66, 5, NULL, '2018-07-06 03:33:28', '2018-07-06 03:33:28'),
(59, 'Con đường trở thành triệu phú đô la: giải mã những kỹ năng đỉnh cao của môi giới bất động sản', 599000, 1, 70, 17, NULL, '2018-07-06 09:44:53', '2018-07-06 09:44:53'),
(60, 'Học photoshop một cách bài bản để trở thành nhà thiết kế chuyên nghiệp', 990000, 1, 71, 7, NULL, '2018-08-06 09:19:44', '2018-08-06 09:19:44'),
(61, 'Khóa học chuyên đề trà sữa và thạch có nhân', 799000, 1, 71, 15, NULL, '2018-08-06 09:19:44', '2018-08-06 09:19:44'),
(62, 'Guitar dem hat trong 30 ngay ahihi', 699000, 1, 71, 3, NULL, '2018-08-06 09:19:44', '2018-08-06 09:19:44'),
(63, 'English for Beginners - Tiếng Anh cho người mới bắt đầu', 599000, 1, 72, 18, NULL, '2018-09-06 08:39:02', '2018-09-06 08:39:02'),
(64, 'Đột phá thu nhập qua 6 kênh maketing online', 699000, 1, 73, 6, NULL, '2018-09-06 09:02:28', '2018-09-06 09:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `part_id` int(10) UNSIGNED NOT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_cou_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`part_id`, `part_name`, `part_cou_id`, `created_at`, `updated_at`) VALUES
(1, 'Phần 1: Giới thiệu khóa học', 6, '2018-04-05 23:21:59', '2018-04-05 23:21:59'),
(2, 'Phần 2: Nhập môn Adobe Illustrator', 6, '2018-04-05 23:22:15', '2018-04-05 23:22:15'),
(3, 'Phần 3: Làm chủ một tài liệu làm việc trên Illustrator', 6, '2018-04-05 23:22:31', '2018-04-05 23:22:31'),
(4, 'Phần 4: Tạo mới và quản lý Artboard (OKE)', 6, '2018-04-05 23:22:41', '2018-04-05 23:41:04'),
(5, 'Phần 5: Làm việc hiệu quả hơn với Layer', 6, '2018-04-05 23:22:53', '2018-04-05 23:22:53'),
(6, 'Phần 6: Làm chủ các công cụ vẽ cơ bản trên Illustrator', 6, '2018-04-05 23:23:04', '2018-04-05 23:23:04'),
(7, 'Phần 7: Các thao tác biến đổi (Transforming) đối tượng', 6, '2018-04-05 23:23:45', '2018-04-05 23:23:45'),
(8, 'Phần 8: Làm việc với màu tô và đường viền của đối tượng (OK)', 6, '2018-04-05 23:24:03', '2018-04-05 23:32:17'),
(9, 'Phần 1: Giới thiệu khóa học', 7, '2018-04-06 02:12:24', '2018-04-06 02:12:24'),
(10, 'Phần 2: Làm quen với Photoshop', 7, '2018-04-06 02:12:38', '2018-04-06 02:12:38'),
(11, 'Phần 3 : Hiểu về hình ảnh kỹ thuật số', 7, '2018-04-06 02:12:52', '2018-04-06 02:12:52'),
(12, 'Phần 1: Tổng quan marketing', 12, '2018-05-16 06:09:05', '2018-05-16 06:09:05'),
(13, 'Phần 1: Giới thiệu khóa học', 9, '2018-05-18 05:46:10', '2018-05-18 05:46:10'),
(14, 'Giới thiệu', 14, '2018-06-14 10:07:05', '2018-06-14 10:07:05'),
(15, 'Phần 1: Phong cách Danh nhân', 17, '2018-07-06 09:41:17', '2018-07-06 09:41:17'),
(16, 'Hello', 1, '2018-09-07 02:02:20', '2018-09-07 02:02:20'),
(17, 'Phần 4: Vẽ quả trứng', 7, '2018-09-07 04:58:15', '2018-09-07 04:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rat_id` int(10) UNSIGNED NOT NULL,
  `rat_star` tinyint(4) NOT NULL,
  `rat_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rat_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rat_acc_id` int(10) UNSIGNED NOT NULL,
  `rat_cou_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rat_id`, `rat_star`, `rat_title`, `rat_content`, `rat_acc_id`, `rat_cou_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'Hay lắm', 'Khóa học khá là hữu ích và mình học đưuọc rất nhiều', 11, 6, '2018-08-21 01:58:07', NULL),
(3, 1, 'Chán lắm', 'Khóa học chả hay gì cả , giáo viên còn xấu nữa', 11, 6, '2018-08-21 01:58:07', '2018-04-06 02:11:12'),
(4, 4, 'Hay lắm', 'Khóa học khá là hữu ích và mình học đưuọc rất nhiều', 11, 6, '2018-08-21 01:58:07', NULL),
(6, 1, 'Chán lắm', 'Khóa học chả hay gì cả , giáo viên còn xấu nữa', 11, 1, '2018-08-21 01:58:07', NULL),
(7, 4, 'Hay lắm', 'Khóa học khá là hữu ích và mình học đưuọc rất nhiều', 11, 1, '2018-08-21 01:58:07', NULL),
(9, 4, 'OKe lắm', 'Khóa học chả hay gì cả , giáo viên còn xấu nữa', 11, 4, '2018-08-21 01:58:07', '2018-05-01 19:28:49'),
(10, 5, 'Tuyệt vời', '5 sao luoon', 3, 6, '2018-08-21 01:58:07', '2018-08-24 02:46:09'),
(11, 5, 'Chán lắm', 'ok', 3, 4, '2018-08-21 01:58:07', '2018-05-20 18:44:58'),
(12, 5, 'Hay quá', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', '2018-05-21 04:58:08'),
(13, 5, 'Giáo viên Xấu quá', 'Chán lắm', 3, 12, '2018-08-21 01:58:07', '2018-05-21 18:18:00'),
(14, 5, 'hay này', 'ok', 3, 7, '2018-08-21 01:58:07', '2018-05-18 06:39:30'),
(15, 4, 'hay này', 'ok', 3, 7, '2018-08-21 01:58:07', '2018-05-18 06:37:39'),
(16, 4, 'hay này', 'ok', 3, 7, '2018-08-21 01:58:07', '2018-05-18 06:37:56'),
(17, 5, 'Đẹp', 'Đẹp', 35, 10, '2018-08-21 01:58:07', '2018-06-05 03:58:02'),
(18, 5, 'Hay quá', '5 sao', 3, 5, '2018-08-21 01:58:07', '2018-06-12 06:49:09'),
(19, 2, 'Giáo viên xinh đẹp', '2 nhes', 3, 13, '2018-08-21 01:58:07', '2018-08-22 09:34:31'),
(20, 4, 'Hay quá', 'SAo lon', 3, 3, '2018-08-21 01:58:07', '2018-09-06 01:42:40'),
(21, 5, 'Giáo viên Xấu quá', 'Nhưng vẫn cho 5 *', 43, 6, '2018-08-21 01:58:07', '2018-07-06 02:00:46'),
(22, 5, 'Một khóa học cực kì hữu ích', 'Với giáo viên Xinh gái', 3, 16, '2018-08-21 01:58:07', '2018-07-07 01:45:16'),
(23, 4, 'hay này', 'OKe', 3, 17, '2018-08-21 01:58:07', '2018-07-07 01:58:07'),
(24, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(25, 3, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 14, 9, '2018-08-21 01:58:07', NULL),
(26, 4, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 31, 9, '2018-08-21 01:58:07', NULL),
(27, 3, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 31, 9, '2018-08-21 01:58:07', NULL),
(28, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(29, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(30, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(31, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(32, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(33, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(34, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(35, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(36, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(37, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(38, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(39, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(40, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(41, 5, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(42, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 14, 9, '2018-08-21 01:58:07', NULL),
(43, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(44, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(45, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(46, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(47, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(48, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(49, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 3, 9, '2018-08-21 01:58:07', NULL),
(50, 2, ' ok ', 'Tim is a great Instructor. I just started to watch the course few weeks ago, but I can say that I already know many things about Java programming. It\'s great that he\'s also making a Quizzes and Challenges for us to apply what we\'ve learned. But the reason', 14, 9, '2018-08-21 01:58:07', NULL),
(51, 5, NULL, 'Dạy hay lắm ^^ Yêu thầy <3', 60, 6, '2018-09-06 09:35:07', '2018-09-06 09:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `sto_id` int(10) UNSIGNED NOT NULL,
  `sto_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sto_tea_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`sto_id`, `sto_title`, `sto_img`, `sto_content`, `sto_tea_id`, `created_at`, `updated_at`) VALUES
(6, 'ĐIỂM THÚ VỊ Ở THẦY', '', '<ul>\r\n	<li>Sở trường: H&aacute;t, MC</li>\r\n	<li>Sở đoản: Nhảy, thể thao</li>\r\n	<li>Lĩnh vực y&ecirc;u th&iacute;ch: MC</li>\r\n	<li>M&agrave;u sắc y&ecirc;u th&iacute;ch: Xanh l&aacute; - Đỏ</li>\r\n	<li>Th&iacute;ch l&agrave;m g&igrave; l&uacute;c rảnh rỗi: Đọc s&aacute;ch</li>\r\n	<li>Thể loại nhạc y&ecirc;u th&iacute;ch: Rock, Ballad, Bolero</li>\r\n	<li>Thể loại phim y&ecirc;u th&iacute;ch: H&agrave;nh động, viễn tưởng</li>\r\n	<li>Thể loại s&aacute;ch y&ecirc;u th&iacute;ch: Kiến thức, tiểu thuyết, kiếm hiệp...</li>\r\n	<li>M&ocirc;n thể thao y&ecirc;u th&iacute;ch: B&oacute;ng b&agrave;n</li>\r\n	<li>Một v&agrave;i d&ograve;ng mi&ecirc;u tả về bản th&acirc;n: Đơn giản, y&ecirc;u c&ocirc;ng việc, th&iacute;ch vui vẻ</li>\r\n</ul>', 11, '2018-05-09 06:56:10', '2018-05-09 06:56:10'),
(7, 'Chi tiết', '', '<p><strong>Qu&aacute; tr&igrave;nh c&ocirc;ng t&aacute;c</strong></p>\r\n\r\n<p>- Gi&aacute;o vi&ecirc;n bộ m&ocirc;n Tiếng Anh tại Hocmai.vn&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh t&iacute;ch&nbsp;</strong></p>\r\n\r\n<p>- Gi&uacute;p h&agrave;ng trăm học sinh đạt kết quả học tập tốt m&ocirc;n Tiếng Anh THCS&nbsp;</p>\r\n\r\n<p><strong>Phong c&aacute;ch giảng dạy:</strong></p>\r\n\r\n<p>- Tiếp cận c&aacute;c b&agrave;i học từ những v&iacute; dụ dể hiểu nhất&nbsp;</p>\r\n\r\n<p>- Giảng kỹ, chi tiết c&aacute;c cấu tr&uacute;c ngữ ph&aacute;p theo từng chủ điểm&nbsp;</p>\r\n\r\n<p><strong>Cam kết</strong></p>\r\n\r\n<p>- Học sinh nắm chắc c&aacute;c kiến thức ngữ ph&aacute;p theo chương tr&igrave;nh s&aacute;ch gi&aacute;o khoa&nbsp;</p>\r\n\r\n<p>- Học sinh kh&ocirc;ng c&ograve;n sợ khi học Tiếng Anh&nbsp;</p>\r\n\r\n<p>- N&acirc;ng cao tr&igrave;nh độ tiếng Anh mỗi ng&agrave;y th&ocirc;ng qua hệ thống b&agrave;i tập phong ph&uacute; v&agrave; đa dạng</p>', 9, '2018-05-11 00:33:49', '2018-05-11 00:33:49'),
(8, 'ĐÔI NÉT VỀ THẦY', '', '<p>Từ l&uacute;c quen với bục giảng ở trường THPT Chuy&ecirc;n Đại học Sư phạm H&agrave; Nội đến khi trở th&agrave;nh thầy gi&aacute;o online của HOCMAI, thầy Nguyễn Th&agrave;nh C&ocirc;ng đều cảm thấy biết ơn v&igrave; m&igrave;nh đ&atilde; chọn nghề v&agrave; nghề đ&atilde; chọn m&igrave;nh. Dạy ở THPT Chuy&ecirc;n, thầy được tiếp x&uacute;c nhiều với học sinh, sống trong cuộc sống của học sinh, coi học sinh như một người bạn nhỏ, t&acirc;m t&igrave;nh đủ mọi thứ chuyện. Đến khi giảng dạy online, thầy lại c&oacute; học sinh tr&ecirc;n khắp đất nước. Những c&acirc;u chuyện th&uacute; vị từ đ&oacute; m&agrave; x&acirc;y đắp nhiều đến kh&ocirc;ng kể xiết.&nbsp;</p>\r\n\r\n<p>Sự gần gũi v&agrave; giản dị trong cuộc sống đời thường cũng như trong c&ocirc;ng t&aacute;c giảng dạy, thầy lu&ocirc;n kh&eacute;o l&eacute;o truyền cảm hứng với t&igrave;nh y&ecirc;u Sinh học. Như một mệnh đề đ&oacute;ng mở, Sinh học tưởng chừng như rất m&aacute;y m&oacute;c v&agrave; phức tạp ấy, được thầy biến h&oacute;a th&agrave;nh những nội dung b&agrave;i giảng đơn giản, dễ hiều v&agrave; k&iacute;ch th&iacute;ch sự t&igrave;m t&ograve;i của học&nbsp;sinh.</p>', 8, '2018-05-11 05:48:53', '2018-05-11 05:48:53'),
(9, 'THÀNH TÍCH:', '', '<p>- C&oacute; nhiều học sinh đạt Huy chương trong c&aacute;c kỳ thi Olympic Quốc tế.<br />\r\n- C&oacute; nhiều học sinh đạt giải Nhất, Nh&igrave;, Ba trong kỳ thi chọn HSG Quốc gia m&ocirc;n Sinh học, số học tr&ograve; đỗ c&aacute;c trường top như Y H&agrave; Nội hay Y Dược TP HCM nhiều kh&ocirc;ng kể xiết.<br />\r\n- Được nhận giấy khen của Hiệu trưởng trường ĐHSP H&agrave; Nội về c&aacute;c th&agrave;nh t&iacute;ch bồi dưỡng Học sinh giỏi.&nbsp;<br />\r\n- Tham gia tập huấn cho c&aacute;c gi&aacute;o vi&ecirc;n Chuy&ecirc;n to&agrave;n quốc giảng dạy c&aacute;c m&ocirc;n Khoa học bằng tiếng Anh.</p>\r\n\r\n<p>- S&aacute;ch đ&atilde; xuất bản: T&agrave;i liệu bồi dưỡng gi&aacute;o vi&ecirc;n chuy&ecirc;n giảng dạy Sinh học bằng tiếng Anh, ABC đa dạng sinh học.</p>', 8, '2018-05-11 06:41:10', '2018-05-11 06:41:10'),
(10, 'Kinh Nghiệm', '', '<p><strong>* Kinh nghiệm giảng dạy</strong></p>\r\n\r\n<p>06 năm giảng dạy tiếng Anh ở mọi lứa tuổi, vị tr&iacute; v&agrave; mảng ng&agrave;nh (Mới bắt đầu, giao tiếp, TOEIC...)</p>\r\n\r\n<p><strong>* Phong c&aacute;ch giảng dạy</strong></p>\r\n\r\n<p>M&igrave;nh giảng b&agrave;i thường đi theo nhiều c&aacute;ch, l&agrave;m sao để c&aacute;c bạn ấy dễ hiểu nhất. C&oacute; l&uacute;c m&igrave;nh đi từ l&yacute; thuyết đến v&iacute; dụ, nhưng nhiều khi lại từ v&iacute; dụ đến thực tế, t&ugrave;y thuộc v&agrave;o nội dung, đối tượng...Khi đứng lớp m&igrave;nh n&oacute;i chuyện rất thoải m&aacute;i, th&acirc;n thiện. &quot;Kh&ocirc;ng học b&agrave;i đừng k&ecirc;u c&ocirc; &aacute;c&quot; c&oacute; lẽ l&agrave; mi&ecirc;u tả r&otilde; nhất phong c&aacute;ch giảng dạy của m&igrave;nh.=))<br />\r\nM&igrave;nh cũng rất hay thưởng v&agrave; động vi&ecirc;n c&aacute;c bạn học, c&oacute; thưởng c&oacute; phạt, mọi thứ r&otilde; r&agrave;ng.</p>\r\n\r\n<p><strong>* Quan điểm giảng dạy</strong></p>\r\n\r\n<p>Practice makes perfect! Nothing is impossible.</p>', 9, '2018-05-11 21:39:30', '2018-05-11 21:39:30'),
(11, 'Tiểu sử', '', '<p><strong>Qu&aacute; tr&igrave;nh c&ocirc;ng t&aacute;c:</strong></p>\r\n\r\n<p>- Gi&aacute;o vi&ecirc;n phụ tr&aacute;ch bộ m&ocirc;n ngữ văn cấp THCS của Hocmai.vn&nbsp;</p>\r\n\r\n<p>- Gi&aacute;o vi&ecirc;n Ngữ văn trường THPT Anhxtanh (H&agrave; Nội)</p>\r\n\r\n<p><strong>Th&agrave;nh t&iacute;ch:&nbsp;</strong>&nbsp;</p>\r\n\r\n<p>- 7 năm giảng dạy v&agrave; &ocirc;n luyện m&ocirc;n Ngữ văn từ Tiểu học đến THPT.&nbsp;</p>\r\n\r\n<p>- C&oacute; nhiều học sinh đạt điểm cao trong kỳ thi tuyển sinh v&agrave;o 10 m&ocirc;n Ngữ Văn&nbsp;</p>\r\n\r\n<p>- Tốt nghiệp loại Giỏi khoa Sư phạm Ngữ Văn, Trường ĐH Quốc gia H&agrave; Nội</p>\r\n\r\n<p>- &nbsp;Thường đưa ra c&aacute;c nhận định tương đối ch&iacute;nh x&aacute;c đề thi tuyển sinh v&agrave;o lớp 10</p>', 10, '2018-05-16 18:20:25', '2018-05-16 18:20:25'),
(12, 'Phong cách', '', '<p><strong>Phong c&aacute;ch giảng dạy:&nbsp;</strong></p>\r\n\r\n<p>- Giọng văn ấm &aacute;p, nhẹ nh&agrave;ng, truyền cảm hứng học Văn tới học sinh&nbsp;</p>\r\n\r\n<p>- Giảng chi tiết, hướng dẫn tỉ mỉ c&aacute;c nội dung trong c&aacute;c t&aacute;c phẩm văn học&nbsp;</p>\r\n\r\n<p>- Quan niệm về dạy học: &quot;Học kh&ocirc;ng phải để t&igrave;m kiếm hạnh ph&uacute;c. Học ch&iacute;nh l&agrave; hạnh ph&uacute;c&quot;&nbsp;</p>\r\n\r\n<p><strong>Cam kết của gi&aacute;o vi&ecirc;n:</strong></p>\r\n\r\n<p>- N&acirc;ng cao năng lực cảm thụ v&agrave; khả năng diễn đạt&nbsp;</p>\r\n\r\n<p>- Học sinh hiểu s&acirc;u sắc c&aacute;c vấn đề trong c&aacute;c t&aacute;c phẩm văn học</p>\r\n\r\n<p>- Học sinh nắm chắc c&aacute;c phương ph&aacute;p l&agrave;m c&aacute;c thể loại văn học kh&aacute;c nhau&nbsp;</p>', 10, '2018-05-16 18:20:47', '2018-05-16 18:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tea_id` int(10) UNSIGNED NOT NULL,
  `tea_templace` int(1) NOT NULL DEFAULT '1',
  `tea_img_head` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_img_foot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_gender` int(11) NOT NULL,
  `tea_specialize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_fb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_yt` text COLLATE utf8mb4_unicode_ci,
  `tea_rating` float NOT NULL DEFAULT '0',
  `tea_follow` int(11) NOT NULL,
  `tea_lesson` int(11) NOT NULL,
  `tea_exp` int(11) NOT NULL,
  `tea_work_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tea_featured` tinyint(4) NOT NULL DEFAULT '0',
  `tea_discount` int(11) NOT NULL DEFAULT '20',
  `tea_acc_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tea_id`, `tea_templace`, `tea_img_head`, `tea_img_foot`, `tea_gender`, `tea_specialize`, `tea_degree`, `tea_email`, `tea_fb`, `tea_yt`, `tea_rating`, `tea_follow`, `tea_lesson`, `tea_exp`, `tea_work_place`, `tea_featured`, `tea_discount`, `tea_acc_id`, `created_at`, `updated_at`) VALUES
(8, 3, '1528872481.png', '1528872471.png', 1, 'Dạy Đời', 'Cử nhân', 'tuanson.site3@cphonevn.com', 'https://www.facebook.com/choco.chjp.9', NULL, 1, 20000, 50, 9, 'CGroup', 0, 20, 12, '2018-05-09 05:04:03', '2018-06-15 02:04:01'),
(9, 3, '', '', 2, 'Thiết kế đồ họa', 'Cử nhân', 'duyenmy@gmail.com', 'https://www.facebook.com/lynk.tieu.7', NULL, 2, 3000, 30, 5, 'Cphonevn', 0, 20, 11, '2018-05-09 05:04:09', '2018-08-24 10:18:48'),
(10, 2, '', '', 1, 'Nhà kinh doanh học', 'Cử nhân', 'xuanhung2401@gmail.com', 'null', NULL, 3, 9900, 69, 10, 'Viện khoa học phát triển công nghệ CTech', 0, 20, 4, '2018-05-09 05:04:14', '2018-06-15 02:04:39'),
(11, 1, '1528864026.png', '1528864374.png', 1, 'Lập trình WEB', 'Giáo sư', 'quyendo.site3@cphonevn.com', 'https://www.facebook.com/vquyen96', 'https://www.facebook.com/vquyen96', 3.5, 1000000, 100, 10, 'Cphonevn', 5, 20, 13, '2018-05-09 06:48:15', '2018-09-04 11:02:35'),
(12, 1, '', '', 1, '', 'Cử nhân', 'caolinh@gmail.com', ' ', NULL, 0, 10, 10, 10, ' ', 0, 20, 24, '2018-05-18 05:03:10', '2018-05-18 05:03:10'),
(13, 2, '1528872404.jpg', '1528871775.png', 2, 'Thiết kế đồ họa', 'Tiến sĩ', 'thuuyen@gmail.com', '0', NULL, 0, 9009, 29, 9, 'CGroup', 4, 20, 25, '2018-05-21 03:15:58', '2018-06-13 06:46:44'),
(14, 1, '', '', 1, '', 'Cử nhân', 'linh.linh@gmail.com', ' ', NULL, 0, 10, 10, 10, ' ', 0, 20, 40, '2018-06-13 03:43:03', '2018-06-13 03:43:03'),
(15, 1, '', '', 1, '', 'Cử nhân', 'thanhngoc@gmail.com', ' ', NULL, 0, 10, 10, 10, ' ', 0, 20, 41, '2018-06-13 08:26:21', '2018-06-13 08:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_rating`
--

CREATE TABLE `teacher_rating` (
  `tr_id` int(10) UNSIGNED NOT NULL,
  `tr_rate` int(11) NOT NULL,
  `tr_tea_id` int(10) UNSIGNED NOT NULL,
  `tr_acc_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_rating`
--

INSERT INTO `teacher_rating` (`tr_id`, `tr_rate`, `tr_tea_id`, `tr_acc_id`, `created_at`, `updated_at`) VALUES
(4, 2, 9, 3, '2018-06-15 01:48:29', '2018-08-24 10:18:48'),
(5, 4, 11, 3, '2018-06-15 01:48:46', '2018-06-15 02:01:48'),
(6, 1, 8, 3, '2018-06-15 02:02:07', '2018-06-15 02:03:14'),
(7, 3, 10, 3, '2018-06-15 02:04:39', '2018-06-15 02:04:39'),
(8, 3, 11, 44, '2018-08-27 02:56:42', '2018-08-27 02:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_request`
--
ALTER TABLE `account_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `account_request_req_acc_id_foreign` (`req_acc_id`);

--
-- Indexes for table `aff`
--
ALTER TABLE `aff`
  ADD PRIMARY KEY (`aff_id`),
  ADD KEY `aff_aff_acc_id_foreign` (`aff_acc_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `code_code_orderde_id_foreign` (`code_orderDe_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `comment_com_acc_id_foreign` (`com_acc_id`),
  ADD KEY `comment_com_cou_id_foreign` (`com_cou_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cou_id`),
  ADD KEY `course_cou_gr_id_foreign` (`cou_gr_id`),
  ADD KEY `course_cou_tea_id_foreign` (`cou_tea_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doc_doc_gr_id_foreign` (`doc_gr_id`),
  ADD KEY `doc_doc_acc_id_foreign` (`doc_acc_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`les_id`),
  ADD KEY `lesson_les_part_id_foreign` (`les_part_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `order_ord_acc_id_foreign` (`ord_acc_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDe_id`),
  ADD KEY `orderdetail_orderde_ord_id_foreign` (`orderDe_ord_id`),
  ADD KEY `orderdetail_orderde_cou_id_foreign` (`orderDe_cou_id`),
  ADD KEY `orderdetail_orderde_aff_id_foreign` (`orderDe_aff_id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `part_part_cou_id_foreign` (`part_cou_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rat_id`),
  ADD KEY `rating_rat_acc_id_foreign` (`rat_acc_id`),
  ADD KEY `rating_rat_cou_id_foreign` (`rat_cou_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`sto_id`),
  ADD KEY `story_sto_tea_id_foreign` (`sto_tea_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tea_id`),
  ADD KEY `teacher_tea_acc_id_foreign` (`tea_acc_id`);

--
-- Indexes for table `teacher_rating`
--
ALTER TABLE `teacher_rating`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `teacher_rating_tr_tea_id_foreign` (`tr_tea_id`),
  ADD KEY `teacher_rating_tr_acc_id_foreign` (`tr_acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `account_request`
--
ALTER TABLE `account_request`
  MODIFY `req_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `aff`
--
ALTER TABLE `aff`
  MODIFY `aff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ban_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cou_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `doc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `les_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ord_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `part_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `sto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tea_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher_rating`
--
ALTER TABLE `teacher_rating`
  MODIFY `tr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_request`
--
ALTER TABLE `account_request`
  ADD CONSTRAINT `account_request_req_acc_id_foreign` FOREIGN KEY (`req_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `aff`
--
ALTER TABLE `aff`
  ADD CONSTRAINT `aff_aff_acc_id_foreign` FOREIGN KEY (`aff_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_code_orderde_id_foreign` FOREIGN KEY (`code_orderDe_id`) REFERENCES `orderdetail` (`orderDe_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_com_acc_id_foreign` FOREIGN KEY (`com_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_com_cou_id_foreign` FOREIGN KEY (`com_cou_id`) REFERENCES `course` (`cou_id`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_cou_gr_id_foreign` FOREIGN KEY (`cou_gr_id`) REFERENCES `groups` (`gr_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_cou_tea_id_foreign` FOREIGN KEY (`cou_tea_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_doc_acc_id_foreign` FOREIGN KEY (`doc_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doc_doc_gr_id_foreign` FOREIGN KEY (`doc_gr_id`) REFERENCES `groups` (`gr_id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_les_part_id_foreign` FOREIGN KEY (`les_part_id`) REFERENCES `part` (`part_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ord_acc_id_foreign` FOREIGN KEY (`ord_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_orderde_aff_id_foreign` FOREIGN KEY (`orderDe_aff_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetail_orderde_cou_id_foreign` FOREIGN KEY (`orderDe_cou_id`) REFERENCES `course` (`cou_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetail_orderde_ord_id_foreign` FOREIGN KEY (`orderDe_ord_id`) REFERENCES `order` (`ord_id`) ON DELETE CASCADE;

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `part_part_cou_id_foreign` FOREIGN KEY (`part_cou_id`) REFERENCES `course` (`cou_id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_rat_acc_id_foreign` FOREIGN KEY (`rat_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_rat_cou_id_foreign` FOREIGN KEY (`rat_cou_id`) REFERENCES `course` (`cou_id`) ON DELETE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_sto_tea_id_foreign` FOREIGN KEY (`sto_tea_id`) REFERENCES `teacher` (`tea_id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_tea_acc_id_foreign` FOREIGN KEY (`tea_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_rating`
--
ALTER TABLE `teacher_rating`
  ADD CONSTRAINT `teacher_rating_tr_acc_id_foreign` FOREIGN KEY (`tr_acc_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_rating_tr_tea_id_foreign` FOREIGN KEY (`tr_tea_id`) REFERENCES `teacher` (`tea_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
