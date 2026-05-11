<?php
// 1. Kết nối cơ sở dữ liệu với Port 3307
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "document_system";
$port = 3307; // Cấu hình port 3307 theo yêu cầu

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// 2. NHẬN ID TỪ METHOD GET ĐỂ ĐỔ DỮ LIỆU VÀO FORM
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Người dùng không tồn tại!");
    }
}

// 3. XỬ LÝ CẬP NHẬT KHI NHẤN NÚT LƯU (METHOD POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $points = $_POST['points'];

    // Câu lệnh SQL cập nhật thông tin
    $update_query = "UPDATE users SET 
                        full_name = '$full_name', 
                        email = '$email', 
                        role = '$role', 
                        status = '$status', 
                        points = '$points' 
                    WHERE user_id = $user_id";

    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location='users.php';</script>";
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thành viên</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Container */
        .form-container {
            width: 420px;
            margin: 60px auto;
            padding: 25px 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Title */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Group */
        .form-group {
            margin-bottom: 15px;
        }

        /* Label */
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        /* Input & Select */
        input, select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        /* Focus effect */
        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }

        /* Disabled input */
        input[disabled] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        /* Button */
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Hover button */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,123,255,0.4);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Chỉnh sửa người dùng</h2>
    <form method="POST">
        <!-- Input ẩn để giữ ID khi submit form -->
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">

        <div class="form-group">
            <label>Tên đăng nhập:</label>
            <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
        </div>

        <div class="form-group">
            <label>Họ và tên:</label>
            <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <div class="form-group">
            <label>Vai trò:</label>
            <select name="role">
                <option value="user" <?php if($user['role'] == 'user') echo 'selected'; ?>>User</option>
                <option value="admin" <?php if($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Trạng thái:</label>
            <select name="status">
                <option value="active" <?php if($user['status'] == 'active') echo 'selected'; ?>>Kích hoạt</option>
                <option value="banned" <?php if($user['status'] == 'banned') echo 'selected'; ?>>Bị khóa</option>
            </select>
        </div>

        <div class="form-group">
            <label>Điểm tích lũy:</label>
            <input type="number" name="points" value="<?php echo htmlspecialchars($user['points']); ?>">
        </div>

        <button type="submit">Lưu thay đổi</button>
    </form>
</div>

</body>
</html>