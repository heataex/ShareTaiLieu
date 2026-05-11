<?php
// 1. KẾT NỐI DATABASE
$conn = new mysqli("localhost", "root", "", "document_system");
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// 2. LẤY DANH SÁCH DANH MỤC CHO SIDEBAR[cite: 1]
$cat_res = $conn->query("SELECT * FROM Categories");
$categories_list = [];
while($c = $cat_res->fetch_assoc()) {
    $categories_list[] = $c;
}

// 3. XỬ LÝ TRUY VẤN TÀI LIỆU[cite: 1]
$cat_id = isset($_GET['cat']) ? $_GET['cat'] : '';
$sql = "SELECT d.*, c.category_name 
        FROM Documents d 
        JOIN Categories c ON d.category_id = c.category_id";

if ($cat_id != '') {
    $sql .= " WHERE d.category_id = " . intval($cat_id);
}
$sql .= " ORDER BY d.upload_date DESC";
$result = $conn->query($sql);

// 4. LẤY SỐ LIỆU THỐNG KÊ[cite: 1]
$total_docs = $conn->query("SELECT COUNT(*) as t FROM Documents")->fetch_assoc()['t'];
$total_cats = $conn->query("SELECT COUNT(*) as t FROM Categories")->fetch_assoc()['t'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài liệu - Tài liệu học thuật</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            /* Màu xanh đúng theo hình ảnh yêu cầu[cite: 2] */
            --blue-sidebar: #0056bd; 
            --blue-active: rgba(255, 255, 255, 0.2);
            --bg-body: #f4f7fe;
            --text-main: #2b3674;
            --text-gray: #a3aed0;
            --sidebar-width: 250px;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; display: flex; 
            background-color: var(--bg-body);
            color: var(--text-main);
        }

        /* --- SIDEBAR --- */
        .sidebar { 
            width: var(--sidebar-width); 
            background: var(--blue-sidebar); 
            height: 100vh; position: fixed; 
            padding: 40px 20px; color: white;
            box-sizing: border-box;
        }

        /* Logo Style giống hình ảnh[cite: 3] */
        .logo-box { display: flex; align-items: center; gap: 15px; margin-bottom: 45px; }
        .logo-icon-bg { 
            background: white; width: 52px; height: 52px; border-radius: 14px; 
            display: flex; align-items: center; justify-content: center; 
        }
        .logo-icon-bg img { width: 35px; height: auto; }
        .logo-text h2 { margin: 0; font-size: 22px; font-weight: 800; letter-spacing: 1px; }
        .logo-text p { margin: 0; font-size: 10px; opacity: 0.8; text-transform: uppercase; letter-spacing: 1.5px; }

        .nav-menu { list-style: none; padding: 0; margin-bottom: 30px; }
        .nav-item { 
            display: flex; align-items: center; gap: 15px; padding: 14px 20px;
            color: rgba(255,255,255,0.75); text-decoration: none; border-radius: 16px;
            margin-bottom: 6px; font-weight: 600; font-size: 14px; transition: 0.3s;
        }
        .nav-item:hover { color: #fff; background: rgba(255,255,255,0.1); }
        .nav-item.active { background: var(--blue-active); color: #fff; }
        .nav-item i { font-size: 18px; width: 22px; text-align: center; }

        .section-label { 
            font-size: 11px; text-transform: uppercase; opacity: 0.5; 
            margin: 25px 0 12px 20px; font-weight: 800; letter-spacing: 1px;
        }

        /* --- MAIN CONTENT --- */
        .main-content { margin-left: var(--sidebar-width); flex: 1; padding: 40px 50px; }
        
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .top-bar h1 { font-size: 32px; font-weight: 800; margin: 0; letter-spacing: -1px; }

        .btn-add { 
            background: #1a56db; color: white; padding: 12px 28px; 
            border-radius: 14px; text-decoration: none; font-weight: 700; font-size: 14px;
            box-shadow: 0 10px 20px rgba(26, 86, 219, 0.2);
        }

        /* STAT CARDS[cite: 1] */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; margin-bottom: 40px; }
        .stat-card { 
            background: white; padding: 25px; border-radius: 24px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.02);
        }
        .stat-card .label { color: var(--text-gray); font-size: 13px; font-weight: 700; text-transform: uppercase; }
        .stat-card .value { margin: 10px 0; font-size: 26px; font-weight: 800; display: block; }

        /* DATA TABLE CARD[cite: 2] */
        .table-card { 
            background: white; padding: 30px; border-radius: 30px; 
            box-shadow: 0 15px 45px rgba(0,0,0,0.03); 
        }
        
        .table-header { display: flex; justify-content: space-between; margin-bottom: 25px; }
        .search-box { 
            background: #f4f7fe; border-radius: 15px; padding: 12px 20px; width: 420px;
            display: flex; align-items: center; gap: 12px;
        }
        .search-box input { background: none; border: none; outline: none; flex: 1; font-size: 14px; }

        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; color: var(--text-gray); font-size: 12px; padding: 15px 12px; text-transform: uppercase; border-bottom: 1px solid #f4f7fe; }
        td { padding: 20px 12px; border-bottom: 1px solid #f4f7fe; font-size: 15px; font-weight: 600; }

        .badge {
            padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 800;
            text-transform: uppercase; color: white !important; display: inline-block;
        }
        .badge.pdf { background-color: #e74c3c !important; }
        .badge.zip { background-color: #f39c12 !important; }
        .badge.docx { background-color: #2b579a !important; }

        .status-badge { color: #05cd99; font-weight: 800; display: flex; align-items: center; gap: 8px; }
        .status-dot { width: 8px; height: 8px; background: #05cd99; border-radius: 50%; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo-box">
        <div class="logo-icon-bg">
            <!-- Sử dụng hình ảnh logo sách từ file bạn cung cấp[cite: 3] -->
            <img src="images/books-1673578_1280.png" alt="Icon">
        </div>
        <div class="logo-text">
            <h2>TÀI LIỆU</h2>
            <p>Học thuật</p>
        </div>
    </div>

    <div class="nav-menu">
        <a href="index.php" class="nav-item"><i class="fa-solid fa-chart-pie"></i> Tổng quan</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-user-group"></i> Quản lý người dùng</a>
        <a href="#" class="nav-item active"><i class="fa-solid fa-file-invoice"></i> Quản lý tài liệu</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-robot"></i> Duyệt tự động</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-gear"></i> Cài đặt hệ thống</a>
    </div>

    <div class="section-label">Chuyên ngành</div>
    <?php foreach($categories_list as $cat): ?>
        <a href="?cat=<?php echo $cat['category_id']; ?>" class="nav-item <?php echo ($cat_id == $cat['category_id']) ? 'active' : ''; ?>">
            <i><?php echo $cat['icon']; ?></i> <?php echo $cat['category_name']; ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="main-content">
    <div class="top-bar">
        <h1>Quản lý tài liệu</h1>
        <a href="#" class="btn-add">+ Thêm tài liệu</a>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <span class="label">Tổng tài liệu</span>
            <span class="value"><?php echo number_format($total_docs); ?></span>
            <span style="color: #4318ff; font-size: 11px; font-weight: 700;">Sẵn sàng để cập nhật</span>
        </div>
        <div class="stat-card">
            <span class="label">Danh mục</span>
            <span class="value"><?php echo $total_cats; ?></span>
            <span style="color: #4318ff; font-size: 11px; font-weight: 700;">Phân loại khoa học hơn</span>
        </div>
        <div class="stat-card">
            <span class="label">Trạng thái hệ thống</span>
            <span class="value" style="color: #05cd99;">Hoạt động tốt</span>
            <span style="color: #05cd99; font-size: 11px; font-weight: 700;">Sẵn sàng tiếp nhận dữ liệu</span>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass" style="color: var(--text-gray);"></i>
                <input type="text" placeholder="Tìm tài liệu theo tên, danh mục...">
            </div>
            <div style="display: flex; gap: 10px;">
                <button style="border:none; background:#f4f7fe; padding:12px 20px; border-radius:12px; font-weight:700; color:var(--text-main); cursor:pointer;">Bộ lọc</button>
                <button style="border:none; background:#1a56db; color:white; padding:12px 20px; border-radius:12px; font-weight:700; cursor:pointer;">Xuất dữ liệu</button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tài liệu</th>
                    <th>Chuyên ngành</th>
                    <th>Người đăng</th>
                    <th>Định dạng</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <a href="#" style="color:#1a56db; text-decoration:none; font-weight:700;"><?php echo htmlspecialchars($row['title']); ?></a>
                        </td>
                        <td style="color: #718096;"><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['uploader_name']; ?></td>
                        <td>
                            <span class="badge <?php echo strtolower($row['file_type']); ?>">
                                <?php echo strtoupper($row['file_type']); ?>
                            </span>
                        </td>
                        <td>
                            <span class="status-badge"><span class="status-dot"></span> Hoạt động</span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align: center; padding: 60px; color: var(--text-gray);">Chưa có tài liệu nào trong danh mục này.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php $conn->close(); ?>