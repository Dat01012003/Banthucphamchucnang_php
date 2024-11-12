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

// Khởi tạo biến tổng tiền
$totalPrice = 0;
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

        <!-- Form để gửi lại khi thay đổi số lượng -->
        <form method="POST" action="">
            <div class="cart-content">
                <div class="cart-products">
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="product-item" data-product-id="<?php echo $row['id_product']; ?>"
                        data-price="<?php echo $row['gia']; ?>">
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
                            <button type="button" class="quantity-btn minus">-</button>
                            <input type="number" name="quantity[<?php echo $row['id_product']; ?>]"
                                class="quantity-input" value="<?php echo $row['quantity']; ?>" min="1">
                            <button type="button" class="quantity-btn plus">+</button>
                        </div>
                        <div class="product-total">
                            <span class="total-price">
                                <?php 
                                $productTotal = $row['gia'] * $row['quantity']; 
                                $totalPrice += $productTotal; 
                                echo number_format($productTotal, 0, ',', '.'); 
                                ?>₫
                            </span>
                        </div>
                        <input type="checkbox" name="selected_products[]" value="<?php echo $row['id_product']; ?>"
                            class="product-checkbox">
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
                            Tổng tiền: <span
                                class="total-price-display"><?php echo number_format($totalPrice, 0, ',', '.'); ?>₫</span>
                        </p>
                        <p class="order-shipping">Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                        <button class="checkout-btn">THANH TOÁN</button>
                        <a href="#" class="continue-shopping">← Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../Js/shopping cart details.js"></script>
    <script>
    // Lắng nghe sự kiện thay đổi số lượng sản phẩm và checkbox
    document.querySelectorAll('.quantity-input').forEach(function(input) {
        input.addEventListener('input', function() {
            // Gửi form tự động khi thay đổi số lượng
            this.closest('form').submit();
        });
    });

    // Lắng nghe sự kiện checkbox thay đổi
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Gửi form tự động khi thay đổi checkbox
            this.closest('form').submit();
        });
    });

    // Cập nhật tổng tiền chỉ cho những sản phẩm đã chọn
    function updateTotal() {
        let total = 0;
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                const productId = checkbox.value;
                const productPrice = parseFloat(document.querySelector(
                    `.product-item[data-product-id="${productId}"]`).dataset.price);
                const productQuantity = parseInt(document.querySelector(`input[name="quantity[${productId}]"]`)
                    .value);
                total += productPrice * productQuantity;
            }
        });
        document.querySelector('.total-price-display').textContent = total.toLocaleString('vi-VN') + '₫';
    }

    // Gọi hàm cập nhật tổng tiền khi thay đổi checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateTotal);
    });

    // Cập nhật tổng tiền khi trang tải
    window.onload = updateTotal;
    </script>
</body>

</html>
<?php
$conn->close();
?>