<?php
// Bắt đầu session
session_start();

// Bao gồm file kết nối cơ sở dữ liệu
include '../Database/db.php';

// Kiểm tra và xử lý dữ liệu gửi lên từ form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Gán giá trị hoặc gán mặc định là trống nếu không nhập
    $tenhang = isset($_POST['tenhang']) ? htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tenhang']), ENT_QUOTES, 'UTF-8') : '';
    $tensanpham = isset($_POST['tensanpham']) ? mysqli_real_escape_string($conn, $_POST['tensanpham']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $gia = isset($_POST['gia']) ? (float)$_POST['gia'] : 0;
    $product_information = isset($_POST['product_information']) ? mysqli_real_escape_string($conn, $_POST['product_information']) : '';
    $uses = isset($_POST['uses']) ? mysqli_real_escape_string($conn, $_POST['uses']) : '';
    $lieudung = isset($_POST['lieudung']) ? mysqli_real_escape_string($conn, $_POST['lieudung']) : '';
    $thantrong = isset($_POST['thantrong']) ? mysqli_real_escape_string($conn, $_POST['thantrong']) : '';
    $baoquan = isset($_POST['baoquan']) ? mysqli_real_escape_string($conn, $_POST['baoquan']) : '';
    $category = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : '';
    $category_subtype = isset($_POST['category_subtype']) ? mysqli_real_escape_string($conn, $_POST['category_subtype']) : '';

    // Xử lý upload hình ảnh
    function uploadImage($imgField, $conn) {
        $img_path = ''; // Đặt giá trị mặc định là chuỗi rỗng
        if (isset($_FILES[$imgField]) && $_FILES[$imgField]['error'] == 0) {
            $img = $_FILES[$imgField];
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if (in_array($img['type'], $allowed_types)) {
                $img_name = time() . "_" . basename($img['name']);
                $img_tmp = $img['tmp_name'];
                $img_path = '../img/' . $img_name; // Tạo tên duy nhất cho ảnh

                if (!move_uploaded_file($img_tmp, $img_path)) {
                    echo "Lỗi khi tải ảnh lên.";
                    exit;
                }
            } else {
                echo "Loại file không hợp lệ. Chỉ chấp nhận JPEG, PNG và GIF.";
                exit;
            }
        }
        return $img_path; // Trả về đường dẫn ảnh hoặc chuỗi rỗng
    }

    // Upload từng hình ảnh
    $img = uploadImage('img', $conn);  // Ảnh chính
    $img1 = uploadImage('img1', $conn); // Ảnh phụ 1
    $img2 = uploadImage('img2', $conn); // Ảnh phụ 2

    // Câu lệnh SQL để thêm sản phẩm vào bảng sanpham
    $sql = "INSERT INTO sanpham (img, img1, img2, tenhang, tensanpham, description, gia, product_information, uses, lieudung, thantrong, baoquan, category, category_subtype)
            VALUES ('$img', '$img1', '$img2', '$tenhang', '$tensanpham', '$description', '$gia', '$product_information', '$uses', '$lieudung', '$thantrong', '$baoquan', '$category', '$category_subtype')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được tạo thành công!";
        header('Location: ../home/home.php');
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>