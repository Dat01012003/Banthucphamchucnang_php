<?php
include '../Database/db.php';

// Lấy dữ liệu từ form
$id = $_POST['id'];
$img = $_POST['img'];
$tenhang = $_POST['tenhang'];
$tensanpham = $_POST['tensanpham'];
$description = $_POST['description'];
$gia = $_POST['gia'];
$product_information = $_POST['product_information'];
$uses = $_POST['uses'];
$lieudung = $_POST['lieudung'];
$thantrong = $_POST['thantrong'];
$baoquan = $_POST['baoquan'];

// Cập nhật sản phẩm trong cơ sở dữ liệu
$sql = "UPDATE sanpham SET
            img = '$img',
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