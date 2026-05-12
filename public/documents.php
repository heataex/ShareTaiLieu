<?php include '../access/module/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Tài liệu | Thư viện QNU</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="logo.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>

    <nav class="navbar">

        <a href="index.php" class="logo-link">

            <div class="logo-container">

                <img src="../access/images/books-1673578_1280.png"
                     alt="Logo"
                     class="logo-img">

                <div class="logo-text">

                    <span class="main-title">
                        TÀI LIỆU HỌC THUẬT
                    </span>

                    <span class="sub-title">
                        DOWNLOAD TÀI LIỆU HỌC TẬP MIỄN PHÍ
                    </span>

                </div>

            </div>

        </a>

        <ul class="nav-links">

            <li>
                <a href="index.php">Trang chủ</a>
            </li>

            <li>
                <a href="documents.php" class="active">
                    Tài liệu
                </a>
            </li>

            <li>
                <a href="upload.php"
                   style="color: #27ae60; font-weight: bold;">

                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    Tải lên

                </a>
            </li>

            <li>
                <a href="login.php" class="btn-nav">
                    Đăng nhập
                </a>
            </li>

        </ul>

    </nav>

</header>

<main class="container">

    <div class="main-layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <!-- CATEGORY -->
            <div class="sidebar-section">

                <h3>KHOA / BỘ MÔN</h3>

                <ul class="category-list" id="filter-menu">

                    <li>
                        <a onclick="filterSelection('all')"
                           class="active">
                            📚 Tất cả
                        </a>
                    </li>

                    <?php

                    $category_sql = "SELECT * FROM Categories";
                    $category_result = $conn->query($category_sql);

                    while($c = $category_result->fetch_assoc()) {

                        echo '
                        <li>
                            <a onclick="filterSelection(\'category-'.$c['category_id'].'\')">
                                '.$c['name'].'
                            </a>
                        </li>';
                    }

                    ?>

                </ul>

            </div>

            <!-- FILTER YEAR -->
            <div class="sidebar-section" style="margin-top: 25px;">

                <h3>LỌC THEO NĂM</h3>

                <div class="filter-box"
                     style="background: #fff;
                            padding: 12px;
                            border-radius: 8px;
                            border: 1px solid #eee;">

                    <div style="margin-bottom:10px;">
                        <label>
                            <input type="checkbox"
                                   class="year-filter"
                                   value="năm-1">

                            Năm nhất
                        </label>
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>
                            <input type="checkbox"
                                   class="year-filter"
                                   value="năm-2">

                            Năm hai
                        </label>
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>
                            <input type="checkbox"
                                   class="year-filter"
                                   value="năm-3">

                            Năm ba
                        </label>
                    </div>

                    <div style="margin-bottom:10px;">
                        <label>
                            <input type="checkbox"
                                   class="year-filter"
                                   value="năm-4">

                            Năm cuối
                        </label>
                    </div>

                    <button onclick="applyYearFilter()"
                            class="btn-sm"
                            style="width:100%;
                                   background:#0056b3;
                                   border:none;
                                   color:white;
                                   padding:8px;
                                   border-radius:4px;
                                   cursor:pointer;">

                        Áp dụng lọc

                    </button>

                </div>

            </div>

        </aside>

        <!-- CONTENT -->
        <section class="content-area">

            <h2 id="category-title">
                Kho tài liệu tổng hợp
            </h2>

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

/* =========================
   SEARCH
========================= */

if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {

    $keyword = trim($_GET['keyword']);

    $sql = "
    SELECT d.*, c.name AS category_name, c.category_id
    FROM Documents d
    JOIN Categories c
    ON d.category_id = c.category_id
    WHERE d.title LIKE '%$keyword%'
    ";

} else {

    $sql = "
    SELECT d.*, c.name AS category_name, c.category_id
    FROM Documents d
    JOIN Categories c
    ON d.category_id = c.category_id
    ";

}

/* =========================
   QUERY
========================= */

$res = $conn->query($sql);

/* =========================
   CHECK ERROR
========================= */

if(!$res) {

    die("Lỗi query: " . $conn->error);

}

/* =========================
   LOOP DOCUMENT
========================= */

while($row = $res->fetch_assoc()) {

    $file_type = strtolower($row['file_type']);

    $year_class =
        isset($row['academic_year'])
        ? 'năm-'.$row['academic_year']
        : '';

    echo '
    <tr class="filter-row category-'.$row['category_id'].' '.$year_class.'">

        <td>
            <b>'.htmlspecialchars($row['title']).'</b>
        </td>

        <td>
            '.htmlspecialchars($row['category_name']).'
        </td>

        <td>
            <span class="badge '.$file_type.'">
                '.strtoupper($row['file_type']).'
            </span>
        </td>

        <td>
            <a href="detail.php?id='.$row['document_id'].'"
               class="btn-view">

                Chi tiết

            </a>
        </td>

    </tr>';

}

?>

                    </tbody>

                </table>

            </div>

        </section>

    </div>

</main>

<?php include 'footer.php'; ?>

<script>

/* =========================
   FILTER CATEGORY
========================= */

function filterSelection(c) {

    let rows = document.getElementsByClassName("filter-row");

    for(let i = 0; i < rows.length; i++) {

        if(c === "all") {

            rows[i].style.display = "table-row";

        } else {

            if(rows[i].classList.contains(c)) {

                rows[i].style.display = "table-row";

            } else {

                rows[i].style.display = "none";

            }

        }
    }
}

/* =========================
   FILTER YEAR
========================= */

function applyYearFilter() {

    let checkboxes =
        document.querySelectorAll(".year-filter:checked");

    let rows =
        document.getElementsByClassName("filter-row");

    let selectedYears =
        Array.from(checkboxes).map(cb => cb.value);

    for(let i = 0; i < rows.length; i++) {

        if(selectedYears.length === 0) {

            rows[i].style.display = "table-row";
            continue;

        }

        let showRow = false;

        selectedYears.forEach(year => {

            if(rows[i].classList.contains(year)) {

                showRow = true;

            }

        });

        rows[i].style.display =
            showRow
            ? "table-row"
            : "none";
    }
}

</script>

</body>
</html>
