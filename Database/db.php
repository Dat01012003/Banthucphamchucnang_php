<?php
$servername = "localhost";
$username = "root"; // hoặc tên người dùng của bạn
$password = ""; // hoặc mật khẩu của bạn
$dbname = "quanlybanhang"; // Đặt tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>