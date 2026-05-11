<?php
// Bắt đầu session để lưu trạng thái đăng nhập
session_start();

// Khởi tạo biến thông báo lỗi
$error = "";

// Kiểm tra xem người dùng có nhấn nút Đăng Nhập không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // LOGIC KIỂM TRA CƠ BẢN (Bạn có thể thay thế bằng truy vấn Database sau này)
    if (empty($email) || empty($password)) {
        $error = "Vui lòng nhập đầy đủ email và mật khẩu!";
    } else {
        // Ví dụ kiểm tra thử
        if ($email === "admin@st.qnu.edu.vn" && $password === "123456") {
            $_SESSION['user'] = $email;
            header("Location: index.php"); // Chuyển hướng đến trang chủ
            exit();
        } else {
            $error = "Email hoặc mật khẩu không chính xác.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | QNU Documents</title>
    <style>
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('../access/images/photo-1507842217343-583bb7270b66.avif') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex; justify-content: center; align-items: center;
        }
        .overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); z-index: 1;
        }
        .login-box {
            position: relative; z-index: 2;
            background: rgba(255, 255, 255, 0.98);
            padding: 40px; border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            width: 100%; max-width: 400px;
        }
        .header-form {
            display: flex; justify-content: center;
            margin-bottom: 25px;
        }
        .logo-container {
            display: flex; align-items: center; gap: 12px;
            text-align: left;
        }
        .logo-img { height: 60px; width: auto; object-fit: contain; }
        .logo-text { display: flex; flex-direction: column; }
        .main-title {
            font-weight: 800; font-size: 18px; color: #0056b3;
            line-height: 1.1; text-transform: uppercase;
        }
        .sub-title {
            font-weight: 600; font-size: 7px; color: #5dade2;
            letter-spacing: 1px; margin-top: 3px; text-transform: uppercase;
        }
        h3 {
            color: #333; text-align: center; margin-bottom: 20px;
            font-size: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px;
        }
        .input-group { margin-bottom: 15px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #444; font-size: 14px; font-weight: 600; }
        input {
            width: 100%; padding: 12px; border: 1.5px solid #ddd;
            border-radius: 8px; box-sizing: border-box; outline: none; transition: 0.3s;
        }
        input:focus { border-color: #0056b3; box-shadow: 0 0 8px rgba(0,86,179,0.2); }
        .btn-login {
            background: #0056b3; color: white; border: none; width: 100%;
            padding: 14px; border-radius: 8px; cursor: pointer;
            font-size: 16px; font-weight: bold; transition: 0.3s;
        }
        .btn-login:hover { background: #003d80; transform: translateY(-2px); }
        .options { margin-top: 20px; text-align: center; font-size: 14px; color: #666; }
        .options a { color: #0056b3; text-decoration: none; font-weight: bold; }
        
        /* Hiển thị lỗi */
        .error-msg {
            color: #e74c3c;
            background: #fdeaea;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">
        <div class="header-form">
            <div class="logo-container">
                <img src="../access/images/caf3b3aa-f053-4202-806b-32fd35345efa.png" alt="Logo" class="logo-img">
                <div class="logo-text">
                    <span class="main-title">TÀI LIỆU HỌC THUẬT</span>
                    <span class="sub-title">DOWNLOAD TÀI LIỆU HỌC TẬP MIỄN PHÍ</span>
                </div>
            </div>
        </div>

        <h3>ĐĂNG NHẬP</h3>

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label>Email sinh viên</label>
                <input type="email" name="email"
                        placeholder="username@st.qnu.edu.vn"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                        required>
            </div>
            <div class="input-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" placeholder="********" required>
            </div>
            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>
        
        <div class="options">
            <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>
</body>
</html>