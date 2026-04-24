-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2026 lúc 02:49 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `document_sytem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `download_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`document_id`, `title`, `description`, `file_url`, `category`, `subject`, `upload_date`, `user_id`, `status`, `download_count`, `view_count`) VALUES
(1, 'Giáo trình Cơ sở dữ liệu nâng cao', 'Tài liệu chi tiết về tối ưu hóa truy vấn và thiết kế chuẩn hóa dữ liệu.', '/uploads/docs/csdl-nang-cao.pdf', 'Giáo trình', 'Công nghệ thông tin', '2026-04-17 15:38:18', 2, 'approved', 45, 120),
(2, 'Đề thi mẫu IELTS Writing Task 2', 'Tổng hợp 50 đề thi thực tế và bài mẫu đạt band 8.0.', '/uploads/docs/ielts-writing-task2.pdf', 'Tài liệu ôn thi', 'Ngoại ngữ', '2026-04-17 15:38:18', 3, 'approved', 112, 350),
(3, 'Báo cáo thực tập tại FPT Software', 'Mẫu báo cáo thực tập vị trí Frontend Developer cho sinh viên năm cuối.', '/uploads/docs/bc-thuc-tap-fpt.docx', 'Báo cáo', 'Kinh nghiệm thực tập', '2026-04-17 15:38:18', 2, 'approved', 28, 85),
(4, 'Cẩm nang lập trình Python cho người mới', 'Hướng dẫn từ cú pháp cơ bản đến làm việc với thư viện Pandas.', '/uploads/docs/python-basic.pdf', 'Sách kỹ năng', 'Lập trình', '2026-04-17 15:38:18', 4, 'pending', 0, 12),
(5, 'Tiểu luận Triết học Mác-Lênin', 'Phân tích về mối quan hệ giữa vật chất và ý thức.', '/uploads/docs/tieu-luan-triet.docx', 'Tiểu luận', 'Lý luận chính trị', '2026-04-17 15:38:18', 5, 'rejected', 0, 5),
(6, 'Full Source Code Web Bán Hàng Laravel 10', 'Project đầy đủ chức năng quản lý kho, giỏ hàng, thanh toán VNPay cho đồ án.', '/storage/codes/web-vnpay-laravel.zip', 'Đồ án', 'Lập trình Web', '2026-04-17 15:40:13', 3, 'approved', 145, 1200),
(7, 'Giáo trình Cấu trúc dữ liệu và Giải thuật (Java)', 'Tài liệu chi tiết về Stack, Queue, Tree và các thuật toán sắp xếp.', '/storage/docs/ctdl-gt-java.pdf', 'Giáo trình', 'Lập trình Java', '2026-04-17 15:40:13', 5, 'approved', 89, 450),
(8, 'Đề thi trắc nghiệm Cybersecurity cơ bản 2024', 'Tổng hợp 200 câu hỏi trắc nghiệm ôn thi chứng chỉ bảo mật.', '/storage/exams/security-quiz-2024.docx', 'Tài liệu ôn thi', 'An toàn thông tin', '2026-04-17 15:40:13', 2, 'approved', 56, 320),
(9, 'Script DuckyScript cho Flipper Zero - BadUSB', 'Tổng hợp các script thực thi nhanh cho mục đích nghiên cứu bảo mật.', '/storage/scripts/flipper-ducky.txt', 'Công cụ', 'Cybersecurity', '2026-04-17 15:40:13', 1, 'approved', 210, 890),
(10, 'Báo cáo tài chính Vinamilk Q3/2025', 'Phân tích chi tiết dòng tiền và lợi nhuận của VNM năm 2025.', '/storage/reports/vnm-q3-2025.pdf', 'Báo cáo', 'Kế toán - Tài chính', '2026-04-17 15:40:13', 4, 'pending', 0, 15),
(11, 'Hướng dẫn sử dụng NRF24L01 với Arduino', 'Chi tiết cách kết nối và lập trình giao tiếp không dây.', '/storage/docs/nrf24l01-manual.pdf', 'Hướng dẫn', 'Điện tử viễn thông', '2026-04-18 08:00:00', 1, 'approved', 45, 150),
(12, 'Tối ưu hóa Performance cho Laravel 11', 'Các kỹ thuật caching, eager loading và tối ưu database.', '/storage/docs/laravel-performance.pdf', 'Tài liệu kỹ thuật', 'Lập trình Web', '2026-04-18 08:15:00', 6, 'approved', 89, 320),
(13, 'Script BadUSB cho Digispark ATtiny85', 'Tổng hợp các payload thực thi Powershell tự động.', '/storage/scripts/digispark-payloads.txt', 'Công cụ', 'Cybersecurity', '2026-04-18 08:30:00', 1, 'approved', 156, 500),
(14, 'Giáo trình Python cho Data Science', 'Sử dụng NumPy, Pandas và Matplotlib trong phân tích dữ liệu.', '/storage/docs/python-data-science.pdf', 'Giáo trình', 'Lập trình Python', '2026-04-18 08:45:00', 8, 'approved', 34, 110),
(15, 'Đề thi mẫu Java Core K28', 'Tổng hợp câu hỏi trắc nghiệm và tự luận cuối kỳ.', '/storage/exams/java-core-k28.pdf', 'Tài liệu ôn thi', 'Lập trình Java', '2026-04-18 09:00:00', 7, 'approved', 120, 450),
(16, 'Mẫu thiết kế UI/UX cho App UniStay', 'File thiết kế Figma và mô tả trải nghiệm người dùng.', '/storage/design/unistay-ui-ux.zip', 'Thiết kế', 'Đồ án', '2026-04-18 09:15:00', 6, 'pending', 0, 45),
(17, 'Cấu hình Nginx cho Node.js App', 'Hướng dẫn setup Reverse Proxy và SSL với Let\'s Encrypt.', '/storage/docs/nginx-nodejs-setup.pdf', 'Tài liệu kỹ thuật', 'Hệ điều hành', '2026-04-18 09:30:00', 6, 'approved', 67, 210),
(18, 'Tài liệu ôn thi Triết học học kỳ 2', 'Tóm tắt các chương trọng tâm và câu hỏi gợi ý.', '/storage/docs/triet-hoc-hk2.docx', 'Tài liệu ôn thi', 'Lý luận chính trị', '2026-04-18 09:45:00', 7, 'approved', 230, 800),
(19, 'Báo cáo phân tích thị trường Bất động sản 2026', 'Xu hướng căn hộ mini cho sinh viên tại các thành phố lớn.', '/storage/reports/bds-student-2026.pdf', 'Báo cáo', 'Kinh tế', '2026-04-18 10:00:00', 10, 'approved', 12, 120),
(20, 'Hướng dẫn Mod Firmware cho Flipper Zero', 'Cách cài đặt Unleashed hoặc RogueMaster firmware.', '/storage/docs/flipper-firmware-mod.pdf', 'Hướng dẫn', 'Cybersecurity', '2026-04-18 10:15:00', 1, 'approved', 310, 1500),
(21, 'Lập trình Android với Kotlin từ cơ bản', 'Xây dựng ứng dụng đầu tiên bằng Jetpack Compose.', '/storage/docs/kotlin-android.pdf', 'Sách kỹ năng', 'Lập trình di động', '2026-04-18 10:30:00', 8, 'approved', 54, 230),
(22, 'Cơ sở dữ liệu NoSQL với MongoDB', 'Khi nào nên sử dụng NoSQL thay vì SQL truyền thống.', '/storage/docs/mongodb-tutorial.pdf', 'Giáo trình', 'Công nghệ thông tin', '2026-04-18 10:45:00', 2, 'approved', 42, 180),
(23, 'Tài liệu ôn thi TOEIC 750+', 'Mẹo làm bài Part 5 và Part 7 hiệu quả nhất.', '/storage/docs/toeic-750-tips.pdf', 'Tài liệu ôn thi', 'Ngoại ngữ', '2026-04-18 11:00:00', 4, 'approved', 198, 670),
(24, 'Automation Marketing với Python và ADB', 'Script tự động tương tác Facebook/TikTok trên giả lập.', '/storage/scripts/adb-marketing.zip', 'Công cụ', 'Marketing', '2026-04-18 11:15:00', 6, 'approved', 142, 580),
(25, 'Giáo trình Mạng máy tính căn bản', 'Hiểu về mô hình OSI, TCP/IP và cấu hình Router Cisco.', '/storage/docs/basic-networking.pdf', 'Giáo trình', 'Công nghệ thông tin', '2026-04-18 11:30:00', 7, 'approved', 88, 320),
(26, 'Kiểm thử phần mềm (Software Testing)', 'Các loại kiểm thử Unit Test, Integration Test và QA.', '/storage/docs/software-testing.pdf', 'Giáo trình', 'Công nghệ thông tin', '2026-04-18 11:45:00', 2, 'approved', 35, 140),
(27, 'Đồ án Quản lý thư viện bằng C# Winform', 'Source code và báo cáo chi tiết đồ án cơ sở ngành.', '/storage/codes/library-management-csharp.zip', 'Đồ án', 'Lập trình C#', '2026-04-18 12:00:00', 3, 'approved', 76, 430),
(28, 'Kỹ thuật Social Engineering cơ bản', 'Nhận biết các hình thức lừa đảo qua mạng xã hội.', '/storage/docs/social-engineering.pdf', 'Tài liệu kỹ thuật', 'Cybersecurity', '2026-04-18 12:15:00', 1, 'rejected', 0, 90),
(29, 'Báo cáo thực tập tại Viettel Solutions', 'Kinh nghiệm làm việc tại vị trí Network Administrator.', '/storage/reports/bc-viettel.docx', 'Báo cáo', 'Kinh nghiệm thực tập', '2026-04-18 12:30:00', 5, 'approved', 24, 115),
(30, 'Lập trình Game với Unity 3D', 'Hướng dẫn làm game platformer đơn giản trong 7 ngày.', '/storage/docs/unity-3d-basics.pdf', 'Sách kỹ năng', 'Lập trình Game', '2026-04-18 12:45:00', 8, 'approved', 61, 290),
(31, 'Tài liệu học SQL Server nâng cao', 'Stored Procedures, Triggers và View trong quản lý dữ liệu.', '/storage/docs/sql-server-advanced.pdf', 'Tài liệu kỹ thuật', 'Công nghệ thông tin', '2026-04-18 13:00:00', 2, 'approved', 53, 190),
(32, 'Mẫu CV cho sinh viên IT mới ra trường', 'Top 10 mẫu CV chuyên nghiệp thu hút nhà tuyển dụng.', '/storage/docs/it-cv-samples.zip', 'Tài liệu kỹ thuật', 'Kỹ năng mềm', '2026-04-18 13:15:00', 4, 'approved', 320, 1100),
(33, 'Hướng dẫn Setup Box Phone Farm', 'Cách kết nối và quản lý hàng loạt điện thoại qua ADB.', '/storage/docs/phone-farm-setup.pdf', 'Hướng dẫn', 'Công nghệ', '2026-04-18 13:30:00', 6, 'approved', 185, 920),
(34, 'Giáo trình Xác suất thống kê', 'Công thức và các dạng bài tập giải chi tiết.', '/storage/docs/xac-suat-thong-ke.pdf', 'Giáo trình', 'Toán học', '2026-04-18 13:45:00', 7, 'approved', 145, 520),
(35, 'Phân tích thuật toán mã hóa AES', 'Cơ chế hoạt động và ứng dụng trong bảo mật thông tin.', '/storage/docs/aes-encryption-analysis.pdf', 'Tài liệu kỹ thuật', 'An toàn thông tin', '2026-04-18 14:00:00', 5, 'approved', 28, 110),
(36, 'Tiểu luận Tư tưởng Hồ Chí Minh', 'Vận dụng tư tưởng vào việc phát triển kinh tế số.', '/storage/docs/tieu-luan-tutuong.docx', 'Tiểu luận', 'Lý luận chính trị', '2026-04-18 14:15:00', 9, 'approved', 65, 240),
(37, 'Sách trắng về Blockchain 2026', 'Tương lai của Web3 và tài chính phi tập trung (DeFi).', '/storage/docs/blockchain-whitepaper.pdf', 'Báo cáo', 'Công nghệ', '2026-04-18 14:30:00', 10, 'approved', 18, 150),
(38, 'Docker cho người bắt đầu', 'Container hóa ứng dụng và triển khai lên server aaPanel.', '/storage/docs/docker-basic.pdf', 'Tài liệu kỹ thuật', 'Hệ điều hành', '2026-04-18 14:45:00', 6, 'approved', 92, 380),
(39, 'Đề thi tiếng Anh chuyên ngành IT', 'Từ vựng và cấu trúc thường gặp trong tài liệu kỹ thuật.', '/storage/exams/english-for-it.pdf', 'Tài liệu ôn thi', 'Ngoại ngữ', '2026-04-18 15:00:00', 4, 'approved', 112, 430),
(40, 'Script quét lỗ hổng SQL Injection', 'Công cụ hỗ trợ pentest ứng dụng web đơn giản.', '/storage/scripts/sql-scanner.py', 'Công cụ', 'Cybersecurity', '2026-04-18 15:15:00', 1, 'approved', 74, 310),
(41, 'Giáo trình Vi xử lý và Vi điều khiển', 'Tìm hiểu kiến trúc 8051 và lập trình Assembly.', '/storage/docs/microprocessor.pdf', 'Giáo trình', 'Điện tử viễn thông', '2026-04-18 15:30:00', 8, 'approved', 41, 160),
(42, 'Học máy (Machine Learning) cơ bản', 'Giới thiệu về Linear Regression và Classification.', '/storage/docs/machine-learning-intro.pdf', 'Giáo trình', 'Trí tuệ nhân tạo', '2026-04-18 15:45:00', 10, 'approved', 29, 210),
(43, 'Đồ án App tìm trọ cho sinh viên', 'Full code Flutter và Backend Node.js cho UniStay.', '/storage/codes/unistay-full-source.zip', 'Đồ án', 'Lập trình di động', '2026-04-18 16:00:00', 6, 'pending', 0, 56),
(44, 'Kế hoạch Marketing cho dịch vụ Kho Sub Re', 'Chiến lược tăng trưởng user thông qua SEO và Facebook Ads.', '/storage/reports/marketing-khosubre.pdf', 'Báo cáo', 'Marketing', '2026-04-18 16:15:00', 6, 'approved', 45, 200),
(45, 'Cấu trúc dữ liệu và giải thuật với Python', 'Triển khai Linked List, Binary Tree bằng Python.', '/storage/docs/dsal-python.pdf', 'Giáo trình', 'Lập trình Python', '2026-04-18 16:30:00', 7, 'approved', 68, 280),
(46, 'Hướng dẫn sử dụng Wireshark', 'Phân tích gói tin và bắt log hệ thống mạng.', '/storage/docs/wireshark-tutorial.pdf', 'Hướng dẫn', 'An toàn thông tin', '2026-04-18 16:45:00', 5, 'approved', 105, 490),
(47, 'Báo cáo thực tập tại VNPT chi nhánh Quy Nhơn', 'Quản trị hệ thống cáp quang và hỗ trợ kỹ thuật.', '/storage/reports/bc-vnpt-quynhon.docx', 'Báo cáo', 'Kinh nghiệm thực tập', '2026-04-18 17:00:00', 2, 'approved', 19, 95),
(48, 'Lập trình C++ từ con số 0', 'Tài liệu dành cho sinh viên năm nhất bắt đầu học code.', '/storage/docs/cpp-from-zero.pdf', 'Sách kỹ năng', 'Lập trình C++', '2026-04-18 17:15:00', 7, 'approved', 215, 950),
(49, 'Tối ưu hóa SEO cho website bán hàng', 'Cách đưa website lên Top 1 Google bền vững.', '/storage/docs/seo-optimization.pdf', 'Sách kỹ năng', 'Marketing', '2026-04-18 17:30:00', 9, 'approved', 47, 210),
(50, 'Giáo trình Pháp luật đại cương', 'Tổng hợp kiến thức pháp luật dành cho sinh viên.', '/storage/docs/phap-luat-dai-cuong.pdf', 'Giáo trình', 'Khoa học xã hội', '2026-04-18 17:45:00', 4, 'approved', 134, 480),
(51, 'Hướng dẫn lập trình GPIO trên BW16', 'Sử dụng chip Realtek RTL8720DN cho dự án IoT.', '/storage/docs/bw16-gpio-programming.pdf', 'Hướng dẫn', 'Điện tử viễn thông', '2026-04-18 18:00:00', 1, 'approved', 38, 145),
(52, 'Phân tích dòng tiền doanh nghiệp sản xuất', 'Bài tập mẫu môn Tài chính doanh nghiệp.', '/storage/docs/cash-flow-analysis.pdf', 'Tài liệu kỹ thuật', 'Kế toán - Tài chính', '2026-04-18 18:15:00', 9, 'approved', 22, 105),
(53, 'Script auto check Live/Die Proxy', 'Công cụ lọc proxy chất lượng cho Marketing.', '/storage/scripts/proxy-checker.py', 'Công cụ', 'Marketing', '2026-04-18 18:30:00', 6, 'approved', 156, 620),
(54, 'Kiến trúc Microservices với Spring Boot', 'Xây dựng hệ thống phân tán hiệu năng cao.', '/storage/docs/spring-boot-microservices.pdf', 'Tài liệu kỹ thuật', 'Lập trình Java', '2026-04-18 18:45:00', 8, 'approved', 44, 215),
(55, 'Sổ tay quản trị VPS Linux', 'Các lệnh CLI cần thiết để quản lý Ubuntu Server.', '/storage/docs/linux-vps-handbook.pdf', 'Hướng dẫn', 'Hệ điều hành', '2026-04-18 19:00:00', 6, 'approved', 112, 530),
(56, 'Đề thi trắc nghiệm Kiến trúc máy tính', 'Bộ 100 câu hỏi ôn tập về CPU, RAM, I/O.', '/storage/exams/computer-architecture.pdf', 'Tài liệu ôn thi', 'Công nghệ thông tin', '2026-04-18 19:15:00', 7, 'approved', 89, 310),
(57, 'Hướng dẫn dùng module NRF24L01 với Flipper Zero', 'Sniffing và Replay tấn công chuột không dây.', '/storage/docs/flipper-nrf24-tutorial.pdf', 'Hướng dẫn', 'Cybersecurity', '2026-04-18 19:30:00', 1, 'approved', 178, 840),
(58, 'Mẫu báo cáo thực tập tại Ngân hàng BIDV', 'Dành cho sinh viên chuyên ngành Tài chính - Ngân hàng.', '/storage/reports/bc-bidv.docx', 'Báo cáo', 'Kinh nghiệm thực tập', '2026-04-18 19:45:00', 9, 'approved', 31, 150),
(59, 'Lập trình hướng đối tượng (OOP) với C++', 'Các tính chất Đóng gói, Kế thừa, Đa hình.', '/storage/docs/oop-cpp-guide.pdf', 'Giáo trình', 'Lập trình C++', '2026-04-18 20:00:00', 7, 'approved', 72, 290),
(60, 'Báo cáo dự án UniStay - Giai đoạn 1', 'Phân tích thiết kế hệ thống và Database Schema.', '/storage/reports/unistay-phase1.pdf', 'Báo cáo', 'Đồ án', '2026-04-18 20:15:00', 6, 'approved', 50, 210);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `downloads`
--

CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `download_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `downloads`
--

INSERT INTO `downloads` (`download_id`, `user_id`, `document_id`, `download_time`) VALUES
(1, 3, 1, '2023-10-01 09:15:00'),
(2, 4, 1, '2023-10-02 14:20:30'),
(3, 2, 2, '2023-10-05 20:10:00'),
(4, 5, 2, '2023-10-10 08:45:12'),
(5, 4, 3, '2023-10-12 11:30:00'),
(6, 2, 1, '2026-04-10 08:30:00'),
(7, 4, 1, '2026-04-12 14:20:00'),
(8, 3, 4, '2026-04-15 09:00:00'),
(9, 2, 2, '2026-04-16 10:15:00'),
(10, 3, 2, '2026-04-16 11:45:00'),
(11, 6, 9, '2026-04-18 09:00:00'),
(12, 7, 1, '2026-04-18 09:15:00'),
(13, 8, 7, '2026-04-18 09:30:00'),
(14, 2, 6, '2026-04-18 10:00:00'),
(15, 3, 8, '2026-04-18 10:30:00'),
(16, 10, 1, '2026-04-18 11:00:00'),
(17, 10, 7, '2026-04-18 11:15:00'),
(18, 5, 6, '2026-04-18 12:00:00'),
(19, 4, 9, '2026-04-18 13:00:00'),
(20, 1, 6, '2026-04-18 14:00:00'),
(21, 6, 2, '2026-04-19 08:20:00'),
(22, 7, 7, '2026-04-19 08:45:00'),
(23, 8, 9, '2026-04-19 09:10:00'),
(24, 9, 3, '2026-04-19 09:30:00'),
(25, 2, 8, '2026-04-19 10:00:00'),
(26, 3, 6, '2026-04-19 11:15:00'),
(27, 4, 1, '2026-04-19 13:40:00'),
(28, 5, 7, '2026-04-19 14:20:00'),
(29, 10, 9, '2026-04-19 15:00:00'),
(30, 6, 8, '2026-04-19 16:30:00'),
(31, 7, 6, '2026-04-20 07:50:00'),
(32, 8, 1, '2026-04-20 08:15:00'),
(33, 9, 2, '2026-04-20 08:40:00'),
(34, 1, 7, '2026-04-20 09:00:00'),
(35, 2, 9, '2026-04-20 10:20:00'),
(36, 3, 1, '2026-04-20 11:45:00'),
(37, 4, 6, '2026-04-20 13:10:00'),
(38, 5, 8, '2026-04-20 14:50:00'),
(39, 10, 2, '2026-04-20 15:30:00'),
(40, 6, 7, '2026-04-20 16:15:00'),
(41, 7, 9, '2026-04-21 08:10:00'),
(42, 8, 6, '2026-04-21 09:00:00'),
(43, 9, 1, '2026-04-21 09:45:00'),
(44, 1, 8, '2026-04-21 10:30:00'),
(45, 2, 7, '2026-04-21 11:15:00'),
(46, 3, 9, '2026-04-21 13:50:00'),
(47, 4, 2, '2026-04-21 14:25:00'),
(48, 5, 1, '2026-04-21 15:10:00'),
(49, 10, 6, '2026-04-21 16:00:00'),
(50, 6, 3, '2026-04-21 17:30:00'),
(51, 7, 8, '2026-04-22 07:45:00'),
(52, 8, 2, '2026-04-22 08:00:00'),
(53, 9, 7, '2026-04-22 08:30:00'),
(54, 1, 9, '2026-04-22 09:15:00'),
(55, 2, 1, '2026-04-22 10:00:00'),
(56, 3, 7, '2026-04-22 11:00:00'),
(57, 4, 8, '2026-04-22 13:20:00'),
(58, 5, 9, '2026-04-22 14:40:00'),
(59, 10, 8, '2026-04-22 15:10:00'),
(60, 6, 1, '2026-04-22 16:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `point_history`
--

CREATE TABLE `point_history` (
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points_change` int(11) NOT NULL,
  `action_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `point_history`
--

INSERT INTO `point_history` (`point_id`, `user_id`, `points_change`, `action_type`, `created_at`) VALUES
(1, 2, 50, 'upload', '2023-09-25 10:00:00'),
(2, 3, -10, 'download', '2023-10-01 09:15:00'),
(3, 4, -10, 'download', '2023-10-02 14:20:30'),
(4, 3, 50, 'upload', '2023-10-03 16:00:00'),
(5, 2, -10, 'download', '2023-10-05 20:10:00'),
(6, 3, 100, 'upload', '2026-04-01 10:00:00'),
(7, 2, -20, 'download', '2026-04-10 08:30:00'),
(8, 1, 50, 'upload', '2026-04-12 15:00:00'),
(9, 4, -20, 'download', '2026-04-12 14:20:00'),
(10, 6, 500, 'bonus', '2026-04-17 15:45:00'),
(11, 7, 100, 'registration_bonus', '2026-04-17 15:50:00'),
(12, 8, 100, 'registration_bonus', '2026-04-17 15:55:00'),
(13, 1, 100, 'upload', '2026-04-18 08:00:00'),
(14, 6, 100, 'upload', '2026-04-18 08:15:00'),
(15, 1, 100, 'upload', '2026-04-18 08:30:00'),
(16, 8, 50, 'upload', '2026-04-18 08:45:00'),
(17, 7, 50, 'upload', '2026-04-18 09:00:00'),
(18, 6, -20, 'download', '2026-04-18 09:00:00'),
(19, 7, -10, 'download', '2026-04-18 09:15:00'),
(20, 8, -10, 'download', '2026-04-18 09:30:00'),
(21, 2, -20, 'download', '2026-04-18 10:00:00'),
(22, 3, -20, 'download', '2026-04-18 10:30:00'),
(23, 10, 50, 'upload', '2026-04-18 10:00:00'),
(24, 10, -20, 'download', '2026-04-18 11:00:00'),
(25, 1, 100, 'upload', '2026-04-18 10:15:00'),
(26, 8, 100, 'upload', '2026-04-18 10:30:00'),
(27, 4, -10, 'download', '2026-04-18 13:00:00'),
(28, 6, 100, 'upload', '2026-04-18 11:15:00'),
(29, 10, 50, 'upload', '2026-04-18 14:30:00'),
(30, 6, -10, 'download', '2026-04-19 08:20:00'),
(31, 7, -20, 'download', '2026-04-19 08:45:00'),
(32, 8, -20, 'download', '2026-04-19 09:10:00'),
(33, 9, -10, 'download', '2026-04-19 09:30:00'),
(34, 2, -10, 'download', '2026-04-19 10:00:00'),
(35, 3, -20, 'download', '2026-04-19 11:15:00'),
(36, 4, -10, 'download', '2026-04-19 13:40:00'),
(37, 5, -20, 'download', '2026-04-19 14:20:00'),
(38, 10, -20, 'download', '2026-04-19 15:00:00'),
(39, 6, -10, 'download', '2026-04-19 16:30:00'),
(40, 7, -20, 'download', '2026-04-20 07:50:00'),
(41, 8, -10, 'download', '2026-04-20 08:15:00'),
(42, 9, -20, 'download', '2026-04-20 08:40:00'),
(43, 1, -20, 'download', '2026-04-20 09:00:00'),
(44, 2, -10, 'download', '2026-04-20 10:20:00'),
(45, 3, -10, 'download', '2026-04-20 11:45:00'),
(46, 4, -20, 'download', '2026-04-20 13:10:00'),
(47, 5, -20, 'download', '2026-04-20 14:50:00'),
(48, 10, -20, 'download', '2026-04-20 15:30:00'),
(49, 6, -10, 'download', '2026-04-20 16:15:00'),
(50, 7, -20, 'download', '2026-04-21 08:10:00'),
(51, 8, -10, 'download', '2026-04-21 09:00:00'),
(52, 9, -10, 'download', '2026-04-21 09:45:00'),
(53, 1, -20, 'download', '2026-04-21 10:30:00'),
(54, 2, -10, 'download', '2026-04-21 11:15:00'),
(55, 3, -20, 'download', '2026-04-21 13:50:00'),
(56, 4, -20, 'download', '2026-04-21 14:25:00'),
(57, 5, -10, 'download', '2026-04-21 15:10:00'),
(58, 10, -20, 'download', '2026-04-21 16:00:00'),
(59, 6, -10, 'download', '2026-04-21 17:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`review_id`, `document_id`, `admin_id`, `status`, `review_date`, `note`) VALUES
(1, 1, 1, 'approved', '2026-04-17 15:38:18', 'Tài liệu chất lượng tốt, trình bày rõ ràng.'),
(2, 2, 1, 'approved', '2026-04-17 15:38:18', 'Đầy đủ nội dung theo yêu cầu.'),
(3, 3, 1, 'approved', '2026-04-17 15:38:18', 'Đã kiểm tra định dạng, hợp lệ.'),
(4, 5, 1, 'rejected', '2026-04-17 15:38:18', 'Tài liệu bị trùng lặp hoặc chứa nội dung không phù hợp.'),
(5, 1, 1, 'approved', '2026-04-17 15:40:13', 'Code sạch, có hướng dẫn cấu hình chi tiết trong file README.'),
(6, 2, 1, 'approved', '2026-04-17 15:40:13', 'Tài liệu chuẩn từ nhà xuất bản giáo dục, hình ảnh rõ nét.'),
(7, 3, 1, 'approved', '2026-04-17 15:40:13', 'Nội dung bám sát đề thi thực tế năm nay.'),
(8, 4, 1, 'approved', '2026-04-17 15:40:13', 'Bộ script rất hữu ích cho các bạn đang nghiên cứu Flipper Zero.'),
(9, 4, 1, 'approved', '2026-04-18 10:30:00', 'Tài liệu cơ bản tốt, phù hợp cho người mới.'),
(10, 10, 6, 'approved', '2026-04-18 11:00:00', 'Báo cáo tài chính chi tiết, số liệu chuẩn.'),
(11, 11, 1, 'approved', '2026-04-18 11:15:00', 'Nội dung thực hành NRF24L01 rất chi tiết.'),
(12, 12, 6, 'approved', '2026-04-18 11:30:00', 'Tài liệu tối ưu Laravel rất hữu ích cho dev.'),
(13, 13, 1, 'approved', '2026-04-18 12:00:00', 'Script BadUSB sạch, đã test trên Digispark.'),
(14, 14, 6, 'approved', '2026-04-18 13:00:00', 'Giáo trình Python chất lượng cao.'),
(15, 15, 1, 'approved', '2026-04-18 13:30:00', 'Đề thi Java sát với chương trình học.'),
(16, 16, 6, 'pending', '2026-04-18 14:00:00', 'Đang chờ kiểm tra file Figma của UniStay.'),
(17, 17, 1, 'approved', '2026-04-18 14:30:00', 'Hướng dẫn Nginx trình bày dễ hiểu.'),
(18, 18, 6, 'approved', '2026-04-18 15:00:00', 'Tài liệu ôn thi Triết học đầy đủ các chương.'),
(19, 19, 1, 'approved', '2026-04-18 15:30:00', 'Báo cáo BĐS có tầm nhìn tốt.'),
(20, 20, 6, 'approved', '2026-04-18 16:00:00', 'Firmware Flipper Zero hoạt động ổn định.'),
(21, 21, 1, 'approved', '2026-04-18 16:30:00', 'Tài liệu Kotlin/Android cập nhật mới nhất.'),
(22, 22, 6, 'approved', '2026-04-18 17:00:00', 'Cơ sở dữ liệu NoSQL trình bày logic.'),
(23, 23, 1, 'approved', '2026-04-18 17:30:00', 'Tài liệu TOEIC có mẹo giải đề rất hay.'),
(24, 24, 6, 'approved', '2026-04-18 18:00:00', 'Script ADB Marketing chạy tốt trên box phone.'),
(25, 25, 1, 'approved', '2026-04-18 18:30:00', 'Mạng máy tính cơ bản phù hợp cho sinh viên.'),
(26, 26, 6, 'approved', '2026-04-18 19:00:00', 'Kiểm thử phần mềm đầy đủ các case.'),
(27, 27, 1, 'approved', '2026-04-18 19:30:00', 'Source code Winform quản lý thư viện chạy mượt.'),
(28, 28, 6, 'rejected', '2026-04-18 20:00:00', 'Nội dung Social Engineering chứa kỹ thuật tấn công nhạy cảm.'),
(29, 29, 1, 'approved', '2026-04-19 08:30:00', 'Báo cáo thực tập Viettel trình bày đúng chuẩn.'),
(30, 30, 6, 'approved', '2026-04-19 09:00:00', 'Hướng dẫn Unity làm game platformer rất hay.'),
(31, 31, 1, 'approved', '2026-04-19 09:30:00', 'Tài liệu SQL Server nâng cao có ví dụ thực tế.'),
(32, 32, 6, 'approved', '2026-04-19 10:00:00', 'Mẫu CV IT thiết kế đẹp, hiện đại.'),
(33, 33, 1, 'approved', '2026-04-19 10:30:00', 'Setup Box Phone Farm hướng dẫn cực kỳ tỉ mỉ.'),
(34, 34, 6, 'approved', '2026-04-19 11:00:00', 'Xác suất thống kê có bài giải chi tiết.'),
(35, 35, 1, 'approved', '2026-04-19 11:30:00', 'Phân tích AES chuyên sâu, tính học thuật cao.'),
(36, 36, 6, 'approved', '2026-04-19 13:00:00', 'Tiểu luận Tư tưởng HCM liên hệ thực tế tốt.'),
(37, 37, 1, 'approved', '2026-04-19 14:00:00', 'Báo cáo Blockchain cập nhật xu hướng 2026.'),
(38, 38, 6, 'approved', '2026-04-19 15:00:00', 'Docker cho người mới bắt đầu rất dễ học.'),
(39, 39, 1, 'approved', '2026-04-19 16:00:00', 'Tiếng Anh chuyên ngành IT đầy đủ từ vựng.'),
(40, 40, 6, 'approved', '2026-04-19 17:00:00', 'Script Pentest SQL Injection chỉ nên dùng cho nghiên cứu.'),
(41, 41, 1, 'approved', '2026-04-20 08:30:00', 'Giáo trình Vi xử lý trình bày rất khoa học.'),
(42, 42, 6, 'approved', '2026-04-20 09:00:00', 'Machine Learning cơ bản, ví dụ dễ hiểu.'),
(43, 43, 1, 'pending', '2026-04-20 10:00:00', 'Đang kiểm tra bảo mật source code UniStay.'),
(44, 44, 6, 'approved', '2026-04-20 11:00:00', 'Kế hoạch Marketing Kho Sub Re rất thực tế.'),
(45, 45, 1, 'approved', '2026-04-20 13:00:00', 'DSAL với Python trình bày code sạch.'),
(46, 46, 6, 'approved', '2026-04-20 14:00:00', 'Wireshark tutorial có hình ảnh minh họa rõ nét.'),
(47, 47, 1, 'approved', '2026-04-20 15:00:00', 'Báo cáo VNPT trình bày chuyên nghiệp.'),
(48, 48, 6, 'approved', '2026-04-20 16:00:00', 'C++ từ số 0 rất phù hợp cho năm nhất.'),
(49, 49, 1, 'approved', '2026-04-21 08:30:00', 'SEO Optimization cập nhật thuật toán mới.'),
(50, 50, 6, 'approved', '2026-04-21 09:00:00', 'Pháp luật đại cương tóm tắt rất dễ học.'),
(51, 51, 1, 'approved', '2026-04-21 10:00:00', 'BW16 GPIO tutorial rất hiếm và hữu ích.'),
(52, 52, 6, 'approved', '2026-04-21 11:00:00', 'Phân tích dòng tiền đúng chuẩn kế toán.'),
(53, 53, 1, 'approved', '2026-04-21 13:00:00', 'Script Proxy Checker chạy rất nhanh.'),
(54, 54, 6, 'approved', '2026-04-21 14:00:00', 'Microservices với Spring Boot rất chuyên sâu.'),
(55, 55, 1, 'approved', '2026-04-21 15:00:00', 'Sổ tay VPS Linux đầy đủ các command cần thiết.'),
(56, 56, 6, 'approved', '2026-04-21 16:00:00', 'Đề thi Kiến trúc máy tính sát thực tế.'),
(57, 57, 1, 'approved', '2026-04-22 08:30:00', 'Flipper NRF24 tutorial rất thú vị.'),
(58, 58, 6, 'approved', '2026-04-22 09:00:00', 'Báo cáo BIDV có chiều sâu chuyên môn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`, `points`) VALUES
(1, 'nguyen_van_minh', 'minh.nguyen@gmail.com', 'hash_password_123', 'admin', '2026-04-17 15:38:18', 500),
(2, 'tran_thi_lan', 'lan.tran88@yahoo.com', 'hash_password_456', 'user', '2026-04-17 15:38:18', 150),
(3, 'le_quang_duy', 'duyle_it@outlook.com', 'hash_password_789', 'user', '2026-04-17 15:38:18', 80),
(4, 'pham_minh_anh', 'minhanh_academic@gmail.com', 'hash_password_abc', 'user', '2026-04-17 15:38:18', 220),
(5, 'hoang_long_99', 'longhoang.dev@gmail.com', 'hash_password_xyz', 'user', '2026-04-17 15:38:18', 45),
(6, 'huy_ceo_khosubre', 'admin@khosubre.vn', 'hash_secure_pass_2026', 'admin', '2026-04-17 15:40:13', 2000),
(7, 'it_student_k28', 'quocanh.it@student.edu.vn', 'hash_pass_3344', 'user', '2026-04-17 15:40:13', 150),
(8, 'nguyen_van_a_dev', 'vana.backend@gmail.com', 'hash_pass_5566', 'user', '2026-04-17 15:40:13', 420),
(9, 'le_thi_binh_kt', 'binhkt99@gmail.com', 'hash_pass_7788', 'user', '2026-04-17 15:40:13', 85),
(10, 'university_official', 'hou_library@edu.vn', 'hash_pass_9900', 'user', '2026-04-17 15:40:13', 5000),
(11, 'quang_huy_dev', 'huy.dev99@gmail.com', 'hash_pass_8899', 'user', '2026-04-18 08:00:00', 350),
(12, 'minh_tuan_iot', 'tuan.iot.hust@edu.vn', 'hash_pass_1122', 'user', '2026-04-18 08:15:00', 120),
(13, 'thu_thao_kt', 'thao.kt88@gmail.com', 'hash_pass_3344', 'user', '2026-04-18 08:30:00', 95),
(14, 'hoang_nam_security', 'nam.pentest@cyber.vn', 'hash_pass_5566', 'user', '2026-04-18 08:45:00', 1500),
(15, 'anh_tuan_vnu', 'tuananh.vnu@student.edu.vn', 'hash_pass_7788', 'user', '2026-04-18 09:00:00', 210),
(16, 'ngoc_mai_design', 'mai.uxui@gmail.com', 'hash_pass_9900', 'user', '2026-04-18 09:15:00', 450),
(17, 'duy_anh_backend', 'duyanh.laravel@gmail.com', 'hash_pass_aabb', 'user', '2026-04-18 09:30:00', 600),
(18, 'thanh_hang_hr', 'hang.hr.tech@gmail.com', 'hash_pass_ccdd', 'user', '2026-04-18 09:45:00', 80),
(19, 'viet_bach_ai', 'bach.ai.lab@gmail.com', 'hash_pass_eeff', 'user', '2026-04-18 10:00:00', 1200),
(20, 'gia_bao_embedded', 'bao.fpt@student.edu.vn', 'hash_pass_gghh', 'user', '2026-04-18 10:15:00', 310),
(21, 'thuy_tien_marketing', 'tien.mkt@khosubre.vn', 'hash_pass_iijj', 'user', '2026-04-18 10:30:00', 850),
(22, 'duc_thanh_pro', 'thanh.thanh@gmail.com', 'hash_pass_kkll', 'user', '2026-04-18 10:45:00', 150),
(23, 'lan_anh_k27', 'lananh.it@student.edu.vn', 'hash_pass_mmnn', 'user', '2026-04-18 11:00:00', 200),
(24, 'trong_hieu_sys', 'hieu.linux@gmail.com', 'hash_pass_oopp', 'user', '2026-04-18 11:15:00', 420),
(25, 'khanh_ly_academic', 'ly.academic@edu.vn', 'hash_pass_qqrr', 'user', '2026-04-18 11:30:00', 500),
(26, 'phuong_nam_dev', 'nam.flutter@gmail.com', 'hash_pass_sstt', 'user', '2026-04-18 11:45:00', 330),
(27, 'minh_khue_law', 'khue.lawyer@gmail.com', 'hash_pass_uuvv', 'user', '2026-04-18 12:00:00', 120),
(28, 'the_vinh_data', 'vinh.data@gmail.com', 'hash_pass_wwxx', 'user', '2026-04-18 12:15:00', 700),
(29, 'quoc_cuong_mkt', 'cuong.ads@gmail.com', 'hash_pass_yyzz', 'user', '2026-04-18 12:30:00', 280),
(30, 'bao_tram_toeic', 'tram.english@gmail.com', 'hash_pass_123a', 'user', '2026-04-18 12:45:00', 550),
(31, 'huu_phuoc_box', 'phuoc.phonefarm@gmail.com', 'hash_pass_456b', 'user', '2026-04-18 13:00:00', 1100),
(32, 'thanh_truc_fpt', 'truc.it@fpt.edu.vn', 'hash_pass_789c', 'user', '2026-04-18 13:15:00', 190),
(33, 'van_tai_code', 'tai.backend@gmail.com', 'hash_pass_000d', 'user', '2026-04-18 13:30:00', 410),
(34, 'dieu_linh_kt', 'linh.binhkt@gmail.com', 'hash_pass_111e', 'user', '2026-04-18 13:45:00', 145),
(35, 'hoang_khai_hacker', 'khai.whitehat@gmail.com', 'hash_pass_222f', 'user', '2026-04-18 14:00:00', 2500),
(36, 'minh_triet_philosophy', 'triet.triethoc@gmail.com', 'hash_pass_333g', 'user', '2026-04-18 14:15:00', 300),
(37, 'ngoc_han_startup', 'han.ceo@gmail.com', 'hash_pass_444h', 'user', '2026-04-18 14:30:00', 900),
(38, 'tuan_kiet_unity', 'kiet.game@gmail.com', 'hash_pass_555i', 'user', '2026-04-18 14:45:00', 320),
(39, 'tuyet_mai_edu', 'mai.teacher@edu.vn', 'hash_pass_666j', 'user', '2026-04-18 15:00:00', 1500),
(40, 'quoc_khanh_vps', 'khanh.vps@gmail.com', 'hash_pass_777k', 'user', '2026-04-18 15:15:00', 460),
(41, 'thanh_tam_cv', 'tam.hr@gmail.com', 'hash_pass_888l', 'user', '2026-04-18 15:30:00', 60),
(42, 'dang_khoa_iot', 'khoa.iot@gmail.com', 'hash_pass_999m', 'user', '2026-04-18 15:45:00', 215),
(43, 'hong_ngoc_fin', 'ngoc.finance@gmail.com', 'hash_pass_aa11', 'user', '2026-04-18 16:00:00', 800),
(44, 'anh_khoa_k28', 'khoa.it28@student.edu.vn', 'hash_pass_bb22', 'user', '2026-04-18 16:15:00', 130),
(45, 'minh_nguyet_web', 'nguyet.frontend@gmail.com', 'hash_pass_cc33', 'user', '2026-04-18 16:30:00', 540),
(46, 'duc_anh_pentest', 'anh.cyber@gmail.com', 'hash_pass_dd44', 'user', '2026-04-18 16:45:00', 1800),
(47, 'thu_trang_admin', 'trang.admin@khosubre.vn', 'hash_pass_admin_123', 'admin', '2026-04-18 17:00:00', 2000),
(48, 'thai_son_java', 'son.java@gmail.com', 'hash_pass_ff66', 'user', '2026-04-18 17:15:00', 390),
(49, 'my_linh_report', 'linh.report@gmail.com', 'hash_pass_gg77', 'user', '2026-04-18 17:30:00', 220),
(50, 'van_dung_db', 'dung.database@gmail.com', 'hash_pass_hh88', 'user', '2026-04-18 17:45:00', 610),
(51, 'phuong_thao_mkt', 'thao.marketing@gmail.com', 'hash_pass_ii99', 'user', '2026-04-18 18:00:00', 400),
(52, 'tan_phat_arduino', 'phat.iot@gmail.com', 'hash_pass_jj00', 'user', '2026-04-18 18:15:00', 180),
(53, 'quynh_chi_ielts', 'chi.ielts@gmail.com', 'hash_pass_kk11', 'user', '2026-04-18 18:30:00', 750),
(54, 'hoang_long_backend', 'long.backend@gmail.com', 'hash_pass_ll22', 'user', '2026-04-18 18:45:00', 430),
(55, 'bao_anh_sys', 'anh.ubuntu@gmail.com', 'hash_pass_mm33', 'user', '2026-04-18 19:00:00', 520),
(56, 'minh_duc_network', 'duc.cisco@gmail.com', 'hash_pass_nn44', 'user', '2026-04-18 19:15:00', 310),
(57, 'kieu_oanh_kt', 'oanh.acc@gmail.com', 'hash_pass_oo55', 'user', '2026-04-18 19:30:00', 110),
(58, 'hai_dang_flipper', 'dang.flipper@gmail.com', 'hash_pass_pp66', 'user', '2026-04-18 19:45:00', 1250),
(59, 'thanh_huong_edu', 'huong.edu@student.edu.vn', 'hash_pass_qq77', 'user', '2026-04-18 20:00:00', 240),
(60, 'trung_kien_code', 'kien.dev@gmail.com', 'hash_pass_rr88', 'user', '2026-04-18 20:15:00', 480);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `idx_documents_user_id` (`user_id`),
  ADD KEY `idx_documents_category` (`category`),
  ADD KEY `idx_documents_subject` (`subject`),
  ADD KEY `idx_documents_status` (`status`);

--
-- Chỉ mục cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `idx_downloads_user_id` (`user_id`),
  ADD KEY `idx_downloads_document_id` (`document_id`);

--
-- Chỉ mục cho bảng `point_history`
--
ALTER TABLE `point_history`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `idx_point_history_user_id` (`user_id`),
  ADD KEY `idx_point_history_action_type` (`action_type`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `idx_reviews_document_id` (`document_id`),
  ADD KEY `idx_reviews_admin_id` (`admin_id`),
  ADD KEY `idx_reviews_status` (`status`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `downloads`
--
ALTER TABLE `downloads`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `point_history`
--
ALTER TABLE `point_history`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `fk_downloads_document` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_downloads_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `point_history`
--
ALTER TABLE `point_history`
  ADD CONSTRAINT `fk_point_history_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_admin` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reviews_document` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
