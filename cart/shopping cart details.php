<?php
session_start();
include('../Database/db.php');

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['id'])) {
    header("Location: ../home/home.php");
    exit;
}

$user_id = $_SESSION['id'];

// Truy vấn các sản phẩm trong giỏ hàng của người dùng
$sql = "SELECT c.id_cart, c.id_product, c.quantity, p.img, p.tensanpham, p.gia
        FROM cart c
        INNER JOIN sanpham p ON c.id_product = p.id
        WHERE c.id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/shopping cart details.css">
</head>

<body>
    <div class="container">
        <div class="breadcrumbs">
            <a href="../home/home.php">Trang chủ</a> / <span>Giỏ hàng</span>
        </div>
        <h1 class="cart-title">GIỎ HÀNG CỦA BẠN</h1>
        <p class="cart-info">Có <?php echo $result->num_rows; ?> sản phẩm trong giỏ hàng</p>
        <hr>
        <div class="cart-content">
            <div class="cart-products">
                <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-item">
                    <div class="product-info">
                        <img src="<?php echo $row['img']; ?>" alt="Product">
                        <div class="product-details">
                            <p class="product-name"><?php echo $row['tensanpham']; ?></p>
                            <p class="product-price">
                                <span
                                    class="current-price"><?php echo number_format($row['gia'], 0, ',', '.'); ?>₫</span>
                            </p>
                        </div>
                    </div>
                    <div class="product-quantity">
                        <button class="quantity-btn minus">-</button>
                        <input type="number" class="quantity-input" value="<?php echo $row['quantity']; ?>" min="1">
                        <button class="quantity-btn plus">+</button>
                    </div>
                    <div class="product-total">
                        <?php echo number_format($row['gia'] * $row['quantity'], 0, ',', '.'); ?>₫
                    </div>
                    <button class="remove-product" onclick="removeProduct(<?php echo $row['id_product']; ?>)">×</button>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="cart-summary">
                <div class="order-note">
                    <h4>Ghi chú đơn hàng</h4>
                    <textarea placeholder="Ghi chú"></textarea>
                </div>
                <div class="order-info">
                    <h4>Thông tin đơn hàng</h4>
                    <p class="order-total">
                        Tổng tiền: <span class="total-price">314,000₫</span>
                    </p>
                    <p class="order-shipping">Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                    <button class="checkout-btn">THANH TOÁN</button>
                    <a href="#" class="continue-shopping">← Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../Js/shopping cart details.js"></script>
</body>

</html>
<?php
$conn->close();
?>