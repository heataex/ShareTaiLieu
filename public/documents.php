<?php include '../access/module/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Tài liệu | Thư viện QNU</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="logo.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo-link">
                <div class="logo-container">
                    <img src="../access/images/books-1673578_1280.png" alt="Logo" class="logo-img">
                    <div class="logo-text">
                        <span class="main-title">TÀI LIỆU HỌC THUẬT</span>
                        <span class="sub-title">DOWNLOAD TÀI LIỆU HỌC TẬP MIỄN PHÍ</span>
                    </div>
                </div>
            </a>
            <ul class="nav-links">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="documents.php" class="active">Tài liệu</a></li>
                <li><a href="upload.php" style="color: #27ae60; font-weight: bold;"><i class="fa-solid fa-cloud-arrow-up"></i> Tải lên</a></li>
                <li><a href="login.php" class="btn-nav">Đăng nhập</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="main-layout">
            <aside class="sidebar">
                <div class="sidebar-section">
                    <h3>KHOA / BỘ MÔN</h3>
                    <ul class="category-list" id="filter-menu">
                        <li><a onclick="filterSelection('all')" class="active">📚 Tất cả</a></li>
                        <?php
                        $res = $conn->query("SELECT * FROM Categories");
                        while($c = $res->fetch_assoc()) {
                            echo '<li><a onclick="filterSelection(\''.$c['category_id'].'\')">'.$c['name'].' '.$c['name'].'</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="sidebar-section" style="margin-top: 25px;">
                    <h3>LỌC THEO NĂM</h3>
                    <div class="filter-box" style="background: #fff; padding: 12px; border-radius: 8px; border: 1px solid #eee;">
                        <div style="margin-bottom: 10px;">
                            <label style="display: flex; align-items: center; cursor: pointer; font-size: 0.9rem;">
                                <input type="checkbox" class="year-filter" value="năm-1" style="margin-right: 10px;"> Năm nhất
                            </label>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="display: flex; align-items: center; cursor: pointer; font-size: 0.9rem;">
                                <input type="checkbox" class="year-filter" value="năm-2" style="margin-right: 10px;"> Năm hai
                            </label>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="display: flex; align-items: center; cursor: pointer; font-size: 0.9rem;">
                                <input type="checkbox" class="year-filter" value="năm-3" style="margin-right: 10px;"> Năm ba
                            </label>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label style="display: flex; align-items: center; cursor: pointer; font-size: 0.9rem;">
                                <input type="checkbox" class="year-filter" value="năm-4" style="margin-right: 10px;"> Năm cuối
                            </label>
                        </div>
                        <button onclick="applyYearFilter()" class="btn-sm" style="width: 100%; background: #0056b3; border: none; color: white; padding: 8px; border-radius: 4px; cursor: pointer; font-weight: bold;">Áp dụng lọc</button>
                    </div>
                </div>

                <div class="filter-box" style="margin-top: 25px; background: #f9f9f9; padding: 15px; border-radius: 8px; border-left: 4px solid #27ae60;">
                    <h4 style="color: #27ae60; margin-bottom: 10px;"><i class="fa-solid fa-lightbulb"></i> Bạn có tài liệu hay?</h4>
                    <p style="font-size: 0.85rem; color: #666; line-height: 1.4;">Hãy chia sẻ để cộng đồng sinh viên QNU cùng phát triển.</p>
                    <a href="upload.php" class="btn-sm" style="display: block; text-align: center; margin-top: 10px; background: #27ae60; color: white; text-decoration: none; padding: 8px; border-radius: 4px; font-weight: bold;">Đăng tài liệu ngay</a>
                </div>
            </aside>

            <section class="content-area">
                <h2 id="category-title">Kho tài liệu tổng hợp</h2>
                <div class="doc-table-container">
                    <table class="doc-table">
                        <thead>
                            <tr>
                                <th>Tên tài liệu</th>
                                <th>Khoa</th>
                                <th>Loại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT d.*, c.category_id FROM Documents d JOIN Categories c ON d.category_id = c.category_id";
                            $res = $conn->query($sql);
                            while($row = $res->fetch_assoc()) {
                                $file_type = strtolower($row['file_type']);
                                $year_class = isset($row['academic_year']) ? 'năm-'.$row['academic_year'] : '';
                                
                                echo '<tr class="filter-row '.$row['category_id'].' '.$year_class.'">
                                        <td><b>'.$row['title'].'</b></td>
                                        <td>'.$row['category_id'].'</td>
                                        <td><span class="badge '.$file_type.'">'.strtoupper($row['file_type']).'</span></td>
                                        <td><a href="detail.php?id='.$row['document_id'].'" class="btn-view">Chi tiết</a></td>
                                        </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <script>
        function filterSelection(c) {
            var x = document.getElementsByClassName("filter-row");
            if (c == "all") c = "";
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = (x[i].className.indexOf(c) > -1) ? "table-row" : "none";
            }
            var links = document.querySelectorAll("#filter-menu a");
            links.forEach(l => l.classList.remove("active"));
            if (event.currentTarget) event.currentTarget.classList.add("active");
        }

        function applyYearFilter() {
            var checkboxes = document.querySelectorAll(".year-filter:checked");
            var rows = document.getElementsByClassName("filter-row");
            var selectedYears = Array.from(checkboxes).map(cb => cb.value);

            for (var i = 0; i < rows.length; i++) {
                if (selectedYears.length === 0) {
                    rows[i].style.display = "table-row";
                    continue;
                }
                
                var showRow = false;
                selectedYears.forEach(year => {
                    if (rows[i].classList.contains(year)) {
                        showRow = true;
                    }
                });
                
                rows[i].style.display = showRow ? "table-row" : "none";
            }
        }
    </script>
</body>
</html>
    
    <?php include 'footer.php'; ?>

</body>
</html>