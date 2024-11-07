<?php
session_start();
include '../Database/db.php';

$response = ['success' => false, 'cart_count' => 0];

if (isset($_SESSION['id']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $id_user = $_SESSION['id'];  // Lấy ID người dùng từ session
    $id_product = $_POST['product_id'];  // ID sản phẩm
    $quantity = $_POST['quantity'];  // Số lượng sản phẩm muốn thêm

    // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
    $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $id_user, $id_product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Cập nhật số lượng sản phẩm nếu đã tồn tại
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE id_user = ? AND id_product = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iii', $quantity, $id_user, $id_product);
    } else {
        // Thêm sản phẩm mới vào giỏ hàng
        $sql = "INSERT INTO cart (id_user, id_product, quantity, create_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iii', $id_user, $id_product, $quantity);
    }
    $stmt->execute();

    // Tính toán lại tổng số sản phẩm trong giỏ hàng của người dùng
    $sql = "SELECT SUM(quantity) as cart_count FROM cart WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $response['success'] = true;
    $response['cart_count'] = $row['cart_count'];  // Số lượng giỏ hàng
}

echo json_encode($response);
?>