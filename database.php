<?php 
// 1. Khai báo thông tin cấu hình
$servername = "localhost"; // Sửa severName thành servername cho chuẩn
$username = 'root';        // Sửa userName thành username (viết thường hết cho đồng bộ)
$password = '';
$dbname = 'document_system';

// 2. Khởi tạo kết nối
// Chú ý: Các biến truyền vào đây phải khớp chính xác với biến đã khai báo ở trên
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Kiểm tra kết nối
if($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 4. Thiết lập bảng mã UTF-8 để hiển thị tiếng Việt không bị lỗi font
$conn->set_charset("utf8mb4"); 
?>