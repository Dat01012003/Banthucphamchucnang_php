<?php
include '../Database/db.php';

// Lấy ID sản phẩm từ yêu cầu POST
$productId = $_POST['id'];

// Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM sanpham WHERE id = $productId AND category = 'Làm đẹp'";
$result = $conn->query($sql);

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Sản phẩm không tồn tại hoặc không phải sản phẩm Super Sale']);
}
?>