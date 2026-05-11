<?php include '../access/module/db_connect.php'; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "document_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_nm = $_POST['username'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = $_POST['role'];
    $status = $_POST['status'];

    $check_sql = "SELECT username FROM users WHERE username = '$user_nm' OR email = '$email'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Tên đăng nhập hoặc Email đã tồn tại!');</script>";
    } else {
        $sql = "INSERT INTO users (username, full_name, email, password, role, status, created_at) 
                VALUES ('$user_nm', '$full_name', '$email', '$password', '$role', '$status', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Thêm người dùng thành công!'); window.location='users.php';</script>";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm thành viên mới</title>
    <style>
        body {
            margin: 0; padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            width: 450px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        h2 { text-align: center; color: #333; margin-bottom: 25px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus { border-color: #667eea; outline: none; }
        button {
            width: 100%;
            padding: 15px;
            background: #4318ff;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }
        button:hover { background: #3311cc; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #667eea; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Thêm người dùng mới</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Tên đăng nhập:</label>
            <input type="text" name="username" placeholder="Ví dụ: nguyenvana" required>
        </div>

        <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" name="full_name" placeholder="Nhập đầy đủ họ tên" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="email@example.com" required>
        </div>

        <div class="form-group">
            <label>Mật khẩu:</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Vai trò:</label>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Trạng thái:</label>
            <select name="status">
                <option value="active">Kích hoạt</option>
                <option value="banned">Khóa</option>
            </select>
        </div>

        <button type="submit">Xác nhận thêm</button>
        <a href="users.php" class="back-link">Quay lại danh sách</a>
    </form>
</div>

</body>
</html>