<?php
session_start();
include '../Database/db.php';

if (isset($_SESSION['id']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $user_id = $_SESSION['id'];
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE id_user = ? AND id_product = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $user_id, $product_id);
        $stmt->execute();
    } else {
        $sql = "INSERT INTO cart (id_user, id_product, quantity, create_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt->execute();
    }

    echo "success";
} else {
    echo "error";
}
?>