<?php
include '../Database/db.php';

// Kiểm tra ID sản phẩm từ yêu cầu GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Không có ID sản phẩm.";
    exit();
}

$id = (int) $_GET['id']; // Đảm bảo ID là kiểu số nguyên

// Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL Injection
$stmt = $conn->prepare("DELETE FROM sanpham WHERE id = ? AND category = 'Làm đẹp'");
$stmt->bind_param("i", $id); // "i" nghĩa là kiểu số nguyên

// Thực thi câu lệnh
if ($stmt->execute()) {
    // Nếu xóa thành công, chuyển hướng về trang quản lý sản phẩm
    header('Location: ../admin_panel/manage_lamdep.php');
    exit();
} else {
    // Nếu có lỗi, hiển thị lỗi
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>