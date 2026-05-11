<?php
include '../access/module/db_connect.php';

$message = "";

if (isset($_POST['submit_upload'])) {
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $file_type = mysqli_real_escape_string($conn, $_POST['file_type']);
    $uploader = "Sinh viên";

    $sql = "INSERT INTO Documents (title, category_id, file_type, description, uploader_name, download_count, upload_date) 
            VALUES ('$title', '$category_id', '$type', '$description', '$uploader', 0, NOW())";

    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: #27ae60; text-align: center;'>Tải lên thành công! Tài liệu đã được lưu vào hệ thống.</p>";
    } else {
        $message = "<p style='color: #e74c3c; text-align: center;'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên tài liệu - Thư viện QNU</title>
    <link rel="stylesheet" href="logo.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .upload-wrapper { max-width: 700px; margin: 50px auto; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .upload-header { text-align: center; margin-bottom: 30px; }
        .upload-header h2 { color: #0056b3; font-size: 28px; text-transform: uppercase; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 8px; color: #333; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px; box-sizing: border-box; }
        .btn-submit-upload { width: 100%; background: #27ae60; color: white; padding: 15px; border: none; border-radius: 6px; font-size: 18px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-submit-upload:hover { background: #219150; transform: translateY(-2px); }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo-link">
                <div class="logo-container">
                    <img src="../access/images/caf3b3aa-f053-4202-806b-32fd35345efa.png" alt="Logo" class="logo-img">
                    <div class="logo-text">
                        <span class="main-title">TÀI LIỆU HỌC THUẬT</span>
                        <span class="sub-title">DOWNLOAD TÀI LIỆU HỌC TẬP MIỄN PHÍ</span>
                    </div>
                </div>
            </a>
            <ul class="nav-links">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="documents.php">Tài liệu</a></li>
                <li><a href="upload.php" class="btn-nav" style="background: #27ae60;">+ Tải lên</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="upload-wrapper">
            <div class="upload-header">
                <h2>Đóng góp tài liệu</h2>
                <?php echo $message;?>
            </div>
            <form action="upload.php" method="POST">
                <div class="form-group">
                    <label>Tên tài liệu học thuật</label>
                    <input type="text" name="title" placeholder="Ví dụ: Đồ án Quản lý khách sạn bằng C#" required>
                </div>

                <div class="form-group">
                    <label>Khoa / Chuyên ngành</label>
                    <select name="category_id" required>
                        <option value="">-- Chọn khoa --</option>
                        <option value=""> CNTT </option>
                        <option value=""> Sư phạm </option>
                        <option value="">  </option>
                        <option value=""> CNTT </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Định dạng file</label>
                    <select name="file_type">
                        <option value="PDF">PDF</option>
                        <option value="DOCX">DOCX</option>
                        <option value="ZIP">ZIP</option>
                        <option value="XLSX">XLSX</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Mô tả ngắn gọn</label>
                    <textarea name="description" rows="4" placeholder="Tài liệu này bao gồm những gì?"></textarea>
                </div>

                <button type="submit" name="submit_upload" class="btn-submit-upload">XÁC NHẬN GỬI TÀI LIỆU</button>
            </form>
        </div>
    </main>
</body>
</html>

<!-- Toàn bộ nội dung trang chủ của bạn nằm ở trên -->
    
    <?php include 'footer.php'; ?>

</body>
</html>