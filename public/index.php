<?php
include '../access/module/db_connect.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Tài liệu Học thuật QNU</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #5dade2;
            --success-color: #27ae60;
            --bg-body: #f0f4f8;
            --text-main: #2c3e50;
            --shadow-soft: 0 4px 20px rgba(0,0,0,0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', 'Segoe UI', Tahoma, sans-serif; }
        body { background-color: var(--bg-body); color: var(--text-main); line-height: 1.6; }

        .navbar {
            background: #ffffff;
            padding: 12px 5%;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .logo-container:hover { transform: scale(1.02); }
        .logo-img { height: 55px; width: auto; object-fit: contain; }
        
        .logo-text { display: flex; flex-direction: column; }
        .main-title { font-weight: 800; font-size: 20px; color: var(--primary-color); text-transform: uppercase; line-height: 1; }
        .sub-title { font-weight: 600; font-size: 8px; color: var(--secondary-color); letter-spacing: 1.5px; text-transform: uppercase; margin-top: 4px; }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        .nav-links { list-style: none; display: flex; gap: 20px; }
        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s;
        }
        .nav-links a:hover { color: var(--primary-color); }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 20px;
            border-left: 1px solid #eee;
        }
        .btn-upload-pro {
            background: var(--primary-color);
            color: #fff !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(0, 86, 179, 0.2);
            text-decoration: none;
        }

        .hero-section {
            position: relative;
            height: 350px;
            background: linear-gradient(rgba(0, 50, 120, 0.7), rgba(0, 50, 120, 0.7)), url('https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0 20px;
        }

        .hero-section h1 { font-size: 32px; font-weight: 800; margin-bottom: 15px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }

        .search-box-pro {
            width: 100%;
            max-width: 650px;
            display: flex;
            background: white;
            padding: 6px;
            border-radius: 50px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .search-box-pro input { flex: 1; border: none; padding: 12px 25px; outline: none; font-size: 16px; border-radius: 50px; }
        .search-box-pro button { background: var(--success-color); border: none; color: white; padding: 0 30px; cursor: pointer; border-radius: 50px; font-weight: bold; transition: 0.3s; }
        .search-box-pro button:hover { background: #219150; }

        .main-content {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 30px;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 35px;
        }

        .sidebar-pro {
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        .sidebar-card {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: var(--shadow-soft);
            margin-bottom: 25px;
        }
        .sidebar-card h3 {
            font-size: 15px;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-list { list-style: none; }
        .category-item { margin-bottom: 5px; }
        .category-link {
            text-decoration: none;
            color: #555;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s;
        }
        .category-link:hover { background: #f0f7ff; color: var(--primary-color); }
        .category-link.active { background: var(--primary-color); color: #fff; }

        .grid-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .grid-header h2 { font-size: 22px; font-weight: 800; }
        
        .doc-pro-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
        }
        .doc-pro-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #edf2f7;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }
        .doc-pro-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }

        .thumbnail-pro {
            height: 150px;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .thumbnail-pro i { font-size: 50px; color: var(--primary-color); }
        .file-type-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e74c3c;
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 800;
        }

        .card-body-pro { padding: 20px; flex-grow: 1; }
        .card-body-pro .title {
            font-weight: 700;
            font-size: 15px;
            color: #1a202c;
            text-decoration: none;
            margin-bottom: 12px;
            display: block;
            line-height: 1.4;
        }
        .card-body-pro .info { font-size: 12px; color: #718096; margin-bottom: 15px; }
        .card-body-pro .info p { display: flex; align-items: center; gap: 5px; margin-bottom: 4px; }
        
        .card-footer-pro {
            padding: 15px 20px;
            border-top: 1px solid #f7fafc;
            background: #fcfcfd;
        }
        .btn-view-pro {
            display: block;
            text-align: center;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 13px;
            padding: 10px;
            border-radius: 8px;
            border: 1.5px solid var(--primary-color);
            transition: 0.3s;
        }
        .btn-view-pro:hover { background: var(--primary-color); color: #fff; }

        @media (max-width: 1024px) {
            .main-content { grid-template-columns: 1fr; }
            .sidebar-pro { display: none; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="logo-container">
            <img src="../access/images/caf3b3aa-f053-4202-806b-32fd35345efa.png" alt="Logo" class="logo-img" onerror="this.src='https://via.placeholder.com/60x60/0056b3/FFFFFF?text=QNU'">
            <div class="logo-text">
                <span class="main-title">Tài liệu học thuật</span>
                <span class="sub-title">DOWNLOAD TÀI LIỆU HỌC TẬP</span>
            </div>
        </a>

        <div class="nav-actions">
            <ul class="nav-links">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="documents.php">Tài liệu</a></li>
            </ul>
            <div class="user-profile">
                <a href="upload.php" class="btn-upload-pro">
                    <i class="fas fa-cloud-upload-alt"></i> Đăng Tài Liệu
                </a>
                <a href="login.php" style="font-size: 24px; color: #555; margin-left: 10px;"><i class="far fa-user-circle"></i></a>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <h1>Kho Tài Liệu Học Tập</h1>
        <form action="documents.php" method="GET" class="search-box-pro">
            <input type="text" name="search" placeholder="Tìm kiếm giáo trình, đề thi, tài liệu...">
            <button type="submit"><i class="fas fa-search"></i> Tìm kiếm</button>
        </form>
    </header>

    <main class="main-content">
        <aside class="sidebar-pro">
            <div class="sidebar-card">
                <h3><i class="fas fa-layer-group"></i> Theo khối ngành</h3>
                <ul class="category-list">
                    <?php
                    $query_cate = "SELECT * FROM Categories LIMIT 6";
                    $res_cate = $conn->query($query_cate);
                    if ($res_cate && $res_cate->num_rows > 0) {
                        while($cat = $res_cate->fetch_assoc()) {
                            echo '<li class="category-item"><a href="documents.php?cate='.$cat['category_id'].'" class="category-link">'.$cat['name'].'</a></li>';
                        }
                    } else {
                        echo '<li class="category-item"><a href="#" class="category-link">💻 Công nghệ thông tin</a></li>';
                        echo '<li class="category-item"><a href="#" class="category-link">📈 Kinh tế - Quản trị</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </aside>

        <section class="content-pro">
            <div class="grid-header">
                <h2>Tài liệu mới nhất</h2>
                <div style="font-size: 14px; color: #777;">Hiển thị tài liệu chất lượng cao</div>
            </div>

            <div class="doc-pro-grid">
                <?php
                $query_docs = "
    SELECT 
        d.document_id,
        d.title,
        c.name AS category,
        u.full_name AS uploader_name,
        d.file_type
    FROM documents d
    JOIN categories c ON d.category_id = c.category_id
    JOIN users u ON d.user_id = u.user_id
    ORDER BY d.created_at DESC
    LIMIT 6
";

$result = $conn->query($query_docs);

if (!$result) {
    die("Lỗi SQL: " . $conn->error);
}
                if ($result && $result->num_rows > 0) {
                    while($doc = $result->fetch_assoc()) {
                        $file_type = strtoupper($doc['file_type']);
                        $bg_color = '#e74c3c';
                        $icon_class = 'fas fa-file';
                        $icon_color = '#e74c3c';
                        if ($file_type == 'PDF') {
                            $bg_color = '#e74c3c';
                            $icon_class = 'fas fa-file-pdf';
                            $icon_color = '#e74c3c';
                        } elseif ($file_type == 'DOCX' || $file_type == 'DOC') {
                            $bg_color = '#2b579a';
                            $icon_class = 'fas fa-file-word';
                            $icon_color = '#2b579a';
                        } elseif ($file_type == 'ZIP') {
                            $bg_color = '#f39c12';
                            $icon_class = 'fas fa-file-archive';
                            $icon_color = '#f39c12';
                        }
                        echo '<div class="doc-pro-card">';
                        echo '<div class="thumbnail-pro">';
                        echo '<span class="file-type-tag" style="background: ' . $bg_color . ';">' . $file_type . '</span>';
                        echo '<i class="' . $icon_class . '" style="color: ' . $icon_color . ';"></i>';
                        echo '</div>';
                        echo '<div class="card-body-pro">';
                        echo '<a href="detail.php?id=' . $doc['document_id'] . '" class="title">' . htmlspecialchars($doc['title']) . '</a>';
                        echo '<div class="info">';
                        echo '<p><i class="far fa-folder"></i> ' . htmlspecialchars($doc['category']) . '</p>';
                        echo '<p><i class="far fa-user"></i> ' . htmlspecialchars($doc['uploader_name']) . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-footer-pro">';
                        echo '<a href="detail.php?id=' . $doc['document_id'] . '" class="btn-view-pro">Chi tiết tài liệu</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Không có tài liệu nào.</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>