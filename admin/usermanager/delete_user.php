<?php
// 1. Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "document_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}

// 2. Kiểm tra ID và thực hiện xóa
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql = "DELETE FROM users WHERE user_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Đã xóa người dùng thành công!'); window.location='users.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa: " . $conn->error . "'); window.location='users.php';</script>";
    }
} else {
    header("Location: users.php");
}

$conn->close();
?>