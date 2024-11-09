<?php
session_start();
include '../Database/db.php';

if (isset($_SESSION['id']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['id'];
    $product_id = intval($_POST['product_id']);

    // Xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM cart WHERE id_user = ? AND id_product = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>