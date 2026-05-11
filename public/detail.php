<?php
include '../access/module/db_connect.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$sql = "SELECT d.*, c.category_id FROM Documents d JOIN Categories c ON d.category_id = c.category_id WHERE d.document_id = $id";
$res = $conn->query($sql);
$doc = $res->fetch_assoc();
if (!$doc) die("Không tìm thấy tài liệu!");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo $doc['title']; ?></title>
    <link rel="stylesheet" href="logo.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <div class="auth-box" style="width: 100%; max-width: 800px; margin: auto; text-align: left;">
            <h1><?php echo $doc['title']; ?></h1>
            <p>Khoa: <b><?php echo $doc['description']; ?></b></p>
            <p>Ngày đăng: <?php echo $doc['updated_at']; ?></p>
            <hr>
            <p><?php echo $doc['description'] ? $doc['description'] : "Mô tả đang được cập nhật..."; ?></p>
            <br>
            <a href="#" class="btn-nav" style="display:inline-block">⬇️ Tải xuống ngay (<?php echo strtoupper($doc['file_type']); ?>)</a>
        </div>
    </main>
</body>
</html>
    
    <?php include 'footer.php'; ?>

</body>
</html>
