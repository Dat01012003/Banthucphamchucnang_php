<?php
// Kết nối tới cơ sở dữ liệu
include 'db.php'; // Chèn đường dẫn chính xác tới file kết nối database của bạn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng ký
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $diachi = trim($_POST['diachi']);
    $role = 'user'; // Gán vai trò mặc định là user

    // Kiểm tra mật khẩu xác nhận có khớp không
    if ($password !== $confirm_password) {
        die("Mật khẩu xác nhận không khớp!");
    }

    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Chuẩn bị câu truy vấn SQL để chèn dữ liệu vào bảng 'account'
    $sql = "INSERT INTO account (email, password, fullname, role, diachi) VALUES (?, ?, ?, ?, ?)";
    
    // Chuẩn bị truy vấn
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị truy vấn SQL: " . $conn->error);
    }

    // Gán giá trị vào truy vấn
    $stmt->bind_param("sssss", $email, $hashed_password, $fullname, $role, $diachi);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        // Đăng ký thành công, chuyển hướng về trang home hoặc đăng nhập
        header("Location: ../home/home.php?register_success=1");
        exit();
    } else {
        // Xử lý lỗi nếu truy vấn không thành công
        die("Đăng ký không thành công: " . $stmt->error);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>