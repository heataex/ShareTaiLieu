<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "document_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
if ($conn->connect_error) {
    die("Kết nối CSDL thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

$sql = "SELECT user_id, username, email, role, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - Tài liệu học thuật</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --blue-sidebar: #0056bd; 
            --blue-active: rgba(255, 255, 255, 0.2);
            --bg-body: #f4f7fe;
            --text-main: #2b3674;
            --text-gray: #a3aed0;
            --sidebar-width: 250px;
        }

        body { 
            font-family: 'Segoe UI', sans-serif; 
            margin: 0; display: flex; 
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        .sidebar { 
            width: var(--sidebar-width); 
            background: var(--blue-sidebar); 
            height: 100vh; position: fixed; 
            padding: 40px 20px; color: white;
            box-sizing: border-box;
        }

        .logo-box { display: flex; align-items: center; gap: 15px; margin-bottom: 45px; }
        .logo-icon-bg { 
            background: white; width: 52px; height: 52px; border-radius: 14px; 
            display: flex; align-items: center; justify-content: center; 
        }
        .logo-icon-bg img { width: 35px; height: auto; }
        .logo-text h2 { margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 1px; }
        .logo-text p { margin: 0; font-size: 10px; opacity: 0.8; text-transform: uppercase; }

        .nav-menu { list-style: none; padding: 0; }
        .nav-item { 
            display: flex; align-items: center; gap: 15px; padding: 14px 20px;
            color: rgba(255,255,255,0.75); text-decoration: none; border-radius: 16px;
            margin-bottom: 6px; font-weight: 600; font-size: 14px; transition: 0.3s;
        }
        .nav-item.active { background: var(--blue-active); color: #fff; }
        .nav-item i { font-size: 18px; width: 22px; text-align: center; }

        .main-content { margin-left: var(--sidebar-width); flex: 1; padding: 40px 50px; }
        
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .top-bar h1 { font-size: 32px; font-weight: 800; margin: 0; }

        .btn-add { 
            background: #1a56db; color: white; padding: 12px 28px; 
            border-radius: 14px; text-decoration: none; font-weight: 700; font-size: 14px;
        }

        .table-card { 
            background: white; padding: 30px; border-radius: 30px; 
            box-shadow: 0 15px 45px rgba(0,0,0,0.03); 
        }
        
        .table-header { display: flex; justify-content: space-between; margin-bottom: 25px; }
        .search-box { 
            background: #f4f7fe; border-radius: 15px; padding: 12px 20px; width: 400px;
            display: flex; align-items: center; gap: 12px;
        }
        .search-box input { background: none; border: none; outline: none; flex: 1; }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; color: var(--text-gray); font-size: 12px; padding: 15px 12px; text-transform: uppercase; border-bottom: 1px solid #f4f7fe; }
        td { padding: 20px 12px; border-bottom: 1px solid #f4f7fe; font-size: 15px; font-weight: 600; }

        .badge { padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 800; color: white; text-transform: uppercase; }
        .ADMIN { background-color: #4318ff; }
        .USER { background-color: #05cd99; }

        .action-btns { display: flex; gap: 8px; }
        .btn-icon { border: none; background: #f4f7fe; color: #2b3674; padding: 8px; border-radius: 8px; cursor: pointer; text-decoration: none; transition: 0.2s; }
        .btn-icon:hover { background: #e2e8f0; }
        .btn-del { color: #ef4444; }
        
        .avatar { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo-box">
        <div class="logo-icon-bg">
            <img src="access/images/books-1673578_1280.png" alt="Logo" class="logo-img">
        </div>
        <div class="logo-text">
            <h2>TÀI LIỆU HỌC THUẬT</h2>
        </div>
    </div>

    <div class="nav-menu">
        <a href="#" class="nav-item"><i class="fa-solid fa-chart-pie"></i> Tổng quan</a>
        <a href="users.php" class="nav-item active"><i class="fa-solid fa-user-group"></i> Quản lý người dùng</a>
        <a href="../public/admin.php" class="nav-item"><i class="fa-solid fa-file-invoice"></i> Quản lý tài liệu</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-robot"></i> Duyệt tự động</a>
    </div>
</div>

<div class="main-content">
    <div class="top-bar">
        <h1>Quản lý người dùng</h1>
        <a href="add_user.php" class="btn-add">+ Thêm người dùng</a>
    </div>

    <div class="table-card">
        <div class="table-header">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass" style="color: var(--text-gray);"></i>
                <input type="text" placeholder="Tìm người dùng...">
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $role = strtoupper($row['role']);
                        $initial = strtoupper(substr($row['username'], 0, 1));
                        $avatar_color = ($role == 'ADMIN') ? '#4318ff' : '#05cd99';
                        $date = date("d/m/Y", strtotime($row['created_at']));
                        
                        echo "<tr>";
                        echo "<td>
                                <div style='display: flex; align-items: center; gap: 10px;'>
                                    <div class='avatar' style='background: #e2e8f0; color: $avatar_color;'>$initial</div>
                                    " . htmlspecialchars($row['username']) . "
                                </div>
                              </td>";
                        echo "<td style='color: #718096;'>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td><span class='badge $role'>$role</span></td>";
                        echo "<td style='color: var(--text-gray);'>$date</td>";
                        echo "<td>
                                <div class='action-btns'>
                                    <a href='edit_user.php?id=" . $row['user_id'] . "' class='btn-icon'><i class='fa-solid fa-pen'></i></a>
                                    <a href='delete_user.php?id=" . $row['user_id'] . "' class='btn-icon btn-del' onclick='return confirm(\"Xác nhận xóa người dùng này?\")'><i class='fa-solid fa-trash'></i></a>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center; padding: 20px;'>Không tìm thấy người dùng nào.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php 
$conn->close(); 
?>