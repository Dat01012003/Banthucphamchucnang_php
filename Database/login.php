<?php
session_start();
include '../Database/db.php'; // Đường dẫn tới db.php

$error = ""; // Khởi tạo biến lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); // Bỏ khoảng trắng
    $password = trim($_POST['password']); // Bỏ khoảng trắng

    // Tìm người dùng với email đã nhập
    $sql = "SELECT id, password, fullname, email, diachi, role FROM account WHERE email = ?"; // Thêm cột 'id' vào truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy thông tin người dùng
        $user = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu
        if (strlen($user['password']) > 20) { // Kiểm tra xem mật khẩu có phải đã băm không
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['id'] = $user['id']; // Lưu id của người dùng vào session
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['diachi'] = $user['diachi'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../home/home.php"); // Chuyển đến home.php
                exit();
            } else {
                // Sai mật khẩu
                $_SESSION['error'] = "Sai mật khẩu."; // Lưu thông báo lỗi vào session
                header("Location: ../home/home.php?showLogin=1"); // Thêm biến truy vấn để hiển thị popup
                exit();
            }
        } else {
            // Nếu mật khẩu chưa được băm, so sánh trực tiếp
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['diachi'] = $user['diachi'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../home/home.php");
                exit();
            }
             else {
                // Sai mật khẩu
                $_SESSION['error'] = "Sai mật khẩu."; // Lưu thông báo lỗi vào session
                header("Location: ../home/home.php?showLogin=1"); // Thêm biến truy vấn để hiển thị popup
                exit();
            }
        }
    } else {
        // Sai email
        $_SESSION['error'] = "Email không tồn tại."; // Lưu thông báo lỗi vào session
        header("Location: ../home/home.php?showLogin=1"); // Thêm biến truy vấn để hiển thị popup
        exit();
    }
}
?>