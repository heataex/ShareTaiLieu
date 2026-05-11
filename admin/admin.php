<?php include '../access/module/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng quản trị - Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        .admin-table th, .admin-table td { padding: 15px; border: 1px solid #eee; text-align: left; }
        .admin-table th { background: #0056b3; color: white; }
        .btn-delete { color: #e74c3c; cursor: pointer; text-decoration: underline; border: none; background: none; }
        .stats-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
    </style>
</head>
<body style="background: #f4f7f6;">

    <div class="container">
        <h1 style="margin: 30px 0;">QUẢN TRỊ HỆ THỐNG</h1>

        <div class="stats-cards">
            <div class="card">
                <h3>Tổng tài liệu</h3>
                <p style="font-size: 24px; font-weight: bold; color: #0056b3;">
                    <?php echo $conn->query("SELECT document_id FROM Documents")->num_rows; ?>
                </p>
            </div>
            <div class="card">
                <h3>Tổng danh mục</h3>
                <p style="font-size: 24px; font-weight: bold; color: #27ae60;">
                    <?php echo $conn->query("SELECT category_id FROM Categories")->num_rows; ?>
                </p>
            </div>
            <div class="card">
                <h3>Lượt truy cập</h3>
                <p style="font-size: 24px; font-weight: bold; color: #f39c12;">10,254</p>
            </div>
        </div>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài liệu</th>
                    <th>Khoa</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT d.document_id, d.title, c.name, d.updated_at 
                        FROM Documents d JOIN Categories c ON d.category_id = c.category_id 
                        ORDER BY d.document_id DESC";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['document_id']."</td>
                            <td>".$row['title']."</td>
                            <td>".$row['name']."</td>
                            <td>".date('d/m/Y', strtotime($row['updated_at']))."</td>
                            <td>
                                <form action='admin.php' method='POST' onsubmit='return confirm(\"Bạn có chắc muốn xóa?\")'>
                                    <input type='hidden' name='del_id' value='".$row['document_id']."'>
                                    <button type='submit' name='btn_delete' class='btn-delete'>Xóa</button>
                                </form>
                            </td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if(isset($_POST['btn_delete'])) {
        $del_id = $_POST['del_id'];
        if($conn->query("DELETE FROM Documents WHERE document_id = $del_id")) {
            echo "<script>window.location='admin.php';</script>";
        }
    }
    ?>
</body>
</html>
    
    <?php include 'footer.php'; ?>

</body>
</html>