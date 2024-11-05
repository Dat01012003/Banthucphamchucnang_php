<?php
session_start(); // Khởi động phiên để truy cập thông tin người dùng

// Kết nối tới cơ sở dữ liệu
include 'db.php'; // Đảm bảo đường dẫn đúng tới file kết nối database của bạn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ phiên người dùng
    $fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $diachi = isset($_SESSION['diachi']) ? $_SESSION['diachi'] : '';
    
    // Lấy dữ liệu từ form phản hồi
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $img = ''; // Khởi tạo giá trị ban đầu cho biến img

    // Xử lý file ảnh nếu người dùng tải lên
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        // Đặt tên file ảnh và đường dẫn
        $target_dir = "../img/img_ct"; // Thư mục để lưu ảnh
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        
        // Kiểm tra loại file (đảm bảo chỉ cho phép các file hình ảnh)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($imageFileType, $allowed_types)) {
            // Lưu file ảnh vào thư mục ../img
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $img = $target_file; // Gán đường dẫn ảnh đã lưu vào biến $img
            } else {
                die("Có lỗi xảy ra khi tải ảnh lên.");
            }
        } else {
            die("Chỉ cho phép các loại file ảnh JPG, JPEG, PNG và GIF.");
        }
    }

    // Chuẩn bị câu truy vấn SQL để chèn dữ liệu vào bảng 'contact'
    $sql = "INSERT INTO contact (fullname, email, diachi, subject, message, img) VALUES (?, ?, ?, ?, ?, ?)";

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi khi chuẩn bị truy vấn SQL: " . $conn->error);
    }

    // Gán giá trị vào truy vấn
    $stmt->bind_param("ssssss", $fullname, $email, $diachi, $subject, $message, $img);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        // Phản hồi thành công, chuyển hướng về trang cảm ơn hoặc thông báo thành công
        header("Location: ../home/home.php");
        exit();
    } else {
        // Xử lý lỗi nếu truy vấn không thành công
        die("Phản hồi không thành công: " . $stmt->error);
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>