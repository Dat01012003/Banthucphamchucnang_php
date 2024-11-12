<?php
include '../Database/db.php';

// Lấy dữ liệu từ form
$id = mysqli_real_escape_string($conn, $_POST['id']);
$tenhang = mysqli_real_escape_string($conn, $_POST['tenhang']);
$tensanpham = mysqli_real_escape_string($conn, $_POST['tensanpham']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$gia = mysqli_real_escape_string($conn, $_POST['gia']);
$product_information = mysqli_real_escape_string($conn, $_POST['product_information']);
$uses = mysqli_real_escape_string($conn, $_POST['uses']);
$lieudung = mysqli_real_escape_string($conn, $_POST['lieudung']);
$thantrong = mysqli_real_escape_string($conn, $_POST['thantrong']);
$baoquan = mysqli_real_escape_string($conn, $_POST['baoquan']);

// Đường dẫn thư mục lưu ảnh
$uploadDir = '../img/';

// Xử lý từng ảnh nếu có file được tải lên
$imgPath = !empty($_FILES['img']['name']) ? $uploadDir . basename($_FILES['img']['name']) : '';
$img1Path = !empty($_FILES['img1']['name']) ? $uploadDir . basename($_FILES['img1']['name']) : '';
$img2Path = !empty($_FILES['img2']['name']) ? $uploadDir . basename($_FILES['img2']['name']) : '';

if ($imgPath && !move_uploaded_file($_FILES['img']['tmp_name'], $imgPath)) {
    echo 'error uploading img';
    exit;
}
if ($img1Path && !move_uploaded_file($_FILES['img1']['tmp_name'], $img1Path)) {
    echo 'error uploading img1';
    exit;
}
if ($img2Path && !move_uploaded_file($_FILES['img2']['tmp_name'], $img2Path)) {
    echo 'error uploading img2';
    exit;
}

// Cập nhật sản phẩm trong cơ sở dữ liệu với đường dẫn ảnh đầy đủ
$sql = "UPDATE sanpham SET
            img = IF('$imgPath' != '', '$imgPath', img),
            img1 = IF('$img1Path' != '', '$img1Path', img1),
            img2 = IF('$img2Path' != '', '$img2Path', img2),
            tenhang = '$tenhang',
            tensanpham = '$tensanpham',
            description = '$description',
            gia = '$gia',
            product_information = '$product_information',
            uses = '$uses',
            lieudung = '$lieudung',
            thantrong = '$thantrong',
            baoquan = '$baoquan'
        WHERE id = $id AND category = 'Super sale'";

if ($conn->query($sql) === TRUE) {
    echo 'success';
} else {
    echo 'error: ' . $conn->error;
}
?>