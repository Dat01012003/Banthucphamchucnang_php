<?php
header("Content-Type: application/json");

// Bao gồm tệp kết nối cơ sở dữ liệu
require '../Database/db.php';

// Lấy từ khóa tìm kiếm từ request
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Truy vấn sản phẩm dựa trên từ khóa tìm kiếm
$sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Trả về kết quả dưới dạng JSON
echo json_encode($products);

// Đóng kết nối (tùy chọn nếu `db.php` không tự đóng)
$conn->close();
?>