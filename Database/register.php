<?php
session_start(); // Bắt đầu session để lưu lỗi và dữ liệu người dùng

// Kết nối tới cơ sở dữ liệu
include 'db.php'; // Chèn đường dẫn chính xác tới file kết nối database của bạn

$errors = []; // Mảng chứa lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form đăng ký
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $diachi = trim($_POST['diachi']);
    $phone = trim($_POST['phone']); // Lấy thêm dữ liệu số điện thoại
    $role = 'user'; // Gán vai trò mặc định là user

    // Kiểm tra đầu vào
    if (empty($fullname)) {
        $errors[] = "Họ và tên không được để trống.";
    }
    if (empty($email)) {
        $errors[] = "Email không được để trống.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }
    if (empty($password)) {
        $errors[] = "Mật khẩu không được để trống.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
    }
    if (empty($confirm_password)) {
        $errors[] = "Xác nhận mật khẩu không được để trống.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Mật khẩu xác nhận không khớp.";
    }
    if (empty($diachi)) {
        $errors[] = "Địa chỉ không được để trống.";
    }
    if (empty($phone)) {
        $errors[] = "Số điện thoại không được để trống.";
    } elseif (!preg_match('/^[0-9]{10,11}$/', $phone)) {
        $errors[] = "Số điện thoại phải là 10-11 chữ số.";
    }

    // Nếu có lỗi, lưu vào session và quay lại form đăng ký
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST; // Lưu dữ liệu cũ để điền lại form
        header("Location: ../home/home.php"); // Quay lại trang có modal
        exit();
    }

    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Chuẩn bị câu truy vấn SQL
    $sql = "INSERT INTO account (email, password, fullname, role, diachi, phone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        $errors[] = "Lỗi khi chuẩn bị truy vấn SQL: " . $conn->error;
    } else {
        $stmt->bind_param("ssssss", $email, $hashed_password, $fullname, $role, $diachi, $phone);

        // Thực thi truy vấn
        if (!$stmt->execute()) {
            $errors[] = "Đăng ký không thành công: " . $stmt->error;
        }
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();

    // Nếu có lỗi trong quá trình thực thi, lưu lỗi vào session và quay lại form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../home/home.php");
        exit();
    }

    // Nếu không có lỗi, chuyển hướng sau khi đăng ký thành công
    header("Location: ../home/home.php?register_success=1");
    exit();
}
?>