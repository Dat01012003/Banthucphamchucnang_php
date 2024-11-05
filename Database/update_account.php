<?php
session_start();
include 'db.php'; // Kết nối cơ sở dữ liệu

$response = ["status" => "error", "message" => ""]; // Tạo mảng lưu trữ kết quả trả về

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $diachi = $_POST['diachi'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];

    $sql = "SELECT password FROM account WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (strlen($user['password']) > 20) {
            if (password_verify($current_password, $user['password'])) {
                updateAccount($fullname, $diachi, $new_password, $confirm_password, $email, $conn, $response);
            } else {
                $response["message"] = "Mật khẩu hiện tại không đúng!";
            }
        } else {
            if ($current_password === $user['password']) {
                $hashed_password = password_hash($current_password, PASSWORD_DEFAULT);
                $sql_update_password = "UPDATE account SET password = ? WHERE email = ?";
                $stmt_update_password = $conn->prepare($sql_update_password);
                $stmt_update_password->bind_param("ss", $hashed_password, $email);
                $stmt_update_password->execute();
                updateAccount($fullname, $diachi, $new_password, $confirm_password, $email, $conn, $response);
            } else {
                $response["message"] = "Mật khẩu hiện tại không đúng!";
            }
        }
    } else {
        $response["message"] = "Không tìm thấy người dùng!";
    }
} else {
    $response["message"] = "Yêu cầu không hợp lệ.";
}

echo json_encode($response);

function updateAccount($fullname, $diachi, $new_password, $confirm_password, $email, $conn, &$response) {
    if ($new_password !== $confirm_password) {
        $response["message"] = "Mật khẩu mới và xác nhận mật khẩu không khớp!";
        return;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql_update = "UPDATE account SET fullname = ?, diachi = ?, password = ? WHERE email = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssss", $fullname, $diachi, $hashed_password, $email);

    if ($stmt_update->execute()) {
        session_destroy(); // Đăng xuất
        $response["status"] = "success";
        $response["message"] = "Cập nhật thành công!";
    } else {
        $response["message"] = "Cập nhật thất bại!";
    }
}
?>