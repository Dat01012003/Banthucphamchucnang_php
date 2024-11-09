<?php
include '../Database/db.php'; // Bao gồm file kết nối cơ sở dữ liệu
session_start(); // Bắt đầu session

// Kiểm tra và xử lý dữ liệu gửi lên từ form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy các giá trị từ form
    $tenhang = $_POST['tenhang'];
    $tensanpham = $_POST['tensanpham'];
    $description = $_POST['description'];
    $gia = $_POST['gia'];
    $product_information = $_POST['product_information'];
    $uses = $_POST['uses'];
    $lieudung = $_POST['lieudung'];
    $thantrong = $_POST['thantrong'];
    $baoquan = $_POST['baoquan'];
    $category = $_POST['category'];
    $category_subtype = $_POST['category_subtype'];

    // Xử lý upload hình ảnh
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img'];
        $img_name = time() . "_" . basename($img['name']); // Tên ảnh mới, bao gồm thời gian để đảm bảo tên duy nhất
        $img_tmp = $img['tmp_name']; // Đường dẫn tạm thời của ảnh
        $img_path = '../img/' . $img_name; // Thư mục lưu trữ ảnh (thư mục img nằm ngoài thư mục gốc)

        // Di chuyển file hình ảnh vào thư mục ../img/
        if (move_uploaded_file($img_tmp, $img_path)) {
            // Dữ liệu hình ảnh đã được upload thành công
        } else {
            // Nếu không thể upload ảnh
            echo "Lỗi khi tải ảnh lên.";
            exit;
        }
    } else {
        // Nếu không có ảnh tải lên
        echo "Vui lòng chọn ảnh cho sản phẩm.";
        exit;
    }

    // Câu lệnh SQL để thêm sản phẩm vào bảng sanpham
    $sql = "INSERT INTO sanpham (img, tenhang, tensanpham, description, gia, product_information, uses, lieudung, thantrong, baoquan, category, category_subtype)
            VALUES ('$img_path', '$tenhang', '$tensanpham', '$description', '$gia', '$product_information', '$uses', '$lieudung', '$thantrong', '$baoquan', '$category', '$category_subtype')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được tạo thành công!";
        // Sau khi tạo thành công, chuyển hướng về trang quản lý sản phẩm
        header("Location: manage_super_sale.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}